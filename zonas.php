<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mapa de Ubicación</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <link rel="stylesheet" href="mapa.css">
    <style>
        #mapid { height: 400px; }
        .controls {
            margin: 15px 0;
        }
        #info {
            margin-top: 20px;
            font-size: 1.1em;
            color: #333;
        }
    </style>
</head>
<body>
    <h1>Seleccionar Ubicación en el Mapa</h1>

    <?php
    include("conexion.php");

    $sql = "SELECT ubicacion.IDUbicacion, ubicacion.LATITUD, ubicacion.LONGITUD, ubicacion.NombreUbicacion, 
                   zona.Poblacion, zona.InfraestructuraExistente, zona.ProyectosEnCurso, empresa.Nombre AS NombreEmpresa, empresa.Contacto
            FROM ubicacion
            JOIN zona ON ubicacion.FK_IDZona1 = zona.IDZona
            JOIN empresa ON zona.FK_IDEmpresa1 = empresa.IDEmpresa";
    $result = $conn->query($sql);
    ?>

    <div class="controls">
        <label for="locationSelect">Selecciona una ubicación:</label>
        <select id="locationSelect">
            <?php
            $ubicaciones = [];
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $ubicaciones[] = $row;
                    echo "<option value='{$row['IDUbicacion']}'>{$row['NombreUbicacion']}</option>";
                }
            } else {
                echo "<option>No hay ubicaciones disponibles</option>";
            }
            $conn->close();
            ?>
        </select>
        <button onclick="centrarYMostrarInfo()">Centrar y Mostrar Información</button>
    </div>

    <div id="mapid"></div>

    <div id="info"></div>

    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script>
        var ubicaciones = <?php echo json_encode($ubicaciones); ?>;

        var mymap = L.map('mapid').setView([0, 0], 2);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(mymap);

     
        function centrarYMostrarInfo() {
            var selectedId = document.getElementById("locationSelect").value;
            var ubicacion = ubicaciones.find(u => u.IDUbicacion == selectedId);

            if (ubicacion) {
            
                var lat = parseFloat(ubicacion.LATITUD);
                var lng = parseFloat(ubicacion.LONGITUD);
                mymap.setView([lat, lng], 13);

                L.marker([lat, lng]).addTo(mymap)
                    .bindPopup(ubicacion.NombreUbicacion).openPopup();

                document.getElementById("info").innerHTML = `
                    <h3>Información de la Zona</h3>
                    <p><strong>Población:</strong> ${ubicacion.Poblacion}</p>
                    <p><strong>Infraestructura Existente:</strong> ${ubicacion.InfraestructuraExistente}</p>
                    <p><strong>Proyectos en Curso:</strong> ${ubicacion.ProyectosEnCurso}</p>
                    <h3>Información de la Empresa</h3>
                    <p><strong>Empresa:</strong> ${ubicacion.NombreEmpresa}</p>
                    <p><strong>Contacto:</strong> ${ubicacion.Contacto}</p>
                `;
            } else {
                document.getElementById("info").innerHTML = "<p>No se encontró información para esta ubicación.</p>";
            }
        }
    </script>
    <a href="index.php" class="regresar-btn">Regresar al inicio</a>
    <a href="encuesta.php" class="encuesta-btn">Realizar Encuesta</a>
</body>
</html>
