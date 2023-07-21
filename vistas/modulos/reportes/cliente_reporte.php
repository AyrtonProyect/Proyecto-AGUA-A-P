<?php
require('C:\xampp\htdocs\SIS_AGUA\fpdf\fpdf.php');
//require_once "fpdf.php";
date_default_timezone_set('America/Asuncion');
class PDF extends FPDF
{

    //////////// CABEZERA DE LA PAGINA
    function Header()
    {
     $this->Image('C:\xampp\htdocs\SIS_AGUA\vistas\img\plantilla\logo.png', 30, 15, 45); //Insertamos el logo si es en PNG su calidad o formato debe estar entre PNG 8/PNG 24
        
    $ancho = 180;
    $this->SetFont('Arial', 'I', 7);
         
         
         //Mencionamos que el curso en la posición Y empezará a los 12 puntos para escribir el Usuario:
        $this->Cell($ancho, 10,'USUARIO', 0, 0, 'R');
        $this->SetY(15);
        $this->Cell($ancho, 10,'Fecha: '.date('d/m/Y'), 0, 0, 'R');
        $this->SetY(18);
        $this->Cell($ancho, 10,'Hora: '.date('H:i:s'), 0, 0, 'R');            
        $this->SetY(22);
        $this->Cell($ancho, 10,'PIRIBEBUY - CORDILLERA', 0, 0, 'R');
       
    }
    ///////////////////////////////////////////CUERPO DE PAGINA
   function body(){
         // Logo
       // $this->Image('logo.png',10,8,33);
       $this->Ln(10);
        // Arial bold 15
        $this->SetFont('Arial','B',12);
        // Movernos a la derecha
        $this->Cell(80);
        // Título
        $this->Cell(30,10,'REPORTES DE CLIENTES',0,1,'C');
        // Salto de línea
        $this->SetFont('Arial','B',7);
        $this->SetFillColor(255,255,255);
        $this->SetLineWidth(0,95);//ancho de linea
        $this->SetDrawColor(45,150,255);//color de linea
        $this->Line(12,30,200,30);// ubicacion de linea
        $this->SetDrawColor(0,0,0);//color de linea
        $this->SetLineWidth(0,80);//ancho de linea
        $this->Cell(10,10,'ID','T',0,'C',0);
        $this->Cell(40,10,'NOMBRE','T',0,'C',0);
        $this->Cell(40,10,'APELLIDO','T',0,'C',0);
        $this->Cell(25,10,'NUM. DOC.','T',0,'C',0);
        $this->Cell(25,10,'TELEFONO','T',0,'C',0);
        $this->Cell(45,10,'DIRECCION','T',1,'C',0);
        
   }
    ////////////////////// PIE DE PAGINA
    function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->SetDrawColor(45,150,255);//color de linea
        $this->Line(12,280,200,280);// ubicacion de linea
    $this->Cell(0,10,utf8_decode('Página').$this->PageNo().'/{nb}',0,0,'C');
}
}
require('C:\xampp\htdocs\SIS_AGUA\fpdf\conex.php');
$consulta ="SELECT * FROM clientes;";
$resultado= mysqli_query($conexion, $consulta);

//$sentencia = $conexion->query("SELECT * FROM clientes;");
//$resultado = $sentencia->fetchAll(PDO::FETCH_OBJ);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->SetFont('Arial','B',7);
$pdf->Body();

   while($row= $resultado->fetch_assoc()){
    $pdf->Cell(10,10,$row['id'],1,0,'C',1);
    $pdf->Cell(40,10,$row['nombre'],1,0,'C',1);
    $pdf->Cell(40,10,$row['apellido'],1,0,'C',1);
    $pdf->Cell(25,10,$row['documento'],1,0,'C',1);
    $pdf->Cell(25,10,$row['telefono'],1,0,'C',1);

    $pdf->Cell(45,10,$row['direccion'],1,1,'C',1);
} 

$pdf->Output('ReporteDeClientes'.date("d_m_Y_H_i_s"), 'I');

?>