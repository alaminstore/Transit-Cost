<?php
 $page = 'home';
 include 'inc/header.php';
 include 'inc/menu.php';
 include 'lib/User.php';
 Session::checkLogin();
   $user = new User();
?>


    <!--================ Start Home Banner Area =================-->
    <section class="home_banner_area">
		<div class="banner_inner">
			<div class="container">
				<div class="row">
					<div class="col-lg-8 col-md-8">
						<div class="banner_content">
							<h4>Hey There !</h4>
							<h1 class="text-uppercase">It's the way to reduce your transit cost</h1>
							<h5 class="text-uppercase">For a better transit, stay & share</h5>
							<a class="primary_btn" href="terms.php"><button type="button" class="btn btn-outline-success">To Know Details</button></a> &nbsp;
							<a class="primary_btn" href="login.php"><button type="button" class="btn btn-outline-success">Login</button></a>
						</div>
					</div>
					<div class="col-lg-4 col-md-4">
						
					</div>
				</div>
			</div>
		</div>
	</section>
    <!--================ End Home Banner Area =================-->

<?php
 include 'inc/footer.php';
?>
