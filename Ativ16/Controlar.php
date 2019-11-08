<div class="container">
    <div class="row">
        <div class="col">
            <h3 class='p-2 m-2 bg-dark text-warning text-center'>Controlar Funcionários</h3>
            <p class='m-2 text-center'>
	           <button type="button" class="btn btn-outline-warning" onclick=location.replace('Index.php?opc=C&acao=C')>Cadastrar</button>
	           <button type="button" class="btn btn-outline-warning" onclick=location.replace('Index.php?opc=C&acao=E')>Editar</button>
            </p>
        </div>
        <div class="col">
            <h3 class='p-2 m-2 bg-dark text-warning text-center'>Controlar Horas Extras</h3>
            <p class='m-2 text-center'>
	           <button type="button" class="btn btn-outline-warning" onclick=location.replace('Index.php?opc=C&acao=HE_C')>Cadastrar</button>
	           <button type="button" class="btn btn-outline-warning" onclick=location.replace('Index.php?opc=C&acao=HE_E')>Editar</button>
            </p>
        </div>
    </div>
</div>			
<?php

if ( isset($_GET['acao']) ) {
	$acao = $_GET['acao'];

	if ( $acao == "C" ) {	# CADASTRAR FUNCIONARIO
	?>
		<h4 class='p-2 m-2 bg-secondary text-warning text-center'>Cadastrar Funcionário</h4>
		<form action='Index.php?opc=C&acao=I' method='post'>

		<div class='row'>
			<div class='col-5'>
				<h6 class='text-center text-secondary'> Nome: <input type='text' name='nome' size='40' maxlength='40' placeholder='Nome do Funcionário' required /> </h6>
			</div>
			<div class='col-3'>
				<h6 class='text-center text-secondary' > Setor: 
					<select name='setor' required>
						<option class='text-warning' value='' disabled selected>Selecione...</option>
						<option class='text-warning' value='Almoxarifado'>Almoxarifado</option> 
						<option class='text-warning' value='Contabilidade'>Contabilidade</option> 
						<option class='text-warning' value='Logística'>Logística</option>
					</select> </h6>
			</div>
			<div class='col-4'>
				<h6 class='text-center text-secondary'> Nascimento: <input type='date' name='nasc' required /> </h6>
			</div>
		</div>
		<div class='row'>
			<div class='col-5'>
				<h6 class='text-center text-secondary'> Sexo: 
					<input type='radio' name='sexo' value='M' required /> Masculino
					<input type='radio' name='sexo' value='F' required /> Feminino </h6>
			</div>
			<div class='col-3'>				  
				<h6 class='text-center text-secondary'> Estágio? 
					<input type='radio' name='estagio' value='1' required /> Sim
					<input type='radio' name='estagio' value='0' required /> Não </h6>
			</div>
			<div class='col-4'>
				<h6 class='text-center text-secondary'> Salário: R$ <input type='number' name='sal' min='1' max='99999' value='0' required />,00 </h6>
			</div>
		</div>				
		<h6 class='text-center'> <input class='btn btn-warning text-white' type='submit' value='Cadastrar' /> </h6>
		</form>
	<?php
	}

	elseif ( $acao == "I" ) {	# INCLUIR	
		$nome = $_POST['nome'];
        $setor = $_POST['setor'];
        $nasc = $_POST['nasc'];
        $sexo = $_POST['sexo'];
        $estagio = $_POST['estagio'];
        $sal = $_POST['sal'];
        
        $campos = " NOME, SETOR, NASCIMENTO, SEXO, ESTAGIO, SALARIO ";
        $valores = " '$nome', '$setor', '$nasc', '$sexo', '$estagio', '$sal' ";
            
		if ( funInsert('tb_func', $campos, $valores) )
			echo "<p class='p-2 m-2 bg-success text-white'>Funcionário cadastrado com sucesso!</p>";
		else 
			echo "<p class='p-2 m-2 bg-danger text-white'>Erro ao cadastrar Funcionário!</p>";

		echo "<p class='m-2'><input class='btn btn-warning text-white' type='submit' value='Voltar' onclick='history.go(-1)' /></p>";
	}

	elseif ( $acao == "E" ) {	# EDITAR	
		$tabela = funSelect('tb_func', '*', 
        ' ORDER BY NOME'); 	
		
		?>
		<h5 class='p-2 m-2 bg-secondary text-warning text-center'>Funcionários Cadastrados:</h5>
			<table class='m-2 w-75 mx-auto table table-striped table-dark text-warning'>
					<thead class='text-center'>
					<tr>
						<th scope='col'>Matrícula</th>
			 			<th scope='col'>Nome</th>
			 			<th scope='col'>Setor</th>
			 			<th scope='col'>Nascimento</th>
			 			<th scope='col'>Sexo</th>
			 			<th scope='col'>Estágio?</th>
			 			<th scope='col'>Salário</th>
					</tr>
				</thead>
		<?php			

        for ($i = 0; $i < count($tabela); $i++) {			
					echo "<tr class='text-center'>
							<td scope='col'>". $tabela[$i]['MATRICULA'] ."</td>
							<td scope='col'>". $tabela[$i]['NOME'] ."</td>
							<td scope='col'>". $tabela[$i]['SETOR'] ."</td>
							<td scope='col'>". date("d/m/Y", strtotime($tabela[$i]['NASCIMENTO'])) ."</td>
							<td scope='col'>". str_replace('M', 'Masc', str_replace('F', 'Fem', $tabela[$i]['SEXO'] )) ."</td>
							<td scope='col'><input type='checkbox' ";
				if ( $tabela[$i]['ESTAGIO'] )
								echo " checked ";
							echo " /></td>
							<td scope='col'>R$ ". number_format($tabela[$i]['SALARIO'],2,',','.') ."</td>
							<td scope='col'><a href='Index.php?opc=C&acao=M&matr=". $tabela[$i]['MATRICULA'] ."' ><img src='Imagens/alterar.png' alt='Alterar' /></a></td>
							<td scope='col'><a href='Index.php?opc=C&acao=X&matr=". $tabela[$i]['MATRICULA'] ."' ><img src='Imagens/excluir.png' alt='Excluir' /></a></td>
						</tr>";
        }
		echo "</table>";			
	}

	elseif ( $acao == "M" ) {	# MODIFICAR FUNCIONÁRIO
		$matr = $_GET['matr'];
        
        $argumentos = " WHERE MATRICULA = '$matr' ";
        $tabela = funSelect('tb_func', '*', $argumentos);
		
		echo "<h4 class='p-2 m-2 bg-secondary text-warning text-center'>Alterar Funcionário</h4>
		<form action='Index.php?opc=C&acao=U&matr=$matr' method='post'>

		<div class='row'>
			<div class='col-5'>
				<h6 class='text-center text-secondary'> Nome: <input type='text' name='nome' size='40' maxlength='40' value='". $tabela[0]['NOME'] ."' required /> </h6>
			</div>
			<div class='col-3'>
				<h6 class='text-center text-secondary' > Setor: 
					<select name='setor' required>
						<option class='text-warning' value='". $tabela[0]['SETOR'] ."' selected>". $tabela[0]['SETOR'] ."</option> 
						<option class='text-warning' value='Almoxarifado'>Almoxarifado</option> 
						<option class='text-warning' value='Contabilidade'>Contabilidade</option> 
						<option class='text-warning' value='Logística'>Logística</option>
					</select> </h6>
			</div>
			<div class='col-4'>
				<h6 class='text-center text-secondary'> Nascimento: <input type='date' name='nasc' value='". $tabela[0]['NASCIMENTO'] ."'  required /> </h6>
			</div>
		</div>
		<div class='row'>
			<div class='col-5'>
				<h6 class='text-center text-secondary'> Sexo: 
					<input type='radio' name='sexo' value='M' required ";
					if ($tabela[0]['SEXO'] == "M")
						echo " checked ";
					echo " /> Masculino
					<input type='radio' name='sexo' value='F' required  ";
					if ($tabela[0]['SEXO'] == "F")
						echo " checked ";
					echo " /> Feminino </h6>
			</div>
			<div class='col-3'>				  
				<h6 class='text-center text-secondary'> Estágio? 
					<input type='radio' name='estagio' value='1' required ";
					if ( $tabela[0]['ESTAGIO'] )
						echo " checked ";
					echo " /> Sim
					<input type='radio' name='estagio' value='0' required ";
					if ( $tabela[0]['ESTAGIO'] == FALSE)
						echo " checked ";
					echo " /> Não </h6>
			</div>
			<div class='col-4'>
				<h6 class='text-center text-secondary'> Salário: R$ <input type='number' name='sal' min='1' max='99000' value='". $tabela[0]['SALARIO'] ."' required />,00 </h6>
			</div>
		</div>				
		<h6 class='text-center'> <input class='btn btn-warning text-white' type='submit' value='Alterar' /> </h6>
		</form>";				
	}

	elseif ( $acao == "U" ) {	# UPDATE
		$matr = $_GET['matr'];
        
        $nome = $_POST['nome'];
        $setor = $_POST['setor'];
        $nasc = $_POST['nasc'];
        $sexo = $_POST['sexo'];
        $estagio = $_POST['estagio'];
        $sal = $_POST['sal'];
        
        $alteracoes = "  NOME = '$nome',
                        SETOR = '$setor',
                   NASCIMENTO = '$nasc',
                         SEXO = '$sexo',
                      ESTAGIO = '$estagio',
                      SALARIO = '$sal' ";
        $argumentos = "  WHERE MATRICULA = '$matr' ";
        
if (funUpdate('tb_func', $alteracoes, $argumentos))		 
			echo "<p class='p-2 m-2 bg-success text-white'>Funcionário alterado com sucesso!</p>";		
	else	 
			echo "<p class='p-2 m-2 bg-danger text-white'>Erro ao alterar Funcionário!</p>";
		
		echo "<p class='m-2'><input class='btn btn-warning text-white' type='submit' value='Voltar' onclick=location.replace('Index.php?opc=C&acao=E') /></p>";
	}

	elseif ( $acao == "X" ) {	# DELETE
		$matr = $_GET['matr'];
        
        $argumentos = " WHERE MATRICULA = '$matr' ";
		if (funDelete('tb_func', $argumentos) )		
			echo "<p class='p-2 m-2 bg-success text-white'>Funcionário excluído com sucesso!</p>";
		else 
			echo "<p class='p-2 m-2 bg-danger text-white'>Erro ao excluir Funcionário!</p>";
		
		echo "<p class='m-2'><input class='btn btn-warning text-white' type='submit' value='Voltar' onclick=location.replace('Index.php?opc=C&acao=E') /></p>";		
	}

elseif ( $acao == "HE_C" ) {	# CADASTRAR HE
        //funSelect($tabela, $campos, $argumentos)
        $tabela = funSelect('tb_func', '*', 'ORDER BY NOME');
	?>
		<h4 class='p-2 m-2 bg-secondary text-warning text-center'>Cadastrar Horas Extras</h4>
		<form action='Index.php?opc=C&acao=HE_I' method='post'>
		<div class='row'>
			<div class='col-4'>
				<h6 class='text-center text-secondary' > Funcionário: 
					<select name='matr' required>
						<option class='text-warning' value='' disabled selected>Selecione...</option>
                        <?php
                            for($i=0;$i<count($tabela);$i++){
						       echo "<option class='text-warning' value='". $tabela[$i]['MATRICULA']. "'>".$tabela[$i]['NOME'] ."</option>";
                            }
                        ?>
					</select> </h6>
			</div>
            <div class='col-4'>
				<h6 class='text-center text-secondary'> Data: <input type='date' name='data_he' required /> </h6>
			</div>
            <div class='col-4'>
				<h6 class='text-center text-secondary'> Quantidade de Horas <input type='number' name='qtd_horas' min='1' max='9999' value='0' required /></h6>
			</div>			
		</div>				
		<h6 class='text-center'> <input class='btn btn-warning text-white' type='submit' value='Cadastrar' /> </h6>
		</form>
	<?php
	}

	elseif ( $acao == "HE_I" ) {	# INCLUIR HE
		$matr = $_POST['matr'];
        $data_he = $_POST['data_he'];
        $qtd_horas = $_POST['qtd_horas'];
        
        $campos= 'MATRICULA, DATA_HE, QTD_HORAS';
        $valores = "'$matr','$data_he','$qtd_horas'";   
        //funInsert($tabela, $campos, $valores)    
		if(funInsert('tb_he', $campos, $valores))
			echo "<p class='p-2 m-2 bg-success text-white'>Hora Extra cadastrada com sucesso!</p>";
		 else
			echo "<p class='p-2 m-2 bg-danger text-white'>Erro ao cadastrar Hora Extra!</p>";

		echo "<p class='m-2'><input class='btn btn-warning text-white' type='submit' value='Voltar' onclick='history.go(-1)' /></p>";
	}
    
   
	elseif ( $acao == "HE_E" ) {	# EDITAR HE
         $campos = "tb_he.*,NOME, SETOR";
        $argumentos= "WHERE tb_he.matricula = tb_func.matricula ORDER BY NOME";
        //funSelect($tabela, $campos, $argumentos)
		 	$tabela =funSelect("tb_he,tb_func", $campos, $argumentos);
		
		?>
		<h5 class='p-2 m-2 bg-secondary text-warning text-center'>Horas Extras:</h5>
			<table class='m-2 w-75 mx-auto table table-striped table-dark text-warning'>
					<thead class='text-center'>
					<tr>
						<th scope='col'>Matrícula</th>
			 			<th scope='col'>Nome</th>
			 			<th scope='col'>Setor</th>
			 			<th scope='col'>Data</th>
			 			<th scope='col'>Qtd Horas</th>
					</tr>
				</thead>
		<?php			
                for($i=0;$i<count($tabela);$i++){
        			
					echo "<tr class='text-center'>
							<td scope='col'>". $tabela[$i]['MATRICULA'] ."</td>
							<td scope='col'>". $tabela[$i]['NOME'] ."</td>
							<td scope='col'>". $tabela[$i]['SETOR'] ."</td>
							<td scope='col'>". date("d/m/Y", strtotime($tabela[$i]['DATA_HE'])) ."</td>
							<td scope='col'>". $tabela[$i]['QTD_HORAS'] ."</td>
							<td scope='col'><a href='Index.php?opc=C&acao=HE_M&reg=". $tabela[$i]['REG'] ."' ><img src='Imagens/alterar.png' alt='Alterar' /></a></td>
							<td scope='col'><a href='Index.php?opc=C&acao=HE_X&reg=". $tabela[$i]['REG'] ."' ><img src='Imagens/excluir.png' alt='Excluir' /></a></td>
						</tr>";
                }
		echo "</table>";			
	}

	elseif ( $acao == "HE_M" ) {	# MODIFICAR HE
		$reg = $_GET['reg'];
        
        $argumentos = " WHERE REG = '$reg'";
        //funSelect($tabela, $campos, $argumentos)
        $tabela = funSelect('tb_he', '*', $argumentos);
        $tabela_func = funSelect('tb_func', '*', 'ORDER BY NOME');
		
		echo "<h4 class='p-2 m-2 bg-secondary text-warning text-center'>Alterar Hora Extra</h4>
		<form action='Index.php?opc=C&acao=HE_U&reg=$reg' method='post'>
        
        <div class='row'>
			<div class='col-4'>
				<h6 class='text-center text-secondary' > Funcionário: 
					<select name='matr' required>";                        
                            for($i=0; $i< count($tabela_func); $i++)
                               if($tabela_func[$i]['MATRICULA'] == $tabela[0]['MATRICULA'])
						          echo "<option class='text-warning' value='". $tabela_func[$i]['MATRICULA']. "' selected>".
                                        $tabela_func[$i]['NOME'] ."</option>";
                               else
                                  echo "<option class='text-warning' value='". $tabela_func[$i]['MATRICULA']. "'>".
                                        $tabela_func[$i]['NOME'] ."</option>";
					echo "</select> </h6>
			</div>
            <div class='col-4'>
				<h6 class='text-center text-secondary'> Data: <input type='date' name='data_he' value='". $tabela[0]['DATA_HE'] ."' required /> </h6>
			</div>
            <div class='col-4'>
				<h6 class='text-center text-secondary'> Quantidade de Horas <input type='number' name='qtd_horas' min='1' max='9999' value='". $tabela[0]['QTD_HORAS'] ."' required /></h6>
			</div>			
		</div>
			
		<h6 class='text-center'> <input class='btn btn-warning text-white' type='submit' value='Alterar' /> </h6>
		</form>";				
	}

	elseif ( $acao == "HE_U" ) {	# UPDATE HE
		$reg = $_GET['reg'];
        
        $matr = $_POST['matr'];
        $data_he = $_POST['data_he'];
        $qtd_horas = $_POST['qtd_horas'];
        
        
        $alteracoes = " MATRICULA = '$matr',
                        DATA_HE = '$data_he', 
                        QTD_HORAS = '$qtd_horas' ";
        
        $argumentos = " WHERE REG = '$reg' ";
        //funUpdate($tabela, $alteracoes, $argumentos)
        if(funUpdate('tb_he', $alteracoes, $argumentos))		 
			echo "<p class='p-2 m-2 bg-success text-white'>Hora Extra alterada com sucesso!</p>";		
	   else 
			echo "<p class='p-2 m-2 bg-danger text-white'>Erro ao alterar Hora Extra!</p>";
		
		echo "<p class='m-2'><input class='btn btn-warning text-white' type='submit' value='Voltar' onclick=location.replace('Index.php?opc=C&acao=HE_E') /></p>";
	}

	elseif ( $acao == "HE_X" ) {	# DELETE HE
		$reg = $_GET['reg'];
        
        
        //funDelete($tabela, $argumentos)
				
			echo "<p class='p-2 m-2 bg-success text-white'>Hora Extra excluída com sucesso!</p>";
		 
			echo "<p class='p-2 m-2 bg-danger text-white'>Erro ao excluir Hora Extra!</p>";
		
		echo "<p class='m-2'><input class='btn btn-warning text-white' type='submit' value='Voltar' onclick=location.replace('Index.php?opc=C&acao=HE_E') /></p>";		
	}

	
}