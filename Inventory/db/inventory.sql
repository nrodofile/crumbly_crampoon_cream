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
  `ip_address` VARCHAR(45) NULL,
  `mac_address` VARCHAR(45) NULL,
  `OperatingSystem_Software_idSoftware` INT NOT NULL,
  PRIMARY KEY (`idHardware`),
  INDEX `fk_Hardware_OperatingSystem1_idx` (`OperatingSystem_Software_idSoftware` ASC),
  CONSTRAINT `fk_Hardware_OperatingSystem1`
    FOREIGN KEY (`OperatingSystem_Software_idSoftware`)
    REFERENCES `NetworkInventory`.`OperatingSystem` (`idOperatingSystem`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `NetworkInventory`.`Network`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `NetworkInventory`.`Network` ;

CREATE TABLE IF NOT EXISTS `NetworkInventory`.`Network` (
  `idNetwork` INT NOT NULL,
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
  `Hardware_idHardware` INT NOT NULL,
  `Application_idSoftware` INT NOT NULL,
  PRIMARY KEY (`Hardware_idHardware`, `Application_idSoftware`),
  INDEX `fk_Hardware_has_Application_Application1_idx` (`Application_idSoftware` ASC),
  INDEX `fk_Hardware_has_Application_Hardware1_idx` (`Hardware_idHardware` ASC),
  CONSTRAINT `fk_Hardware_has_Application_Hardware1`
    FOREIGN KEY (`Hardware_idHardware`)
    REFERENCES `NetworkInventory`.`Hardware` (`idHardware`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Hardware_has_Application_Application1`
    FOREIGN KEY (`Application_idSoftware`)
    REFERENCES `NetworkInventory`.`Application` (`idSoftware`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `NetworkInventory`.`Network_has_Hardware`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `NetworkInventory`.`Network_has_Hardware` ;

CREATE TABLE IF NOT EXISTS `NetworkInventory`.`Network_has_Hardware` (
  `Network_idNetwork` INT NOT NULL,
  `Hardware_idHardware` INT NOT NULL,
  PRIMARY KEY (`Network_idNetwork`, `Hardware_idHardware`),
  INDEX `fk_Network_has_Hardware_Hardware1_idx` (`Hardware_idHardware` ASC),
  INDEX `fk_Network_has_Hardware_Network1_idx` (`Network_idNetwork` ASC),
  CONSTRAINT `fk_Network_has_Hardware_Network1`
    FOREIGN KEY (`Network_idNetwork`)
    REFERENCES `NetworkInventory`.`Network` (`idNetwork`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Network_has_Hardware_Hardware1`
    FOREIGN KEY (`Hardware_idHardware`)
    REFERENCES `NetworkInventory`.`Hardware` (`idHardware`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `NetworkInventory`.`Vulnerablity`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `NetworkInventory`.`Vulnerablity` ;

CREATE TABLE IF NOT EXISTS `NetworkInventory`.`Vulnerablity` (
  `idVulnerablity` INT NOT NULL,
  `name` VARCHAR(45) NULL,
  `description` VARCHAR(45) NULL,
  PRIMARY KEY (`idVulnerablity`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `NetworkInventory`.`Network_has_Vulnerablity`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `NetworkInventory`.`Network_has_Vulnerablity` ;

CREATE TABLE IF NOT EXISTS `NetworkInventory`.`Network_has_Vulnerablity` (
  `Network_idNetwork` INT NOT NULL,
  `Vulnerablity_idVulnerablity` INT NOT NULL,
  PRIMARY KEY (`Network_idNetwork`, `Vulnerablity_idVulnerablity`),
  INDEX `fk_Network_has_Vulnerablity_Vulnerablity1_idx` (`Vulnerablity_idVulnerablity` ASC),
  INDEX `fk_Network_has_Vulnerablity_Network1_idx` (`Network_idNetwork` ASC),
  CONSTRAINT `fk_Network_has_Vulnerablity_Network1`
    FOREIGN KEY (`Network_idNetwork`)
    REFERENCES `NetworkInventory`.`Network` (`idNetwork`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Network_has_Vulnerablity_Vulnerablity1`
    FOREIGN KEY (`Vulnerablity_idVulnerablity`)
    REFERENCES `NetworkInventory`.`Vulnerablity` (`idVulnerablity`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `NetworkInventory`.`Hardware_has_Vulnerablity`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `NetworkInventory`.`Hardware_has_Vulnerablity` ;

CREATE TABLE IF NOT EXISTS `NetworkInventory`.`Hardware_has_Vulnerablity` (
  `Hardware_idHardware` INT NOT NULL,
  `Vulnerablity_idVulnerablity` INT NOT NULL,
  PRIMARY KEY (`Hardware_idHardware`, `Vulnerablity_idVulnerablity`),
  INDEX `fk_Hardware_has_Vulnerablity_Vulnerablity1_idx` (`Vulnerablity_idVulnerablity` ASC),
  INDEX `fk_Hardware_has_Vulnerablity_Hardware1_idx` (`Hardware_idHardware` ASC),
  CONSTRAINT `fk_Hardware_has_Vulnerablity_Hardware1`
    FOREIGN KEY (`Hardware_idHardware`)
    REFERENCES `NetworkInventory`.`Hardware` (`idHardware`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Hardware_has_Vulnerablity_Vulnerablity1`
    FOREIGN KEY (`Vulnerablity_idVulnerablity`)
    REFERENCES `NetworkInventory`.`Vulnerablity` (`idVulnerablity`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `NetworkInventory`.`Software_has_Vulnerablity`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `NetworkInventory`.`Software_has_Vulnerablity` ;

CREATE TABLE IF NOT EXISTS `NetworkInventory`.`Software_has_Vulnerablity` (
  `Software_idSoftware` INT NOT NULL,
  `Vulnerablity_idVulnerablity` INT NOT NULL,
  PRIMARY KEY (`Software_idSoftware`, `Vulnerablity_idVulnerablity`),
  INDEX `fk_Software_has_Vulnerablity_Vulnerablity1_idx` (`Vulnerablity_idVulnerablity` ASC),
  INDEX `fk_Software_has_Vulnerablity_Software1_idx` (`Software_idSoftware` ASC),
  CONSTRAINT `fk_Software_has_Vulnerablity_Software1`
    FOREIGN KEY (`Software_idSoftware`)
    REFERENCES `NetworkInventory`.`Software` (`idSoftware`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Software_has_Vulnerablity_Vulnerablity1`
    FOREIGN KEY (`Vulnerablity_idVulnerablity`)
    REFERENCES `NetworkInventory`.`Vulnerablity` (`idVulnerablity`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `NetworkInventory`.`Fix`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `NetworkInventory`.`Fix` ;

CREATE TABLE IF NOT EXISTS `NetworkInventory`.`Fix` (
  `idFix` INT NOT NULL,
  `description` VARCHAR(45) NULL,
  PRIMARY KEY (`idFix`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `NetworkInventory`.`Vulnerablity_has_Fix`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `NetworkInventory`.`Vulnerablity_has_Fix` ;

CREATE TABLE IF NOT EXISTS `NetworkInventory`.`Vulnerablity_has_Fix` (
  `Vulnerablity_idVulnerablity` INT NOT NULL,
  `Fix_idFix` INT NOT NULL,
  PRIMARY KEY (`Vulnerablity_idVulnerablity`, `Fix_idFix`),
  INDEX `fk_Vulnerablity_has_Fix_Fix1_idx` (`Fix_idFix` ASC),
  INDEX `fk_Vulnerablity_has_Fix_Vulnerablity1_idx` (`Vulnerablity_idVulnerablity` ASC),
  CONSTRAINT `fk_Vulnerablity_has_Fix_Vulnerablity1`
    FOREIGN KEY (`Vulnerablity_idVulnerablity`)
    REFERENCES `NetworkInventory`.`Vulnerablity` (`idVulnerablity`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Vulnerablity_has_Fix_Fix1`
    FOREIGN KEY (`Fix_idFix`)
    REFERENCES `NetworkInventory`.`Fix` (`idFix`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `NetworkInventory`.`User`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `NetworkInventory`.`User` ;

CREATE TABLE IF NOT EXISTS `NetworkInventory`.`User` (
  `idUser` INT NOT NULL,
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
  `idNote` INT NOT NULL,
  `note` VARCHAR(45) NULL,
  `added` DATETIME NULL,
  `modified` DATETIME NULL,
  `User_idUser` INT NOT NULL,
  PRIMARY KEY (`idNote`, `User_idUser`),
  INDEX `fk_Note_User1_idx` (`User_idUser` ASC),
  CONSTRAINT `fk_Note_User1`
    FOREIGN KEY (`User_idUser`)
    REFERENCES `NetworkInventory`.`User` (`idUser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `NetworkInventory`.`Network_has_Note`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `NetworkInventory`.`Network_has_Note` ;

CREATE TABLE IF NOT EXISTS `NetworkInventory`.`Network_has_Note` (
  `Network_idNetwork` INT NOT NULL,
  `Note_idNote` INT NOT NULL,
  PRIMARY KEY (`Network_idNetwork`, `Note_idNote`),
  INDEX `fk_Network_has_Note_Note1_idx` (`Note_idNote` ASC),
  INDEX `fk_Network_has_Note_Network1_idx` (`Network_idNetwork` ASC),
  CONSTRAINT `fk_Network_has_Note_Network1`
    FOREIGN KEY (`Network_idNetwork`)
    REFERENCES `NetworkInventory`.`Network` (`idNetwork`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Network_has_Note_Note1`
    FOREIGN KEY (`Note_idNote`)
    REFERENCES `NetworkInventory`.`Note` (`idNote`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `NetworkInventory`.`Vulnerablity_has_Note`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `NetworkInventory`.`Vulnerablity_has_Note` ;

CREATE TABLE IF NOT EXISTS `NetworkInventory`.`Vulnerablity_has_Note` (
  `Vulnerablity_idVulnerablity` INT NOT NULL,
  `Note_idNote` INT NOT NULL,
  PRIMARY KEY (`Vulnerablity_idVulnerablity`, `Note_idNote`),
  INDEX `fk_Vulnerablity_has_Note_Note1_idx` (`Note_idNote` ASC),
  INDEX `fk_Vulnerablity_has_Note_Vulnerablity1_idx` (`Vulnerablity_idVulnerablity` ASC),
  CONSTRAINT `fk_Vulnerablity_has_Note_Vulnerablity1`
    FOREIGN KEY (`Vulnerablity_idVulnerablity`)
    REFERENCES `NetworkInventory`.`Vulnerablity` (`idVulnerablity`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Vulnerablity_has_Note_Note1`
    FOREIGN KEY (`Note_idNote`)
    REFERENCES `NetworkInventory`.`Note` (`idNote`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `NetworkInventory`.`Fix_has_Note`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `NetworkInventory`.`Fix_has_Note` ;

CREATE TABLE IF NOT EXISTS `NetworkInventory`.`Fix_has_Note` (
  `Fix_idFix` INT NOT NULL,
  `Note_idNote` INT NOT NULL,
  PRIMARY KEY (`Fix_idFix`, `Note_idNote`),
  INDEX `fk_Fix_has_Note_Note1_idx` (`Note_idNote` ASC),
  INDEX `fk_Fix_has_Note_Fix1_idx` (`Fix_idFix` ASC),
  CONSTRAINT `fk_Fix_has_Note_Fix1`
    FOREIGN KEY (`Fix_idFix`)
    REFERENCES `NetworkInventory`.`Fix` (`idFix`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Fix_has_Note_Note1`
    FOREIGN KEY (`Note_idNote`)
    REFERENCES `NetworkInventory`.`Note` (`idNote`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `NetworkInventory`.`Software_has_Note`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `NetworkInventory`.`Software_has_Note` ;

CREATE TABLE IF NOT EXISTS `NetworkInventory`.`Software_has_Note` (
  `Software_idSoftware` INT NOT NULL,
  `Note_idNote` INT NOT NULL,
  PRIMARY KEY (`Software_idSoftware`, `Note_idNote`),
  INDEX `fk_Software_has_Note_Note1_idx` (`Note_idNote` ASC),
  INDEX `fk_Software_has_Note_Software1_idx` (`Software_idSoftware` ASC),
  CONSTRAINT `fk_Software_has_Note_Software1`
    FOREIGN KEY (`Software_idSoftware`)
    REFERENCES `NetworkInventory`.`Software` (`idSoftware`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Software_has_Note_Note1`
    FOREIGN KEY (`Note_idNote`)
    REFERENCES `NetworkInventory`.`Note` (`idNote`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `NetworkInventory`.`Hardware_has_Note`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `NetworkInventory`.`Hardware_has_Note` ;

CREATE TABLE IF NOT EXISTS `NetworkInventory`.`Hardware_has_Note` (
  `Hardware_idHardware` INT NOT NULL,
  `Note_idNote` INT NOT NULL,
  PRIMARY KEY (`Hardware_idHardware`, `Note_idNote`),
  INDEX `fk_Hardware_has_Note_Note1_idx` (`Note_idNote` ASC),
  INDEX `fk_Hardware_has_Note_Hardware1_idx` (`Hardware_idHardware` ASC),
  CONSTRAINT `fk_Hardware_has_Note_Hardware1`
    FOREIGN KEY (`Hardware_idHardware`)
    REFERENCES `NetworkInventory`.`Hardware` (`idHardware`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Hardware_has_Note_Note1`
    FOREIGN KEY (`Note_idNote`)
    REFERENCES `NetworkInventory`.`Note` (`idNote`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `NetworkInventory`.`Fix_has_Software`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `NetworkInventory`.`Fix_has_Software` ;

CREATE TABLE IF NOT EXISTS `NetworkInventory`.`Fix_has_Software` (
  `Fix_idFix` INT NOT NULL,
  `Software_idSoftware` INT NOT NULL,
  PRIMARY KEY (`Fix_idFix`, `Software_idSoftware`),
  INDEX `fk_Fix_has_Software_Software1_idx` (`Software_idSoftware` ASC),
  INDEX `fk_Fix_has_Software_Fix1_idx` (`Fix_idFix` ASC),
  CONSTRAINT `fk_Fix_has_Software_Fix1`
    FOREIGN KEY (`Fix_idFix`)
    REFERENCES `NetworkInventory`.`Fix` (`idFix`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Fix_has_Software_Software1`
    FOREIGN KEY (`Software_idSoftware`)
    REFERENCES `NetworkInventory`.`Software` (`idSoftware`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `NetworkInventory`.`Hardware_connected_to_Hardware`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `NetworkInventory`.`Hardware_connected_to_Hardware` ;

CREATE TABLE IF NOT EXISTS `NetworkInventory`.`Hardware_connected_to_Hardware` (
  `Hardware_idHardware` INT NOT NULL,
  `Hardware_idHardware1` INT NOT NULL,
  PRIMARY KEY (`Hardware_idHardware`, `Hardware_idHardware1`),
  INDEX `fk_Hardware_has_Hardware_Hardware2_idx` (`Hardware_idHardware1` ASC),
  INDEX `fk_Hardware_has_Hardware_Hardware1_idx` (`Hardware_idHardware` ASC),
  CONSTRAINT `fk_Hardware_has_Hardware_Hardware1`
    FOREIGN KEY (`Hardware_idHardware`)
    REFERENCES `NetworkInventory`.`Hardware` (`idHardware`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Hardware_has_Hardware_Hardware2`
    FOREIGN KEY (`Hardware_idHardware1`)
    REFERENCES `NetworkInventory`.`Hardware` (`idHardware`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
