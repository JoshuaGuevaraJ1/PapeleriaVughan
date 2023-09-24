<?php
    include '../Funciones/Funciones.php';

    $idProductos = $_GET['idProductos'];
    $filaDatosProductos = verDatoProducto($idProductos);
    
    if($filaDatosProductos){
        
        $consultaEliminar = "DELETE FROM Productos WHERE idProductos ='$idProductos'";
        $accion = eliminarDatoProducto($consultaEliminar);
        if ($accion){
            echo '
            <script>
                alert("Se ha eliminado el producto correctamente");
                window.location = "Productos.php";
            </script>';
        }
    }
?>