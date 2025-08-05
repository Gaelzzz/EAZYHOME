<?php
require 'conexion.php';

$result = $conn->query("SHOW TABLES");
echo "<h3>Tablas en dbeazyhome:</h3>";
while($row = $result->fetch_array()) {
    echo "- ".$row[0]."<br>";
}

$conn->close();
?>