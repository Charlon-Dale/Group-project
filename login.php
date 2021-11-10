<?php

    include('includes/functions.php');

    if(isset($_POST['btnLogin'])):
        $Username = $_POST['username'];
        $Password = $_POST['password'];
        doLogin($Username, $Password);
    endif;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <?php include('theme/header-scripts.php'); ?>
</head>
<body>
    <?php if(isset($_SESSION['message'])): ?>
        <div class="alert alert-<?php echo $_SESSION['message']['type']; ?>" role="alert">
            <?php echo $_SESSION['message']['msg']; ?>
        </div>
        <?php unset($_SESSION['message']); ?>
    <?php endif; ?> 
    <div class="card">
        <div class="card-body">
            <div class="container-fluid">
                <h1>Login</h1>
                <form action="" method="post" class="login">
                    <label for="Username">Username</label>
                    <input type="text" name="username" id="username" class="form-control">
                    <br>
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control">
                    <br>
                    <button name="btnLogin" class="btn btn-primary">Login</button> <a href="register.php" style="font-size: 20px;">Register</a>
                </form>
            </div>
            <div class="curve"></div>
    <?php include('theme/footer-scripts.php'); ?>
</body>

</html>
