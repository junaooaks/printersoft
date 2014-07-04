<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-br" xml:lang="pt-br">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<?php session_start();
@header('P3P: CP="CAO COR CURa ADMa DEVa OUR IND ONL COM DEM PRE"');
require "../login/verifica.php";
//puxar a pagina de coneção para dentro deste script
include ("../mysql/conexao_mysql.php");
//$ip_pc = $REMOTE_ADDR;
//echo " -> $cpf";

//if ($cgc<>"") {$doc="Cgc"; $ndoc=$cgc;}

$codcli = $_SESSION['codclixy'];
$loginn	= $_SESSION['loginxy'];
//echo $loginxy;
//echo  " verif >> $doc - $ndoc <<";
//echo "...$codcli....";
$sql = mysql_query("SELECT *  FROM cliente, os, equipamento, marca, atendimento, acessorio, usuarios, status 
					WHERE idCliente = '$codcli' 
					AND os.idOs = '$loginn' 
					AND os.codEquipamento=equipamento.idEquipamento
					AND os.codMarca=marca.idMarca
					AND os.codAtendimento=atendimento.idAtendimento
					AND os.codAcessorio=acessorio.idAcessorio
					AND os.codTecnico=usuarios.idUsuario
					AND os.codStatus=status.idStatus") or die (mysql_error());

while ($row = mysql_fetch_array($sql))
{
			$empresa	    = utf8_encode($row['pessoaJuridica']);
			$nome	        = utf8_encode($row['pessoaFisica']);
			$cpf            = utf8_encode($row['cpf']);
			$cnpj           = utf8_encode($row['cnpj']);
			$email          = utf8_encode($row['email']);
			$pro			= $row['aprovacao'];
			$data           = utf8_encode($row['data']);
			$dataen         = utf8_encode($row['previsao']);
			$modelo			= utf8_encode($row['modelo']);
			$patrimonio     = utf8_encode($row['patrimonio']);
			$serie			= utf8_encode($row['serie']);
			$setor			= utf8_encode($row['setor']);
			$diagnostico	= utf8_encode($row['diagnostico']);
			
			$codequi		= utf8_encode($row['idEquipamento']);
			$codmarca		= utf8_encode($row['idMarca']);
			$codaten		= utf8_encode($row['idAtendimento']);
			$codace			= utf8_encode($row['idAcessorio']);
			$login			= utf8_encode($row['login']);
			$codstatus		= utf8_encode($row['idStatus']);
			$os     		= utf8_encode($row['idOs']);
			
	
}

$l = mysql_query("SELECT * FROM equipamento WHERE idEquipamento='$codequi'")or die (mysql_error());
while ($row = mysql_fetch_array($l))
{
	$equip = utf8_encode($row['descricao']);
}

$lm = mysql_query("SELECT * FROM marca WHERE idMarca='$codmarca'")or die (mysql_error());
while ($row = mysql_fetch_array($lm))
{
	$marcc = utf8_encode($row['descricao']);
}

$la = mysql_query("SELECT * FROM atendimento WHERE idAtendimento='$codaten'")or die (mysql_error());
while ($row = mysql_fetch_array($la))
{
	$aten = utf8_encode($row['descricao']);
}

$lac = mysql_query("SELECT * FROM acessorio WHERE idAcessorio='$codace'")or die (mysql_error());
while ($row = mysql_fetch_array($lac))
{
	$ace = utf8_encode($row['descricao']);
}

$ls = mysql_query("SELECT * FROM status WHERE idStatus='$codstatus'")or die (mysql_error());
while ($row = mysql_fetch_array($ls))
{
	$sta = utf8_encode($row['descricao']);
}

$o = mysql_query("SELECT * FROM laudo WHERE codOs='$os'")or die (mysql_error());
while ($row = mysql_fetch_array($o))
{
	$idd	= $row['idLaudo'];
	$valor = utf8_encode($row['valor']);
	$prazo = utf8_encode($row['prazo']);
	$dis   = utf8_encode($row['disponibilidade']);
	$lll   = utf8_encode($row['laudo']);
	$hora  = utf8_encode($row['hora']);
	$staa  = utf8_encode($row['status']);
	$autor = utf8_encode($row['autorizado']);
	//echo $autor;
}

if ($au<>''){
	$z = mysql_query("UPDATE os SET aprovacao = '$au' WHERE idOs = '$os'")or die (mysql_error());

$remetente="From: Atualizacao de dados <nacional@nacionaprinter.com.br>";
mail(
"suporte@nacionalprinter.com.br",
"Liberação de Serviço",
"
Autorização do Cliente: '$au'
Nome Cliente = '$usuario'
N° O.S ='$os'
Equipamento = $equip
Modelo = $modelo
Email = $email",$remetente);
echo "<script type='text/javascript'> window.alert('RECEBEMOS A SUA SOLICITAÇÃO');</script>";	
	
	}
?>




<style type="text/css">@import url("../css/form.css");</style>
<form action="<?php echo  $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table width="700" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td width="585"><fieldset>
        <legend style="font-size:16px; font-family: Verdana;"><strong>IDENTIFICACAO DO CLIENTE</strong></legend>
        <table width="700" border="0" cellpadding="0" cellspacing="5">
          <tr>
            <td style="font-size:10px; font-family: Verdana;">Cnpj/Cpf*:</td>
            <td >
              <input name="cnpjcpf" type="text"  id="cnpjcpf" value="<?php echo $cnpj; echo $cpf; ?>"size="25" readonly="readonly"/>
              </td>
          </tr>
          <tr>
            <td style="font-size:10px; font-family: Verdana;">Empresa/Cliente:</td>
            <td><input name="empresa" type="text" id="nome3" value="<?php echo htmlentities($empresa); ?>" size="90" readonly="readonly"/></td>
          </tr>
          <tr>
            <td style="font-size:10px; font-family: Verdana;">Solicitante/Respons.:</td>
            <td><input name="nome" type="text" id="nome5" value="<?php echo htmlentities($nome); ?>" size="90" readonly="readonly"/></td>
          </tr>
          <tr>
            <td style="font-size:10px; font-family: Verdana;">Email:</td>
            <td><input name="email" type="text" id="nome" value="<?php echo htmlentities($email); ?>" size="90" readonly="readonly"/></td>
          </tr>
        </table>
        <legend><strong> </strong></legend>
      </fieldset></td>
    </tr>
  </table>
  <table width="700" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td style="font-size:10px; font-family: Verdana;"><fieldset>
        <legend><strong>ORDEM DE SERVI&Ccedil;O</strong></legend>
        <table width="700" border="0" cellspacing="5" cellpadding="0">
          <tr>
            <td width="100" style="font-size:10px; font-family: Verdana;">Equipamentos*:</td>
            <td colspan="5" style="font-size:10px; font-family: Verdana;">
              <input name="equi" type="text" id="equi" value="<?php echo htmlentities($equip); ?>" readonly="readonly" />
Marca/Fab.*:
<input name="equi2" type="text" id="equi2"  value="<?php echo htmlentities($marcc); ?>" readonly="readonly" />
Data Entrada:
<input name="data" type="text" id="data" value="<?php if ($data==''){echo date('d/m/Y');}else{echo $data;} ?>" size="25" readonly="readonly"/></td>
          </tr>
          <tr>
            <td style="font-size:10px; font-family: Verdana;">Modelo:</td>
            <td width="308"><input name="modelo" type="text" id="modelo" value="<?php echo htmlentities($modelo); ?>" size="30" readonly="readonly"/></td>
            <td width="53" style="font-size:10px; font-family: Verdana;">T&eacute;cnico*:</td>
            <td width="214" colspan="3"><input name="equi6" type="text" id="equi6" value="<?php echo htmlentities($codtec); ?>" readonly="readonly" /></td>
          </tr>
          <tr>
            <td style="font-size:10px; font-family: Verdana;">Acessorio*:</td>
            <td><input name="equi4" type="text" id="equi4" value="<?php echo htmlentities($ace); ?>" readonly="readonly"/></td>
            <td style="font-size:10px; font-family: Verdana;">Setor:</td>
            <td colspan="3"><input name="setor" type="text" id="setor" value="<?php echo htmlentities($setor); ?>" readonly="readonly"/></td>
          </tr>
        </table>
      </fieldset></td>
    </tr>
  </table>
  <table width="700" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td style="font-size:10px; font-family: Verdana;"><fieldset>
        <legend><strong>LAUDO TECNICO</strong></legend>
        <table border="0" cellspacing="8" cellpadding="0">
          <tr>
            <td style="font-size:10px; font-family: Verdana;"> Laudo Tecnico.*:
              <input name="chat" type="hidden" id="chat" value="1"/>
              <input name="laudo" type="hidden" id="laudo" value="<?php echo $idlaudo;  ?>"readonly="readonly"/></td>
            <td colspan="5" style="font-size:12px; font-family: Verdana;"><?php echo "<strong style='color:#00f;'>$login - $hora disse:</strong> $lll";?></td>
          </tr>
          <tr>
            <td valign="top" style="font-size:10px; font-family: Verdana;">Valor Total serv. + pe&ccedil;as:*</td>
            <td width="125"><label for="fileField2"></label>
              <label for="laudo">
                <input name="valor" type="text" id="valor" value="<?php echo htmlentities($valor); ?>" size="20" readonly="readonly"/>
              </label></td>
            <td width="55" style="font-size:10px; font-family: Verdana;">Prazo entrega*:</td>
            <td width="125"><input name="prazo" type="text" id="prazo" value="<?php echo htmlentities($prazo);?>" size="20" readonly="readonly"/></td>
            <td width="91" style="font-size:10px; font-family: Verdana;">Dispo. das pe&ccedil;as*:</td>
            <td width="100"><input name="dis" type="text" id="dis" value="<?php echo htmlentities($dis); ?>" size="20" readonly="readonly"/></td>
          </tr>
          <tr>
            <td valign="top" style="font-size:10px; font-family: Verdana;">Status*:</td>
            <td colspan="5" style="font-size:14px; font-family: Verdana; color:#F00"><?php
			 	$stt = mysql_query("SELECT * FROM status WHERE idStatus='$staa'")or die (mysql_error());
			while ($row = mysql_fetch_array($stt))
			{
				$stax = $row['descricao'];
			}
				
			if ($stax<>''){echo "<strong>$stax</strong>";}else{echo "<strong>FILA DE ESPERA</strong>";}
			
              ?></td>
          </tr>
          <tr>
            <td valign="top" style="font-size:10px; font-family: Verdana;">Esperando Situa&ccedil;&atilde;o*:</td>
            <td colspan="5" style="font-size:10px; font-family: Verdana;" ><p>
              <label for="au"></label>
              <input name="au" type="radio" id="radio3" value="s" <?php if($pro=='s'){echo "checked='hecked'";}?> />
              AUTORIZAR SERVI&Ccedil;OS
              <input type="radio" name="au" id="radio" value="n"  <?php if($pro=='n'){echo "checked='hecked'";}?>/>
N&Atilde;O AUTORIZAR              
              
            </p>
              </td>
          </tr>
        </table>
      </fieldset></td>
    </tr>
  </table>
<hr />
  <table width="0%" border="0" align="center" cellpadding="0" cellspacing="5">
    <tr>
      <td></td>
    </tr>
    <tr>
      <td></td>
    </tr>
    <tr>
      <td align="center">
        <input type="submit" name="button" id="button" value="REGISTRAR"/>
<input type="button" value="Imprimir" onclick=javascript:window.print()></td>
    </tr>
  </table>
</form>
