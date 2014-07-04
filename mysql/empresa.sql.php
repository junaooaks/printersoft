<title>WebCom</title>
<?php
if (basename($_SERVER["PHP_SELF"]) == "empresa.sql.php") {
	die("Este arquivo nao pode ser acessado diretamente.");
}

//fazer select para verificar se cliente ja cadastrado
$filtro = array('cnpj'=>$cnpj);
$consulta = $pdo->prepare("SELECT * FROM empresa WHERE cnpj = :cnpj");
$consulta->execute($filtro);

//contar numero de linha de retorno
$cont = $consulta->rowCount(); 
if ($cont >= 1){
	//fazer update
	$fil = array('nome'=>$nome, 'cnpj'=>$cnpj, 'endereco'=>$endereco, 'numero'=>$numero, 'cidade'=>$cidade, 'estado'=>$uf,'cep'=>$cep, 'telefone'=>$telefone, 'email'=>$email);
	
	$up = $pdo->prepare("UPDATE empresa SET nome = :nome, endereco = :endereco, numero = :numero, cidade = :cidade, estado = :estado, cep = :cep, telefone = :telefone, email = :email WHERE cnpj = :cnpj");
	
	$up->execute($fil);
	
echo "<script type='text/javascript'> window.alert('ALTERADO COM SUCESSO'); history.go(-1);</script>";
exit();	
}elseif(($cont == '') and ($flag == '1')){
	
	//inserir dados no banco de dados
$sql = $pdo->prepare("INSERT INTO empresa (nome, cnpj, endereco, numero, cidade, estado, cep, telefone, email)
			 VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");

$sql->execute( array( $nome, $cnpj, $endereco, $numero, $cidade, $uf, $cep, $telefone, $email ) );
echo "<script type='text/javascript'> window.alert('CADASTRADO COM SUCESSO'); history.go(-1);</script>";
exit();		

}else{

/******pegar o resultado ****************/
$filtro = array('cnpj'=>$cnpj);
$sele = $pdo->prepare("SELECT * FROM empresa");
$sele->execute($filtro);
 while($row = $sele->fetch())
        {
		    	$nome     = utf8_encode($row['nome']);
			$cnpj     = utf8_encode($row['cnpj']);
			$endereco = utf8_encode($row['endereco']);
			$numero   = utf8_encode($row['numero']);
			$cidade   = utf8_encode($row['cidade']);
			$estado   = utf8_encode($row['estado']);
			$cep      = utf8_encode($row['cep']);
			$telefone = utf8_encode($row['telefone']);
			$email    = utf8_encode($row['email']);
		}
/********************************/
}
?>
