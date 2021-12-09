<?php  
    if(!isset($_SESSION['user'])):
        header('Location:login.php');
        exit();
    endif;
?>
<?php
    $loggedInUser = selectSingleUser($_SESSION['user']['Studentid']);
    $welcome = ''.$loggedInUser['Firstname'].'  '.$loggedInUser['LastName'].' Connected Successfully (<a href="logout.php">Logout</a>)';
?>
<?php if(isset($_SESSION['message'])): ?>
    <div class="alert alert-<?php echo $_SESSION['message']['type']; ?>" role="alert">
        <?php echo $_SESSION['message']['msg']; ?>
    </div>
    <?php unset($_SESSION['message']); ?>
<?php endif; ?>   
<div class="card">
<div class="card-body">
<header>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-11 text-right">
                <nav style="font-size: 20px;">
                    <ul>
                        <li><a href="index.php">Dashboard</a></li>
                        <li><a href="addUser.php">Add New Student</a></li>
                        <li><strong><?php echo $welcome; ?></strong></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header>