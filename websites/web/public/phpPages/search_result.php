<?php
require '../connection/connect.php';
require '../queries/queries.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $customerName = $_POST['customerName'];

    $results = searchCustomers($customerName, $databaseConnection);
    if ($results) {
        foreach ($results as $customer) {
            echo '<div class="info"><hr><p>Name: ' . $customer['name'] . '<br>
            Date Of Birth: ' . $customer['birth_date'] . '<br>
            Email: ' . $customer['email'] . '<br>
           Phone Number: ' . $customer['phone_num'] . '<br>
           Status: ' . $customer['status'] . '<br>
            Varified Date: ' . $customer['verified_date'] . '</p><hr></div>';
        }
    } else {
        echo 'No results found.';
    }
}
?>
