<?php
// Verificar si se envió el formulario para actualizar
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $contrasena = $_POST['contrasena'];

    // Aquí deberías agregar el código para guardar los cambios en la base de datos
    echo "<script>alert('Perfil actualizado exitosamente');</script>";
}
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
            <input type="text" id="contrasena" name="contrasena" required>

            <div class="button-group">
                <button type="submit">Enviar</button>
                <button type="reset">Limpiar</button>
            </div>
        </form>
    </div>
    <a class="regresarinicio " href="index.php">Regresar al inicio</a>
</body>
</html>
