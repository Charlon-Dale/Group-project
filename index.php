<?php

    include('includes/functions.php');
    $allEmployees = selectAll();
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
        <h1><em class="fa fa-check-circle"></em> Welcome to DevDrawer</h1>
        <table class="table table-striped <?php echo $_SESSION['user']['level'] >= 1 ? 'datatable' : 'datatableSimple'; ?>">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Phone</th>
                    <?php echo $_SESSION['user']['level'] >= 1 ? '<th></th>' : ''; ?>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($allEmployees as $employee):
                        echo'
                            <tr>
                                <td>'.$employee['id'].'</td>
                                <td>'.$employee['fname'].'</td>
                                <td>'.$employee['lname'].'</td>
                                <td>'.$employee['phone'].'</td>
                                <td class="text-right">
                                    
                                    <a href ="update.php?id='.$employee['id'].'. php">Update</a>
                                    <a href ="delete.php?id='.$employee['id'].'. php">Delete</a>
                                </td>
                            </tr>
                        '; 
                    endforeach;    
                ?>
            </tbody>
        </table>
    </div>
    <?php include('theme/footer-scripts.php'); ?>
</body>
</html>
