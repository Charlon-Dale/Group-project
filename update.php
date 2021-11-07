<?php
    include('includes/functions.php');
    auth();
    if (isset($_POST['btnUpdate'])) :
        updateUser($_POST['Firstname'], $_POST['LastName'], $_POST['phone'], $_POST['Studentid']);
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
                <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
                <div class="row">
                    <div class="col-md-6">
                        <label for="Firstname">First Name</label>
                        <input type="text" name="Firstname" id="Firstname" class="form-control" value="<?php echo $user['Firstname']; ?>">
                        <br>
                    </div>
                    <div class="col-md-6">
                        <label for="LastName">Last Name</label>
                        <input type="text" name="LastName" id="LastName" class="form-control" value="<?php echo $user['LastName']; ?>">
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