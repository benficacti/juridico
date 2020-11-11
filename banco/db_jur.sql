-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 11-Nov-2020 às 13:08
-- Versão do servidor: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_jur`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `buscaContrato` (IN `numero_contrato` INT)  BEGIN
SELECT * FROM CONTRATO WHERE NUMERO_CONTRATO = numero_contrato;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `buscaDescSetor` (IN `id_setor` INT)  BEGIN
	SELECT DESC_SETOR FROM SETOR WHERE ID_SETOR = id_setor;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `buscaLog` (IN `id_log` INT(11))  BEGIN
 SELECT * FROM TIPO_LOG WHERE ID_TIPO_LOG = id_log;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `buscaTipoAcesso` (IN `id_tipo_acesso` INT)  BEGIN
 SELECT DESC_TIPO_ACESSO FROM TIPO_ACESSO WHERE ID_TIPO_ACESSO = id_tipo_acesso;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `verificarLogin` (IN `login` VARCHAR(20))  BEGIN
SELECT * FROM LOGIN WHERE USUARIO_LOGIN = login;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `aditamentos`
--

CREATE TABLE `aditamentos` (
  `ID_ADITAMENTO` int(11) NOT NULL,
  `ID_CONTRATO_ADITADO_ADITAMENTO` int(11) DEFAULT NULL,
  `ID_CONTRATO_SUBMETIDO` int(11) DEFAULT NULL,
  `DATA_ADITAMENTO` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `aditamentos`
--

INSERT INTO `aditamentos` (`ID_ADITAMENTO`, `ID_CONTRATO_ADITADO_ADITAMENTO`, `ID_CONTRATO_SUBMETIDO`, `DATA_ADITAMENTO`) VALUES
(5, 131, 153, '2019-10-16 09:48:41'),
(6, 154, 155, '2019-10-30 15:21:18'),
(7, 154, 156, '2019-10-30 15:27:33'),
(8, 154, 157, '2019-10-30 15:32:34'),
(9, 154, 158, '2019-10-30 15:35:31'),
(10, 154, 159, '2019-10-30 15:38:10'),
(11, 154, 160, '2019-10-30 15:41:46'),
(12, 154, 161, '2019-10-30 15:45:41'),
(13, 154, 162, '2019-10-30 15:47:37'),
(14, 154, 163, '2019-10-30 15:49:49'),
(15, 144, 164, '2019-10-31 11:24:00'),
(16, 144, 165, '2019-10-31 11:28:09'),
(17, 144, 166, '2019-10-31 11:31:49'),
(18, 144, 167, '2019-10-31 11:35:20'),
(19, 169, 171, '2019-11-04 10:27:04'),
(20, 173, 174, '2019-11-04 17:49:06'),
(21, 189, 192, '2020-10-22 08:53:31'),
(22, 189, 193, '2020-10-22 08:58:13'),
(23, 189, 194, '2020-10-22 09:14:54'),
(24, 195, 196, '2020-10-22 09:39:04'),
(25, 197, 198, '2020-10-22 10:01:37'),
(26, 197, 199, '2020-10-22 10:09:45'),
(27, 197, 200, '2020-10-22 10:20:58'),
(28, 197, 201, '2020-10-22 10:35:18'),
(29, 197, 202, '2020-10-22 10:42:13'),
(30, 138, 204, '2020-10-28 10:44:12'),
(31, 138, 205, '2020-10-28 10:53:23'),
(32, 208, 209, '2020-10-28 11:41:22'),
(33, 208, 210, '2020-10-28 13:06:18'),
(34, 208, 211, '2020-10-28 13:12:02'),
(35, 208, 212, '2020-10-28 13:23:39'),
(36, 131, 213, '2020-10-28 13:40:40'),
(37, 131, 214, '2020-10-28 13:48:28'),
(38, 131, 216, '2020-10-30 09:48:11'),
(39, 131, 217, '2020-10-30 09:52:36'),
(40, 129, 218, '2020-10-30 10:05:33'),
(41, 129, 219, '2020-10-30 10:20:12'),
(42, 129, 220, '2020-10-30 10:23:37'),
(43, 223, 224, '2020-10-30 10:55:52'),
(44, 225, 226, '2020-10-30 11:12:51'),
(45, 225, 227, '2020-10-30 11:14:47'),
(46, 225, 228, '2020-10-30 11:16:20'),
(47, 230, 231, '2020-10-30 11:31:40'),
(48, 146, 232, '2020-10-30 12:05:02'),
(49, 146, 233, '2020-10-30 12:09:49');

-- --------------------------------------------------------

--
-- Estrutura da tabela `aviso_contrato`
--

CREATE TABLE `aviso_contrato` (
  `ID_AVISO` int(11) NOT NULL,
  `DESC_AVISO` varchar(45) NOT NULL,
  `DATA_AVISO` date NOT NULL,
  `ID_CONTRATO_AVISO` int(11) NOT NULL,
  `ID_TIPO_AVISO` int(11) NOT NULL,
  `ID_STATUS_AVISO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `contrato`
--

