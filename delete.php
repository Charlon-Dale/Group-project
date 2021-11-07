<?php
include('includes/functions.php');
$user = (isset($_GET['Studentid'])) ? deleteUser($_GET['Studentid']) : exit();