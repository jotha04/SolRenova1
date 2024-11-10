<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selección de Municipios y Zonas del Magdalena</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .form-container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f4f4f4;
            border-radius: 8px;
        }
        select, button {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 4px;
            border: 1px solid #ccc;
        }
        button {
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Selecciona un Municipio o Zona del Magdalena</h2>
        <form action="guardar.php" method="POST">
            <label for="zona">Elige un municipio o zona:</label>
            <select name="zona" id="zona" required>
                <option value="">Selecciona una zona...</option>
                <option value="algarrobo">Algarrobo</option>
                <option value="aracataca">Aracataca</option>
                <option value="el dificil">El Difícil (Ariguaní)</option>
                <option value="cerro de san antonio">Cerro de San Antonio</option>
                <option value="chibolo">Chibolo</option>
                <option value="cienaga">Ciénaga</option>
                <option value="concordia">Concordia</option>
                <option value="el banco">El Banco</option>
                <option value="el pinon">El Piñón</option>
                <option value="el reten">El Retén</option>
                <option value="fundacion">Fundación</option>
                <option value="guamal">Guamal</option>
                <option value="nueva granada">Nueva Granada</option>
                <option value="pedraza">Pedraza</option>
                <option value="pijino del carmen">Pijiño del Carmen</option>
                <option value="pivijay">Pivijay</option>
                <option value="plato">Plato</option>
                <option value="pueblo viejo">Pueblo Viejo</option>
                <option value="remolino">Remolino</option>
                <option value="san angel">San Ángel</option>
                <option value="salamina">Salamina</option>
                <option value="san sebastian de buenavista">San Sebastián de Buenavista</option>
                <option value="santa ana">Santa Ana</option>
                <option value="santa barbara de pinto">Santa Bárbara de Pinto</option>
                <option value="santa marta">Santa Marta (Distrito)</option>
                <option value="san zenon">San Zenón</option>
                <option value="sitionuevo">Sitionuevo</option>
                <option value="tenerife">Tenerife</option>
                <option value="punta de piedra">Punta de Piedra (Zapayán)</option>
                <option value="prado sevilla">Prado Sevilla</option>
                <option value="Otro">Otro</option>
            </select>
            <button type="submit">Guardar Selección</button>
        </form>
    </div>
</body>
</html>
