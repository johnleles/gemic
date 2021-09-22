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
            <a href="login.php"> <strong>Sair</strong></a>
        </div>
    </div>
    <!-- Cabeçalho - Fim -->

    <!-- Área - Principal -->

    <div id="area-principal">
        <div class="area-fundo">
                <h2>Fluxo de Caixa</h2> <br>
            <?php
                include("conexao.php");
                $consulta = "SELECT nome,email,cpf,contato  FROM clientes ORDER BY nome";
                $con = $conexao->query($consulta) or die($mysqli->error);
            ?>
                <table class="lista-clientes">
                    <thead>
                        <tr>
                            <th>Data</th>
                            <th>Descrição</th>
                            <th>Receitas</th>
                            <th>Despesas</th>
                            <th>Saldo</th>
                        </tr>
                    </thead>
                    <?php while ($dado = $con->fetch_array()) { ?>
                        <tbody>
                            <tr>
                                <td><?php echo $dado["null"]; ?></td>
                                <td><?php echo $dado["null"]; ?></td>
                                <td><?php echo $dado["null"]; ?></td>
                                <td><?php echo $dado["null"]; ?></td>
                                <td><?php echo $dado["null"]; ?></td>
                            </tr>
                        </tbody>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>

    <div id="area-principal">
        <div class="area-fundo">
                <h2>Receita</h2> <br>
            <?php
                include("conexao.php");
                $consulta = "SELECT nome,email,cpf,contato  FROM clientes ORDER BY nome";
                $con = $conexao->query($consulta) or die($mysqli->error);
            ?>
                <table class="lista-clientes">
                    <thead>
                        <tr>
                            <th>Serviços</th>
                            <th>Vendas</th>
                            <th>Total de Ganhos</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <?php while ($dado = $con->fetch_array()) { ?>
                        <tbody>
                            <tr>
                                <td><?php echo $dado["servicos"]; ?></td>
                                <td><?php echo $dado["vendas"]; ?></td>
                                <td><?php echo $dado["totalGanhos"]; ?></td>
                                <td><?php echo $dado["acoes"]; ?></td>
                            </tr>
                        </tbody>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
    
    <div id="area-principal">
        <div class="area-fundo">
                <h2>Plano de Contas</h2> <br>
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