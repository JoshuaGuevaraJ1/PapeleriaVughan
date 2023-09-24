<?php
include '../Funciones/Funciones.php';
    $idInventarios = $_POST['idInventarios'];
    $idProductos = $_POST['idProductos'];
    $idProveedores = $_POST['idProveedores'];
    $cantidad = $_POST['cantidad'];
    $precio = $_POST['precio'];
    $descripción = $_POST['descripción'];

    $consultaAddInventario = "INSERT INTO Inventarios VALUES(UPPER('$idInventarios'), '$idProveedores', '$idProductos', '$cantidad', '$precio', '$descripción')";
    
    $accion = addDatoInventario($consultaAddInventario);
        if ($accion){
            echo '
            <script>
                alert("Se ha añadido el producto correctamente");
                window.location = "Inventario.php";
            </script>';
        }else{
            echo 'error'.mysqli_error(conexionPrincipal());
        }
?>