<!DOCTYPE html>
<html>
<head>
    <title>CONEPLIT</title>
    <link rel="stylesheet" type="text/css" href="estilodatos.css">
</head>
<body>
    <h1>CONEPLIT</h1>
    <form action="tuArchivoDeProcesamiento.php" method="POST">
        <div>
            <label for="operador">Su operador:</label>
            <input type="text" id="operador" name="operador">
        </div>
        <div>
            <label for="codigoPostal">Código Postal:</label>
            <input type="text" id="codigoPostal" name="codigoPostal">
        </div>
        <div>
            <label for="tipoConexion">Tipo de conexión:</label>
            <select id="tipoConexion" name="tipoConexion">
                <option value="5g">5G</option>
                <option value="4g">4G</option>
                <option value="3g">3G</option>
            </select>
        </div>
        <div>
            <input type="submit" value="Enviar">
        </div>
    </form>
</body>
</html>
