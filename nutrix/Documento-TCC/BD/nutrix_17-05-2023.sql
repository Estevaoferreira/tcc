-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 17-Maio-2023 às 20:31
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `nutrix`
--
DROP DATABASE IF EXISTS `nutrix`;
CREATE DATABASE IF NOT EXISTS `nutrix` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `nutrix`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

DROP TABLE IF EXISTS `categoria`;
CREATE TABLE `categoria` (
  `cod` int(6) NOT NULL,
  `nome` tinytext DEFAULT NULL,
  `cpf_cliente` varchar(14) DEFAULT NULL,
  `cod_prod` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE `cliente` (
  `cpf` varchar(14) NOT NULL,
  `nome` tinytext DEFAULT NULL,
  `telefone` varchar(18) DEFAULT NULL,
  `email` tinytext DEFAULT NULL,
  `senha` tinytext DEFAULT NULL,
  `cod_categoria` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `estabelecimento`
--

DROP TABLE IF EXISTS `estabelecimento`;
CREATE TABLE `estabelecimento` (
  `cnpj` varchar(18) NOT NULL,
  `nome` tinytext DEFAULT NULL,
  `telefone` varchar(18) DEFAULT NULL,
  `email` tinytext DEFAULT NULL,
  `senha` tinytext DEFAULT NULL,
  `estado` varchar(2) DEFAULT NULL,
  `cidade` tinytext DEFAULT NULL,
  `bairro` tinytext DEFAULT NULL,
  `logradouro` tinytext DEFAULT NULL,
  `cep` varchar(10) DEFAULT NULL,
  `numero` varchar(6) DEFAULT NULL,
  `complemento` tinytext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `estabelecimento`
--

INSERT INTO `estabelecimento` (`cnpj`, `nome`, `telefone`, `email`, `senha`, `estado`, `cidade`, `bairro`, `logradouro`, `cep`, `numero`, `complemento`) VALUES
('53027394000138', 'Estevão Ferreira', '11943356283', 'estevaoeferreira1@protonmail.com', '$2y$10$qJUE6.Zh.iy1DnFlp9RKxuEUrea8W/9fiOYLMjG8K/nxCfaq7Y/wi', 'SP', 'Jundiaí', 'Agapeama', 'rua', '13203010', '123', 'casa 2');

-- --------------------------------------------------------

--
-- Estrutura da tabela `favorito`
--

DROP TABLE IF EXISTS `favorito`;
CREATE TABLE `favorito` (
  `cpf_cliente` varchar(14) DEFAULT NULL,
  `cnpj_estabelecimento` varchar(18) DEFAULT NULL,
  `cod_prod` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

DROP TABLE IF EXISTS `produto`;
CREATE TABLE `produto` (
  `cod` int(6) NOT NULL,
  `nome` tinytext DEFAULT NULL,
  `tipo` tinytext DEFAULT NULL,
  `foto` blob DEFAULT NULL,
  `descricao` tinytext DEFAULT NULL,
  `valor` decimal(6,2) DEFAULT NULL,
  `tabela_nutri` text DEFAULT NULL,
  `compo` tinytext DEFAULT NULL,
  `cnpj_estabelecimento` varchar(18) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`cod`),
  ADD KEY `fk_categoria_cpf_cliente` (`cpf_cliente`),
  ADD KEY `fk_categoria_cod_produto` (`cod_prod`);

--
-- Índices para tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`cpf`),
  ADD KEY `fk_cliente_cod_categoria` (`cod_categoria`);

--
-- Índices para tabela `estabelecimento`
--
ALTER TABLE `estabelecimento`
  ADD PRIMARY KEY (`cnpj`);

--
-- Índices para tabela `favorito`
--
ALTER TABLE `favorito`
  ADD KEY `fk_favorito_cpf_cliente` (`cpf_cliente`),
  ADD KEY `fk_favorito_cnpj_estabelecimento` (`cnpj_estabelecimento`),
  ADD KEY `fk_favorito_cod_prod` (`cod_prod`);

--
-- Índices para tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`cod`),
  ADD KEY `fk_produto_cnpj_estabelecimento` (`cnpj_estabelecimento`);

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `categoria`
--
ALTER TABLE `categoria`
  ADD CONSTRAINT `fk_categoria_cod_produto` FOREIGN KEY (`cod_prod`) REFERENCES `produto` (`cod`),
  ADD CONSTRAINT `fk_categoria_cpf_cliente` FOREIGN KEY (`cpf_cliente`) REFERENCES `cliente` (`cpf`);

--
-- Limitadores para a tabela `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `fk_cliente_cod_categoria` FOREIGN KEY (`cod_categoria`) REFERENCES `categoria` (`cod`);

--
-- Limitadores para a tabela `favorito`
--
ALTER TABLE `favorito`
  ADD CONSTRAINT `fk_favorito_cnpj_estabelecimento` FOREIGN KEY (`cnpj_estabelecimento`) REFERENCES `estabelecimento` (`cnpj`),
  ADD CONSTRAINT `fk_favorito_cod_prod` FOREIGN KEY (`cod_prod`) REFERENCES `produto` (`cod`),
  ADD CONSTRAINT `fk_favorito_cpf_cliente` FOREIGN KEY (`cpf_cliente`) REFERENCES `cliente` (`cpf`);

--
-- Limitadores para a tabela `produto`
--
ALTER TABLE `produto`
  ADD CONSTRAINT `fk_produto_cnpj_estabelecimento` FOREIGN KEY (`cnpj_estabelecimento`) REFERENCES `estabelecimento` (`cnpj`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
