<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Coordenadas</title>
    <link rel="stylesheet" href="estilo_datoubicacion.css">
</head>
<body>
    <div class="form-container">
        <h2>Captura de Información de Ubicación</h2>
        <form method="POST">
    
            <label for="pueblo">Seleccione un Pueblo del Magdalena:</label>
            <select id="pueblo" onchange="autocompletarDatos()">
                <option value="" disabled selected>Seleccione un pueblo</option>
                <option value="algarrobo" data-latitud="10.1886" data-longitud="-74.06" data-municipio="Algarrobo" data-poblacion="42930">Algarrobo</option>
                <option value="aracataca" data-latitud="10.5911" data-longitud="-74.185" data-municipio="Aracataca" data-poblacion="16785">Aracataca</option>
                <option value="el dificil" data-latitud="9.84694" data-longitud="-74.2367" data-municipio="Ariguani" data-poblacion="22000">El Difícil (Ariguaní)</option>
                <option value="cerro de san antonio" data-latitud="10.3169" data-longitud="-74.8711" data-municipio="Cerro de San Antonio" data-poblacion="10000">Cerro de San Antonio</option>
                <option value="chibolo" data-latitud="9.9097" data-longitud="-74.9178" data-municipio="Chibolo" data-poblacion="18000">Chibolo</option>
                <option value="cienaga" data-latitud="11.0072" data-longitud="-74.2472" data-municipio="Cienaga" data-poblacion="120000">Ciénaga</option>
                <option value="concordia" data-latitud="10.2608" data-longitud="-74.8264" data-municipio="Concordia" data-poblacion="12000">Concordia</option>
                <option value="el banco" data-latitud="9.0016" data-longitud="-73.9794" data-municipio="El Banco" data-poblacion="60000">El Banco</option>
                <option value="el pinon" data-latitud="10.4039" data-longitud="-74.8231" data-municipio="El Pinon" data-poblacion="24083">El Piñón</option>
                <option value="el reten" data-latitud="10.6111" data-longitud="-74.2708" data-municipio="El Reten" data-poblacion="20000">El Retén</option>
                <option value="fundacion" data-latitud="10.5206" data-longitud="-74.1897" data-municipio="Fundacion" data-poblacion="70000">Fundación</option>
                <option value="guamal" data-latitud="9.1486" data-longitud="-74.2236" data-municipio="Guamal" data-poblacion="22000">Guamal</option>
                <option value="nueva granada" data-latitud="9.8106" data-longitud="-74.3906" data-municipio="Nueva Granada" data-poblacion="20000">Nueva Granada</option>
                <option value="pedraza" data-latitud="10.1542" data-longitud="-74.9097" data-municipio="Pedraza" data-poblacion="15000">Pedraza</option>
                <option value="pijino del carmen" data-latitud="9.3383" data-longitud="-74.4472" data-municipio="Pijiño del Carmen" data-poblacion="10000">Pijiño del Carmen</option>
                <option value="pivijay" data-latitud="10.4583" data-longitud="-74.6149" data-municipio="Pivijay" data-poblacion="45000">Pivijay</option>
                <option value="plato" data-latitud="9.7943" data-longitud="-74.7822" data-municipio="Plato" data-poblacion="55000">Plato</option>
                <option value="pueblo viejo" data-latitud="10.9956" data-longitud="-74.2800" data-municipio="Puebloviejo" data-poblacion="30000">Pueblo Viejo</option>
                <option value="remolino" data-latitud="10.7011" data-longitud="-74.5747" data-municipio="Remolino" data-poblacion="8000">Remolino</option>
                <option value="san angel" data-latitud="10.033" data-longitud="-74.217" data-municipio="San Angel" data-poblacion="17000">San Ángel</option>
                <option value="salamina" data-latitud="10.4967" data-longitud="-74.7944" data-municipio="Salamina" data-poblacion="">Salamina</option>
                <option value="san sebastian de buenavista" data-latitud="8.9875" data-longitud="74.2675" data-municipio="San Sebastian de Buenavista" data-poblacion="15000">San Sebastián de Buenavista</option>
                <option value="santa ana" data-latitud="9.3319" data-longitud="-74.5703" data-municipio="Santa Ana" data-poblacion="25000">Santa Ana</option>
                <option value="santa barbara de pinto" data-latitud="9.43528" data-longitud="-74.7017" data-municipio="Santa Barbara de Pinto" data-poblacion="13000">Santa Bárbara de Pinto</option>
                <option value="santa marta" data-latitud="11.24079" data-longitud="-74.19904" data-municipio="Santa Marta" data-poblacion="555030">Santa Marta (Distrito)</option>
                <option value="san zenon" data-latitud="9.5536" data-longitud="-74.5072" data-municipio="San Zenon" data-poblacion="15000">San Zenón</option>
                <option value="sitionuevo" data-latitud="10.7670" data-longitud="-74.7247" data-municipio="Sitionuevo" data-poblacion="35000">Sitionuevo</option>
                <option value="tenerife" data-latitud="9.8945" data-longitud="-74.8594" data-municipio="Tenerife" data-poblacion="25000">Tenerife</option>
                <option value="punta de piedra" data-latitud="11.3333" data-longitud="-73.9667" data-municipio="Punta de piedra" data-poblacion="2983">Punta de Piedra (Zapayán)</option>
                <option value="prado sevilla" data-latitud="10.764166666667" data-longitud="-74.157222222222" data-municipio="Prado Sevilla" data-poblacion="56000">Prado Sevilla</option>
            </select>
            <input type="hidden" id="municipio" name="municipio">
            <label for="latitud">Latitud:</label>
            <input type="text" id="latitud" name="latitud" placeholder="Ingrese la latitud" required>

            <label for="longitud">Longitud:</label>
            <input type="text" id="longitud" name="longitud" placeholder="Ingrese la longitud" required>

            <label for="poblacion">Población:</label>
            <input type="text" id="poblacion" name="poblacion" placeholder="Ingrese la población" required>

            <label for="proyectoencurso">Proyecto en Curso:</label>
            <input type="text" id="proyectoencurso" name="proyectoencurso" placeholder="Ingrese el proyecto en curso" required>

            <label for="estado">Estado:</label>
            <select id="estado" name="estado" required>
                <option value="Activo">Activo</option>
                <option value="En proceso">En Proceso</option>
                <option value="Finalizado">Finalizado</option>
                <option value="Espera">A la espera</option>
            </select>

            <label for="infraestructura">Infraestructura Existente:</label>
            <input type="text" id="infraestructura" name="infraestructura" placeholder="Describa la infraestructura existente" required>
            
            <label for="empresa">Empresa:</label>
            <select id="empresa" name="empresa" required>
                <option value="" disabled selected>Seleccione una empresa</option>
                <option value="1">Grupo Enel</option>
                <option value="2">CFE (Comisión Federal de Electricidad)</option>
                <option value="3">ISA (Interconexión Eléctrica S.A.)</option>
                <option value="4">AES Andes</option>
            </select>
    
            <div class="button-group">
                <button type="submit" name="enviar">Enviar</button>
                <button type="button" onclick="window.location.href='index.php';">Regresar</button>
            </div>
            <input type="hidden" name="user_id" value="<?php echo $_SESSION['id']; ?>">
        </form>
        <?php include("insertarpte.php"); ?>
    </div>

    <!-- Segunda tabla -->

    <div class="reporte-container">
        <div class="controls">
            <label for="locationSelect">Proyecto en curso</label>
            <br><br>
            <?php
            include("conexion.php");

            $sql = "SELECT reportes.IDReportes, reportes.Municipio, reportes.Descripcion,  reportes.Fecha, reportes.ProyectoCurso,
                    empresa.Nombre AS NombreEmpresa
                    FROM reportes
                    JOIN empresa ON reportes.FK_IDEmpresa = empresa.IDEmpresa";

            $result = $conn->query($sql);
            ?>
        </div>

        <select id="locationSelect" onchange="mostrarDetalles()">   
            <?php
            if ($result->num_rows > 0) {
                echo "<option value='' disabled selected>Seleccione un reporte</option>";
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='{$row['IDReportes']}' data-descripcion='{$row['Descripcion']}' ' data-proyecto='{$row['ProyectoCurso']}' data-fecha='{$row['Fecha']}' data-estado='{$row['Estado']}' data-empresaD='{$row['NombreEmpresa']}'>{$row['Municipio']}</option>";
                }
            } else {
                echo "<option>No hay reportes disponibles</option>";
            }
            $conn->close();
            ?>
        </select>

        <div id="detalles" style="display:none;">
            <br><br>
            <div class="campo">
                <label>Descripción:</label>
                <p><span id="descripcion"></span></p>
            </div>
            <br>
            <div class="campo">
                <label>Fecha:</label>
                <p><span id="fecha"></span></p>
            </div>
            <br>
            <div class="campo">
                <label>Proyecto En Curso:</label>
                <p><span id="proyecto"></span></p>
            </div>
            <br>
            <div class="campo">
                <label>Empresa:</label>
                <p><span id="empresaD"></span></p>
            </div>
        </div>

        <br><br>
        <div style="display: flex; flex-direction: column; align-items: center; gap: 10px;" class="button-group1">
    <button id="deleteButton" type="reset" onclick="eliminarReporte()">Limpiar</button>
    <span id="mensajeRespuesta" style="color: red; font-weight: bold; text-align: center; display: block; margin-top: 10px;"></span>
       </div>
    </div>

    <script>
