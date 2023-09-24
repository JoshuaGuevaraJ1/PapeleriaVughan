<?php
    include '../Funciones/Funciones.php';
    
    $idInventario = $_GET['idInventario'];
    $filaDatosInventarios = verDatoInventario($idInventario);
    
    if($filaDatosInventarios){
        header("location: ../Inventario/VistaInventarioVer.php?idInventario=".$idInventario);
    }else{
        echo '
            <script>
                alert("No se encuentra ese producto dentro del inventario.");
                window.location = "InventarioBuscarVer.php";
            </script>';
    }
?>