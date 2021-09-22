<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>GEMIC - Cadastro de Proutos</title>
    <link rel="stylesheet" href="css/estilo.css">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> -->
</head>

<body>
    <!-- CabeÃ§alho - InÃ­cio -->
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

    <!-- Área - Principal -->
    <div id="area-clientes">
        <div class="area-fundo">
                <h2>Cadastrar Produtos</h2> <br>
                <div id="link-cadastrar">
                <a href="visualizarEstoque.php"> <strong>Ver Estoque</strong></a> <br> <br>
                </div>

                <form class="login_form" method="post" action="processaEstoque.php">                                     
                    <input class="login_input" name="nomeProduto" type="text" placeholder="Nome do Produto" required autofocus>
                    <span class="login_input_border"></span>
                        
                    <input class="login_input" name="preco" type="decimal" placeholder="Preço" required autofocus>
                    <span class="login_input_border"></span>
                    
                    <input class="login_input" name="qtdProduto" type="number" placeholder="Quantidade de Produto" required autofocus>
                    <span class="login_input_border"></span>
                    <input class="login_input" name="descricao" type="text" placeholder="Descrição" required autofocus>
                    <span class="login_input_border"></span>

                    <div id="Btns">
                        <button type="submit" class="alinharBtns" rel="stylesheet" margim-left="50px">Cadastrar</button>
                        <button type="reset" class="alinharBtns" rel="stylesheet" margim-left="50px">Reset</button>
                    </div>
        </div>
    </div>

        <!-- Área - Rodapé -->
        <div id="rodape">
            Todos os direitos reservados.
        </div>
    </div>

</body>

</html>