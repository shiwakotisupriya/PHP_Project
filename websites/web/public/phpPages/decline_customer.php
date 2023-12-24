<?php
require '../connection/connect.php';
require '../queries/queries.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $customerId = $_POST['customer_id'];

    $result = declineCustomerRequest($databaseConnection, $customerId);

    if ($result) {
        echo "Customer request declined successfully.";
    } else {
        echo "Failed to decline customer request.";
    }
}
?>
