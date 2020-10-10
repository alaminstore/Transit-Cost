<?php
	include_once 'Session.php';
	include 'Database.php';
class User{
	private $db;
	public function __construct(){
		$this->db = new Database();
	}


	public function userRegistration($data){
 		$cname     = $data['cname'];
		$username  = $data['username'];
		$gender    = $data['gender'];
        $position  = $data['position'];
		$email     = $data['email'];
		$phone     = $data['phone'];
		$address   = $data['address'];
		$address2  = $data['address2'];
		$city      = $data['city'];
		$vehicle   = $data['vehicle'];
		$zipcode   = $data['zipcode'];
		$mailChk   = $this->emailcheck($email);
		
		if($cname == "" OR $username == "" OR $gender == "" OR $position == "" OR $email == "" OR $phone == "" OR $address == "" OR $address2 == "" OR $city == "" OR $vehicle == "" OR $zipcode == ""){
    		     $msg = "<div class='alert alert-danger'><strong>Error ! </strong>Field must not be empty.</div>";
    		     return $msg;  
    	    }

    	if (strlen($username) < 3){
    	        $msg = "<div class='alert alert-dengar'><strong>Error ! </strong>username is too small.</div>";
    		    return $msg;
    	     }

	     if (filter_var($email , FILTER_VALIDATE_EMAIL) == false) {
	     	 $msg = "<div class='alert alert-danger'>Sorry !<strong></strong>The email is not valid.</div>";
		     return $msg;
	     }
	     if ($mailChk == true) {
	     	 $msg = "<div class='alert alert-danger'>Sorry !<strong></strong>This email alreary exist.</div>";
		     return $msg;
	     }
	     if (strlen($phone) < 11 || strlen($phone) > 11){
	        $msg = "<div class='alert alert-danger'>Sorry !<strong></strong>Insert the currect mobile number.</div>";
	        return $msg;
	     }


	     

            $sql = "INSERT into reg(cname , username , gender ,position, email , phone , address , address2 , city , vehicle , zipcode) values(:cname , :username , :gender , :position , :email , :phone , :address , :address2 , :city , :vehicle , :zipcode)"; 
            
            $query = $this->db->pdo->prepare($sql); //A prepared statement is a feature used to execute the same (or similar) SQL statements repeatedly with high efficiency.
         
            $query->bindvalue(':cname' , $cname);
            $query->bindvalue(':username' ,$username);
            $query->bindvalue(':gender' , $gender);
            $query->bindvalue(':position' , $position);
            $query->bindvalue(':email' , $email);
            $query->bindvalue(':phone' , $phone);
            $query->bindvalue(':address' , $address);
            $query->bindvalue(':address2' , $address2);
            $query->bindvalue(':city' , $city);
            $query->bindvalue(':vehicle' , $vehicle);
            $query->bindvalue(':zipcode' , $zipcode);
            $result = $query->execute();

            if ($result) {
             	$msg = "<div class='alert alert-success'> <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <strong><i class='fa fa-check' aria-hidden='true'></i></strong> You have successfully submit the information.</div>";
    		     return $msg;
             }else{
             	 $msg = "<div class='alert alert-danger'>Sorry !<strong></strong>Something wrong to add your information.</div>";
    		     return $msg;
             }


	}



	public function emailcheck($email){ 
             $sql = "SELECT * FROM reg WHERE email = :email";  // here $email is :email
             $qry = $this->db->pdo->prepare($sql);
             $qry->bindvalue(':email',$email);
             $qry->execute();
             if ($qry->rowcount() > 0) {
             	return true;
             }else{
             	return false;
             }
    	}


    public function emailcheck2($email){ 
             $sql = "SELECT * FROM usertable WHERE email = :email";  
             $qry = $this->db->pdo->prepare($sql);
             $qry->bindvalue(':email',$email);
             $qry->execute();
             if ($qry->rowcount() > 0) {
                return true;
             }else{
                return false;
             }
        }




/*
===========================
Login part Start
===========================
*/
        public function getLoginUser($email , $pass){   //get email & password data from login input boxs.
            $sql = "SELECT * from usertable where email = :email AND pass = :pass LIMIT 1";
            $query = $this->db->pdo->prepare($sql);
            $query->bindvalue(':email' , $email);
            $query->bindvalue(':pass' , $pass);
            $query->execute();
            $result = $query->fetch(PDO::FETCH_OBJ);
            return $result;
        }

