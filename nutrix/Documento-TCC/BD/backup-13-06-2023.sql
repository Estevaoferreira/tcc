-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 14-Jun-2023 às 03:10
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
CREATE DATABASE IF NOT EXISTS `nutrix` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `nutrix`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE `categoria` (
  `cod` int(6) NOT NULL,
  `tipo` tinytext DEFAULT NULL,
  `nome` tinytext DEFAULT NULL,
  `descricao` tinytext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`cod`, `tipo`, `nome`, `descricao`) VALUES
(1, 'estabelecimento', 'Bebidas', 'Essa categoria engloba uma variedade de opções líquidas para consumo, como água, sucos naturais, refrigerantes, chás, café e outras bebidas não alcoólicas.'),
(2, 'estabelecimento', 'Laticínios', 'Os laticínios incluem produtos derivados do leite, como leite em suas diferentes formas (integral, desnatado, sem lactose), queijos de diversos tipos (mussarela, cheddar, prato, etc.), iogurtes e manteiga.'),
(3, 'estabelecimento', 'Carnes e Aves', 'Essa categoria abrange diferentes tipos de carne, como carnes bovinas (como filé mignon, costela, picanha), suínas (como lombo, bacon) e aves (como frango e peru), além de peixes e frutos do mar.'),
(4, 'estabelecimento', 'Frutas e Vegetais', 'Nessa categoria estão inclusas frutas frescas, legumes e verduras, que são fontes de vitaminas, minerais e fibras essenciais para uma dieta equilibrada.'),
(5, 'estabelecimento', 'Grãos e Cereais', 'Essa categoria engloba alimentos como arroz, trigo, aveia, milho, pães e massas, que são fontes de carboidratos e fornecem energia ao organismo.'),
(6, 'estabelecimento', 'Produtos de Panificação', 'Aqui são encontrados produtos assados, como bolos, tortas, pães, biscoitos e outras delícias de padaria, ideais para lanches ou sobremesas.'),
(7, 'estabelecimento', 'Produtos Orgânicos', 'Essa categoria refere-se a alimentos cultivados sem o uso de pesticidas, fertilizantes químicos ou organismos geneticamente modificados, proporcionando uma opção mais natural e saudável.'),
(8, 'estabelecimento', 'Snacks e Petiscos', 'Nessa categoria estão inclusos alimentos práticos e saborosos para consumo entre as refeições principais, como salgadinhos, nuts, barras de cereal, pipoca e outros petiscos.'),
(9, 'estabelecimento', 'Sobremesas', 'Essa categoria é composta por opções doces para finalizar uma refeição, como sorvetes, doces, chocolates, pudins e outras sobremesas deliciosas.'),
(10, 'estabelecimento', 'Alimentos Congelados', 'Essa categoria inclui alimentos que foram congelados para conservação, como pizzas, massas prontas, vegetais congelados, facilitando a preparação de refeições rápidas.'),
(11, 'cliente', 'Vegetarianismo', 'Restrição ao consumo de carne e frutos do mar.'),
(12, 'cliente', 'Veganismo', 'Restrição ao consumo de qualquer alimento de origem animal, incluindo carne, laticínios, ovos e mel.'),
(13, 'cliente', 'Intolerância à lactose', 'Restrição ao consumo de produtos lácteos devido à incapacidade de digerir a lactose.'),
(14, 'cliente', 'Alergia ao glúten', 'Restrição ao consumo de trigo, cevada, centeio e produtos derivados.'),
(15, 'cliente', 'Diabetes', 'Restrição ao consumo de açúcar e alimentos com alto teor de carboidratos para controlar os níveis de glicose no sangue.'),
(16, 'cliente', 'Intolerância ao glúten não celíaca', 'Restrição ao consumo de glúten devido a sintomas digestivos e outros associados à ingestão de glúten.'),
(17, 'cliente', 'Alergias alimentares', 'Restrição ao consumo de alimentos específicos, como amendoim, mariscos, ovos, soja, etc., devido a reações alérgicas.'),
(18, 'cliente', 'Dieta sem sal', 'Restrição ao consumo de sal devido a problemas de pressão arterial elevada ou outras condições de saúde.'),
(19, 'cliente', 'Restrição a alimentos processados', 'Restrição ao consumo de alimentos altamente processados e ricos em aditivos artificiais.'),
(20, 'cliente', 'Restrição a alimentos refinados', 'Restrição ao consumo de alimentos refinados, como açúcar refinado, farinha branca, arroz branco, etc., devido aos seus efeitos na saúde.'),
(21, 'estabelecimento', 'Bebidas', 'Essa categoria engloba uma variedade de opções líquidas para consumo, como água, sucos naturais, refrigerantes, chás, café e outras bebidas não alcoólicas.'),
(22, 'estabelecimento', 'Laticínios', 'Os laticínios incluem produtos derivados do leite, como leite em suas diferentes formas (integral, desnatado, sem lactose), queijos de diversos tipos (mussarela, cheddar, prato, etc.), iogurtes e manteiga.'),
(23, 'estabelecimento', 'Carnes e Aves', 'Essa categoria abrange diferentes tipos de carne, como carnes bovinas (como filé mignon, costela, picanha), suínas (como lombo, bacon) e aves (como frango e peru), além de peixes e frutos do mar.'),
(24, 'estabelecimento', 'Frutas e Vegetais', 'Nessa categoria estão inclusas frutas frescas, legumes e verduras, que são fontes de vitaminas, minerais e fibras essenciais para uma dieta equilibrada.'),
(25, 'estabelecimento', 'Grãos e Cereais', 'Essa categoria engloba alimentos como arroz, trigo, aveia, milho, pães e massas, que são fontes de carboidratos e fornecem energia ao organismo.'),
(26, 'estabelecimento', 'Produtos de Panificação', 'Aqui são encontrados produtos assados, como bolos, tortas, pães, biscoitos e outras delícias de padaria, ideais para lanches ou sobremesas.'),
(27, 'estabelecimento', 'Produtos Orgânicos', 'Essa categoria refere-se a alimentos cultivados sem o uso de pesticidas, fertilizantes químicos ou organismos geneticamente modificados, proporcionando uma opção mais natural e saudável.'),
(28, 'estabelecimento', 'Snacks e Petiscos', 'Nessa categoria estão inclusos alimentos práticos e saborosos para consumo entre as refeições principais, como salgadinhos, nuts, barras de cereal, pipoca e outros petiscos.'),
(29, 'estabelecimento', 'Sobremesas', 'Essa categoria é composta por opções doces para finalizar uma refeição, como sorvetes, doces, chocolates, pudins e outras sobremesas deliciosas.'),
(30, 'estabelecimento', 'Alimentos Congelados', 'Essa categoria inclui alimentos que foram congelados para conservação, como pizzas, massas prontas, vegetais congelados, facilitando a preparação de refeições rápidas.'),
(31, 'cliente', 'Vegetarianismo', 'Restrição ao consumo de carne e frutos do mar.'),
(32, 'cliente', 'Veganismo', 'Restrição ao consumo de qualquer alimento de origem animal, incluindo carne, laticínios, ovos e mel.'),
(33, 'cliente', 'Intolerância à lactose', 'Restrição ao consumo de produtos lácteos devido à incapacidade de digerir a lactose.'),
(34, 'cliente', 'Alergia ao glúten', 'Restrição ao consumo de trigo, cevada, centeio e produtos derivados.'),
(35, 'cliente', 'Diabetes', 'Restrição ao consumo de açúcar e alimentos com alto teor de carboidratos para controlar os níveis de glicose no sangue.'),
(36, 'cliente', 'Intolerância ao glúten não celíaca', 'Restrição ao consumo de glúten devido a sintomas digestivos e outros associados à ingestão de glúten.'),
(37, 'cliente', 'Alergias alimentares', 'Restrição ao consumo de alimentos específicos, como amendoim, mariscos, ovos, soja, etc., devido a reações alérgicas.'),
(38, 'cliente', 'Dieta sem sal', 'Restrição ao consumo de sal devido a problemas de pressão arterial elevada ou outras condições de saúde.'),
(39, 'cliente', 'Restrição a alimentos processados', 'Restrição ao consumo de alimentos altamente processados e ricos em aditivos artificiais.'),
(40, 'cliente', 'Restrição a alimentos refinados', 'Restrição ao consumo de alimentos refinados, como açúcar refinado, farinha branca, arroz branco, etc., devido aos seus efeitos na saúde.');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `cpf` varchar(14) NOT NULL,
  `nome` tinytext DEFAULT NULL,
  `telefone` varchar(18) DEFAULT NULL,
  `email` tinytext DEFAULT NULL,
  `senha` tinytext DEFAULT NULL,
  `cod_categoria` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`cpf`, `nome`, `telefone`, `email`, `senha`, `cod_categoria`) VALUES
