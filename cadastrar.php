<?php
session_start();
include("conexao.php");

$id = mysql_real_escape_string($id, $_POST['id']);
$nome = mysql_real_escape_string($conexao, $_POST['nome']);
$cpf = mysql_real_escape_string($conexao, $_POST['cpf']);
$datanasc = mysql_real_escape_string($conexao, $_POST['datanasc']);
$email = mysql_real_escape_string($conexao, $_POST['email']);
$contato = mysql_real_escape_string($conexao, $_POST['contato']);


?>