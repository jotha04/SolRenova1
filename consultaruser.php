<?php
include("conexion.php");
session_start();

if (isset($_POST['enviar'])) {
    $user = trim($_POST['usuario']);
    $pass = trim($_POST['contrasena']);
    echo "Valor de \$_SESSION['id']: " . $_SESSION['id'];
    // Consulta preparada para obtener el Usuario y la Contraseña
    $probarUser = "SELECT ID, Usuario, Contrasena FROM usuarios WHERE Usuario = ?";
    $stmt = $conn->prepare($probarUser);  // Prepara la consulta SQL

    // Vincula el parámetro con el valor del usuario
    $stmt->bind_param("s", $user);  // "s" indica que es una cadena (string)

    // Ejecuta la consulta
    $stmt->execute();

    // Obtener el resultado de la consulta
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Si el usuario existe, obtenemos los datos
        $userData = $result->fetch_assoc();

        // Verifica si la contraseña es correcta
        if (password_verify($pass, $userData["Contrasena"])) {
            // Si la contraseña es correcta, guarda los datos en la sesión
            $_SESSION['is_logged'] = true;
            $_SESSION['username'] = $userData['Usuario'];
            $_SESSION['id'] = $userData['ID'];  // Almacena el ID en la sesión

            // Redirige a la página de inicio u otra página
            header("Location: index.php");
            exit();
        } else {
            echo "<h3 class='bad'>Contraseña incorrecta.</h3>";
        }
    } else {
        echo "<h3 class='bad'>Usuario no encontrado.</h3>";
    }

    // Cierra la consulta y la conexión
    $stmt->close();
}
$conn->close();
?>
