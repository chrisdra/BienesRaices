-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema bienes_raices
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema bienes_raices
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `bienes_raices` DEFAULT CHARACTER SET utf8 ;
USE `bienes_raices` ;

-- -----------------------------------------------------
-- Table `bienes_raices`.`vendedores`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bienes_raices`.`vendedores` (
  `id` INT(11) NOT NULL,
  `nombre` VARCHAR(45) NULL,
  `apellido` VARCHAR(45) NULL,
  `telefono` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bienes_raices`.`propiedades`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bienes_raices`.`propiedades` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `titulo` VARCHAR(60) NULL,
  `precio` DECIMAL(10,2) NULL,
  `imagen` VARCHAR(200) NULL,
  `descripcion` LONGTEXT NULL,
  `habitaciones` INT(1) NULL,
  `wc` INT(1) NULL,
  `estacionamiento` INT(1) NULL,
  `creado` DATE NULL,
  `vendedorId` INT(11) NULL,
  PRIMARY KEY (`id`),
  INDEX `vendedorId_idx` (`vendedorId` ASC) VISIBLE,
  CONSTRAINT `vendedorId`
    FOREIGN KEY (`vendedorId`)
    REFERENCES `bienes_raices`.`vendedores` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `bienes_raices`.`vendedores`
-- -----------------------------------------------------
START TRANSACTION;
USE `bienes_raices`;
INSERT INTO `bienes_raices`.`vendedores` (`id`, `nombre`, `apellido`, `telefono`) VALUES (1, 'Christian', 'Herrera Cabezas', '956397310');
INSERT INTO `bienes_raices`.`vendedores` (`id`, `nombre`, `apellido`, `telefono`) VALUES (2, 'Maria ', 'Inez Ruz', '923657841');
INSERT INTO `bienes_raices`.`vendedores` (`id`, `nombre`, `apellido`, `telefono`) VALUES (3, 'Christian', 'Herrera Ruz', '978523655');

COMMIT;

