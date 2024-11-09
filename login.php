<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login - SOL-RENOVA</title>
    <link href="estilo.css">
</head>
<body>
    <form method="post">
        <input type="text" name="usuario" placeholder="Ingrese el usuario" required="">
        <input type="password" name="contrasena" placeholder="Ingrese la contraseña" required>
        <input type="submit" name="enviar" id="mandar">
    </form>
    
    <?php
    include("consultaruser.php");
    if(!empty($_SESSION['is_logged']) && $_SESSION['is_logged']){   
        echo('<script>window.location.replace("http://localhost/coneplit/index.php")</script>');
       }
    ?>
    <br>
    <a class="regresarinicio " href="index.php">Inicio</a>
</body>
</html>