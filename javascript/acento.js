//FUN��O SEM ACENTO
function sem_acento(e,args)
{               
        if (document.all){var evt=event.keyCode;} // caso seja IE
        else{var evt = e.charCode;}     // do contr�rio deve ser Mozilla
        var valid_chars = '0123456789abcdefghijlmnopqrstuvxzwykABCDEFGHIJLMNOPQRSTUVXZWYK-_'+args;      // criando a lista de teclas permitidas
        if (valid_chars.indexOf(chr)>-1 ){return true;} // se a tecla estiver na lista de permiss�o permite-a
	 // para permitir teclas como <BACKSPACE> adicionamos uma permiss�o para 
        // c�digos de tecla menores que 09 por exemplo (geralmente uso menores que 20)
        if (valid_chars.indexOf(chr)>-1 || evt < 9){return true;}       // se a tecla estiver na lista de permiss�o permite-a
        VK_BACK � 08 � Tecla BACKSPACE 
	return false;   // do contr�rio nega
}