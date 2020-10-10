
<?php
   if(isset($_GET['action']) && $_GET['action'] == "logout"){
       Session::destroy();
   }
?>

    <header class="header"><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <a href="" class="logo">
                        <img class="img-responsive" style="height:62px;width:auto;" src="assets/img/logo.png" alt="logo">
                    </a>
                    <input class="menu-btn" type="checkbox" id="menu-btn" />
                    <label class="menu-icon" for="menu-btn"><span class="navicon"></span></label>
                    <ul class="menu">
                        
                        <li class="<?php if($page=='contact'){echo 'active';}?>"><a href="contact.php">Contact</a></li>
                        <li class="<?php if($page=='whyus'){echo 'active';}?>"><a href="whyus.php">Why Us</a></li>
                        <?php
                            $loginusr = Session::get("login");
                            if($loginusr == false){ ?>  
                        <li><a class="<?php if($page=='home'){echo 'active';}?>" href="index.php">Home</a></li>                      
                    <?php }else{ ?>
                        <li class="<?php if($page=='provider'){echo 'active';}?>"><a href="post.php">Providers</a></li>
                        <li class="<?php if($page=='profile'){echo 'active';}?>"><a href="profile.php?id=<?php echo $sesid; ?>">Profile</a></li>
                        <li><a href="?action=logout">Logout</a></li>
                    <?php } ?>
                   <?php
                        if ($sesid == 1087) { ?>
                        <li class="<?php if($page=='admin'){echo 'active';}?>"><a href="admin.php">Admin</a></li>
                    <?php  } ?>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <div class="clr"></div>
    <!--Header part End-->


