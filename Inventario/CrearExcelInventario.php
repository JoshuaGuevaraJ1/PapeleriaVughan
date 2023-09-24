<?php
    include '../Clases/PHPExcel/Classes/PHPExcel.php';
    include '../Funciones/Funciones.php';

    $listadoInventario = listadoInventario();

    $objPHPExcel  = new PHPExcel();
    //Propiedades de Documento
	$objPHPExcel->getProperties()->setCreator("Eva Jael García Vega")->setDescription("Inventario de productos");
    $fila = 2;
	
	//Establecemos la pestaña activa y nombre a la pestaña
	$objPHPExcel->setActiveSheetIndex(0);
	$objPHPExcel->getActiveSheet()->setTitle("Inventario");

    $estiloTituloColumnas = array(
        'font' => array(
        'bold'  => true,
        ),
        'borders' => array(
        'allborders' => array(
        'style' => PHPExcel_Style_Border::BORDER_MEDIUM
        )
        ),
        'alignment' =>  array(
        'horizontal'=> PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        'vertical'  => PHPExcel_Style_Alignment::VERTICAL_CENTER
        )
        );
    $estiloBordeExterno = array(
        'borders' => array (
            'outline' => array (
                'style' => PHPExcel_Style_Border::BORDER_MEDIUM
            )
        )
    );
    $estiloDatosColumnas = array(
        'borders' => array(
        'allborders' => array(
        'style' => PHPExcel_Style_Border::BORDER_THIN
        )
        ),
        'alignment' =>  array(
        'horizontal'=> PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        'vertical'  => PHPExcel_Style_Alignment::VERTICAL_CENTER
        )
        );

    $objPHPExcel->getActiveSheet()->getStyle('A1:I1')->applyFromArray($estiloTituloColumnas);

    $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(15);
    $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(15);
    $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(30);
    $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(30);
    $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(25);
    $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(30);
    $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(40);
    $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(20);
    $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(80);

    $objPHPExcel->getActiveSheet()->setCellValue('A1','NÚMERO');
    $objPHPExcel->getActiveSheet()->setCellValue('B1','CLAVE');
    $objPHPExcel->getActiveSheet()->setCellValue('C1','CLAVE DE TIPO DE PRODUCTO');
    $objPHPExcel->getActiveSheet()->setCellValue('D1','TIPO DE PRODUCTO');
    $objPHPExcel->getActiveSheet()->setCellValue('E1','CLAVE DE MARCA');
    $objPHPExcel->getActiveSheet()->setCellValue('F1','MARCA');
    $objPHPExcel->getActiveSheet()->setCellValue('G1','CANTIDAD');
    $objPHPExcel->getActiveSheet()->setCellValue('H1','PRECIO');
    $objPHPExcel->getActiveSheet()->setCellValue('I1','DESCRIPCIÓN');

    

    $count=1;
    while($filaDatos = $listadoInventario->fetch_assoc()){
        $objPHPExcel->getActiveSheet()->getStyle('A'.$fila.':I'.$fila)->applyFromArray($estiloDatosColumnas);
        $objPHPExcel->getActiveSheet()->getStyle('H'.$fila)->getNumberFormat()->setFormatCode("_(\"$\"* #,##0.00_);_(\"$\"* \(#,##0.00\);_(\"$\"* \"-\"??_);_(@_)");
        $objPHPExcel->getActiveSheet()->getStyle('A'.$fila.':I'.$fila)->getAlignment()->setWrapText(true);
        $objPHPExcel
            ->getActiveSheet()
            ->getStyle('B'.$fila)
            ->getNumberFormat()
            ->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
        
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$fila, ''.$count);
        $objPHPExcel->getActiveSheet()->setCellValue('B'.$fila, strtoupper($filaDatos['idInventarios']));
        $objPHPExcel->getActiveSheet()->setCellValue('C'.$fila, strtoupper($filaDatos['idProductos']));
        $objPHPExcel->getActiveSheet()->setCellValue('D'.$fila, mb_strtoupper($filaDatos['nombreProductos']));
        $objPHPExcel->getActiveSheet()->setCellValue('E'.$fila, strtoupper($filaDatos['idProveedores']));
        $objPHPExcel->getActiveSheet()->setCellValue('F'.$fila, mb_strtoupper($filaDatos['nombreProveedores']));
        $objPHPExcel->getActiveSheet()->setCellValue('G'.$fila, strtolower($filaDatos['cantidad']));
        $objPHPExcel->getActiveSheet()->setCellValue('H'.$fila, strtoupper($filaDatos['precio']));
        $objPHPExcel->getActiveSheet()->setCellValue('I'.$fila, mb_strtoupper($filaDatos['descripción']));
        $fila++;
        $count++;
    }
    $fila = $fila-1;
    $objPHPExcel->getActiveSheet()->getStyle('A1:I'.$fila)->applyFromArray($estiloBordeExterno);

    $objeto = new DateTime();
    $objeto->setTimezone(new DateTimeZone('America/Mexico_City'));
    $fechaHora = $objeto->format('d-m-Y-G:i:s');

    header("Content-Type:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
    header('Content-Disposition: attachment;filename="Inventario-'.$fechaHora.'.xlsx"');
    header('Cache-Control: max-age=0');
    $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
    $objWriter->save('php://output');
?>