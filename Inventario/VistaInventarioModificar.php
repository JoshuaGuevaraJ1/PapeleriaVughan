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
        $idInventario = $_GET['idInventario'];
        $filaDatosInventarios = verDatoInventario($idInventario);
        $filaDatosInventarios = verDatoInventario($idInventario);
    
        if(!$filaDatosInventarios){
            echo '
                <script>
                    alert("No se encuentra ese producto dentro del inventario.");
                    window.location = "InventarioBuscarModificar.php";
                </script>';
        }
        $consultaProveedores = consultaProveedores();
        $consultaProductos = consultaProductos();
    ?>
    <div class="encabezadoApartado">
        <h3 class="sub-heading">Modificar datos</h3>
        <h1 class="heading">Modificación de datos</h1>
    </div>
    <section class="inventarioVista">
        <form action="CodeInventarioModificar.php" method="POST">
            <div class="botones">
                <div class="left">
                    <a href="Inventario.php" class="btn"><i class="fa-solid fa-circle-chevron-left"></i>  Regresar</a>
                </div>
                <div class="right">                    
                    <button class="btn btnAccionesModificar" href="" onclick="return ConfirmacionModificar()"><i class="fa-solid fa-pen-to-square"></i>  Actualizar</button>
                </div>
            </div>
            <p style="text-transform:none; font-size:1.8rem; color: var(--black)"><br>Editarás los datos del producto seleccionado.Rellena todos los campos de forma obligatoria.</p>
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
                                <td class="columnaDato" style="text-transform:uppercase;"><input type="text" name="idInventarios" value="<?php echo $filaDatosInventarios['idInventarios']; ?>" minlength="5" maxlength="5" size="5" readonly></td>
                            </tr>
                            <tr style="box-shadow: inset 0 -0.5px 0  #666;">
                                <td class="encabezadoTabla"><h3>Tipo de producto</h3></td>
                                <td class="columnaDato"><select name="idProductos" id="idProductos" required>
                                        <?php while($filaProductos = $consultaProductos->fetch_assoc()) { 
                                            if($filaProductos['idProductos']==$filaDatosInventarios['idProductos']){?>
                                                <option value="<?php echo $filaProductos['idProductos']; ?>" selected="selected"><?php echo $filaProductos['nombreProductos']; ?></option>
                                            <?php }else{ ?>
                                                <option value="<?php echo $filaProductos['idProductos']; ?>"><?php echo $filaProductos['nombreProductos']; ?></option>
                                            <?php } ?>
                                        <?php } ?>
                                    </select>
                                </td>
                            </tr>
                            <tr style="box-shadow: inset 0 -0.5px 0  #666;">
                                <td class="encabezadoTabla"><h3>Marca</h3></td>
                                <td class="columnaDato"><select name="idProveedores" id="idProveedores" required>
                                        <?php while($filaProveedores = $consultaProveedores->fetch_assoc()) { 
                                            if($filaProveedores['idProveedores']==$filaDatosInventarios['idProveedores']){?>
                                                <option value="<?php echo $filaProveedores['idProveedores']; ?>" selected="selected"><?php echo $filaProveedores['nombreProveedores']; ?></option>
                                            <?php }else{ ?>
                                                <option value="<?php echo $filaProveedores['idProveedores']; ?>"><?php echo $filaProveedores['nombreProveedores']; ?></option>
                                            <?php } ?>
                                        <?php } ?>
                                    </select> 
                                </td>
                            </tr>
                            <tr style="box-shadow: inset 0 -0.5px 0  #666;">
                                <td class="encabezadoTabla"><h3>Cantidad de disponibles</h3></td>
                                <td class="columnaDato"><input type="number" step="0.01" name="cantidad" value="<?php echo $filaDatosInventarios['cantidad']; ?>" ondrop="return false;" onpaste="return false;" onkeypress="return event.charCode>=48 && event.charCode<=57" required></td>
                            </tr>
                            <tr style="box-shadow: inset 0 -0.5px 0  #666;">
                                <td class="encabezadoTabla"><h3>Precio</h3></td>
                                <td class="columnaDato"><input type="number" name="precio" value="<?php echo $filaDatosInventarios['precio']; ?>"></td>
                            </tr>
                            <tr style="box-shadow: inset 0 -0.5px 0  #666;">
                                <td class="descripcion"><h3>Descripción</h3></td>
                                <td class="columnaDato"><textarea name="descripción" id="descripción"><?php echo $filaDatosInventarios['descripción']; ?></textarea></td>
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