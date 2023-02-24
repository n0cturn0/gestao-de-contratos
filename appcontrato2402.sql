-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.4.27-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Copiando estrutura para tabela scontratos.clientes
CREATE TABLE IF NOT EXISTS `clientes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `cliente` varchar(255) NOT NULL COMMENT 'Nome do cliente',
  `cnpj` varchar(255) NOT NULL COMMENT 'Cnpj',
  `estado` varchar(255) NOT NULL,
  `cidade` varchar(255) NOT NULL,
  `bairro` varchar(255) NOT NULL,
  `rua` varchar(255) NOT NULL,
  `numero` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0 = Ativo 1 = Inativo',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=111 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela scontratos.clientes: ~16 rows (aproximadamente)
INSERT INTO `clientes` (`id`, `cliente`, `cnpj`, `estado`, `cidade`, `bairro`, `rua`, `numero`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'Luiz Augusto', '85929620130', 'MS', 'Campo Grande', 'Parati', 'Divisão', 3012, 0, NULL, NULL),
	(94, 'corporis', '639983119', 'SM', 'sit', 'nihil', 'quia', 970, 0, '2023-01-05 21:42:16', '2023-01-05 21:42:16'),
	(95, 'vitae', '760981873', 'SM', 'excepturi', 'ut', 'est', 641, 0, '2023-01-05 21:42:16', '2023-01-05 21:42:16'),
	(96, 'vitae', '911037910', 'MS', 'est', 'voluptatem', 'sint', 344, 0, '2023-01-05 21:42:16', '2023-01-05 21:42:16'),
	(97, 'est', '653304751', 'SM', 'nobis', 'sint', 'voluptas', 945, 0, '2023-01-05 21:42:16', '2023-01-05 21:42:16'),
	(98, 'hic', '999367867', 'MS', 'reprehenderit', 'dignissimos', 'maiores', 499, 0, '2023-01-05 21:42:16', '2023-01-05 21:42:16'),
	(99, 'molestiae', '81819890', 'MS', 'et', 'quaerat', 'odio', 580, 0, '2023-01-05 21:42:16', '2023-01-05 21:42:16'),
	(100, 'sunt', '343802684', 'SM', 'iusto', 'est', 'quisquam', 41, 0, '2023-01-05 21:42:16', '2023-01-05 21:42:16'),
	(102, 'temporibus', '644975079', 'SM', 'culpa', 'deleniti', 'excepturi', 102, 0, '2023-01-05 21:42:16', '2023-01-05 21:42:16'),
	(103, 'Rodrigo Ferrate', '20204404244444', 'MS', 'Rio Verde', 'quibusdam', 'Dos Guimarães', 495, 0, '2023-01-05 21:42:16', '2023-01-06 06:59:28'),
	(104, 'consequatur', '433217220', 'SM', 'cupiditate', 'earum', 'quaerat', 414, 0, '2023-01-05 21:42:16', '2023-01-05 21:42:16'),
	(105, 'consequatur', '144959443', 'SM', 'fugiat', 'quas', 'porro', 819, 0, '2023-01-05 21:42:16', '2023-01-05 21:42:16'),
	(106, 'nulla', '980253217', 'SM', 'quibusdam', 'dolores', 'facilis', 103, 0, '2023-01-05 21:42:16', '2023-01-05 21:42:16'),
	(107, 'ea', '341648293', 'SM', 'quidem', 'repudiandae', 'voluptas', 98, 0, '2023-01-05 21:42:16', '2023-01-05 21:42:16'),
	(108, 'ab', '17002631', 'SM', 'est', 'voluptatibus', 'quis', 598, 0, '2023-01-05 21:42:16', '2023-01-05 21:42:16'),
	(109, 'Guto Oliveira', '89890988393909', 'PR', 'Campo Grande', 'Parati', 'rua antonio estevao de figuei', 265, 0, '2023-01-06 06:29:23', '2023-01-06 06:29:23'),
	(110, 'Fulano', '12345678987654', 'AL', 'Campo Grande', 'centro', 'afonso pena', 2222, 0, '2023-01-12 16:23:32', '2023-01-12 16:23:32');

-- Copiando estrutura para tabela scontratos.comissao_parceiros
CREATE TABLE IF NOT EXISTS `comissao_parceiros` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `idproduto` int(11) NOT NULL,
  `porcentagem` varchar(255) NOT NULL,
  `meta` varchar(255) NOT NULL COMMENT 'Mensalidade+treinamento+implantação',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela scontratos.comissao_parceiros: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela scontratos.comissoes_produtos
CREATE TABLE IF NOT EXISTS `comissoes_produtos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `idproduto` int(11) NOT NULL,
  `porcentagem` varchar(255) NOT NULL,
  `valorinicial` varchar(255) NOT NULL,
  `valorfinal` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0 = Ativo 1 = Inativo',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela scontratos.comissoes_produtos: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela scontratos.comissoes_servicos
