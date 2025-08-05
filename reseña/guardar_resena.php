<?php
session_start();
include 'conexion.php';

if (!isset($_SESSION['id_cliente'])) {
    echo "Debes iniciar sesión para enviar una reseña.";
    exit;
}

$id_cliente = $_SESSION['id_cliente'];
$comentario = $_POST['comentario'];
$calificacion = $_POST['calificacion'];

if ($comentario && $calificacion) {
    $stmt = $conexion->prepare("INSERT INTO resenas (id_cliente, comentario, calificacion) VALUES (?, ?, ?)");
    $stmt->bind_param("iss", $id_cliente, $comentario, $calificacion);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "Reseña guardada exitosamente.";
    } else {
        echo "Error al guardar reseña.";
    }

    $stmt->close();
} else {
    echo "Todos los campos son obligatorios.";
}

$conexion->close();
?>
