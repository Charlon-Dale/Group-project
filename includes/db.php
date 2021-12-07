<?php
	$mysqli = new mysqli("localhost","root","");
	if($mysqli->connect_error > 0){
        die('Unable to connect to database [' . $mysqli->connect_error . ']');  
    }
    $mysqli->query("CREATE DATABASE IF NOT EXISTS `StudentAccount`");
    mysqli_select_db($mysqli,"StudentAccount");
 
	$table = "CREATE TABLE IF NOT EXISTS users (Studentid int(11) NOT NULL auto_increment,
              profile_image varchar(255),  
	          Firstname varchar(30)NOT NULL,
              LastName varchar(30)NOT NULL,
              Birthday date NOT NULL,
              Course varchar(30) NOT NULL,
	          Email varchar(255)NOT NULL,
	          Username varchar(30)NOT NULL,
              Password varchar(255)NOT NULL,
	          PRIMARY KEY(Studentid))
             ";
	$mysqli->query($table);
    $sql="SELECT * FROM users ";  
    $result=mysqli_query($mysqli,$sql);
    $count=mysqli_num_rows($result);            
    if($count == 0) {
        $enter="INSERT INTO users (
            profile_image,
            Firstname, 
            LastName, 
            Birthday, `
            Course, 
            Email, 
            Username, 
            Password) VALUES(' ','Jhon', 'Doe', '2011-11-08', 'CEIT-37-501P', 'jhon@testmail.com', 'jhondoe', '123')";
        $mysqli->query($enter);
        echo "
            <div class='w-full py-3  px-10'>
		        <div class='alert py-3 px-5 mb-4 bg-green-100 text-green-900 text-sm rounded-md border border-green-200' role='alert'>
    	           <strong>Database automatically created with dummy data</strong>
    	        </div>
            </div>
        ";
    }
	 	
?>
