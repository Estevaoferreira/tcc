cliente{
  cpf   int(11) primary_key
  nome    varchar(50) 
  telefone  int(11)
  email   varchar(250)
  senha   varchar(250)
}

favorito {
  cpf   int(11)
  cnpj    int(13)
  cod_produto   int(6)
} 

estabelecimento{
  cnpj    int(13) primary_key
  nome    varchar(50)
  telefone  int(11)
  email   varchar(250)
  senha   varchar(250)
  estado    varchar(2)
  cidade    varchar(50)
  bairro    varchar(50)
  logradouro  varchar(50)
  cep   int(9)
  numero    int(6)
  complemento smaltext
}

produto{
  cod_prod  int(6)
  nome    varchar(50)
  tipo    varchar(50)
  foto    blob
  descr   varchar(100)
  valor   decimal(6,2)
  tabela_nutri  smalltext
  composicao  smalltext
  cnpj    int(13)
}

categoria{
  cod_categoria int(3) primary_key
  nome    varchar(20)
  cod_prod  int(6) foreing_key references (produto)
}










-------------------------------------------







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

CREATE TABLE favorito (

  cpf_cliente VARCHAR(14),
  cnpj_estabelecimento VARCHAR(18),
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

  cod INT(6) PRIMARY KEY,
  nome TINYTEXT,
  tipo TINYTEXT,
  foto BLOB,
  descricao TINYTEXT,
  valor DECIMAL(6,2),
  tabela_nutri TEXT,
  compo TINYTEXT,
  cnpj_estabelecimento VARCHAR(18)  
);


CREATE TABLE categoria(

  cod INT(6) PRIMARY KEY,
  nome TINYTEXT,
  cpf_cliente VARCHAR(14),
  cod_prod INT(6)
);




/*------------Alterações na tabela, adicionando as chaves estrangeiras----------------------------*/
/*Tabela CLIENTE*/
ALTER TABLE cliente ADD CONSTRAINT fk_cliente_cod_categoria
FOREIGN KEY(cod_categoria) REFERENCES categoria(cod);


/*Tabela FAVORITO*/
ALTER TABLE favorito ADD CONSTRAINT fk_favorito_cpf_cliente
FOREIGN KEY(cpf_cliente) REFERENCES cliente(cpf);
ALTER TABLE favorito ADD CONSTRAINT fk_favorito_cnpj_estabelecimento
FOREIGN KEY(cnpj_estabelecimento) REFERENCES estabelecimento(cnpj);
ALTER TABLE favorito ADD CONSTRAINT fk_favorito_cod_prod
FOREIGN KEY(cod_prod) REFERENCES produto(cod);


/*Tabela PRODUTO*/
ALTER TABLE produto ADD CONSTRAINT fk_produto_cnpj_estabelecimento
FOREIGN KEY(cnpj_estabelecimento) REFERENCES estabelecimento(cnpj);


/*Tabela CATEGORIA*/
ALTER TABLE categoria ADD CONSTRAINT fk_categoria_cpf_cliente
FOREIGN KEY(cpf_cliente) REFERENCES cliente(cpf);
ALTER TABLE categoria ADD CONSTRAINT fk_categoria_cod_produto
FOREIGN KEY(cod_prod) REFERENCES produto(cod);

















