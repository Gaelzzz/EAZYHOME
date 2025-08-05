<?php
session_start();
ini_set('display_errors', 1);  // Mostrar errores
error_reporting(E_ALL);         // Mostrar todos los errores

$mensaje = "";

if (!isset($_SESSION['email'])) {
    header("Location: ../login/login.php");
    exit();
}

// Verificar la conexión a la base de datos
$conn = new mysqli("localhost", "root", "", "dbeazyhome");  // Cambiar 'eazyhome' por 'dbeazyhome'


if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
} else {
    echo "Conexión exitosa a la base de datos!"; // Esto solo para verificar
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_POST['acepto'])) {
        $mensaje = "Debes aceptar el uso de datos para continuar.";
    } else {
        $servicio = $_POST['servicio'] ?? '';
        $descripcion = $_POST['descripcion'] ?? '';
        $fecha = $_POST['fecha'] ?? '';
        $urgencia = $_POST['urgencia'] ?? '';
        $direccion = $_POST['direccion'] ?? '';
        $usuario = $_SESSION['email'];

        if ($servicio && $descripcion && $fecha && $urgencia && $direccion) {
            // Insertar en cotizaciones
            $stmt = $conn->prepare("INSERT INTO cotizaciones (usuario_email, servicio, descripcion, fecha, urgencia, direccion_old) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssssss", $usuario, $servicio, $descripcion, $fecha, $urgencia, $direccion);

            if ($stmt->execute()) {
                $mensaje = "¡Gracias! Su cotización será enviada en menos de 24 horas.";
            } else {
                $mensaje = "Error al guardar: " . $conn->error;
            }

            $stmt->close();
            $conn->close();
        } else {
            $mensaje = "Por favor completa todos los campos.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>EazyHome - Agendar cita</title>
  <link rel="stylesheet" href="cotiza.css">
  <script>
    function redirigir() {
      setTimeout(function() {
        window.location.href = "http://localhost/EAZYHOME/sesionactiva/sesionactiva.php"; // Redirige después de que el mensaje haya sido cerrado
      }, 2000); // Redirige después de 2 segundos
    }
  </script>
</head>
<body>

  <!-- Barra de navegación con logo (redirige a sesionactiva.php) -->
  <nav class="navbar">
    <a href="http://localhost/EAZYHOME/sesionactiva/sesionactiva.php">
      <img src="logo.png" alt="Eazy Home Logo" class="navbar-logo">
    </a>
  </nav>

  <!-- Contenido dividido en dos columnas -->
  <div class="container">
    <div class="left"></div>
    <div class="right">
      <h2>Agendar cita</h2>

      <form method="POST" action="">

        <!-- Campo de servicio -->
        <label for="servicio">Servicios</label>
        <select id="servicio" name="servicio" required>
          <option value="" disabled selected>Selecciona servicio</option>
          <option value="plomeria">Plomería</option>
          <option value="electricidad">Electricidad</option>
          <option value="pintura">Pintura</option>
          <option value="limpieza">Limpieza</option>
        </select>

        <!-- Descripción del trabajo -->
        <label for="descripcion">Descripción del trabajo</label>
        <textarea id="descripcion" name="descripcion" placeholder="Descripción del trabajo..." required></textarea>

        <!-- Fecha del trabajo -->
        <label for="fecha">Fecha</label>
        <input type="date" id="fecha" name="fecha" required>

        <!-- Urgencia -->
        <label for="urgencia">Selector de urgencia</label>
        <select id="urgencia" name="urgencia" required>
          <option value="urgente">Urgente</option>
          <option value="normal">Normal</option>
          <option value="sin-prisa">Sin prisa</option>
        </select>

        <!-- Dirección -->
        <label for="direccion">Dirección</label>
        <textarea id="direccion" name="direccion" placeholder="Ej. Calle, número, colonia, ciudad, estado, código postal" required></textarea>

        <!-- Aceptación de términos -->
        <div class="checkbox-container">
          <input type="checkbox" id="acepto" name="acepto" value="1" required>
          <label for="acepto">Acepto que mis datos sean usados para cotizar el servicio solicitado.</label>
        </div>

        <!-- Botón para enviar el formulario -->
        <button type="submit" class="btn-cotizacion">Solicitar cotización</button>
      </form>
      
      <!-- Mostrar el mensaje de confirmación -->
      <?php if ($mensaje): ?>
        <p style="color: green; font-weight: bold;"><?= htmlspecialchars($mensaje) ?></p>
        <script>redirigir();</script> <!-- Llamada a la función de redirección -->
      <?php endif; ?>
      
    </div>
  </div>

  <script src="cotiza.js"></script>
</body>
</html>
