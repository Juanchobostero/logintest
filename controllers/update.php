<?php 
require_once '../includes/connection.php';

if(isset($_POST)){

    if(!isset($_SESSION)) {
        session_start();
    }

    //Data from form and more
    $name = isset($_POST['name']) ? mysqli_real_escape_string($db, $_POST['name']) : false;
    $email = isset($_POST['email']) ? mysqli_real_escape_string($db, $_POST['email']) : false;
    $errors = array();
    $save_user = false;

    //Validate name
    if(!empty($name)){
        $validate_name = true;
    }else {
        $validate_name = false;
        $errors['password'] = "The name is empty !";
    }

    //Validate email
    if(!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)){
        $validate_email = true;
    }else {
        $validate_email = false;
        $errors['email'] = "The email is invalid !";
    }


    //Validate name
    if(!empty($name) && !is_numeric($name) && !preg_match("/[0-9]/", $name)){
        $validated_name = true;
    }else {
        $validated_name = false;
        $errors['name'] = "The name only must contain letters and spaces !";
    }

    if(count($errors) == 0){

        //Update user
        $save_user = true;
        $user = $_SESSION['user'];
        $id = $_GET['id'];

        settype($name, 'string');
        settype($email, 'string');
        settype($id, 'integer');

        $sql = sprintf("UPDATE users 
                SET name = '%s', email = '%s'
                WHERE id = %d", $name, $email, $id);

        $save = mysqli_query($db, $sql);

        if($save) {
            $_SESSION['done'] = "User updated !";
        } else {
            $_SESSION['errors']['general'] = "something went wrong ! ";
        }
        header('Location: ../index.php');
    }else {
        
        $_SESSION['errors'] = $errors;
        
        header('Location: ../edit.php?id='. $_GET['id']);
    }
    
}

?>