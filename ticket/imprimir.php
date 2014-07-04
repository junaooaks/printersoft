
<?php
header('Content-Type: text/html; charset=utf-8');
$codos = $_REQUEST['codos']; 
$codcliente = $_REQUEST['codcliente']; 

include ("../includes/conexao_mysql.php");

//buscar dados

		$sql = "SELECT * FROM ticket, cliente WHERE ticket.id_ticket =".$codos." AND cliente.idCliente = ".$codcliente."" ;
		$sql = mysql_query($sql) or die (mysql_error());
				
		$linha = mysql_fetch_array($sql);
			
			$cod		= utf8_encode($linha['idCliente']);
			$id		= utf8_encode($linha['id_ticket']);
			$nome		= utf8_encode($linha['pessoaJuridica']);
			if(empty($nome)){
			$nome 		= utf8_encode($linha['pessoaFisica']);}
			$endereco	= utf8_encode($linha['endereco']);
			$tel		= utf8_encode($linha['telComercial']);
			if(empty($tel)){
			$tel		= utf8_encode($linha['telResidencial']);}
			if(empty($tel)){
			$tel		= utf8_encode($linha['celular']);}
			$cpfCnpj	= utf8_encode($linha['cnpj']);
			if(empty($cpfCnpj)){
			$cpfCnpj	= utf8_encode($linha['cpf']);}
			$data		= utf8_encode($linha['data']);
			$data = strftime("%d/%m/%Y %H:%M:%S", strtotime($data));
			$tecnico	= utf8_encode($linha['funcionario']);
			$cidade		= utf8_encode($linha['cidade']);
			$msg		= utf8_encode($linha['mensagem']);
		
			//explode data
			$data = explode (' ',$data);
			$dat  = $data[0];
			$hora = $data[1]
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
    	<link rel="shortcut icon" href="favicon.ico" />
    	<meta name="robots" content="noindex,nofollow">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel=File-List href=imprimir/filelist.xml>
<link rel=Stylesheet href=imprimir/stylesheet.css>

<style>
<!--table
	{mso-displayed-decimal-separator:"\,";
	mso-displayed-thousand-separator:"\.";}
@page
	{margin:.75in .25in .75in .25in;
	mso-header-margin:.3in;
	mso-footer-margin:.3in;}
-->
</style>
<script type="text/javascript">
self.print ();
  </script>
<![if !supportTabStrip]><script language="JavaScript">
<!--
function fnUpdateTabs()
 {
  if (parent.window.g_iIEVer>=4) {
   if (parent.document.readyState=="complete"
    && parent.frames['frTabs'].document.readyState=="complete")
   parent.fnSetActiveSheet(0);
  else
   window.setTimeout("fnUpdateTabs();",150);
 }
}

 fnUpdateTabs();
//-->
</script>
<![endif]>
</head>

<body link=blue vlink=purple>

