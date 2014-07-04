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
<script type="text/javascript" src="../javascript/jquery-1.1.3.1.pack.js"></script>
<script type="text/javascript" src="../javascript/jquery.history_remote.pack.js"></script>
<script type="text/javascript" src="../javascript/jquery.tabs.pack.js"></script>
<script type="text/javascript" src="../javascript/pupdate.js"></script>
<script type="text/javascript" src="../javascript/data.js"></script>
<!--<script type="text/javascript" src="../javascript/acento.js"></script>-->
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
<?php include ("../mysql/os.sql.php");?>
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
              <input name="cnpjcpf" type="text" id="cnpjcpf" value="<?php echo $cnpj; echo $cpf; ?>"size="25" readonly="true"/>
              <input name="cliente" type="hidden" id="cliente" value="<?php echo $id;?>" /></td>
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
            <td>Cidade:</td>
            <td><input name="email" type="text" id="nome" value="<?php echo $cidade; ?>" size="90" readonly="true"/></td>
          </tr>
          <tr>
            <td>Endereço:</td>
            <td><input name="email" type="text" id="nome" value="<?php echo $endereco; ?>" size="90" readonly="true"/></td>
          </tr>          <tr>
            <td>Telefone</td>
            <td><input name="nome2" type="text" id="nome2" value="<?php echo "tel.Comer = $telComercial, tel.Res.= $telefone, Cel = $celular"; ?>" size="90" readonly="readonly"/></td>
          </tr>
        </table>
        <legend><strong> </strong></legend>
      </fieldset>
      
      </td>
    </tr>
    </table>
  <table width="0%" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td><fieldset>
        <legend><strong>ORDEM DE SERVIÇO</strong></legend>
        <table width="0" border="0" cellspacing="5" cellpadding="0">
          <tr>
            <td>Equipamentos*:</td>
            <td colspan="5">
              <input name="equi" type="text" id="equi" value="<?php
			 	  
				  $consulta = $pdo->prepare("SELECT * FROM equipamento where idEquipamento='$codequi'");
				  $consulta->execute();
                  while($linha = $consulta->fetch())
					{
					
					$grupo = htmlentities($linha['descricao']);
					
					
						echo $grupo;
					
				   }
				   			
              ?>" readonly="readonly"/>
              Marca/Fab.*:
              <input name="mar" type="text" id="mar" value=" <?php
			 	  
				  $consulta = $pdo->prepare("SELECT * FROM marca WHERE idMarca = '$codmarca'");
				  $consulta->execute();
                  while($linha = $consulta->fetch())
					{
					
					$grupo = htmlentities($linha['descricao']);
					
					echo $grupo;
					
				   }
				   			
              ?>" readonly="readonly"/>              
              Data Entrada:
              <input name="data" type="text" id="data" value="<?php echo $data;?>" size="20" readonly="true"/></td>
            </tr>
          <tr>
            <td>Tipo Atendimento*:</td>
            <td>
              <input name="textfield" type="text" id="textfield" value="<?php
			 	  
				   
				   
				  $consulta = $pdo->prepare("SELECT * FROM atendimento WHERE idAtendimento='$codaten'");
				  $consulta->execute();
                  while($linha = $consulta->fetch())
					{
					
					$grupo = htmlentities($linha['descricao']);
					
					
					echo $grupo;
					
					
					}	
			
              ?>" readonly="readonly"/></td>
            <td>Técnico*:</td>
            <td colspan="3">
              <input name="textfield4" type="text" id="textfield4" value="<?php
			 	
				  $consulta = $pdo->prepare("SELECT * FROM usuarios WHERE idUsuario = '$codtec'");
				  $consulta->execute();
                  while($linha = $consulta->fetch())
					{
					
					$grupo = htmlentities($linha['login']);
					
					
					echo $grupo;
					
					}
              ?>" readonly="readonly" /></td>
            </tr>
          <tr>
            <td>Modelo:</td>
            <td><input name="modelo" type="text" id="modelo" value="<?php echo $modelo; ?>" readonly="readonly"/></td>
            <td>Acessorio:</td>
            <td colspan="3">
              <input name="textfield2" type="text" id="textfield2" value=" <?php
			 	  
				  $consulta = $pdo->prepare("SELECT * FROM acessorio WHERE idAcessorio = '$codace'");
				  $consulta->execute();
                  while($linha = $consulta->fetch())
					{
					
					$grupo = htmlentities($linha['descricao']);
					
					
					echo $grupo;
					
					
					   }
			
              ?>" readonly="readonly"/></td>
            </tr>
          <tr>
            <td>&nbsp;</td>
            <td colspan="5">&nbsp;</td>
            </tr>
          <tr>
            <td>N° Patrimonio:</td>
            <td><input name="patrimonio" type="text" id="patrimonio" value="<?php echo $patrimonio; ?>" size="30" readonly="readonly"/></td>
            <td>N° Serie:</td>
            <td ><input name="serie" type="text" id="serie" value="<?php echo $serie; ?>" size="10" readonly="readonly"/></td>
            <td>Setor:</td>
            <td>
              <input name="setor" type="text" id="setor" value="<?php echo $setor; ?>"  readonly="readonly"/></td>
            </tr>
          <tr>
            <td valign="top">Reclamação:
              <input name="l" type="hidden" id="l" onkeypress="return sem_acento(event);" value="<?php echo $idl;?>"/>              <input name="os" type="hidden" id="os" value="<?php echo $codos;?>"/></td>
            <td colspan="5">
            <textarea name="diagnostico" id="diagnostico" cols="90" rows="3" readonly="readonly"><?php echo htmlentities($diagnostico, ENT_QUOTES, 'UTF-8');?></textarea></td>
          </tr>
        </table>
      </fieldset></td>
    </tr>
  </table>
  
  <table width="0%" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td><fieldset>
        <legend><strong>LAUDO TECNICO</strong></legend>
        <table border="0" cellspacing="8" cellpadding="0">
          <tr>
            <td width="77"> Laudo Tecnico.:
              <input name="chat" type="hidden" id="chat" value="1"/>
              <input name="laudo" type="hidden" id="laudo" value="<?php echo $idlaudo;  ?>"/></td>
            <td colspan="5"><label for="laudo">
              <textarea name="laudo" id="laudo" cols="95" rows="3" onkeypress="return sem_acento(event);"><?php $dia = htmlentities($dia, ENT_QUOTES, 'UTF-8'); echo $dia;?></textarea>
            </label></td>
            </tr>
          <tr>
            <td valign="top">Valor Total serv. + peças:</td>
            <td width="125"><label for="fileField2"></label>
              <label for="valor">
                <input name="valor" type="text" id="valor" value="<?php echo $valor; ?>" size="20"/>
              </label></td>
            <td width="55">Prazo entrega:</td>
            <td width="125"><input name="prazo" type="text" id="prazo" value="<?php echo $prazo;?>" size="20"/></td>
            <td width="91">Dispo. das peças:</td>
            <td width="100"><input name="dis" type="text" id="dis" value="<?php echo htmlentities($disp); ?>" size="20" /></td>
          </tr>
          <tr>
            <td valign="top">Status*:</td>
            <td colspan="5"><select name="radio" id="radio">
                <option value="" selected="selected">ESCOLHA::</option>
                <?php
			 	 
				  $consulta = $pdo->prepare("SELECT * FROM status");
				  $consulta->execute();
                  while($linha = $consulta->fetch())
					{
					$idg   = $linha['idStatus'];
					$grupo = $linha['descricao'];
					
					if ($st==$idg){
						echo "<option value='$idg' selected>".htmlentities($grupo)."</option>";
					}else{
					echo "<option value='$idg'>".htmlentities($grupo)."</option>";
					}
					}	
				   
              ?>
              </select></td>
          </tr>
          <tr>
            <td valign="top">Aprovação:</td>
            <td colspan="5"><input name="pro" type="radio" id="radio2" value="s" <?php if($pro=='s'){echo "checked='hecked'";}?> />
              AUTORIZADO 
                <input type="radio" name="pro" id="radio3" value="n"  <?php if($pro=='n'){echo "checked='hecked'";}?>/>
              <label for="pro">NAO AUTORIZADO</label></td>
          </tr>
             <tr>
            <td valign="top">Obs:</td>
            <td colspan="5"><textarea name="obs" id="" cols="95" rows="3" onkeypress="return sem_acento(event);"><?php $obs = htmlentities($obs, ENT_QUOTES, 'UTF-8'); echo $obs;?>
            </textarea></td>
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
