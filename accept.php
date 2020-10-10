<?php
 include 'lib/User.php';
 include 'inc/header.php';
 include 'inc/menu.php';

 Session::checkSession();
 $user = new User();
?>


<?php
 $sesid = Session::get("id");
 if ($sesid!=1087) {
    header("location:404.php");
 }else{?>
  



<?php
   if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['setpass'])) {
        $usrpass = $user->Passwordset($_POST); 
   }
?>

<?php
   if(isset($_GET['id'])){   //Get the sent id.
       $userid = (int)$_GET['id'];
       //echo $userid;

   }
?>



<?php
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['confirmdelete'])){
 $query = "DELETE FROM reg WHERE id = '$userid' ";
 $deleteData = $user->deletevalue($query);
}
?> 
    
    <div class="reg">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="innerreg">


<?php
      if (isset($usrpass)){
          echo $usrpass;
      }
?>
     



<?php
     $userdata = $user->GetUserById($userid);
     if($userdata){
?>
                    <form class="" method="POST">
                        <div class="form-row ">

                       <div class="form-group mx-sm-3 mb-2">               
                        <input type="password" class="form-control" id="inputPassword2" name="pass" placeholder="Password">
                      </div>
                     <div class="form-group mx-sm-3 mb-2">             
                        <input type="password" class="form-control" id="inputPassword2" name="repass" placeholder="Repeat-Password">
                     </div>
                
                           
                        <button   type="submit"  name="setpass" id="conf" class=" new btn btn-primary mb-2">
                         Create Password <i class="fa fa-long-arrow-right" aria-hidden="true"></i></button></a> 
                        
                          &nbsp;
                          


                             <button  type="submit"  name="confirmdelete" class="show btn btn-danger mb-2">
                             <span class="spinner-grow spinner-grow-sm"></span> Confirm</button>


                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Company Name</label>
                                <input type="text" class="form-control" id="inputEmail4"  name="cname" readonly="" 
                                value="<?php echo $userdata->cname;?>">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Your Name</label>
                                <input type="text" class="form-control" id="inputEmail4" name="username" readonly=""
                                value="<?php echo $userdata->username;?>">
                            </div>
                            
                            <div class="form-group col-md-6">
                                <label for="inputgender">Gender</label>
                                <input type="text" class="form-control" id="gender" name="gender" readonly=""
                                value="<?php echo $userdata->gender;?>">
                                 
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Your Position</label>
                                <input type="text" class="form-control" id="inputEmail4" name="position" readonly="" value="<?php echo $userdata->position;?>">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Email</label>
                                <input type="email" class="form-control" id="inputEmail4"  name="email" readonly=""
                                value="<?php echo $userdata->email;?>">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Contact no</label>
                                <input type="email" class="form-control" id="inputEmail4" name="phone" readonly=""
                                value="0<?php echo $userdata->phone;?>">
                            </div>
                            
                        </div>
                        <div class="  form-group">
                            <label for="inputAddress">Address</label>
                            <input type="text" class="form-control" id="inputAddress"  name="address" readonly=""
                            value="<?php echo $userdata->address;?>">
                        </div>
                        <div class="form-group">
                            <label for="inputAddress2">Address 2</label>
                            <input type="text" class="form-control" id="inputAddress2" name="address2"  readonly=""value="<?php echo $userdata->address;?>">
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputCity">City</label>
                                <input type="text" class="form-control" id="inputCity" name="city"  readonly=""
                                value="<?php echo $userdata->city;?>">
                            </div>

                            <div class="form-group col-md-4">
                                <label for="inputstate">Vehicle Name</label>
                                <input type="text" class="form-control" id="state" name="vehicle" readonly=""
                                value="<?php echo $userdata->vehicle;?>">        
                            </div>
                            <div class="form-group col-md-2">
                                <label for="inputZip">Zip Code</label>
                                <input type="text" class="form-control" name="zipcode" id="inputZip"  readonly=""
                                value="<?php echo $userdata->zipcode;?>">
                            </div>
                        </div>
                    </form>
<?php } ?>
                    </div>

                </div>
            </div>
        </div>
    </div>






<?php }
 ?>



<?php 
 include 'inc/footermenu.php';
 include 'inc/footer.php';
?>