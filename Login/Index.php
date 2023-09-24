<?php

    session_start();
    if(isset($_SESSION['usuario'])){
        header("location: ../Inicio/Inicio.php");
    }

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesión</title>
</head>
<body class="login">
    <?php
        include '../Funciones/Funciones.php';
        banner();
    ?>
    <section class="box-container">
        <div class="box" style="margin-left:30%; margin-right:30%; margin-top:10%">
            <form action="PruebaDatos.php" method = "GET">    
                <h1 class="heading" style="color:var(--green);">Usuario</h1>
                <input type="text" name="usuario" required class="inputLogin">
                <br>
                <br>
                <h1 class="heading" style="color:var(--green);">Contraseña</h1>
                <input type="password" name = "password" required class="inputLogin">
                <div style="text-align:center;width:100%; margin: 1rem 0;">
                    <button class="btn">Iniciar sesión</button>
                </div>
            </form>
        </div>
    </section>
    
    <?php piePagina(); ?>
</body>
</html>
