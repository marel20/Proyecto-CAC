<?php
session_start();
            
if($_SESSION['acceso']==1){

    // Incluir la librería TCPDF
    require_once('../library/tcpdf/tcpdf.php');

    include "conectar.php";

    // Obtener los datos de la tabla socios
$sql = "SELECT numero, nombre, domicilio, localidad, sexo, sangre, dni, nacimiento, telefono, cuenta  FROM socios";
$resultado = mysqli_query($conectar, $sql);

// Crear un objeto de TCPDF
$pdf = new TCPDF();

// Establecer el nombre de la hoja de cálculo
$pdf->SetTitle('Socios');

// Agregar una página
$pdf->AddPage();

// Agregar los encabezados de columna
$pdf->SetFont('helvetica', 'B', 8);
$pdf->Cell(13, 4, 'numero', 1);
$pdf->Cell(50, 4, 'nombre', 1);
$pdf->Cell(30, 4, 'domicilio', 1);
$pdf->Cell(14, 4, 'localidad', 1);
$pdf->Cell(5, 4, 'sexo', 1);
$pdf->Cell(12, 4, 'sangre', 1);
$pdf->Cell(15, 4, 'dni', 1);
$pdf->Cell(15, 4, 'nacimiento', 1);
$pdf->Cell(15, 4, 'telefono', 1);
$pdf->Cell(15, 4, 'cuenta', 1);
$pdf->Ln();

// Agregar los datos de la tabla al PDF
$pdf->SetFont('helvetica', '', 8);
while ($fila = mysqli_fetch_array($resultado)) {
    $pdf->Cell(13, 4, $fila['numero'], 1);
    $pdf->Cell(50, 4, $fila['nombre'], 1);
    $pdf->Cell(30, 4, $fila['domicilio'], 1);
    $pdf->Cell(14, 4, $fila['localidad'], 1);
    $pdf->Cell(5, 4, $fila['sexo'], 1, 0, 'R');
    $pdf->Cell(12, 4, $fila['sangre'], 1);
    $pdf->Cell(15, 4, $fila['dni'], 1);
    $pdf->Cell(15, 4, $fila['nacimiento'], 1);
    $pdf->Cell(15, 4, $fila['telefono'], 1);
    $pdf->Cell(15, 4, $fila['cuenta'], 1);
    $pdf->Ln();
}

 // Descargar el archivo
 $pdf->Output('socios.pdf', 'D');


if(!$resultado){
    echo '<script language="javascript"> alert ("Ocurrio un error inesperado, intente de nuevo mas tarde"); window.location.href="../pages/listasocios.php" </script>';
}else{
    echo '<script language="javascript"> alert ("Archivo Generado Correctamente"); window.location.href="../pages/lista socios.php" </script>';
   
}












}else{
    header("location: ingreso.php");
    }
    
    ?>