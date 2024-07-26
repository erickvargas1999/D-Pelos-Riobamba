<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Peluquería D'Pelos Riobamba - Reserva tu Cita</title>
    <script src="https://kit.fontawesome.com/41bcea2ae3.js" crossorigin="anonymous"></script>
    <script src="js/campovacio.js"></script>
    <link rel="stylesheet" href="css/css.css">
    <link rel="shortcut icon" href="img/logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css//sigin.css">
    <link rel="stylesheet" href="css/estiloreserva.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800&display=swap" rel="stylesheet"> 

<body>
   
    <header class="portadaReserva">
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
            <div class="formulario"><br>    
                <div class="form-box">
                    <div class="left">
                        <img src="img/imgform.jpg" alt="Imagen cliente satisfecho" title="Ilustración Cliente" style="height: 650px;margin: 0px;">
                    </div>
                    <form action="insertreservas.php" method= "POST">
                    <div class="right">
                        <h2 style="color: #4d0686">Reserva tu cita</h2>
                        <label for="id_servicio" class="lblreserva">Servicio:</label>
                        <select style="width: 100%" name="id_servicio" class="field" id="id_servicio" placeholder="Servicio" required>
                            <option value="serv1">Corte de Cabello</option>
                            <option value="serv2">Ondulado</option>
                            <option value="serv3">Tinte</option>
                            <option value="serv4">Mechas</option>
                            <option value="serv5">Alisado con keratina</option>
                            <option value="serv6">Maquillaje</option>
                            <option value="serv7">Peinado</option>
                            <option value="serv8">Lipting de cejas y/o pestañas</option>
                            <style>
                                /* Cambiar color del fondo */
                                select option {
                                    background-color: yellow; /* Cambia "yellow" por el color deseado */
                                }
                            </style>
                        </select>
                        <label for="date_reserva" class="lblreserva">Fecha de la cita:</label>
                        <input type="date" name="date_reserva" min="" class="field" id="date_reserva" placeholder="Fecha de la cita" required>
                        <label for="hora_reserva" class="lblreserva">Hora de la cita:</label>
                        <select style="width: 100%" class="field" name="hora_reserva" required>
                            <option value="08:30">08:30</option>
                            <option value="09:00">09:00</option>
                            <option value="09:30">09:30</option>
                            <option value="10:00">10:00</option>
                            <option value="10:30">10:30</option>
                            <option value="11:00">11:00</option>
                            <option value="11:30">11:30</option>
                            <option value="12:00">12:00</option>
                            <option value="12:30">12:30</option>
                            <option value="13:00">13:00</option>
                            <option value="13:30">13:30</option>
                            <option value="14:00">14:00</option>
                            <option value="14:30">14:30</option>
                            <option value="15:00">15:00</option>
                            <option value="15:30">15:30</option>
                            <option value="16:00">16:00</option>
                            <option value="16:30">16:30</option>
                            <option value="17:00">17:00</option>
                            <option value="17:30">17:30</option>
                            <option value="18:00">18:00</option>
                            <option value="18:30">18:30</option>
                            <option value="19:00">19:00</option>
                            <option value="19:30">19:30</option>
                        </select>
                        <label for="comentario" class="lblreserva">Comentario:</label>
                        <textarea id="comentario" class="field" name="comentario" placeholder="Deje su mensaje (Opcional)"></textarea>
                        <button type="submit" id="input-submit" name="submit">Reservar</button>
                        <br>
                        <?php
                        if (isset($_SESSION['reserva_cita'])) {
                            echo '<span style="color: green;">' . $_SESSION['reserva_cita'] . '</span><br>';
                            unset($_SESSION['reserva_cita']);
                        }
                        ?>
                        
                        <?php
                        if (isset($_SESSION['no_reserva_cita'])) {
                            echo '<span style="color: red;">' . $_SESSION['no_reserva_cita'] . '</span><br>';
                            unset($_SESSION['no_reserva_cita']);
                        }
                        ?>

                        <?php
                        if (isset($_SESSION['campo_req'])) {
                            echo '<span style="color: red;">' . $_SESSION['campo_req'] . '</span><br>';
                            unset($_SESSION['campo_req']);
                        }
                        ?>

                        <?php
                        if (isset($_SESSION['no_inicio'])) {
                            echo '<span style="color: red;">' . $_SESSION['no_inicio'] . '</span><br>';
                            unset($_SESSION['no_inicio']);
                        }
                        ?>
                        </form>
                    </div>
                </div>
                
                <script>
                    // Obtener el elemento del input de fecha
                    const fechaInput = document.getElementById('date_reserva');
            
                    // Obtener la fecha actual en el formato necesario (YYYY-MM-DD)
                    const fechaActual = new Date().toISOString().split('T')[0];
            
                    // Establecer el atributo "min" del input para restringir las fechas anteriores
                    fechaInput.setAttribute('min', fechaActual);
                </script>
            </div>
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