CREATE TABLE IF NOT EXISTS `comissoes_servicos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `idproduto` int(11) NOT NULL,
  `idservico` int(11) NOT NULL,
  `porcentagem` varchar(255) NOT NULL,
  `valorservico` varchar(255) NOT NULL,
  `valorfinal` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0 = Ativo 1 = Inativo',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela scontratos.comissoes_servicos: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela scontratos.contratos
CREATE TABLE IF NOT EXISTS `contratos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `idCliente` int(11) NOT NULL,
  `idProduto` int(11) NOT NULL,
  `observacao` varchar(255) DEFAULT NULL COMMENT 'Campo não obrigatório',
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0 = Ativo 1 = Inativo',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela scontratos.contratos: ~29 rows (aproximadamente)
INSERT INTO `contratos` (`id`, `idCliente`, `idProduto`, `observacao`, `status`, `created_at`, `updated_at`) VALUES
	(5, 1, 2, NULL, 0, '2023-01-10 06:26:48', '2023-01-10 06:26:48'),
	(6, 96, 4, NULL, 0, '2023-01-10 06:27:10', '2023-01-10 06:27:10'),
	(7, 96, 4, NULL, 0, '2023-01-10 06:30:31', '2023-01-10 06:30:31'),
	(8, 1, 3, 'Teste', 0, '2023-01-10 06:31:01', '2023-01-10 06:31:01'),
	(9, 95, 2, NULL, 0, '2023-01-10 06:31:23', '2023-01-10 06:31:23'),
	(10, 95, 4, NULL, 0, '2023-01-10 20:12:07', '2023-01-10 20:12:07'),
	(11, 1, 3, NULL, 0, '2023-01-11 15:50:34', '2023-01-11 15:50:34'),
	(12, 94, 5, NULL, 0, '2023-01-11 15:53:14', '2023-01-11 15:53:14'),
	(13, 94, 3, NULL, 0, '2023-01-11 15:54:18', '2023-01-11 15:54:18'),
	(14, 1, 4, NULL, 0, '2023-01-11 15:58:50', '2023-01-11 15:58:50'),
	(15, 95, 3, NULL, 0, '2023-01-11 16:08:29', '2023-01-11 16:08:29'),
	(16, 95, 3, NULL, 0, '2023-01-11 16:10:56', '2023-01-11 16:10:56'),
	(17, 106, 6, NULL, 0, '2023-01-11 16:12:38', '2023-01-11 16:12:38'),
	(18, 1, 5, NULL, 0, '2023-01-11 16:31:31', '2023-01-11 16:31:31'),
	(19, 1, 16, NULL, 0, '2023-01-11 23:13:54', '2023-01-11 23:13:54'),
	(20, 102, 8, NULL, 0, '2023-01-12 00:19:51', '2023-01-12 00:19:51'),
	(21, 96, 1, NULL, 0, '2023-01-12 00:22:43', '2023-01-12 00:22:43'),
	(22, 94, 3, NULL, 0, '2023-01-12 16:19:13', '2023-01-12 16:19:13'),
	(23, 110, 3, NULL, 0, '2023-01-12 16:23:54', '2023-01-12 16:23:54'),
	(24, 1, 17, NULL, 0, '2023-01-18 18:18:15', '2023-01-18 18:18:15'),
	(25, 1, 3, 'teste', 0, '2023-01-26 21:38:15', '2023-01-26 21:38:15'),
	(26, 1, 16, 'NOVO TESTE', 0, '2023-02-06 22:46:13', '2023-02-06 22:46:13'),
	(27, 1, 2, 'novo', 0, '2023-02-06 22:58:53', '2023-02-06 22:58:53'),
	(28, 1, 17, '28', 0, '2023-02-06 23:08:07', '2023-02-06 23:08:07'),
	(29, 94, 2, 'uiuiu', 0, '2023-02-06 23:08:34', '2023-02-06 23:08:34'),
	(30, 94, 1, 'teste', 0, '2023-02-06 23:20:43', '2023-02-06 23:20:43'),
	(31, 95, 2, NULL, 0, '2023-02-06 23:21:43', '2023-02-06 23:21:43'),
	(32, 1, 2, NULL, 0, '2023-02-07 07:09:37', '2023-02-07 07:09:37'),
	(33, 1, 1, NULL, 0, '2023-02-07 07:35:13', '2023-02-07 07:35:13'),
	(34, 95, 3, NULL, 0, '2023-02-16 16:21:45', '2023-02-16 16:21:45');

