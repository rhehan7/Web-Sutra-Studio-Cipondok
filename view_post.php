<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

include 'components/like_post.php';

$get_id = $_GET['post_id'];

if(isset($_POST['add_comment'])){

   $admin_id = $_POST['admin_id'];
   $admin_id = filter_var($admin_id, FILTER_SANITIZE_STRING);
   $user_name = $_POST['user_name'];
   $user_name = filter_var($user_name, FILTER_SANITIZE_STRING);
   $comment = $_POST['comment'];
   $comment = filter_var($comment, FILTER_SANITIZE_STRING);

   $verify_comment = $conn->prepare("SELECT * FROM `comments` WHERE post_id = ? AND admin_id = ? AND user_id = ? AND user_name = ? AND comment = ?");
   $verify_comment->execute([$get_id, $admin_id, $user_id, $user_name, $comment]);

   if($verify_comment->rowCount() > 0){
      $message[] = 'comment already added!';
   }else{
      $insert_comment = $conn->prepare("INSERT INTO `comments`(post_id, admin_id, user_id, user_name, comment) VALUES(?,?,?,?,?)");
      $insert_comment->execute([$get_id, $admin_id, $user_id, $user_name, $comment]);
      $message[] = 'new comment added!';
   }

}

if(isset($_POST['edit_comment'])){
   $edit_comment_id = $_POST['edit_comment_id'];
   $edit_comment_id = filter_var($edit_comment_id, FILTER_SANITIZE_STRING);
   $comment_edit_box = $_POST['comment_edit_box'];
   $comment_edit_box = filter_var($comment_edit_box, FILTER_SANITIZE_STRING);

   $verify_comment = $conn->prepare("SELECT * FROM `comments` WHERE comment = ? AND id = ?");
   $verify_comment->execute([$comment_edit_box, $edit_comment_id]);

   if($verify_comment->rowCount() > 0){
      $message[] = 'comment already added!';
   }else{
      $update_comment = $conn->prepare("UPDATE `comments` SET comment = ? WHERE id = ?");
      $update_comment->execute([$comment_edit_box, $edit_comment_id]);
      $message[] = 'your comment edited successfully!';
   }
}

