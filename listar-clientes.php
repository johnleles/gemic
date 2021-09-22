<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>GEMIC - Lista de Clientes</title>
    <link rel="stylesheet" href="css/estilo.css">
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
            <a href="estoque.php"> <strong>Estoque</strong></a>
            <a href="financeiro.php"> <strong>Financeiro</strong></a>
            <a href="suporte.php"> <strong>Suporte</strong></a>
            <a href="login.php"> <strong>Sair</strong></a>
        </div>
    </div>
    <!-- Cabeçalho - Fim -->

    <!-- Menu de Clientes -->
    <div id="area-clientes">
        <div class="area-fundo">
            <div id="area-lista-clientes">
                <h2>Lista de Clientes</h2> <br>
            </div>
            <div id="link-cadastrar">
                <a href="cadastrar-clientes.php"> <strong>Novo</strong></a> <br> <br>
            </div>
            
                <a href="listar-clientes.php"> <strong>Editar um cliente</strong></a>
                <a href="cadastrar-clientes.php"> <strong>Remover um cliente</strong></a>
    <!-- Lista de Clientes -->
    <?php
        include("conexao.php");
        $consulta = "SELECT nome,email,cpf,contato  FROM clientes ORDER BY nome";
        $con = $conexao->query($consulta) or die($mysqli->error);
        ?>
        <table class="lista-clientes">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>CPF</th>
                    <th>Contato</th>
                </tr>
            </thead>
            <?php while ($dado = $con->fetch_array()) { ?>
                <tbody>
                    <tr>
                        <td><?php echo $dado["nome"]; ?></td>
                        <td><?php echo $dado["email"]; ?></td>
                        <td><?php echo $dado["cpf"]; ?></td>
                        <td><?php echo $dado["contato"]; ?></td>
                    </tr>
                </tbody>
            <?php } ?>
        </table>
            
        <div id="rodape">
            Todos os direitos reservados.
        </div>
    </div>

</body>

</html>