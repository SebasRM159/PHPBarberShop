<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>David Rodríguez: Barbería</title>
    <link rel="stylesheet" href="./styles/stylesheet.css">
    <script src="./js/pages.js" defer></script>

</head>
<body>
    <!-- SIDEBAR -->

    <aside class="menu__sidebar">
        <div class="menu__brownsquare"></div>
        <img id="image" src="./images/Logo.png" class="menu__image" alt="Logo">
        <ul class="menu__list">
            <button id="show-agenda-form" class="menu__link">
                <li>Agenda</li>
            </button>
            <button id="show-cita-form" class="menu__link">
                <li>Citar</li>
            </button>
            <a href="./template/login.php" class="menu__link">
                <li>Login</li>
            </a>
            <a aria-label="Vista" class="menu__link">
                <li>Vista</li>
            </a>
        </ul>
    </aside>

<!-- MAIN -->
<main id='root'>
    <div id="agenda-form" style="display: none;">
        <?php include('./template/agenda.html'); ?>
    </div>
    <div id="cita-form" style="display: none;">
        <?php include('./template/cita.html'); ?>
    </div>
</main>
    <!-- FOOTER-->
<!-- ------------------------------------------------------------------------------------------------------------------ -->
    <footer>
        <div class="footer">

            <nav class="footer-redes">
                    <a target="_blank" class="ig" href="https://www.instagram.com/labarberia_dr/?hl=es"> <img src="./images/ig.png"> </a>  
                    <a target="_blank" class="tito" href="https://www.tiktok.com/@labarberiadr"> <img src="./images/tittto.png"> </a> 
            </nav>

            <nav class="footer-Contacto">
                <ul>
                    <li class="footer-text"> Tel: 6042088833 </li>
                    <li class="footer-text"> Cel: 301 4090251 </li>
                    <li class="footer-text"> Correo: LabarberiaDR@gmail.com </li>
                </ul>
            </nav>

            <nav class="footer-Ubicacion">
                <ul>
                    <li class="footer-text"> Calle 57 #66bb-47</li>
                    <li class="footer-text"> Bello Antioquia</li>
                </ul>
                <li>
                    <a target="_blank" href="https://www.google.com/maps/place/David+Rodr%C3%ADguez-+La+Barber%C3%ADa/@6.3414378,-75.5703336,15z/data=!4m6!3m5!1s0x8e442fb27cb43ad3:0xe7d47a966ce8f0d5!8m2!3d6.3421657!4d-75.5710484!16s%2Fg%2F11g6b3t5qq?entry=ttu&g_ep=EgoyMDI1MDQyMi4wIKXMDSoASAFQAw%3D%3D"><img src="./images/Ubicacion.png"> </a>
                </li>
            </nav>

        </div>
    </footer>

    <!-- ASIDE2 -->
 <!-- ------------------------------------------------------------------------------------------------------------------ -->

  </body>

</html>