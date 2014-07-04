<?php
$host = "localhost";
$user = "root";
$senha = "sgw258789";
$dbname = "printer";

//conectar ao banco de dados

mysql_connect($host, $user, $senha) or die (mysql_error());
mysql_select_db ($dbname) or die (mysql_error());

mysql_query("SET NAMES 'utf8'");
mysql_query('SET character_set_connection=utf8');
mysql_query('SET character_set_client=utf8');
mysql_query('SET character_set_results=utf8');
?>
