<?php 

		if (!isset($_GET['pag'])){
		
		$departamento = $_POST['departamento'];
		$inicial      = $_POST['data1'];
		$final        = $_POST['data2'];
		$cliente      = strtoupper($_POST['cliente']);
		$status       = $_POST['status'];
		}
		else
		{
		$departamento= $_GET['departamento'];
		$inicial	 = $_GET['inicial'];
		$final		 = $_GET['final'];
		$cliente	 = strtoupper($_GET['cliente']);
		$status		 = $_GET['status'];
		}
		//echo $cliente;
		
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
    	<link rel="shortcut icon" href="favicon.ico" />
    	<meta name="robots" content="noindex,nofollow">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>PRINTER Software - SisGeW Sistema Gestao Web</title>
<script src="../includes/script.js"></script>
<script language="JavaScript" src="../pupdate.js"></script>

<style type="text/css">@import url("../css/css.css");</style>
<style type="text/css">@import url("../css/style.css");</style>

<script>
    function pesquisa(pag)
        {
            url="index.php?_pagi_pg="+pag;
            ajax(url);
        }
</script>        

<script language='Javascript'>
// construindo o calendário
function popdate(obj,div,tam,ddd)
{
    if (ddd) 
    {
        day = ""
        mmonth = ""
        ano = ""
        c = 1
        char = ""
        for (s=0;s<parseInt(ddd.length);s++)
        {
            char = ddd.substr(s,1)
            if (char == "/") 
            {
                c++; 
                s++; 
                char = ddd.substr(s,1);
            }
            if (c==1) day    += char
            if (c==2) mmonth += char
            if (c==3) ano    += char
        }
        ddd = mmonth + "/" + day + "/" + ano
    }
  
    if(!ddd) {today = new Date()} else {today = new Date(ddd)}
    date_Form = eval (obj)
    if (date_Form.value == "") { date_Form = new Date()} else {date_Form = new Date(date_Form.value)}
  
    ano = today.getFullYear();
    mmonth = today.getMonth ();
    day = today.toString ().substr (8,2)
  
    umonth = new Array ("Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro")
    days_Feb = (!(ano % 4) ? 29 : 28)
    days = new Array (31, days_Feb, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31)

    if ((mmonth < 0) || (mmonth > 11))  alert(mmonth)
    if ((mmonth - 1) == -1) {month_prior = 11; year_prior = ano - 1} else {month_prior = mmonth - 1; year_prior = ano}
    if ((mmonth + 1) == 12) {month_next  = 0;  year_next  = ano + 1} else {month_next  = mmonth + 1; year_next  = ano}
    txt  = "<table bgcolor='#efefff' style='border:solid #330099; border-width:2' cellspacing='0' cellpadding='3' border='0' width='"+tam+"' height='"+tam*1.1 +"'>"
    txt += "<tr bgcolor='#FFFFFF'><td colspan='7' align='center'><table border='0' cellpadding='0' width='100%' bgcolor='#FFFFFF'><tr>"
    txt += "<td width=20% align=center><a href=javascript:popdate('"+obj+"','"+div+"','"+tam+"','"+((mmonth+1).toString() +"/01/"+(ano-1).toString())+"') class='Cabecalho_Calendario' title='Ano Anterior'><<</a></td>"
    txt += "<td width=20% align=center><a href=javascript:popdate('"+obj+"','"+div+"','"+tam+"','"+( "01/" + (month_prior+1).toString() + "/" + year_prior.toString())+"') class='Cabecalho_Calendario' title='Mês Anterior'><</a></td>"
    txt += "<td width=20% align=center><a href=javascript:popdate('"+obj+"','"+div+"','"+tam+"','"+( "01/" + (month_next+1).toString()  + "/" + year_next.toString())+"') class='Cabecalho_Calendario' title='Próximo Mês'>></a></td>"
    txt += "<td width=20% align=center><a href=javascript:popdate('"+obj+"','"+div+"','"+tam+"','"+((mmonth+1).toString() +"/01/"+(ano+1).toString())+"') class='Cabecalho_Calendario' title='Próximo Ano'>>></a></td>"
    txt += "<td width=20% align=right><a href=javascript:force_close('"+div+"') class='Cabecalho_Calendario' title='Fechar Calendário'><b>X</b></a></td></tr></table></td></tr>"
    txt += "<tr><td colspan='7' align='right' bgcolor='#ccccff' class='mes'><a href=javascript:pop_year('"+obj+"','"+div+"','"+tam+"','" + (mmonth+1) + "') class='mes'>" + ano.toString() + "</a>"
    txt += " <a href=javascript:pop_month('"+obj+"','"+div+"','"+tam+"','" + ano + "') class='mes'>" + umonth[mmonth] + "</a> <div id='popd' style='position:absolute'></div></td></tr>"
    txt += "<tr bgcolor='#330099'><td width='14%' class='dia' align=center><b>Dom</b></td><td width='14%' class='dia' align=center><b>Seg</b></td><td width='14%' class='dia' align=center><b>Ter</b></td><td width='14%' class='dia' align=center><b>Qua</b></td><td width='14%' class='dia' align=center><b>Qui</b></td><td width='14%' class='dia' align=center><b>Sex<b></td><td width='14%' class='dia' align=center><b>Sab</b></td></tr>"
    
	today1 = new Date((mmonth+1).toString() +"/01/"+ano.toString());
    diainicio = today1.getDay () + 1;
    week = d = 1
    start = false;

    for (n=1;n<= 42;n++) 
    {
        if (week == 1)  txt += "<tr bgcolor='#efefff' align=center>"
        if (week==diainicio) {start = true}
        if (d > days[mmonth]) {start=false}
        if (start) 
        {
            dat = new Date((mmonth+1).toString() + "/" + d + "/" + ano.toString())
            day_dat   = dat.toString().substr(0,10)
            day_today  = date_Form.toString().substr(0,10)
            year_dat  = dat.getFullYear ()
            year_today = date_Form.getFullYear ()
            colorcell = ((day_dat == day_today) && (year_dat == year_today) ? " bgcolor='#FFCC00' " : "" )
            txt += "<td"+colorcell+" align=center><a href=javascript:block('"+  d + "/" + (mmonth+1).toString() + "/" + ano.toString() +"','"+ obj +"','" + div +"') class='data'>"+ d.toString() + "</a></td>"
            d ++ 
        } 
        else 
        { 
            txt += "<td class='data' align=center> </td>"
        }
        week ++
        if (week == 8) 
        { 
            week = 1; txt += "</tr>"} 
        }
        txt += "</table>"
        div2 = eval (div)
        div2.innerHTML = txt 
}
  
