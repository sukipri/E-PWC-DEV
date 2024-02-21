-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 19, 2019 at 11:17 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bjerp`
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
-- Table structure for table `tb_bayar_nota`
--

CREATE TABLE IF NOT EXISTS `tb_bayar_nota` (
  `idmain_bayar_nota` varchar(50) NOT NULL,
  `idmain_ivc` varchar(50) NOT NULL,
  `idmain_j_bayar` varchar(50) NOT NULL,
  `kode` varchar(50) NOT NULL,
  `tgl_input` varchar(50) NOT NULL,
  `total_harga` varchar(50) NOT NULL,
  `total_bayar` varchar(50) NOT NULL,
  `total_tagihan` varchar(50) NOT NULL,
  `ket` text NOT NULL,
  `app` enum('1','2','3','4') NOT NULL,
  PRIMARY KEY (`idmain_bayar_nota`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_bayar_nota`
--

INSERT INTO `tb_bayar_nota` (`idmain_bayar_nota`, `idmain_ivc`, `idmain_j_bayar`, `kode`, `tgl_input`, `total_harga`, `total_bayar`, `total_tagihan`, `ket`, `app`) VALUES
('-1928648580190126085654', '-1356393563190125012339', '1659152563190112082117', 'PYN19012604', '2019-01-26', '540000', '550000', '540000', '', '2'),
('-964166127190116014021', '-1191196615190116013808', '1659152563190112082117', 'PYN19011601', '2019-01-16', '980000', '1000000', '980000', 'CASH #1', '2'),
('1186388620190125011930', '-645107371190125010411', '1659152563190112082117', 'PYN19012503', '2019-01-25', '70000', '71000', '70000', 'CASH #1', '2'),
('130776148190121113318', '-1070583088190121113243', '1898063570190111021114', 'PYN19012102', '2019-01-21', '1280000', '800000', '1280000', 'DP #2', '2');

-- --------------------------------------------------------

--
-- Table structure for table `tb_bayar_rekam`
--

