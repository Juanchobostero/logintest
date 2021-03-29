<?php 
require_once 'connection.php'; 
require_once 'helpers.php'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="description" content="">
  <meta name="author" content="">
  <!-- estilos -->
  <link rel="stylesheet" href="assets/styles.css">

  <title>LOGIN - PRUEBA</title>
  
</head>

<body class="container">

    <section class="header">
        <div class="title">
            <h3>LoginTEST</h3>
        </div>

        <?php if(isset($_SESSION['user'])):?>
            <div class="info-user">
            <h4 href="#">User: <?=$_SESSION['user']['name']?></h4>
            <hr>
            <button onclick="logout()" class="logout">Logout</button>
        </div>

        <?php else: ?>
            <div class="info-user">
            <h4 href="#">NO LOGIN</h4>
        <?php endif; ?>
        
    </section>