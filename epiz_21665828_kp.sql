-- phpMyAdmin SQL Dump
-- version 3.5.8.2
-- http://www.phpmyadmin.net
--
-- Host: sql204.epizy.com
-- Generation Time: Mar 27, 2018 at 03:53 AM
-- Server version: 5.6.35-81.0
-- PHP Version: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `epiz_21665828_kp`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_pembelian_brg`
--

CREATE TABLE IF NOT EXISTS `detail_pembelian_brg` (
  `id_transaksi` varchar(20) NOT NULL,
  `id_brg` varchar(20) NOT NULL,
  `jumlah_beli` int(11) NOT NULL,
  `sub_total` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_pembelian_brg`
--

INSERT INTO `detail_pembelian_brg` (`id_transaksi`, `id_brg`, `jumlah_beli`, `sub_total`) VALUES
('ACR-1009090', 'BR0000106', 1, 60000),
('ACR-1009090', 'BR0000004', 2, 60000),
('MR-19005', 'BR0000002', 1, 60000),
('0100', 'BR0000106', 1, 48000),
('020', 'BR0000002', 10, 180000),
('011', 'BR0000106', 1, 48000),
('sffdsdfdsf', 'BR0000105', 1, 30000);

-- --------------------------------------------------------

--
-- Table structure for table `detail_retur`
--

