<?php
header("Content-Type: text/html; charset=ISO-8859-1", true);
//variavel do metodo post
$codCliente	 = utf8_decode(strtoupper ($_REQUEST['codCliente']));
$equipamento 	 = utf8_decode(strtoupper ($_REQUEST['equipamento']));
$marca	     	 = utf8_decode(strtoupper ($_REQUEST['marca']));
$data 		 = utf8_decode(strtoupper ($_REQUEST['data']));
$atendimento 	 = utf8_decode(strtoupper ($_REQUEST['atendimento']));
$previsao    	 = utf8_decode(strtoupper ($_REQUEST['previsao']));
$modelo 	 = utf8_decode(strtoupper ($_REQUEST['modelo']));
$acessorio   	 = utf8_decode(strtoupper ($_REQUEST['acessorio']));
$status      	 = utf8_decode(strtoupper ($_REQUEST['status']));
$tecnico	 = utf8_decode(strtoupper ($_REQUEST['tecnico']));
$patrimonio	 = utf8_decode(strtoupper ($_REQUEST['patrimonio']));
$serie       	 = utf8_decode(strtoupper ($_REQUEST['serie']));
$setor       	 = utf8_decode(strtoupper ($_REQUEST['setor']));
$adicionais	 = utf8_decode(strtoupper ($_REQUEST['diagnostico']));
$protocolo	 = utf8_decode(strtoupper ($_REQUEST['protocolo']));
$eexcluir	 = utf8_decode(strtoupper ($_REQUEST['eexcluir']));
$chat		 = $_REQUEST['chat'];
$codAlterar      = utf8_decode(strtoupper ($_REQUEST['codAlterar']));
$codExcluir	 = utf8_decode(strtoupper ($_REQUEST['codExcluir']));
$codos		 = utf8_decode(strtoupper ($_REQUEST['codos']));
$flag	    	 = utf8_decode(strtoupper ($_REQUEST['flag']));
$l 	         =$_REQUEST['l'];
$os 	     	 =$_REQUEST['os'];
$obs 	         =$_REQUEST['obs'];
$radio           =$_REQUEST['radio'];
$time            =$_REQUEST['time'];
$laudo           =$_REQUEST['laudo'];
$dis	      	 =$_REQUEST['dis'];
$prazo      	 =$_REQUEST['prazo'];
$valor		 =$_REQUEST['valor'];
$cliente      	 =$_REQUEST['cliente'];


/***********  ALTERAR CAMPOS DE DATA  ********/
$data       = explode("/", $data);
$dataC = "$data[2]-$data[1]-$data[0]";
if($eexcluir<>''){
$flag = 3;	
}

//alterar o valor do flag
if($codExcluir<>''){
$flag = 3;	
}
//alterar o valor do flag
if(!empty($codAlterar)){
$flag = 2;	
}
//echo 'codos '.$codAlterar.' codcliente '.$codCliente.' flag '.$flag; exit();

/*******validar campos de entrada********/
if(($codExcluir=='')and ($chat=='')and ($eexcluir=='')){
if (empty($equipamento) or empty($marca) or empty($atendimento) or empty($status) or empty($tecnico) or empty($acessorio)){
	echo "<script type='text/javascript'> window.alert('PREENCHA TODOS OS CAMPOS(*) '); history.go(-1);</script>";
    exit();
	}
}
/*if ($chat<>'')
	{
	if (empty($valor) or empty($prazo) or empty($dis) or empty($laudo) or empty($radio)){
	echo "<script type='text/javascript'> window.alert('PREENCHA TODOS OS CAMPOS(*) '); history.go(-1);</script>";
    exit();
	}*/
	if ($chat<>''){
$time = date('Y-m-d H:i:s');	

}
/************PDO******************/
//conexao com banco de dados
include ("../mysql/conexao_mysql.php");



//class com as query necessaria
include ("../mysql/os.sql.php");

?>
