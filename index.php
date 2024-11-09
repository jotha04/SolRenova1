
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=chrome" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="estiloprincipa.css" />
  </head>
  <body>
    <header class="header">
      <div class="menu container">
        <a href="#" class="logo">SOL-RENOVA</a>
        <nav class="navbar">
          <ul>
            <li><a href="#">Inicio</a></li>
            <li><a href="#descripcion">Descripcion</a></li>
            <li><a href="#Contacto">Contactos</a></li>
            <li><a href="#informacion">Informacion</a></li>
            <?php
            include("conexion.php");
            session_start();
            if (isset($_SESSION['username'])) {
              $usuario = $_SESSION['username']; 
            $query = "SELECT Admin FROM usuarios WHERE Usuario = '$usuario'";
            $result = mysqli_query($conn, $query);
            if ($result && mysqli_num_rows($result) > 0) {
              $row = mysqli_fetch_assoc($result);
             if($row['Admin'] != 1){
             echo('<li><a href="zonas.php">Zonas</a></li>');
             }else if($row['Admin'] == 1){
              echo('<li><a href="datoubicacion.php">Datos</a></li>');
              echo('<li><a href="zonas.php">Zonas</a></li>');
             }
            }
          }
             if(empty($_SESSION['is_logged']) || !$_SESSION['is_logged']){
              echo('<li><a href="login.php">Iniciar sesion</a></li>');
              echo('<li><a href="registrar.php">Registrar</a></li>');
             }else{
              echo('<li><a>'.$_SESSION['username'].'</a></li>');
              echo('<li><a href="cierresesion.php">Cerrar sesion</a></li>');
             }
           
          
            ?>
          </ul>
        </nav> 
      </div>
      <div class="header-content container">
        <h1>SOL-RENOVA</h1>
        <p>
        Las redes móviles han evolucionado a través de varias generaciones, cada una marcando un avance tecnológico significativo:
        1G introdujo las llamadas de voz móviles con tecnología analógica.
        2G digitalizó las comunicaciones, permitiendo mensajes de texto y mejor calidad de llamadas.
        2.5G (GPRS/EDGE) fue una mejora intermedia que ofreció velocidades de datos más rápidas.
        3G trajo internet móvil y streaming de video.
        4G y 4G LTE ofrecieron velocidades de datos mucho más altas y soporte para streaming de video HD y juegos en línea.
        5G, la generación más reciente, proporciona velocidades ultrarrápidas y baja latencia, revolucionando no solo la telefonía móvil sino también tecnologías como IoT y vehículos autónomos.
        </p>
      </div>
    </header>
    <section id="descripcion"class="conexiones">
      <div class="conexiones-content container">
        <h2>Diferentes tipos de conexiones</h2>
        <p class="txt-p">
        Las redes móviles han experimentado una evolución significativa desde su creación, pasando por varias generaciones, cada una marcando un hito importante en la forma en que nos comunicamos y accedemos a la información. Aquí está un resumen de todas ellas:
        </p>

        <div class="conexiones-group">
          <div class="conexiones-1">
            <img src="img/3g.png" alt="" />
            <h2>Informacion sobre 3G</h2>
            <p>
            3G - La Tercera Generación: La llegada de 3G a principios del 2000 supuso un salto significativo en la capacidad de transmisión de datos. Con 3G, el acceso a Internet móvil se volvió más práctico, permitiendo el streaming de videos y el uso de aplicaciones más complejas en dispositivos móviles.
            </p>
          </div>
          <div class="conexiones-1">
            <img src="img/4g.png" alt="" />
            <h2>Informacion sobre 4G</h2>
            <p>
            4G y 4G LTE - La Cuarta Generación: Introducido en la última década, 4G y su evolución, 4G LTE (Long Term Evolution), ofrecieron velocidades de datos aún más rápidas, mejor calidad de llamadas y la capacidad de manejar streaming de video HD y juegos en línea. 4G fue un cambio de juego en términos de lo que los usuarios podían hacer con sus dispositivos móviles.

            </p>
          </div>
          <div class="conexiones-1">
            <img src="img/5g.png" alt="" />
            <h2>Informacion sobre 5G</h2>
            <p>
            La Quinta Generación: La más reciente en la evolución de las redes móviles, 5G, ofrece velocidades ultra rápidas y latencias muy bajas. Esta tecnología está destinada a revolucionar no solo la telefonía móvil, sino también a impulsar avances significativos en áreas como el Internet de las Cosas (IoT), vehículos autónomos, y ciudades inteligentes. 5G es fundamental para soportar una cantidad masiva de dispositivos conectados y para aplicaciones que requieren una respuesta en tiempo real.
            </p>
          </div>
        </div>
      </div>
    </section>
    <main id='informacion' class="services">
      <div class="services-content container">
        <h2>Ayuda y consejos</h2>
        <p>
        Para mejorar la conexión de red móvil o considerar otras opciones de redes móviles, existen varias estrategias y recomendaciones que pueden ser útiles. Aquí hay algunos consejos para mejorar la conexión de red móvil:
        Ubicación y señal: La ubicación puede afectar la calidad de la señal. Intenta moverte a un área con mejor cobertura si estás experimentando problemas de conexión.
        Reinicio del dispositivo: A veces, reiniciar el dispositivo puede ayudar a restablecer la conexión y mejorar la señal.
        Actualizaciones de software: Asegúrate de que tu dispositivo esté actualizado con las últimas versiones de software, ya que estas actualizaciones pueden incluir mejoras en la conectividad.
        Configuración de red: Verifica la configuración de red en tu dispositivo para asegurarte de que esté optimizada para la mejor conexión posible.
        Cambiar de red: Si estás experimentando problemas persistentes con tu proveedor de red actual, considera cambiar a otro proveedor que ofrezca una mejor cobertura en tu área.
        Amplificadores de señal: Considera la posibilidad de utilizar un amplificador de señal para mejorar la recepción en áreas con mala cobertura.
        En cuanto a considerar otras opciones de redes móviles, es importante investigar y comparar las ofertas de diferentes proveedores. Algunos factores a considerar incluyen la cobertura en tu área, la calidad del servicio al cliente, los planes y precios disponibles, y cualquier restricción de velocidad o datos. Algunas opciones de redes móviles alternativas incluyen proveedores virtuales (MVNO) que utilizan las redes de los principales operadores a menudo a precios más competitivos.
        </p>
      </div>
    </main>
    <section class="nosotros">
      <div class="nosotros-1">
        <h2>Sobre nosotros</h2>
        <p>     
        Como jóvenes emprendedores dedicados a mejorar la conectividad en áreas con acceso limitado, estamos emprendiendo una tarea esencial y transformadora. Nuestro objetivo de conectar a las personas con la operadora móvil ideal es un paso crucial hacia la inclusión digital y el empoderamiento. Cada desafío que superamos en este camino no solo mejora la conectividad, sino que también abre puertas a nuevas oportunidades educativas y económicas. Recordemos que nuestro esfuerzo es un puente hacia un mundo más equitativo y conectado. Con determinación y coraje, estamos sentando las bases para un cambio significativo y duradero, inspirando a otros a seguir nuestro ejemplo. Como dijo Nelson Mandela, "Siempre parece imposible hasta que se hace". Nuestro trabajo no solo es técnico, sino un legado de progreso y esperanza.
        </p>
      </div>
      <div class="nosotros-2"></div>
    </section>
    <section class="mapa">
    <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mapa de Ubicación</title>
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <style>
        #mapid { height: 400px; }
    </style>

