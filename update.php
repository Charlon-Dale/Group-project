<?php
    include('includes/functions.php');
    // auth();
    if (isset($_POST['btnUpdate'])) :
        updateUser($_POST['Username'], $_POST['Firstname'], $_POST['LastName'], $_POST['Studentid']);
    endif;
    $user = (isset($_GET['Studentid'])) ? selectSingleUser($_GET['Studentid']) : false;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DevDrawer DB</title>
    <?php include('theme/header-scripts.php'); ?>
</head>
<body>
    <?php include('theme/header.php'); ?>
    <div class="container-fluid">
        <?php if ($user != false) : ?>
            <h1><em class="fa fa-pen-square"></em> Update</h1>
            <form action="" method="post" class="form">
                <input type="hidden" name="Studentid" value="<?php echo $user['Studentid']; ?>">
                <label for="Username">Username</label>
                <input type="text" name="Username" id="Username" class="form-control" value="<?php echo $user['Username']; ?>">
                <div class="row">
                    <div class="col-md-6">
                        <label for="firstname">First Name</label>
                        <input type="text" name="firstname" id="firstname" class="form-control" value="<?php echo $user['Firstname']; ?>">
                        <br>
                    </div>
                    <div class="col-md-6">
                        <label for="lastName">Last Name</label>
                        <input type="text" name="lastName" id="lastName" class="form-control" value="<?php echo $user['LastName']; ?>">
                        <br>
                    </div>
                </div>
                <button name="btnUpdate" class="btn btn-primary">Update Record</button>
            </form>   
        <?php else: ?>  
            <h1>User is not set. Try again.</h1>
        <?php endif; ?> 
    </div>
    <?php include('theme/footer-scripts.php'); ?>
</body>
</html>