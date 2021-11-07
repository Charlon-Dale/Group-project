<?php
    include('includes/functions.php');
    auth();
    if (isset($_POST['btnInsert'])) :
        createUser($_POST['Firstname'], $_POST['LastName'], $_POST['Birthday']);
    endif;
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
        <h1><em class="fa fa-plus-circle"></em>Insert</h1>
        <form action="" method="post" class="form">
        <div class="row">
            <div class="col-md-6">
                    <label for="Firstname">First Name</label>
                    <input type="text" name="Firstname" id="Firstname" class="form-control" value="">
                    <br>
                </div>
                <div class="col-md-6">
                    <label for="LastName">Last Name</label>
                    <input type="text" name="LastName" id="LastName" class="form-control" value="">
                    <br>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="Birthday">Birthday</label>
                    <input type="text" name="Birthday" id="Birthday" class="form-control Birthday" value="">
                    <br>
                </div>
            </div>
            <button name="btnInsert" class="btn btn-primary">Insert Record</button>
        </form>  
    </div>
    <?php include('theme/footer-scripts.php'); ?>  
</body>
</html>