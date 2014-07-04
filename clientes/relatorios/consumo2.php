<?php session_start(); 
@header('P3P: CP="CAO COR CURa ADMa DEVa OUR IND ONL COM DEM PRE"');
?>
<title>SISGEW</title>
<?php
require "../login/verifica.php";
include "../../conexao_mysql.php";

//$codcli=$_SESSION['codclixy'];

//consultar mac do cliente na tabela relacionamento
//$qq =mysql_query("SELECT * FROM relacionamento WHERE id_cliente = '$codcli'")or die (mysql_error());

//pegar retorno do banco de dados 
//$linha = mysql_fetch_array($qq);
//$mac	= $linha['mac'];
//$mac2	= $linha['mac2'];
$b_in=0;
$b_out=0;
echo "<h3><font face='verdana'> Usuário : $loginxy </font></h3>";
echo " <body bgcolor='#FFFFFF'> <font face='verdana' size='3' ><table border='1' cellspacing='5' cellpadding='0'>";
//echo"<table border='1' cellspacing='4' cellpadding='0'>";
echo "<tr><td style='font-size:10px; font-family:Verdana;'>Data Entrada</td><td style='font-size:10px; font-family:Verdana;'>Data Saida</td><td style='font-size:10px; font-family:Verdana;'>Enviados</td><td style='font-size:10px; font-family:Verdana;'>Recebidos</td></tr>";

$sql="SELECT * FROM  `radacct` WHERE  UserName='$loginxy' ORDER BY AcctStartTime DESC LIMIT 500" ;
$sql = mysql_query($sql) or die (mysql_error());
while ($row = mysql_fetch_array($sql)){

$in     	= $row ['AcctInputOctets'];
$out     	= $row ['AcctOutputOctets'];
$data_in 	= $row ['AcctStartTime'];
$data_out 	= $row ['AcctStopTime'];
$torre 		= $row ['NASIPAddress'];

if (($in<>0)and($out<>0)) 
	{
	echo "<tr><td style='font-size:10px; font-family:Verdana;'>$data_in</td>
		      <td style='font-size:10px; font-family:Verdana;'>$data_out</td>
			  <td style='font-size:10px; font-family:Verdana;'>$in</td>
			  <td style='font-size:10px; font-family:Verdana;'>$out</td>
		  </tr>";


//echo "Etrada - $data_in - $in - $out - $data_out <br>";

	$b_in = $b_in+$in;
	$b_out = $b_out+$out;
	}

} echo "</table>";
//echo "Enviados=$b_in - o-$b_out";
$xb_in=$b_in;
$xb_out=$b_out;
$nd = 0;
while ($xb_in>1024)
{$xb_in=$xb_in/1024;$nd=$nd+1;}
if ($nd==0) 
$uni="bytes";
elseif ($nd==1) 
$uni="Bbytes";
elseif ($nd==2) 
$uni="Mbytes";
elseif ($nd==3) 
$uni="Gbytes";
elseif ($nd==4) 
$uni="Tbytes";

$nd=0;
while ($xb_out>1024)
{$xb_out=$xb_out/1024;$nd=$nd+1;}
if ($nd==0)
$un="bytes";
elseif ($nd==1)
$un="Kbytes";
elseif ($nd==2)
$un="Mbytes";
elseif ($nd==3)
$un="Gbytes";
elseif ($nd==4)
$un="Tbytes";

$in=round ($xb_in,3);
$out=round ($xb_out,3);

echo "<tr><font face='verdana' size='2'> Consumo registrado nas últimas (até 500) conexões :<br> Bytes Enviados = $in $uni<br>
Bytes Recebidos = $out $un </font></tr></body>";

?>
