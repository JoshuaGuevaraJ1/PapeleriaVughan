<?php
    include '../Conexiones/ConexionPapeleria.php';
    //Consultas generales de cada tabla
    function consultaProductos(){
        $conexionBDPapeleria = conexionPrincipal();
        $consultaProductos = mysqli_query($conexionBDPapeleria, "SELECT * FROM Productos");
        
        return $consultaProductos;
    }

    function consultaInventarios(){
        $conexionBDPapeleria = conexionPrincipal();
        $consultaInventarios = mysqli_query($conexionBDPapeleria, "SELECT * FROM Inventarios");
        
        return $consultaInventarios;
    }

    function consultaProveedores(){
        $conexionBDPapeleria = conexionPrincipal();
        $consultaProveedores = mysqli_query($conexionBDPapeleria, "SELECT * FROM Proveedores");
        
        return $consultaProveedores;
    }

    function consultaCruzadaCRUDInventarios($condicionWHERE, $idInventarios){
        if (!$condicionWHERE){
            $consultaSQL = "SELECT * FROM Inventarios,Productos,Proveedores 
                WHERE Inventarios.idProductos=Productos.idProductos 
                AND Inventarios.idProveedores=Proveedores.idProveedores ORDER BY nombreProductos";
        }else{
            $consultaSQL = "SELECT * FROM Inventarios,Productos,Proveedores 
                WHERE Inventarios.idProductos=Productos.idProductos 
                AND Inventarios.idProveedores=Proveedores.idProveedores
                AND idInventarios='$idInventarios'";
        }

        return $consultaSQL;
    }
    //Fin de consultas generales de tablas----------------------------------------------------------------------------------------

    //Funciones que importan los elementos del baner, menu y pie de página
    function menu(){
        $Menu = include '../Menu/Menu.php';
        return $Menu;
    }
    function importScripts(){
        $importScripts = include '../Funciones/Scripts.php';
        return $importScripts;
    }
    function banner(){
        $banner = include '../Banner/Banner.php';
        return $banner;
    }
    function piePagina(){
        $piePagina = include '../PiePagina/PiePagina.php';
        return $piePagina;
    }

    //Funciones del CRUD

    function listadoInventario(){
        $condicionWHERE = FALSE;
        $idInventarios = null;
        $conexionBDPapeleria = conexionPrincipal();

        $consultaSQL = consultaCruzadaCRUDInventarios($condicionWHERE,$idInventarios);
        $listadoInventario = mysqli_query($conexionBDPapeleria,$consultaSQL);

        return $listadoInventario;
    }

    function verDatoInventario($idInventarios){
        $conexionBDPapeleria = conexionPrincipal();
        $condicionWHERE =  TRUE;
        
        $consultaSQL = consultaCruzadaCRUDInventarios($condicionWHERE,$idInventarios);
        $consulta = mysqli_query($conexionBDPapeleria,$consultaSQL);
        $filaDatosInventarios = $consulta->fetch_assoc();

        return $filaDatosInventarios;
    }

    function modificarDatoInventario($consultaUpdateInventarios){
        $conexionBDPapeleria = conexionPrincipal();
        $update = mysqli_query($conexionBDPapeleria,$consultaUpdateInventarios);
        if($update){
            return $accion = TRUE;
        }
    }

    function eliminarDatoInventario($consultaEliminarInventario){
        $conexionBDPapeleria = conexionPrincipal();
        $delete = mysqli_query($conexionBDPapeleria,$consultaEliminarInventario);
        if($delete){
            return $accion = TRUE;
        }
    }

    function addDatoInventario($consultaAddInventario){
        $conexionBDPapeleria = conexionPrincipal();
        $add = mysqli_query($conexionBDPapeleria,$consultaAddInventario);
        if($add){
            return $accion = TRUE;
        }
    }

    function comprobarId(){
        $idInventarios = $_GET['idIventario'];
        
    }

    function addDatoProducto($consultaAddProducto){
        $conexionBDPapeleria = conexionPrincipal();
        $add = mysqli_query($conexionBDPapeleria,$consultaAddProducto);
        if($add){
            return $accion = TRUE;
        }
    }

    function verDatoProducto($idProductos){
        $conexionBDPapeleria = conexionPrincipal();
        $condicionWHERE =  TRUE;
        
        $consultaSQL = "SELECT * FROM Productos WHERE idProductos='$idProductos'";
        $consulta = mysqli_query($conexionBDPapeleria,$consultaSQL);
        $filaDatosProductos = $consulta->fetch_assoc();

        return $filaDatosProductos;
    }

    function modificarDatoProducto($consultaUpdateProducto){
        $conexionBDPapeleria = conexionPrincipal();
        $update = mysqli_query($conexionBDPapeleria,$consultaUpdateProducto);
        if($update){
            return $accion = TRUE;
        }
    }

    function eliminarDatoProducto($consultaEliminarProducto){
        $conexionBDPapeleria = conexionPrincipal();
        $delete = mysqli_query($conexionBDPapeleria,$consultaEliminarProducto);
        if($delete){
            return $accion = TRUE;
        }
    }
?>