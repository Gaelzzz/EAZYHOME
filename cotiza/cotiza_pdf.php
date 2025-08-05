<?php
session_start();
ob_start(); // Inicia el buffer de salida

require_once '../lib/dompdf/autoload.inc.php';
use Dompdf\Dompdf;

// Verificar sesión activa
if (!isset($_SESSION['email'])) {
    die("No hay sesión activa.");
}

// Obtener datos del formulario
$usuario     = $_SESSION['email'];
$servicio    = $_POST['servicio'] ?? '';
$descripcion = $_POST['descripcion'] ?? '';
$fecha       = $_POST['fecha'] ?? '';
$urgencia    = $_POST['urgencia'] ?? '';
$direccion   = $_POST['direccion'] ?? '';

// Validar campos
if (!$servicio || !$descripcion || !$fecha || !$urgencia || !$direccion) {
    die("Faltan datos obligatorios.");
}

// Conexión a la base de datos
$conn = new mysqli("localhost", "root", "", "dbeazyhome");
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Guardar cotización
$stmt = $conn->prepare("INSERT INTO cotizaciones (usuario_email, servicio, descripcion, fecha, urgencia, direccion_old) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssss", $usuario, $servicio, $descripcion, $fecha, $urgencia, $direccion);

if ($stmt->execute()) {
    $_SESSION['mensaje'] = "¡Gracias! Su cotización será enviada en menos de 24 horas.";
} else {
    $_SESSION['mensaje'] = "Error al guardar la cotización.";
}

$stmt->close();
$conn->close();

// Generar HTML para el PDF
$html = '
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Cotización EazyHome</title>
  <style>
    body { font-family: Arial, sans-serif; padding: 20px; }
    h1 { text-align: center; }
    p { margin: 10px 0; }
  </style>
</head>
<body>
  <h1>Cotización de Servicio</h1>
  <hr>
  <p><strong>Usuario:</strong> ' . htmlspecialchars($usuario) . '</p>
  <p><strong>Servicio:</strong> ' . htmlspecialchars($servicio) . '</p>
  <p><strong>Descripción:</strong><br>' . nl2br(htmlspecialchars($descripcion)) . '</p>
  <p><strong>Fecha solicitada:</strong> ' . htmlspecialchars($fecha) . '</p>
  <p><strong>Urgencia:</strong> ' . htmlspecialchars($urgencia) . '</p>
  <p><strong>Dirección:</strong><br>' . nl2br(htmlspecialchars($direccion)) . '</p>
  <br><br>
  <p style="text-align:center;">Gracias por confiar en EazyHome</p>
</body>
</html>
';

// Limpiar salida previa
ob_end_clean();

// Generar y descargar el PDF
$dompdf = new Dompdf();
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$dompdf->stream("cotizacion_EazyHome.pdf", ["Attachment" => 1]);

exit(); // Importante para evitar conflictos
