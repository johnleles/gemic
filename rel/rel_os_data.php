<?php 
$dataInicial = $_GET['dataInicial'];
$dataFinal = $_GET['dataFinal'];
$status = $_GET['status'];

$dataIni = implode('/', array_reverse(explode('-', $dataInicial)));
$dataFin = implode('/', array_reverse(explode('-', $dataFinal)));

include('../conexao.php');

//$query = "";
//$result = mysqli_query($conexao, $query);

// while($res_1 = mysqli_fetch_array($result)){

//$data2 = implode('/', array_reverse(explode('-', $res_1['data_geracao'])));



 ?>


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<style>

 @page {
            margin: 0px;

        }

        body{
        	font-family:Times, "Times New Roman", Georgia, serif;
        }

.footer {
    position:absolute;
    bottom:0;
    width:100%;
    background-color: #ebebeb;
    padding:10px;
}

.cabecalho {    
    background-color: #ebebeb;
    padding-top:15px;
    margin-bottom:15px;
}

.titulo{
	margin:0;
}

.areaTotais{
	border : 0.5px solid #bcbcbc;
	padding: 15px;
	border-radius: 5px;
	margin-right:25px;
}

.areaTotal{
	border : 0.5px solid #bcbcbc;
	padding: 15px;
	border-radius: 5px;
	margin-right:25px;
	background-color: #f9f9f9;
	margin-top:2px;
}

.pgto{
	margin:1px;
}



</style>


<div class="cabecalho">
	
	<div class="row">
			<div class="col-sm-4" style="margin-left:8px">	
				<img src="<?php echo $url ?>imagens/gemic_logo.jpeg" width="250px">
			</div>
			<div class="col-sm-6" align="right">	
			 <span class="titulo"><b><big><?php echo mb_strtoupper($nome_empresa) ?></big></b></span><br>
			 <span class="titulo"><small><?php echo $endereco_empresa ?></small></span>
			</div>
		</div>

</div>

<div class="container">

		
			<div class="row">
				<div class="col-sm-6">	
				   <big><big> RELATÓRIO DE ORDEM DE SERVIÇOS  </big> </big> 
				</div>
				<div class="col-sm-6">	
				<small><?php 
					if($status == 'Todos'){
						echo 'Todas as Ordens de Serviços';
					}else{
						echo 'OS com Status de: '.$status;
					}
				 ?></small>
				</div>
				
			</div>

			<div class="row">
				<div class="col-sm-6">	
				 
				</div>
				<div class="col-sm-6">	
				<small><b> Data Inicial:</b> <?php echo $dataIni; ?> <b> Data Final:</b> <?php echo $dataFin; ?> </small>
				</div>
				
			</div>
		
		<hr>

			

						
		<br><br>

		<?php

		$total_os = 0;
		$quant = 0;
		$quant_aberta = 0;
		$quant_fechada = 0;
		$quant_cancelada = 0;

		 if($status != 'Todos'){
                          
                           $query = "select * from os where (data_abertura >= '$dataInicial' and data_abertura <= '$dataFinal') and status = '$status' order by data_abertura asc";
                       }
                       else{
                       	$query = "select * from os where data_abertura >= '$dataInicial' and data_abertura <= '$dataFinal'  order by data_abertura asc";
                       }

                           

                        $result = mysqli_query($conexao, $query);
                        //$dado = mysqli_fetch_array($result);
                        $row = mysqli_num_rows($result);

                        if($row == ''){

                            echo "<h3> Não existem dados cadastrados no banco </h3>";

                        }else{

                           ?>


		<table class="table">
			<tr bgcolor="#f9f9f9">
				<td style="font-size:12px"> <b>Técnico</b> </td>
				<td style="font-size:12px"> <b>Valor Total</b> </td>
				<td style="font-size:12px"> <b> Data Abertura</b> </td>
				<td style="font-size:12px"> <b> Data Fechamento</b> </td>
				
				<td style="font-size:12px"> <b> Status</b> </td>
				
			</tr>
			

				 <?php 
				  			
				  			

                          while($res_1 = mysqli_fetch_array($result)){
                            $tecnico = $res_1["tecnico"];
                            $total = $res_1["total"];
                            $data_abertura = $res_1["data_abertura"];
                            $data_fechamento = $res_1["data_fechamento"];
                           
                            $status_os = $res_1["status"];


                             $query_tecnico = "select * from funcionarios where id = '$tecnico'";
                            $result_tecnico = mysqli_query($conexao, $query_tecnico);
                            while($res_tecnico = mysqli_fetch_array($result_tecnico)){
                              $nome_tecnico = $res_tecnico['nome'];


                            $data_ab = implode('/', array_reverse(explode('-', $data_abertura)));
							$data_fec = implode('/', array_reverse(explode('-', $data_fechamento)));
							

                           
                            $total_os = $total_os + $total;
                            $quant = $quant + 1;

                            if($status_os == 'Aberta'){
                            	$quant_aberta = $quant_aberta + 1;
                            	$cor = 'azul';
                            }

                            if($status_os == 'Fechada'){
                            	$quant_fechada = $quant_fechada + 1;
                            	$cor = 'verde';
                            }
                         
                         	if($status_os == 'Cancelada'){
                            	$quant_cancelada = $quant_cancelada + 1;
                            	$cor = 'vermelho';
                            }
                         
                         	
                          $total_osF = number_format($total_os, 2, ',', '.'); 
                         
                            ?>

                <tr>
                	
				<td style="font-size:12px">
				<img style="margin-top:3px" src="<?php echo $url ?>img/<?php echo $cor ?>.jpg" width="10px">
				 <?php echo $nome_tecnico; ?> </td>
				<td style="font-size:12px"> R$<?php echo $total; ?> </td>
				<td style="font-size:12px"> <?php echo $data_ab; ?> </td>
				<td style="font-size:12px"> <?php echo $data_fec; ?> </td>
				
				<td style="font-size:12px"> <?php echo $status_os; ?> </td>
				
				</tr>

			<?php } } ?>
		</table>

	<?php } ?>


		<hr>
		

		<hr>

		<?php
		if($status == 'Todos'){

			?>

			<div class="row">
				<div class="col-md-12">	
				 <p style="font-size:12px">
				 	 <b>Ordem de Serviços Abertas:</b>  <?php echo $quant_aberta; ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				 	  <b>Ordem de Serviços Fechadas:</b>  <?php echo $quant_fechada; ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				 	   <b>Ordem de Serviços Canceladas:</b>  <?php echo $quant_cancelada; ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				 	   
				 	

				  </p>
				</div>
				
			</div>

		<?php }else{

			?>

			<div class="row">
				<div class="col-sm-8">	
				 <small><b> Quantidade de Ordens de Serviços:</b> <?php echo $quant; ?> </small>
				</div>
				<div class="col-sm-4">	
				 <small><b> Valor Total:</b> R$<?php echo $total_osF; ?> </small>
				</div>
				
			</div>

			<?php
		}

			?>
		

			
			

	
</div>


<div class="footer">
 <p style="font-size:12px" align="center"><?php echo $texto_rodape ?></p> 
</div>


