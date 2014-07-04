<title>SISGEW MIKROTIK</title>
<?php
if (basename($_SERVER["PHP_SELF"]) == "usuario.sql.php") {
	die("Este arquivo nao pode ser acessado diretamente.");
}
/*
//fazer select para verificar se cliente ja cadastrado
$filtro = array('cnpj'=>$cnpj);
$consulta = $pdo->prepare("SELECT * FROM empresa WHERE cnpj = :cnpj");
$consulta->execute($filtro);

}
*/

$codExcluir = $_REQUEST[codExcluir];



//excluir arquivos da tabela cedente
if ($codExcluir<>''){
	$filtro = array('cod'=>$codExcluir);
	$sql = $pdo->prepare("DELETE FROM usuarios WHERE idUsuario = :cod");
	
	$sql->execute($filtro);
	
	echo "<script type='text/javascript'> window.alert('EXCLUIDO COM SUCESSO');</script>";
	echo "<meta http-equiv='refresh' content='0;URL=consulta.php'>";
exit();
	
	}

$flag = $_REQUEST[flag];
$codAlterar = $_REQUEST[codAlterar];

//alterar tados na tabela
if (($flag == 2) and ($codAlterar<>''))
{
	if (empty($senha))
	{
	//fazer update
	$fil = array('id'=>$codAlterar, 
				 'nome'=>$nome, 
				 'login'=>$login, 
				 'email'=>$email, 
				 'acesso'=>$radio, 
				 'tel'=>$tel, 
				 'cel'=>$cel, 
				 'comp'=>$complementar);
	
	$up = $pdo->prepare("UPDATE usuarios SET nome = :nome, login = :login, mail=:email, nivel_acesso=:acesso, telefone=:tel, celular=:cel, complementar=:comp 
						 WHERE idUsuario = :id");
	
	$up->execute($fil);
	
	echo "<script type='text/javascript'> window.alert('ALTERADO COM SUCESSO');</script>";
	echo "<meta http-equiv='refresh' content='0;URL=consulta.php'>";
	exit();	
	}
	else
	{
		//fazer update
	$fill = array('id'=>$codAlterar, 
				 'nome'=>$nome, 
				 'login'=>$login, 
				 'senha'=>$senhaa, 
				 'email'=>$email, 
				 'acesso'=>$radio, 
				 'tel'=>$tel, 
				 'cel'=>$cel, 
				 'comp'=>$complementar);
	
	$up = $pdo->prepare("UPDATE usuarios SET nome=:nome, login=:login, senha=:senha, mail=:email, nivel_acesso=:acesso, telefone=:tel, celular=:cel, complementar=:comp WHERE idUsuario=:id");
	
	$up->execute($fill);
	
	echo "<script type='text/javascript'> window.alert('ALTERADO COM SUCESSO');</script>";
	echo "<meta http-equiv='refresh' content='0;URL=consulta.php'>";
	exit();	
		
		}
}/*elseif(($cont == '') and ($flag == '1')){*/
	
	//inserir dados no banco de dados
if ($flag == '1'){

$sql = $pdo->prepare("INSERT INTO usuarios (nome, login, senha, mail, nivel_acesso, telefone, celular, complementar) 
						VALUES (?,?,?,?,?,?,?,?)");

$sql->execute( array($nome, $login, $senha, $email, $radio, $tel, $cel, $comple) );
echo "<script type='text/javascript'> window.alert('CADASTRADO COM SUCESSO');</script>";
echo "<meta http-equiv='refresh' content='0;URL=consulta.php'>";
exit();

}else{
	if ($codAlterar <>''){
		
		$filtro = array('id'=>$codAlterar);
		$sele = $pdo->prepare("SELECT * FROM usuarios WHERE idUsuario = :id");
		$sele->execute($filtro);
		
		while($row = $sele->fetch())
        {
		    $id		  = utf8_encode($row['idUsuario']);
			$usuario  = utf8_encode($row['nome']);
			$login    = utf8_encode($row['login']);
			$email	  = utf8_encode($row['mail']);
			$acesso	  = utf8_encode($row['nivel_acesso']);
			$tel	  = utf8_encode($row['telefone']);
			$cel	  = utf8_encode($row['celular']);
			$comple	  = utf8_encode($row['complementar']);
			
			}
	}
	if(($flag <> 2) and ($flag<>4) and ($codAlterar=='')){
		
/******pegar o resultado ****************/
$sele = $pdo->prepare("SELECT * FROM usuarios");
$sele->execute();
		
				
 while($row = $sele->fetch())
        {
		    $id		  = $row['idUsuario'];
			$usuario  = $row['nome'];
			$login    = $row['login'];
			
			//cor das linha
			$class = 'odd';
		
		echo "
	
		<tr class='$class'>
    	<th nowrap='nowrap'>$usuario</th>
		<td>$login</td>
    	<td align='center'><a href='index.php?codAlterar=" . $id . "'><img src='../imagem/botao_edit.png' border=' 0'/></a></td>
		<td align='center'><a href='javascript:;' onClick='confirma($id)'><img src='../imagem/botao_drop.png' border='0' /></a></td>
    	</tr>";
		
		if ($class=='odd'){$class='even';}else{$class = 'odd';}	
		
			
		}}
/********************************/
}

?>
