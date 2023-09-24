<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

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


    <title>Inventario de todos los productos disponibles en la papelería</title>
</head>
<body>
    <?php
        include '../Funciones/Funciones.php';
        menu();
        banner();
        importScripts();
    ?>
    <div class="encabezadoApartado">
        <h3 class="sub-heading">Inventario</h3>
        <h1 class = "heading">Productos disponibles</h1>
    </div>
    <section class = "inventario" id="inventario">           
        <div class="botones">
            <div class="right">
                <a href="CrearPDFInventario.php" class="btnDocumentos pdf" style="margin: 0.2rem 0.2rem">
                    <i class="fa-solid fa-file-pdf" style="font-size: 1em;"></i>  Descargar PDF</a>
                <a href="CrearExcelInventario.php" class="btnDocumentos excel" style="margin: 0.2rem 0.2rem">
                    <i class="fa-solid fa-file-excel" style="font-size: 1em;"></i>  Descargar Excel</a>
                <a href="VistaInventarioNuevo.php" class="btn" style="margin: 0.2rem 0.2rem">
                    <i class="fa-solid fa-circle-plus" style="font-size: 1em;"></i>  Añadir</a>
            </div>
        </div>
        
        <div class="tablaDatos">
            <table border="1" cellspacing="0">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Tipo de producto</th>
                        <th>Marca</th>
                        <th>Cantidad disponibles</th>
                        <th>Precio</th>
                        <th>Descripción</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    
                    <?php 
                    $listadoInventario = listadoInventario();
                    $contador = 1;
                    while($filasInventario = $listadoInventario->fetch_assoc()): ?>
                        <tr style="text-align: center;">
                            <td><?php echo $contador; ?></td>
                            <td><?php echo $filasInventario['nombreProductos']?></td>
                            <td><?php echo $filasInventario['nombreProveedores']?></td>
                            <td style="width:4rem;"><?php echo $filasInventario['cantidad']?></td>
                            <td>$<?php echo number_format($filasInventario['precio'],2)?></td>
                            <td class="descrip"><?php echo $filasInventario['descripción']?></td>
                            <td><a href="VistaInventarioVer.php?idInventario=<?php echo $filasInventario['idInventarios']; ?>" class="btnAcciones btnAccionesVer"><i class="fa-solid fa-eye eye2"></i></a></td>
                            <td><a href="VistaInventarioModificar.php?idInventario=<?php echo $filasInventario['idInventarios']; ?>" class="btnAcciones btnAccionesModificar"><i class="fa-solid fa-pen-to-square"></i></a></td>
                            <td><a href="CodeInventarioEliminar.php?idInventario=<?php echo $filasInventario['idInventarios']; ?>" onclick="return ConfirmacionEliminar()" class="btnAcciones btnAccionesEliminar"><i class="fa-solid fa-trash-can"></i></a></td>
                            <td><a href="CrearPDFProducto.php?idInventarios=<?php echo $filasInventario['idInventarios']; ?>" class="btnAcciones btnAccionesEliminar"><i class="fa-solid fa-print"></i></a></td>
                        </tr>
                    <?php $contador++;
                    endwhile; ?>
                </tbody>
            </table>
        </div>
    </section>
    <?php piePagina(); ?>
</body>
</html>