if(isset($_POST['delete_comment'])){
   $delete_comment_id = $_POST['comment_id'];
   $delete_comment_id = filter_var($delete_comment_id, FILTER_SANITIZE_STRING);
   $delete_comment = $conn->prepare("DELETE FROM `comments` WHERE id = ?");
   $delete_comment->execute([$delete_comment_id]);
   $message[] = 'comment deleted successfully!';
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">
   <title>view post</title>

   <!-- font awesome cdn link  -->
   <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"> -->

   <!-- custom css file link  -->
   <!-- <link rel="stylesheet" href="css/style.css"> -->
	<!-- favicon -->
	<link rel="shortcut icon" type="image/png" href="assets/img/favicon.png">
	<!-- google font -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
	<!-- font awesome cdn link  -->
	<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"> -->
	<!-- fontawesome -->
	<link rel="stylesheet" href="assets/css/all.min.css">
	<!-- bootstrap -->
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
	<!-- owl carousel -->
	<!-- <link rel="stylesheet" href="assets/css/owl.carousel.css"> -->
	<!-- magnific popup -->
	<!-- <link rel="stylesheet" href="assets/css/magnific-popup.css"> -->
	<!-- animate css -->
	<!-- <link rel="stylesheet" href="assets/css/animate.css"> -->
	<!-- mean menu css -->
	<link rel="stylesheet" href="assets/css/meanmenu.min.css">
	<!-- main style -->
	<link rel="stylesheet" href="assets/css/main.css">
	<!-- responsive -->
	<!-- <link rel="stylesheet" href="assets/css/responsive.css"> -->

   <style>
      :root{
         --main-color:#4834d4;
         --red:#e74c3c;
         --orange:#f39c12;
         --black:#34495e;
         --white:#fff;
         --light-bg:#f5f5f5;
         --light-color:#999;
         --border:.2rem solid var(--black);
         --box-shadow:0 .5rem 1rem rgba(0,0,0,.1);
         font-size: 62.5%;
      }

      html{
         scroll-behavior: smooth;
         scroll-padding-top: 7rem;
      }

      .inline-btn,
      .inline-option-btn,
      .inline-delete-btn {
         margin-top: 1rem;
         border-radius: 0.5rem;
         cursor: pointer;
         font-size: 1.8rem;
         color: var(--white);
         padding: 1.2rem 3rem;
         text-transform: capitalize;
         text-align: center;
      }

      .inline-btn,
      .inline-option-btn,
      .inline-delete-btn {
         display: inline-block;
         margin-right: 1rem;
      }

      .inline-btn {
         background-color: var(--main-color);
      }

      .inline-delete-btn {
         background-color: var(--red);
      }

      .inline-option-btn {
         background-color: var(--orange);
      }

      .inline-btn:hover,
      .inline-delete-btn:hover,
      .inline-option-btn:hover {
         background-color: var(--black);
      }

      .posts-container .box-container .box .post-admin a:hover {
         color: var(--black);
      }

      .posts-container .box-container .box .post-content::after {
         content: "...";
      }

      .posts-container .box-container .box .icons *:hover {
      color: var(--black);
      }

      .comments-container .add-comment p a:hover {
         text-decoration: underline;
         color: var(--black);
      }

      .comments-container .user-comments-container .show-comments .comment-box {
         border-radius: 0.5rem;
         background-color: var(--light-bg);
         padding: 1.5rem 2rem;
         font-size: 2rem;
         color: var(--black);
         width: 100%;
         white-space: pre-line;
         line-height: 1.5;
         border: var(--border);
      }

      .message {
      /* margin-top: 10%; */
      position: sticky;
      top: 0;
      max-width: 1200px;
      margin: 0 auto;
      background-color: var(--light-bg);
      padding: 2rem;
      display: flex;
      align-items: center;
      gap: 1rem;
      justify-content: space-between;
      }

      .message span {
      font-size: 2rem;
      color: var(--black);
      }

      .message i {
      font-size: 2.5rem;
      color: var(--red);
      cursor: pointer;
      }

      .message i:hover {
      color: var(--black);
      }


      .message-container {
         position: absolute;
         top: 0;
         left: 0;
         width: 100%;
         background-color: var(--light-bg);
         /* padding: 2rem; */
         display: flex;
         align-items: center;
         gap: 1rem;
         justify-content: space-between;
         z-index: 9999; /* Mengatur z-index lebih tinggi untuk menumpuk di atas konten dan navbar */
      }

      .comment-edit-form {
      padding-bottom: 0;
      }

      .comment-edit-form p {
      background-color: var(--black);
      color: var(--white);
      padding: 1.5rem;
      font-size: 2rem;
      border-radius: 0.5rem;
      border-bottom-left-radius: 0;
      border-bottom-right-radius: 0;
      }

      .comment-edit-form form {
      border-bottom-left-radius: 0.5rem;
      border-bottom-right-radius: 0.5rem;
      border: var(--border);
      padding: 2rem;
      background-color: var(--white);
      box-shadow: var(--box-shadow);
      }

      .comment-edit-form form textarea {
      font-size: 2rem;
      color: var(--black);
      line-height: 1.5;
      height: 15rem;
      width: 100%;
      resize: none;
      background-color: var(--light-bg);
      border: var(--border);
      border-radius: 0.5rem;
      padding: 1.5rem;
      margin-bottom: 0.5rem;
      }


   </style>

</head>
<body>
   
<!-- header section starts  -->
	<!-- header -->
	<div class="top-header-area" id="sticker">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-sm-12 text-center">
					<div class="main-menu-wrap">
						<!-- logo -->
						<div class="site-logo">
							<a href="index.html">
								<img src="assets/img/company-logos/logo.png" width="30%" alt="">
							</a>
						</div>
						<!-- logo -->

						<!-- menu start -->
						<nav class="main-menu" style="font-size: 140%;">
							<ul>
								<li class="current-list-item"><a href="index.html">Home</a></li>
								<li><a href="about.html">About</a></li>
								<li><a href="news.php">Blog</a></li>
								<li><a href="shop.html">Product</a></li>
								<li><a href="contact.html">Contact</a></li>
								<li>
									<div class="header-icons">
										<a class="shopping-cart" href="cart.html"><i class="fas fa-shopping-cart"></i></a>
										<a class="mobile-hide search-bar-icon" href="#"><i class="fas fa-search"></i></a>
									</div>
								</li>
							</ul>
						</nav>
						<a class="mobile-show search-bar-icon" href="#"><i class="fas fa-search"></i></a>
						<div class="mobile-menu"></div>
						<!-- menu end -->
					</div>
				</div>
			</div>
		</div>
	</div>

   <div class="message-container">
      <?php
      if (isset($message)) {
         foreach ($message as $message) {
               echo '
               <div class="message">
                  <span>' . $message . '</span>
                  <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
               </div>
               ';
         }
      }
      ?>
   </div>
	<!-- end header -->



<!-- header section ends -->

<?php
   if(isset($_POST['open_edit_box'])){
   $comment_id = $_POST['comment_id'];
   $comment_id = filter_var($comment_id, FILTER_SANITIZE_STRING);
?>
   <section class="comment-edit-form" style="padding: 2rem; margin: 0 auto; max-width: 1200px; margin-top: 7%; border: none; background: none;">
   <p>edit your comment</p>
   <?php
      $select_edit_comment = $conn->prepare("SELECT * FROM `comments` WHERE id = ?");
      $select_edit_comment->execute([$comment_id]);
      $fetch_edit_comment = $select_edit_comment->fetch(PDO::FETCH_ASSOC);
   ?>
   <form action="" method="POST">
      <input type="hidden" name="edit_comment_id" value="<?= $comment_id; ?>">
      <textarea name="comment_edit_box" required cols="30" rows="10" placeholder="please enter your comment"><?= $fetch_edit_comment['comment']; ?></textarea>
      <button type="submit" class="inline-btn" name="edit_comment">edit comment</button>
      <div class="inline-option-btn" onclick="window.location.href = 'view_post.php?post_id=<?= $get_id; ?>';">cancel edit</div>
   </form>
   </section>
<?php
   }
?>


<section class="posts-container" style="padding: 2rem; margin: 0 auto; max-width: 1200px; margin-top: 7%;">

   <div class="box-container" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(33rem, 1fr)); gap: 1.5rem; align-items: flex-start;">

      <?php
         $select_posts = $conn->prepare("SELECT * FROM `posts` WHERE status = ? AND id = ?");
         $select_posts->execute(['active', $get_id]);
         if($select_posts->rowCount() > 0){
            while($fetch_posts = $select_posts->fetch(PDO::FETCH_ASSOC)){
               
            $post_id = $fetch_posts['id'];

            $count_post_comments = $conn->prepare("SELECT * FROM `comments` WHERE post_id = ?");
            $count_post_comments->execute([$post_id]);
            $total_post_comments = $count_post_comments->rowCount(); 

            $count_post_likes = $conn->prepare("SELECT * FROM `likes` WHERE post_id = ?");
            $count_post_likes->execute([$post_id]);
            $total_post_likes = $count_post_likes->rowCount();

            $confirm_likes = $conn->prepare("SELECT * FROM `likes` WHERE user_id = ? AND post_id = ?");
            $confirm_likes->execute([$user_id, $post_id]);
      ?>
      <form class="box" style="border: var(--border); box-shadow: var(--box-shadow); border-radius: 0.5rem; background-color: var(--white); padding: 2rem; overflow: hidden;"
      method="post">
         <input type="hidden" name="post_id" value="<?= $post_id; ?>">
         <input type="hidden" name="admin_id" value="<?= $fetch_posts['admin_id']; ?>">
         <div class="post-admin" style="display: flex; align-items: center; gap: 1.5rem; margin-bottom: 2rem;">
            <i class="fas fa-user" style="text-align: center; height: 4.5rem; width: 5rem; line-height: 4.2rem; font-size: 2rem; border: var(--border); border-radius: 0.5rem; background-color: var(--light-bg); color: var(--black);"></i>
            <div style="font-size: 1.5rem; margin-top: 0.2rem; color: var(--light-color);">
               <a href="author_posts.php?author=<?= $fetch_posts['name']; ?>" style="font-size: 2rem; color: var(--main-color);"><?= $fetch_posts['name']; ?></a>
               <div style="font-size: 1.5rem; margin-top: 0.2rem; color: var(--light-color);"><?= $fetch_posts['date']; ?></div>
            </div>
         </div>
         
         <?php
            if($fetch_posts['image'] != ''){  
         ?>
         <img src="uploaded_img/<?= $fetch_posts['image']; ?>" class="post-image" style="width: 100%; border-radius: 0.5rem; margin-bottom: 2rem;" alt="">
         <?php
         }
         ?>
         <div class="post-title" style="font-size: 2rem; color: var(--black); overflow: hidden; text-overflow: ellipsis; white-space: nowrap; margin-bottom: 1rem;"><?= $fetch_posts['title']; ?></div>
         <div class="post-content" style="font-size: 2rem; line-height: 1.5; padding: 0.5rem 0; color: var(--light-color); white-space: pre-line;"><?= $fetch_posts['content']; ?></div>
         <div class="icons" style="display: flex; align-items: center; justify-content: space-between; gap: 1rem; background-color: var(--light-bg); border-radius: 0.5rem; padding: 1.5rem 2rem; border: var(--border); margin-top: 2rem;">
            <div><i class="fas fa-comment" style="font-size: 2rem; margin-right: 0.5rem; color: var(--light-color);"></i><span style="font-size: 2rem; color: var(--main-color);">(<?= $total_post_comments; ?>)</span></div>
            <button type="submit" name="like_post" style="font-size: 2rem; cursor: pointer; background: none; border: none; color: var(--light-color);">
               <i class="fas fa-heart" style="<?php if($confirm_likes->rowCount() > 0){ echo 'color:var(--red);'; } ?>  "></i>
               <span style="font-size: 2rem; color: var(--main-color);">(<?= $total_post_likes; ?>)</span>
            </button>
         </div>
      
      </form>
      <?php
         }
      }else{
         echo '<p class="empty" style="border: var(--border); border-radius: 0.5rem; background-color: var(--white); padding: 1.5rem; text-align: center; width: 100%; font-size: 2rem; text-transform: capitalize; color: var(--red); box-shadow: var(--box-shadow);"
               >no posts found!</p>';
      }
      ?>
   </div>

