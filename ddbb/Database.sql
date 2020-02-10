-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.10-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             10.3.0.5771
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for fingerprintassistancecontrol
CREATE DATABASE IF NOT EXISTS `fingerprintassistancecontrol` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `fingerprintassistancecontrol`;

-- Dumping structure for table fingerprintassistancecontrol.calendar_table
CREATE TABLE IF NOT EXISTS `calendar_table` (
  `calendarDate` date NOT NULL,
  `monthName` varchar(9) NOT NULL,
  `dayName` varchar(9) NOT NULL,
  `isHoliday` int(1) NOT NULL,
  `holidayDescr` varchar(32) NOT NULL,
  PRIMARY KEY (`calendarDate`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table fingerprintassistancecontrol.clokinginregisters
CREATE TABLE IF NOT EXISTS `clokinginregisters` (
  `orderN` int(11) NOT NULL AUTO_INCREMENT,
  `dniUser` varchar(50) NOT NULL,
  `clockingDate` date NOT NULL DEFAULT curdate(),
  `clockingTime` time NOT NULL DEFAULT curtime(),
  `clockingType` enum('entrance','exit') NOT NULL,
  PRIMARY KEY (`orderN`),
  KEY `dniUser` (`dniUser`),
  KEY `FKdate` (`clockingDate`),
  CONSTRAINT `FKdate` FOREIGN KEY (`clockingDate`) REFERENCES `calendar_table` (`calendarDate`),
  CONSTRAINT `FKdniUser` FOREIGN KEY (`dniUser`) REFERENCES `users` (`employeeDni`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for procedure fingerprintassistancecontrol.find_incomplete_days
DELIMITER //
CREATE PROCEDURE `find_incomplete_days`(
	IN `dni` VARCHAR(50),
	IN `hiring_date` DATE
)
BEGIN

	DECLARE en_num INT DEFAULT 0;
	DECLARE ex_num INT DEFAULT 0;
	
	DECLARE check_date DATE DEFAULT hiring_date; #This date will the hiring date
	DECLARE today_date DATE DEFAULT CURDATE();
	
	
	DROP TEMPORARY TABLE byUserAndDate;
	CREATE TEMPORARY TABLE IF NOT EXISTS byUserAndDate (Type VARCHAR(50));
			
	
	
	WHILE check_date < today_date DO
			
		INSERT INTO byUserAndDate(type) (SELECT type FROM clokinginregisters WHERE dniUser = dni AND date_e = check_date);
		
		SELECT COUNT(*) FROM byUserAndDate WHERE type LIKE 'entrance' INTO en_num;
			
		SELECT COUNT(*) FROM byUserAndDate WHERE type LIKE 'exit' INTO ex_num;
			
			IF en_num != ex_num THEN
				SELECT check_date;
			END IF;
				

			SET en_num = 0;
			SET ex_num = 0;
				
				
			Set check_date = DATE_ADD(check_date, INTERVAL 1 DAY);
			
	END WHILE;

END//
DELIMITER ;

-- Dumping structure for table fingerprintassistancecontrol.loginfo
CREATE TABLE IF NOT EXISTS `loginfo` (
  `orderN` int(11) NOT NULL AUTO_INCREMENT,
  `logWhen` datetime NOT NULL DEFAULT current_timestamp(),
  `logWho` varchar(50) NOT NULL,
  `logAction` varchar(50) NOT NULL,
  PRIMARY KEY (`orderN`),
  KEY `FKwho` (`logWho`),
  CONSTRAINT `FKwho` FOREIGN KEY (`logWho`) REFERENCES `users` (`employeeDni`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table fingerprintassistancecontrol.users
CREATE TABLE IF NOT EXISTS `users` (
  `employeeDni` varchar(50) NOT NULL,
  `employeeName` varchar(50) NOT NULL,
  `employeePsw` varchar(50) NOT NULL,
  `contractType` enum('partial','full-time') NOT NULL,
  `fingerprint` int(1) NOT NULL DEFAULT -1,
  `bossEmail` varchar(50) NOT NULL DEFAULT 'boss@movicoders.com',
  `isAdmin` int(1) NOT NULL DEFAULT 0,
  `contractStartDate` date NOT NULL,
  `contractEndDate` date DEFAULT NULL,
  PRIMARY KEY (`employeeDni`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table fingerprintassistancecontrol.usersholidays
CREATE TABLE IF NOT EXISTS `usersholidays` (
  `orderN` int(11) NOT NULL AUTO_INCREMENT,
  `userDni` varchar(50) NOT NULL,
  `holidayDate` date NOT NULL,
  PRIMARY KEY (`orderN`),
  KEY `FKuserDni` (`userDni`),
  KEY `FKholidayDate` (`holidayDate`),
  CONSTRAINT `FKholidayDate` FOREIGN KEY (`holidayDate`) REFERENCES `calendar_table` (`calendarDate`),
  CONSTRAINT `FKuserDni` FOREIGN KEY (`userDni`) REFERENCES `users` (`employeeDni`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
