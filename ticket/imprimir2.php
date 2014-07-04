<?php
//header('Content-Type: text/html; charset=utf-8');
$codos = $_REQUEST['codos']; 
$codcliente = $_REQUEST['codcliente']; 

include ("../includes/conexao_mysql.php");

//buscar dados

		$sql = "SELECT * FROM ticket, cliente WHERE ticket.id_ticket =".$codos." AND cliente.idCliente = ".$codcliente."" ;
		$sql = mysql_query($sql) or die (mysql_error());
				
		$linha = mysql_fetch_array($sql);
			
			$cod		= $linha['idCliente'];
			$id			= $linha['id_ticket'];
			$nome		= $linha['pessoaJuridica'];
			if(empty($nome)){$nome = $linha['pessoaFisica'];}
			$endereco	= $linha['endereco'];
			$tel		= $linha['telComercial'];
			if(empty($tel)){$tel		= $linha['telResidencial'];}if(empty($tel)){$tel		= $linha['celular'];}
			$cpfCnpj	= $linha['cnpj'];
			if(empty($cpfCnpj)){$cpfCnpj	= $linha['cpf'];}
			$data		= $linha['data'];
			$data = strftime("%d/%m/%Y %H:%M:%S", strtotime($data));
			$tecnico	= $linha['funcionario'];
			$cidade		= $linha['cidade'];
			$msg		= $linha['mensagem'];
		
			//explode data
			$data = explode (' ',$data);
			$dat  = $data[0];
			$hora = $data[1]
?>

<head>

<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
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

