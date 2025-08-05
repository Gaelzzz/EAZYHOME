<?php
session_start();
if (isset($_SESSION['user_id'])) {
    header("Location: sesionactiva/sesionactiva.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>EazyHome</title>
  <link rel="stylesheet" href="principal.css" />
</head>
<body>
  <!-- HEADER ORIGINAL (igual que tu versión) -->
  <header>
    <div class="logo">
      <img src="logo.png" alt="Logo EazyHome">
    </div>
    <div class="acciones">
      <a href="../login/login.php">
        <button class="btn-login">Inicio de Sesión</button>
      </a> 
      <a href="../registro/registro.php">
        <button class="btn-register">Registrarse</button>
      </a>    
    </div>
  </header>

  <!-- HERO SECTION ORIGINAL -->
  <section class="hero">
    <div class="contenido-hero">
      <h1>Conoce nuestros servicios</h1>
      <p>Cotiza y recibe atención rápida y segura.<br>Tu hogar, en buenas manos.</p>
      <a href="../cotiza/cotiza.php">
        <button class="btn-cotizar" id="btnCotizar">Cotizar</button>
      </a> 
    </div>
  </section>

  <!-- SERVICIOS SECTION ORIGINAL -->
  <section class="servicios">
    <h2>Servicios</h2>
    <p>Elige profesionales calificados para resolver desde construcción hasta mudanzas, de forma rápida, segura y eficiente.</p>

    <div class="iconos-servicio">
      <div class="item"><img src="plumber.png"><p>Plomería</p></div>
      <div class="item"><img src="carpenter.png"><p>Carpintería</p></div>
      <div class="item"><img src="electrician.png"><p>Electricista</p></div>
      <div class="item"><img src="painter.png"><p>Pintor</p></div>
      <div class="item"><img src="engineer.png"><p>Construcción</p></div>
      <div class="item"><img src="trimming.png"><p>Jardinería</p></div>
      <div class="item"><img src="janitor.png"><p>Limpieza</p></div>
    </div>
  </section>

  <!-- GARANTÍA SECTION ORIGINAL -->
  <section class="garantia">
    <div class="texto-garantia">
      Garantía del 100%
    </div>
  </section>

  <!-- BENEFICIOS SECTION ORIGINAL -->
  <section class="beneficios">
    <h2>Beneficios de nuestros servicios</h2>
    <div class="tarjetas-beneficio">
      <div class="tarjeta" style="background-color: #e9d2ff">
        <img src="limpieza.jpg" alt="Limpiador">
        <p><strong>En EazyHome tenemos trabajadores calificados.</strong><br>
        "Más que soluciones, personas en las que puedes confiar."</p>
      </div>
      <div class="tarjeta" style="background-color: #c2f0f0">
        <img src="carpintero.jpg" alt="carpintero">
        <p><strong>Todos los servicios que necesitas para tu hogar en un solo lugar.</strong><br>
        "Tu hogar merece lo mejor, y nosotros te lo facilitamos."</p>
      </div>
      <div class="tarjeta" style="background-color: #e9d2ff">
        <img src="jar.jpg" alt="Jardinero">
        <p><strong>Garantía de tu servicio al 100%</strong></p>
      </div>
    </div>
  </section>

  <!-- RESEÑAS SECTION ORIGINAL -->
  <section class="resenas">
    <h2>Reseñas</h2>
    <div class="tarjetas-resenas">
      <div class="reseña">
        <p>"Excelentes servicios"</p>
        <p>⭐️⭐️⭐️⭐️⭐️</p>
        <div class="autor">
          <img src="avatar.jpg" alt="Usuario">
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
          <img src="avatar.jpg" alt="Usuario">
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
          <img src="avatar.jpg" alt="Usuario">
          <div>
            <p><strong>Kevin Garcia</strong></p>
            <p>Descripción</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- FOOTER ORIGINAL -->
  <footer>
    <div class="footer-container">
      <div class="footer-logo">
        <p><strong>EazyHome</strong></p>
      </div>
    </div>
  </footer>
</body>
</html>