CREATE TABLE `contrato` (
  `ID_CONTRATO` int(11) NOT NULL,
  `NUMERO_CONTRATO` varchar(20) DEFAULT NULL,
  `CONTRATANTE_CONTRATO` varchar(80) DEFAULT NULL,
  `CONTRATADO_CONTRATO` varchar(80) DEFAULT NULL,
  `CONCORRENCIA_CONTRATO` varchar(45) DEFAULT NULL,
  `ID_OBJETO_CONTRATO` int(11) DEFAULT '1',
  `VALOR_CONTRATO` varchar(100) DEFAULT NULL,
  `QUANTIDADE_PARCELAS_CONTRATO` int(11) DEFAULT NULL,
  `VALOR_DAS_PARCELAS_CONTRATO` varchar(100) DEFAULT NULL,
  `QUANTIDADE_PARCELAS_PAGAS_CONTRATO` int(11) DEFAULT NULL,
  `DATA_PAGAMENTO_DAS_PARCELAS_CONTRATO` date DEFAULT NULL,
  `VALOR_TOTAL_PAGO_CONTRATO` int(11) DEFAULT NULL,
  `INICIO_VIGENCIA_CONTRATO` date DEFAULT NULL,
  `FINAL_VIGENCIA_CONTRATO` date DEFAULT NULL,
  `VENCIMENTO_CONTRATO` date DEFAULT NULL,
  `ID_GARANTIA_CONTRATO` int(11) DEFAULT '1',
  `ID_ADITAMENTO_CONTRATO` int(11) DEFAULT NULL,
  `ID_LOGIN_CONTRATO` int(11) DEFAULT NULL,
  `ID_FINALIZACAO_CONTRATO` int(11) DEFAULT NULL,
  `ID_TIPO_CONTRATO` int(11) DEFAULT NULL,
  `ID_STATUS_GARANTIA_CONTRATO` int(11) DEFAULT NULL,
  `ID_OBSERVACOES_EXIGENCIAS_CONTRATO` int(11) DEFAULT '1',
  `URL_IMAGEM_CONTRATO` varchar(100) DEFAULT NULL,
  `ID_EMPRESA_CONTRATO` int(11) DEFAULT NULL,
  `ID_POSSUI_PARCELA_CONTRATO` int(11) DEFAULT NULL,
  `ID_STATUS_CONTRATO` int(11) DEFAULT NULL,
  `ID_SETOR_CONTRATO` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `contrato`
--

INSERT INTO `contrato` (`ID_CONTRATO`, `NUMERO_CONTRATO`, `CONTRATANTE_CONTRATO`, `CONTRATADO_CONTRATO`, `CONCORRENCIA_CONTRATO`, `ID_OBJETO_CONTRATO`, `VALOR_CONTRATO`, `QUANTIDADE_PARCELAS_CONTRATO`, `VALOR_DAS_PARCELAS_CONTRATO`, `QUANTIDADE_PARCELAS_PAGAS_CONTRATO`, `DATA_PAGAMENTO_DAS_PARCELAS_CONTRATO`, `VALOR_TOTAL_PAGO_CONTRATO`, `INICIO_VIGENCIA_CONTRATO`, `FINAL_VIGENCIA_CONTRATO`, `VENCIMENTO_CONTRATO`, `ID_GARANTIA_CONTRATO`, `ID_ADITAMENTO_CONTRATO`, `ID_LOGIN_CONTRATO`, `ID_FINALIZACAO_CONTRATO`, `ID_TIPO_CONTRATO`, `ID_STATUS_GARANTIA_CONTRATO`, `ID_OBSERVACOES_EXIGENCIAS_CONTRATO`, `URL_IMAGEM_CONTRATO`, `ID_EMPRESA_CONTRATO`, `ID_POSSUI_PARCELA_CONTRATO`, `ID_STATUS_CONTRATO`, `ID_SETOR_CONTRATO`) VALUES
(127, '728/2017', 'PREFEITURA BARUERI - Secretaria do Deficiente', 'BB', '-', 31, '20.772.000,00', NULL, NULL, NULL, NULL, NULL, '2017-11-13', '2018-11-12', '2018-11-12', 62, NULL, 4, NULL, 1, 2, 35, '', 1, 2, 2, NULL),
(128, '830/2018', 'PREFEITURA DE BARUERI', 'BB', '-', 32, '2.897.100,00', NULL, NULL, NULL, NULL, NULL, '2018-11-06', '2019-11-06', '2019-11-06', 63, NULL, 4, NULL, 1, 2, 36, '', 1, 2, 2, NULL),
(129, '405/2017', 'PREFEITURA DE BARUERI - SECRETARIA DA SAÚDE', 'BB', '-', 33, '199.080,00', NULL, NULL, NULL, NULL, NULL, '2017-08-14', '2018-08-13', '2018-08-13', 64, 42, 4, NULL, 1, 2, 37, 'bc11f11297d135a8df3124bfa6b055d0edbf3c9e', 1, 2, 1, NULL),
(130, '572/2018', 'PREFEITURA DE BARUERI - SECRETARIA DA SAÚDE', 'BB', '-14/08/2017', 34, '182.486,85', NULL, NULL, NULL, NULL, NULL, '2018-08-13', '2019-08-13', '2019-08-13', 65, NULL, 4, NULL, 1, 2, 38, '', 1, 2, 2, NULL),
(131, '132/2016', 'PREFEITURA DE BARUERI - Secretaria da Promoção Social', 'BB', '-', 1, '114.000,00', NULL, NULL, NULL, NULL, NULL, '2016-03-31', '2017-03-30', '2017-03-30', 66, 39, 4, NULL, 1, 2, 1, '0203dad98dadba4db0039fee1b6d77cff10531b2', 1, 2, 1, NULL),
(132, '-', 'BB', 'VR BENEFÍCIOS E SERVIÇOS', ' Não possui concorrência', 35, '', NULL, NULL, NULL, NULL, NULL, '2018-11-05', '2019-11-04', '2019-11-04', 67, NULL, 4, NULL, 2, 2, 39, '', 1, 2, 1, NULL),
(133, '', 'RALIP', 'VR BENEFÍCIOS E SERVIÇOS', ' Não possui concorrência', 36, '', NULL, NULL, NULL, NULL, NULL, '2018-11-05', '2019-11-04', '2019-11-04', 68, NULL, 4, NULL, 2, 2, 40, '', 2, 2, 1, NULL),
(134, '57/2019', 'PREFEITURA DE BARUERI - TURISMO', 'BB', '22/2014', 37, '2.008.800,00', NULL, NULL, NULL, NULL, NULL, '2019-02-08', '2020-02-07', '2020-02-07', 69, NULL, 4, NULL, 1, 1, 41, '', 1, 2, 1, NULL),
(135, '16/2019', 'FIEB BARUERI', 'BB', '-', 38, '514.242,00', NULL, NULL, NULL, NULL, NULL, '2019-05-22', '2020-05-21', '2020-05-21', 70, NULL, 4, NULL, 1, 2, 42, '', 1, 2, 1, NULL),
(136, '130/2019', 'PREFEITURA DE BARUERI - SECRETARIA DA PROMOÇÃO SOCIAL', 'BB', '-', 39, '27.891,40', NULL, NULL, NULL, NULL, NULL, '2019-03-29', '2019-12-28', '2019-12-28', 71, NULL, 4, NULL, 1, 2, 43, '', 1, 2, 2, NULL),
(137, '95/2019', 'PREFEITURA DE BARUERI - SECRETARIA DA SAÚDE', 'BB', '-', 40, '2.113.803,00', NULL, NULL, NULL, NULL, NULL, '2019-03-01', '2020-02-28', '2020-02-28', 72, NULL, 4, NULL, 1, 2, 44, '', 1, 2, 1, NULL),
(138, '565/2018', 'PREFEITURA DE BARUERI - SECRETARIA DA ADMINISTRAÇÃO', 'BB', '-', 41, '1.411.200,00', NULL, NULL, NULL, NULL, NULL, '2018-08-10', '2019-09-10', '2019-09-10', 73, 31, 4, NULL, 1, 2, 45, '03a0d166da7587a45d72d756d420d5e05568f33a', 1, 2, 1, NULL),
(139, '4600000777', 'PRYSMIAN CABOS E SISTEMAS DO BRASIL S.A.', 'BB', ' Não possui concorrência', 42, '185.885,29', NULL, NULL, NULL, NULL, NULL, '2019-05-01', '2019-07-30', '2019-07-30', 74, NULL, 4, NULL, 2, 2, 46, '904bf3ffa3c92f9a4ced4321f66731adaac1b0d2', 1, 2, 1, NULL),
(140, '05/2013', 'PREFEITURA DE JANDIRA', 'BB', '1', 43, '', NULL, NULL, NULL, NULL, NULL, '2014-06-11', '2029-06-10', '2029-06-10', 75, NULL, 4, NULL, 1, 1, 47, '', 1, 2, 1, NULL),
(141, '105/2019', 'PREFEITURA BARUERI', 'BB ', 'INEXIGIBILIDADE', 44, '54.000,00', NULL, NULL, NULL, NULL, NULL, '2019-03-07', '2020-03-06', '2020-03-06', 76, NULL, 4, NULL, 1, 2, 48, '', 1, 2, 1, NULL),
(142, NULL, 'RALIP', 'ISTOBAL DO BRASIL INDÚSTRIA E COMÉRCIO', ' Não possui concorrência', 45, '162.044,00', 10, 'R$ 16.204,40', 1, '2019-08-28', 1, '2019-08-19', '2020-05-29', '2020-05-28', 77, NULL, 4, NULL, 2, 2, 49, '', 2, 1, 1, NULL),
(143, NULL, 'RALIP', 'MAXILABOR DIAGNÓSTICOS', ' Não possui concorrência', 46, '', NULL, NULL, NULL, NULL, NULL, '2017-10-09', '0000-00-00', '0000-00-00', 78, NULL, 4, NULL, 2, 2, 50, '91f9028c3c1571aa2e9227fd5b3e647524f018a7', 2, 2, 1, NULL),
(144, NULL, 'COMPETIVIDADE', 'BB', '-', 47, '', NULL, NULL, NULL, NULL, NULL, '2016-01-11', '2018-01-10', '2018-01-10', 79, 18, 4, NULL, 1, 2, 51, 'a49ac1ee7c3700e8c206fd13e8ba855e067f3a92', 1, 2, 1, NULL),
(145, NULL, 'IHARABRAS S.A. INDUSTRIAS QUIMICAS', 'BB', ' Não possui concorrência', 48, '', NULL, NULL, NULL, NULL, NULL, '2016-10-25', '2019-10-24', '2019-10-24', 80, NULL, 4, NULL, 2, 2, 52, '', 1, 2, 1, NULL),
(146, '662/2017', 'PREFEITURA DE BARUERI', 'BB', 'Inexibilidade 34/2017', 49, '189.000,00', NULL, NULL, NULL, NULL, NULL, '2017-10-24', '2018-10-23', '2018-10-23', 81, 49, 4, NULL, 1, 2, 53, 'd2b6618053256e0e21b5eb7803ddc1a37e9ec98c', 1, 2, 1, NULL),
(147, '697/2018', 'PREFEITURA DE BARUERI', 'BB', 'Inexigibilidade nº 34/2017', 50, '163.159,80', NULL, NULL, NULL, NULL, NULL, '2018-10-24', '2019-10-23', '2019-10-23', 82, NULL, 4, NULL, 1, 2, 54, '', 1, 2, 2, NULL),
(148, '175/19', 'PREFEITURA DE ITAPEVI', 'BB', 'Inexigibilidade nº 433/19', 51, '108.000,00', NULL, NULL, NULL, NULL, NULL, '2019-07-16', '2020-07-15', '2020-07-15', 83, NULL, 4, NULL, 1, 2, 55, 'bc7f4fe76790d35db51a1334b72dd64ca6fff77e', 1, 2, 1, NULL),
(149, NULL, 'PREFEITURA DE PILAR DO SUL', 'RALIP', '001/2002', 1, '', NULL, NULL, NULL, NULL, NULL, '2002-05-21', '2017-05-20', '2017-05-20', 1, NULL, 4, NULL, 1, NULL, 1, NULL, 2, 2, 1, NULL),
(150, NULL, 'PREFEITURA DE PILAR DO SUL', 'RALIP', '001/2002', 1, '', NULL, NULL, NULL, NULL, NULL, '2002-05-21', '2017-05-20', '2017-05-20', 1, NULL, 4, NULL, 1, NULL, 1, NULL, 2, 2, 1, NULL),
(151, NULL, 'Teste', 'Teste', '01/2156', 1, '', NULL, NULL, NULL, NULL, NULL, '2019-01-01', '2019-01-31', '2020-01-01', 1, NULL, 4, NULL, 1, NULL, 1, NULL, 1, 2, 1, NULL),
(152, NULL, 'Teste', 'Teste', '01/2156', 1, '', NULL, NULL, NULL, NULL, NULL, '2019-01-01', '2019-01-31', '2020-01-01', 1, NULL, 2, NULL, 1, NULL, 1, NULL, 1, 2, 1, NULL),
(153, '0.055528011', 'PREFEITURA DE BARUERI - Secretaria da Promoção Social', 'BB', 'inexibilidade nº 003/2016', 52, '56.546,20', 0, '0', 0, '0000-00-00', NULL, '2017-03-31', '2017-03-30', '2017-03-30', 84, NULL, 4, NULL, 1, 2, 56, '', 1, 2, 2, NULL),
(154, NULL, 'AISIN AUTOMOTIVE', 'BB', ' Não possui concorrência', 53, '', NULL, NULL, NULL, NULL, NULL, '2015-07-02', '2016-07-01', '2016-07-01', 85, 14, 4, NULL, 2, 2, 57, 'db4ccc9dd225b8346c66cc682b6a532d6167a2e7', 1, 2, 1, NULL),
(155, '1º aditamento', 'AISIN AUTOMOTIVE', 'BB', ' Não possui concorrência', 54, '', NULL, NULL, NULL, NULL, NULL, '2015-07-02', '2016-07-01', '2016-07-01', 86, NULL, 4, NULL, 2, 2, 58, '6d8fa4706ac03441551ffe2b58e5ce754ab7c544', 1, 2, 1, NULL),
(156, '2º aditamento', 'AISIN AUTOMOTIVE', 'BB', ' Não possui concorrência', 55, '', NULL, NULL, NULL, NULL, NULL, '2015-07-02', '2016-07-01', '2016-07-01', 87, NULL, 4, NULL, 2, 2, 59, 'd1016141baec62f2d78e91153c6668a3670674bc', 1, 2, 1, NULL),
(157, '3º Aditamento', 'AISIN AUTOMOTIVE', 'BB', ' Não possui concorrência', 56, '', NULL, NULL, NULL, NULL, NULL, '2016-09-01', '2017-09-01', '2017-09-01', 88, NULL, 4, NULL, 2, 2, 60, '61af54fa837954975cc3c1013a933cff7c59b9a6', 1, 2, 1, NULL),
(158, '4º Aditamento', 'AISIN AUTOMOTIVE', 'BB', ' Não possui concorrência', 57, '', NULL, NULL, NULL, NULL, NULL, '2017-02-01', '2018-02-01', '2018-02-01', 89, NULL, 4, NULL, 2, 2, 61, 'a0c8429264d71c22e96ce7a92125e2d1cee6d77b', 1, 2, 1, NULL),
(159, '5º Aditamento', 'AISIN AUTOMOTIVE', 'BB', ' Não possui concorrência', 58, '', NULL, NULL, NULL, NULL, NULL, '2017-06-12', '2018-06-12', '2018-06-12', 90, NULL, 4, NULL, 2, 2, 62, '495b0aeda6eaf241fd40fd2fbaf7b9e06cbbe6e5', 1, 2, 1, NULL),
(160, '6º Aditamento', 'AISIN AUTOMOTIVE', 'BB', ' Não possui concorrência', 59, '', NULL, NULL, NULL, NULL, NULL, '2018-02-01', '2019-02-01', '2019-02-01', 91, NULL, 4, NULL, 2, 2, 63, '0e9591dca96218cea7954e0c52c64113f29f930d', 1, 2, 1, NULL),
(161, '7º Aditamento', 'AISIN AUTOMOTIVE', 'BB', ' Não possui concorrência', 60, '', NULL, NULL, NULL, NULL, NULL, '2018-04-03', '2019-04-02', '2019-04-02', 92, NULL, 4, NULL, 2, 2, 64, '7a692cc6e1c3b2e82c093af071617b53dfce064d', 1, 2, 1, NULL),
(162, '8º Aditamento', 'AISIN AUTOMOTIVE', 'BB', ' Não possui concorrência', 61, '', NULL, NULL, NULL, NULL, NULL, '2019-03-01', '2020-03-01', '2020-03-01', 93, NULL, 4, NULL, 2, 2, 65, 'fd7aad27efcacdccaa8af1e26f934ffe1708a49f', 1, 2, 1, NULL),
(163, '9º Aditamento', 'AISIN AUTOMOTIVE', 'BB', ' Não possui concorrência', 62, '', NULL, NULL, NULL, NULL, NULL, '2019-07-04', '2020-07-04', '2020-07-04', 94, NULL, 4, NULL, 2, 2, 66, '5bfaf49e2e30ad02115f43215273017da4f66ea7', 1, 2, 1, NULL),
(164, '1º Aditamento', 'COMPETITIVIDADE', 'BB', ' Não possui concorrência', 63, '', NULL, NULL, NULL, NULL, NULL, '2016-03-01', '2018-01-10', '2018-01-10', 95, NULL, 4, NULL, 2, 2, 67, 'baca3bcde10c7316021cea5599f65d11a1729330', 1, 2, 1, NULL),
(165, '2º Aditamento', 'COMPETITIVIDADE', 'BB', ' Não possui concorrência', 64, '', NULL, NULL, NULL, NULL, NULL, '2017-04-27', '2018-01-10', '2018-01-10', 96, NULL, 4, NULL, 2, 2, 68, '9e39841b43850ad0f783921676eeaf17da2bc44d', 1, 2, 1, NULL),
(166, '3º Aditamento', 'COMPETITIVIDADE', 'BB', ' Não possui concorrência', 65, '', NULL, NULL, NULL, NULL, NULL, '2018-06-01', '2019-01-10', '2019-01-10', 97, NULL, 4, NULL, 2, 2, 69, '5fe59564390a65104b6fe7d068beee8f49cc0cba', 1, 2, 1, NULL),
(167, '4º Aditamento', 'COMPETITIVIDADE', 'BB', ' Não possui concorrência', 66, '', NULL, NULL, NULL, NULL, NULL, '2019-01-22', '2020-02-22', '2020-02-22', 98, NULL, 4, NULL, 2, 2, 70, 'ba888650ff6e1226a4f77bc34cd706744f5fdb9a', 1, 2, 1, NULL),
(168, NULL, 'BB', 'BARUERI VOLLEYBALL CLUB', '-', 67, '300.000,00', 6, 'R$ 50.000,00', 3, '2019-08-25', 3, '2019-08-13', '2020-02-15', '2020-01-26', 99, NULL, 4, NULL, 1, 2, 71, 'c46b4d41559dac08dcba27196c66df6cd8a69bb0', 1, 1, 1, NULL),
(169, '4º aditivo', 'BB ', 'AMIL ASSISTÊNCIA MÉDICA', ' Não possui concorrência', 68, '', NULL, NULL, NULL, NULL, NULL, '2019-02-01', '0000-00-00', '2020-02-01', 100, 19, 4, NULL, 2, 2, 72, '93cb33fafb5c1e584831979efa92ad9d596272c7', 1, 2, 1, NULL),
(170, '1456', 'BB', 'ACIB', ' Não possui concorrência', 69, '', NULL, NULL, NULL, NULL, NULL, '2002-03-19', '0000-00-00', '0000-00-00', 101, NULL, 4, NULL, 2, 2, 73, '6bb246ffb80a1682136bce9cff1f8925fba03336', 1, 2, 1, NULL),
(171, '6º Aditivo', 'BB', 'AMIL DENTAL', 'Não possui concorrência', 70, '', NULL, NULL, NULL, NULL, NULL, '2019-12-01', '2020-12-01', '2020-12-01', 102, NULL, 4, NULL, 2, 2, 74, '', 1, 2, 1, NULL),
(172, NULL, 'SÃO JOÃO', 'BB', 'DISPENSA 24/2019', 71, '', NULL, NULL, NULL, NULL, NULL, '2019-05-27', '2020-05-27', '2020-05-27', 103, NULL, 4, NULL, 1, 2, 75, '', 1, 2, 1, NULL),
(173, NULL, 'ASSOCIAÇÃO PORTA DO SOL - APAPS', 'BB', ' Não possui concorrência', 72, '', NULL, NULL, NULL, NULL, NULL, '2018-09-01', '2019-09-01', '2019-09-01', 104, 20, 4, NULL, 2, 2, 1, NULL, 1, 2, 1, NULL),
(174, '1º aditamento', 'ASSOCIAÇÃO PORTA DO SOL - APAPS', 'BB', ' Não possui concorrência', 73, '', NULL, NULL, NULL, NULL, NULL, '2019-09-01', '2020-09-01', '2020-09-01', 105, NULL, 4, NULL, 2, 2, 76, '', 1, 2, 1, NULL),
(175, 'BHZ0345/19', 'BB', 'LOCALIZA FLEET', ' Não possui concorrência', 74, '', NULL, NULL, NULL, NULL, NULL, '2019-11-05', '2020-11-05', '2020-11-05', 106, NULL, 4, NULL, 2, 2, 77, '', 1, 2, 1, NULL),
(176, '244/2020', 'PREFEITURA MUNICIPAL DE BARUERI', 'BB TRANSPORTE E TURISMO LTDA', 'Proc Inexibilidade SUPRI nº 003/2020', 1, '54.000,00', NULL, NULL, NULL, NULL, NULL, '2020-05-20', '2021-05-19', '2021-05-19', 1, NULL, NULL, NULL, 1, NULL, 1, NULL, 1, 2, 1, 1),
(177, '244/2020', 'PREFEITURA MUNICIPAL DE BARUERI', 'BB TRANSPORTE E TURISMO LTDA', 'Proc Inexibilidade SUPRI nº 003/2020', 1, '54.000,00', NULL, NULL, NULL, NULL, NULL, '2020-05-20', '2021-05-19', '2021-05-19', 1, NULL, NULL, NULL, 1, NULL, 1, NULL, 1, 2, 1, 1),
(181, '244/2020', 'Prefeitura Municipal de Barueri', 'BB Transporte e Turismo Ltda', 'Proc Inexigibilidade SUPRI nº 003/2020', 1, '54.000,00', NULL, NULL, NULL, NULL, NULL, '2020-05-20', '2021-05-19', '2021-05-20', 1, NULL, NULL, NULL, 1, NULL, 1, NULL, 1, 2, 1, 1),
(182, '244/2020', 'Prefeitura Municipal de Barueri', 'BB Transporte e Turismo Ltda', 'Proc Inexigibilidade SUPRI nº 003/2020', 1, '54.000,00', NULL, NULL, NULL, NULL, NULL, '2020-05-20', '2021-05-19', '2021-05-20', 1, NULL, NULL, NULL, 1, NULL, 1, NULL, 1, 2, 1, 1),
(183, '244/2020', 'Prefeitura Municipal de Barueri', 'BB Transporte e Turismo Ltda', 'Proc Inexigibilidade SUPRI nº 003/2020', 1, '54.000,00', NULL, NULL, NULL, NULL, NULL, '2020-05-20', '2021-05-19', '2021-05-20', 1, NULL, NULL, NULL, 1, NULL, 1, NULL, 1, 2, 1, 1),
(184, '244/2020', 'Prefeitura Municipal de Barueri', 'BB Transporte e Turismo Ltda', 'Proc Inexigibilidade SUPRI nº 003/2020', 1, '54.000,00', NULL, NULL, NULL, NULL, NULL, '2020-05-20', '2021-05-19', '2021-05-20', 1, NULL, NULL, NULL, 1, NULL, 1, NULL, 1, 2, 1, 1),
(185, '0.120792079', 'Prefeitura de Barueri', 'BB', 'Proc Inexibilidade SUPRI nº 003/2020', 75, '54.000,00', 0, '0', 0, '0000-00-00', NULL, '2020-05-20', '2021-05-19', '2021-05-19', 107, NULL, 4, NULL, 1, 2, 78, '8bf2e3d3b7ce6b42670b863aa7f14110def469c7', 1, 2, 2, 1),
(186, '242/2020', 'Prefeitura Municipal de Barueri', 'BB Transporte e Turismo LTDA', 'Proc Inexibilidade SUPRI nº 004/2020', 76, '54.000,00', NULL, NULL, NULL, NULL, NULL, '2020-05-20', '2021-05-19', '2021-05-19', 108, NULL, 4, NULL, 1, 2, 79, 'ccc0ad07d6bf31a7be435cb42478a8a38ec5be79', 1, 2, 1, 1),
(187, '662/2020', 'Prefeitura Municipal de Barueri', 'BB Transporte e Turismo Ltda', 'Proc Inexibilidade nº 034/2017', 77, '189.000,00', NULL, NULL, NULL, NULL, NULL, '2020-10-24', '2021-10-23', '2021-10-23', 109, NULL, 4, NULL, 1, 2, 80, NULL, 1, 2, 2, 1),
(188, '0.311045071', 'Prefeitura de Barueri', 'BBTT', 'Inexigibilidade 034/2017', 78, '81.940,50', 0, '0', 0, '0000-00-00', NULL, '2019-10-24', '2020-10-23', '2020-10-23', 110, NULL, 4, NULL, 1, 2, 81, '4a62c31449c14d08bb322b6223348fe27ccdcf76', 1, 2, 2, 3),
(189, '728/2017', 'Prefeitura Municipal de Barueri', 'BB Transporte e Turismo Ltda', 'Inexibilidade 042/2017', 79, '2.772.000,00', NULL, NULL, NULL, NULL, NULL, '2017-11-13', '2018-11-12', '2018-11-12', 111, 23, 4, NULL, 1, 2, 82, '48c6f32c522abbf1d51303d4ff85848fa1e3a4d8', 1, 2, 1, 3),
(190, '830/2018 - 1º aditam', 'Prefeitura Municupal de Barueri', 'BB Transporte e Turismo LTDA', 'Proc Inexigibilidade nº 042/2017', 80, '2.897.100,00', NULL, NULL, NULL, NULL, NULL, '2018-11-06', '2019-11-05', '2019-11-05', 112, NULL, 4, NULL, 1, 2, 83, 'e5f7eca1b8173c4eb22d4f029169e5567212d14f', 1, 2, 2, 3),
(191, '671/2019 - 2º aditam', 'Prefeitura Municipal de Barueri', 'BB Transporte e Turismo Ltda', 'Proc Inexigibilidade nº 042/2017', 81, '2.970.000,00', NULL, NULL, NULL, NULL, NULL, '2019-11-13', '2020-11-12', '2020-11-12', 113, NULL, 4, NULL, 1, 2, 84, 'fee9c3946c467432b28dca9acd21a446702fea40', 1, 2, 2, 3),
(192, '830/2018', 'Prefeitura Municipal de Barueri', 'BB Transporte e Turismo Ltda', 'Proc Inexigibilidade nº 042/2017', 82, '2.897.100,00', NULL, NULL, NULL, NULL, NULL, '2018-11-06', '2019-11-05', '2019-11-05', 114, NULL, 4, NULL, 1, 2, 85, 'bc38b8cd99540b296073f0b0d12a15cdf3874cd8', 1, 2, 1, 3),
(193, '671/2019', 'Prefeitura Municipal de Barueri', 'BB Transporte e Turismo Ltda', 'Proc Inexigibilidade nº 042/2017', 83, '2.970.000,00', NULL, NULL, NULL, NULL, NULL, '2019-11-13', '2020-11-12', '2020-11-12', 115, NULL, 4, NULL, 1, 2, 86, '7c74ae97107f4619e05cfa8a2470b6161f00488d', 1, 2, 1, 3),
(194, '449/2020', 'Prefeitura de Barueri', 'BBTT ', 'Proc Inexigibilidade nº 042/2017', 84, '', NULL, NULL, NULL, NULL, NULL, '2020-11-13', '2021-11-12', '2021-11-12', 116, NULL, 4, NULL, 1, 2, 87, 'eb67010760d97e892f995dbf3084db1898f924fb', 1, 2, 1, 3),
(195, '059/2019', 'Prefeitura de Barueri', 'BBTT', 'Proc Inexigibilidade nº 001/2019', 85, '486.000,00', NULL, NULL, NULL, NULL, NULL, '2019-02-11', '2020-02-10', '2020-02-10', 117, 24, 4, NULL, 1, 2, 88, '33ba2412201647575ab22e7a2732a9d5e2d9c6ee', 1, 2, 1, 3),
(196, '61/2020', 'Prefeitura de Barueri ', 'BBTT', 'Proc Inexigibilidade 001/2019', 86, '486.000,00', NULL, NULL, NULL, NULL, NULL, '2020-02-07', '2021-02-06', '2021-02-06', 118, NULL, 4, NULL, 1, 2, 89, 'dad8285fd7c80ce26cc125b956b8ece9f1421cb9', 1, 2, 1, 3),
(197, '256/2017', 'Prefeitura de Barueri', 'BBTT', 'Proc Inexigibilidade nº 015/2017', 87, '16.786.000,00', NULL, NULL, NULL, NULL, NULL, '2017-06-30', '2018-06-29', '2018-06-26', 119, 29, 4, NULL, 1, 2, 90, 'b4b29318e227e9be4d8a6752e0986f10dc35dde0', 1, 2, 1, 3),
(198, '485/2017', 'Prefeitura de Barueri', 'BBTT', 'Proc Inexigibilidade 015/2017', 88, '10.860.080,00', NULL, NULL, NULL, NULL, NULL, '2017-06-30', '2018-06-29', '2018-06-29', 120, NULL, 4, NULL, 1, 2, 91, '34717716bef5b73554349fc2887947b1e223fa1a', 1, 2, 1, 3),
(199, '413/2018', 'Prefeitura de Barueri', 'BBTT', 'Proc Inexigibilidade nº 015/2017', 89, '11.256.740,00', NULL, NULL, NULL, NULL, NULL, '2018-06-28', '2019-06-27', '2019-06-27', 121, NULL, 4, NULL, 1, 2, 92, '6e5dd43cd03a786457e3cb5e0fd8252b0585609b', 1, 2, 1, 3),
(200, '0.164933135', 'Prefeitura de Barueri', 'BBTT', 'Proc Inexigibilidade nº 015/2017', 90, '11.697.400,00', 0, '0', 0, '0000-00-00', NULL, '2019-06-28', '2020-06-27', '2020-06-27', 122, NULL, 4, NULL, 1, 2, 93, 'b6ec940825a7013b4cba2a7b47d6946bdf78aa90', 1, 2, 2, 3),
(201, '333/2019', 'Prefeitura de Barueri', 'BBTT', 'Proc Inexigibilidade nº 015/2017', 91, '11.697.400,00', NULL, NULL, NULL, NULL, NULL, '2019-06-28', '2020-06-27', '2020-06-27', 123, NULL, 4, NULL, 1, 2, 94, '1e632321a407cf7759e55c4ab57d39c7d3c9270c', 1, 2, 1, 3),
(202, '361/2020', 'Prefeitura de Barueri', 'BBTT', 'Proc Inexigibilidade 015/2017', 92, '8.773.050,00', NULL, NULL, NULL, NULL, NULL, '2020-06-30', '2021-06-29', '2021-06-29', 124, NULL, 4, NULL, 1, 2, 95, '5ed94a566de43a913b3170c6127c5a8c9eac5d4f', 1, 2, 1, 3),
(204, '451/2019', 'Prefeitura de Barueri', 'BBTT', 'Proc Inexigibilidade 032/2018', 93, '1.470.600,00', NULL, NULL, NULL, NULL, NULL, '2019-08-10', '2020-08-09', '2020-08-09', 125, NULL, 4, NULL, 1, 2, 96, '3e5936b34b76b4ca64b1f0342e4c9caf44753554', 1, 2, 1, 3),
(205, '488/2020', 'Prefeitura de Barueri', 'BBTT', 'Proc inexigibilidade 032/2018', 94, '1.102.950,00', NULL, NULL, NULL, NULL, NULL, '2020-08-03', '2021-08-02', '2021-08-02', 126, NULL, 4, NULL, 1, 2, 97, 'f40eb69f8773df5b0dd0fecfab91075ba28334f0', 1, 2, 1, 3),
(207, '84/0016', 'Prefeitura de Barueri', 'BBTT', 'Proc Inexigibilidade 02/2016', 95, '1.784.979,20', NULL, NULL, NULL, NULL, NULL, '2016-03-02', '2017-03-21', '2017-03-21', 127, NULL, 4, NULL, 1, 2, 98, '954480515b795af823afd3a9123e847e36692f89', 1, 2, 2, 3),
(208, '84/2016', 'Prefeitura de Barueri', 'BBTT', 'Proc Inexigibilidade', 96, '1.784.989,20', NULL, NULL, NULL, NULL, NULL, '2016-03-02', '2017-03-21', '2017-03-21', 128, 35, 4, NULL, 1, 2, 99, '8d693a72c699e4fded42dcd69e68421987d23d29', 1, 2, 1, 3),
(209, '68/2017', 'Prefeitura de Barueri', 'BBTT', 'Proc Inexigibilidade 02/2016', 97, '1.972.882,80', NULL, NULL, NULL, NULL, NULL, '2017-03-02', '2018-03-02', '2018-03-02', 129, NULL, 4, NULL, 1, 2, 100, '11a1fec5dd79a488d666467625fe5117834f6f0f', 1, 2, 1, 3),
(210, '81/2018', 'Prefeitura de Barueri', 'BBTT', 'Proc inexigibilidade 02/2016', 98, '2.043.342,90', NULL, NULL, NULL, NULL, NULL, '2018-03-02', '2019-03-01', '2019-03-01', 130, NULL, 4, NULL, 1, 2, 101, '327db25d57f2d662590b98d7712ceeb52a2c8614', 1, 2, 1, 3),
(211, '95/2019', 'Prefeitura de Barueri', 'BBTT', 'Proc Inexigibilidade 02/2016', 99, '2.113.803,00', NULL, NULL, NULL, NULL, NULL, '2019-03-02', '2020-03-01', '2020-03-01', 131, NULL, 4, NULL, 1, 2, 102, '413023c6620e0c8f0be6f22ec7760c91d5a2b70c', 1, 2, 1, 3),
(212, '95/2020', 'Prefeitura de Barueri', 'BBTT', 'Proc Inexigibilidade 02/2016', 100, '1.327.000,00', NULL, NULL, NULL, NULL, NULL, '2020-03-02', '2021-03-01', '2021-03-01', 132, NULL, 4, NULL, 1, 2, 103, 'b163daff434c5842d276d2bc488fd38cb38bd443', 1, 2, 1, 3),
(213, '112/2017', 'Prefeitura de Barueri', 'BBTT', 'Proc Inexigibilidade 03/2016', 101, '56.546,20', NULL, NULL, NULL, NULL, NULL, '2017-03-31', '2018-03-30', '2018-03-30', 133, NULL, 4, NULL, 1, 2, 104, '994b0b1a2bcecd8324699921f34f5aa53faf6585', 1, 2, 1, 3),
(214, '142/2018', 'Prefeitura de Barueri', 'BBTT', 'Proc Inexigibilidade 03/2016', 102, '41.672,50', NULL, NULL, NULL, NULL, NULL, '2018-03-27', '2019-03-26', '2019-03-26', 134, NULL, 4, NULL, 1, 2, 105, '1cc9c1baf2bc981d2ed01022b35a69e08937c648', 1, 2, 1, 3),
(216, '130/2019', 'Prefeitura de Barueri - Secretaria de Promoção Social', 'BBTT', 'Proc Inexigibilidade 03/2016', 103, '27.891,40', NULL, NULL, NULL, NULL, NULL, '2019-03-29', '2019-12-28', '2019-09-28', 135, NULL, 4, NULL, 1, 2, 106, '7277c6a681613e241072d19046b8fe38eef8d869', 1, 2, 1, 3),
(217, '793/2019', 'Prefeitura de Barueri - Secretaria de Promoção Social', 'BBTT', 'Proc Inexigibilidade 03/2016', 104, '135.000,00', NULL, NULL, NULL, NULL, NULL, '2019-12-31', '2020-12-30', '2020-12-30', 136, NULL, 4, NULL, 1, 2, 107, '31734927adb3d3070be2cc6aafdba9c18e3f3956', 1, 2, 1, 3),
(218, '572/2018', 'Prefeitura de Barueri - Secretaria de Saude', 'BBTT', 'Proc inexigibilidade 024/2017', 105, '182.486,85', NULL, NULL, NULL, NULL, NULL, '2018-08-14', '2019-08-13', '2018-08-13', 137, NULL, 4, NULL, 1, 2, 108, '7d8117de17e6bec80c11a9593ee394f81831c561', 1, 2, 1, 3),
(219, '448/2019', 'Prefeitura de Barueri - Secretaria de Saúde', 'BBTT', 'Proc Inexigibilidade 024/2017', 106, '168.116,25', NULL, NULL, NULL, NULL, NULL, '2019-08-14', '2020-08-13', '2020-08-13', 138, NULL, 4, NULL, 1, 2, 109, '7aa6b911f0737b324562cf9d72a5ba182d03c187', 1, 2, 1, 3),
(220, '525/2020', 'Prefeitura de Barueri - Secretaria de Saúde', 'BBTT', 'Proc Inexigibilidade 024/2047', 107, '126.085,50', NULL, NULL, NULL, NULL, NULL, '2020-08-14', '2021-08-13', '2021-08-13', 139, NULL, 4, NULL, 1, 2, 110, '1abce885a46207599be64419eaf1c51243a775a8', 1, 2, 1, 3),
(221, '110/2020', 'Prefeitura de Barueri - Secretaria de Ass e Des social', 'BBTT', 'Proc inexigibilidade 001/2020', 108, '54.000,00', NULL, NULL, NULL, NULL, NULL, '2020-03-13', '2021-03-12', '2021-03-12', 141, NULL, 4, NULL, 1, 2, 111, 'bc7e85230a2006e0cfa58359eaac8c7093e0cf1f', 1, 2, 1, 3),
(222, '0.387512388', 'Prefeitura de Barueri - Secretaria da Industria, comercio e trabalho', 'BBTT', 'Proc inexigibilidade 040/2018', 109, '1.148.400,00', 0, '0', 0, '0000-00-00', NULL, '2018-10-17', '2019-10-16', '2019-10-16', 142, NULL, 4, NULL, 1, 2, 112, '3f35e4d28931c6e6a8760c5facfdc2cb24561b87', 1, 2, 2, 3),
(223, '782/2018', 'Prefeitura de Barueri - Secretaria da Industria, comércio e trabalho', 'BBTT', 'Proc Inexigibilidade 040/2018', 110, '1.148.400,00', NULL, NULL, NULL, NULL, NULL, '2018-10-17', '2019-10-16', '2019-10-16', 143, 43, 4, NULL, 1, 2, 113, '86fd8fffbb007186e6363a121df80b5f89ae98dd', 1, 2, 1, 3),
(224, '604/2019', 'Prefeitura de Barueri - Secretaria da Industria, comercio e trabalho', 'BBTT', 'Proc Inexigibilidade 040/2018', 111, '1.188.000,00', NULL, NULL, NULL, NULL, NULL, '2019-10-17', '2020-10-16', '2020-10-16', 144, NULL, 4, NULL, 1, 2, 114, '6b079d7884bc8891ca2f9707f98a36232b0d4027', 1, 2, 1, 3),
(225, '007/2017', 'FIEB', 'BBTT', 'Inexigibilidade', 112, '479.959,20', NULL, NULL, NULL, NULL, NULL, '2017-05-21', '2018-05-21', '2018-05-21', 145, 46, 4, NULL, 1, 2, 115, '21076be0b5cc30ec27801f767fa14d753875ebb3', 1, 2, 1, 3),
(226, '012/2018', 'FIEB', 'BBTT', 'Inexigibilidade', 113, '497.100,60', NULL, NULL, NULL, NULL, NULL, '2018-05-22', '2019-05-21', '2019-05-21', 146, NULL, 4, NULL, 1, 2, 116, '7acdce6c36dd8abecc8241720e38f6e8d5350d54', 1, 2, 1, 3),
(227, '016/2019', 'FIEB', 'BBTT', 'Inexigibilidade', 114, '514.242,00', NULL, NULL, NULL, NULL, NULL, '2019-05-22', '2020-05-21', '2020-05-21', 147, NULL, 4, NULL, 1, 2, 117, '4ad92591d7e32c9f165d7d9ffe06f396dd43f9ba', 1, 2, 1, 3),
(228, '013/2020', 'FIEB', 'BBTT', 'Inexigibilidade', 115, '514.242,00', NULL, NULL, NULL, NULL, NULL, '2020-05-22', '2021-05-21', '2021-05-21', 148, NULL, 4, NULL, 1, 2, 118, 'eb92fa9a633de2d7f521cda6ed224c2f4d306172', 1, 2, 1, 3),
(229, '05/2020', 'FIEB', 'BBTT', 'Inexigibilidade', 116, '1.080.000,00', NULL, NULL, NULL, NULL, NULL, '2020-02-18', '2021-02-17', '2021-02-17', 149, NULL, 4, NULL, 1, 2, 119, 'f2664ba6af7722f70134f0141a533335aabf0f3a', 1, 2, 1, 3),
(230, '05/2014', 'BBTT', 'Prefeitura de Barueri', '-', 117, '', NULL, NULL, NULL, NULL, NULL, '2014-06-26', '2019-06-25', '2019-06-25', 150, 47, 4, NULL, 1, 2, 120, '176a6720440faadde8016fec7c511083ea8f6eb2', 1, 2, 1, 3),
(231, '16/2014', 'BBTT', 'Prefeitura de Barueri', '-', 118, '', NULL, NULL, NULL, NULL, NULL, '2014-06-26', '2019-06-25', '2019-06-25', 151, NULL, 4, NULL, 1, 2, 121, 'ee8db8799e424c530ab9ca34ed1a01e60a04747c', 1, 2, 1, 3),
(232, '697/2018', 'Prefeitura de Barueri - Secretaria de Promoção social', 'BBTT', 'Proc inexigibilidade 034/2017', 119, '163.159,80', NULL, NULL, NULL, NULL, NULL, '2018-10-24', '2019-10-24', '2019-10-24', 152, NULL, 4, NULL, 1, 2, 122, '0d6ae36573cfec05bfc83e01a719ae744d21d484', 1, 2, 1, 3),
(233, '628/2019', 'Prefeitura de Barueri - Secretaria de Promoção Social', 'BBTT', 'Proc inexigibilidade 034/2017', 120, '81.940,50', NULL, NULL, NULL, NULL, NULL, '2019-10-24', '2020-10-23', '2020-10-23', 153, NULL, 4, NULL, 1, 2, 123, 'e7c9d46e668870db7d61f1ca920bf63deb395b19', 1, 2, 1, 3),
(234, '244/2020', 'Prefeitura de Barueri - Secretaria de Ass e Des Social', 'BBTT', 'Proc Inexigibilidade 003/2020', 121, '54.000,00', NULL, NULL, NULL, NULL, NULL, '2020-05-20', '2021-05-19', '2021-05-19', 154, NULL, 4, NULL, 1, 2, 124, 'b46b3503ac0980af4755a614554c8474ec0092ea', 1, 2, 1, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresa_contrato`
--

CREATE TABLE `empresa_contrato` (
  `ID_EMPRESA_CONTRATO` int(11) NOT NULL,
  `DESC_EMPRESA_CONTRATO` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `empresa_contrato`
--

INSERT INTO `empresa_contrato` (`ID_EMPRESA_CONTRATO`, `DESC_EMPRESA_CONTRATO`) VALUES
(1, 'BB TRANSPORTE E TURISMO LTDA'),
(2, 'RALIP TRANSPORTES RODOVIARIOS LTDA');

-- --------------------------------------------------------

--
-- Estrutura da tabela `finalizacao_contrato`
--

CREATE TABLE `finalizacao_contrato` (
  `ID_FINALIZACAO_CONTRATO` int(11) NOT NULL,
  `DESC_FINALIZACAO_CONTRATO` char(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `finalizacao_contrato`
--

INSERT INTO `finalizacao_contrato` (`ID_FINALIZACAO_CONTRATO`, `DESC_FINALIZACAO_CONTRATO`) VALUES
(1, 'SIM'),
(2, 'NAO');

-- --------------------------------------------------------

--
-- Estrutura da tabela `garantia`
--

CREATE TABLE `garantia` (
  `ID_GARANTIA` int(11) NOT NULL,
  `DESC_GARANTIA` varchar(2000) NOT NULL,
  `ID_CONTRATO_GARANTIA` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `garantia`
--

INSERT INTO `garantia` (`ID_GARANTIA`, `DESC_GARANTIA`, `ID_CONTRATO_GARANTIA`) VALUES
(1, '', NULL),
(37, '', NULL),
(38, '', NULL),
(39, '', NULL),
(40, 'TESTE.GAR', NULL),
(41, 'TESTE', NULL),
(42, '', NULL),
(43, '', NULL),
(44, 'Outorga R$ 1.160.000,00', NULL),
(45, '', NULL),
(46, '', NULL),
(47, '', NULL),
(48, '', NULL),
(49, 'TESTE_TESTE', NULL),
(50, 'GFSDFSDFSD', NULL),
(51, 'FGSDFSD', NULL),
(52, 'fsfdsfsdfsd', NULL),
(53, 'gdgfg', NULL),
(54, 'fsdfdsf', NULL),
(55, 'sdfsd', NULL),
(56, 'TESTE GARANTIA', NULL),
(57, 'TESTE_GARANTIA', 122),
(58, '0', 123),
(59, 'teste', 124),
(60, '', 118),
(61, 'TesteX', 126),
(62, '', 127),
(63, '', 128),
(64, '', 129),
(65, '', 130),
(66, '', 131),
(67, '', 132),
(68, '', 133),
(69, 'Garantia de R$ 60.264,00 pela apólice nº 0775.60.153-2 da Porto Seguro de 11/02/2019 a 11/02/2020', 134),
(70, '', 135),
(71, '', 136),
(72, '', 137),
(73, '', 138),
(74, '', 139),
(75, 'APÓLICE 0775.60.113-3 DE 11/06/2018 A 11/06/2019', 140),
(76, '', 141),
(77, '', 142),
(78, '', 143),
(79, '', 144),
(80, '', 145),
(81, '', 146),
(82, '', 147),
(83, '', 148),
(84, '', 153),
(85, '', 154),
(86, '', 155),
(87, '', 156),
(88, '', 157),
(89, '', 158),
(90, '', 159),
(91, '', 160),
(92, '', 161),
(93, '', 162),
(94, '', 163),
(95, '', 164),
(96, '', 165),
(97, '', 166),
(98, '', 167),
(99, '', 168),
(100, '', 169),
(101, '', 170),
(102, '', 171),
(103, '', 172),
(104, '', 173),
(105, '', 174),
(106, '', 175),
(107, '', 185),
(108, '', 186),
(109, '', 187),
(110, '', 188),
(111, '', 189),
(112, '', 190),
(113, '', 191),
(114, '', 192),
(115, '', 193),
(116, '', 194),
(117, '', 195),
(118, '', 196),
(119, '', 197),
(120, '', 198),
(121, '', 199),
(122, '', 200),
(123, '', 201),
(124, '', 202),
(125, '', 204),
(126, '', 205),
(127, '', 207),
(128, '', 208),
(129, '', 209),
(130, '', 210),
(131, '', 211),
(132, '', 212),
(133, '', 213),
(134, '', 214),
(135, '', 216),
(136, '', 217),
(137, '', 218),
(138, '', 219),
(139, '', 220),
(140, '', 220),
(141, '', 221),
(142, '', 222),
(143, '', 223),
(144, '', 224),
(145, '', 225),
(146, '', 226),
(147, '', 227),
(148, '', 228),
(149, '', 229),
(150, '', 230),
(151, '', 231),
(152, '', 232),
(153, '', 233),
(154, '', 234);

-- --------------------------------------------------------

--
-- Estrutura da tabela `log`
--

CREATE TABLE `log` (
  `ID_LOG` int(11) NOT NULL,
  `ID_TIPO_LOG` int(11) NOT NULL,
  `DATA_LOG` date NOT NULL,
  `HORA_LOG` time NOT NULL,
  `ID_LOGIN_LOG` int(11) NOT NULL,
  `IP_LOG` varchar(45) NOT NULL,
  `MAC_ADDRESS_LOG` varchar(45) DEFAULT NULL,
  `ID_CONTRATO` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `log`
--

INSERT INTO `log` (`ID_LOG`, `ID_TIPO_LOG`, `DATA_LOG`, `HORA_LOG`, `ID_LOGIN_LOG`, `IP_LOG`, `MAC_ADDRESS_LOG`, `ID_CONTRATO`) VALUES
(3, 15, '2019-10-02', '16:02:01', 4, '192.168.0.248', NULL, NULL),
(4, 14, '2019-10-02', '16:05:30', 4, '192.168.0.248', NULL, NULL),
(5, 15, '2019-10-02', '16:06:17', 4, '192.168.0.248', NULL, NULL),
(6, 14, '2019-10-03', '13:49:31', 4, '192.168.0.109', NULL, NULL),
(7, 15, '2019-10-03', '13:53:12', 2, '192.168.0.248', NULL, NULL),
(8, 14, '2019-10-03', '14:01:45', 4, '192.168.0.248', NULL, NULL),
(9, 15, '2019-10-03', '17:12:18', 2, '192.168.0.248', NULL, NULL),
(10, 14, '2019-10-03', '17:13:14', 4, '192.168.0.248', NULL, NULL),
(11, 15, '2019-10-03', '17:19:07', 4, '192.168.0.248', NULL, NULL),
(12, 15, '2019-10-03', '17:27:51', 1, '192.168.0.248', NULL, NULL),
(13, 14, '2019-10-04', '10:29:34', 4, '192.168.0.253', NULL, NULL),
(14, 15, '2019-10-04', '10:32:48', 4, '192.168.0.253', NULL, NULL),
(15, 15, '2019-10-07', '09:39:03', 3, '192.168.0.248', NULL, NULL),
(16, 14, '2019-10-07', '09:39:26', 4, '192.168.0.248', NULL, NULL),
(17, 15, '2019-10-07', '09:56:13', 4, '192.168.0.248', NULL, NULL),
(18, 14, '2019-10-16', '09:43:16', 4, '192.168.0.253', NULL, NULL),
(19, 14, '2019-10-30', '15:07:43', 4, '192.168.0.253', NULL, NULL),
(20, 14, '2019-10-31', '11:19:09', 4, '192.168.0.253', NULL, NULL),
(21, 14, '2019-11-03', '04:05:42', 4, '192.168.0.253', NULL, NULL),
(22, 14, '2019-11-04', '17:41:46', 4, '192.168.0.253', NULL, NULL),
(23, 14, '2019-11-06', '10:58:19', 4, '192.168.0.253', NULL, NULL),
(24, 15, '2019-11-06', '13:17:42', 3, '192.168.0.248', NULL, NULL),
(25, 14, '2019-11-06', '13:19:47', 1, '192.168.0.248', NULL, NULL),
(26, 15, '2019-11-06', '13:19:58', 1, '192.168.0.248', NULL, NULL),
(27, 14, '2019-11-25', '18:33:41', 4, '192.168.0.248', NULL, NULL),
(28, 14, '2019-11-26', '09:40:10', 4, '192.168.0.248', NULL, NULL),
(29, 15, '2019-11-26', '10:11:41', 2, '192.168.0.248', NULL, NULL),
(30, 14, '2019-11-26', '10:12:00', 4, '192.168.0.248', NULL, NULL),
(31, 15, '2019-11-26', '10:13:48', 4, '192.168.0.248', NULL, NULL),
(32, 14, '2019-12-04', '23:16:12', 4, '192.168.0.248', NULL, NULL),
(33, 14, '2019-12-06', '16:57:21', 4, '192.168.0.248', NULL, NULL),
(34, 15, '2019-12-06', '17:01:18', 4, '192.168.0.248', NULL, NULL),
(35, 14, '2019-12-06', '17:01:46', 4, '192.168.0.248', NULL, NULL),
(36, 15, '2019-12-06', '17:03:21', 4, '192.168.0.248', NULL, NULL),
(37, 14, '2019-12-25', '21:47:24', 4, '192.168.0.208', NULL, NULL),
(38, 15, '2019-12-25', '21:54:04', 4, '192.168.0.208', NULL, NULL),
(39, 14, '2020-10-20', '16:15:01', 4, '192.168.0.93', NULL, NULL),
(40, 14, '2020-10-21', '08:30:27', 5, '192.168.0.248', NULL, NULL),
(41, 14, '2020-10-21', '08:33:00', 5, '192.168.0.91', NULL, NULL),
(42, 14, '2020-10-21', '10:45:06', 5, '192.168.0.91', NULL, NULL),
(43, 14, '2020-10-21', '14:16:48', 4, '192.168.0.91', NULL, NULL),
(44, 14, '2020-10-21', '14:44:48', 5, '192.168.0.91', NULL, NULL),
(45, 14, '2020-10-21', '14:48:49', 4, '192.168.0.91', NULL, NULL),
(46, 15, '2020-10-21', '15:26:23', 4, '192.168.0.91', NULL, NULL),
(47, 14, '2020-10-21', '15:29:46', 4, '192.168.0.91', NULL, NULL),
(48, 15, '2020-10-21', '15:58:56', 4, '192.168.0.91', NULL, NULL),
(49, 14, '2020-10-22', '07:49:51', 4, '192.168.0.88', NULL, NULL),
(50, 14, '2020-10-27', '15:03:19', 4, '192.168.0.88', NULL, NULL),
(51, 14, '2020-10-28', '10:36:01', 4, '192.168.0.88', NULL, NULL),
(52, 14, '2020-10-30', '09:40:02', 4, '192.168.0.92', NULL, NULL),
(53, 15, '2020-11-10', '15:05:28', 5, '192.168.0.123', NULL, NULL),
(54, 14, '2020-11-11', '08:14:28', 4, '192.168.0.123', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `login`
--

CREATE TABLE `login` (
  `ID_LOGIN` int(11) NOT NULL,
  `ID_USUARIO_LOGIN` int(11) NOT NULL,
  `USUARIO_LOGIN` varchar(20) NOT NULL,
  `SENHA_LOGIN` varchar(60) NOT NULL,
  `ID_TIPO_ACESSO_LOGIN` int(11) NOT NULL,
  `ID_TIME_LOGIN` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `login`
--

INSERT INTO `login` (`ID_LOGIN`, `ID_USUARIO_LOGIN`, `USUARIO_LOGIN`, `SENHA_LOGIN`, `ID_TIPO_ACESSO_LOGIN`, `ID_TIME_LOGIN`) VALUES
(1, 1, 'jrubens', '123', 1, NULL),
(2, 2, 'jonathan', '123456', 1, NULL),
(3, 3, 'edson', '654321', 1, NULL),
(4, 4, 'virginiajur19', '654882j', 1, NULL),
(5, 6, 'danijur20', '654320j', 3, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `objeto`
--

CREATE TABLE `objeto` (
  `ID_OBJETO` int(11) NOT NULL,
  `DESC_OBJETO` varchar(2000) NOT NULL,
  `ID_CONTRATO_OBJETO` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `objeto`
--

INSERT INTO `objeto` (`ID_OBJETO`, `DESC_OBJETO`, `ID_CONTRATO_OBJETO`) VALUES
(1, '', NULL),
(18, 'Prestação de serviços de tratamento odontológico familiar aos trabalhadores e dependentes até 21 anos, empregados ou prestadores de serviços', NULL),
(20, '', NULL),
(21, 'TESTE OBJET', NULL),
(22, 'TESTE', NULL),
(23, 'Aquisição de créditos eletrônicos das linhas municipais de Barueri referente a vale transportes para utilização dos estudantes do ano letivo de 2019 - R$ 2,25 cada crédito', NULL),
(24, 'Aquisição de créditos eletrônicos das linhas municipais de ônibus referentes a vale transportes crédito Benfácil com Integração CPTM (R$ 7,00) e cartão Benfácil (R$ 4,20) destinados a servidores municipais', NULL),
(25, 'Concessão Onerosa do lote 2 para exploração dos serviços do Sistema Municipal de Transporte Público Coletivo de Barueri', NULL),
(26, 'TESTE_OBJ', 122),
(27, '0', 123),
(28, 'teste', 124),
(29, 'Memorando de entendimentos (MOU) para cessão do uso de espaço em veículos automotores para acesso à internet via Wi Fi e exploração de mídia publicitária em aparelhos televisivos', 118),
(30, 'TesteX', 126),
(31, 'Fornecimento de 660.000 de créditos para pessoas com deficiência (tarifa 4,20)', 127),
(32, 'Aditamento contrato 728/2017 para prorrogação de prazo', 128),
(33, 'Fornecimento de 47.400 créditos para pessoas em acompanhamento psicossocial e gestantes em unidades de saúde e CAPS/CRAD', 129),
(34, 'Aditamento ao contrato 405/2017 para prorrogação de prazo e aproveitamento de saldo de R$ 182.486,85', 130),
(35, 'Fornecimento de créditos de refeição\nValor facial no contrato: R$ 506,00\nBB Barueri - 717\nBB Jandira: 721\nBB Itapevi: 368\nBB Sorocaba: 208\nMULTA: Nos contratos, no que diz respeito à multa, consta que a multa será do valor da ficha proposta x nº  de cartões x número de meses para vencer o contrato.\n\n', 132),
(36, 'Fornecimento de créditos de refeição\nValor facial no contrato: R$ 506,00\nRalip Barueri: 367\nRalip Sorocaba: 3\nEsses contratos estão vigentes nessa quantidades, porém não há operação. \nRalip Pilar: 51\nRalip Tapiraí: 23\nRalip Araçariguama: 27\n\nMULTA: Nos contratos, no que diz respeito à multa, consta que a multa será do valor da ficha proposta x nº  de cartões x número de meses para vencer o contrato.', 133),
(37, 'Transporte de passageiros em ônibus (ida e volta) para eventos diversos dentro e fora do município de Barueri. Preços são por quilometragem e variados', 134),
(38, 'Fornecimento de créditos para servidores da FIEB', 135),
(39, 'Aditamento do contrato nº 132/2016', 136),
(40, 'Aditamento por mais 12 meses', 137),
(41, 'Fornecimento de 36.000 mais 26.000 créditos para estagiários da Prefeitura de Barueri', 138),
(42, 'Transporte de funcionários da Prysmian Cabos e Sistemas - Jardim Eden (R$ 145.077,69) e Prysmian Boa Vista (R$ 40.807,60), com 2 vans saída 17h e 1 van adicional linha 2 Eden. ', 139),
(43, 'Concessão onerosa para serviços de transporte publico coletivo com ônibus', 140),
(44, 'Fornecimento de 12.000 créditos para a utilização dos adolescentes e famílias do Serviço de Proteção Social e Adolescente em cumprimento de medida socieducativa de LA e PSC', 141),
(45, 'Compra de máquina lavadora de 5 escovas para lavagem de ônibus HWD300/5, com lava chassi integrado e 2º semáforo na coluna', 142),
(46, 'Análise toxicológica de larga escala de janela para detecção de substâncias psicoativas nos funcionários\nPrazo indeterminado\nPode ser feita a coleta pela contratante R$ 165,00 ou por eles R$ 197,00', 143),
(47, 'Transporte de funcionários - R$ 60.600,00\n1º aditamento - reduziu operação - R$ 46.100,00\n2º aditamento - R$ 50.188,15\n3º aditamento - R$ 51.822,27\n4º aditamento - R$ 54.318,03\n5º aditamento - R$ 16.995,00', 144),
(48, 'Transporte de funcionários 1 van e 4 micros - R$ 79.870,00 e R$ 23.500,00\n1º aditamento - altera a vigência para 18/11/2016 a 24/10/2019\n2º aditamento -altera a vigência para prazo determinado até 01/08/2021, com 5% de reajuste de 08/19 a 08/20 e 5% de 08/20 a 08/21.', 145),
(49, 'Crédito para Projeto Mães Cuidadoras - 45.000 créditos', 146),
(50, 'Aproveitamento de saldo - Projeto Mães Cuidadoras', 147),
(51, 'Recarga de créditos em cartão Benfácil para jovens do Programa Municipal de Aprendizagem de Itapevi -24.000 com tarifa 4,50 - R$ 108.000,00', 148),
(52, '', 153),
(53, 'Transporte de funcionários - valores por linha\nLinha 01 10.000,00\nLinha 02 14.000,00\nLinha 03 9.000,00', 154),
(54, '1º aditamento com alteração de características operacionais, com mais 6 veículos, 9 ao total, com novos valores', 155),
(55, '2º aditamento com alterações de características operacionais, com 11 carros, e novos valores', 156),
(56, '3º aditamento - alterações operacionais e de valores', 157),
(57, '4º Aditamento - reajustes de valores', 158),
(58, '5º Aditamento - alterações de valores', 159),
(59, '6º aditamento - alteração de valores', 160),
(60, '7º Aditamento - alteração de valores e linhas', 161),
(61, '8º aditamento - alteração de linhas e valores', 162),
(62, '9º Aditamento - alterações de linhas a valores', 163),
(63, '1º Aditamento alteração de frota e valores', 164),
(64, '2º Aditamento alteração dos valores', 165),
(65, '3º Aditamento alterando valores', 166),
(66, '4º Aditamento alterando valores', 167),
(67, 'Patrocínio ao time de volei, com direito a exposição nas costas das camisas de jogo da equipe e 2 placas publicitárias nos ginásios de treinamento', 168),
(68, '', 169),
(69, 'Utilização dos serviços da associação comercial de barueri', 170),
(70, '6º Aditivo com reajuste contratual de 0,50%, no valor de R$ 15,93', 171),
(71, 'Contrato de subempreitada de transporte tipo escolar', 172),
(72, 'pRESTAÇÃP DE SERVIÇOS DE', 173),
(73, '1º ADITAMENTO - reajuste no preço', 174),
(74, 'Aluguel de frota de carros de apoio\nAviso prévio de 90 dias', 175),
(75, 'Fornecimento de Créditos para indivíduos participantes do PROFESP - Programa Forças no Esporte do Exercito Brasileiro com parceria ao Serviço de Convivência e Fortalecimento de Vínculos - 6 Unidades do CRAS. O fornecimento será em parcelas mensais conforme solicitação da contratante com pagamento até 5 dias após a liberação pela secretaria. ', 185),
(76, 'Fornecimento de créditos para indivíduos e famílias em acompanhamento no serviço de Proteção e atendimento integral à família - PAIF. O fornecimento será em parcelas mensais conforme solicitação da contratante, com pagamento até 5 dias após a liberação pela secretaria responsável. \n', 186),
(77, 'O fornecimento de créditos para pessoas de baixa renda que participam do Projeto Mãe Cuidadora. O fornecimento será em parcelas mensais conforme solicitação da contratante com pagamento em até 5 dias após a apresentação da nota fiscal aprovada. \n1º Aditamento: assinado em 19/09/2018, prorrogando por mais 12 meses (24/10/2018 a 24/10/2019), aproveitando saldo de R$163.159,80. \n2º Aditamento: assinado em 22/10/2019, com supressão de 25%, prorrogando por 12 meses (24/10/2019 a 23/10/2020), aproveitando o saldo de R$81.940,50 sendo R$13.500,00 para 2019 e 68.440,50 para 2020/10/19. ', 187),
(78, 'Fornecimento de créditos para pessoas de baixa renda que participam do Projeto "Mãe Cuidadora". O fornecimento será em parcelas mensais conforme solicitação da contatante, com pagamento até 5 dias após a apresentação da nota fiscal aprovada. \n', 188),
(79, 'Fornecimento de crédito para pessoas deficientes. O fornecimento será em parcelas mensais conforme solicitação da contratante, com pagamento até 5 dias após a liberação pela secretaria responsável. ', 189),
(80, 'Fornecimento de crédito para pessoas deficientes. O fornecimento será em parcelas mensais conforme solicitação da contratante, com pagamento até 5 dias após a liberação pela Secretaria responsável. \n', 190),
(81, 'Fornecimento de c´reditos para pessoas deficientes. O fornecimento será em parcelas mensais conforme solicitação da contrante com pagamento até 5 dias após a liberação pela secretaria responsável. ', 191),
(82, 'Secretaria de deficiente.\nFornecimento de Crédito para pessoas deficientes. O fornecimento será em parcelas mensais conforme solicitação da contratante com pagamento até 5 dias após a liberação pela secretaria responsável. ', 192),
(83, 'Fornecimento de crédito para pessoas deficientes. O fornecimento será em parcelas mensais conforme solicitação da contratante com pagamento até 5 dias após a liberação pela Secretaria responsável. ', 193),
(84, 'Supressão do contrato em 16% (R$475.200,00) do contrato 728/2017. Fornecimento de crédito para pessoas deficientes. O fornecimento será em parcelas mensais conforme solicitação da contratante com pagamento até 5 dias após a liberação pela secretaria responsável.', 194),
(85, 'Fornecimento de créditos para estudantes da rede de ensino municipal no ano letivo de 2019 nas linhas municipais de Barueri. O fornecimento será em parcelas mensais conforme solicitação da contratante, com pagamento até 5 dias após a liberação pela secretaria responsável. ', 195),
(86, 'Prorrogação por 12 meses. \nFornecimento de créditos para estudantes da rede de ensino municipal no ano letivo de 2019 nas linhas municipais de Barueri. O fornecimento será em parcelas mensais conforme solicitação da contratante, com pagamento até 5 dias após a liberação pela Secretaria responsável. ', 196),
(87, 'Fornecimento de créditos eletrônicos nas linhas municipais de ônibus com integração CPTM para servidores da Prefeitura de Barueri. O fornecimento será em parcelas mensais conforme solicitação da contratante com pagamento até 5 dias após a liberação pela Secretaria responsável (administração). ', 197),
(88, 'Alteração dos valores. Fornecimento de créditos eletrônicos nas linhas municipais de ônibus com integração CPTM para servidores da Prefeitura de Barueri. O fornecimento será em parcelas mensais conforme solicitação da contratante, com pagamento até 5 dias após a liberação pela Secretaria Responsável. ', 198),
(89, 'Prorrogação do contrato 256/2017 por mais 12 meses, ao qual, tem por objeto o fornecimento de créditos eletrônicos nas linhas municipais de ônibus com integração CPTM para servidores da Prefeitura de Barueri', 199),
(90, 'Prorrogação do contrato 256/2017 por mais 12 meses, ao qual, tem por objeto o fornecimento de crédito eletrônicos nas linhas municipais de ônibus com integração CPTM para servidores da Prefeitura de Barueri. O fornecimento será em parcelas mensais conforme solicitação da contratante com pagamento até 5 dias após a liberação pela secretaria responsável. ', 200),
(91, 'Prorrogação por 12 meses do contrato 256/2017, ao qual, tem por objeto o fornecimento de créditos eletrônicos nas linhas municipais de ônibus com integração CPTM para servidores da Prefeitura de Barueri. O fornecimento será em parcelas mensais conforme solicitação da contratante, com pagamento até 5 dias após a liberação pela secretaria responsável. ', 201),
(92, 'Prorrogação do contrato 256/2017 por mais 12 meses, e supressão de 25%, ao qual, tem por objeto o fornecimento de crédito eletrônicos nas linhas municipais de ônibus com integração CPTM para servidores da prefeitura de Barueri. O fornecimento será em parcelas mensais conforme solicitação da contratante, com pagamento até 5 dias após a liberação pela secretaria responsável. ', 202),
(93, 'Fornecimento de créditos linhas municipais com integração CPTM para estagiários da Prefeitura de Barueri. O fornecimento será em parcelas mensais conforme solicitação da contratante com pagamento até 5 dias após a liberação pela secretaria responsável. ', 204),
(94, 'Fornecimento de créditos linhas municipais com integração CPTM para estagiários da prefeitura de Barueri. O fornecimento será em parcelas mensais conforme solicitação da contratante com pagamento até 5 dias após a liberação pela secretaria responsável. ', 205),
(95, 'Fornecimento de créditos para portadores de doenças graves, bem como seus acompanhantes. O fornecimento será em parcelas mensais conforme solicitação da contratante com pagamento até 5 dias após a liberação pela secretaria responsável - Secretaria da Saúde. ', 207),
(96, 'Fornecimento de créditos para portadores de doenças graves, bem como seus acompanhantes. O fornecimento será em parcela mensais conforme solicitação da contratante, com pagamento até 5 dias após a liberação pela secretaria de saúde, responsável. \n', 208),
(97, 'Fornecimento de créditos para portadores de doenças graves, bem como para seus acompanhantes. O fornecimento será em parcelas mensais conforme solicitação da contratante, com pagamento até 5 dias após a liberação pela Secretaria responsável. ', 209),
(98, 'Fornecimento de créditos para portadores de doenças graves, bem como seus acompanhantes. O fornecimento será em parcelas mensais conforme solicitação da contratante, com pagamento até 5 dias após a liberação pela Secretaria de Saúde, responsável. ', 210),
(99, 'Fornecimento de créditos para portadores de doenças graves, bem como para seus acompanhantes. O fornecimento será em parcelas mensais conforme solicitação da contatante, com pagamento até 5 dias após a liberação pela secretaria de saúde, responsável. ', 211),
(100, 'Fornecimento de créditos para portadores de doenças graves. bem como seus acompanhantes. O fornecimento será em parcelas mensais conforme solicitação da contratante, com pagamento até 5 dias após a liberação pela secretaria de saúde, responsável. ', 212),
(101, 'Fornecimento de crédito para pessoas de baixa renda inseridas nos programas e projetos de cunho social. O fornecimento será em parcelas mensais conforme solicitação da contratante com pagamento até 5 dias após a liberação pela secretaria da promoção social, responsável.', 213),
(102, 'Fornecimento de créditos para pessoas de baixa renda inseridas em programas e projetos de cunho social. O fornecimento será em parcelas mensais conforme solicitações da contratante com pagamento até 5 dias após a liberação pela secretaria de promoção social, responsável. ', 214),
(103, 'Fornecimento de créditos para pessoas de baixa renda inseridas em programas e projetos de cunho social. O fornecimento será em parcelas mensais conforme solicitação da contratante, com pagamento até 5 dias após a liberação pela secretaria responsável. ', 216),
(104, 'Fornecimento de créditos para pessoas de baixa renda inseridas em programas e projetos de cunho social. O fornecimento será em parcela mensais conforme solicitação da contratante, com pagamento até 5 dias após a liberação pela secretaria responsável.', 217),
(105, 'Fornecimento de créditos para pessoas em acompanhamento psicossocial e gestantes pré natal nas unidades básicas de saúde e CAPS/CRAD. O fornecimento será em parcelas mensais conforme solicitação da contratante, com pagamento até 5 dias após a liberação pela secretaria responsável.', 218),
(106, 'Fornecimento de créditos para pessoas em acompanhamento psicossocial e gestantes pré-natal nas unidades básicas de saúde e CAPS/CRAD. O fornecimento será em parcelas mensais conforme solicitação da contratante, com pagamento até 5 dias após a liberação pela Secretaria responsável. ', 219),
(107, 'Fornecimento de créditos para pessoas em acompanhamento psicossocial e gestantes pré-natal nas unidades básicas de saúde e CAPS/CRAD. O fornecimento será em parcelas mensais conforme solicitação da contratante com pagamento até 5 dias após a liberação pela secretaria responsável. ', 220),
(108, 'Fornecimento de créditos para pessoas em acompanhamento do serviço de proteção social e atendimento integral à família - PAIF. O fornecimento será em parcelas mensais conforme conforme solicitação da contratante com pagamento até 5 dias após a liberação pela secretaria responsável. ', 221),
(109, 'Fornecimento de créditos para alunos matriculados nos cursos profissionalizantes. O fornecimento será em parcelas mensais conforme solicitação da contratante, com pagamento até 5 dias após a apresentação da nota fiscal aprovada. ', 222),
(110, 'Fornecimento de créditos para alunos matriculados nos cursos profissionalizantes. O fornecimento será em parcelas mensais conforme solicitação da contratante, com pagamento até 5 dias após a apresentação da nota fiscal aprovada. ', 223),
(111, 'Fornecimento de créditos para alunos matriculados nos cursos profissionalizantes. O fornecimento será em parcelas mensais conforme solicitação da contratante, com pagamento até 5 dias após a apresentação da nota fiscal aprovada. ', 224),
(112, 'Fornecimento de créditos para transporte de servidores da FIEB. O fornecimento será em parcelas mensais conforme solicitação da contratante com pagamento até 5 dias após a apresentação da nota fiscal aprovada. ', 225),
(113, 'Fornecimento de créditos para transporte de servidores da FIEB. O fornecimento será em parcelas mensais conforme solicitação da contratante com pagamento até 5 dias após a apresentação da nota fiscal aprovada. ', 226),
(114, 'Fornecimento de créditos para transporte de servidores da FIEB. O fornecimento será em parcelas mensais conforme solicitação da contratante com pagamento até 5 dias após a apresentação da nota fiscal aprovada. ', 227),
(115, 'Fornecimento de créditos para transporte de servidores da FIEB. O fornecimento será em parcelas mensais conforme solicitação da contratante com pagamento até 5 dias após a apresentação da nota fiscal aprovada. ', 228),
(116, 'Fornecimento de créditos para transporte de alunos da FIEB. O fornecimento será em parcelas mensais conforme solicitação da contratante, com pagamento até 5 dias após a apresentação da nota fiscal aprovada. ', 229),
(117, 'Permissão de uso do espaço público do ganha tempo - agência de atendimento do benfácil. ', 230),
(118, '', 231),
(119, 'Fornecimento de créditos para pessoas de baixa renda que participam do projeto "mãe cuidadora". O fornecimento será em parcelas mensais conforme solicitação da contratante com pagamento até 5 dias após a apresentação da nota fiscal aprovada. ', 232),
(120, 'Fornecimento de créditos para pessoas de baixa renda que participam do projeto "mãe cuidadora". O fornecimento será em parcelas mensais conforme solicitação da contratante com pagamento até 5 dias após a apresentação da nota fiscal aprovada. ', 233),
(121, 'Fornecimento de créditos para indivíduos participantes do PROFESP - Programa Forças no Esporte Exército Brasileiro com parceria ao Serviço de Convivência e Fortalecimento de Vínculos - 6 unidades dos CRAs. O fornecimento será em parcelas mensais conforme solicitação da contratante com pagamento até 5 dias após a liberação da secretaria responsável.', 234);

-- --------------------------------------------------------

--
-- Estrutura da tabela `observacoes_exigencias`
--

CREATE TABLE `observacoes_exigencias` (
  `ID_OBSERVACOES_EXIGENCIAS` int(11) NOT NULL,
  `DESC_OBSER_EXIGEN` varchar(2000) NOT NULL,
  `ID_CONTRATO_OBSERVACOES` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `observacoes_exigencias`
--

INSERT INTO `observacoes_exigencias` (`ID_OBSERVACOES_EXIGENCIAS`, `DESC_OBSER_EXIGEN`, `ID_CONTRATO_OBSERVACOES`) VALUES
(1, '', NULL),
(16, '', NULL),
(18, '', NULL),
(19, '', NULL),
(20, '', NULL),
(21, '', NULL),
(22, 'TESTE', NULL),
(23, 'TESTE', NULL),
(24, '216.000 créditos', NULL),
(25, '216.000 créditos', NULL),
(26, '', NULL),
(27, '', NULL),
(28, '', NULL),
(29, '', NULL),
(30, 'TESTE_OBS', 122),
(31, '0', 123),
(32, '0', 124),
(33, '', 118),
(34, 'TesteX', 126),
(35, '', 127),
(36, '', 128),
(37, '', 129),
(38, '', 130),
(39, '', 132),
(40, '', 133),
(41, '', 134),
(42, '', 135),
(43, '', 136),
(44, '', 137),
(45, 'Fornecimento de créditos linhas municipais com integração CPTM para estagiários da prefeitura de Barueri. O fornecimento será em parcelas mensais conforme solicitação da contratante, com pagamento de até 5 dias após a liberação pela secretaria responsável. ', 138),
(46, '', 139),
(47, '', 140),
(48, '', 141),
(49, 'Pagamento em 10 parcelas, sendo a primeira de R$ 32.408,81 em 28/08/2019 e as demais de R$ 14.403,91 de 28/09/2019 a 28/05/2020\nGarantia de 18 meses', 142),
(50, '', 143),
(51, '', 144),
(52, '', 145),
(53, 'Aditivo 1 - 697/2018', 146),
(54, 'Contrato inicial 662/2017 - R$ 189.000,00', 147),
(55, '', 148),
(56, '', 153),
(57, '', 154),
(58, '', 155),
(59, '', 156),
(60, '', 157),
(61, '', 158),
(62, '', 159),
(63, '', 160),
(64, '', 161),
(65, '', 162),
(66, '', 163),
(67, '', 164),
(68, '', 165),
(69, '', 166),
(70, '', 167),
(71, '', 168),
(72, '', 169),
(73, '', 170),
(74, '', 171),
(75, '', 172),
(76, '', 174),
(77, '', 175),
(78, '09/06/2020 -Recebido notificação 30/2020 para suspensão temporária por 2 meses (Junho e Julho)\n18/09/2020 - Recebido notificação 61/2020 para suspensão temporária por 3 meses (setembro, outubro e novembro). ', 185),
(79, '06/2020 - Recebido notificação 28/2020 para suspensão temporária por 2 meses (junho e julho).\n09/2020 - Recebido notificação 59/2020 para suspensão temporária por 3 meses (setembro, outubro e novembro). \n\nDas penalidades: Multa de até 10% sobre o valor proposto pela recusa em assinar o instrumento contratual dentro do prazo estabelecido. Multa diária de até 0,5% sobre o valor do produto em atraso, pelo retardamento de seu fornecimento. A partir do 10º dia de atraso, configurar-se-á inexecução do contrato total ou parcial, sendo a inexecução total, multa de 20% sobre o valor correspondentes e pela inexecução parcial, multa de até 10% sobre o valor correspondente à parcela do objeto contratual não entregue. Prazo para pagamento da multa é de 10 dias úteis. ', 186),
(80, '15/04/2020 - Recebido notificação 04/2020 para suspensão temporária por 2 meses (abril e maio). \n18/09/2020 - Recebido notificação 53/2020 para suspensão temporária por 3 meses (setembro, outubro e novembro). \n15/10/2020 - Confirmada renovação por mais 12 meses - com supressão de 25%. \n\nDas penalidades: Multa de até 10% sobre o valor proposto pela recusa em assinar o instrumento contratual dentro do prazo estabelecido. Multa diária de até 0,5% sobre o valor do produto em atraso, pelo retardamento de seu fornecimento. A partir do 10º dia de atraso, configurar-se-á inexecução do contrato total ou parcial, sendo a inexecução total, multa de 20% sobre o valor correspondentes e pela inexecução parcial, multa de até 10% sobre o valor correspondente à parcela do objeto contratual não entregue. Prazo para pagamento da multa é de 10 dias úteis. ', 187),
(81, 'Contrato 662/2017\nData da assinatura: 19/10/2019.\nSupressão de 25%\nprorrogação por 12 meses (24/10/2019 a 23/10/2020 - aproveitar saldo de 81.940,50, sendo R$13.500,00 para 2019 e R$68.440,50 para 2020.10.19. \n', 188),
(82, 'Os preços a serem praticados devem ser aqueles determinados em Decreto do Executivo (obs.: se aumentar a tarifa, o fornecimento será realizado com preço da nova tarifa. ', 189),
(83, '', 190),
(84, '', 191),
(85, '', 192),
(86, '', 193),
(87, '', 194),
(88, '', 195),
(89, '', 196),
(90, '', 197),
(91, '', 198),
(92, '', 199),
(93, '', 200),
(94, '', 201),
(95, '', 202),
(96, '', 204),
(97, 'Supressão de 25% ', 205),
(98, '', 207),
(99, '', 208),
(100, '', 209),
(101, '', 210),
(102, '', 211),
(103, '', 212),
(104, '', 213),
(105, '', 214),
(106, '', 216),
(107, '', 217),
(108, '', 218),
(109, '', 219),
(110, 'Supressão de 25%.', 220),
(111, '', 221),
(112, '', 222),
(113, '', 223),
(114, '', 224),
(115, '', 225),
(116, '', 226),
(117, '', 227),
(118, '', 228),
(119, '', 229),
(120, '', 230),
(121, 'retificação da área de 6,74m', 231),
(122, '', 232),
(123, 'Aproveitamento de saldo de R$81.940,50, sendo R$13.500,00 para 2019 e R$68.440,50 para 19/10/2020. \nRecebido notificação de confirmação de renovação com supressão de 25% em 15/10/2020. ', 233),
(124, '', 234);

-- --------------------------------------------------------

--
-- Estrutura da tabela `possui_parcela`
--

CREATE TABLE `possui_parcela` (
  `ID_POSSUI_PARCELA` int(11) NOT NULL,
  `DESC_POSSUI PARCELA` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `possui_parcela`
--

INSERT INTO `possui_parcela` (`ID_POSSUI_PARCELA`, `DESC_POSSUI PARCELA`) VALUES
(1, 'SIM'),
(2, 'NÃO');

-- --------------------------------------------------------

--
-- Estrutura da tabela `recuperar_senha`
--

CREATE TABLE `recuperar_senha` (
  `ID_RECUPERAR_SENHA` int(11) NOT NULL,
  `ID_USUARIO` int(11) DEFAULT NULL,
  `PRIVATE_TOKEN` varchar(45) DEFAULT NULL,
  `ID_STATUS_ALTERAR` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `recuperar_senha`
--

INSERT INTO `recuperar_senha` (`ID_RECUPERAR_SENHA`, `ID_USUARIO`, `PRIVATE_TOKEN`, `ID_STATUS_ALTERAR`) VALUES
(1, 1, 'a661ee4b7892e76849c3d553c43b05e83aa74ec1', 2),
(2, 1, '885992359079830edbf7b7f91c3d3246c759d059', 2),
(3, 1, '71bf9e9c84a46dfd98901d5a6581c8582a30fe4b', 2),
(4, 1, '90dfa9db41399d28c3165dea9270b7539f1bb0de', 2),
(5, 1, 'b4a3ad247b011666a2e74a6f9aada91c112b1a5b', 2),
(6, 1, '01c8c5e71c05cfa0bdaf2a0b5f2488e62078b73c', 2),
(7, 1, '47a65fae500faf9d0d92c493c710ff587c041b0f', 2),
(8, 1, '8d6857916730fafe1b3056cc18dfd79e5197a541', 2),
(9, 1, '6016e5e85413857bf3ea1727edde74375a44a9be', 2),
(10, 1, '6b1ba22026412aca9ba5e602a9924ee5a85c5071', 2),
(11, 1, 'd82777e4c36ad0aec7868c90e7a563dabc5f2bd1', 2),
(12, 1, 'd47eb1e76ba7177a136118a3baecf9f01a7a8b5d', 2),
(13, 1, '49ed4d57b6c30dd9787cb25bd294be8fd1239aad', 2),
(14, 1, 'c80dbd77b221828f181a845e810c261827350c0a', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `setor`
--

CREATE TABLE `setor` (
  `ID_SETOR` int(11) NOT NULL,
  `DESC_SETOR` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `setor`
--

INSERT INTO `setor` (`ID_SETOR`, `DESC_SETOR`) VALUES
(1, 'JURIDICO'),
(2, 'DIRETORIA'),
(3, '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `status_alterar`
--

CREATE TABLE `status_alterar` (
  `ID_STATUS_ALTERAR` int(11) NOT NULL,
  `DESC_STATUS_ALTERAR` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `status_alterar`
--

INSERT INTO `status_alterar` (`ID_STATUS_ALTERAR`, `DESC_STATUS_ALTERAR`) VALUES
(1, 'ATIVO'),
(2, 'DESATIVADO');

-- --------------------------------------------------------

--
-- Estrutura da tabela `status_aviso`
--

CREATE TABLE `status_aviso` (
  `ID_STATUS_AVISO` int(11) NOT NULL,
  `DESC_STATUS_AVISO` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `status_aviso`
--

INSERT INTO `status_aviso` (`ID_STATUS_AVISO`, `DESC_STATUS_AVISO`) VALUES
(1, 'ABERTO'),
(2, 'FECHADO');

-- --------------------------------------------------------

--
-- Estrutura da tabela `status_contrato`
--

CREATE TABLE `status_contrato` (
  `ID_STATUS_CONTRATO` int(11) NOT NULL,
  `DESC_STATUS_CONTRATO` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `status_contrato`
--

INSERT INTO `status_contrato` (`ID_STATUS_CONTRATO`, `DESC_STATUS_CONTRATO`) VALUES
(1, 'ATIVO'),
(2, 'INATIVA');

-- --------------------------------------------------------

--
-- Estrutura da tabela `status_garantia`
--

CREATE TABLE `status_garantia` (
  `ID_STATUS_GARANTIA` int(11) NOT NULL,
  `DESC_STATUS_GARANTIA` varchar(2000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `status_garantia`
--

INSERT INTO `status_garantia` (`ID_STATUS_GARANTIA`, `DESC_STATUS_GARANTIA`) VALUES
(1, 'SIM'),
(2, 'NAO');

-- --------------------------------------------------------

--
-- Estrutura da tabela `time_login`
--

CREATE TABLE `time_login` (
  `ID_TIME_LOGIN` int(11) NOT NULL,
  `TIME_LOGIN` time DEFAULT NULL,
  `ID_USUARIO_LOGIN` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_acesso`
--

CREATE TABLE `tipo_acesso` (
  `ID_TIPO_ACESSO` int(11) NOT NULL,
  `DESC_TIPO_ACESSO` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tipo_acesso`
--

INSERT INTO `tipo_acesso` (`ID_TIPO_ACESSO`, `DESC_TIPO_ACESSO`) VALUES
(1, 'ADMINISTRADOR'),
(2, 'MODERADOR'),
(3, 'COMUM'),
(4, 'INATIVO');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_aviso`
--

CREATE TABLE `tipo_aviso` (
  `ID_TIPO_AVISO` int(11) NOT NULL,
  `DESC_TIPO_AVISO` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tipo_aviso`
--

INSERT INTO `tipo_aviso` (`ID_TIPO_AVISO`, `DESC_TIPO_AVISO`) VALUES
(1, 'CONTRATO A VENCER'),
(2, 'CONTRATO VENCIDO');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_contrato`
--

CREATE TABLE `tipo_contrato` (
  `ID_TIPO_CONTRATO` int(11) NOT NULL,
  `DESC_TIPO_CONTRATO` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tipo_contrato`
--

INSERT INTO `tipo_contrato` (`ID_TIPO_CONTRATO`, `DESC_TIPO_CONTRATO`) VALUES
(1, 'PUBLICO'),
(2, 'PRIVADO');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_log`
--

CREATE TABLE `tipo_log` (
  `ID_TIPO_LOG` int(11) NOT NULL,
  `DESC_TIPO_LOG` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tipo_log`
--

INSERT INTO `tipo_log` (`ID_TIPO_LOG`, `DESC_TIPO_LOG`) VALUES
(1, 'CADASTRO USUÁRIO'),
(2, 'CADASTRO CONTRATO'),
(3, 'REDEFINIR SENHA'),
(4, 'ALTERAR USUÁRIO'),
(5, 'ALTERAR CONTRATO'),
(6, 'INATIVAR USUÁRIO'),
(7, 'CONSULTAR USUÁRIO'),
(8, 'CONSULTAR CONTRATO'),
(9, 'GERAR RELATÓRIO'),
(10, 'ADICIONAR GARANTIA POSTERIOR'),
(11, 'ADICIONAR OBJETO POSTERIOR'),
(12, 'ADICIONAR OBSERVACAO POSTERIOR'),
(13, 'ADICIONAR ANEXO POSTERIOR'),
(14, 'LOGIN'),
(15, 'LOGOUT'),
(16, 'EXCLUIR ANEXO');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `ID_USUARIO` int(11) NOT NULL,
  `NOME_USUARIO` varchar(45) NOT NULL,
  `EMAIL_USUARIO` varchar(120) NOT NULL,
  `ID_SETOR_USUARIO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`ID_USUARIO`, `NOME_USUARIO`, `EMAIL_USUARIO`, `ID_SETOR_USUARIO`) VALUES
(1, 'Rubens', 'jose.rubens@benficabbtt.com.br', 1),
(2, 'Jonathan', 'jonathan@benficabbtt.com.br', 2),
(3, 'Edson Reis', 'edson.reis@benficabbtt.com.br', 2),
(4, 'Virginia', 'virginia@benficabbttt.com.br', 1),
(6, 'Danielly', 'danielly@benficabbtt.com.br', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aditamentos`
--
ALTER TABLE `aditamentos`
  ADD PRIMARY KEY (`ID_ADITAMENTO`),
  ADD KEY `KEY_ATUALCONTRATO_ADITAMENTO_idx` (`ID_CONTRATO_ADITADO_ADITAMENTO`);

--
-- Indexes for table `aviso_contrato`
--
ALTER TABLE `aviso_contrato`
  ADD PRIMARY KEY (`ID_AVISO`),
  ADD KEY `KEY_CONTRATO_AVISO_idx` (`ID_CONTRATO_AVISO`),
  ADD KEY `KEY_TIPOAVISO_AVISO_idx` (`ID_TIPO_AVISO`),
  ADD KEY `KEY_STATUSAVISO_AVISO_idx` (`ID_STATUS_AVISO`);

--
-- Indexes for table `contrato`
--
ALTER TABLE `contrato`
  ADD PRIMARY KEY (`ID_CONTRATO`),
  ADD KEY `KEY_ID_STATUS_GARANTIA_idx` (`ID_STATUS_GARANTIA_CONTRATO`),
  ADD KEY `KEY_ID_GARANTIA_idx` (`ID_GARANTIA_CONTRATO`),
  ADD KEY `KEY_ID_ADITAMENTO_idx` (`ID_ADITAMENTO_CONTRATO`),
  ADD KEY `KEY_ID_LOGIN_idx` (`ID_LOGIN_CONTRATO`),
  ADD KEY `KEY_ID_FINALIZACAO_CONTRATO_idx` (`ID_FINALIZACAO_CONTRATO`),
  ADD KEY `ID_TIPO_CONTRATO_idx` (`ID_TIPO_CONTRATO`),
  ADD KEY `KEY_ID_OBSERVACOES_EXIGENCIAS_idx` (`ID_OBSERVACOES_EXIGENCIAS_CONTRATO`),
  ADD KEY `KEY_OBJETO_CONTRATO_idx` (`ID_OBJETO_CONTRATO`),
  ADD KEY `KEY_ID_EMPRESA_CONTRATO_idx` (`ID_EMPRESA_CONTRATO`),
  ADD KEY `KEY_ID_POSSUI_PARCELA_CONTRATO_idx` (`ID_POSSUI_PARCELA_CONTRATO`),
  ADD KEY `KEY_ID_STATUS_CONTRATO_idx` (`ID_STATUS_CONTRATO`),
  ADD KEY `KEY_ID_SETOR_CONTRATO_idx` (`ID_SETOR_CONTRATO`);

--
-- Indexes for table `empresa_contrato`
--
ALTER TABLE `empresa_contrato`
  ADD PRIMARY KEY (`ID_EMPRESA_CONTRATO`);

--
-- Indexes for table `finalizacao_contrato`
--
ALTER TABLE `finalizacao_contrato`
  ADD PRIMARY KEY (`ID_FINALIZACAO_CONTRATO`);

--
-- Indexes for table `garantia`
--
ALTER TABLE `garantia`
  ADD PRIMARY KEY (`ID_GARANTIA`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`ID_LOG`),
  ADD KEY `ID_LOGIN_LOG_idx` (`ID_LOGIN_LOG`),
  ADD KEY `KEY_TIPOLOG_LOG_idx` (`ID_TIPO_LOG`),
  ADD KEY `KEY_ID_CONTRATO_idx` (`ID_CONTRATO`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`ID_LOGIN`),
  ADD KEY `KEY_USUARIO_LOGIN_idx` (`ID_USUARIO_LOGIN`),
  ADD KEY `KEY_TIPO_ACESSO_LOGIN_idx` (`ID_TIPO_ACESSO_LOGIN`),
  ADD KEY `KEY_ID_TIME_LOGIN_idx` (`ID_TIME_LOGIN`);

--
-- Indexes for table `objeto`
--
ALTER TABLE `objeto`
  ADD PRIMARY KEY (`ID_OBJETO`),
  ADD KEY `KEY_CONTRATO_OBJETO_idx` (`ID_CONTRATO_OBJETO`);

--
-- Indexes for table `observacoes_exigencias`
--
ALTER TABLE `observacoes_exigencias`
  ADD PRIMARY KEY (`ID_OBSERVACOES_EXIGENCIAS`),
  ADD KEY `KEY_CONTRATO_OBSERVACOES_idx` (`ID_CONTRATO_OBSERVACOES`);

--
-- Indexes for table `possui_parcela`
--
ALTER TABLE `possui_parcela`
  ADD PRIMARY KEY (`ID_POSSUI_PARCELA`);

--
-- Indexes for table `recuperar_senha`
--
ALTER TABLE `recuperar_senha`
  ADD PRIMARY KEY (`ID_RECUPERAR_SENHA`),
  ADD KEY `KEY_ID_STATUS_ALTERAR_idx` (`ID_STATUS_ALTERAR`),
  ADD KEY `KEY_ID_USUARIO_idx` (`ID_USUARIO`);

--
-- Indexes for table `setor`
--
ALTER TABLE `setor`
  ADD PRIMARY KEY (`ID_SETOR`);

--
-- Indexes for table `status_alterar`
--
ALTER TABLE `status_alterar`
  ADD PRIMARY KEY (`ID_STATUS_ALTERAR`);

--
-- Indexes for table `status_aviso`
--
ALTER TABLE `status_aviso`
  ADD PRIMARY KEY (`ID_STATUS_AVISO`);

--
-- Indexes for table `status_contrato`
--
ALTER TABLE `status_contrato`
  ADD PRIMARY KEY (`ID_STATUS_CONTRATO`);

--
-- Indexes for table `status_garantia`
--
ALTER TABLE `status_garantia`
  ADD PRIMARY KEY (`ID_STATUS_GARANTIA`);

--
-- Indexes for table `time_login`
--
ALTER TABLE `time_login`
  ADD PRIMARY KEY (`ID_TIME_LOGIN`),
  ADD KEY `KEY_ID_USUARIO_TIME_LOGIN_idx` (`ID_USUARIO_LOGIN`);

--
-- Indexes for table `tipo_acesso`
--
ALTER TABLE `tipo_acesso`
  ADD PRIMARY KEY (`ID_TIPO_ACESSO`);

--
-- Indexes for table `tipo_aviso`
--
ALTER TABLE `tipo_aviso`
  ADD PRIMARY KEY (`ID_TIPO_AVISO`);

--
-- Indexes for table `tipo_contrato`
--
ALTER TABLE `tipo_contrato`
  ADD PRIMARY KEY (`ID_TIPO_CONTRATO`);

--
-- Indexes for table `tipo_log`
--
ALTER TABLE `tipo_log`
  ADD PRIMARY KEY (`ID_TIPO_LOG`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`ID_USUARIO`),
  ADD KEY `KEY_SETOR_USUARIO_idx` (`ID_SETOR_USUARIO`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aditamentos`
--
ALTER TABLE `aditamentos`
  MODIFY `ID_ADITAMENTO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `aviso_contrato`
--
ALTER TABLE `aviso_contrato`
  MODIFY `ID_AVISO` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `contrato`
--
ALTER TABLE `contrato`
  MODIFY `ID_CONTRATO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=235;
--
-- AUTO_INCREMENT for table `empresa_contrato`
--
ALTER TABLE `empresa_contrato`
  MODIFY `ID_EMPRESA_CONTRATO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `finalizacao_contrato`
--
ALTER TABLE `finalizacao_contrato`
  MODIFY `ID_FINALIZACAO_CONTRATO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `garantia`
--
ALTER TABLE `garantia`
  MODIFY `ID_GARANTIA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=155;
--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `ID_LOG` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `ID_LOGIN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `objeto`
--
ALTER TABLE `objeto`
  MODIFY `ID_OBJETO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;
--
-- AUTO_INCREMENT for table `observacoes_exigencias`
--
ALTER TABLE `observacoes_exigencias`
  MODIFY `ID_OBSERVACOES_EXIGENCIAS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;
--
-- AUTO_INCREMENT for table `possui_parcela`
--
ALTER TABLE `possui_parcela`
  MODIFY `ID_POSSUI_PARCELA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `recuperar_senha`
--
ALTER TABLE `recuperar_senha`
  MODIFY `ID_RECUPERAR_SENHA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `setor`
--
ALTER TABLE `setor`
  MODIFY `ID_SETOR` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `status_alterar`
--
ALTER TABLE `status_alterar`
  MODIFY `ID_STATUS_ALTERAR` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `status_aviso`
--
ALTER TABLE `status_aviso`
  MODIFY `ID_STATUS_AVISO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `status_contrato`
--
ALTER TABLE `status_contrato`
  MODIFY `ID_STATUS_CONTRATO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `status_garantia`
--
ALTER TABLE `status_garantia`
  MODIFY `ID_STATUS_GARANTIA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `time_login`
--
ALTER TABLE `time_login`
  MODIFY `ID_TIME_LOGIN` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tipo_acesso`
--
ALTER TABLE `tipo_acesso`
  MODIFY `ID_TIPO_ACESSO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tipo_aviso`
--
ALTER TABLE `tipo_aviso`
  MODIFY `ID_TIPO_AVISO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tipo_contrato`
--
ALTER TABLE `tipo_contrato`
  MODIFY `ID_TIPO_CONTRATO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tipo_log`
--
ALTER TABLE `tipo_log`
  MODIFY `ID_TIPO_LOG` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `ID_USUARIO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `aditamentos`
--
ALTER TABLE `aditamentos`
  ADD CONSTRAINT `KEY_ATUALCONTRATO_ADITAMENTO` FOREIGN KEY (`ID_CONTRATO_ADITADO_ADITAMENTO`) REFERENCES `contrato` (`ID_CONTRATO`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `aviso_contrato`
--
ALTER TABLE `aviso_contrato`
  ADD CONSTRAINT `KEY_CONTRATO_AVISO` FOREIGN KEY (`ID_CONTRATO_AVISO`) REFERENCES `contrato` (`ID_CONTRATO`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `KEY_STATUSAVISO_AVISO` FOREIGN KEY (`ID_STATUS_AVISO`) REFERENCES `status_aviso` (`ID_STATUS_AVISO`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `KEY_TIPOAVISO_AVISO` FOREIGN KEY (`ID_TIPO_AVISO`) REFERENCES `tipo_aviso` (`ID_TIPO_AVISO`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `contrato`
--
ALTER TABLE `contrato`
  ADD CONSTRAINT `KEY_ID_ADITAMENTO` FOREIGN KEY (`ID_ADITAMENTO_CONTRATO`) REFERENCES `aditamentos` (`ID_ADITAMENTO`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `KEY_ID_EMPRESA_CONTRATO` FOREIGN KEY (`ID_EMPRESA_CONTRATO`) REFERENCES `empresa_contrato` (`ID_EMPRESA_CONTRATO`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `KEY_ID_FINALIZACAO_CONTRATO` FOREIGN KEY (`ID_FINALIZACAO_CONTRATO`) REFERENCES `finalizacao_contrato` (`ID_FINALIZACAO_CONTRATO`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `KEY_ID_GARANTIA` FOREIGN KEY (`ID_GARANTIA_CONTRATO`) REFERENCES `garantia` (`ID_GARANTIA`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `KEY_ID_LOGIN` FOREIGN KEY (`ID_LOGIN_CONTRATO`) REFERENCES `login` (`ID_LOGIN`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `KEY_ID_OBJETO` FOREIGN KEY (`ID_OBJETO_CONTRATO`) REFERENCES `objeto` (`ID_OBJETO`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `KEY_ID_OBSER_EXIGEN` FOREIGN KEY (`ID_OBSERVACOES_EXIGENCIAS_CONTRATO`) REFERENCES `observacoes_exigencias` (`ID_OBSERVACOES_EXIGENCIAS`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `KEY_ID_POSSUI_PARCELA_CONTRATO` FOREIGN KEY (`ID_POSSUI_PARCELA_CONTRATO`) REFERENCES `possui_parcela` (`ID_POSSUI_PARCELA`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `KEY_ID_SETOR_CONTRATO` FOREIGN KEY (`ID_SETOR_CONTRATO`) REFERENCES `setor` (`ID_SETOR`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `KEY_ID_STATUS_CONTRATO` FOREIGN KEY (`ID_STATUS_CONTRATO`) REFERENCES `status_contrato` (`ID_STATUS_CONTRATO`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `KEY_ID_STATUS_GARANTIA` FOREIGN KEY (`ID_STATUS_GARANTIA_CONTRATO`) REFERENCES `status_garantia` (`ID_STATUS_GARANTIA`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `KEY_ID_TIPO_CONTRATO` FOREIGN KEY (`ID_TIPO_CONTRATO`) REFERENCES `tipo_contrato` (`ID_TIPO_CONTRATO`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `log`
--
ALTER TABLE `log`
  ADD CONSTRAINT `KEY_ID_CONTRATO` FOREIGN KEY (`ID_CONTRATO`) REFERENCES `contrato` (`ID_CONTRATO`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `KEY_LOGIN_LOG` FOREIGN KEY (`ID_LOGIN_LOG`) REFERENCES `login` (`ID_LOGIN`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `KEY_TIPOLOG_LOG` FOREIGN KEY (`ID_TIPO_LOG`) REFERENCES `tipo_log` (`ID_TIPO_LOG`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `KEY_ID_TIME_LOGIN` FOREIGN KEY (`ID_TIME_LOGIN`) REFERENCES `time_login` (`ID_TIME_LOGIN`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `KEY_TIPO_ACESSO_LOGIN` FOREIGN KEY (`ID_TIPO_ACESSO_LOGIN`) REFERENCES `tipo_acesso` (`ID_TIPO_ACESSO`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `KEY_USUARIO_LOGIN` FOREIGN KEY (`ID_USUARIO_LOGIN`) REFERENCES `usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `recuperar_senha`
--
ALTER TABLE `recuperar_senha`
  ADD CONSTRAINT `KEY_ID_STATUS_ALTERAR` FOREIGN KEY (`ID_STATUS_ALTERAR`) REFERENCES `status_alterar` (`ID_STATUS_ALTERAR`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `KEY_ID_USUARIO` FOREIGN KEY (`ID_USUARIO`) REFERENCES `usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `time_login`
--
ALTER TABLE `time_login`
  ADD CONSTRAINT `KEY_ID_USUARIO_TIME_LOGIN` FOREIGN KEY (`ID_USUARIO_LOGIN`) REFERENCES `usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `KEY_SETOR_USUARIO` FOREIGN KEY (`ID_SETOR_USUARIO`) REFERENCES `setor` (`ID_SETOR`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
