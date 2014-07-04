<?php
session_start();
if(!isset($_COOKIE["dados"]) and !isset($_SESSION["dados"])){
	header("Location: ../login/login.html");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
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
<?php include ("../mysql/empresa.sql.php");?>
<body>
<tr>
    <td><!--<input type="reset" name="novo" id="novo" value="NOVO"/>-->
      <!--<input type="submit" name="alterar" value="ALTERAR" onclick="send('alterar');"/>-->
    </td>
</tr>
  <tr>
<form action="cadastrar.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <fieldset>
    <legend></legend>
    <legend><strong>EMPRESA    </strong></legend>
    <table width="0%" border="0" cellspacing="5" cellpadding="0" style="background:#6CF">
      <tr>
        <td width="55">CNPJ:</td>
        <td colspan="5"><label for="nome">
          <input name="cnpj" type="text" id="cnpj" onkeypress="return nnn(event)" value="<?php echo $cnpj; ?>"/>
        *Somente numeros.</label></td>
      </tr>
      <tr>
        <td>Empresa:</td>
        <td colspan="5"><input name="nome" type="text" id="nome" value="<?php echo $nome;?> "size="92"/></td>
      </tr>
      <tr>
        <td>Endere&ccedil;o:</td>
        <td colspan="3"><input name="endereco" type="text" id="endereco" value="<?php echo $endereco; ?>" size="59"/></td>
        <td width="31">N&deg;</td>
        <td width="120"><input name="numero" type="text" id="numero" value="<?php echo $numero;?>"/></td>
      </tr>
      <tr>
        <td>Cidade:</td>
        <td width="122"><input name="cidade" type="text" id="cidade" value="<?php echo $cidade; ?>"/></td>
        <td width="39">UF:</td>
        <td width="122"><input name="estado" type="text" id="estado" value="<?php echo $estado; ?>"/></td>
        <td>Cep:</td>
        <td><input name="cep" type="text" id="cep" value="<?php echo $cep; ?>"/></td>
      </tr>
      <tr>
        <td>Telefone:</td>
        <td><input name="telefone" type="text" id="telefone" value="<?php echo $telefone;?>"/></td>
        <td>Email:</td>
        <td colspan="3"><input name="email" type="text" id="email" value="<?php echo $email;?>" size="57"/></td>
      </tr>
      <tr>
        <td colspan="6" align="" style="color:#F00;">Obs: Todos os dados devem ser preenchido corretamente para consultas posteriores.</td>
      </tr>
      <tr>
        <td colspan="6" align="center"><input type="submit" name="button" id="button" value="Cadastrar"/>
          <input name="flag" type="hidden" id="flag" value="1"/></td>
      </tr>
    </table>
  </fieldset>
</form>
</body>
</html>