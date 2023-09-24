<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar un producto dentro del inventario</title>
</head>
<body class="login">
    <?php 
        include '../Funciones/Funciones.php';
        banner();
        menu();
    ?>
    <section class="box-container">
        <div class="box" style="margin-left:30%; margin-right:30%; margin-top:10%">
            <form action='VistaInventarioModificar.php' method = "GET">    
                <h1 class="sub-heading">Clave del producto en el inventario</h1>
                <input type="text" name="idInventario" style="text-transform:uppercase;" required minlength="5" maxlength="5" size="5" >
                <div style="text-align:center; width:100%; margin: 1rem 0;">
                    <button class="btn">Modificar</button>
                </div>
            </form>
        </div>
        
    </section>
    
</body>
<?php piePagina(); ?>
</html>