function autocompletarDatos() {
    const select = document.getElementById("pueblo");
    const option = select.options[select.selectedIndex];
    
    const municipio = option.getAttribute("data-municipio");
    const latitud = option.getAttribute("data-latitud");
    const longitud = option.getAttribute("data-longitud");
    const poblacion = option.getAttribute("data-poblacion");

    // Asignar valores a los campos ocultos
    document.getElementById("municipio").value = municipio || "";
    document.getElementById("latitud").value = latitud || "";
    document.getElementById("longitud").value = longitud || "";
    document.getElementById("poblacion").value = poblacion || "";



}

     function mostrarDetalles() {
        const select = document.getElementById("locationSelect");
        const option = select.options[select.selectedIndex];

        const descripcion = option.getAttribute("data-descripcion");
        const fecha = option.getAttribute("data-fecha");
        const empresa = option.getAttribute("data-empresaD");
        const proyecto = option.getAttribute("data-proyecto");

        // Actualiza el área de detalles con los valores obtenidos de los atributos data
        document.getElementById("descripcion").textContent = descripcion;
        document.getElementById("fecha").textContent = fecha;
        document.getElementById("empresaD").textContent = empresa;
        document.getElementById("proyecto").textContent = proyecto;

        document.getElementById("detalles").style.display = "block";
    }

    function eliminarReporte() {
    const select = document.getElementById("locationSelect");
    const idReporte = select.value;
    const mensajeRespuesta = document.getElementById("mensajeRespuesta");

    if (idReporte) {
        const formData = new FormData();
        formData.append('IDReportes', idReporte);

        fetch('eliminar_reporte.php', {
            method: 'POST',
            body: formData
        })
            .then(response => response.text())
            .then(data => {
                console.log("Respuesta del servidor:", data);

                // Actualiza el texto del mensaje correctamente
                mensajeRespuesta.textContent = data;

                // Opciones de UI adicionales
                document.getElementById("detalles").style.display = "none";
                select.remove(select.selectedIndex);

                // Verifica si solo queda la opción predeterminada
                if (select.options.length === 1) {
                    select.innerHTML = "<option>No hay reportes disponibles</option>";
                    document.getElementById("deleteButton").style.display = "none"; // Oculta el botón de eliminar
                } else {
                    select.selectedIndex = 0;
                }
            })
            .catch(error => {
                console.error('Error:', error);
                mensajeRespuesta.textContent = "Error al eliminar el reporte."; // Manejo de errores
            });
    } else {
        // Muestra un mensaje de advertencia
        mensajeRespuesta.textContent = "Seleccione un reporte para borrar.";
    }
}

// Asegúrate de que al cargar la página todo está bien configurado
window.onload = function () {
    const select = document.getElementById("locationSelect");
    const deleteButton = document.getElementById("deleteButton");

    if (select.options.length === 1 && select.options[0].text === "No hay reportes disponibles") {
        deleteButton.style.display = "none";
    }
};
    </script>
</body>
</html>
