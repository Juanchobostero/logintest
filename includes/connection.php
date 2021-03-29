<?php 

//Connection to BD 'logintestdb'
$server = 'localhost';
$username = 'root';
$password = '';
$database = 'logintestdb';
$db = mysqli_connect($server, $username, $password, $database);

mysqli_query($db, "SET NAMES 'utf8'");

if(isset($_SESSION['error_login'])){
    unset($_SESSION['error_login']);
}

session_start();