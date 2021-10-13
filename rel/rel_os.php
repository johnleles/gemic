<?php 
$id = $_GET['id'];
$id_orc = $_GET['id_orc'];

include('../conexao.php');

$query = "select o.id, o.cliente, o.tecnico, o.produto, o.serie, o.problema, o.laudo, o.valor_servico, o.pecas, o.valor_pecas, o.desconto, o.total, o.valor_total, o.status, o.data_abertura, o.data_geracao, c.nome as cli_nome, c.email, c.telefone, c.endereco, f.nome as func_nome from orcamentos as o INNER JOIN clientes as c on o.cliente = c.cpf INNER JOIN funcionarios as f on o.tecnico = f.id where o.id = '$id_orc'";

$result = mysqli_query($conexao, $query);

 while($res_1 = mysqli_fetch_array($result)){

$data2 = implode('/', array_reverse(explode('-', $res_1['data_geracao'])));


$query_os = "select * from os where id = '$id'";
$result_os = mysqli_query($conexao, $query_os);
 while($res_2 = mysqli_fetch_array($result_os)){

$data3 = implode('/', array_reverse(explode('-', $res_2['data_fechamento'])));
$valor_pecas = number_format($res_1['valor_pecas'], 2, ',', '.'); 
$mao_obra = number_format($res_1['valor_servico'], 2, ',', '.'); 
$total_desconto = number_format($res_1['desconto'], 2, ',', '.'); 
$total_os = number_format($res_2['total'], 2, ',', '.'); 
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
			  <img src="<?php echo $url ?>img/logo2.jpg" width="250px">
			</div>
			<div class="col-sm-6" align="right">	
			 <span class="titulo"><b><big><?php echo mb_strtoupper($nome_empresa) ?></big></b></span><br>
			 <span class="titulo"><small><?php echo $endereco_empresa ?></small></span>
			</div>
		</div>

</div>

<div class="container">

		
			<div class="row">
				<div class="col-sm-8">	
				  <big> Ordem de Serviços Nº <?php echo $id ?>  </big>
				</div>
				<div class="col-sm-4">	
				<big> Data: <?php echo $data3; ?> </big>
				</div>
			</div>
		
		<hr>

			<div class="row">
				<div class="col-sm-12">
					<p style="font-size:12px"> <b> Dados do Cliente </b> </p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3">	
				 <p style="font-size:12px">  Nome: <?php echo $res_1['cli_nome']; ?> </p>
				</div>
				<div class="col-sm-3">	
				 <p style="font-size:12px">  Email: <?php echo $res_1['email']; ?> </p>
				</div>
				<div class="col-sm-3">	
				 <p style="font-size:12px">  Endereço: <?php echo $res_1['endereco']; ?> </p>
				</div>
				
			</div>

			<div class="row">
				<div class="col-sm-3">	
				 <p style="font-size:12px">  Telefone: <?php echo $res_1['telefone']; ?> </p>
				</div>
				<div class="col-sm-3">	
				 <p style="font-size:12px">  CPF: <?php echo $res_1['cliente']; ?> </p>
				</div>
				
				
			</div>
		
		<hr>


		<div class="row">
				<div class="col-sm-12">
					<p style="font-size:12px"> <b> Dados do Aparelho </b> </p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3">	
				 <p style="font-size:12px">  Produto: <?php echo $res_1['produto']; ?> </p>
				</div>
				<div class="col-sm-3">	
				 <p style="font-size:12px">  Nº Série: <?php echo $res_1['serie']; ?> </p>
				</div>
				<div class="col-sm-3">	
				 <p style="font-size:12px">  Modelo: XHPER </p>
				</div>
				
			</div>

			<div class="row">
				<div class="col-sm-12">	
				 <p style="font-size:12px">  Defeito: <?php echo $res_1['problema']; ?> </p>
				</div>
				
				
				
			</div>

			
		
		<hr>


		<div class="row">
				<div class="col-sm-12">
					<p style="font-size:12px"> <b> Laudo Técnico </b> </p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">	
				 <p style="font-size:12px">  <?php echo $res_1['laudo']; ?>  </p>
				</div>
				
				
			</div>

						
		<br><br>

		<table class="table">
			<tr bgcolor="#f9f9f9">
				<td> <b>Peça</b> </td>
				<td> <b>Valor da Peça</b> </td>
				<td> <b> Quantidade</b> </td>
				
			</tr>
			<tr>
				<td> <?php echo $res_1['pecas']; ?> </td>
				<td>R$ <?php echo $valor_pecas ?> </td>
				<td> 1 </td>
				
			</tr>
		</table>


		<hr>
		<br>
		<br>

		<div class="row">
				<div class="col-sm-6">	
				 
				 
				</div>
				<div class="col-sm-4 areaTotais">	
				 <p class="pgto" style="font-size:14px">  <b>Total de Peças: </b> R$ <?php echo $valor_pecas; ?> </p>
				 <p class="pgto" style="font-size:14px">  <b>Total Mão de Obra: </b> R$ <?php echo $mao_obra; ?> </p>
				  <p class="pgto" style="font-size:14px">  <b>Total Desconto: </b> R$ <?php echo $total_desconto; ?> </p>

				
				</div>
				
				
		</div>

		<div class="row">
				<div class="col-sm-6">	
				 <p style="font-size:14px">  <b>Técnico: </b> <?php echo $res_1['func_nome']; ?> </p>
				
				</div>
				<div class="col-sm-4 areaTotal">	
				
				 <p class="pgto" style="font-size:14px">  <b>Total a Pagar: </b> R$ <?php echo $total_os; ?> </p>
				</div>
				
				
		</div>

		<br>

		<div class="row">
				<div class="col-sm-6">	
				
				</div>

				<div class="col-sm-4">	
				<p style="font-size:11px">  Garantia de <?php echo $res_2['garantia']; ?> a partir de <?php echo $data3; ?></p>
				</div>
				
				
		</div>

			

	
</div>


<div class="footer">
 <p style="font-size:12px" align="center"><?php echo $texto_rodape ?></p> 
</div>


<?php }  } ?>