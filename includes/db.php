<?php
	$mysqli = new mysqli("localhost","root","");
	if($mysqli->connect_errno > 0){
        die('Unable to connect to database [' . $mysqli->connect_error . ']');  
    }
    $mysqli->query("CREATE DATABASE IF NOT EXISTS `StudentAccount`");
    mysqli_select_db($mysqli,"StudentAccount");
 
	$table = "CREATE TABLE IF NOT EXISTS users (Studentid int(11) NOT NULL auto_increment,   
	          Firstname varchar(30)NOT NULL,
              LastName varchar(30)NOT NULL,
              Birthday date NOT NULL,
              Course varchar(30) NOT NULL,
	          Email varchar(30)NOT NULL,
	          Username varchar(30)NOT NULL,
              Password varchar(30)NOT NULL,
	          PRIMARY KEY(Studentid))
             ";
	$mysqli->query($table);
    $sql="SELECT * FROM users ";  
    $result=mysqli_query($mysqli,$sql);
    $count=mysqli_num_rows($result);            
       if($count==0) {
            $enter="INSERT INTO users (
                Firstname, 
                LastName, 
                Birthday, 
                Course, 
                Email, 
                Username, 
                Password) VALUES('Jhon', 'Doe', '2011-11-08', 'CEIT-37-501P', 'jhon@testmail.com', 'jhondoe', '123')";
            $mysqli->query($enter);
            echo "Database automatically created with dummy data";
        }
	 	
?>
