<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventarios</title>
    <script>
        function ConfirmacionEliminar(){
            var respuesta = confirm("¿Estas seguro de eliminar este producto?");
            if (respuesta == true){
                return true;
            }else{
                return false;
            }
        }
    </script>
</head>
<body>
    <?php
        include_once '../Funciones/Funciones.php';
        menu();
        $idInventario = $_GET['idInventario'];
        $filaDatosInventarios = verDatoInventario($idInventario);
        banner();
    ?>
    <div class="encabezadoApartado">
        <h3 class="sub-heading"> Visualización </h3>
        <h1 class="heading"> Características </h1>
    </div>
    <section class="inventarioVista" id="inventarioVista">
        <div class="botones">        
            <div class="left">
                <a href="Inventario.php" class="btn"><i class="fa-solid fa-circle-chevron-left"></i>  Regresar</a>
            </div>
            <div class="right">                    
                <a href="VistaInventarioModificar.php?idInventario=<?php echo $filaDatosInventarios['idInventarios']; ?>" class="btnDocumentos btnAccionesModificar" style="margin: 0.2rem 0.2rem">
                    <i class="fa-solid fa-pen-to-square"></i>  Modificar</a>
                <a class="btnDocumentos btnAccionesEliminar" href="CodeInventarioEliminar.php?idInventario=<?php echo $filaDatosInventarios['idInventarios']; ?>" onclick="return ConfirmacionEliminar()"><i class="fa-solid fa-trash-can"></i> Eliminar</a>
            </div>
        </div>
        <form action="">
            <div class="row">
                <div class="image">
                    <div class="box">
                        <img src="FotosProductos/<?php echo $filaDatosInventarios['idProductos']; ?>.png" alt="">
                    </div>
                </div>
                <div class="content">
                    <table>
                        <tbody>
                            <tr style="box-shadow: inset 0 -0.5px 0  #666;">
                                <td class="encabezadoTabla"><h3>Clave de identificación</h3></td>
                                <td class="columnaDato"><label style="text-transform:uppercase;"><?php echo $filaDatosInventarios['idInventarios']; ?></label></td>
                            </tr>
                            <tr style="box-shadow: inset 0 -0.5px 0  #666;">
                                <td class="encabezadoTabla"><h3>Tipo de producto</h3></td>
                                <td class="columnaDato"><label ><?php echo $filaDatosInventarios['nombreProductos']; ?></label></td>
                            </tr>
                            <tr style="box-shadow: inset 0 -0.5px 0  #666;">
                                <td class="encabezadoTabla"><h3>Marca</h3></td>
                                <td class="columnaDato"><label ><?php echo $filaDatosInventarios['nombreProveedores']; ?></label></td>
                            </tr>
                            <tr style="box-shadow: inset 0 -0.5px 0  #666;">
                                <td class="encabezadoTabla"><h3>Cantidad de disponibles</h3></td>
                                <td class="columnaDato"><label ><?php echo $filaDatosInventarios['cantidad']; ?></label></td>
                            </tr>
                            <tr style="box-shadow: inset 0 -0.5px 0  #666;">
                                <td class="encabezadoTabla"><h3>Precio</h3></td>
                                <td class="columnaDato"><label >$<?php echo number_format($filaDatosInventarios['precio'],2); ?></label></td>
                            </tr>
                            <tr style="box-shadow: inset 0 -0.5px 0  #666;">
                                <td class="descripcion"><h3>Descripción</h3></td>
                                <td class="columnaDato"><label><?php echo $filaDatosInventarios['descripción']; ?></label></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </form>
    </section>
    <?php piePagina(); ?>
</body>
</html>