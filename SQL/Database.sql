-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.11-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             10.3.0.5771
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para fingerprintassistancecontrol
CREATE DATABASE IF NOT EXISTS `fingerprintassistancecontrol` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `fingerprintassistancecontrol`;

-- Volcando estructura para tabla fingerprintassistancecontrol.clokinginregisters
CREATE TABLE IF NOT EXISTS `clokinginregisters` (
  `auto-increment` int(50) NOT NULL AUTO_INCREMENT,
  `dniUser` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `type` enum('entrance','exit') NOT NULL,
  PRIMARY KEY (`auto-increment`),
  KEY `dniUser` (`dniUser`),
  CONSTRAINT `dniUser` FOREIGN KEY (`dniUser`) REFERENCES `users` (`dni`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla fingerprintassistancecontrol.clokinginregisters: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `clokinginregisters` DISABLE KEYS */;
/*!40000 ALTER TABLE `clokinginregisters` ENABLE KEYS */;

-- Volcando estructura para tabla fingerprintassistancecontrol.loginfo
CREATE TABLE IF NOT EXISTS `loginfo` (
  `auto-increment` int(11) NOT NULL AUTO_INCREMENT,
  `datetime` datetime NOT NULL,
  `who` varchar(50) NOT NULL,
  `action` varchar(50) NOT NULL,
  PRIMARY KEY (`auto-increment`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla fingerprintassistancecontrol.loginfo: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `loginfo` DISABLE KEYS */;
/*!40000 ALTER TABLE `loginfo` ENABLE KEYS */;

-- Volcando estructura para tabla fingerprintassistancecontrol.users
CREATE TABLE IF NOT EXISTS `users` (
  `dni` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `contract` enum('partial','full-time') NOT NULL,
  `fingerprint` varchar(50) NOT NULL,
  `bossEmail` varchar(50) NOT NULL,
  PRIMARY KEY (`dni`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla fingerprintassistancecontrol.users: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