        public function userLogin($data){
             
            $email    = $data['email'];
            $pass = md5($data['pass']);
            $mailChk = $this->emailCheck2($email);

            if ($email == "" OR $pass == "") {
                $msg = "<div class='alert alert-danger'><strong>Error ! </strong> Field must not be empty </div>";
                return $msg;
                }

            if (filter_var($email , FILTER_VALIDATE_EMAIL) == false) {
                 $msg = "<div class='alert alert-danger'>Sorry !<strong></strong>The email is not valid.</div>";
                 return $msg;
             }
             if ($mailChk == false) {
                 $msg = "<div class='alert alert-danger'>Sorry !<strong></strong>This email is not exist.Registration first.. </div>";
                 return $msg;
             }
             
        $result = $this->getLoginUser($email,$pass);//result r value gula session r modde assign korbe
        if ($result) {
            Session::init();
            Session::set("login", true);
            Session::set("id", $result->id);
            Session::set("cname", $result->cname);
            Session::set("username", $result->username);
          //  Session::set("loginmsg", "");
            header('Location: conditionbox.php');
            //exit; it mainly depending on session time sqare , when not work then you need to enable this function 
            

        }else{
            $msg = "<div class='alert alert-danger'> <strong>Error ! </strong>Data not found !</div>";
            return $msg;
          }
        }
/*
===========================
Login part End
===========================
*/


/*
===========================
Read Data Start
===========================
*/
    public function getEditData(){  //Read & show all registration data in admin page
        $sql="Select * from reg ORDER BY id DESC";
        $query = $this->db->pdo->prepare($sql);
        $query->execute();
        $result = $query->fetchAll();
        return $result;
    } 

    /*public function getNotificationData(){  //Read & show all registration data in admin page
        $sql="Select * from notification where ntf_id = id ORDER BY id DESC";
        $query = $this->db->pdo->prepare($sql);
        $query->execute();
        $result = $query->fetchAll();
        return $result;
    } 
*/


   public function getUserData(){  //Read & show all registration data in admin page
        $sql="Select * from usertable where id !=1087 ORDER BY id DESC";
        $query = $this->db->pdo->prepare($sql);
        $query->execute();
        $result = $query->fetchAll();
        return $result;
    }


    public function getPostData(){  //Read & show all registration data in admin page
        $sql="Select * from service ORDER BY id DESC";
        $query = $this->db->pdo->prepare($sql);
        $query->execute();
        $result = $query->fetchAll();
        return $result;
    }






/*
===========================
Read Data End
===========================
*/



/*
===========================
Get User By Id Start
===========================
*/
 
    public function GetUserById($id){ 
            $sql = "SELECT * from reg where id = :id ";
            $query = $this->db->pdo->prepare($sql);
            $query->bindvalue(':id' , $id);
            $query->execute();
            $result = $query->fetch(PDO::FETCH_OBJ);
            return $result;   
    }

/*
===========================
New Userdata with pass
===========================
*/


public function Passwordset($data){

        $pass      = $data['pass'];
        $repass    = $data['repass'];
        $cname     = $data['cname'];
        $username  = $data['username'];
        $gender    = $data['gender'];
        $position  = $data['position'];
        $email     = $data['email'];
        $phone     = $data['phone'];
        $address   = $data['address'];
        $address2  = $data['address2'];
        $city      = $data['city'];
        $vehicle   = $data['vehicle'];
        $zipcode   = $data['zipcode'];
        $mailChk2   = $this->emailcheck2($email);
        
        if($pass == "" OR $repass == ""){
                 $msg = "<div class='alert alert-danger'><strong>Error ! </strong>Field must not be empty.</div>";
                 return $msg;  
        }
        if ($pass != $repass) {
            $msg = "<div class='alert alert-danger'><strong>Error ! </strong>Password not match . try again</div>";
                 return $msg; 
        }
        if (strlen($pass) < 4){
                $msg = "<div class='alert alert-danger'>Sorry !<strong></strong>pin/pass is too small</div>";
                return $msg;
        }

        if ($mailChk2 == true) {
             $msg = "<div class='alert alert-secondary text-center'><strong style='color:red;'>You can't add the same company twice</strong></div>";
             return $msg;
         }

         $pass  = md5($data['pass']);

            $sqlq = "INSERT into usertable(pass,cname , username , gender ,position, email , phone , address , address2 , city , vehicle , zipcode) values(:pass , :cname , :username , :gender , :position , :email , :phone , :address , :address2 , :city , :vehicle , :zipcode)"; 

            
            $qry = $this->db->pdo->prepare($sqlq);
            $qry->bindvalue(':pass' , $pass);
            $qry->bindvalue(':cname' , $cname);
            $qry->bindvalue(':username' ,$username);
            $qry->bindvalue(':gender' , $gender);
            $qry->bindvalue(':position' , $position);
            $qry->bindvalue(':email' , $email);
            $qry->bindvalue(':phone' , $phone);
            $qry->bindvalue(':address' , $address);
            $qry->bindvalue(':address2' , $address2);
            $qry->bindvalue(':city' , $city);
            $qry->bindvalue(':vehicle' , $vehicle);
            $qry->bindvalue(':zipcode' , $zipcode);
            $result = $qry->execute();

           
            if ($result) {
                $msg = "<div class='alert alert-warning text-center'> <strong><i class='fa fa-check' aria-hidden='true'></i></strong> <strong>For confirmation press <span style='color:red'>confirm</span> button</strong></div>";
                 return $msg;
             }else{
                 $msg = "<div class='alert alert-danger'>Sorry !<strong></strong>Something wrong in your password Option.</div>";
                 return $msg;
             }


    }



/*
===========================
ProviderPost 
===========================
*/



