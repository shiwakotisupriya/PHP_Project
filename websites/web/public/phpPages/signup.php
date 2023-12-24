<?php
require '../templates/template_function.php';
require '../connection/connect.php';
require '../queries/queries.php';
$title="Costumer SignupPage";
$page="";
$pg_title="";
$home="index.php";
$about="aboutUs.php";
$contact="contact.php";

if (isset($_POST['submit'])) {
    $table="costumer";
    $name = $_POST['name'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];
    $image = $_POST['image']; 
    $phone = $_POST['phone'];
    $password = $_POST['password'];


insert($databaseConnection,$table,$name, $email, $dob, $image, $phone, $password);


$_SESSION['signup_message'] = 'User registered successfully';
header("Location: index.php");
exit;
}



$main=mytempletes('signup.html.php',[]);;
require  '../templates/layout.html.php';
?>