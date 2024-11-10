<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Encuesta de Reporte</title>
    <link rel="stylesheet" href="estiloencuesta.css">
</head>
<body>
    <div class="container">
        <h1>Formulario de Encuesta</h1>
        <form action="procesar_encuesta.php" method="post">
            <label for="localidad">Localidad o Municipio:</label>
            <input type="text" id="localidad" name="localidad" required>

            <label for="infraestructura">Infraestructura Existente:</label>
            <input type="text" id="infraestructura" name="infraestructura" required>

            <label for="poblacion">Población:</label>
            <input type="number" id="poblacion" name="poblacion" required>

            <label for="proyecto">Proyecto en Curso:</label>
            <input type="text" id="proyecto" name="proyecto" required>

            <label for="empresa">Empresa:</label>
            <select id="empresa" name="empresa" required>
                <option value="" disabled selected>Seleccione una empresa</option>
                <option value="1">Grupo Enel</option>
                <option value="2">CFE (Comisión Federal de Electricidad)</option>
                <option value="3">ISA (Interconexión Eléctrica S.A.)</option>
                <option value="4">AES Andes</option>
            </select>

            <label for="descripcion">Descripción del Reporte:</label>
            <textarea id="descripcion" name="descripcion" rows="4" required></textarea>

            <label for="fecha">Fecha:</label>
            <input type="date" id="fecha" name="fecha" required>

            <label for="estado">Estado:</label>
            <select id="estado" name="estado" required>
                <option value="activo">Activo</option>
                <option value="en proceso">En Proceso</option>
                <option value="finalizado">Finalizado</option>
            </select>

            <button type="submit">Enviar Reporte</button>
        </form>
    </div>
</body>
</html>