<table width="900" border=0 cellpadding=0 cellspacing=0 style='border-collapse:
 collapse;table-layout:fixed;width:615pt'>
 <col width=115 style='mso-width-source:userset;mso-width-alt:4205;width:86pt'>
 <col width=116 style='mso-width-source:userset;mso-width-alt:4242;width:87pt'>
 <col width=18 style='mso-width-source:userset;mso-width-alt:658;width:14pt'>
 <col width=28 style='mso-width-source:userset;mso-width-alt:1024;width:21pt'>
 <col width=70 style='mso-width-source:userset;mso-width-alt:2560;width:53pt'>
 <col width=64 style='mso-width-source:userset;mso-width-alt:2340;width:48pt'>
 <col width=51 style='mso-width-source:userset;mso-width-alt:1865;width:38pt'>
 <col width=20 style='mso-width-source:userset;mso-width-alt:731;width:15pt'>
 <col width=64 style='width:48pt'>
 <col width=75 style='mso-width-source:userset;mso-width-alt:2742;width:56pt'>
 <col width=70 style='mso-width-source:userset;mso-width-alt:2560;width:53pt'>
 <col width=64 span=2 style='width:48pt'>
 <tr height=25 style='mso-height-source:userset;height:18.75pt'>
  <td colspan=11 height=25 class=xl88 style='border-right:1.0pt solid black;
  height:18.75pt;width:519pt'>PRINTER COPIADORAS<span
  style='mso-spacerun:yes'> </span></td>
  
  </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td colspan=9 height=20 class=xl82 style='height:15.0pt'><span style='mso-spacerun:yes'>                                     </span>CHAMADO TECNICO<span style='mso-spacerun:yes'> </span></td>
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
  <td colspan=3 class=xl106 style='border-right:1pt solid black; border-left:1pt; border-style: solid;'>Técnico Sug.: <?php echo $tecnico; ?></td>
  </tr>
 <tr height=18 style='mso-height-source:userset;height:14.1pt'>
  <td colspan=4 height=18 class=xl85 style='height:14.1pt'>Data do Atendimento:</td>
  <td colspan=4 class=xl85 style='border-right:1pt solid black'>Horas da
  Chegada:</td>
  <td colspan=3 class=xl85 style='border-right:1pt solid black; border-left:1pt; border-style: solid;'>Contador Equip.:</td>
  </tr>
 <tr class=xl66 height=17 style='mso-height-source:userset;height:12.95pt'>
  <td colspan=3 height=17 class=xl84 style='height:12.95pt; font-size:14px'>EQUIPAMENTO</td>
  <td colspan=5 class=xl84 style='border-left:none; font-size:14px'>CLASSIFICAÇAO DO ATENDMENTO</td>
  <td colspan=3 class=xl84 style='border-left:none; font-size:14px'>ATENDIMENTO</td>
  </tr>
 <tr height=17 style='mso-height-source:userset;height:12.95pt'>
  <td colspan=3 height=17 class=xl91 style='border-right:1pt solid black;
  height:12.95pt'>Modelo:</td>
  <td colspan=5 class=xl94 style='border-right:1pt solid black;
  border-left:none;width:175pt'>[ ]Contrato de Manutenção<span
  style='mso-spacerun:yes'>          </span></td>
  <td colspan=3 class=xl91 style='border-right:1pt solid black; border-left:1pt; border-style: solid;'>Horas INICIO:</td>
  </tr>
 <tr height=17 style='mso-height-source:userset;height:12.95pt'>
  <td colspan=3 height=17 class=xl91 style='border-right:1pt solid black;
  height:12.95pt'>nº Serie:</td>
  <td colspan=5 class=xl91 style='border-right:1pt solid black; border-left:1pt; border-style: solid;'>[ ]Equipamento de Locação</td>
  <td colspan=3 class=xl91 style='border-right:1pt solid black; border-left:1pt; border-style: solid;'>Horas TERMINO:</td>
  </tr>
 <tr height=17 style='mso-height-source:userset;height:12.95pt'>
  <td colspan=3 height=17 class=xl91 style='border-right:1pt solid black;
  height:12.95pt'>Numero Contador:</td>
  <td colspan=5 class=xl91 style='border-right:1pt solid black; border-left:1pt; border-style: solid;'>[ ]Garantia ou Revisão<span style='mso-spacerun:yes'>  </span>Identif.
  O.S.</td>
  <td colspan=3 class=xl91 style='border-right:1pt solid black; border-left:1pt; border-style: solid;'>Tempo Total:</td>
  </tr>
 <tr height=17 style='mso-height-source:userset;height:12.95pt'>
  <td colspan=3 height=17 class=xl91 style='border-right:1pt solid black;
  height:12.95pt'>Fabricante:</td>
  <td colspan=5 class=xl91 style='border-right:1pt solid black; border-left:1pt; border-style: solid;'>[ ]Gerar O.S.<span style='mso-spacerun:yes'>  </span>p/ ADM e
  (faturar)<span style='mso-spacerun:yes'> </span></td>
  <td colspan=3 class=xl91 style='border-right:1pt solid black; border-left:1pt; border-style: solid;'>Numero da O.S.:</td>
  </tr>
 <tr height=17 style='mso-height-source:userset;height:12.95pt'>
  <td colspan=11 height=17 class=xl97 style='border-right:1pt solid black;
  height:12.95pt'>DESCRIÇAO DO DEFEITO RECLAMADO / SOLICITAÇAO DO CLIENTE<span
  style='mso-spacerun:yes'> </span></td>
  </tr>
 <tr height=20 style='height:15.0pt'>
   <td colspan=11 height=38 class=xl111 style='border-right:1pt solid black;border-bottom:.5pt solid black;height:28.5pt;width:519pt'><?php echo $msg;?></span></td>
 </tr>
 <tr height=17 style='mso-height-source:userset;height:12.95pt'>
   <td colspan=8 height=17 class=xl97 style='height:12.95pt'>PEÇAS/SUPLIMENTOS<span
  style='mso-spacerun:yes'>  </span>APLICADOS OU PENDENTE<span
  style='mso-spacerun:yes'> </span></td>
   <td colspan=3 class=xl97 style='border-right:1pt solid black'>CONDIÇAO</td>
  </tr>
 <tr class=xl66 height=17 style='mso-height-source:userset;height:12.95pt'>
  <td height=17 class=xl67 style='height:12.95pt;border-top:none; font-size:14px'>CODIGO/PART</td>
  <td colspan=5 class=xl120 style='border-right:1pt solid black; border-left:1pt; border-style: solid; font-size:14px'>DESCRIÇAO</td>
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
  height:12.95pt'>TIPO DO SERVIÇO</td>
  <td colspan=9 class=xl97 style='border-right:1pt solid black; border-left:1pt; border-style: solid;'>DEFEITO ENCONTRADO / CONDIÇAO INICIAL DO EQUIPAMENTO</td>
  </tr>
 <tr height=16 style='mso-height-source:userset;height:12.0pt'>
   <td height=77 class=xl122 width=115 style='border-bottom:.5pt solid black;
  height:57.75pt;border-top:none;width:86pt'>[ ] Man. Corretiva<br>
     [ ] Man. Preventiva<br>
     [ ] Instalação Equip.<br>
     [ ]<font class="font18"> Retirar Toner Recarga</font><font class="font15"><br>
      [ ] Avaliação técnica<br>
    </font></td>
   <td class=xl122 width=119 style='border-bottom:.5pt solid black;
  border-top:none;width:87pt'>[ ] Desinstalação<br>
     [ ] Retorno Corretivo<br>
     [ ] Retorno Peças<br>
     [ ] Retorno Garantia<br>
     [ ] Inst.de Software<br>
    </td>
   <td colspan=3 class=xl132 style='border-bottom:.5pt solid black;
  width:88pt'>[ ] 1 - copia clara<br>
     [ ] 2 - copia escura<br>
     [ ] 3 - cop. manchada<br>
     [ ] 4 - cop. riscada<br>
     [ ] 5 - copia tremida<br>
    </td>
   <td colspan=2 class=xl133 style='border-right:1pt solid black;
  width:86pt'>[ ] 6 - atolamento<br>
     [ ] 7 - não imprime<br>
     [ ] 8 - ruído<br>
     [ ] 9 -<span style='mso-spacerun:yes'>  </span>código SC<br>
     [ ] 10 - outros<br>
    </td>
   <td colspan=4 class=xl132 style='border-right:1pt solid black;
  width:172pt'>[ ] Equipamento Funcionando normal<br>
     [ ] Equipamento parado<br>
     [ ] Funcionando precariamente <br>
     [ ] Precisando<span style='mso-spacerun:yes'>  </span>de insumo<br>
     [ ] Outros<br>
    </td>
 </tr>
 <tr height=17 style='mso-height-source:userset;height:12.95pt'>
   <td colspan=5 height=17 class=xl154 style='height:12.95pt;
  width:261pt'>CHECKLIST DE INSTALACAO</td>
   <td class=xl76 width=64 style='width:48pt'>&nbsp;</td>
   <td class=xl76 width=52 style='width:38pt'>&nbsp;</td>
   <td class=xl76 width=20 style='width:15pt'>&nbsp;</td>
   <td class=xl76 width=64 style='width:48pt'>&nbsp;</td>
   <td class=xl76 width=75 style='width:56pt'>&nbsp;</td>
   <td class=xl77 width=73 style='width:53pt'>&nbsp;</td>
  </tr>
 <tr height=16 style='mso-height-source:userset;height:12.0pt'>
  <td rowspan=2 height=30 class=xl168 width=115 style='height:22.5pt;
  border-top:none;width:86pt'>PROCEDIMENTO<span
  style='mso-spacerun:yes'> </span></td>
  <td colspan=4 class=xl69 style='border-left:none'>REALIZADO</td>
  <td colspan=4 rowspan=2 class=xl169 style='border-right:1pt solid black;
  border-bottom:.5pt solid black;width:149pt'>PROCEDIMENTO</td>
  <td colspan=2 class=xl75 style='border-left:none;width:109pt'>REALIZADO</td>
  </tr>
 <tr height=14 style='mso-height-source:userset;height:10.5pt'>
  <td height=14 class=xl69 style='height:10.5pt;border-top:none;border-left:
  none'>SIM / INDIÇAO</td>
  <td colspan=3 class=xl168 style='border-left:none;width:88pt'>NÃO</td>
  <td class=xl75 width=75 style='border-top:none;border-left:none;width:56pt'>SIM</td>
  <td class=xl75 width=73 style='border-top:none;border-left:none;width:53pt'>NÃO</td>
  </tr>
 <tr height=16 style='mso-height-source:userset;height:12.0pt'>
  <td height=16 class=xl70 width=115 style='height:12.0pt;border-top:none;
  width:86pt'>Software REDE/USB?</td>
  <td class=xl71 style='border-top:none;border-left:none'>&nbsp;</td>
  <td colspan=3 class=xl153 style='border-left:none;width:88pt'>&nbsp;</td>
  <td colspan=4 class=xl141 style='border-right:1pt solid black;
  border-left:none;width:149pt'>Limpeza Sistema Ótico</td>
  <td class=xl75 width=75 style='border-top:none;border-left:none;width:56pt'>&nbsp;</td>
  <td class=xl75 width=73 style='border-top:none;border-left:none;width:53pt'>&nbsp;</td>
  </tr>
 <tr height=16 style='mso-height-source:userset;height:12.0pt'>
  <td height=16 class=xl72 width=115 style='height:12.0pt;border-top:none;
  width:86pt'>Nº Endereço de IP</td>
  <td class=xl71 style='border-top:none;border-left:none'>&nbsp;</td>
  <td colspan=3 class=xl144 style='border-right:1pt solid black;
  border-left:none;width:88pt'>&nbsp;</td>
  <td colspan=4 class=xl141 style='border-right:1pt solid black;
  border-left:none;width:149pt'>Limpeza Externa</td>
  <td class=xl75 width=75 style='border-top:none;border-left:none;width:56pt'>&nbsp;</td>
  <td class=xl75 width=73 style='border-top:none;border-left:none;width:53pt'>&nbsp;</td>
  </tr>
 <tr height=16 style='mso-height-source:userset;height:12.0pt'>
  <td height=16 class=xl70 width=115 style='height:12.0pt;border-top:none;
  width:86pt'>Conf. Scanner</td>
  <td class=xl71 style='border-top:none;border-left:none'>&nbsp;</td>
  <td colspan=3 class=xl144 style='border-right:1pt solid black;
  border-left:none;width:88pt'>&nbsp;</td>
  <td colspan=4 class=xl141 style='border-right:1pt solid black;
  border-left:none;width:149pt'>Limpeza de Lixeira de Toner</td>
  <td class=xl75 width=75 style='border-top:none;border-left:none;width:56pt'>&nbsp;</td>
  <td class=xl75 width=73 style='border-top:none;border-left:none;width:53pt'>&nbsp;</td>
  </tr>
 <tr height=16 style='mso-height-source:userset;height:12.0pt'>
  <td rowspan=2 height=32 class=xl166 width=115 style='border-bottom:.5pt solid black;
  height:24.0pt;border-top:none;width:86pt'>Treinamento Operacional</td>
  <td class=xl80 style='border-top:none;border-left:none'>Resposta sim? / No<span
  style='display:none'>me</span></td>
  <td colspan=3 rowspan=2 class=xl187 style='border-right:1pt solid black;
  border-bottom:.5pt solid black;width:88pt'>&nbsp;</td>
  <td colspan=4 class=xl141 style='border-right:1pt solid black;
  border-left:none;width:149pt'>Limpeza Vidro de Exposição</td>
  <td class=xl72 width=75 style='border-top:none;border-left:none;width:56pt'>&nbsp;</td>
  <td class=xl72 width=73 style='border-top:none;border-left:none;width:53pt'>&nbsp;</td>
  </tr>
 <tr height=16 style='mso-height-source:userset;height:12.0pt'>
  <td height=16 class=xl71 style='height:12.0pt;border-top:none;border-left:
  none'>&nbsp;</td>
  <td colspan=4 class=xl141 style='border-right:1pt solid black;
  border-left:none;width:149pt'>Verificação da vida útil dos Kits<span
  style='mso-spacerun:yes'> </span></td>
  <td class=xl72 width=75 style='border-top:none;border-left:none;width:56pt'>&nbsp;</td>
  <td class=xl72 width=73 style='border-top:none;border-left:none;width:53pt'>&nbsp;</td>
  </tr>
 <tr height=16 style='mso-height-source:userset;height:12.0pt'>
  <td height=16 class=xl72 width=115 style='height:12.0pt;border-top:none;
  width:86pt'>Teste de Impressão</td>
  <td class=xl71 style='border-top:none;border-left:none'>&nbsp;</td>
  <td colspan=3 class=xl153 style='border-left:none;width:88pt'>&nbsp;</td>
  <td colspan=4 class=xl141 style='border-right:1pt solid black;
  border-left:none;width:149pt'>Verificação do sistema de fusão</td>
  <td class=xl72 width=75 style='border-top:none;border-left:none;width:56pt'>&nbsp;</td>
  <td class=xl72 width=73 style='border-top:none;border-left:none;width:53pt'>&nbsp;</td>
  </tr>
 <tr height=16 style='mso-height-source:userset;height:12.0pt'>

  <td height=16 class=xl72 width=115 style='height:12.0pt;border-top:none;
  width:86pt'>Teste de Scaner</td>
  <td class=xl71 style='border-top:none;border-left:none'>&nbsp;</td>
  <td colspan=3 class=xl153 style='border-left:none;width:88pt'>&nbsp;</td>
  <td colspan=4 class=xl141 style='border-right:1pt solid black;
  border-left:none;width:149pt'>Verificação na unidade de imagem</td>
  <td class=xl72 width=75 style='border-top:none;border-left:none;width:56pt'>&nbsp;</td>
  <td class=xl72 width=73 style='border-top:none;border-left:none;width:53pt'>&nbsp;</td>
  </tr>
 <tr height=16 style='mso-height-source:userset;height:12.0pt'>
  <td rowspan=2 height=32 class=xl166 width=115 style='border-bottom:.5pt solid black;
  height:24.0pt;border-top:none;width:86pt'>Instalação do Software<span
  style='mso-spacerun:yes'>  </span>PrintScout</td>
  <td class=xl74 style='border-top:none;border-left:none'>Obrigatorio p /
  Cliente de Locaçao</td>
  <td colspan=3 rowspan=2 class=xl187 style='border-right:1pt solid black;
  border-bottom:.5pt solid black;width:88pt'>&nbsp;</td>
  <td colspan=4 class=xl141 style='border-right:1pt solid black;
  border-left:none;width:149pt'>Limpeza dos roletes tração do Papel</td>
  <td class=xl72 width=75 style='border-top:none;border-left:none;width:56pt'>&nbsp;</td>
  <td class=xl72 width=73 style='border-top:none;border-left:none;width:53pt'>&nbsp;</td>
  </tr>
 <tr height=16 style='mso-height-source:userset;height:12.0pt'>
  <td height=16 class=xl73 style='height:12.0pt;border-left:none'>&nbsp;</td>
  <td colspan=4 class=xl141 style='border-right:1pt solid black;
  border-left:none;width:149pt'>Ajuste Gavetas/Alimentação do Pap.</td>
  <td class=xl72 width=75 style='border-top:none;border-left:none;width:56pt'>&nbsp;</td>
  <td class=xl72 width=73 style='border-top:none;border-left:none;width:53pt'>&nbsp;</td>
  </tr>
 <tr height=16 style='mso-height-source:userset;height:12.0pt'>
  <td height=16 class=xl72 width=115 style='height:12.0pt;border-top:none;
  width:86pt'>&nbsp;</td>
  <td class=xl71 style='border-top:none;border-left:none'>&nbsp;</td>
  <td colspan=3 class=xl153 style='border-left:none;width:88pt'>&nbsp;</td>
  <td colspan=4 class=xl141 style='border-right:1pt solid black;
  border-left:none;width:149pt'>Limpeza, Roletes, Sensores e ADF</td>
  <td class=xl72 width=75 style='border-top:none;border-left:none;width:56pt'>&nbsp;</td>
  <td class=xl72 width=73 style='border-top:none;border-left:none;width:53pt'>&nbsp;</td>
  </tr>
 <tr height=17 style='mso-height-source:userset;height:12.95pt'>
  <td colspan=11 height=17 class=xl154 style='border-right:1pt solid black;
  height:12.95pt;width:519pt'>CONDIÇAO FINAL DO CHAMADO</td>
  </tr>
 <tr height=20 style='height:15.0pt'>
   <td colspan=4 height=50 class=xl157 style='border-right:1pt solid black;border-bottom:1px solid black;height:37.5pt;width:208pt'>[
     ] Equip. Funcionando normal<br>
     [ ] Parado Pendente de Peças<br>
     [ ] Funcionando sem Duplex<br>
    </td>
   <td colspan=4 class=xl157 style='border-right:1pt solid black;
  border-bottom:.5pt solid black;width:154pt'>[ ] Funcionando
     precariamente<br>
     [ ] parado (outros motivos)<br>
     [ ] <font class="font17">RETIRADO P/ RECARGA (TONER)</font><font
  class="font12"><br>
    </font></td>
   <td colspan=3 class=xl157 style='border-right:1pt solid black;
  border-bottom:.5pt solid black;width:157pt'>[ ] Precisando<span
  style='mso-spacerun:yes'>  </span>de insumo<br>
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
 <tr height=20 style='height:15.0pt'>
   <td colspan=11 height=77 class=xl178 style='border-right:1pt solid black;border-bottom:.5pt solid black;height:57.75pt;width:519pt'>Para
     ser verdade as definições acima definido, <font class="font19">Na
       Qualidade<span style='mso-spacerun:yes'>  </span>de Cliente</font><font
  class="font0">, identifico<span style='mso-spacerun:yes'>  </span>e dou
         ciência das verdades declarando satisfeito ou aguardando resposta conforme
         definições acima.<span style='mso-spacerun:yes'>  </span></font><font
  class="font19">Na Qualidade de Técnico</font><font class="font0"> me
           responsabilizo pelas definições acima por mim ditada, pelo bom funcionamento
           ou pela<span style='mso-spacerun:yes'>  </span>remoção do equipamento ate a
           Oficina.<span style='mso-spacerun:yes'>  </span>Sendo assim assino o presente
    Chamado técnico Dando ciência das verdades.<span
  style='mso-spacerun:yes'> </span></font></td>
 </tr>
 <tr height=18 style='mso-height-source:userset;height:13.5pt'>
   <td colspan=5 height=18 class=xl193 style='height:13.5pt'>TÉCNICO</td>
   <td colspan=6 class=xl194 style='border-right:1pt solid black'>CLIENTE</td>
  </tr>
 <tr height=20 style='height:15.0pt'>
  <td colspan=5 height=20 class=xl109 style='height:15.0pt'>&nbsp;</td>
  <td colspan=6 class=xl109 style='border-right:1pt solid black'>&nbsp;</td>
  </tr>
 <tr height=20 style='height:15.0pt'>
  <td colspan=5 height=20 class=xl109 style='height:15.0pt'>&nbsp;</td>
  <td colspan=6 class=xl109 style='border-right:1pt solid black'><span
  style='mso-spacerun:yes'> </span></td>
  </tr>
 <![if supportMisalignedColumns]>
 <tr height=0 style='display:none'>
  <td width=115 style='width:86pt'></td>
  <td width=119 style='width:87pt'></td>
  <td width=19 style='width:14pt'></td>
  <td width=28 style='width:21pt'></td>
  <td width=71 style='width:53pt'></td>
  <td width=64 style='width:48pt'></td>
  <td width=52 style='width:38pt'></td>
  <td width=20 style='width:15pt'></td>
  <td width=64 style='width:48pt'></td>
  <td width=75 style='width:56pt'></td>
  <td width=73 style='width:53pt'></td>
  <td width=52 style='width:48pt'></td>
  <td width=34 style='width:48pt'></td>
 </tr>
 <![endif]>
</table>

</body>

</html>
