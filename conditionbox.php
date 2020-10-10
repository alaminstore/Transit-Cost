 <?php
 include 'lib/User.php';
 Session::checkSession();
 include 'inc/header.php';
?>

    <div class="condition">
        <div class="container">
            <div class="col-md-12">
        <?php
         $loginmsg = Session::get("loginmsg");
         if(isset($loginmsg)){
             echo $loginmsg;
         }   
         Session::set("loginmsg" , NULL);   //After one refresh auto hide..
         ?>
                <div class="card-deck">
                    <div class="card-header bg-secondary"></div>

                    <div class="card  border-info">
                        <div class="card-body text-center">
                            <p class="card-text">Access as a Provider</p>
                            <a href="provider.php" class="btn btn-outline-info">Provider</a>
                        </div>
                    </div>

                    <div class="card-header  bg-secondary"></div>
                    <div class="card  border-info">
                        <div class="card-body text-center">
                            <p class="card-text">Access as a Customer</p>
                            <a href="post.php" class="btn btn-outline-info">Customer</a>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

<?php include 'inc/footer.php'; ?>