-- Copiando estrutura para tabela scontratos.contrato_ccontrole_valores
CREATE TABLE IF NOT EXISTS `contrato_ccontrole_valores` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `idcomposicao` int(11) NOT NULL,
  `ultimoidcomposicaofinal` int(11) NOT NULL COMMENT '0 vigente 1 nao vgente',
  `valorpago` varchar(255) NOT NULL,
  `valortotal` varchar(255) NOT NULL,
  `stateview` int(11) NOT NULL COMMENT '0=show 1=hidden',
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0 = Ativo 1 = Inativo',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela scontratos.contrato_ccontrole_valores: ~15 rows (aproximadamente)
INSERT INTO `contrato_ccontrole_valores` (`id`, `idcomposicao`, `ultimoidcomposicaofinal`, `valorpago`, `valortotal`, `stateview`, `status`, `created_at`, `updated_at`) VALUES
	(17, 22, 57, '0', '1000', 1, 0, NULL, NULL),
	(19, 25, 59, '0', '1000', 1, 0, NULL, NULL),
	(20, 25, 60, '0', '490', 1, 0, NULL, NULL),
	(21, 30, 61, '0', '490', 1, 0, NULL, NULL),
	(22, 33, 105, '0', '490', 1, 0, NULL, NULL),
	(23, 33, 108, '0', '490', 1, 0, NULL, NULL),
	(24, 33, 114, '0', '1000', 1, 0, NULL, NULL),
	(25, 31, 123, '0', '490', 1, 0, NULL, NULL),
	(26, 33, 129, '0', '490', 1, 0, NULL, NULL),
	(27, 33, 137, '0', '490', 1, 0, NULL, NULL),
	(28, 33, 142, '0', '490', 1, 0, NULL, NULL),
	(29, 33, 149, '0', '765', 1, 0, NULL, NULL),
	(30, 33, 154, '0', '1000', 1, 0, NULL, NULL),
	(31, 33, 158, '0', '490', 1, 0, NULL, NULL),
	(32, 33, 163, '0', '765', 1, 0, NULL, NULL),
	(33, 31, 166, '0', '765', 1, 0, NULL, NULL),
	(34, 24, 170, '0', '1000', 1, 0, NULL, NULL),
	(35, 31, 181, '0', '890', 1, 0, NULL, NULL);

-- Copiando estrutura para tabela scontratos.contrato_composicao_final
CREATE TABLE IF NOT EXISTS `contrato_composicao_final` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `idsituacao` int(11) NOT NULL,
  `vendedorid` int(11) NOT NULL,
  `tipo` int(11) NOT NULL,
  `idativo` int(11) NOT NULL,
  `stateview` int(11) NOT NULL COMMENT '0=show 1=hidden',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `diavencimento` varchar(255) NOT NULL,
  `mesvencimento` varchar(255) NOT NULL,
  `valorparcela` varchar(255) NOT NULL,
  `pagamento` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=182 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela scontratos.contrato_composicao_final: ~43 rows (aproximadamente)
