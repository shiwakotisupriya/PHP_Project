<?php
require '../templates/template_function.php';
require '../connection/connect.php';
require '../queries/queries.php';
$title="Costumer RequestPage";
$page = "logout.php";
$pg_title = "Signout";
$home="admin.php";
$about='';
$contact="";

error_reporting(E_ALL);
ini_set('display_errors', 1);

$tab="costumer";

$customers = verifyRequest($databaseConnection,$tab);
$pass='';
if ($customers) {
    foreach ($customers as $customer) {
        $pass.= "Name: " . $customer['name'] . "<br>";
        $pass.= "Email: " . $customer['email'] . "<br>";
        $pass.= "Birth Date: " . $customer['birth_date'] . "<br>";
        $pass.= "Image: " . $customer['image'] . "<br>";
        $pass.= "Phone Number: " . $customer['phone_num'] . "<br>";
        $pass.="<button class='btn_click'  data-action='verify' data-customer-id='" . $customer['customer_id'] . "'>Verify</button>";
        $pass.="<button class='btn_clickk' data-action='decline' data-customer-id='" . $customer['customer_id'] . "'>Decline</button><hr>";
        
    }
} else {
    $pass.= "No customers account request found currently.";
}
$passs = ['pass' => $pass];
$main=mytempletes('account_request.html.php',$passs);
require  '../templates/layout.html.php';
?>
