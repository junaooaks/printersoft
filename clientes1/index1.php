<?php session_start(); 
@header('P3P: CP="CAO COR CURa ADMa DEVa OUR IND ONL COM DEM PRE"');
require "login/verifica.php"; 
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN" "http://www.w3.org/TR/html4/frameset.dtd">
<html>
<head>
<title>PRINTER Software</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<frameset rows="207,*" cols="*" framespacing="0" frameborder="NO" border="0">
  <frame src="botao.php" name="botao" scrolling="NO" noresize >
  <frame src="form.php" name="form">
</frameset>
<noframes><body>

</body></noframes>
</html>