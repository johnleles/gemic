<?php
session_start();
include('verificar_login.php');
include('conexao.php');
$status = 10;
?>

<!DOCTYPE html>
<html>
<head>
  <title>GEMIC - Movimentações</title>
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
            <a href="dashboard_auxiliar.php"> <strong>Dashboard</strong></a>
            <a href="clientes.php"> <strong>Clientes</strong></a>
            <a href="servicos.php"> <strong>Serviços</strong></a>
            <a href="estoque.php"> <strong>Estoque</strong></a>
            <a href="suporte.php"> <strong>Suporte</strong></a>
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
           
          
        </div>


          <div class="content">
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <h4 class="card-title"> Movimentações</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">

                      <!--LISTAR TODOS OS ORÇAMENTOS -->

                      <?php


                        if(isset($_GET['buttonPesquisar'])){

                            $dataInicial = $_GET['dataInicial'];
                            $dataFinal = $_GET['dataFinal'];
                             $status = $_GET['status'];

                            if ($dataInicial == ''){
                              $dataInicial = Date('Y-m-d');
                            }

                            if ($dataFinal == ''){
                              $dataFinal = Date('Y-m-d');
                            }

                            if($status != 'Todos'){
                            
                             $query = "select * from movimentacoes where (data >= '$dataInicial' and data <= '$dataFinal') and tipo = '$status' order by data asc";

                            }else{
                               $query = "select * from movimentacoes where data >= '$dataInicial' and data <= '$dataFinal' order by data asc";
                            }
                          
                                                

                        }else{
                         $query = "select * from movimentacoes where data = curDate() order by id asc"; 
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
                            Tipo
                          </th>
                          <th>
                            Movimento
                          </th>
                          <th>
                            Valor
                          </th>
                           <th>
                            Funcionário
                          </th>
                            <th>
                            Data 
                          </th>
                          
                           
                        </thead>
                        <tbody>
                         
                         <?php 

                          while($res_1 = mysqli_fetch_array($result)){
                            $tipo = $res_1["tipo"];
                            $movimento = $res_1["movimento"];
                            $valor = $res_1["valor"];
                            $funcionario = $res_1["funcionario"];
                            $data = $res_1["data"];
                           
                            $id = $res_1["id"];

                             $data2 = implode('/', array_reverse(explode('-', $data)));
                             
                           
                            $id = $res_1["id"];

                             $valor = number_format($valor, 2, ',', '.');


                           

                            
                         
                            ?>

                            <tr>

                             

                              <?php
                              if($tipo == 'Entrada'){
                              ?>
                              <td><font color="green"><?php echo $tipo; ?></font></td>
                              <?php 
                              }else{
                                ?>
                              <td><font color="red"><?php echo $tipo; ?></font></td>

                               <?php 
                                }  ?>

                           
                             <td><?php echo $movimento; ?></td>

                              <?php
                              if($tipo == 'Entrada'){
                              ?>
                              <td><font color="green">R$ <?php echo $valor; ?></font></td>
                              <?php 
                              }else{
                                ?>
                              <td><font color="red">R$ <?php echo $valor; ?></font></td>

                               <?php 
                                }  ?>
                              

                             <td><?php echo $funcionario; ?></td> 
                            
                             <td><?php echo $data2; ?></td>
                          
                             
                           
                            
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


            <?php
                        //TOTALIZAR OS VALORES DE ENTRADAS

                        if(isset($_GET['buttonPesquisar'])){

                            $dataInicial = $_GET['dataInicial'];
                            $dataFinal = $_GET['dataFinal'];
                             $status = $_GET['status'];

                            if ($dataInicial == ''){
                              $dataInicial = Date('Y-m-d');
                            }

                            if ($dataFinal == ''){
                              $dataFinal = Date('Y-m-d');
                            }

                            
                            
                             $query_entradas = "select SUM(valor) as total from movimentacoes where (data >= '$dataInicial' and data <= '$dataFinal') and tipo = 'Entrada' order by data asc";

                             $query_saidas = "select SUM(valor) as total from movimentacoes where (data >= '$dataInicial' and data <= '$dataFinal') and tipo = 'Saída' order by data asc";
                            
                          
                                                

                        }else{
                         $query_entradas = "select SUM(valor) as total from movimentacoes where data = curDate() and tipo = 'Entrada' order by id asc";

                         $query_saidas = "select SUM(valor) as total from movimentacoes where data = curDate() and tipo = 'Saída' order by id asc"; 
                        }

                        

                       $result_entradas = mysqli_query($conexao, $query_entradas);

                       $result_saidas = mysqli_query($conexao, $query_saidas);

                        
                           while($res_1 = mysqli_fetch_array($result_entradas)){
                            $total_entradas = $res_1["total"];


                             while($res_2 = mysqli_fetch_array($result_saidas)){
                            $total_saidas = $res_2["total"];

                             $total_entradasF = number_format($total_entradas, 2, ',', '.');
                              $total_saidasF = number_format($total_saidas, 2, ',', '.');

                        

                           ?>


             <div class="row mt-3">
              
                <div class="col-md-6">
                  <font size="3">Total Entradas : <font color="green"> R$ 
                    <?php
                    if($total_entradas == '' || $status == 'Saída'){
                      echo 0; 
                    }else{
                    echo $total_entradasF;
                    }  
                    ?></font> 
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  Total Saídas : <font color="red"> R$  
                   <?php
                    if($total_saidas == '' || $status == 'Entrada'){
                      echo 0; 
                    }else{
                    echo $total_saidasF;
                    }  
                    ?> 
                   </font>
                 </font>
                 
                
                </div>

                 <div class="col-md-6">
                 
                  <p align="right">  <font size="3">Saldo Total :
                    <?php

                    if($status == 'Entrada'){
                      $total_saidas = 0;
                    }


                    if($status == 'Saída'){
                      $total_entradas = 0;
                    }

                    $total = $total_entradas - $total_saidas;  
                     $totalF = number_format($total, 2, ',', '.');
                    if ($total >= 0){
                     echo '<font color="green"> R$ '  .$totalF. ' </font>';
                    } else{
                     echo '<font color="red">  R$ '  .$totalF. ' </font>';
                    }
                    ?>
                  </font> </p>
                
                </div>
             
              </div>


              <?php } } ?>

    <!-- Área - Rodapé -->
    <div id="rodape">
        Todos os direitos reservados.
    </div>


</body>
</html>


