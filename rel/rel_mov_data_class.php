<?php 
ob_start();
include('../conexao.php');

date_default_timezone_set('America/Sao_Paulo');


//CARREGAR DOMPDF
require_once '../dompdf/autoload.inc.php';
use Dompdf\Dompdf;
use Dompdf\Options;

//INICIALIZAR A CLASSE DO DOMPDF
$options = new Options();
$options->set('isRemoteEnabled', true);
$pdf = new DOMPDF($options);

$dataInicial = $_POST['txtdataInicial'];
$dataFinal = $_POST['txtdataFinal'];
$tipo = $_POST['tipo'];



if ($dataInicial == ''){
	$dataInicial = Date('Y-m-d');
}

if ($dataFinal == ''){
	$dataFinal = Date('Y-m-d');
}

//ALIMENTAR OS DADOS NO RELATÓRIO
$html = utf8_encode(file_get_contents($url."/rel/rel_mov_data.php?dataInicial=".$dataInicial."&dataFinal=".$dataFinal."&tipo=".$tipo));




//Definir o tamanho do papel e orientação da página
$pdf->set_paper('A4', 'portrait');

//CARREGAR O CONTEÚDO HTML
$pdf->load_html(utf8_decode($html));

//RENDERIZAR O PDF
$pdf->render();

//NOMEAR O PDF GERADO
$pdf->stream(
'relatorioMovData.pdf',
array("Attachment" => false)
);


