CREATE DATABASE IF NOT EXISTS shopprime;

USE shopprime;

CREATE TABLE clientes (
    id INT AUTO_INCREMENT,
    nome VARCHAR(255),
    email VARCHAR(255),
    senha VARCHAR(255),
    PRIMARY KEY (id)
);

CREATE TABLE gift_cards (
    id INT AUTO_INCREMENT,
    valor DECIMAL(10,2),
    status VARCHAR(255),
    PRIMARY KEY (id)
);

CREATE TABLE categorias (
    id INT AUTO_INCREMENT,
    nome VARCHAR(255),
    PRIMARY KEY (id)
);

CREATE TABLE produtos (
    id INT AUTO_INCREMENT,
    nome VARCHAR(255),
    descricao TEXT,
    imagem VARCHAR(255),
    id_categoria INT,
    PRIMARY KEY (id),
    FOREIGN KEY (id_categoria) REFERENCES categorias(id)
);

CREATE TABLE pedidos (
    id INT AUTO_INCREMENT,
    id_cliente INT,
    data_hora TIMESTAMP,
    total DECIMAL(10,2),
    PRIMARY KEY (id),
    FOREIGN KEY (id_cliente) REFERENCES clientes(id)
);

CREATE TABLE itens_pedido (
    id INT AUTO_INCREMENT,
    id_pedido INT,
    id_produto INT,
    quantidade INT,
    PRIMARY KEY (id),
    FOREIGN KEY (id_pedido) REFERENCES pedidos(id),
    FOREIGN KEY (id_produto) REFERENCES produtos(id)
);