<?php

-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema LocationAppartement
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema LocationAppartement
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `LocationAppartement` DEFAULT CHARACTER SET utf8 ;
USE `LocationAppartement` ;

-- -----------------------------------------------------
-- Table `LocationAppartement`.`Utilisateur`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `LocationAppartement`.`Utilisateur` (
  `Username` VARCHAR(50) NOT NULL,
  `Nom` VARCHAR(50) NOT NULL,
  `Prenom` VARCHAR(50) NOT NULL,
  `Courriel` VARCHAR(45) NOT NULL,
  `Telephone` VARCHAR(12) NOT NULL,
  `Type` ENUM('Locataire', 'Proprietaire') NOT NULL,
  PRIMARY KEY (`Username`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `LocationAppartement`.`Appartement`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `LocationAppartement`.`Appartement` (
  `idAppartement` INT NOT NULL AUTO_INCREMENT,
  `Description` VARCHAR(255) NOT NULL,
  `Adresse` VARCHAR(255) NOT NULL,
  `NombreChambre` INT NOT NULL,
  `NombreSalleDeBain` INT NOT NULL,
  `Surface` VARCHAR(45) NOT NULL,
  `Prix` INT NOT NULL,
  PRIMARY KEY (`idAppartement`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `LocationAppartement`.`Utilisateur_has_Appartement`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `LocationAppartement`.`Utilisateur_has_Appartement` (
  `Utilisateur_Username` VARCHAR(50) NOT NULL,
  `Appartement_idAppartement` INT NOT NULL,
  PRIMARY KEY (`Utilisateur_Username`, `Appartement_idAppartement`),
  INDEX `fk_Utilisateur_has_Appartement_Appartement1_idx` (`Appartement_idAppartement` ASC),
  INDEX `fk_Utilisateur_has_Appartement_Utilisateur_idx` (`Utilisateur_Username` ASC),
  CONSTRAINT `fk_Utilisateur_has_Appartement_Utilisateur`
    FOREIGN KEY (`Utilisateur_Username`)
    REFERENCES `LocationAppartement`.`Utilisateur` (`Username`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Utilisateur_has_Appartement_Appartement1`
    FOREIGN KEY (`Appartement_idAppartement`)
    REFERENCES `LocationAppartement`.`Appartement` (`idAppartement`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `LocationAppartement`.`Reservation`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `LocationAppartement`.`Reservation` (
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
    REFERENCES `LocationAppartement`.`Utilisateur` (`Username`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Reservation_Appartement1`
    FOREIGN KEY (`Appartement_idAppartement`)
    REFERENCES `LocationAppartement`.`Appartement` (`idAppartement`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `LocationAppartement`.`Commentaire`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `LocationAppartement`.`Commentaire` (
  `idCommentaire` INT NOT NULL AUTO_INCREMENT,
  `Texte` TEXT NULL,
  `DatePublication` DATE NULL,
  `Utilisateur_Username` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`idCommentaire`),
  INDEX `fk_Commentaire_Utilisateur1_idx` (`Utilisateur_Username` ASC),
  CONSTRAINT `fk_Commentaire_Utilisateur1`
    FOREIGN KEY (`Utilisateur_Username`)
    REFERENCES `LocationAppartement`.`Utilisateur` (`Username`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

?>