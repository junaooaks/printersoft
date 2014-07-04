<?php
session_start();
if(!isset($_COOKIE["dados"]) and !isset($_SESSION["dados"])){
	header("Location: ../login/login.html");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
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
<?php include ("../mysql/usuario.sql.php");?>
</head>

<body>
<form id="form1" name="form1" method="post" action="cadastrar.php">
<fieldset>
 <legend><strong>CADASTRO USUARIO</strong></legend>
 <table width="0" border="0" align="center" cellpadding="0" cellspacing="5" style="background:#6CF">
   <tr>
     <td width="44">Nome*:</td>
     <td colspan="3"><label for="nome"></label>
       <input name="nome" type="text" id="nome" value="<?php echo $usuario; ?>" size="65" maxlength="200" /></td>
     </tr>
   <tr>
     <td>Email:</td>
     <td colspan="3"><label for="login"></label>
       <input name="email" type="text" id="email" value="<?php echo $email; ?>" size="65" maxlength="150" /></td>
     </tr>
   <tr>
     <td>Login*:</td>
     <td colspan="3"><input name="login" type="text" id="login" value="<?php echo $login; ?>" size="65" maxlength="20" /></td>
   </tr>
   <tr>
     <td>Senha:</td>
     <td width="125"><label for="senha"></label>
       <input name="senha" type="text" id="senha" /></td>
     <td width="74">Rep. Senha:</td>
     <td width="146"><label for="repetesenha"></label>
       <input name="repetesenha" type="text" id="repetesenha" /></td>
     </tr>
   <tr>
     <td colspan="4"><table width="0" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>
    <fieldset>
 <legend><strong>PERMISSAO</strong></legend>
 <table width="100%" border="0" cellspacing="5" cellpadding="0">
   <tr>
     <td width="46%"><input name="radio" type="radio" id="radio" value="1" <?php if ($acesso == 1){echo "checked='checked'";} ?> />
       <label for="radio"></label>
       <label for="acesso"></label>
       Administrativo</td>
     </tr>
   <tr>
     <td>       <input type="radio" name="radio" id="radio2" value="2" <?php if ($acesso == 2){echo "checked='checked'";} ?>/>
       <label for="radio"></label>
       Tecnico</td>
     </tr>
   <tr>
     <td><input type="radio" name="radio" id="radio3" value="3" <?php if ($acesso == 3){echo "checked='checked'";} ?>/>
       <label for="radio"></label>
       Atendente</td>
     </tr>
 </table>
     </fieldset>
    
    </td>
    <td><fieldset>
       <legend><strong>TELEFONES</strong></legend>
       <table width="0" border="0" cellspacing="5" cellpadding="0">
         <tr>
           <td>Residencial:</td>
           <td><label for="textfield6"></label>
             <input name="telefone" type="text" id="textfield6" value="<?php echo $tel; ?>" size="20" maxlength="20" /></td>
           </tr>
         <tr>
           <td>Celular</td>
           <td><input name="celular" type="text" id="textfield" value="<?php echo $cel; ?>" size="20" maxlength="20" /></td>
           </tr>
         <tr>
           <td>Complementar:</td>
           <td><input name="complementar" type="text" id="textfield2" value="<?php echo $comple; ?>" size="20" maxlength="200" /></td>
           </tr>
         </table>
     </fieldset></td>
  </tr>
</table>
       <input name="flag" type="hidden" id="flag" value="1" />
       <input name="codAlterar" type="hidden" id="codAlterar" value="<?php echo $codAlterar;?>" /></td>
     </tr>
   <tr>
     <td colspan="4" align="center"><button id="buttonBack" type="button" onclick="javascript: history.go(-1);">&lt;&lt; Voltar</button>        
     <input type="submit" name="button" id="button" value="Cadastrar" /></td>
   </tr>
 </table>
 <table width="100%" border="0" cellspacing="5" cellpadding="0">
   <tr>
     <td width="54%" colspan="5"></td>
   </tr>
 </table>
</fieldset>
</form>
</body>
</html>