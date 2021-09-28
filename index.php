<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <!-- <script src="https://www.gstatic.com/firebasejs/8.9.1/firebase-app.js"></script> -->
    <!-- <script src="https://www.gstatic.com/firebasejs/8.9.1/firebase-auth.js"></script> -->
    <!-- <script src="js/firebase.js"></script> -->
    <title>GEMIC - Login</title>
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
    <!-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
</head>

<body>

    <main class="login">
        <div class="login_container">
            <h1 class="login_titulo"> GEMIC</h1>
            <form action="login.php" method="post">
                <input class="login_input" type="text" name="usuario" placeholder="Usuário" id="user">
                <span class="login_input_border"></span>
                <input class="login_input" type="password" name="senha" placeholder="Senha" id="password">
                <span class="login_input_border"></span> <br>

                <?php 
                if(isset($_SESSION['nao_autenticado'])): ?>
                <p><small> Usuário ou Senha Inválidos! </small></p> <br>

                <?php
                endif;
                unset($_SESSION['nao_autenticado']);
                ?>

            <button class="login_submit" type="submit">Login</button> <br>
            <a class="login_reset" href="senha.php">Esqueci a Senha</a><br>
            </form>

        </div>
    </main>

</body>

</html>