('18829377759', 'Estevão Ferreira', '11943356283', 'estevaoeferreira9984@gmail.com', '$2y$10$P9iQN7DGdPjojG3DCNHoQeggNO67Vu3EjWfg.6xb79ZQSwP6qYTXK', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente_categoria`
--

CREATE TABLE `cliente_categoria` (
  `cpf_cliente` varchar(14) NOT NULL,
  `cod_categoria` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `cliente_categoria`
--

INSERT INTO `cliente_categoria` (`cpf_cliente`, `cod_categoria`) VALUES
('18829377759', 11),
('18829377759', 12),
('18829377759', 18);

-- --------------------------------------------------------

--
-- Estrutura da tabela `estabelecimento`
--

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
('', '', '', '', '$2y$10$rM0DhFHZDqV5qNDonvzE9uMMAI3bMpF8IhkaX5NmNTC.0d3B9THn6', '', '', '', '', '', '', ''),
('53027394000138', 'Amigo do porco', '11943356283', 'estevaoeferreira1@protonmail.com', '$2y$10$mk9VrqNLdEVFhnIU7SLDa.aR8ODljingJHckLEFp6Gjsuv7/HMgO6', 'SP', 'Jundiaí', 'Agapeama', 'Rua', '13203010', '25', 'Loja 3'),
('79298363000105', 'Amigo do porco', '11943356283', 'estevaoeferreira9984@gmail.com', '$2y$10$ZkbO2s.W6Widg/LuSPmT2ezCaDF4xHgOvjGTdFOWbuVX7zGhiaPZm', 'SP', 'Jundiaí', 'Agapeama ', 'Rua ', '13203010', '25', 'Casa 2 ');

-- --------------------------------------------------------

--
-- Estrutura da tabela `favorito_estabelecimento`
--

CREATE TABLE `favorito_estabelecimento` (
  `cpf_cliente` varchar(14) DEFAULT NULL,
  `cnpj_estabelecimento` varchar(18) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `favorito_produto`
--

CREATE TABLE `favorito_produto` (
  `cpf_cliente` varchar(14) DEFAULT NULL,
  `cod_prod` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ingrediente`
--

CREATE TABLE `ingrediente` (
  `cod` int(6) NOT NULL,
  `nome` tinytext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `ingrediente`
--

INSERT INTO `ingrediente` (`cod`, `nome`) VALUES
(1, 'Asdas'),
(2, 'Asdas'),
(3, 'Asdasd'),
(4, 'Asdas'),
(5, 'Asdasd'),
(6, 'Asd');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `cod` int(6) NOT NULL,
  `nome` tinytext DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `descricao` tinytext DEFAULT NULL,
  `valor` decimal(14,4) DEFAULT NULL,
  `tabela_nutri` text DEFAULT NULL,
  `compo` tinytext DEFAULT NULL,
  `cnpj_estabelecimento` varchar(18) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`cod`, `nome`, `foto`, `descricao`, `valor`, `tabela_nutri`, `compo`, `cnpj_estabelecimento`) VALUES
(1, 'TechWave', 'imagens_produto/6474bf36b82f9_dicionario de dados - categoria_produto.jpeg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce id convallis urna. Morbi auctor tellus eu metus dignissim, ac fringilla felis hendrerit. Integer id tortor eu neque ullamcorper faucibus ac et arcu. Sed vestibulum risus a eros rhoncus vulputa', '5498175.6500', NULL, NULL, '79298363000105'),
(2, 'Amigo do porco', 'imagens_produto/6474bfd919256_Untitled_logo_1_free-file_auto_x2.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce id convallis urna. Morbi auctor tellus eu metus dignissim, ac fringilla felis hendrerit. Integer id tortor eu neque ullamcorper faucibus ac et arcu. Sed vestibulum risus a eros rhoncus vulputa', '100.1000', NULL, NULL, '79298363000105');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto_categoria`
--

CREATE TABLE `produto_categoria` (
  `cod_produto` int(6) NOT NULL,
  `cod_categoria` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `produto_categoria`
--

INSERT INTO `produto_categoria` (`cod_produto`, `cod_categoria`) VALUES
(1, 2),
(1, 3),
(2, 3),
(2, 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto_ingrediente`
--

CREATE TABLE `produto_ingrediente` (
  `cod_produto` int(6) NOT NULL,
  `cod_ingrediente` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `produto_ingrediente`
--

INSERT INTO `produto_ingrediente` (`cod_produto`, `cod_ingrediente`) VALUES
(1, 4),
(1, 5),
(2, 6);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`cod`);

--
-- Índices para tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`cpf`);

