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
        // $consultaProveedores = consultaProveedores();
        // $consultaProductos = consultaProductos();
    ?>
    <section class="inventarioVista" id="inventarioVista">
        <div class="encabezadoApartado">
            <h3 class="sub-heading">Añadir</h3>
            <h1 class="heading">Añadir nuevo producto</h1>
        </div>
        <form action="CodeProductoNuevo.php" method="POST">
            <div class="botones">
                <div class="left">
                    <a href="Productos.php" class="btn"><i class="fa-solid fa-circle-chevron-left"></i>  Regresar</a>
                </div>
                <div class="right">                    
                    <button class="btn btnAccionesVer" href="" onclick="return ConfirmacionAgregar()"><i class="fa-solid fa-pen-to-square"></i>  Añadir un producto</button>
                </div>
            </div>
            <p style="text-transform:none; font-size:1.8rem; color: var(--black)"><br>Para añadir un nuevo producto, rellena todos los datos obligatoriamente.</p>
            <div class="row">
                <div class="content">
                    <table>
                        <tbody>
                            <tr style="box-shadow: inset 0 -0.5px 0  #666;">
                                <td class="encabezadoTabla"><h3>Clave de identificación</h3></td>
                                <td class="columnaDato"><input type="number" name="idProductos" style="text-transform:uppercase;" required minlength="1" maxlength="3" size="3"></td>
                            </tr>
                            <tr style="box-shadow: inset 0 -0.5px 0  #666;">
                                <td class="encabezadoTabla"><h3>Nombre del producto</h3></td>
                                <td class="columnaDato"><input type="text" name="nombreProductos"></td>
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