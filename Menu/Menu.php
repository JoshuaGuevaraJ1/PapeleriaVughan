<?php
include_once '../Conexiones/ConexionPapeleria.php';
    
session_start();

if(!isset($_SESSION['usuario'])){
    echo '
        <script>
            alert("Por favor, debes iniciar sesión");
            window.location = "../Login/Index.php";
        </script>
    ';        
    session_destroy();
    die();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="../CSS/style.css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.1/css/all.css">
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/all.css"> -->
    <link rel="stylesheet" href="../assets/fontawesome-free-6.1.1-web/css/all.css">


    <title>Menú</title>
</head>
<body>
    <header>
        
        <img src="../Menu/ImagesAdministradores/<?php echo $_SESSION['usuario']; ?>.png" alt="">
        <a href="#" class="logo" style="text-transform:none;"></i><?php echo $_SESSION['usuario']; ?></a>

        <nav class="navbar">
            <a class="active" href="../Inicio/Inicio.php">Inicio</a>
            <a class="active" href="../Productos/Productos.php">Clasificación de productos</a>
            <a class="active" href="../Inventario/Inventario.php">Inventario</a>
            <div class="dropdown">
                <a href="" class="active" style = "pointer-events:none; cursor:default;">CRUD</a>
                <div class="dropdown-content">
                        <a href="../Inventario/InventarioBuscarVer.php">Buscar</a>
                        <a href="../Inventario/InventarioBuscarModificar.php">Modificar</a>
                        <a href="../Inventario/InventarioBuscarEliminar.php">Eliminar</a>
                    </div>
            </div>
            
            <!-- <a href="">review</a>
            <a href="">order</a> -->
        </nav>

        <div class="icons">
            <i class="fas fa-bars" id="menu-bars"></i>
            <!-- <i class="fas fa-search" id="search-icon"></i>
            <a href="#" class="fas fa-heart"></a> -->
            <a href="../Login/CerrarSesion.php" class="fa-solid fa-right-from-bracket"></a>
        </div>

    </header>

    <form action="" id="search-form">
        <input type="search" placeholder="search here..." name="" id="search-box">
        <label for="search-box" class="fas fa-search"></label>
        <i class="fas fa-times" id="close"></i>
    </form>
    
</body>
</html>