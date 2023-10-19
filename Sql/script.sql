-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema e2395368
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema e2395368
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `e2395368` DEFAULT CHARACTER SET utf8 ;
USE `e2395368` ;

-- -----------------------------------------------------
-- Table `e2395368`.`Type`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `e2395368`.`Type` (
  `idType` INT NOT NULL AUTO_INCREMENT,
  `type` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idType`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `e2395368`.`Utilisateur`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `e2395368`.`Utilisateur` (
  `Username` VARCHAR(50) NOT NULL,
  `Nom` VARCHAR(50) NOT NULL,
  `Prenom` VARCHAR(50) NOT NULL,
  `Courriel` VARCHAR(45) NOT NULL,
  `Telephone` VARCHAR(12) NOT NULL,
  `Type_idType` INT NOT NULL,
  PRIMARY KEY (`Username`),
  INDEX `fk_Utilisateur_Type1_idx` (`Type_idType` ASC),
  CONSTRAINT `fk_Utilisateur_Type1`
    FOREIGN KEY (`Type_idType`)
    REFERENCES `e2395368`.`Type` (`idType`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `e2395368`.`Appartement`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `e2395368`.`Appartement` (
  `idAppartement` INT NOT NULL AUTO_INCREMENT,
  `Description` VARCHAR(255) NOT NULL,
  `Adresse` VARCHAR(255) NOT NULL,
  `NombreChambre` INT NOT NULL,
  `NombreSalleDeBain` INT NOT NULL,
  `Surface` VARCHAR(45) NOT NULL,
  `Prix` INT NOT NULL,
  `Utilisateur_Username` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`idAppartement`),
  INDEX `fk_Appartement_Utilisateur1_idx` (`Utilisateur_Username` ASC),
  CONSTRAINT `fk_Appartement_Utilisateur1`
    FOREIGN KEY (`Utilisateur_Username`)
    REFERENCES `e2395368`.`Utilisateur` (`Username`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `e2395368`.`Reservation`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `e2395368`.`Reservation` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `DateDebut` DATE NOT NULL,
  `DateFin` DATE NOT NULL,
  `Utilisateur_Username` VARCHAR(50) NOT NULL,
  `Appartement_idAppartement` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_Reservation_Utilisateur1_idx` (`Utilisateur_Username` ASC),
  INDEX `fk_Reservation_Appartement1_idx` (`Appartement_idAppartement` ASC),
  CONSTRAINT `fk_Reservation_Utilisateur1`
    FOREIGN KEY (`Utilisateur_Username`)
    REFERENCES `e2395368`.`Utilisateur` (`Username`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Reservation_Appartement1`
    FOREIGN KEY (`Appartement_idAppartement`)
    REFERENCES `e2395368`.`Appartement` (`idAppartement`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
