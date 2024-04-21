<?php 
$conn = new PDO('mysql:host=172.16.0.214;dbname=group14', 'group14', '123456');
if ($database->connect_error){
    die("Connection failed: ".$database->connection_error);
}
?>