<?php
$servername = "localhost";
$username = "root";
$password = "elpeor04";
$database = "bd_coneplit";


$conn = new mysqli($servername, $username, $password, $database);


if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>