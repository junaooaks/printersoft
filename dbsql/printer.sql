--
-- Banco de Dados: `printer`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `acessorio`
--

CREATE TABLE IF NOT EXISTS `acessorio` (
  `idAcessorio` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`idAcessorio`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=44 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `atendimento`
--

CREATE TABLE IF NOT EXISTS `atendimento` (
  `idAtendimento` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(50) NOT NULL,
  PRIMARY KEY (`idAtendimento`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `bate_papo`
--

CREATE TABLE IF NOT EXISTS `bate_papo` (
  `id_bate` int(11) NOT NULL AUTO_INCREMENT,
  `id_tic` int(11) NOT NULL,
  `usuario` varchar(50) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `mensagem` text NOT NULL,
  `data` datetime NOT NULL,
  PRIMARY KEY (`id_bate`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1256 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
  `idCliente` int(11) NOT NULL AUTO_INCREMENT,
  `pessoaJuridica` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `pessoaFisica` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `cpf` char(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `cnpj` char(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `endereco` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `entrega` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `bairro` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `cidade` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `estado` char(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `cep` char(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `telComercial` char(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `telResidencial` char(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `celular` char(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `adicionais` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  PRIMARY KEY (`idCliente`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1982 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresa`
--

CREATE TABLE IF NOT EXISTS `empresa` (
  `idEmpresa` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(150) DEFAULT NULL,
  `cnpj` char(18) DEFAULT NULL,
  `endereco` varchar(200) DEFAULT NULL,
  `numero` char(10) DEFAULT NULL,
  `cidade` varchar(100) DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL,
  `cep` char(20) NOT NULL,
  `telefone` char(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idEmpresa`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `equipamento`
--

CREATE TABLE IF NOT EXISTS `equipamento` (
  `idEquipamento` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(50) NOT NULL,
  PRIMARY KEY (`idEquipamento`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `garantia`
--

CREATE TABLE IF NOT EXISTS `garantia` (
  `idGarantia` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(50) NOT NULL,
  PRIMARY KEY (`idGarantia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `laudo`
--

CREATE TABLE IF NOT EXISTS `laudo` (
  `idLaudo` int(11) NOT NULL AUTO_INCREMENT,
  `codOs` int(11) NOT NULL,
  `codCliente` int(11) NOT NULL,
  `valor` char(20) COLLATE utf8_unicode_ci NOT NULL,
  `prazo` char(50) COLLATE utf8_unicode_ci NOT NULL,
  `disponibilidade` char(50) COLLATE utf8_unicode_ci NOT NULL,
  `laudo` text COLLATE utf8_unicode_ci NOT NULL,
  `hora` char(20) COLLATE utf8_unicode_ci NOT NULL,
  `status` char(20) COLLATE utf8_unicode_ci NOT NULL,
  `autorizado` char(5) COLLATE utf8_unicode_ci NOT NULL,
  `obs` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`idLaudo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=948 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `marca`
--

CREATE TABLE IF NOT EXISTS `marca` (
  `idMarca` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(50) NOT NULL,
  PRIMARY KEY (`idMarca`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=41 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `os`
--

CREATE TABLE IF NOT EXISTS `os` (
  `idOs` int(11) NOT NULL AUTO_INCREMENT,
  `codCliente` int(11) NOT NULL,
  `protocolo` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `data` date NOT NULL,
  `codEquipamento` int(11) NOT NULL,
  `codMarca` int(11) NOT NULL,
  `codAtendimento` int(11) NOT NULL,
  `codAcessorio` int(11) NOT NULL,
  `codTecnico` int(11) NOT NULL,
  `codStatus` int(11) NOT NULL,
  `previsao` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `modelo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `patrimonio` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `serie` char(50) COLLATE utf8_unicode_ci NOT NULL,
  `setor` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `diagnostico` text COLLATE utf8_unicode_ci NOT NULL,
  `situacao` char(5) COLLATE utf8_unicode_ci NOT NULL,
  `aprovacao` char(5) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`idOs`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2869 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pecas`
--

CREATE TABLE IF NOT EXISTS `pecas` (
  `idPeca` int(11) NOT NULL AUTO_INCREMENT,
  `codOs` int(11) NOT NULL,
  `codProduto` int(11) NOT NULL,
  `valor` char(50) COLLATE utf8_unicode_ci NOT NULL,
  `garantia` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`idPeca`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2724 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE IF NOT EXISTS `produto` (
  `idGrupo` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`idGrupo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=482 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `servico`
--

CREATE TABLE IF NOT EXISTS `servico` (
  `idServico` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(50) NOT NULL,
  PRIMARY KEY (`idServico`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `status`
--

CREATE TABLE IF NOT EXISTS `status` (
  `idStatus` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(200) NOT NULL,
  PRIMARY KEY (`idStatus`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ticket`
--

CREATE TABLE IF NOT EXISTS `ticket` (
  `id_ticket` int(11) NOT NULL AUTO_INCREMENT,
  `id_cliente` int(11) NOT NULL,
  `departamento` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `prioridade` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `titulo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `mensagem` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `data` datetime NOT NULL,
  `laudo` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `data_laudo` datetime NOT NULL,
  `data_previsao` char(30) COLLATE utf8_unicode_ci NOT NULL,
  `funcionario` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email_enviado` char(20) COLLATE utf8_unicode_ci NOT NULL,
  `usuario` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_ticket`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1126 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `idUsuario` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) NOT NULL,
  `login` varchar(20) NOT NULL,
  `senha` char(32) NOT NULL,
  `mail` varchar(150) NOT NULL,
  `nivel_acesso` enum('0','1','2','3') DEFAULT '0',
  `telefone` char(20) NOT NULL,
  `celular` char(20) NOT NULL,
  `complementar` varchar(200) NOT NULL,
  PRIMARY KEY (`idUsuario`),
  UNIQUE KEY `login` (`login`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

