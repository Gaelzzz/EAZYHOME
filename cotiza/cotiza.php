<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: ../login/login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>EazyHome - Agendar cita</title>
  <link rel="stylesheet" href="cotiza.css">
  <style>
    .mensaje {
      color: green;
      font-weight: bold;
      margin-bottom: 10px;
      animation: fadeout 4s forwards;
    }
    @keyframes fadeout {
      0% { opacity: 1; }
      90% { opacity: 1; }
      100% { opacity: 0; display: none; }
    }
  </style>
</head>
<body>

  <!-- Barra de navegación -->
  <nav class="navbar">
    <a href="http://localhost/EAZYHOME/sesionactiva/sesionactiva.php">
      <img src="logo.png" alt="Eazy Home Logo" class="navbar-logo">
    </a>
  </nav>

  <div class="container">
    <div class="left"></div>
    <div class="right">
      <h2>Agendar cita</h2>

      <!-- Mensaje de confirmación -->
      <?php if (isset($_SESSION['mensaje'])): ?>
        <p class="mensaje"><?= htmlspecialchars($_SESSION['mensaje']) ?></p>
        <?php unset($_SESSION['mensaje']); ?>
      <?php endif; ?>

      <!-- FORMULARIO que abre en nueva pestaña -->
      <form method="POST" action="cotiza_pdf.php" target="_blank">

        <label for="servicio">Servicios</label>
        <select id="servicio" name="servicio" required>
          <option value="" disabled selected>Selecciona servicio</option>
          <option value="plomeria">Plomería</option>
          <option value="electricidad">Electricidad</option>
          <option value="pintura">Pintura</option>
          <option value="limpieza">Limpieza</option>
        </select>

        <label for="descripcion">Descripción del trabajo</label>
        <textarea id="descripcion" name="descripcion" placeholder="Descripción del trabajo..." required></textarea>

        <label for="fecha">Fecha</label>
        <input type="date" id="fecha" name="fecha" required>

        <label for="urgencia">Selector de urgencia</label>
        <select id="urgencia" name="urgencia" required>
          <option value="urgente">Urgente</option>
          <option value="normal">Normal</option>
          <option value="sin-prisa">Sin prisa</option>
        </select>

        <label for="direccion">Dirección</label>
        <textarea id="direccion" name="direccion" placeholder="Ej. Calle, número, colonia, ciudad, estado, código postal" required></textarea>

        <div class="checkbox-container">
          <input type="checkbox" id="acepto" name="acepto" value="1" required>
          <label for="acepto">Acepto que mis datos sean usados para cotizar el servicio solicitado.</label>
        </div>

        <button type="submit" class="btn-cotizacion">Solicitar cotización</button>
      </form>

    </div>
  </div>

  <script src="cotiza.js"></script>
</body>
</html>
