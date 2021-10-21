<?php
session_start();
include('verificar_login.php');
include('conexao.php');
?>

<!DOCTYPE html>
<html>
<head>
  <title>GEMIC - Abrir Orçamentos</title>
  
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
            <a href=""> <strong>Suporte</strong></a>
            <a href="logout.php"> <strong>Sair</strong></a>
        </div>
    </div>
    <!-- Cabeçalho - Fim -->

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="listar_orcamentos_admin.php"><big><big><i class="fa fa-arrow-left"></i></big></big></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
      <ul class="navbar-nav mr-auto">

      </ul>
      <form class="form-inline my-2 my-lg-0">

        <select class="form-control mr-2" id="category" name="status">
         <option value="Todos">Todos</option> 
         <option value="Aberto">Aberto</option> 
         <option value="Aguardando">Aguardando</option> 
         <option value="Aprovado">Aprovado</option> 
         <option value="Cancelado">Cancelado</option> 
       </select>

       <input name="txtpesquisar" class="form-control mr-sm-2" type="date" placeholder="Pesquisar" aria-label="Pesquisar">
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
          <h4 class="card-title"> Orçamentos Abertos</h4>
        </div>
        <div class="card-body">
          <div class="table-responsive">

            <!--LISTAR TODOS OS ORÇAMENTOS -->

            <?php


            if(isset($_GET['buttonPesquisar']) and $_GET['txtpesquisar'] != '' and $_GET['status'] != 'Todos'){
              $data = $_GET['txtpesquisar'] . '%';
              $statusOrc = $_GET['status'];

              $query = "select o.id, o.cliente, o.tecnico, o.produto, o.valor_total, o.status, c.nome as cli_nome, f.nome as func_nome from orcamentos as o INNER JOIN clientes as c on o.cliente = c.cpf INNER JOIN funcionarios as f on o.tecnico = f.id where data_abertura = '$data' and status = '$statusOrc' order by id asc";

            }else if(isset($_GET['buttonPesquisar']) and $_GET['txtpesquisar'] == '' and $_GET['status'] != 'Todos'){
             $statusOrc = $_GET['status'];
             $query = "select o.id, o.cliente, o.tecnico, o.produto, o.valor_total, o.status, c.nome as cli_nome, f.nome as func_nome from orcamentos as o INNER JOIN clientes as c on o.cliente = c.cpf INNER JOIN funcionarios as f on o.tecnico = f.id where data_abertura = curDate() and status = '$statusOrc' order by id asc"; 

           }else if(isset($_GET['buttonPesquisar']) and $_GET['txtpesquisar']!= '' and $_GET['status'] == 'Todos'){
             $data = $_GET['txtpesquisar'] . '%';
             $query = "select o.id, o.cliente, o.tecnico, o.produto, o.valor_total, o.status, c.nome as cli_nome, f.nome as func_nome from orcamentos as o INNER JOIN clientes as c on o.cliente = c.cpf INNER JOIN funcionarios as f on o.tecnico = f.id where data_abertura = '$data' order by id asc"; 


           }else{
             $query = "select o.id, o.cliente, o.tecnico, o.produto, o.valor_total, o.status, c.nome as cli_nome, f.nome as func_nome from orcamentos as o INNER JOIN clientes as c on o.cliente = c.cpf INNER JOIN funcionarios as f on o.tecnico = f.id where data_abertura = curDate()  order by id asc"; 
           }



           $result = mysqli_query($conexao, $query);
                        //$dado = mysqli_fetch_array($result);
           $row = mysqli_num_rows($result);

            if($row == '' or $row == 0){

            echo "<h5> Não existem dados cadastrados no banco </h5>";

          }else{

           ?>



           <table class="table">
            <thead class=" text-primary">

              <th>
                Cliente
              </th>
              <th>
                Técnico
              </th>
              <th>
                Produto
              </th>
              <th>
                Valor Total
              </th>
              <th>
                Status
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
          $cliente = $res_1["cli_nome"];
          $tecnico = $res_1["func_nome"];
          $produto = $res_1["produto"];
          $valor_total = $res_1["valor_total"];
          $status = $res_1["status"];

          $id = $res_1["id"];
          $valor_total = number_format($valor_total, 2, ',', '.'); 

          ?>

          <tr>

           <td><?php echo $cliente; ?></td>
           <td><?php echo $tecnico; ?></td> 
           <td><?php echo $produto; ?></td>
           <td>R$ <?php echo $valor_total; ?></td>
           <td><?php echo $status; ?></td>


           <td>
             <a class="btn btn-info" href="abrir_orcamentos.php?func=edita&id=<?php echo $id; ?>"><i class="fa fa-pencil-square-o"></i></a>

             <a class="btn btn-danger" href="abrir_orcamentos.php?func=deleta&id=<?php echo $id; ?>"><i class="fa fa-minus-square"></i></a>

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
  <div class="modal-dialog modal-lg">
   <!-- Modal content-->
   <div class="modal-content">
    <div class="modal-header">

      <h4 class="modal-title">Novo Orçamento</h4>
      <button type="button" class="close" data-dismiss="modal">&times;</button>
    </div>
    <div class="modal-body">
      <form method="POST" action="">
        <div class="row">
          <div class="col-md-6">
           <div class="form-group">
             <label for="fornecedor">Cliente</label>

             <select data-width="100%" class="form-control mr-2" id="select2cli" name="txtcpf">
              <?php

              $query = "SELECT * FROM clientes ORDER BY nome asc";
              $result = mysqli_query($conexao, $query);

              if(mysqli_num_rows($result)){
                while($res_1 = mysqli_fetch_array($result)){
                 ?>                                             
                 <option value="<?php echo $res_1['cpf']; ?>"><?php echo $res_1['nome']; ?> - <?php echo $res_1['cpf']; ?></option> 
                 <?php      
               }
             }
             ?>
           </select>
         </div>
       </div>
       <div class="col-md-6">
        <div class="form-group">
         <label for="fornecedor">Técnico</label>

         <select data-width="100%" class="form-control mr-2 select2" id="cat" name="funcionario">
          <?php

          $query = "SELECT * FROM funcionarios where cargo = 'Funcionário' ORDER BY nome asc";
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
 </div>


 <div class="row">
  <div class="col-md-4">
   <div class="form-group">
    <label for="quantidade">Produto</label>
    <input type="text" class="form-control mr-2" name="txtproduto" placeholder="Produto" required>
  </div>
</div>

<div class="col-md-4">

  <div class="form-group">
    <label for="quantidade">Num Série</label>
    <input type="text" class="form-control mr-2" name="txtserie" placeholder="Número de Série" required>
  </div>
</div>

<div class="col-md-4">
  <div class="form-group">
    <label for="quantidade">Defeito</label>
    <input type="text" class="form-control mr-2" name="txtdefeito" placeholder="Defeito" required>
  </div>
</div>

</div>


<div class="form-group">
  <label for="quantidade">Observações</label>
  <input type="text" class="form-control mr-2" name="txtobs" placeholder="Observações">
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
  $nome = $_POST['txtcpf'];
  $tecnico = $_POST['funcionario'];
  $produto = $_POST['txtproduto'];
  $serie = $_POST['txtserie'];
  $defeito = $_POST['txtdefeito'];
  $obs = $_POST['txtobs'];

  if($obs == ""){
    $obs = 'Nenhuma!';
  }


  //VERIFICAR SE O CPF JÁ ESTÁ CADASTRADO
  $query_verificar = "select * from clientes where cpf = '$nome' ";

  $result_verificar = mysqli_query($conexao, $query_verificar);
  $row_verificar = mysqli_num_rows($result_verificar);

  if($row_verificar <= 0){
    echo "<script language='javascript'> window.alert('O Cliente não Está Cadastrado!'); </script>";
    exit();
  } 

  $query = "INSERT into orcamentos (cliente, tecnico, produto, serie, problema, obs, valor_total, data_abertura, status) VALUES ('$nome', '$tecnico', '$produto', '$serie', '$defeito', '$obs', '0',  curDate(), 'Aberto' )";

  $result = mysqli_query($conexao, $query);

  if($result == ''){
    echo "<script language='javascript'> window.alert('Ocorreu um erro ao Cadastrar!'); </script>";
  }else{
    echo "<script language='javascript'> window.alert('Salvo com Sucesso!'); </script>";
    echo "<script language='javascript'> window.location='abrir_orcamentos.php'; </script>";
  }

}
?>


