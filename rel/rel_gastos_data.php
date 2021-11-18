<?php 
$dataInicial = $_GET['dataInicial'];
$dataFinal = $_GET['dataFinal'];


$dataIni = implode('/', array_reverse(explode('-', $dataInicial)));
$dataFin = implode('/', array_reverse(explode('-', $dataFinal)));

include('../conexao.php');



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
				   <big><big> RELATÓRIO DE GASTOS  </big> </big> 
				</div>
				<div class="col-sm-6">	
				<small></small>
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

		$total_gastos = 0;
		$quant = 0;
		

		 
                          
                           $query = "select * from gastos where data >= '$dataInicial' and data <= '$dataFinal' order by data asc";
                      
                           

                        $result = mysqli_query($conexao, $query);
                        //$dado = mysqli_fetch_array($result);
                        $row = mysqli_num_rows($result);

                        if($row == ''){

                            echo "<h3> Não existem dados cadastrados no banco </h3>";

                        }else{

                           ?>


		<table class="table">
			<tr bgcolor="#f9f9f9">
				<td style="font-size:12px"> <b>Motivo</b> </td>
				<td style="font-size:12px"> <b>Valor</b> </td>
				<td style="font-size:12px"> <b> Funcionário</b> </td>
				<td style="font-size:12px"> <b> Data </b> </td>
				
				
				
			</tr>
			

				 <?php 
				  			
				  			

                          while($res_1 = mysqli_fetch_array($result)){
                            $motivo = $res_1["motivo"];
                            $valor = $res_1["valor"];
                            $funcionario = $res_1["funcionario"];
                            $data = $res_1["data"];
                           
                          


                           


                            $data2 = implode('/', array_reverse(explode('-', $data)));
							

                           
                            $total_gastos = $total_gastos + $valor;
                            $quant = $quant + 1;

                           
                         	 $total_gastosF = number_format($total_gastos, 2, ',', '.'); 
                         	
                         
                         
                            ?>

                <tr>
				<td style="font-size:12px"> <?php echo $motivo; ?> </td>
				<td style="font-size:12px"> R$<?php echo $valor; ?> </td>
				<td style="font-size:12px"> <?php echo $funcionario; ?> </td>
				<td style="font-size:12px"> <?php echo $data2; ?> </td>
				
				
				
				</tr>

			<?php }  ?>
		</table>

	<?php } ?>


		<hr>
		

		<hr>

		
			<div class="row">
				<div class="col-sm-8">	
				 <small><b> Quantidade de Gastos:</b> <?php echo $quant; ?> </small>
				</div>
				<div class="col-sm-4">	
				 <small><b> Valor Total:</b> R$<?php echo $total_gastosF; ?> </small>
				</div>
				
			</div>

		
		

			
			

	
</div>


<div class="footer">
 <p style="font-size:12px" align="center"><?php echo $texto_rodape ?></p> 
</div>


