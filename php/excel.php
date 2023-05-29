<?php
session_start();
            
if($_SESSION['acceso']==1){

    // Incluir la librería TCPDF
    require_once('../library/phpexcel/Classes/PHPExcel.php');

    include "conectar.php";
    
    $sql = "SELECT numero, nombre, domicilio, localidad, sexo, sangre, dni, nacimiento, telefono, cuenta, ingreso, estado, cobrador FROM socios";
        $resultado = mysqli_query($conectar, $sql);

        // Crear un objeto de PHPExcel
        $objPHPExcel = new PHPExcel();

        // Establecer el nombre de la hoja de cálculo
        $objPHPExcel->getActiveSheet()->setTitle('socios');

        // Agregar los encabezados de columna
        $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('A1', 'numero')
                    ->setCellValue('B1', 'nombre')
                    ->setCellValue('C1', 'domicilio')
                    ->setCellValue('D1', 'localidad')
                    ->setCellValue('E1', 'sexo')
                    ->setCellValue('F1', 'sangre')
                    ->setCellValue('G1', 'dni')
                    ->setCellValue('H1', 'nacimiento')
                    ->setCellValue('I1', 'ingreso')
                    ->setCellValue('J1', 'estado')
                    ->setCellValue('K1', 'telefono')
                    ->setCellValue('L1', 'cobrador')
                    ->setCellValue('M1', 'cuenta');

        // Agregar los datos de la tabla a la hoja de cálculo
        $i = 2;
        while ($fila = mysqli_fetch_array($resultado)) {
            $objPHPExcel->setActiveSheetIndex(0)
                        ->setCellValue('A'.$i, $fila['numero'])
                        ->setCellValue('B'.$i, $fila['nombre'])
                        ->setCellValue('C'.$i, $fila['domicilio'])
                        ->setCellValue('D'.$i, $fila['localidad'])
                        ->setCellValue('E'.$i, $fila['sexo'])
                        ->setCellValue('F'.$i, $fila['sangre'])
                        ->setCellValue('G'.$i, $fila['dni'])
                        ->setCellValue('H'.$i, $fila['nacimiento'])
                        ->setCellValue('I'.$i, $fila['ingreso'])
                        ->setCellValue('J'.$i, $fila['estado'])
                        ->setCellValue('K'.$i, $fila['telefono'])
                        ->setCellValue('L'.$i, $fila['cobrador'])
                        ->setCellValue('M'.$i, $fila['cuenta']);
            $i++;
        }

        // Cambiar el formato de la celda de precio a número con dos decimales
        $objPHPExcel->getActiveSheet()->getStyle('C2:C'.$i)->getNumberFormat()->setFormatCode('0.00');

        // Ajustar el ancho de las columnas automáticamente
        foreach(range('A','M') as $columna) {
            $objPHPExcel->getActiveSheet()->getColumnDimension($columna)->setAutoSize(true);
        }

        // Crear un objeto de salida en formato Excel
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');

        // Configurar las cabeceras para descargar el archivo como Excel
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="socios.xlsx"');
        header('Cache-Control: max-age=0');


        // Descargar el archivo
        $objWriter->save('php://output');
        

        if(!$resultado){
            echo '<script language="javascript"> alert ("Ocurrio un error inesperado, intente de nuevo mas tarde"); window.location.href="../pages/listasocios.php" </script>';
        }else{
            echo '<script language="javascript"> alert ("Archivo Generado Correctamente"); window.location.href="../pages/lista socios.php" </script>';
           
        }






}else{
    header("location: ingreso.php");
    }
    
    ?>