<!--EXCLUIR -->
<?php
if(@$_GET['func'] == 'deleta'){
  $id = $_GET['id'];
  $query = "DELETE FROM orcamentos where id = '$id'";
  mysqli_query($conexao, $query);
  echo "<script language='javascript'> window.location='abrir_orcamentos.php'; </script>";
}
?>



<!--EDITAR -->
<?php
if(@$_GET['func'] == 'edita'){  
  $id = $_GET['id'];
  $query = "select * from orcamentos where id = '$id'";
  $result = mysqli_query($conexao, $query);

  while($res_1 = mysqli_fetch_array($result)){


    ?>

    <!-- Modal -->
    <div id="modalEditar" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">
       <!-- Modal content-->
       <div class="modal-content">
        <div class="modal-header">

          <h4 class="modal-title">Editar Orçamento</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>



         <div class="modal-body">
      <form method="POST" action="">
        <div class="row">
          <div class="col-md-6">
           <div class="form-group">
             <label for="fornecedor">Cliente</label>

             <select data-width="100%" class="form-control mr-2" id="select2cli2" name="txtcpf">
              <?php

              $query = "SELECT * FROM clientes ORDER BY nome asc";
              $result = mysqli_query($conexao, $query);

              if(mysqli_num_rows($result)){
                while($res_1c = mysqli_fetch_array($result)){
                 ?>                                             
                 <option <?php if($res_1c['cpf'] == $res_1['cliente']){ ?> selected <?php } ?> value="<?php echo $res_1c['cpf']; ?>"><?php echo $res_1c['nome']; ?> - <?php echo $res_1c['cpf']; ?></option> 
                 <?php      
               }
             }
             ?>
           </select>
         </div>
       </div>
       <div class="col-md-6">
        <div class="form-group">
         <label for="fornecedor">Técnico</label>

         <select data-width="100%" class="form-control mr-2 select2edit" id="cat2" name="funcionario">
          <?php

          $query = "SELECT * FROM funcionarios where cargo = 'Funcionário' ORDER BY nome asc";
          $result = mysqli_query($conexao, $query);

          if(mysqli_num_rows($result)){
            while($res_1t = mysqli_fetch_array($result)){
             ?>                                             
             <option <?php if($res_1t['id'] == $res_1['tecnico']){ ?> selected <?php } ?> value="<?php echo $res_1t['id']; ?>"><?php echo $res_1t['nome']; ?></option> 
             <?php      
           }
         }
         ?>
       </select>
     </div>
   </div>
 </div>


 <div class="row">
  <div class="col-md-4">
   <div class="form-group">
    <label for="quantidade">Produto</label>
    <input type="text" class="form-control mr-2" name="txtproduto" placeholder="Produto" required  value="<?php echo $res_1['produto']; ?>">
  </div>
</div>

<div class="col-md-4">

  <div class="form-group">
    <label for="quantidade">Num Série</label>
    <input type="text" class="form-control mr-2" name="txtserie" placeholder="Número de Série" required value="<?php echo $res_1['serie']; ?>">
  </div>
</div>

<div class="col-md-4">
  <div class="form-group">
    <label for="quantidade">Defeito</label>
    <input type="text" class="form-control mr-2" name="txtdefeito" placeholder="Defeito" required value="<?php echo $res_1['problema']; ?>">
  </div>
</div>

</div>


<div class="form-group">
  <label for="quantidade">Observações</label>
  <input type="text" class="form-control mr-2" name="txtobs" placeholder="Observações" value="<?php echo $res_1['obs']; ?>">
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

  $cliente = $_POST['txtcpf'];
  $tecnico = $_POST['funcionario'];
  $produto = $_POST['txtproduto'];
  $serie = $_POST['txtserie'];
  $defeito = $_POST['txtdefeito'];
  $obs = $_POST['txtobs'];

  if($obs == ""){
    $obs = 'Nenhuma!';
  }


  $query_editar = "UPDATE orcamentos set cliente = '$cliente', tecnico = '$tecnico', produto = '$produto', serie = '$serie', problema = '$defeito', obs = '$obs' where id = '$id' ";

  $result_editar = mysqli_query($conexao, $query_editar);

  if($result_editar == ''){
    echo "<script language='javascript'> window.alert('Ocorreu um erro ao Editar!'); </script>";
  }else{
    echo "<script language='javascript'> window.alert('Editado com Sucesso!'); </script>";
    echo "<script language='javascript'> window.location='abrir_orcamentos.php'; </script>";
  }

}
?>


<?php } }  ?>


<!--MASCARAS -->

<script type="text/javascript">
  $(document).ready(function(){
    $('#txttelefone').mask('(00) 00000-0000');

    $('.select2').select2({
     dropdownParent: $('#modalExemplo')
   });
    $('#select2cli').select2({
     dropdownParent: $('#modalExemplo')
   });

    $('.select2edit').select2({
     dropdownParent: $('#modalEditar')
   });
    $('#select2cli2').select2({
     dropdownParent: $('#modalEditar')
   });

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