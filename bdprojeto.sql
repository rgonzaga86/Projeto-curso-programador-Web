-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 06-Abr-2022 às 15:14
-- Versão do servidor: 10.4.21-MariaDB
-- versão do PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bdprojeto`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `idcliente` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `endereco` varchar(200) NOT NULL,
  `telefone` varchar(200) NOT NULL,
  `email` varchar(255) NOT NULL,
  `data_nasc` date NOT NULL,
  `foto` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`idcliente`, `nome`, `endereco`, `telefone`, `email`, `data_nasc`, `foto`) VALUES
(3, 'Pedro', '', '', 'pedro@gmail.com', '0000-00-00', 'images.jpeg'),
(5, 'Israel', '', '', 'israel123@gmail.com', '0000-00-00', 'tony.jfif'),
(29, 'Rodrigo Gonzaga ', '', '', 'gonzaga_86@hotmail.com', '0000-00-00', '1.jpeg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `idproduto` int(11) NOT NULL,
  `produto` varchar(50) NOT NULL,
  `preco` float(10,2) NOT NULL,
  `estoqueatual` int(11) NOT NULL,
  `estoquemax` int(11) NOT NULL,
  `estoquemin` int(11) NOT NULL,
  `foto` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`idproduto`, `produto`, `preco`, `estoqueatual`, `estoquemax`, `estoquemin`, `foto`) VALUES
(12, 'Laço - Praia', 25.00, 10, 10, 5, 'laco3.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tblnivelacesso`
--

CREATE TABLE `tblnivelacesso` (
  `idnivelacesso` int(11) NOT NULL,
  `acesso` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tblnivelacesso`
--

INSERT INTO `tblnivelacesso` (`idnivelacesso`, `acesso`) VALUES
(1, 'administrador'),
(2, 'Colaborador'),
(3, 'Usuário'),
(4, 'Fornecedor');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tblsituacao`
--

CREATE TABLE `tblsituacao` (
  `idsituacao` int(11) NOT NULL,
  `situacao` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tblsituacao`
--

INSERT INTO `tblsituacao` (`idsituacao`, `situacao`) VALUES
(1, 'ativo'),
(2, 'inativo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tblusuarios`
--

CREATE TABLE `tblusuarios` (
  `idusuario` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `e-mail` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `idsituacao` int(11) NOT NULL,
  `idnivelacesso` int(11) NOT NULL,
  `criado` date NOT NULL,
  `modificado` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tblusuarios`
--

INSERT INTO `tblusuarios` (`idusuario`, `nome`, `e-mail`, `senha`, `idsituacao`, `idnivelacesso`, `criado`, `modificado`) VALUES
(1, 'rodrigo', 'rodrigo@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1, 1, '2021-12-19', '2021-12-19'),
(2, 'Bernardo', 'bernardo@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 2, 2, '2021-12-19', '2021-12-19');

-- --------------------------------------------------------

--
-- Estrutura da tabela `venda`
--

CREATE TABLE `venda` (
  `idvenda` int(11) NOT NULL,
  `dtvenda` date NOT NULL,
  `idproduto` int(11) NOT NULL,
  `idvendedor` int(11) NOT NULL,
  `qtdvenda` float(10,2) NOT NULL,
  `foto` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `venda`
--

INSERT INTO `venda` (`idvenda`, `dtvenda`, `idproduto`, `idvendedor`, `qtdvenda`, `foto`) VALUES
(1, '2021-12-24', 1, 2, 10.00, ''),
(3, '2021-12-01', 4, 4, 4.00, ''),
(4, '2022-01-08', 6, 3, 10.00, ''),
(5, '2022-01-09', 1, 1, 12.00, ''),
(6, '2022-01-23', 1, 1, 12.00, 'imagem2.png'),
(7, '2022-01-16', 2, 1, 3.00, 'imagem1_IMG.png'),
(8, '2022-01-23', 1, 1, 1.00, 'imagem3.png'),
(9, '2022-01-24', 1, 1, 2.00, 'imagem2.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendedor`
--

CREATE TABLE `vendedor` (
  `idvendedor` int(11) NOT NULL,
  `vendedor` varchar(30) NOT NULL,
  `dataadmissao` date NOT NULL,
  `foto` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `vendedor`
--

INSERT INTO `vendedor` (`idvendedor`, `vendedor`, `dataadmissao`, `foto`) VALUES
(1, 'Tayane  Cardoso', '2021-12-08', ''),
(2, 'Tayane  França', '2021-12-08', ''),
(3, 'Tayane  França', '2021-12-09', ''),
(8, 'Camila Braga', '2021-01-01', ''),
(9, 'Tayane Braga', '2021-12-08', ''),
(11, 'Manu', '2021-12-12', ''),
(22, 'Tayane  Cardoso', '2021-12-08', 'criança1.jpg'),
(23, 'Tayane  Cardoso', '2021-12-08', 'tony.jfif'),
(24, 'rodrigo', '2022-01-23', 'images.jpeg'),
(25, 'rodrigo', '2022-01-23', '1.jpeg'),
(26, 'Rodrigo', '2022-02-05', '');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`idcliente`);

--
-- Índices para tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`idproduto`);

--
-- Índices para tabela `tblnivelacesso`
--
ALTER TABLE `tblnivelacesso`
  ADD PRIMARY KEY (`idnivelacesso`);

--
-- Índices para tabela `tblsituacao`
--
ALTER TABLE `tblsituacao`
  ADD PRIMARY KEY (`idsituacao`);

--
-- Índices para tabela `tblusuarios`
--
ALTER TABLE `tblusuarios`
  ADD PRIMARY KEY (`idusuario`);

--
-- Índices para tabela `venda`
--
ALTER TABLE `venda`
  ADD PRIMARY KEY (`idvenda`);

--
-- Índices para tabela `vendedor`
--
ALTER TABLE `vendedor`
  ADD PRIMARY KEY (`idvendedor`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `idcliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `idproduto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `tblnivelacesso`
--
ALTER TABLE `tblnivelacesso`
  MODIFY `idnivelacesso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `tblsituacao`
--
ALTER TABLE `tblsituacao`
  MODIFY `idsituacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tblusuarios`
--
ALTER TABLE `tblusuarios`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `venda`
--
ALTER TABLE `venda`
  MODIFY `idvenda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `vendedor`
--
ALTER TABLE `vendedor`
  MODIFY `idvendedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
