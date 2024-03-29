<?php
session_start();
include('verificar_login.php');
include('conexao.php');
?>

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
            <a href="dashboard_admin.php"> <strong>Dashboard</strong></a>
            <a href="administrativo.php"> <strong>Administrativo</strong></a>
            <a href="servicos_admin.php"> <strong>Serviços</strong></a>
            <a href="estoque_admin.php"> <strong>Estoque</strong></a>
            <a href="financeiro.php"> <strong>Financeiro</strong></a>
            <a href="suporte_admin"> <strong>Suporte</strong></a>
            <a href="logout.php"> <strong>Sair</strong></a>
        </div>
    </div>
    <!-- Cabeçalho - Fim -->

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="administrativo.php"><big><big><i class="fa fa-arrow-left"></i></big></big></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
          <ul class="navbar-nav mr-auto">
          <a href="usuarios.php"> <strong>Usuários</strong></a> &nbsp;&nbsp;&nbsp;
          <a href="funcionarios.php"> <strong>Funcionários</strong></a> &nbsp;&nbsp;&nbsp;
          <a href="cargos.php"> <strong>Cargos</strong></a>
          </ul>
    </div>

  <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
    <ul class="navbar-nav mr-auto">
      
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input name="txtpesquisar" class="form-control mr-sm-2" type="search" placeholder="Pesquisar" aria-label="Pesquisar">
      <button name="buttonPesquisar" class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fa fa-search"></i></button>
    </form>
  </div>
</nav>





<div class="container">


    

      <br>


         <div class="row">
           <div class="col-sm-12">
            <button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#modalExemplo">Inserir Novo </button>

           </div>

          
        </div>


          <div class="content">
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <h4 class="card-title"> Usuários</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">

                      <!--LISTAR TODOS OS CLIENTES -->

                      <?php


                        if(isset($_GET['buttonPesquisar']) and $_GET['txtpesquisar'] != ''){
                          $nome = $_GET['txtpesquisar'] . '%';

                           $query = "SELECT * from usuarios where nome LIKE '$nome' order by id desc"; 

                        }else{
                         $query = "SELECT * from usuarios order by id desc"; 
                        }

                        

                        $result = mysqli_query($conexao, $query);
                        //$dado = mysqli_fetch_array($result);
                        $row = mysqli_num_rows($result);

                       if($row == '' or $row == 0){

                            echo "<h3> Não existem dados cadastrados no banco </h3>";

                        }else{

                           ?>

                          

                      <table class="table" id="datatb">
                        <thead class=" text-primary">
                          
                          <th>
                            Nome
                          </th>
                          <th>
                            Usuário
                          </th>
                          <th>
                            Senha
                          </th>
                           <th>
                            Cargo
                          </th>
                          
                           </th>
                           
                           </th>
                            <th>
                            Ações
                          </th>
                        </thead>
                        <tbody>
                         
                         <?php 

                          while($res_1 = mysqli_fetch_array($result)){
                            $nome = $res_1["nome"];
                            $senha = $res_1["senha"];
                            $usuario = $res_1["usuario"];
                            $cargo = $res_1["cargo"];
                           
                            $id = $res_1["id"];

                                                   

                            ?>

                            <tr>

                             <td><?php echo $nome; ?></td>
                             <td><?php echo $usuario; ?></td> 
                             <td><?php echo $senha; ?></td>
                             <td><?php echo $cargo; ?></td>
                            
                             
                            
                             <td>
                             <a class="text-info" href="usuarios.php?func=edita&id=<?php echo $id; ?>"><i class="fa fa-pencil-square-o"></i></a>

                             <a class="text-danger" href="usuarios.php?func=deleta&id=<?php echo $id; ?>"><i class="fa fa-minus-square"></i></a>

                             </td>
                            </tr>

                            <?php 
                              }                        
                            ?>
                            

                        </tbody>
                      </table>
                          <?php 
                              }                        
                            ?>
                    </div>
                  </div>
                </div>
              </div>

</div>




 <!-- Modal -->
      <div id="modalExemplo" class="modal fade" role="dialog">
        <div class="modal-dialog">
         <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              
              <h4 class="modal-title">Usuários</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
              <form method="POST" action="">
              <div class="form-group">
                <label for="id_produto">Usuário</label>
                <input type="text" class="form-control mr-2" name="txtusuario" placeholder="Usuário" required>
              </div>
               <div class="form-group">
                <label for="fornecedor">Senha</label>
                 <input type="password" class="form-control mr-2" name="txtsenha" placeholder="Senha" required>
              </div>
            
               <div class="form-group">
                <label for="fornecedor">Funcionário</label>
                
                  <select data-width="100%" class="form-control mr-2 select2"  id="category" name="funcionario">
                  <?php
                  
                  $query = "SELECT * FROM funcionarios ORDER BY nome asc";
                  $result = mysqli_query($conexao, $query);

                  if(mysqli_num_rows($result)){
                    while($res_1 = mysqli_fetch_array($result)){
                         ?>                                             
                    <option value="<?php echo $res_1['id']; ?>"><?php echo $res_1['nome']; ?></option> 
                         <?php      
                       }
                   }
                  ?>
                  </select>

              </div>


             
            </div>
                   
            <div class="modal-footer">
               <button type="submit" class="btn btn-success mb-3" name="button">Salvar </button>


                <button type="button" class="btn btn-danger mb-3" data-dismiss="modal">Cancelar </button>
            </form>
            </div>
          </div>
        </div>
      </div>    

      <!-- Área - Rodapé -->
      <div id="rodape">
          Todos os direitos reservados.
      </div>




