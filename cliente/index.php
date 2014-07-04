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


<script type="text/javascript">
           $(function() {

                $('#container-1').tabs();
                $('#container-2').tabs(2);
                $('#container-3').tabs({ fxSlide: true });
                $('#container-4').tabs({ fxFade: true, fxSpeed: 'fast' });
                $('#container-5').tabs({ fxSlide: true, fxFade: true, fxSpeed: 'normal' });
                $('#container-6').tabs({
                    fxFade: true,
                    fxSpeed: 'fast',
                    onClick: function() {
                        alert('onClick');
                    },
                    onHide: function() {
                        alert('onHide');
                    },
                    onShow: function() {
                        alert('onShow');
                    }
                });
                $('#container-7').tabs({ fxAutoHeight: true });
                $('#container-8').tabs({ fxShow: { height: 'show', opacity: 'show' }, fxSpeed: 'normal' });
                $('#container-9').tabs({ remote: true });
                $('#container-10').tabs();
                $('#container-11').tabs({ disabled: [3] });

                $('<p><a href="#">Disable third tab<\/a><\/p>').prependTo('#fragment-29').find('a').click(function() {
                    $(this).parents('div').eq(1).disableTab(4);
                    return false;
                });
                $('<p><a href="#">Activate third tab<\/a><\/p>').prependTo('#fragment-29').find('a').click(function() {
                    $(this).parents('div').eq(1).triggerTab(4);
                    return false;
                });
                $('<p><a href="#">Enable third tab<\/a><\/p>').prependTo('#fragment-29').find('a').click(function() {
                    $(this).parents('div').eq(1).enableTab(4);
                    return false;
                });

            });
        </script>

        <link rel="stylesheet" href="../css/jquery.tabs.css" type="text/css" media="print, projection, screen">
        <!-- Additional IE/Win specific style sheet (Conditional Comments) -->
        <!--[if lte IE 7]>
        <link rel="stylesheet" href="jquery.tabs-ie.css" type="text/css" media="projection, screen">
        <![endif]-->
       
    <style type="text/css">
    body {
	background-color: #9CF;
}
    </style>
