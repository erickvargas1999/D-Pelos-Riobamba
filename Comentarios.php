<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Peluquería D'Pelos Riobamba</title>
    <script src="https://kit.fontawesome.com/41bcea2ae3.js" crossorigin="anonymous"></script>
    <link rel="icon" href="img/logo.ico" type="image/png">
    <link rel="stylesheet" href="css/Comentarios.css">
    <link rel="stylesheet" href="css/css.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800&display=swap" rel="stylesheet"> 
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            display: flex;
            justify-content: center;
            color: #333;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            margin: auto;
            margin-bottom: 80px;
        }

        table th {
            background-color: #4D0686;
            color: #fff;
            font-weight: bold;
            padding: 10px;
            text-transform: uppercase;
            letter-spacing: 1px;
            border-top: 1px solid #fff;
            border-bottom: 1px solid #ccc;
        }

        table tr:nth-child(even) td {
            background-color: #f2f2f2;
        }

        table tr:hover td {
            background-color: #D6C1CB;
        }

        table td {
            background-color: #fff;
            padding: 10px;
            border-bottom: 1px solid #ccc;
            max-width: 250px;
        }
    </style>
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
    </header>
    <main>
        <section >
            <br><br>
            <h2 class="titulo">Comentarios de los Clientes</h2>
            <div class="contenedor-sobre-nosotros">
                <div class="contenido-textos">
                <table id="miTabla" border="0" >
                    <tr>
                        <th>Num. Comentario</th>
                        <th>Apellido</th>
                        <th>Nombre</th>
                        <th>Mensaje</th>
                        <th></th>
                    </tr>

                    <?php
                    $ci = $_SESSION['CI_usuario'];
                    require("connection_db.php");
                    $query = "CALL obtener_comentarios();";
                    $result = mysqli_query($link, $query);
                    ?>


                    <?php
                    if(mysqli_num_rows($result) > 0){
                        while($mostrar=mysqli_fetch_array($result)){
                            ?>
        
                            <tr>
                                <td><?php echo $mostrar['id_comentario'] ?></td>
                                <td><?php echo $mostrar['apellido'] ?></td>
                                <td><?php echo $mostrar['nombre'] ?></td>
                                <td><?php echo $mostrar['mensaje'] ?></td>
                                <td><a href="" class="table__item__link">Eliminar</a></td>
                            </tr>
                            <?php 
                            }
                            ?>
        
                            <script>
                                    // Agregar evento de clic a todas las filas de la tabla
                                    var table = document.getElementById("miTabla");
                                    var filas = table.getElementsByTagName("tr");
        
                                    for (var i = 0; i < filas.length; i++) {
                                        filas[i].addEventListener("click", function () {
                                            var primeraCelda = this.getElementsByTagName("td")[0];
                                            var valorCelda = primeraCelda.innerText;
                                            console.log("Valor de la primera celda en la fila:", valorCelda);
        
                                            // Obtener el enlace "Cancelar" dentro de la celda y asignarle el valor de valorCelda al atributo href
                                            var enlaceCancelar = this.querySelector(".table__item__link");
                                            enlaceCancelar.href = "eliminar_comentario.php?id_comentario=" +valorCelda;
                                        });
                                    }
                                </script>
                    <?php
                    }else{
                        ?>
                        <tr>
                            <td colspan="5" style="text-align: center;">Sin registros disponibles</td>
                        </tr>
                    
                    <?php
                    }
                    ?>
                </table>
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
    <script src="js/menudespegable.js"></script>
    <script src="js/button-up.js"></script>
    <script src="js/confirmaciondeletecomentario.js"></script>
</body>

</html>