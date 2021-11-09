<?php
    include('includes/functions.php');
    if (isset($_POST['btnInsert'])) :
        $Firstname = $_POST['firstname'];
        $LastName = $_POST['lastname'];
        $Birthday = $_POST['birthday'];
        $Course = $_POST['course'];
        $Email = $_POST['email'];
        $Username = $_POST['username'];
        $Password = $_POST['password'];
        createUser($Firstname, $LastName, $Birthday, $Course, $Email, $Username, $Password);
    endif;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add User</title>
    <?php include('theme/header-scripts.php'); ?>
</head>
<body>
    <?php include('theme/header.php'); ?>
    <div class="container-fluid">
        <h1><em class="fa fa-plus-circle"></em>Insert</h1>
        <form action="" method="post" class="form">
            <div class="row">
                <div class="col-md-6">
                    <label for="firstname">First Name</label>
                    <input type="text" name="firstname" id="firstname" class="form-control">
                    <br>
                </div>
                <div class="col-md-6">
                    <label for="lastname">Last Name</label>
                    <input type="text" name="lastname" id="lastname" class="form-control">
                    <br>
                </div>
                <div class="col-md-6">
                    <label for="birthday">Birthday</label>
                    <input type="date" name="birthday" id="birthday" class="form-control">
                    <br>
                </div>
                <div class="col-md-6">
                    <label for="course">Course</label>
                    <input type="text" name="course" id="course" class="form-control">
                    <br>
                </div>
            </div>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control">
            <br>
            <label for="username">Username</label>
            <input type="text" name="username" id="username" class="form-control">
            <br>
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control">
            <br>
            <button name="btnInsert" class="btn btn-primary">Insert Record</button>
        </form>  
    </div>
    <?php include('theme/footer-scripts.php'); ?>  
</body>
</html>