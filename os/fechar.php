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
<style type="text/css">@import url("../css/form.css");</style>
<?php
$codos		= $_REQUEST['codos'];
$codcliente     = $_REQUEST['codcliente'];
$situ		= $_REQUEST['situ'];
$cnpj		= $_REQUEST['cnpj'];
$cpf		= $_REQUEST['cpf'];
$empresa	= $_REQUEST['empresa'];
$nome		= $_REQUEST['nome'];
$email		= $_REQUEST['email'];
$telComercial	= $_REQUEST['telComercial'];
$telefone	= $_REQUEST['telefone'];
$celular	= $_REQUEST['celular'];
$codequi	= $_REQUEST['codequi'];
$codmarca	= $_REQUEST['codmarca'];
$data		= $_REQUEST['data'];
$codaten	= $_REQUEST['codaten'];
$modelo		= $_REQUEST['modelo'];
$codace		= $_REQUEST['codace'];
$patrimonio	= $_REQUEST['patrimonio'];
$serie		= $_REQUEST['serie'];
$setor		= $_REQUEST['setor'];
$diagnostico	= $_REQUEST['diagnostico'];
$idlaudo	= $_REQUEST['idlaudo'];
$radio		= $_REQUEST['radio'];
$cli		= $_REQUEST['codcliente'];
?>
<script language="javascript" type="text/javascript">
function send(action)
{
	switch(action) {
		case 'novo':
			url = 'subgrupo.php?<?php echo "os=$codos&cliente=$codcliente&fechar=9";?>';
			break;
		case 'novo1':
			url = 'imprimir_fechar.php?<?php echo "codos=$codos&codcliente=$codcliente"?>';
			break;		
	}

	document.forms[0].action = url;
	document.forms[0].submit();
}

</script>



<script type="text/javascript">
/*
function NovaJanela(pagina,nome,w,h,scroll){
	LeftPosition = (screen.width) ? (screen.width-w)/2 : 0;
	TopPosition = (screen.height) ? (screen.height-h)/2 : 0;
	settings = 'height='+h+',width='+w+',top='+TopPosition+',left='+LeftPosition+',scrollbars='+scroll+',resizable'
	win = window.open(pagina,nome,settings);
}
*/

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
              <input name="cnpjcpf" type="text" id="cnpjcpf" value="<?php echo $cnpj; echo $cpf; ?>"size="25" readonly="true"/></td>
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
          <tr>
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
              <input name="mar" type="text" id="mar" value="<?php
			 	  
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
            <td>Acessorio*:</td>
            <td colspan="3">
              <input name="textfield2" type="text" id="textfield2" value="<?php
			 	  
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
            <td valign="top">Diagnós. Equipa.:</td>
            <td colspan="5">
            <textarea name="diagnostico" id="diagnostico" cols="90" rows="3" readonly="readonly"><?php echo htmlentities($diagnostico);?></textarea></td>
          </tr>
        </table>
      </fieldset></td>
    </tr>
  </table>
  
  <table width="0%" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td><fieldset>
        <legend><strong> FECHAR</strong></legend>
        <table border="0" cellspacing="8" cellpadding="0">
          <tr>
            <td width="101">Peças*:</td>
            <td width="120"><input type="submit" name="novo2" value="Incluir Peças" onclick="send('novo');"/></td>
            <td width="61">&nbsp;</td>
            <td width="129"><input name="fechar" type="hidden" id="fechar" value="1"/>
            <input name="laudo" type="hidden" id="laudo" value="<?php echo $idlaudo;  ?>"/></td>
            <td width="67">&nbsp;</td>
            <td width="120">&nbsp;</td>
          </tr>
          <tr>
            <td colspan="6" valign="top"><table width="100%" border="0">
              <tr>
               
                <td width="31%" align="center" bgcolor="#CCCCCC"><strong>PEÇAS</strong></td>
                <td width="25%" align="center" bgcolor="#CCCCCC"><strong>GARANTIA</strong></td>
                <td width="39%" align="center" bgcolor="#CCCCCC"><strong>VALOR</strong></td>
              </tr>
            
            <?php 



/*PEGAR OS SUB GRUPO PERTENCENTE AO MESMO GRUPO*/
$tr = array('c'=>$codos);
$sele = $pdo->prepare("SELECT * FROM pecas, produto WHERE codOs = :c AND pecas.codProduto = produto.idGrupo");
$sele->execute($tr);
		
				
 while($row = $sele->fetch())
        {	
			$id 	  = $row['idPeca'];
		    	$idos     = $row['codOs'];
			$idpro    = $row['codProduto'];
			$valor    = $row['valor'];
			$garantia = htmlentities($row['garantia']);
			$produto  = htmlentities($row['descricao']);
		$valor = str_replace(",",".",$valor);
		$soma= $valor+$soma;
		
		//cor das linha
			$class = 'odd';
		$valor = number_format($valor, 2, ',', '.');
		
		echo "		
		<tr class='$class'>
    	<td>$produto</td>
		<td align='center'>$garantia</td>
		<td align='center'>$valor</td>
		</tr>";
		

		if ($class=='odd'){$class='even';}else{$class = 'odd';}	
		
		}

	 
 
            
            
             
			
			
			?>
            <tr>
               
                <td></td>
                <td align="center"><strong>SOMA TOTAL:</strong></td>
                <td align="center"><strong><?php echo number_format($soma, 2, ',', '.');?></strong></td>
              </tr>
              </table><hr /></td>
          </tr>
          
          <tr>
            <td colspan="6" valign="top"><form id="form1" name="form1" method="post" action="">
              <table width="700" border="0">
                <tr>
                  <td width="111" valign="top">Situação da O.S*:</td>
                  <td width="579" colspan="5"><input name="radio" type="radio" id="radio" value="0"<?php if ($situ=='0'){echo "checked='checked'";}?> />
                    <label for="radio"></label>
                    Ativar O.S
                    <input type="radio" name="radio" id="radio2" value="1"<?php if ($situ=='1'){echo "checked='checked'";}?>/>
                    Fechar O.S                    </td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td>
		    
		    <input type="submit" name="button" id="button" value="Fechar O.S" />
                    <input name="ospirata" type="hidden" id="ospirata" value="<?php echo $codos;?>"/>
                    <input name="cli" type="hidden" id="cli" value="<?php echo $codcliente;?>"/></td>
                </tr>
              </table>
            </form></td>
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
        <button id="buttonBack" type="button" onclick="javascript: history.go(-1);">&lt;&lt; Voltar</button>
        <input type="submit" name="novo" value="IMPRIMIR OS" onclick="send('novo1');"/>
        </td>
        
    </tr>
</table>

</body>
</html>
