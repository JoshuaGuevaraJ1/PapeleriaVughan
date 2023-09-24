<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar datos de un producto del inventario</title>
    <script>
        function ConfirmacionModificar(){
            var respuesta = confirm("¿Deseas modificar este producto?");
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
        include '../Funciones/Funciones.php';
        menu();
        banner();
        $idProductos = $_GET['idProductos'];
        $filaDatosProductos = verDatoProducto($idProductos);
    ?>
    <div class="encabezadoApartado">
        <h3 class="sub-heading">Modificar datos</h3>
        <h1 class="heading">Modificación de datos</h1>
    </div>
    <section class="inventarioVista">
        <form action="CodeProductoModificar.php" method="POST">
            <div class="botones">
                <div class="left">
                    <a href="Productos.php" class="btn"><i class="fa-solid fa-circle-chevron-left"></i>  Regresar</a>
                </div>
                <div class="right">                    
                    <button class="btn btnAccionesModificar" href="" onclick="return ConfirmacionModificar()"><i class="fa-solid fa-pen-to-square"></i>  Actualizar</button>
                </div>
            </div>
            <p style="text-transform:none; font-size:1.8rem; color: var(--black)"><br>Editarás los datos del producto seleccionado.Rellena todos los campos de forma obligatoria.</p>
            <div class="row">
                <div class="content">
                    <table>
                        <tbody>
                            <tr style="box-shadow: inset 0 -0.5px 0  #666;">
                                <td class="encabezadoTabla"><h3>Clave de identificación</h3></td>
                                <td class="columnaDato" style="text-transform:uppercase;"><input type="number" name="idProductos" value="<?php echo $filaDatosProductos['idProductos']; ?>" minlength="1" maxlength="3" size="3" readonly></td>
                            </tr>
                            <tr style="box-shadow: inset 0 -0.5px 0  #666;">
                                <td class="encabezadoTabla"><h3>Nombre del producto</h3></td>
                                <td class="columnaDato"><input type="text" name="nombreProductos" value="<?php echo $filaDatosProductos['nombreProductos']; ?>"></td>
                            </tr>
                            <tr>
                                <td colspan="4"></td>
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