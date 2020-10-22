-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema mysqlcluster
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mysqlcluster
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mysqlcluster` DEFAULT CHARACTER SET utf8 ;
USE `mysqlcluster` ;

-- -----------------------------------------------------
-- Table `mysqlcluster`.`players`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mysqlcluster`.`players` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(45) NOT NULL,
  `salt` VARCHAR(45) NOT NULL,
  `hash` VARCHAR(45) NOT NULL,
  `money_km` VARCHAR(45) NOT NULL DEFAULT '0',
  `latitude` VARCHAR(45) NULL DEFAULT NULL,
  `longitude` VARCHAR(45) NULL DEFAULT NULL,
  `total_km` VARCHAR(45) NULL,
  `current_level` VARCHAR(45) NULL DEFAULT 0,
  `current_task` VARCHAR(45) NULL DEFAULT 0,
  `role` VARCHAR(45) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `username_UNIQUE` (`username` ASC) )
ENGINE = InnoDB

DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `mysqlcluster`.`friend`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mysqlcluster`.`friend` (
  `fid` INT(11) NOT NULL AUTO_INCREMENT,
  `friend_id` INT NOT NULL,
  `players_id` INT(11) NOT NULL,
  PRIMARY KEY (`fid`),
  INDEX `fk_friend_players_idx` (`players_id` ASC) ,
  CONSTRAINT `fk_friend_players`
    FOREIGN KEY (`players_id`)
    REFERENCES `mysqlcluster`.`players` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB

DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `mysqlcluster`.`Dressing`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mysqlcluster`.`dressing` (
  `did` INT NOT NULL AUTO_INCREMENT,
  `shirtname` VARCHAR(45) NOT NULL DEFAULT '1',
  `shortname` VARCHAR(45) NULL DEFAULT '1',
  `shoename` VARCHAR(45) NULL DEFAULT '1',
  `hairname` VARCHAR(45) NULL DEFAULT '1',
  `gender` VARCHAR(45) NULL DEFAULT '1',
  `players_id` INT(11) NOT NULL,
  PRIMARY KEY (`did`),
  INDEX `fk_Dressing_players1_idx` (`players_id` ASC) ,
  CONSTRAINT `fk_Dressing_players1`
    FOREIGN KEY (`players_id`)
    REFERENCES `mysqlcluster`.`players` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mysqlcluster`.`shirt`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mysqlcluster`.`shirt` (
  `shirt_id` INT NOT NULL AUTO_INCREMENT,
  `shirtname` VARCHAR(45) NOT NULL,
  `players_id` INT(11) NOT NULL,
  PRIMARY KEY (`shirt_id`),
  INDEX `fk_shirt_players1_idx` (`players_id` ASC) ,
  CONSTRAINT `fk_shirt_players1`
    FOREIGN KEY (`players_id`)
    REFERENCES `mysqlcluster`.`players` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mysqlcluster`.`short`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mysqlcluster`.`short` (
  `short_id` INT NOT NULL AUTO_INCREMENT,
  `shortname` VARCHAR(45) NOT NULL,
  `players_id` INT(11) NOT NULL,
  PRIMARY KEY (`short_id`),
  INDEX `fk_shirt_players1_idx` (`players_id` ASC) ,
  CONSTRAINT `fk_shirt_players10`
    FOREIGN KEY (`players_id`)
    REFERENCES `mysqlcluster`.`players` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mysqlcluster`.`shoe`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mysqlcluster`.`shoe` (
  `shoe_id` INT NOT NULL AUTO_INCREMENT,
  `shoename` VARCHAR(45) NOT NULL,
  `players_id` INT(11) NOT NULL,
  PRIMARY KEY (`shoe_id`),
  INDEX `fk_shirt_players1_idx` (`players_id` ASC) ,
  CONSTRAINT `fk_shirt_players11`
    FOREIGN KEY (`players_id`)
    REFERENCES `mysqlcluster`.`players` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mysqlcluster`.`hair`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mysqlcluster`.`hair` (
  `hair_id` INT NOT NULL AUTO_INCREMENT,
  `hairname` VARCHAR(45) NOT NULL,
  `players_id` INT(11) NOT NULL,
  PRIMARY KEY (`hair_id`),
  INDEX `fk_shirt_players1_idx` (`players_id` ASC) ,
  CONSTRAINT `fk_shirt_players12`
    FOREIGN KEY (`players_id`)
    REFERENCES `mysqlcluster`.`players` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mysqlcluster`.`stock`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mysqlcluster`.`stock` (
  `stock_id` INT NOT NULL AUTO_INCREMENT,
  `food` INT NOT NULL DEFAULT 0,
  `water` INT NOT NULL DEFAULT 0,
  `players_id` INT(11) NOT NULL,
  PRIMARY KEY (`stock_id`),
  INDEX `fk_stock_players1_idx` (`players_id` ASC) ,
  CONSTRAINT `fk_stock_players1`
    FOREIGN KEY (`players_id`)
    REFERENCES `mysqlcluster`.`players` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mysqlcluster`.`currentgame`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mysqlcluster`.`currentgame` (
  `idCG` INT NOT NULL AUTO_INCREMENT,
  `GameName` VARCHAR(45) NULL,
  `TotalPlayer` INT NULL,
  PRIMARY KEY (`idCG`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mysqlcluster`.`Game`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mysqlcluster`.`game` (
  `idGame` INT NOT NULL AUTO_INCREMENT,
  `GameName` VARCHAR(45) NULL,
  `player` VARCHAR(45) NULL,
  `CG_id` INT NOT NULL,
  `role` INT NOT NULL DEFAULT 0,
  PRIMARY KEY (`idGame`),
  INDEX `fk_Game_Current-Game1_idx` (`CG_id` ASC) ,
  CONSTRAINT `fk_Game_Current-Game1`
    FOREIGN KEY (`CG_id`)
    REFERENCES `mysqlcluster`.`currentgame` (`idCG`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
