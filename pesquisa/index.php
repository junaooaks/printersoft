<?php
//require "login/verifica.php";

include ("mysql/conexao_mysql.php");

?>



<form action="<?php echo  $_SERVER['PHP_SELF']; ?>" method="post" name="form" target="">
  <table border="0" align="center" cellpadding="0" cellspacing="5">
    <tr> 
      <td height="66" colspan="11">&nbsp;</td>
    </tr>
    <tr> 
      <td>N&deg; O.s:</td>
      <td>
        <input name="nos" type="text" id="nos" size="5">
      </font></td>
      <td>T&eacute;cnico:</td>
      <td><select name="tecnico" id="tecnico">
        <option value="" selected></option>
        <?php
			 	
				  $consulta = $pdo->prepare("SELECT * FROM usuarios");
				  $consulta->execute();
                  while($linha = $consulta->fetch())
					{
					$idg   = $linha['idUsuario'];
					$grupo = $linha['login'];
					
					if ($codtec==$idg){
						echo "<option value='$idg' selected>".htmlentities($grupo)."</option>";
					}else{
					echo "<option value='$idg'>".htmlentities($grupo)."</option>";
					}
					}
              
			  ?>
      </select></td>
      <td>Situa&ccedil;&atilde;o:</td>
      <td colspan=""><select name="status" id="select8" >
        <option value=""></option>
        <option value="0" <?php if ($status =='ABERTO') {echo "selected";} ?>>ABERTO</option>
        <option value="1" <?php if ($status =='FECHADO') {echo "selected";} ?>>FECHADO</option>
      </select>
      <td>&nbsp;</td>
      <td></tr>
    <tr> 
      <td colspan="8">Empresa/Cliente
        <input name="cliente" type="text" id="cliente" size="40" >
      </font>Aprova&ccedil;&atilde;o
      <label for="aprox"></label>
      <select name="apro">
        <option value=""></option>
        <option value="s" <?php if ($pro =='s') {echo "selected";} ?>>AUTORIZADO</option>
        <option value="n" <?php if ($pro =='n') {echo "selected";} ?>>NAO AUTORIZADO</option>
    </select></td>
    </tr>	
    <tr> 
      <td colspan="3"> <div align="left"></div></td>
      <td colspan="5">&nbsp;</td>
    </tr>
    <tr> 
      <td colspan="8"><div align="center"> 
          <input name="pes" type="hidden" id="pes" value="1" />
          <input name="buscar" type="image" id="buscar5" value="Enviar" src="pesquisa/botao/buscar.gif" alt="Enviar!" border="0" >
        </div></td>
    </tr>
  </table>
  </td>
    </tr>
    <tr> 
      <td colspan="11">
      
      
      <table align="center">
      <thead>
      <tr>
    <th id="th1">O.S:</th>
    <th id="th2">EMPRESA/CLIENTE</th>
    <th id="th3">MODELO</th>
    <th id="th4">APROVA&Ccedil;&Atilde;O</th>
    <th id="th5">ATENDIMENTO</th>
    <th id="th6">SITUA&Ccedil;&Atilde;O</th>
    <th id="th7">CHAT</th>
    <th id="th7">ALTERAR</th>
    <th id="th7">EXCLUIR</th>
    <th id="th7">FECHAR O.S</th>
    <th id="th7">IMPRIMIR</th>
    
      </tr>
    </thead>
          <?php
		include("mysql/pesquisa.sql.php");
		?>
        </table>
        <p></p>
  </table>
</form>
