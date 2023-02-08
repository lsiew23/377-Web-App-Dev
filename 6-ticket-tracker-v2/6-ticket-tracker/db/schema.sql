-- ------------------------------------------------------ --
-- Database schema for the Ticket Tracker web application --
-- ------------------------------------------------------ --

DROP DATABASE IF EXISTS helpdesk;
CREATE DATABASE helpdesk DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

USE helpdesk;

DROP TABLE IF EXISTS tickets;
CREATE TABLE tickets (
  tkt_id            int             NOT NULL AUTO_INCREMENT,
  tkt_problem       longtext        NOT NULL,
  tkt_resolution    longtext,
  tkt_priority      int             NOT NULL,
  tkt_status        varchar(45)     NOT NULL DEFAULT 'Open',
  tkt_contact_email varchar(100)    NOT NULL,
  PRIMARY KEY (tkt_id)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
