<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

include 'components/like_post.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">

	<!-- title -->
	<title>Blog Sutra Studio Cipondok</title>

	<!-- favicon -->
	<link rel="shortcut icon" type="image/png" href="assets/img/company-logos/logo.png">
	<!-- google font -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
	<!-- font awesome cdn link  -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
	<!-- fontawesome -->
	<link rel="stylesheet" href="assets/css/all.min.css">
	<!-- bootstrap -->
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
	<!-- owl carousel -->
	<link rel="stylesheet" href="assets/css/owl.carousel.css">
	<!-- magnific popup -->
	<link rel="stylesheet" href="assets/css/magnific-popup.css">
	<!-- animate css -->
	<link rel="stylesheet" href="assets/css/animate.css">
	<!-- mean menu css -->
	<link rel="stylesheet" href="assets/css/meanmenu.min.css">
	<!-- main style -->
	<link rel="stylesheet" href="assets/css/main.css">
	<!-- responsive -->
	<link rel="stylesheet" href="assets/css/responsive.css">

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

	.posts-containerr .box-container .boxx .post-admin a:hover {color: var(--black);}
	.posts-containerr .box-container .boxx .post-content::after { content: "...";}
	.posts-containerr .box-container .boxx .post-cat {color: var(--main-color);}
	.posts-containerr .box-container .boxx .post-cat:hover {color: var(--black);}
	.posts-containerr .box-container .boxx .iconss i {
	margin-right: 0.5rem;
	font-size: 2rem;
	color: var(--light-color);
	}
	.posts-containerr .box-container .boxx .iconss *:hover {color: var(--black);}

	.posts-containerr .box-container {
	display: grid;
	grid-template-columns: repeat(auto-fit, minmax(33rem, 1fr));
	gap: 1.5rem;
	align-items: flex-start;
	justify-content: center;
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

/* .inline-btnn {
  margin-top: 1rem;
  border-radius: 0.5rem;
  cursor: pointer;
  font-size: 1.8rem;
  color: #fff;
  padding: 0.8rem 1.5rem;
  text-transform: capitalize;
  text-align: center;
}

.inline-btnn {
  display: inline-block;
  margin-right: 1rem;
}

.inline-btnn {
  background-color: var(--main-color);
} */

.inline-btn:hover {
  background-color: #34495e;
}

	@media (max-width: 991px) {
	html {
		font-size: 55%;
	}
	}

	@media (max-width: 768px) {
	body {
		padding-bottom: 10rem;
	}
	}

	@media (max-width: 450px) {
	html {
		font-size: 50%;
	}

	.headingg {
		font-size: 3rem;
	}
	}
	</style>

</head>
<body>

	<!--PreLoader-->
    <div class="loader">
        <div class="loader-inner">
            <div class="circle"></div>
        </div>
    </div>
    <!--PreLoader Ends-->
	
	<!-- header -->
	<div class="top-header-area" id="sticker">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-sm-12">
					<div class="main-menu-wrap">
						<!-- logo -->
						<div class="site-logo">
							<a href="index.html">
								<img src="assets/img/company-logos/logo.png" width="30%" alt="">
							</a>
						</div>
						<!-- logo -->

						<!-- menu start -->
						<nav class="main-menu text-center" style="font-size: 140%;">
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
			// Setelah menampilkan pesan, hapus pesan dari sesi
			unset($_SESSION['message']);
		}
		?>
	</div>
	<!-- end header -->

	<!-- search area -->
	<div class="search-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<span class="close-btn"><i class="fas fa-window-close"></i></span>
					<div class="search-bar">
						<div class="search-bar-tablecell">
							<h3>Search For:</h3>
							<input type="text" placeholder="Keywords">
							<button type="submit">Search <i class="fas fa-search"></i></button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end search arewa -->
	
	<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p style="font-size: 140%">Sutra Studio Cipondok</p>
						<h1>Blogs Update</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- latest news -->
	<section class="posts-containerr" style="padding:2rem; margin: 0 auto; max-width: 1200px; box-sizing: border-box;" >
			<div class="box-container">

				<?php
					$select_posts = $conn->prepare("SELECT * FROM `posts` WHERE status = ? LIMIT 6 ");
					$select_posts->execute(['active']);
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
				<form class="boxx" 
						style="border: var(--border); box-shadow: var(--box-shadow); border-radius: 0.5rem; background-color: var(--white); padding: 2rem; overflow: hidden;" 
						method="post">
					<input type="hidden" name="post_id" value="<?= $post_id; ?>">
					<input type="hidden" name="admin_id" value="<?= $fetch_posts['admin_id']; ?>">
					<div class="post-admin" style="font-size: 62.5%; display: flex; align-items: center; gap: 1.5rem; margin-bottom: 2rem;">
						<i class="fas fa-user" style="  text-align: center; height: 4.5rem; width: 5rem; line-height: 4.2rem; font-size: 2rem; border: var(--border); border-radius: 0.5rem; background-color: var(--light-bg); color: var(--black);"></i>
						<div style="font-size: 1.5rem; margin-top: 0.2rem; color: var(--light-color);">
						<a href="author_posts.php?author=<?= $fetch_posts['name']; ?>" style="font-size: 2rem; color: var(--main-color);" ><?= $fetch_posts['name']; ?></a>
						<div style="font-size: 1.5rem; margin-top: 0.2rem; color: var(--light-color);">
						<?= $fetch_posts['date']; ?></div>
						</div>
					</div>
					
					<?php
						if($fetch_posts['image'] != ''){  
					?>
					<div class="post-image-container">
						<img src="uploaded_img/<?= $fetch_posts['image']; ?>" class="post-image" style="width: 300px; height: 300px; border-radius: 0.5rem; margin-bottom: 2rem; object-fit: cover" alt="">
					</div>
					<?php
					}
					?>
					<div class="post-title" style="  font-size: 2rem; color: var(--black); overflow: hidden; text-overflow: ellipsis; white-space: nowrap; margin-bottom: 1rem;" ><?= $fetch_posts['title']; ?></div>
					<div class="post-content content-150" style="  font-size: 2rem; line-height: 1.5; padding: 0.5rem 0; color: var(--light-color); white-space: pre-line;" >
						<?php
						$post_content = $fetch_posts['content']; // Ambil konten dari database
						// Batasi konten hanya hingga 100 karakter
						$limited_content = substr($post_content, 0, 50);
						// Cek apakah konten asli lebih panjang dari 100 karakter
						if (strlen($post_content) > 100) {
							$limited_content .= '...'; // Tambahkan tanda elipsis jika kontennya dipotong
						}
						echo $limited_content; // Tampilkan konten yang telah dibatasi
						?>
					</div>
					<a href="view_post.php?post_id=<?= $post_id; ?>" class="inline-btnn" style="margin-top: 1rem; border-radius: 0.5rem; cursor: pointer; font-size: 1.8rem; color: #fff; padding: 0.8rem 1.5rem; text-transform: capitalize; text-align: center;display: inline-block; margin-right: 1rem; background-color: var(--main-color);" onmouseover="this.style.backgroundColor='var(--black)'" onmouseout="this.style.backgroundColor='var(--main-color)'">
					read more</a>
					<a href="category.php?category=<?= $fetch_posts['category']; ?>" class="post-cat" style="  display: block; margin-top: 2rem; font-size: 1.7rem;" style="margin-right: 0.5rem; color: var(--light-color);" > <i class="fas fa-tag" style="color: #999999;"></i> <span><?= $fetch_posts['category']; ?></span></a>
					<div class="iconss" style="display: flex; align-items: center; justify-content: space-between; gap: 1rem; background-color: var(--light-bg); border-radius: 0.5rem; padding: 1.5rem 2rem; border: var(--border); margin-top: 2rem;" >
						<a href="view_post.php?post_id=<?= $post_id; ?>"><i class="fas fa-comment"></i><span style="font-size: 2rem; color: var(--main-color);" >(<?= $total_post_comments; ?>)</span></a>
						<button type="submit" name="like_post" style="font-size: 2rem; color: var(--main-color); cursor: pointer; background: none; border: none;" ><i class="fas fa-heart" style="<?php if($confirm_likes->rowCount() > 0){ echo 'color:var(--red);'; } ?>  "></i><span>(<?= $total_post_likes; ?>)</span></button>
					</div>
				
				</form>
				<?php
					}
				}else{
					echo '<p class="emptyy">no posts added yet!</p>';
				}
				?>
			</div>

		<div class="row">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 text-center">
						<div class="pagination-wrap">
							<ul>
								<li><a href="#">Prev</a></li>
								<li><a href="#">1</a></li>
								<li><a class="active" href="#">2</a></li>
								<li><a href="#">3</a></li>
								<li><a href="#">Next</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- end latest news -->

	<!-- logo carousel -->
	<div class="logo-carousel-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="logo-carousel-inner">
						<div class="single-logo-item">
							<img src="assets/img/company-logos/1.png" alt="">
						</div>
						<div class="single-logo-item">
							<img src="assets/img/company-logos/2.png" alt="">
						</div>
						<div class="single-logo-item">
							<img src="assets/img/company-logos/3.png" alt="">
						</div>
						<div class="single-logo-item">
							<img src="assets/img/company-logos/4.png" alt="">
						</div>
						<div class="single-logo-item">
							<img src="assets/img/company-logos/5.png" alt="">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end logo carousel -->

	<!-- footer -->
	<div class="footer-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6">
					<div class="footer-box about-widget">
						<h2 class="widget-title" style="padding-top: 5%;">Tentang Kami</h2>
						<p class="widget-title">Sebuah website yang didirikan oleh kelompok Mahasiswa UPI Tasikmalaya dalam rangka membantu transformasi ekonomi masyarakat Desa Cipondok</p>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="footer-box get-in-touch">
						<h2 class="widget-title" style="padding-top: 5%;">Alamat</h2>
						<ul class="widget-title">
							<li>Jl. Karanganyar 2, Ds. Cipondok, Kec. Sukaresik, Tasikmalaya, Jawa Barat<br>46159</li>
							<li>sutrastudiocipondok@gmail.com</li>
							<li>0895-190-7523</li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="footer-box pages">
						<h2 class="widget-title" style="padding-top: 5%;">Halaman</h2>
						<ul class="widget-title">
							<li><a href="index.html">Home</a></li>
							<li><a href="about.html">About</a></li>
							<li><a href="news.php">Blog</a></li>
							<li><a href="shop.html">Product</a></li>
							<li><a href="contact.html">Contact</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="footer-box subscribe">
						<h2 class="widget-title" style="padding-top: 5%;">Ikuti Kami</h2>
						<p></p>
						<form action="index.html" class="widget-title"><p class="widget-title">Mari ikuti kami untuk menjadi yang pertama menerima informasi terbaru seputar Sutra Studio Cipondok</p>
							<input class="widget-title" type="email" placeholder="Masukan Email">
							<button type="submit"><i class="fas fa-paper-plane"></i></button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end footer -->
	
	<!-- copyright -->
	<div class="copyright">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-12">
					<p>Copyrights &copy; 2023 - Sutra Studio Cipondok</a>,  All Rights Reserved.</p>
				</div>
				<div class="col-lg-6 text-right col-md-12">
					<div class="social-icons">
						<ul>
							<li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
							<li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
							<li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
							<li><a href="#" target="_blank"><i class="fab fa-linkedin"></i></a></li>
							<li><a href="#" target="_blank"><i class="fab fa-dribbble"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end copyright -->
	
	<!-- jquery -->
	<script src="assets/js/jquery-1.11.3.min.js"></script>
	<!-- bootstrap -->
	<script src="assets/bootstrap/js/bootstrap.min.js"></script>
	<!-- count down -->
	<script src="assets/js/jquery.countdown.js"></script>
	<!-- isotope -->
	<script src="assets/js/jquery.isotope-3.0.6.min.js"></script>
	<!-- waypoints -->
	<script src="assets/js/waypoints.js"></script>
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