<?php
    //Conecta con la base de datos de la papeleria
    function conexionBDSeguridad($usuario, $password){
        $conexionBDSeguridad = mysqli_connect("localhost","root","", "SEGURIDADVAUGHAN");
	    mysqli_set_charset($conexionBDSeguridad, "UTF8");

        $consultaSQL = "SELECT * FROM Usuario WHERE nombreUsuario = '$usuario' and passwordUsuario = md5('$password')";
        $resultado = mysqli_query($conexionBDSeguridad, $consultaSQL);

        return $resultado;
    }
?> 
