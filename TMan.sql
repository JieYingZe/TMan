SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `TMan` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `TMan` ;

-- -----------------------------------------------------
-- Table `TMan`.`user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `TMan`.`user` (
  `userid` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(16) NOT NULL,
  `password` VARCHAR(32) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `gender` ENUM('male','female') NOT NULL,
  `website` VARCHAR(255) NULL,
  `profile` VARCHAR(255) NULL,
  `avatar` VARCHAR(255) NOT NULL DEFAULT 'default.gif',
  `credit` INT UNSIGNED NOT NULL DEFAULT 0,
  `create_time` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`userid`),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC),
  UNIQUE INDEX `username_UNIQUE` (`username` ASC));


-- -----------------------------------------------------
-- Table `TMan`.`question`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `TMan`.`question` (
  `questionid` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(255) NOT NULL,
  `content` TEXT NOT NULL,
  `reward` INT UNSIGNED NULL DEFAULT 0,
  `vote` INT UNSIGNED NULL DEFAULT 0,
  `view` INT UNSIGNED NULL DEFAULT 0,
  `create_time` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `user_userid` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`questionid`),
  INDEX `fk_question_user_idx` (`user_userid` ASC),
  CONSTRAINT `fk_question_user`
    FOREIGN KEY (`user_userid`)
    REFERENCES `TMan`.`user` (`userid`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `TMan`.`answer`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `TMan`.`answer` (
  `answerid` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `content` TEXT NOT NULL,
  `vote` INT UNSIGNED NULL DEFAULT 0,
  `create_time` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_userid` INT UNSIGNED NOT NULL,
  `question_questionid` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`answerid`),
  INDEX `fk_answer_question1_idx` (`question_questionid` ASC),
  INDEX `fk_answer_user1_idx` (`user_userid` ASC),
  CONSTRAINT `fk_answer_question1`
    FOREIGN KEY (`question_questionid`)
    REFERENCES `TMan`.`question` (`questionid`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_answer_user1`
    FOREIGN KEY (`user_userid`)
    REFERENCES `TMan`.`user` (`userid`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `TMan`.`tag`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `TMan`.`tag` (
  `tagid` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(16) NOT NULL,
  `description` VARCHAR(255) NULL,
  PRIMARY KEY (`tagid`),
  UNIQUE INDEX `name_UNIQUE` (`name` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `TMan`.`question_tag`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `TMan`.`question_tag` (
  `question_questionid` INT UNSIGNED NOT NULL,
  `tag_tagid` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`question_questionid`, `tag_tagid`),
  INDEX `fk_question_has_tag_tag1_idx` (`tag_tagid` ASC),
  INDEX `fk_question_has_tag_question1_idx` (`question_questionid` ASC),
  CONSTRAINT `fk_question_has_tag_question1`
    FOREIGN KEY (`question_questionid`)
    REFERENCES `TMan`.`question` (`questionid`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_question_has_tag_tag1`
    FOREIGN KEY (`tag_tagid`)
    REFERENCES `TMan`.`tag` (`tagid`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
