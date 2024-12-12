DROP DATABASE IF EXISTS `shopprime`;
CREATE SCHEMA IF NOT EXISTS `shopprime`;
USE `shopprime`;

CREATE TABLE `users` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `email` VARCHAR(255) NOT NULL,
    `name` VARCHAR(255) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    `address` VARCHAR(255),
    `photo` VARCHAR(255),
    `role` ENUM("USER", "ADMIN") DEFAULT 'USER',
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
    `price` DECIMAL(10,2) NOT NULL,
    `img` VARCHAR(255) NOT NULL,
    `id_category` INT NOT NULL,
    FOREIGN KEY (`id_category`) REFERENCES `categories`(`id`),
    PRIMARY KEY (`id`)
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

INSERT INTO `users` (`email`, `name`, `password`, `role`) VALUES ('adm@adm.com','Administrador', '$2y$10$xTUSv/k4BovdEzJCnIKU3.U4KtfP2N3J3ajJzSRRJaKrpYMHOSfL.', "ADMIN"); -- P@ssword

INSERT INTO `categories` (id, name) VALUES
(1, "Celular"),
(2, "Assinaturas"),
(3, "Jogos para Celular"),
(4, "Jogos para Computador");