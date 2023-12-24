<?php
require '../connection/connect.php';
require '../queries/queries.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $customerId = $_POST['customer_id'];
    $result = verifyCustomerRequest($databaseConnection, $customerId);

    if ($result) {
        echo "Customer verified successfully.";
    } else {
        echo "Failed to verify customer.";
    }
}
?>
