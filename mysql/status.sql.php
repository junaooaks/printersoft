<title>SISGEW MIKROTIK</title>
<?php
if (basename($_SERVER["PHP_SELF"]) == "status.sql.php") {
	die("Este arquivo nao pode ser acessado diretamente.");
}
/*
//fazer select para verificar se cliente ja cadastrado
$filtro = array('cnpj'=>$cnpj);
$consulta = $pdo->prepare("SELECT * FROM empresa WHERE cnpj = :cnpj");
$consulta->execute($filtro);

}
*/
//excluir arquivos da tabela cedente

$codExcluir = $_REQUEST[codExcluir];

if ($codExcluir<>''){
	$filtro = array('cod'=>$codExcluir);
	$sql = $pdo->prepare("DELETE FROM status WHERE idStatus = :cod");
	
	$sql->execute($filtro);
	
	echo "<script type='text/javascript'> window.alert('EXCLUIDO COM SUCESSO');</script>";
	echo "<meta http-equiv='refresh' content='0;URL=consulta.php'>";
exit();
	
	}

$flag = $_REQUEST[flag];
$codAlterar = $_REQUEST[codAlterar];

//alterar tados na tabela
if (($flag == 2) and ($codAlterar<>'')){
	//fazer update
	$fil = array('id'=>$codAlterar, 'grupo'=>$grupo);
	
	$up = $pdo->prepare("UPDATE status SET descricao = :grupo WHERE idStatus = :id");
	
	$up->execute($fil);
	
echo "<script type='text/javascript'> window.alert('ALTERADO COM SUCESSO');</script>";
echo "<meta http-equiv='refresh' content='0;URL=consulta.php'>";
exit();	
}/*elseif(($cont == '') and ($flag == '1')){*/
	
	//inserir dados no banco de dados
if ($flag == '1'){

$sql = $pdo->prepare("INSERT INTO status (descricao) VALUES (?)");

$sql->execute( array( $grupo) );
echo "<script type='text/javascript'> window.alert('CADASTRADO COM SUCESSO');</script>";
echo "<meta http-equiv='refresh' content='0;URL=consulta.php'>";
exit();

}else{
	if ($codAlterar <>''){
		
		$filtro = array('id'=>$codAlterar);
		$sele = $pdo->prepare("SELECT * FROM status WHERE idStatus = :id");
		$sele->execute($filtro);
		
		while($row = $sele->fetch())
        {
		    $id		  = $row['idStatus'];
			$grupo    = utf8_encode($row['descricao']);
			
			}
	}
	if(($flag <> 2) and ($flag<>4) and ($codAlterar=='')){
		
/******pegar o resultado ****************/
$sele = $pdo->prepare("SELECT * FROM status");
$sele->execute();
		
				
 while($row = $sele->fetch())
        {
		    $id		  = $row['idStatus'];
			$grupo  = utf8_encode($row['descricao']);
			
			//cor das linha
			$class = 'odd';
		
		echo "
	
		<tr class='$class'>
    	<th nowrap='nowrap'>$grupo</th>
    	<td align='center'><a href='index.php?codAlterar=" . $id . "'><img src='../imagem/botao_edit.png' border=' 0'/></a></td>
		<td align='center'><a href='javascript:;' onClick='confirma($id)'><img src='../imagem/botao_drop.png' border='0' /></a></td>
    	</tr>";
		
		if ($class=='odd'){$class='even';}else{$class = 'odd';}	
		
			
		}}
/********************************/
}

?>
