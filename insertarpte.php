<?php
include("conexion.php");
session_start();
if (password_verify($pass, $user["Contrasena"])) {
    $_SESSION['is_logged'] = true;
    $_SESSION['username'] = $user['Usuario'];
    $_SESSION['id'] = $user['ID']; // Asegúrate de que esta línea esté correcta
}

if (isset($_POST['enviar'])) {
    // Capturar los datos del formulario
    $latitud = trim($_POST['latitud']);
    $longitud = trim($_POST['longitud']);
    $poblacion = trim($_POST['poblacion']);
    $proyectosCurso = trim($_POST['proyectoencurso']);
    $infraestructura = trim($_POST['infraestructura']);
    $empresaID = intval($_POST['empresa']);  // Capturar el ID de la empresa seleccionada
    
    // Insertar en la tabla `ubicacion`
    $consultaUbicacion = $conn->prepare("INSERT INTO ubicacion (LATITUD, LONGITUD) VALUES (?, ?)");
    $consultaUbicacion->bind_param("ss", $latitud, $longitud);
    $consultaUbicacion->execute();

    // Obtener el ID de la ubicación recién insertada
    $ubicacionID = $conn->insert_id;

    // Insertar en la tabla `zona` vinculando con la ubicación
    $consultaZona = $conn->prepare("INSERT INTO zona (FK_IDUbicacion, Poblacion, InfraestructuraExistente, ProyectosEnCurso, FK_IDEmpresa1) VALUES (?, ?, ?, ?, ?)");
    $consultaZona->bind_param("isssi", $ubicacionID, $poblacion, $infraestructura, $proyectosCurso, $empresaID);
    $consultaZona->execute();

    // Obtener el ID de la zona recién insertada
    $zonaID = $conn->insert_id;

    // Actualizar la tabla `ubicacion` con el FK_IDZona1
    $consultaUpdateUbicacion = $conn->prepare("UPDATE ubicacion SET FK_IDZona1 = ? WHERE IDUbicacion = ?");
    $consultaUpdateUbicacion->bind_param("ii", $zonaID, $ubicacionID);
    $consultaUpdateUbicacion->execute();
    echo "Valor de \$_SESSION['id']: " . (isset($_SESSION['id']) ? $_SESSION['id'] : 'No establecido');
    $userID = intval($_POST['user_id']); // Asegúrate de que esté capturado desde el formulario

    // Actualizar la tabla `ubicacion` con FK_ID1 (ID del usuario) y FK_IDZona1
    $consultaUpdateUbicacion = $conn->prepare("UPDATE ubicacion SET FK_ID1 = ?, FK_IDZona1 = ? WHERE IDUbicacion = ?");
    $consultaUpdateUbicacion->bind_param("iii", $userID, $zonaID, $ubicacionID);
    $consultaUpdateUbicacion->execute();
    // Verificar si las consultas se ejecutaron correctamente
    if ($consultaUbicacion->affected_rows > 0 && $consultaZona->affected_rows > 0 && $consultaUpdateUbicacion->affected_rows > 0) {
        ?>
        <h3 class="ok">Reporte creado correctamente.</h3>
        <?php
    } else {
        ?>
        <h3 class="error">Hubo un error al crear el reporte.</h3>
        <?php
    }

    // Cerrar las consultas
    $consultaUbicacion->close();
    $consultaZona->close();
    $consultaUpdateUbicacion->close();
}

// Cerrar la conexión
$conn->close();
?>
