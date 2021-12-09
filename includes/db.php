<?php

	$mysqli = new mysqli("localhost","root","");
	if($mysqli->connect_error > 0){
        die('Unable to connect to database [' . $mysqli->connect_error . ']');  
    }
    $mysqli->query("CREATE DATABASE IF NOT EXISTS `StudentAccount`");
    mysqli_select_db($mysqli,"StudentAccount");
 
    $superuserTable = "CREATE TABLE IF NOT EXISTS administrator (
        id INT(11) NOT NULL AUTO_INCREMENT,
        Firstname VARCHAR(30)NOT NULL,
        LastName VARCHAR(30)NOT NULL,
        Birthday DATE NOT NULL,
	    Email VARCHAR(255)NOT NULL,
	    Username VARCHAR(30)NOT NULL,
        Password VARCHAR(255)NOT NULL,
        level INT(11) NOT NULL DEFAULT '0',
        PRIMARY KEY(id)
        )";
        $mysqli->query($superuserTable); 

    $studentTable = "CREATE TABLE users (
        Studentid INT(11) NOT NULL AUTO_INCREMENT,
        Firstname VARCHAR(30)NOT NULL,
        LastName VARCHAR(30)NOT NULL,
        Birthday DATE NOT NULL,
        Course VARCHAR(30) NOT NULL,
	    Email VARCHAR(255)NOT NULL,
	    Username VARCHAR(30)NOT NULL,
        Password VARCHAR(255)NOT NULL,
        PRIMARY KEY(Studentid)
        )";
        $mysqli->query($studentTable);

    $sql = "SELECT * FROM administrator"; 
    $result = mysqli_query($mysqli,$sql);
    $count = mysqli_num_rows($result); //this line count the number of rows/entries in the table administrator              
	if($count == 0) {  //this line checks if the number of rows is equal to zero which means there is no entry in the database
        $adminPassword = password_hash('admin', PASSWORD_DEFAULT);
        $createAdminAccount = "INSERT INTO administrator (
            Firstname,
            LastName,
            Birthday,
            Email,
            Username,
            Password,
            level) VALUES ('Admin','Jimenez', '2000-01-01', 'admin@gmail.com', 'admin', '".$adminPassword."', '1')";
            
	    $mysqli->query($createAdminAccount);  //this line insert values into the table aministrator 
        echo "
            <div class='w-full py-3  px-10'>
                <div class='alert py-3 px-5 mb-4 bg-green-100 text-green-900 text-sm rounded-md border border-green-200' role='alert'>
                   <strong>(Dummy) Table created successfully</strong>
                </div>
            </div>
        ";
    }
?>
