<?php session_start();
@header('P3P: CP="CAO COR CURa ADMa DEVa OUR IND ONL COM DEM PRE"');
//verificar session
require ("../login/verifica.php");
 ?>
<html>
<head>

</head>
<?php 
//session com o id do cliente
$codcli = $_SESSION['codclixy'];

//conexao com o banco de dados
include ("../mysql/conexao_mysql.php");

// daqui pra baixo faz as alterações no registro do usuario
//compara se flag e diferente de fazio
if ($flag<>0)
{
$cpfj = $_POST['cpfj'];
//fazer validação do cpf
$RecebeCPF = $cpfj;

    //Retirar todos os caracteres que nao sejam 0-9
    $s="";
    for ($x=1; $x<=strlen($RecebeCPF); $x=$x+1)
    {
    	$ch=substr($RecebeCPF,$x-1,1);
    	if (ord($ch)>=48 && ord($ch)<=57)
    	{
     	$s=$s.$ch;
   		}
		
  	}
	//echo $s;

//comparar se campo cpf foi preenchido com numeros
if ($s == '')
{
	echo "<div align='center'><br><p><font size='2' face='Verdana'>Preencha o CPF/CNPJ Com dados Numéricos<br><br>
	<a href='javascript:history.go(-1)'>Voltar</a>
	</font></p>";
	exit();
}

$RecebeCPF=$s;
$cont = strlen($s);
if ($cont==11)
{

if (strlen($RecebeCPF)==11)
{
	if ($RecebeCPF=="00000000000")
    {
    	$then;
    	echo "<h1>CPF Inválido</h1>";
    }
    else
	{
    	$Numero[1]=intval(substr($RecebeCPF,1-1,1));
    	$Numero[2]=intval(substr($RecebeCPF,2-1,1));
        $Numero[3]=intval(substr($RecebeCPF,3-1,1));
        $Numero[4]=intval(substr($RecebeCPF,4-1,1));
        $Numero[5]=intval(substr($RecebeCPF,5-1,1));
        $Numero[6]=intval(substr($RecebeCPF,6-1,1));
        $Numero[7]=intval(substr($RecebeCPF,7-1,1));
        $Numero[8]=intval(substr($RecebeCPF,8-1,1));
        $Numero[9]=intval(substr($RecebeCPF,9-1,1));
        $Numero[10]=intval(substr($RecebeCPF,10-1,1));
        $Numero[11]=intval(substr($RecebeCPF,11-1,1));

        $soma=10*$Numero[1]+9*$Numero[2]+8*$Numero[3]+7*$Numero[4]+6*$Numero[5]+5*
        $Numero[6]+4*$Numero[7]+3*$Numero[8]+2*$Numero[9];
        $soma=$soma-(11*(intval($soma/11)));

    	if ($soma==0 || $soma==1)
    	{
      		$resultado1=0;
    	}
    	else
    	{
      		$resultado1=11-$soma;
   		}

    	if ($resultado1==$Numero[10])
    	{
     		$soma=$Numero[1]*11+$Numero[2]*10+$Numero[3]*9+$Numero[4]*8+$Numero[5]*7+$Numero[6]*6+$Numero[7]*5+
     		$Numero[8]*4+$Numero[9]*3+$Numero[10]*2;
     		$soma=$soma-(11*(intval($soma/11)));

     		if ($soma==0 || $soma==1)
     		{
       			$resultado2=0;
     		}
     		else
     		{
      			$resultado2=11-$soma;
     		}
     		if ($resultado2==$Numero[11])
     		{  
    
	 			$cpfok=1;
	 
	 		}
		}
	}
}


$cpf = $RecebeCPF;
}	 //fechar o if

if ($cont==14)  
 {

$RecebeCNPJ=$s;
if (strlen($RecebeCNPJ)==14)
{
	

if ($RecebeCNPJ=="00000000000000")
{
     $then;
     echo "<h1><div align=\"center\">CNPJ Inv&aacute;lido</div></h1>";
}
else
{
    $Numero[1]=intval(substr($RecebeCNPJ,1-1,1));
    $Numero[2]=intval(substr($RecebeCNPJ,2-1,1));
    $Numero[3]=intval(substr($RecebeCNPJ,3-1,1));
    $Numero[4]=intval(substr($RecebeCNPJ,4-1,1));
    $Numero[5]=intval(substr($RecebeCNPJ,5-1,1));
    $Numero[6]=intval(substr($RecebeCNPJ,6-1,1));
    $Numero[7]=intval(substr($RecebeCNPJ,7-1,1));
    $Numero[8]=intval(substr($RecebeCNPJ,8-1,1));
    $Numero[9]=intval(substr($RecebeCNPJ,9-1,1));
    $Numero[10]=intval(substr($RecebeCNPJ,10-1,1));
    $Numero[11]=intval(substr($RecebeCNPJ,11-1,1));
    $Numero[12]=intval(substr($RecebeCNPJ,12-1,1));
    $Numero[13]=intval(substr($RecebeCNPJ,13-1,1));
    $Numero[14]=intval(substr($RecebeCNPJ,14-1,1));

    $soma=$Numero[1]*5+$Numero[2]*4+$Numero[3]*3+$Numero[4]*2+$Numero[5]*9+$Numero[6]*8+$Numero[7]*7+
    $Numero[8]*6+$Numero[9]*5+$Numero[10]*4+$Numero[11]*3+$Numero[12]*2;

    $soma=$soma-(11*(intval($soma/11)));

	if ($soma==0 || $soma==1)
	{
		$resultado1=0;
	}
	else
	{
    	$resultado1=11-$soma;
	}
		if ($resultado1==$Numero[13])
	{
    	$soma=$Numero[1]*6+$Numero[2]*5+$Numero[3]*4+$Numero[4]*3+$Numero[5]*2+$Numero[6]*9+
    	$Numero[7]*8+$Numero[8]*7+$Numero[9]*6+$Numero[10]*5+$Numero[11]*4+$Numero[12]*3+$Numero[13]*2;
    	$soma=$soma-(11*(intval($soma/11)));
    	if ($soma==0 || $soma==1)
    	{
     		$resultado2=0;
    	}
   		else
   		{
   			$resultado2=11-$soma;
   		}
   		if ($resultado2==$Numero[14])
   		{
			$cpfok=1;
 
		}
	}
}
}
}
if (($cont < 11) or (($cont > 11) and ($cont < 14)))
{
echo "<div align='center'><br><p><font size='2' face='Verdana'>Preencha o CPF/CNPJ CORRETO<br><br>
	<a href='javascript:history.go(-1)'>Voltar</a>
	</font></p>";
	exit();
}

//alterar dados da tabela
/*$sq = "UPDATE clientes SET NomeCliente = '$nome', Cpf = '$cpf', Cgc = '$RecebeCNPJ',Endereco= '$endereco', Bairro = '$bairro', cidade = '$cidade', Estado = '$estado',
Cep = '$cep', Telefone1 = '$telefone', Celular = '$celular', Email = '$email' WHERE id = '$codcli'";
$sq = mysql_query($sq) or die (mysql_error());
echo "<div align='center'><font size='3' face='Verdana'>Alteração Realizada</font></div>";
*/
//enviar email para confirmaçao de endereÃ§o

$remetente="From: Atualizacao de dados <nacional@nacionaprinter.com.br>";
mail(
"suporte@nacionalprinter.com.br",
"ATUALIZAR DADOS CLIENTE",
"
Nome Cliente = '$nome'
Cpf = $cpf
Cgc = $RecebeCNPJ
Endereco= $endereco
Bairro = $bairro
cidade = $cidade
Estado = $estado
Cep = $cep
Telefone Residencial = $telefone
Telefone Comercial = $comercial
Celular = $celular
Email = $email",$remetente);
echo "<center><font face='verdana' color='red'>A alteração será validada posteriormente, aguarde o contado da BRSITE Internet</font></center>"; 
exit();
}


//fazer consulta no db para pegar dados do cliente
$sql = mysql_query("SELECT * FROM cliente WHERE idCliente = '$codcli'") or die (mysql_error());

//mostrar as dados da tabela 
$row = mysql_fetch_array($sql);

$no        = $row   ['pessoaFisica'];
$ju		   = $row	['pessoaJuridica'];
$bairro    = $row   ['bairro'];
$endereco  = $row   ['endereco'];
$cpf       = $row   ['cpf'];
$cgc       = $row   ['cnpj'];
$cidade    = $row   ['cidade'];
$uf        = $row   ['estado'];
$cep       = $row   ['cep'];
$telc      = $row   ['telComercial'];
$telr      = $row   ['telResidencial'];
$celular   = $row   ['celular'];
$email	   = $row	['email'];
$cod       = $row	['idCliente'];


 
?>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center"><div align="center"> 
        <form name="form1" method="post" action="<?php echo  $_SERVER['PHP_SELF'];?>">
          <table width="376" height="100%" border="0" cellpadding="0" cellspacing="5">
            <tr> 
              <td width="55" style="font-size:10px; font-family:Verdana;">Empresa/Cliente:</td>
              <td colspan="3"><input name="nome3" type="text" value="<?php echo $ju; ?>" size="60" style="font-size:10px; font-family: Verdana;"></td>
            </tr>
            <tr>
              <td style="font-size:10px; font-family:Verdana;">Solicitante/Respons.:</td>
              <td colspan="3"><input name="nome" type="text" value="<?php echo $no; ?>" size="60" style="font-size:10px; font-family: Verdana;"></td>
            </tr>
            <tr> 
              <td style="font-size:10px; font-family:Verdana;">Endere&ccedil;o:</td>
              <td colspan="3"><input name="endereco" type="text" id="endereco2" value="<?php echo $endereco; ?>" size="60" style="font-size:10px; font-family: Verdana;"></td>
            </tr>
            <tr> 
              <td style="font-size:10px; font-family:Verdana;">Email:</td>
              <td colspan="3"><input name="email" type="text" id="email" value="<?php echo $email; ?>" size="60" style="font-size:10px; font-family: Verdana;"></td>
            </tr>
            <tr> 
              <td style="font-size:10px; font-family:Verdana;">Bairro:</td>
              <td width="123"><input name="bairro" type="text" id="bairro2" value="<?php echo $bairro; ?>" style="font-size:10px; font-family: Verdana;"></td>
              <td width="53" style="font-size:10px; font-family:Verdana;">Cidade:</td>
              <td width="120"><input name="cidade" type="text" id="cidade2" value="<?php echo $cidade; ?>" style="font-size:10px; font-family: Verdana;"></td>
            </tr>
            <tr> 
              <td style="font-size:10px; font-family:Verdana;">CEP:</td>
              <td><input name="cep" type="text" id="cep2" value="<?php echo $cep; ?>" style="font-size:10px; font-family: Verdana;"></td>
              <td style="font-size:10px; font-family:Verdana;">UF:</td>
              <td><select name="estado" id="estado" style="font-size:10px; font-family: Verdana;">
                <option value="AC" <?php if($uf=='AC'){echo "SELECTED";}?> >AC</option>
                <option value="AL" <?php if($uf=='AL'){echo "SELECTED";}?> >AL</option>
                <option value="AP" <?php if($uf=='AP'){echo "SELECTED";}?> >AP</option>
                <option value="AM" <?php if($uf=='AM'){echo "SELECTED";}?> >AM</option>
                <option value="BA" <?php if($uf=='BA'){echo "SELECTED";}?> >BA</option>
                <option value="CE" <?php if($uf=='CE'){echo "SELECTED";}?> >CE</option>
                <option value="DF" <?php if($uf=='DF'){echo "SELECTED";}?> >DF</option>
                <option value="ES" <?php if($uf=='ES'){echo "SELECTED";}?> >ES</option>
                <option value="GO" <?php if($uf=='GO'){echo "SELECTED";}?> >GO</option>
                <option value="MA" <?php if($uf=='MA'){echo "SELECTED";}?> >MA</option>
                <option value="MT" <?php if($uf=='MT'){echo "SELECTED";}?> >MT</option>
                <option value="MS" <?php if($uf=='MS'){echo "SELECTED";}?> >MS</option>
                <option value="MG" <?php if($uf=='MG'){echo "SELECTED";}?> >MG</option>
                <option value="PA" <?php if($uf=='PA'){echo "SELECTED";}?> >PA</option>
                <option value="PB" <?php if($uf=='PB'){echo "SELECTED";}?> >PB</option>
                <option value="PR" <?php if($uf=='PR'){echo "SELECTED";}?> >PR</option>
                <option value="PE" <?php if($uf=='PE'){echo "SELECTED";}?> >PE</option>
                <option value="PI" <?php if($uf=='PI'){echo "SELECTED";}?> >PI</option>
                <option value="RJ" <?php if($uf=='RJ'){echo "SELECTED";}?> >RJ</option>
                <option value="RN" <?php if($uf=='RN'){echo "SELECTED";}?> >RN</option>
                <option value="RS" <?php if($uf=='RS'){echo "SELECTED";}?> >RS</option>
                <option value="RO" <?php if($uf=='RO'){echo "SELECTED";}?> >RO</option>
                <option value="RR" <?php if($uf=='RR'){echo "SELECTED";}?> >RR</option>
                <option value="SC" <?php if($uf=='SC'){echo "SELECTED";}?> >SC</option>
                <option value="SP" <?php if($uf=='SP'){echo "SELECTED";}?> >SP</option>
                <option value="SE" <?php if($uf=='SE'){echo "SELECTED";}?> >SE</option>
                <option value="TO" <?php if($uf=='TO'){echo "SELECTED";}?> >TO</option>
              </select></td>
            </tr>
            <tr> 
              <td style="font-size:10px; font-family:Verdana;">Telefone Res.:</td>
              <td><input name="telefone" type="text" id="telefone" value="<?php echo $telr; ?>" style="font-size:10px; font-family: Verdana;"></td>
              <td style="font-size:10px; font-family:Verdana;">Tel. Com.</td>
              <td><input name="comercial" type="text" id="cpf2" style="font-size:10px; font-family: Verdana;" value="<?php echo $telc;?>" maxlength="18"></td>
            </tr>
            <tr> 
              <td rowspan="2" style="font-size:10px; font-family:Verdana;">Celular:</td>
              <td rowspan="2"><input name="celular" type="text" id="celular" value="<?php echo $celular; ?>" style="font-size:10px; font-family: Verdana;"></td>
              <td><span style="font-size:10px; font-family:Verdana;">Cpf/Cnpj: </span></td>
              <td><input name="cpfj" type="text" id="cpf" style="font-size:10px; font-family: Verdana;" value="<?php echo $cpf;  echo $cgc;?>" maxlength="18"></td>
            </tr>
            <tr> 
              <td></td>
              <td></td>
            </tr>
            <tr> 
              <td colspan="4"><div align="center"><input name="flag" type="hidden" value="1"> 
                  <input type="submit" name="Submit2" value="    ALTERAR    " style="font-size:10px; font-family: Verdana;">
                </div></td>
            </tr>
          </table>
 </form>
       </td>
  </tr>
</table>
</body>
</html>
