<?php session_start(); 
@header('P3P: CP="CAO COR CURa ADMa DEVa OUR IND ONL COM DEM PRE"');
require "login/verifica.php";
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>PRINTER Software</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<div align="center">
  <table border="0" align="center" cellpadding="3" style="background:#ccf">
    <tr> 
      <td height="22" colspan="2" style="font-size:10px; font-family:Verdana;"> 
        <div align="center"><strong><font size="2" face="Verdana">Central do Assinante</font></strong></div></td>
    </tr>
    <tr> 
      <td width="340" style="font-size:10px; font-family:Verdana;"><?php echo $nomeclixy; ?></td>
      <td width=""><a href="login/destroy.php" target="_parent"><img src="botao/fechar.gif" width="100" height="30" border="0"></a></td>
    </tr>
    <tr> 
      <td colspan="2"><div align="center"> 
          <table align="center" cellpadding="5">
            <tr> 
              <td width="20%"><div align="center"><a href="cliente/index.php" target="form"><img src="icones/editar.png" width="70" height="70" border="0"></a></div></td>
              <td width="20%"><div align="center"><a href="garantia/index.php" target="form"><img src="icones/senha.png" width="70" height="69" border="0"></a></div></td>
              <td width="20%"><div align="center"><a href="os/index.php" target="form"><img src="icones/financa.png" width="70" height="70" border="0"></a></div></td>
              <td width="20%" align="center"><a href="http://www.nacionalprinter.com.br/pages/Abrir-chamado-OS.html" target="_blank"><img src="icones/impressora.png" width="70" height="70" border="0"></a></td>
              <td width="20%" align="center"><a href="empresa.php" target="_blank"><img src="icones/falar.png" width="70" height="53" border="0"></a></td>
            </tr>
            <tr> 
              <td style="font-size:10px; font-family:Verdana; text-align:center;">Atualizar 
                Dados Cadastrais</td>
              <td style="font-size:10px; font-family:Verdana; text-align:center;">Acionar garantia</td>
              <td style="font-size:10px; font-family:Verdana; text-align:center;">Consultar O.S</td>
              <td style="font-size:10px; font-family:Verdana; text-align:center;">Solicitar Retirada de outra impressora</td>
              <td style="font-size:10px; font-family:Verdana; text-align:center;">Pol&iacute;tica da Empresa</td>
            </tr>
            <tr> 
              <td colspan="5">&nbsp;</td>
            </tr>
          </table>
      </div></td>
    </tr>
  </table>
</div>
</body>
</html>
