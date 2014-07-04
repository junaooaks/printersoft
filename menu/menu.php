<?php session_start();
if (basename($_SERVER["PHP_SELF"]) == "menu.php") {
	die("Este arquivo nao pode ser acessado diretamente.");
}

if(!isset($_COOKIE["dados"]) and !isset($_SESSION["dados"])){
	//header("Location: login/login.html");
}

?>
<link rel="stylesheet" type="text/css" href="css/menu.css" />
<script type="text/javascript" src="javascript/jquery.min.js"></script>
<script type="text/javascript" src="javascript/menu.js"></script>

<div id="myslidemenu" class="jqueryslidemenu">
    <ul>
<?php 

$dados = $_SESSION['dados'];

//echo $dados;

$nivel = $dados["nivel"];
if ($nivel =='1'){
	echo "
        <li><a href='#' onclick=''>Administracao</a>
            <ul>
                
                <li><a href=\"empresa/index.php\" onclick=\"abrir(this.href,'abrir1','1000', '550','yes');return false\">Dados da Empresa</a></li>
                <li><a href=\"usuario/consulta.php\" onclick=\"abrir(this.href,'abrir1','1000', '550','yes');return false\">Operador do Sistema</a></li>
		<li><a href=\"pecas/consulta.php\" onclick=\"abrir(this.href,'abrir1','1000', '550','yes');return false\">Pecas</a></li>
                <li><a href=\"marca/consulta.php\" onclick=\"abrir(this.href,'abrir1','1000', '550','yes');return false\">Marca</a></li>
                <li><a href=\"acessorio/consulta.php\" onclick=\"abrir(this.href,'abrir1','1000', '550','yes');return false\">Acessorios</a></li>
                <li><a href=\"equipamento/consulta.php\" onclick=\"abrir(this.href,'abrir1','1000', '550','yes');return false\">Equipamento</a></li>
                <li><a href=\"status/consulta.php\" onclick=\"abrir(this.href,'abrir1','1000', '550','yes');return false\">Status</a></li>
                <li><a href=\"atendimento/consulta.php\" onclick=\"abrir(this.href,'abrir1','1000', '550','yes');return false\">Tipos de Atendimento</a></li>
                <li><a href=\"servico/consulta.php\" onclick=\"abrir(this.href,'abrir1','1000', '550','yes');return false\">Disponibilidade Serv.</a></li>
                <li><a href=\"garantia/consulta.php\" onclick=\"abrir(this.href,'abrir1','1000', '550','yes');return false\">Termo de Garantia</a></li>
				
          </ul>
    </li>";
}
?>
        <li><a href="">Cadastro</a>
            <ul>
                <li><a href="cliente/consulta.php" onclick="abrir(this.href,'abrir1','1000', '550','yes');return false">Cliente</a></li>
                <li><a href="os/consulta.php" onclick="abrir(this.href,'abrir1','1000', '550','yes');return false">Cadastro O.S</a></li>
                <li><a href="ticket/index.php" onclick="abrir(this.href,'abrir1','1000', '550','yes');return false">Ticket</a></li>
            </ul>
        </li>
                  <!-- <li><a href="contrato/consulta.php" onclick="abrir(this.href,'abrir','700', '400','yes');return false">Contrato de Plano</a></li>-->        </li>
        <li><a href="login/sair.php">Sair</a></li>
  </ul>
    <br style="clear: left" />
</div>
