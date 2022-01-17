-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 28, 2021 at 04:51 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cicafdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `userpermission`
--

DROP TABLE IF EXISTS `userpermission`;
CREATE TABLE IF NOT EXISTS `userpermission` (
  `idUserPermission` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `adminRead` tinyint(1) NOT NULL DEFAULT '0',
  `adminWrite` tinyint(1) NOT NULL DEFAULT '0',
  `comptaRead` tinyint(1) NOT NULL DEFAULT '0',
  `comptaWrite` tinyint(1) NOT NULL DEFAULT '0',
  `budgetRead` tinyint(1) NOT NULL DEFAULT '0',
  `budgetWrite` tinyint(1) NOT NULL DEFAULT '0',
  `personnelRead` tinyint(1) NOT NULL DEFAULT '0',
  `personnelWrite` tinyint(1) NOT NULL DEFAULT '0',
  `amortissementRead` tinyint(1) NOT NULL DEFAULT '0',
  `amortissementWrite` tinyint(1) NOT NULL DEFAULT '0',
  `entrepriseRead` tinyint(1) NOT NULL DEFAULT '0',
  `entrepriseWrite` tinyint(1) NOT NULL DEFAULT '0',
  `userId` int(11) DEFAULT NULL,
  PRIMARY KEY (`idUserPermission`),
  KEY `fk__userpermission_user` (`userId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `userpermission`
--

INSERT INTO `userpermission` (`idUserPermission`, `adminRead`, `adminWrite`, `comptaRead`, `comptaWrite`, `budgetRead`, `budgetWrite`, `personnelRead`, `personnelWrite`, `amortissementRead`, `amortissementWrite`, `entrepriseRead`, `entrepriseWrite`, `userId`) VALUES
(1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `userpermission`
--
ALTER TABLE `userpermission`
  ADD CONSTRAINT `fk__userpermission_user` FOREIGN KEY (`userId`) REFERENCES `user` (`idUser`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
