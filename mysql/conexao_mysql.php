<?php
if (basename($_SERVER["PHP_SELF"]) == "conexao_mysql.php") {
	die("Este arquivo nao pode ser acessado diretamente.");
}

  $server = "localhost";
  $user = "root";
  $pass = "";
  $db = "printer";

try{
                        
                        $pdo =  new PDO("mysql:host=$server;dbname=$db", $user, $pass);
						$pdo -> exec("SET NAMES utf8_unicode_ci");
										
  }
  catch(PDOException $e){
 echo"<script type='text/javascript'> window.alert('NAO FOI POSSIVEL SE CONECTAR COM O BANCO DE DADOS');</script>". $e->getMessage().$e->getCode() . " ] ";
  }
     
?>
