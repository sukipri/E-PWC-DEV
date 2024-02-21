-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 30, 2018 at 12:44 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bjrs`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_akses`
--

CREATE TABLE IF NOT EXISTS `tb_akses` (
  `idmain_akses` varchar(50) NOT NULL,
  `kode` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `angka` varchar(10) NOT NULL,
  PRIMARY KEY (`idmain_akses`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_akses`
--

INSERT INTO `tb_akses` (`idmain_akses`, `kode`, `nama`, `angka`) VALUES
('1081022303181101025822', 'AKS20181101-00002', 'ADMIN', '2'),
('1353527937181101024920', 'AKS20181101-00001', 'S.ADMIN', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tb_akun`
--

CREATE TABLE IF NOT EXISTS `tb_akun` (
  `idmain_akun` varchar(50) NOT NULL,
  `idmain_akses` varchar(50) NOT NULL,
  `kode` varchar(50) NOT NULL,
  `namauser` varchar(50) NOT NULL,
  `passuser` varchar(50) NOT NULL,
  `akses` varchar(10) NOT NULL,
  `app` enum('1','2') NOT NULL,
  PRIMARY KEY (`idmain_akun`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_akun`
--

INSERT INTO `tb_akun` (`idmain_akun`, `idmain_akses`, `kode`, `namauser`, `passuser`, `akses`, `app`) VALUES
('710111266181101031054', '1353527937181101024920', 'AKN20181101-00003', 'admin', '63a9f0ea7bb98050796b649e85481845', '1', '2');

-- --------------------------------------------------------

--
-- Table structure for table `tb_inv`
--

CREATE TABLE IF NOT EXISTS `tb_inv` (
  `idmain_inv` varchar(50) NOT NULL,
  `idmain_j_inv` varchar(50) NOT NULL,
  `idmain_akun` varchar(50) NOT NULL,
  `idmain_satuan` varchar(50) NOT NULL,
  `kode` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tgl_input` date NOT NULL,
  `tgl_update` date NOT NULL,
  `jml` varchar(10) NOT NULL,
  `idmain_sup` varchar(50) NOT NULL,
  `harga_beli` varchar(50) NOT NULL,
  `harga_jual` varchar(50) NOT NULL,
  `app` enum('1','2','3') NOT NULL,
  PRIMARY KEY (`idmain_inv`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_inv`
--

INSERT INTO `tb_inv` (`idmain_inv`, `idmain_j_inv`, `idmain_akun`, `idmain_satuan`, `kode`, `nama`, `tgl_input`, `tgl_update`, `jml`, `idmain_sup`, `harga_beli`, `harga_jual`, `app`) VALUES
('-201009108181130102737', '208686326181101071542', '710111266181101031054', '-1429375359181130102715', 'INV20181130-00003', 'KURSI 4R', '2017-01-01', '0000-00-00', '', '', '', '0', '2'),
('-323976669181130102628', '1671153693181101065428', '710111266181101031054', '-1391059359181102075207', 'INV20181130-00002', 'MMT CHINA', '2017-01-01', '0000-00-00', '', '', '', '3500', '2'),
('839164239181130102458', '1671153693181101065428', '710111266181101031054', '-1391059359181102075207', 'INV20181130-00001', 'MMT Korea', '2018-04-01', '0000-00-00', '', '', '', '4000', '2');

-- --------------------------------------------------------

--
-- Table structure for table `tb_inv_rekam`
--

CREATE TABLE IF NOT EXISTS `tb_inv_rekam` (
  `idmain_inv_rekam` varchar(50) NOT NULL,
  `idmain_inv` varchar(50) NOT NULL,
  `idmain_j_inv` varchar(50) NOT NULL,
  `idmain_akun` varchar(50) NOT NULL,
  `idmain_ivc` varchar(50) NOT NULL,
  `kode_ivc` varchar(50) NOT NULL,
  `kode` varchar(50) NOT NULL,
  `tgl_awal` date NOT NULL,
  `tgl_update` date NOT NULL,
  `jml_awal` varchar(50) NOT NULL,
  `jml_baru` varchar(10) NOT NULL,
  `harga_beli` varchar(50) NOT NULL,
  `harga_total` varchar(30) NOT NULL,
  `ket` text NOT NULL,
  `idmain_sup` varchar(50) NOT NULL,
  `idmain_list` varchar(50) NOT NULL,
  `app` enum('1','2','3','4','5','6') NOT NULL,
  `tipe` enum('B','L') NOT NULL,
  PRIMARY KEY (`idmain_inv_rekam`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_inv_rekam`
--

INSERT INTO `tb_inv_rekam` (`idmain_inv_rekam`, `idmain_inv`, `idmain_j_inv`, `idmain_akun`, `idmain_ivc`, `kode_ivc`, `kode`, `tgl_awal`, `tgl_update`, `jml_awal`, `jml_baru`, `harga_beli`, `harga_total`, `ket`, `idmain_sup`, `idmain_list`, `app`, `tipe`) VALUES
('-1225430927181130125649', '-201009108181130102737', '208686326181101071542', '710111266181101031054', '90513597181130011938', 'IVC20181130-00001', 'INVR20181130-00003', '2017-01-01', '2018-11-30', '', '4', '100000', '400000', 'PO-DO: Kursi Pegawai', '1435708533181129013821', '-2101506905181130125605', '5', 'L'),
('-2145451138181130103318', '-323976669181130102628', '1671153693181101065428', '710111266181101031054', '90513597181130011938', 'IVC20181130-00001', 'INVR20181130-00001', '2017-01-01', '2018-11-30', '', '10', '2500', '25000', 'PO-DO: Barang baru', '1317580127181129010126', '828952377181130091624', '5', 'L'),
('1187682265181130112707', '839164239181130102458', '1671153693181101065428', '710111266181101031054', '90513597181130011938', 'IVC20181130-00001', 'INVR20181130-00002', '2018-04-01', '2018-11-30', '', '5', '4000', '20000', 'PO-DO: Barang Baru', '1317580127181129010126', '385360933181129091914', '5', 'L');

-- --------------------------------------------------------

--
-- Table structure for table `tb_ivc`
--

CREATE TABLE IF NOT EXISTS `tb_ivc` (
  `idmain_ivc` varchar(50) NOT NULL,
  `kode` varchar(50) NOT NULL,
  `tgl_input` date NOT NULL,
  `total_harga` varchar(20) NOT NULL,
  `total_barang` varchar(20) NOT NULL,
  `app` enum('1','2','3') NOT NULL,
  PRIMARY KEY (`idmain_ivc`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_ivc`
--

INSERT INTO `tb_ivc` (`idmain_ivc`, `kode`, `tgl_input`, `total_harga`, `total_barang`, `app`) VALUES
('90513597181130011938', 'IVC20181130-00001', '2018-11-30', '445000', '3', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tb_j_inv`
--

CREATE TABLE IF NOT EXISTS `tb_j_inv` (
  `idmain_j_inv` varchar(50) NOT NULL,
  `kode` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `app` enum('1','2') NOT NULL,
  PRIMARY KEY (`idmain_j_inv`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_j_inv`
--

INSERT INTO `tb_j_inv` (`idmain_j_inv`, `kode`, `nama`, `app`) VALUES
('-1916295591181101073419', 'JINV20181101-00003', 'PERBAIKAN', '2'),
('1671153693181101065428', 'JINV20181101-00001', 'JUAL', '2'),
('208686326181101071542', 'JINV20181101-00002', 'INVENTARIS', '2');

-- --------------------------------------------------------

--
-- Table structure for table `tb_satuan`
--

CREATE TABLE IF NOT EXISTS `tb_satuan` (
  `idmain_satuan` varchar(50) NOT NULL,
  `kode` varchar(50) NOT NULL,
  `nama_kode` varchar(10) NOT NULL,
  `nama` varchar(10) NOT NULL,
  PRIMARY KEY (`idmain_satuan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_satuan`
--

INSERT INTO `tb_satuan` (`idmain_satuan`, `kode`, `nama_kode`, `nama`) VALUES
('-1391059359181102075207', 'ST20181102-00005', 'M', 'Meter'),
('-1429375359181130102715', 'ST20181130-00006', 'Unit', 'Unit'),
('131189691181102022403', 'ST20181102-00004', 'Pcs', 'pieces'),
('1411868352181102022328', 'ST20181102-00003', 'Cm', 'Centimeter'),
('1931929225181102022307', 'ST20181102-00002', 'Lt', 'Liter'),
('916624578181102022222', 'ST20181102-00002', 'KG', 'Kilogram');

-- --------------------------------------------------------

--
-- Table structure for table `tb_sup`
--

CREATE TABLE IF NOT EXISTS `tb_sup` (
  `idmain_sup` varchar(50) NOT NULL,
  `kode` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `telp` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(30) NOT NULL,
  `ket` text NOT NULL,
  `tgl_masuk` date NOT NULL,
  `app` enum('1','2') NOT NULL,
  PRIMARY KEY (`idmain_sup`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_sup`
--

INSERT INTO `tb_sup` (`idmain_sup`, `kode`, `nama`, `telp`, `alamat`, `email`, `ket`, `tgl_masuk`, `app`) VALUES
('1317580127181129010126', 'SUP20181129-00001', 'PT.CANVAS FANA', '0247758573', 'JL.kencana Ungu', 'canvas@fana.com', 'Distributor MMT', '2018-07-04', '2'),
('1435708533181129013821', 'SUP20181129-00002', 'PT.CIPTA ABADI', '02546473', 'JL MANGGIS SELATAN', 'cipta@mail.com', 'Distribusi Meja', '2018-04-04', '2');

-- --------------------------------------------------------

--
-- Table structure for table `tb_sup_list`
--

CREATE TABLE IF NOT EXISTS `tb_sup_list` (
  `idmain_list` varchar(50) NOT NULL,
  `idmain_sup` varchar(50) NOT NULL,
  `idmain_inv` varchar(50) NOT NULL,
  `kode` varchar(30) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `harga` varchar(30) NOT NULL,
  `idmain_satuan` varchar(30) NOT NULL,
  `app` enum('1','2') NOT NULL,
  PRIMARY KEY (`idmain_list`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_sup_list`
--

INSERT INTO `tb_sup_list` (`idmain_list`, `idmain_sup`, `idmain_inv`, `kode`, `nama`, `harga`, `idmain_satuan`, `app`) VALUES
('-2101506905181130125605', '1435708533181129013821', '-201009108181130102737', 'SUPL20181130-00005', 'CHAIR 78', '100000', '-1429375359181130102715', '2'),
('385360933181129091914', '1317580127181129010126', '-144746444181129104350', 'SUPL20181129-00001', 'Flexi Korea 101', '4000', '-1391059359181102075207', '2'),
('470530259181129093515', '1317580127181129010126', '-144746444181129104350', 'SUPL20181129-00003', 'Flexi Korea 203 DL', '3400', '-1391059359181102075207', '2'),
('828952377181130091624', '1317580127181129010126', '1036878355181130091508', 'SUPL20181130-00004', 'FLEXI CN 101', '2500', '-1391059359181102075207', '2'),
('874881765181129093413', '1317580127181129010126', '-144746444181129104350', 'SUPL20181129-00002', 'Flexi Korea 202 NEW', '5500', '-1391059359181102075207', '2');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
