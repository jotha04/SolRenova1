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
        <h2>Captura de Coordenadas</h2>
        <form action="procesar.php" method="POST">
            <label for="latitud">Latitud:</label>
            <input type="text" id="latitud" name="latitud" placeholder="Ingrese la latitud" required>

            <label for="longitud">Longitud:</label>
            <input type="text" id="longitud" name="longitud" placeholder="Ingrese la longitud" required>

            <button type="submit">Enviar</button>
        </form>
    </div>
</body>
</html>
