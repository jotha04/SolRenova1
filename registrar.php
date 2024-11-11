<!DOCTYPE html>
<html lang="en">
<head>
    <title>Registrarse - SOL-RENOVA</title>
    <link rel="stylesheet" href="login_regis.css">
      
</head>
<body>
    <form method="post">
        <input type="text" name="usuario" placeholder="Ingrese el usuario" required="">
        <input type="email" name="email" placeholder="Ingrese el email" required>
        <input type="password" name="contrasena" placeholder="Ingrese la contraseña" required>
        <input type="submit" name="enviar" id="mandar">
        <br></br>
        <center> <p style="color:white">¿Ya tienes cuenta? <a style="color:white;"   href="login.php">Inicia sesión</a></p></center>
        <br><br>
        <?php
    include("insertar.php");
    ?>
    </form>
    <a class="regresarinicio " href="index.php">Regresar al inicio</a>
</body>
</html>