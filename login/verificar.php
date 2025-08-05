<?php
session_start();
include '../conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];

    $stmt = $conn->prepare("SELECT id_cliente, correo, contrasena FROM clientes WHERE correo = ?");
    $stmt->bind_param("s", $correo);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows === 1) {
        $usuario = $resultado->fetch_assoc();
        
        if (password_verify($contrasena, $usuario['contrasena'])) {
            $_SESSION['email'] = $usuario['correo'];
            $_SESSION['id'] = $usuario['id_cliente'];
            header("Location: ../sesionactiva/sesionactiva.php");
            exit();
        }
    }

    header("Location: login.php?error=1");
    exit();
} else {
    header("Location: login.php");
    exit();
}
?>