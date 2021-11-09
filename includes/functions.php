<?php session_start();

require_once('db.php');

/* format arrays */
function formatcode($arr){
    echo '<pre>';
    print_r($arr);
    echo '</pre>';
}

/* select statement */
function selectAll(){
    global $mysqli;
    $data = array();
    $stmt = $mysqli->prepare('SELECT * FROM Students');
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows === 0):
        $_SESSION['message'] = array('type'=>'danger', 'msg'=>'There are currently no records in the database');
    else:
        while($row = $result->fetch_assoc()){
            $data[] = $row;
        }
    endif;
    $stmt->close();
    return $data;
}

/* login statement */
function doLogin($Username = NULL, $Password = NULL) {
    global $mysqli;
    $stmt = $mysqli->prepare('SELECT * FROM users WHERE Username = ?');
    $stmt->bind_param('s', $Username);
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows === 0):
        $_SESSION['message'] = array('type'=>'danger', 'msg'=>'Account does not exist');
    else:
        $row = $result->fetch_assoc();
        if(password_verify($Password, $row['Password'])):
            $_SESSION['user'] = $row;
            $_SESSION['message'] = array('type'=>'success', 'msg'=>'Successfully logged in');
            header('Location:index.php');
        else:
            $_SESSION['message'] = array('type'=>'danger', 'msg'=>'our username or password is incorrect. Please try again.');
        endif;
    endif;
    $stmt->close();
}

/* logout statement */
function doLogout(){
    unset($_SESSION['user']);
    $_SESSION['message'] = array('type'=>'success', 'msg'=>'You have been successfully logged out.');
    header('Location:login.php');
    exit();
}

/* select all Students */
function selectAllStudents() {
    global $mysqli;
    $data = array();
    $stmt = $mysqli->prepare('SELECT * FROM users');
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows === 0):
        $_SESSION['message'] = array('type'=>'danger', 'msg'=>'There are currently no records in the database');
    else:
        while($row = $result->fetch_assoc()){
            $data[] = $row;
        }
    endif;
    $stmt->close();
    return $data; 
}

/* select single statement */
function selectSingleUser($Studentid = NULL) {
    global $mysqli;
    $stmt = $mysqli->prepare('SELECT * FROM users WHERE Studentid = ?');
    $stmt->bind_param('i', $Studentid);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $stmt->close();
    return $row;
}

/* create user statement */
function createUser($Firstname = NULL, $LastName = NULL, $Birthday = NULL, $Course = NULL, $Email = NULL, $Username = NULL, $Password = NULL) {
    global $mysqli;
    $stmt = $mysqli->prepare('SELECT * FROM users WHERE Username = ?');

    $stmt->bind_param('s', $Username);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows !== 0):
        $_SESSION['message'] = array('type'=>'danger', 'msg'=>'The Username you chose is taken. Please try again.');
    else:
        $password = password_hash($Password, PASSWORD_DEFAULT);
        $stmt = $mysqli->prepare("INSERT INTO users (
            Firstname, 
            LastName, 
            Birthday, 
            Course, 
            Email, 
            Username, 
            password) VALUES(?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param('sssssss', $Firstname, $LastName, $Birthday, $Course, $Email, $Username, $password);
        var_dump($stmt);
        $stmt->execute();
        $stmt->close();
        if(isset($_SESSION['user'])) :
            $_SESSION['message'] = array('type'=>'success', 'msg'=>'Successfully added a new user');
            header('Location:index.php');
        else:
            $_SESSION['message'] = array('type'=>'success', 'msg'=>'You have successfully create a new user, you can log in here.');
            header('Location:login.php');
        endif;
        exit();
    endif;
}

/* update user statement */
function updateUser($Username, $Firstname = NULL, $LastName = NULL, $Studentid){
    global $mysqli;
    $stmt = $mysqli->prepare('UPDATE users SET Username = ?, Firstname = ?, LastName = ? WHERE Studentid =?');
    $stmt->bind_param('sssi', $Username, $Firstname, $LastName, $Studentid);
    $stmt->execute();
    if($stmt->affected_rows === 0):
        $_SESSION['message'] = array('type'=>'danger', 'msg'=>'You did not make any changes');
    else:
        $_SESSION['message'] = array('type'=>'success', 'msg'=>'Successfully update the selected user');
    endif;
    $stmt->close();
}

/* delete user statement */
function deleteUser($Studentid){
    global $mysqli;
    $stmt = $mysqli->prepare('DELETE FROM users WHERE Studentid =?');
    $stmt->bind_param('i', $Studentid);
    $stmt->execute();
    $stmt->close();
    $_SESSION['message'] = array('type'=>'success', 'msg'=>'Successfully deleted the selected user');
    header('Location:index.php');
    exit();
}
