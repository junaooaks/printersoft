<?php 
session_start();  
if(!isset($_COOKIE["dados"]) and !isset($_SESSION["dados"])){
	header("Location: login/login.html");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
    	<link rel="shortcut icon" href="favicon.ico" />
    	<meta name="robots" content="noindex,nofollow">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>PRINTER Software - SisGeW Sistema Gestão Web</title>
		<style type="text/css">@import url("css/css.css");</style>
		<style type="text/css">@import url("css/style.css");</style>
       
  <!-- <script language="javascript">window.open('aviso.php', 'AVISO', 'HEIGHT=225,resizable=no,WIDTH=400');</script> -->
       
       
       
       
        <script language="JavaScript">

function confirma(codigo) {
    if( confirm( 'ESTA OPCAO E IRREVERSIVEL. DESEJA REALMENTE FAZER ISTO?' ) ) 
    {
        location.href='os/cadastrar.php?eexcluir='+ codigo;
    }
}

</script>
<script language="javascript">
var win = null;
function abrir(pagina,nome,w,h,scroll){
	LeftPosition = (screen.width) ? (screen.width-w)/2 : 0;
	TopPosition = (screen.height) ? (screen.height-h)/2 : 0;
	settings = 'height='+h+',width='+w+',top='+TopPosition+',left='+LeftPosition+',scrollbars='+scroll+',resizable';
	win = window.open(pagina,nome,settings);
	//win = window.showModelessDialog(pagina,nome,settings);
}
</script>      		
<?php include "menu/rapido.php";?>
<?php include "menu/menu.php"; ?>
<?php include "pesquisa/index.php"; ?>

    </head>
    <body OnLoad>
    </body>
</html>
