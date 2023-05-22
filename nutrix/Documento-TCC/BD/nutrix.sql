-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 22-Maio-2023 às 20:52
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

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE `categoria` (
  `cod` int(6) NOT NULL,
  `nome` tinytext DEFAULT NULL,
  `descricao` tinytext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`cod`, `nome`, `descricao`) VALUES
(1, 'Bebidas', 'Essa categoria engloba uma variedade de opções líquidas para consumo, como água, sucos naturais, refrigerantes, chás, café e outras bebidas não alcoólicas.'),
(2, 'Laticínios', 'Os laticínios incluem produtos derivados do leite, como leite em suas diferentes formas (integral, desnatado, sem lactose), queijos de diversos tipos (mussarela, cheddar, prato, etc.), iogurtes e manteiga.'),
(3, 'Carnes e Aves', 'Essa categoria abrange diferentes tipos de carne, como carnes bovinas (como filé mignon, costela, picanha), suínas (como lombo, bacon) e aves (como frango e peru), além de peixes e frutos do mar.'),
(4, 'Frutas e Vegetais', 'Nessa categoria estão inclusas frutas frescas, legumes e verduras, que são fontes de vitaminas, minerais e fibras essenciais para uma dieta equilibrada.'),
(5, 'Grãos e Cereais', 'Essa categoria engloba alimentos como arroz, trigo, aveia, milho, pães e massas, que são fontes de carboidratos e fornecem energia ao organismo.'),
(6, 'Produtos de Panificação', 'Aqui são encontrados produtos assados, como bolos, tortas, pães, biscoitos e outras delícias de padaria, ideais para lanches ou sobremesas.'),
(7, 'Produtos Orgânicos', 'Essa categoria refere-se a alimentos cultivados sem o uso de pesticidas, fertilizantes químicos ou organismos geneticamente modificados, proporcionando uma opção mais natural e saudável.'),
(8, 'Snacks e Petiscos', 'Nessa categoria estão inclusos alimentos práticos e saborosos para consumo entre as refeições principais, como salgadinhos, nuts, barras de cereal, pipoca e outros petiscos.'),
(9, 'Sobremesas', 'Essa categoria é composta por opções doces para finalizar uma refeição, como sorvetes, doces, chocolates, pudins e outras sobremesas deliciosas.'),
(10, 'Alimentos Congelados', 'Essa categoria inclui alimentos que foram congelados para conservação, como pizzas, massas prontas, vegetais congelados, facilitando a preparação de refeições rápidas.');

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

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente_categoria`
--

CREATE TABLE `cliente_categoria` (
  `cpf_cliente` varchar(14) NOT NULL,
  `cod_categoria` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
('53027394000138', 'Amigo do porco', '11943356283', 'estevaoeferreira1@protonmail.com', '$2y$10$0fk3KNMy6Gtslqc4hO/v8uE1ksKjYsxNgdwK7ANf4x3HLlShD61KS', 'SP', 'Jundiaí', 'Agapeama', 'RUA', '13203010', '25', 'Casa 2');

-- --------------------------------------------------------

--
-- Estrutura da tabela `favorito`
--

CREATE TABLE `favorito` (
  `cpf_cliente` varchar(14) DEFAULT NULL,
  `cnpj_estabelecimento` varchar(18) DEFAULT NULL,
  `cod_prod` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `cod` int(6) NOT NULL,
  `nome` tinytext DEFAULT NULL,
  `tipo` tinytext DEFAULT NULL,
  `foto` blob DEFAULT NULL,
  `descricao` text DEFAULT NULL,
  `valor` decimal(6,2) DEFAULT NULL,
  `tabela_nutri` text DEFAULT NULL,
  `compo` tinytext DEFAULT NULL,
  `cnpj_estabelecimento` varchar(18) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`cod`, `nome`, `tipo`, `foto`, `descricao`, `valor`, `tabela_nutri`, `compo`, `cnpj_estabelecimento`) VALUES
(1, 'Amigo do porco', NULL, 0x62616e6e65722e706e67, NULL, '119.99', NULL, NULL, '53027394000138'),
(2, 'Amigo do porco', NULL, 0x62616e6e65722e706e67, NULL, '119.99', NULL, NULL, '53027394000138'),
(3, 'Amigo do porco', NULL, 0x62616e6e65722e706e67, NULL, '119.99', NULL, NULL, '53027394000138');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto_categoria`
--

CREATE TABLE `produto_categoria` (
  `cod_produto` int(6) NOT NULL,
  `cod_categoria` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
-- Índices para tabela `produto_categoria`
--
ALTER TABLE `produto_categoria`
  ADD PRIMARY KEY (`cod_produto`,`cod_categoria`),
  ADD KEY `fk_produto_categoria_categoria` (`cod_categoria`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categoria`
--
ALTER TABLE `categoria`
  MODIFY `cod` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `cod` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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

--
-- Limitadores para a tabela `produto_categoria`
--
ALTER TABLE `produto_categoria`
  ADD CONSTRAINT `fk_produto_categoria_categoria` FOREIGN KEY (`cod_categoria`) REFERENCES `categoria` (`cod`),
  ADD CONSTRAINT `fk_produto_categoria_produto` FOREIGN KEY (`cod_produto`) REFERENCES `produto` (`cod`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
