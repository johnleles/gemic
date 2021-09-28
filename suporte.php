<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>GEMIC - Administrativo</title>
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
</head>

<body>

    <!-- Cabeçalho - Início -->
    <div id="area-cabecalho">
        <div id="area-logo">
            <h1> GE<span class="branco">MIC</span> </h1>
        </div>

        <div id="area-menu">
            <a href="dashboard.php"> <strong>Dashboard</strong></a>
            <a href="administrativo.php"> <strong>Administrativo</strong></a>
            <a href="visualizarEstoque.php"> <strong>Estoque</strong></a>
            <a href="financeiro.php"> <strong>Financeiro</strong></a>
            <a href="suporte.php"> <strong>Suporte</strong></a>
            <a href="login.php"> <strong>Sair</strong></a>
        </div>
    </div>
    <!-- Cabeçalho - Fim -->
    
    <?php
    
    session_start();
    include('verificar_login.php');

    ?>

    <img width="100%" src="imagens/suporte.png">

    <!-- Ýrea - Principal -->
    <div id="area-principal">
        <div id="area-conteudos">
            <div class="postagem">
                <h2>Suporte</h2>
                <form class="login_form">
                    <input class="login_input" type="text" placeholder="Nome">
                    <span class="login_input_border"></span>
                    <input class="login_input" type="email" placeholder="E-mail">
                    <span class="login_input_border"></span>
                    <input class="login_input" type="text" placeholder="Categoria de Suporte">
                    <span class="login_input_border"></span>
                    <input class="login_input" type="text" placeholder="Assunto">
                    <span class="login_input_border"></span>
                    <input class="login_input" type="text" placeholder="Descrição"> <br> <br>
                    <span class="login_input_border"></span>
                    <input class="login_input" type="file">
                    <button class="login_submit">Enviar</button>
                </form>
            </div>
        </div>

        <!-- Ýrea - Lateral 
        <div id="area-lateral">

            <div class="conteudo-lateral">
                <h3> Contato </h3>
                <div class="postagem-lateral">
                    <p></p> (11) 4444-4444 </p>
                    <p></p> <br>
                    <a href="">Leia mais</a>
                </div>

                <div class="postagem-lateral" style="border-bottom: none;">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry Ipsum is simply dummy text of the.</p> <br>
                    <a href="">Leia mais</a>
                </div>
            </div>

            <div class="conteudo-lateral">
                <h3> Categorias </h3>
                <a href="">Administrativo</a> <br>
                <a href="">Cadastros</a> <br>
                <a href="">Suporte</a> <br>
                <a href="">Ponto Eletrônico</a>
            </div>
        </div>-->


        <!-- Ýrea - Rodapé -->
        <div id="rodape">
            Todos os direitos reservados.
        </div>
    </div>

</body>

</html>