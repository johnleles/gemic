<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>GEMIC - Cadastro de Clientes</title>
    <link rel="stylesheet" href="css/estilo.css">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> -->
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

    <!-- Área - Principal -->

    <div id="area-clientes">
        <div class="area-fundo">
            <div id="area-lista-clientes">
                <h2>Cadastrar Clientes</h2> <br>
            </div>
            <div class="postagem">       
                <form class="login_form" method="post" action="processaClientes.php">
                    <input class="login_input" name="nome" type="text" placeholder="Nome" required autofocus>
                    <span class="login_input_border"></span>
                    
                    <input class="login_input" name="email" type="email" placeholder="E-mail" required autofocus>
                    <span class="login_input_border"></span>
                    
                    <input class="login_input" name="cpf" type="text" placeholder="CPF" required autofocus>
                    <span class="login_input_border"></span>
                    
                    <input class="login_input" name="contato" type="tel" placeholder="Contato" required autofocus>
                    <span class="login_input_border"></span>
                  
                    <button type="submit" class="cadastrar_submit">Cadastrar</button>
                </form>
            </div>
        </div>
    </div>

        <!-- Ýrea - Rodapé -->
        <div id="rodape">
            Todos os direitos reservados.
        </div>
    </div>

</body>

</html>