</body>
</html>




<!--CADASTRAR -->

<?php
if(isset($_POST['button'])){

  $funcionario = $_POST['funcionario'];

  $query_func = "select * from funcionarios where id = '{$funcionario}' ";

  $result_func = mysqli_query($conexao, $query_func);
  $dado = mysqli_fetch_array($result_func);
  $row = mysqli_num_rows($result_func);

if($row > 0){
   $nome = $dado["nome"];;
   $cargo = $dado["cargo"];;
}


 
  $usuario = $_POST['txtusuario'];
  $senha = $_POST['txtsenha'];
  
  


  //VERIFICAR SE O USUARIO JÁ ESTÁ CADASTRADO
  $query_verificar = "select * from usuarios where usuario = '$usuario' ";

  $result_verificar = mysqli_query($conexao, $query_verificar);
  $row_verificar = mysqli_num_rows($result_verificar);

  if($row_verificar > 0){
  echo "<script language='javascript'> window.alert('Usuário já Cadastrado!'); </script>";
  exit();
  }


$query = "INSERT into usuarios (nome, usuario, senha, cargo, id_funcionario) VALUES ('$nome', '$usuario', '$senha', '$cargo', '$funcionario' )";

$result = mysqli_query($conexao, $query);

if($result == ''){
  echo "<script language='javascript'> window.alert('Ocorreu um erro ao Cadastrar!'); </script>";
}else{
    echo "<script language='javascript'> window.alert('Salvo com Sucesso!'); </script>";
    echo "<script language='javascript'> window.location='usuarios.php'; </script>";
}

}
?>


<!--EXCLUIR -->
<?php
if(@$_GET['func'] == 'deleta'){
  $id = $_GET['id'];
  $query = "DELETE FROM usuarios where id = '$id'";
  mysqli_query($conexao, $query);
  echo "<script language='javascript'> window.location='usuarios.php'; </script>";
}
?>



<!--EDITAR -->
<?php
if(@$_GET['func'] == 'edita'){  
$id = $_GET['id'];
$query = "select * from usuarios where id = '$id'";
$result = mysqli_query($conexao, $query);

 while($res_1 = mysqli_fetch_array($result)){


?>

  <!-- Modal -->
      <div id="modalEditar" class="modal fade" role="dialog">
        <div class="modal-dialog">
         <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              
              <h4 class="modal-title">Usuários</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
              <form method="POST" action="">
              <div class="form-group">
                <label for="id_produto">Usuário</label>
                <input type="text" class="form-control mr-2" name="txtusuario" placeholder="Usuário" value="<?php echo $res_1['usuario']; ?>" required>
              </div>

              <div class="form-group">
                <label for="fornecedor">Senha</label>
                 <input type="text" class="form-control mr-2" name="txtsenha"  placeholder="Senha" value="<?php echo $res_1['senha']; ?>" required>
              </div>

             
              
              
            </div>
                   
            <div class="modal-footer">
               <button type="submit" class="btn btn-success mb-3" name="buttonEditar">Salvar </button>


                <button type="button" class="btn btn-danger mb-3" data-dismiss="modal">Cancelar </button>
            </form>
            </div>
          </div>
        </div>
      </div>    

 

 <script> $("#modalEditar").modal("show"); </script> 

<!--Comando para editar os dados UPDATE -->
<?php
if(isset($_POST['buttonEditar'])){
  
  $usuario = $_POST['txtusuario'];
  $senha = $_POST['txtsenha'];
 


  if ($res_1['usuario'] != $usuario){

       //VERIFICAR SE O USUARIO JÁ ESTÁ CADASTRADO
  $query_verificar = "select * from usuarios where usuario = '$usuario' ";

  $result_verificar = mysqli_query($conexao, $query_verificar);
  $row_verificar = mysqli_num_rows($result_verificar);

  if($row_verificar > 0){
  echo "<script language='javascript'> window.alert('Usuário já Cadastrado!'); </script>";
  exit();
  }

  }

 


$query_editar = "UPDATE usuarios set usuario = '$usuario', senha = '$senha' where id = '$id' ";

$result_editar = mysqli_query($conexao, $query_editar);

if($result_editar == ''){
  echo "<script language='javascript'> window.alert('Ocorreu um erro ao Editar!'); </script>";
}else{
    echo "<script language='javascript'> window.alert('Editado com Sucesso!'); </script>";
    echo "<script language='javascript'> window.location='usuarios.php'; </script>";
}

}
?>


<?php } }  ?>


<script type="text/javascript">
  $(document).ready(function() {
    $('.select2').select2();
});
</script>


<style type="text/css">
.select2-selection__rendered {
line-height: 40px !important;
}

.select2-selection {
height: 40px !important;
}
</style>



<link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css">
 <script type="text/javascript" charset="utf8" src="DataTables/datatables.min.js"></script>


<script type="text/javascript">
  $(document).ready(function() {
    $('#datatb').DataTable();
} );
</script>