<?php
//variavel do metodo post
$nome       = utf8_decode( strtoupper ($_POST['nome']));
$email      = utf8_decode( strtoupper ($_POST['email']));
$login      = $_POST['login'];
$senhaa     = md5($_POST['senha']);
$repsenha	= md5($_POST['repetesenha']);
$radio		= $_POST['radio'];
$tel		= utf8_decode( strtoupper ($_POST['telefone']));
$cel 		= utf8_decode( strtoupper ($_POST['celular'])); 
$comple		= utf8_decode( strtoupper ($_POST['complementar']));

//alterar o valor do flag

if($codExcluir<>''){
$flag = 3;	
}
//alterar o valor do flag
if($codAlterar<>''){
$flag = 2;	
}

/*************verificar se senha e = a repete senha*******/
if ($senha<>''){
if ($senhaa<>$repsenha){
	echo "<script type='text/javascript'> window.alert('SENHA NAO CONFERE'); history.go(-1);</script>";
    exit();
	}
}

/*******validar campos de entrada********/
if($codExcluir==''){
if (empty($nome)or empty($login)){
	echo "<script type='text/javascript'> window.alert('PREENCHA TODOS OS CAMPOS * '); history.go(-1);</script>";
    exit();
	}
}
/************PDO******************/
//conexao com banco de dados
include ("../mysql/conexao_mysql.php");

//class com as query necessaria
include ("../mysql/usuario.sql.php");

?>