<?php
// Verificar si la sesión ya está iniciada
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include("conexion.php");

// Verificamos si el usuario está logueado
if (!isset($_SESSION['is_logged']) || $_SESSION['is_logged'] != true) {
    echo "<h3 class='bad'>No estás logueado.</h3>";
    exit();
}

$id = $_SESSION['id'];

// Si se envió el formulario de actualización
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = trim($_POST['nombre']);
    $email = trim($_POST['email']);
    $contrasena = trim($_POST['contrasena']);

    // Si la contraseña es nueva, la encriptamos
    if (!empty($contrasena)) {
        $contrasena = password_hash($contrasena, PASSWORD_DEFAULT);
        $updateQuery = "UPDATE usuarios SET Usuario = ?, Email = ?, Contrasena = ? WHERE ID = ?";
        $stmt = $conn->prepare($updateQuery);
        $stmt->bind_param("sssi", $nombre, $email, $contrasena, $id);
    } else {
        $updateQuery = "UPDATE usuarios SET Usuario = ?, Email = ? WHERE ID = ?";
        $stmt = $conn->prepare($updateQuery);
        $stmt->bind_param("ssi", $nombre, $email, $id);
    }

    if ($stmt->execute()) {
        // Actualizamos la sesión con los nuevos datos
        $_SESSION['username'] = $nombre;
        $_SESSION['email'] = $email;

        $mensaje = "<div class='success-message'>Perfil actualizado exitosamente.</div>";
    } else {
        $mensaje = "<div class='error-message'>Error al actualizar el perfil.</div>";
    }

    $stmt->close();
}

$conn->close();
?>
