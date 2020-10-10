<?php

class Database{
	private $hostdb ="localhost";
 	private $userdb ="transitc_users";
 	private $passdb ="alamin.piash";
 	private $namedb ="transitc_cpanel";
 	public  $pdo;
	function __construct(){
		if (!isset($this->pdo)) {
       	  try {

       	  	  $link = new PDO("mysql:host=".$this->hostdb .";dbname=".$this->namedb,$this->userdb,$this->passdb);
              $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       	  	  $link->exec("SET CHARACTER SET utf8");
       	  	  $this->pdo = $link;

       	  } catch (PDOException $e) {

       	  	die("Failed to connect database".$e->getMessage());
       	  }
       }
   }



    //Select or Read Data.
    
      public function select($query){
          $result = $this->pdo->query($query) or die($this->pdo->error.__LINE__);
          if($result->rowCount() > 0){
            return $result;
          } else {
            return false;
          }
        }

}

?>