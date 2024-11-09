<?php
include("conexion.php");

if(isset($_POST['enviar'])){
$latitud=trim($_POST['latitud']);
$longitud=trim($_POST['longitud']);
$poblacion=trim($_POST['poblacion']);
$proyectocurso=trim($_POST['proyectoencurso']);
$infraestructura=trim($_POST['infraestructura']);

        $probarLatitud = "SELECT LATITUD FROM ubicacion WHERE LATITUD='$latitud'";
        $solicitudLatitud= mysqli_query($conn, $probarLatitud);

        $probarLongitud ="SELECT LONGITUD FROM usuarios WHERE LONGITUD='$longitud'";
        $solicitudLongitud= mysqli_query($conn, $probarLongitud);

        $probarPoblacion = "SELECT Poblacion FROM zona WHERE Poblacion='$poblacion'";
        $solicitudPoblacion= mysqli_query($conn, $probarPoblacion);

        $probarProyecto ="SELECT ProyectosEnCurso FROM zona WHERE ProyectosEnCurso='$proyectocurso'";
        $solicitudProyecto= mysqli_query($conn, $probarProyecto);

        $probarInfraestructura = "SELECT InfraestructuraExistente FROM zona WHERE InfraestructuraExistente='$infraestructura'";
        $solicitudInfraestructura= mysqli_query($conn, $probarInfraestructura);

      
            $solicitud = "INSERT INTO ubicacion(LATITUD, LONGITUD) VALUES ('$latitud', '$longitud')";
            $respuesta =mysqli_query($conn, $solicitud);
            $solicitud = "INSERT INTO zona(Poblacion, InfraestructuraExistente, ProyectosEnCurso) VALUES ('$poblacion', '$infraestructura','$proyectocurso')";
           
            $empresaID = intval($_POST['empresa']);
            $consulta = $conexion->prepare("INSERT INTO reportes (FK_IDEmpresa) VALUES (?)");
            $consulta->bind_param("i", $empresaID);
            $consulta->execute();
            if ($respuesta){
              ?>
              <h3 class="ok"> Reporte creado correctamente.</h3>;
              <?php
            }
}
mysqli_close($conn);
?>
