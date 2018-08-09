-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2018 at 01:48 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
(6, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `armada`
--

CREATE TABLE `armada` (
  `id_armada` varchar(20) NOT NULL,
  `nm_armada` varchar(50) NOT NULL,
  `no_mobil` varchar(50) NOT NULL,
  `gambar` varchar(200) NOT NULL,
  `id_driver` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `armada`
--

INSERT INTO `armada` (`id_armada`, `nm_armada`, `no_mobil`, `gambar`, `id_driver`) VALUES
('AR01', 'Container', 'B 9786 TEH', 'a1.jpg', 'dr01'),
('AR02', 'Container', 'B 9080 JM', 'a2.jpg', 'dr02'),
('AR03', 'Container', 'B 9136 LL', 'a3.jpg', 'dr03'),
('AR04', 'Container', 'B 9587 QZ', 'a4.jpg', 'dr04'),
('AR05', 'Truk', 'B9187 UEA', 'a5.jpg', 'dr05');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `kd_custumer` varchar(50) NOT NULL,
  `nm_perusahaan` varchar(100) NOT NULL,
  `nm_member` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_hp` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`kd_custumer`, `nm_perusahaan`, `nm_member`, `email`, `no_hp`) VALUES
('CS01', 'PT. Banyu Sekarlaras Logistik', 'Herman', 'selametb@gmail.com', '081269598073'),
('CS02', 'PT. Wijaya Karya', 'Ronald Mangasih', 'ronald.m@wika.co.id', '081378333733');

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `id_driver` varchar(50) NOT NULL,
  `nm_lengkap` text NOT NULL,
  `no_hp` varchar(12) NOT NULL,
  `alamat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`id_driver`, `nm_lengkap`, `no_hp`, `alamat`) VALUES
('dr01', 'Ahmad Wahyudi', '082123043600', 'Sribhawono RT 42/21 Bandar Sribhawono Lampung Timur'),
('dr02', 'BAsuki', '082175938219', 'Desa Candimas RT 004/005 Kec. Natar Lamsel'),
('dr03', 'Angga Afrian', '081366101790', 'Mulyojati RT 09/03 Metro Barat Kota Metro'),
('dr04', 'Joni Handoko', '081296355545', 'Jl. Anggrek RT 24/02 Metro Pusat Kota Metro'),
('dr05', 'Rudi Hartono', '082112202299', 'Jl. KH Agus Anang LK.I KEl. Ketapang Bandar Lampung');

-- --------------------------------------------------------

--
-- Table structure for table `harga`
--

CREATE TABLE `harga` (
  `kd_wil` varchar(50) NOT NULL,
  `wilayah` text NOT NULL,
  `biaya_kirim` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `harga`
--

INSERT INTO `harga` (`kd_wil`, `wilayah`, `biaya_kirim`) VALUES
('hr01', 'jawa', 8000000),
('hr02', 'jawa-muara enim', 25000000),
('hr03', 'jawa-palembang', 20000000),
('hr04', 'jawa-medan', 30000000),
('hr05', 'jawa-tanjung enim', 27000000),
('hr06', 'jawa-labuhan lomb', 30000000);

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
  `no_invoive` varchar(100) NOT NULL,
  `Description` varchar(300) NOT NULL,
  `satuan` varchar(40) NOT NULL,
  `id_armada` varchar(20) NOT NULL,
  `id_driver` varchar(50) NOT NULL,
  `kd_custumer` varchar(50) DEFAULT NULL,
  `nm_penerima` varchar(80) NOT NULL,
  `uang_supir` int(200) NOT NULL,
  `total_bayar` int(200) NOT NULL,
  `status` varchar(20) NOT NULL,
  `packinglist` varchar(200) NOT NULL,
  `id_harga` varchar(50) NOT NULL,
  `dp` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengiriman`
--

INSERT INTO `pengiriman` (`no_invoive`, `Description`, `satuan`, `id_armada`, `id_driver`, `kd_custumer`, `nm_penerima`, `uang_supir`, `total_bayar`, `status`, `packinglist`, `id_harga`, `dp`) VALUES
('001/PGS/VIIII/2018', 'Pengiriman Material Pipa Dia 824 P6 M', 'MT', 'AR05', 'dr001', 'CS01', 'Samuel', 10000000, 35000000, 'proses', '', 'hr02', '10000000'),
('002/PGS/VII/2018', 'Pengiriman Barang Pipa Fender Dia 8 inch & Aksesoris', 'LS', 'AR04', 'dr05', 'CS02', 'Samuel', 10000000, 35000000, 'proses', '', 'hr02', ''),
('003/PGS/V/2018', 'Pengiriman Barang Limestone', 'LS', 'AR004', 'dr02', 'CS01', 'Daniel', 15000000, 35000000, 'proses', '', 'hr03', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`kd_admin`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`kd_custumer`);

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`id_driver`);

--
-- Indexes for table `harga`
--
ALTER TABLE `harga`
  ADD PRIMARY KEY (`kd_wil`);

--
-- Indexes for table `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD PRIMARY KEY (`no_invoive`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `kd_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