--
-- Índices para tabela `cliente_categoria`
--
ALTER TABLE `cliente_categoria`
  ADD PRIMARY KEY (`cpf_cliente`,`cod_categoria`),
  ADD KEY `fk_cliente_categoria_categoria` (`cod_categoria`);

--
-- Índices para tabela `estabelecimento`
--
ALTER TABLE `estabelecimento`
  ADD PRIMARY KEY (`cnpj`);

--
-- Índices para tabela `favorito_estabelecimento`
--
ALTER TABLE `favorito_estabelecimento`
  ADD KEY `fk_favorito_estabelecimento_cpf_cliente` (`cpf_cliente`),
  ADD KEY `fk_favorito_estabelecimento_cnpj_estabelecimento` (`cnpj_estabelecimento`);

--
-- Índices para tabela `favorito_produto`
--
ALTER TABLE `favorito_produto`
  ADD KEY `fk_favorito_produto_cpf_cliente` (`cpf_cliente`),
  ADD KEY `fk_favorito_produto_cod_prod` (`cod_prod`);

--
-- Índices para tabela `ingrediente`
--
ALTER TABLE `ingrediente`
  ADD PRIMARY KEY (`cod`);

--
-- Índices para tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`cod`),
  ADD KEY `fk_produto_cnpj_estabelecimento` (`cnpj_estabelecimento`);

