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
    `descrição` VARCHAR(255) NOT NULL,
    `preço` REAL(8,2) NOT NULL,
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