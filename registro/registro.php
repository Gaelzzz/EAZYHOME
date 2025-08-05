<?php
session_start();
require '../conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];
    $fecha_nacimiento = $_POST['fecha'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    
    try {
        $stmt = $conn->prepare("INSERT INTO clientes (nombre, apellido, telefono, correo, fecha_nacimiento, contrasena) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $nombre, $apellidos, $telefono, $email, $fecha_nacimiento, $password);
        
        if ($stmt->execute()) {
            // Obtener el ID del nuevo usuario registrado
            $user_id = $stmt->insert_id;
            
            // Crear sesión directamente
            $_SESSION['user_id'] = $user_id;
            $_SESSION['email'] = $email;
            $_SESSION['nombre'] = $nombre;
            
            // Redirigir al área privada
            header("Location: ../sesionactiva/sesionactiva.php");
            exit();
        }
    } catch (Exception $e) {
        $error = strpos($e->getMessage(), 'Duplicate entry') !== false 
               ? "El correo ya está registrado" 
               : "Error en el registro. Intente nuevamente";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro - EAZYHOME</title>
  <link rel="stylesheet" href="registro.css">
</head>
<body>
  <!-- Barra de navegación -->
  <nav class="navbar">
    <a href="../principal/principal.php">
      <img src="imagen registro/logo.png" alt="EAZYHOME Logo" class="navbar-logo">
    </a>
  </nav>

  <!-- Contenedor principal -->
  <div class="container">
    <!-- Sección izquierda con imagen -->
    <div class="left" style="background-image: url('imagen registro/registro.jpg')"></div>
    
    <!-- Sección derecha con formulario -->
    <div class="right">
      <h1>Registro de Usuario</h1>
      
      <?php if(isset($error)): ?>
        <div class="error-message"><?= $error ?></div>
      <?php endif; ?>

      <form method="POST">
        <label for="nombre">Nombre</label>
        <input type="text" id="nombre" name="nombre" placeholder="Inserta nombre" required>

        <label for="apellidos">Apellido</label>
        <input type="text" id="apellidos" name="apellidos" placeholder="Inserta apellidos" required>

        <label for="telefono">Teléfono</label>
        <input type="tel" id="telefono" name="telefono" placeholder="+52" required>

        <label for="email">Correo electrónico</label>
        <input type="email" id="email" name="email" placeholder="Inserta correo electrónico" required>

        <label for="fecha">Fecha de nacimiento</label>
        <input type="date" id="fecha" name="fecha" required>

        <label for="password">Contraseña</label>
        <input type="password" id="password" name="password" placeholder="Inserta 8 caracteres" minlength="8" required>

        <div class="checkbox">
          <input type="checkbox" id="condiciones" required>
          <label for="condiciones">Acepto que mis datos sean usados.</label>
        </div>

        <button class="btn" id="btnRegistrar" type="submit" disabled>Registrarse</button>
      </form>
    </div>
  </div>

  <script src="script.js"></script>
</body>
</html>