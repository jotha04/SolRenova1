<?php
include("conexion.php");

if (isset($_POST['IDReportes'])) {
    $idReporte = $_POST['IDReportes'];

    
    error_log("IDReportes recibido: " . $idReporte);

    $sql = "DELETE FROM reportes WHERE IDReportes = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $idReporte);
    
    if ($stmt->execute()) {
        echo "Reporte eliminado con éxito";
    } else {
        echo "Error al eliminar el reporte";
    }
    $stmt->close();
    $conn->close();
} else {
    echo "No se recibió un ID de reporte válido";
}
?>