    public function ProviderPost($dt){
        $comname   = $dt['comname'];
        $area      = $dt['area'];
        $reach     = $dt['reach'];
        $phone     = $dt['phone'];
        $truckcapa = $dt['truckcapa'];
        $already   = $dt['already'];
        $available = $dt['available'];
        $leaves     = $dt['leaves'];
        $arrive    = $dt['arrive'];
        $pay       = $dt['pay'];
        $ntf_id       = $dt['ntf_id'];
        
        if($comname == "" OR $area == "" OR $reach == "" OR $phone == "" OR $truckcapa == "" OR $already == "" OR $available == "" OR $leaves == "" OR $arrive == "" OR $pay == ""){
                 $msg = "<div class='alert alert-danger'><strong>Error ! </strong>Field must not be empty.</div>";
                 return $msg;  
            }

         
         
         if (strlen($phone) < 11 || strlen($phone) > 11){
            $msg = "<div class='alert alert-danger'>Sorry !<strong></strong>Insert the currect mobile number.</div>";
            return $msg;
         }


                $sqla = "INSERT into service(comname , area , reach , phone, truckcapa, already , available , leaves , arrive , pay , ntf_id) values(:comname , :area , :reach , :phone, :truckcapa, :already , :available , :leaves , :arrive , :pay , :ntf_id)"; 
            
            $qr = $this->db->pdo->prepare($sqla);
         
            $qr->bindvalue(':comname' , $comname);
            $qr->bindvalue(':area' , $area);
            $qr->bindvalue(':reach' , $reach);
            $qr->bindvalue(':phone' , $phone);
            $qr->bindvalue(':truckcapa' , $truckcapa);
            $qr->bindvalue(':already' , $already);
            $qr->bindvalue(':available' , $available);
            $qr->bindvalue(':leaves' , $leaves);
            $qr->bindvalue(':arrive' , $arrive);
            $qr->bindvalue(':pay' , $pay);
            $qr->bindvalue(':ntf_id' , $ntf_id);
            $results = $qr->execute();

            if ($results) {
                $msg = "<div class='alert alert-success'><strong><i class='fa fa-check' aria-hidden='true'></i></strong> You have successfully provide your post.</div>";
                 return $msg;
             }else{
                 $msg = "<div class='alert alert-danger'>Sorry !<strong></strong>Something wrong to add your information.</div>";
                 return $msg;
             }


    }



    public function deletevalue($query){
      //  $query = $this->db->pdo->prepare($qry);
        $delete_row=$this->db->pdo->query($query) or die($this->db->pdo->error._LINE_);
        if($delete_row){
            header("Location:admin.php?msg=".urlencode('Data deleted successfully'));
            exit();
        }else{
            die("Error: (".$this->db->pdo->errno.")".$this->db->pdo->error);
        }
    }
    
    public function deletemember($query){
        $delete_row=$this->db->pdo->query($query) or die($this->db->pdo->error._LINE_);
        if($delete_row){
            header("Location:userlist.php?msg=".urlencode('Member deleted successfully'));
            exit();
        }else{
            die("Error: (".$this->db->pdo->errno.")".$this->db->pdo->error);
        }
    }




/*
===============
Profile page
===============
*/


