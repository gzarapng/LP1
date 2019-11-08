<!DOCTYPE html>
<html>
  <head>
     <meta charset='utf-8' />
     <title>RH</title>
     <link rel='icon' href='Imagens/network.png' />
     <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' />
	 <script src='https://code.jquery.com/jquery-3.3.1.slim.min.js' ></script>
	 <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js' ></script>
	 <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js' ></script>
     <meta name='viewport' content='width=device-width, initial-scale=1' />
  </head>
<body>
  	<div class='container-fluid border m-2 mx-auto'>		  
	  	<h1 class='p-2 m-2 bg-warning text-white text-center'>Recursos Humanos</h1>
		<div class='p-2 dropdown'>
			<button class='btn btn-warning text-white dropdown-toggle' type='button' data-toggle='dropdown'>Menu</button>
			<ul class='dropdown-menu'>
					<li><a class='text-warning' href='Index.php?opc=H'>Home</a></li>	
					<li><a class='text-warning' href='Index.php?opc=C'>Controlar</a></li>	
					<li><a class='text-warning' href='Index.php?opc=G'>Gerenciar</a></li>
			</ul>
		</div>	
		<?php 	 
			include "DB.php";
			
			if ( isset($_GET['opc'])) {
				$opc = $_GET['opc'];
			} 
			else {
				$opc = "H";				# SE NÃO FOI INFORMADA A OPÇÃO DO MENU, CARREGA A OPÇÃO "HOME"
			}

		  	if ( $opc == "H" ) { 		# HOME
		  		?>
		  		<div class="container">
		  			<div class="row">
		    			<div class="col">
							<div class="card mx-auto" style="width: 42%;">
							  <img src="Imagens/collaboration.png" class="card-img-top" alt="Controlar Funcionários">
							  <div class="card-body">
							    <h5 class="card-title">Controle de Funcionários</h5>
							    <p class="card-text">Cadastrar, Alterar e Excluir Funcionários.</p>
							    <a href="Index.php?opc=C" class="btn btn-warning text-white">Controlar</a>
							  </div>
							</div>
						</div>
						<div class="col">
							<div class="card mx-auto" style="width: 42%;" >
							  <img src="Imagens/worker.png" class="card-img-top" alt="Gerenciar Funcionários">
							  <div class="card-body">
							    <h5 class="card-title">Relatórios para Gerenciamento</h5>
							    <p class="card-text">Gerar Relatórios e Analisar Dados.</p>
							    <a href="Index.php?opc=G" class="btn btn-warning text-white">Gerenciar</a>
							  </div>
							</div>
						</div>
					</div>
				</div>
		  		<?php
			}

			elseif ( $opc == "C" ) {	# CONTROLAR
			     include "Controlar.php";			 		
			}
			
			elseif ( $opc == "G" ) {	# GERENCIAR
				 include "Gerenciar.php";		
			}	
		?>	
		<br />
		</div>
		<h6 class='text-warning text-center'>Desenvolvido por IFSP - Campus Guarulhos</h6>
	</body>
</html>