INSERT INTO `contrato_composicao_final` (`id`, `idsituacao`, `vendedorid`, `tipo`, `idativo`, `stateview`, `created_at`, `updated_at`, `diavencimento`, `mesvencimento`, `valorparcela`, `pagamento`) VALUES
	(1, 12, 0, 1, 5, 1, NULL, NULL, '', '', '', ''),
	(57, 22, 16, 1, 2, 1, NULL, NULL, '', '', '', ''),
	(59, 25, 12, 1, 2, 1, NULL, NULL, '', '', '', ''),
	(60, 25, 1, 1, 4, 1, NULL, NULL, '', '', '', ''),
	(61, 30, 2, 1, 4, 1, NULL, NULL, '', '', '', ''),
	(171, 33, 1, 1, 2, 1, NULL, NULL, '14', '05/2024', '178', '0'),
	(172, 33, 1, 1, 2, 1, NULL, NULL, '14', '6/2024', '178', '0'),
	(173, 33, 1, 1, 2, 1, NULL, NULL, '14', '7/2024', '178', '0'),
	(174, 33, 1, 1, 2, 1, NULL, NULL, '14', '8/2024', '178', '0'),
	(175, 33, 1, 1, 2, 1, NULL, NULL, '14', '9/2024', '178', '0'),
	(176, 31, 1, 1, 2, 1, NULL, NULL, '24', '06/2024', '148.33333333333', '0'),
	(177, 31, 1, 1, 2, 1, NULL, NULL, '24', '7/2024', '148.33333333333', '0'),
	(178, 31, 1, 1, 2, 1, NULL, NULL, '24', '8/2024', '148.33333333333', '0'),
	(179, 31, 1, 1, 2, 1, NULL, NULL, '24', '9/2024', '148.33333333333', '0'),
	(180, 31, 1, 1, 2, 1, NULL, NULL, '24', '10/2024', '148.33333333333', '0'),
	(181, 31, 1, 1, 2, 1, NULL, NULL, '24', '11/2024', '148.33333333333', '0');

