<?php

//variavel do metodo post
$cnpj     = utf8_decode(strtoupper ( $_REQUEST['cnpj']));
$nome     = utf8_decode(strtoupper ($_REQUEST['nome']));
$endereco = utf8_decode(strtoupper ($_REQUEST['endereco']));
$numero   = utf8_decode(strtoupper ($_REQUEST['numero']));
$cidade   = utf8_decode(strtoupper ($_REQUEST['cidade']));
$uf       = utf8_decode(strtoupper ($_REQUEST['estado']));
$cep      = utf8_decode(strtoupper ($_REQUEST['cep']));
$telefone = utf8_decode(strtoupper ($_REQUEST['telefone']));
$email    = utf8_decode(strtoupper ($_REQUEST['email']));

/************validar cnpj***************/
include ("../funcaophp/cnpj.php");

//retorno da funcao
if (!verificaCNPJ($cnpj)){
	$erro=1; 
   echo "<script type='text/javascript'> window.alert('O CNPJ E INVALIDO INFORME OS DADOS CORRETAMENTE'); history.go(-1);</script>";
   exit();
} 

//validar todos os campos
if (empty($nome) or empty($endereco) or  empty($numero) or empty($cidade) or empty($uf) or empty($cep) or empty($telefone) or empty($email)){
	echo "<script type='text/javascript'> window.alert('PREENCHA TODOS OS CAMPOS CORRESPONDENTE'); history.go(-1);</script>";
    exit();
	}

//VALIDAR EMAIL 
if (!preg_match ("/^[A-Za-z0-9]+([_.-][A-Za-z0-9]+)*@[A-Za-z0-9]+([_.-][A-Za-z0-9]+)*\\.[A-Za-z0-9]{2,4}$/", $email)) {
	echo "<script type='text/javascript'> window.alert('EMAIL INFORMADO INVALIDO'); history.go(-1);</script>";
    exit();
	}
	
/************PDO******************/
//conexao com banco de dados
include ("../mysql/conexao_mysql.php");

//class com as query necessaria
include ("../mysql/empresa.sql.php");



?>