<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Peluquería D'Pelos Riobamba - Ayuda</title>
    <script src="https://kit.fontawesome.com/41bcea2ae3.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="img/logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/sigin.css">
    <link rel="stylesheet" href="css/estiloayuda.css">
    <link rel="stylesheet" href="css/css.css">
    <script src="js/ayuda.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800&display=swap" rel="stylesheet"> 
</head>

<body>
   
    <header class="portadaAyuda">
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
            <div>
                <h2 class="tituloAyuda">Preguntas Frecuentes</h2>
                
            </div>
            <div>
                <p class="textAyuda">
                    En esta sección, encontrarás respuestas a las preguntas más comunes que nuestros clientes tienen sobre 
                    nuestros servicios de belleza y peluquería. Si tienes alguna pregunta adicional, no dudes en ponerte 
                    en contacto con nosotros a través de nuestro formulario en línea o número de teléfono. ¡Estaremos encantados de ayudarte!
                </p>
            </div>
            <div class="formulario"><br>    
                <div class="form-box">
                    <div class="left">
                        <div class="box">
                            <div class="text">
                                <br>
                                <h2>¿Cómo puedo agendar una cita?</h2>
                                <p>Puedes llenar nuestro formulario en la sección reservaciones o llamando a nuestro número de teléfono y te responderemos con brevedad posible.
                                </p>
                                <br>
                            </div>
                        </div>
                        <div class="box">
                            <div class="text">
                                <h2>¿Cuáles son los horarios del salón de belleza?</h2>
                                <p>
                                    Nuestro salón de belleza está abierto de lunes a sábado de 9 a.m. a 7:30 p.m. También ofrecemos citas fuera de horario por solicitud previa.
                                </p>
                                <br>
                            </div>
                        </div>
                        <div class="box">
                            <div class="text">
                                <h2>¿Qué métodos de pago aceptan?</h2>
                                <p>
                                    Aceptamos pagos en efectivo, trasferencias bancarias y pago a través de la plataforma "DeUna" de Banco Pichincha.
                                </p>
                                <br>
                            </div>
                        </div>
                        <div class="box">
                            <div class="text">
                                <h2>¿Puedo cancelar o cambiar una cita?</h2>
                                <p>
                                    Sí, puedes cancelar o cambiar una cita en línea o llamando a nuestro número de teléfono. Te pedimos que nos notifiques al menos 24 horas antes de tu cita programada para evitar cargos por cancelación tardía.
                                </p>
                                <br>
                            </div>
                        </div>
                    </div>
                    <form action="insertcomentario.php" method="POST">
                    <?php
                        if (isset($_SESSION['nombre_usuario'])) {
                            echo '
                                <div class="right">
                                    <h2>Contáctanos</h2>
                                    <textarea class="field" name="mensaje" id="mensaje" placeholder="Ayúdanos a mejorar dejando tu mensaje, duda u opinión."></textarea>
                                    <button type="submit" id="input-submit" name="submit">Enviar</button>
                                </div>
                                
                            ';
                            
                            if (isset($_SESSION['comentario'])) {
                                echo '<span style="color: green;">' . $_SESSION['comentario'] . '</span><br>';
                                unset($_SESSION['comentario']);
                            }

                            if (isset($_SESSION['no_comentario'])) {
                                echo '<span style="color: red;">' . $_SESSION['no_comentario'] . '</span><br>';
                                unset($_SESSION['no_comentario']);
                            }

                            if (isset($_SESSION['campo'])) {
                                echo '<span style="color: red;">' . $_SESSION['campo'] . '</span><br>';
                                unset($_SESSION['campo']);
                            }
    
                        } else {
                            echo ' ';
                        }   
                    ?>
                    </form>
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