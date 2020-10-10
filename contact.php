<?php
  $page = 'contact';
  include 'inc/header.php';
  include 'inc/menu.php';

?>
<?php

if(isset($_POST['contact'])){
    
    if(empty($_POST['full'])){
        $nameerror =  'Full name required';
    }
    else{
        $full_name = $_POST['full'];
    }
    
    if(empty($_POST['email'])){
        $emailerror ='Email address required';
    }
    else{
        $email_address = $_POST['email'];
    }

    if(empty($_POST['phone'])){
        $phoneerror = 'Phone number required';
    }
    else{
        $phone = $_POST['phone'];
    }
    
    $message = $_POST['message'];
    
    
     if(!empty($full_name) && !empty($email_address) && !empty($phone)){
    
     $msg = " 
     
       <table>
          <tr>
            <td>Full Name :</td>
            <td>".$full_name."</td> 
          </tr>
          <tr>
            <td>Email Address :</td>
            <td>".$email_address."</td> 
          </tr>

           <tr>
            <td>Phone Number :</td>
            <td>".$phone."</td>
          </tr>
        </table>

        <table>
           <tr>

            <td>
            Message :<br>
            </td>
            <td>".$message."</td>
          </tr>

        </table>

           ";

   // $msg = '<strong>' . $full_name . '</strong>' . $email_address . $phone . $message;

    // Always set content-type when sending HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    // More headers
    $headers .= 'From: <'. $email_address .'>' . "\r\n";
    
    $mail = mail('rafsun068585@gmail.com','From TransitCost', $msg , $headers);
    if(isset($mail)){
        $sent = 'Message has been sent successfully';
    } 
 }

}

?>

<br>
<h2 class="text-center">-- Contact With Us --</h2>

<div class="contact_option">
    <div class="container">
        <div class="row">
         <div class="col-md-12 col-sm-12 col-xs-12">
            <form action="" method="post">
                <div class="form-group">
                    <label for="">FullName :</label>
                    <input  value="<?php if(isset($full_name)){echo $full_name;}?>" type="text" class="form-control" name="full">
                    <h5 class=text-danger>
                        <?php
                          if(isset($nameerror)){
                              echo $nameerror;
                          }
                        ?>
                    </h5>
                </div>
                <div class="form-group">
                    <label for="">Email :</label>
                    <input value="<?php if(isset($email_address)){echo $email_address;}?>" type="email" class="form-control" name="email">
                    <h5 class=text-danger>
                        <?php
                          if(isset($emailerror)){
                              echo $emailerror;
                          }
                        ?>
                    </h5>
                </div>
                <div class="form-group">
                    <label for="">PhoneNumber :</label>
                    <input value="<?php if(isset($phone)){echo $phone;}?>" type="tel" class="form-control" name="phone">
                    <h5 class=text-danger>
                        <?php
                          if(isset($phoneerror)){
                              echo $phoneerror;
                          }
                        ?>
                    </h5>
                </div>
                <div class="form-group">
                    <label for="">Message :</label>
                    <textarea  class="form-control" name="message" id="" cols="30" rows="10"> <?php if(isset($message)){echo $message;}?></textarea>
                </div> 
                <div class="form-group">
                    <button type="submit" class="btn btn-success" name="contact">Send Message</button>
                </div>
                
                <h2 class="text-success">
                    <?php
                       if(isset($sent)){
                        echo $sent;
                        }    
                    ?>
                </h2>
            </form>
            </div>
        </div>
    </div>
</div>
<br>


<div class="container">
	<h5 class="text-center">Also you can contact with another way</h5><br>
  <div class="row">
    <div class="col-sm">
        <ul>
			<li><strong>Name:</strong>  &nbsp;Md. Rafsunjani</li>
			<li><strong>Phone:</strong> +880152149297 </li>
			<li><strong>Email:</strong> &nbsp;rafsun068585@gmail.com</li>
			
		</ul>
    </div>
    <div class="col-sm">
        <ul>
			<li><strong>Name:</strong>  &nbsp;Md. Shahriya Sani</li>
			<li><strong>Phone:</strong> +880 1635-845256 </li>
			<li><strong>Email:</strong> &nbsp;rafsun068585@gmail.com</li>
			
		</ul>
    </div>
    <div class="col-sm">
      <ul>
		<li><strong>Name:</strong>  &nbsp;Md. Aminul Islam</li>
		<li><strong>Phone:</strong> +8801771792096 </li>
		<li><strong>Email:</strong> &nbsp;aminultopu54@gmail.com</li>
		
	</ul>
    </div>
  </div>
</div>

<?php
  include 'inc/footermenu.php';
  include 'inc/footer.php';
?>