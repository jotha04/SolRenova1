<?php
include("conexion.php");
session_start();

if (isset($_POST['enviar'])) {
    $latitud = trim($_POST['latitud']);
    $longitud = trim($_POST['longitud']);
    $poblacion = trim($_POST['poblacion']);
    $proyectosCurso = trim($_POST['proyectoencurso']);
    $infraestructura = trim($_POST['infraestructura']);
    $empresaID = intval($_POST['empresa']);
    $userID = $_SESSION['id'];


    $consultaUbicacion = $conn->prepare("INSERT INTO ubicacion (LATITUD, LONGITUD) VALUES (?, ?)");
    $consultaUbicacion->bind_param("ss", $latitud, $longitud);
    $consultaUbicacion->execute();


    $ubicacionID = $conn->insert_id;

    $consultaZona = $conn->prepare("INSERT INTO zona (FK_IDUbicacion, Poblacion, InfraestructuraExistente, ProyectosEnCurso, FK_IDEmpresa1) VALUES (?, ?, ?, ?, ?)");
    $consultaZona->bind_param("isssi", $ubicacionID, $poblacion, $infraestructura, $proyectosCurso, $empresaID);
    $consultaZona->execute();

    $zonaID = $conn->insert_id;

    $consultaUpdateUbicacion = $conn->prepare("UPDATE ubicacion SET FK_ID1 = ?, FK_IDZona1 = ? WHERE IDUbicacion = ?");
    $consultaUpdateUbicacion->bind_param("iii", $userID, $zonaID, $ubicacionID);
    $consultaUpdateUbicacion->execute();

    if ($consultaUbicacion->affected_rows > 0 && $consultaZona->affected_rows > 0 && $consultaUpdateUbicacion->affected_rows > 0) {
        ?>
        <h3 class="ok">Reporte creado correctamente.</h3>
        <?php
    } else {
        ?>
        <h3 class="error">Hubo un error al crear el reporte.</h3>
        <?php
    }

    $consultaUbicacion->close();
    $consultaZona->close();
    $consultaUpdateUbicacion->close();
}
$conn->close();
?>
