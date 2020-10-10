<?php
 include 'lib/User.php';
 include 'inc/header.php';
 Session::checkSession();
$companyname = Session::get("cname");
$usrid = Session::get("id");
$usernumber = Session::get("phone");
?>
<style>

@media only screen and (min-width: 768px) {
  form {
    margin: 0;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translateX(-50%) translateY(-50%);
 }
}
</style>



<?php

if (isset($_GET['id2'])) {
  $id2 = $_GET['id2'];  
}
?>



<?php
$user = new User();
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['notification'])) {
$userNotification = $user->userNotification($_POST); //pass all resistration form's data in this method  and then implement this in User class.
}
?>
<br>
<div class="container">
  <div class="form_style">
<?php
  if (isset($userNotification)){
      echo $userNotification;
  }
?>

 

<div class="clr"></div>
    <form action="" method="POST">

  <div class="msgg">
     <div class=" text-center" style="background: #6c757d; color:#fff;" > 
       <h4>After confirmation, provider will call you..</h4>
     </div>
   </div>

 <br>


    <div class="form-row">
      <div class="form-group col-sm-12 col-md-6">
        <label for="cname">Company Name</label>
        <input type="text" class="form-control" name="cname"  value="<?php echo $companyname;?>">
      </div>
      <div class="form-group col-sm-12 col-md-6">
        <label for="phone">Phone Number</label>
        <input type="text" class="form-control"  name="phone" placeholder="Active phone number">
      </div>

      <div class="form-group col-sm-12 col-md-6">
        <label for="goods">Goods</label>
        <input type="text" class="form-control" name="goods" placeholder="Name of Goods">
      </div>
      <div class="form-group col-sm-12 col-md-6">
        <label for="weight">Weight</label>
        <input type="text" class="form-control" name="weight" placeholder="Weights of goods">
      </div>
      <div class="form-group col-sm-12 col-md-6" style="display:none ;">
        <label for="get_ntf_id">get_ntf</label>
        <input type="text" class="form-control" name="get_ntf_id" value="<?php echo $id2; ?>">
      </div>
      <div class="form-group col-sm-12 col-md-6" style="display:none;">
        <label for="send_ntf_id">send_ntf</label>
        <input type="text" class="form-control" name="send_ntf_id" value="<?php echo $usrid; ?>">
      </div>
    </div>
    
   <div class="text-center">
     <button type="submit" name="notification" class="btn btn-info"> <span class="spinner-grow spinner-grow-sm" 
     role="status" aria-hidden="true"></span> Confirm</button>
   </div>
    
  </form>
  </div>
</div>




<?php
  include 'inc/footer.php';
?>