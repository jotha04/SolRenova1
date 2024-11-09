<?php
include("conexion.php");

$sql = "CREATE TABLE IF NOT EXISTS Usuarios (
    ID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    Usuario VARCHAR(50) NOT NULL,
    Email VARCHAR(100) NOT NULL,
    Contrasena VARCHAR(255) NOT NULL
)";
if ($conn->query($sql) === TRUE) {
    echo "Tabla 'Usuarios' creada exitosamente";
} else {
    echo "Error al crear la tabla: " . $conn->error;
}

?>