<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: url(img/fondosignin.jpg);
            background-attachment: fixed;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .logout-container {
            text-align: center;
            background-color: #fff;
            padding: 30px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        progress {
            width: 100%;
            height: 30px;
            border: none;
            border-radius: 3px;
        }
        
        progress.animate {
            animation: progressAnimation 2s linear forwards;
        }

        progress.animate::-webkit-progress-value {
            background-color: #4d0686;
        }

        .progress-text {
            font-weight: bold;
            color: #555;
        }

        @keyframes progressAnimation {
            from { width: 0; }
        }
    </style>
</head>
<body>
    <div class="logout-container">
        <?php
            session_unset();
            session_destroy();
            echo '<meta http-equiv="refresh" content="2;url=login_pagina.php">';
        ?>
        <progress class="animate" max="100" value="100"></progress>
        <br>
        <span class="progress-text">Cerrando sesión, por favor espera...</span>
    </div>
</body>
</html>
