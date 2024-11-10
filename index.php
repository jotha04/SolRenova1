
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
        <p>SOL-RENOVA es una plataforma para conectar a comunidades remotas con proveedores de soluciones energéticas sostenibles. Nuestro objetivo es identificar áreas con acceso limitado a la electricidad y facilitar la implementación de soluciones energéticas renovables para mejorar la calidad de vida y apoyar el desarrollo sostenible.
        </div>
    </header>
    <section id="descripcion"class="conexiones">
      <div class="conexiones-content container">
        <h2>Conexiones Sustentables</h2>
        <p class="txt-p">
        A través de SOL-RENOVA, las comunidades pueden reportar necesidades energéticas específicas, mientras que las empresas proveedoras obtienen datos clave para planificar y coordinar la ejecución de proyectos. Las soluciones energéticas propuestas serán sostenibles y adaptadas a las condiciones locales, mejorando el acceso a la energía de una forma eficiente y respetuosa con el medio ambiente.
        </p>

        <div class="conexiones-group">
          <div class="conexiones-1">
            <img src="img/3g.png" alt="" />
            <h2>Información sobre Energía Solar</h2>
            <p>
            La energía solar es una de las soluciones clave de SOL-RENOVA. Ofrecemos opciones para la instalación de paneles solares en comunidades remotas, permitiendo una fuente de energía limpia y sostenible que se puede adaptar a diferentes climas y ubicaciones.
            </p>
          </div>
          <div class="conexiones-1">
            <img src="img/4g.png" alt="" />
            <h2>Información sobre Energía Eólica</h2>
            <p>
            En zonas donde las condiciones de viento son favorables, SOL-RENOVA promueve la energía eólica, ofreciendo soluciones como pequeños aerogeneradores que permiten a las comunidades acceder a energía renovable y reducir su dependencia de fuentes contaminantes.
            
            </p>
          </div>
          <div class="conexiones-1">
            <img src="img/5g.png" alt="" />
            <h2>Información sobre Energía Hidráulica</h2>
            <p>
            Para áreas cercanas a cuerpos de agua, SOL-RENOVA facilita la implementación de sistemas de energía hidráulica a pequeña escala, una alternativa confiable para el acceso a electricidad en lugares remotos.
            </p>
          </div>
        </div>
      </div>
    </section>
    <main id='informacion' class="services">
      <div class="services-content container">
        <h2>Ayuda y consejos</h2>
        <p>
        La plataforma de SOL-RENOVA no solo conecta a las comunidades con soluciones energéticas, sino que también ofrece consejos prácticos para mantener y optimizar el uso de estas tecnologías. Mantener los paneles solares limpios, revisar periódicamente los equipos e invertir en almacenamiento de energía son algunas recomendaciones clave para asegurar un suministro constante y efectivo.
        </p>
      </div>
    </main>
    <section class="nosotros">
      <div class="nosotros-1">
        <h2>Sobre nosotros</h2>
        <p>     
        En SOL-RENOVA, creemos en un mundo donde el acceso a la energía es un derecho para todos. Nos esforzamos por conectar a las comunidades más aisladas con tecnologías de energía renovable que respetan el medio ambiente y mejoran las condiciones de vida. Trabajamos con dedicación y convicción, guiados por el ideal de un desarrollo más equitativo y sostenible.
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