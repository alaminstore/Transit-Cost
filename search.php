<?php
include 'lib/User.php';
include 'inc/header.php';
include 'inc/menu.php';
Session::checkSession();

$username = Session::get("username");
?>


<?php
   
   if (!isset($_GET['search']) || $_GET['search'] == NULL AND !isset($_GET['search2']) || $_GET['search2'] == NULL) {
       /*header("location:404.php");*/
       return false;
   }
   elseif (isset($_GET['search']) AND !isset($_GET['search2']) || $_GET['search2'] == NULL) {
     $search = $_GET['search'];
     $query = "SELECT * FROM service where area LIKE '%$search%'";
   }
  else if (isset($_GET['search2']) AND !isset($_GET['search']) || $_GET['search'] == NULL) {
         return false;
   }
   else{ // if both value are in input box
      $search = $_GET['search'];
      $search2 = $_GET['search2'];
      $query = "SELECT * FROM service where area LIKE '%$search%' AND reach LIKE '%$search2%' ";
   }
?>


<div class="job_first">
  <div class="container">
    <div class="search_job">
      <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 col-xl-12">
        <h2 class="text-center"><i class="fa fa-search" aria-hidden="true"></i> Transit Cost Post Area</h2>
        <div class="search_form text-center">
          <form action="search.php" method="get">
            <input type="text"  class="input_size" name="search" placeholder="From" required />
            <input type="text" class="input_size" name="search2" placeholder="To" />
            <input type="submit" class="submit_size" name="submit" value="Search">
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

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
  $post = $db->select($query);
  if ($post) {
   foreach($post as $valuedata){
?>



        <div class="per_post">
          <div class="card bg-light text-dark " style="max-width:100%;">
            <div class="card-header text-center">
              <h4> <?php echo $valuedata['area'];?> &nbsp; <i class="fa fa-long-arrow-right" aria-hidden="true"></i> &nbsp; <?php echo $valuedata['reach'];?></h4>
              <a href="tel:01725697728"><h5> <i class="fa fa-phone-square" aria-hidden="true"></i> &nbsp;
              <?php echo $valuedata['phone'];?></h5></a>
            </div>
            <div class="post_content">
              <h5 class="text-center"><a href="job_details.php?id=1">Company Name:
                <?php echo $valuedata['comname'];?> <!-- Unilever Bangladesh (FMCG) --></a></h5>
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
                  
                </div>
              </div>
            </div>
          </div>



<!-- post end -->
<?php } } else{?>
  <h4>Sorry not found !</h4>
<?php } ?>

        </div>
      </div>
    </div>
  </div>
  <?php
  include 'inc/footermenu.php';
  include 'inc/footer.php';
  ?>