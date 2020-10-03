-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema heroku_e2c4947f07c47f2
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema heroku_e2c4947f07c47f2
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `heroku_e2c4947f07c47f2` DEFAULT CHARACTER SET utf8 ;
USE `heroku_e2c4947f07c47f2` ;

-- -----------------------------------------------------
-- Table `heroku_e2c4947f07c47f2`.`Current-Game`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `heroku_e2c4947f07c47f2`.`Current-Game` (
  `idCurrent-Game` INT NOT NULL,
  `GameName` VARCHAR(45) NULL,
  PRIMARY KEY (`idCurrent-Game`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `heroku_e2c4947f07c47f2`.`Game`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `heroku_e2c4947f07c47f2`.`Game` (
  `idGame` INT NOT NULL,
  `GameName` VARCHAR(45) NULL,
  `player` VARCHAR(45) NULL,
  `Current-Game_idCurrent-Game` INT NOT NULL,
  PRIMARY KEY (`idGame`),
  INDEX `fk_Game_Current-Game1_idx` (`Current-Game_idCurrent-Game` ASC) ,
  CONSTRAINT `fk_Game_Current-Game1`
    FOREIGN KEY (`Current-Game_idCurrent-Game`)
    REFERENCES `heroku_e2c4947f07c47f2`.`Current-Game` (`idCurrent-Game`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `heroku_e2c4947f07c47f2`.`players`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `heroku_e2c4947f07c47f2`.`players` (
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
  `Game_id` INT NOT NULL DEFAULT 200,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `username_UNIQUE` (`username` ASC) ,
  INDEX `fk_players_Game1_idx` (`Game_id` ASC) ,
  CONSTRAINT `fk_players_Game1`
    FOREIGN KEY (`Game_id`)
    REFERENCES `heroku_e2c4947f07c47f2`.`Game` (`idGame`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `heroku_e2c4947f07c47f2`.`friend`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `heroku_e2c4947f07c47f2`.`friend` (
  `fid` INT(11) NOT NULL AUTO_INCREMENT,
  `friend_id` INT NOT NULL,
  `players_id` INT(11) NOT NULL,
  PRIMARY KEY (`fid`),
  INDEX `fk_friend_players_idx` (`players_id` ASC) ,
  CONSTRAINT `fk_friend_players`
    FOREIGN KEY (`players_id`)
    REFERENCES `heroku_e2c4947f07c47f2`.`players` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `heroku_e2c4947f07c47f2`.`Dressing`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `heroku_e2c4947f07c47f2`.`Dressing` (
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
    REFERENCES `heroku_e2c4947f07c47f2`.`players` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `heroku_e2c4947f07c47f2`.`shirt`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `heroku_e2c4947f07c47f2`.`shirt` (
  `shirt_id` INT NOT NULL AUTO_INCREMENT,
  `shirtname` VARCHAR(45) NOT NULL,
  `players_id` INT(11) NOT NULL,
  PRIMARY KEY (`shirt_id`),
  INDEX `fk_shirt_players1_idx` (`players_id` ASC) ,
  CONSTRAINT `fk_shirt_players1`
    FOREIGN KEY (`players_id`)
    REFERENCES `heroku_e2c4947f07c47f2`.`players` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `heroku_e2c4947f07c47f2`.`short`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `heroku_e2c4947f07c47f2`.`short` (
  `short_id` INT NOT NULL AUTO_INCREMENT,
  `shortname` VARCHAR(45) NOT NULL,
  `players_id` INT(11) NOT NULL,
  PRIMARY KEY (`short_id`),
  INDEX `fk_shirt_players1_idx` (`players_id` ASC) ,
  CONSTRAINT `fk_shirt_players10`
    FOREIGN KEY (`players_id`)
    REFERENCES `heroku_e2c4947f07c47f2`.`players` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `heroku_e2c4947f07c47f2`.`shoe`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `heroku_e2c4947f07c47f2`.`shoe` (
  `shoe_id` INT NOT NULL AUTO_INCREMENT,
  `shoename` VARCHAR(45) NOT NULL,
  `players_id` INT(11) NOT NULL,
  PRIMARY KEY (`shoe_id`),
  INDEX `fk_shirt_players1_idx` (`players_id` ASC) ,
  CONSTRAINT `fk_shirt_players11`
    FOREIGN KEY (`players_id`)
    REFERENCES `heroku_e2c4947f07c47f2`.`players` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `heroku_e2c4947f07c47f2`.`hair`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `heroku_e2c4947f07c47f2`.`hair` (
  `hair_id` INT NOT NULL AUTO_INCREMENT,
  `hairname` VARCHAR(45) NOT NULL,
  `players_id` INT(11) NOT NULL,
  PRIMARY KEY (`hair_id`),
  INDEX `fk_shirt_players1_idx` (`players_id` ASC) ,
  CONSTRAINT `fk_shirt_players12`
    FOREIGN KEY (`players_id`)
    REFERENCES `heroku_e2c4947f07c47f2`.`players` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `heroku_e2c4947f07c47f2`.`stock`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `heroku_e2c4947f07c47f2`.`stock` (
  `stock_id` INT NOT NULL AUTO_INCREMENT,
  `food` INT NOT NULL DEFAULT 0,
  `water` INT NOT NULL DEFAULT 0,
  `players_id` INT(11) NOT NULL,
  PRIMARY KEY (`stock_id`),
  INDEX `fk_stock_players1_idx` (`players_id` ASC) ,
  CONSTRAINT `fk_stock_players1`
    FOREIGN KEY (`players_id`)
    REFERENCES `heroku_e2c4947f07c47f2`.`players` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
