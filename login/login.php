<?php
session_start();
require '../conexion.php';

$error = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['contraseña'];
    
    $stmt = $conn->prepare("SELECT id_cliente, contrasena FROM clientes WHERE correo = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        
        if (password_verify($password, $user['contrasena'])) {
            $_SESSION['user_id'] = $user['id_cliente'];
            $_SESSION['email'] = $email;
            header("Location: ../sesionactiva/sesionactiva.php");
            exit();
        } else {
            $error = "Correo o contraseña incorrectos";
        }
    } else {
        $error = "Correo o contraseña incorrectos";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Eazy Home - Login</title>
  <link rel="stylesheet" href="login.css" />
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet"/>
  <script>
    function togglePassword() {
      const passwordField = document.getElementById('contraseña');
      if (passwordField.type === "password") {
        passwordField.type = "text";
      } else {
        passwordField.type = "password";
      }
    }
  </script>
</head>
<body>
  <!-- Barra de navegación con logo -->
  <nav class="navbar">
    <a href="../principal/principal.php">
      <img src="logo.png" alt="Eazy Home Logo" class="navbar-logo">
    </a>
  </nav>

  <!-- Contenido principal dividido -->
  <div class="container">
    <div class="form-section">
      <div class="form-content">
        <h2>Inicia Sesión en EazyHome</h2>

        <?php if($error): ?>
          <div class="error-message" style="color: red; margin-bottom: 15px; text-align: center;">
            <?php echo $error; ?>
          </div>
        <?php endif; ?>

        <form method="POST" class="form-fields">
          <div class="form-group">
            <label for="email">Correo electrónico</label>
            <input type="email" id="email" name="email" placeholder="ejemplo@email.com" required style="width: 80%;"/>
          </div>

          <div class="form-group password">
            <label for="contraseña">Contraseña</label>
            <input type="password" id="contraseña" name="contraseña" placeholder="Contraseña" required style="width: 80%; padding-right: 35px;"/>
            <span class="toggle-password" onclick="togglePassword()">👁️</span>
          </div>

          <div class="forgot-password">
            <a href="#">¿Olvidaste tu contraseña?</a>
          </div>

          <button type="submit" style="width: 80%;">Iniciar Sesión</button>
        </form>

        <div class="social-buttons">
          <button type="button"><img src="https://cdn-icons-png.flaticon.com/512/145/145802.png" alt="Facebook"></button>
          <button type="button"><img src="https://cdn-icons-png.flaticon.com/512/281/281764.png" alt="Google"></button>
          <button type="button"><img src="https://cdn-icons-png.flaticon.com/512/831/831276.png" alt="Apple"></button>
        </div>

        <div class="signup-link">
          ¿No tienes una cuenta? <a href="../registro/registro.php">Regístrate</a>
        </div>
      </div>
    </div>

    <div class="image-section">
      <img src="login.jpg" alt="Eazy Home Background" />
    </div>
  </div>
</body>
</html>