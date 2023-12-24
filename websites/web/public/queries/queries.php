<?php
function insert($connect,$table,$name, $email, $dob, $image, $phone, $password) {
   
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $my_queries = $connect->prepare("INSERT INTO ".$table." (name, email, birth_date, image, phone_num, password) VALUES (:name, :email, :birth_date, :image, :phone_num, :password)");

    $my_queries->bindParam(':name', $name);
    $my_queries->bindParam(':email', $email);
    $my_queries->bindParam(':birth_date', $dob);
    $my_queries->bindParam(':image', $image);
    $my_queries->bindParam(':phone_num', $phone);
    $my_queries->bindParam(':password', $hashedPassword);
    $my_queries->execute();
}


function verifyRequest($connect,$table) {
    
        $my_queries = $connect->prepare("SELECT customer_id,name, email, birth_date, image, phone_num FROM ".$table." WHERE status = 0");
        $my_queries->execute();
        $result = $my_queries->fetchAll(PDO::FETCH_ASSOC);
        return $result;
}



function verifyCustomerRequest($connection, $customerId) {
    $verifiedDate = date("Y-m-d H:i:s"); 

    $sql = "UPDATE costumer SET status = 1, verified_date = :verified_date WHERE customer_id = :customer_id";
     $my_queries = $connection->prepare($sql);
     $my_queries->bindParam(':verified_date', $verifiedDate);
     $my_queries->bindParam(':customer_id', $customerId);

    return  $my_queries->execute();
}


function declineCustomerRequest($connection, $customerId) {
    $sql = "DELETE FROM costumer WHERE customer_id = :customer_id";
     $my_queries = $connection->prepare($sql);
     $my_queries->bindParam(':customer_id', $customerId);

    return  $my_queries->execute();
}

function getUserByEmail($connect, $table, $email) {
    $my_query = $connect->prepare("SELECT * FROM ".$table." WHERE email = :email");
    $my_query->bindParam(':email', $email);
    $my_query->execute();
    return $my_query->fetch(PDO::FETCH_ASSOC);
}

function getUserDetails($user_id) {
    global $databaseConnection; 

    $sql = "SELECT * FROM costumer WHERE customer_id = :user_id";
    $stmt = $databaseConnection->prepare($sql);
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);

    if ($stmt->execute()) {
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } else {
        return false;
    }
}


function deleteAccount($connection, $user_id) {
    $query = "DELETE FROM costumer WHERE id = ?";
    $stmt = $connection->prepare($query);
    $stmt->bind_param('i', $user_id);
    $stmt->execute();
    $stmt->close();
}

function searchCustomers($customerName, $pdo) {
        $query = "SELECT * FROM costumer WHERE TRIM(name) LIKE :customerName";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':customerName', $customerName, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

?>