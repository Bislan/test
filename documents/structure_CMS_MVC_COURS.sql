SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `DEV2013_CMS_MVC` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `DEV2013_CMS_MVC` ;

-- -----------------------------------------------------
-- Table `DEV2013_CMS_MVC`.`rubriques`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `DEV2013_CMS_MVC`.`rubriques` (
  `id` TINYINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `titre` VARCHAR(50) NOT NULL,
  `texte` TEXT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `DEV2013_CMS_MVC`.`articles`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `DEV2013_CMS_MVC`.`articles` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `titre` VARCHAR(100) NOT NULL,
  `texte` TEXT NULL,
  `rubriqueId` TINYINT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_articles_rubriques_idx` (`rubriqueId` ASC),
  CONSTRAINT `fk_articles_rubriques`
    FOREIGN KEY (`rubriqueId`)
    REFERENCES `DEV2013_CMS_MVC`.`rubriques` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
