<?php session_start();
@header('P3P: CP="CAO COR CURa ADMa DEVa OUR IND ONL COM DEM PRE"');
//conexao com o banco de dados
include ("../mysql/conexao_mysql.php");

//funo para tratar de sql inject
function injection ($str) {

    if (!is_numeric($str)) {

        $str= get_magic_quotes_gpc() ? stripslashes($str) : $str;

        $str= function_exists("mysql_real_escape_string") ? mysql_real_escape_string($str) : mysql_escape_string($str);

    }

    return $str;

}
//******************************

//receber formulario petodo post com tratamento de sql
$usuario = injection ($_POST['nome']);
$senha   = injection ($_POST['senha']);
$radio   = injection ($_POST['radio']);
//limpar caracters
$usuario = preg_replace( "@[./,:+-]@", "", $usuario );

//compara campos se tiver vazio
if (($usuario=='') or ($senha=='')or($radio==''))
{
print "<div align=\"center\"><font='2'>Preencha Todos os Campos</font></div>";
echo "<meta HTTP-EQUIV=\"refresh\" CONTENT=\"2; URL=login.html\">";
exit();
}
//echo "$radio---";
//consulta no banco de dados se usuario existe

if ($radio=='os')
{
$sql = "SELECT * FROM os, cliente AS cli
		WHERE os.idOs = '$senha'
		AND os.codCliente = cli.idCliente";
	if (strlen($usuario)==11){
	$sql."AND cli.cpf = '$usuario'";
	}
	else{$sql."OR cli.cnpj='$usuario'";}
}

else if ($radio=='pro')
{
$sql = "SELECT * FROM os, cliente AS cli
		WHERE os.protocolo = '$senha'
		AND os.codCliente = cli.idCliente"; 
	if (strlen($usuario)==11){
	$sql."AND cli.cpf = '$usuario'";
	}
	else{$sql."OR cli.cnpj='$usuario'";}
}

$sql = mysql_query($sql) or die (mysql_error());

$retorno = mysql_num_rows ($sql);


//mandar mensgem de ususario nao encontrado
if ($retorno == 0 )
{
//redirecionar a pagina
echo "<div align=\"center\"><font='2'>Usuário ou senha Invalidos</font></div>";
echo "<meta HTTP-EQUIV=\"refresh\" CONTENT=\"2; URL=login.html\">";
exit();
}
else
{
$linha = mysql_fetch_array($sql);

$loginxy	= $linha['idOs'];
$nomeclixy	= $linha['pessoaJuridica'];
$nomecliy	= $linha['pessoaFisica'];
$codclixy	= $linha['idCliente'];

}


$_SESSION['nomeclixy'] = $nomeclixy;
$_SESSION['loginxy']   = $loginxy;
$_SESSION['codclixy']  = $codclixy;

//Redireciona para a pgina principal
//header("Location: ../index.php");


echo "<meta HTTP-EQUIV=\"refresh\" CONTENT=\"0; URL=../index.php\">";
?>
