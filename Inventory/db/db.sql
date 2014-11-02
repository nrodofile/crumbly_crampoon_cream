SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema NetworkInventory
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `NetworkInventory` ;
CREATE SCHEMA IF NOT EXISTS `NetworkInventory` DEFAULT CHARACTER SET utf8 ;
USE `NetworkInventory` ;

-- -----------------------------------------------------
-- Table `NetworkInventory`.`Software`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `NetworkInventory`.`Software` ;

CREATE TABLE IF NOT EXISTS `NetworkInventory`.`Software` (
  `idSoftware` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL,
  `version` VARCHAR(45) NULL,
  `Location` VARCHAR(150) NULL,
  PRIMARY KEY (`idSoftware`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `NetworkInventory`.`OperatingSystem`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `NetworkInventory`.`OperatingSystem` ;

CREATE TABLE IF NOT EXISTS `NetworkInventory`.`OperatingSystem` (
  `idOperatingSystem` INT NOT NULL,
  PRIMARY KEY (`idOperatingSystem`),
  CONSTRAINT `fk_OperatingSystem_Software`
    FOREIGN KEY (`idOperatingSystem`)
    REFERENCES `NetworkInventory`.`Software` (`idSoftware`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `NetworkInventory`.`Hardware`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `NetworkInventory`.`Hardware` ;

CREATE TABLE IF NOT EXISTS `NetworkInventory`.`Hardware` (
  `idHardware` INT NOT NULL AUTO_INCREMENT,
  `Hostname` VARCHAR(45) NULL,
  `OperatingSystem` INT NOT NULL,
  PRIMARY KEY (`idHardware`),
  INDEX `fk_Hardware_OperatingSystem1_idx` (`OperatingSystem` ASC),
  CONSTRAINT `fk_Hardware_OperatingSystem1`
    FOREIGN KEY (`OperatingSystem`)
    REFERENCES `NetworkInventory`.`OperatingSystem` (`idOperatingSystem`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `NetworkInventory`.`Network`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `NetworkInventory`.`Network` ;

CREATE TABLE IF NOT EXISTS `NetworkInventory`.`Network` (
  `idNetwork` INT NOT NULL AUTO_INCREMENT,
  `address` VARCHAR(45) NULL,
  `name` VARCHAR(45) NULL,
  PRIMARY KEY (`idNetwork`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `NetworkInventory`.`Application`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `NetworkInventory`.`Application` ;

CREATE TABLE IF NOT EXISTS `NetworkInventory`.`Application` (
  `idSoftware` INT NOT NULL,
  `idOperatingSystem` INT NOT NULL,
  PRIMARY KEY (`idSoftware`),
  INDEX `fk_Application_OperatingSystem1_idx` (`idOperatingSystem` ASC),
  CONSTRAINT `fk_Application_Software1`
    FOREIGN KEY (`idSoftware`)
    REFERENCES `NetworkInventory`.`Software` (`idSoftware`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Application_OperatingSystem1`
    FOREIGN KEY (`idOperatingSystem`)
    REFERENCES `NetworkInventory`.`OperatingSystem` (`idOperatingSystem`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `NetworkInventory`.`Hardware_has_Application`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `NetworkInventory`.`Hardware_has_Application` ;

CREATE TABLE IF NOT EXISTS `NetworkInventory`.`Hardware_has_Application` (
  `Hardware` INT NOT NULL,
  `Application` INT NOT NULL,
  PRIMARY KEY (`Hardware`, `Application`),
  INDEX `fk_Hardware_has_Application_Application1_idx` (`Application` ASC),
  INDEX `fk_Hardware_has_Application_Hardware1_idx` (`Hardware` ASC),
  CONSTRAINT `fk_Hardware_has_Application_Hardware1`
    FOREIGN KEY (`Hardware`)
    REFERENCES `NetworkInventory`.`Hardware` (`idHardware`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Hardware_has_Application_Application1`
    FOREIGN KEY (`Application`)
    REFERENCES `NetworkInventory`.`Application` (`idSoftware`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `NetworkInventory`.`Network_has_Hardware`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `NetworkInventory`.`Network_has_Hardware` ;

CREATE TABLE IF NOT EXISTS `NetworkInventory`.`Network_has_Hardware` (
  `Network` INT NOT NULL,
  `Hardware` INT NOT NULL,
  `ip_address` VARCHAR(45) NOT NULL,
  `mac_address` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`Network`, `Hardware`),
  INDEX `fk_Network_has_Hardware_Hardware1_idx` (`Hardware` ASC),
  INDEX `fk_Network_has_Hardware_Network1_idx` (`Network` ASC),
  CONSTRAINT `fk_Network_has_Hardware_Network1`
    FOREIGN KEY (`Network`)
    REFERENCES `NetworkInventory`.`Network` (`idNetwork`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Network_has_Hardware_Hardware1`
    FOREIGN KEY (`Hardware`)
    REFERENCES `NetworkInventory`.`Hardware` (`idHardware`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `NetworkInventory`.`Vulnerability`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `NetworkInventory`.`Vulnerability` ;

CREATE TABLE IF NOT EXISTS `NetworkInventory`.`Vulnerability` (
  `idVulnerability` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL,
  `description` VARCHAR(45) NULL,
  PRIMARY KEY (`idVulnerability`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `NetworkInventory`.`Network_has_Vulnerability`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `NetworkInventory`.`Network_has_Vulnerability` ;

CREATE TABLE IF NOT EXISTS `NetworkInventory`.`Network_has_Vulnerability` (
  `Network` INT NOT NULL,
  `Vulnerability` INT NOT NULL,
  PRIMARY KEY (`Network`, `Vulnerability`),
  INDEX `fk_Network_has_Vulnerablity_Vulnerablity1_idx` (`Vulnerability` ASC),
  INDEX `fk_Network_has_Vulnerablity_Network1_idx` (`Network` ASC),
  CONSTRAINT `fk_Network_has_Vulnerablity_Network1`
    FOREIGN KEY (`Network`)
    REFERENCES `NetworkInventory`.`Network` (`idNetwork`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Network_has_Vulnerablity_Vulnerablity1`
    FOREIGN KEY (`Vulnerability`)
    REFERENCES `NetworkInventory`.`Vulnerability` (`idVulnerability`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `NetworkInventory`.`Hardware_has_Vulnerability`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `NetworkInventory`.`Hardware_has_Vulnerability` ;

CREATE TABLE IF NOT EXISTS `NetworkInventory`.`Hardware_has_Vulnerability` (
  `Hardware` INT NOT NULL,
  `Vulnerability` INT NOT NULL,
  PRIMARY KEY (`Hardware`, `Vulnerability`),
  INDEX `fk_Hardware_has_Vulnerablity_Vulnerablity1_idx` (`Vulnerability` ASC),
  INDEX `fk_Hardware_has_Vulnerablity_Hardware1_idx` (`Hardware` ASC),
  CONSTRAINT `fk_Hardware_has_Vulnerablity_Hardware1`
    FOREIGN KEY (`Hardware`)
    REFERENCES `NetworkInventory`.`Hardware` (`idHardware`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Hardware_has_Vulnerablity_Vulnerablity1`
    FOREIGN KEY (`Vulnerability`)
    REFERENCES `NetworkInventory`.`Vulnerability` (`idVulnerability`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `NetworkInventory`.`Software_has_Vulnerability`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `NetworkInventory`.`Software_has_Vulnerability` ;

CREATE TABLE IF NOT EXISTS `NetworkInventory`.`Software_has_Vulnerability` (
  `Software` INT NOT NULL,
  `Vulnerability` INT NOT NULL,
  PRIMARY KEY (`Software`, `Vulnerability`),
  INDEX `fk_Software_has_Vulnerablity_Vulnerablity1_idx` (`Vulnerability` ASC),
  INDEX `fk_Software_has_Vulnerablity_Software1_idx` (`Software` ASC),
  CONSTRAINT `fk_Software_has_Vulnerablity_Software1`
    FOREIGN KEY (`Software`)
    REFERENCES `NetworkInventory`.`Software` (`idSoftware`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Software_has_Vulnerablity_Vulnerablity1`
    FOREIGN KEY (`Vulnerability`)
    REFERENCES `NetworkInventory`.`Vulnerability` (`idVulnerability`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `NetworkInventory`.`Fix`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `NetworkInventory`.`Fix` ;

CREATE TABLE IF NOT EXISTS `NetworkInventory`.`Fix` (
  `idFix` INT NOT NULL AUTO_INCREMENT,
  `description` VARCHAR(45) NULL,
  PRIMARY KEY (`idFix`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `NetworkInventory`.`Vulnerability_has_Fix`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `NetworkInventory`.`Vulnerability_has_Fix` ;

CREATE TABLE IF NOT EXISTS `NetworkInventory`.`Vulnerability_has_Fix` (
  `Vulnerability` INT NOT NULL,
  `Fix` INT NOT NULL,
  PRIMARY KEY (`Vulnerability`, `Fix`),
  INDEX `fk_Vulnerablity_has_Fix_Fix1_idx` (`Fix` ASC),
  INDEX `fk_Vulnerablity_has_Fix_Vulnerablity1_idx` (`Vulnerability` ASC),
  CONSTRAINT `fk_Vulnerablity_has_Fix_Vulnerablity1`
    FOREIGN KEY (`Vulnerability`)
    REFERENCES `NetworkInventory`.`Vulnerability` (`idVulnerability`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Vulnerablity_has_Fix_Fix1`
    FOREIGN KEY (`Fix`)
    REFERENCES `NetworkInventory`.`Fix` (`idFix`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `NetworkInventory`.`User`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `NetworkInventory`.`User` ;

CREATE TABLE IF NOT EXISTS `NetworkInventory`.`User` (
  `idUser` INT NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(45) NOT NULL,
  `name` VARCHAR(45) NULL,
  `password` VARCHAR(128) NOT NULL,
  `salt` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idUser`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `NetworkInventory`.`Note`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `NetworkInventory`.`Note` ;

CREATE TABLE IF NOT EXISTS `NetworkInventory`.`Note` (
  `idNote` INT NOT NULL AUTO_INCREMENT,
  `subject` TEXT NULL,
  `note` VARCHAR(100) NOT NULL,
  `added` TIMESTAMP NOT NULL,
  `modified` TIMESTAMP NULL,
  `User` INT NOT NULL,
  PRIMARY KEY (`idNote`),
  INDEX `fk_Note_User1_idx` (`User` ASC),
  CONSTRAINT `fk_Note_User1`
    FOREIGN KEY (`User`)
    REFERENCES `NetworkInventory`.`User` (`idUser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `NetworkInventory`.`Network_has_Note`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `NetworkInventory`.`Network_has_Note` ;

CREATE TABLE IF NOT EXISTS `NetworkInventory`.`Network_has_Note` (
  `Network` INT NOT NULL,
  `Note` INT NOT NULL,
  PRIMARY KEY (`Network`, `Note`),
  INDEX `fk_Network_has_Note_Note1_idx` (`Note` ASC),
  INDEX `fk_Network_has_Note_Network1_idx` (`Network` ASC),
  CONSTRAINT `fk_Network_has_Note_Network1`
    FOREIGN KEY (`Network`)
    REFERENCES `NetworkInventory`.`Network` (`idNetwork`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Network_has_Note_Note1`
    FOREIGN KEY (`Note`)
    REFERENCES `NetworkInventory`.`Note` (`idNote`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `NetworkInventory`.`Vulnerability_has_Note`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `NetworkInventory`.`Vulnerability_has_Note` ;

CREATE TABLE IF NOT EXISTS `NetworkInventory`.`Vulnerability_has_Note` (
  `Vulnerability` INT NOT NULL,
  `Note` INT NOT NULL,
  PRIMARY KEY (`Vulnerability`, `Note`),
  INDEX `fk_Vulnerablity_has_Note_Note1_idx` (`Note` ASC),
  INDEX `fk_Vulnerablity_has_Note_Vulnerablity1_idx` (`Vulnerability` ASC),
  CONSTRAINT `fk_Vulnerablity_has_Note_Vulnerablity1`
    FOREIGN KEY (`Vulnerability`)
    REFERENCES `NetworkInventory`.`Vulnerability` (`idVulnerability`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Vulnerablity_has_Note_Note1`
    FOREIGN KEY (`Note`)
    REFERENCES `NetworkInventory`.`Note` (`idNote`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `NetworkInventory`.`Fix_has_Note`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `NetworkInventory`.`Fix_has_Note` ;

CREATE TABLE IF NOT EXISTS `NetworkInventory`.`Fix_has_Note` (
  `Fix` INT NOT NULL,
  `Note` INT NOT NULL,
  PRIMARY KEY (`Fix`, `Note`),
  INDEX `fk_Fix_has_Note_Note1_idx` (`Note` ASC),
  INDEX `fk_Fix_has_Note_Fix1_idx` (`Fix` ASC),
  CONSTRAINT `fk_Fix_has_Note_Fix1`
    FOREIGN KEY (`Fix`)
    REFERENCES `NetworkInventory`.`Fix` (`idFix`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Fix_has_Note_Note1`
    FOREIGN KEY (`Note`)
    REFERENCES `NetworkInventory`.`Note` (`idNote`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `NetworkInventory`.`Software_has_Note`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `NetworkInventory`.`Software_has_Note` ;

CREATE TABLE IF NOT EXISTS `NetworkInventory`.`Software_has_Note` (
  `Software` INT NOT NULL,
  `Note` INT NOT NULL,
  PRIMARY KEY (`Software`, `Note`),
  INDEX `fk_Software_has_Note_Note1_idx` (`Note` ASC),
  INDEX `fk_Software_has_Note_Software1_idx` (`Software` ASC),
  CONSTRAINT `fk_Software_has_Note_Software1`
    FOREIGN KEY (`Software`)
    REFERENCES `NetworkInventory`.`Software` (`idSoftware`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Software_has_Note_Note1`
    FOREIGN KEY (`Note`)
    REFERENCES `NetworkInventory`.`Note` (`idNote`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `NetworkInventory`.`Hardware_has_Note`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `NetworkInventory`.`Hardware_has_Note` ;

CREATE TABLE IF NOT EXISTS `NetworkInventory`.`Hardware_has_Note` (
  `Hardware` INT NOT NULL,
  `Note` INT NOT NULL,
  PRIMARY KEY (`Hardware`, `Note`),
  INDEX `fk_Hardware_has_Note_Note1_idx` (`Note` ASC),
  INDEX `fk_Hardware_has_Note_Hardware1_idx` (`Hardware` ASC),
  CONSTRAINT `fk_Hardware_has_Note_Hardware1`
    FOREIGN KEY (`Hardware`)
    REFERENCES `NetworkInventory`.`Hardware` (`idHardware`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Hardware_has_Note_Note1`
    FOREIGN KEY (`Note`)
    REFERENCES `NetworkInventory`.`Note` (`idNote`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `NetworkInventory`.`Fix_has_Software`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `NetworkInventory`.`Fix_has_Software` ;

CREATE TABLE IF NOT EXISTS `NetworkInventory`.`Fix_has_Software` (
  `Fix` INT NOT NULL,
  `Software` INT NOT NULL,
  PRIMARY KEY (`Fix`, `Software`),
  INDEX `fk_Fix_has_Software_Software1_idx` (`Software` ASC),
  INDEX `fk_Fix_has_Software_Fix1_idx` (`Fix` ASC),
  CONSTRAINT `fk_Fix_has_Software_Fix1`
    FOREIGN KEY (`Fix`)
    REFERENCES `NetworkInventory`.`Fix` (`idFix`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Fix_has_Software_Software1`
    FOREIGN KEY (`Software`)
    REFERENCES `NetworkInventory`.`Software` (`idSoftware`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `NetworkInventory`.`Hardware_connected_to_Hardware`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `NetworkInventory`.`Hardware_connected_to_Hardware` ;

CREATE TABLE IF NOT EXISTS `NetworkInventory`.`Hardware_connected_to_Hardware` (
  `Hardware` INT NOT NULL,
  `Connection` INT NOT NULL,
  PRIMARY KEY (`Hardware`, `Connection`),
  INDEX `fk_Hardware_has_Hardware_Hardware2_idx` (`Connection` ASC),
  INDEX `fk_Hardware_has_Hardware_Hardware1_idx` (`Hardware` ASC),
  CONSTRAINT `fk_Hardware_has_Hardware_Hardware1`
    FOREIGN KEY (`Hardware`)
    REFERENCES `NetworkInventory`.`Hardware` (`idHardware`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Hardware_has_Hardware_Hardware2`
    FOREIGN KEY (`Connection`)
    REFERENCES `NetworkInventory`.`Hardware` (`idHardware`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
