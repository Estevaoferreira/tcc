

/*
Tabela cliente com ligação 1 pra N com a tabela favoritos
Tabela cliente com ligação N pra N com a tabela cliente_categoria
Tabela estabelecimento com ligação N pra N com a tabela favorito
Tabela estabelecimento com ligação 1 pra N com a tabela produto
Tabela produto com ligação N pra N com a tabela produto_categoria
Tabela produto com ligação N pra N com a tabela produto_ingrediente
Tabela produto com ligação N pra N com a tabela favorito
Tabela categoria com ligação N pra N com a tabela produto_categoria
Tabela categoria com ligação N pra N com a tabela cliente_categoria
*/


/*------------------------------------------*/



CREATE DATABASE IF NOT EXISTS nutrix;

USE nutrix;


CREATE TABLE cliente (

  cpf VARCHAR(14) PRIMARY KEY,
  nome TINYTEXT,
  telefone VARCHAR(18),   
  email TINYTEXT,
  senha TINYTEXT,
  cod_categoria INT(6)
);

CREATE TABLE favorito_estabelecimento (

  cpf_cliente VARCHAR(14),
  cnpj_estabelecimento VARCHAR(18)
);

CREATE TABLE favorito_produto (

  cpf_cliente VARCHAR(14),
  cod_prod INT(6)
);


CREATE TABLE estabelecimento (

  cnpj VARCHAR(18) PRIMARY KEY,
  nome TINYTEXT,
  telefone VARCHAR(18),
  email TINYTEXT,
  senha TINYTEXT,
  estado VARCHAR(2),
  cidade TINYTEXT,
  bairro TINYTEXT,
  logradouro TINYTEXT,
  cep VARCHAR(10),
  numero VARCHAR(6),
  complemento TINYTEXT
);

CREATE TABLE produto(

  cod INT(6) PRIMARY KEY AUTO_INCREMENT,
  nome TINYTEXT,
  foto VARCHAR(100),
  descricao TINYTEXT,
  valor DECIMAL(14,4),
  tabela_nutri TEXT,
  compo TINYTEXT,
  cnpj_estabelecimento VARCHAR(18)  
);


CREATE TABLE categoria(

  cod INT(6) PRIMARY KEY AUTO_INCREMENT,
  nome TINYTEXT,
  descricao TINYTEXT
);

CREATE TABLE ingrediente(

  cod INT(6) PRIMARY KEY AUTO_INCREMENT,
  nome TINYTEXT
);

CREATE TABLE cliente_categoria (
  cpf_cliente VARCHAR(14),
  cod_categoria INT(6),
  PRIMARY KEY(cpf_cliente, cod_categoria)
);


CREATE TABLE produto_categoria (
  cod_produto INT(6),
  cod_categoria INT(6),
  PRIMARY KEY(cod_produto, cod_categoria)
);

CREATE TABLE produto_ingrediente (
  cod_produto INT(6),
  cod_ingrediente INT(6),
  PRIMARY KEY(cod_produto, cod_ingrediente)
);






/*------------Alterações na tabela, adicionando as chaves estrangeiras----------------------------*/

/*Tabela FAVORITO*/
ALTER TABLE favorito_produto ADD CONSTRAINT fk_favorito_produto_cpf_cliente
FOREIGN KEY(cpf_cliente) REFERENCES cliente(cpf);
ALTER TABLE favorito_estabelecimento ADD CONSTRAINT fk_favorito_estabelecimento_cpf_cliente
FOREIGN KEY(cpf_cliente) REFERENCES cliente(cpf);
ALTER TABLE favorito_estabelecimento ADD CONSTRAINT fk_favorito_estabelecimento_cnpj_estabelecimento
FOREIGN KEY(cnpj_estabelecimento) REFERENCES estabelecimento(cnpj);
ALTER TABLE favorito_produto ADD CONSTRAINT fk_favorito_produto_cod_prod
FOREIGN KEY(cod_prod) REFERENCES produto(cod);


