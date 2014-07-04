<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>SISGEW MIKROTIK</title>
<!--<script type="text/javascript" src="extjs/src/locale/ext-lang-pt_BR.js"></script>-->

<link rel="stylesheet" type="text/css" href="../css/css.css" />
<?php 
$os = $_REQUEST['os'];
$cliente = $_REQUEST['cliente'];
$fechar  = $_REQUEST['fechar'];

?>
<script language="javascript" type="text/javascript">
function send(action)
{
	switch(action) {
		case 'novo':
			url = 'fechar.php?codos = <?php echo $os;?> & codcliente=<?php echo $cliente;?>';
			break;
		
	}

	document.forms[0].action = url;
	document.forms[0].submit();
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
<script language="JavaScript">

function confirma(codigo) {
    if( confirm( 'ESTA OPCAO E IRREVERSIVEL. DESEJA REALMENTE FAZER ISTO?' ) ) 
    {
        location.href='subcadastrar.php?oss=<?php echo $os;?>& clie=<?php echo $cliente;?>&codExFechar=' + codigo;
    }
}

</script>
</head>
<?php include ("../mysql/conexao_mysql.php");?>
<body>
<tr>
    <td><!--<input type="reset" name="novo" id="novo" value="NOVO"/>-->
      <!--<input type="submit" name="alterar" value="ALTERAR" onclick="send('alterar');"/>-->
    </td>
</tr>
  <tr>
  <tr>
    <td><input type="submit" name="novo" value="Fechar O.S" onclick="send('novo');"/></td>
</tr>
  <tr>
<form action="subcadastrar.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <fieldset>
    <strong>INCLUIR PE&CcedilAS</strong>
    <table border="0" cellspacing="5" cellpadding="0">
     <tr>
        <td>Pe&ccedil;as*:</td>
        <td><label for="grupo"></label>          <label for="banco">
          <select name="peca" size="1" id="peca">
            <option value="" >ESCOLHA::</option>
            <?php
			 	  
				  $consulta = $pdo->prepare("SELECT * FROM produto");
				  $consulta->execute();
                  while($linha = $consulta->fetch())
					{
					$idg   = $linha['idGrupo'];
					$grupo = utf8_decode($linha['descricao']);
					
					
						echo "<option value=$idg selected>$grupo</option>";
					
				   }
				   			
              ?>
          </select>
        </label></td>
        <td>Valor R$*:</td>
        <td><input name="valor" type="text" id="valor" size="15"/></td>
        <td>Garantia:</td>
        <td><input name="garantia" type="text" id="garantia" size="20"/></td>
        </tr>
      <tr>
        <td>&nbsp;</td>
        <td colspan="5"><label for="subgrupo"></label></td>
      </tr>
      <tr>
        <td colspan="6" align="center">
	  <input name="clie" type="hidden" id="clie" value="<?php echo $cliente;?>" />
          <input name="fechar" type="hidden" id="fechar" value="9" />
          <input name="codos" type="hidden" id="codos" value="<?php echo $os;?>" />
          <input type="submit" name="button" id="button" value="INCLUIR" /></td>
      </tr>
    </table>
  </fieldset>
</form>
<hr />
<table align="left">
<thead>

<tr>
    <th id="th1">Pe&ccedil;as</th>
    <th id="th2">Valor</th>
    <th id="th3">Garantia</th>
    <th id="th4">Excluir</th>
    </tr>
</thead>
<tbody>
 <?php 

/*PEGAR OS SUB GRUPO PERTENCENTE AO MESMO GRUPO*/
$tr = array('c'=>$os);
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
		
		
		
		//cor das linha
			$class = 'odd';
		
		
		echo "
		<tr class='$class'>
    	<td>$produto</td>
		<td>$valor</td>
		<td>$garantia</td>
		<td align='center'><a href='javascript:;' onClick='confirma($id)'><img src='../imagem/botao_drop.png' border='0' /></a></td>
    	</tr>";
		

		if ($class=='odd'){$class='even';}else{$class = 'odd';}	
		
		}

	 
  ?>
 
    </tbody>
</table>

</body>
</html>
