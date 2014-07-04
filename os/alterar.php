<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt-BR" lang="pt-BR" dir="ltr">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />   
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
        location.href='cadastrar.php?codExcluir='+ codigo;
    }
}

</script>
</head>
 
<body>

<form method="post" action="" name="" >
  <table border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td><button id="buttonBack" type="button" onclick="javascript: history.go(-1);">&lt;&lt; Voltar</button></td>
    </tr>
    <tr>
      <td><table align="center">
        <thead>
          <tr>
            <th id="th1">OS</th>
            <th id="th2">Data Entrada</th>
            <th id="th3">Empresa/Cliente</th>
            <th id="th5">Situação</th>
            <th id="th6">Chat</th>
            <th id="th7">Alterar</th>
            <th id="th7">Excluir</th>
            <th id="th8">Fechar O.S</th>
            
          </tr>
        </thead>
        <tbody>
          <?php 
 include ("../mysql/conexao_mysql.php");
 include ("../mysql/os.sql.php"); 
 ?>
        </tbody>
      </table></td>
    </tr>
  </table>
</form></body>
</html>