-- Copiando estrutura para tabela scontratos.contrato_periodos
CREATE TABLE IF NOT EXISTS `contrato_periodos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `idsituacao` int(11) NOT NULL,
  `idvendedor` int(11) NOT NULL,
  `datainicial` date NOT NULL,
  `datafinal` date NOT NULL,
  `datareajuste` date NOT NULL,
  `valorreajuste` varchar(255) NOT NULL,
  `diavencimento` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0 = Ativo 1 = Inativo',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela scontratos.contrato_periodos: ~7 rows (aproximadamente)
INSERT INTO `contrato_periodos` (`id`, `idsituacao`, `idvendedor`, `datainicial`, `datafinal`, `datareajuste`, `valorreajuste`, `diavencimento`, `status`, `created_at`, `updated_at`) VALUES
	(3, 22, 16, '2022-01-07', '2024-12-13', '2023-01-07', '4,2', '10', 0, NULL, NULL),
	(5, 24, 16, '2018-01-01', '2018-01-15', '1970-01-01', '5', '25', 0, NULL, NULL),
	(6, 26, 16, '2024-01-14', '2024-01-19', '2023-08-27', '2', '10', 0, NULL, NULL),
	(7, 27, 16, '2023-01-07', '2024-03-03', '2023-01-07', '2', '9', 0, NULL, NULL),
	(8, 29, 2, '2023-01-07', '2023-01-13', '2023-01-07', '5', '10', 0, NULL, NULL),
	(9, 31, 15, '2018-01-01', '2018-01-15', '1970-01-01', '4', '5', 0, NULL, NULL),
	(10, 28, 1, '2018-01-01', '2018-01-15', '1970-01-01', '9,5', '11', 0, NULL, NULL),
	(11, 33, 16, '2023-01-01', '2023-12-31', '2023-01-07', '7,9', '25', 0, NULL, NULL);

-- Copiando estrutura para tabela scontratos.contrato_registros
CREATE TABLE IF NOT EXISTS `contrato_registros` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `idcontratoperiodo` int(11) NOT NULL,
  `datareferente` date NOT NULL,
  `pagamento` int(11) NOT NULL COMMENT '0 = Pago 1 = Sem Pagamento',
  `datapagamento` date NOT NULL,
  `boleto` int(11) NOT NULL COMMENT '0 = ok 1 = null',
  `nfe` int(11) NOT NULL COMMENT '0 = ok 1 = null',
  `idimplantacao` int(11) NOT NULL,
  `idservico` int(11) NOT NULL,
  `stateview` int(11) NOT NULL COMMENT '0=show 1=hidden',
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0 = Ativo 1 = Inativo',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela scontratos.contrato_registros: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela scontratos.contrato_servicoes_produtos
CREATE TABLE IF NOT EXISTS `contrato_servicoes_produtos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tipo` int(11) NOT NULL COMMENT '0=servico 1=produto 2=implantacao',
  `idativo` int(11) NOT NULL,
  `idcontratoperiodo` int(11) NOT NULL,
  `datareferente` date NOT NULL,
  `pagamento` int(11) NOT NULL COMMENT '0 = Pago 1 = Sem Pagamento',
  `datapagamento` date NOT NULL,
  `boleto` int(11) NOT NULL COMMENT '0 = ok 1 = null',
  `nfe` int(11) NOT NULL COMMENT '0 = ok 1 = null',
  `stateview` int(11) NOT NULL COMMENT '0=show 1=hidden',
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0 = Ativo 1 = Inativo',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela scontratos.contrato_servicoes_produtos: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela scontratos.contrato_situacaos
CREATE TABLE IF NOT EXISTS `contrato_situacaos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `idcontrato` int(11) NOT NULL,
  `situacao` int(11) NOT NULL COMMENT '0 = Ativo 1 = Inativo 2= Renovado 3= Reincidido',
  `controle` int(11) NOT NULL COMMENT '0 vigente 1 nao vgente',
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0 = Ativo 1 = Inativo',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela scontratos.contrato_situacaos: ~19 rows (aproximadamente)
INSERT INTO `contrato_situacaos` (`id`, `idcontrato`, `situacao`, `controle`, `status`, `created_at`, `updated_at`) VALUES
	(1, 18, 0, 1, 0, '2023-01-11 16:31:31', '2023-01-11 16:31:31'),
	(2, 18, 2, 1, 0, '2023-01-11 20:48:26', '2023-01-11 20:48:26'),
	(3, 19, 0, 1, 0, '2023-01-11 23:13:54', '2023-01-11 23:13:54'),
	(4, 18, 0, 1, 0, '2023-01-11 23:14:26', '2023-01-11 23:14:26'),
	(5, 21, 0, 1, 0, '2023-01-12 00:22:43', '2023-01-12 00:22:43'),
	(6, 18, 2, 0, 0, '2023-01-12 00:52:04', '2023-01-12 00:52:04'),
	(7, 19, 3, 0, 0, '2023-01-12 16:18:11', '2023-01-12 16:18:11'),
	(8, 22, 0, 0, 0, '2023-01-12 16:19:13', '2023-01-12 16:19:13'),
	(9, 23, 0, 1, 0, '2023-01-12 16:23:54', '2023-01-12 16:23:54'),
	(10, 23, 2, 0, 0, '2023-01-12 16:24:12', '2023-01-12 16:24:12'),
	(11, 21, 0, 0, 0, '2023-01-13 20:42:13', '2023-01-13 20:42:13'),
	(12, 24, 0, 0, 0, '2023-01-18 18:18:15', '2023-01-18 18:18:15'),
	(13, 25, 0, 0, 0, '2023-01-26 21:38:15', '2023-01-26 21:38:15'),
	(14, 26, 0, 0, 0, '2023-02-06 22:46:13', '2023-02-06 22:46:13'),
	(15, 27, 0, 0, 0, '2023-02-06 22:58:53', '2023-02-06 22:58:53'),
	(16, 28, 0, 0, 0, '2023-02-06 23:08:07', '2023-02-06 23:08:07'),
	(17, 29, 0, 0, 0, '2023-02-06 23:08:34', '2023-02-06 23:08:34'),
	(18, 30, 0, 0, 0, '2023-02-06 23:20:43', '2023-02-06 23:20:43'),
	(19, 31, 0, 0, 0, '2023-02-06 23:21:43', '2023-02-06 23:21:43'),
	(20, 32, 0, 0, 0, '2023-02-07 07:09:37', '2023-02-07 07:09:37'),
	(21, 33, 0, 0, 0, '2023-02-07 07:35:13', '2023-02-07 07:35:13'),
	(22, 34, 0, 0, 0, '2023-02-16 16:21:45', '2023-02-16 16:21:45');

