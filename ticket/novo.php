<html>
<head>
<title>PRINTER Software - SisGeW Sistema Gestão Web</title>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" >
<script>
window.onload = function(){
document.getElementById("campo1").focus();
}
</script>

</head>

<body text="#0099FF" link="#0099FF" vlink="#0099FF" alink="#FF0000" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td valign="top">
<div align="center">
<?php
//puxar a pagina de coneï¿½ï¿½o para dentro deste script
include "../includes/conexao_mysql.php";

$nome	= strtoupper($_REQUEST['nome']);
$cod	= $_GET['Codigo'];

//comparar se variavel nome == ''
if (($nome=='') and ($cod==''))
{
echo "				<form action='novo.php' method=\"post\" enctype=\"multipart/form-data\" name=\"form2\" target=\"_parent\">
					<td width=\"134\"><div align=\"left\"><font color=\"#000000\" size=\"1\" face=\"Verdana\">Nome 
                        Completo:*</font></div></td>
                    <td width=\"240\"> <font color=\"#000000\" size=\"1\" face=\"Verdana\"> 
                      <input name=\"nome\" type=\"text\" id=\"campo1\" size=\"40\" style=\"font-size:10px; font-family: Verdana;\">
                      </font></td>
					  <td><input type=\"submit\" name=\"Submit2\" value=\"BUSCAR\" style=\"font-size:10px; font-family: Verdana;\"></td>
					  </form>";
					  

exit();
}
//comparar se retornou valor da consulta
if ($cod<>'')
{
$my = "SELECT * FROM cliente WHERE idCliente = '$cod'";
$my = mysql_query($my) or die (mysql_error());

$linha = mysql_fetch_array($my);

$cod		= $linha['idCliente'];

$nomecli	= $linha['pessoaJuridica'];
if(empty($nomecli)){$linha['pessoaFisica'];}


$endereco	= $linha['endereco'];
$cpf		= $linha['cpf'];
$cnpj		= $linha['cnpj'];
$cidade		= $linha['cidade'];
$bairro		= $linha['bairro'];
$telefone	= $linha['telComercial'];
$celular	= $linha['celular'];
$cep		= $linha['cep'];
$email		= $linha['email'];

}

if ($cod=='')
	{
	//CONSULTAR NO BANCO DE DADOS SE CLIENTE JA CADASTRADO
	$sql = "SELECT * FROM cliente WHERE pessoaJuridica LIKE '%".trim($nome)."%' 
			OR pessoaFisica LIKE '%".trim($nome)."%' ORDER BY idCliente ASC";
	$sql = mysql_query($sql) or die (mysql_error());

	//receber dados do banco de dados
	while ($linha = mysql_fetch_array($sql))
		{
		$cod		= $linha['idCliente'];
		
		$nomecli	= $linha['pessoaJuridica'];
		if(empty($nomecli)){$linha['pessoaFisica'];}
		
		$endereco	= $linha['endereco'];
		$cpf		= $linha['cpf'];
		$cnpj		= $linha['cnpj'];
		$cidade		= $linha['cidade'];
		$bairro		= $linha['bairro'];
		$telefone	= $linha['telComercial'];
		$celular	= $linha['celular'];
		$cep		= $linha['cep'];
		$email		= $linha['email'];

		//o retorno da tabela vira um link
		echo "<a href=\"novo.php?Codigo=" . $cod . "\">" . $nomecli . "</a><br><p></p>";
		
		}
	$row = mysql_num_rows($sql);
	
	//comparar se nome esta vazio
	if ($row <> '')
		{
		
		exit();
		}
	}

