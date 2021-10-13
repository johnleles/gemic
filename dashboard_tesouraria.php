<?php 

session_start();
include('verificar_login.php');

include('conexao.php');

?>

<!DOCTYPE html>
<html lang="en">

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
            <a href="dashboard.php"> <strong>Dashboard</strong></a>
            <a href="movimentacoes.php"> <strong>Movimentações</strong></a>
            <a href="gastos.php"> <strong>Gastos</strong></a>
            <a href="vendas.php"> <strong>Vendas</strong></a>
            <a href="pagamentos.php"> <strong>Pagamentos</strong></a>
            <a href="compras.php"> <strong>Compras</strong></a>
            <a href="suporte.php"> <strong>Suporte</strong></a>
            <a href="logout.php"> <strong>Sair</strong></a>
        </div>
    </div>
    <!-- Cabeçalho - Fim -->


    <nav class="navbar navbar-expand-lg navbar-light bg-light">

      <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
        <ul class="navbar-nav mr-auto">

        <a href="#" data-toggle="modal" data-target="#modalExemplo">
            <i class="nc-icon nc-diamond"></i>
            <p>Relatório Orçamentos</p>
        </a> ||
        <a href="#" data-toggle="modal" data-target="#modalOS">
            <i class="nc-icon nc-pin-3"></i>
            <p>Relatório de OS</p>
        </a> ||
        <a href="#" data-toggle="modal" data-target="#modalRelMov">
            <i class="nc-icon nc-bell-55"></i>
            <p>Relatório de Movimentações</p>
        </a> ||
        <a href="#" data-toggle="modal" data-target="#modalRelGastos">
            <i class="nc-icon nc-caps-small"></i>
            <p>Relatório de Gastos</p>
        </a>
          
        </ul>

      </div>
    </nav>

    <br> <br>

      <div class="content">
        <div class="row">
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-email-85 text-warning"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <h3 class="card-category">Serviços</h3>
                      <?php

                          //TOTALIZAR OS SERVIÇOS
                          $total_serv = 0;
                          $query_servicos = "select sum(valor) as total from movimentacoes where data = curDate() and movimento = 'Serviço' order by id asc"; 
                          $result_servicos = mysqli_query($conexao, $query_servicos);
                          
                           while($res_serv = mysqli_fetch_array($result_servicos)){
                            $total_serv = number_format($res_serv['total'], 2, ',', '.');
                            ?>
                              <p class="card-title"><small>R$ <?php echo $total_serv; 
                              
                              ?></small>

                               <?php
                            }

                          ?>
                      
                        <p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  <?php 
                  $query_servicos = "select * from movimentacoes where data = curDate() and movimento = 'Serviço' order by id asc"; 
                          $result_servicos = mysqli_query($conexao, $query_servicos);
                  $numero_servicos = mysqli_num_rows($result_servicos);
                  
                  ?>
                  <i class="fa fa-refresh"></i> Total de Serviços: <?php echo $numero_servicos; ?></a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-money-coins text-success"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <h3 class="card-category">Vendas</h3>

                      <?php

                          //TOTALIZAR DAS VENDAS
                           $total_vendas = 0;
                          $query_vendas = "select sum(valor) as total from vendas where data = curDate() and status = 'Efetuada' order by id asc"; 
                          $result_vendas = mysqli_query($conexao, $query_vendas);
                          
                          
                           while($res_vendas = mysqli_fetch_array($result_vendas)){
                             $total_vendas = number_format($res_vendas['total'], 2, ',', '.');
                            ?>
                              <p class="card-title"><small>R$ <?php echo $total_vendas; 
                              
                              ?></small>

                               <?php
                            }

                          ?>

                     
                        <p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                   <?php 
                  $query_vendas = "select * from vendas where data = curDate() and status = 'Efetuada' order by id asc"; 
                          $result_vendas = mysqli_query($conexao, $query_vendas);
                  $numero_vendas = mysqli_num_rows($result_vendas);
                  
                  ?>
                  <i class="fa fa-refresh"></i> Total de Vendas: <?php echo $numero_vendas; ?></a>
                 
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-money-coins text-danger"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <h3 class="card-category">Gastos</h3>
                       <?php

                          //TOTALIZAR OS GASTOS
                          $total_gastos = 0;
                          $query_gastos = "select sum(valor) as total from gastos where data = curDate() order by id asc"; 
                          $result_gastos = mysqli_query($conexao, $query_gastos);
                          
                           while($res_gastos = mysqli_fetch_array($result_gastos)){
                             $total_gastos = number_format($res_gastos['total'], 2, ',', '.');
                            ?>
                              <p class="card-title"><small>R$ <?php echo $total_gastos; 
                              
                              ?></small>

                               <?php
                            }

                          ?>
                        <p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                   <?php 
                  $query_gastos = "select * from gastos where data = curDate() order by id asc"; 
                          $result_gastos = mysqli_query($conexao, $query_gastos);
                  $numero_gastos = mysqli_num_rows($result_gastos);
                  
                  ?>
                  <i class="fa fa-refresh"></i> Total de Gastos: <?php echo $numero_gastos; ?></a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-bank text-primary"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <h3 class="card-category">Saldo Diário</h3>
                       <?php

                          //TOTALIZAR OS GASTOS

                          $query_entradas = "select sum(valor) as total_entradas from movimentacoes where data = curDate() and tipo = 'Entrada' order by id asc"; 
                          $result_entradas = mysqli_query($conexao, $query_entradas);
                          
                           while($res_entradas = mysqli_fetch_array($result_entradas)){


                            //totalizar as saidas
                            $query_saidas = "select sum(valor) as total_saidas from movimentacoes where data = curDate() and tipo = 'Saída' order by id asc"; 
                          $result_saidas = mysqli_query($conexao, $query_saidas);
                          
                           while($res_saidas = mysqli_fetch_array($result_saidas)){

                            ?>
                              <p class="card-title"><small>

                                <?php
                                $total_mov = 0;
                               $total = $res_entradas['total_entradas'] - $res_saidas['total_saidas']; 
                                $total_mov = number_format($total, 2, ',', '.'); 
                              if ($total >= 0){
                               echo '<font color="green"> R$ '  .$total_mov. ' </font>';
                              } else{
                               echo '<font color="red">  R$ '  .$total_mov. ' </font>';
                              } 

                              
                              ?></small>

                               <?php
                            } }

                          ?>
                        <p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                   <?php 
                  $query_mov = "select * from movimentacoes where data = curDate() order by id asc"; 
                          $result_mov = mysqli_query($conexao, $query_mov);
                  $numero_mov = mysqli_num_rows($result_mov);
                  
                  ?>
                  <i class="fa fa-refresh"></i> Total Movimentações: <?php echo $numero_mov; ?></a>
                </div>
              </div>
            </div>
          </div>
        </div>


