<?php
include('conexao.php');
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>GEMIC - Despesas</title>
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

<div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
<ul class="navbar-nav mr-auto">

<a href="movimentacoes_admin.php"> <strong>Movimentações</strong></a> &nbsp;|&nbsp;
<a href="receitas_admin.php"> <strong>Receitas</strong></a> &nbsp;|&nbsp;
<a href="despesas_admin.php"> <strong>Despesas</strong></a> &nbsp;|&nbsp;
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
                    <h4 class="card-title"> Tabela de Gastos</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">

                      <!--LISTAR TODOS OS CLIENTES -->

                      <?php


                        if(isset($_GET['buttonPesquisar']) and $_GET['txtpesquisar'] != ''){
                          $data = $_GET['txtpesquisar'];
                           $query = "select * from gastos where data = '$data'  order by id asc"; 
                        }else{
                         $query = "select * from gastos where data = curDate()  order by id asc"; 
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
                            Motivo
                          </th>
                          <th>
                            Funcionário
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
                            $motivo = $res_1["motivo"];
                            $funcionario = $res_1["funcionario"];
                            $data = $res_1["data"];
                           
                            $id = $res_1["id"];

                            $data2 = implode('/', array_reverse(explode('-', $data)));

                            $valor = number_format($valor, 2, ',', '.');

                            ?>

                            <tr>

                             <td>R$ <?php echo $valor; ?></td>
                             <td><?php echo $motivo; ?></td> 
                             <td><?php echo $funcionario; ?></td>
                             <td><?php echo $data2; ?></td>
                           
                             <td>
                             <a class="btn btn-info" href="despesas.php?func=edita&id=<?php echo $id; ?>"><i class="fa fa-pencil-square-o"></i></a>

                             <a class="btn btn-danger" href="despesas.php?func=deleta&id=<?php echo $id; ?>"><i class="fa fa-minus-square"></i></a>

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

<!--   Core JS Files   -->
<script src="assets/js/core/jquery.min.js"></script>
  <script src="assets/js/core/popper.min.js"></script>
  <script src="assets/js/core/bootstrap.min.js"></script>
  <script src="assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="assets/js/paper-dashboard.min.js?v=2.0.0" type="text/javascript"></script>
  <!-- Paper Dashboard DEMO methods, don't include it in your project! -->
  <script src="assets/demo/demo.js"></script>
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
      demo.initChartsPages();
    });
  </script>


  <!-- MODAIS -->
  <div id="modalExemplo" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
         <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              
              <h4 class="modal-title">Relatório de Orçamentos</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <div class="modal-body">
              <form method="POST" action="rel/rel_orcamentos_data_class.php" target="_blank">

            <div class="row">
                  <div class="col-md-4">
                    <label>Status</label>
                 </div>
                <div class="col-md-4">
                  <label>Data Inicial</label>
                </div>
                 <div class="col-md-4">
                  <label>Data Final</label>
                </div>
               

            </div>

                <div class="row">
                  <div class="col-md-4 mt-2">
                    <select class="form-control" id="category" name="status">
                     <option value="Todos">Todos</option> 
                     <option value="Aberto">Aberto</option> 
                     <option value="Aguardando">Aguardando</option> 
                     <option value="Aprovado">Aprovado</option> 
                     <option value="Cancelado">Cancelado</option> 
                   
                   </select>
                 </div>
                <div class="col-md-4">
                  <input name="txtdataInicial" class="form-control mt-3" type="date" placeholder="Pesquisar" aria-label="Pesquisar" value="<?php echo date('Y-m-d') ?>">
                </div>
                <div class="col-md-4">
                  <input name="txtdataFinal" class="form-control mt-3 " type="date" placeholder="Pesquisar" aria-label="Pesquisar" value="<?php echo date('Y-m-d') ?>">
                </div>
               

            </div>
          </div>
                   
            <div class="modal-footer">
               <button type="submit" class="btn btn-info mb-3" name="buttonPesquisar">Gerar Relatório</button>

            </form>
            </div>
          </div>
        </div>
      </div>    





 <!-- Modal OS -->
      <div id="modalOS" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
         <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              
              <h4 class="modal-title">Relatório de Ordem de Serviços</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <div class="modal-body">
              <form method="POST" action="rel/rel_os_data_class.php" target="_blank">

            <div class="row">
                  <div class="col-md-4">
                    <label>Status</label>
                 </div>
                <div class="col-md-4">
                  <label>Data Inicial</label>
                </div>
                 <div class="col-md-4">
                  <label>Data Final</label>
                </div>
               

            </div>

                <div class="row">
                  <div class="col-md-4 mt-2">
                    <select class="form-control" id="category" name="status">
                     <option value="Todos">Todos</option> 
                     <option value="Aberta">Aberta</option> 
                     <option value="Fechada">Fechada</option> 
                     <option value="Cancelada">Cancelada</option> 
                     
                   
                   </select>
                 </div>
                <div class="col-md-4">
                  <input name="txtdataInicial" class="form-control mt-3" type="date" placeholder="Pesquisar" aria-label="Pesquisar" value="<?php echo date('Y-m-d') ?>">
                </div>
                <div class="col-md-4">
                  <input name="txtdataFinal" class="form-control mt-3 " type="date" placeholder="Pesquisar" aria-label="Pesquisar" value="<?php echo date('Y-m-d') ?>">
                </div>
               

            </div>
          </div>
                   
            <div class="modal-footer">
               <button type="submit" class="btn btn-info mb-3" name="buttonPesquisar">Gerar Relatório</button>
            </form>
            </div>
          </div>
        </div>
      </div>    









 <!-- Modal REL GASTOS -->
      <div id="modalRelGastos" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
         <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              
              <h4 class="modal-title">Relatório de Gastos</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <div class="modal-body">
              <form method="POST" action="rel/rel_gastos_data_class.php" target="_blank">

            <div class="row">
                 
                <div class="col-md-6">
                  <label>Data Inicial</label>
                </div>
                 <div class="col-md-6">
                  <label>Data Final</label>
                </div>
               

            </div>

                <div class="row">
                  
                <div class="col-md-6">
                  <input name="txtdataInicial" class="form-control mt-3" type="date" placeholder="Pesquisar" aria-label="Pesquisar" value="<?php echo date('Y-m-d') ?>">
                </div>
                <div class="col-md-6">
                  <input name="txtdataFinal" class="form-control mt-3 " type="date" placeholder="Pesquisar" aria-label="Pesquisar" value="<?php echo date('Y-m-d') ?>">
                </div>
               

            </div>
          </div>
                   
            <div class="modal-footer">
               <button type="submit" class="btn btn-info mb-3" name="buttonPesquisar">Gerar Relatório</button>
            </form>
            </div>
          </div>
        </div>
      </div>    






 <!-- Modal MOVIMENTACOES -->
      <div id="modalRelMov" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
         <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              
              <h4 class="modal-title">Relatório de Movimentações</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <div class="modal-body">
              <form method="POST" action="rel/rel_mov_data_class.php" target="_blank">

            <div class="row">
                  <div class="col-md-4">
                    <label>Tipo</label>
                 </div>
                <div class="col-md-4">
                  <label>Data Inicial</label>
                </div>
                 <div class="col-md-4">
                  <label>Data Final</label>
                </div>
               

            </div>

                <div class="row">
                  <div class="col-md-4 mt-2">
                    <select class="form-control" id="category" name="tipo">
                     <option value="Todas">Todas</option> 
                     <option value="Entrada">Entradas</option> 
                     <option value="Saída">Saídas</option> 
                     
                     
                   
                   </select>
                 </div>
                <div class="col-md-4">
                  <input name="txtdataInicial" class="form-control mt-3" type="date" placeholder="Pesquisar" aria-label="Pesquisar" value="<?php echo date('Y-m-d') ?>">
                </div>
                <div class="col-md-4">
                  <input name="txtdataFinal" class="form-control mt-3 " type="date" placeholder="Pesquisar" aria-label="Pesquisar" value="<?php echo date('Y-m-d') ?>">
                </div>
               

            </div>
          </div>
                   
            <div class="modal-footer">
               <button type="submit" class="btn btn-info mb-3" name="buttonPesquisar">Gerar Relatório</button>
            </form>
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
              
              <h4 class="modal-title">Gastos</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
              <form method="POST" action="">
              <div class="form-group">
                <label for="id_produto">Valor</label>
                <input type="text" class="form-control mr-2" name="txtvalor" placeholder="Valor" required>
              </div>
               <div class="form-group">
                <label for="fornecedor">Motivo</label>
                 <input type="text" class="form-control mr-2" name="txtmotivo"  placeholder="Motivo" required>
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
                           $query = "select SUM(valor) as total from gastos where data = '$data'  order by id asc"; 
                        }else{
                         $query = "select SUM(valor) as total from gastos where data = curDate()  order by id asc"; 
                        }

                        

                        $result = mysqli_query($conexao, $query);
                        //$dado = mysqli_fetch_array($result);
                        $row = mysqli_num_rows($result);

                         while($res_1 = mysqli_fetch_array($result)){
                          $total = $res_1['total'];

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
          
           ?>
            
          </p>
        </div>
      </div>  

<?php } ?>

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
  $valor = str_replace(',', '.', $valor);
  $motivo = $_POST['txtmotivo'];
  $funcionario = $_SESSION['nome_usuario'];


