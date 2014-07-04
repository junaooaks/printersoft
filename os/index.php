<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PRINTER Software</title>
<script type="text/javascript" src="../javascript/jquery-1.1.3.1.pack.js"></script>
<script type="text/javascript" src="../javascript/jquery.history_remote.pack.js"></script>
<script type="text/javascript" src="../javascript/jquery.tabs.pack.js"></script>
<script type="text/javascript" src="../javascript/pupdate.js"></script>
<script type="text/javascript" src="../javascript/data.js"></script>
<style type="text/css">@import url("../css/form.css");</style>

<script type="text/Javascript">
function send(action)
{
	switch(action) {
		case 'novo':
			url = 'imprimir.php?<?php echo "codos=$codos&codcliente=$codcliente"?>';
			break;
		
	}

	document.forms[0].action = url;
	document.forms[0].submit();
}
   
</script>
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
<?php  include ("../mysql/os.sql.php"); ?>
<body>
<input type="submit" name="novo" value="IMPRIMIR OS" onclick="send('novo');"/>
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
              <input name="cnpjcpf" type="text" id="cnpjcpf" value="<?php echo $cnpj; echo $cpf; ?>"size="25" readonly="true"/>
              <input name="codCliente" type="hidden" id="codCliente" value="<?php echo $id;?>" /></td>
          </tr>
          <tr>
            <td>Empresa/Cliente:</td>
            <td><input name="empresa" type="text" id="nome3" value="<?php echo $empresa; ?>" size="90" readonly="true"/></td>
          </tr>
          <tr>
            <td>Solicitante/Respons.:</td>
            <td><input name="nome" type="text" id="nome5" value="<?php echo $nome; ?>" size="90" readonly="true"/></td>
          </tr>
          <tr>
            <td>Email:</td>
            <td><input name="email" type="text" id="nome" value="<?php echo $email; ?>" size="90" readonly="true"/></td>
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
              <input name="endereco" type="text" id="endereco" value="<?php echo $endereco; ?>" size="100" readonly="true"/></td>
            </tr>
          <tr>
            <td>Entrega:</td>
            <td colspan="5"><input name="entrega" type="text" id="entrega" value="<?php echo $entrega; ?>" size="100" readonly="true"/></td>
          </tr>
          <tr>
            <td>Bairro*:</td>
            <td><input name="bairro" type="text" id="bairro" value="<?php echo $bairro; ?>" size="30" readonly="true"/></td>
            <td>Cep:</td>
            <td><input name="cep" type="text" id="cep" value="<?php echo $cep; ?>" size="10" readonly="true"/></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>UF:</td>
            <td><input name="estado" type="text" id="estado" value="<?php echo $uf; ?>" size="30" readonly="readonly"/></td>
            <td>Cidade*:</td>
            <td colspan="3"><input name="cidade" type="text" id="cidade" value="<?php echo $cidade; ?>" size="20" readonly="true"/></td>
            </tr>
          <tr>
          <td>Tel Resid.:</td>
            <td><input name="telefone" type="text" id="telefone" value="<?php echo $telefone; ?>" size="30" readonly="true"/></td>
            <td>Tel.Com.</td>
            <td><input name="telefoneComercial" type="text" id="telefoneComercial" value="<?php echo $telComercial; ?>" size="10" readonly="true"/></td>
            <td>Celular:</td>
            <td><input name="celular" type="text" id="celular" value="<?php echo $celular; ?>" size="20" readonly="true"/></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td colspan="5"><label for="email">
              <input name="flag" type="hidden" id="flag" value="1"/>
              <input name="codAlterar" type="hidden" id="codAlterar" value="<?php $codos = $_REQUEST['codos']; echo $codos;?>"/>
              <input name="form" type="hidden" id="form4" value="4" />
            </label></td>
            </tr>
          </table>
      </fieldset>      
      </td>
    </tr>
    </table>
  <table width="0%" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td><fieldset>
        <legend><strong>ORDEM DE SERVIÇO</strong></legend>
        <table width="0" border="0" cellspacing="5" cellpadding="0">
        <tr></tr>
        <tr>
          <td>Protocolo:</td>
          <td><label for="protocolo"></label>
            <input name="protocolo" type="text" id="protocolo" value="<?php echo $proto; ?>" size="20" /></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td>Equipamentos*:</td>
          <td colspan="5"><label for="select2"></label>
            <label for="equipamento2"></label>
            <label for="endereco2"></label>
            <select name="equipamento" size="1" id="equipamento2">
              <option value="" >ESCOLHA::</option>
              <?php
			 	  
				  $consulta = $pdo->prepare("SELECT * FROM equipamento");
				  $consulta->execute();
                  while($linha = $consulta->fetch())
					{
					$idg   = $linha['idEquipamento'];
					$grupo = utf8_decode($linha['descricao']);
					
					if ($codequi==$idg){
						echo "<option value='$idg' selected>".htmlentities($grupo)."</option>";
					}else{
					echo "<option value='$idg'>".htmlentities($grupo)."</option>";
					}
				   }
				   			
              ?>
            </select>
            Marca/Fab.*:
            <select name="marca" size="1" id="marca">
              <option value="">ESCOLHA::</option>
              <?php
			 	  
				  $consulta = $pdo->prepare("SELECT * FROM marca");
				  $consulta->execute();
                  while($linha = $consulta->fetch())
					{
					$idg   = $linha['idMarca'];
					$grupo = utf8_decode($linha['descricao']);
					if ($codmarca==$idg){
						echo "<option value='$idg' selected>".htmlentities($grupo)."</option>";
					}else{
					echo "<option value='$idg'>".htmlentities($grupo)."</option>";
					}
				   }
				   			
              ?>
            </select>
            Data Entrada:
            <input name="data" type="text" id="data" value="<?php echo date('d/m/Y'); ?>" size="25" readonly="true"/></td>
        </tr>
        <tr>
          <td>Tipo Atendimento*:</td>
          <td><select name="atendimento" id="atendimento">
            <option value="" selected>ESCOLHA::</option>
            <?php
			 	  
				   
				   
				  $consulta = $pdo->prepare("SELECT * FROM atendimento");
				  $consulta->execute();
                  while($linha = $consulta->fetch())
					{
					$idg   = $linha['idAtendimento'];
					$grupo = utf8_decode($linha['descricao']);
					
					if ($codaten==$idg){
						echo "<option value='$idg' selected>".htmlentities($grupo)."</option>";
					}else{
					echo "<option value='$idg'>".htmlentities($grupo)."</option>";
					}
					
					}	
			
              ?>
          </select></td>
          <td>Previsao:</td>
          <td colspan="3"><input name="previsao" type="text" id="previsao" value="<?php echo $dataen; ?>" size="20"/></td>
        </tr>
        <tr>
          <td>Modelo:</td>
          <td><input name="modelo" type="text" id="modelo" value="<?php echo $modelo; ?>" size="30"/></td>
          <td>Acessorio*:</td>
          <td colspan="3"><select name="acessorio" id="acessorio">
            <option value="" selected>ESCOLHA::</option>
            <?php
			 	  
				  $consulta = $pdo->prepare("SELECT * FROM acessorio");
				  $consulta->execute();
                  while($linha = $consulta->fetch())
					{
					$idg   = $linha['idAcessorio'];
					$grupo = utf8_decode($linha['descricao']);
					
					if ($codace==$idg){
						echo "<option value='$idg' selected>".htmlentities($grupo)."</option>";
					}else{
					echo "<option value='$idg'>".htmlentities($grupo)."</option>";
					}
					
					   }
			
              ?>
          </select></td>
        </tr>
        <tr>
          <td>Status*:</td>
          <td><select name="status" id="status">
            <option value="" selected>ESCOLHA::</option>
            <?php
			 	 
				  $consulta = $pdo->prepare("SELECT * FROM status");
				  $consulta->execute();
                  while($linha = $consulta->fetch())
					{
					$idg   = $linha['idStatus'];
					$grupo = utf8_decode($linha['descricao']);
					
					if ($codstatus==$idg){
						echo "<option value='$idg' selected>".htmlentities($grupo)."</option>";
					}else{
					echo "<option value='$idg'>".htmlentities($grupo)."</option>";
					}
					}	
				   
              ?>
          </select></td>
          <td>Técnico*:</td>
          <td colspan="3"><select name="tecnico" id="tecnico">
            <option value="" selected>ESCOLHA::</option>
            <?php
			 	
			  $consulta = $pdo->prepare("SELECT * FROM usuarios");
			  $consulta->execute();
                  	  while($linha = $consulta->fetch())
					{
					$idg   = $linha['idUsuario'];
					$grupo = utf8_decode($linha['login']);
					
					if ($codtec==$idg){
						echo "<option value='$idg' selected>".htmlentities($grupo)."</option>";
					}else{
					echo "<option value='$idg'>".htmlentities($grupo)."</option>";
					}
					}
              ?>
          </select></td>
        </tr>
        <tr>
          <td>N° Patrimonio:</td>
          <td><input name="patrimonio" type="text" id="patrimonio" value="<?php echo $patrimonio; ?>" size="30"/></td>
          <td>N° Serie:</td>
          <td ><input name="serie" type="text" id="serie" value="<?php echo $serie; ?>" size="10"/></td>
          <td>Setor:</td>
          <td><label for="setor2"></label>
            <input name="setor" type="text" id="setor2" value="<?php echo $setor; ?>" /></td>
        </tr>
        <tr>
          <td valign="top">Reclamação:</td>
          <td colspan="5"><label for="fileField2"></label>
            <label for="diagnostico2"></label>
            <textarea name="diagnostico" id="diagnostico2" cols="90" rows="3"><?php echo $diagnostico;?></textarea></td>
        </tr>
        </table>
      </fieldset></td>
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
      <td align="center">
        <button id="buttonBack" type="button" onclick="javascript: history.go(-1);">&lt;&lt; Voltar</button><input type="submit" name="button" id="button" value="<?php if ($codos==''){echo "Cadastrar";}else{echo "Alterar";}?>"/></td>
    </tr>
  </table>
  </form>

        

</body>
</html>
