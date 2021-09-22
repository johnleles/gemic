<?php

include_once("conexao.php");
$nome = $_POST['nome'];
$email = $_POST['email'];
$cpf = $_POST['cpf'];
$contato = $_POST['contato'];
$sql = "insert into clientes (nome,email,cpf,contato) values ('$nome','$email','$cpf','$contato')";
$salvar = mysqli_query($conexao,$sql);
$linhas = mysqli_affected_rows($conexao);
mysqli_close($conexao);

?>          


                <?php
                                
                if($linhas == 1){
                        include_once("listar-clientes.php");
                    } else{
                        include_once("erro.php");
                    }

                ?>


               
                
                

