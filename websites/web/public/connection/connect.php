<?php

$server = 'mysql';  
$host = 'v.je'; 
$password = 'v.je'; 
$database = 'website';  

$databaseConnection = new PDO('mysql:dbname=' . $database . ';host=' . $server, $host, $password);

?>
