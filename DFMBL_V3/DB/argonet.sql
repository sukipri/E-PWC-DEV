-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 16, 2021 at 03:48 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `argonet`
--

-- --------------------------------------------------------

--
-- Table structure for table `an_quest_01`
--

CREATE TABLE IF NOT EXISTS `an_quest_01` (
  `idmain_quest_01` varchar(50) NOT NULL,
  `quest_kode_01` varchar(50) NOT NULL,
  `quest_soal_01` varchar(50) NOT NULL,
  `quest_jawab_01` varchar(50) NOT NULL,
  PRIMARY KEY (`idmain_quest_01`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `an_quest_01`
--

INSERT INTO `an_quest_01` (`idmain_quest_01`, `quest_kode_01`, `quest_soal_01`, `quest_jawab_01`) VALUES
('923423-23rjgoerjgeo', 'Q1002', '10 X 10', '100'),
('sifdiewfierhih008349203', 'Q1001', '10 + 10', '20');

-- --------------------------------------------------------

--
-- Table structure for table `an_user_01`
--

CREATE TABLE IF NOT EXISTS `an_user_01` (
  `idmain_user_01` varchar(100) NOT NULL,
  `user_kode_01` varchar(100) NOT NULL,
  `user_nama_01` varchar(100) NOT NULL,
  `user_pass_01` varchar(100) NOT NULL,
  `user_akses_01` varchar(100) NOT NULL,
  PRIMARY KEY (`idmain_user_01`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `an_user_01`
--

INSERT INTO `an_user_01` (`idmain_user_01`, `user_kode_01`, `user_nama_01`, `user_pass_01`, `user_akses_01`) VALUES
('9fdger0yt450yjty04j5y0', 'ADM1001', 'sbs', '0cc175b9c0f1b6a831c399e269772661', '1'),
('9gf94545946596h', 'USR1001', 'sukipri', 'd31905d7583fa56246a77c1180880d65', '2');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