    public function GetUserById2($id){  //Show user info on profile page's input box as a value
            $sql = "SELECT * from usertable where id = :id LIMIT 1 ";
            $query = $this->db->pdo->prepare($sql);
            $query->bindvalue(':id' , $id);
            $query->execute();
            $result = $query->fetch(PDO::FETCH_OBJ);
            return $result;   
    }



/*
===========================
Update User info
===========================
*/
    public function UpdateUserData($id , $data){    
         $cname     = $data['cname'];
         $username  = $data['username'];
         $email     = $data['email'];

        if ($cname == "" OR $username == "" OR $email == "") {
          $msg = "<div class='alert alert-danger'><strong>Error ! </strong> Field must not be empty.. </div>";
          return $msg;
        }

         $sql = "UPDATE usertable SET 
                 cname     = :cname,
                 username = :username,
                 email    = :email
                 WHERE id = :id";

         $query = $this->db->pdo->prepare($sql);
         $query->bindValue(':cname', $cname);
         $query->bindValue(':username', $username);
         $query->bindValue(':email', $email);
         $query->bindValue(':id', $id);
         $result = $query->execute();
         if ($result) {
          $msg = "<div class='alert alert-success'> <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <strong>Seccess ! </strong>User data updated successfully!</div>";
          return $msg;
         }else{
          $msg = "<div class='alert alert-danger'> <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <strong>Sorry ! </strong>There is a problem to update your data!</div>";
          return $msg;
         }
    }

/*
===========================
Update User Password Start
===========================
*/

    private function checkPassword($id , $old_pass){  //Check old password by id
       $password = md5($old_pass);
       $sql = "SELECT pass FROM usertable WHERE id = :id AND pass = :password"; 
       $query = $this->db->pdo->prepare($sql);
       $query->bindValue(':id', $id);
       $query->bindValue(':password', $password);
       $query->execute();
       if ($query->rowCount() > 0) {
           return true;
       }else{
           return false;
       }
    } 

    public function updatePassword($id , $data){
        $old_pass = $data['old_pass'];
        $new_pass = $data['password'];
        $chk_pass = $this->checkPassword($id , $old_pass);
        if ($old_pass == "" OR $new_pass == "") {
           $msg = "<div class='alert alert-danger'> <strong>Error! </strong>Field must not be empty.</div>";
              return $msg;
        }
        if ($chk_pass == false) {
           $msg = "<div class='alert alert-danger'> <strong>Error! </strong>Old password not exist.</div>";
           return $msg;
        }
        if (strlen($new_pass) < 6) {
           $msg = "<div class='alert alert-danger'> <strong>Error! </strong> password is too small , must need to be more than 6 character.</div>";
           return $msg;
        }
        $password = md5($new_pass);
        $sql = "UPDATE usertable set
                    pass     = :password
                    WHERE id = :id ";
             $query = $this->db->pdo->prepare($sql);
             $query->bindValue(':password', $password);
             $query->bindValue(':id', $id);
             $result = $query->execute();
             if ($result) {
              $msg = "<div class='alert alert-success'> <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <strong>Seccess ! </strong>User's Password  updated successfully!</div>";
              return $msg;
             }else{
              $msg = "<div class='alert alert-danger'> <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <strong>Sorry ! </strong>There is a problem to update your password!</div>";
              return $msg;
             }
          
    }


/*
==============----------------->
*/


public function userNotification($data){
        $cname     = $data['cname'];
        $phone     = $data['phone'];
        $goods     = $data['goods'];
        $weight    = $data['weight'];
        $send_ntf_id    = $data['send_ntf_id'];
        $get_ntf_id    = $data['get_ntf_id'];
        
        if($cname == "" OR $phone == "" OR $goods == "" OR $weight == ""){
                 $msg = "<div class='alert alert-danger'><strong>Error ! </strong>Field must not be empty.</div>";
                 return $msg;  
            }

         if (strlen($phone) < 11 || strlen($phone) > 11){
            $msg = "<div class='alert alert-danger'>Sorry !<strong></strong>Insert the currect mobile number.</div>";
            return $msg;
         }


            $sql = "INSERT into notification(cname , phone , goods ,weight , send_ntf_id , get_ntf_id) 
            values(:cname , :phone , :goods , :weight , :send_ntf_id , :get_ntf_id )"; 
            
            $query = $this->db->pdo->prepare($sql);
         
            $query->bindvalue(':cname' , $cname);
            $query->bindvalue(':phone' , $phone);
            $query->bindvalue(':goods' , $goods);
            $query->bindvalue(':weight' , $weight);
            $query->bindvalue(':send_ntf_id' , $send_ntf_id);
            $query->bindvalue(':get_ntf_id' , $get_ntf_id);
            $result = $query->execute();
            header("Location:conditionbox.php");

            if ($result) {
                $msg = "<div class='alert alert-success'> <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <strong><i class='fa fa-check' aria-hidden='true'></i></strong> You have successfully submit the information.</div>";
                 return $msg;
             }else{
                 $msg = "<div class='alert alert-danger'>Sorry !<strong></strong>Something wrong to add your information.</div>";
                 return $msg;
             }


    }





}

?>