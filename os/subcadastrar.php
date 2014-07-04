<?php
$os         	= $_REQUEST['codos'];
$peca   	= $_REQUEST['peca'];
$valor  	= $_REQUEST['valor'];
$garantia   	= $_REQUEST['garantia'];
$fechar  	= $_REQUEST['fechar'];
$cli		= $_REQUEST['cli'];
$ospirata       = $_REQUEST['ospirata'];
$oss		= $_REQUEST['oss'];
$clie		= $_REQUEST['clie'];
$codExFechar	= $_REQUEST['codExFechar'];
$radio		= $_REQUEST['radio'];


/************PDO******************/
//conexao com banco de dados
include ("../mysql/conexao_mysql.php");

//class com as query necessaria
include ("../mysql/os.sql.php");

?>
