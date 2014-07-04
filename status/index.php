<?php
session_start();
if(!isset($_COOKIE["dados"]) and !isset($_SESSION["dados"])){
	header("Location: ../login/login.html");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt-BR" lang="pt-BR" dir="ltr">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PRINTER Software</title>
<style type="text/css">@import url("../css/form.css");</style>
<script language='JavaScript'>
function send(action)
{
	switch(action) {
		case 'alterar':
			url = 'consulta.php';
			break;
		/*case 'excluir':
			url = 'excluir.php';
			break;
			*/
	}

	document.forms[0].action = url;
	document.forms[0].submit();
}
</script>

<script language='JavaScript'>
            function nnn(e){
                var tecla=(window.event)?event.keyCode:e.which;
                if ((tecla > 47 && tecla < 58))return true;
                else{
                    if (tecla != 8) return false;
                    else return true;
                }
            }
        </script>
<style type="text/css">
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
</style>
</head>
<?php include ("../mysql/conexao_mysql.php");?>
<?php include ("../mysql/status.sql.php");?>
<body>
<tr>
    <td><!--<input type="reset" name="novo" id="novo" value="NOVO"/>-->
      <!--<input type="submit" name="alterar" value="ALTERAR" onclick="send('alterar');"/>-->
    </td>
</tr>
  <tr>
  <tr>
    <td>&nbsp;</td>
</tr>
  <tr>
<form action="cadastrar.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <fieldset>
    <legend></legend>
    <legend><strong><strong>STATUS</strong> </strong></legend>
    <table border="0" cellspacing="5" cellpadding="0" style="background:#6CF">
     <tr>
        <td >Descri&ccedil;&atilde;o:</td>
        <td ><label for="grupo"></label>
          <input name="grupo" type="text" id="grupo" value="<?php echo htmlentities($grupo); ?>" size="30" />          <label for="banco"></label></td>
        </tr>
      <tr>
        <td colspan="2" align="center"><button id="buttonBack" type="button" onclick="javascript: history.go(-1);">&lt;&lt; Voltar</button>        
        <input type="submit" name="button" id="button" value="<?php if ($codAlterar==''){echo "Cadastrar";}else{echo "Alterar";}?>" />
          <input name="flag" type="hidden" id="flag" value="1" />
          <input name="codAlterar" type="hidden" id="codAlterar" value="<?php echo $codAlterar;?>" /></td>
      </tr>
    </table>
  </fieldset>
</form>
</body>
</html>