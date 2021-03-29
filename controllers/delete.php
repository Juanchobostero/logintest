<?php

require_once '../includes/connection.php';

if(isset($_SESSION['user']) && isset($_GET['id'])) {

    $id_user = $_GET['id'];
    $sql = "DELETE FROM users 
            WHERE id = '$id_user'";
    $deleted = mysqli_query($db, $sql);

    if($deleted){
        $_SESSION['deleted'] = 'User deleted !';
    }else {
        $_SESSION['errors'] = 'Upps something was wrong !';
    }

}

header('Location: ../index.php');