<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos de la papelería</title>

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
        include '../Funciones/Funciones.php';
        menu();
        banner();
        importScripts();
    ?>
    <div class="encabezadoApartado">
        <h3 class="sub-heading">Productos</h3>
        <h1 class = "heading">Clasificaciones de los productos</h1>
    </div>
    <section class="inventario">
        <div class="botones">
            <div class="right">
                <a href="VistaProductoNuevo.php" class="btn" style="margin: 0.2rem 0.2rem">
                    <i class="fa-solid fa-circle-plus" style="font-size: 1em;"></i>  Añadir</a>
            </div>
        </div>
        <div class="tablaDatos">
            <table>
                <thead>
                    <tr>
                        <th>Clave del producto</th>
                        <th>Nombre del producto</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    $consultaProductos = consultaProductos();
                    while($filasProductos = $consultaProductos->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $filasProductos['idProductos']?></td>
                            <td><?php echo $filasProductos['nombreProductos']?></td>
                            <td><a href="VistaProductoModificar.php?idProductos=<?php echo $filasProductos['idProductos']; ?>" class="btnAcciones btnAccionesModificar"><i class="fa-solid fa-pen-to-square"></i></a></td>
                            <td><a href="CodeProductoEliminar.php?idProductos=<?php echo $filasProductos['idProductos']; ?>" onclick="return ConfirmacionEliminar()" class="btnAcciones btnAccionesEliminar"><i class="fa-solid fa-trash-can"></i></a></td>
                        </tr>
                <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </section>
    <?php piePagina(); ?>
</body>
</html>