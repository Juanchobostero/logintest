<?php

function showError($errors, $field) {
    $alert = '';
    if(isset($errors[$field]) && !empty($field)){
        $alert = "<div class='alert-error'>". $errors[$field] . "</div>";
    }

    return $alert;
}

function dropErrors() {
    if(isset($_SESSION['errors'])) { 
        $_SESSION['errors'] = null;
        unset($_SESSION['errors']);
    }
    

    if(isset($_SESSION['done'])) {
        $_SESSION['done'] = null;
        unset($_SESSION['done']);
    }
}

function get_users($db) {
    $sql = "SELECT * FROM users ORDER BY id DESC";
    $users = mysqli_query($db, $sql);
    $result = array();

    if($users && mysqli_num_rows($users) > 0){
        $result = $users;
    }

    return $result; 
}

function get_user($db, $id) {
    $sql = "SELECT * FROM users
            WHERE id = '$id'";
    $user = mysqli_query($db, $sql);

    $result = array();

    if($user && mysqli_num_rows($user) > 0){
        $result = $user;
    }

    return $result; 
}