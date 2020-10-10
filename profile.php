<?php
    $page = 'profile';
	include 'lib/User.php';
	include 'inc/header.php';
	include 'inc/menu.php';
	Session::checkSession();
	$usrid = Session::get("id");
?>

<?php
	if(isset($_GET['id'])){   //Get the arrive id.
	       $userid = (int)$_GET['id'];
	}

    $user = new User();
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {
         $updateusr = $user->UpdateUserData($userid , $_POST); 
     }

    $sesid = Session::get("id");
         if ($userid != $sesid) {  //if id isn't math with Session / logedin id then change to order page
             header("Location:profile.php?id=$sesid");
    }

?>

<br>
<div class="showUpdate">
  <div class="container">
      <?php
        if (isset($updateusr)) {
            echo $updateusr;
        }
      ?>
  </div>
</div>


<!-- getNotificationData -->
<div class="profile">
	<div class="container">
		<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3><i class="fa fa-leaf "></i> User Profile 
	                <div class="btn-group pull-right">
						<div class="container">
							<button type="button" class="btn btn3-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<i class="fa fa-bell" aria-hidden="true"></i>
							</button>
							<div class="dropdown-menu">

		             
                    <?php
		                $db = new Database();
		                $qry = "Select * from notification where get_ntf_id = $usrid ORDER BY id DESC ";
		                $ntf = $db->select($qry);
		                if ($ntf) {
		                foreach($ntf as $ntf_data){
		            ?>
                    <li class="dropdown-item" style="color: #734040" href="#"> <?php echo $ntf_data['cname'];?> have &nbsp;
					<span style="color: #FF0000;"><?php echo $ntf_data['weight'];?></span>&nbsp; <span style="font-weight: bold;"><?php echo $ntf_data['goods'];?></span> and wants to hire your vehicle
					<br> phone number: <span style="font-weight: bold;color:#808000"><a href="tel:0<?php echo $ntf_data['phone'];?>">0<?php echo $ntf_data['phone'];?></a>  </span></li>
					 <div class="dropdown-divider"></div>				
                    <?php } } else echo 'no notification yet.' ?>
     

							</div>
						</div>
					</div>
				</h3>
                

				</div>

				<div class="clr"></div>
				<div class="panal-body">
					
					
 					<div style="max-width:600px;margin:30px auto;">
                        <?php
                            $userdata = $user->GetUserById2($userid);
                             if($userdata){?>					
						<form action="" method="POST">
							<div class="form-group">
								<label for="name">Company Name</label>
								<input type="text" name="cname" id="name" class="form-control" value="<?php echo $userdata->cname;?>">
							</div>
							<div class="form-group">
								<label for="username">Your Name</label>
				                <input type="text" name="username" id="username" class="form-control" value="<?php echo $userdata->username;?>">
							</div>
							<div class="form-group">
								<label for="email">Email Address</label>
								<input type="text" name="email" id="email" class="form-control" value="<?php echo $userdata->email;?>">
							</div>
							
                            <?php
                               $checkId = Session::get("id"); //get this id from userLogin() to catch the correct loggedin user.
                               if($userid == $checkId){?>

                                <button type="submit"  id="one" name="update" class="btn3 btn-success">Update</button>
                                <a class="btn3 btn-info"  id="two" href="changepass.php?id=<?php echo $userid; ?>">Change Password</a>
                              <?php } ?>
						</form>
<?php } ?>
					</div>
				</div>
			</div>
		</div>
		</div>
	</div>


<?php
    include 'inc/footermenu.php';
	include 'inc/footer.php';
?>
