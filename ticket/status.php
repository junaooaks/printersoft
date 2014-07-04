<html>
<head>
<title>SISGEW - Sistema Gerenciador Web</title>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" >
</head>
<style type="text/css">
<!--
    body {

	background-color: #9CF;
        
}
	
-->
</style>
<body text="#0099FF" link="#0099FF" vlink="#0099FF" alink="#FF0000" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td valign="top">
<div align="center">
        <table border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="" height="726" valign="top"> 
              <fieldset>
              <p> 
                <legend><strong><font color="#000000" size="2" face="Verdana">TICKET</font></strong></legend>
                <legend></legend>
              </p>
			  <?php
			  $uu;
			  //puxar a pagina de cone��o para dentro deste script
			  include "../includes/conexao_mysql.php";
			  
			  //variavel da lista
			  $cod      = $_REQUEST['Codigo'];
			  
			  //varavel a textearea e select
			  $teste 	= $_POST['laudo'];
			  $status_l = $_POST['status_l'];
			  $x		= $_POST['x'];
			  $data 	= date("Y-m-d H:i:s");
			  $box		= $_POST['box'];
			  
			  
			  //variavel da agenda
			  $fun_ag	= $_POST['funcionario_ag'];
			  $hora_ag	= $_POST['hora_ag'];
			  $data_ag	= $_POST['data_ag'];
			  
			  //juntar a data e hora
			  $data_hora ="$data_ag $hora_ag";
			 
			  //alterar tabela de ticket para cadastrar os funcionarios responsavel pela chamada
			  /*if (($data_hora <> '') and ($fun_ag <> ''))
			  	{
					echo 'teste '.$fun_ag;
				$ag = "UPDATE ticket SET data_previsao = '$data_hora', funcionario = '$fun_ag' WHERE id_ticket = '$x'";
				$ag = mysql_query($ag) or die (mysql_error());
				}*/
			  
			  //comparar se estatus_l =='' fazer updade no banco de dados
			  
			if ($status_l<>'')
			{
				
				$up = "UPDATE ticket SET laudo = '$uu - $teste',status = '$status_l', data_laudo = '$data', data_previsao = '$data_hora', funcionario = '$fun_ag', email_enviado = '$box' WHERE id_ticket = '$cod'";
				$up = mysql_query($up) or die (mysql_error());
				
				//data e hora
				if(!empty($teste)){
				$datah = date("Y-m-d H:i:s");
				$l = "INSERT INTO bate_papo (id_tic, usuario, mensagem, data) VALUE ('$cod',   '$uu',   '$teste', '$datah')";
				$l = mysql_query($l)or die (mysql_error());
				}
			}
						
			  
			   //SELECIONAR novo ticket 
			   //selecionar dados quano cliente tem contrato
			   
			  
			
			   //selecionar dados quando cliente nao tiver contrato
			   $sq = mysql_query("SELECT * FROM ticket, cliente WHERE id_ticket = '$cod' 
			   			AND ticket.id_cliente = cliente.idCliente") or die (mysql_error());
						
			   $linha = mysql_fetch_array($sq);
			   
			   $id			 = $linha['id_ticket'];
			   $nome		 = $linha['pessoaJuridica'];
			   $email		 = $linha['email'];
			   $telefone	 = $linha['telComercial'];
			   if(empty($telefone)){$telefone = $linha['telResidencial'];}
			   $celular 	 = $linha['celular'];
			   $departamento = $linha['departamento'];
			   $prioridade	 = $linha['prioridade'];
			   $titulo		 = $linha['titulo'];
			   $mensagem	 = $linha['mensagem'];
			   $status		 = $linha['status'];
			   $data		 = $linha['data'];
			   $laudo		 = $linha['laudo'];
			   $data_l		 = $linha['data_laudo'];
			   $func		 = $linha['funcionario'];
			   $email_en	 = $linha['email_enviado'];
			   $bairro		 = $linha['bairro'];
			   $cidade		 = $linha['cidade'];
			   $endereco	 = $linha['endereco'];
			   $data_pre	 = $linha['data_previsao'];					
  			   
			   
			   
			  
			   
			   			   
			   ?>
              <form name="form1" method="post" action="<?php echo  $_SERVER['PHP_SELF']; ?>">
                <table border="0" cellpadding="0" cellspacing="5">
                  <tr> 
                    <td width="107" bgcolor="#CCCCFF"><font color="#000000" size="2" face="Verdana">Ticket 
                      ID:</font></td>
                    <td colspan="2" bgcolor="#CCCCFF"><font color="#000000" size="2" face="Verdana"><?php echo $id; ?></font></td>
                  </tr>
                  <tr> 
                    <td bgcolor="#FFFFFF"><font color="#000000" size="2" face="Verdana">Status:</font></td>
                    <td colspan="2" bgcolor="#FFFFFF"><font color="#000000" size="2" face="Verdana"><?php echo $status; ?></font></td>
                  </tr>
                  <tr> 
                    <td bgcolor="#CCCCFF"><font color="#000000" size="2" face="Verdana">Nome:</font></td>
                    <td colspan="2" bgcolor="#CCCCFF"><font color="#000000" size="2" face="Verdana"><?php echo $nome; ?></font></td>
                  </tr>
                  <tr> 
                    <td bgcolor="#FFFFFF"><font color="#000000" size="2" face="Verdana">Cidade:</font></td>
                    <td colspan="2" bgcolor="#FFFFFF"><font color="#000000" size="2" face="Verdana"><?php echo $cidade;?></font></td>
                  </tr>
                  <tr> 
                    <td bgcolor="#CCCCFF"><font color="#000000" size="2" face="Verdana">Endere&ccedil;o:</font></td>
                    <td colspan="2" bgcolor="#CCCCFF"><font color="#000000" size="2" face="Verdana"><?php echo $endereco;?></font></td>
                  </tr>
                  <tr> 
                    <td bgcolor="#FFFFFF"><font color="#000000" size="2" face="Verdana">Bairro:</font></td>
                    <td colspan="2" bgcolor="#FFFFFF"><font color="#000000" size="2" face="Verdana"><?php echo $bairro;?></font></td>
                  </tr>
                  <tr> 
                    <td bgcolor="#FFFFFF"><font color="#000000" size="2" face="Verdana">Email:</font></td>
                    <td colspan="2" bgcolor="#FFFFFF"><font color="#000000" size="2" face="Verdana"><?php echo $email; ?></font></td>
                  </tr>
                  <tr> 
                    <td bgcolor="#CCCCFF"><font color="#000000" size="2" face="Verdana">Telefone:</font></td>
                    <td colspan="2" bgcolor="#CCCCFF"><font color="#000000" size="2" face="Verdana"><?php echo $telefone; ?></font></td>
                  </tr>
                  <tr> 
                    <td bgcolor="#FFFFFF"><font color="#000000" size="2" face="Verdana">Celular:</font></td>
                    <td colspan="2" bgcolor="#FFFFFF"><font color="#000000" size="2" face="Verdana"><?php echo $celular; ?></font></td>
                  </tr>
                  <tr> 
                    <td height="3" colspan="3" bgcolor="#eaeaea"><font size="2" face="Verdana">&nbsp;</font></td>
                  </tr>
                  <tr> 
                    <td height="18" bgcolor="#FFFFFF"><font color="#000000" size="2" face="Verdana">Agenda:</font></td>
                    <td width="178" bgcolor="#FFFFFF"><font color="#000000" size="2" face="Verdana">Funcionario:</font></td>
                    <td width="234" bgcolor="#FFFFFF">
  <select name="funcionario_ag" id="funcionario_ag" style="font-size:10px; font-family: Verdana;">
    <?php
						
					   
						
						//consulto nome do usuario por ticket
						$sm = "SELECT funcionario FROM ticket WHERE id_ticket = '$id'";

						$sm = mysql_query($sm) or die (mysql_error());
						
						
						$t = mysql_fetch_array($sm);
						$fun   = $t['funcionario'];
						echo "<option value=\"$fun\">$fun</option>";
						
                        //consulta nome de usuario cadastrado
						$sy = "SELECT * FROM usuarios WHERE login <> '$fun'";
						$sy = mysql_query($sy) or die (mysql_error());				
						
						$res1 = mysql_fetch_array($sy);
						while ($res = mysql_fetch_array($sy))
						{
						$login = $res['login'];						
						echo "<option value=\"$login\">$login</option>";
                    	}
						
					   
					   ?>
    </select> </td>
                  </tr>
                  <tr> 
                    <td height="5" colspan="3" valign="top" bgcolor="#eaeaea"><font size="2" face="Verdana">&nbsp;</font></td>
                  </tr>
                  <tr> 
                    <td valign="top" bgcolor="#CCCCFF"><font color="#000000" size="2" face="Verdana">Titulo:</font></td>
                    <td colspan="2" bgcolor="#CCCCFF"><font color="#000000" size="2" face="Verdana"><?php echo $titulo; ?></font></td>
                  </tr>
                  <tr> 
                    <td valign="top" bgcolor="#FFFFFF"><font color="#000000" size="2" face="Verdana">Mensagem:</font></td>
                    <td colspan="2" bgcolor="#FFFFFF"><font color="#000000" size="2" face="Verdana"><?php echo $mensagem; ?></font></td>
                  </tr>
                  <tr> 
                    <td colspan="3" valign="top"><font size="2" face="Verdana">&nbsp;</font></td>
                  </tr>
                  <tr> 
                    <td valign="top" bgcolor="#FFFFFF"><font color="#000000" size="2" face="Verdana">Hist&oacute;rico:</font></td>
                    <td colspan="2" bgcolor="#FFFFFF"> 
                      <?php
					
					$me = mysql_query ("SELECT * FROM bate_papo WHERE (id_tic = '$cod') or (id_tic ='$cod')") or die (mysql_error());
					
					while ($rows = mysql_fetch_array($me)){
					
					$usu	=$rows['usuario'];
					$men	=$rows['mensagem'];
					$dataho	=$rows['data'];
					$men = nl2br($men);					
					echo "<p><font size=\"2\" face=\"Verdana\">$usu - $dataho - $men\n</font>"; 			
					
					}
					?>
                    </td>
                  </tr>
                  <tr> 
                    <td valign="top" bgcolor="#CCCCFF"><font color="#000000" size="2" face="Verdana">Laudo 
                      Tecnico: </font></td>
                    <td colspan="2" bgcolor="#CCCCFF"><font color="#000000" size="2" face="Verdana"> 
                      <textarea name="laudo" cols="50" wrap="VIRTUAL" id="laudo"></textarea>
                      </font></td>
                  </tr>
                  <tr> 
                    <td bgcolor="#FFFFFF"><font color="#000000" size="2" face="Verdana">Status 
                      Laudo:</font></td>
                    <td bgcolor="#FFFFFF"> <div align="center"> 
                        <select name="status_l" id="status_l">
                          <option value=""></option>
                          <option value="PENDENTE">PENDENTE</option>
                          
						  <option value="FINALIZADO">FINALIZADO</option>
						  
                          <option value="EM ANDAMENTO">EM ANDAMENTO</option>
                        </select>
                      </div></td>
                    
                  <tr> 
                    <td height="73" colspan="3"><div align="center"> <div align="center"> 
                        <p> 
                          <input name="buscar" type="image" id="buscar" value="Enviar" src="botao/cadastrar.gif" alt="Enviar!" align="middle" border="0">
                          <input name="Codigo" type="hidden" id="x" value="<?php echo $cod;?>">
                          <br>
                          <?php
						  			if (($status_l=='') and ($teste<>''))
			 			{
			  				echo "<strong><font color='#000000' size='2' face='Verdana'>PREENCHA O STATUS DO LAUDO</font></strong></div>";	
			  			
						} 
						  ?>
                          <br>
                        </p>
                      </div></td>
                  </tr>
                </table>
              </form>
              <div align="left"></div>
              </fieldset>
            </td>
          </tr>
        </table>
      </div></td>
  </tr>
</table>
</body>
</html>