--
-- Índices para tabela `produto_categoria`
--
ALTER TABLE `produto_categoria`
  ADD PRIMARY KEY (`cod_produto`,`cod_categoria`),
  ADD KEY `fk_produto_categoria_categoria` (`cod_categoria`);

--
-- Índices para tabela `produto_ingrediente`
--
ALTER TABLE `produto_ingrediente`
  ADD PRIMARY KEY (`cod_produto`,`cod_ingrediente`),
  ADD KEY `fk_produto_ingrediente_ingrediente` (`cod_ingrediente`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categoria`
--
ALTER TABLE `categoria`
  MODIFY `cod` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de tabela `ingrediente`
--
ALTER TABLE `ingrediente`
  MODIFY `cod` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `cod` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `cliente_categoria`
--
ALTER TABLE `cliente_categoria`
  ADD CONSTRAINT `fk_cliente_categoria_categoria` FOREIGN KEY (`cod_categoria`) REFERENCES `categoria` (`cod`),
  ADD CONSTRAINT `fk_cliente_categoria_cliente` FOREIGN KEY (`cpf_cliente`) REFERENCES `cliente` (`cpf`);

--
-- Limitadores para a tabela `favorito_estabelecimento`
--
ALTER TABLE `favorito_estabelecimento`
  ADD CONSTRAINT `fk_favorito_estabelecimento_cnpj_estabelecimento` FOREIGN KEY (`cnpj_estabelecimento`) REFERENCES `estabelecimento` (`cnpj`),
  ADD CONSTRAINT `fk_favorito_estabelecimento_cpf_cliente` FOREIGN KEY (`cpf_cliente`) REFERENCES `cliente` (`cpf`);

--
-- Limitadores para a tabela `favorito_produto`
--
ALTER TABLE `favorito_produto`
  ADD CONSTRAINT `fk_favorito_produto_cod_prod` FOREIGN KEY (`cod_prod`) REFERENCES `produto` (`cod`),
  ADD CONSTRAINT `fk_favorito_produto_cpf_cliente` FOREIGN KEY (`cpf_cliente`) REFERENCES `cliente` (`cpf`);

--
-- Limitadores para a tabela `produto`
--
ALTER TABLE `produto`
  ADD CONSTRAINT `fk_produto_cnpj_estabelecimento` FOREIGN KEY (`cnpj_estabelecimento`) REFERENCES `estabelecimento` (`cnpj`);

--
-- Limitadores para a tabela `produto_categoria`
--
ALTER TABLE `produto_categoria`
  ADD CONSTRAINT `fk_produto_categoria_categoria` FOREIGN KEY (`cod_categoria`) REFERENCES `categoria` (`cod`),
  ADD CONSTRAINT `fk_produto_categoria_produto` FOREIGN KEY (`cod_produto`) REFERENCES `produto` (`cod`);

--
-- Limitadores para a tabela `produto_ingrediente`
--
ALTER TABLE `produto_ingrediente`
  ADD CONSTRAINT `fk_produto_ingrediente_ingrediente` FOREIGN KEY (`cod_ingrediente`) REFERENCES `ingrediente` (`cod`),
  ADD CONSTRAINT `fk_produto_ingrediente_produto` FOREIGN KEY (`cod_produto`) REFERENCES `produto` (`cod`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
