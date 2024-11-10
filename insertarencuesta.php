<?php

include("conexion.php"); 

if (isset($_POST['enviar'])) {
    $municipio = trim($_POST['zona']);
    $descripcion = trim($_POST['descripcion']);
    $fecha = isset($_POST['fecha']) ? $_POST['fecha'] : '';  
    $fechaFormateada = date("Y-m-d", strtotime($fecha)); 
    $estado = trim($_POST['estado']);
    $empresaID = intval($_POST['empresa']);
    $userID = isset($_SESSION['id']) ? $_SESSION['id'] : null; 

    if ($userID === null) {
        die("Error: No se ha iniciado sesión.");
    }



    $consultaReportes = $conn->prepare("INSERT INTO reportes (Municipio, Descripcion, Fecha, Estado, FK_IDEmpresa) VALUES (?, ?, ?, ?, ?)");
    $consultaReportes->bind_param("ssssi", $municipio, $descripcion, $fechaFormateada, $estado, $empresaID);
    $consultaReportes->execute();

    $reportesID = $conn->insert_id;

    $consultaUpdateReportes = $conn->prepare("UPDATE reportes SET FK_ID = ? WHERE IDReportes = ?");
    $consultaUpdateReportes->bind_param("ii", $userID, $reportesID);
    $consultaUpdateReportes->execute();

    if ($consultaReportes->affected_rows > 0 && $consultaUpdateReportes->affected_rows > 0) {
        echo "<h3 class='ok'>Encuesta creada exitosamente.</h3>";
    } else {
        echo "<h3 class='error'>Encuesta no creada por algún error.</h3>";
    }

    $consultaReportes->close();
    $consultaUpdateReportes->close();
}

$conn->close();
?>
