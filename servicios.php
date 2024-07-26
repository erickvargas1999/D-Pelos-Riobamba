<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Peluquería D'Pelos Riobamba - Servicios</title>
    <script src="https://kit.fontawesome.com/41bcea2ae3.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="img/logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/estiloservicios.css">
    <link rel="stylesheet" href="css/submenu.css">
    <link rel="stylesheet" href="css/botonindex.css">
    <link rel="stylesheet" href="css/css.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800&display=swap" rel="stylesheet"> 
</head>

<body>
   
    <header class="portadaServicios">
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
    </header>
    <main>
        <section class="contenedor sobre-nosotros">
            <a href="" name="Cortes de Cabello" style="text-decoration: none;"><h2 class="titulo">Cortes de Cabello</h2></a>
            <div class="contenedor-sobre-nosotros">
                <img src="img/cortes.jpg" alt="Imagen Corte de Cabello" title="Imagen Corte de Cabello" style="width: 29%;border-radius: 30px;">
                <div class="contenido-textos">
                    <h1 style="font-size: 20px;">Descripción</h1>
                    <br>
                    <p style="padding-left: 2px; text-align: justify;">¡Bienvenido/a a nuestra sección de corte de cabello! Ofrecemos una variedad de estilos y opciones para niños, niñas, jóvenes y adultos, sin importar su género. Nuestra estilista está lista para brindarte un servicio personalizado y crear el look perfecto que exprese tu estilo y personalidad.
                    </p>
                    <h1 style="font-size: 20px;">Tiempo</h1>
                    <br>
                    <p style="padding-left: 2px; text-align: justify;">De 15 a 20 minutos apróximadamente</p>
                </div>
            </div>
            
        </section>
        <section class="contenedor sobre-nosotros">
            
            <a href="" name="Cortes de Cabello" style="text-decoration: none;"><h2 class="titulo">Ondulaciones</h2></a>
            <div class="contenedor-sobre-nosotros">
                <img src="img/ondulaciones.jpg" alt="Imagen Ondulación de Cabello" title="Imagen Ondulación de Cabello" style="width: 29%;border-radius: 30px;">
                <div class="contenido-textos">
                    <h1 style="font-size: 20px;">Descripción</h1>
                    <br>
                    <p style="padding-left: 2px; text-align: justify;">¡Descubre la magia de la ondulación de cabello en nuestro exclusivo salón de belleza! En nuestro encantador oasis de estilo, te invitamos a sumergirte en un mundo de rizos irresistibles y belleza sin igual.
                    </p>
                    <h1 style="font-size: 20px;">Tiempo</h1>
                    <br>
                    <p style="padding-left: 2px; text-align: justify;">2 horas apróximadamente</p>
                </div>
            </div>

            <br>
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

        <section class="contenedor sobre-nosotros">
            
            <a href="" name="Tintes de Cabello" style="text-decoration: none;"><h2 class="titulo">Tintes</h2></a>
            <div class="contenedor-sobre-nosotros">
                <img src="img/tintes.jpg" alt="Imagen Tintes de Cabello" title="Imagen Tintes de Cabello" style="width: 29%;border-radius: 30px;">
                <div class="contenido-textos">
                    <h1 style="font-size: 20px;">Descripción</h1>
                    <br>
                    <p style="padding-left: 2px; text-align: justify;">!Descubre el poder del color en nuestro exclusivo salón de belleza! En nuestro paraíso del estilo, te invitamos a explorar una infinidad de posibilidades para transformar tu cabello con nuestros servicios de tinte capilar de primera calidad.
                    </p>
                    <h1 style="font-size: 20px;">Tiempo</h1>
                    <br>
                    <p style="padding-left: 2px; text-align: justify;">3 horas apróximadamente</p>
                </div>
            </div>
        </section>

        <section class="contenedor sobre-nosotros">
            
            <a href="" name="Tintes de Cabello" style="text-decoration: none;"><h2 class="titulo">Mechas</h2></a>
            <div class="contenedor-sobre-nosotros">
                <img src="img/mechas.jpg" alt="Imagen mechas de Cabello" title="Imagen mechas de Cabello" style="width: 29%;border-radius: 30px;">
                <div class="contenido-textos">
                    <h1 style="font-size: 20px;">Descripción</h1>
                    <br>
                    <p style="padding-left: 2px; text-align: justify;">¡Descubre la magia de los mechones de cabello en nuestro exquisito salón de belleza! En nuestro exclusivo santuario de estilo, te invitamos a sumergirte en la última tendencia en coloración capilar: ¡mechas de cabello!
                    </p>
                    <h1 style="font-size: 20px;">Tiempo</h1>
                    <br>
                    <p style="padding-left: 2px; text-align: justify;">5 horas apróximadamente</p>
                </div>
            </div>
            <br>
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

        <section class="contenedor sobre-nosotros">
            
            <a href="" name="Alisados de Keratina de Cabello" style="text-decoration: none;"><h2 class="titulo">Alisados con Keratina</h2></a>
            <div class="contenedor-sobre-nosotros">
                <img src="img/alisados.jpg" alt="Alisados de Keratina de Cabello" title="Alisados de Keratina de Cabello" style="width: 29%;border-radius: 30px;">
                <div class="contenido-textos">
                    <h1 style="font-size: 20px;">Descripción</h1>
                    <br>
                    <p style="padding-left: 2px; text-align: justify;">¡Descubre la magia de los mechones de cabello en nuestro exquisito salón de belleza! En nuestro exclusivo santuario de estilo, te invitamos a sumergirte en la última tendencia en coloración capilar: ¡mechas de cabello!
                    </p>
                    <h1 style="font-size: 20px;">Tiempo</h1>
                    <br>
                    <p style="padding-left: 2px; text-align: justify;">5 horas apróximadamente</p>
                </div>
            </div>
        </section>

        <section class="contenedor sobre-nosotros">
            
            <a href="" name="Maquillaje" style="text-decoration: none;"><h2 class="titulo">Maquillaje</h2></a>
            <div class="contenedor-sobre-nosotros">
                <img src="img/maquillaje.jpg" alt="Maquillaje" title="Maquillaje" style="width: 29%;border-radius: 30px;">
                <div class="contenido-textos">
                    <h1 style="font-size: 20px;">Descripción</h1>
                    <br>
                    <p style="padding-left: 2px; text-align: justify;">¡Descubre la magia de los mechones de cabello en nuestro exquisito salón de belleza! En nuestro exclusivo santuario de estilo, te invitamos a sumergirte en la última tendencia en coloración capilar: ¡mechas de cabello!
                    </p>
                    <h1 style="font-size: 20px;">Tiempo</h1>
                    <br>
                    <p style="padding-left: 2px; text-align: justify;">De 45 a 60 minutos apróximadamente</p>
                </div>
            </div>
            <br>
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

        
        <section class="contenedor sobre-nosotros">
            
            <a href="" name="peinados" style="text-decoration: none;"><h2 class="titulo">Peinados</h2></a>
            <div class="contenedor-sobre-nosotros">
                <img src="img/peinados.jpg" alt="peinados" title="peinados" style="width: 29%;border-radius: 30px;">
                <div class="contenido-textos">
                    <h1 style="font-size: 20px;">Descripción</h1>
                    <br>
                    <p style="padding-left: 2px; text-align: justify;">Déjate cautivar por nuestra pasión por el cabello y descubre la magia de nuestros peinados exclusivos. En nuestro salón, el arte se fusiona con la moda para crear estilos únicos y deslumbrantes.
                    </p>
                    <h1 style="font-size: 20px;">Tiempo</h1>
                    <br>
                    <p style="padding-left: 2px; text-align: justify;">1 hora apróximadamente</p>
                </div>
            </div>
        </section>
        <section class="contenedor sobre-nosotros">
            
            <a href="" name="Lipting de cejas y pestañas" style="text-decoration: none;"><h2 class="titulo">Lipting de cejas y pestañas</h2></a>
            <div class="contenedor-sobre-nosotros">
                <img src="img/lipting.jpg" alt="Lipting de cejas y pestañas" title="Lipting de cejas y pestañas" style="width: 29%;border-radius: 30px;">
                <div class="contenido-textos">
                    <h1 style="font-size: 20px;">Descripción</h1>
                    <br>
                    <p style="padding-left: 2px; text-align: justify;">Tus cejas y pestañas cobran vida con el fascinante arte del lipting! Prepárate para experimentar una transformación impactante que resaltará tu belleza natural y te dejará deslumbrada.
                    </p>
                    <h1 style="font-size: 20px;">Tiempo</h1>
                    <br>
                    <p style="padding-left: 2px; text-align: justify;">1 hora 30 minutos apróximadamente</p>
                </div>
            </div>
            <br>
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
    <div class="loading">
        <div class="loading-dot"></div>
        <div class="loading-dot"></div>
        <div class="loading-dot"></div>
    </div>
    <script src="js/button-up.js"></script>
    <script src="js/menudespegable.js"></script>
</body>

</html>