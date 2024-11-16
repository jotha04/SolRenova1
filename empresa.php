<?php
include("conexion.php");
session_start();
  
if (!isset($_SESSION['is_logged']) || $_SESSION['is_logged'] != true) {
    echo "<h3 class='bad'>No estás logueado.</h3>";
    exit();
   
}else{
    $usuario = $_SESSION['username']; 
    $query = "SELECT Admin FROM usuarios WHERE Usuario = '$usuario'";
    $result = mysqli_query($conn, $query);
    $query1 = "SELECT TipoUsuario FROM usuarios WHERE Usuario = '$usuario'";
    $result1 = mysqli_query($conn, $query1);
    
    if ($result && mysqli_num_rows($result) > 0 && $result1 && mysqli_num_rows($result1) > 0) {
        $row = mysqli_fetch_assoc($result);
        $row1 = mysqli_fetch_assoc($result1);
if ($row['Admin'] != 1 && $row1['TipoUsuario'] != "Empresa") {
    echo "<h3 class='bad'>No eres un administrador o empresa.</h3>";
    exit();
}

}
}
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="empresa.css" rel="stylesheet">
    </head>
    <body>
    
    </body>
</html>