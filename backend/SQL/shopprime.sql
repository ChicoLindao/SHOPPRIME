CREATE SCHEMA IF NOT EXISTS `shopprime`;

USE `shopprime`;

CREATE TABLE `users` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `email` VARCHAR(255) NOT NULL,
    `name` VARCHAR(255) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    `address` VARCHAR(255),
    `photo` VARCHAR(255),
    PRIMARY KEY (`id`)
);

CREATE TABLE `categories` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id`)
);

CREATE TABLE `products` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `img` VARCHAR(255) NOT NULL,
    `price` DECIMAL(10,2) NOT NULL,
    PRIMARY KEY (`id`)
);

CREATE TABLE `categories_products` (
    `id_category` INT NOT NULL,
    `id_product` INT NOT NULL,
    PRIMARY KEY (`id_category`, `id_product`),
    FOREIGN KEY (`id_category`) REFERENCES `categories`(`id`),
    FOREIGN KEY (`id_product`) REFERENCES `products`(`id`)
);

-- CREATE TABLE `pedidos` (
--     `id` INT NOT NULL AUTO_INCREMENT,
--     `id_cliente` INT NOT NULL,
--     `total` DECIMAL(10,2),
--     PRIMARY KEY (`id`),
--     FOREIGN KEY (`id_cliente`) REFERENCES `clientes`(`id`)
-- );

-- CREATE TABLE `produtos_pedidos` (
--     `id_pedido` INT NOT NULL,
--     `id_produto` INT NOT NULL,
--     PRIMARY KEY (`id_pedido`, `id_produto`),
--     FOREIGN KEY (`id_pedido`) REFERENCES `pedidos`(`id`),
--     FOREIGN KEY (`id_produto`) REFERENCES `produtos`(`id`)
-- );

INSERT INTO `users` (`email`, `name`, `password`) VALUES ('adm@adm.com','Administrador', 'senha');


-- INSERT INTO `categorias_produtos` (`id_categoria`, `id_produto`)
-- VALUES (1, 1); -- Isso associaria o produto com ID 1 à categoria com ID 1