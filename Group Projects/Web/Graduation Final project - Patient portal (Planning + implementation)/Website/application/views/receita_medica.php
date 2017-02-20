
<?php
//print_r($receita);
//print_r($medicamentos);
$id_receita=$receita['id_receita'];
$nome_utente=$receita['nome_utente'];
$nome_doutor=$receita['nome_medico'];
$n_benefi=$receita['numero_utente'];
$medic=$medicamentos[0]['medicamento'];
$dosagem=$medicamentos[0]['dosagem'];
$forma=$medicamentos[0]['forma_farmaceutica'];
$dim=$medicamentos[0]['embalagem_unidades'];
$posologia=$medicamentos[0]['posologia'];
$quantidade=1;
$data= date('j-m-Y');



require('fpdf/fpdf.php');

$pdf = new FPDF('L','mm','A3');
$pdf->AddPage();
$pdf->SetFont('Arial','B',18);
// Logo
$pdf->Image('http://nutriventurescorporation.com/sites/default/files/upload/ministerio_da_saude_direccao-geral_da_saude.png',350,10,50,0,'PNG');
$pdf->Cell(280,24,'  Receita Medica: ' . $id_receita,1,2);
$pdf->Cell(280,24,'  Utente: ' . $nome_utente,1,2);
$pdf->Cell(280,24,'  Medico: ' . $nome_doutor,1,2);
$pdf->Cell(300,24,'  Numero de Beneficiario: ' . $n_benefi,1,2);
$pdf->Cell(280,16,'  Designacao do medicamento, dosagem, forma farmaceutica, dimensao da embalagem','LTB',0);
$pdf->Cell(20,16,'   N','TBR',1);
$pdf->SetFont('Arial','',18);
$pdf->Cell(280,36,$medic . ', ' . $dosagem . ', ' . $forma . ', ' . $dim,'LTB',0);
$pdf->Cell(20,36,'   '.$quantidade,1,'TBR',1);
$pdf->SetFont('Arial','B',18);
$pdf->Cell(0,24,'',0,1);
$pdf->Cell(0,24,'','0',1);
$pdf->Cell(300,16,'  Posologia',1,1);
$pdf->SetFont('Arial','',18);
$pdf->Cell(300,36,'  ' . $posologia,1,1);
$pdf->SetFont('Arial','B',18);
$pdf->Cell(160,24,'  Data: ' . $data,'LRT',1);
$pdf->Cell(160,24,'  Validade: 30 Dias','LRB',1);
//Output
$pdf->Output();
?>
