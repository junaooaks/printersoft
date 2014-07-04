<?php
if ($codCliente ==''){$codCliente = $cliente;}
$filtro = array('clicli'=>$codCliente);
		$sele = $pdo->prepare("SELECT pessoaJuridica, pessoaFisica, email, idOs FROM cliente, os WHERE idCliente = :clicli AND os.codCliente = :clicli");
		$sele->execute($filtro);
		
		while($row = $sele->fetch())
        {
		    $jur		        = $row['pessoaJuridica'];
			$fis				= $row['pessoaFisica'];
			$email				= $row['email'];
			$cod			= $row['idOs'];
			
	//echo $cod;		
	
		}
if (!empty($email)){

//echo $email;
// Passando os dados obtidos pelo formulÃ¡rio para as variÃ¡veis abaixo
if(!empty($jur)){$nome = $jur;}else{$nome = $fis;}
$nomeremetente     = 'NACIONAL PRINTER';
$emailremetente    = 'contato@nacionalprinter.com.br';
$emaildestinatario = $email;

$assunto          = 'NACIONAL PRINTER acompanhamento de servicos';

$mensagem          = 'A Printer Copiadoras em parceria com Nacional Printer informa que foi solicitado o servicos em seu equipamento,  foi atualizado em nosso banco de dados uma nova alteracao. Enviamos o link para acompanhamento dos servicos, podendo ser autorizado a conclusão do mesmo.
Acesse o endereco  (http://http://www.nacionalprinter.com.br) com o numero da ordem de servico e o numero do CPF ou CNPJ utilizado na abertura do cadastro.
';
 
 
/* Montando a mensagem a ser enviada no corpo do e-mail. */
$mensagemHTML = '<P>FORMULARIO PREENCHIDO no sistema NACIONAL PRINTER</P>
<p><b>Nome:</b> '.$nomeremetente.'
<p><b>E-Mail:</b> '.$emailremetente.'
<p><b>Número O.S:</b> '.$cod.'
<p><b>Assunto:</b> '.$assunto.'
<p><b>Mensagem:</b> '.$mensagem.'</p>
<hr>';


// O return-path deve ser o mesmo e-mail do remetente.
$headers = "MIME-Version: 1.1\r\n";
$headers .= "Content-type: text/html; charset=utf-8\r\n";
$headers .= "From: $emailremetente\r\n";
$headers .= "Return-Path: $emailremetente  \r\n";

mail($emaildestinatario, $assunto, $mensagemHTML, $headers); 

}

?>
