function send(action)
{
	switch(action) {
		case 'alterar':
			url = 'index.php';
			break;
		/*case 'excluir':
			url = 'excluir.php';
			break;
			*/
	}

	document.forms[0].action = url;
	document.forms[0].submit();
}