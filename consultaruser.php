<?php
include("conexion.php");
session_start();

if (isset($_POST['enviar'])) {
    $user = trim($_POST['usuario']);
    $pass = trim($_POST['contrasena']);
    
    $probarUser = "SELECT ID, Usuario, Contrasena FROM usuarios WHERE Usuario = ?";
    $stmt = $conn->prepare($probarUser);  

    $stmt->bind_param("s", $user);  

    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $userData = $result->fetch_assoc();

    
        if (password_verify($pass, $userData["Contrasena"])) {
            $_SESSION['is_logged'] = true;
            $_SESSION['username'] = $userData['Usuario'];
            $_SESSION['id'] = $userData['ID']; 

            header("Location: index.php");
            exit();
        } else {
            echo "<h3 class='bad'>Contraseña incorrecta.</h3>";
        }
    } else {
        echo "<h3 class='bad'>Usuario no encontrado.</h3>";
    }

    $stmt->close();
}
$conn->close();
?>