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
<script type="text/javascript">
self.print ();
  </script>

<style type="text/css">@import url("../css/form.css");</style>
<link rel="stylesheet" href="../css/jquery.tabs.css" type="text/css" media="print, projection, screen">
        <!-- Additional IE/Win specific style sheet (Conditional Comments) -->
        <!--[if lte IE 7]>
        <link rel="stylesheet" href="jquery.tabs-ie.css" type="text/css" media="projection, screen">
        <![endif]-->
       
    </head>
<?php include ("../mysql/conexao_mysql.php");?>
<?php //include ("../mysql/os.sql.php");

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
<body> 
<table width="700" border="1" align="center" cellspacing="5">
  <tr>
    <td colspan="2">
    <?php 
	
	$sele = $pdo->prepare("SELECT * FROM empresa");
		$sele->execute();
		
		while($row = $sele->fetch())
        {
		    	$nomee	   = $row['nome'];
			$enderecoe  = $row['endereco'];
			$emaile     = $row['email'];
			$cnpj	   = $row['cnpj'];
			$cidade    = $row['cidade'];
			$telefone  = $row['telefone'];
			}
	?>

<table width="100%" border="1" cellspacing="0">
  <tr>
    <td width="68%" rowspan="2" style="font-size:12px;"><?php echo "<strong>Empresa:$nomee</strong><br />\n";?><?php echo "Endereco:$enderecoe<br />\n";?><?php echo "Email:$emaile Tel:$telefone<br />\n"; ?><?php echo "CNPJ: $cnpj Cidade:$cidade<br />\n";?></td>
    <td width="32%" align="center" style="font-size:14px;"><strong>ORDEM DE SERVIÇO</strong></td>
  </tr>
  <tr>
    <td align="center" style="font-size:14px;"><strong>N° O.S. :<?php echo $codos; ?></strong></td>
  </tr>
  </table></td>
  </tr>
  <tr>
    <td colspan="2">
    <?php 
	//echo $codos;
    $fi = array('id'=>$codcliente, 
					'cos'=>$codos
					);
		$sel = $pdo->prepare("SELECT * FROM cliente, os, equipamento, marca, atendimento, acessorio, usuarios, status 
							  WHERE idCliente=:id 
							  AND idOs=:cos 
							  AND os.codEquipamento=equipamento.idEquipamento
							  AND os.codMarca=marca.idMarca
							  AND os.codAtendimento=atendimento.idAtendimento
							  AND os.codAcessorio=acessorio.idAcessorio
							  AND os.codTecnico=usuarios.idUsuario
							  AND os.codStatus=status.idStatus");
		$sel->execute($fi);
		
		while($row = $sel->fetch())
        {
		    $cod	        = $row['idOs'];
			$id		        = $row['idCliente'];
			$empresa	    = utf8_encode($row['pessoaJuridica']);
			$nome	        = utf8_encode($row['pessoaFisica']);
			$cpf            = utf8_encode($row['cpf']);
			$cnpj           = utf8_encode($row['cnpj']);
			$endereco       = utf8_encode($row['endereco']);
			$entrega        = utf8_encode($row['entrega']);
			$bairro		    = utf8_encode($row['bairro']);
			$cidade	        = utf8_encode($row['cidade']);
			$uf  	        = utf8_encode($row['estado']);
			$cep	        = utf8_encode($row['cep']);
			$telComercial   = utf8_encode($row['telComercial']);
			$telefone       = utf8_encode($row['telResidencial']);
			$celular        = utf8_encode($row['celular']);
			$email          = utf8_encode($row['email']);
			$adicionais     = utf8_encode($row['adicionais']);
			
			$data           = utf8_encode($row['data']);
			$dataen         = utf8_encode($row['previsao']);
			$modelo			= utf8_encode($row['modelo']);
			$patrimonio     = utf8_encode($row['patrimonio']);
			$serie			= utf8_encode($row['serie']);
			$setor			= utf8_encode($row['setor']);
			$diagnostico	= utf8_encode($row['diagnostico']);
			
			$codequi		= utf8_encode($row['codEquipamento']);
			$codmarca		= utf8_encode($row['codMarca']);
			$codaten		= utf8_encode($row['codAtendimento']);
			$codace			= utf8_encode($row['codAcessorio']);
			$codtec			= utf8_encode($row['codTecnico']);
			$codstatus		= utf8_encode($row['codStatus']);
			
					
			}
    ?>
    <table width="100%" border="0">
      <tr>
        <td width="19%">EMPRESA/CLIENTE:</td>
        <td width="42%"><?php $empresa = substr($empresa,0,30); echo htmlentities($empresa);?></td>
        <td width="10%">CPF/CNPJ:</td>
        <td width="29%"><?php echo "$cnpj $cpf" ;?></td>
        </tr>
      <tr>
        <td>SOLICITANTE/RESP.:</td>
        <td><?php echo htmlentities($nome);?></td>
        <td>BAIRRO:</td>
        <td><?php echo htmlentities($bairro);?></td>
        </tr>
      <tr>
        <td>EMAIL:</td>
        <td><?php echo htmlentities($email);?></td>
        <td>CIDADE:</td>
        <td><?php echo htmlentities($cidade);?></td>
        </tr>
      <tr>
        <td>ENDEREÇO:</td>
        <td colspan="3"><?php echo htmlentities($endereco);?></td>
        </tr>
    </table>
    </td>
  </tr>
  <tr>
    <td colspan="2"><table width="100%" border="0">
      <tr>
        <td width="21%">TIPO DE ATENDIMENTO:</td>
        <td width="40%"><?php 
		$f = array('ate'=>$codaten);
		$s = $pdo->prepare("SELECT * FROM atendimento WHERE idAtendimento=:ate");
		$s->execute($f);
		
		while($row = $s->fetch())
        {
		    $aten	        = $row['descricao'];
			echo htmlentities($aten);
			
		}
		?></td>
        <td width="9%">N° SERIE:</td>
        <td width="30%"><?php echo htmlentities($serie);?></td>
      </tr>
      <tr>
        <td>EQUIPAMENTO:</td>
        <td><?php 
		$f = array('equi'=>$codequi);
		$s = $pdo->prepare("SELECT * FROM equipamento WHERE idEquipamento=:equi");
		$s->execute($f);
		
		while($row = $s->fetch())
        {
		    $equipa	        = $row['descricao'];
			echo htmlentities($equipa);
			
		}
		?></td>
        <td>MARCA:</td>
        <td><?php 
		$f = array('mar'=>$codmarca);
		$s = $pdo->prepare("SELECT * FROM marca WHERE idMarca=:mar");
		$s->execute($f);
		
		while($row = $s->fetch())
        {
		    $mar	        = $row['descricao'];
			echo htmlentities($mar);
			
		}
		?></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>MODELO:</td>
        <td><?php echo htmlentities($modelo);?></td>
      </tr>
      <tr>
        <td>ACESSORIOS:</td>
        <td colspan="3">
          <?php 
		$f = array('ace'=>$codace);
		$s = $pdo->prepare("SELECT * FROM acessorio WHERE idAcessorio=:ace");
		$s->execute($f);
		
		while($row = $s->fetch())
        {
		    $aces	        = $row['descricao'];
			echo htmlentities($aces);
			
		}
		?></td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td colspan="2"><table width="100%" border="0">
      <tr style="background-color:#0CF">
        <td>PEÇAS</td>
        <td>GARANTIA</td>
        <td>VALOR</td>
      </tr>
      
       <?php
	    $codos;
		$f = array('ospirata'=>$codos);
		$s = $pdo->prepare("SELECT * FROM pecas, produto WHERE pecas.codOs =:ospirata AND pecas.codProduto = produto.idGrupo ");
		$s->execute($f);
		
		while($row = $s->fetch())
        {
		    $produto	        = $row['descricao'];
			$garantia	        = $row['garantia'];
			$valor  	        = $row['valor'];
			
			$valor = str_replace(",",".",$valor);
		$soma= $valor+$soma;
			$valor = number_format($valor, 2, ',', '.');
		
		echo ("
		<tr>
        <td>$produto</td>
        <td>$garantia</td>
        <td>$valor</td>
		</tr>");
		
		}
     ?>
      <tr>
               
                <td colspan="2" align="right"><strong>SERVIÇO MAIS PEÇAS SOMA TOTAL</strong></td>
                <td><strong>R$<?php echo number_format($soma, 2, ',', '.');?></strong></td>
              </tr> 
    </table></td>
  </tr>
  <tr>
    <td colspan="2">Data:<?php echo date("d/m/Y H:i:s");?></td>
  </tr>
  <tr>
    <td height="31" colspan="2"><p>      TERMO DE GARANTIA: As peças e Acessorios substituidos possui três meses de garantia.<br />
      Obs: Necessário a apresentação deste documento para acesso a garantia. Manutenção preventiva não possui garantia.
    </p></td>
  </tr>
  <tr>
    <td height="20">
    </td>
    <td height="10"></td>
  </tr>
  <tr>
    <td width="291" align="center">Assinatura  Técnico</td>
    <td width="290" align="center">Solicitante/Responsável</td>   
  </tr>
</table>
</body>
</html>
