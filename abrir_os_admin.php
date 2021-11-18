<?php
session_start();
include('verificar_login.php');
include('conexao.php');

$tecnico = $_SESSION['nome_usuario'];
$nivel = $_SESSION['cargo_usuario'];

if($nivel == 'Administrador'){
  $classe = '';
}else{
  $classe = 'disabled';
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>GEMIC - OS Abertas</title>
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
            <a href="suporte_admin.php"> <strong>Suporte</strong></a>
            <a href="logout.php"> <strong>Sair</strong></a>
        </div>
    </div>
    <!-- Cabeçalho - Fim -->



  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="listar_os_admin.php"><big><big><i class="fa fa-arrow-left"></i></big></big></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
    <ul class="navbar-nav mr-auto">
      
    </ul>
    <form class="form-inline my-2 my-lg-0">

    
      <input name="txtpesquisar" class="form-control mr-sm-2" type="date" placeholder="Pesquisar" aria-label="Pesquisar">
      <button name="buttonPesquisar" class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fa fa-search"></i></button>
    </form>
  </div>
</nav>





<div class="container">


    

      <br>


         <div class="row">
          

          
        </div>


          <div class="content">
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <h4 class="card-title"> Ordem de Serviços Abertas</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">

                      <!--LISTAR TODOS OS ORÇAMENTOS -->

                      <?php


                        if(isset($_GET['buttonPesquisar']) and $_GET['txtpesquisar'] != ''){
                          $data = $_GET['txtpesquisar'] . '%';
                          
                          if($nivel == 'Administrador'){
                             $query = "select ord.id, ord.cliente, ord.produto, ord.tecnico, ord.total, ord.data_abertura, ord.data_fechamento, ord.status, fun.nome from os as ord INNER JOIN funcionarios as fun ON ord.tecnico = fun.id where ord.data_abertura = '$data' and ord.status = 'Aberta' order by id asc";
                          }else{
                             $query = "select ord.id, ord.cliente, ord.produto, ord.tecnico, ord.total, ord.data_abertura, ord.data_fechamento, ord.status, fun.nome from os as ord INNER JOIN funcionarios as fun ON ord.tecnico = fun.id where ord.data_abertura = '$data' and ord.status = 'Aberta' and fun.nome = '$tecnico' order by id asc";
                          }

                          

                        
                        }else{

                           if($nivel == 'Administrador'){
                             $query = "select ord.id, ord.cliente, ord.produto, ord.tecnico, ord.total, ord.data_abertura, ord.data_fechamento, ord.status, fun.nome from os as ord INNER JOIN funcionarios as fun ON ord.tecnico = fun.id where ord.data_abertura = curDate() and ord.status = 'Aberta'  order by id asc";
                           }else{
                             $query = "select ord.id, ord.cliente, ord.produto, ord.tecnico, ord.total, ord.data_abertura, ord.data_fechamento, ord.status, fun.nome from os as ord INNER JOIN funcionarios as fun ON ord.tecnico = fun.id where ord.data_abertura = curDate() and ord.status = 'Aberta' and fun.nome = '$tecnico' order by id asc";
                           }
                         
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
                            Produto
                          </th>
                           <th>
                            Valor Total
                          </th>
                            <th>
                            Data Abertura
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
                            $cliente = $res_1["cliente"];
                            $produto = $res_1["produto"];
                            $valor_total = $res_1["total"];
                            $data_abertura = $res_1["data_abertura"];
                            
                           
                            $id = $res_1["id"];
                            $valor_total = number_format($valor_total, 2, ',', '.');
                             $data_abertura = implode('/', array_reverse(explode('-', $data_abertura)));   


                             $query2 = "select * from clientes where cpf = '$cliente'";
                              $result2 = mysqli_query($conexao, $query2);
                        //$dado = mysqli_fetch_array($result);
                        $row2 = mysqli_num_rows($result2);

                       if($row2 > 0){
                        while($res_2 = mysqli_fetch_array($result2)){
                            $nome_cliente = $res_2["nome"];
                          }
                       }
                         
                            ?>

                            <tr>

                             <td><?php echo $nome_cliente; ?></td>
                             <td><?php echo $produto; ?></td> 
                            
                             <td>R$ <?php echo $valor_total; ?></td>
                             <td><?php echo $data_abertura; ?></td>
                             
                           
                             <td>
                             <a title="Concluir Serviço" class="btn btn-success" href="abrir_os_admin.php?func=edita&id=<?php echo $id; ?>&valor=<?php echo $valor_total; ?>"><i class="fa fa-check-square"></i></a>

                             <a class="btn btn-danger <?php echo $classe ?>" href="abrir_os_admin.php?func=deleta&id=<?php echo $id; ?>&produto=<?php echo $produto; ?>"><i class="fa fa-minus-square"></i></a>

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


    <!-- Área - Rodapé -->
    <div id="rodape">
        Todos os direitos reservados.
    </div>




</body>
</html>






<!--EXCLUIR -->
<?php
if(@$_GET['func'] == 'deleta'){
  $produto = $_GET['produto'];
  $id = $_GET['id'];

  if($nivel != 'Administrador'){
    
     echo "<script language='javascript'> window.location='abrir_os_admin.php'; </script>";
     exit();
  }

  $query_editar = "UPDATE os set status = 'Cancelada' where id = '$id' ";

  mysqli_query($conexao, $query_editar);

  $produtoNovo = $produto. ' - ' .$id;

  //INSERINDO O PRODUTO NA TABELA DE PRODUTOS
  $query_produto = "INSERT INTO produtos (produto) values ('$produtoNovo') ";

  mysqli_query($conexao, $query_produto);


  echo "<script language='javascript'> window.location='abrir_os_admin.php'; </script>";
}
?>



<!--EDITAR -->
<?php
if(@$_GET['func'] == 'edita'){  
$id = $_GET['id'];

$query = "select * from os where id = '$id'";
$result = mysqli_query($conexao, $query);

 while($res_1 = mysqli_fetch_array($result)){
$id_orc = $res_1['id_orc'];

$query_email = "select * from orcamentos where id = '$id_orc'";
$result_email = mysqli_query($conexao, $query_email);

 while($res_2 = mysqli_fetch_array($result_email)){
$cpf = $res_2['cliente'];

$query_cli = "select * from clientes where cpf = '$cpf'";
$result_cli = mysqli_query($conexao, $query_cli);

 while($res_3 = mysqli_fetch_array($result_cli)){
$email = $res_3['email'];

}

}


 }


?>

 <!-- Modal -->
      <div id="modalEditar" class="modal fade" role="dialog">
        <div class="modal-dialog">
         <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              
              <h4 class="modal-title">Fechar OS</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
              <form method="POST" action="">
             
             
              <div class="form-group">
                <label for="quantidade">Garantia do Serviço</label>
                <input type="text" class="form-control mr-2" name="txtgarantia" placeholder="Garantia" required>
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
  
  $garantia = $_POST['txtgarantia'];


$query_editar = "UPDATE os set garantia = '$garantia', data_fechamento = curDate(), status = 'Fechada' where id = '$id' ";

$result_editar = mysqli_query($conexao, $query_editar);


$funcionario = $_SESSION['nome_usuario'];
$valor = $_GET['valor'];
$valor = str_replace(',', '.', $valor);

//INSERIR OS DADOS NA TABELA DE MOVIMENTAÇÕES
$query_mov = "INSERT into movimentacoes (tipo, movimento, valor, funcionario, data, id_movimento) VALUES ('Entrada', 'Serviço', '$valor', '$funcionario',  curDate(), '$id' )";
mysqli_query($conexao, $query_mov);



if($result_editar == ''){
  echo "<script language='javascript'> window.alert('Ocorreu um erro ao Editar!'); </script>";
}else{
    echo "<script language='javascript'> window.alert('Editado com Sucesso!'); </script>";
    echo "<script language='javascript'> window.location='rel/rel_os_class.php?id=$id&id_orc=$id_orc&email=$email'; </script>";
}

}
?>


<?php }   ?>





   