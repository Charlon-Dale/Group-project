<?php
include('includes/functions.php');
$user = (isset($_GET['id'])) ? deleteUser($_GET['id']) : exit();