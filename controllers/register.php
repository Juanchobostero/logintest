<?php 
require_once '../includes/connection.php';

if(isset($_POST)){

    if(!isset($_SESSION)) {
        session_start();
    }
    
    //Data from form
    $name = isset($_POST['name']) ? mysqli_real_escape_string($db, $_POST['name']) : false;
    $email = isset($_POST['email']) ? mysqli_real_escape_string($db, $_POST['email']) : false;
    $password = isset($_POST['password']) ? mysqli_real_escape_string($db, $_POST['password']) : false;
    
    $errors = array();

    //Validate name
    if(!empty($name) && !is_numeric($name) && !preg_match("/[0-9]/", $name)){
        $validated_name = true;
    }else {
        $validated_name = false;
        $errors['name'] = "The name only must contain letters and spaces !";
    }

    //Validate email
    if(!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)){
        $validate_email = true;
    }else {
        $validate_email = false;
        $errors['email'] = "The email is invalid !";
    }

    //Validate password
    if(!empty($password)){
        $validate_password = true;
    }else {
        $validate_password = false;
        $errors['password'] = "The password is empty !";
    }

    $save_user = false;

    if(count($errors) == 0){

        
        //Insert user
        $save_user = true;
        
        $secure_password = password_hash($password, PASSWORD_BCRYPT, ['cost' => 4]);

        $sql = "INSERT INTO users (name, email, password)
                VALUES('$name', '$email', '$secure_password');";
        $save = mysqli_query($db, $sql);

        if($save) {
            $_SESSION['done'] = "User created !";
        } else {
            $_SESSION['errors']['general'] = "something went wrong ! ";
        }
        header('Location: ../index.php');
    }else {
        
        $_SESSION['errors'] = $errors;
        
        header('Location: ../register.php');
    }
    
}

?>