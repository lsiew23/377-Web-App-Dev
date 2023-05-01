drop database if exists dpw_park_permits;
CREATE DATABASE `dpw_park_permits` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

use dpw_park_permits; 


CREATE TABLE `applications` (
  `app_id`             int NOT NULL AUTO_INCREMENT,
  `app_cus_id`         int NOT NULL,
  `app_time_enter`     datetime DEFAULT NULL, 
  `app_time_exit`      datetime DEFAULT NULL,
  `app_activity_start` datetime DEFAULT Null,
  `app_activity_end`   datetime DEFAULT NULL,
  `app_date`           date NOT NULL,
  `app_people`         int DEFAULT NULL,
  `app_teams`          int DEFAULT NULL,
  `app_registrants`    int DEFAULT NULL,
  PRIMARY KEY (`app_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `customers` (
  `cus_id` int NOT NULL AUTO_INCREMENT,
  `cus_first_name`   varchar(45) NOT NULL,
  `cus_last_name`    varchar(45) NOT NULL,
  `cus_tier`         int DEFAULT NULL,
  `cus_phone`        varchar(20) DEFAULT NULL,
  `cus_email`        varchar(100) DEFAULT NULL,
  `cus_organization` varchar(100) DEFAULT 'null',
  `cus_address`      varchar(100) DEFAULT NULL,
  PRIMARY KEY (`cus_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `park_areas` (
  `pka_id`     int NOT NULL AUTO_INCREMENT,
  `pka_name`   varchar(100) NOT NULL,
  `pka_par_id` int NOT NULL,
  PRIMARY KEY (`pka_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `parks` (
  `par_id`   int NOT NULL AUTO_INCREMENT,
  `par_name` varchar(100) NOT NULL,
  PRIMARY KEY (`par_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `application_park_area` (
  `apa_id`     int NOT NULL AUTO_INCREMENT,
  `apa_app_id` int NOT NULL,
  `apa_pka_id` int NOT NULL,
  PRIMARY KEY (`apa_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