$query = "INSERT into gastos (valor, motivo, funcionario, data) VALUES ('$valor', '$motivo', '$funcionario',  curDate() )";

$result = mysqli_query($conexao, $query);


//RECUPERAR O ULTIMO ID LANÇADO
$query_id = "select * from gastos order by id desc limit 1";
$result_id = mysqli_query($conexao, $query_id);
while($res_id = mysqli_fetch_array($result_id)){
  $id_gasto = $res_id['id'];
  }

//INSERIR OS DADOS NA TABELA DE MOVIMENTAÇÕES
$query_mov = "INSERT into movimentacoes (tipo, movimento, valor, funcionario, data, id_movimento) VALUES ('Saída', 'Gasto', '$valor', '$funcionario',  curDate(), '$id_gasto' )";
mysqli_query($conexao, $query_mov);


if($result == ''){
  echo "<script language='javascript'> window.alert('Ocorreu um erro ao Cadastrar!'); </script>";
}else{
    echo "<script language='javascript'> window.alert('Salvo com Sucesso!'); </script>";
    echo "<script language='javascript'> window.location='despesas.php'; </script>";
}

}
?>


<!--EXCLUIR -->
<?php
if(@$_GET['func'] == 'deleta'){
  $id = $_GET['id'];
  $query = "DELETE FROM gastos where id = '$id'";
  mysqli_query($conexao, $query);

  $query = "DELETE FROM movimentacoes where movimento = 'Gasto' and id_movimento = '$id'";
  mysqli_query($conexao, $query);

  echo "<script language='javascript'> window.location='despesas.php'; </script>";
}
?>



<!--EDITAR -->
<?php
if(@$_GET['func'] == 'edita'){  
$id = $_GET['id'];
$query = "select * from gastos where id = '$id'";
$result = mysqli_query($conexao, $query);

 while($res_1 = mysqli_fetch_array($result)){


?>

  <!-- Modal -->
      <div id="modalEditar" class="modal fade" role="dialog">
        <div class="modal-dialog">
         <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              
              <h4 class="modal-title">Gastos</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
              <form method="POST" action="">
              <div class="form-group">
                <label for="id_produto">Motivo</label>
                <input type="text" class="form-control mr-2" name="txtmotivo" placeholder="Nome" value="<?php echo $res_1['motivo']; ?>" required>
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
  $motivo = $_POST['txtmotivo'];
 


  
 


$query_editar = "UPDATE gastos set motivo = '$motivo' where id = '$id' ";

$result_editar = mysqli_query($conexao, $query_editar);

if($result_editar == ''){
  echo "<script language='javascript'> window.alert('Ocorreu um erro ao Editar!'); </script>";
}else{
    echo "<script language='javascript'> window.alert('Editado com Sucesso!'); </script>";
    echo "<script language='javascript'> window.location='despesas.php'; </script>";
}

}
?>


<?php } }  ?>



   