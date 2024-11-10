<?php
session_start();


include('conexion.php');

if (isset($_SESSION['id_usuario'])) {
    $id_usuario = $_SESSION['id_usuario'];

 
    $stmt = $conn->prepare("UPDATE usuarios SET UltimoCierreSesion = NOW() WHERE Id = ?");
    $stmt->bind_param("i", $id_usuario);

  
    $stmt->execute();
    $stmt->close();
}


$_SESSION = array();


session_destroy();

$conn->close();

header("Location: http://localhost/SolRenova1/index.php");
exit;
?>