</head>
<h1>Mi Ubicación Actual</h1>
    <div id="mapid"></div>

    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script>
        var mymap = L.map('mapid').setView([0, 0], 13); // Inicializa el mapa en el punto (0,0)

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(mymap);

        function onLocationFound(e) {
            var radius = e.accuracy / 2;

            L.marker(e.latlng).addTo(mymap)
                .bindPopup("Estás dentro de " + radius + " metros de este punto").openPopup();

            L.circle(e.latlng, radius).addTo(mymap);
        }

        function onLocationError(e) {
            alert(e.message);
        }

        mymap.on('locationfound', onLocationFound);
        mymap.on('locationerror', onLocationError);

        mymap.locate({setView: true, maxZoom: 16});
    </script>

  </script>
      ></iframe>
    </section>
    <footer class="contactanos" id="Contacto">
      <h2>Contactanos</h2>
      <div class="contactanos-content container">
        <div class="contactos">
          <ul>
            <li>
              <a
                href="https://www.facebook.com/jeisonarturo.pinedaborre/?locale=es_LA"
                >Jeison Pineda</a
              >
            </li>
          </ul>
        </div>
        <div class="contactos">
          <ul>
            <li>
              <a
                href="https://www.instagram.com/adalcidespinto/?utm_source=ig_web_button_share_sheet&igshid=OGQ5ZDc2ODk2ZA=="
                >Adalcides Pinto</a
              >
            </li>
          </ul>
        </div>
        <div class="contactos">
          <ul>
            <li>
              <a
                href="https://www.instagram.com/jennifer_paez_/?utm_source=ig_web_button_share_sheet&igshid=OGQ5ZDc2ODk2ZA=="
                >Jennifer Paez</a
              >
            </li>
          </ul>
        </div>
        <div class="contactos">
          <ul>
            <li>
              <a
                href="https://instagram.com/josue_cantillov?igshid=MTk0NTkyODZkYg=="
                >Josue Cantillo</a
              >
            </li>
          </ul>
        </div>
        <div class="contactos">
          <ul>
            <li>
              <a href="https://www.facebook.com/profile.php?id=100004072212097"
                >Jonathan Hernandez</a
              >
            </li>
          </ul>
        </div>
      </div>
  </body>
</html>