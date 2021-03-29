<?php 
require_once '../includes/connection.php';

if(isset($_POST)){

    if(isset($_SESSION['error_login'])){
        unset($_SESSION['error_login']);
    }


    $email = trim($_POST['email']);
    $password = $_POST['password'];

    $sql = "SELECT * FROM users 
            WHERE email = '$email' LIMIT 1";

    $login = mysqli_query($db, $sql);

    if($login && mysqli_num_rows($login) == 1){
        $user = mysqli_fetch_assoc($login);

        //Check password
        $verify = password_verify($password, $user['password']);

        if($verify) {
            $_SESSION['user'] = $user;
        }else {
            $_SESSION['error_login'] = "Upps.. some data is wrong !";
        }
        
        
    }else {
        $_SESSION['error_login'] = "Upps.. some data is wrong !";
    }
}

header('Location: ../index.php');
?>