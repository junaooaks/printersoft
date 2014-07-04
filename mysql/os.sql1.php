<?php
if (basename($_SERVER["PHP_SELF"]) == "os.sql.php") {
	die("Este arquivo nao pode ser acessado diretamente.");
exit();
}

//fechar os
//alterar tados na tabela
if (($radio <>'') and ($ospirata<>'')){
	
	//fazer update
	$fil = array
	('id'=>$ospirata,
	 'fechar'=>$radio
	
	 
	 );
	
	$up = $pdo->prepare("UPDATE os SET 	
						situacao=:fechar
						WHERE idOs = :id");
		
	$up->execute($fil);
	
echo "<script type='text/javascript'> window.alert('O.S FECHADO COM SUCESSO');</script>";

echo "<meta http-equiv='refresh' content='0;URL=imprimir_fechar.php?codcliente=$cli & codos=$ospirata'>";
exit();	
}



if ($codExFechar<>''){
	
	$filtro = array('d'=>$codExFechar);
	$sql = $pdo->prepare("DELETE FROM pecas WHERE idPeca = :d");
	
	$sql->execute($filtro);
	
	echo "<script type='text/javascript'> window.alert('EXCLUIDO COM SUCESSO');</script>";
	echo "<meta http-equiv='refresh' content='0;URL=subgrupo.php?os=$oss & fechar=9 & cliente=$clie'>";
exit();
}
if (($fechar<>'')and($os<>'')){
	
		if (empty($peca)or empty($valor)){
			echo "<script type='text/javascript'> window.alert('PREENCHA TODOS OS CAMPOS(*)'); history.go(-1);</script>";
			exit();
			}
		$s= $pdo->prepare("INSERT INTO pecas (codOs, codProduto, valor, garantia) 
					  	    VALUES (?,?,?,?)");
		 
		$s->execute(array ($os, $peca, $valor, $garantia));

echo "<script type='text/javascript'> window.alert('REGISTRADO COM SUCESSO ');</script>";
echo "<meta http-equiv='refresh' content='0;URL=subgrupo.php?os=$os & cliente=$clie & fechar=9'>";
exit();	
	
	}


$f= array('la'=>$codos);
		$sele = $pdo->prepare("SELECT * FROM laudo, os WHERE codOs = :la AND os.idOs = laudo.codOs");
		$sele->execute($f);
		
		while($row = $sele->fetch())
        {
		    $idl	        = $row['idLaudo'];
			$codos	        = $row['codOs'];
			$codcli			= $row['codCliente'];
			$valor	        = utf8_encode($row['valor']);
			$prazo	        = utf8_encode($row['prazo']);
			$disp	        = utf8_encode($row['disponibilidade']);
			$dia	        = utf8_encode($row['laudo']);
			$hora	        = utf8_encode($row['hora']);
			$st	            = utf8_encode($row['status']);
			$pro            = utf8_encode($row['aprovacao']);

		}


if (($chat<>'')and ($l=='')){
$s= $pdo->prepare("INSERT INTO laudo (codOs, codCliente, valor, prazo, disponibilidade, laudo, hora, status) 
					  VALUES (?,?,?,?,?,?,?,?)");
		 
$s->execute(array ($os, $cliente, $valor, $prazo, $dis, $laudo, $time, $radio));

//ALTERAR APROVAÇÃO
$la = array
	('ospirata'=>$os,
	 'pro'=>$pro
	 );
	
	$up = $pdo->prepare("UPDATE os SET 	
						aprovacao=:pro			
						WHERE idOs = :ospirata");
		
	$up->execute($la);
	
echo "<script type='text/javascript'> window.alert('CHAT REGISTRADO COM SUCESSO');</script>";
echo "<meta http-equiv='refresh' content='0;URL=consulta.php'>";
exit();
	}

if(($l<>'')and ($os<>'')){
		
	$la = array
	('idla'=>$l,
	 'valorr'=>$valor,
	 'prazzo'=>$prazo,
	 'dis'=>$dis,
	 'laudo'=>$laudo,
	 'codsta'=>$radio
	 	 
	 );
	
	$up = $pdo->prepare("UPDATE laudo SET 	
						valor=:valorr,
						prazo=:prazzo, 
						disponibilidade=:dis, 
						laudo=:laudo,  
						status=:codsta						
						WHERE idLaudo = :idla");
		
	$up->execute($la);
	
	$a = array
	('ospirata'=>$os,
	 'pro'=>$pro
	 );
	
	$up = $pdo->prepare("UPDATE os SET 	
						aprovacao=:pro			
						WHERE idOs = :ospirata");
		
	$up->execute($a);
	
echo "<script type='text/javascript'> window.alert('CHAT ALTERADO COM SUCESSO');</script>";
echo "<meta http-equiv='refresh' content='0;URL=consulta.php'>";
exit();	

		}


if (($codcliente <>'') and ($codos <>'')){

		$fi = array('id'=>$codcliente, 
					'cos'=>$codos
					);
		$sel = $pdo->prepare("SELECT * FROM cliente, os, equipamento, marca, atendimento, acessorio, usuarios, status 
							  WHERE idCliente=:id 
							  AND idOs=:cos 
							  AND os.codEquipamento=equipamento.idEquipamento
							  AND os.codMarca=marca.idMarca
							  AND os.codAtendimento=atendimento.idAtendimento
							  AND os.codAcessorio=acessorio.idAcessorio
							  AND os.codTecnico=usuarios.idUsuario
							  AND os.codStatus=status.idStatus");
		$sel->execute($fi);
		
		while($row = $sel->fetch())
        {
		    $cod	        = $row['idOs'];
			$id		        = $row['idCliente'];
			$empresa	    = utf8_encode($row['pessoaJuridica']);
			$nome	        = utf8_encode($row['pessoaFisica']);
			$cpf            = utf8_encode($row['cpf']);
			$cnpj           = utf8_encode($row['cnpj']);
			$endereco       = utf8_encode($row['endereco']);
			$entrega        = utf8_encode($row['entrega']);
			$bairro		    = utf8_encode($row['bairro']);
			$cidade	        = utf8_encode($row['cidade']);
			$uf  	        = utf8_encode($row['estado']);
			$cep	        = utf8_encode($row['cep']);
			$telComercial   = utf8_encode($row['telComercial']);
			$telefone       = utf8_encode($row['telResidencial']);
			$celular        = utf8_encode($row['celular']);
			$email          = utf8_encode($row['email']);
			$adicionais     = utf8_encode($row['adicionais']);
			$situ           = utf8_encode($row['situacao']);
			
			$data           = utf8_encode($row['data']);
			$dataen         = utf8_encode($row['previsao']);
			$modelo			= utf8_encode($row['modelo']);
			$patrimonio     = utf8_encode($row['patrimonio']);
			$serie			= utf8_encode($row['serie']);
			$setor			= utf8_encode($row['setor']);
			$diagnostico	= utf8_encode($row['diagnostico']);
			
			$codequi		= utf8_encode($row['codEquipamento']);
			$codmarca		= utf8_encode($row['codMarca']);
			$codaten		= utf8_encode($row['codAtendimento']);
			$codace			= utf8_encode($row['codAcessorio']);
			$codtec			= utf8_encode($row['codTecnico']);
			$codstatus		= utf8_encode($row['codStatus']);
			
					
			}
			
	}
	
if ($incluir <>''){
		
		$filtro = array('id'=>$incluir);
		$sele = $pdo->prepare("SELECT * FROM cliente WHERE idCliente = :id");
		$sele->execute($filtro);
		
		while($row = $sele->fetch())
        {
		    $id		        = $row['idCliente'];
			$empresa	    = utf8_encode($row['pessoaJuridica']);
			$nome	        = utf8_encode($row['pessoaFisica']);
			$cpf            = utf8_encode($row['cpf']);
			$cnpj           = utf8_encode($row['cnpj']);
			$endereco       = utf8_encode($row['endereco']);
			$entrega        = utf8_encode($row['entrega']);
			$bairro		    = utf8_encode($row['bairro']);
			$cidade	        = utf8_encode($row['cidade']);
			$uf  	        = utf8_encode($row['estado']);
			$cep	        = utf8_encode($row['cep']);
			$telComercial   = utf8_encode($row['telComercial']);
			$telefone       = utf8_encode($row['telResidencial']);
			$celular        = utf8_encode($row['celular']);
			$email          = utf8_encode($row['email']);
			$adicionais     = utf8_encode($row['adicionais']);
			
			}
	
	}
	
$consulta 	 = utf8_decode($_REQUEST['consulta']);
$solicitante = utf8_decode($_REQUEST['solicitante']);

if ($consulta != '' or $solicitante != ''){
	$sele = $pdo->prepare("SELECT * FROM cliente WHERE pessoaFisica LIKE '%".trim($consulta)."%' 
							AND pessoaJuridica LIKE '%".trim($solicitante)."%'");
	$sele->execute();
		
				
 while($row = $sele->fetch())
        {
		    $id		  = $row['idCliente'];
			$nome     = $row['pessoaFisica'];
			$empresa  = $row['pessoaJuridica'];
			
			
			//cor das linha
			$class = 'odd';
		
		echo "
		<tr class='$class'>
    	<td>$empresa</td>
		<td>$nome</td>
		<td align='center'><a href='index.php?incluir=" . $id . "'><img src='../imagem/ordem.png' border=' 0'/></a></td>
		<td align='center'><a href='index.php?codAlterar=" . $id . "'><img src='../imagem/botao_edit.png' border=' 0'/></a></td>
    	</tr>";
		
		if ($class=='odd'){$class='even';}else{$class = 'odd';}	
		}
	exit();
	}
//excluir arquivos da tabela cedente
if ($codExcluir<>''){
	
	$filtro = array('cod'=>$codExcluir);
	$sql = $pdo->prepare("DELETE FROM os WHERE idOs = :cod");
	
	$sql->execute($filtro);
	
	echo "<script type='text/javascript'> window.alert('EXCLUIDO COM SUCESSO');</script>";
	echo "<meta http-equiv='refresh' content='0;URL=consulta.php'>";
exit();
	
	}
	
//exluir e retonar a pagina principal na pesquisa
if ($eexcluir<>''){
	
	$filtro = array('cod'=>$eexcluir);
	$sql = $pdo->prepare("DELETE FROM os WHERE idOs = :cod");
	
	$sql->execute($filtro);
	
	echo "<script type='text/javascript'> window.alert('EXCLUIDO COM SUCESSO');</script>";
	echo "<meta http-equiv='refresh' content='0;URL=../index.php'>";
exit();
	
	}

//alterar tados na tabela
if (($flag == 2) and ($codAlterar<>'')){
	//fazer update
	$fil = array
	('id'=>$codAlterar,
	 'codequi'=>$equipamento,
	 'codmar'=>$marca,
	 'codaten'=>$atendimento,
	 'codace'=>$acessorio,
	 'codtec'=>$tecnico,
	 'codsta'=>$status,
	 'prev'=>$previsao,
	 'modelo'=>$modelo,
	 'patri'=>$patrimonio,
	 'serie'=>$serie,
	 'setor'=>$setor,
	 'adi'=>$adicionais
	 
	 );
	
	$up = $pdo->prepare("UPDATE os SET 	
						codEquipamento=:codequi,
						codMarca=:codmar, 
						codAtendimento=:codaten, 
						codAcessorio=:codace, 
						codTecnico=:codtec, 
						codStatus=:codsta, 
						previsao=:prev, 
						modelo=:modelo, 
						patrimonio=:patri, 
						serie=:serie, 
						setor=:setor, 
						diagnostico=:adi
						WHERE idOs = :id");
		
	$up->execute($fil);
	
echo "<script type='text/javascript'> window.alert('ALTERADO COM SUCESSO');</script>";
echo "<meta http-equiv='refresh' content='0;URL=imprimir.php?codcliente=$codCliente & codos=$codAlterar'>";
exit();	
}/*elseif(($cont == '') and ($flag == '1')){*/
	
	//inserir dados no banco de dados
if ($flag == '1'){
$diag = '0';
$sqll= $pdo->prepare("INSERT INTO os (codCliente, data, codEquipamento, codMarca, codAtendimento, codAcessorio, codTecnico, codStatus, previsao, modelo, patrimonio, serie, setor, diagnostico, situacao) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
		 
$sqll->execute(array ($codCliente, $dataC, $equipamento, $marca, $atendimento, $acessorio, $tecnico, $status, $previsao, $modelo, $patrimonio, $serie, $setor, $adicionais, $diag));

/*pegar o numero da os*/
$see = $pdo->prepare("SELECT * FROM os ORDER BY os.idOs DESC LIMIT 0,1");
		$see->execute();
		
		while($row = $see->fetch())
        {
		    $cod	        = $row['idOs'];
		}
echo "<script type='text/javascript'> window.alert('CADASTRADO COM SUCESSO');</script>";
echo "<meta http-equiv='refresh' content='0;URL=imprimir.php?codcliente=$codCliente & codos=$cod'>";
exit();

}else{
	if ($codAlterar <>''){
		
		$filtro = array('id'=>$codAlterar);
		$sele = $pdo->prepare("SELECT * FROM cliente, os WHERE idCliente = :id AND cliente.idCliente = os.codCliente");
		$sele->execute($filtro);
		
		while($row = $sele->fetch())
        {
		    $cod	        = $row['idOs'];
			$id		        = $row['idCliente'];
			$empresa	    = utf8_encode($row['pessoaJuridica']);
			$nome	        = utf8_encode($row['pessoaFisica']);
			$data           = utf8_encode($row['data']);
			$dataen         = utf8_encode($row['previsao']);
			$sit			= utf8_encode($row['situacao']);
			
			//cor das linha
			$class = 'odd';
		
		 if ($sit==0){$sit = 'ABERTO';}else {$sit = 'FECHADO';}
		
		echo "
		<tr class='$class'>
    	<td>$cod</td>
		<td>$data</td>
		<td>$empresa</td>
		<td>$sit</td>
		<td align='center'><a href='chat.php?codos=" . $cod . " & codcliente=".$id."'><img src='../imagem/chat.jpg' border=' 0'/></a></td>
		";
		if($sit=='ABERTO'){ echo "<td align='center'><a href='index.php?codos=" . $cod . " & codcliente=".$id."'><img src='../imagem/botao_edit.png' border=' 0'/></a></td>";}else{echo "<td align='center'></td>";}
		echo "<td align='center'><a href='javascript:;' onClick='confirma($cod)'><img src='../imagem/botao_drop.png' border='0' /></a></td>
		<td align='center'><a href='fechar.php?codos=" . $cod . " & codcliente=".$id."'><img src='../imagem/fechar.png' border=' 0'/></a></td>
    	</tr>";
		
		if ($class=='odd'){$class='even';}else{$class = 'odd';}	
			
			}
	}
	if(($flag <> 2) and ($flag<>4) and ($codAlterar=='')and ($incluir=='') and ($codcliente=='') and ($codos=='')and ($fechar=='')){
		
/******pegar o resultado ****************/
$sele = $pdo->prepare("SELECT * FROM cliente ORDER BY CAST(idCliente as SIGNED) LIMIT 100");
$sele->execute();
		
				
 while($row = $sele->fetch())
        {
		    $id		  = $row['idCliente'];
			$empresa  = $row['pessoaJuridica'];
			$nome     = $row['pessoaFisica'];
			
			
			//cor das linha
			$class = 'odd';
		
		echo "
	
		<tr class='$class'>
    	<td>".htmlentities($empresa)."</td>
		<td>".htmlentities($nome)."</td>
		<td align='center'><a href='index.php?incluir=". $id ."'><img src='../imagem/ordem.png' border=' 0'/></a></td>
		<td align='center'><a href='alterar.php?codAlterar=". $id ."'><img src='../imagem/pesquisa.png' border=' 0'/></a></td>
    	
    	</tr>";
		
		if ($class=='odd'){$class='even';}else{$class = 'odd';}	
		
			
		}}
/********************************/
}

?>