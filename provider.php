<?php
 include 'lib/User.php';
 include 'inc/header.php';
 include 'inc/menu.php';
 //Session::checkSession();
 $usrid = Session::get("id");
 $user = new User();

?>


<?php
   if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['service'])) {
        $usrpost = $user->ProviderPost($_POST); 
      }
?>
<br>
    
   <div class="phead">
       <div class="container">
           <div class="col-md-12 text-center">
               <div class="headline">
                   <marquee>You need to add this informatin for post your service</marquee>
                       
                   
               </div> 

           </div>
       </div>
   </div>

   <div class="provider_req">
       <div class="container">
           <div class="col-md-12 col-xl-12 col-lg-12 col-xm-12">
               <div class="form_provider card innerreg">


<?php
    if (isset($usrpost)){
        echo $usrpost;
    }
?>


               <form action="" method="POST">
                  <div class="form-row">

                    <div class="form-group col-md-6">
                      <label for="comname">Company Name:</label>
                      <input type="text" class="form-control" id="Company" name="comname" placeholder="Company Name">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="area">Area from</label>
                      <input type="text" class="form-control" id="afrom" name="area" placeholder="From Area">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="reach">Reach Area</label>
                      <input type="text" class="form-control" id="rarea"  name="reach" placeholder="Reacg Area">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="phone">Contact Number:</label>
                      <input type="text" class="form-control" id="phonenumber" name="phone" placeholder="Mobile Number">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="truckcapa">Truck Capacity:</label>
                      <input type="text" class="form-control" id="Company" name="truckcapa" placeholder="Truck Capacity">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="already">Already Fillup</label>
                      <input type="text" class="form-control" id="Company" name="already" placeholder="Already Fillup">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="available">Available capacity:</label>
                      <input type="text" class="form-control" id="Company" name="available" placeholder="Available capacity">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="leaves">Approximate Leave Time:</label>
                      <input type="text" class="form-control" id="Company" name="leaves" placeholder="Approximate Leave Time">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="arrive">Approximate arrive Time:</label>
                      <input type="text" class="form-control" id="Company"  name="arrive" placeholder="Approximate arrive Time">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="pay">You have to pay:</label>
                      <input type="text" class="form-control" id="Company" name="pay" placeholder="Cost in Tk">
                    </div>
                    <div class="form-group col-md-6" style="display:none ;">
                      <label for="ntf_id">Ntf_id:</label>
                      <input type="text" class="form-control" id="Company" name="ntf_id" value="<?php echo $usrid; ?>">
                    </div>
                  </div>
          
                  <div class="text-center">
                      <button type="submit" name="service" class="btn btn-primary">Post Your Service <i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
                  </div>
           
                  
                </form>
               </div>
           </div>
       </div>
   </div>
  
   
  
 
<?php
  include 'inc/footermenu.php';
  include 'inc/footer.php';
?>