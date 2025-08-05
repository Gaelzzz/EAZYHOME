<?php
function iniciarSesion() {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
}

function estaLogueado() {
    iniciarSesion();
    return isset($_SESSION['email']);
}

function redirigirSiNoLogueado($ruta = 'login/login.php') {
    if (!estaLogueado()) {
        header("Location: ../$ruta");
        exit();
    }
}
?>
