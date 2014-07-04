<?php session_start();
require "../login/verifica.php";
?>
<html>
<head>
<title>SISGEW - Sistema Gerenciador Web</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body bgcolor="#eaeaea" text="#0099FF" link="#0099FF" vlink="#0099FF" alink="#FF0000" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td valign="top">
<div align="center">
        <table width="600" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="622" height="44" valign="top"> 
              <fieldset>
              <p> 
                <legend><strong><font color="#000000" size="2" face="Verdana">NOVA 
                CHAMADA</font></strong></legend>
                <legend></legend>
              </p>
			  <?php
			  //puxar a pagina de coneção para dentro deste script
			  include "../includes/conexao_mysql.php";
			  
			  //recebendo valor do formulario novo.php e transformando em maiusculo
			  $cep          = strtoupper($_POST['cep']);
			  $nome         = strtoupper($_POST['nome']);
			  $estado		= strtoupper($_POST['estado']);
			  $endereco		= strtoupper($_POST['endereco']);
			  $bairro		= strtoupper($_POST['bairro']);
			  $cidade		= strtoupper($_POST['cidade']);
			  $cpf			= strtoupper($_POST['cpf']);
			  $mail         = strtoupper($_POST['email']);
			  $telefone     = strtoupper($_POST['telefone']);
			  $celular      = strtoupper($_POST['celular']);
			  $departamento = strtoupper($_POST['departamento']);
			  $prioridade   = strtoupper($_POST['prioridade']);
			  $titulo       = strtoupper($_POST['titulo']);
			  $mensagem     = strtoupper($_POST['mensagem']);
			  $cod			= $_POST['cod'];
			  $funcionario  = $_POST['funcionario_ag'];
			 
			  //Retirar todos os caracteres que nao sejam 0-9
  	$s="";
    for ($x=1; $x<=strlen($cep); $x=$x+1)
   		{
    		$ch=substr($cep,$x-1,1);
    		if (ord($ch)>=48 && ord($ch)<=57)
    			{
      				$s=$s.$ch;
    			}
   		}
	$cep=$s;
			  
			  $status = 'ATIVO';
			  $data = date("Y-m-d H:i:s");
			  //comparar se o campo nome esta vazio
			  if ($nome == ''){
			  echo "<div align='center'><strong><font color='#000000' size='2' face='Verdana'>PREENCHA 
                O CAMPO NOME</font></strong> </div>
				<div align='right'><br><a href='#' onclick='javascript:history.back(-1);'><img src='../imagem/btn_volta.png' width='61' height='17' border='0'></a></div>";
				
			  exit();
			  }
			  
			  //comparar se o campo de titulo esta fazio
			  if ($titulo == ''){
			  echo "<div align='center'><strong><font color='#000000' size='2' face='Verdana'>PREENCHA 
                O CAMPO TITULO</font></strong> </div>
				<div align='right'><br><a href='#' onclick='javascript:history.back(-1);'><img src='../imagem/btn_volta.png' width='61' height='17' border='0'></a></div>";
			  exit();
			  }
			  
			  //comparar se o campo de titulo esta fazio
			  if ($mensagem == ''){
			  echo "<div align='center'><strong><font color='#000000' size='2' face='Verdana'>PREENCHA 
                O CAMPO MENSAGEM</font></strong> </div>
				<div align='right'><br><a href='#' onclick='javascript:history.back(-1);'><img src='../imagem/btn_volta.png' width='61' height='17' border='0'></a></div>";
			  exit();
			  }
			  $uu;
			  //cadastrar so na tabela de ticket quando ja exites cliente
			  if ($cod<>'')
			  {
			  //cadastrar novo ticket 
			   $sql = "INSERT INTO ticket (id_cliente, departamento, prioridade, titulo, mensagem, status, data, funcionario, usuario) 
			   					   VALUES ('$cod', '$departamento', '$prioridade', '$titulo', '$mensagem', '$status','$data', '$funcionario', '$uu')";
  			   $sql = mysql_query($sql) or die (mysql_error());
			   echo "<div align='center'><strong><font color='#000000' size='2' face='Verdana'>TICKET REGISTRADO</font></strong> </div>";
			  }
			  
			  //caso o cliente nao seja cadastrado no banco dedos tem que regiostrar na tabela de clientes
			 // e depois pegar o seu id para registrar na tabela de ticket
			 if ($cod=='')
			  {
			  		$my = "INSERT INTO clientes (NomeCliente, Estado, Endereco, Cpf, Cidade, Bairro, Telefone1, Telefone2, Cep, Email) 
										 VALUES ('$nome', '$estado', '$endereco', '$cpf', '$cidade', '$bairro', '$telefone', '$celular', '$cep', '$email')";
					$my = mysql_query($my) or die (mysql_error());
					
					//pegar o id do cliente que foi registrado agora
					$sq = "SELECT id FROM clientes WHERE NomeCliente='$nome' LIMIT 1";
					$sq = mysql_query($sq) or die (mysql_error());
					
					//pegar resultado
					$linha = mysql_fetch_array($sq);
					
					$id		= $linha['id'];
					
					$sql = "INSERT INTO ticket (id_cliente, departamento, prioridade, titulo, mensagem, status, data, funcionario, usuario) 
			   					   VALUES ('$id', '$departamento', '$prioridade', '$titulo', '$mensagem', '$status','$data','$funcionario','$uu')";
  			  		$sql = mysql_query($sql) or die (mysql_error());
			   		echo "<div align='center'><strong><font color='#000000' size='2' face='Verdana'>TICKET REGISTRADO</font></strong> </div>";
			  } 
		
			  ?>
              <div align="right"><br>
              </div>
			  <div><input name="respondidas" type="image" id="fechar" onClick="javascript:window.opener.document.location='index.php'; window.close()" src="botao/fechar.gif" border="0"></div> 
			  </fieldset>
            </td>
          </tr>
        </table>
      </div></td>
  </tr>
</table>
</body>
</html>