-- Copiando estrutura para tabela scontratos.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela scontratos.failed_jobs: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela scontratos.grupos
CREATE TABLE IF NOT EXISTS `grupos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `grupo` varchar(255) NOT NULL COMMENT 'Descrição/nome do grupo',
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0 = Ativo 1 = Inativo',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela scontratos.grupos: ~3 rows (aproximadamente)
INSERT INTO `grupos` (`id`, `grupo`, `status`, `created_at`, `updated_at`) VALUES
	(2, 'Microsoft', 0, '2023-01-06 16:42:01', '2023-01-09 18:44:30'),
	(3, 'Amazom', 0, '2023-01-06 16:42:01', '2023-01-09 18:44:45'),
	(4, 'SCI', 0, '2023-01-06 16:52:17', '2023-01-09 18:44:13');

-- Copiando estrutura para tabela scontratos.implantacaos
CREATE TABLE IF NOT EXISTS `implantacaos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `idCliente` int(11) NOT NULL,
  `idProduto` int(11) NOT NULL,
  `idVendedor` int(11) NOT NULL,
  `valorImplantacao` varchar(255) NOT NULL,
  `qtdparcelas` int(11) NOT NULL,
  `valorParcela` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0 = Ativo 1 = Inativo',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela scontratos.implantacaos: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela scontratos.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela scontratos.migrations: ~25 rows (aproximadamente)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2022_12_23_150007_create_produto_models_table', 1),
	(5, '2022_12_23_150224_create_produtos_table', 1),
	(6, '2022_12_23_195230_create_servicos_table', 1),
	(7, '2022_12_23_200157_create_grupos_table', 1),
	(8, '2022_12_23_201227_create_vendedors_table', 1),
	(9, '2022_12_23_201857_create_clientes_table', 1),
	(10, '2022_12_23_202441_create_implantacaos_table', 1),
	(11, '2022_12_23_211537_create_contratos_table', 1),
	(12, '2022_12_23_212101_create_contrato_situacaos_table', 1),
	(13, '2022_12_24_130054_create_contrato_periodos_table', 1),
	(14, '2022_12_24_205021_create_contrato_registros_table', 1),
	(15, '2022_12_24_205931_create_comissoes_produtos_table', 1),
	(16, '2022_12_24_210228_create_comissoes_servicos_table', 1),
	(17, '2022_12_24_210729_create_comissao_parceiros_table', 1),
	(18, '2023_01_11_192839_add_collum_controle_contratosituacao', 2),
	(19, '2023_01_11_193955_add_collum_controle_contratosituacao2', 3),
	(20, '2023_01_15_024625_add_collunreajusteincontratosperiodos', 4),
	(21, '2023_01_16_202337_contrato_servicos_produtos', 5),
	(22, '2023_01_17_165227_add_colun_id_vendedor_contrato_servicos_produtos', 6),
	(23, '2023_01_17_204730_add_collun_identifica_remove_collun_idvendedor', 7),
	(24, '2023_01_17_205412_remove_collun_idvendedor', 8),
	(25, '2023_01_17_205831_novo_remove_collun_idvendedor', 9),
	(26, '2023_01_18_133225_remove_colluns_contrato_periodos', 10),
	(27, '2023_01_18_135045_contrato_composicao_final', 11),
	(28, '2023_01_18_150723_adiciona_coluna_precounitario_servico', 11),
	(29, '2023_02_03_181119_adiciona_coluna_id_usuario_contrato_composicao_final', 12),
	(30, '2023_02_03_182408_contrato_controle_valores', 13),
	(31, '2023_02_06_175239_adionar_coluna_idcontrato_composicao_final', 14),
	(32, '2023_02_06_175554_correcao_coluna_idcontrato_composicao_final', 15),
	(33, '2023_02_07_022845_adiciona_valor_reajuste_contrato_periodos', 16),
	(34, '2023_02_13_170631_add_collums_dia_mes_valorin_c_ontrato_composicao_final', 17),
	(35, '2023_02_13_172601_correcao_colocacao_colunas_contrato_composicao_f_inal', 18),
	(36, '2023_02_24_030539_remove_collum_valor_servico', 19);

