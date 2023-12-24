<?php
session_start();
require '../templates/template_function.php';
require '../connection/connect.php';
require '../queries/queries.php';

if (!isset($_SESSION['user_id'])) {
    
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$userDetails = getUserDetails($user_id);

if (!$userDetails) {

    die("Error fetching user details");
}

$title = "Customer Profile";
$page = "logout.php";
$pg_title = "Signout";
$home="dashboard.php";
$about="";
$contact="";


$name = $userDetails['name'];
$email = $userDetails['email'];
$dob = $userDetails['birth_date'];
$phone = $userDetails['phone_num'];

$pass = [
    'name' => $name,
    'email' => $email,
    'birth_date' => $dob,
    'phone_num' => $phone,
];



if (isset($_POST['button'])) {
    if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
        $name = $_POST['editName'];
        $email = $_POST['editEmail'];
        $dob = $_POST['editDob'];
        $phone = $_POST['editPhone'];

        $sql = "UPDATE costumer SET name=:name, email=:email, birth_date=:dob, phone_num=:phone WHERE customer_id=:user_id";
        $stmt = $databaseConnection->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':dob', $dob);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            header('Location: info.php');
        } else {
            $pass.= "Error updating profile: " . $stmt->errorInfo()[2];
        }
    }
}
if (isset($_POST['delete'])) {
    if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
        $stmt = $databaseConnection->prepare("DELETE FROM costumer WHERE customer_id = :user_id");

        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);

        $success=$stmt->execute();

        if($success){
        echo '<script>
        window.location.href = "index.php";
        </script>';
        }
    }}



$passs = ['pass' => $pass];

$main = mytempletes('info.html.php', $passs);
require '../templates/layout.html.php';
?>
