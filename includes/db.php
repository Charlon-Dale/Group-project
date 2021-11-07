<?php
	$db = new mysqli("localhost","root","");
	if($db->connect_errno > 0){
        die('Unable to connect to database [' . $db->connect_error . ']');  
    }
    $db->query("CREATE DATABASE IF NOT EXISTS `StudentAccount`");
    mysqli_select_db($db,"StudentAccount");
 
	$table = "CREATE TABLE IF NOT EXISTS Students (Studentid int(11) NOT NULL auto_increment,   
	          Firstname varchar(30)NOT NULL,
              LastName varchar(30)NOT NULL,
              Birthday date NOT NULL,
              Course varchar(30) NOT NULL,
	          Email varchar(30)NOT NULL,
	          Username varchar(30)NOT NULL,
              Password varchar(30)NOT NULL,
	          PRIMARY KEY(Studentid))
             ";
	$db->query($table);
    $sql="SELECT * FROM Students ";  
    $result=mysqli_query($db,$sql);
    $count=mysqli_num_rows($result);            
       if($count==0) {
            $enter="INSERT INTO Students (
                Firstname, 
                LastName, 
                Birthday, 
                Course, 
                Email, 
                Username, 
                Password) VALUES('Jhon', 'Doe', '2011-11-08', 'CEIT-37-501P', 'jhon@testmail.com', 'jhondoe', '123')";
            $db->query($enter);
            echo "Database automatically created with dummy data";
        }
      
 				 	
?>
