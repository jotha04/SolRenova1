<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login - SOL-RENOVA</title>
    <link rel="stylesheet" href="login_regis.css">
</head>
<body>
    <form method="post">
        <input type="text" name="usuario" placeholder="Ingrese el usuario" required="">
        <input type="password" name="contrasena" placeholder="Ingrese la contraseña" required>
        <input type="submit" name="enviar" id="mandar">
        <br></br>
       <center> <p style="color:white">¿No tienes cuenta? <a style="color:#000000; font-weight: bold;"   href="registrar.php">Regístrate</a></p></center>
    </form>
    
    <?php
    include("consultaruser.php");
    if(!empty($_SESSION['is_logged']) && $_SESSION['is_logged']){   
        echo('<script>window.location.replace("http://localhost/SolRenova1/index.php")</script>');
       }
    ?>
    <br>
    <a class="regresarinicio " href="index.php">Regresar al inicio</a>
</body>
</html>