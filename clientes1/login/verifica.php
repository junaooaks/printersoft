<?php 
session_start();
@header('P3P: CP="CAO COR CURa ADMa DEVa OUR IND ONL COM DEM PRE"');
//echo "<<<<$nomeclixy >>>>>>>>>>>";
if (($nomeclixy=='')or($codclixy=='')or($loginxy==''))
{
//Caso n�o exista dados registrados, exige login

session_unregister ($_SESSION["nomeclixy"]);
session_unregister ($_SESSION["senhaxy"]);
session_unregister ($_SESSION["loginxy"]);
session_unregister ($_SESSION["codclixy"]);
session_destroy();
header("Location: login/destroy.php");

}
?>