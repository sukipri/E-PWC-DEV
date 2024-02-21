-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 13, 2019 at 03:37 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bjaka`
--

-- --------------------------------------------------------

--
-- Table structure for table `kuis_jawab`
--

CREATE TABLE IF NOT EXISTS `kuis_jawab` (
  `idkuis_jawab` int(10) NOT NULL AUTO_INCREMENT,
  `idkuis` varchar(10) NOT NULL,
  `idsks` varchar(100) NOT NULL,
  `idmahasiswa` varchar(100) NOT NULL,
  `jawab` varchar(100) NOT NULL,
  `tgl` date NOT NULL,
  PRIMARY KEY (`idkuis_jawab`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `kuis_jawab`
--

INSERT INTO `kuis_jawab` (`idkuis_jawab`, `idkuis`, `idsks`, `idmahasiswa`, `jawab`, `tgl`) VALUES
(1, '18', 'EAD221.53047041', '141020026', '4', '2017-02-28'),
(2, '19', 'EAD221.53047041', '141020026', '4', '2017-02-28'),
(3, '20', 'EAD221.53047041', '141020026', '4', '2017-02-28'),
(4, '21', 'EAD221.53047041', '141020026', '4', '2017-02-28'),
(5, '22', 'EAD221.53047041', '141020026', '4', '2017-02-28'),
(6, '23', 'EAD221.53047041', '141020026', '4', '2017-02-28'),
(7, '24', 'EAD221.53047041', '141020026', '4', '2017-02-28'),
(8, '25', 'EAD221.53047041', '141020026', '4', '2017-02-28'),
(9, '26', 'EAD221.53047041', '141020026', '4', '2017-02-28'),
(10, '27', 'EAD221.53047041', '141020026', '4', '2017-02-28'),
(11, '28', 'EAD221.53047041', '141020026', '4', '2017-02-28'),
(12, '29', 'EAD221.53047041', '141020026', '4', '2017-02-28'),
(13, '30', 'EAD221.53047041', '141020026', '4', '2017-02-28'),
(14, '31', 'EAD221.53047041', '141020026', '4', '2017-02-28'),
(15, '32', 'EAD221.53047041', '141020026', '4', '2017-02-28'),
(16, '33', 'EAD221.53047041', '141020026', '4', '2017-02-28'),
(17, '34', 'EAD221.53047041', '141020026', '4', '2017-02-28');

-- --------------------------------------------------------

--
-- Table structure for table `mymail`
--

CREATE TABLE IF NOT EXISTS `mymail` (
  `idmain` int(100) NOT NULL AUTO_INCREMENT,
  `untuk` varchar(100) NOT NULL,
  `dari` varchar(100) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `isi` text NOT NULL,
  `tgl` varchar(100) NOT NULL,
  `baca` enum('1','2') NOT NULL,
  `nama` varchar(100) NOT NULL,
  PRIMARY KEY (`idmain`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `mymail`
--

INSERT INTO `mymail` (`idmain`, `untuk`, `dari`, `judul`, `isi`, `tgl`, `baca`, `nama`) VALUES
(1, '143040007', '8008', 'VALIDASI KRS', 'Mata Kuliah <b>Jaringan Komputer</b> &nbsp; Sudah Divalidasi <b>24-05-2018</b> ', '24-05-2018', '1', 'SBS-008-XDXkid'),
(2, '143040007', '8008', 'VALIDASI KRS', 'Mata Kuliah <b>Jaringan Komputer</b> &nbsp; Sudah Divalidasi <b>24-05-2018</b> ', '24-05-2018', '1', 'SBS-008-XDXkid'),
(3, '143040007', '8008', 'VALIDASI KRS', 'Mata Kuliah <b>Jaringan Komputer</b> &nbsp; Sudah Divalidasi <b>24-05-2018</b> ', '24-05-2018', '1', 'SBS-008-XDXkid'),
(4, '143040007', '8008', 'VALIDASI KRS', 'Mata Kuliah <b>Jaringan Komputer</b> &nbsp; Sudah Divalidasi <b>24-05-2018</b> ', '24-05-2018', '1', 'SBS-008-XDXkid'),
(5, '143040007', '8008', 'VALIDASI KRS', 'Mata Kuliah <b>Jaringan Komputer</b> &nbsp; Sudah Divalidasi <b>24-05-2018</b> ', '24-05-2018', '1', 'SBS-008-XDXkid'),
(6, '143040007', '8008', 'VALIDASI KRS', 'Mata Kuliah <b>Jaringan Komputer</b> &nbsp; Sudah Divalidasi <b>24-05-2018</b> ', '24-05-2018', '1', 'SBS-008-XDXkid'),
(7, '143040007', '8008', 'VALIDASI KRS', 'Mata Kuliah <b>Jaringan Komputer</b> &nbsp; Sudah Divalidasi <b>24-05-2018</b> ', '24-05-2018', '1', 'SBS-008-XDXkid'),
(8, '143040007', '8008', 'VALIDASI KRS', 'Mata Kuliah <b>Jaringan Komputer</b> &nbsp; Sudah Divalidasi <b>24-05-2018</b> ', '24-05-2018', '1', 'SBS-008-XDXkid'),
(9, '143040007', '8008', 'VALIDASI KRS', 'Mata Kuliah <b>Jaringan Komputer</b> &nbsp; Sudah Divalidasi <b>24-05-2018</b> ', '24-05-2018', '1', 'SBS-008-XDXkid'),
(10, '143040007', '8008', 'VALIDASI KRS', 'Mata Kuliah <b>Jaringan Komputer</b> &nbsp; Sudah Divalidasi <b>24-05-2018</b> ', '24-05-2018', '1', 'SBS-008-XDXkid'),
(11, '143040007', '8008', 'VALIDASI KRS', 'Mata Kuliah <b>Matematika Diskrit</b> &nbsp; Sudah Divalidasi <b>24-05-2018</b> ', '24-05-2018', '1', 'SBS-008-XDXkid'),
(12, '143040007', '8008', 'TEST', '<h1>GOOOD</h1>\r\n', '02-07-2018', '1', 'SBS-008-XDXkid'),
(14, '8008', '143040007', 'fa fa-audio-description', 'orem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,', '02-07-2018', '2', 'Mamat'),
(15, '8008', '143040007', 'Naff - Ketika Harus Berakhir', 'BantalGulingProduction® presents:\r\nVM Naff Band - Ketika Harus Berakhir\r\n\r\nDirector: Renny Fernandez\r\nCo Director: Abimael Gandy\r\nDOP: Agung Dewantoro\r\nArt Director: Monty\r\n\r\nProducer: Anton Fernandez\r\n\r\nColourist: Adi\r\nCoulour Grading: G1 Post Jakarta\r\nNegative Processing: Interpratama Studio Lab Jakarta\r\n\r\nFilm: Fujifilm ASA 250D & Fujifilm ASA 500T\r\n\r\nCamera Arriflex SR-3 HS 16mm: Elang Perkasa Film\r\nLighting, Dolly & Grip: Elang Perkasa Film\r\nGrip Support: Bebek Film\r\n\r\nShooting @ Gedung BNI Kota Tua Jakarta \r\n\r\n2006\r\n\r\nNaff band is Artist of Trinity Optima Production, Indonesia', '02-07-2018', '2', 'Mamat');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
