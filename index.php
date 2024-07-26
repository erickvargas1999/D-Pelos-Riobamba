<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Peluquería D'Pelos Riobamba - Inicio</title>
    <script src="https://kit.fontawesome.com/41bcea2ae3.js" crossorigin="anonymous"></script>
    <link rel="icon" href="img/logo.ico" type="image/png">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/css.css">
    <link rel="stylesheet" href="css/botonindex.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800&display=swap" rel="stylesheet"> 
    
</head>

<body>
    <header>
        <nav>
            <a href="index.php">Inicio</a>
            <a href="reserva.php"><?php 
            if (isset($_SESSION['etiqueta'])){
                echo $_SESSION['etiqueta'];
            } 
            ?></a>
            <a href="servicios.php">Servicios</a>
            <a href="contacto.php">Contacto</a>
            <a href="ayuda.php">Ayuda</a>
            
            <?php 
            if (isset($_SESSION['nombre_usuario']) && $_SESSION['rol_usuario'] === "usuario") {
                echo '
                <div class="menu-item">
                    <a href="#" class="dropdown-trigger"  style="color: #fff; font-weight: 300; text-decoration: none; margin-right: 10px; font-weight:bold;">' . $_SESSION['nombre_usuario'] . " " . $_SESSION['apellido_usuario'] . " " . '</a>
                    <div class="dropdown-content">
                        <a href="CitasCliente.php" style="text-align: left;">Mis citas</a>
                        <a href="UpdateCliente.php" style="text-align: left;">Actualizar mis datos</a>
                        <a href="UpdatePassword.php" style="text-align: left;">Cambiar mi contraseña</a>
                        <a href="logout.php" style="text-align: left;">Cerrar sesión</a>
                    </div>
                </div>
                ';
            } else {
                if (isset($_SESSION['nombre_usuario']) && $_SESSION['rol_usuario'] === "administrador") {
                    echo '
                    <div class="menu-item">
                        <a href="#" class="dropdown-trigger"  style="color: #fff; font-weight: 300; text-decoration: none; margin-right: 10px; font-weight:bold;">' . $_SESSION['nombre_usuario'] . " " . $_SESSION['apellido_usuario'] . " "  . '</a>
                        <div class="dropdown-content">
                            <a href="calendario_citas.php" style="text-align: left;" class="nav-link">Calendario de Citas</a>
                            <a href="Citas_Today.php" style="text-align: left;" class="nav-link">Ver citas de hoy</a>
                            <a href="Citas_All.php" style="text-align: left;" class="nav-link">Ver todas las citas</a>
                            <a href="Comentarios.php" style="text-align: left;" class="nav-link">Ver comentarios</a>
                            <a href="UpdateCliente.php" style="text-align: left;" class="nav-link">Actualizar mis datos</a>
                            <a href="UpdatePassword.php" style="text-align: left;" class="nav-link">Cambiar mi contraseña</a>
                            <a href="logout.php" style="text-align: left;" class="nav-link">Cerrar sesión</a>
                        </div>
                    </div>
                    ';
        
                }else{
                    echo '<a href="login_pagina.php">Iniciar Sesión</a>';
                }
            }
            ?>   
        </nav>
        <section class="textos-header">
            <h1>PELUQUERÍA D'PELOS  RIOBAMBA</h1>
            <h2>Confía en nosotros para darle vida a tu cabello.</h2>
        </section>
        <div class="wave" style="height: 150px; overflow: hidden;"><svg viewBox="0 0 500 150" preserveAspectRatio="none"
                style="height: 100%; width: 100%;">
                <path d="M0.00,49.98 C150.00,150.00 349.20,-50.00 500.00,49.98 L500.00,150.00 L0.00,150.00 Z"
                    style="stroke: none; fill: #fff;"></path>
            </svg></div>
    </header>
    <main>
        <section class="contenedor sobre-nosotros">
            <h2 class="titulo">DESCUBRE</h2>
            <div class="contenedor-sobre-nosotros">
                <img src="img/ilustracion2.jpg" alt="ilustracion2" class="imagen-about-us" title="Ilustración Peluquería 1">
                <div class="contenido-textos">
                    <h3><span>1</span>Activos desde 2002</h3>
                    <p>Bienvenidos a nuestra peluquería, donde la belleza y el cuidado de tu cabello son nuestra prioridad. Nos especializamos en brindar servicios de calidad en un ambiente acogedor y relajante.</p>
                    <h3><span>2</span>Los mejores productos</h3>
                    <p>En nuestra peluquería, utilizamos solo los mejores productos y herramientas de la industria para garantizar la satisfacción de nuestros clientes. Además, nos esforzamos por mantenernos al día en las últimas tendencias y técnicas en el cuidado del cabello.</p>
                    <h3><span>3</span>Nuestro sitio web</h3>
                    <p>En nuestro sitio web, encontrarás toda la información necesaria sobre nuestros servicios, precios y horarios. También puedes hacer reservas en línea y programar tus citas desde la comodidad de tu hogar. ¡Te esperamos para cuidar de tu cabello y hacer que te sientas radiante!</p>
                </div> 
            </div>
            <br>
            <div>
                <?php 
                    if (isset($_SESSION['nombre_usuario'])) {
                        echo '<center><a href="reserva.php">Reserva tu cita aquí</a></center>';
                        
                    } else {
                        echo '<center><a href="login_pagina.php">Reserva tu cita aquí</a></center>';
                    }
                ?>
             </div>
        </section>
        <section class="portafolio">
            <div class="contenedor">
                <h2 class="titulo">Nuestros Servicios</h2>
                <div class="galeria-port">
                    <div class="imagen-port">
                        <img src="img/cortes.jpg" alt="imagen corte cabello">
                        <div class="hover-galeria">
                            <a href="servicios.php"><img src="img/icono1.png" alt="icono flecha"></a>
                            <a href="servicios.php" style="text-decoration:none;"><p>Cortes de cabello</p></a>
                        </div>
                    </div>
                    <div class="imagen-port">
                        <img src="img/ondulaciones.jpg" alt="imagen Ondulaciones cabello">
                        <div class="hover-galeria">
                            <a href="servicios.php"><img src="img/icono1.png" alt="icono flecha"></a>
                            <a href="servicios.php" style="text-decoration:none;"><p>Ondulaciones</p></a>
                        </div>
                    </div>
                    <div class="imagen-port">
                        <img src="img/tintes.jpg" alt="imagen tintes cabello">
                        <div class="hover-galeria">
                            <a href="servicios.php"><img src="img/icono1.png" alt="icono flecha"></a>
                            <a href="servicios.php" style="text-decoration:none;"><p>Tintes</p></a>
                        </div>
                    </div>
                    <div class="imagen-port">
                        <img src="img/mechas.jpg" alt="imagen mechas cabello">
                        <div class="hover-galeria">
                            <a href="servicios.php"><img src="img/icono1.png" alt="icono flecha"></a>
                            <a href="servicios.php" style="text-decoration:none;"><p>Mechas</p></a>
                        </div>
                    </div>
                    <div class="imagen-port">
                        <img src="img/alisados.jpg" alt="imagen alisados con Keratina de cabello">
                        <div class="hover-galeria">
                            <a href="servicios.php"><img src="img/icono1.png" alt="icono flecha"></a>
                            <a href="servicios.php" style="text-decoration:none;"><p>Alisados con Keratina</p></a>
                        </div>
                    </div>
                    <div class="imagen-port">
                        <img src="img/maquillaje.jpg" alt="imagen Maquillaje">
                        <div class="hover-galeria">
                            <a href="servicios.php"><img src="img/icono1.png" alt="icono flecha"></a>
                            <a href="servicios.php" style="text-decoration:none;"><p>Maquillaje</p></a>
                        </div>
                    </div>
                    <div class="imagen-port">
                        <img src="img/peinados.jpg" alt="Imagen Peinados">
                        <div class="hover-galeria">
                            <a href="servicios.php"><img src="img/icono1.png" alt="icono flecha"></a>
                            <a href="servicios.php" style="text-decoration:none;"><p>Peinados</p></a>
                        </div>
                    </div>
                    <div class="imagen-port">
                        <img src="img/lipting.jpg" alt="Imagen Cejas y pestañas">
                        <div class="hover-galeria">
                            <a href="servicios.php"><img src="img/icono1.png" alt="icono flecha"></a>
                            <a href="servicios.php" style="text-decoration:none;"><p>Lipting de cejas y pestañas</p></a> 
                        </div>
                    </div>
                </div>
                <br><br>
                <div>
                    <center><a href="servicios.php">Servicios</a></center>
                 </div>
                </div>            
        </section>
        <section class="clientes contenedor">
            <h2 class="titulo">¿Qué dicen nuestros clientes?</h2>
            <div class="cards">
                <div class="card">
                    <img src="img/face1.jpg" alt="">
                    <div class="contenido-texto-card">
                        <h4>Cristina Chávez</h4>
                        <p style="text-align: justify;">La peluquería ofrece un servicio excepcional. La estilista es talentosa y siempre escucha mis deseos para crear el peinado perfecto.
                        </p>
                    </div>
                </div>
                <div class="card">
                    <img src="img/face2.jpg" alt="">
                    <div class="contenido-texto-card">
                        <h4>Luis Asqui</h4>
                        <p style="text-align: justify;">Una de las mejores peluquerías que hay hoy en día en la ciudad de Riobamba y en lo que respecta a calidad y precio son excelentes.</p>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!--Boton de ir hacia arriba-->
    <div id="button-up">
        <i class="fa-solid fa-chevron-up"></i>
    </div>

    <footer>
        <div class="contenedor-footer">
            <div class="content-foo">
                <h4>Teléfono</h4>
                <p>0999895984</p>
            </div>
            <div class="content-foo">
                <h4>Email</h4>
                <p>peluqueriadpelos@gmail.com</p>
            </div>
            <div class="content-foo">
                <h4>Dirección</h4>
                <p>Junin y Espejo, Riobamba</p>
            </div>
            <div class="content-foo">
                <h4>Contáctanos</h4>
                <a href="https://www.facebook.com/PeluqueriaDPelosRiobamba?wtsid=rdr_0yaWzzrXmrCKMomZ7"><img src="img/facebook.png" alt="Icono Facebook" title="Facebook" style="height: 25px;"></a>
                <a href="https://www.instagram.com/peluqueria_dpelos_riobamba/"><img src="img/instagram.png" alt="Icono Instagram" title="Instagram"style="height: 25px; "></a>
                <a href="https://wa.me/593999895984"><img src="img/whatsapp.png" alt="Icono whatsapp" title="Whatsapp" style="height: 25px;"></a>
                </div>
        </div>   
        <h2 class="titulo-final">&copy; Copyright 2023 | ESPOCH</h2>
    </footer>
    <script src="js/button-up.js"></script>
    <script src="js/menudespegable.js"></script>
</body>

</html>