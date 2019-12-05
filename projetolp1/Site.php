<!DOCTYPE html>
<html>
  <head>
  <title>The Copper Vynil</title>
      <meta charset="utf-8" />
	  <link rel="icon" href="Imagens/icon.png" type="image/ico" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" type="text/css" href="style.css" />
        <link href="https://fonts.googleapis.com/css?family=Montserrat|Roboto+Condensed&display=swap" rel="stylesheet">
        <script src="scripts.js"></script>
        <!-- Material Design Bootstrap -->
        <link href="css/mdb.min.css" rel="stylesheet">
  </head>
<body>
	<header>
	
		<!--Navbar-->
<nav class="navbar navbar-expand-lg navbar-dark amber darken-3-color">

<!-- Navbar brand -->
<a class="navbar-brand" href="site.php">The Copper Vinyl</a>

<!-- Collapse button -->
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
  aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
</button>

<!-- Collapsible content -->
<div class="collapse navbar-collapse" id="basicExampleNav">

  <!-- Links -->
 
  <ul class="navbar-nav mr-auto">
	<li class="nav-item active">
	  <a class="nav-link" href="site.php?opc=H">Home
		<span class="sr-only">(current)</span>
	  </a>
	</li>
	<li class="nav-item">
	  <a class="nav-link" href="site.php?opc=O">Produtos</a>
	</li>
	<li class="nav-item">
	  <a class="nav-link" href="site.php?opc=P">Carrinho</a>
	</li>
	<li class="nav-item">
	  <a class="nav-link" href="site.php?opc=R">ADMIN</a>
	</li>

  </ul>
  <!-- Links -->

  <form class="form-inline">
	<div class="md-form my-0">
	  <input class="form-control mr-sm-2" type="text" placeholder="Buscar" aria-label="Search">
	</div>
  </form>
</div>

</nav>
<!--/.Navbar-->
       
				
</header>
  	
