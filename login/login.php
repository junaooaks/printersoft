<?php session_start();			
if(file_exists("init.php")){
	require_once "init.php";
} else {
	die("Arquivo de init não encontrado");
}

function limpa($string){
	$var = trim($string);
	$var = addslashes($var);	
	return $var;
}

if(getenv("REQUEST_METHOD") == "POST"){
	$nome  = isset($_POST["nome"]) ? limpa($_POST["nome"]) : "";
	$senha = isset($_POST["senha"]) ? limpa($_POST["senha"]) : "";
	
	$sql = sprintf("select count(*) from usuarios where login = '%s' and senha = md5('%s')", $nome, $senha);
	mysql_connect(SERVIDOR, USUARIO, SENHA) or die(mysql_error());
	mysql_select_db(BANCO) or die(mysql_error());
	
	$re = mysql_query($sql) or die(mysql_error());
	if(mysql_result($re, 0))
	{
		$re 	   = mysql_query("select * from usuarios where login = '$nome' and senha = md5('$senha')") or die(mysql_error());		
		$resultado = mysql_fetch_array($re);

		if($resultado["nivel_acesso"] > 0)
		{
			$dados             = array();
			$dados["nome"]     = $resultado['login'];
			$dados["senha"]    = $resultado['senha'];
			$dados["nivel"]    = $resultado['nivel_acesso'];
						
			$_SESSION['dados'] = $dados;			
			
			if(isset($_POST["cookie"]))
			{			
				setcookie("dados", serialize($dados), time()+60*60*24*365);	
							
			}
			header("Location: ../index.php");
		}		
	} else {
		header("Location: login.html");
	}
}
?>