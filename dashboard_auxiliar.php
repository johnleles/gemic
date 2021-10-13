<?php 

session_start();
include('verificar_login.php');
include('conexao.php');

$id_usuario = $_SESSION['id_func'];


$ano = date('Y');
$mes = date('m');
$dataInicial = $ano.'-'.$mes.'-01';
$dataFinal = $ano.'-'.$mes.'-31';


//SCRIPT PARA CANCELAR ORÇAMENTOS ABERTOS
$query = "SELECT * from orcamentos where status = 'Aguardando' ";
 $result = mysqli_query($conexao, $query);
 $row = mysqli_num_rows($result);
 if($row > 0){
    while($res_1 = mysqli_fetch_array($result)){
          $data_geracao = $res_1["data_geracao"];
          $id_orc = $res_1["id"];

          $data_venc = date('d/m/Y', strtotime("+$prazo_orcamento_dias days",strtotime($data_geracao)));
          
          $data_hoje = date('Y-m-d');
          if($data_venc < $data_hoje){
            $query_editar = "UPDATE orcamentos set status = 'Cancelado' where id = '$id_orc' ";
          $result_editar = mysqli_query($conexao, $query_editar);
          }

        }
 }

 ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>GEMIC - Dashboard</title>
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
            <a href="rel_orcamentos.php"> <strong>Relatório</strong></a>
            <a href="suporte.php"> <strong>Suporte</strong></a>
            <a href="logout.php"> <strong>Sair</strong></a>
        </div>
    </div>
    <!-- Cabeçalho - Fim -->

    <br> <br>
 
       <div class="content">
        <div class="row">
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-single-copy-04 text-warning"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">Orçamentos</p>

                       <?php 
                  $query = "select * from orcamentos where status = 'Aberto' and tecnico = '$id_usuario' order by id asc"; 
                          $result = mysqli_query($conexao, $query);
                  $numero = mysqli_num_rows($result);
                  
                  ?>

                      <p class="card-title"><?php echo $numero ?>
                        <p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  <i class="fa fa-refresh"></i> Orçamentos Abertos
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
                      <i class="nc-icon nc-bell-55 text-primary"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">Ordens Serviço</p>
                       <?php 
                  $query = "select * from os where status = 'Aberta' and tecnico = '$id_usuario' order by id asc"; 
                          $result = mysqli_query($conexao, $query);
                  $numero = mysqli_num_rows($result);
                  
                  ?>
                      <p class="card-title"><?php echo $numero ?>
                        <p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  <i class="fa fa-calendar-o"></i> OS Abertas
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
                      <i class="nc-icon nc-email-85 text-danger"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">Aprovação</p>

                       <?php 
                  $query = "select * from orcamentos where status = 'Aguardando' and tecnico = '$id_usuario' order by id asc"; 
                          $result = mysqli_query($conexao, $query);
                  $numero = mysqli_num_rows($result);
                  
                  ?>

                      <p class="card-title"><?php echo $numero ?>
                        <p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  <i class="fa fa-clock-o"></i> Orçamentos Aguardando
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
                      <i class="nc-icon nc-check-2 text-success"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">OS Concluídas</p>

                       <?php 
                  $query = "select * from os where status = 'Fechada' and tecnico = '$id_usuario' and (data_fechamento >= '$dataInicial' and data_fechamento <= '$dataFinal') order by id asc"; 
                          $result = mysqli_query($conexao, $query);
                  $numero = mysqli_num_rows($result);
                  
                  ?>

                      <p class="card-title"><?php echo $numero ?>
                        <p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  <i class="fa fa-clock-o"></i> OS do Mês
                </div>
              </div>
            </div>
          </div>
        </div>
        


        <div class="row">
          <div class="col-md-6">
              <p class="mt-5">ORÇAMENTOS ABERTOS</p>
        <hr >

        <div class="row">

          <?php 

           $query = "select * from orcamentos where status = 'Aberto' and tecnico = '$id_usuario' order by id asc limit 2";

            $result = mysqli_query($conexao, $query);
                        //$dado = mysqli_fetch_array($result);
                        $row = mysqli_num_rows($result);

                         if($row == ''){

                            echo "<h5> Não existem Orçamentos Abertos!! </h5>";

                        }else{

                            while($res_1 = mysqli_fetch_array($result)){
                            $data = $res_1["data_abertura"];
                            $tecnico = $res_1["tecnico"];
                            $problema = $res_1["problema"];

                            $data = implode('/', array_reverse(explode('-', $data)));
                           

                            $query_tec = "select * from funcionarios where id = '$tecnico'";

            $result_tec = mysqli_query($conexao, $query_tec);
            while($res_1 = mysqli_fetch_array($result_tec)){
            $nome_tecnico = $res_1['nome'];
           }
                            


           ?>

          
             <div class="col-lg-6 col-md-12 col-sm-12">
              <div class="card text-white bg-secondary mb-3" style="max-width: 18rem;">
                <div class="card-header" style="font-size: 16px"><?php echo $data ?></div>
                <div class="card-body">
                  <h5 class="card-title"><?php echo $nome_tecnico ?></h5>
                  <p class="card-text"><?php echo $problema ?></p>
                </div>
              </div>
          </div>
           
         

        <?php } } ?>

        


        </div>

          </div>
          <div class="col-md-6">
            <p class="mt-5">OS ABERTAS</p>
        <hr >

       <div class="row">

          <?php 

           $query = "select * from os where status = 'Aberta' and tecnico = '$id_usuario' order by id asc limit 2";

            $result = mysqli_query($conexao, $query);
                        //$dado = mysqli_fetch_array($result);
                        $row = mysqli_num_rows($result);

                         if($row == ''){

                            echo "<h5> Não existem OS Abertas!! </h5>";

                        }else{

                            while($res_1 = mysqli_fetch_array($result)){
                            $data = $res_1["data_abertura"];
                            $tecnico = $res_1["tecnico"];
                            $produto = $res_1["produto"];

                            $data = implode('/', array_reverse(explode('-', $data)));
                           

                            $query_tec = "select * from funcionarios where id = '$tecnico'";

            $result_tec = mysqli_query($conexao, $query_tec);
            while($res_1 = mysqli_fetch_array($result_tec)){
            $nome_tecnico = $res_1['nome'];
           }
                            


           ?>

          
             <div class="col-lg-6 col-md-12 col-sm-12">
              <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                <div class="card-header" style="font-size: 16px"><?php echo $data ?></div>
                <div class="card-body">
                  <h5 class="card-title"><?php echo $nome_tecnico ?></h5>
                  <p class="card-text"><?php echo $produto ?></p>
                </div>
              </div>
          </div>
           
         

        <?php } } ?>

        


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

    <!-- Área - Rodapé -->
    <div id="rodape">
        Todos os direitos reservados.
    </div>
</body>

</html>