// função para exibir a janela com os meses
function pop_month(obj, div, tam, ano)
{
  txt  = "<table bgcolor='#CCCCFF' border='0' width=80>"
  for (n = 0; n < 12; n++) { txt += "<tr><td align=center><a href=javascript:popdate('"+obj+"','"+div+"','"+tam+"','"+("01/" + (n+1).toString() + "/" + ano.toString())+"')>" + umonth[n] +"</a></td></tr>" }
  txt += "</table>"
  popd.innerHTML = txt
}

// função para exibir a janela com os anos
function pop_year(obj, div, tam, umonth)
{
  txt  = "<table bgcolor='#CCCCFF' border='0' width=160>"
  l = 1
  for (n=1991; n<2012; n++)
  {  if (l == 1) txt += "<tr>"
     txt += "<td align=center><a href=javascript:popdate('"+obj+"','"+div+"','"+tam+"','"+(umonth.toString () +"/01/" + n) +"')>" + n + "</a></td>"
     l++
     if (l == 4) 
        {txt += "</tr>"; l = 1 } 
  }
  txt += "</tr></table>"
  popd.innerHTML = txt 
}

// função para fechar o calendário
function force_close(div) 
    { div2 = eval (div); div2.innerHTML = ''}
    
// função para fechar o calendário e setar a data no campo de data associado
function block(data, obj, div)
{ 
    force_close (div)
    obj2 = eval(obj)
    obj2.value = data 
}


var win = null;
function NovaJanela(pagina,nome,w,h,scroll){
	LeftPosition = (screen.width) ? (screen.width-w)/2 : 0;
	TopPosition = (screen.height) ? (screen.height-h)/2 : 0;
	settings = 'height='+h+',width='+w+',top='+TopPosition+',left='+LeftPosition+',scrollbars='+scroll+',resizable'
	win = window.open(pagina,nome,settings);
}

