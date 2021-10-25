<?php
session_start();
include('conexao.php');

?>

<!DOCTYPE html>
<html>
<head>
<title>GEMIC - Serviços</title>


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
    <a class="navbar-brand" href="dashboard_admin.php"><big><big><i class="fa fa-arrow-left"></i></big></big></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
      <span class="navbar-toggler-icon"></span>
    </button>

      <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
        <ul class="navbar-nav mr-auto">

        <a href="listar_orcamentos_admin.php"> <strong>Orçamentos</strong></a> &nbsp;|&nbsp;
        <a href="listar_os_admin.php"> <strong>Ordem de Serviço</strong></a>

        </ul>
        <form class="form-inline my-2 my-lg-0 mr-5">
          <input name="txtpesquisarcpf" id="txtcpf" class="form-control mr-sm-2" type="search" placeholder="Buscar pelo CPF" aria-label="Pesquisar">
          <button name="buttonPesquisarCPF" class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fa fa-search"></i></button>
        </form>

        <form class="form-inline my-2 my-lg-0">
          <input name="txtpesquisar" class="form-control mr-sm-2" type="search" placeholder="Buscar pelo Nome" aria-label="Pesquisar">
          <button name="buttonPesquisar" class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fa fa-search"></i></button>
        </form>
      </div>
    </nav>

      <!-- RESUMO ORÇAMENTOS -->
        <div class="row">
          <div class="col-md-6">
              <p class="mt-5">ORÇAMENTOS ABERTOS</p>
        <hr >

        <div class="row">

          <?php 

           $query = "select * from orcamentos where status = 'Aberto'  order by id asc limit 2";

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

           $query = "select * from os where status = 'Aberta'  order by id asc limit 2";

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








 <!-- Modal -->
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



    <!-- Área - Rodapé -->
      <div id="rodape">
          Todos os direitos reservados.
      </div>
    </div>

    
</body>
</html>