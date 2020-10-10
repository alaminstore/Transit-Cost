<?php
  include 'inc/header.php';
  include 'inc/menu.php';
  include 'lib/User.php';
  $user = new User();
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
                  <span><i class="fa fa-list"></i> User List</span>
                 
              </div>
          </div>
      </div>
  </div>

    <div class="admin_table">
        <div class="container">
            <div class="col-md-12">
                <div class="admin_table_inner">


          <?php
              if (isset($_POST['submitDeletebtn'])) {
                $key = $_POST['keytodelete'];
                $query = "DELETE FROM usertable WHERE id = '$key' ";
                $deletemem = $user->deletemember($query);
              }
          ?>


          <?php
              if (isset($deletemem)){
                  echo $deletemem;
              }
          ?>

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
                          <th scope="col">Check</th>                                   
                          <th scope="col">Deletion</th>                                   
                        </tr>
                      </thead>
                      <tbody>


                      <?php
                        $user = new User();
                        $userdata = $user->getUserData();
                            if($userdata){
                            $i=0;
                            foreach($userdata as $valuedata){ $i++; ?>
                        <tr>
                         <form action="" method="POST"> 
                          <th scope="row"><?php echo $i;?></th>
                          <td><?php echo $valuedata['cname'];?></td>
                          <td><?php echo $valuedata['username'];?></td>
                          <td><?php echo $valuedata['email'];?></td>
                          <td>0<?php echo $valuedata['phone'];?></td>
                          <td><?php echo $valuedata['address'];?></td>
                          <td><?php echo $valuedata['zipcode'];?></td> 
                          <td>
                            <input type="checkbox" name="keytodelete" value="<?php echo $valuedata['id'];?>" required>
                          </td>  
                          <td>
                            <input type="submit" name="submitDeletebtn" value="Delete" class="btn btn-danger">
                          </td>   
                         </form>
                        </tr>

                      <?php }
                           }else{?>
                           <td>Data not found!</td>
                           <td>Data not found!</td>
                           <td>Data not found!</td>
                           <td>Data not found!</td>
                           <td>Data not found!</td>
                           <td>Data not found!</td>
                        <?php }
                     ?>
                       


                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


<?php }
 ?>

<?php include 'inc/footer.php'; ?>