-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 13-Set-2021 às 03:50
-- Versão do servidor: 10.1.30-MariaDB
-- PHP Version: 7.0.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `osw`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

CREATE TABLE `categorias` (
  `categoria_id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `ativa` tinyint(1) DEFAULT NULL,
  `categoria_data_alteracao` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`categoria_id`, `nome`, `ativa`, `categoria_data_alteracao`) VALUES
(1, 'Games 12', 1, '2020-11-18 01:06:33'),
(3, 'PC', 1, '2020-11-20 10:14:40'),
(4, 'Hackintish', 1, '2020-11-18 01:07:56'),
(5, 'Apple', 1, '2021-09-03 20:07:47'),
(6, 'Produtos', 1, '2021-09-10 12:12:05'),
(7, 'PC GAMMER', 1, '2021-09-12 18:48:26');

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `cliente_id` int(11) NOT NULL,
  `cliente_data_cadastro` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `cliente_tipo` tinyint(1) DEFAULT NULL,
  `cliente_nome` varchar(45) NOT NULL,
  `cliente_data_nascimento` date NOT NULL,
  `cliente_cpf_cnpj` varchar(20) NOT NULL,
  `cliente_rg_ie` varchar(20) NOT NULL,
  `cliente_email` varchar(50) NOT NULL,
  `cliente_telefone` varchar(20) NOT NULL,
  `cliente_celular` varchar(20) NOT NULL,
  `cliente_cep` varchar(10) NOT NULL,
  `cliente_endereco` varchar(155) NOT NULL,
  `cliente_numero_endereco` varchar(20) NOT NULL,
  `cliente_bairro` varchar(45) NOT NULL,
  `cliente_complemento` varchar(145) NOT NULL,
  `cliente_cidade` varchar(105) NOT NULL,
  `cliente_estado` varchar(2) NOT NULL,
  `cliente_ativo` tinyint(1) NOT NULL,
  `cliente_obs` tinytext,
  `cliente_data_alteracao` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`cliente_id`, `cliente_data_cadastro`, `cliente_tipo`, `cliente_nome`, `cliente_data_nascimento`, `cliente_cpf_cnpj`, `cliente_rg_ie`, `cliente_email`, `cliente_telefone`, `cliente_celular`, `cliente_cep`, `cliente_endereco`, `cliente_numero_endereco`, `cliente_bairro`, `cliente_complemento`, `cliente_cidade`, `cliente_estado`, `cliente_ativo`, `cliente_obs`, `cliente_data_alteracao`) VALUES
(1, '2020-11-07 10:43:40', 1, 'Claudio Morking', '1978-06-05', '024.760.759-22', '6.980.487-0 SSP-PR', 'ckingssss@ckingsistemas.com.br', '(41) 3578-2525', '(41) 99651-1627', '81150-330', 'Rua Leonardo Pianowski', '745', 'Pinheirinho', 'Casa 03  - Fundos', 'Curitiba', 'PR', 1, 'cadastro do mestre!!!!', '2020-11-21 21:18:52'),
(2, '2020-11-09 17:41:26', 2, 'Cking - SIstemas', '2020-11-09', '73.734.454/0001-60', '446.56507-91', 'ckings@ckingsistemas.com.br', '(55) 5555-5555', '(44) 44444-4444', '80.060-110', 'Rua da Programacao', '171', 'Centro', 'Ap 171', 'Curitiba', 'PR', 1, 'CLiente Pj Teste', '2020-11-11 22:00:49'),
(3, '2021-09-03 19:21:26', 1, 'The House', '2021-09-03', '032.383.270-97', '9.968.985-87', 'rafaebnbne@sjpinfo.com.brb', '(41) 3578-2525', '(41) 99999-9999', '81.150-330', 'Rua Leonardo Pianowski', '745', 'Pinheirinho', 'Casa 03  - Fundos', 'Curitiba', 'PI', 1, 'teste', '2021-09-03 19:21:43');

-- --------------------------------------------------------

--
-- Estrutura da tabela `contas_pagar`
--

CREATE TABLE `contas_pagar` (
  `conta_pagar_id` int(11) NOT NULL,
  `conta_pagar_fornecedor_id` int(11) DEFAULT NULL,
  `conta_pagar_data_vencimento` date DEFAULT NULL,
  `conta_pagar_data_pagamento` datetime DEFAULT NULL,
  `conta_pagar_nome` varchar(200) NOT NULL,
  `conta_pagar_valor` varchar(15) DEFAULT NULL,
  `conta_pagar_status` tinyint(1) DEFAULT NULL,
  `conta_pagar_obs` tinytext,
  `conta_pagar_data_alteracao` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='		';

--
-- Extraindo dados da tabela `contas_pagar`
--

INSERT INTO `contas_pagar` (`conta_pagar_id`, `conta_pagar_fornecedor_id`, `conta_pagar_data_vencimento`, `conta_pagar_data_pagamento`, `conta_pagar_nome`, `conta_pagar_valor`, `conta_pagar_status`, `conta_pagar_obs`, `conta_pagar_data_alteracao`) VALUES
(6, 1, '2020-11-26', '2020-11-21 10:22:07', 'sistemas da emrpesa', '2,500.00', 1, '', '2020-11-21 12:07:22'),
(7, 1, '2020-11-21', '2021-09-03 15:14:52', 'Hospedagem Host', '25.00', 1, '', '2021-09-03 18:52:14');

-- --------------------------------------------------------

--
-- Estrutura da tabela `contas_receber`
--

CREATE TABLE `contas_receber` (
  `conta_receber_id` int(11) NOT NULL,
  `conta_receber_cliente_id` int(11) NOT NULL,
  `conta_receber_data_vencimento` date DEFAULT NULL,
  `conta_receber_data_pagamento` datetime DEFAULT NULL,
  `conta_receber_nome` varchar(255) NOT NULL,
  `conta_receber_valor` varchar(20) DEFAULT NULL,
  `conta_receber_status` tinyint(1) DEFAULT NULL,
  `conta_receber_obs` tinytext,
  `conta_receber_data_alteracao` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `contas_receber`
--

INSERT INTO `contas_receber` (`conta_receber_id`, `conta_receber_cliente_id`, `conta_receber_data_vencimento`, `conta_receber_data_pagamento`, `conta_receber_nome`, `conta_receber_valor`, `conta_receber_status`, `conta_receber_obs`, `conta_receber_data_alteracao`) VALUES
(2, 2, '2020-11-21', '2020-11-22 10:09:20', 'sites', '350.00', 1, '', '2020-11-22 12:20:09'),
(3, 1, '2021-02-28', '2021-09-03 15:40:53', 'consultoria', '56.00', 1, '', '2021-09-03 18:53:40'),
(4, 1, '2020-11-21', '2021-09-03 15:50:53', 'consultoria contabeis', '10,500.00', 1, 'rwarw', '2021-09-03 18:53:50');

-- --------------------------------------------------------

--
-- Estrutura da tabela `formas_pagamentos`
--

CREATE TABLE `formas_pagamentos` (
  `forma_pagamento_id` int(11) NOT NULL,
  `forma_pagamento_nome` varchar(45) DEFAULT NULL,
  `forma_pagamento_aceita_parc` tinyint(1) DEFAULT NULL,
  `forma_pagamento_ativa` tinyint(1) DEFAULT NULL,
  `forma_pagamento_data_alteracao` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `formas_pagamentos`
--

INSERT INTO `formas_pagamentos` (`forma_pagamento_id`, `forma_pagamento_nome`, `forma_pagamento_aceita_parc`, `forma_pagamento_ativa`, `forma_pagamento_data_alteracao`) VALUES
(1, 'Cartão de crédito', 1, 1, '2020-11-22 14:41:54'),
(2, 'Dinheiro', 0, 1, '2020-01-30 00:43:54'),
(3, 'Boleto bancário', 1, 1, '2020-11-22 14:41:44'),
(4, 'Cartão de crédito - Visa', 1, 1, '2020-11-24 18:26:03'),
(5, 'PIX', 0, 1, '2021-09-03 20:08:30');

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedores`
--

CREATE TABLE `fornecedores` (
  `fornecedor_id` int(11) NOT NULL,
  `fornecedor_data_cadastro` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `fornecedor_tipo` tinyint(1) DEFAULT NULL,
  `fornecedor_razao` varchar(150) NOT NULL,
  `fornecedor_nome` varchar(150) NOT NULL,
  `fornecedor_contato` varchar(50) NOT NULL,
  `fornecedor_cpf_cnpj` varchar(20) NOT NULL,
  `fornecedor_rg_ie` varchar(20) NOT NULL,
  `fornecedor_email` varchar(50) NOT NULL,
  `fornecedor_telefone` varchar(20) NOT NULL,
  `fornecedor_celular` varchar(20) NOT NULL,
  `fornecedor_cep` varchar(10) NOT NULL,
  `fornecedor_endereco` varchar(155) NOT NULL,
  `fornecedor_numero_endereco` varchar(20) NOT NULL,
  `fornecedor_bairro` varchar(45) NOT NULL,
  `fornecedor_complemento` varchar(145) NOT NULL,
  `fornecedor_cidade` varchar(105) NOT NULL,
  `fornecedor_estado` varchar(2) NOT NULL,
  `fornecedor_ativo` tinyint(1) NOT NULL,
  `fornecedor_obs` tinytext,
  `fornecedor_data_alteracao` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `fornecedores`
--

INSERT INTO `fornecedores` (`fornecedor_id`, `fornecedor_data_cadastro`, `fornecedor_tipo`, `fornecedor_razao`, `fornecedor_nome`, `fornecedor_contato`, `fornecedor_cpf_cnpj`, `fornecedor_rg_ie`, `fornecedor_email`, `fornecedor_telefone`, `fornecedor_celular`, `fornecedor_cep`, `fornecedor_endereco`, `fornecedor_numero_endereco`, `fornecedor_bairro`, `fornecedor_complemento`, `fornecedor_cidade`, `fornecedor_estado`, `fornecedor_ativo`, `fornecedor_obs`, `fornecedor_data_alteracao`) VALUES
(1, '2020-11-11 21:44:59', 1, 'SJP INFO', 'Sjp Info', 'CLAUDIO OU ELIANA', '024.760.759-22', '314.76748-99', 'rafaee@sjpinfo.com.br', '4135782525', '41 9999-9999', '82.560.120', 'Rua Araripe Júnior', '343', 'Centro', 'casa sfdgdf', 'Curitiba', 'PR', 1, 'JKJKJ', '2020-11-19 14:48:56');

-- --------------------------------------------------------

--
-- Estrutura da tabela `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'vendedor', 'Vendedor\r\n');

-- --------------------------------------------------------

--
-- Estrutura da tabela `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `marcas`
--

CREATE TABLE `marcas` (
  `marca_id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `ativa` tinyint(1) DEFAULT NULL,
  `data_alteracao` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `marcas`
--

INSERT INTO `marcas` (`marca_id`, `nome`, `ativa`, `data_alteracao`) VALUES
(1, 'Hp', 1, '2020-01-28 21:14:31'),
(5, 'Sony', 1, '0000-00-00 00:00:00'),
(6, 'Apple', 1, '0000-00-00 00:00:00'),
(7, 'The House', 1, '0000-00-00 00:00:00'),
(8, 'LeNovo', 0, '0000-00-00 00:00:00'),
(9, 'Produtos', 1, '0000-00-00 00:00:00'),
(10, 'PG GAMMER', 1, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ordem_tem_servicos`
--

CREATE TABLE `ordem_tem_servicos` (
  `ordem_ts_id` int(11) NOT NULL,
  `ordem_ts_id_servico` int(11) DEFAULT NULL,
  `ordem_ts_id_ordem_servico` int(11) DEFAULT NULL,
  `ordem_ts_quantidade` int(11) DEFAULT NULL,
  `ordem_ts_valor_unitario` varchar(45) DEFAULT NULL,
  `ordem_ts_valor_desconto` varchar(45) DEFAULT NULL,
  `ordem_ts_valor_total` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabela de relacionamento entre as tabelas servicos e ordem_servico';

--
-- Extraindo dados da tabela `ordem_tem_servicos`
--

INSERT INTO `ordem_tem_servicos` (`ordem_ts_id`, `ordem_ts_id_servico`, `ordem_ts_id_ordem_servico`, `ordem_ts_quantidade`, `ordem_ts_valor_unitario`, `ordem_ts_valor_desconto`, `ordem_ts_valor_total`) VALUES
(1, 1, 1, 1, '80.00', '0', '80.00'),
(15, 2, 2, 4, ' 80.00', '0 ', ' 320.00'),
(70, 2, 3, 100, ' 80.00', '0 ', ' 8000.00'),
(71, 4, 3, 25, ' 150.00', '0 ', ' 3750.00'),
(72, 5, 3, 10, ' 1500.00', '0 ', ' 15000.00'),
(93, 4, 5, 11, ' 150.00', '0 ', ' 1650.00'),
(94, 5, 5, 1, ' 1500.00', '0 ', ' 1500.00'),
(103, 2, 7, 1, ' 80.00', '0 ', ' 80.00'),
(104, 2, 8, 10, ' 80.00', '0 ', ' 800.00'),
(114, 2, 9, 10, ' 80.00', '0 ', ' 800.00'),
(118, 2, 6, 2, ' 80.00', '0 ', ' 160.00'),
(125, 3, 10, 10, ' 120.00', '0 ', ' 1200.00'),
(134, 4, 11, 10, ' 150.00', '0 ', ' 1500.00'),
(135, 3, 4, 10, ' 120.00', '0 ', ' 1200.00'),
(136, 5, 4, 10, ' 1500.00', '0 ', ' 15000.00'),
(137, 4, 4, 10, ' 150.00', '0 ', ' 1500.00'),
(140, 4, 12, 10, ' 150.00', '0 ', ' 1500.00'),
(141, 3, 13, 10, ' 120.00', '0 ', ' 1200.00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ordens_servicos`
--

CREATE TABLE `ordens_servicos` (
  `ordem_servico_id` int(11) NOT NULL,
  `ordem_servico_forma_pagamento_id` int(11) DEFAULT NULL,
  `ordem_servico_cliente_id` int(11) DEFAULT NULL,
  `ordem_servico_data_emissao` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `ordem_servico_data_conclusao` varchar(100) DEFAULT NULL,
  `ordem_servico_equipamento` varchar(80) DEFAULT NULL,
  `ordem_servico_marca_equipamento` varchar(80) DEFAULT NULL,
  `ordem_servico_modelo_equipamento` varchar(80) DEFAULT NULL,
  `ordem_servico_acessorios` tinytext,
  `ordem_servico_defeito` tinytext,
  `ordem_servico_valor_desconto` varchar(25) DEFAULT NULL,
  `ordem_servico_valor_total` varchar(25) DEFAULT NULL,
  `ordem_servico_status` tinyint(1) DEFAULT NULL,
  `ordem_servico_obs` tinytext,
  `ordem_servico_data_alteracao` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `ordens_servicos`
--

INSERT INTO `ordens_servicos` (`ordem_servico_id`, `ordem_servico_forma_pagamento_id`, `ordem_servico_cliente_id`, `ordem_servico_data_emissao`, `ordem_servico_data_conclusao`, `ordem_servico_equipamento`, `ordem_servico_marca_equipamento`, `ordem_servico_modelo_equipamento`, `ordem_servico_acessorios`, `ordem_servico_defeito`, `ordem_servico_valor_desconto`, `ordem_servico_valor_total`, `ordem_servico_status`, `ordem_servico_obs`, `ordem_servico_data_alteracao`) VALUES
(4, 5, 1, '2021-09-07 19:15:29', NULL, 'Notebook Sony', 'Sony', 'Sony Vaio', 'Mouse e carregador e caixa', 'nao liga', 'R$ 0.00', '17,700.00', 0, '', '2021-09-07 19:28:43'),
(5, NULL, 3, '2021-09-07 19:51:45', NULL, 'Notebook Sony teste', 'Sony', 'Sony Vaio', 'Mouse e carregador e caixa', 'teste', 'R$ 0.00', '3,150.00', 0, 'cliente autorizou', '2021-09-07 19:58:10'),
(6, NULL, 3, '2021-09-08 04:05:57', NULL, 'Notebook Sony teste', 'Sony', 'Sony Vaio', 'Mouse e carregador e caixa', 'n liga', 'R$ 0.00', '160.00', 0, '', NULL),
(7, NULL, 3, '2021-09-09 00:17:12', NULL, 'Notebook Sony teste', 'Sony', 'Sony Vaio', 'Mouse e carregador e caixa', 'teste', 'R$ 0.00', '80.00', 0, '', NULL),
(8, NULL, 3, '2021-09-09 00:18:10', NULL, 'Notebook Sony teste', 'Sony', 'Sony Vaio', 'Mouse e carregador e caixa', 'teste', 'R$ 0.00', '800.00', 0, '', NULL),
(9, NULL, 3, '2021-09-09 00:18:11', NULL, 'Notebook Sony teste', 'Sony', 'Sony Vaio', 'Mouse e carregador e caixa', 'teste', 'R$ 0.00', '800.00', 0, '', NULL),
(10, NULL, 3, '2021-09-09 21:19:02', NULL, 'Notebook Sony teste', 'Sony', 'Sony Vaio', 'Mouse e carregador e caixa', 'teste', 'R$ 0.00', '1,200.00', 0, 'teste', '2021-09-09 21:25:35'),
(11, NULL, 1, '2021-09-09 21:26:44', NULL, 'Notebook Sony teste', 'Sony', 'Sony Vaio', 'Mouse e carregador e caixa', 'teste', 'R$ 0.00', '1,500.00', 0, '', NULL),
(12, NULL, 2, '2021-09-10 11:12:49', NULL, 'Notebook Sony teste', 'Sony', 'Sony Vaio', 'Mouse e carregador e caixa', 'adsds', 'R$ 0.00', '1,500.00', 0, '', NULL),
(13, NULL, 3, '2021-09-12 18:37:56', NULL, 'Notebook Sony teste', 'Sony', 'Sony Vaio', 'Mouse e carregador e caixa', 'TESTE', 'R$ 0.00', '1,200.00', 0, '', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `produto_id` int(11) NOT NULL,
  `produto_codigo` varchar(45) DEFAULT NULL,
  `produto_data_cadastro` datetime DEFAULT NULL,
  `produto_categoria_id` int(11) NOT NULL,
  `produto_marca_id` int(11) NOT NULL,
  `produto_fornecedor_id` int(11) NOT NULL,
  `produto_descricao` varchar(145) DEFAULT NULL,
  `produto_unidade` varchar(25) DEFAULT NULL,
  `produto_preco_custo` varchar(45) DEFAULT NULL,
  `produto_preco_venda` varchar(45) DEFAULT NULL,
  `produto_estoque_minimo` varchar(10) DEFAULT NULL,
  `produto_qtde_estoque` varchar(10) DEFAULT NULL,
  `produto_ativo` tinyint(1) DEFAULT NULL,
  `produto_obs` tinytext,
  `produto_data_alteracao` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`produto_id`, `produto_codigo`, `produto_data_cadastro`, `produto_categoria_id`, `produto_marca_id`, `produto_fornecedor_id`, `produto_descricao`, `produto_unidade`, `produto_preco_custo`, `produto_preco_venda`, `produto_estoque_minimo`, `produto_qtde_estoque`, `produto_ativo`, `produto_obs`, `produto_data_alteracao`) VALUES
(2, '50412637', NULL, 1, 1, 1, 'Fone de ouvido gamer', 'UN', '112,00', '150,00', '5', '10', 1, '', '2021-09-12 21:37:21'),
(12, '53296801', NULL, 1, 1, 1, 'Mac Book 12', 'UNIDADE', '2.000,00', '5.000,00', '5', '10', 1, '', '2021-09-12 23:45:17');

-- --------------------------------------------------------

--
-- Estrutura da tabela `servicos`
--

CREATE TABLE `servicos` (
  `servico_id` int(11) NOT NULL,
  `servico_nome` varchar(145) DEFAULT NULL,
  `servico_preco` varchar(15) DEFAULT NULL,
  `servico_descricao` tinytext,
  `servico_ativo` tinyint(1) DEFAULT NULL,
  `servico_data_alteracao` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `servicos`
--

INSERT INTO `servicos` (`servico_id`, `servico_nome`, `servico_preco`, `servico_descricao`, `servico_ativo`, `servico_data_alteracao`) VALUES
(1, 'Limpeza geral', '50,00', 'Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos, e vem sendo utilizado desde o século XVI, quando um impressor desconhecido pegou uma bandeja de tipos e os embaralhou para fazer um livro de modelos de tipos. Lorem', 1, '2020-02-22 01:22:20'),
(2, 'Solda elétrica', '80,00', 'Solda elétrica', 1, '2020-02-13 22:10:21'),
(3, 'Restauração de componentes', '120,00', 'Restauração de componentes', 1, '2020-02-13 22:11:29'),
(4, 'Reparo de HD', '150,00', 'Reparo de HD', 1, '2021-09-06 22:45:22');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sistema`
--

CREATE TABLE `sistema` (
  `sistema_id` int(11) NOT NULL,
  `sistema_razao_social` varchar(145) DEFAULT NULL,
  `sistema_nome_fantasia` varchar(145) DEFAULT NULL,
  `sistema_cnpj` varchar(25) DEFAULT NULL,
  `sistema_ie` varchar(25) DEFAULT NULL,
  `sistema_telefone_fixo` varchar(25) DEFAULT NULL,
  `sistema_telefone_movel` varchar(25) NOT NULL,
  `sistema_email` varchar(100) DEFAULT NULL,
  `sistema_site_url` varchar(100) DEFAULT NULL,
  `sistema_cep` varchar(25) DEFAULT NULL,
  `sistema_endereco` varchar(145) DEFAULT NULL,
  `sistema_numero` varchar(25) DEFAULT NULL,
  `sistema_cidade` varchar(45) DEFAULT NULL,
  `sistema_estado` varchar(2) DEFAULT NULL,
  `sistema_txt_ordem_servico` tinytext,
  `sistema_data_alteracao` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `sistema`
--

INSERT INTO `sistema` (`sistema_id`, `sistema_razao_social`, `sistema_nome_fantasia`, `sistema_cnpj`, `sistema_ie`, `sistema_telefone_fixo`, `sistema_telefone_movel`, `sistema_email`, `sistema_site_url`, `sistema_cep`, `sistema_endereco`, `sistema_numero`, `sistema_cidade`, `sistema_estado`, `sistema_txt_ordem_servico`, `sistema_data_alteracao`) VALUES
(1, 'C-KING SISTEMAS ', 'OSW - CKING', '47.319.849/0001-96', '26235232', '(41) 3333-3333', '(41) 99999-9999', 'contato@cmorking.com.br', 'https://cmorking.com.br/', '81.150-330', 'Rua Leonardo Pianowski', '475  Casa 03 ', 'Curitiba', 'PR', 'Texto venda da OS e Orçamentos\r\n', '2021-09-07 12:15:16');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(254) NOT NULL,
  `activation_selector` varchar(255) DEFAULT NULL,
  `activation_code` varchar(255) DEFAULT NULL,
  `forgotten_password_selector` varchar(255) DEFAULT NULL,
  `forgotten_password_code` varchar(255) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_selector` varchar(255) DEFAULT NULL,
  `remember_code` varchar(255) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `email`, `activation_selector`, `activation_code`, `forgotten_password_selector`, `forgotten_password_code`, `forgotten_password_time`, `remember_selector`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'cking', '$2y$12$kp/0/pD65r9kFsNotpdLQeeMP.4Zi73vr2uowpeVZ9ph3rPLyPFaW', 'cmorking@gmail.com', NULL, '', NULL, NULL, NULL, NULL, NULL, 1268889823, 1631463755, 1, 'CLAUDIO', 'MORKING', 'ADMIN', '0');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(6, 1, 1),
(13, 5, 2),
(14, 6, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendas`
--

CREATE TABLE `vendas` (
  `venda_id` int(11) NOT NULL,
  `venda_cliente_id` int(11) DEFAULT NULL,
  `venda_forma_pagamento_id` int(11) DEFAULT NULL,
  `venda_vendedor_id` int(11) DEFAULT NULL,
  `venda_tipo` tinyint(1) DEFAULT NULL,
  `venda_data_emissao` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `venda_valor_desconto` varchar(25) DEFAULT NULL,
  `venda_valor_total` varchar(25) DEFAULT NULL,
  `venda_data_alteracao` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `vendas`
--

INSERT INTO `vendas` (`venda_id`, `venda_cliente_id`, `venda_forma_pagamento_id`, `venda_vendedor_id`, `venda_tipo`, `venda_data_emissao`, `venda_valor_desconto`, `venda_valor_total`, `venda_data_alteracao`) VALUES
(2, 2, 5, 5, 1, '2021-09-11 18:55:25', 'R$ 0.00', '5,000.00', '2021-09-13 00:23:22');

-- --------------------------------------------------------

--
-- Estrutura da tabela `venda_produtos`
--

CREATE TABLE `venda_produtos` (
  `id_venda_produtos` int(11) NOT NULL,
  `venda_produto_id_venda` int(11) DEFAULT NULL,
  `venda_produto_id_produto` int(11) DEFAULT NULL,
  `venda_produto_quantidade` varchar(15) DEFAULT NULL,
  `venda_produto_valor_unitario` varchar(20) DEFAULT NULL,
  `venda_produto_desconto` varchar(10) DEFAULT NULL,
  `venda_produto_valor_total` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `venda_produtos`
--

INSERT INTO `venda_produtos` (`id_venda_produtos`, `venda_produto_id_venda`, `venda_produto_id_produto`, `venda_produto_quantidade`, `venda_produto_valor_unitario`, `venda_produto_desconto`, `venda_produto_valor_total`) VALUES
(120, 2, 12, '1', ' 5000.00', '0 ', ' 5000.00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendedores`
--

CREATE TABLE `vendedores` (
  `vendedor_id` int(11) NOT NULL,
  `codigo` varchar(10) NOT NULL,
  `data_cadastro` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `vendedor_nome` varchar(145) NOT NULL,
  `cpf` varchar(25) NOT NULL,
  `rg` varchar(25) NOT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `celular` varchar(15) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `cep` varchar(15) DEFAULT NULL,
  `endereco` varchar(45) DEFAULT NULL,
  `numero` varchar(25) DEFAULT NULL,
  `complemento` varchar(45) DEFAULT NULL,
  `bairro` varchar(45) DEFAULT NULL,
  `cidade` varchar(45) DEFAULT NULL,
  `estado` varchar(2) DEFAULT NULL,
  `ativo` tinyint(1) DEFAULT NULL,
  `obs` tinytext,
  `data_alteracao` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `vendedores`
--

INSERT INTO `vendedores` (`vendedor_id`, `codigo`, `data_cadastro`, `vendedor_nome`, `cpf`, `rg`, `telefone`, `celular`, `email`, `cep`, `endereco`, `numero`, `complemento`, `bairro`, `cidade`, `estado`, `ativo`, `obs`, `data_alteracao`) VALUES
(5, '46810359', '2020-11-16 12:36:47', 'CLAUDIO MORKING', '024.760.759-22', '69804870', '(41) 3578-2525', '(41) 99828-2611', 'cmorking@gmail.com', '81150121', 'Rua Araripe Júnior', '', 'casa 03 Fundos', 'Pinheirinho', 'Curitiba', 'PR', 1, '', '2020-11-16 12:36:47'),
(6, '24198375', '2021-09-03 19:24:29', 'Rafael Silva', '173.825.550-62', '75123698', '(41) 3578-2525', '(41) 41414-1414', 'rafael@sjpinfo.com.br', '81150-121', 'Rua Araripe Júnior', NULL, 'casa', 'Pinheirinho', 'Curitiba', 'PR', 1, ' teste', '2021-09-03 19:24:29'),
(7, '51906734', '2021-09-09 12:33:48', 'Ricardo Eletro', '722.198.760-20', '6 8989898', '(41) 3578-2525', '(41) 41414-1414', 'cmorking@gmail.com', '82560-120', 'Rua Araripe Júnior', '', 'casa', 'Pinheirinho', 'Curitiba', 'PR', 0, ' ', '2021-09-09 12:33:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`categoria_id`);

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`cliente_id`);

--
-- Indexes for table `contas_pagar`
--
ALTER TABLE `contas_pagar`
  ADD PRIMARY KEY (`conta_pagar_id`),
  ADD KEY `fk_conta_pagar_id_fornecedor` (`conta_pagar_fornecedor_id`);

--
-- Indexes for table `contas_receber`
--
ALTER TABLE `contas_receber`
  ADD PRIMARY KEY (`conta_receber_id`),
  ADD KEY `fk_conta_receber_id_cliente` (`conta_receber_cliente_id`);

--
-- Indexes for table `formas_pagamentos`
--
ALTER TABLE `formas_pagamentos`
  ADD PRIMARY KEY (`forma_pagamento_id`);

--
-- Indexes for table `fornecedores`
--
ALTER TABLE `fornecedores`
  ADD PRIMARY KEY (`fornecedor_id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`marca_id`);

--
-- Indexes for table `ordem_tem_servicos`
--
ALTER TABLE `ordem_tem_servicos`
  ADD PRIMARY KEY (`ordem_ts_id`),
  ADD KEY `fk_ordem_ts_id_servico` (`ordem_ts_id_servico`),
  ADD KEY `fk_ordem_ts_id_ordem_servico` (`ordem_ts_id_ordem_servico`);

--
-- Indexes for table `ordens_servicos`
--
ALTER TABLE `ordens_servicos`
  ADD PRIMARY KEY (`ordem_servico_id`),
  ADD KEY `fk_ordem_servico_id_cliente` (`ordem_servico_cliente_id`),
  ADD KEY `fk_ordem_servico_id_forma_pagto` (`ordem_servico_forma_pagamento_id`);

--
-- Indexes for table `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`produto_id`);

--
-- Indexes for table `servicos`
--
ALTER TABLE `servicos`
  ADD PRIMARY KEY (`servico_id`);

--
-- Indexes for table `sistema`
--
ALTER TABLE `sistema`
  ADD PRIMARY KEY (`sistema_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_email` (`email`),
  ADD UNIQUE KEY `uc_activation_selector` (`activation_selector`),
  ADD UNIQUE KEY `uc_forgotten_password_selector` (`forgotten_password_selector`),
  ADD UNIQUE KEY `uc_remember_selector` (`remember_selector`);

--
-- Indexes for table `vendas`
--
ALTER TABLE `vendas`
  ADD PRIMARY KEY (`venda_id`),
  ADD KEY `fk_venda_cliente_id` (`venda_cliente_id`),
  ADD KEY `fk_venda_forma_pagto_id` (`venda_forma_pagamento_id`),
  ADD KEY `fk_venda_vendedor_id` (`venda_vendedor_id`);

--
-- Indexes for table `venda_produtos`
--
ALTER TABLE `venda_produtos`
  ADD PRIMARY KEY (`id_venda_produtos`),
  ADD KEY `fk_venda_produtos_id_produto` (`venda_produto_id_produto`),
  ADD KEY `fk_venda_produtos_id_venda` (`venda_produto_id_venda`);

--
-- Indexes for table `vendedores`
--
ALTER TABLE `vendedores`
  ADD PRIMARY KEY (`vendedor_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categorias`
--
ALTER TABLE `categorias`
  MODIFY `categoria_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
  MODIFY `cliente_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contas_pagar`
--
ALTER TABLE `contas_pagar`
  MODIFY `conta_pagar_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `contas_receber`
--
ALTER TABLE `contas_receber`
  MODIFY `conta_receber_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `formas_pagamentos`
--
ALTER TABLE `formas_pagamentos`
  MODIFY `forma_pagamento_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `fornecedores`
--
ALTER TABLE `fornecedores`
  MODIFY `fornecedor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `marcas`
--
ALTER TABLE `marcas`
  MODIFY `marca_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `ordem_tem_servicos`
--
ALTER TABLE `ordem_tem_servicos`
  MODIFY `ordem_ts_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;

--
-- AUTO_INCREMENT for table `ordens_servicos`
--
ALTER TABLE `ordens_servicos`
  MODIFY `ordem_servico_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `produtos`
--
ALTER TABLE `produtos`
  MODIFY `produto_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `servicos`
--
ALTER TABLE `servicos`
  MODIFY `servico_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sistema`
--
ALTER TABLE `sistema`
  MODIFY `sistema_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vendas`
--
ALTER TABLE `vendas`
  MODIFY `venda_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `venda_produtos`
--
ALTER TABLE `venda_produtos`
  MODIFY `id_venda_produtos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `vendedores`
--
ALTER TABLE `vendedores`
  MODIFY `vendedor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `ordens_servicos`
--
ALTER TABLE `ordens_servicos`
  ADD CONSTRAINT `fk_ordem_servico_id_cliente` FOREIGN KEY (`ordem_servico_cliente_id`) REFERENCES `clientes` (`cliente_id`),
  ADD CONSTRAINT `fk_ordem_servico_id_forma_pagto` FOREIGN KEY (`ordem_servico_forma_pagamento_id`) REFERENCES `formas_pagamentos` (`forma_pagamento_id`);

--
-- Limitadores para a tabela `vendas`
--
ALTER TABLE `vendas`
  ADD CONSTRAINT `fk_venda_cliente_id` FOREIGN KEY (`venda_cliente_id`) REFERENCES `clientes` (`cliente_id`),
  ADD CONSTRAINT `fk_venda_forma_pagto_id` FOREIGN KEY (`venda_forma_pagamento_id`) REFERENCES `formas_pagamentos` (`forma_pagamento_id`),
  ADD CONSTRAINT `fk_venda_vendedor_id` FOREIGN KEY (`venda_vendedor_id`) REFERENCES `vendedores` (`vendedor_id`);

--
-- Limitadores para a tabela `venda_produtos`
--
ALTER TABLE `venda_produtos`
  ADD CONSTRAINT `fk_venda_produtos_id_produto` FOREIGN KEY (`venda_produto_id_produto`) REFERENCES `produtos` (`produto_id`),
  ADD CONSTRAINT `fk_venda_produtos_id_venda` FOREIGN KEY (`venda_produto_id_venda`) REFERENCES `vendas` (`venda_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
