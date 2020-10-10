<?php
  $page = 'admin';
  include 'inc/header.php';
  include 'inc/menu.php';
  include 'lib/User.php';

?>
<?php
 $sesid = Session::get("id");
 if ($sesid!=1087) {
    header("location:404.php");
 }else{?>

  <div class="member_list">
      <div class="container">
          <div class="col-md-12">
              <div class="member_list_inner">
                  <span><i class="fa fa-list"></i> Edit List</span>
                  <div class="pull-right"><a href="userlist.php"><button type="button" class="btn btn-secondary">User List</button></a></div>
                 
              </div>
          </div>
      </div>
  </div>

    <div class="admin_table">
        <div class="container">
            <div class="col-md-12">
                <div class="admin_table_inner">
                    <table class="table table-bordered text-center table-striped">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">CompanyName</th>
                          <th scope="col">UserName</th>
                          <th scope="col">Email</th>
                          <th scope="col">PhoneNumber</th>
                          <th scope="col">City</th>
                          <th scope="col">ZipCode</th>                  
                          <th scope="col">EditOption</th>                  
                        </tr>
                      </thead>
                      <tbody>


                      <?php
                        $user = new User();
                        $userdata = $user->getEditData();
                            if($userdata){
                            $i=0;
                            foreach($userdata as $valuedata){ $i++; ?>
                        <tr>
                          <th scope="row"><?php echo $i;?></th>
                          <td><?php echo $valuedata['cname'];?></td>
                          <td><?php echo $valuedata['username'];?></td>
                          <td><?php echo $valuedata['email'];?></td>
                          <td>0<?php echo $valuedata['phone'];?></td>
                          <td><?php echo $valuedata['address'];?></td>
                          <td><?php echo $valuedata['zipcode'];?></td>  
                  <td><a href="accept.php?id=<?php echo $valuedata['id']?>"><button class="btn btn-info">
                              <span class="spinner-grow spinner-grow-sm"></span>
                              Edit..
                            </button></a></td>  
                        </tr>

                      <?php }
                           }else{
                        echo "Data not found!";
                         }
                     ?>
                       


                      </tbody>
                    </table>
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