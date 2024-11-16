<?php
include("conexion.php");

if(isset($_POST['enviar'])){
    if(strlen($_POST['usuario'])>=5 && strlen($_POST['email']) >=5 && strlen($_POST['contrasena']) >=5){
        $user=trim($_POST['usuario']);
        $email=trim($_POST['email']);
        $pass=trim($_POST['contrasena']);

        $probarUser ="SELECT Usuario FROM usuarios WHERE Usuario='$user'";
        $solicitudUsuario= mysqli_query($conn, $probarUser);

        $probarEmail ="SELECT Email FROM usuarios WHERE Email='$email'";
        $solicitudEmail= mysqli_query($conn, $probarEmail);

        $fila1 = mysqli_num_rows($solicitudUsuario);
        $fila2 = mysqli_num_rows($solicitudEmail);

        if ($fila1 > 0){
            ?>
            <h3 class="bad"> Este usuario ya existe en la base de datos</h3>
            <?php

        }else if($fila2 > 0 ){
        ?>
       <h3 class="bad">Este correo ya existe en la base de datos</h3>
       <?php

        }else{
            $hashContrasena = password_hash($pass, PASSWORD_BCRYPT);
            $solicitud = "INSERT INTO usuarios(Usuario, Email, Contrasena, Admin, TipoUsuario) VALUES ('$user', '$email', '$hashContrasena', 0, 'Usuario')";
            $respuesta =mysqli_query($conn, $solicitud);
            if ($respuesta){
              ?>
              <h3 class="ok" style="color:white"> Usuario creado correctamente</h3>
              <?php
            }
        }

    }else{
        ?>
        <h3 class="bad"> Los campos deben ser mayor o igual a 5 digitos</h3>
        <?php
    }
    
}
mysqli_close($conn);

?>