/*Tabela PRODUTO*/
ALTER TABLE produto ADD CONSTRAINT fk_produto_cnpj_estabelecimento
FOREIGN KEY(cnpj_estabelecimento) REFERENCES estabelecimento(cnpj);


/*NOVO-----------*/

/*Tabela CLIENTE/CATEGORIA*/
ALTER TABLE cliente_categoria ADD CONSTRAINT fk_cliente_categoria_cliente
FOREIGN KEY (cpf_cliente) REFERENCES cliente(cpf);
ALTER TABLE cliente_categoria ADD CONSTRAINT fk_cliente_categoria_categoria
FOREIGN KEY (cod_categoria) REFERENCES categoria(cod);


/*Tabela PRODUTO/CATEGORIA*/
ALTER TABLE produto_categoria ADD CONSTRAINT fk_produto_categoria_produto
FOREIGN KEY(cod_produto) REFERENCES produto(cod);
ALTER TABLE produto_categoria ADD CONSTRAINT fk_produto_categoria_categoria
FOREIGN KEY(cod_categoria) REFERENCES categoria(cod);

/*Tabela PRODUTO/INGREDIENTE*/
ALTER TABLE produto_ingrediente ADD CONSTRAINT fk_produto_ingrediente_produto
FOREIGN KEY(cod_produto) REFERENCES produto(cod);
ALTER TABLE produto_ingrediente ADD CONSTRAINT fk_produto_ingrediente_ingrediente
FOREIGN KEY(cod_ingrediente) REFERENCES ingrediente(cod);

/*-------------------------Inserção das catergorias na tabaela categorias-------------------------------*/
USE nutrix;

INSERT INTO categoria (nome, descricao) VALUES
    ('Bebidas', 'Essa categoria engloba uma variedade de opções líquidas para consumo, como água, sucos naturais, refrigerantes, chás, café e outras bebidas não alcoólicas.'),
    ('Laticínios', 'Os laticínios incluem produtos derivados do leite, como leite em suas diferentes formas (integral, desnatado, sem lactose), queijos de diversos tipos (mussarela, cheddar, prato, etc.), iogurtes e manteiga.'),
    ('Carnes e Aves', 'Essa categoria abrange diferentes tipos de carne, como carnes bovinas (como filé mignon, costela, picanha), suínas (como lombo, bacon) e aves (como frango e peru), além de peixes e frutos do mar.'),
    ('Frutas e Vegetais', 'Nessa categoria estão inclusas frutas frescas, legumes e verduras, que são fontes de vitaminas, minerais e fibras essenciais para uma dieta equilibrada.'),
    ('Grãos e Cereais', 'Essa categoria engloba alimentos como arroz, trigo, aveia, milho, pães e massas, que são fontes de carboidratos e fornecem energia ao organismo.'),
    ('Produtos de Panificação', 'Aqui são encontrados produtos assados, como bolos, tortas, pães, biscoitos e outras delícias de padaria, ideais para lanches ou sobremesas.'),
    ('Produtos Orgânicos', 'Essa categoria refere-se a alimentos cultivados sem o uso de pesticidas, fertilizantes químicos ou organismos geneticamente modificados, proporcionando uma opção mais natural e saudável.'),
    ('Snacks e Petiscos', 'Nessa categoria estão inclusos alimentos práticos e saborosos para consumo entre as refeições principais, como salgadinhos, nuts, barras de cereal, pipoca e outros petiscos.'),
    ('Sobremesas', 'Essa categoria é composta por opções doces para finalizar uma refeição, como sorvetes, doces, chocolates, pudins e outras sobremesas deliciosas.'),
    ('Alimentos Congelados', 'Essa categoria inclui alimentos que foram congelados para conservação, como pizzas, massas prontas, vegetais congelados, facilitando a preparação de refeições rápidas.');













