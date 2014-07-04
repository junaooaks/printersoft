<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
        location.href='cadastrar.php?codExcluir='+ codigo;
    }
}

</script>
</head>
 
<body>


  <table border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td><table width="0%" border="0" align="center" cellpadding="0" cellspacing="5">
        <tr>
          <td align="right"><input type="submit" name="novo" value="Cadastro Cliente" onclick="send('novo');"/></td>
        </tr>
        <tr>
          <td><fieldset>
            <legend></legend>
            <form id="form1" name="form1" method="post" action="">
              <legend><strong>NOME CLIENTE</strong></legend>
              <table width="0%" border="0" cellspacing="5" cellpadding="0">
                <tr>
                  <td>Empresa/Cliente:</td>
                  <td><label for="consulta">
                    <input name="solicitante" type="text" id="solicitante" size="50" />
                  </label></td>
                </tr>
                <tr>
                  <td>Solicitante/Respons&aacute;vel:</td>
                  <td><input name="consulta" type="text" id="consulta" size="50" /></td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td><input type="submit" name="button" id="button" value="Buscar" /></td>
                </tr>
              </table>
            </form>
          </fieldset></td>
        </tr>
        <tr>
          <td align="center">&nbsp;</td>
        </tr>
      </table></td>
    </tr>
    <tr>
      <td><table align="center">
        <thead>
          <tr>
            <th id="th1">Empresa/Cliente:</th>
            <th id="th1">Solicitante/Respons&aacute;vel:</th>
            <th id="th2">Alterar</th>
            <th id="th3">Excluir</th>
            <th id="th3">Criar O.S</th>
            
          </tr>
        </thead>
        <tbody>
          <?php 
 include ("../mysql/conexao_mysql.php");
 include ("../mysql/cliente.sql.php"); 
 ?>
        </tbody>
      </table></td>
    </tr>
  </table>
</body>
</html>

