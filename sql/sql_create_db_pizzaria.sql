CREATE DATABASE db_pizzaria;

USE db_pizzaria;

CREATE TABLE cliente(
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(50) NOT NULL, 
    telefone VARCHAR(15) NOT NULL,
    endereco TEXT NOT NULL,
    senha VARCHAR(6)
);

CREATE TABLE produtos(
	id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    nome VARCHAR(30) NOT NULL, 
    valor DECIMAL(4,2),
    imagem VARCHAR(30) NOT NULL
);

CREATE TABLE pedidos(
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    cod_cliente INT NOT NULL,
    valor_total DECIMAL(10,2),
		FOREIGN KEY (cod_cliente) REFERENCES cliente (id)
);

CREATE TABLE item_produto(
	id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    cod_produto INT,
    cod_pedido INT,
    quantidade INT NOT NULL,
    total DECIMAL(10,2) NOT NULL,
		FOREIGN KEY (cod_produto) REFERENCES produtos (id),
		FOREIGN KEY (cod_pedido) REFERENCES pedidos (id)
);


