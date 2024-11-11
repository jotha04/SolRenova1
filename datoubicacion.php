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
                <button type="button" onclick="window.history.back();">Devolver</button>
            </div>
            <input type="hidden" name="user_id" value="<?php echo $_SESSION['id']; ?>">
        </form>
        <?php

        include("insertarpte.php");
        ?>
    <br>
    <a class="regresarinicio " href="index.php">Inicio</a>


    </div>
</body>
</html>