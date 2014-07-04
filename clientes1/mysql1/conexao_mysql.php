<?php
$host = "localhost";
$user = "nacional";
$senha = "printer123";
$dbname = "printer";

//conectar ao banco de dados

mysql_connect($host, $user, $senha) or die (mysql_error());
mysql_select_db ($dbname) or die (mysql_error());
?>
