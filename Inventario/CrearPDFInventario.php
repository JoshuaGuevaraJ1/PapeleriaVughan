<?php
    include '../Clases/fpdf/fpdf.php';
    include '../Funciones/Funciones.php';

    class PDF extends FPDF{
        function Header()
        {
            // Logo
            $this->Image('../images/banner.png',-20,8,300);
            $this->Image('../images/logo.png',10,8,22);
            // Arial bold 15
            $this->SetFont('Arial','B',20);
            // Movernos a la derecha
            $this->Cell(70);
            // Título
            $this->SetTextColor(25,42,86);
            $this->SetFillColor(255,255,255);
            $this->Cell(130,16,utf8_decode('PAPELERÍA VAUGHAN'),0,1,'C',1);
            $this->SetFont('Arial','B',15);
            $this->Cell(70);
            $this->SetTextColor(39,174,96);
            $this->Cell(130,16,utf8_decode('Inventario de todos los productos en la Papelería'),0,0,'C',1);
            // Salto de línea
            $this->Ln(20);
            $this->SetFont('Arial','B',10);
            $this->SetTextColor(255,255,255);
            $this->SetFillColor(0,0,0);
            $this->Cell(10,5,'No.',1,0,'C',1);
            $this->Cell(20,5,'Clave',1,0,'C',1);
            $this->Cell(35,5,'Tipo de producto',1,0,'C',1);
            $this->Cell(20,5,'Marca',1,0,'C',1);
            $this->Cell(20,5,'Cantidad',1,0,'C',1);
            $this->Cell(20,5,'Precio',1,0,'C',1);
            $this->Cell(150,5,utf8_decode('Descripción'),1,1,'C',1);
        }
        function Footer(){
            // Posición: a 1,5 cm del final
            $this->SetY(-15);
            // Arial italic 8
            $this->SetFont('Arial','I',10);
            // Número de página
            $this->Cell(0,10,utf8_decode('Página '.$this->PageNo().' de {nb}'),0,0,'C');
            $this->Cell(-50,10,utf8_decode('Emisión del reporte: '.date('d-m-Y-G:i:s')),0,0,'C');
        }
    }

    $pdf = new PDF('L');
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont('Arial','',10);

    $listadoInventario = listadoInventario();
    $contador = 1;

    
    // $pdf->SetTextColor(255,255,255);
    // $pdf->Cell(10,5,'No.',1,0,'C',1);
    // $pdf->Cell(20,5,'Clave',1,0,'C',1);
    // $pdf->Cell(35,5,'Tipo de producto',1,0,'C',1);
    // $pdf->Cell(20,5,'Marca',1,0,'C',1);
    // $pdf->Cell(20,5,'Cantidad',1,0,'C',1);
    // $pdf->Cell(20,5,'Precio',1,0,'C',1);
    // $pdf->Cell(150,5,utf8_decode('Descripción'),1,1,'C',1);
    

    $pdf->SetTextColor(0,0,0);

    while($filasInventario = $listadoInventario->fetch_assoc()){
        if($contador%2==0){
            $pdf->SetFillColor(223,223,223);
        }else{
            $pdf->SetFillColor(255,255,255);
        }
        //Mide la longitud de la descripción, si es muy larga la descripción, entonces las demás celdas duplican su tamaño para adaptarse al Multicell
        $long = strlen($filasInventario['descripción']);
        $caracteresPermitidosTabla = 70;
        // $lineas = intdiv($long,$caracteresPermitidosTabla);
        $div = $long/$caracteresPermitidosTabla;
        $lineas = round($div);
        if ($lineas<1){$lineas=1;}
        
        $y = 5*$lineas;
        
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(10,$y,utf8_decode($contador),1,0,'C',1);
        $pdf->SetFont('Arial','',10);
        $pdf->Cell(20,$y,utf8_decode($filasInventario['idInventarios']),1,0,'C',1);
        $pdf->Cell(35,$y,utf8_decode($filasInventario['nombreProductos']),1,0,'C',1);
        $pdf->Cell(20,$y,utf8_decode($filasInventario['nombreProveedores']),1,0,'C',1);
        $pdf->Cell(20,$y,utf8_decode($filasInventario['cantidad']),1,0,'C',1);
        $pdf->Cell(20,$y,utf8_decode('$ '.number_format($filasInventario['precio'],2)),1,0,'C',1);
        $pdf->Multicell(150,5,utf8_decode($filasInventario['descripción']),1,'J',1);

        $contador++;

    }
    
    $objeto = new DateTime();
    $objeto->setTimezone(new DateTimeZone('America/Mexico_City'));
    $fechaHora = $objeto->format('d-m-Y-G:i:s');
    $nombrepdf = 'Inventario-'.$fechaHora;
    $pdf->Output($nombrepdf.'.pdf','D');
?>