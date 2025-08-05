<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Registro de Usuario</title>
  <link rel="stylesheet" href="estilos.css" />
</head>
<body>
  <!-- Barra de navegación con logo -->
  <nav class="navbar">
    <img src="logo.png" alt="Eazy Home Logo" class="navbar-logo">
  </nav>

  <div class="container">
    <div class="left"></div>

    <div class="right">
      <h1>Registro de Usuario</h1>

      <!-- FORMULARIO MODIFICADO CON ACTION Y METHOD -->
      <form action="guardar.php" method="POST">
        <label for="nombre">Nombre</label>
        <input type="text" id="nombre" name="nombre" placeholder="Inserta nombre" required />

        <label for="apellidos">Apellido</label>
        <input type="text" id="apellidos" name="apellido" placeholder="Inserta apellidos" required />

        <label for="telefono">Teléfono</label>
        <input type="tel" id="telefono" name="telefono" placeholder="+52" required />

        <label for="email">Correo electrónico</label>
        <input type="email" id="email" name="correo" placeholder="Inserta correo electrónico" required />

        <label for="fecha">Fecha de nacimiento</label>
        <input type="date" id="fecha" name="fecha_nacimiento" required />

        <label for="password">Contraseña</label>
<input type="password" id="password" name="contrasena" placeholder="Inserta 8 caracteres" required />


        <div class="checkbox">
          <input type="checkbox" id="condiciones" required />
          <label for="condiciones">Acepto que mis datos sean usados.</label>
        </div>

        <button class="btn" id="btnRegistrar" type="submit">Registrarse</button>
      </form>
    </div>
  </div>

  <script src="script.js"></script>
</body>
</html>