CREATE TABLE IF NOT EXISTS `detail_retur` (
  `id_retur` varchar(20) NOT NULL,
  `id_brg` varchar(15) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `sub_total` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_retur`
--

INSERT INTO `detail_retur` (`id_retur`, `id_brg`, `harga`, `jumlah`, `sub_total`) VALUES
('INVR2018010000001', 'BR0000003', 30000, 1, 30000),
('INVR2018010000002', 'BR0000002', 180000, 1, 180000),
('INVR2018010000003', 'BR0000003', 30000, 1, 30000);

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi`
--

CREATE TABLE IF NOT EXISTS `detail_transaksi` (
  `id_transaksi` varchar(20) NOT NULL,
  `id_brg` varchar(15) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah_brg` int(11) NOT NULL,
  `sub_total` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id_transaksi`, `id_brg`, `harga`, `jumlah_brg`, `sub_total`) VALUES
('INV2018010000001', 'BR0000002', 180000, 1, 180000),
('INV2018010000001', 'BR0000003', 30000, 2, 60000),
('INV2018010000002', 'BR0000002', 180000, 1, 180000),
('INV2018010000004', 'BR0000002', 180000, 1, 180000),
('INV2018010000004', 'BR0000003', 30000, 2, 60000),
('INV2018010000005', 'BR0000002', 180000, 1, 180000),
('INV2018010000006', 'BR0000002', 180000, 1, 180000),
('INV2018010000007', 'BR0000003', 30000, 1, 30000),
('INV2018010000008', 'BR0000002', 180000, 1, 180000),
('INV2018010000009', 'BR0000003', 30000, 1, 30000),
('INV2018010000010', 'BR0000003', 30000, 1, 30000),
('INV2018010000011', 'BR0000003', 30000, 2, 60000),
('INV2018010000012', 'BR0000003', 30000, 1, 30000),
('INV2018010000012', 'BR0000002', 180000, 1, 180000),
('INV2018010000013', 'BR0000003', 30000, 1, 30000),
('INV2018010000014', 'BR0000003', 30000, 2, 60000),
('INV2018010000015', 'BR0000002', 180000, 1, 180000),
('INV2018010000016', 'BR0000005', 35000, 1, 35000),
('INV2018010000017', 'BR0000003', 30000, 100, 3000000),
('INV2018010000024', 'BR0000005', 35000, 2, 70000),
('INV2018010000024', 'BR0000002', 180000, 1, 180000),
('INV2018010000025', 'BR0000005', 35000, 1, 35000),
('INV2018010000025', 'BR0000002', 180000, 4, 720000),
('INV2018010000026', 'BR0000005', 35000, 1, 35000),
('INV2018010000027', 'BR0000004', 36000, 1, 36000),
('INV2018010000029', 'BR0000102', 46000, 5, 230000),
('INV2018010000030', 'BR0000003', 30000, 1, 30000),
('INV2018010000032', 'BR0000103', 46000, 2, 92000),
('INV2018010000033', 'BR0000003', 30000, 1, 30000),
('INV2018010000034', 'BR0000002', 180000, 1, 180000),
('INV2018010000035', 'BR0000103', 46000, 1, 46000),
('INV2018010000039', 'BR0000103', 46000, 1, 46000),
('INV2018010000040', 'BR0000106', 48000, 1, 48000),
('INV2018010000041', 'BR0000104', 46000, 1, 46000),
('INV2018010000042', 'BR0000104', 46000, 1, 46000),
('INV2018010000044', 'BR0000005', 35000, 1, 35000),
('INV2018010000045', 'BR0000107', 42000, 1, 42000),
('INV2018010000046', 'BR0000107', 42000, 1, 42000),
('INV2018010000047', 'BR0000107', 42000, 1, 42000),
('INV2018010000048', 'BR0000103', 46000, 1, 46000),
('INV2018010000048', 'BR0000104', 46000, 1, 46000),
('INV2018010000049', 'BR0000005', 35000, 1, 35000),
('INV2018010000049', 'BR0000104', 46000, 1, 46000),
('INV2018010000051', 'BR0000109', 21000, 6, 126000),
('INV2018010000052', 'BR0000004', 36000, 3, 108000),
('INV2018010000053', 'BR0000102', 46000, 5, 230000),
('INV2018010000054', 'BR0000003', 30000, 2, 60000),
('INV2018010000055', 'BR0000103', 46000, 1, 46000),
('INV2018010000056', 'BR0000005', 35000, 1, 35000),
('INV2018010000057', 'BR0000005', 35000, 1, 35000),
('INV2018010000058', 'BR0000003', 30000, 1, 30000),
('INV2018010000059', 'BR0000107', 42000, 1, 42000),
('INV2018020000060', 'BR0000004', 36000, 1, 36000),
('INV2018020000061', 'BR0000005', 35000, 2, 70000),
('INV2018020000062', 'BR0000002', 180000, 2, 360000),
('INV2018020000062', 'BR0000102', 46000, 3, 138000),
('INV2018020000066', 'BR0000005', 35000, 10, 350000),
('INV2018020000069', 'BR0000106', 48000, 5, 240000),
('INV2018020000070', 'BR0000003', 30000, 1, 30000),
('INV2018020000071', 'BR0000003', 30000, 1, 30000),
('INV2018020000072', 'BR0000002', 180000, 1, 180000),
('INV2018020000072', 'BR0000104', 46000, 1, 46000),
('INV2018020000073', 'BR0000005', 35000, 12, 420000),
('INV2018020000073', 'BR0000002', 180000, 16, 2880000),
('INV2018020000073', 'BR0000105', 25000, 10, 250000),
('INV2018020000074', 'BR0000005', 35000, 1, 35000),
('INV2018020000075', 'BR0000003', 30000, 1, 30000),
('INV2018020000076', 'BR0000002', 180000, 1, 180000),
('INV2018020000076', 'BR0000002', 180000, 1, 180000),
('INV2018030000077', 'BR0000106', 48000, 2, 96000),
('INV2018030000081', 'BR0000005', 35000, 1, 35000),
('INV2018030000082', 'BR0000105', 25000, 1, 25000),
('INV2018030000085', 'BR0000107', 42000, 2, 84000),
('INV2018030000084', 'BR0000003', 30000, 1, 30000),
('INV2018030000092', 'BR0000002', 180000, 1, 180000),
('INV2018030000090', 'BR0000002', 180000, 1, 180000),
('INV2018030000092', 'BR0000003', 30000, 1, 30000),
('INV2018030000096', 'BR0000103', 46000, 1, 46000),
('INV2018030000095', 'BR0000112', 25000, 1, 25000),
('INV2018030000096', 'BR0000005', 35000, 1, 35000);

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE IF NOT EXISTS `karyawan` (
  `id_karyawan` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(14) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jabatan` varchar(30) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `del` int(11) NOT NULL,
  PRIMARY KEY (`id_karyawan`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `nama`, `alamat`, `no_telp`, `tgl_lahir`, `jabatan`, `tgl_masuk`, `del`) VALUES
('KRY0000001', 'Dwiki Nugroho', 'Jr. Abdullah No. 37, Tangerang Selatan 32047, MalUt', '626250289171', '1992-07-02', 'Admin', '2018-01-07', 0),
('KRY0000002', 'Budi Raja Sutedja', 'Ds. Sudirman No. 70, Bitung 19276, Banten', '08303469723', '1987-06-13', 'Sales', '2018-01-07', 0),
('KRY0000003', 'Hanjaya Renshu', 'Psr. Bacang No. 711, Lhokseumawe 22839, DKI', '081573674365', '1988-01-13', 'Sales', '2018-01-07', 0),
('KRY0000004', 'Romario Noverlia', 'Ki. Taman No. 248, Batu 89706', '05384927998', '1997-01-25', 'Sales', '2018-01-07', 0),
('KRY0000005', 'Marvin', 'Jalan Gusti Situt Machmud\r\nGang selat sumba 3\r\nNo 59', '082384501984', '1997-03-17', 'Sales', '2018-02-27', 0),
('KRY0000006', 'Ambrosius Ama Tuan', 'Jl. Nawawi Hasan No. 83', '082250483021', '1995-10-13', 'Sales', '2018-02-28', 0),
('KRY0000007', 'Rico R', 'Jangan Coba Coba bertanya', '08232323232', '1010-10-10', 'Kepo', '2018-03-12', 0),
('KRY0000008', 'Mandra', 'Pontianak', '082250505050', '1998-03-15', 'Admin', '2018-03-13', 0),
('KRY0000009', 'Admin', 'Admin', '0000000000', '2018-03-15', 'Admin', '2018-03-16', 0);

-- --------------------------------------------------------

--
-- Table structure for table `list_brg`
--

CREATE TABLE IF NOT EXISTS `list_brg` (
  `id_brg` varchar(15) NOT NULL,
  `nama_brg` varchar(30) NOT NULL,
  `type` varchar(20) NOT NULL,
  `spek` varchar(20) NOT NULL,
  `merk` varchar(20) NOT NULL,
  `harga` int(11) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `satuan` varchar(10) NOT NULL,
  `stok` int(11) NOT NULL,
  `del` int(11) NOT NULL,
  PRIMARY KEY (`id_brg`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `list_brg`
--

INSERT INTO `list_brg` (`id_brg`, `nama_brg`, `type`, `spek`, `merk`, `harga`, `harga_beli`, `satuan`, `stok`, `del`) VALUES
('BR0000001', 'sadasda', 'sadasd', 'sdasd', 'asdasd', 214324, 0, 'asdasdas', 324324, 1),
('BR0000002', 'Aki', '-nan-', '-nan-', 'GS Astra', 180000, 150000, 'Buah', 1, 0),
('BR0000003', 'Kabel Chocke', '-nan-', '-nan-', 'Astra Part', 30000, 28000, 'PCS', 2, 0),
('BR0000004', 'Oli Top 1', '-nan-', '-nan-', 'Top 1', 36000, 33000, 'Kaleng', 7, 0),
('BR0000005', 'Oli Yamalube', '-nan-', '-nan-', 'Yamalube', 35000, 30000, 'Buah', 2, 0),
('BR0000006', 'TROMOL DEPAN DISC.', 'SUPRA-X', 'SILVER', 'YASUHO', 0, 0, 'Pcs', 91200, 0),
('BR0000007', 'TROMOL DEPAN DISC', 'VARIO/BEAT', 'SILVER', 'YASUHO', 0, 0, 'Pcs', 92400, 0),
('BR0000008', 'TUTUP BAWAH INJAKAN KAKI', 'SMASH/NEW', '-', 'YXSZD', 0, 0, 'Pcs', 39000, 0),
('BR0000009', 'TUTUP KLEP', 'JUP-MX/VG', '-', 'YXSZD', 0, 0, 'Pcs', 10000, 0),
('BR0000010', 'TUTUP RANTAI=STENKAS', 'F-1ZR/VEGA', 'HITAM', 'STRONG', 0, 0, 'Pcs', 15200, 0),
('BR0000011', 'TUTUP RANTAI=STENKAS', 'FIT-NEW', 'HITAM', 'STRONG', 0, 0, 'Pcs', 15200, 0),
('BR0000012', 'TUTUP RANTAI=STENKAS', 'JUP-MX', 'HITAM', 'STRONG', 0, 0, 'Pcs', 15200, 0),
('BR0000013', 'TUTUP SARINGAN OLI YXSZD', 'MIO-J', 'NETTO', 'YXSZD', 0, 0, 'Pcs', 5500, 0),
('BR0000014', 'VISOR', 'TIGER-REVO', 'NEW/NETTO', 'PLS', 0, 0, 'Pcs', 30000, 0),
('BR0000015', 'VISOR', 'BYSON', 'NETTO', 'PLS', 0, 0, 'Pcs', 30000, 0),
('BR0000016', 'VISOR', 'NINJA-RR', 'NETTE', 'PLS', 0, 0, 'Pcs', 30000, 0),
('BR0000017', 'VISOR', 'VIXION-NEW', '-', 'PLS', 0, 0, 'Pcs', 30000, 0),
('BR0000018', 'VISOR', 'VIXION-OLD', 'OLD/NETTO', 'PLS', 0, 0, 'Pcs', 30000, 0),
('BR0000019', 'TROMOL DEPAN DISC', 'FIT-NEW"06', 'SILVER', 'YASUHO', 0, 0, 'Pcs', 93000, 0),
('BR0000020', 'TROMOL BELAKANG', 'SUPRA', 'SILVER', 'YASUHO', 0, 0, 'Pcs', 12200, 0),
('BR0000021', 'TROMOL BELAKANG', 'SUPRA', '=GRAND', 'BUANA', 0, 0, 'Pcs', 12200, 0),
('BR0000022', 'TIANG REM TEBAL', 'F1ZR/GN5', '-', 'TXK', 0, 0, 'Pcs', 4800, 0),
('BR0000023', 'TIANG REM TEBAL', 'FIT-NEW', '-', 'YABAN', 0, 0, 'Pcs', 5000, 0),
('BR0000024', 'TIANG REM TEBAL', 'JUP-MX', '-', 'TXK', 0, 0, 'Pcs', 5000, 0),
('BR0000025', 'TIANG REM TEBAL', 'RX-KING', '=MX', 'OSK', 0, 0, 'Pcs', 5000, 0),
('BR0000026', 'TIANG REM TEBAL', 'RXK-NEW', '-', 'TXK', 0, 0, 'Pcs', 5000, 0),
('BR0000027', 'TIANG REM TEBAL', 'VEGA-ZR', '-', 'TXK', 0, 0, 'Pcs', 5000, 0),
('BR0000028', 'TIANG REM ', 'F1', '=C70MK3', 'OTANI', 0, 0, 'Pcs', 5500, 0),
('BR0000029', 'TIANG PANEL POSH [M]', 'UNIVERSAL', 'CAMPUR', 'MONSTER', 0, 0, 'Pcs', 10400, 0),
('BR0000030', 'TIANG PANEL POSH [XL]', 'UNIVERSAL', 'CAMPUR', 'MONSTER', 0, 0, 'Pcs', 10400, 0),
('BR0000031', 'TRIKEL MAGNET HQ', 'CRYPTON', '-', 'AJMP', 0, 0, 'Pcs', 72000, 0),
('BR0000032', 'TRIKEL MAGNET HQ', 'FORCE-1', '-', 'AJMP', 0, 0, 'Pcs', 72000, 0),
('BR0000033', 'TRIKEL MAGNET HQ', 'NINJA', '-', 'AJMP', 0, 0, 'Pcs', 72000, 0),
('BR0000034', 'TRIKEL MAGNET ', 'F1ZR', '-', 'KOMACHI', 0, 0, 'Pcs', 72000, 0),
('BR0000035', 'TABUNG SHOCK DEPAN ', 'FIT-NEW', '-', 'KINETIC', 0, 0, 'SET', 112000, 0),
('BR0000036', 'TABUNG SHOCK DEPAN ', 'JUP-MX', '-', 'JW', 0, 0, 'SET', 112000, 0),
('BR0000037', 'TABUNG SHOCK DEPAN ', 'FIT-NEW', '-', 'KINETIC', 0, 0, 'SET', 112000, 0),
('BR0000038', 'TABUNG SHOCK DEPAN ', 'JUP-Z', '-', 'KINETIC', 0, 0, 'SET', 112000, 0),
('BR0000039', 'TAHANAN TENSIONER ASSY', 'SAT-FU', '-', 'SR', 0, 0, 'Pcs', 38500, 0),
('BR0000040', 'TAHANAN TENSIONER ASSY', 'MIO/MX', '=MIO-J', 'MATRIX', 0, 0, 'SET', 38500, 0),
('BR0000041', 'TAHANAN TENSIONER ', 'BEAT', '=VARIO', 'MHM', 0, 0, 'SET', 27500, 0),
('BR0000042', 'TAHANAN TENSIONER ', 'KL-X', '-', 'MATRIX', 0, 0, 'SET', 27500, 0),
('BR0000043', 'TALI KIPAS=VANBELT A-CLASS', 'BEAT', '[Y]', 'WISH', 0, 0, 'Pcs', 54500, 0),
('BR0000044', 'TALI KIPAS=VANBELT A-CLASS', 'MIO [Y]', '18.5X842', 'WISH', 0, 0, 'Pcs', 5900, 0),
('BR0000045', 'TALI KIPAS=VANBELT A-CLASS', 'VARIO [Y]', '19.1X805', 'WISH', 0, 0, 'Pcs', 59000, 0),
('BR0000046', 'TALI KIPAS=VANBELT', 'VARIO ', '19.1X805', 'TAKEHO', 0, 0, 'Pcs', 46500, 0),
('BR0000047', 'TANGAN PISTON=CONROAD ', 'JUP-MX', '-', 'OHIO', 0, 0, 'SET', 90000, 0),
('BR0000048', 'TANGAN PISTON=CONROAD ', 'KPH-LONG', '=SUP-125', 'OHIO', 0, 0, 'SET', 90000, 0),
('BR0000049', 'TANGAN PISTON=CONROAD ', 'MIO/SOUL', '-', 'OHIO', 0, 0, 'SET', 90000, 0),
('BR0000050', 'TANGAN PISTON=CONROAD ', 'NEWTECH', '-', 'OHIO', 0, 0, 'SET', 10000, 0),
('BR0000051', 'TANGAN PISTON=CONROAD ', 'KARISMA', '=SUP-125', 'DAISHO', 0, 0, 'SET', 134000, 0),
('BR0000052', 'TEBENG DALAM R/L SET', 'FIT-NEW', 'HITAM', 'STRONG', 0, 0, 'SET', 78500, 0),
('BR0000053', 'TEBENG DALAM R/L SET', 'REVO/NEW', 'HITAM', 'STRONG', 0, 0, 'SET', 78500, 0),
('BR0000054', 'TEBENG DALAM SET R/L ', 'BLADE', 'HITAM', 'STRONG', 0, 0, 'SET', 70000, 0),
('BR0000055', 'TEBENG DALAM SET R/L ', 'JUP-MX', 'HITAM', 'STRONG', 0, 0, 'SET', 5060, 0),
('BR0000056', 'TEBENG DALAM SET R/L ', 'SUP-125', 'HITAM', 'STRONG', 0, 0, 'SET', 125000, 0),
('BR0000057', 'TEBENG DALAM SET R/L ', 'SUPRA/X', 'HITAM', 'STRONG', 0, 0, 'SET', 125000, 0),
('BR0000058', 'TEBENG DALAM SET', 'F-1ZR', 'HITAM', 'STRONG', 0, 0, 'SET', 125000, 0),
('BR0000059', 'TEBENG DALAM SET', 'SHGN-NEW', 'HITAM', 'STRONG', 0, 0, 'SET', 25000, 0),
('BR0000060', 'TEBENG LUAR SET R/L', 'FIT-NEW', 'HITAM', 'STRONG', 0, 0, 'SET', 152000, 0),
('BR0000061', 'TEBENG LUAR SET R/L', 'MX-NEW"11', 'HITAM', 'STRONG', 0, 0, 'SET', 152000, 0),
('BR0000062', 'TEBENG LUAR SET R/L', 'REVO/NEW', 'HITAM', 'STRONG', 0, 0, 'SET', 120000, 0),
('BR0000063', 'TEBENG LUAR SET R/L', 'SUP-125', 'HITAM', 'STRONG', 0, 0, 'SET', 155000, 0),
('BR0000064', 'TEBENG LUAR SET R/L', 'BLADE', 'HITAM', 'STRONG', 0, 0, 'SET', 155000, 0),
('BR0000065', 'SPACKBOARD DEPAN ', 'TRAIL-NEW', 'MERAH', 'PLS', 0, 0, 'Pcs', 25000, 0),
('BR0000066', 'SPACKBOARD DEPAN ', 'TRAIL-NEW', 'ORANGE', 'PLS', 0, 0, 'Pcs', 25000, 0),
('BR0000067', 'SPACKBOARD DEPAN ', 'TRAIL-NEW', 'PUTIH', 'PLS', 0, 0, 'Pcs', 25000, 0),
('BR0000068', 'SPACKBOARD DEPAN ', 'VARIO-TEC', 'HITAM', 'STRONG', 0, 0, 'Pcs', 80000, 0),
('BR0000069', 'SPACKBOARD DEPAN ', 'VIXION', 'HITAM', 'STRONG', 0, 0, 'Pcs', 80000, 0),
('BR0000070', 'SPACKBOARD DEPAN ', 'XEON', 'HITAM', 'STRONG', 0, 0, 'Pcs', 30000, 0),
('BR0000071', 'SPACKBOARD DEPAN + BRAKET', 'M-PRO NEW', 'HITAM 2010', 'AHM', 0, 0, 'Pcs', 60000, 0),
('BR0000072', 'SPACKBOARD DEPAN + BRAKET', 'WIN', 'HITAM ', 'STRONG', 0, 0, 'Pcs', 70000, 0),
('BR0000073', 'SPACKBOARD DEPAN + BRAKET', 'GL-PRO', 'HITAM ', 'STRONG', 0, 0, 'Pcs', 56000, 0),
('BR0000074', 'SPACKBOARD DEPAN + BRAKET', 'RXK-COBRA', 'HITAM ', 'STRONG', 0, 0, 'Pcs', 56000, 0),
('BR0000075', 'SPACKBOARD DEPAN +TTP GARPU', 'BLADE"2010', 'HITAM', 'STRONG', 0, 0, 'Pcs', 124650, 0),
('BR0000076', 'SPION KOTAK CROME', 'HONDA', '-', 'S1', 0, 0, 'Pcs', 11000, 0),
('BR0000077', 'SPION MINI SATRIA-F 150', 'YAMAHA', '-', 'RABBIT', 0, 17000, 'SET', 11000, 0),
('BR0000078', 'SPION MODEL 298-2', 'UNIVERSAL', '-', 'SEVEN', 0, 0, 'SET', 30000, 0),
('BR0000079', 'SPION MODEL SAT-F150', 'HONDA', 'TANGGUNG', 'RABBIT', 0, 0, 'SET', 19200, 0),
('BR0000080', 'SPION MODEL SAT-F150', 'YAMAHA', 'TANGGUNG', 'RABBIT', 0, 0, 'SET', 19200, 0),
('BR0000081', 'SPION MODEL SCOOPY', 'HONDA', 'TANGGUNG', 'MONSTER', 0, 0, 'SET', 26500, 0),
('BR0000082', 'SPION MODEL SCOOPY', 'YAMAHA', 'TANGGUNG', 'MONSTER', 0, 0, 'SET', 26500, 0),
('BR0000083', 'SPION NINJA 250 PMS', 'SUZUKI', '-', 'PMS', 0, 0, 'SET', 29000, 0),
('BR0000084', 'STABILISER RANTAI', 'VIXION', 'CAMPUR', 'MODISH', 0, 0, 'Pcs', 115000, 0),
('BR0000085', 'STANG STIR TEBAL ', 'MG-PRO-N', 'CROME', 'PLS', 0, 0, 'Pcs', 41200, 0),
('BR0000086', 'STANG STIR TEBAL ', 'MG-PRO-NEW', 'CROME', 'PLS', 0, 0, 'Pcs', 41200, 0),
('BR0000087', 'STANG STIR TEBAL ', 'SMASH-NEW', '-', 'HCM', 0, 0, 'Pcs', 85600, 0),
('BR0000088', 'STANG STIR TEBAL ', 'WUB', 'TINGGI', 'PLS', 0, 0, 'Pcs', 42500, 0),
('BR0000089', 'STARTER PINON ASSY WISH ', 'BEAT', 'VARIO[Y]', 'WISH', 0, 0, 'Pcs', 79500, 0),
('BR0000090', 'STATOR ASSY +PULSER', 'BEAT', 'NETTO', 'CCP', 0, 0, 'SET', 55000, 0),
('BR0000091', 'STATOR ASSY +PULSER', 'FIT-NEW', '-', 'MATRIX', 0, 0, 'SET', 90000, 0),
('BR0000092', 'STATOR ASSY +PULSER', 'FIT-NEW', 'REVO', 'STRONG', 0, 0, 'SET', 135000, 0),
('BR0000093', 'STATOR ASSY +PULSER', 'FIT-NEW', 'A-CLASS', 'YASASA', 0, 0, 'SET', 91000, 0),
('BR0000094', 'STATOR ASSY +PULSER', 'JUP-Z1', 'NETTO', 'CCP', 0, 0, 'SET', 60000, 0),
('BR0000095', 'STATOR ASSY +PULSER', 'MIO/NUOVO', 'NETTO', 'CCP', 0, 0, 'SET', 60000, 0),
('BR0000096', 'STATOR ASSY +PULSER', 'MIO-J', 'NETTO', 'CCP', 0, 0, 'SET', 60000, 0),
('BR0000097', 'STATOR ASSY +PULSER', 'SUP-125', '-', 'AJMP', 0, 0, 'SET', 109000, 0),
('BR0000098', 'STATOR ASSY +PULSER', 'VEGA-ZR', '-', 'AJMP', 0, 0, 'SET', 109000, 0),
('BR0000099', 'SWITCH REM DEPAN', 'SUPRA-X', '-', 'MITSUDA', 0, 0, 'Pcs', 6400, 0),
('BR0000100', 'SWITCH STARTER', 'JUP-Z', '-', 'OHIO', 0, 0, 'Pcs', 38400, 0),
('BR0000101', 'SWITCH STARTER', 'KARISMA', '-', 'STRIBG', 0, 0, 'Pcs', 41500, 0),
('BR0000102', 'SPACKBOARD BELAKANG', 'BEAT', 'HITAM', 'STRONG', 46000, 0, 'Pcs', 17, 0),
('BR0000103', 'SPACKBOARD BELAKANG', 'BEAT-F1', 'HITAM', 'STRONG', 46000, 0, 'Pcs', 4, 0),
('BR0000104', 'SPACKBOARD BELAKANG', 'BLADE', 'HITAM', 'STRONG', 46000, 0, 'Pcs', 5, 0),
('BR0000105', 'SPACKBOARD BELAKANG', 'F1ZR', 'HITAM', 'STRONG', 25000, 0, 'Pcs', 2, 0),
('BR0000106', 'SPACKBOARD BELAKANG', 'FIT-NEW', 'HITAM', 'STRONG', 48000, 0, 'Pcs', 0, 0),
('BR0000107', 'SPACKBOARD BELAKANG', 'GRAND', 'HITAM', 'STRONG', 42000, 0, 'Pcs', 4, 0),
('BR0000108', 'SPACKBOARD BELAKANG', 'KHARISMA', 'HITAM', 'STRONG', 46200, 0, 'Pcs', 10, 0),
('BR0000109', 'SPACKBOARD BELAKANG', 'KLX', 'HIJAU', 'PLS', 21000, 0, 'Pcs', 15, 0),
('BR0000110', 'SPACKBOARD BELAKANG', 'KLX', 'PUTIH', 'HD', 21000, 0, 'Pcs', 10, 0),
('BR0000111', 'SPACKBOARD BELAKANG', 'TRAIL-NEW', 'BIRU', 'PLS', 25000, 0, 'Pcs', 5, 0),
('BR0000112', 'SPACKBOARD BELAKANG', 'TRAIL-NEW', 'HIJAU', 'PLS', 25000, 0, 'Pcs', 1, 0),
('BR0000113', 'SPACKBOARD BELAKANG', 'TRAIL-NEW', 'HITAM', 'PLS', 0, 0, 'Pcs', 25000, 0),
('BR0000114', 'SPACKBOARD BELAKANG', 'TRAIL-NEW', 'KUNING', 'PLS', 0, 0, 'Pcs', 25000, 0),
('BR0000115', 'SPACKBOARD BELAKANG', 'TRAIL-NEW', 'MERAH', 'PLS', 0, 0, 'Pcs', 25000, 0),
('BR0000116', 'SPACKBOARD BELAKANG', 'TRAIL-NEW', 'ORANGE', 'PLS', 0, 0, 'Pcs', 25000, 0),
('BR0000117', 'SPACKBOARD BELAKANG', 'TRAIL-NEW', 'PUTIH', 'PLS', 0, 0, 'Pcs', 25000, 0),
('BR0000118', 'SPACKBOARD BELAKANG', 'VEGA-NEW', 'HITAM', 'STRONG', 0, 0, 'Pcs', 40200, 0),
('BR0000119', 'SPACKBOARD BELAKANG', 'REVO/NEW', 'HITAM', 'STRONG', 0, 0, 'Pcs', 44600, 0),
('BR0000120', 'SPACKBOARD BELAKANG', 'REVO-ABS', 'HITAM', 'STRONG', 0, 0, 'Pcs', 55000, 0),
('BR0000121', 'SPACKBOARD BELAKANG', 'SUPRA', 'HITAM', 'STRONG', 0, 0, 'Pcs', 30500, 0);

-- --------------------------------------------------------

--
-- Table structure for table `pembelian_brg`
--

CREATE TABLE IF NOT EXISTS `pembelian_brg` (
  `id_transaksi` varchar(20) NOT NULL,
  `id_supplier` varchar(15) NOT NULL,
  `tgl_pembelian` date NOT NULL,
  `username` varchar(30) NOT NULL,
  `grand_total` double NOT NULL,
  `lunas` varchar(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian_brg`
--

INSERT INTO `pembelian_brg` (`id_transaksi`, `id_supplier`, `tgl_pembelian`, `username`, `grand_total`, `lunas`) VALUES
('ACR-1009090', 'SPL00002', '2018-02-16', '1', 120000, 'yes'),
('MR-19005', 'SPL00003', '2018-02-21', '1', 60000, 'yes'),
('N-345312', 'SPL00003', '2018-02-14', '1', 0, 'no'),
('M109898', 'SPL00004', '2018-02-22', '1', 0, 'no'),
('0101010', 'SPL00002', '2018-02-08', '1', 0, 'no'),
('222', 'SPL00003', '2018-02-02', '1', 0, 'no'),
('sadasdasd', 'SPL00003', '2018-02-27', '1', 0, 'no'),
('0100', 'SPL00002', '2018-02-27', '1', 48000, 'yes'),
('020', 'SPL00005', '2018-02-27', '1', 180000, 'yes'),
('011', 'SPL00003', '2018-02-22', '1', 0, 'no'),
('sffdsdfdsf', 'SPL00004', '2018-03-07', '1', 30000, 'yes'),
('hghfhfhgfgh', 'SPL00002', '2018-03-16', '1', 0, 'no'),
('dsfsdfsdf', 'SPL00005', '2018-03-17', '1', 0, 'no'),
('gfdgfdg', 'SPL00004', '2018-03-09', '1', 0, 'no'),
('dfsdfsdf', 'SPL00003', '2018-03-17', '1', 0, 'no'),
('123131', 'SPL00002', '2018-03-08', '1', 0, 'no'),
('kkkk', 'SPL00005', '2018-03-08', '1', 0, 'no');

-- --------------------------------------------------------

--
-- Table structure for table `retur`
--

CREATE TABLE IF NOT EXISTS `retur` (
  `id_retur` varchar(20) NOT NULL,
  `id_transaksi` varchar(20) NOT NULL,
  `tgl_retur` date NOT NULL,
  `id_toko` varchar(11) NOT NULL,
  `id_karyawan` varchar(20) NOT NULL,
  `grand_total` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `retur`
--

INSERT INTO `retur` (`id_retur`, `id_transaksi`, `tgl_retur`, `id_toko`, `id_karyawan`, `grand_total`) VALUES
('INVR2018010000001', 'INV2018010000001', '2018-01-15', 'TK00005', '1', 30000),
('INVR2018010000002', 'INV2018010000001', '2018-01-15', 'TK00005', '1', 180000),
('INVR2018010000003', 'INV2018010000001', '2018-01-15', 'TK00005', '1', 30000);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE IF NOT EXISTS `supplier` (
  `id_supplier` varchar(15) NOT NULL,
  `nama_supplier` varchar(50) NOT NULL,
  `alamat_supplier` text NOT NULL,
  `telp_supplier` varchar(15) NOT NULL,
  `email_supplier` varchar(50) NOT NULL,
  `del` tinyint(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `nama_supplier`, `alamat_supplier`, `telp_supplier`, `email_supplier`, `del`) VALUES
('SPL00001', 'CV. Maju Terus', 'Jl. Kom Yos Sudarso', '081345555678', 'fb@email.com', 1),
('SPL00002', 'PT. Mandiri', 'Jl. Tanjung Pura', '0561778899', 'mandiri@email.com', 0),
('SPL00003', 'CV. Perkasa', 'Jl. Gajah Mada No. 3', '0561887799', '', 0),
('SPL00004', 'CV. Sahabat', 'Jakarta', '083456781212', 'fb@sahabat.com', 0),
('SPL00005', 'PT. Dian', 'Jakarta', '087656567845', 'dian@email.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `toko`
--

CREATE TABLE IF NOT EXISTS `toko` (
  `id_toko` varchar(11) NOT NULL,
  `nama_toko` varchar(30) NOT NULL,
  `alamat_toko` text NOT NULL,
  `telp_toko` varchar(14) NOT NULL,
  `del` tinyint(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `toko`
--

INSERT INTO `toko` (`id_toko`, `nama_toko`, `alamat_toko`, `telp_toko`, `del`) VALUES
('TK00001', 'Bengkel Athat', 'Jl. Kom Yos Sudarso', '0561778899', 0),
('TK00002', 'Bengkel Akong', 'Jl. Kom Yos Sudarso 1', '082240483022', 0),
('TK00003', 'Bengkel Surya', 'JL Juanda', '0561334455', 0),
('TK00004', 'Bengkel Acoi', 'Jl. MarthaDinata', '081245555235', 1),
('TK00005', 'Bengkel Marvin', 'Jl. Sehat', '082250403020', 0),
('TK00006', 'Bengkel Maju Terus', 'Jl. Sui. Raya Dalam gg. Ceria 7', '0561344355', 0),
('TK00007', 'Bengkel Mail', 'Jl. Adi Sucipto', '081345555244', 0),
('TK00008', 'Bengkel Saep', 'Jl.Tebu No.15', '082250889922', 0),
('TK00010', 'Bengkel Riko', 'Jl Sui. Raya Dalam No 889', '08134424567', 0),
('TK00011', 'Bengkel Jhoin', 'Jl. Adi Sucipto No. 888', '0561792367', 0),
('TK00012', 'Bengkel Jamal', 'Jl.GajahMada No.789', '0561788997', 0),
('TK00013', 'Bengkel Siapa Saja', 'Jl. Apa Saja No. 00', '082250673120', 0);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE IF NOT EXISTS `transaksi` (
  `id_transaksi` varchar(20) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `id_toko` varchar(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `grand_total` double NOT NULL,
  `sisa_hutang` double NOT NULL,
  `tgl_tagihan` date NOT NULL,
  `nama_toko_hantaran` varchar(50) NOT NULL,
  `alamat_toko_hantaran` text NOT NULL,
  `status` varchar(30) NOT NULL,
  `lunas` varchar(4) NOT NULL,
  PRIMARY KEY (`id_transaksi`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `tgl_transaksi`, `id_toko`, `username`, `grand_total`, `sisa_hutang`, `tgl_tagihan`, `nama_toko_hantaran`, `alamat_toko_hantaran`, `status`, `lunas`) VALUES
('INV2018010000001', '2018-01-08', 'TK00005', '1', 240000, 0, '2018-02-07', '', '', '', 'yes'),
('INV2018010000002', '2018-01-08', 'TK00003', '1', 0, 0, '2018-02-07', '', '', '', ''),
('INV2018010000003', '2018-01-08', 'TK00001', '1', 0, 0, '2018-02-07', '', '', '', ''),
('INV2018010000004', '2018-01-08', 'TK00001', '1', 240000, 0, '2018-02-07', '', '', '', 'yes'),
('INV2018010000005', '2018-01-08', 'TK00001', '1', 0, 0, '2018-02-07', '', '', '', ''),
('INV2018010000006', '2018-01-08', 'TK00003', '1', 0, 0, '2018-02-07', '', '', '', ''),
('INV2018010000007', '2018-01-08', 'TK00002', '1', 0, 0, '2018-02-07', '', '', '', ''),
('INV2018010000008', '2018-01-08', 'TK00002', '1', 180000, 0, '2018-02-07', '', '', '', 'yes'),
('INV2018010000009', '2018-01-08', 'TK00005', '1', 30000, 0, '2018-02-07', '', '', '', 'yes'),
('INV2018010000010', '2018-01-08', 'TK00002', '1', 30000, 0, '2018-02-07', '', '', '', 'yes'),
('INV2018010000011', '2018-01-08', 'TK00003', '1', 60000, 0, '2018-02-07', '', '', 'shipped', 'yes'),
('INV2018010000012', '2018-01-08', 'TK00002', '1', 210000, 0, '2018-02-07', '', '', 'shipped', 'yes'),
('INV2018010000013', '2018-01-08', 'TK00002', '1', 30000, 0, '2018-02-07', '', '', 'shipped', 'yes'),
('INV2018010000014', '2018-01-09', 'TK00006', '1', 60000, 0, '2018-02-08', '', '', 'shipped', 'yes'),
('INV2018010000015', '2018-01-09', 'TK00003', '1', 180000, 0, '2018-02-08', '', '', 'shipped', 'yes'),
('INV2018010000016', '2018-01-09', 'TK00001', '1', 35000, 0, '2018-02-08', '', '', 'shipped', 'yes'),
('INV2018010000017', '2018-01-09', 'TK00001', '1', 0, 0, '2018-02-08', '', '', '', ''),
('INV2018010000018', '2018-01-09', 'TK00001', '1', 0, 0, '2018-02-08', '', '', '', ''),
('INV2018010000019', '2018-01-09', 'TK00001', '1', 0, 0, '2018-02-08', '', '', '', ''),
('INV2018010000020', '2018-01-12', 'TK00001', '1', 0, 0, '2018-02-11', '', '', '', ''),
('INV2018010000021', '2018-01-13', 'TK00006', '1', 0, 0, '2018-02-12', '', '', '', ''),
('INV2018010000022', '2018-01-13', 'TK00003', '1', 35000, 0, '2018-02-12', '', '', '', 'yes'),
('INV2018010000023', '2018-01-13', 'TK00002', '1', 0, 0, '2018-02-12', '', '', '', ''),
('INV2018010000024', '2018-01-13', 'TK00002', '1', 0, 0, '2018-02-12', '', '', '', ''),
('INV2018010000025', '2018-01-13', 'TK00001', '1', 755000, 0, '2018-02-12', 'Bengkel Afui', 'J;. Majapahit 4 No 112', '', 'yes'),
('INV2018010000026', '2018-01-13', 'TK00002', '1', 0, 0, '2018-02-12', '', '', '', ''),
('INV2018010000027', '2018-01-13', 'TK00002', '1', 0, 0, '2018-02-12', '', '', '', ''),
('INV2018010000028', '2018-01-14', 'TK00002', '1', 0, 0, '2018-02-13', '', '', '', ''),
('INV2018010000029', '2018-01-16', 'TK00001', '1', 230000, 0, '2018-02-15', '', '', 'ordered', 'yes'),
('INV2018010000030', '2018-01-16', 'TK00001', '1', 0, 0, '2018-02-15', '', '', '', ''),
('INV2018010000031', '2018-01-16', 'TK00001', '1', 0, 0, '2018-02-15', '', '', '', ''),
('INV2018010000032', '2018-01-16', 'TK00008', '1', 0, 0, '2018-02-15', '', '', '', ''),
('INV2018010000033', '2018-01-16', 'TK00001', '1', 0, 0, '2018-02-15', '', '', '', ''),
('INV2018010000034', '2018-01-16', 'TK00002', '1', 0, 0, '2018-02-15', '', '', '', ''),
('INV2018010000035', '2018-01-16', 'TK00003', '1', 0, 0, '2018-02-15', '', '', '', ''),
('INV2018010000036', '2018-01-16', 'TK00002', '1', 0, 0, '2018-02-15', '', '', '', ''),
('INV2018010000037', '2018-01-16', 'TK00001', '1', 0, 0, '2018-02-15', '', '', '', ''),
('INV2018010000038', '2018-01-16', 'TK00001', '1', 0, 0, '2018-02-15', '', '', '', ''),
('INV2018010000039', '2018-01-16', 'TK00002', '1', 0, 0, '2018-02-15', '', '', '', ''),
('INV2018010000040', '2018-01-16', 'TK00010', '1', 0, 0, '2018-02-15', '', '', '', ''),
('INV2018010000041', '2018-01-16', 'TK00005', '1', 0, 0, '2018-02-15', '', '', '', ''),
('INV2018010000042', '2018-01-16', 'TK00010', '1', 0, 0, '2018-02-15', '', '', '', ''),
('INV2018010000043', '2018-01-16', 'TK00011', '1', 0, 0, '2018-02-15', '', '', '', ''),
('INV2018010000044', '2018-01-16', 'TK00007', '1', 0, 0, '2018-02-15', '', '', '', ''),
('INV2018010000045', '2018-01-16', 'TK00003', '1', 0, 0, '2018-02-15', '', '', '', ''),
('INV2018010000046', '2018-01-16', 'TK00006', '1', 0, 0, '2018-02-15', '', '', '', ''),
('INV2018010000047', '2018-01-16', 'TK00011', '1', 0, 0, '2018-02-15', '', '', '', ''),
('INV2018010000048', '2018-01-16', 'TK00005', '1', 92000, 0, '2018-02-15', '', '', 'ordered', ''),
('INV2018010000049', '2018-01-16', 'TK00010', '1', 81000, 31000, '2018-02-15', 'undefined', 'undefined', 'ordered', ''),
('INV2018010000050', '2018-01-16', 'TK00010', '1', 0, 0, '2018-02-15', '', '', '', ''),
('INV2018010000051', '2018-01-16', 'TK00012', '1', 126000, 126000, '2018-02-15', 'undefined', 'undefined', 'ordered', ''),
('INV2018010000052', '2018-01-17', 'TK00007', '1', 108000, 0, '2018-02-16', 'undefined', 'undefined', 'ordered', 'yes'),
('INV2018010000053', '2018-01-17', 'TK00006', '1', 230000, 200000, '2018-02-16', 'undefined', 'undefined', 'ordered', ''),
('INV2018010000054', '2018-01-18', 'TK00001', '1', 60000, 0, '2018-02-17', 'undefined', 'undefined', 'ordered', ''),
('INV2018010000055', '2018-01-18', 'TK00001', '1', 46000, 46000, '2018-02-17', 'undefined', 'undefined', 'ordered', ''),
('INV2018010000056', '2018-01-18', 'TK00003', '1', 35000, 35000, '2018-02-17', 'undefined', 'undefined', 'ordered', ''),
('INV2018010000057', '2018-01-18', 'TK00012', '1', 35000, 35000, '2018-02-17', 'undefined', 'undefined', 'ordered', ''),
('INV2018010000058', '2018-01-18', 'TK00011', '1', 30000, 30000, '2018-02-17', 'undefined', 'undefined', 'ordered', ''),
('INV2018010000059', '2018-01-18', 'TK00010', '1', 42000, 42000, '2018-02-17', '', '', 'shipped', ''),
('INV2018020000060', '2018-02-23', 'TK00001', '1', 36000, 0, '2018-03-25', '', '', 'shipped', ''),
('INV2018020000061', '2018-02-24', 'TK00001', '1', 70000, 0, '2018-03-26', '', '', 'shipped', ''),
('INV2018020000062', '2018-02-24', 'TK00001', '1', 498000, 398000, '2018-03-26', 'bengkel kurnia', 'Jl. Marta dinata no 67', 'ordered', ''),
('INV2018020000063', '2018-02-24', 'TK00003', '1', 0, 0, '2018-03-26', '', '', '', ''),
('INV2018020000064', '2018-02-24', 'TK00010', '1', 0, 0, '2018-03-26', '', '', '', ''),
('INV2018020000065', '2018-02-24', 'TK00008', '1', 0, 0, '2018-03-26', '', '', '', ''),
('INV2018020000066', '2018-02-25', 'TK00001', '1', 350000, 350000, '2018-03-27', '', '', 'ordered', ''),
('INV2018020000067', '2018-02-26', 'TK00002', '1', 0, 0, '2018-03-28', '', '', '', ''),
('INV2018020000068', '2018-02-26', 'TK00008', '1', 46000, 46000, '2018-03-28', '', '', 'shipped', ''),
('INV2018020000069', '2018-02-26', 'TK00001', '1', 240000, 190000, '2018-03-28', '', '', 'shipped', ''),
('INV2018020000070', '2018-02-26', 'TK00002', '1', 30000, 26000, '2018-03-28', '', '', 'shipped', ''),
('INV2018020000071', '2018-02-26', 'TK00003', '1', 30000, 0, '2018-03-28', '', '', 'ordered', ''),
('INV2018020000072', '2018-02-27', 'TK00006', '1', 0, 0, '2018-03-29', '', '', '', ''),
('INV2018020000073', '2018-02-27', 'TK00012', '1', 3550000, 2550000, '2018-03-29', '', '', 'ordered', ''),
('INV2018020000074', '2018-02-28', 'TK00001', 'KRY0000003', 35000, 0, '2018-03-30', '', '', 'ordered', ''),
('INV2018020000075', '2018-02-28', 'TK00002', 'KRY0000006', 30000, 30000, '2018-03-30', '', '', 'ordered', ''),
('INV2018020000076', '2018-02-28', 'TK00001', 'MyJack13', 180000, 180000, '2018-03-30', '', '', 'ordered', ''),
('INV2018030000077', '2018-03-04', 'TK00001', 'Marvin97', 0, 0, '2018-04-03', '', '', '', ''),
('INV2018030000078', '2018-03-06', 'TK00001', 'MyJack13', 0, 0, '2018-04-05', '', '', '', ''),
('INV2018030000079', '2018-03-06', 'TK00001', 'MyJack13', 0, 0, '2018-04-05', '', '', '', ''),
('INV2018030000080', '2018-03-13', 'TK00003', 'hans12', 0, 0, '2018-04-12', '', '', '', ''),
('INV2018030000081', '2018-03-13', 'TK00001', 'rico', 0, 0, '2018-04-12', '', '', '', ''),
('INV2018030000082', '2018-03-13', 'TK00001', 'rico', 25000, 25000, '2018-04-12', '', '', 'shipped', ''),
('INV2018030000083', '2018-03-13', 'TK00002', 'MyJack13', 0, 0, '2018-04-12', '', '', '', ''),
('INV2018030000084', '2018-03-15', 'TK00001', 'MyJack13', 30000, 30000, '2018-04-14', '', '', 'ordered', ''),
('INV2018030000085', '2018-03-16', 'TK00012', 'MyJack13', 84000, 0, '2018-04-15', '', '', 'shipped', ''),
('INV2018030000086', '2018-03-16', 'TK00003', 'MyJack13', 0, 0, '2018-04-15', '', '', '', ''),
('INV2018030000087', '2018-03-16', 'TK00002', 'MyJack13', 0, 0, '2018-04-15', '', '', '', ''),
('INV2018030000088', '2018-03-16', 'TK00011', 'MyJack13', 0, 0, '2018-04-15', '', '', '', ''),
('INV2018030000089', '2018-03-16', 'TK00001', 'MyJack13', 0, 0, '2018-04-15', '', '', '', ''),
('INV2018030000090', '2018-03-16', 'TK00001', 'MyJack13', 0, 0, '2018-04-15', '', '', '', ''),
('INV2018030000091', '2018-03-16', 'TK00005', 'MyJack13', 0, 0, '2018-04-15', '', '', '', ''),
('INV2018030000092', '2018-03-16', 'TK00001', 'MyJack13', 0, 0, '2018-04-15', '', '', '', ''),
('INV2018030000093', '2018-03-16', 'TK00001', 'MyJack13', 0, 0, '2018-04-15', '', '', '', ''),
('INV2018030000094', '2018-03-16', 'TK00001', 'MyJack13', 0, 0, '2018-04-15', '', '', '', ''),
('INV2018030000095', '2018-03-16', 'TK00010', 'MyJack13', 25000, 5000, '2018-04-15', '', '', 'ordered', ''),
('INV2018030000096', '2018-03-16', 'TK00007', 'hans12', 81000, 0, '2018-04-15', '', '', 'ordered', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_karyawan` varchar(20) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` int(2) NOT NULL,
  `del` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_karyawan`, `username`, `password`, `level`, `del`) VALUES
('KRY0000003', 'hans12', '123456', 2, 0),
('KRY0000002', 'bubud122', '12345', 3, 0),
('KRY0000005', 'Marvin97', '123456', 2, 0),
('KRY0000006', 'MyJack13', 'ambrosius13', 2, 0),
('KRY0000001', 'dwiki13', '1234567', 1, 0),
('KRY0000008', 'ciaaa13', '123456', 1, 0),
('KRY0000004', 'anjayboss', '123456', 3, 0),
('KRY0000009', 'admin', 'admin', 1, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
