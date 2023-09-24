<?php
    //COnecta con la base de datos de toda la papelería
    function conexionPrincipal(){
        $conexionBDPapeleria = mysqli_connect("localhost","root","","PAPELERIA");
        mysqli_set_charset($conexionBDPapeleria, "UTF8");

        return $conexionBDPapeleria;
    }
    
?>