-- Copiando estrutura para tabela scontratos.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela scontratos.password_resets: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela scontratos.produtos
CREATE TABLE IF NOT EXISTS `produtos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `produto` varchar(255) NOT NULL COMMENT 'Nome do produto',
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0 = Ativo 1 = Inativo',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela scontratos.produtos: ~12 rows (aproximadamente)
INSERT INTO `produtos` (`id`, `produto`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'TEste', 0, NULL, NULL),
	(2, 'Novo', 0, NULL, NULL),
	(3, 'Controller', 0, NULL, NULL),
	(4, 'Visual Studio', 0, NULL, NULL),
	(5, 'Opera kiocer', 0, NULL, NULL),
	(6, 'Pianic', 0, NULL, NULL),
	(8, 'novo produto', 0, NULL, NULL),
	(9, 'Teste', 0, NULL, NULL),
	(11, 'Teste', 0, NULL, NULL),
	(16, 'TEste Modal 2', 0, '2023-01-04 23:44:33', '2023-01-04 23:44:33'),
	(17, 'EstaGravado2', 0, '2023-01-04 23:44:55', '2023-01-05 16:23:25');

-- Copiando estrutura para tabela scontratos.produto_models
CREATE TABLE IF NOT EXISTS `produto_models` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela scontratos.produto_models: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela scontratos.servicos
CREATE TABLE IF NOT EXISTS `servicos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `servico` varchar(255) NOT NULL COMMENT 'Descrição/nome do serviço',
  `tipo` int(11) NOT NULL COMMENT '0 = produto 1 = serviço',
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0 = Ativo 1 = Inativo',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela scontratos.servicos: ~3 rows (aproximadamente)
INSERT INTO `servicos` (`id`, `servico`, `tipo`, `status`, `created_at`, `updated_at`) VALUES
	(2, 'Treinamento Meta', 1, 0, '2023-01-18 19:16:12', '2023-01-18 19:29:04'),
	(4, 'Implementação Fiscal', 1, 0, '2023-02-04 09:36:28', '2023-02-04 09:36:28'),
	(5, 'Importação de base', 1, 0, '2023-02-05 05:52:18', '2023-02-05 05:52:18'),
	(6, 'Treinamento Laravel e NextJs', 1, 0, '2023-02-24 07:54:14', '2023-02-24 07:54:14');

-- Copiando estrutura para tabela scontratos.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela scontratos.users: ~0 rows (aproximadamente)
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Admin', 'admin@gmail.com', NULL, '$2y$10$I2NtNvamMwhsgKqL2t72ou2ufXDq9ofGYdf7nVuQh6tfbjHkW7vVy', NULL, '2022-12-26 18:01:03', '2022-12-26 18:01:03');

-- Copiando estrutura para tabela scontratos.vendedors
CREATE TABLE IF NOT EXISTS `vendedors` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `vendedor` varchar(255) NOT NULL COMMENT 'Nome do vendedor',
  `fone` varchar(255) NOT NULL COMMENT 'Número do telefone',
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0 = Ativo 1 = Inativo',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela scontratos.vendedors: ~15 rows (aproximadamente)
INSERT INTO `vendedors` (`id`, `vendedor`, `fone`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'vitae', '21065564', 0, '2023-01-06 07:56:11', '2023-01-06 07:56:11'),
	(2, 'rerum', '74067936', 0, '2023-01-06 07:56:11', '2023-01-06 07:56:11'),
	(3, 'laborum', '300152136', 0, '2023-01-06 07:56:11', '2023-01-06 07:56:11'),
	(4, 'natus', '476679997', 0, '2023-01-06 07:56:11', '2023-01-06 07:56:11'),
	(5, 'non', '268884530', 0, '2023-01-06 07:56:11', '2023-01-06 07:56:11'),
	(6, 'asperiores', '340058381', 0, '2023-01-06 07:56:11', '2023-01-06 07:56:11'),
	(7, 'saepe', '841359868', 0, '2023-01-06 07:56:11', '2023-01-06 07:56:11'),
	(8, 'illo', '180277483', 0, '2023-01-06 07:56:11', '2023-01-06 07:56:11'),
	(9, 'et', '121783734', 0, '2023-01-06 07:56:11', '2023-01-06 07:56:11'),
	(11, 'reprehenderit', '302564824', 0, '2023-01-06 07:56:11', '2023-01-06 07:56:11'),
	(12, 'omnis', '813482634', 0, '2023-01-06 07:56:11', '2023-01-06 07:56:11'),
	(15, 'Zuleide de Morae', '67 998989889', 0, '2023-01-06 07:56:11', '2023-01-06 08:27:35'),
	(16, 'Adauto Leite', '67 991302726', 0, '2023-01-06 08:20:47', '2023-01-06 08:20:47');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
