<?php session_start(); 
@header('P3P: CP="CAO COR CURa ADMa DEVa OUR IND ONL COM DEM PRE"');
//verificar session
require "../login/verifica.php";
?>
<html>
<head>
<title>SISGEW</title>
</head>
<?php
$codos = $_SESSION['loginxy'];
$codcli = $_SESSION['codclixy'];
//echo $codos;
//conexao com o banco de dados
if ($flag<>0){
include ("../mysql/conexao_mysql.php");

$usuario	=$_POST['usuario'];
$equi		=$_POST['equi'];
$modelo		=$_POST['modelo'];
$ref		=$_POST['ref'];
$tel		=$_POST['telefone'];

if (empty($equi) or empty($ref) or empty($usuario)){echo "<script type='text/javascript'> window.alert('PREENCHA TODOS OS CAMPOS(*) '); history.go(-1);</script>";
    exit();}

/*		
//consulta no banco de dados se usuario existe
$sql = "SELECT * FROM os, equipamento, marca, atendimento, acessorio, usuarios, status 
							   WHERE os.idOs = '$codos'  
							   AND os.codEquipamento=equipamento.idEquipamento
							   AND os.codMarca=marca.idMarca
							   AND os.codAtendimento=atendimento.idAtendimento
							   AND os.codAcessorio=acessorio.idAcessorio
							   AND os.codTecnico=usuarios.idUsuario
							   AND os.codStatus=status.idStatus";


//$sql = "SELECT * FROM os WHERE idOs = '$codos'";
$sql = mysql_query($sql) or die (mysql_error());

$linha = mysql_fetch_array ($sql);

			/*
			$empresa	    = utf8_encode($row['pessoaJuridica']);
			$nome	        = utf8_encode($row['pessoaFisica']);
			$cpf            = utf8_encode($row['cpf']);
			$cnpj           = utf8_encode($row['cnpj']);
			$endereco       = utf8_encode($row['endereco']);
			$entrega        = utf8_encode($row['entrega']);
			$bairro		    = utf8_encode($row['bairro']);
			$cidade	        = utf8_encode($row['cidade']);
			$uf  	        = utf8_encode($row['estado']);
			$cep	        = utf8_encode($row['cep']);
			$telComercial   = utf8_encode($row['telComercial']);
			$telefone       = utf8_encode($row['telResidencial']);
			$celular        = utf8_encode($row['celular']);
			$email          = utf8_encode($row['email']);
			$adicionais     = utf8_encode($row['adicionais']);
			
			
			//$data           = utf8_encode($row['data']);
			//$dataen         = utf8_encode($row['previsao']);
			$modelo			= utf8_encode($row['modelo']);
			$patrimonio     = utf8_encode($row['patrimonio']);
			$serie			= utf8_encode($row['serie']);
			$setor			= utf8_encode($row['setor']);
			$diagnostico	= utf8_encode($row['diagnostico']);
			
			$equi		= utf8_encode($row['equipamento.descricao']);
			$marca		= utf8_encode($row['codMarca']);
			$aten		= utf8_encode($row['codAtendimento']);
			$ace			= utf8_encode($row['codAcessorio']);
			//$tec			= utf8_encode($row['codTecnico']);
			$status		= utf8_encode($row['codStatus']);

*/
//enviar email para confirmaçao de endereÃ§o

$remetente="From: Atualizacao de dados <nacional@nacionaprinter.com.br>";
mail(
"suporte@nacionalprinter.com.br",
"PEDIDO DE GARANTIA DO CLIENTE",
"
Nome Cliente = '$usuario'
N° Nota Fiscal = '$nf'
N° O.S ='$codos'
Equipamento = $equi
Modelo = $modelo
Garantia= $ref
Email = $email",$remetente);
echo "<center><font face='verdana' color='red'>A SOLICITAÇÃO FOI ENVIADA, AGUARDE O CONTATO</font></center>"; 
exit();
}
?>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<table width="500" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><form name="form1" method="post" action="<?php echo  $_SERVER['PHP_SELF']; ?>">
        <table width="100%" border="0" cellpadding="0" cellspacing="5">
          <tr> 
            <td width="47%"><font size="2" face="Verdana">Nome de Usu&aacute;rio*:</font></td>
            <td width="53%"><input name="usuario" type="text" id="usuario" style="font-size:10px; font-family: Verdana;" value="<?php echo $nomeclixy; ?>" size="55"></td>
          </tr>
          <tr>
            <td style="font-size:12px; font-family: Verdana;">N&deg; Nota Fiscal:</td>
            <td width="53%"><input name="nf" type="text" id="nf" style="font-size:10px; font-family: Verdana;" size="55"></td>
          </tr>
          <tr> 
            <td><font size="2" face="Verdana">Telefone:</font></td>
            <td><input name="telefone" type="text" id="telefone" style="font-size:10px; font-family: Verdana;" size="55"></td>
          </tr>
          <tr>
            <td><font size="2" face="Verdana">Equipamento*:</font></td>
            <td><input name="equi" type="text" id="equi" style="font-size:10px; font-family: Verdana;" value="<?php echo $equi; ?>" size="55"></td>
          </tr>
          <tr> 
            <td><font size="2" face="Verdana">Modelo:</font></td>
            <td><input name="modelo" type="text" id="modelo" style="font-size:10px; font-family: Verdana;" value="<?php echo $modelo; ?>" size="55"></td>
          </tr>
          <tr> 
            <td valign="top"><font size="2" face="Verdana">Referente a qual problema*:</font></td>
            <td><label for="ref"></label>
            <textarea name="ref" id="ref" cols="45" rows="5"></textarea></td>
          </tr>
          <tr> 
            <td colspan="2"><div align="center"></div>
              <div align="center">
                <input name="flag" type="hidden" value="1"> 
                <input type="submit" name="Submit2" value="   ENVIAR  " style="font-size:10px; font-family: Verdana;">
              </div></td>
          </tr>
        </table>
    </form></td>
  </tr>
</table>
</body>
</html>