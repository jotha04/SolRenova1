<?php
include("conexion.php");
session_start();

if (!isset($_SESSION['is_logged']) || $_SESSION['is_logged'] != true) {
    echo "<h3 class='bad'>No estás logueado.</h3>";
    exit();
}

$id = $_SESSION['id'];


$fetchUserQuery = "SELECT Usuario, Email FROM usuarios WHERE ID = ?";
$stmt = $conn->prepare($fetchUserQuery);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$userData = $result->fetch_assoc();

$stmt->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Perfil</title>
    <link rel="stylesheet" href="estiloperfil.css">
    
</head>
<body>
    <div class="form-container">
        <h2>Modificar Perfil</h2>
        <form method="POST" action="perfil.php">
            <label for="nombre">Usuario</label>
            <input type="text" id="nombre" name="nombre" required>

            <label for="email">Email</label>
            <input type="text" id="email" name="email" required>

            <label for="contrasena">Contraseña</label>
            <input type="text" id="contrasena" name="contrasena">

            <div class="button-group">
                <button type="submit">Enviar</button>
                <button type="reset">Limpiar</button>
            </div>
        </form>
        <?php
        include("cambiop.php");
        ?>
        <br></br>
        <?php if (isset($mensaje)) { echo $mensaje; } ?>
    </div>
    <a class="regresarinicio " href="index.php">Regresar al inicio</a>
</body>
</html>
