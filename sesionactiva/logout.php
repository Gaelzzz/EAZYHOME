<?php
session_start();
session_unset();
session_destroy();

// Redirección relativa garantizada
header("Location: ../principal/principal.php");
exit();
?>