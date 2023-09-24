<?php
    include '../Funciones/Funciones.php';
    $idProductos = $_POST['idProductos'];
    $nombreProductos = $_POST['nombreProductos'];
    
    $consultaUpdateProducto = "UPDATE Productos SET idProductos = '$idProductos',  nombreProductos = '$nombreProductos' WHERE idProductos = '$idProductos'";
    $accion = modificarDatoProducto($consultaUpdateProducto);
    if ($accion){
        echo '
        <script>
            alert("Se han actualizado sus datos correctamente");
            window.location = "Productos.php";
        </script>';
    }
?>