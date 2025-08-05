<?php
session_start();
require '../conexion.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login/login.php");
    exit();
}

// Obtener datos del usuario
$stmt = $conn->prepare("SELECT nombre FROM clientes WHERE id_cliente = ?");
$stmt->bind_param("i", $_SESSION['user_id']);
$stmt->execute();
$user = $stmt->get_result()->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>EazyHome</title>
  <link rel="stylesheet" href="sesionactiva.css" />
  <style>
    /* Cambios solicitados */

    .navbar {
      background: linear-gradient(135deg,rgb(255, 255, 255),rgb(234, 234, 234)); /* Fondo morado degradado */
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 15px 20px;
      height: 70px;
      position: sticky;
      top: 0;
      z-index: 100;
    }

    .logo img {
      height: 100px; /* Aumentado de 80px a 100px */
      width: auto;
      object-fit: contain;
    }

    .navbar-menu {
      list-style: none;
      display: flex;
      gap: 25px;
      margin: 0;
      padding: 0;
    }

    .navbar-menu li a {
      color: #5a2d8a;
      text-decoration: none;
      font-weight: bold;
      transition: color 0.3s ease;
    }

    .navbar-menu li a:hover {
      color: #d0b0f0;
    }

    .navbar-toggle {
      display: none;
      background: none;
      border: none;
    }

    @media (max-width: 768px) {
      .navbar-menu {
        display: none;
        flex-direction: column;
        background:rgb(255, 255, 255);
        position: absolute;
        top: 70px;
        right: 0;
        width: 200px;
        padding: 10px;
      }

      .navbar-menu.active {
        display: flex;
      }

      .navbar-toggle {
        display: block;
      }
    }
  </style>
</head>

<body>
  <!-- Barra de navegación -->
  <nav class="navbar">
    <a href="sesionactiva.php" class="logo">
      <img src="logo.png" alt="EAZYHOME">
    </a>
    
    <ul class="navbar-menu">
      <li><a href="sesionactiva.php">Inicio</a></li>
      <li><a href="#servicios">Servicios</a></li>
      <li><a href="#contacto">Contacto</a></li>
      <li><a href="http://localhost/EAZYHOME/logout.php">Cerrar Sesión</a></li>
    </ul>

    <button class="navbar-toggle" aria-label="Menú">
      <span class="hamburger">☰</span>
    </button>
  </nav>

  <!-- Hero Section -->
  <section class="hero">
    <div class="contenido-hero">
      <h1>Bienvenid@, <?= htmlspecialchars($user['nombre']) ?></h1>
      <p>Cotiza y recibe atención rápida y segura.<br>Tu hogar, en buenas manos.</p>
      <a href="../cotiza/cotiza.php">
        <button class="btn-cotizar" id="btnCotizar">Cotizar</button>
      </a> 
    </div>
  </section>

  <!-- Servicios Section -->
  <section class="servicios" id="servicios">
    <h2>Servicios</h2>
    <p>Elige profesionales calificados para resolver desde construcción hasta mudanzas, de forma rápida, segura y eficiente.</p>

    <div class="iconos-servicio">
      <div class="item"><img src="../principal/plumber.png" alt="Plomería"><p>Plomería</p></div>
      <div class="item"><img src="../principal/carpenter.png" alt="Carpintería"><p>Carpintería</p></div>
      <div class="item"><img src="../principal/electrician.png" alt="Electricista"><p>Electricista</p></div>
      <div class="item"><img src="../principal/painter.png" alt="Pintor"><p>Pintor</p></div>
      <div class="item"><img src="../principal/engineer.png" alt="Construcción"><p>Construcción</p></div>
      <div class="item"><img src="../principal/trimming.png" alt="Jardinería"><p>Jardinería</p></div>
      <div class="item"><img src="../principal/janitor.png" alt="Limpieza"><p>Limpieza</p></div>
    </div>
  </section>

  <!-- Garantía Section -->
  <section class="garantia">
    <div class="texto-garantia">
      Garantía del 100%
    </div>
  </section>

  <!-- Beneficios Section -->
  <section class="beneficios">
    <h2>Beneficios de nuestros servicios</h2>
    <div class="tarjetas-beneficio">
      <div class="tarjeta" style="background-color: #e9d2ff">
        <img src="../principal/limpieza.jpg" alt="Limpiador">
        <p><strong>En EazyHome tenemos trabajadores calificados.</strong><br>
        "Más que soluciones, personas en las que puedes confiar."</p>
      </div>
      <div class="tarjeta" style="background-color: #c2f0f0">
        <img src="../principal/carpintero.jpg" alt="carpintero">
        <p><strong>Todos los servicios que necesitas para tu hogar en un solo lugar.</strong><br>
        "Tu hogar merece lo mejor, y nosotros te lo facilitamos."</p>
      </div>
      <div class="tarjeta" style="background-color: #e9d2ff">
        <img src="../principal/jar.jpg" alt="Jardinero">
        <p><strong>Garantía de tu servicio al 100%</strong></p>
      </div>
    </div>
  </section>

  <!-- Reseñas Section -->
  <section class="resenas">
    <h2>Reseñas</h2>
    <div class="tarjetas-resenas">
      <div class="reseña">
        <p>"Excelentes servicios"</p>
        <p>⭐️⭐️⭐️⭐️⭐️</p>
        <div class="autor">
          <img src="../principal/avatar.jpg" alt="Usuario">
          <div>
            <p><strong>Leonardo Felix</strong></p>
            <p>Descripción</p>
          </div>
        </div>
      </div>
      <div class="reseña">
        <p>"Trabajadores preparados"</p>
        <p>⭐️⭐️⭐️⭐️⭐️</p>
        <div class="autor">
          <img src="../principal/avatar.jpg" alt="Usuario">
          <div>
            <p><strong>Gael Perez</strong></p>
            <p>Descripción</p>
          </div>
        </div>
      </div>
      <div class="reseña">
        <p>"Los vuelvo a contratar sin duda"</p>
        <p>⭐️⭐️⭐️⭐️⭐️</p>
        <div class="autor">
          <img src="../principal/avatar.jpg" alt="Usuario">
          <div>
            <p><strong>Kevin Garcia</strong></p>
            <p>Descripción</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer>
    <div class="footer-container">
      <div class="footer-logo">
        <p><strong>EazyHome</strong></p>
        <div class="social-icons">
          <img src="../principal/fb.png" alt="Facebook">
          <img src="../principal/ig.png" alt="Instagram">
          <img src="../principal/mail.png" alt="Correo">
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

  <script src="sesionactiva.js"></script>
  <script>
    // Menú hamburguesa
    document.querySelector('.navbar-toggle').addEventListener('click', function() {
      document.querySelector('.navbar-menu').classList.toggle('active');
      this.classList.toggle('open');
    });
  </script>
</body>
</html>
