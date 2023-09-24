<?php
    include '../Funciones/Funciones.php';

    $idInventarios = $_POST['idInventarios'];
    $idProductos = $_POST['idProductos'];
    $idProveedores = $_POST['idProveedores'];
    $cantidad = $_POST['cantidad'];
    $precio = $_POST['precio'];
    $descripción = $_POST['descripción'];
    
    $consultaUpdateInventarios = "UPDATE Inventarios SET idInventarios = '$idInventarios', idProveedores = '$idProveedores', idProductos = '$idProductos', cantidad = '$cantidad', precio = '$precio', descripción = '$descripción' WHERE idInventarios = '$idInventarios'";
    $accion = modificarDatoInventario($consultaUpdateInventarios);
    if ($accion){
        echo '
        <script>
            alert("Se han actualizado sus datos correctamente");
            window.location = "Inventario.php";
        </script>';
    }
?>