?>

        <table width="582" border="0" cellspacing="0" cellpadding="0" style="background-color:#9CF">
          <tr>
            <td width="582" height="273" valign="top"> 
              <fieldset>
              <p> 
                <legend><strong><font color="#000000" size="1" face="Verdana">NOVA 
                CHAMADA</font></strong></legend>
                <legend></legend>
              </p>
              <form action="cadastro.php" method="post" enctype="multipart/form-data" name="form1" target="_parent">
			  
                <table border="0" cellpadding="0" cellspacing="5">
                  <tr> 
                    <td width="88"><div align="left"><font color="#000000" size="1" face="Verdana">Nome 
                        Completo:*</font></div></td>
                    <td width="89"> <font color="#000000" size="1" face="Verdana"> 
                      <input name="nome" type="text" id="campo1" style="font-size:10px; font-family: Verdana;" value="<?php if($nomecli<>''){echo $nomecli;}else{echo $nome;} ?>" size="40">
                      </font></td>
                    <td width="86"><div align="left"><font color="#000000" size="1" face="Verdana">Estado:</font></div></td>
                    <td width="177"><select name="estado" id="estado" style="font-size:10px; font-family: Verdana;">
                      <option value="AC" <?php if($uf=='AC'){echo "SELECTED";}?> >Acre - AC</option>
                      <option value="AL" <?php if($uf=='AL'){echo "SELECTED";}?> >Alagoas - AL</option>
                      <option value="AP" <?php if($uf=='AP'){echo "SELECTED";}?> >Amap&aacute; - AP</option>
                      <option value="AM" <?php if($uf=='AM'){echo "SELECTED";}?> >Amazonas - AM</option>
                      <option value="BA" <?php if($uf=='BA'){echo "SELECTED";}?> >Bahia - BA</option>
                      <option value="CE" <?php if($uf=='CE'){echo "SELECTED";}?> >Cear&aacute; - CE</option>
                      <option value="DF" <?php if($uf=='DF'){echo "SELECTED";}?> >Distrito Federal - DF</option>
                      <option value="ES" <?php if($uf=='ES'){echo "SELECTED";}?> >Esp&iacute;rito Santo - ES</option>
                      <option value="GO" <?php if($uf=='GO'){echo "SELECTED";}?> >Goi&aacute;s - GO</option>
                      <option value="MA" <?php if($uf=='MA'){echo "SELECTED";}?> >Maranh&atilde;o - MA</option>
                      <option value="MT" <?php if($uf=='MT'){echo "SELECTED";}?> >Mato Grosso - MT</option>
                      <option value="MS" <?php if($uf=='MS'){echo "SELECTED";}?> >Mato Grosso do Sul - MS</option>
                      <option value="MG" <?php if($uf=='MG'){echo "SELECTED";}?> >Minas Gerais - MG</option>
                      <option value="PA" <?php if($uf=='PA'){echo "SELECTED";}?> >Par&aacute; - PA</option>
                      <option value="PB" <?php if($uf=='PB'){echo "SELECTED";}?> >Para&iacute;ba - PB</option>
                      <option value="PR" <?php if($uf=='PR'){echo "SELECTED";}?> >Paran&aacute; - PR</option>
                      <option value="PE" <?php if($uf=='PE'){echo "SELECTED";}?> >Pernambuco - PE</option>
                      <option value="PI" <?php if($uf=='PI'){echo "SELECTED";}?> >Piau&iacute; - PI</option>
                      <option value="RJ" <?php if($uf=='RJ'){echo "SELECTED";}?> >Rio de Janeiro - RJ</option>
                      <option value="RN" <?php if($uf=='RN'){echo "SELECTED";}?> >Rio Grande do Norte - RN</option>
                      <option value="RS" <?php if($uf=='RS'){echo "SELECTED";}?> >Rio Grande do Sul - RS</option>
                      <option value="RO" <?php if($uf=='RO'){echo "SELECTED";}?> >Rond&ocirc;nia - RO</option>
                      <option value="RR" <?php if($uf=='RR'){echo "SELECTED";}?> >Ror&acirc;ima - RR</option>
                      <option value="SC" <?php if($uf=='SC'){echo "SELECTED";}?> >Santa Catarina - SC</option>
                      <option value="SP" <?php if($uf=='SP'){echo "SELECTED";}?> >S&atilde;o Paulo - SP</option>
                      <option value="SE" <?php if($uf=='SE'){echo "SELECTED";}?> >Sergipe - SE</option>
                      <option value="TO" <?php if($uf=='TO'){echo "SELECTED";}?> >Tocantins - TO</option>
                    </select></td>
                  </tr>
                  <tr> 
                    <td><font color="#000000" size="1" face="Verdana">Endere&ccedil;o:</font></td>
                    <td><font color="#000000" size="1" face="Verdana"> 
                      <input name="endereco" type="text" id="endereco" style="font-size:10px; font-family: Verdana;" value="<?php echo $endereco; ?>" size="40">
                      </font></td>
                    <td width="86"><font color="#000000" size="1" face="Verdana">Bairro:</font></td>
                    <td width="177"><font color="#000000" size="1"> 
                      <input name="bairro" type="text" id="bairro" style="font-size:10px; font-family: Verdana;" value="<?php echo $bairro; ?>" size="29">
                      </font></td>
                  </tr>
                  <tr> 
                    <td><font color="#000000" size="1" face="Verdana">Cidade:</font></td>
                    <td><font color="#000000" size="1" face="Verdana"> 
                      <input name="cidade" type="text" id="cidade" style="font-size:10px; font-family: Verdana;" value="<?php echo $cidade; ?>" size="40">
                      </font></td>
                    <td width="86"><font color="#000000" size="1" face="Verdana">Telefone:</font></td>
                    <td width="177"><font color="#000000" size="1"> 
                      <input name="telefone" type="text" id="telefone" style="font-size:10px; font-family: Verdana;" value="<?php echo $telefone; ?>" size="29">
                      </font></td>
                  </tr>
                  <tr> 
                    <td width="88"><div align="left"><font color="#000000" size="1" face="Verdana">Email:</font></div></td>
                    <td><font color="#000000" size="1"> 
                      <input name="email" type="text" id="email" style="font-size:10px; font-family: Verdana;" value="<?php echo $email; ?>" size="40">
                      </font></td>
                    <td><div align="left"><font color="#000000" size="1" face="Verdana">Celular:</font></div></td>
                    <td><font color="#000000" size="1" face="Verdana"> 
                      <input name="celular" type="text" id="celular" style="font-size:10px; font-family: Verdana;" value="<?php echo $celular; ?>" size="29">
                      </font></td>
                  </tr>
                  <tr> 
                    <td><font color="#000000" size="1" face="Verdana">Cpf/Cnpj:</font></td>
                    <td><font color="#000000" size="1"> 
                      <input name="cpf" type="text" id="cpf" style="font-size:10px; font-family: Verdana;" value="<?php echo $cpf; echo $cnpj; ?>" size="40">
                      </font></td>
                    <td><font color="#000000" size="1" face="Verdana">Cep:</font></td>
                    <td><font color="#000000" size="1" face="Verdana"> 
                      <input name="cep" type="text" id="cep" style="font-size:10px; font-family: Verdana;" value="<?php echo $cep; ?>" size="29">
                      </font></td>
                  </tr>
                  <tr> 
                    <td height="26"> <div align="left"><font color="#000000" size="1" face="Verdana">Tecnico:</font></div>
                      </td>
                    <td height="26"><select name="funcionario_ag" id="funcionario_ag" style="font-size:10px; font-family: Verdana;">
                      <option value=""></option>
                      <?php
						
					   
						if ($p =='suporte')
						{
						echo "<option value=\"$uu\">$uu</option>"; 
						}
						else
						{
						//consulto nome do usuario por ticket
						$sm = "SELECT funcionario FROM ticket WHERE id_ticket = '$id'";
						$sm = mysql_query($sm) or die (mysql_error());
						
						
						$t = mysql_fetch_array($sm);
						$fun   = $t['funcionario'];
						echo "<option value=\"$fun\">$fun</option>";
						
                        //consulta nome de usuario cadastrado
						$sy = "SELECT * FROM usuarios WHERE login <> '$fun'";
						$sy = mysql_query($sy) or die (mysql_error());				
						
						$res1 = mysql_fetch_array($sy);
						while ($res = mysql_fetch_array($sy))
						{
						$login = $res['login'];						
						echo "<option value=\"$login\">$login</option>";
                    	}
						}
					   
					   ?>
                    </select></td>
                    <td height="26">&nbsp;</td>
                    <td height="26">&nbsp;</td>
                  </tr>
                  <tr> 
                    <td><font color="#000000" size="1" face="Verdana">Titulo:*</font></td>
                    <td colspan="3"><font color="#000000" size="1"> 
                      <input name="titulo" type="text" id="titulo" size="55" maxlength="40" style="font-size:10px; font-family: Verdana;">
                      <font face="Verdana">M&aacute;ximo 40 Caracteres</font> 
                      </font></td>
                  </tr>
                  <tr> 
                    <td valign="top"><font color="#000000" size="1" face="Verdana">Mensagem:*</font></td>
                    <td colspan="3"><font color="#000000" size="1"> 
                      <textarea name="mensagem" cols="89" wrap="VIRTUAL" id="mensagem" style="font-size:10px; font-family: Verdana;"></textarea>
                      </font></td>
                  </tr>
                  <tr> 
                    <td colspan="4"><div align="center"> <font color="#000000"> 
                        <input type="reset" name="Submit" value="    LIMPAR    " style="font-size:10px; font-family: Verdana;">
                        <input type="submit" name="Submit2" value="CADASTRAR" style="font-size:10px; font-family: Verdana;">
                        <input name="cod" type="hidden" value="<?php echo $cod; ?>">
                        </font></div></td>
                  </tr>
                </table>
              </form>
			  
              </fieldset>
            </td>
          </tr>
        </table>
      </div></td>
  </tr>
</table>
</body>
</html>
