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
            <label for="latitud">Latitud:</label>
            <input type="text" id="latitud" name="latitud" placeholder="Ingrese la latitud" required>

            <label for="longitud">Longitud:</label>
            <input type="text" id="longitud" name="longitud" placeholder="Ingrese la longitud" required>

            <label for="municipio">Municipio:</label>
            <input type="text" id="municipio" name="municipio" placeholder="Ingrese el municipio" required>

            <label for="poblacion">Población:</label>
            <input type="text" id="poblacion" name="poblacion" placeholder="Ingrese la población" required>

            <label for="proyectoencurso">Proyecto en Curso:</label>
            <input type="text" id="proyectoencurso" name="proyectoencurso" placeholder="Ingrese el proyecto en curso" required>

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
                <button type="submit" name='enviar'>Enviar</button>
                <button type="button" onclick="window.location.href='index.php';">Devolver</button>
            </div>
            <input type="hidden" name="user_id" value="<?php echo $_SESSION['id']; ?>">
        </form>
        <?php
        include("insertarpte.php");
        ?>
    </div class="form-container">

    <!--segunda tabla-->

    <div class="reporte-container">

        <div class="controls">
            <label for="locationSelect">Proyecto en curso</label>
            <br><br>
            <?php
            include("conexion.php");

            $sql = "SELECT reportes.IDReportes, reportes.Municipio, reportes.Descripcion, reportes.Fecha, reportes.Estado, 
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
               echo "<option value='{$row['IDReportes']}' data-descripcion='{$row['Descripcion']}' data-fecha='{$row['Fecha']}' data-estado='{$row['Estado']}' data-empresaD='{$row['NombreEmpresa']}'>{$row['Municipio']}</option>";
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
           <label>Estado:</label>
           <p><span id="estado"></span></p>
        </div>
        <br>
        <div class="campo">
            <label>Empresa:</label>
            <p><span id="empresaD"></span></p>
        </div>
        <br>
        </div>
        <br><br>
        <div class="button-group1">
                <button type="reset">Limpiar</button>
        </div>
    </div>
    <script>
        function mostrarDetalles() {
        const select = document.getElementById("locationSelect");
        const option = select.options[select.selectedIndex];
    
        const descripcion = option.getAttribute("data-descripcion");
        const fecha = option.getAttribute("data-fecha");
        const estado = option.getAttribute("data-estado");
        const empresa = option.getAttribute("data-empresaD");
    
        document.getElementById("descripcion").textContent = descripcion;
        document.getElementById("fecha").textContent = fecha;
        document.getElementById("estado").textContent = estado;
        document.getElementById("empresaD").textContent = empresa;
    

       document.getElementById("detalles").style.display = "block";
       }
    </script>

</body>
</html>