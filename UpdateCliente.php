<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Peluquería D'Pelos Riobamba - Actualiza tus datos</title>
    <script src="https://kit.fontawesome.com/41bcea2ae3.js" crossorigin="anonymous"></script>
    <script src="js/campovacio.js"></script>
    <link rel="stylesheet" href="css/css.css">
    <link rel="shortcut icon" href="img/logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css//sigin.css">
    <link rel="stylesheet" href="css/UpdateCliente.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="css/loading.css">
</head>

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
                        <img src="img/updateform1.jpg" alt="Imagen cliente satisfecho" title="Ilustración Cliente" style="height: 650px;margin: 0px;">
                    </div>
                    
                    <div class="right">
                        <h2 style="color: #4d0686">Actualiza tus datos</h2>
                        <form action="update.php" method="POST" id="formularioActualizar" onsubmit="return mostrarConfirmacion();">
                            
                            <label for="nombre" class="lblreserva">Nombre:</label>
                            <input type="text" name="nombre" id="nombre" class="field" placeholder="Nombre" value="<?php echo $_SESSION['nombre_usuario']; ?>" required>
                        
                            <label for="apellido" class="lblreserva">Apellido:</label>
                            <input type="text" name="apellido" id="apellido" class="field" placeholder="Apellido" value="<?php echo $_SESSION['apellido_usuario']; ?>" required>
                        
                            <label for="CI" class="lblreserva">Cédula de Identidad (No Modificable):</label>
                            <input type="text" name="CI" id="CI" class="field" value="<?php echo isset($_SESSION['CI_usuario']) ? $_SESSION['CI_usuario'] : ''; ?>" readonly>
                            
                            <label for="email"  class="lblreserva">Correo Electrónico:</label>
                            <input type="email" name="email" placeholder="Correo electrónico" id="email" class="field" value="<?php echo $_SESSION['correo_usuario']; ?>" required>
                        
                            <label for="tel"  class="lblreserva">Número de celular:</label>
                            <input type="tel" name="tel" placeholder="Número de celular" id="tel" maxlength="10" class="field" value="<?php echo $_SESSION['tel_usuario']; ?>" required>
                            <script>
                                document.getElementById('tel').addEventListener('input', function() {
                                this.value = this.value.replace(/[^\d]/g, '');
                                });
                            </script>
                            <label for="birth"  class="lblreserva">Fecha de nacimiento:</label>
                            <input type="date" name="birth" id="birth" class="field" value="<?php echo $_SESSION['birth_usuario']; ?>" required>
                            <button type="submit" id="input-submit" name="submit" oneclick="return false;">Guardar Cambios</button>
                        </form>
                        <?php
                            if (isset($_SESSION['exito_actualizacion'])) {
                                echo '<span style="color: green;">' . $_SESSION['exito_actualizacion'] . '</span><br>';
                                unset($_SESSION['exito_actualizacion']);
                            
                                echo '<script>
                                    setTimeout(function() {
                                        window.location.href = "logout.php";
                                    }, 0);
                                </script>';
                            }
                        ?>
                        <?php
                            if (isset($_SESSION['error_actualizacion'])) {
                                echo '<span style="color: red;">' . $_SESSION['error_actualizacion'] . '</span><br>';
                                unset($_SESSION['error_actualizacion']);
                            }
                        ?>
                        
                         <?php
                            if (isset($_SESSION['error_duplicado'])) {
                                echo '<span style="color: red;">' . $_SESSION['error_duplicado'] . '</span><br>';
                                unset($_SESSION['error_duplicado']);
                            }
                        ?>
                    </div>
                </div>
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
    <div class="loading">
        <div class="loading-dot"></div>
        <div class="loading-dot"></div>
        <div class="loading-dot"></div>
    </div>
    <script src="js/button-up.js"></script>
    <script src="js/menudespegable.js"></script>
    <script src="js/habilitar_campo.js"></script>
    <script src="js/update.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/loading.js"></script>
</body>

</html>