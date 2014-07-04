<?php
//Inicia a sessão
session_start();
@header('P3P: CP="CAO COR CURa ADMa DEVa OUR IND ONL COM DEM PRE"');
//Encerra a sessão
session_destroy();
header("Location:login.html");
?>