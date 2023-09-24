<?php  
    
    session_start();
    
    include '../Conexiones/ConexionBDSeguridad.php';
    $usuario = $_GET['usuario'];
    $password = $_GET['password'];

    if(mysqli_num_rows(conexionBDSeguridad($usuario, $password))>0) {
        $_SESSION['usuario'] = $usuario;
        header("location: ../Inicio/Inicio.php");
        exit;
    }else{
        echo '
            <script>   
            alert("Usuario no existe, por favor verifique los datos introducidos");                
            // window.location = "Index.php"; 
            </script>
        ';
        exit;
    }
?>
