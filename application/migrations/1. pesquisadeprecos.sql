
-- -----------------------------------------------------
-- Schema pesquisadeprecos
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema pesquisadeprecos
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `pesquisadeprecos` DEFAULT CHARACTER SET utf8 ;
USE `pesquisadeprecos` ;

-- -----------------------------------------------------
-- Table `pesquisadeprecos`.`empresas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pesquisadeprecos`.`empresas` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(255) NOT NULL,
  `telefone` VARCHAR(20) NULL,
  `site` VARCHAR(255) NULL,
  `uf` VARCHAR(2) NULL,
  `municipio_id` INT NULL,
  `criado_em` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `atualizado_em` TIMESTAMP NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pesquisadeprecos`.`itens`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pesquisadeprecos`.`itens` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(255) NULL,
  `descricao` TEXT NULL,
  `unidade_medida` VARCHAR(20) NULL,
  `tipo` VARCHAR(50) NULL DEFAULT 'empresas',
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pesquisadeprecos`.`formularios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pesquisadeprecos`.`formularios` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `tipo` VARCHAR(50) NULL DEFAULT "empresas",
  `criado_em` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `atualizado_em` TIMESTAMP NULL,
  `publicado` TINYINT NULL DEFAULT 0,
  `empresa_id` INT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_formularios_empresas_idx` (`empresa_id`), 
    FOREIGN KEY (`empresa_id`)
    REFERENCES `pesquisadeprecos`.`empresas` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pesquisadeprecos`.`precos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pesquisadeprecos`.`precos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `preco` DOUBLE(10,2) NOT NULL,
  `comercializa` TINYINT NULL DEFAULT 0,
  `uf` VARCHAR(2) NULL,
  `criado_em` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `atualizado_em` TIMESTAMP NULL,
  `formulario_id` INT NOT NULL,
  `item_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_precos_formularios1_idx` (`formulario_id`),
  INDEX `fk_precos_itens1_idx` (`item_id`),
    FOREIGN KEY (`formulario_id`)
    REFERENCES `pesquisadeprecos`.`formularios` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
    FOREIGN KEY (`item_id`)
    REFERENCES `pesquisadeprecos`.`itens` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



