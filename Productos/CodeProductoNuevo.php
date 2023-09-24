<?php
include '../Funciones/Funciones.php';
    $idProductos = $_POST['idProductos'];
    $nombreProductos = $_POST['nombreProductos'];

    $consultaAddProducto = "INSERT INTO Productos VALUES('$idProductos', '$nombreProductos')";
    
    $accion = addDatoProducto($consultaAddProducto);
        if ($accion){
            echo '
            <script>
                alert("Se ha añadido el producto correctamente");
                window.location = "Productos.php";
            </script>';
        }else{
            echo 'error'.mysqli_error(conexionPrincipal());
        }
?>