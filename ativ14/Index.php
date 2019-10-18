<!DOCTYPE html>
<html>
  <head>
     <meta charset='utf-8' />
     <title>Delivery</title>
     <link rel='icon' href='Imagens/Food.png' />
     <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' >
     <meta name='viewport' content='width=device-width, initial-scale=1' />
  </head>
<body>
  	<div class='container border m-2 mx-auto'>		  
	  <h1 class='p-2 m-2 bg-secondary text-white text-center'>Delivery</h1>
	  <nav class='p-2 m-2 navbar navbar-expand-lg navbar-light bg-light'>  
			<div class='navbar-expand' id='navbarNav'>
			    <ul class='navbar-nav'>
					<li class='nav-item'><a class='nav-link' href='Index.php?opc=H'>Home</a></li>
					<li class='nav-item'><a class='nav-link' href='Index.php?opc=O'>Cardápio</a></li>
					<li class='nav-item'><a class='nav-link' href='Index.php?opc=R'>Restrito</a></li>
					<li class='nav-item'><a class='nav-link' href='Index.php?opc=P'>Pedidos</a></li>
		
				</ul>
			</div>
	  </nav>		
<?php 	 
	include "DB.php";
	
	if ( isset($_GET['opc'])) {
		$opc = $_GET['opc'];
	} 
	else {
		$opc = "H";				# SE NÃO FOI INFORMADA A OPÇÃO DO MENU, CARREGA A OPÇÃO "HOME"
	}

  	if ( $opc == "H" ) { 		# HOME
  		echo "<div class='container'>
				<div class='row'>
					<div class='col text-center'><img src='Imagens/Logo1.jpg' width=300 /></div>
			 		<div class='col text-center'><img src='Imagens/Logo2.jpg' width=300 /></div>
			 	</div>
			 </div>
		<br />";
	}

	elseif ( $opc == "O" ) {	# CARDÁPIO
		// Define os ítens do Menu
		echo "<div class='p-2 btn-group' >
			<button type='button' class='btn btn-secondary'
			  	onclick=location.replace('Index.php?opc=O&tipo=Sanduíches')>Sanduíches</button>
			<button type='button' class='btn btn-secondary'
			  	onclick=location.replace('Index.php?opc=O&tipo=Acompanhamentos')>Acompanhamentos</button>	
			<button type='button' class='btn btn-secondary'
			  	onclick=location.replace('Index.php?opc=O&tipo=Bebidas')>Bebidas</button>	  
			<button type='button' class='btn btn-secondary'
				onclick=location.replace('Index.php?opc=O&tipo=Sobremesas')>Sobremesas</button>	
		    </div>";

		if ( isset($_GET['tipo'])) {	# SELECIONA OS PRODUTOS PELO TIPO E EXIBE
			$tipo = $_GET['tipo'];
			$argumentos = " WHERE TIPO = '$tipo'";	
			//funSelect($tabela, $campos, $argumentos) 		
			$tabela = funSelect("tb_produtos", "*", $argumentos);

			echo "<h5 class='p-2 m-2 bg-secondary text-white text-center'>$tipo</h5>
				<div class='container w-75'>
                    <div class='row'>";
                    	for ($i = 0; $i < count($tabela); $i++) {
                    		echo "<div class='col text-center font-weight-bold'>
       <span class='text-danger'>". $tabela[$i]['NOME'] ." </span> <br />
       <img src='". $tabela[$i]['FOTO'] ."' width='100' /> <br />
       <span class='text-primary'>R$ ". number_format($tabela[$i]['VALOR'],2,",",".") ."</span> <br />
       <a href='Index.php?opc=PI&id=". $tabela[$i]['ID'] ."' ><img src='Imagens/add.png' width='24' alt='Comprar' /></a> <br />
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
			<button type='button' class='btn btn-secondary'
			  	onclick=location.replace('Index.php?opc=C')>Cadastrar</button>
			<button type='button' class='btn btn-secondary'
			  	onclick=location.replace('Index.php?opc=A')>Alterar</button>	
			<button type='button' class='btn btn-secondary'
			  	onclick=location.replace('Index.php?opc=E')>Excluir</button>	  
			<button type='button' class='btn btn-secondary'
				onclick=location.replace('Index.php?opc=L')>Listar</button>	
		    </div>";	
	}	

	elseif ( $opc == "C" ) {	# CADASTRAR
		echo "<h5 class='p-2 m-2 bg-secondary text-white text-center'>Cadastrar</h5>
		  <form action='Index.php?opc=I' method='post'>
			<h5 class='text-center'> Nome: <input type='text' name='nome' size='40' maxlength='40' required /> </h5>
			<h5 class='text-center' > Tipo: 
			<select name='tipo' required >
				<option value='' disabled selected>Selecione...</option> 
				<option value='Acompanhamentos'>Acompanhamentos</option> 
				<option value='Bebidas'>Bebidas</option>
				<option value='Sanduíches'>Sanduíches</option>
				<option value='Sobremesas'>Sobremesas</option>
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
			echo "<p class='p-2 m-2 bg-info text-white'>Produto cadastrado com sucesso!</p>";
		}
		else {
			echo "<p class='p-2 m-2 bg-warning text-white'>Erro ao cadastrar Produto!</p>";
		}
		echo "<p class='m-2'><input type='submit' value='Voltar' onclick=location.replace('Index.php?opc=R') /></p>";
	}

	elseif ( $opc == "L" ) {	# LISTAR	
		//funSelect($tabela, $campos, $argumentos) 	
		$tabela = funSelect("tb_produtos", "*", "");
		echo " <h5 class='p-2 m-2 bg-secondary text-white text-center'>Produtos Cadastrados:</h5>
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
							<div class='col text-center'><a href='Index.php?opc=D&id=". $tabela[$i]['ID'] ."' ><img src='Imagens/view.png' /></a></div>
						</div>";
				}
		echo "</div>";	
	}

	elseif ( $opc == "D" ) {	# DETALHAR		
		$id = $_GET['id'];
		$argumentos = " WHERE ID = '$id'";	
		//funSelect($tabela, $campos, $argumentos) 		
		$tabela = funSelect("tb_produtos", "*", $argumentos);	

		echo "<h5 class='p-2 m-2 bg-primary text-white text-center'>". $tabela[0]['NOME'] ."</h5>			  
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
		echo " <h5 class='p-2 m-2 bg-secondary text-white text-center'>Produtos Cadastrados:</h5>
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
							<div class='col text-center'><a href='Index.php?opc=M&id=". $tabela[$i]['ID'] ."' ><img src='Imagens/modify.png' /></a></div>
						</div>";
				}
		echo "</div>";			
	}

	elseif ( $opc == "M" ) {	# MODIFICAR
		$id = $_GET['id'];
		$argumentos = "WHERE ID = '$id' ";
		//funSelect($tabela, $campos, $argumentos) 	
		$tabela = funSelect("tb_produtos", "*", $argumentos);
		
		echo "<h5 class='p-2 m-2 bg-secondary text-white text-center'>Atualizar</h5>
			<form action='Index.php?opc=U&id=$id' method='post'>
			<h5 class='text-center'> Nome: <input type='text' name='nome' size='40' maxlength='40' value='". $tabela[0]['NOME'] ."' required /> </h5>
			<h5 class='text-center' > Tipo: 
			<select name='tipo' required>
				<option value='". $tabela[0]['TIPO'] ."' selected>". $tabela[0]['TIPO'] ."</option> 
				<option value='Acompanhamentos'>Acompanhamentos</option> 
				<option value='Bebidas'>Bebidas</option>
				<option value='Sanduíches'>Sanduíches</option>
				<option value='Sobremesas'>Sobremesas</option>
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
		echo "<p class='m-2'><input type='submit' value='Voltar' onclick=location.replace('Index.php?opc=R') /></p>";
	}

	elseif ( $opc == "E" ) {	# EXCLUIR	
		//funSelect($tabela, $campos, $argumentos) 	
		$tabela = funSelect("tb_produtos", "*", "");
		echo " <h5 class='p-2 m-2 bg-secondary text-white text-center'>Produtos Cadastrados:</h5>
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
							<div class='col text-center'><a href='Index.php?opc=X&id=". $tabela[$i]['ID'] ."' ><img src='Imagens/erase.png' /></a></div>
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
		echo "<p class='m-2'><input type='submit' value='Voltar' onclick=location.replace('Index.php?opc=R') /></p>";		
	}


	elseif ( $opc == "P" ) {	# PEDIDO
		// EXIBE CARRINHO:
		if (isset($_COOKIE['ck_carr']))	{
			 $carr = $_COOKIE['ck_carr'];// atribui o conteúdo do cookie para uma variável
			 $carr = unserialize($carr);// converte de literal (texto) para array
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
					for($i = 0;$i<count($carr);$i++){
                        $id = $carr[$i][0];
                        $argumentos = "WHERE ID = '$id' ";
                    				
					   $tabela = funSelect('tb_produtos', '*', $argumentos);//funSelect($tabela, $campos, $argumentos) 		
								
						echo "<div class='row'>
								<div class='col text-center'>". $tabela[0]['ID'] ."</div>
								<div class='col text-center'>". $tabela[0]['NOME'] ."</div>
								<div class='col text-center'>R$ ". number_format($tabela[0]['VALOR'],2,',','.') ."</div>
								<div class='col text-center'>
								<form action='Index.php?opc=PA&i=$i' method='post'>
									<input type='number' name='quant' value='". $carr[$i][1] ."' min='1' max='10' />
									<input type='image' src='Imagens/Reload.png' alt ='Atualizar' />
								</form></div>
								<div class='col text-center'><a href='Index.php?opc=PR&i=$i'><img src='Imagens/Delete.png' alt='Remover' /></a></div>
							</div>";
                               $total = $total + ($tabela[0]['VALOR'] * $carr[$i][1]);
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
			echo "<h6 class='p-2 m-2 bg-danger text-white text-center'>Carrinho Vazio!</h6>";
		}
		
		echo "<p class='m-2'><input type='submit' value='Esvaziar Carrinho' onClick=location.replace('Index.php?opc=PX') /> </p>";
		
	}


	elseif ( $opc == "PI" ) {	# PEDIDO_INCLUIR	
        $id = $_GET['id'];
        $qtd = 0; // Quantidade
			// Verifica se o cookie do Carrinho já está sendo usado
			if (isset($_COOKIE['ck_carr'])) {
				 $carr = $_COOKIE['ck_carr'];// Atribui o conteúdo do cookie para uma variável
                
				 $carr = unserialize($carr);// Converte de literal (texto) para array
                    
				 $i = count($carr);// Obtém a última posição do array
                
				for($j=0;$j<$i;$j++){// Verifica se o produto já está no Carrinho
				
					   if($id== $carr[$j][0]){
						echo "<script>alert('Aviso: Produto já existia no Carrinho!');</script>";
							//Substitui por ele mesmo
                    $i = $j;
                    $qtd = $carr[$j][1];
                    }	
                }
			}
			else {
				//Adiciona o primeiro item no vetor
				$i=0;
            }
            $qtd++; // Ajusta a quantidade
            $carr[$i][0]=$id;// Atribui o ID do Produto
            $carr[$i][1] =$qtd ;// Guarda a Quantidade 
            $carr= serialize($carr);// Converte de array para literal (texto)
        
                setcookie('ck_carr', $carr);
				
		  			
			echo "<script>alert('Produto incluído no Carrinho!');</script>";
				
			echo "<script>location.replace('Index.php?opc=P');</script>";
        }


	elseif ( $opc == "PR" ) {	# PEDIDO_REMOVER	
			$i = $_GET['i'];
            $carr = $_COOKIE['ck_carr'];
            $carr = unserialize($carr);

            //Remove item
					
				unset($carr[$i]);

			//Reorganiza Vetor
			$carr =  array_values($carr);
            $carr = serialize($carr);
			 // Converte de array para literal (texto)
			 //Recarrega array no cookie
            setcookie('ck_carr', $carr);
			echo "<script>alert('Produto excluído do Carrinho!');</script>";
			
			echo "<script>location.replace('Index.php?opc=P');</script>";			

	}


	elseif ( $opc == "PA" ) {	# PEDIDO_ATUALIZAR_QUANTIDADE		
			$i = $_GET['i'];
            $quant = $_POST['quant'];
            $carr = $_COOKIE['ck_carr'];
            $carr = unserialize($carr);


				$carr[$i][1] = $quant;  //Atualiza item			
			 $carr = serialize($carr);//Recarrega cookie
            setcookie('ck_carr', $carr);
			

			echo "<script>alert('Quantidade Atualizada!');</script>";
			
			echo "<script>location.replace('Index.php?opc=P');</script>";				

	}


	elseif ( $opc == "PX" ) {	# PEDIDO_ESVAZIAR
			//Limpar Cookie Carrinho:
			setcookie('ck_carr','',time()-1);
			//unset($_COOKIE['ck_carr']);	// Outra opção para limpar o carrinho
			echo "<script>alert('Carrinho Esvaziado!');</script>";
			echo "<script>location.replace('Index.php?opc=P');</script>";			

	}
	
	
?>
		</div>
		<h6 class='text-secondary text-center'>Desenvolvido por IFSP - Campus Guarulhos</h6>
	</body>
</html>