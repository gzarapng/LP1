<h3 class='p-2 m-2 bg-dark text-warning text-center'>Gerenciar Funcionários e Horas Extras</h3>
<p class='m-2'>
	<button type="button" class="btn btn-outline-warning" onclick=location.replace('Index.php?opc=G&acao=B')>Buscar Funcionários</button>
	<button type="button" class="btn btn-outline-warning" onclick=location.replace('Index.php?opc=G&acao=R')>Gerar Relatórios</button>
</p> 			
<?php

if ( isset($_GET['acao'])) {
	$acao = $_GET['acao'];

	if ( $acao == "B" )	{	# BUSCAR FUNCIONARIOS
		?>
		<h4 class='p-2 m-2 bg-secondary text-warning text-center'>Buscar Funcionários</h4>
		<form action='Index.php?opc=G&acao=L' method='post'>
			<h6 class='text-center text-secondary'> Nome: 
					<input type='text' name='nome' size='40' maxlength='40' />
			</h6>
			<h6 class='text-center text-secondary' > Setor: 
				<select name='setor'>
					<option class='text-warning' value='' disabled selected>Selecione...</option>
					<option class='text-warning' value='Almoxarifado'>Almoxarifado</option> 
					<option class='text-warning' value='Contabilidade'>Contabilidade</option> 
					<option class='text-warning' value='Logística'>Logística</option>
				</select> </h6>
			<h6 class='text-center text-secondary'> Sexo: 
					<input type='radio' name='sexo' value='M' /> Masculino
					<input type='radio' name='sexo' value='F' /> Feminino </h6>
			<h6 class='text-center text-secondary'> Estágio? 
					<input type='radio' name='estagio' value='1' /> Sim
					<input type='radio' name='estagio' value='0' /> Não </h6>

			<h6 class='text-center'> <input class='btn btn-warning text-white' type='submit' value='Buscar' /> 
				<input class='btn btn-warning text-white' type='reset' value='Limpar' /></h6>
		</form>
		<?php
	}

	elseif ( $acao == "L" )	{	# LISTAR 
        $argumentos = " WHERE 1 = 1 ";

        if ( $_POST['nome'] != '' ) {
            $nome = $_POST['nome'];
            $argumentos = $argumentos . " AND NOME LIKE '%$nome%' ";
        }
        if ( isset($_POST['setor']) ) {
            $setor = $_POST['setor'];
            $argumentos = $argumentos . " AND SETOR = '$setor' ";
        }
        if ( isset($_POST['sexo']) ) {
            $sexo = $_POST['sexo'];
            $argumentos = $argumentos . " AND SEXO = '$sexo' "; 
        }
        if ( isset($_POST['estagio']) ) {
            $estagio = $_POST['estagio'];
            $argumentos = $argumentos . " AND ESTAGIO = '$estagio' ";
        }
        $argumentos = $argumentos . " ORDER BY NOME ";

        $tabela = funSelect('tb_func', '*', $argumentos);
	
		?>
		<h4 class='p-2 m-2 bg-secondary text-warning text-center'>Funcionários Localizados</h4>
		
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
            for ($i=0; $i<count($tabela);$i++) {
				echo "<tr class='text-center'>
						<td scope='col'>". $tabela[$i]['MATRICULA'] ."</td>
						<td scope='col'>". $tabela[$i]['NOME'] ."</td>
						<td scope='col'>". $tabela[$i]['SETOR'] ."</td>
						<td scope='col'>". date("d/m/Y", strtotime($tabela[$i]['NASCIMENTO'])) ."</td>
						<td scope='col'>". str_replace('M', 'Masc', str_replace('F', 'Fem', $tabela[$i]['SEXO'] )) ."</td>
						<td scope='col'><input type='checkbox' ";
						if ( $tabela[$i]['ESTAGIO'] ) 
							echo " checked ";
						echo " disabled /></td>
						<td scope='col'>R$ ". number_format($tabela[$i]['SALARIO'],2,',','.') ."</td>
					</tr>";
            }
        ?>   
		</table>
		<p class='m-2'><input class='btn btn-warning text-white' type='submit' value='Voltar' onclick=location.replace('Index.php?opc=G&acao=B') /></p>

		<?php
	}

	elseif ( $acao == "R" )	{	# GERAR RELATORIOS
		?>
		<h4 class='p-2 m-2 bg-secondary text-warning text-center'>Gerar Relatórios</h4>
		<table class='m-2 w-50 mx-auto table text-warning'>
			<tr>
				<td scope="col">
					<form action='Index.php?opc=G&acao=R&rel=REL_Setor' method='post'>
					<h6 class='text-center text-secondary'> Setor: 
						<select name='setor' required>
							<option class='text-warning' value='' disabled selected>Selecione...</option>
							<option class='text-warning' value='Almoxarifado'>Almoxarifado</option> 
							<option class='text-warning' value='Contabilidade'>Contabilidade</option> 
							<option class='text-warning' value='Logística'>Logística</option>
						</select> </h6></td>
				<td scope="col">		
					<input class='btn btn-warning text-white' type='submit' value='Gerar' />
					</form>
				</td>
			</tr>
			<tr>
				<td scope="col">
					<form action='Index.php?opc=G&acao=R&rel=REL_Estagio' method='post'>
						<h6 class='text-center text-secondary'> Estágio? 
								<input type='radio' name='estagio' value='1' required /> Sim
								<input type='radio' name='estagio' value='0' required /> Não
					</h6></td>
				<td scope="col">
					<input class='btn btn-warning text-white' type='submit' value='Gerar' /> 
					</form>
				</td>
			</tr>
			<tr>
				<td scope="col">
					<form action='Index.php?opc=G&acao=R&rel=REL_HE' method='post'>
					<h6 class='text-center text-secondary'> Horas Extras - Mês:                         
						<select name='mes' required>
							<option class='text-warning' value='' disabled selected>Selecione...</option>
							<option class='text-warning' value='1'>Janeiro</option> 
							<option class='text-warning' value='2'>Fevereiro</option> 
							<option class='text-warning' value='3'>Março</option> 
							<option class='text-warning' value='4'>Abril</option> 
							<option class='text-warning' value='5'>Maio</option> 
							<option class='text-warning' value='6'>Junho</option> 
							<option class='text-warning' value='7'>Julho</option> 
							<option class='text-warning' value='8'>Agosto</option> 
							<option class='text-warning' value='9'>Setembro</option> 
							<option class='text-warning' value='10'>Outubro</option> 
							<option class='text-warning' value='11'>Novembro</option> 
							<option class='text-warning' value='12'>Dezembro</option> 
						</select> 
                        Ano: <input type='number' name='ano' min='1900' max='9999' value="<?php echo date('Y'); ?>" required /></h6></td>
				<td scope="col">		
					<input class='btn btn-warning text-white' type='submit' value='Gerar' />
					</form>
				</td>
			</tr>
		</table>
		<?php

		if ( isset($_GET['rel'])) {		# EXIBE O RELATORIO
			if ( $_GET['rel'] ==  'REL_Setor' || $_GET['rel'] ==  'REL_Estagio'  ) {
				if ( $_GET['rel'] == 'REL_Setor' ) {
					$setor = $_POST['setor'];
	                $argumentos = " WHERE SETOR = '$setor' ORDER BY NOME ";
	                $titulo = "Relatório Total por Setor - $setor ";
				}
				elseif ( $_GET['rel'] == 'REL_Estagio' ) {
					$estagio = $_POST['estagio'];
	                $argumentos = " WHERE ESTAGIO = '$estagio' ORDER BY NOME ";
	                if ( $estagio == TRUE )
	                    $titulo = "Relatório Total de Estagiários";
	                else
	                    $titulo = "Relatório Total de Funcionários Efetivos";
				}
				$tabela = funSelect("tb_func", "*", $argumentos);		
			
			?>
			<!-- Modal -->
			<div class='modal fade' id='ModalFunc' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
				  <div class='modal-dialog modal-xl' role='document'>
				    <div class='modal-content'>
				      <div class='modal-header'>
				        <h5 class='modal-title text-warning'>Relatório</h5>
				        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
				          <span aria-hidden='true'>&times;</span>
				        </button>
				      </div>
				      <div class='modal-body'>
				      	<h4 class='p-2 m-2 bg-secondary text-warning text-center'> <?php echo $titulo ; ?> </h4>
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
                            $total = 0;
                            for ($i = 0; $i < count($tabela);$i++) {
								echo "<tr class='text-center'>
										<td scope='col'>". $tabela[$i]['MATRICULA'] ."</td>
										<td scope='col'>". $tabela[$i]['NOME'] ."</td>
										<td scope='col'>". $tabela[$i]['SETOR'] ."</td>
										<td scope='col'>". date("d/m/Y", strtotime($tabela[$i]['NASCIMENTO'])) ."</td>
										<td scope='col'>". $tabela[$i]['SEXO'] ."</td>
										<td scope='col'><input type='checkbox' ";
				                        if ($tabela[$i]['ESTAGIO'])
								            echo " checked ";
										echo " disabled /></td>
										<td scope='col'>R$ ". number_format($tabela[$i]['SALARIO'],2,',','.') ."</td>
									</tr>";
                                $total = $total + $tabela[$i]['SALARIO'];
                            }
							?>
							<tr class='text-center'>
									<th scope='col'></th>
						 			<th scope='col'></th>
						 			<th scope='col'></th>
						 			<th scope='col'></th>
						 			<th scope='col'></th>
						 			<th scope='col'>Total: </th>
						 			<th scope='col'>R$ <?php echo number_format($total,2,',','.'); ?></th>
							</tr>
						</table>
				      </div>
				      <div class='modal-footer'>
				        <button type='button' class='btn btn-warning text-white' data-dismiss='modal'>Close</button>
				      </div>
				    </div>
				  </div>
				</div>

				<script>
					$('#ModalFunc').modal();
				</script>
			
			<?php
            }
            
            elseif ( $_GET['rel'] == 'REL_HE' ) {
				$mes = $_POST['mes'];
                $ano = $_POST['ano'];
                
                $campos = "tb_he.*, NOME, SETOR ";
                $argumentos = "WHERE tb_he.matricula = tb_func.matricula
                                AND MONTH(DATA_HE) = '$mes'
                                AND YEAR(DATA_HE) = '$ano'
                       ORDER BY NOME";         
                //funSelect($tabela, $campos, $argumentos)
                $tabela = funSelect('tb_he, tb_func', $campos, $argumentos);
                $titulo = "Relatório de Horas Extras - $mes / $ano";
                
                ?>

                <!-- Modal -->
			<div class='modal fade' id='ModalFunc' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
				  <div class='modal-dialog modal-xl' role='document'>
				    <div class='modal-content'>
				      <div class='modal-header'>
				        <h5 class='modal-title text-warning'>Relatório</h5>
				        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
				          <span aria-hidden='true'>&times;</span>
				        </button>
				      </div>
				      <div class='modal-body'>
				            <h4 class='p-2 m-2 bg-secondary text-warning text-center'> <?php echo $titulo ; ?> </h4>
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
				                $total = 0;
				                for ( $i = 0; $i < count($tabela); $i++ ) {
				                    echo "<tr class='text-center'>
				                            <td scope='col'>". $tabela[$i]['MATRICULA'] ."</td>
				                            <td scope='col'>". $tabela[$i]['NOME'] ."</td>
				                            <td scope='col'>". $tabela[$i]['SETOR'] ."</td>
											<td scope='col'>". date("d/m/Y", strtotime($tabela[$i]['DATA_HE'])) ."</td>
											<td scope='col'>". $tabela[$i]['QTD_HORAS'] ."</td>
				                        </tr>";
				                    $total = $total + $tabela[$i]['QTD_HORAS'];
                                }
				                ?>
				                <tr class='text-center'>
				                        <th scope='col'></th>
				                        <th scope='col'></th>
				                        <th scope='col'></th>
				                        <th scope='col'>Total: </th>
				                        <th scope='col'><?php echo $total; ?></th>
				                </tr>
				            </table>   
            		</div>
				      <div class='modal-footer'>
				        <button type='button' class='btn btn-warning text-white' data-dismiss='modal'>Close</button>
				      </div>
				    </div>
				  </div>
				</div>

				<script>
					$('#ModalFunc').modal();
				</script>            
                <?php
			}	   
		}
	}
}