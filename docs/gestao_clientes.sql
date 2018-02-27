-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2017 at 02:13 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gestao_clientes`
--

-- --------------------------------------------------------

--
-- Table structure for table `tauxiliar_meiocontato`
--

CREATE TABLE `tauxiliar_meiocontato` (
  `meicon_codigo` int(11) NOT NULL,
  `meicon_descricao` varchar(50) NOT NULL,
  `meicon_publicardados` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tauxiliar_meiocontato`
--

INSERT INTO `tauxiliar_meiocontato` (`meicon_codigo`, `meicon_descricao`, `meicon_publicardados`) VALUES
(2, 'Telefone', 0),
(3, 'chat', 0),
(4, 'E-mail', 0),
(5, 'chat', 0),
(27, 'Sinais de fumaça', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tauxiliar_ramoatividade`
--

CREATE TABLE `tauxiliar_ramoatividade` (
  `ramati_codigo` int(11) NOT NULL,
  `ramati_descricao` varchar(50) NOT NULL,
  `ramati_publicardados` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tauxiliar_ramoatividade`
--

INSERT INTO `tauxiliar_ramoatividade` (`ramati_codigo`, `ramati_descricao`, `ramati_publicardados`) VALUES
(76, 'novidade', 0),
(77, 'rexpeita', 0),
(80, 'ai sim cahoeira', 0),
(81, 'escola', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tsistema_clientes`
--

CREATE TABLE `tsistema_clientes` (
  `cli_codigo` int(11) NOT NULL,
  `Tsistema_Usuarios_usu_cpf` varchar(14) NOT NULL,
  `TAuxiliar_RamoAtividade_ramati_codigo` int(11) NOT NULL,
  `cli_cpfcnpj` varchar(18) NOT NULL,
  `cli_nomerazaosocial` varchar(100) NOT NULL,
  `cli_endereco` varchar(100) NOT NULL,
  `cli_endereco_numero` varchar(10) NOT NULL,
  `cli_endereco_complemento` varchar(50) NOT NULL,
  `cli_telefonecomercial` varchar(20) NOT NULL,
  `cli_telefonecelular` varchar(20) NOT NULL,
  `cli_nomedocontato` varchar(50) NOT NULL,
  `cli_datahorainclusao` datetime NOT NULL,
  `cli_datahoraultimaalteracao` datetime NOT NULL,
  `cli_email` varchar(100) NOT NULL,
  `cli_site` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tsistema_clientes`
--

INSERT INTO `tsistema_clientes` (`cli_codigo`, `Tsistema_Usuarios_usu_cpf`, `TAuxiliar_RamoAtividade_ramati_codigo`, `cli_cpfcnpj`, `cli_nomerazaosocial`, `cli_endereco`, `cli_endereco_numero`, `cli_endereco_complemento`, `cli_telefonecomercial`, `cli_telefonecelular`, `cli_nomedocontato`, `cli_datahorainclusao`, `cli_datahoraultimaalteracao`, `cli_email`, `cli_site`) VALUES
(38, '111.111.111-11', 10, '33.333.333/3333-34', 'Stark industries', 'Nova York', '45', 'edificio', '(31) 7777-7777', '(31) 9999-9999', 'Tony', '0000-00-00 00:00:00', '2017-01-20 15:19:11', 'asdas@dsadsdsa.com', 'www.tony.com.br'),
(39, '111.111.111-11', 2, '66.666.666/6666-66', 'Queen industries', 'Central City', '444', 'edificio', '(31) 4444-4444', '(31) 8888-8888', 'Oliver', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'greenarrow@yahoo.com.br', 'www.oliver.com'),
(44, '111.111.111-11', 80, '22.222.222/2222-22', 'Google', 'Central City', '1754', 'edificio', '(44) 4444-4444', '(44) 4444-4444', 'Jose', '2017-01-18 15:12:33', '0000-00-00 00:00:00', 'goole@hotmail.com', 'www.google.net'),
(45, '999.999.999-99', 76, '88.888.888/8888-88', 'Datte', 'av amazonas', '4541', 'casa', '(31) 8888-8888', '(31) 9999-9999', 'Silas', '2017-01-18 17:19:25', '2017-01-18 17:19:41', 'date@gmail.com', 'www.datte.com');

-- --------------------------------------------------------

--
-- Table structure for table `tsistema_registrocontato`
--

CREATE TABLE `tsistema_registrocontato` (
  `regcon_codigo` int(11) NOT NULL,
  `TSistema_Clientes_cli_codigo` int(11) NOT NULL,
  `TSistema_Usuarios_usu_cpf` varchar(14) NOT NULL,
  `TAuxiliar_MeioContato_meicon_codigo` int(11) NOT NULL,
  `regcon_datadocontato` date NOT NULL,
  `regcon_horadocontato` time NOT NULL,
  `regcon_assuntodocontato` varchar(100) NOT NULL,
  `regcon_descricao` text NOT NULL,
  `regcon_datahorainclusao` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tsistema_registrocontato`
--

INSERT INTO `tsistema_registrocontato` (`regcon_codigo`, `TSistema_Clientes_cli_codigo`, `TSistema_Usuarios_usu_cpf`, `TAuxiliar_MeioContato_meicon_codigo`, `regcon_datadocontato`, `regcon_horadocontato`, `regcon_assuntodocontato`, `regcon_descricao`, `regcon_datahorainclusao`) VALUES
(9, 39, '111.111.111-11', 2, '2017-01-30', '23:55:55', 'dasdas', 'Sehloiro', '2017-01-17 17:45:53'),
(12, 37, '111.111.111-11', 2, '2017-01-30', '23:55:55', 'Sei la', 'Sehloiro', '2017-01-18 15:21:07'),
(13, 37, '111.111.111-11', 3, '2017-01-30', '11:11:11', 'carai', 'carai', '2017-01-18 15:21:35'),
(14, 45, '999.999.999-99', 27, '2017-01-18', '22:22:22', 'escola', 'Escola', '2017-01-18 17:22:42'),
(15, 37, '444.444.444-44', 2, '2017-01-03', '45:54:56', 'sadasd', 'adsadsda', '2017-01-19 13:29:58'),
(16, 37, '444.444.444-44', 2, '2017-02-01', '23:55:55', 'Sei la', 'adsadsda', '2017-01-19 13:30:29'),
(17, 38, '222.222.222-22', 3, '2017-01-04', '23:55:55', 'Sei la', 'dasdas', '2017-01-19 15:03:06'),
(18, 37, '222.222.222-22', 2, '2017-01-19', '33:33:33', 'Sei la', 'Sehloiro', '2017-01-20 12:20:57'),
(19, 37, '222.222.222-22', 3, '2017-01-20', '23:00:00', 'Sei la', 'Sehloiro', '2017-01-20 12:57:23'),
(21, 38, '222.222.222-22', 2, '2017-01-21', '12:05:00', 'Sei la', 'Sehloiro', '2017-01-20 15:36:37');

-- --------------------------------------------------------

--
-- Table structure for table `tsistema_usuarios`
--

CREATE TABLE `tsistema_usuarios` (
  `usu_codigo` int(11) NOT NULL,
  `usu_cpf` varchar(14) NOT NULL,
  `usu_nome` varchar(50) NOT NULL,
  `usu_email` varchar(100) NOT NULL,
  `usu_senha` varchar(100) NOT NULL,
  `usu_ativo` tinyint(1) NOT NULL,
  `usu_datahorainclusao` datetime NOT NULL,
  `usu_acessarelatorio` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tsistema_usuarios`
--

INSERT INTO `tsistema_usuarios` (`usu_codigo`, `usu_cpf`, `usu_nome`, `usu_email`, `usu_senha`, `usu_ativo`, `usu_datahorainclusao`, `usu_acessarelatorio`) VALUES
(21, '111.111.111-11', 'Jose', 'silas@gmail.com', '123456', 1, '0000-00-00 00:00:00', 1),
(22, '555.555.555-55', 'Kamile', 'kamile@hotmail.com', '1234', 1, '2017-01-17 17:49:11', 0),
(23, '777.778.444-54', 'Sei la', 'seila@hotmail.com', '123', 1, '2017-01-17 17:50:13', 0),
(24, '222.222.222-22', 'Renan', 'renan@hotmail.com', '123', 0, '2017-01-18 15:03:35', 1),
(25, '444.444.444-44', 'Gandalf', 'gandal@hotmail.com', '123', 0, '2017-01-18 16:19:22', 0),
(26, '999.999.999-99', 'Silas', 'silas@gmail.com', '12345', 1, '2017-01-18 17:16:55', 1),
(34, '111.111.112-22', 'Trabson', 'trabson@gmail.com', '123', 0, '2017-01-20 13:53:14', 0),
(35, '222.224.444-44', 'hudashu', 'uahsdudhas@ahsuduahs.com', 'sashud', 0, '2017-01-20 13:53:50', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tauxiliar_meiocontato`
--
ALTER TABLE `tauxiliar_meiocontato`
  ADD PRIMARY KEY (`meicon_codigo`);

--
-- Indexes for table `tauxiliar_ramoatividade`
--
ALTER TABLE `tauxiliar_ramoatividade`
  ADD PRIMARY KEY (`ramati_codigo`);

--
-- Indexes for table `tsistema_clientes`
--
ALTER TABLE `tsistema_clientes`
  ADD PRIMARY KEY (`cli_codigo`);

--
-- Indexes for table `tsistema_registrocontato`
--
ALTER TABLE `tsistema_registrocontato`
  ADD PRIMARY KEY (`regcon_codigo`);

--
-- Indexes for table `tsistema_usuarios`
--
ALTER TABLE `tsistema_usuarios`
  ADD PRIMARY KEY (`usu_codigo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tauxiliar_meiocontato`
--
ALTER TABLE `tauxiliar_meiocontato`
  MODIFY `meicon_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `tauxiliar_ramoatividade`
--
ALTER TABLE `tauxiliar_ramoatividade`
  MODIFY `ramati_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;
--
-- AUTO_INCREMENT for table `tsistema_clientes`
--
ALTER TABLE `tsistema_clientes`
  MODIFY `cli_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `tsistema_registrocontato`
--
ALTER TABLE `tsistema_registrocontato`
  MODIFY `regcon_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `tsistema_usuarios`
--
ALTER TABLE `tsistema_usuarios`
  MODIFY `usu_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