CREATE TABLE IF NOT EXISTS `tb_bayar_rekam` (
  `idmain_bayar_rekam` varchar(50) NOT NULL,
  `idmain_bayar_nota` varchar(50) NOT NULL,
  `idmain_ivc` varchar(50) NOT NULL,
  `kode` varchar(50) NOT NULL,
  `bayar` varchar(50) NOT NULL,
  `tgl_input` date NOT NULL,
  PRIMARY KEY (`idmain_bayar_rekam`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_bayar_rekam`
--

INSERT INTO `tb_bayar_rekam` (`idmain_bayar_rekam`, `idmain_bayar_nota`, `idmain_ivc`, `kode`, `bayar`, `tgl_input`) VALUES
('1730433475190121113339', '130776148190121113318', '-1070583088190121113243', 'PYR19012103', '800000', '2019-01-21'),
('NW-1928648580190126085654', '-1928648580190126085654', '-1356393563190125012339', 'PYR19012605', '550000', '2019-01-26'),
('NW-964166127190116014021', '-964166127190116014021', '-1191196615190116013808', 'PYR19011601', '1000000', '2019-01-16'),
('NW1186388620190125011930', '1186388620190125011930', '-645107371190125010411', 'PYR19012504', '71000', '2019-01-25'),
('NW130776148190121113318', '130776148190121113318', '-1070583088190121113243', 'PYR19012102', '500000', '2019-01-21');

-- --------------------------------------------------------

--
-- Table structure for table `tb_buyer`
--

CREATE TABLE IF NOT EXISTS `tb_buyer` (
  `idmain_buyer` varchar(50) NOT NULL,
  `kode` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `telp` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `kota` varchar(30) NOT NULL,
  `provinsi` varchar(30) NOT NULL,
  `rank` varchar(10) NOT NULL,
  PRIMARY KEY (`idmain_buyer`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_buyer`
--

INSERT INTO `tb_buyer` (`idmain_buyer`, `kode`, `nama`, `alamat`, `telp`, `email`, `kota`, `provinsi`, `rank`) VALUES
('-212628681190315013132', 'BY19031501', 'Meika Kurniawan', 'jl kencana wungu', '0', 'sukipri9985@gmail.com', 'semarang', 'Jawa tengah', ''),
('-797058449190316091119', 'BY19031602', 'Ricky Prihatin', 'Jl Anak Nakal', '0898374838', 'rikikomo@gmail.com', 'semarang', 'Jawa tengah', '');

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
('-1128355649190116013554', '208686326181101071542', '710111266181101031054', '-1429375359181130102715', 'INV19011606', 'Meja Komputer', '2019-01-16', '2019-01-25', '4', '', '', '0', '2'),
('-201009108181130102737', '208686326181101071542', '710111266181101031054', '-1429375359181130102715', 'INV20181130-00003', 'KURSI 4R', '2017-01-01', '2019-01-25', '5', '', '', '0', '2'),
('-323976669181130102628', '1671153693181101065428', '710111266181101031054', '-1391059359181102075207', 'INV20181130-00002', 'MMT CHINA', '2017-01-01', '2019-01-25', '5.5', '', '', '3500', '2'),
('-54784222190204081801', '1671153693181101065428', '710111266181101031054', '-1391059359181102075207', 'INV19020407', 'ALATY-BANNER', '2019-02-04', '0000-00-00', '-1', '', '', '40000', '2'),
('1688501339190112084556', '1671153693181101065428', '710111266181101031054', '-1391059359181102075207', 'INV19011204', 'MMT Jepang', '2019-01-02', '2019-01-26', '10', '', '', '60000', '2'),
('723013840190116091111', '1671153693181101065428', '710111266181101031054', '131189691181102022403', 'INV19011605', 'MATA IKAN', '2019-01-02', '2019-01-25', '88', '', '', '0', '2'),
('839164239181130102458', '1671153693181101065428', '710111266181101031054', '-1391059359181102075207', 'INV20181130-00001', 'MMT Korea', '2018-04-01', '2019-01-26', '8.44', '', '', '4000', '2');

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
  `total_qc` varchar(10) NOT NULL,
  `point_qc` varchar(10) NOT NULL,
  `idmain_sup` varchar(50) NOT NULL,
  `idmain_list` varchar(50) NOT NULL,
  `app` enum('1','2','3','4','5','6') NOT NULL,
  `tipe` enum('B','L') NOT NULL,
  PRIMARY KEY (`idmain_inv_rekam`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_inv_rekam`
--

INSERT INTO `tb_inv_rekam` (`idmain_inv_rekam`, `idmain_inv`, `idmain_j_inv`, `idmain_akun`, `idmain_ivc`, `kode_ivc`, `kode`, `tgl_awal`, `tgl_update`, `jml_awal`, `jml_baru`, `harga_beli`, `harga_total`, `ket`, `total_qc`, `point_qc`, `idmain_sup`, `idmain_list`, `app`, `tipe`) VALUES
('-1310517088190125012143', '839164239181130102458', '1671153693181101065428', '710111266181101031054', '-1356393563190125012339', 'IVC19012504', 'INVR190125007', '2018-04-01', '2019-01-25', '0', '10', '4000', '40000', 'PO-DO: Barang Baru\r\nINV: barang Diterima', '3', '', '1317580127181129010126', '385360933181129091914', '2', 'L'),
('-2116795775190121113204', '-323976669181130102628', '1671153693181101065428', '710111266181101031054', '-1070583088190121113243', 'IVC19012102', 'INVR190121004', '2017-01-01', '2019-01-21', '0', '10', '30000', '300000', 'PO-DO: Barang baru', '2', '', '1317580127181129010126', '-639854731190121112558', '2', 'L'),
('-311428155190125010313', '723013840190116091111', '1671153693181101065428', '710111266181101031054', '-645107371190125010411', 'IVC19012503', 'INVR190125005', '2019-01-02', '2019-01-25', '0', '100', '700', '70000', 'PO-DO: Barang Baru\r\nINV: Barang Diterima', '0', '', '1317580127181129010126', '-1880152742190116091356', '2', 'L'),
('-399292380190121112729', '-323976669181130102628', '1671153693181101065428', '710111266181101031054', '', '', 'INVR20190121-00003', '2017-01-01', '2019-01-21', '0', '10', '30000', '', 'PO-DO: Barang Baru', '', '', '1317580127181129010126', '-639854731190121112558', '4', 'L'),
('-902945932190116013702', '-1128355649190116013554', '208686326181101071542', '710111266181101031054', '-1191196615190116013808', 'IVC19011601', 'INVR20190116-00002', '2019-01-16', '2019-01-16', '', '4', '120000', '480000', 'PO-DO: barang Baru', '4', '', '1435708533181129013821', '-1643464933190116013628', '2', 'L'),
('1537484827190125011812', '1688501339190112084556', '1671153693181101065428', '710111266181101031054', '-1356393563190125012339', 'IVC19012504', 'INVR190125006', '2019-01-02', '2019-01-25', '0', '10', '50000', '500000', 'PO-DO: Barang baru\r\nINV : Barang Diterima', '0', '', '1317580127181129010126', '-2101185513190116090833', '2', 'L'),
('1610655125190116013459', '-201009108181130102737', '208686326181101071542', '710111266181101031054', '-1191196615190116013808', 'IVC19011601', 'INVR20190116-00001', '2017-01-01', '2019-01-16', '0', '5', '100000', '500000', 'PO-DO:Barang Baru', '3', '', '1435708533181129013821', '-2101506905181130125605', '2', 'L');

-- --------------------------------------------------------

--
-- Table structure for table `tb_ivc`
--

CREATE TABLE IF NOT EXISTS `tb_ivc` (
  `idmain_ivc` varchar(50) NOT NULL,
  `idmain_akun` varchar(50) NOT NULL,
  `kode` varchar(50) NOT NULL,
  `tgl_input` date NOT NULL,
  `total_harga` varchar(20) NOT NULL,
  `total_barang` varchar(20) NOT NULL,
  `app` enum('1','2','3') NOT NULL,
  `jenis` enum('1','2','3','4') NOT NULL,
  PRIMARY KEY (`idmain_ivc`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_ivc`
--

INSERT INTO `tb_ivc` (`idmain_ivc`, `idmain_akun`, `kode`, `tgl_input`, `total_harga`, `total_barang`, `app`, `jenis`) VALUES
('-1070583088190121113243', '710111266181101031054', 'IVC19012102', '2019-01-21', '300,000', '1', '2', '1'),
('-1191196615190116013808', '710111266181101031054', 'IVC19011601', '2019-01-16', '980000', '2', '2', '1'),
('-1356393563190125012339', '710111266181101031054', 'IVC19012504', '2019-01-25', '540000', '2', '2', '1'),
('-645107371190125010411', '710111266181101031054', 'IVC19012503', '2019-01-25', '70000', '1', '2', '1'),
('TRN-1034514704190316092526', '710111266181101031054', 'IVC19031606', '0000-00-00', '', '', '1', '2'),
('TRN-1457086789190316092540', '710111266181101031054', 'IVC19031608', '0000-00-00', '', '', '1', '2'),
('TRN-1489740772190130084251', '710111266181101031054', 'IVC19013005', '2019-01-30', '14115', '', '2', '2'),
('TRN1057592987190316092636', '710111266181101031054', 'IVC19031609', '0000-00-00', '', '', '1', '2'),
('TRN1506423344190316092527', '710111266181101031054', 'IVC19031607', '0000-00-00', '', '', '1', '2');

-- --------------------------------------------------------

--
-- Table structure for table `tb_j_bayar`
--

CREATE TABLE IF NOT EXISTS `tb_j_bayar` (
  `idmain_j_bayar` varchar(40) NOT NULL,
  `kode` varchar(30) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `ket` text NOT NULL,
  PRIMARY KEY (`idmain_j_bayar`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_j_bayar`
--

INSERT INTO `tb_j_bayar` (`idmain_j_bayar`, `kode`, `nama`, `ket`) VALUES
('1659152563190112082117', 'CP19011202', 'PD01B', 'Cash\r\n'),
('1898063570190111021114', 'CP19011101', 'PD01A', 'Down Payment');

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
-- Table structure for table `tb_j_qc`
--

CREATE TABLE IF NOT EXISTS `tb_j_qc` (
  `idmain_j_qc` varchar(40) NOT NULL,
  `kode` varchar(40) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `min` varchar(20) NOT NULL,
  PRIMARY KEY (`idmain_j_qc`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_j_qc`
--

INSERT INTO `tb_j_qc` (`idmain_j_qc`, `kode`, `nama`, `min`) VALUES
('-1260547003190119082725', 'QCC19011902', 'Bentuk Barang', '3'),
('1461026748190118122003', 'QCC19011801', 'Kualitas Bahan', '3'),
('2097393312190119091413', 'QCC19011903', 'Kesuaian Barang', '3');

-- --------------------------------------------------------

--
-- Table structure for table `tb_profil`
--

CREATE TABLE IF NOT EXISTS `tb_profil` (
  `idmain_profil` varchar(20) NOT NULL,
  `kode` varchar(20) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `isi` text NOT NULL,
  PRIMARY KEY (`idmain_profil`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_profil`
--

INSERT INTO `tb_profil` (`idmain_profil`, `kode`, `nama`, `isi`) VALUES
('778939239', '20181201-0001', 'Kunci-Media', 'Jalan Suyudono No.118, Kelurahan Barusari, Kecamatan Semarang Selatan,, Kota Semarang, Jawa Tengah 50245');

-- --------------------------------------------------------

--
-- Table structure for table `tb_qc`
--

CREATE TABLE IF NOT EXISTS `tb_qc` (
  `idmain_qc` varchar(30) NOT NULL,
  `idmain_j_qc` varchar(30) NOT NULL,
  `idmain_inv` varchar(30) NOT NULL,
  `kode` varchar(30) NOT NULL,
  `min` varchar(30) NOT NULL,
  PRIMARY KEY (`idmain_qc`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_qc`
--

INSERT INTO `tb_qc` (`idmain_qc`, `idmain_j_qc`, `idmain_inv`, `kode`, `min`) VALUES
('-2083404384190125114001', '2097393312190119091413', '-201009108181130102737', 'QC190125082', '3'),
('-246082911190125012415', '2097393312190119091413', '839164239181130102458', 'QC190125102', '3'),
('1152908531190121084635', '1461026748190118122003', '-323976669181130102628', 'QC190121033', '3'),
('1308484535190125113956', '-1260547003190119082725', '-201009108181130102737', 'QC190125061', '3'),
('1756882868190125083524', '-1260547003190119082725', '-1128355649190116013554', 'QC190125041', '3'),
('1995070419190120023946', '2097393312190119091413', '-323976669181130102628', 'QC190120022', '3'),
('2080348658190125012416', '1461026748190118122003', '839164239181130102458', 'QC190125113', '3'),
('437965757190125083526', '1461026748190118122003', '-1128355649190116013554', 'QC190125053', '3'),
('584125542190125113957', '1461026748190118122003', '-201009108181130102737', 'QC190125073', '3'),
('694308982190120023931', '-1260547003190119082725', '-323976669181130102628', 'QC190120011', '3'),
('787623459190125012413', '-1260547003190119082725', '839164239181130102458', 'QC190125091', '3');

-- --------------------------------------------------------

--
-- Table structure for table `tb_qc_rekam`
--

CREATE TABLE IF NOT EXISTS `tb_qc_rekam` (
  `idmain_qc_rekam` varchar(50) NOT NULL,
  `idmain_inv_rekam` varchar(50) NOT NULL,
  `idmain_qc` varchar(50) NOT NULL,
  `idmain_j_qc` varchar(50) NOT NULL,
  `idmain_inv` varchar(50) NOT NULL,
  `idmain_akun` varchar(50) NOT NULL,
  `kode` varchar(50) NOT NULL,
  `total_qc` varchar(50) NOT NULL,
  `point_qc` varchar(50) NOT NULL,
  PRIMARY KEY (`idmain_qc_rekam`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_qc_rekam`
--

INSERT INTO `tb_qc_rekam` (`idmain_qc_rekam`, `idmain_inv_rekam`, `idmain_qc`, `idmain_j_qc`, `idmain_inv`, `idmain_akun`, `kode`, `total_qc`, `point_qc`) VALUES
('-19935230201901260856071', '-1310517088190125012143', '-246082911190125012415', '2097393312190119091413', '839164239181130102458', '710111266181101031054', ' QCR190126091', '0', '3'),
('-19935230201901260856072', '-1310517088190125012143', '2080348658190125012416', '1461026748190118122003', '839164239181130102458', '710111266181101031054', ' QCR190126092', '0', '3'),
('-19935230201901260856073', '-1310517088190125012143', '787623459190125012413', '-1260547003190119082725', '839164239181130102458', '710111266181101031054', ' QCR190126093', '0', '3'),
('-20008563561901251122151', '-902945932190116013702', '1756882868190125083524', '-1260547003190119082725', '-1128355649190116013554', '710111266181101031054', ' QCR190125041', '0', '3'),
('-20008563561901251122152', '-902945932190116013702', '437965757190125083526', '1461026748190118122003', '-1128355649190116013554', '710111266181101031054', ' QCR190125042', '0', '4'),
('-570069381901251140161', '1610655125190116013459', '-2083404384190125114001', '2097393312190119091413', '-201009108181130102737', '710111266181101031054', ' QCR190125061', '0', '3'),
('-570069381901251140162', '1610655125190116013459', '1308484535190125113956', '-1260547003190119082725', '-201009108181130102737', '710111266181101031054', ' QCR190125062', '0', '3'),
('-570069381901251140163', '1610655125190116013459', '584125542190125113957', '1461026748190118122003', '-201009108181130102737', '710111266181101031054', ' QCR190125063', '0', '3'),
('-6009631641901250831411', '-2116795775190121113204', '1152908531190121084635', '1461026748190118122003', '-323976669181130102628', '710111266181101031054', ' QCR190125011', '0', '2'),
('-6009631641901250831412', '-2116795775190121113204', '1995070419190120023946', '2097393312190119091413', '-323976669181130102628', '710111266181101031054', ' QCR190125012', '0', '3'),
('-6009631641901250831413', '-2116795775190121113204', '694308982190120023931', '-1260547003190119082725', '-323976669181130102628', '710111266181101031054', ' QCR190125013', '0', '2');

-- --------------------------------------------------------

--
-- Table structure for table `tb_satuan`
--

CREATE TABLE IF NOT EXISTS `tb_satuan` (
  `idmain_satuan` varchar(50) NOT NULL,
  `kode` varchar(50) NOT NULL,
  `nama_kode` varchar(10) NOT NULL,
  `nama` varchar(10) NOT NULL,
  `jenis` enum('1','2','3','4') NOT NULL,
  PRIMARY KEY (`idmain_satuan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_satuan`
--

INSERT INTO `tb_satuan` (`idmain_satuan`, `kode`, `nama_kode`, `nama`, `jenis`) VALUES
('-1391059359181102075207', 'ST20181102-00005', 'M', 'Meter', '1'),
('-1429375359181130102715', 'ST20181130-00006', 'Unit', 'Unit', '2'),
('131189691181102022403', 'ST20181102-00004', 'Pcs', 'pieces', '2'),
('1411868352181102022328', 'ST20181102-00003', 'Cm', 'Centimeter', '1'),
('1931929225181102022307', 'ST20181102-00002', 'Lt', 'Liter', '2'),
('916624578181102022222', 'ST20181102-00002', 'KG', 'Kilogram', '2');

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
('-1643464933190116013628', '1435708533181129013821', '-1128355649190116013554', 'SUPL19011609', 'TABLE MANNER', '120000', '-1429375359181130102715', '2'),
('-1880152742190116091356', '1317580127181129010126', '723013840190116091111', 'SUPL19011608', 'FISH EYE NEW', '700', '131189691181102022403', '2'),
('-2101185513190116090833', '1317580127181129010126', '1688501339190112084556', 'SUPL20190116-00006', 'MMT JPN X1', '50000', '-1391059359181102075207', '2'),
('-2101506905181130125605', '1435708533181129013821', '-201009108181130102737', 'SUPL20181130-00005', 'CHAIR 78', '100000', '-1429375359181130102715', '2'),
('-639854731190121112558', '1317580127181129010126', '-323976669181130102628', 'SUPL19012110', 'CHINE MMT 10', '30000', '-1391059359181102075207', '2'),
('1606545517190116091138', '1317580127181129010126', '723013840190116091111', 'SUPL20190116-00007', 'FISH EYE', '100', '131189691181102022403', '2'),
('385360933181129091914', '1317580127181129010126', '-144746444181129104350', 'SUPL20181129-00001', 'Flexi Korea 101', '4000', '-1391059359181102075207', '2'),
('470530259181129093515', '1317580127181129010126', '-144746444181129104350', 'SUPL20181129-00003', 'Flexi Korea 203 DL', '3400', '-1391059359181102075207', '2'),
('828952377181130091624', '1317580127181129010126', '1036878355181130091508', 'SUPL20181130-00004', 'FLEXI CN 101', '2500', '-1391059359181102075207', '2'),
('874881765181129093413', '1317580127181129010126', '-144746444181129104350', 'SUPL20181129-00002', 'Flexi Korea 202 NEW', '5500', '-1391059359181102075207', '2');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tran_bayar_rekam`
--

CREATE TABLE IF NOT EXISTS `tb_tran_bayar_rekam` (
  `idmain_tran_bayar_rekam` varchar(50) NOT NULL,
  `idmain_tran_nota` varchar(50) NOT NULL,
  `idmain_j_bayar` varchar(40) NOT NULL,
  `idmain_ivc` varchar(50) NOT NULL,
  `kode` varchar(50) NOT NULL,
  `total_bayar` varchar(50) NOT NULL,
  `jml_bayar` text NOT NULL,
  `tgl_input` date NOT NULL,
  `app` enum('1','2','3','4') NOT NULL,
  PRIMARY KEY (`idmain_tran_bayar_rekam`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_tran_bayar_rekam`
--

INSERT INTO `tb_tran_bayar_rekam` (`idmain_tran_bayar_rekam`, `idmain_tran_nota`, `idmain_j_bayar`, `idmain_ivc`, `kode`, `total_bayar`, `jml_bayar`, `tgl_input`, `app`) VALUES
('-559301298190302014355', '-1489740772190130084251', '1659152563190112082117', 'TRN-1489740772190130084251', 'TNPR19030201', '14115', '15000', '2019-03-01', '2'),
('2045959224190318111022', '1057592987190316092636', '1898063570190111021114', 'TRN1057592987190316092636', 'TNPR19031802', '47875', '25000', '2019-03-18', '3');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tran_nota`
--

CREATE TABLE IF NOT EXISTS `tb_tran_nota` (
  `idmain_tran_nota` varchar(50) NOT NULL,
  `idmain_ivc` varchar(50) NOT NULL,
  `kode` varchar(50) NOT NULL,
  `jml_barang` varchar(50) NOT NULL,
  `total_bayar` varchar(50) NOT NULL,
  `total_terima` varchar(40) NOT NULL,
  `app` enum('1','2','3','4','5') NOT NULL,
  `tgl` date NOT NULL,
  `idmain_j_bayar` varchar(50) NOT NULL,
  `idmain_buyer` varchar(50) NOT NULL,
  `tgl_jadi` date DEFAULT NULL,
  PRIMARY KEY (`idmain_tran_nota`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_tran_nota`
--

INSERT INTO `tb_tran_nota` (`idmain_tran_nota`, `idmain_ivc`, `kode`, `jml_barang`, `total_bayar`, `total_terima`, `app`, `tgl`, `idmain_j_bayar`, `idmain_buyer`, `tgl_jadi`) VALUES
('-1489740772190130084251', 'TRN-1489740772190130084251', 'TN19013001', '3', '14115', '15000', '2', '2019-03-01', '1659152563190112082117', '-797058449190316091119', '2019-03-17'),
('1057592987190316092636', 'TRN1057592987190316092636', 'TN19031602', '3', '47875', '25000', '3', '2019-03-18', '1898063570190111021114', '-212628681190315013132', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_tran_rekam`
--

CREATE TABLE IF NOT EXISTS `tb_tran_rekam` (
  `idmain_tran_rekam` varchar(50) NOT NULL,
  `idmain_tran_nota` varchar(50) NOT NULL,
  `idmain_ivc` varchar(50) NOT NULL,
  `idmain_inv` varchar(50) NOT NULL,
  `idmain_satuan` varchar(50) NOT NULL,
  `kode` varchar(50) NOT NULL,
  `pj` varchar(50) NOT NULL,
  `lb` varchar(50) NOT NULL,
  `total_pjlb` varchar(50) NOT NULL,
  `jml` varchar(50) NOT NULL,
  `total_bayar` varchar(50) NOT NULL,
  `tgl` date NOT NULL,
  `jenis` varchar(20) NOT NULL,
  `app` enum('1','2','3') NOT NULL,
  PRIMARY KEY (`idmain_tran_rekam`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_tran_rekam`
--

INSERT INTO `tb_tran_rekam` (`idmain_tran_rekam`, `idmain_tran_nota`, `idmain_ivc`, `idmain_inv`, `idmain_satuan`, `kode`, `pj`, `lb`, `total_pjlb`, `jml`, `total_bayar`, `tgl`, `jenis`, `app`) VALUES
('-131151242190318110953', '1057592987190316092636', 'TRN1057592987190316092636', '-54784222190204081801', '-1391059359181102075207', 'TNR19031806', '1', '1', '1', '1', '40000', '0000-00-00', '1', '3'),
('-1795081218190318110907', '1057592987190316092636', 'TRN1057592987190316092636', '723013840190116091111', '131189691181102022403', 'TNR19031805', '1', '1', '4', '4', '0', '0000-00-00', '2', '3'),
('-212267315190210021700', '-1489740772190130084251', 'TRN-1489740772190130084251', '-323976669181130102628', '-1391059359181102075207', 'TNR19021002', '1.5', '1.5', '2.25', '1', '7875', '0000-00-00', '1', '3'),
('-312518216190212013820', '-1489740772190130084251', 'TRN-1489740772190130084251', '723013840190116091111', '131189691181102022403', 'TNR19021203', '1', '1', '8', '8', '0', '0000-00-00', '2', '3'),
('-724178478190212075657', '-1489740772190130084251', 'TRN-1489740772190130084251', '839164239181130102458', '-1391059359181102075207', 'TNR19021202', '1.2', '1.3', '1.56', '1', '6240', '0000-00-00', '1', '3'),
('1037039946190318110727', '1057592987190316092636', 'TRN1057592987190316092636', '-323976669181130102628', '-1391059359181102075207', 'TNR19031804', '1.5', '1.5', '2.25', '1', '7875', '0000-00-00', '1', '3');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