</head>
<?php include ("../mysql/conexao_mysql.php");?>
<?php if ($flag<>'4'){ include ("../mysql/cliente.sql.php");}?>
<body>
  <form action="cadastrar.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
               
  <table width="0%" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td>
      <fieldset>
        <legend><strong>IDENTIFICACAO DO CLIENTE</strong></legend>
        <table border="0" cellspacing="5" cellpadding="0">
          <tr>
            <td width="134" >Cnpj/Cpf*:</td>
            <td width="421"><label for="civil"></label>
              <label for="cnpj"></label>
              <input name="cnpjcpf" type="text" id="cnpjcpf" value="<?php echo $cnpj; echo $cpf; ?>"size="25"/></td>
          </tr>
          <tr>
            <td>Empresa/Cliente:</td>
            <td><input name="empresa" type="text" id="nome3" value="<?php echo $empresa; ?>" size="90"/></td>
          </tr>
          <tr>
            <td>Solicitante/Respons.:</td>
            <td><input name="nome" type="text" id="nome5" value="<?php echo $nome; ?>" size="90"/></td>
          </tr>
          <tr>
            <td>Email:</td>
            <td><input name="email" type="text" id="nome" value="<?php echo $email; ?>" size="90"/></td>
          </tr>
        </table>
        <legend><strong> </strong></legend>
      </fieldset>
      
      </td>
    </tr>
    </table>
  

  
    
  <table width="0%" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td>
      <fieldset>
        <legend><strong>ENDERE&Ccedil;O</strong></legend>
        
        <table width="0" border="0" cellspacing="5" cellpadding="0">
          <tr>
            <td>Logadura*:</td>
            <td colspan="5"><label for="endereco"></label>
              <input name="endereco" type="text" id="endereco" value="<?php echo $endereco; ?>" size="100"/></td>
            </tr>
          <tr>
            <td>Entrega:</td>
            <td colspan="5"><input name="entrega" type="text" id="entrega" value="<?php echo $entrega; ?>" size="100"/></td>
          </tr>
          <tr>
            <td>Bairro*:</td>
            <td><input name="bairro" type="text" id="bairro" value="<?php echo $bairro; ?>" size="30"/></td>
            <td>Cep:</td>
            <td><input name="cep" type="text" id="cep" value="<?php echo $cep; ?>" size="10"/></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>UF:</td>
            <td><select name="estado" id="estado">
              <option value="AC" <?php if($uf=='AC'){echo "SELECTED";}?> >Acre - AC</option>
              <option value="AL" <?php if($uf=='AL'){echo "SELECTED";}?> >Alagoas - AL</option>
              <option value="AP" <?php if($uf=='AP'){echo "SELECTED";}?> >Amap&aacute; - AP</option>
              <option value="AM" <?php if($uf=='AM'){echo "SELECTED";}?> >Amazonas - AM</option>
              <option value="BA" <?php if($uf=='BA'){echo "SELECTED";}?> >Bahia - BA</option>
              <option value="CE" <?php if($uf=='CE'){echo "SELECTED";}?> >Cear&aacute; - CE</option>
              <option value="DF" <?php if($uf=='DF'){echo "SELECTED";}?> >Distrito Federal - DF</option>
              <option value="ES" <?php if($uf=='ES'){echo "SELECTED";}?> >Esp&iacute;rito Santo - ES</option>
              <option value="GO" <?php if($uf=='GO'){echo "SELECTED";}?> >Goi&aacute;s - GO</option>
              <option value="MA" <?php if($uf=='MA'){echo "SELECTED";}?> >Maranh&atilde;o - MA</option>
              <option value="MT" <?php if($uf=='MT'){echo "SELECTED";}?> >Mato Grosso - MT</option>
              <option value="MS" <?php if($uf=='MS'){echo "SELECTED";}?> >Mato Grosso do Sul - MS</option>
              <option value="MG" <?php if($uf=='MG'){echo "SELECTED";}?> >Minas Gerais - MG</option>
              <option value="PA" <?php if($uf=='PA'){echo "SELECTED";}?> >Par&aacute; - PA</option>
              <option value="PB" <?php if($uf=='PB'){echo "SELECTED";}?> >Para&iacute;ba - PB</option>
              <option value="PR" <?php if($uf=='PR'){echo "SELECTED";}?> >Paran&aacute; - PR</option>
              <option value="PE" <?php if($uf=='PE'){echo "SELECTED";}?> >Pernambuco - PE</option>
              <option value="PI" <?php if($uf=='PI'){echo "SELECTED";}?> >Piau&iacute; - PI</option>
              <option value="RJ" <?php if($uf=='RJ'){echo "SELECTED";}?> >Rio de Janeiro - RJ</option>
              <option value="RN" <?php if($uf=='RN'){echo "SELECTED";}?> >Rio Grande do Norte - RN</option>
              <option value="RS" <?php if($uf=='RS'){echo "SELECTED";}?> >Rio Grande do Sul - RS</option>
              <option value="RO" <?php if($uf=='RO'){echo "SELECTED";}?> >Rond&ocirc;nia - RO</option>
              <option value="RR" <?php if($uf=='RR'){echo "SELECTED";}?> >Ror&acirc;ima - RR</option>
              <option value="SC" <?php if($uf=='SC'){echo "SELECTED";}?> >Santa Catarina - SC</option>
              <option value="SP" <?php if($uf=='SP'){echo "SELECTED";}?> >S&atilde;o Paulo - SP</option>
              <option value="SE" <?php if($uf=='SE'){echo "SELECTED";}?> >Sergipe - SE</option>
              <option value="TO" <?php if($uf=='TO'){echo "SELECTED";}?> >Tocantins - TO</option>
            </select></td>
            <td>Cidade*:</td>
            <td colspan="3"><input name="cidade" type="text" id="cidade" value="<?php echo $cidade; ?>" size="20"/></td>
            </tr>
          <tr>
          <td>Tel Resid.:</td>
            <td><input name="telefone" type="text" id="telefone" value="<?php echo $telefone; ?>" size="30"/></td>
            <td>Tel.Com.</td>
            <td><input name="telefoneComercial" type="text" id="telefoneComercial" value="<?php echo $telComercial; ?>" size="10"/></td>
            <td>Celular:</td>
            <td><input name="celular" type="text" id="celular" value="<?php echo $celular; ?>" size="20"/></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td colspan="5"><label for="email"></label></td>
            </tr>
          <tr>
            <td colspan="2">Informa&ccedil;&otilde;es Adicionais:</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td colspan="6"><label for="adicionais"></label>
              <textarea name="adicionais" id="adicionais" cols="100" rows="5"><?php echo $adicionais; ?></textarea>
              <input name="flag" type="hidden" id="flag" value="1"/>
              <input name="codAlterar" type="hidden" id="codAlterar" value="<?php echo $codAlterar;?>"/>
              <input name="form" type="hidden" id="form4" value="4" /></td>
          </tr>
          </table>
      </fieldset>      
      </td>
    </tr>
    </table>
  

    
    <hr />
<table width="0%" border="0" align="center" cellpadding="0" cellspacing="5">
    <tr>
      <td></td>
    </tr>
    <tr>
    
      <td></td>
    </tr>
    <tr>
      <td align="center"><button id="buttonBack" type="button" onclick="javascript: history.go(-1);">&lt;&lt; Voltar</button>        
        <input type="submit" name="button" id="button" value="<?php if ($codAlterar==''){echo "Cadastrar";}else{echo "Alterar";}?>"/></td>
    </tr>
  </table>
  </form>

        

</body>
</html>