<p class="mt-5">ÚLTIMAS MOVIMENTAÇÕES</p>
        <hr >

        <div class="row">

          <?php 

           $query = "select * from movimentacoes where data >= curDate()  order by id desc limit 4";

            $result = mysqli_query($conexao, $query);
                        //$dado = mysqli_fetch_array($result);
                        $row = mysqli_num_rows($result);

                         if($row == ''){

                            echo "<h5> Não existem movimentações Hoje!! </h5>";

                        }else{

                            while($res_1 = mysqli_fetch_array($result)){
                            $tipo = $res_1["tipo"];
                            $movimento = $res_1["movimento"];
                            $valor = $res_1["valor"];
                            $funcionario = $res_1["funcionario"];

                            


           ?>

           <?php 

           if($tipo == 'Entrada'){

            ?>
             <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                <div class="card-header" style="font-size: 16px"><?php echo $movimento ?></div>
                <div class="card-body">
                  <h5 class="card-title">R$ <?php echo $valor ?></h5>
                  <p class="card-text"><?php echo $funcionario ?></p>
                </div>
              </div>
          </div>
            <?php
           }else{

             ?>
              <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                <div class="card-header" style="font-size: 16px"><?php echo $movimento ?></div>
                <div class="card-body">
                  <h5 class="card-title">R$ <?php echo $valor ?></h5>
                  <p class="card-text"><?php echo $funcionario ?></p>
                </div>
              </div>
          </div>
            <?php

           } }

            ?>

         

        <?php } ?>

        


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

    <!-- Área - Rodapé -->
    <div id="rodape">
        Todos os direitos reservados.
    </div>
</body>

</html>