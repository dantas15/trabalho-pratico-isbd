-- *******************************************************
-- *** INÍCIO do MySQL Workbench Forward Engineering ***
-- *******************************************************

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema loja
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema loja
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `loja` DEFAULT CHARACTER SET utf8 ;
-- -----------------------------------------------------
-- Schema world
-- -----------------------------------------------------
USE `loja`;

-- -----------------------------------------------------
-- Table `loja`.`Cliente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `loja`.`Cliente` (
    `idCliente` INT NOT NULL AUTO_INCREMENT,
    `cpf` VARCHAR(11) NOT NULL,
    `nomeCliente` VARCHAR(256) NOT NULL,
    `numTelefone` VARCHAR(11) NOT NULL,
    `logradouro` VARCHAR(255) NOT NULL,
    `cidade` VARCHAR(45) NOT NULL,
    `complemento` VARCHAR(45) NULL,
    `numero` INT(4) NOT NULL,
    `bairro` VARCHAR(45) NOT NULL DEFAULT 'Centro',
    `cep` VARCHAR(8) NOT NULL,
    `estado` VARCHAR(2) NOT NULL,
    PRIMARY KEY (`idCliente`),
    UNIQUE INDEX `cpf_UNIQUE` (`cpf` ASC)
) ENGINE = InnoDB;



-- -----------------------------------------------------
-- Table `loja`.`Colaborador`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `loja`.`Colaborador` (
    `idColaborador` INT NOT NULL AUTO_INCREMENT,
    `cargo` VARCHAR(45) NOT NULL,
    `dataContratacao` DATE NOT NULL,
    PRIMARY KEY (`idColaborador`)
) ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `loja`.`Pedido`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `loja`.`Pedido` (
    `idPedido` INT NOT NULL AUTO_INCREMENT,
    `dataPedido` DATE NOT NULL,
    `valorTotal` REAL(8,2) NOT NULL,
    `idCliente` INT NOT NULL,
    `idColaborador` INT NOT NULL,
    PRIMARY KEY (`idPedido`),
    INDEX `fk_Pedido_Cliente_idx` (`idCliente` ASC),
    INDEX `fk_Pedido_Colaborador1_idx` (`idColaborador` ASC),
    CONSTRAINT `fk_Pedido_Cliente`
        FOREIGN KEY (`idCliente`)
        REFERENCES `loja`.`Cliente` (`idCliente`)
        ON DELETE RESTRICT
        ON UPDATE NO ACTION,
    CONSTRAINT `fk_Pedido_Colaborador1`
        FOREIGN KEY (`idColaborador`)
        REFERENCES `loja`.`Colaborador` (`idColaborador`)
        ON DELETE RESTRICT
        ON UPDATE NO ACTION
) ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `loja`.`Categoria`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `loja`.`Categoria` (
    `idCategoria` INT NOT NULL AUTO_INCREMENT,
    `nomeCat` VARCHAR(50) NOT NULL,
    PRIMARY KEY (`idCategoria`)
) ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `loja`.`Produto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `loja`.`Produto` (
    `idProduto` INT NOT NULL AUTO_INCREMENT,
    `nomeProd` VARCHAR(80) NOT NULL,
    `descricao` VARCHAR(255) NOT NULL,
    `preco` REAL(8,2) NOT NULL,
    `quantEstoque` INT(6) NOT NULL,
    `idCategoria` INT NOT NULL,
    PRIMARY KEY (`idProduto`),
    INDEX `fk_Produto_Categoria1_idx` (`idCategoria` ASC),
    CONSTRAINT `fk_Produto_Categoria1`
        FOREIGN KEY (`idCategoria`)
        REFERENCES `loja`.`Categoria` (`idCategoria`)
        ON DELETE RESTRICT
        ON UPDATE NO ACTION
) ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `loja`.`PedidoProduto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `loja`.`PedidoProduto` (
    `idPedido` INT NOT NULL,
    `idProduto` INT(3) NOT NULL,
    `precoVenda` REAL(8,2) NOT NULL,
    `quantidade` INT(5) NOT NULL,
    PRIMARY KEY (`idPedido`, `idProduto`),
    INDEX `fk_Pedido_has_Produto_Produto1_idx` (`idProduto` ASC),
    INDEX `fk_Pedido_has_Produto_Pedido1_idx` (`idPedido` ASC),
    CONSTRAINT `fk_Pedido_has_Produto_Pedido1`
        FOREIGN KEY (`idPedido`)
        REFERENCES `loja`.`Pedido` (`idPedido`)
        ON DELETE CASCADE
        ON UPDATE NO ACTION,
    CONSTRAINT `fk_Pedido_has_Produto_Produto1`
        FOREIGN KEY (`idProduto`)
        REFERENCES `loja`.`Produto` (`idProduto`)
        ON DELETE CASCADE
        ON UPDATE NO ACTION
) ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `loja`.`Fornecedor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `loja`.`Fornecedor` (
    `idFornecedor` INT NOT NULL AUTO_INCREMENT,
    `nomeForn` VARCHAR(80) NOT NULL,
    `numTelefone` VARCHAR(11) NOT NULL,
    `logradouro` VARCHAR(255) NOT NULL,
    `cidade` VARCHAR(45) NOT NULL,
    `complemento` VARCHAR(45) NULL,
    `numero` INT(4) NOT NULL,
    `bairro` VARCHAR(45) NOT NULL,
    `cep` VARCHAR(8) NOT NULL,
    `estado` VARCHAR(2) NOT NULL,
    PRIMARY KEY (`idFornecedor`)
) ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `loja`.`Fornece`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `loja`.`Fornece` (
    `idFornecedor` INT NOT NULL,
    `idProduto` INT NOT NULL,
    INDEX `fk_Fornecedor_has_Produto_Produto1_idx` (`idProduto` ASC),
    INDEX `fk_Fornecedor_has_Produto_Fornecedor1_idx` (`idFornecedor` ASC),
    PRIMARY KEY (`idFornecedor`, `idProduto`),
    CONSTRAINT `fk_Fornecedor_has_Produto_Fornecedor1`
        FOREIGN KEY (`idFornecedor`)
        REFERENCES `loja`.`Fornecedor` (`idFornecedor`)
        ON DELETE CASCADE
        ON UPDATE NO ACTION,
    CONSTRAINT `fk_Fornecedor_has_Produto_Produto1`
        FOREIGN KEY (`idProduto`)
        REFERENCES `loja`.`Produto` (`idProduto`)
        ON DELETE CASCADE
        ON UPDATE NO ACTION
) ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;


