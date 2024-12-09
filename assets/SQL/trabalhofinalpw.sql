<link rel="stylesheet" href="assets/CSS/css2.css">
CREATE SCHEMA IF NOT EXISTS `shopprime`;

USE `shopprime`;

CREATE TABLE `clientes` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `email` VARCHAR(255) NOT NULL,
    `senha` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id`)
);

CREATE TABLE `categorias` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `nome` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id`)
);

CREATE TABLE `produtos` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `nome` VARCHAR(255) NOT NULL,
    `imagem` VARCHAR(255) NOT NULL,
    `preco` DECIMAL(10,2) NOT NULL,
    PRIMARY KEY (`id`)
);

CREATE TABLE `categorias_produtos` (
    `id_categoria` INT NOT NULL,
    `id_produto` INT NOT NULL,
    PRIMARY KEY (`id_categoria`, `id_produto`),
    FOREIGN KEY (`id_categoria`) REFERENCES `categorias`(`id`),
    FOREIGN KEY (`id_produto`) REFERENCES `produtos`(`id`)
);

CREATE TABLE `pedidos` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `id_cliente` INT NOT NULL,
    `total` DECIMAL(10,2),
    PRIMARY KEY (`id`),
    FOREIGN KEY (`id_cliente`) REFERENCES `clientes`(`id`)
);

CREATE TABLE `produtos_pedidos` (
    `id_pedido` INT NOT NULL,
    `id_produto` INT NOT NULL,
    PRIMARY KEY (`id_pedido`, `id_produto`),
    FOREIGN KEY (`id_pedido`) REFERENCES `pedidos`(`id`),
    FOREIGN KEY (`id_produto`) REFERENCES `produtos`(`id`)
);

INSERT INTO `clientes` (`id`, `email`, `senha`) VALUES (1,'ADM@ADM.ADM','admsenha');


--INSERT INTO `categorias_produtos` (`id_categoria`, `id_produto`)
--VALUES (1, 1); -- Isso associaria o produto com ID 1 à categoria com ID 1