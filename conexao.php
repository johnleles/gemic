<?php
date_default_timezone_set('America/Sao_Paulo');


define('HOST', 'localhost');
define('USUARIO', 'root');
define('SENHA', '');
define('BD', 'gemicdb');

$conexao = mysqli_connect(HOST, USUARIO, SENHA, BD) or die ('Não foi possível conectar ao Banco de Dados!');

//URL PARA OS RELATÓRIOS e dados para os relatórios
$url = "http://$_SERVER[HTTP_HOST]/";
$url_sistema = explode("//", $url);
if($url_sistema[1] == 'localhost/'){
	$url = "http://$_SERVER[HTTP_HOST]/sistemaos/";
}

$nome_empresa = "GEMIC - Gerenciador de Microempresas";
$endereco_empresa = "R. Tupinambás, 572 - Jardim Nova Belem, Francisco Morato - SP, 07909-065";
$texto_rodape = "Desenvolvido em Função do Trabalho de Conclusão de Cursos - ETEC - Francisco Morato";
$email_adm = "gemic@administrativo.com.br";

//VARIÁVEIS GLOBAIS
$prazo_orcamento_dias = 5; //O Cliente tem nesse exemplo 5 dias para poder decidir quanto ao orçamento, caso passe dessa quantidade de dias, o orçamento será cancelado.



?>

