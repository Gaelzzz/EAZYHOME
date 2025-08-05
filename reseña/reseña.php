<?php
session_start();
include 'conexion.php';

// Obtener reseñas desde la base de datos
$sql = "SELECT r.comentario, r.calificacion, r.fecha, c.nombre, c.apellido 
        FROM resenas r
        JOIN clientes c ON r.id_cliente = c.id_cliente
        ORDER BY r.fecha DESC";

$resultado = $conexion->query($sql);
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Reseñas - EazyHome</title>
  <link rel="stylesheet" href="principal.css" />
</head>
<body>

  <!-- ENCABEZADO -->
  <header>
    <div class="logo">
      <a href="principal.html"><img src="logo.png" alt="Logo EazyHome"></a>
    </div>
    <div class="acciones">
      <a href="login.html">
        <button class="btn-login">Inicio de Sesión</button>
      </a> 
      <a href="index.html">
        <button class="btn-register">Registrarse</button>
      </a>    
    </div>
  </header>

  <!-- SECCIÓN DE RESEÑAS -->
  <section class="reseñas">
    <h2>Reseñas de Usuarios</h2>
    <div class="tarjetas-reseñas">
      <?php
      if ($resultado->num_rows > 0) {
        while ($fila = $resultado->fetch_assoc()) {
          echo '<div class="reseña">';
          echo '<p>"' . htmlspecialchars($fila["comentario"]) . '"</p>';
          echo '<p>' . $fila["calificacion"] . '</p>';
          echo '<div class="autor">';
          echo '<img src="avatar.jpg" alt="Usuario">';
          echo '<div>';
          echo '<p><strong>' . htmlspecialchars($fila["nombre"]) . ' ' . htmlspecialchars($fila["apellido"]) . '</strong></p>';
          echo '<p>' . date('d-m-Y', strtotime($fila["fecha"])) . '</p>';
          echo '</div></div></div>';
        }
      } else {
        echo "<p style='text-align:center;'>No hay reseñas aún.</p>";
      }
      ?>
    </div>

    <!-- FORMULARIO PARA NUEVA RESEÑA -->
    <?php if (isset($_SESSION['id_cliente'])): ?>
      <div style="margin-top: 50px; text-align: center;">
        <h2>Escribe tu reseña</h2>
        <form action="guardar_resena.php" method="POST" style="max-width: 500px; margin: 0 auto; text-align: left;">
          <label for="calificacion">Calificación:</label><br>
          <select id="calificacion" name="calificacion" required style="width: 100%; padding: 10px; margin-bottom: 15px;">
            <option value="">Selecciona</option>
            <option value="⭐️">⭐️</option>
            <option value="⭐️⭐️">⭐️⭐️</option>
            <option value="⭐️⭐️⭐️">⭐️⭐️⭐️</option>
            <option value="⭐️⭐️⭐️⭐️">⭐️⭐️⭐️⭐️</option>
            <option value="⭐️⭐️⭐️⭐️⭐️">⭐️⭐️⭐️⭐️⭐️</option>
          </select><br>

          <label for="comentario">Comentario:</label><br>
          <textarea id="comentario" name="comentario" rows="4" required style="width: 100%; padding: 10px; margin-bottom: 20px;"></textarea><br>

          <button class="btn-cotizar" type="submit">Enviar Reseña</button>
        </form>
      </div>
    <?php else: ?>
      <p style="text-align: center; margin-top: 40px;">Debes <a href="login.html">iniciar sesión</a> para escribir una reseña.</p>
    <?php endif; ?>

    <!-- Botón para volver -->
    <div style="text-align:center; margin-top: 40px;">
      <a href="principal.html">
        <button class="btn-cotizar">← Volver a Inicio</button>
      </a>
    </div>
  </section>

  <!-- FOOTER -->
  <footer>
    <div class="footer-container">
      <div class="footer-logo">
        <p><strong>EazyHome</strong></p>
        <div class="social-icons">
          <img src="img/fb.png" alt="Facebook">
          <img src="img/ig.png" alt="Instagram">
          <img src="img/mail.png" alt="Correo">
        </div>
      </div>
      <div class="footer-links">
        <a href="#">Términos y condiciones</a>
        <a href="#">Legal</a>
        <a href="#">Contacto</a>
        <a href="#">Política de privacidad</a>
      </div>
      <div class="footer-btn">
        <button class="btn-arrow">↗</button>
      </div>
    </div>
  </footer>
</body>
</html>
