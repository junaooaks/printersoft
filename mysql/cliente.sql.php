<title>PRINTER Software</title>

<?php
if (basename($_SERVER["PHP_SELF"]) == "cliente.sql.php") {
	die("Este arquivo nao pode ser acessado diretamente.");
}	

$consulta 	 = utf8_decode($_REQUEST['consulta']);
$solicitante = utf8_decode($_REQUEST['solicitante']);
$flag = $_REQUEST['flag'];
$codAlterar = $_REQUEST['codAlterar'];
$empresa= $_REQUEST['empresa'];
$nome= $_REQUEST['nome'];

$endereco= $_REQUEST['endereco'];
$entrega= $_REQUEST['entrega'];
$bairro= $_REQUEST['bairro'];
$cidade= $_REQUEST['cidade'];
$estado= $_REQUEST['estado'];
$cep= $_REQUEST['cep'];
$telefoneCom= $_REQUEST['telefoneCom'];
$telefone= $_REQUEST['telefone'];
$celular= $_REQUEST['celular'];
$email= $_REQUEST['email'];
$adicionais= $_REQUEST['adicionais'];

if ($consulta != '' or $solicitante != ''){
	$sele = $pdo->prepare("SELECT * FROM cliente WHERE pessoaFisica LIKE '%".trim($consulta)."%' 
							AND pessoaJuridica LIKE '%".trim($solicitante)."%'");
	$sele->execute();
		
				
 while($row = $sele->fetch())
        {
		    $id		  = utf8_encode($row['idCliente']);
			$nome     = utf8_encode($row['pessoaFisica']);
			$empresa  = utf8_encode($row['pessoaJuridica']);
			
			
			//cor das linha
			$class = 'odd';
		
		echo "
	
		<tr class='$class'>
    	<td>$empresa</td>
		<td>$nome</td>
		<td align='center'><a href='index.php?codAlterar=" . $id . "'><img src='../imagem/botao_edit.png' border=' 0'/></a></td>
    		<td align='center'><a href='javascript:;' onClick='confirma($id)'><img src='../imagem/botao_drop.png' border='0' /></a></td>
		<td align='center'><a href='../os/index.php?incluir=" . $id . "'><img src='../imagem/ordem.png' border=' 0'/></a></td>

    	</tr>";
		
		if ($class=='odd'){$class='even';}else{$class = 'odd';}	
		
			
		}
	exit();
	}
//excluir arquivos da tabela cedente

$codExcluir = $_REQUEST['codExcluir'];

if ($codExcluir<>''){
	
	$filtro = array('cod'=>$codExcluir);
	$sql = $pdo->prepare("DELETE FROM cliente WHERE idCliente = :cod");
	
	$sql->execute($filtro);
	
	echo "<script type='text/javascript'> window.alert('EXCLUIDO COM SUCESSO');</script>";
	echo "<meta http-equiv='refresh' content='0;URL=consulta.php'>";
exit();
	
	}

//alterar tados na tabela


if (($flag == 2) and ($codAlterar<>'')){
	//fazer update
	$fil = array
	('id'=>$codAlterar,
	 'empresa'=>$empresa,
	 'nome'=>$nome,
	 'cpf'=>$cpf_enviado,
	 'cnpj'=>$cnpj,
	 'endereco'=>$endereco,
	 'entrega'=>$entrega,
	 'bairro'=> $bairro,
	 'cidade'=>$cidade,
	 'estado'=>$estado,
	 'cep'=>$cep,
	 'telefonecom'=>$telefoneCom,
	 'telefone'=>$telefone,
	 'celular'=>$celular, 
	 'email'=>$email,
	 'adicionais'=>$adicionais
	 
	 );
	
	$up = $pdo->prepare("UPDATE cliente SET 
	pessoaJuridica=:empresa, pessoaFisica=:nome,
	cnpj=:cnpj, cpf=:cpf, 
	endereco=:endereco,	entrega=:entrega, 
	bairro=:bairro, cidade =:cidade, 
	estado=:estado, cep=:cep, 
	telResidencial=:telefone, telComercial=:telefonecom, 
	celular=:celular,  
	email=:email,
	adicionais=:adicionais
	WHERE idCliente = :id");
		
	$up->execute($fil);
	
echo "<script type='text/javascript'> window.alert('ALTERADO COM SUCESSO');</script>";
echo "<meta http-equiv='refresh' content='0;URL=consulta.php'>";
exit();	
}/*elseif(($cont == '') and ($flag == '1')){*/
	
	//inserir dados no banco de dados
if ($flag == '1'){


$sqll= $pdo->prepare("INSERT INTO cliente (pessoaJuridica, pessoaFisica, cpf, cnpj, endereco, entrega, bairro, cidade, estado, cep, telComercial, telResidencial, celular, email, adicionais) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
		 
$sqll->execute(array ($empresa, $nome, $cpf_enviado, $cnpj, $endereco, $entrega, $bairro, $cidade, $estado, $cep, $telefoneCom, $telefone, $celular, $email, $adicionais));

echo "<script type='text/javascript'> window.alert('CADASTRADO COM SUCESSO');</script>";
echo "<meta http-equiv='refresh' content='0;URL=consulta.php'>";
exit();

}else{
	if ($codAlterar <>''){
		
		$filtro = array('id'=>$codAlterar);
		$sele = $pdo->prepare("SELECT * FROM cliente WHERE idCliente = :id");
		$sele->execute($filtro);
		
		while($row = $sele->fetch())
        {
		    	$id	        = $row['idCliente'];
			$empresa	= utf8_encode($row['pessoaJuridica']);
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
	if(($flag <> 2) and ($flag<>4) and ($codAlterar=='')){
		
/******pegar o resultado ****************/
$sele = $pdo->prepare("SELECT * FROM cliente ORDER BY CAST(idCliente as SIGNED) LIMIT 100");
$sele->execute();
		
				
 while($row = $sele->fetch())
        {
		    $id		  = utf8_encode($row['idCliente']);
			$empresa  = utf8_encode($row['pessoaJuridica']);
			$nome     = utf8_encode($row['pessoaFisica']);
			
			
			//cor das linha
			$class = 'odd';
		
		echo "
	
		<tr class='$class'>
    	<td>$empresa</td>
		<td>$nome</td>
		<td align='center'><a href='index.php?codAlterar=" . $id . "'><img src='../imagem/botao_edit.png' border=' 0'/></a></td>
    	<td align='center'><a href='javascript:;' onClick='confirma($id)'><img src='../imagem/botao_drop.png' border='0' /></a></td>
		<td align='center'><a href='../os/index.php?incluir=" . $id . "'><img src='../imagem/ordem.png' border=' 0'/></a></td>
    	</tr>";
		
		if ($class=='odd'){$class='even';}else{$class = 'odd';}	
		
			
		}}
/********************************/
}

?>