<table border=0 cellpadding=0 cellspacing=0 style='border-collapse:
 collapse;table-layout:fixed;'>
 <col style='mso-width-source:userset;mso-width-alt:4205;'>
 <col style='mso-width-source:userset;mso-width-alt:4242;'>
 <col style='mso-width-source:userset;mso-width-alt:658;'>
 <col style='mso-width-source:userset;mso-width-alt:1024;'>
 <col style='mso-width-source:userset;mso-width-alt:2560;'>
 <col style='mso-width-source:userset;mso-width-alt:2340;'>
 <col style='mso-width-source:userset;mso-width-alt:1865;'>
 <col style='mso-width-source:userset;mso-width-alt:731;'>
 <col style=''>
 <col style='mso-width-source:userset;mso-width-alt:2742;'>
 <col style='mso-width-source:userset;mso-width-alt:2560;'>
 <col span=2 style=''>
 <tr style='mso-height-source:userset;'>
  <td colspan=11 height=25 class=xl88 style='border-right:1.0pt solid black;'>PRINTER COPIADORAS<span
  style='mso-spacerun:yes'></span></td>
  </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td colspan=9 height=20 class=xl82 style='height:15.0pt'><span style='mso-spacerun:yes'></span>CHAMADO TECNICO<span style='mso-spacerun:yes'></span></td>
  <td class=xl79>Codigo:</td>
  <td class=xl78 align=right><?php echo str_pad($codos, 6, "0", STR_PAD_LEFT)?></td>
  </tr>
 <tr height=20 style='height:15.0pt'>
  <td colspan=7 height=20 class=xl100 style='border-right:1pt solid black; height:15.0pt; border-style: solid;'>Cliente: <?php echo $nome; ?></td>
  <td colspan=4 class=xl100 style='border-right:1pt solid black; border-left:1pt; border-style: solid;'>Contato:</td>
  </tr>
 <tr height=20 style='height:15.0pt'>
  <td colspan=7 height=20 class=xl103 style='border-right:1pt solid black; border-left:1pt;'>End.: <?php echo $endereco; ?></td>
  <td colspan=4 class=xl103 style='border-right:1pt solid black; border-left:1pt;'>Fone: <?php echo $tel; ?></td>
  </tr>
 <tr height=20 style='height:15.0pt'>
  <td colspan=2 height=20 class=xl103 style='border-right:1pt solid black; border-left:1pt; border-style: solid;'>Cidade: <?php echo $cidade; ?></td>
  <td colspan=5 class=xl103 style='border-right:1pt solid black; border-left:1pt; border-style: solid;'>CPF/CNPJ: <?php echo $cpfCnpj; ?></td>
  <td colspan=4 class=xl103 style='border-right:1pt solid black; border-left:1pt; border-style: solid;'>Setor:</td>
  </tr>
 <tr height=18 style='mso-height-source:userset;height:14.1pt'>
  <td colspan=3 height=18 class=xl106 style='border-right:1pt solid black;
  height:14.1pt'>Data do Chamado: <?php echo $dat; ?></td>
  <td colspan=5 class=xl106 style='border-right:1pt solid black; border-left:1pt; border-style: solid;'>Horas do Chamado: <?php echo $hora; ?></td>
  <td colspan=3 class=xl106 style='border-right:1pt solid black; border-left:1pt; border-style: solid;'>T&eacute;cnico Sug.: <?php echo $tecnico; ?></td>
  </tr>
 <tr height=18 style='mso-height-source:userset;height:14.1pt'>
  <td colspan=4 height=18 class=xl85 style='height:14.1pt'>Data do Atendimento:</td>
  <td colspan=4 class=xl85 style='border-right:1pt solid black'>Horas da
  Chegada:</td>
  <td colspan=3 class=xl85 style='border-right:1pt solid black; border-left:1pt; border-style: solid;'>Contador Equip.:</td>
  </tr>
 <tr class=xl66 height=17 style='mso-height-source:userset;height:12.95pt'>
  <td colspan=3 height=17 class=xl84 style='height:12.95pt; font-size:14px'>EQUIPAMENTO</td>
  <td colspan=5 class=xl84 style='border-left:none; font-size:14px'>CLASSIFICA&Ccedil;AO DO ATENDMENTO</td>
  <td colspan=3 class=xl84 style='border-left:none; font-size:14px'>ATENDIMENTO</td>
  </tr>
 <tr height=17 style='mso-height-source:userset;height:12.95pt'>
  <td colspan=3 height=17 class=xl91 style='border-right:1pt solid black;
  height:12.95pt'>Modelo:</td>
  <td colspan=5 class=xl94 style='border-right:1pt solid black;
  border-left:none;'>[ ]Contrato de Manuten&ccedil;&atilde;o<span
  style='mso-spacerun:yes'></span></td>
  <td colspan=3 class=xl91 style='border-right:1pt solid black; border-left:1pt; border-style: solid;'>Horas INICIO:</td>
  </tr>
 <tr height=17 style='mso-height-source:userset;height:12.95pt'>
  <td colspan=3 height=17 class=xl91 style='border-right:1pt solid black;
  height:12.95pt'>n&ordm; Serie:</td>
  <td colspan=5 class=xl91 style='border-right:1pt solid black; border-left:1pt; border-style: solid;'>[ ]Equipamento de Loca&ccedil;&atilde;o</td>
  <td colspan=3 class=xl91 style='border-right:1pt solid black; border-left:1pt; border-style: solid;'>Horas TERMINO:</td>
  </tr>
 <tr height=17 style='mso-height-source:userset;height:12.95pt'>
  <td colspan=3 height=17 class=xl91 style='border-right:1pt solid black;
  height:12.95pt'>Numero Contador:</td>
  <td colspan=5 class=xl91 style='border-right:1pt solid black; border-left:1pt; border-style: solid;'>[ ]Garantia ou Revis&atilde;o<span style='mso-spacerun:yes'> </span>Identif.
  O.S.</td>
  <td colspan=3 class=xl91 style='border-right:1pt solid black; border-left:1pt; border-style: solid;'>Tempo Total:</td>
  </tr>
 <tr height=17 style='mso-height-source:userset;height:12.95pt'>
  <td colspan=3 height=17 class=xl91 style='border-right:1pt solid black;
  height:12.95pt'>Fabricante:</td>
  <td colspan=5 class=xl91 style='border-right:1pt solid black; border-left:1pt; border-style: solid;'>[ ]Gerar O.S.<span style='mso-spacerun:yes'> </span>p/ ADM e
  (faturar)<span style='mso-spacerun:yes'></span></td>
  <td colspan=3 class=xl91 style='border-right:1pt solid black; border-left:1pt; border-style: solid;'>Numero da O.S.:</td>
  </tr>
 <tr height=17 style='mso-height-source:userset;height:12.95pt'>
  <td colspan=11 height=17 class=xl97 style='border-right:1pt solid black;
  height:12.95pt'>DESCRI&Ccedil;AO DO DEFEITO RECLAMADO / SOLICITA&Ccedil;AO DO CLIENTE<span
  style='mso-spacerun:yes'></span></td>
  </tr>
 <tr>
   <td colspan=11 class=xl111 style='border-right:1pt solid black;border-bottom:.5pt solid black;'><?php echo $msg;?></span></td>
 </tr>
 <tr height=17 style='mso-height-source:userset;height:12.95pt'>
   <td colspan=8 height=17 class=xl97 style='height:12.95pt'>PE&Ccedil;AS/SUPLIMENTOS<span
  style='mso-spacerun:yes'> </span>APLICADOS OU PENDENTE<span
  style='mso-spacerun:yes'></span></td>
   <td colspan=3 class=xl97 style='border-right:1pt solid black'>CONDI&Ccedil;AO</td>
  </tr>
 <tr class=xl66 height=17 style='mso-height-source:userset;height:12.95pt'>
  <td height=17 class=xl67 style='height:12.95pt;border-top:none; font-size:14px'>CODIGO/PART</td>
  <td colspan=5 class=xl120 style='border-right:1pt solid black; border-left:1pt; border-style: solid; font-size:14px'>DESCRI&Ccedil;AO</td>
  <td colspan=2 class=xl120 style='border-right:1pt solid black; border-left:1pt; border-style: solid; font-size:14px'>QUANT.</td>
  <td class=xl67 style='border-top:none;border-left:none; font-size:14px'>URGENTE</td>
  <td class=xl67 style='border-top:none;border-left:none; font-size:14px'>APLICADO</td>
  <td class=xl67 style='border-top:none;border-left:none; font-size:14px'>PENDENTE</td>
  </tr>
 <tr height=18 style='mso-height-source:userset;height:14.1pt'>
  <td height=18 class=xl65 style='height:14.1pt;border-top:none'>&nbsp;</td>
  <td colspan=5 class=xl109 style='border-right:1pt solid black; border-left:1pt; border-style: solid;'>&nbsp;</td>
  <td colspan=2 class=xl109 style='border-right:1pt solid black; border-left:1pt; border-style: solid;'>&nbsp;</td>
  <td class=xl65 style='border-top:none;border-left:none'>&nbsp;</td>
  <td class=xl65 style='border-top:none;border-left:none'>&nbsp;</td>
  <td class=xl65 style='border-top:none;border-left:none'>&nbsp;</td>
  </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl65 style='height:15.0pt;border-top:none'>&nbsp;</td>
  <td colspan=5 class=xl109 style='border-right:1pt solid black; border-left:1pt; border-style: solid;'>&nbsp;</td>
  <td colspan=2 class=xl109 style='border-right:1pt solid black; border-left:1pt; border-style: solid;'>&nbsp;</td>
  <td class=xl65 style='border-top:none;border-left:none'>&nbsp;</td>
  <td class=xl65 style='border-top:none;border-left:none'>&nbsp;</td>
  <td class=xl65 style='border-top:none;border-left:none'>&nbsp;</td>
  </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl65 style='height:15.0pt;border-top:none'>&nbsp;</td>
  <td colspan=5 class=xl109 style='border-right:1pt solid black; border-left:1pt; border-style: solid;'>&nbsp;</td>
  <td colspan=2 class=xl109 style='border-right:1pt solid black; border-left:1pt; border-style: solid;'>&nbsp;</td>
  <td class=xl65 style='border-top:none;border-left:none'>&nbsp;</td>
  <td class=xl65 style='border-top:none;border-left:none'>&nbsp;</td>
  <td class=xl65 style='border-top:none;border-left:none'>&nbsp;</td>
  </tr>
 <tr height=17 style='mso-height-source:userset;height:12.95pt'>
  <td colspan=2 height=17 class=xl97 style='border-right:1pt solid black;
  height:12.95pt'>TIPO DO SERVI&Ccedil;O</td>
  <td colspan=9 class=xl97 style='border-right:1pt solid black; border-left:1pt; border-style: solid;'>DEFEITO ENCONTRADO / CONDI&Ccedil;AO INICIAL DO EQUIPAMENTO</td>
  </tr>
 <tr height=16 style='mso-height-source:userset;height:12.0pt'>
   <td height=77 class=xl122 style='border-bottom:.5pt solid black;
  height:57.75pt;border-top:none;'>[ ] Man. Corretiva<br>
     [ ] Man. Preventiva<br>
     [ ] Instala&ccedil;&atilde;o Equip.<br>
     [ ]<font class="font18"> Retirar Toner Recarga</font><font class="font15"><br>
      [ ] Avalia&ccedil;&atilde;o t&eacute;cnica<br>
    </font></td>
   <td class=xl122 style='border-bottom:.5pt solid black;
  border-top:none;'>[ ] Desinstala&ccedil;&atilde;o<br>
     [ ] Retorno Corretivo<br>
     [ ] Retorno Pe&ccedil;as<br>
     [ ] Retorno Garantia<br>
     [ ] Inst.de Software<br>
    </td>
   <td colspan=3 class=xl132 style='border-bottom:.5pt solid black;
  '>[ ] 1 - copia clara<br>
     [ ] 2 - copia escura<br>
     [ ] 3 - cop. manchada<br>
     [ ] 4 - cop. riscada<br>
     [ ] 5 - copia tremida<br>
    </td>
   <td colspan=2 class=xl133 style='border-right:1pt solid black;
  '>[ ] 6 - atolamento<br>
     [ ] 7 - n&atilde;o imprime<br>
     [ ] 8 - ru&iacute;do<br>
     [ ] 9 -<span style='mso-spacerun:yes'></span>c&oacute;digo SC<br>
     [ ] 10 - outros<br>
    </td>
   <td colspan=4 class=xl132 style='border-right:1pt solid black;
  '>[ ] Equipamento Funcionando normal<br>
     [ ] Equipamento parado<br>
     [ ] Funcionando precariamente <br>
     [ ] Precisando<span style='mso-spacerun:yes'></span> de insumo<br>
     [ ] Outros<br>
    </td>
 </tr>
 <tr height=17 style='mso-height-source:userset;height:12.95pt'>
   <td colspan=5 height=17 class=xl154 style='height:12.95pt;
  '>CHECKLIST DE INSTALACAO</td>
   <td class=xl76 style=''>&nbsp;</td>
   <td class=xl76 style=''>&nbsp;</td>
   <td class=xl76 style=''>&nbsp;</td>
   <td class=xl76 style=''>&nbsp;</td>
   <td class=xl76 style=''>&nbsp;</td>
   <td class=xl77 style=''>&nbsp;</td>
  </tr>
 <tr height=16 style='mso-height-source:userset;height:12.0pt'>
  <td rowspan=2 height=30 class=xl168 style='height:22.5pt;
  border-top:none;'>PROCEDIMENTO<span
  style='mso-spacerun:yes'></span></td>
  <td colspan=4 class=xl69 style='border-left:none'>REALIZADO</td>
  <td colspan=4 rowspan=2 class=xl169 style='border-right:1pt solid black;
  border-bottom:.5pt solid black;'>PROCEDIMENTO</td>
  <td colspan=2 class=xl75 style='border-left:none;'>REALIZADO</td>
  </tr>
 <tr height=14 style='mso-height-source:userset;height:10.5pt'>
  <td height=14 class=xl69 style='height:10.5pt;border-top:none;border-left:
  none'>SIM / INDI&Ccedil;AO</td>
  <td colspan=3 class=xl168 style='border-left:none;'>N&Atilde;O</td>
  <td class=xl75 style='border-top:none;border-left:none;'>SIM</td>
  <td class=xl75 style='border-top:none;border-left:none;'>N&Atilde;O</td>
  </tr>
 <tr height=16 style='mso-height-source:userset;height:12.0pt'>
  <td height=16 class=xl70 style='height:12.0pt;border-top:none;
  '>Software REDE/USB?</td>
  <td class=xl71 style='border-top:none;border-left:none'>&nbsp;</td>
  <td colspan=3 class=xl153 style='border-left:none;'>&nbsp;</td>
  <td colspan=4 class=xl141 style='border-right:1pt solid black;
  border-left:none;'>Limpeza Sistema &Oacute;tico</td>
  <td class=xl75 style='border-top:none;border-left:none;'>&nbsp;</td>
  <td class=xl75 style='border-top:none;border-left:none;'>&nbsp;</td>
  </tr>
 <tr height=16 style='mso-height-source:userset;height:12.0pt'>
  <td height=16 class=xl72 style='height:12.0pt;border-top:none;
  '>N&ordm; Endere&ccedil;o de IP</td>
  <td class=xl71 style='border-top:none;border-left:none'>&nbsp;</td>
  <td colspan=3 class=xl144 style='border-right:1pt solid black;
  border-left:none;'>&nbsp;</td>
  <td colspan=4 class=xl141 style='border-right:1pt solid black;
  border-left:none;'>Limpeza Externa</td>
  <td class=xl75 style='border-top:none;border-left:none;'>&nbsp;</td>
  <td class=xl75 style='border-top:none;border-left:none;'>&nbsp;</td>
  </tr>
 <tr height=16 style='mso-height-source:userset;height:12.0pt'>
  <td height=16 class=xl70 style='height:12.0pt;border-top:none;
  '>Conf. Scanner</td>
  <td class=xl71 style='border-top:none;border-left:none'>&nbsp;</td>
  <td colspan=3 class=xl144 style='border-right:1pt solid black;
  border-left:none;'>&nbsp;</td>
  <td colspan=4 class=xl141 style='border-right:1pt solid black;
  border-left:none;'>Limpeza de Lixeira de Toner</td>
  <td class=xl75 style='border-top:none;border-left:none;'>&nbsp;</td>
  <td class=xl75 style='border-top:none;border-left:none;'>&nbsp;</td>
  </tr>
 <tr height=16 style='mso-height-source:userset;height:12.0pt'>
  <td rowspan=2 height=32 class=xl166 style='border-bottom:.5pt solid black;
  height:24.0pt;border-top:none;'>Treinamento Operacional</td>
  <td class=xl80 style='border-top:none;border-left:none'>Resposta sim? / No<span
  style='display:none'>me</span></td>
  <td colspan=3 rowspan=2 class=xl187 style='border-right:1pt solid black;
  border-bottom:.5pt solid black;'>&nbsp;</td>
  <td colspan=4 class=xl141 style='border-right:1pt solid black;
  border-left:none;'>Limpeza Vidro de Exposi&ccedil;&atilde;o</td>
  <td class=xl72 style='border-top:none;border-left:none;'>&nbsp;</td>
  <td class=xl72 style='border-top:none;border-left:none;'>&nbsp;</td>
  </tr>
 <tr height=16 style='mso-height-source:userset;height:12.0pt'>
  <td height=16 class=xl71 style='height:12.0pt;border-top:none;border-left:
  none'>&nbsp;</td>
  <td colspan=4 class=xl141 style='border-right:1pt solid black;
  border-left:none;'>Verifica&ccedil;&atilde;o da vida &uacute;til dos Kits<span
  style='mso-spacerun:yes'></span></td>
  <td class=xl72 style='border-top:none;border-left:none;'>&nbsp;</td>
  <td class=xl72 style='border-top:none;border-left:none;'>&nbsp;</td>
  </tr>
 <tr height=16 style='mso-height-source:userset;height:12.0pt'>
  <td height=16 class=xl72 style='height:12.0pt;border-top:none;
  '>Teste de Impress&atilde;o</td>
  <td class=xl71 style='border-top:none;border-left:none'>&nbsp;</td>
  <td colspan=3 class=xl153 style='border-left:none;'>&nbsp;</td>
  <td colspan=4 class=xl141 style='border-right:1pt solid black;
  border-left:none;'>Verifica&ccedil;&atilde;o do sistema de fus&atilde;o</td>
  <td class=xl72 style='border-top:none;border-left:none;'>&nbsp;</td>
  <td class=xl72 style='border-top:none;border-left:none;'>&nbsp;</td>
  </tr>
 <tr height=16 style='mso-height-source:userset;height:12.0pt'>

  <td height=16 class=xl72 style='height:12.0pt;border-top:none;
  '>Teste de Scaner</td>
  <td class=xl71 style='border-top:none;border-left:none'>&nbsp;</td>
  <td colspan=3 class=xl153 style='border-left:none;'>&nbsp;</td>
  <td colspan=4 class=xl141 style='border-right:1pt solid black;
  border-left:none;'>Verifica&ccedil;&atilde;o na unidade de imagem</td>
  <td class=xl72 style='border-top:none;border-left:none;'>&nbsp;</td>
  <td class=xl72 style='border-top:none;border-left:none;'>&nbsp;</td>
  </tr>
 <tr height=16 style='mso-height-source:userset;height:12.0pt'>
  <td rowspan=2 height=32 class=xl166 style='border-bottom:.5pt solid black;
  height:24.0pt;border-top:none;'>Instala&ccedil;&atilde;o do Software<span
  style='mso-spacerun:yes'></span> PrintScout</td>
  <td class=xl74 style='border-top:none;border-left:none'>Obrigatorio p /
  Cliente de Loca&ccedil;ao</td>
  <td colspan=3 rowspan=2 class=xl187 style='border-right:1pt solid black;
  border-bottom:.5pt solid black;'>&nbsp;</td>
  <td colspan=4 class=xl141 style='border-right:1pt solid black;
  border-left:none;'>Limpeza dos roletes tra&ccedil;&atilde;o do Papel</td>
  <td class=xl72 style='border-top:none;border-left:none;'>&nbsp;</td>
  <td class=xl72 style='border-top:none;border-left:none;'>&nbsp;</td>
  </tr>
 <tr height=16 style='mso-height-source:userset;height:12.0pt'>
  <td height=16 class=xl73 style='height:12.0pt;border-left:none'>&nbsp;</td>
  <td colspan=4 class=xl141 style='border-right:1pt solid black;
  border-left:none;'>Ajuste Gavetas/Alimenta&ccedil;&atilde;o do Pap.</td>
  <td class=xl72 style='border-top:none;border-left:none;'>&nbsp;</td>
  <td class=xl72 style='border-top:none;border-left:none;'>&nbsp;</td>
  </tr>
 <tr height=16 style='mso-height-source:userset;height:12.0pt'>
  <td height=16 class=xl72 style='height:12.0pt;border-top:none;
  '>&nbsp;</td>
  <td class=xl71 style='border-top:none;border-left:none'>&nbsp;</td>
  <td colspan=3 class=xl153 style='border-left:none;'>&nbsp;</td>
  <td colspan=4 class=xl141 style='border-right:1pt solid black;
  border-left:none;'>Limpeza, Roletes, Sensores e ADF</td>
  <td class=xl72 style='border-top:none;border-left:none;'>&nbsp;</td>
  <td class=xl72 style='border-top:none;border-left:none;'>&nbsp;</td>
  </tr>
 <tr height=17 style='mso-height-source:userset;height:12.95pt'>
  <td colspan=11 height=17 class=xl154 style='border-right:1pt solid black;
  height:12.95pt;'>CONDI&Ccedil;AO FINAL DO CHAMADO</td>
  </tr>
 <tr height=20 style='height:15.0pt'>
   <td colspan=4 height=50 class=xl157 style='border-right:1pt solid black;border-bottom:1px solid black;height:37.5pt;'>[
     ] Equip. Funcionando normal<br>
     [ ] Parado Pendente de Pe&ccedil;as<br>
     [ ] Funcionando sem Duplex<br>
    </td>
   <td colspan=4 class=xl157 style='border-right:1pt solid black;
  border-bottom:.5pt solid black;'>[ ] Funcionando
     precariamente<br>
     [ ] parado (outros motivos)<br>
     [ ] <font class="font17">RETIRADO P/ RECARGA (TONER)</font><font
  class="font12"><br>
    </font></td>
   <td colspan=3 class=xl157 style='border-right:1pt solid black;
  border-bottom:.5pt solid black;'>[ ] Precisando<span
  style='mso-spacerun:yes'></span> de insumo<br>
     [ ] Outros<br>
     [ ] Retirado para Oficina<br>
    </td>
 </tr>
 <tr height=20 style='height:15.0pt'>
   <td height=20 class=xl68 style='height:15.0pt;border-top:1px'>LAUDO TECNICO:</td>
   <td colspan=10 class=xl149 style='border-right:1px solid black'>&nbsp;</td>
  </tr>
 <tr height=23 style='mso-height-source:userset;height:17.25pt'>
  <td colspan=9 height=23 class=xl151 style='height:17.25pt'>CONTADOR:</td>
  <td colspan=2  style='border-right:1pt solid black'>&nbsp;</td>
  </tr>
 <tr height=4 style='mso-height-source:userset;height:3.0pt'>
  <td colspan=11 height=4 class=xl175 style='border-right:1pt solid black;
  height:3.0pt'>&nbsp;</td>
  </tr>
 <tr height=0 style='display:none'>
  <td colspan=11 class=xl109 style='border-right:1pt solid black'>&nbsp;</td>
  </tr>
 <tr>
   <td colspan=11 class=xl178 style='border-right:1pt solid black;border-bottom:.5pt solid black; font-size:9.0pt;'>Para
     ser verdade as defini&ccedil;&oacute;es acima definido, <font class="font19">Na
       Qualidade<span style='mso-spacerun:yes'></span> de Cliente</font><font >,identifico<span style='mso-spacerun:yes'></span>e dou
         ci&ecirc;ncia das verdades declarando satisfeito ou aguardando resposta conforme
         defini&ccedil;&oacute;es acima.<span style='mso-spacerun:yes'></span></font><font> Na Qualidade de T&eacute;cnico</font><font> me responsabilizo pelas defini&ccedil;&oacute;es acima por mim ditada, pelo bom funcionamento
           ou pela<span style='mso-spacerun:yes'></span> remo&ccedil;&atilde;o do equipamento ate a
           Oficina.<span style='mso-spacerun:yes'></span> Sendo assim assino o presente
    Chamado t&eacute;cnico Dando ci&ecirc;ncia das verdades.<span
  style='mso-spacerun:yes'></span></font></td>
 </tr>
 <tr height=18 style='mso-height-source:userset;height:13.5pt'>
   <td colspan=5 height=18 class=xl193 style='height:13.5pt'>T&Eacute;CNICO</td>
   <td colspan=6 class=xl194 style='border-right:1pt solid black'>CLIENTE</td>
  </tr>
 <tr height=20 style='height:15.0pt'>
  <td colspan=5 height=20 class=xl109 style='height:15.0pt'>&nbsp;</td>
  <td colspan=6 class=xl109 style='border-right:1pt solid black'>&nbsp;</td>
  </tr>

 <![if supportMisalignedColumns]>
 <![endif]>
</table>

</body>

</html>
