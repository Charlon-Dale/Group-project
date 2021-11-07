<?php

    include('includes/functions.php');
    $listAllStudents = selectAllStudents();
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
        <table class="table table-striped datatable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Phone</th>
                    <?php echo $_SESSION['user'] ? '<th></th>' : ''; ?>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($listAllStudents as $student):
                        echo'
                            <tr>
                                <td>'.$student['Studentid'].'</td>
                                <td>'.$student['fname'].'</td>
                                <td>'.$student['lname'].'</td>
                                <td class="text-right">
                                    <a href ="/update?id='.$student['Studentid'].'">Update</a>
                                    <a href ="/delete?id='.$student['Studentid'].'">Delete</a>
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
