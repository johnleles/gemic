<!DOCTYPE html>
<html>

<head>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>







        <link rel="stylesheet" type="text/css" href="css/estilo.css">
</head>

<body>

    <!-- Cabeçalho - Início -->
    <div id="area-cabecalho">
        <div id="area-logo">
            <h1> GE<span class="branco">MIC</span> </h1>
        </div>

        <div id="area-menu">
            <a href="dashboard_auxiliar.php"> <strong>Dashboard</strong></a>
            <a href="clientes.php"> <strong>Clientes</strong></a>
            <a href="servicos.php"> <strong>Serviços</strong></a>
            <a href="rel_orcamentos.php"> <strong>Relatório</strong></a>
            <a href="suporte.php"> <strong>Suporte</strong></a>
            <a href="logout.php"> <strong>Sair</strong></a>
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