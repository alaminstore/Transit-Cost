<?php
  include 'inc/header.php';
  include 'inc/menu.php';
  include 'lib/User.php';
  Session::checkSession();
?>

<?php
      if (isset($_GET['id'])) {
         $userid = (int)$_GET['id'];
         $sesid = Session::get("id");
         if ($userid != $sesid) {  //if id isn't math with Session / logedin id then change to order page
             header("Location: index.php");
         }
      }
      $user = new User();

      if ($_SERVER['REQUEST_METHOD'] == 'POST'  && isset($_POST['updatepass'])){
             $updatepasss = $user->updatePassword($userid , $_POST);
      }
?>



<div class="changepassword">
  <div class="container">
     <div class=" panel panel-default">
      <div class="panel-heading">
        <h3>Change Password <span class="pull-right"> <a class="btn3 btn-primary" href="profile.php?id=<?php echo $userid; ?>">Back To Profile</a></span></h3>
      </div>
      <div class="panal-body">
         <div style="max-width:600px;margin:30px auto;">
  

  <?php
    if (isset($updatepasss)) {
        echo $updatepasss;
    }
  ?>

           <form action="" method="POST">
              <div class="form-group">
                  <label for="old_pass">Old Password</label>
                  <input type="password" name="old_pass" placeholder="Old Password" id="old_pass" class="form-control">
              </div>

              <div class="form-group">
                  <label for="password">New Password</label>
                  <input type="password" name="password" placeholder="New Password" id="new_pass" class="form-control">
              </div>
              <button type="submit"  name="updatepass" class="btn btn-success">
              <i class="fa fa-angle-double-right" aria-hidden="true"></i> Update Password</button>

           </form>
         </div>
      </div>
     </div>
 </div>
</div>

<?php
  include 'inc/footermenu.php';
  include 'inc/footer.php';
?>