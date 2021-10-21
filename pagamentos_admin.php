<?php
session_start();
include('verificar_login.php');
include('conexao.php');
?>

<!DOCTYPE html>
<html>
<head>
    <title>GEMIC - Pagamentos</title>
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

<div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
<ul class="navbar-nav mr-auto">

<a href="movimentacoes_admin.php"> <strong>Movimentações</strong></a> ||
<a href="receitas_admin.php"> <strong>Receitas</strong></a> ||
<a href="despesas_admin.php"> <strong>Despesas</strong></a> ||
<a href="pagamentos_admin.php"> <strong>Pagamentos</strong></a>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;

<a href="#" data-toggle="modal" data-target="#modalExemplo">
          <i class="nc-icon nc-diamond"></i>
          <p>Relatório Orçamentos</p>
      </a>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <a href="#" data-toggle="modal" data-target="#modalOS">
          <i class="nc-icon nc-pin-3"></i>
          <p>Relatório de OS</p>
      </a> 
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <a href="#" data-toggle="modal" data-target="#modalRelMov">
          <i class="nc-icon nc-bell-55"></i>
          <p>Relatório de Movimentações</p>
      </a>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <a href="#" data-toggle="modal" data-target="#modalRelGastos">
          <i class="nc-icon nc-caps-small"></i>
          <p>Relatório de Gastos</p>
      </a>
        
      </ul>

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
                    <h4 class="card-title"> Tabela de Pagamentos</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">

                      <!--LISTAR TODOS OS CLIENTES -->

                      <?php


                        if(isset($_GET['buttonPesquisar']) and $_GET['txtpesquisar'] != ''){
                          $data = $_GET['txtpesquisar'];
                           $query = "select * from pagamentos where data = '$data'  order by id asc"; 
                        }else{
                         $query = "select * from pagamentos where data = curDate()  order by id asc"; 
                        }

                        

                        $result = mysqli_query($conexao, $query);
                        //$dado = mysqli_fetch_array($result);
                        $row = mysqli_num_rows($result);

                       if($row == '' or $row == 0){

                            echo "<h3> Não existem dados cadastrados no banco </h3>";

                        }else{

                           ?>

                          

                      <table class="table">
                        <thead class=" text-primary">
                          
                          <th>
                            Valor
                          </th>
                          <th>
                            Funcionário Pago
                          </th>
                          <th>
                            Tesoureiro
                          </th>
                           <th>
                            Data
                          </th>
                           
                            <th>
                            Ações
                          </th>
                        </thead>
                        <tbody>
                         
                         <?php 

                          while($res_1 = mysqli_fetch_array($result)){
                            $valor = $res_1["valor"];
                            $funcionario = $res_1["funcionario"];
                            $tesoureiro = $res_1["tesoureiro"];
                            $data = $res_1["data"];
                           
                            $id = $res_1["id"];

                            $data2 = implode('/', array_reverse(explode('-', $data)));

                            ?>

                            <tr>

                             <td><?php echo $valor; ?></td>
                             <td><?php echo $funcionario; ?></td> 
                             <td><?php echo $tesoureiro; ?></td>
                             <td><?php echo $data2; ?></td>
                           
                             <td>
                            

                             <a class="btn btn-danger" href="pagamentos.php?func=deleta&id=<?php echo $id; ?>"><i class="fa fa-minus-square"></i></a>

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
              
              <h4 class="modal-title">Pagamentos</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
              <form method="POST" action="">
              <div class="form-group">
                <label for="id_produto">Valor</label>
                <input type="text" class="form-control mr-2" name="txtvalor" placeholder="Valor" required>
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
                    <option value="<?php echo $res_1['nome']; ?>"><?php echo $res_1['nome']; ?></option> 
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




         <?php
       if(isset($_GET['buttonPesquisar']) and $_GET['txtpesquisar'] != ''){
                          $data = $_GET['txtpesquisar'];
                           $query = "select sum(valor) as total from pagamentos where data = '$data'  order by id asc"; 
                        }else{
                         $query = "select sum(valor) as total from pagamentos where data = curDate()  order by id asc"; 
                        }

                        

                        $result = mysqli_query($conexao, $query);
                        //$dado = mysqli_fetch_array($result);
                        $row = mysqli_num_rows($result); 

                         while($res_1 = mysqli_fetch_array($result)){
                            $total = $res_1["total"];

                        ?>


         <div class="row mt-3">
        <div class="col-md-12">
         <p align="right">Total: R$ 
          <?php
          if($total == '') {
            echo 0;
          }else{
            echo $total;
          }

        }
          
           ?>
            
          </p>
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
  $valor = $_POST['txtvalor'];
  $funcionario = $_POST['funcionario'];
  $tesoureiro = $_SESSION['nome_usuario'];


$query = "INSERT into pagamentos (valor, funcionario, tesoureiro, data) VALUES ('$valor',  '$funcionario', '$tesoureiro', curDate() )";

$result = mysqli_query($conexao, $query);


//RECUPERAR O ULTIMO ID LANÇADO
$query_id = "select * from pagamentos order by id desc limit 1";
$result_id = mysqli_query($conexao, $query_id);
while($res_id = mysqli_fetch_array($result_id)){
  $id_ultimo = $res_id['id'];
  }

//INSERIR OS DADOS NA TABELA DE MOVIMENTAÇÕES
$query_mov = "INSERT into movimentacoes (tipo, movimento, valor, funcionario, data, id_movimento) VALUES ('Saída', 'Pagamento', '$valor', '$tesoureiro',  curDate(), '$id_ultimo' )";
mysqli_query($conexao, $query_mov);


if($result == ''){
  echo "<script language='javascript'> window.alert('Ocorreu um erro ao Cadastrar!'); </script>";
}else{
    echo "<script language='javascript'> window.alert('Salvo com Sucesso!'); </script>";
    echo "<script language='javascript'> window.location='pagamentos.php'; </script>";
}

}
?>


<!--EXCLUIR -->
<?php
if(@$_GET['func'] == 'deleta'){
  $id = $_GET['id'];
  $query = "DELETE FROM pagamentos where id = '$id'";
  mysqli_query($conexao, $query);

  $query = "DELETE FROM movimentacoes where movimento = 'Pagamento' and id_movimento = '$id'";
  mysqli_query($conexao, $query);

  echo "<script language='javascript'> window.location='pagamentos.php'; </script>";
}
?>




   
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