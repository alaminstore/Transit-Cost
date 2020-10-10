<?php
 include 'lib/User.php';
 include 'inc/header.php';
 Session::checkSession();
?>
<?php
$companyname = Session::get("cname");
$usrid = Session::get("id");
$usernumber = Session::get("phone");
?>
<?php

if (isset($_GET['id2'])) {
  $id2 = $_GET['id2'];  
} 
?>                   
                   


                      <?php
                        $db = new Database();
                        $query = "Select * from usertable WHERE id = $id2 LIMIT 1 ";
                        $post = $db->select($query);
                        if ($post) {
                        foreach($post as $valuedata){?>
<br><br>
                            <div class="companyinfo">
                                <div class="container text-center card border-info">
                                    <div class="col-md-12 col-lg-12"><br>
                                        <h4 class="text-center">==Company Details==</h4><br>
                                        <h6><strong>Company Name:</strong> <?php echo $valuedata['cname'];?></h6>
                                    <h6><strong><?php echo $valuedata['position'];?> of the company : </strong><?php echo $valuedata['username'];?> ( <?php echo $valuedata['gender'];?> )</h6>
                                    <h6><STRONG>Contact:</STRONG> <a href="tel:0<?php echo $valuedata['phone'];?>">0<?php echo $valuedata['phone'];?></a></h6>
                                    <h6><strong>Email:</strong> <?php echo $valuedata['email'];?></h6>
                                    <h6><strong>Address:</strong> <?php echo $valuedata['address'];?></h6>
                                    <h6><strong>Second Address:</strong> <?php echo $valuedata['address2'];?></h6>
                                    <h6><strong>City:</strong> <?php echo $valuedata['city'];?></h6>
                                    <h6><strong>Zipcode:</strong> <?php echo $valuedata['zipcode'];?></h6>


                                    </div>
                                </div>
                            </div>
                      <?php ?>

                      <?php }
                           }else{?>
                           
                        <?php }
                     ?>
                       


                     


<?php
include 'inc/footermenu.php';
include 'inc/footer.php';
?>