<?php
include("conexion.php");
session_start();
if(isset($_POST['enviar'])){
    $user=trim($_POST['usuario']);
    $pass=trim($_POST['contrasena']);
    $probarUser ="SELECT Usuario, Contrasena FROM usuarios WHERE Usuario='$user' limit 1";
    $consultarUsuario = $conn->query($probarUser);
  
    if ($consultarUsuario->num_rows > 0){
        
     $user = $consultarUsuario->fetch_assoc();
     print_r($user); 
      if(password_verify($pass, $user["Contrasena"])){
         $_SESSION['is_logged']= true;
         $_SESSION['username']=$user['Usuario'];
         $_SESSION['id'] = $user['ID'];
      }else{
 
        ?>  
        <h3 class="bad">Contraseña incorrecta.</h3>
        <?php
      }
    }else{
        ?>
        <h3 class="bad">Usuario o contraseña no encontrada.</h3>
        <?php
    }
}
mysqli_close($conn);
?>