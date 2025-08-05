<?php
$conn = new mysqli("localhost", "root", "", "dbeazyhome");

if ($conn->connect_error) {
    die("Error en conexión: " . $conn->connect_error);
}

$conn->set_charset("utf8mb4");
?>