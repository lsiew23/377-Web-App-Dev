CREATE DATABASE league
;

USE league
;

select * from sis.schools;

CREATE TABLE `league`.`teams` (
  `tms_id` INT NOT NULL AUTO_INCREMENT,
  `tms_city` VARCHAR(45) NOT NULL,
  `tms_name` VARCHAR(45) NOT NULL,
  `tms_coach` VARCHAR(100) NULL,
  `tms_logo` BLOB NULL,
  PRIMARY KEY (`tms_id`),
  UNIQUE INDEX `tms_name_UNIQUE` (`tms_name` ASC) VISIBLE);
  
  

CREATE TABLE `league`.`players` (
  `pla_id` INT NOT NULL AUTO_INCREMENT,
  `pla_tms_id` INT NOT NULL,
  `pla_first_name` VARCHAR(45) NOT NULL,
  `pla_last_name` VARCHAR(45) NOT NULL,
  `pla_dob` DATETIME,
  `pla_pfp` BLOB NULL,
  PRIMARY KEY (`pla_id`),
  INDEX `pla_tms_id_FK` (`pla_tms_id` ASC) VISIBLE);
  