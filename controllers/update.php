<?php 
require_once '../includes/connection.php';

if(isset($_POST)){

    //Data from form
    $name = isset($_POST['name']) ? mysqli_real_escape_string($db, $_POST['name']) : false;
    $email = isset($_POST['email']) ? mysqli_real_escape_string($db, $_POST['email']) : false;
    
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

    $save_user = false;

    if(count($errors) == 0){

        
        //Update user
        $save_user = true;
        
        $user = $_SESSION['user'];

        $sql = "UPDATE users 
                SET name = '$name', email = '$email'
                WHERE id =" . $_GET['id'];

        $save = mysqli_query($db, $sql);

        if($save) {
            
            $_SESSION['done'] = "User updated !";
        } else {
            $_SESSION['errors']['general'] = "something went wrong ! ";
        }
        header('Location: ../index.php');
    }else {
        
        $_SESSION['errors'] = $errors;
        
        header('Location: ../edit.php');
    }
    
}

?>