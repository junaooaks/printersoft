<?php
//Inicia a sess�o
session_start();
@header('P3P: CP="CAO COR CURa ADMa DEVa OUR IND ONL COM DEM PRE"');
//Encerra a sess�o
session_destroy();
header("Location:login.html");
?>