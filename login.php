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
            <form method="post" action="consulta.php">
                <input class="login_input" type="email" placeholder="Usuário" id="user">
                <span class="login_input_border"></span>
                <input class="login_input" type="password" placeholder="Senha" id="password">
                <span class="login_input_border"></span> <br> <br>
            </form>
            <button class="login_submit" onclick="signIn()">Login</button>
            <a class="login_reset" href="senha.php">Esqueci a Senha</a><br>
            
        </div>
    </main>

</body>

</html>