-- *******************************************************
-- *** Exemplos de Alter Table ***
-- *******************************************************

/* Adicionando uma nova coluna chamada 'email' à tabela 'Cliente' */
ALTER TABLE `Cliente`
    ADD COLUMN `email` VARCHAR(100) AFTER `numTelefone`;

/* Alterando o tipo da coluna 'numero' de INT para VARCHAR(10) na tabela 'Cliente' */
ALTER TABLE `Cliente`
    MODIFY COLUMN `numero` VARCHAR(10);

/* Removendo a restricao UNIQUE da coluna 'cpf' na tabela 'Cliente' */
ALTER TABLE `Cliente`
    DROP INDEX `cpf_UNIQUE`;

/* Criando uma tabela extra chamada 'Exemplo' */
CREATE TABLE IF NOT EXISTS `Exemplo` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `descricao` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id`)
);

/* Inserindo alguns dados na tabela 'Exemplo' */
INSERT INTO `Exemplo` (`descricao`) VALUES
('Exemplo 1'),
('Exemplo 2'),
('Exemplo 3');

/* Removendo a tabela 'Exemplo' */
DROP TABLE IF EXISTS `Exemplo`;

-- *******************************************************
-- * Exemplo de insercao de dados em cada uma das tabelas *
-- *******************************************************

INSERT INTO `loja`.`Cliente` (`cpf`, `nomeCliente`, `numTelefone`, `logradouro`, `cidade`, `complemento`, `numero`, `bairro`, `cep`, `estado`)
VALUES
    ('11122233384', 'Joao Silva', 1122334455, 'Rua A', 'Sao Paulo', 'Apto 101', 123, 'Centro', '01234567', 'SP'),
    ('22233344475', 'Maria Oliveira', 5544332211, 'Rua B', 'Rio de Janeiro', 'Casa 2', 456, 'Copacabana', '12345678', 'RJ'),
    ('33344455536', 'Carlos Santos', 9988776655, 'Rua C', 'Belo Horizonte', 'Casa 3', 789, 'Barro Preto', '23456789', 'MG'),
    ('44455566627', 'Fernanda Pereira', 1122334455, 'Rua D', 'Porto Alegre', 'Apartamento 4', 101, 'Centro', '34567890', 'RS'),
    ('55566677718', 'Gabriel Lima', 5544332211, 'Rua E', 'Curitiba', 'Casa 5', 112, 'Batel', '45678901', 'PR'),
    ('66677788809', 'Isabela Almeida', 9988776655, 'Rua F', 'Florianópolis', 'Apto 6', 223, 'Centro', '56789012', 'SC'),
    ('77788899980', 'Rafaela Costa', 1122334455, 'Rua G', 'Salvador', 'Casa 7', 334, 'Barra', '67890123', 'BA'),
    ('88899900091', 'Lucas Rocha', 5544332211, 'Rua H', 'Goiânia', 'Apartamento 8', 445, 'Setor Bueno', '78901234', 'GO'),
    ('99900011182', 'Mariana Santos', 9988776655, 'Rua I', 'Manaus', 'Casa 9', 556, 'Centro', '89012345', 'AM'),
    ('12345678970', 'Pedro Oliveira', 1122334455, 'Rua J', 'Belém', 'Casa 10', 667, 'Nazaré', '90123456', 'PA'),
    ('23456789061', 'Juliana Pereira', 5544332211, 'Rua K', 'Teresina', 'Casa 11', 778, 'Centro', '01234567', 'PI'),
    ('34567890152', 'Rodrigo Lima', 9988776655, 'Rua L', 'Palmas', 'Apto 12', 889, 'Plano Diretor Sul', '23456789', 'TO');

INSERT INTO `loja`.`Colaborador` (`cargo`, `dataContratacao`)
VALUES
    ('Vendedor', '2010-12-01'),
    ('Vendedor', '2011-01-15'),
    ('Gerente', '2012-03-10'),
    ('Vendedor', '2013-04-05'),
    ('Gerente', '2014-05-20'),
    ('Diretor', '2015-06-30'),
    ('Vendedor', '2016-07-15'),
    ('Gerente', '2017-08-01'),
    ('Vendedor', '2018-09-10'),
    ('Diretor', '2019-10-25'),
    ('Vendedor', '2020-11-10'),
    ('Gerente', '2021-12-05');

INSERT INTO `loja`.`Fornecedor` (`nomeForn`, `numTelefone`, `logradouro`, `cidade`, `complemento`, `numero`, `bairro`, `cep`, `estado`)
VALUES
    ('Fantasia Shop 1', 1122334455, 'Rua A', 'Sao Paulo', 'Loja 101', 123, 'Centro', '01234567', 'SP'),
    ('DreamMart', 5544332211, 'Rua B', 'Rio de Janeiro', 'Loja 2', 456, 'Copacabana', '12345678', 'RJ'),
    ('Wonder World Stores', 9988776655, 'Rua C', 'Belo Horizonte', 'Sala 3', 789, 'Barro Preto', '23456789', 'MG'),
    ('Global Goods', 1122334455, 'Rua D', 'Porto Alegre', 'Loja 4', 101, 'Centro', '34567890', 'RS'),
    ('Star Suppliers', 5544332211, 'Rua E', 'Curitiba', 'Loja 5', 112, 'Batel', '45678901', 'PR'),
    ('Magic Merchants', 9988776655, 'Rua F', 'Florianópolis', 'Sala 6', 223, 'Centro', '56789012', 'SC'),
    ('Universe Outlet', 1122334455, 'Rua G', 'Salvador', 'Loja 7', 334, 'Barra', '67890123', 'BA'),
    ('Golden Goods', 5544332211, 'Rua H', 'Goiânia', 'Loja 8', 445, 'Setor Bueno', '78901234', 'GO'),
    ('Mystic Markets', 9988776655, 'Rua I', 'Manaus', 'Loja 9', 556, 'Centro', '89012345', 'AM'),
    ('Prime Picks', 1122334455, 'Rua J', 'Belém', 'Loja 10', 667, 'Nazaré', '90123456', 'PA'),
    ('City Suppliers', 5544332211, 'Rua K', 'Teresina', 'Loja 11', 778, 'Centro', '01234567', 'PI'),
    ('Sunset Stores', 9988776655, 'Rua L', 'Palmas', 'Loja 12', 889, 'Plano Diretor Sul', '23456789', 'TO');

INSERT INTO `loja`.`Categoria` (`nomeCat`)
VALUES
    ('Camisetas'),
    ('Calcas'),
    ('Vestidos'),
    ('Sapatos'),
    ('Bolsas'),
    ('Acessórios'),
    ('Roupas Íntimas'),
    ('Casacos'),
    ('Blusas'),
    ('Roupas Esportivas');

INSERT INTO `loja`.`Produto` (`nomeProd`, `descricao`, `preco`, `quantEstoque`, `idCategoria`)
VALUES
    ('Camiseta Branca Básica', 'Camiseta básica para uso diário', 19.99, 100, 1),
    ('Calca Jeans Slim Fit', 'Calca jeans slim para um look moderno', 39.99, 80, 2),
    ('Vestido Floral Midi', 'Vestido floral midi leve e elegante', 49.99, 50, 3),
    ('Sapato Social Clássico', 'Sapato social clássico para ocasiões especiais', 69.99, 30, 4),
    ('Bolsa de Couro Tote', 'Bolsa de couro estilo tote', 59.99, 40, 5),
    ('Colar de Pérolas', 'Colar de pérolas clássico e sofisticado', 29.99, 60, 6),
    ('Conjunto de Lingerie Renda', 'Conjunto de lingerie rendada', 34.99, 70, 7),
    ('Casaco de Inverno Acolchoado', 'Casaco acolchoado para os dias frios', 99.99, 20, 8),
    ('Blusa de Tricô Oversized', 'Blusa de tricô larga para o inverno', 55.99, 30, 9),
    ('Conjunto Esportivo Feminino', 'Conjunto esportivo para atividades físicas', 69.99, 40, 10),
    ('Camiseta Polo Listrada', 'Camiseta polo listrada para um visual casual', 29.99, 90, 1),
    ('Calca Jogger de Moletom', 'Calca jogger de moletom para o dia a dia', 24.99, 60, 2),
    ('Vestido de Festa Longo', 'Vestido longo para festas especiais', 89.99, 25, 3),
    ('Sapato Oxford Feminino', 'Sapato oxford feminino para um look elegante', 79.99, 35, 4),
    ('Bolsa Transversal Pequena', 'Bolsa transversal pequena e prática', 39.99, 45, 5),
    ('Brinco Pendente Dourado', 'Brinco pendente dourado moderno e elegante', 14.99, 75, 6),
    ('Pijama de Algodao Floral', 'Pijama de algodao floral para dormir confortável', 29.99, 55, 7),
    ('Jaqueta Corta Vento', 'Jaqueta corta-vento para dias mais frescos', 69.99, 15, 8),
    ('Suéter Gola Alta', 'Suéter de gola alta para o inverno', 45.99, 50, 9),
    ('Shorts Esportivo Respirável', 'Shorts esportivo respirável para atividades físicas', 24.99, 70, 10),
    ('Camisa Social Slim Fit', 'Camisa social slim fit para eventos formais', 49.99, 80, 1),
    ('Calca Pantacourt', 'Calca pantacourt elegante e moderna', 59.99, 40, 2),
    ('Vestido Estampado Casual', 'Vestido estampado para ocasiões casuais', 49.99, 30, 3),
    ('Sandália Anabela Confortável', 'Sandália anabela confortável para o dia a dia', 89.99, 20, 4),
    ('Mochila Feminina Estilosa', 'Mochila feminina estilosa e espacosa', 49.99, 60, 5),
    ('Pulseira de Prata com Pingente', 'Pulseira de prata com pingente moderno', 39.99, 70, 6),
    ('Conjunto de Lingerie Renda e Tule', 'Conjunto de lingerie rendada e de tule', 44.99, 45, 7),
    ('Casaco de La Longo', 'Casaco de la longo para o inverno', 79.99, 25, 8),
    ('Blusa Manga Bufante', 'Blusa com manga bufante para um look elegante', 29.99, 55, 9),
    ('Legging Esportiva Estampada', 'Legging esportiva estampada para treinos intensos', 34.99, 65, 10),
    ('Blusa de Algodao Listrada', 'Blusa listrada de algodao', 19.99, 90, 1),
    ('Calca Jeans Flare', 'Calca jeans flare para um visual elegante', 44.99, 75, 2),
    ('Vestido de Verao Floral', 'Vestido floral leve para o verao', 54.99, 55, 3),
    ('Sapato Social Feminino', 'Sapato social feminino para ocasiões formais', 64.99, 40, 4),
    ('Bolsa de Ombro Grande', 'Bolsa de ombro grande e espacosa', 49.99, 35, 5),
    ('Colar de Pedras Preciosas', 'Colar com pedras preciosas para eventos especiais', 39.99, 60, 6),
    ('Conjunto de Lingerie Renda e Laco', 'Conjunto de lingerie com renda e laco', 29.99, 70, 7),
    ('Jaqueta Jeans Destroyed', 'Jaqueta jeans com efeito destroyed', 79.99, 20, 8),
    ('Blusa de Moletom Oversized', 'Blusa de moletom larga e confortável', 49.99, 30, 9),
    ('Conjunto Esportivo Masculino', 'Conjunto esportivo masculino para treinos intensos', 64.99, 45, 10),
    ('Camiseta Estampada', 'Camiseta estampada para um look descontraído', 24.99, 100, 1),
    ('Shorts Jeans Desfiado', 'Shorts jeans com detalhes desfiados', 34.99, 85, 2),
    ('Vestido Tubinho Preto', 'Vestido tubinho preto para ocasiões elegantes', 74.99, 30, 3),
    ('Sapatilha Estilosa', 'Sapatilha estilosa para o dia a dia', 34.99, 25, 4),
    ('Bolsa de Mao Pequena', 'Bolsa de mao pequena e prática', 29.99, 60, 5),
    ('Brinco Ear Cuff', 'Brinco ear cuff moderno e estiloso', 19.99, 80, 6),
    ('Pijama Masculino de Algodao', 'Pijama masculino de algodao para uma boa noite de sono', 39.99, 70, 7),
    ('Blazer Casual', 'Blazer casual para um look profissional', 89.99, 15, 8),
    ('Cardiga de Tricô', 'Cardiga de tricô para os dias mais frescos', 45.99, 50, 9),
    ('Legging Estampada Florida', 'Legging estampada florida para treinos intensos', 29.99, 65, 10),
    ('Camisa Jeans', 'Camisa jeans para um visual descontraído', 54.99, 95, 1),
    ('Saia Midi Plissada', 'Saia midi plissada para um look elegante', 59.99, 42, 2),
    ('Vestido Longo de Festa', 'Vestido longo de festa com detalhes elegantes', 99.99, 23, 3),
    ('Sandália Rasteira', 'Sandália rasteira para um look leve', 44.99, 33, 4),
    ('Mochila Masculina Casual', 'Mochila masculina casual e prática', 39.99, 75, 5),
    ('Anel de Prata com Pedra', 'Anel de prata com pedra para um toque elegante', 34.99, 88, 6),
    ('Conjunto de Lingerie Renda Vermelha', 'Conjunto de lingerie rendada vermelha', 49.99, 50, 7),
    ('Casaco Sobretudo', 'Casaco sobretudo para os dias mais frios', 89.99, 25, 8),
    ('Blusa de Manga Bufante', 'Blusa com manga bufante para um look romântico', 29.99, 55, 9),
    ('Shorts Esportivo Feminino', 'Shorts esportivo feminino para atividades físicas', 34.99, 75, 10);

INSERT INTO `loja`.`Fornece` (`idFornecedor`, `idProduto`)
VALUES
    (1, 1), (1, 2), (1, 3), (1, 4), (1, 5),
    (2, 6), (2, 7), (2, 8), (2, 9), (2, 10),
    (3, 11), (3, 12), (3, 13), (3, 14), (3, 15),
    (4, 16), (4, 17), (4, 18), (4, 19), (4, 20),
    (5, 21), (5, 22), (5, 23), (5, 24), (5, 25),
    (6, 26), (6, 27), (6, 28), (6, 29), (6, 30),
    (7, 31), (7, 32), (7, 33), (7, 34), (7, 35),
    (8, 36), (8, 37), (8, 38), (8, 39), (8, 40),
    (9, 41), (9, 42), (9, 43), (9, 44), (9, 45),
    (10, 46), (10, 47), (10, 48), (10, 49), (10, 50),
    (11, 1), (11, 11), (11, 21), (11, 31), (11, 41),
    (12, 2), (12, 12), (12, 22), (12, 32), (12, 42)
    ON DUPLICATE KEY UPDATE idFornecedor = idFornecedor;

INSERT INTO `loja`.`Pedido` (`dataPedido`, `valorTotal`, `idCliente`, `idColaborador`)
VALUES
    ("2013-01-05", 150.99, 1, 1),
    ("2014-02-10", 220.50, 2, 2),
    ("2015-03-15", 180.75, 3, 3),
    ("2016-04-20", 300.00, 4, 4),
    ("2017-05-25", 75.25, 5, 5),
    ("2018-06-30", 420.30, 6, 6),
    ("2019-07-05", 90.60, 7, 7),
    ("2020-08-10", 200.99, 8, 8),
    ("2021-09-15", 150.25, 9, 9),
    ("2022-10-20", 350.80, 10, 10),
    ("2023-11-25", 120.45, 1, 11),
    ("2023-12-30", 180.00, 2, 12),
    ("2022-01-05", 250.75, 3, 1),
    ("2022-02-10", 300.99, 4, 2),
    ("2022-03-15", 130.25, 5, 3),
    ("2022-04-20", 180.50, 6, 4),
    ("2022-05-25", 90.75, 7, 5),
    ("2022-06-30", 420.30, 8, 6),
    ("2022-07-05", 150.99, 9, 7),
    ("2022-08-10", 200.50, 10, 8);

INSERT INTO `loja`.`Pedido` (`dataPedido`, `valorTotal`, `idCliente`, `idColaborador`)
VALUES
    ('2014-02-10', 220.50, 2, 2),
    ('2015-03-15', 180.75, 3, 3),
    ('2016-04-20', 300.00, 4, 4),
    ('2017-05-25', 75.25, 5, 5),
    ('2018-06-30', 420.30, 6, 6),
    ('2019-07-05', 90.60, 7, 7),
    ('2020-08-10', 200.99, 8, 8),
    ('2021-09-15', 150.25, 9, 9),
    ('2022-10-20', 350.80, 10, 10),
    ('2023-11-25', 120.45, 1, 11),
    ('2023-12-30', 180.00, 2, 12),
    ('2013-01-05', 150.99, 1, 1),
    ('2014-02-10', 220.50, 2, 2),
    ('2015-03-15', 180.75, 3, 3),
    ('2016-04-20', 300.00, 4, 4),
    ('2017-05-25', 75.25, 5, 5),
    ('2018-06-30', 420.30, 6, 6),
    ('2019-07-05', 90.60, 7, 7),
    ('2020-08-10', 200.99, 8, 8),
    ('2021-09-15', 150.25, 9, 9),
    ('2022-10-20', 350.80, 10, 10),
    ('2023-11-25', 120.45, 1, 11),
    ('2023-12-30', 180.00, 2, 12),
    ('2014-02-10', 220.50, 2, 2);

-- Insercao de produtos nos pedidos
INSERT INTO `loja`.`PedidoProduto` (`idPedido`, `idProduto`, `precoVenda`, `quantidade`)
VALUES
    (1, 1, 19.99, 3),
    (2, 2, 39.99, 2),
    (3, 3, 49.99, 1),
    (4, 4, 69.99, 1),
    (5, 5, 59.99, 2),
    (6, 6, 29.99, 1),
    (7, 7, 34.99, 3),
    (8, 8, 99.99, 1),
    (9, 9, 55.99, 2),
    (10, 10, 69.99, 1),
    (11, 1, 29.99, 4),
    (12, 2, 24.99, 3),
    (13, 3, 89.99, 1),
    (14, 4, 79.99, 2),
    (15, 5, 39.99, 1),
    (16, 6, 14.99, 3),
    (17, 7, 29.99, 2),
    (18, 8, 69.99, 1),
    (19, 9, 45.99, 2),
    (20, 10, 24.99, 1),
    (21, 1, 49.99, 3),
    (22, 2, 59.99, 2),
    (23, 3, 49.99, 1),
    (24, 4, 89.99, 1),
    (25, 5, 49.99, 2)
    ON DUPLICATE KEY UPDATE idPedido = idPedido;


-- *******************************************************
-- *** Exemplo de modificacao dos dados em 5 tabelas ***
-- *******************************************************

UPDATE `loja`.`Cliente`
SET `nomeCliente` = 'Novo Nome'
WHERE `idCliente` = 1;

-- Atualizando o preco do produto com ID 2
UPDATE `loja`.`Produto`
SET `preco` = 29.99
WHERE `idProduto` = 2;

-- *******************************************************
-- *** Exemplos de exclusao de dados em 5 tabelas ***
-- *******************************************************

-- *******************************************************
-- ***  Exemplos de, pelo menos, 12 consultas ***
-- *******************************************************

-- *******************************************************
-- *** Exemplos de criacao de de 3 visões (Views) ***
-- *******************************************************

-- *******************************************************
-- *** Exemplos de criacao de usuários (pelo menos 2) ***
-- *******************************************************

-- *******************************************************
-- *** Exemplos de 3 procedimentos/funcões ***
-- *******************************************************

-- *******************************************************
-- * Exemplos de 3 triggers, um para cada evento (insercao, alteracao e exclusao) *
-- *******************************************************
