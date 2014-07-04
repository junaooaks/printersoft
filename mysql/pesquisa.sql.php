<?php
if (basename($_SERVER["PHP_SELF"]) == "pesquisa.sql.php") {
	die("Este arquivo nao pode ser acessado diretamente.");
}

			//Sentença sql (sem limit)
	

$nos= $_REQUEST['nos'];
$tecnico= $_REQUEST['tecnico'];
$status= $_REQUEST['status'];
$cliente= $_REQUEST['cliente'];
$apro= $_REQUEST['apro'];





		
	if (($nos=='')and($tecnico=='')and($status=='')and($cliente=='')and($apro=='')){			
			$consulta = $pdo->prepare("SELECT * FROM os, cliente, usuarios
									   WHERE os.codCliente = cliente.idCliente
						  			   AND os.codTecnico = usuarios.idUsuario
									   AND os.situacao = '0'");			  
			$consulta->execute();
				
 			while($row = $consulta->fetch())
        		{
		    		$nos	  = $row['idOs'];
					$cliente  = utf8_encode($row['pessoaJuridica']);
					$mesmo	  = utf8_encode($row['pessoaFisica']);
					$data	  = utf8_encode($row['data']);
					$login	  = utf8_encode($row['login']);
					$equi	  = utf8_encode($row['codEquipamento']);
					$marca	  = utf8_encode($row['codMarca']);
					$aten	  = utf8_encode($row['codAtendimento']);
					$sit	  = utf8_encode($row['situacao']);
					$modelo   = utf8_encode($row['modelo']);
					$cod	  = utf8_encode($row['idOs']);
					$id	  = $row['idCliente'];
					$pro	  = utf8_encode($row['aprovacao']);
					
					if ($pro=='s'){$pro="AUTORIZADO";} elseif ($pro=='n'){$pro = "NAO AUTORIZADO";}else{$pro='';}
					//limitar caracteres
					$cliente = substr($cliente,0,20);
					
					if ($sit=='0'){$sit ="ABERTO";}else{$sit="FECHADO";}
					
						  
					$filtro = array('equ'=>$equi);
					$con = $pdo->prepare("SELECT * FROM equipamento WHERE idEquipamento = :equ ");			  
					$con->execute($filtro);
					$equip = $con->fetch();
					$equip = utf8_encode($equip['descricao']);
					
					
					$fil = array('mar'=>$marca);
					$co = $pdo->prepare("SELECT * FROM marca WHERE idMarca = :mar ");			  
					$co->execute($fil);
					$mar = $co->fetch();
					$mar = utf8_encode($mar['descricao']);
					
					
					
					$fi = array('ate'=>$aten);
					$c = $pdo->prepare("SELECT * FROM atendimento WHERE idAtendimento = :ate ");			  
					$c->execute($fi);
					$ate = $c->fetch();
					$ate = utf8_encode($ate['descricao']);
					
					//cor das linha
					
					if ($class=='odd'){$class='even';}else{$class = 'odd';}	
					
					echo "
					<tr class='$class'>
            		<td>$nos</td>
            		<td>$cliente</td>            		
            		<td>$modelo</td>
					<td>$pro</td>
            		<td>$ate</td>
            		<td>$sit</td>
					
<td align='center'><a href='os/chat.php?codos=" . $cod . " & codcliente=".$id."' onclick=\"abrir(this.href,'abrir1','1000', '550','yes');return false\"><img src='imagem/chat.jpg' border=' 0'/></a></td>";		
					
					if($sit=='ABERTO'){
echo "<td align='center'><a href='os/index.php?codos=" . $cod . " & codcliente=".$id."' onclick=\"abrir(this.href,'abrir1','1000', '550','yes');return false\"><img src='imagem/botao_edit.png' border=' 0'/></a></td>";
					}else{ 
					echo "<td align='center'></td>";}
					
			echo "<td align='center'><a href='javascript:;' onClick='confirma($cod)'><img src='imagem/botao_drop.png' border='0' /></a></td>
					<td align='center'><a href='os/fechar.php?codos=" . $cod . " & codcliente=".$id."'onclick=\"abrir(this.href,'abrir1','1000', '550','yes');return false\"><img src='imagem/fechar.png' border=' 0'/></a></td>
					<td align='center'><a href='os/imprimir.php?codos=" . $cod . " & codcliente=".$id."' onclick=\"abrir(this.href,'abrir1','1000', '550','yes');return false\"><img src='imagem/impre.png' border=' 0'/></a></td>
         			</tr>
					";
					
				
				}
	exit();
	}else{


/************CONSULTA COM FILTRO******************/
				
//usar o explode e separa por barra
		$data = explode ('/',$data1);
		$dat = $data[2]."-".$data[1]."-".$data[0];

		//usar o explode e separa por barra
		$dat2 = explode ('/',$data2);
		$da = $dat2[2]."-".$dat2[1]."-".$dat2[0];
		
		if($dat == "--"){$dat = '';}
		if ($da == "--"){$da = '';}	
		
$fi = array('nos'=>"%".$nos."%", 'tec'=>"%".$tecnico."%", 'sit'=>"%".$status."%", 'cli'=>"%".$cliente."%", 'dat'=>$dat, 'da'=>$da, 'pro'=>"%".$apro."%");
$sql = $pdo->prepare("SELECT *
from os a
inner join cliente b on a.codCliente = b.idCliente
inner join usuarios c on a.codTecnico = c.idUsuario
inner join equipamento d on a.codEquipamento = d.idEquipamento
inner join marca e on a.codMarca = e.idMarca
inner join atendimento f on a.codAtendimento = f.idAtendimento
WHERE b.pessoaJuridica LIKE :cli  
AND a.idOs LIKE :nos
AND a.aprovacao LIKE :pro
AND a.codTecnico LIKE :tec
AND a.situacao LIKE :sit
OR a.data BETWEEN :dat AND :da
ORDER BY a.data DESC
");
        $sql->execute($fi);
		
				
 while($row = $sql->fetch())
        {
		    //$id		  = $row['idOs'];
			//$nome		  = $row['pessoaJuridica'];
		
		
		$nos	  = $row['idOs'];
					$cliente  = utf8_encode($row['pessoaJuridica']);
					$mesmo	  = utf8_encode($row['pessoaFisica']);
					$data	  = utf8_encode($row['data']);
					$login	  = utf8_encode($row['login']);
					$equi	  = utf8_encode($row['codEquipamento']);
					$marca	  = utf8_encode($row['codMarca']);
					$aten	  = utf8_encode($row['codAtendimento']);
					$sit	  = utf8_encode($row['situacao']);
					$modelo	  = utf8_encode($row['modelo']);
					$cod	  = utf8_encode($row['idOs']);
					$id	  = $row['idCliente'];
					$pro	  = utf8_encode($row['aprovacao']);
					
					if ($pro=='s'){$pro="AUTORIZADO";} elseif ($pro=='n'){$pro = "NAO AUTORIZADO";}else{$pro='';}
					
					//limitar caracteres
					$cliente = substr($cliente,0,20);
					if ($sit=='0'){$sit ="ABERTO";}else{$sit="FECHADO";}
					
						  
					$filtro = array('equ'=>$equi);
					$con = $pdo->prepare("SELECT * FROM equipamento WHERE idEquipamento = :equ ");			  
					$con->execute($filtro);
					$equip = $con->fetch();
					$equip = utf8_encode($equip['descricao']);
					
					
					$fil = array('mar'=>$marca);
					$co = $pdo->prepare("SELECT * FROM marca WHERE idMarca = :mar ");			  
					$co->execute($fil);
					$mar = $co->fetch();
					$mar = utf8_encode($mar['descricao']);
					
					
					
					$fi = array('ate'=>$aten);
					$c = $pdo->prepare("SELECT * FROM atendimento WHERE idAtendimento = :ate ");			  
					$c->execute($fi);
					$ate = $c->fetch();
					$ate = utf8_encode($ate['descricao']);
		
		
		
					if ($class=='odd'){$class='even';}else{$class = 'odd';}	
					echo "
					<tr class='$class'>
            		<td>$nos</td>
            		<td>$cliente</td>            		
            		<td>$modelo</td>
					<td>$pro</td>
            		<td>$ate</td>
            		<td>$sit</td>
					<td align='center'><a href='os/chat.php?codos=" . $cod . " & codcliente=".$id."'onclick=\"abrir(this.href,'abrir1','1000', '550','yes');return false\"><img src='imagem/chat.jpg' border=' 0'/></a></td>";
					
					if($sit=='ABERTO'){ 
					echo"<td align='center'><a href='os/index.php?codos=" . $cod . " & codcliente=".$id."'onclick=\"abrir(this.href,'abrir1','1000', '550','yes');return false\"><img src='imagem/botao_edit.png' border=' 0'/></a></td>";	
				   }else{
						echo "<td align='center'></td>";
						}
    			
				
					echo "<td align='center'><a href='javascript:;' onClick='confirma($cod)'><img src='imagem/botao_drop.png' border='0' /></a></td>
					<td align='center'><a href='os/fechar.php?codos=" . $cod . " & codcliente=".$id."'onclick=\"abrir(this.href,'abrir1','1000', '550','yes');return false\"><img src='imagem/fechar.png' border=' 0'/></a></td>";
					
					if($sit=='ABERTO'){ 
					echo "<td align='center'><a href='os/imprimir.php?codos=" . $cod . " & codcliente=".$id."' onclick=\"abrir(this.href,'abrir1','1000', '550','yes');return false\"><img src='imagem/impre.png' border=' 0'/></a></td>";}else {echo "<td align='center'><a href='os/imprimir_fechar.php?codos=" . $cod . " & codcliente=".$id."' onclick=\"abrir(this.href,'abrir1','1000', '450','yes');return false\"><img src='imagem/impre.png' border=' 0'/></a></td>";}
         		echo "	</tr>
					";
					
		}
		
	
}

?>
