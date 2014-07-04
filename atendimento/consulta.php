<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt-BR" lang="pt-BR" dir="ltr">
<head>
   	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1"/>
    <title>PRINTER Software</title>
    <link rel="stylesheet" type="text/css" href="../css/css.css" />
       
   <script type="text/Javascript">
function send(action)
{
	switch(action) {
		case 'novo':
			url = 'index.php?flag=4';
			break;
		
	}

	document.forms[0].action = url;
	document.forms[0].submit();
}
   
</script>
<script language="JavaScript">

function confirma(codigo) {
    if( confirm( 'ESTA OPCAO E IRREVERSIVEL. DESEJA REALMENTE FAZER ISTO?' ) ) 
    {
        location.href='cadastrar.php?codExcluir=' + codigo;
    }
}

</script>
</head>
 
<body>

<form method="post" action="" name="" >
  <table border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td>&nbsp;</td>
      <td><label for="piloto"></label></td>
      <td><input type="submit" name="novo" value="Incluir Atendimento" onclick="send('novo');"/></td>
    </tr>
  </table>
  <hr />
  <table align="center">
<thead>

<tr>
    <th id="th1">Atendimento</th>
    <th id="th2">Alterar</th>
    <th id="th7">Excluir</th>
    </tr>
</thead>
<tbody>
 <?php 
 include ("../mysql/conexao_mysql.php");
 include ("../mysql/atendimento.sql.php");
  ?>
 
    </tbody>
</table>
</form>
<br />
<br />
<br />
</div>
</body>
</html>

