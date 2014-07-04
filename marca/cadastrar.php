<?php
header("Content-Type: text/html; charset=ISO-8859-1", true);
//variavel do metodo post
$grupo     = utf8_decode( strtoupper ($_REQUEST['grupo']));


//alterar o valor do flag

if($codExcluir<>''){
$flag = 3;	
}
//alterar o valor do flag
if($codAlterar<>''){
$flag = 2;	
}


/*******validar campos de entrada********/
if($codExcluir==''){
if (empty($grupo)){
	echo "<script type='text/javascript'> window.alert('PREENCHA TODOS OS CAMPOS '); history.go(-1);</script>";
    exit();
	}
}
/************PDO******************/
//conexao com banco de dados
include ("../mysql/conexao_mysql.php");

//class com as query necessaria
include ("../mysql/marca.sql.php");

?>