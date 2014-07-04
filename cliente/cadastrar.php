<?php
header("Content-Type: text/html; charset=ISO-8859-1", true);
//variavel do metodo post
$cpf_enviado	 = $_REQUEST['cpf_enviado'];
$cnpj		 = $_REQUEST['cnpj'];
$cpfcnpj 	 = utf8_decode(strtoupper ($_REQUEST['cnpjcpf']));
$empresa 	 = utf8_decode(strtoupper ($_REQUEST['empresa']));
$nome	         = utf8_decode(strtoupper ($_REQUEST['nome']));
$email 		 = utf8_decode(strtoupper ($_REQUEST['email']));
$telefone 	 = utf8_decode(strtoupper ($_REQUEST['telefone']));
$telefoneCom 	 = utf8_decode(strtoupper ($_REQUEST['telefoneComercial']));
$celular 	 = utf8_decode(strtoupper ($_REQUEST['celular']));
$endereco	 = utf8_decode(strtoupper ($_REQUEST['endereco']));
$entrega         = utf8_decode(strtoupper ($_REQUEST['entrega']));
$bairro		 = utf8_decode(strtoupper ($_REQUEST['bairro']));
$cep 		 = utf8_decode(strtoupper ($_REQUEST['cep']));
$cidade          = utf8_decode(strtoupper ($_REQUEST['cidade']));
$estado          = utf8_decode(strtoupper ($_REQUEST['estado']));
$adicionais	 = utf8_decode(strtoupper ($_REQUEST['adicionais']));

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
if (empty($cpfcnpj) or empty($endereco) or empty($bairro) or empty($cidade)){
	echo "<script type='text/javascript'> window.alert('PREENCHA TODOS OS CAMPOS(*) '); history.go(-1);</script>";
    exit();
	}

/*****VALIDAR CPF COM CNPJ*************/
//limpar caracters
$cpfcnpj = preg_replace( "@[./,:+-]@", "", $cpfcnpj );

//contar numero de caracters CNPJ
if (strlen($cpfcnpj) =='14'){
	$cnpj = $cpfcnpj;
	include ("../funcaophp/cnpj.php");
	//retorno da funcao
	if (!verificaCNPJ($cnpj))
		{
		$erro=1; 
   		echo "<script type='text/javascript'> window.alert('O CNPJ E INVALIDO INFORME OS DADOS CORRETAMENTE'); history.go(-1);		</script>";
   		exit();
		} 
	}

// VALIDAR CPF
else if(strlen($cpfcnpj) =='11')
	{
	$cpf = $cpfcnpj;
	include ("../funcaophp/cpf.php");
	$cpf_enviado = validaCPF($cpf);
	
	// Verifica a resposta da função e exibe na tela
	if($cpf_enviado == false){
		echo "<script type='text/javascript'> window.alert('O CPF E INVALIDO INFORME OS DADOS CORRETAMENTE'); history.go(-1);</script>";
   		exit();
		}
	
	}
else{
	echo "<script type='text/javascript'> window.alert('O CNPJ ou CPF INCORRETO'); history.go(-1);		</script>";
   		exit();
	}
}

/************PDO******************/
//conexao com banco de dados
include ("../mysql/conexao_mysql.php");

//class com as query necessaria
include ("../mysql/cliente.sql.php");

?>
