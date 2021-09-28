<!DOCTYPE html>
<html>

<head>
    <!-- <script src="https://www.gstatic.com/firebasejs/8.9.1/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.9.1/firebase-auth.js"></script>
    <script src="js/firebase.js"></script>
    <script src="js/index.js"></script> -->
    <meta charset="UTF-8">
    <title>GEMIC - Gerenciador de Microempresas</title>
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
    <!-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
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
            <a href="logout.php"> <strong>Sair</strong></a>
        </div>
    </div>
    <!-- Cabeçalho - Fim -->

    <?php
    
    session_start();
    include('verificar_login.php');

    ?>

    <h3> Bem vindo - <?php echo $_SESSION['nome_usuario']; ?> </h3>
    <h3> Cargo - <?php echo $_SESSION['cargo_usuario']; ?> </h3>
    <img width="100%" src="imagens/imagem-tec.jpg">

    
    <!-- AQUI TERÁ UM CARROSSEL -->

    <!-- Área - Rodapé -->
    <div id="rodape">
        Todos os direitos reservados.
    </div>
    </div>

</body>

</html>