<?php 	 
	include "DB.php";
	
	if ( isset($_GET['opc'])) {
		$opc = $_GET['opc'];
	} 
	else {
		$opc = "H";				# SE NÃO FOI INFORMADA A OPÇÃO DO MENU, CARREGA A OPÇÃO "HOME"
	}

  	if ( $opc == "H" ) { 		# HOME
		  ?><!--Carousel Wrapper-->
		  <div id="carouselcontainer">
		  <div id='carousel1' class='carousel slide carousel-fade' data-ride='carousel'>
			<!--Indicators-->
			<ol class='carousel-indicators'>
			  <li data-target='#carousel1' data-slide-to='0' class='active'></li>
			  <li data-target='#carousel1' data-slide-to='1'></li>
			  <li data-target='#carousel1' data-slide-to='2'></li>
			</ol>
			<!--/.Indicators-->
			<!--Slides-->
			<div class='carousel-inner' role='listbox'>
			  <div class='carousel-item active'>
				<div class='view'>
				  <img class="d-block w-100" src='Imagens/img1.png'
					alt='First slide'>
				  <div class='mask rgba-black-light'></div>
				</div>
				<div class='carousel-caption'>
				  <h3 class='h3-responsive'>Sabaton</h3>
				  <p>Carolus Rex - a história da Suécia no auge de seu poderio e glória</p>
				</div>
			  </div>
			  <div class='carousel-item'>
				<!--Mask color-->
				<div class='view'>
				  <img class='d-block w-100' src='Imagens/img2.png'
					alt='Second slide'>
				  <div class='mask rgba-black-strong'></div>
				</div>
				<div class='carousel-caption'>
				  <h3 class='h3-responsive'>Rush</h3>
				  <p>Moving Pictures - O clássico de uma geração</p>
				</div>
			  </div>
			  <div class='carousel-item'>
				<!--Mask color-->
				<div class='view'>
				  <img class='d-block w-100' src='Imagens/img3.png'
					alt='Third slide'>
				  <div class='mask rgba-black-slight'></div>
				</div>
				<div class='carousel-caption'>
				  <h3 class='h3-responsive'>Blind Guardian</h3>
				  <p>Nightfall in the Middle Earth - O épico de Tolkien traduzido na linguagem do Power Metal!</p>
				</div>
			  </div>
			</div>
			<!--/.Slides-->
			<!--Controls-->
			<a class='carousel-control-prev' href='#carousel1' role='button' data-slide='prev'>
			  <span class='carousel-control-prev-icon' aria-hidden='true'></span>
			  <span class='sr-only'>Anterior</span>
			</a>
			<a class='carousel-control-next' href='#carousel1' role='button' data-slide='next'>
			  <span class='carousel-control-next-icon' aria-hidden='true'></span>
			  <span class='sr-only'>Próximo</span>
			</a>
			<!--/.Controls-->
		  </div>
		  <!--/.Carousel Wrapper-->
		  
	  </div>
		<br /> <?php
	}

	elseif ( $opc == "O" ) {	# CARDÁPIO
		// Define os ítens do Menu
		echo "<div class='p-2 btn-group' >
			<button type='button' class='btn btn-elegant'
			  	onclick=location.replace('site.php?opc=O&tipo=Metal')>Metal</button>
			<button type='button' class='btn btn-elegant'
			  	onclick=location.replace('site.php?opc=O&tipo=Rock')>Rock</button>	
			<button type='button' class='btn btn-elegant'
			  	onclick=location.replace('site.php?opc=O&tipo=Indie')>Indie</button>	  
			<button type='button' class='btn btn-elegant'
				onclick=location.replace('site.php?opc=O&tipo=Outros')>Outros</button>	
		    </div>";

		if ( isset($_GET['tipo'])) {	# SELECIONA OS PRODUTOS PELO TIPO E EXIBE
			$tipo = $_GET['tipo'];
			$argumentos = " WHERE TIPO = '$tipo'";	
			//funSelect($tabela, $campos, $argumentos) 		
			$tabela = funSelect("tb_produtos", "*", $argumentos);

			echo "<h5 class='p-2 m-2 bg elegant-color text-white text-center'>$tipo</h5>
				<div class='container w-75'>
                    <div class='row'>";
                    	for ($i = 0; $i < count($tabela); $i++) {
                    		echo "<div class='col text-center font-weight-bold'>
       <span class='text-danger'>". $tabela[$i]['NOME'] ." </span> <br />
       <img src='". $tabela[$i]['FOTO'] ."' width='100' /> <br />
       <span class='text-primary'>R$ ". number_format($tabela[$i]['VALOR'],2,",",".") ."</span> <br />
       <a href='site.php?opc=PI&id=". $tabela[$i]['ID'] ."' ><img src='Imagens/add.png' width='24' alt='Comprar' /></a> <br />
                    		</div>";
                    	}				 			
				echo "</div>
			    </div>
			<p class='m-2'><input type='submit' value='Voltar' onclick='history.go(-1)' /></p>";	
		}
	}	

	elseif ( $opc == "R" ) {	# RESTRITO
		// Define os ítens do Menu
		echo "<div class='p-2 btn-group'>
			<button type='button' class='btn btn-elegant'
			  	onclick=location.replace('site.php?opc=C')>Cadastrar</button>
			<button type='button' class='btn btn-elegant'
			  	onclick=location.replace('site.php?opc=A')>Alterar</button>	
			<button type='button' class='btn btn-elegant'
			  	onclick=location.replace('site.php?opc=E')>Excluir</button>	  
			<button type='button' class='btn btn-elegant'
				onclick=location.replace('site.php?opc=L')>Listar</button>	
		    </div>";	
	}	

	elseif ( $opc == "C" ) {	# CADASTRAR
		echo "<h5 class='p-2 m-2 bg elegant-color text-white text-center'>Cadastrar</h5>
		  <form action='site.php?opc=I' method='post'>
			<h5 class='text-center'> Nome: <input type='text' name='nome' size='40' maxlength='40' required /> </h5>
			<h5 class='text-center' > Tipo: 
			<select name='tipo' required >
				<option value='' disabled selected>Selecione...</option> 
				<option value='Metal'>Metal</option> 
				<option value='Rock'>Rock</option>
				<option value='Indie'>Indie</option>
				<option value='Outros'>Outros</option>
				</select> </h5>
			<h5 class='text-center'> Foto: <input type='text' name='foto' size='50' maxlength='50' value='Imagens/Fotos/' required /> </h5>
			<h5 class='text-center'> Valor: R$ <input type='number' name='valor' min='1' max='1000' value='0' required />,00 </h5>
				<h5 class='text-center'> <input type='submit' value='Cadastrar' /> </h5>
		</form>";
	}

	elseif ( $opc == "I" ) {	# INCLUIR					
		$nome = $_POST['nome'];
		$tipo = $_POST['tipo'];
		$foto = $_POST['foto'];
		$valor = $_POST['valor'];

		$campos = "nome, tipo, foto, valor";
		$valores = "'$nome', '$tipo', '$foto', '$valor'";
		//funInsert($tabela, $campos, $valores)
		if ( funInsert("tb_produtos", $campos, $valores) == TRUE ) {
			echo "<p class='p-2 m-2 bg elegant-color text-white'>Produto cadastrado com sucesso!</p>";
		}
		else {
			echo "<p class='p-2 m-2 bg-unique text-white'>Erro ao cadastrar Produto!</p>";
		}
		echo "<p class='m-2'><input type='submit' value='Voltar' onclick=location.replace('site.php?opc=R') /></p>";
	}

	elseif ( $opc == "L" ) {	# LISTAR	
		//funSelect($tabela, $campos, $argumentos) 	
		$tabela = funSelect("tb_produtos", "*", "");
		echo " <h5 class='p-2 m-2 bg elegant-color text-white text-center'>Produtos Cadastrados:</h5>
			<div class='container'>
                 <div class='row'>
		 			 <div class='col text-center font-weight-bold'>Nome</div>
		 			 <div class='col text-center font-weight-bold'>Tipo</div>
		 			 <div class='col text-center font-weight-bold'>Valor</div>
		 			 <div class='col text-center font-weight-bold'>Detalhes</div>
				</div>";			
				for($i=0; $i < count($tabela); $i++) {		
					echo "<div class='row'>
							<div class='col text-center'>". $tabela[$i]['NOME'] ."</div>
							<div class='col text-center'>". $tabela[$i]['TIPO'] ."</div>
							<div class='col text-center'>R$ ". number_format($tabela[$i]['VALOR'],2,',','.') ."</div>
							<div class='col text-center'><a href='site.php?opc=D&id=". $tabela[$i]['ID'] ."' ><img src='Imagens/view.png' /></a></div>
						</div>";
				}
		echo "</div>";	
	}

	elseif ( $opc == "D" ) {	# DETALHAR		
		$id = $_GET['id'];
		$argumentos = " WHERE ID = '$id'";	
		//funSelect($tabela, $campos, $argumentos) 		
		$tabela = funSelect("tb_produtos", "*", $argumentos);	

		echo "<h5 class='p-2 m-2 bg elegant-color text-white text-center'>". $tabela[0]['NOME'] ."</h5>			  
			  <div class='container'>
                    <div class='row'>
                    	<div class='col text-center my-auto'><img src='". $tabela[0]['FOTO'] ."' width='100' /></div>
						<div class='col text-center font-weight-bold my-auto'>Tipo: </div>
					  	<div class='col my-auto'>". $tabela[0]['TIPO'] ."</div>

						<div class='col text-center font-weight-bold my-auto'>Valor: </div>
					  	<div class='col my-auto'>R$ ". number_format($tabela[0]['VALOR'],2,',','.') ."</div>
					</div>
			  </div>
			<br />
			<p><input type='submit' value='Voltar' onClick='history.go(-1)' /> </p>";	
	}
	
	elseif ( $opc == "A" ) {	# ALTERAR	
		//funSelect($tabela, $campos, $argumentos) 	
		$tabela = funSelect("tb_produtos", "*", "");
		echo " <h5 class='p-2 m-2 bg elegant-color text-white text-center'>Produtos Cadastrados:</h5>
			<div class='container'>
                 <div class='row'>
		 			 <div class='col text-center font-weight-bold'>Nome</div>
		 			 <div class='col text-center font-weight-bold'>Tipo</div>
		 			 <div class='col text-center font-weight-bold'>Valor</div>
		 			 <div class='col text-center font-weight-bold'>Detalhes</div>
				</div>";			
				for($i=0; $i < count($tabela); $i++) {		
					echo "<div class='row'>
							<div class='col text-center'>". $tabela[$i]['NOME'] ."</div>
							<div class='col text-center'>". $tabela[$i]['TIPO'] ."</div>
							<div class='col text-center'>R$ ". number_format($tabela[$i]['VALOR'],2,',','.') ."</div>
							<div class='col text-center'><a href='site.php?opc=M&id=". $tabela[$i]['ID'] ."' ><img src='Imagens/modify.png' /></a></div>
						</div>";
				}
		echo "</div>";			
	}

	elseif ( $opc == "M" ) {	# MODIFICAR
		$id = $_GET['id'];
		$argumentos = "WHERE ID = '$id' ";
		//funSelect($tabela, $campos, $argumentos) 	
		$tabela = funSelect("tb_produtos", "*", $argumentos);
		
		echo "<h5 class='p-2 m-2 bg elegant-color text-white text-center'>Atualizar</h5>
			<form action='site.php?opc=U&id=$id' method='post'>
			<h5 class='text-center'> Nome: <input type='text' name='nome' size='40' maxlength='40' value='". $tabela[0]['NOME'] ."' required /> </h5>
			<h5 class='text-center' > Tipo: 
			<select name='tipo' required>
				<option value='". $tabela[0]['TIPO'] ."' selected>". $tabela[0]['TIPO'] ."</option> 
				<option value='Metal'>Metal</option> 
				<option value='Rock'>Rock</option>
				<option value='Indie'>Indie</option>
				<option value='Outros'>Outros</option>
				</select> </h5>
			<h5 class='text-center'> Foto: <input type='text' name='foto' size='50' maxlength='50' value='". $tabela[0]['FOTO'] ."' required /> </h5>
			<h5 class='text-center'> Valor: R$ <input type='number' name='valor' min='1' max='1000' value='". $tabela[0]['VALOR'] ."' required />,00 </h5>
				<h5 class='text-center'> <input type='submit' value='Atualizar' /> </h5>
		</form>";
	}

	elseif ( $opc == "U" ) {	# UPDATE
		$id = $_GET['id'];	
	
		$nome = $_POST['nome'];
		$tipo = $_POST['tipo'];
		$foto = $_POST['foto'];
		$valor = $_POST['valor'];

		$alteracoes = " NOME = '$nome', 
						TIPO = '$tipo',
						FOTO = '$foto',  
						VALOR = '$valor' ";

		$argumentos = " WHERE ID = '$id'";
		//funUpdate($tabela, $alteracoes, $argumentos)
		if ( funUpdate("tb_produtos", $alteracoes, $argumentos) == TRUE ) {
			echo "<p class='p-2 m-2 bg-info text-white'>Produto alterado com sucesso!</p>";
		}
		else {
			echo "<p class='p-2 m-2 bg-warning text-white'>Erro ao alterar Produto!</p>";
		}
		echo "<p class='m-2'><input type='submit' value='Voltar' onclick=location.replace('site.php?opc=R') /></p>";
	}

	elseif ( $opc == "E" ) {	# EXCLUIR	
		//funSelect($tabela, $campos, $argumentos) 	
		$tabela = funSelect("tb_produtos", "*", "");
		echo " <h5 class='p-2 m-2 bg elegant-color text-white text-center'>Produtos Cadastrados:</h5>
			<div class='container'>
                 <div class='row'>
		 			 <div class='col text-center font-weight-bold'>Nome</div>
		 			 <div class='col text-center font-weight-bold'>Tipo</div>
		 			 <div class='col text-center font-weight-bold'>Valor</div>
		 			 <div class='col text-center font-weight-bold'>Detalhes</div>
				</div>";			
				for($i=0; $i < count($tabela); $i++) {		
					echo "<div class='row'>
							<div class='col text-center'>". $tabela[$i]['NOME'] ."</div>
							<div class='col text-center'>". $tabela[$i]['TIPO'] ."</div>
							<div class='col text-center'>R$ ". number_format($tabela[$i]['VALOR'],2,',','.') ."</div>
							<div class='col text-center'><a href='site.php?opc=X&id=". $tabela[$i]['ID'] ."' ><img src='Imagens/erase.png' /></a></div>
						</div>";
				}
		echo "</div>";	
	}

	elseif ( $opc == "X" ) {	# DELETE
		$id = $_GET['id'];			
		$argumentos = " WHERE ID = '$id'";
		if ( funDelete("tb_produtos", $argumentos) == TRUE ) {
			echo "<p class='p-2 m-2 bg-info text-white'>Produto excluído com sucesso!</p>";			  
		}
		else {
			echo "<p class='p-2 m-2 bg-warning text-white'>Erro ao excluir Produto!</p>";
		}
		echo "<p class='m-2'><input type='submit' value='Voltar' onclick=location.replace('site.php?opc=R') /></p>";		
	}


	elseif ( $opc == "P" ) {	# PEDIDO
		// EXIBE CARRINHO:
		if (isset($_COOKIE['ck_carr']))	{
			$carr = $_COOKIE['ck_carr']; // atribui o conteúdo do cookie para uma variável
			$carr = unserialize($carr); // converte de literal (texto) para array
			$total = 0;
			echo " <h5 class='p-2 m-2 bg-info text-white text-center'>Pedido:</h5>
				<div class='container'>
	                 <div class='row'>
			 			 <div class='col text-center font-weight-bold'>Código</div>
			 			 <div class='col text-center font-weight-bold'>Nome</div>
			 			 <div class='col text-center font-weight-bold'>Valor</div>
			 			 <div class='col text-center font-weight-bold'>Quantidade</div>
			 			 <div class='col text-center font-weight-bold'>Remover</div>
					</div>";			
            for ($i = 0; $i < count($carr); $i++) {
				$id = $carr[$i][0];	
						
				$argumentos = " WHERE ID = '$id' ";			
						//funSelect($tabela, $campos, $argumentos) 		
						$tabela = funSelect('tb_produtos', '*', $argumentos);		
						echo "<div class='row'>
								<div class='col text-center'>". $tabela[0]['ID'] ."</div>
								<div class='col text-center'>". $tabela[0]['NOME'] ."</div>
								<div class='col text-center'>R$ ". number_format($tabela[0]['VALOR'],2,',','.') ."</div>
								<div class='col text-center'>
								<form action='site.php?opc=PA&i=$i' method='post'>
									<input type='number' name='quant' value='". $carr[$i][1] ."' min='1' max='10' />
									<input type='image' src='Imagens/Reload.png' alt ='Atualizar' />
								</form></div>
								<div class='col text-center'><a href='site.php?opc=PR&i=$i'><img src='Imagens/Delete.png' alt='Remover' /></a></div>
							</div>";
						$total = $total + ( $tabela[0]['VALOR'] * $carr[$i][1] );
            }

					echo "<div class='row'>
							<div class='col text-center'></div>
							<div class='col text-right font-weight-bold'>Total:</div>
							<div class='col text-center font-weight-bold'> R$ ".number_format($total,2,',','.')."</div>
							<div class='col text-center'></div>
							<div class='col text-center'></div>
						</div>";
			echo "</div>";
						
		}
		else {
			echo "<h6 class='p-2 m-2 bg-warning text-white text-center'>Carrinho Vazio!</h6>";
		}
		
		echo "<p class='m-2'><input type='submit' value='Esvaziar Carrinho' onClick=location.replace('site.php?opc=PX') /> </p>";
		
	}


	elseif ( $opc == "PI" ) {	# PEDIDO_INCLUIR	
		$id = $_GET['id'];	
        $qtd = 0;    // Quantidade
			// Verifica se o cookie do Carrinho já está sendo usado
			if (isset($_COOKIE['ck_carr'])) {
				$carr = $_COOKIE['ck_carr']; // Atribui o conteúdo do cookie para uma variável
				$carr = unserialize($carr); // Converte de literal (texto) para array
				$i = count($carr); // Obtém a última posição do array
				// Verifica se o produto já está no Carrinho
				for ( $j = 0; $j < $i; $j++  ) {
					if ( $id == $carr[$j][0] ) {
						echo "<script>alert('Aviso: Produto já existia no Carrinho!');</script>";
						$i = $j;	//Substitui por ele mesmo
                        $qtd = $carr[$j][1];
                    }
                }
			}
			else {
				//Adiciona o primeiro item no vetor
				$i = 0;
			}
            $qtd++;                 // Ajusta a quantidade
			$carr[$i][0] = $id;		// Atribui o ID do Produto
			$carr[$i][1] = $qtd;		// Guarda a Quantidade 
			$carr = serialize($carr);	// Converte de array para literal (texto)
			setcookie('ck_carr', $carr);	
		  			
			echo "<script>alert('Produto incluído no Carrinho!');</script>";
				
			echo "<script>location.replace('site.php?opc=P');</script>";
	}


	elseif ( $opc == "PR" ) {	# PEDIDO_REMOVER	
            $i = $_GET['i'];	

            $carr = $_COOKIE['ck_carr'];
            $carr = unserialize($carr);

            //Remove item
			unset($carr[$i]);	

			//Reorganiza Vetor
			$carr = array_values($carr);
        
			$carr = serialize($carr); // Converte de array para literal (texto)
			setcookie('ck_carr', $carr); //Recarrega array no cookie

			echo "<script>alert('Produto excluído do Carrinho!');</script>";
			
			echo "<script>location.replace('site.php?opc=P');</script>";			

	}


	elseif ( $opc == "PA" ) {	# PEDIDO_ATUALIZAR_QUANTIDADE		
		$i = $_GET['i'];	
        $quant = $_POST['quant'];

		$carr = $_COOKIE['ck_carr'];	
        $carr = unserialize($carr);
		$carr[$i][1] = $quant;	  //Atualiza item			
			 //Recarrega cookie
		$carr = serialize($carr);
        setcookie('ck_carr', $carr);

			echo "<script>alert('Quantidade Atualizada!');</script>";
			
			echo "<script>location.replace('site.php?opc=P');</script>";				

	}


	elseif ( $opc == "PX" ) {	# PEDIDO_ESVAZIAR
			//Limpar Cookie Carrinho:
			setcookie('ck_carr', '', time()-1);
			//unset($_COOKIE['ck_carr']);	// Outra opção para limpar o carrinho
			echo "<script>alert('Carrinho Esvaziado!');</script>";
			echo "<script>location.replace('site.php?opc=P');</script>";			

	}
	
	
?>
		</div>
		<footer>
      <div class="ifcontainer">
        <a class="ifcontainerlogo" href="http://portal.ifspguarulhos.edu.br/"
          ><img src="img/logoif.png" width="100%" target="_blank" />
        </a>
      </div>
      <div class="footercontainertext">
        <p class="footertext">
          Site desenvolvido como um projeto do Instituto Federal de São Paulo -
          campûs Guarulhos. 
        </p>
        <p class="footertext">
          Feito por Gabriel Zara. Desenvolvido com HTML, CSS, PHP e JSS na plataforma
          Visual Studio Code
        </p>
      </div>
      <div class="footercontainerlinks">
        <a
          class="footerlinks"
          href="https://github.com/gzarapng"
          target="_blank"
          ><img src="img/githublogo.png" width="40px"
        /></a>

        <a
          class="footerlinks"
          href="https://www.instagram.com/gzara.jpg/"
          target="_blank"
          ><img src="img/instalogo.png" width="40px"
        /></a>
      </div>
	</body>
</html>