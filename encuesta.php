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
           <label for="zona">Localidad o municipio:</label>
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
                <option value="espera">A la espera</option>
            </select>

            <div class="button-group">
                <button type="submit" name='enviar'>Enviar</button>
                <button type="button" onclick="window.history.back();">Devolver</button>
            </div>
        </form>
    </div>
</body>
</html>
