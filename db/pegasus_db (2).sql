-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 10, 2018 at 08:40 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pegasus_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `kd_admin` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`kd_admin`, `username`, `password`) VALUES
(6, 'admin', 'admin'),
(7, 'putri', 'admin123'),
(8, 'shidqy', 'kocak123');

-- --------------------------------------------------------

--
-- Table structure for table `armada`
--

CREATE TABLE `armada` (
  `kd_armada` varchar(20) NOT NULL,
  `nm_armada` varchar(50) NOT NULL,
  `no_mobil` varchar(50) NOT NULL,
  `gambar` varchar(200) NOT NULL,
  `kd_driver` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `armada`
--

INSERT INTO `armada` (`kd_armada`, `nm_armada`, `no_mobil`, `gambar`, `kd_driver`) VALUES
('AR001', 'Container', 'B 9786 TEH', 'a1.jpg', 'DR001'),
('AR002', 'Container', 'B 9080 JM', 'a2.jpg', 'DR002'),
('AR003', 'Container', 'B 9136 LL', 'a3.jpg', 'DR003'),
('AR004', 'Container', 'B 9587 QZ', 'a4.jpg', 'DR004'),
('AR005', 'Truk', 'B9187 UEA', 'a5.jpg', 'DR005'),
('AR006', 'Pesawat', '', 'image_6.jpg', ''),
('AR007', 'Pesawat', 'YT 1846 AH', 'image_5.jpg', 'DR003'),
('AR008', 'Kapal Laut', 'B 1481 RA', 'image_6.jpg', 'DR004');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `kd_customer` varchar(50) NOT NULL,
  `nm_perusahaan` varchar(100) NOT NULL,
  `nm_member` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_hp` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`kd_customer`, `nm_perusahaan`, `nm_member`, `email`, `no_hp`) VALUES
('CS001', 'PT. Banyu Sekarlaras Logistik', 'Herman', 'selametb@gmail.com', '081269598073'),
('CS002', 'PT. Wijaya Karya', 'Ronald Mangasih', 'ronald.m@wika.co.id', '081378333733'),
('CS003', 'PT Cipta Daya Bersama', 'Nauval S', 'nauvalholic@gmail.com', '087875789220'),
('CS004', 'PT AAA AAA', 'AAA', 'aaa@aaa.com', '087875789220'),
('CS005', 'PT BBB BBB', 'BBB BBB', 'bbb@bbb.com', '0846717641'),
('CS006', 'PT Tera Nova', 'Nova', 'nova@tera.com', '086451236');

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `kd_driver` varchar(50) NOT NULL,
  `nm_lengkap` text NOT NULL,
  `no_hp` varchar(12) NOT NULL,
  `alamat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`kd_driver`, `nm_lengkap`, `no_hp`, `alamat`) VALUES
('DR001', 'Ahmad Wahyudi', '082123043600', 'Sribhawono RT 42/21 Bandar Sribhawono Lampung Timur'),
('DR002', 'Basuki', '082175938219', 'Desa Candimas RT 004/005 Kec. Natar Lamsel'),
('DR003', 'Angga Afrian', '081366101790', 'Mulyojati RT 09/03 Metro Barat Kota Metro'),
('DR004', 'Joni Handoko', '081296355545', 'Jl. Anggrek RT 24/02 Metro Pusat Kota Metro'),
('DR005', 'Rudi Hartono', '082112202299', 'Jl. KH Agus Anang LK.I KEl. Ketapang Bandar Lampung'),
('DR006', 'Luffy A', '0878976431', 'Jalan Greenland'),
('DR007', 'Franky', '08745164164', 'Jalan Harapan Jaya No.9 Jakarta Pusat'),
('DR008', 'Udin Penyok', '0898741353', 'Jalan Kapuk Muara Angke No.50c'),
('DR009', 'Orchard Mine', '0864136454', 'Jalan Lounsdile Villain No.100');

-- --------------------------------------------------------

--
-- Table structure for table `harga`
--

CREATE TABLE `harga` (
  `kd_harga` varchar(50) NOT NULL,
  `wilayah` text NOT NULL,
  `biaya_kirim` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `harga`
--

INSERT INTO `harga` (`kd_harga`, `wilayah`, `biaya_kirim`) VALUES
('HR001', 'papua-bali', 86491345),
('HR002', 'jawa-muara enim', 25000000),
('HR003', 'jawa-palembang', 20000000),
('HR004', 'jawa-medan', 30000000),
('HR005', 'jawa-tanjung enim', 27000000),
('HR006', 'jawa-labuhan lomb', 30000000),
('HR007', 'kalimantan-jawa', 350000);

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id_invoice` varchar(100) NOT NULL,
  `id_pengiriman` varchar(100) NOT NULL,
  `pph` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id_invoice`, `id_pengiriman`, `pph`) VALUES
('inv001', 'g4560', 10);

-- --------------------------------------------------------

--
-- Table structure for table `pengiriman`
--

CREATE TABLE `pengiriman` (
  `kd_pengiriman` varchar(100) NOT NULL,
  `description` varchar(300) NOT NULL,
  `satuan` varchar(40) NOT NULL,
  `kd_armada` varchar(20) NOT NULL,
  `kd_driver` varchar(50) NOT NULL,
  `kd_customer` varchar(50) DEFAULT NULL,
  `nm_penerima` varchar(80) NOT NULL,
  `uang_supir` int(200) NOT NULL,
  `total_bayar` int(200) NOT NULL,
  `status` varchar(20) NOT NULL,
  `packinglist` varchar(200) NOT NULL,
  `kd_harga` varchar(50) NOT NULL,
  `dp` varchar(200) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengiriman`
--

INSERT INTO `pengiriman` (`kd_pengiriman`, `description`, `satuan`, `kd_armada`, `kd_driver`, `kd_customer`, `nm_penerima`, `uang_supir`, `total_bayar`, `status`, `packinglist`, `kd_harga`, `dp`) VALUES
('001/PGS/VIIII/2018', 'Pengiriman Material Pipa Dia 824 P6 M', 'MT', 'AR005', 'DR001', 'CS001', 'Samuel', 10000000, 35000000, 'proses', '', 'HR002', '10000000'),
('002/PGS/VII/2018', 'Pengiriman Barang Pipa Fender Dia 8 inch & Aksesoris', 'LS', 'AR004', 'DR005', 'CS002', 'Samuel', 10000000, 35000000, 'proses', '', 'HR002', '0'),
('003/PGS/V/2018', 'Pengiriman Barang Limestone', 'LS', 'AR001', 'DR002', 'CS001', 'Daniel', 15000000, 35000000, 'proses', '', 'HR003', '0'),
('004/PGS/VII/2018', 'Pengiriman Barang PIPA ', 'MM', 'AR002', 'DR002', 'CS001', 'Daniel', 15000000, 35000000, 'lunas', '', 'HR003', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`kd_admin`);

--
-- Indexes for table `armada`
--
ALTER TABLE `armada`
  ADD PRIMARY KEY (`kd_armada`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`kd_customer`);

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`kd_driver`);

--
-- Indexes for table `harga`
--
ALTER TABLE `harga`
  ADD PRIMARY KEY (`kd_harga`);

--
-- Indexes for table `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD PRIMARY KEY (`kd_pengiriman`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `kd_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
