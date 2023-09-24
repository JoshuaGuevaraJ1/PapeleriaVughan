<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Papelería Vaughan</title>
</head>
<body>
    
    <?php 
        include '../Funciones/Funciones.php';
        banner();
        session_start();
    ?>
    <section class="home" id="home">
        <div class="swiper-container home-slider">

            <div class="swiper-wrapper wrapper">

                <div class="swiper-slide slide">
                    <div class="content">
                        <span>Bienvenido al Sistema de Empleados de la Papelería Vaughan</span>
                        <h3 style="font-size:6rem;"><?php echo $_SESSION['usuario']; ?></h3>
                        <p>Solo lo mejor</p>
                        <a href="#" class="btn">order now</a>
                    </div>
                    <div class="image">
                        <img src="../images/home-img-1.png" alt="">
                    </div>
                </div>

                <div class="swiper-slide slide">
                    <div class="content">
                        <span>Bienvenido al Sistema de Empleados de la Papelería Vaughan</span>
                        <h3 style="font-size:6rem;"><?php echo $_SESSION['usuario']; ?></h3>
                        <p>Solo lo mejor</p>
                        <a href="#" class="btn">order now</a>
                    </div>
                    <div class="image">
                        <img src="../images/home-img-2.png" alt="">
                    </div>
                </div>

                <div class="swiper-slide slide">
                    <div class="content">
                        <span>Bienvenido al Sistema de Empleados de la Papelería Vaughan</span>
                        <h3 style="font-size:6rem;"><?php echo $_SESSION['usuario']; ?></h3>
                        <p>Solo lo mejor</p>
                        <a href="#" class="btn">order now</a>
                    </div>
                    <div class="image">
                        <img src="../images/home-img-3.png" alt="">
                    </div>
                </div>

            </div>

            <div class="swiper-pagination"></div>

        </div>
    </section>
    <?php
        menu();
        piePagina();
        // importScripts();
        
    ?>
</body>
</html>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<!-- custom js file link  -->
<script src="../js/script.js"></script>