<?php
session_start();
require '../connection/connect.php';

if (isset($_POST['button'])) {
    if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];

        $name = $_POST['editName'];
        $email = $_POST['editEmail'];
        $dob = $_POST['editDob'];
        $phone = $_POST['editPhone'];
        $sql = "UPDATE customer SET name=?, email=?, birth_date=?, phone_num=? WHERE customer_id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssi", $name, $email, $dob, $phone, $user_id);

        if ($stmt->execute()) {
            header('Location: info.php');
            exit();
        } else {
            echo "Error updating profile: " . $stmt->error;
        }

        $stmt->close();
    } else {
        
        echo "User ID not found in session";
    }
} else {
    http_response_code(405); 
    echo "Method Not Allowed";
}
?>
