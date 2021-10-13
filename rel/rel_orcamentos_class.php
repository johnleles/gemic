<?php 
ob_start();
include('../conexao.php');

//CARREGAR DOMPDF
require_once '../dompdf/autoload.inc.php';
use Dompdf\Dompdf;
use Dompdf\Options;

//INICIALIZAR A CLASSE DO DOMPDF
$options = new Options();
$options->set('isRemoteEnabled', true);
$pdf = new DOMPDF($options);

$id = $_GET['id'];
$email = $_GET['email'];

//ALIMENTAR OS DADOS NO RELATÓRIO
$html = utf8_encode(file_get_contents($url."/rel/rel_orcamentos.php?id=".$id));

//Definir o tamanho do papel e orientação da página
$pdf->set_paper('A4', 'portrait');

//CARREGAR O CONTEÚDO HTML
$pdf->load_html(utf8_decode($html));

//RENDERIZAR O PDF
$pdf->render();

//NOMEAR O PDF GERADO
$pdf->stream(
'relatorioOrcamento.pdf',
array("Attachment" => false)
);



//ENVIAR O ORÇAMENTO POR EMAIL
$to = $email_adm;
$subject = 'Systec Orçamento';
$message = file_get_contents($url."/rel/rel_orcamentos.php?id=".$id);
$dest = $email;
$headers = 'Content-type: text/html; charset=utf-8;';
mail($dest, $subject, $message, $headers);
 