<link rel="stylesheet" type="text/css" href="extjs/resources/css/ext-all.css"/>
<script type="text/javascript" src="extjs/adapter/ext/ext-base.js"></script>
<script type="text/javascript" src="extjs/ext-all.js"></script>

    <script type="text/javascript">
    function criarJanela(){
    	var form = new Ext.FormPanel({
    		items:[
    		// Primeiro campo
    		{
    			xtype: 'textfield', // Tipo de campo
    			fieldLabel: 'CNPJ' // Label (rótulo) do campo
    		},
    		// Segundo campo
    		{
    			xtype: 'textfield', // Tipo de campo
    			fieldLabel: 'Empresa',  // Label (rótulo) do campo
                        anchor: '90%'
                },{
                        xtype:'textfield',
                        fieldlabel: 'teste'
    		}]
    	})

    	var janela = new Ext.Window({ // Instancia de um novo objeto da classe Window
    		// Propriedades da janela
    		title      : 'SISGEW Mikrotik', // Título da janela
    		height     : 400,			   // Altura da janela
    		width      : 610,			   // Largura da janela
    		items: form, // Incluindo (formulario criado acima - form) na janela
    		// Rodapé da Janela (bbar) ficará os botões
    		tbar:[ // '->' indica que os botões ficaram no lado direito
    		{
    			text   : 'Salvar'
    		},'-',{ // Insere '|' para divisão entre os botões
    			text   : 'Cancelar'

    		}]
    	});

    	// Por enquanto a janela foi somente criada, agora é hora de exibi-la

    	// Vamos exibir a janela no evento onReady, ou seja, quando a página é carregada
    	Ext.onReady(function(){
    		janela.show(); // Exibindo a janela através do método show()
    	});
    }
	</script>