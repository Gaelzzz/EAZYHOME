<?php
session_start();
include '../conexion.php';

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->error);
}

// Seleccionar la base de datos correcta
if (!$conn->select_db('dbeazyhome')) {
    die("Error seleccionando base de datos: " . $conn->error);
}

// Validar datos
$required = ['nombre', 'apellido', 'correo', 'contrasena', 'fecha_nacimiento'];
foreach ($required as $field) {
    if (empty($_POST[$field])) {
        die(json_encode(['error' => "El campo $field es requerido"]));
    }
}

// Preparar datos
$nombre = $conn->real_escape_string(trim($_POST['nombre']));
$apellido = $conn->real_escape_string(trim($_POST['apellido']));
$telefono = !empty($_POST['telefono']) ? $conn->real_escape_string(trim($_POST['telefono'])) : NULL;
$correo = filter_var(trim($_POST['correo']), FILTER_VALIDATE_EMAIL);
$fecha = $_POST['fecha_nacimiento'];
$contrasena = password_hash($_POST['contrasena'], PASSWORD_DEFAULT);
$direccion = !empty($_POST['direccion']) ? $conn->real_escape_string(trim($_POST['direccion'])) : NULL;

if (!$correo) {
    die(json_encode(['error' => 'Correo no válido']));
}

// Verificar correo único
$check = $conn->prepare("SELECT id_cliente FROM clientes WHERE correo = ?");
$check->bind_param("s", $correo);
$check->execute();

if ($check->get_result()->num_rows > 0) {
    die(json_encode(['error' => 'El correo ya está registrado']));
}

// Insertar registro (IMPORTANTE: no incluir id_cliente)
$sql = "INSERT INTO clientes (nombre, apellido, telefono, correo, fecha_nacimiento, contrasena, direccion) 
        VALUES (?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
if (!$stmt) {
    die(json_encode(['error' => 'Error preparando consulta: ' . $conn->error]));
}

$stmt->bind_param("sssssss", $nombre, $apellido, $telefono, $correo, $fecha, $contrasena, $direccion);

if ($stmt->execute()) {
    // Éxito
    $_SESSION['email'] = $correo;
    $_SESSION['id'] = $stmt->insert_id;
    header('Location: ../sesionactiva/sesionactiva.php');
    exit();
} else {
    // Manejo específico de errores
    if ($conn->errno == 1062) {
        // Esto no debería ocurrir si seguiste los pasos anteriores
        die(json_encode(['error' => 'Error crítico: Contacta al administrador (Código: DB-1062)']));
    } else {
        die(json_encode(['error' => 'Error en el registro: ' . $conn->error]));
    }
}

$stmt->close();
$conn->close();
?>