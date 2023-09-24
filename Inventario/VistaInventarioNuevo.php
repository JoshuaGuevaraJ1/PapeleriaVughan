<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir nuevo producto al invenatrio</title>
    <script>
        function ConfirmacionAgregar(){
            var respuesta = confirm("¿Deseas guardar este nuevo producto?");
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
        $consultaProveedores = consultaProveedores();
        $consultaProductos = consultaProductos();
    ?>
    <section class="inventarioVista" id="inventarioVista">
        <div class="encabezadoApartado">
            <h3 class="sub-heading">Añadir</h3>
            <h1 class="heading">Añadir nuevo producto</h1>
        </div>
        <form action="CodeInventarioNuevo.php" method="POST">
            <div class="botones">
                <div class="left">
                    <a href="Inventario.php" class="btn"><i class="fa-solid fa-circle-chevron-left"></i>  Regresar</a>
                </div>
                <div class="right">                    
                    <button class="btn btnAccionesVer" href="" onclick="return ConfirmacionAgregar()"><i class="fa-solid fa-pen-to-square"></i>  Añadir un producto</button>
                </div>
            </div>
            <p style="text-transform:none; font-size:1.8rem; color: var(--black)"><br>Para añadir un nuevo producto al inventario, rellena todos los datos obligatoriamente.</p>
            <div class="row">
                <!-- <div class="image">
                    <div class="box">
                        <img src="FotosProductos/<?php echo $filaDatosInventarios['idProductos']; ?>.png" alt="">
                    </div>
                </div> -->
                <div class="content">
                    <table>
                        <tbody>
                            <tr style="box-shadow: inset 0 -0.5px 0  #666;">
                                <td class="encabezadoTabla"><h3>Clave de identificación</h3></td>
                                <td class="columnaDato"><input type="text" name="idInventarios" style="text-transform:uppercase;" required minlength="5" maxlength="5" size="5"></td>
                            </tr>
                            <tr style="box-shadow: inset 0 -0.5px 0  #666;">
                                <td class="encabezadoTabla"><h3>Tipo de producto</h3></td>
                                <td class="columnaDato"><select name="idProductos" id="idProductos" required>
                                    <option value="0" selected disabled>Selecciona el tipo de producto</option>
                                        <?php while($filaProductos = $consultaProductos->fetch_assoc()) { ?>
                                            <option value="<?php echo $filaProductos['idProductos']; ?>"><?php echo $filaProductos['nombreProductos']; ?></option>
                                        <?php } ?>
                                    </select>
                                </td>
                            </tr>
                            <tr style="box-shadow: inset 0 -0.5px 0  #666;">
                                <td class="encabezadoTabla"><h3>Marca</h3></td>
                                <td class="columnaDato"><select name="idProveedores" id="idProveedores" required>
                                    <option value="0" selected disabled>Selecciona la marca del producto</option>
                                    <?php while($filaProveedores = $consultaProveedores->fetch_assoc()) { ?>
                                        <option value="<?php echo $filaProveedores['idProveedores']; ?>"><?php echo $filaProveedores['nombreProveedores']; ?></option>
                                    <?php } ?>
                                    </select> 
                                </td>
                            </tr>
                            <tr style="box-shadow: inset 0 -0.5px 0  #666;">
                                <td class="encabezadoTabla"><h3>Cantidad de disponibles</h3></td>
                                <td class="columnaDato"><input type="number" name="cantidad" ondrop="return false;" onpaste="return false;" onkeypress="return event.charCode>=48 && event.charCode<=57" required></td>
                            </tr>
                            <tr style="box-shadow: inset 0 -0.5px 0  #666;">
                                <td class="encabezadoTabla"><h3>Precio</h3></td>
                                <td class="columnaDato"><input type="number" name="precio"></td>
                            </tr>
                            <tr style="box-shadow: inset 0 -0.5px 0  #666;">
                                <td class="descripcion"><h3>Descripción</h3></td>
                                <td class="columnaDato"><textarea name="descripción" id="descripción"></textarea></td>
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