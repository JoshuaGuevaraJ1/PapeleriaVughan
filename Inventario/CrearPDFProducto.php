<?php
    include '../Clases/fpdf/fpdf.php';
    include '../Funciones/Funciones.php';

    $idInventarios = $_GET['idInventarios'];

    class PDF extends FPDF{
        function Header()
        {
            // Logo
            $this->Image('../images/banner.png',-20,8,250);
            $this->Image('../images/logo.png',10,8,18);
            // Arial bold 15
            $this->SetFont('Arial','B',20);
            // Movernos a la derecha
            $this->Cell(45);
            // Título
            $this->SetTextColor(25,42,86);
            $this->SetFillColor(255,255,255);
            $this->Cell(100,10,utf8_decode('PAPELERÍA VAUGHAN'),0,1,'C',1);
            $this->SetFont('Arial','B',15);
            $this->Cell(30);
            $this->SetTextColor(39,174,96);
            $this->Cell(140,16,utf8_decode('Inventario de todos los productos en la Papelería'),0,1,'C',0);
        }
        function Footer(){
            // Posición: a 1,5 cm del final
            $this->SetY(-15);
            // Arial italic 8
            $this->SetFont('Arial','I',8);
            // Número de página
            $this->Cell(0,10,utf8_decode('Página '.$this->PageNo().' de {nb}'),0,0,'C');
            $this->Cell(-50,10,utf8_decode('Expedición el: '.date('d-m-Y-G:i:s')),0,0,'C');
        }
    }
    
    $pdf = new PDF();
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',10);

    $listadoInventario = verDatoInventario($idInventarios);
    
    $pdf->Image('FotosProductos/'.$listadoInventario['idProductos'].'.png',30,40,60);

    $pdf->SetTextColor(39,174,96);
    $pdf->SetDrawColor(102,102,102);
    $pdf->SetY(42);
    $pdf->SetX(100);
    $pdf->Cell(35,5,'Clave','B',1,'L',0);

    $pdf->SetY(49);
    $pdf->SetX(100);
    $pdf->Cell(35,5,'Tipo de producto','B',1,'L',0);

    $pdf->SetY(56);
    $pdf->SetX(100);
    $pdf->Cell(35,5,'Marca','B',1,'L',0);

    $pdf->SetY(63);
    $pdf->SetX(100);
    $pdf->Cell(35,5,'Cantidad','B',1,'L',0);

    $pdf->SetY(70);
    $pdf->SetX(100);
    $pdf->Cell(35,5,'Precio','B',1,'L',0);
    $pdf->SetFont('Arial','B',10);

    $pdf->SetY(77);
    $pdf->SetX(100);
    $pdf->Cell(35,5,utf8_decode('Descripción'),'B',1,'L',0);

    $pdf->SetTextColor(0,0,0);
    $pdf->SetFont('Arial','',10);

    $pdf->SetY(42);
    $pdf->SetX(135);
    $pdf->Cell(50,5,utf8_decode($listadoInventario['idInventarios']),'B',1,'L',0);

    $pdf->SetY(49);
    $pdf->SetX(135);
    $pdf->Cell(50,5,utf8_decode($listadoInventario['nombreProductos']),'B',1,'L',0);

    $pdf->SetY(56);
    $pdf->SetX(135);
    $pdf->Cell(50,5,utf8_decode($listadoInventario['nombreProveedores']),'B',1,'L',0);

    $pdf->SetY(63);
    $pdf->SetX(135);
    $pdf->Cell(50,5,utf8_decode($listadoInventario['cantidad']),'B',1,'L',0);

    $pdf->SetY(70);
    $pdf->SetX(135);
    $pdf->Cell(50,5,utf8_decode('$ '.number_format($listadoInventario['precio'],2)),'B',1,'L',0);
    
    $pdf->SetY(77);
    $pdf->SetX(135);
    $pdf->Multicell(50,5,utf8_decode($listadoInventario['descripción']),'B','J',0);
    
    $objeto = new DateTime();
    $objeto->setTimezone(new DateTimeZone('America/Mexico_City'));
    $fechaHora = $objeto->format('d-m-Y-G:i:s');
    $nombrepdf = 'Inventario No'.$listadoInventario['idInventarios'].'-'.$fechaHora;
    $pdf->Output($nombrepdf.'.pdf','D');
?>