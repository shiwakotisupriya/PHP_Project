<?php
session_start();
require '../templates/template_function.php';
require '../connection/connect.php';
require '../queries/queries.php';
$title="Costumer LoginPage";
$page="";
$pg_title="";
$pass='';
$home="index.php";
$about="aboutUs.php";
$contact="contact.php";
if (isset($_POST['login'])) {
    $username = $_POST["email"];
    $password = $_POST["password"];
    if ($username === "admin@gmail.com" && $password === "admin@123") {
        $pass.= '<script>';
        $pass.= 'window.location.href = "admin.php";';
        $pass.= '</script>';
    } else {
    $table = "costumer";
    $user = getUserByEmail($databaseConnection, $table, $username);

    if ($user && $user['status'] == 1 && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['customer_id'];
        $pass.= '<script>';
        $pass.= 'window.location.href = "dashboard.php";';
        $pass.= '</script>';
    } else {
        $pass.= 'Invalid login credentials';
    }
    }
}


$passs= ['pass' => $pass];
$main=mytempletes('login.html.php',$passs);;
require  '../templates/layout.html.php';
?>