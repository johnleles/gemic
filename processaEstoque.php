<?php

include_once("conexao.php");
$nomeProduto = $_POST['nomeProduto'];
$preco = $_POST['preco'];
$qtdProduto = $_POST['qtdProduto'];
$descricao = $_POST['descricao'];
$sql = "insert into estoque (nomeProduto,preco,qtdProduto,descricao) values ('$nomeProduto','$preco','$qtdProduto','$descricao')";
$salvar = mysqli_query($conexao,$sql);
$linhas = mysqli_affected_rows($conexao);
mysqli_close($conexao);

 ?>
     <?php
                
                if($linhas == 1){
                        include_once("visualizarEstoque.php");
                    } else{
                        include_once("erro.php");
                    }
                
                ?>           
                
                