function confirma(codigo) {
    if( confirm( 'ESTA OPCAO E IRREVERSIVEL. DESEJA REALMENTE FAZER ISTO?' ) ) 
    {
		alert(codigo);
		//location.href='index.php?cod=' + codigo;
    }
	else
	{
	document.getElementById('x').value="";
	}

}
function abrir(pagina,nome,w,h,scroll){
	LeftPosition = (screen.width) ? (screen.width-w)/2 : 0;
	TopPosition = (screen.height) ? (screen.height-h)/2 : 0;
	settings = 'height='+h+',width='+w+',top='+TopPosition+',left='+LeftPosition+',scrollbars='+scroll+',resizable';
	win = window.open(pagina,nome,settings);
	//win = window.showModelessDialog(pagina,nome,settings);
}

</script>
<style>
    .dia {font-family: helvetica, arial; font-size: 8pt; color: #FFFFFF}
    .data {font-family: helvetica, arial; font-size: 8pt; text-decoration:none; color:#191970}
    .mes {font-family: helvetica, arial; font-size: 8pt}
    .Cabecalho_Calendario {font-family: helvetica, arial; font-size: 10pt; color: #000000; text-decoration:none; font-weight:bold}
</style>


<?php

		//puxar a pagina de coneção para dentro deste script
		include ("../includes/conexao_mysql.php");
		
?>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<body text="#000000" link="#000000" vlink="#000000" alink="#000000">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr> 
              
    <td><form action="<?php echo  $_SERVER['PHP_SELF']; ?>" method="<?php if (!isset($_GET['pag'])){echo "post";} else {echo "get";} ?>" name="form1" target="">
    <?php 
	 echo "<input name=\"novo\" type=\"image\" id=\"novo\" onClick=\"NovaJanela('novo.php','nomeJanela','640', '350','yes')\" src=\"botao/novo.gif\" border=\"0\">";
	 
	/* echo "<input name=\"delete\" type=\"image\" id=\"delete2\" onClick=\"confirma($id)\" src=\"botao/delete.gif\" border=\"0\"> 
              <input name=\"x\" type=\"hidden\" id=\"x2\" value=\"x\">"; */
	?>
        <table width="21%" border="0" cellpadding="0" cellspacing="3">
          <tr> 
            <td width="48%" height="30"><font color="#000000" size="4" face="Verdana">
			
              </font></td>
            <td width="52%">
			
			  </td>
          </tr>
        </table>
        <table border="0" align="center" cellpadding="0" cellspacing="5">
          <tr> 
            <td width="90"><font size="1" face="Verdana">Data Inicial:</font></td>
            <td width="126"><font size="1">
              <input name="data1" size="10" maxlength="10" value="<?php echo $inicial; ?>" style="font-size:10px; font-family: Verdana;">
            <a href="#" name="btnData1" onClick="javascript:popdate('document.form1.data1','pop1','150',document.form1.data1.value)"> <img src="../icones/calendario.jpg" border="0"></a><span id="pop1" style="position:absolute"></span> </font></td>
            <td width="100"><font size="1" face="Verdana">Data Final:</font></td>
            <td colspan="3"><font size="1">
              <input name="data2" size="10" maxlength="10" value="<?php echo $final; ?>" style="font-size:10px; font-family: Verdana;">
              <a href="#" name="btnData2" onClick="javascript:popdate('document.form1.data2','pop2','150',document.form1.data2.value)"><img src="../icones/calendario.jpg" border="0"></a>
              <!-- na span abaixo aparece o segundo calendario -->
            <span id="pop2" style="position:absolute"></span
		
		  ></font><font size="1">&nbsp;</font>                        </tr>
          <tr> 
            <td> <div align="left"><font size="1" face="Verdana">Cliente:</font></div></td>
            <td colspan="3"><font size="1"> 
              <input name="cliente" type="text" id="cliente5" style="font-size:10px; font-family: Verdana;" value="" size="50">
              </font></td>
            <td width="71"><font size="1" face="Verdana">Status:</font></td>
            <td width="136"><select name="status" id="select8" style="font-size:10px; font-family: Verdana;">
                <option value=""></option>
                <option value="PENDENTE" <?php if ($status =='PENDENTE') {echo "selected";} ?>>PENDENTE</option>
                <option value="FINALIZADO" <?php if ($status =='FINALIZADO') {echo "selected";} ?>>FINALIZADO</option>
                <option value="EM ANDAMENTO" <?php if ($status =='EM ANDAMENTO') {echo "selected";} ?>>EM ANDAMENTO</option>
              </select></td>
          </tr>
          <tr> 
            <td colspan="6"><div align="center"> 
                <input name="buscar" type="image" id="buscar5" value="Enviar" src="botao/buscar.gif" alt="Enviar!" border="0" >
              </div></td>
          </tr>
        </table>
        <table border="0" align="center" cellpadding="0" cellspacing="1">
          <thead>
          <tr> 
            <th id="th1"><div align="center"><font size="1">N°</font></div></th>
            <th id="th2"><div align="center"><font size="1">CLIENTE</font></div></th>
            <th id="th3"><div align="center"><font size="1">DATA HORA</font></div></th>
            <th id="th4"><div align="center"><font size="1">ASSUNTO</font></div></th>
            <th id="th5"><div align="center"><font size="1">STATUS</font></div></th>
            <th id="th6"><div align="center"><font size="1">TECNICO</font></div></th>
            <th id="th7"><div align="center"><font size="1">CIDADE</font></div></th>
            <th id="th8"><div align="center"><font size="1">IMP.</font></div></th>
          </tr>
          </thead>
          <?php
		
		
		
		
		//variavel para deletar
		$x;
		$cod = $_GET['cod'];
	
		if(isset($_POST["check"]) && is_array($_POST["check"]) && sizeof($_POST["check"]))
		{
			
			foreach ($_POST["check"] as $caixas)
			{
				$del = "DELETE FROM ticket WHERE id_ticket = '$caixas'";
				$del = mysql_query($del) or die (mysql_error());
				//echo $caixas;
			}
		}
	
		//usar o explode e separa por barra
		$data = explode ('/', $inicial);
		$dat = $data[2]."-".$data[1]."-".$data[0];

		//usar o explode e separa por barra
		$data_f = explode ('/', $final);
		$da = $data_f[2]."-".$data_f[1]."-".$data_f[0];
		$da = $da." 23:59:59";
		
		//os campos de datas nunca sao diferentes de vazio
		//fazer comparao se qualquer um dos campos for diferente de vazio
		if ($departamento != '' | $status != '' | $cliente != '' | $dat != '--' | $da != '-- 23:59:59')
				{
				//echo "$cliente - -";
				//selecionar dados na tabela
				$_pagi_sql = "SELECT * FROM ticket, cliente 
						WHERE cliente.idCliente = ticket.id_cliente
						  AND status         LIKE '%".trim ($status)."%'
				 		  AND pessoaJuridica LIKE '%".trim($cliente)."%'";
										
				
				if (($dat<>'--') and ($da<>'-- 23:59:59'))
					{
					$_pagi_sql = $_pagi_sql."AND data BETWEEN '$dat' AND '$da'"; 
					}
				$_pagi_sql=$_pagi_sql." ORDER BY data DESC";
				
				//Estas variaveis so opcionais
$_pagi_cuantos = 30;            //quantidade de registros por pagina
$_pagi_nav_anterior = "anterior";    //string para anterior
$_pagi_nav_siguiente = "seguinte";    //string para seguinte
$_pagi_nav_primera = "primeira";    //string para primeira
$_pagi_nav_ultima = "última";        //string para ltima
$_pagi_nav_estilo = "paginacao";    //aqui a classe do CSS para a barra de paginao

//Inclumos o script de paginao. Este jecuta a consulta automaticamente 
include("../includes/paginator.inc.php"); 

				//$_pagi_sql = mysql_query($_pagi_sql) or die (mysql_error());
				
				while ($linha = mysql_fetch_array($_pagi_result))
					{
					$cod      = $linha['idCliente'];
					$id      = $linha['id_ticket'];
					$nom     = $linha['pessoaJuridica'];
					if(empty($nom)){$nom = $linha['pessoaFisica'];}
					$emai    = $linha['email'];
					$tel 	 = $linha['telefone'];
					$cel   	 = $linha['celular'];
					$depar   = $linha['departamento'];
					$prio    = $linha['prioridade'];
					$tit     = $linha['titulo'];
					$men     = $linha['mensagem'];
					$sta     = $linha['status'];
					$data    = $linha['data'];
					$usuario	= $linha['usuario'];
					$funcionario= $linha['funcionario'];
					$cidade		= $linha['cidade'];
					
					if ($class=='odd'){$class='even';}else{$class = 'odd';}	
					
					$data = strftime("%d/%m/%Y %H:%M:%S", strtotime($data));	
					//COMPARAR status
				
					echo "
          			<tr class='$class'> 
					<td><font size='1' face='Verdana'>".$id."</font></td>
		  			<td><strong><font size='1' face='Verdana'><a href=\"status.php?Codigo=" .  $id . "\">" .  $nom . "</a></font></strong></td>
            		<td><font size='1' face='Verdana'>$data</font></td>
            		
            		<td><font size='1' face='Verdana'>$tit</font></td>
					<td><font size='1' face='Verdana'>$sta</font></td>
					<td><font size='1' face='Verdana'>$funcionario</font></td>
					<td><font size='1' face='Verdana'>$cidade</font></td>
<td align='center'><a href='imprimir.php?codos=" . $id . " & codcliente=".$cod."' media='print' onclick=\"abrir(this.href,'abrir1','1000', '550','yes');return false\" ><img src='../imagem/impre.png' border=' 0'/></a>
					</td>
          			</tr>";
        			
					
					
		
					}
				}
			
		
		//fazer comparao se os campos estiverem todos vazios
		else
		{
		
		/*
		//selecionar dados na tabela
		$sq = "SELECT * FROM ticket, clientes WHERE ((status = 'ATIVO') or (status ='EM ESPERA')) AND clientes.id = ticket.id_cliente ORDER BY id_ticket DESC LIMIT 30";
		$sq = mysql_query($sq) or die (mysql_error());						
			*/
			//Sentena sql (sem limit) 
$_pagi_sql = "SELECT * FROM ticket, cliente WHERE ((status = 'PENDENTE') or (status ='EM ANDAMENTO')) AND cliente.idCliente = ticket.id_cliente ORDER BY	 id_ticket DESC";
 
//quantidade de resultados por pgina (opcional, por padro 20) 
//$_pagi_quantos = 30; 
//Estas variaveis so opcionais
$_pagi_cuantos = 30;                  //quantidade de registros por pagina
$_pagi_nav_anterior = "anterior";    //string para anterior
$_pagi_nav_siguiente = "seguinte";   //string para seguinte
$_pagi_nav_primera = "primeira";     //string para primeira
$_pagi_nav_ultima = "ultima";        //string para
$_pagi_nav_estilo = "paginacao";     //aqui a classe do CSS para a barra de paginao

//Inclumos o script de paginao. Este j executa a consulta automaticamente 
include("../includes/paginator.inc.php"); 
			
				
		while ($linha = mysql_fetch_array($_pagi_result))
			{
			$cod		= $linha['idCliente'];
			$id			= $linha['id_ticket'];
			$no         = $linha['pessoaJuridica'];
			$depar      = $linha['departamento'];
			$pri        = $linha['prioridade'];
			$titu       = $linha['titulo'];
			$status		= $linha['status'];		
			$data		= $linha['data'];
			$usuario	= $linha['usuario'];
			$funcionario= $linha['funcionario'];
			$cidade		= $linha['cidade'];
			
		
			
			
			if ($class=='odd'){$class='even';}else{$class = 'odd';}	
			
			$data = strftime("%d/%m/%Y %H:%M:%S", strtotime($data));
			
			echo "	<tr class='$class'> 
					<td><font size='1' face='Verdana'>".$id."</font></td>
		  			
					<td><strong><font size='1' face='Verdana'><a href=\"status.php?Codigo=" .  $id . "\">" .  $no . "</a></font></strong></td>
            		<td><font size='1' face='Verdana'>$data</font></td>
            			
            		<td><font size='1' face='Verdana'>$titu</font></td>
					<td><font size='1' face='Verdana'>$status</font></td>
					<td><font size='1' face='Verdana'>$funcionario</font></td>
					<td><font size='1' face='Verdana'>$cidade</font></td>
					<td align='center'><a href='imprimir.php?codos=" . $id . " & codcliente=".$cod."' onclick=\"abrir(this.href,'abrir1','1000', '550','yes');return false\"><img src='../imagem/impre.png' border=' 0'/></a>
					
					</td>
          			</tr>";			
			}
		}

 
				
		?>
		</table>
      </form></td>
  </tr>
  <tr> 
  
    <td colspan="11">&nbsp; 
	
</table>
<?php 
//Incluimos a barra de navegação 
echo"
		<div align = 'center'><font size='2' face='Verdana'>".$_pagi_navegacion."</font></div>
	";
?>

</body>
	 </head>
</html>
