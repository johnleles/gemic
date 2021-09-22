<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>GEMIC - Visualizar Estoque</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>

<body>
    <!-- Cabeçalho - Início -->
    <div id="area-cabecalho">
        <div id="area-logo">
            <h1> GE<span class="branco">MIC</span> </h1>
        </div>

        <div id="area-menu">
            <a href="index.php"> <strong>Dashboard</strong></a>
            <a href="administrativo.php"> <strong>Administrativo</strong></a>
            <a href="visualizarEstoque.php"> <strong>Estoque</strong></a>
            <a href="financeiro.php"> <strong>Financeiro</strong></a>
            <a href="suporte.php"> <strong>Suporte</strong></a>
            <a href="login.php"> <strong>Sair</strong></a>
        </div>
    </div>
    <!-- Cabeçalho - Fim -->

    <!-- Menu de Clientes -->
    <div id="area-clientes">
        <div class="area-fundo">
                <h2>Estoque</h2>
            <div id="link-cadastrar">
                <a href="estoque.php"> <strong>Novo</strong></a> <br> <br>
            </div>
            
    <!-- Lista de Clientes -->
    <?php
        include("conexao.php");
        $consulta = "SELECT codigo,nomeProduto,preco,qtdProduto,descricao  FROM estoque";
        $con = $conexao->query($consulta) or die($mysqli->error);
        ?>
        <table class="lista-clientes">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nome do Produto</th>
                    <th>Valor</th>
                    <th>Quantidade</th>
                    <th>Descrição</th>

                </tr>
            </thead>
            <?php while ($dado = $con->fetch_array()) { ?>
                <tbody>
                    <tr>
                        <td><?php echo $dado["codigo"]; ?></td>
                        <td><?php echo $dado["nomeProduto"]; ?></td>
                        <td><?php echo $dado["preco"]; ?></td>
                        <td><?php echo $dado["qtdProduto"]; ?></td>
                        <td><?php echo $dado["descricao"]; ?></td>
                    </tr>
                </tbody>
            <?php } ?>
        </table>
            <!-- <table class="lista-clientes">
                <tr>
                    <th>Nome</th>
                    <th>CPF/CNPJ</th>
                    <th>Data de Nascimento</th>
                    <th>Email</th>
                    <th>Contato</th>
                    <th>Ações</th>

                </tr>
                <tr>
                    <td>Alfreds Futterkiste</td>
                    <td>500.487.218-08</th>
                    <td>02/05/2001</td>
                    <td>sem@email.com</th>
                    <td>(11) 91080-6064</td>
                    <td>
                        <button> Editar </button>  <button> Remover </button>
                    </td>
                </tr>
                <tr>
                    <td>Centro comercial Moctezuma</td>
                    <td>500.487.218-08</th>
                    <td>02/05/2001</td>
                    <td>sem@email.com</th>
                    <td>(11) 91080-6064</td>
                    <td>
                        <button> Editar </button>  <button> Remover </button>
                    </td>
                </tr>
                <tr>
                    <td>Ernst Handel</td>
                    <td>500.487.218-08</th>
                    <td>02/05/2001</td>
                    <td>sem@email.com</th>
                    <td>(11) 91080-6064</td>
                    <td>
                        <button> Editar </button>  <button> Remover </button>
                    </td>
                </tr>
                <tr>
                    <td>Island Trading</td>
                    <td>500.487.218-08</th>
                    <td>02/05/2001</td>
                    <td>sem@email.com</th>
                    <td>(11) 91080-6064</td>
                    <td>
                        <button> Editar </button>  <button> Remover </button>
                    </td>
                </tr>
                <tr>
                    <td>Laughing Bacchus Winecellars</td>
                    <td>500.487.218-08</th>
                    <td>02/05/2001</td>
                    <td>sem@email.com</th>
                    <td>(11) 91080-6064</td>
                    <td>
                        <button> Editar </button>  <button> Remover </button>
                    </td>
                </tr>
                <tr>
                    <td>Magazzini Alimentari Riuniti</td>
                    <td>500.487.218-08</th>
                    <td>02/05/2001</td>
                    <td>sem@email.com</th>
                    <td>(11) 91080-6064</td>
                    <td>
                        <button> Editar </button>  <button> Remover </button>
                    </td>
                </tr>
                </table>    
          </div>
    </div> -->


        <!-- Ýrea - Rodapé -->
        <div id="rodape">
            Todos os direitos reservados.
        </div>
    </div>

</body>

</html>