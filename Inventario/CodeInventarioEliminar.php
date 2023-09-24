<?php
    include '../Funciones/Funciones.php';

    $idInventarios = $_GET['idInventario'];
    $filaDatosInventarios = verDatoInventario($idInventarios);
    
    if($filaDatosInventarios){
        
        $consultaEliminar = "DELETE FROM Inventarios WHERE idInventarios ='$idInventarios'";
        $accion = eliminarDatoInventario($consultaEliminar);
        if ($accion){
            echo '
            <script>
                alert("Se ha eliminado el producto correctamente");
                window.location = "Inventario.php";
            </script>';
        }
    }
    else{
        echo '
            <script>
                alert("No se encuentra ese producto dentro del inventario.");
                window.location = "InventarioBuscarEliminar.php";
            </script>';
    }
    

    
    
    
    
    
    
    
    
    
    
    
    
    
    
?>