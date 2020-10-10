<?php
    include "lib/User.php";
    Session::checkLogin();
    include 'inc/header.php';
?>
<?php
   $user = new User();
   if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['loginfirst'])) {
        $userLogin = $user->userLogin($_POST); //pass all resistration form's data in this method  and then implement this in User class.
   }
?>

<link rel="stylesheet" href="assets/css/login.css">

<div class="login_cover">
    <div class="heading_text">
      <div class="container">
          <div class="row">
              <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 text-center">
                 <div class="write">
                     <h3>Login with providing account</h3>
                 </div>
                  
              </div>
          </div>
      </div>
  </div>
   <div class="container">
        <div class="card card-container wow fadeIn delay-2s">
            <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
            <img id="profile-img" class="profile-img-card" src="assets/img/user.png" />
            <p id="profile-name" class="profile-name-card"></p>

            <?php
              if (isset($userLogin)) {
                  echo $userLogin;
              }
            ?>
            <form class="form-signin" action="" method="POST">
                <span id="reauth-email" class="reauth-email"></span>
                <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" >
                <input type="password"  name="pass" id="inputPassword" class="form-control" placeholder="Password" >
                <div id="remember" class="checkbox">
                    <label>
                        <input type="checkbox" value="remember-me"> Remember me
                    </label>
                </div>
                <!-- <a class="btn btn-lg btn-primary btn-block btn-signin link" href="condicionbox.html">Login </a> -->
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit" name="loginfirst">Login</button> 
            </form>
            <!-- /form -->
            <a href="terms.php" class="forgot-password">
                Don't have any account?
            </a>
        </div><!-- /card-container -->
    </div><!-- /container -->
  
</div>
  
  
<?php include 'inc/footer.php'; ?>