<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar senha</title>
    <!-- linkando css-->
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
    <!--sweetalert para customizar o alert-->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!--linkando javascript para validação se senha-->
    <script type="text/javascript">
    //criando variaveis dos campos senhas e repetir senha 
        function validar(){
            var senha = formuser.senha.value;
            var rep_senha = formuser.rep_senha.value;

            // "swal" substitui o "alert"
            
            //caso a senha tenha menos de 6 caracteres 
            if(senha == "" || senha.length <= 5){
                swal({
                    title: 'OPS!',
                    text: 'Sua senha precisa ter no minimo 6 caracteres!',
                    icon: 'error'
                });
                formuser.senha.focus();
                return false;
            }
            
            //caso o repetir senha tenha menos de 6 caracteres
            if(rep_senha == "" || rep_senha.length <= 5){
                swal({
                    title: 'OPS!',
                    text: 'Sua senha precisa ter no minimo 6 caracteres!',
                    icon: 'error'
                });
                formuser.rep_senha.focus();
                return false;
            }
            // caso as duas senhas tenham mais de 6 caracteres e sejam diferentes
            if (senha != rep_senha) {
                swal({
                    title: 'OPS!',
                    text: 'Suas senhas são diferentes!',
                    icon: 'error'
                });
                formuser.senha.focus();
                return false;
            }
            //caso as duas senhas sejam iguais
            if (senha = rep_senha) {
                swal({
                    title: 'Feito!',
                    text: 'Suas senha foi alterada com sucesso!',
                    icon: 'success'
                });
                formuser.senha.focus();
                return false;
            }

        }
    </script>
</head>
<body>
    <!-- classe senha-->
    <main class="senha">
        <!--container da senha-->
        <div class="senha_container">
            <h1 class="senha_titulo"> GEMIC</h1>
            <!--form-->
            <form name="formuser" class="senha_form" action="#" method="POST">
                <!--inputs senha e repetir senha + span da linha-->
                <input class="senha_input" type="password" name="senha" placeholder="Digite sua nova senha">
                <span class="senha_input_border"></span>
                <input class="senha_input" type="password" name="rep_senha" placeholder="Confirme sua senha">
                <span class="senha_input_border"></span>
                <!-- enviar a senha-->
                <input type="submit" onclick="return validar()" class="senha_submit">
            </form>
        </div>
    </main>
</body>
</html>