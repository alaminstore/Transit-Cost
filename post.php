<?php
include 'lib/User.php';
//Session::checkSession();
$page = 'provider';
include 'inc/header.php';
include 'inc/menu.php';

?>
<?php
$companyname = Session::get("cname");
$usrid = Session::get("id");
$usernumber = Session::get("phone");
?>



<div class="job_first">
<div class="container">
    <div class="search_job">
        <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 col-xl-12">
            <h2 class="text-center"><i class="fa fa-search" aria-hidden="true"></i> Transit Cost Post Area</h2>
            <div class="search_form text-center">
                <form action="search.php" method="get">
                    <input type="text"  class="input_size" name="search" placeholder="One area" required />
                    <input type="text" class="input_size" name="search2" placeholder="Another area" />
                    <input type="submit" class="submit_size" name="submit" value="Search">
                </form>
            </div>
        </div>
    </div>
</div>
</div>


<!-- pagination -->

<?php
    $per_page = 4;
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
        echo $page;
    }else{
        $page=1;
    }
    $start_form = ($page-1) * $per_page;
?>


<?php
if (isset($_GET['id2'])) {
$id2 = $_GET['id2'];
echo $id2;
}
?>
<!-- pagination -->
<!--
====================================
Post Advertise
====================================
-->
<div class="container">
<div class="col-md-12">
    <div class="full_block">
        <div class="gap">
            <?php
                $db = new Database();
                $query = "SELECT * FROM service ORDER BY id DESC  limit $start_form, $per_page";
                $post = $db->select($query);
                if ($post) {
                foreach($post as $valuedata){
            ?>
            <div class="per_post">
                <div class="card bg-light text-dark " style="max-width:100%;">
                    <div class="card-header text-center">
                        <h4> <?php echo $valuedata['area'];?> &nbsp; <i class="fa fa-long-arrow-right" aria-hidden="true"></i> &nbsp; <?php echo $valuedata['reach'];?></h4>
                        <a href="tel:01725697728"><h5> <i class="fa fa-phone-square" aria-hidden="true"></i> &nbsp;
                        0<?php echo $valuedata['phone'];?></h5></a>
                    </div>
                    <div class="post_content">
                        <h5 class="text-center">Company Name:
                            <a href="providerdetails.php?id2=<?php echo $valuedata['ntf_id'];?> "><?php echo $valuedata['comname'];?></a></h5>
                            <h6 class="text-center">Truck capacity: <span class="text-primary"><?php echo $valuedata['truckcapa'];?></span></h6>
                            <h6 class="text-center">Already Fillup: <span class="text-muted"><?php echo $valuedata['already'];?></span></h6>
                            <h6 class="text-center">Available capacity: <span class="text-success"><?php echo $valuedata['available'];?></span></h6>
                            <hr>
                            <p class="pull-left"><i class="fa fa-clock-o" aria-hidden="true"></i> Approximate Leave Time: <?php echo $valuedata['leaves'];?> </p>
                            <p class="pull-right"><i class="fa fa-clock-o" aria-hidden="true"></i> Approximate arrive Time: <?php echo $valuedata['arrive'];?></p>
                            <div class="clr"></div>
                            <div class="text-center">
                                <p>You have to pay<strong> : </strong><span class="text-danger"><?php echo $valuedata['pay'];?></span></p>
                                <button type="button"  class="btn btn-outline-info" data-toggle="modal" data-target="#exampleModalCenter">  
                                <a href="ntf.php?id2=<?php echo $valuedata['ntf_id'];?> "> For Hiring  </a>
                                
                                </button>
                                <!--
                                =============================
                                Modal Start
                                =============================
                                -->
                                
                                <!--
                                =============================
                                Modal End
                                =============================
                                -->
                                
                            </div>
                        </div>
                    </div>
                </div>
                <!-- post end -->
                <?php } ?>

        <!--Pagination Start-->
            <?php
                $query = "Select * from service";
                $result = $db->select($query);
                $result->execute();
                $count = $result->rowCount(); //total rows = total post
                $total_pages = ceil($count/$per_page); //ceil() is use to avoid fraction

                echo "<span class='pagination'><a href='post.php?page=1'>".'first'."</a>";
                for ($i=2; $i <= $total_pages ; $i++) { 
                    echo "<a href='post.php?page=".$i."'>".$i."</a>";
                }
                echo "<a href='post.php?page=$total_pages'>".'last'."</a></span>"; ?>

            <!--Pagination End-->

            <?php  } else{ header("location:404.php"); } ?>
                
            </div>
            
            
        </div>
    </div>
</div>
<?php
include 'inc/footermenu.php';
include 'inc/footer.php';
?>