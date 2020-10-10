
<?php
 include 'lib/User.php';
 include 'inc/header.php';
 include 'inc/menu.php';
 $user = new User();
?>

<?php
   if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) {
        $usrRegi = $user->userRegistration($_POST); //pass all resistration form's data in this method  and then implement this in User class.
   }
?>
<br>
<div class="documentations">
    <div class="container">
        <div class="card innerreg">
            <h4 class="text-center">Documents needed to upload(All scanned copy of documents should be in PDF)</h4>
            <div class="lists">
                <ul>
                    <li>•   Copy of Registrar of Joint Stock Companies and Firms (RJSC)</li>
                    <li>•   Copy of a Trade License</li>
                    <li>•   Copy of Tax Identification Number (TIN) Certificate</li>
                    <li>•   Copy of VAT Registration</li>
                    <li>•   Copy of Registration with the Bangladesh Investment Development Authority (BIDA)</li>
                    <li>•   Declaration of non –Judicial stamp to abide by the rules & regulation of City Corporation & Municipal Corporation</li>
                </ul>
            </div>
            <div class="emailsend">
                <a href="mailto: rafsun068585@gmail.com"><h4 class="text-center"><i class="fa fa-envelope-o" aria-hidden="true"></i> Mail Us PDF</h4></a>
            </div>
        </div>
    </div>
</div>

<div class="reg">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="innerreg">
                <?php
                  if (isset($usrRegi)){
                      echo $usrRegi;
                  }
                ?>
                    <form action="" method="POST">
                        <div class="form-row ">
                            
                            <div class="form-group col-md-6">
                                <label for="cname">Company Name</label>
                                <input type="text" class="form-control" name="cname" id="cname" placeholder="Company Name">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="username">Your Name</label>
                                <input type="text" class="form-control" name="username" id="username" placeholder="Enter your Name">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="gender">Gender</label>
                                <select id="inputState"  name="gender" class="form-control">
                                    <option selected>Choose...</option>
                                    <option>Male</option>
                                    <option>Female</option>
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="position">Your Position</label>
                                <input type="text" class="form-control" name="position" id="inputEmail4" placeholder="Your position of this company">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" id="inputEmail4" placeholder="Your Email">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="phone">Contact no</label>
                                <input type="text" class="form-control" name="phone" id="pnumber" placeholder="Cell-phone number">
                            </div>
                            
                        </div>
                        <div class="  form-group">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" name="address" id="inputAddress" placeholder="1234 Main St">
                        </div>
                        <div class="form-group">
                            <label for="address2">Address 2</label>
                            <input type="text" class="form-control" name="address2" id="inputAddress2" placeholder="Apartment, studio, or floor">
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-5">
                                <label for="city">City</label>
                                <input type="text" class="form-control" name="city" id="inputCity" placeholder="Cit Name">
                            </div>
                            <div class="form-group col-md-5">
                                <label for="vehicle">Vehicle Name(optional)</label>
                                <input type="text" class="form-control" name="vehicle" id="inputState">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="zipcode">Zip Code</label>
                                <input type="text" class="form-control" name="zipcode" id="zipcode">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="gridCheck">
                                <label class="form-check-label" for="gridCheck">
                                    Are you agree to be a member 
                                </label>
                            </div>
                        </div>
                        
                        <button type="reset" name="register" class="btn btn-info"><i class="fa fa-repeat" aria-hidden="true"></i>
                        Reset</button>
                        &nbsp;
                        <button type="submit" name="register" class="btn btn-success"><i class="fa fa-sign-in" aria-hidden="true"></i>
                         Submit Here</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
<br>

<?php 
 include 'inc/footermenu.php';
 include 'inc/footer.php';
?>