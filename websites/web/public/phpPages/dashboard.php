<?php
session_start();
require '../templates/template_function.php';
require '../connection/connect.php';
require '../queries/queries.php';
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
$title="Costumer DashBoard";
$page="info.php";
$pg_title="Profile";
$home="";
$pass= "";
$about="";
$contact="";
$user_id = $_SESSION['user_id'];
$userDetails = getUserDetails($user_id); 

if ($userDetails) {
    $pass.=  json_encode(
    $userDetails['name']
    );
} else {
    $pass.=  json_encode(['error' => 'Error fetching user details']);
}

$passs= ['pass' => $pass];

$main=mytempletes('dashboard.html.php',$passs);
require  '../templates/layout.html.php';

?>