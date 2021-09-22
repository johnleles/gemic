<?php

include('conexao.php');


if (empty($_POST['usuario']) || empty($_POST['senha'])) {
    header('Location: index.php');
    exit();
}

$usuario = mysql_real_escape_string($conexao, $_POST['usuario']);
$senha = mysql_real_escape_string($conexao, $_POST['senha']);

$query = "select * from usuarios where usuario = '{$usuario}' and senha = '{$senha}' ";

$result = mysqli_query($conexao, $query);

$row = mysqli_num_rows($result);

if($row > 0){
    $_SESSION['usuario'] = $usuario;
    header('Location: dashboard.php');
    exit();
}else{
    $_SESSION['nao_autenticado'] = true;
    header('Location: index.php');
    exit();
}


?>