</section>

<section class="comments-container" style="padding: 2rem; margin: 0 auto; max-width: 1200px;">

   <p class="comment-title" style="background-color: var(--black); color: var(--white); padding: 1.5rem; font-size: 2rem; border-radius: 0.5rem; border-bottom-left-radius: 0; border-bottom-right-radius: 0;"
      >add comment</p>
   <?php
      if($user_id != ''){  
         $select_admin_id = $conn->prepare("SELECT * FROM `posts` WHERE id = ?");
         $select_admin_id->execute([$get_id]);
         $fetch_admin_id = $select_admin_id->fetch(PDO::FETCH_ASSOC);

         $select_profile = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
         $select_profile->execute([$user_id]);
         if($select_profile->rowCount() > 0){
         $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);}
   ?>
   
   <form action="" method="post" class="add-comment" style="border: var(--border); margin-bottom: 2rem; box-shadow: var(--box-shadow); border-radius: 0.5rem; padding: 2rem; background-color: var(--white); border-top-left-radius: 0; border-top-right-radius: 0;">
      <input type="hidden" name="admin_id" value="<?= $fetch_admin_id['admin_id']; ?>">
      <input type="hidden" name="user_name" value="<?= $fetch_profile['name']; ?>">
      <p class="user" style="font-size: 2rem; color: var(--light-color); margin-bottom: 1rem;">
         <i class="fas fa-user" style="margin-right: 1rem;"></i>
         <a href="update.php" style="color: var(--main-color);"><?= $fetch_profile['name']; ?></a>
      </p>
      <textarea style="width: 100%; border-radius: 0.5rem; background-color: var(--light-bg); padding: 1.5rem 2rem; margin: 1rem 0; border: var(--border); font-size: 2rem; color: var(--black); height: 15rem; resize: none;" name="comment" maxlength="1000" class="comment-box" cols="30" rows="10" placeholder="write your comment" required></textarea>
      <input type="submit" value="add comment" class="inline-btn" name="add_comment" style="margin-top: 1rem; border-radius: 0.5rem; cursor: pointer; font-size: 1.8rem; color: var(--white); padding: 1.2rem 3rem; text-transform: capitalize; text-align: center; display: inline-block; margin-right: 1rem;">
   </form>
   <?php
   }else{
   ?>
   <div class="add-comment" style="border: var(--border); margin-bottom: 2rem; box-shadow: var(--box-shadow); border-radius: 0.5rem; padding: 2rem; background-color: var(--white); border-top-left-radius: 0; border-top-right-radius: 0;">
      <p style="font-size: 2rem; color: var(--light-color); margin-bottom: 1rem;">please login to add or edit your comment</p>
      <a href="login.php" class="inline-btn">login now</a>
   </div>
   <?php
      }
   ?>
   
   <p class="comment-title" style="background-color: var(--black); color: var(--white); padding: 1.5rem; font-size: 2rem; border-radius: 0.5rem; border-bottom-left-radius: 0; border-bottom-right-radius: 0;"
   >post comments</p>
   <div class="user-comments-container" style="display: grid; gap: 2.5rem; border: var(--border); box-shadow: var(--box-shadow); border-radius: 0.5rem; padding: 2rem; background-color: var(--white); border-top-left-radius: 0; border-top-right-radius: 0;">
      <?php
         $select_comments = $conn->prepare("SELECT * FROM `comments` WHERE post_id = ?");
         $select_comments->execute([$get_id]);
         if($select_comments->rowCount() > 0){
            while($fetch_comments = $select_comments->fetch(PDO::FETCH_ASSOC)){
      ?>
      <div class="show-comments" style="<?php if($fetch_comments['user_id'] == $user_id){echo 'order:-1;'; } ?>">
         <div class="comment-user" style="display: flex; align-items: center; gap: 1rem; margin-bottom: 1.5rem;">
            <i class="fas fa-user" style="text-align: center; height: 5rem; width: 5rem; line-height: 4.7rem; font-size: 2rem; border: var(--border); border-radius: 0.5rem; background-color: var(--light-bg); color: var(--black);"></i>
            <div style="font-size: 1.5rem; margin-top: 0.2rem; color: var(--light-color);">
               <span style="font-size: 2rem; color: var(--main-color);"><?= $fetch_comments['user_name']; ?></span>
               <div style="font-size: 1.5rem; margin-top: 0.2rem; color: var(--light-color);"><?= $fetch_comments['date']; ?></div>
            </div>
         </div>
         <div class="comment-box" style="<?php if($fetch_comments['user_id'] == $user_id){echo 'color:var(--white); background:var(--black);'; } ?>"><?= $fetch_comments['comment']; ?></div>
         <?php
            if($fetch_comments['user_id'] == $user_id){  
         ?>
         <form action="" method="POST">
            <input type="hidden" name="comment_id" value="<?= $fetch_comments['id']; ?>">
            <button type="submit" class="inline-option-btn" name="open_edit_box" >edit comment</button>
            <button type="submit" class="inline-delete-btn" name="delete_comment" onclick="return confirm('delete this comment?');">delete comment</button>
         </form>
         <?php
         }
         ?>
      </div>
      <?php
            }
         }else{
            echo '<p class="empty" style="border: var(--border); border-radius: 0.5rem; background-color: var(--white); padding: 1.5rem; text-align: center; width: 100%; font-size: 2rem; text-transform: capitalize; color: var(--red); box-shadow: var(--box-shadow);">no comments added yet!</p>';
         }
      ?>
   </div>

</section>



   <!-- custom js file link  -->
   <script src="js/script.js"></script>
	<!-- main js -->
	<script src="assets/js/main.js"></script>
	<!-- jquery -->
	<script src="assets/js/jquery-1.11.3.min.js"></script>
	<!-- bootstrap -->
	<!-- <script src="assets/bootstrap/js/bootstrap.min.js"></script> -->
	<!-- count down -->
	<!-- <script src="assets/js/jquery.countdown.js"></script> -->
	<!-- isotope -->
	<script src="assets/js/jquery.isotope-3.0.6.min.js"></script>
	<!-- waypoints -->
	<!-- <script src="assets/js/waypoints.js"></script> -->
	<!-- owl carousel -->
	<script src="assets/js/owl.carousel.min.js"></script>
	<!-- magnific popup -->
	<script src="assets/js/jquery.magnific-popup.min.js"></script>
	<!-- mean menu -->
	<script src="assets/js/jquery.meanmenu.min.js"></script>
	<!-- sticker js -->
	<script src="assets/js/sticker.js"></script>
	<!-- main js -->
	<script src="assets/js/main.js"></script>


</body>
</html>