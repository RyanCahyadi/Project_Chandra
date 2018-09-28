-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 17, 2018 at 02:22 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 5.6.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_chandra`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_karyawan`
--

CREATE TABLE `tbl_karyawan` (
  `id` int(11) NOT NULL,
  `nik` varchar(15) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `jenis_kelamin` enum('Pria','Wanita') NOT NULL,
  `alamat` text NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_karyawan`
--

INSERT INTO `tbl_karyawan` (`id`, `nik`, `nama`, `no_telp`, `jenis_kelamin`, `alamat`, `username`, `password`) VALUES
(10, '12345678900', 'Rian Cahyadi', '087881117430', 'Pria', 'Jl. Babakan Sari I', 'rian', '4116e0e25dcad2dd4b202b3eaf2b4f1ae6497e25'),
(11, '12345678901', 'Chandra Wibawa', '08781117401', 'Pria', 'Jl. Cikutra', 'chandra', '83887bb2d75a1e112132ca1e7e0326d8838ddc50'),
(12, '12345678902', 'Bayu Setiadji', '087881117402', 'Pria', 'Jl. Gugunungan', 'bayu', '37974419a792b5e2d44822522806bc70e45d7c1a'),
(13, '12345678903', 'Denis Maulana', '087881117403', 'Pria', 'Jl. Graha Melati', 'denis', 'e7d361c7f6c045f0c4fa54d2afc4a237f30bc767');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_laporank`
--

CREATE TABLE `tbl_laporank` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `project` varchar(50) NOT NULL,
  `tgl_tugas` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `image` text NOT NULL,
  `pesan` text NOT NULL,
  `jabatan` enum('Project Manager','Developer','Quality Assurance','Web Design','Project Coordinator') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_laporank`
--

INSERT INTO `tbl_laporank` (`id`, `nama`, `project`, `tgl_tugas`, `tgl_kembali`, `image`, `pesan`, `jabatan`) VALUES
(17, 'Chandra Wibawa', 'NESTUDIO', '2018-02-01', '2018-08-31', 'bed-room_cat-cat3root-mobile-_130318-114010.png', 'Hello', 'Quality Assurance'),
(18, 'Bayu Setiadji', 'MOFIZ', '2018-03-01', '2018-08-31', 'bed-room_cat-cat3root-mobile-_130318-114010.png', 'Hello', 'Project Coordinator'),
(19, 'Denis Maulana', 'ASTRA ', '2018-04-01', '2018-08-31', 'bed-room_cat-cat3root-mobile-_130318-114010.png', 'Hello', 'Quality Assurance');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

CREATE TABLE `tbl_login` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`id`, `username`, `password`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_project`
--

CREATE TABLE `tbl_project` (
  `id` int(11) NOT NULL,
  `project` varchar(50) NOT NULL,
  `customer` varchar(50) NOT NULL,
  `pesan` text NOT NULL,
  `tgl_project` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_project`
--

INSERT INTO `tbl_project` (`id`, `project`, `customer`, `pesan`, `tgl_project`) VALUES
(5, 'NESTUDIO', 'PT DJARUM KUDOS', 'Client na GG, Master QA', '2018-08-02'),
(6, 'MOFIZ', 'CIMB NIAGA', 'Harus beres akhir tahun', '2018-08-01'),
(7, 'ASTRA ', 'PT ASTRA', 'PT ASTRA adalah . . .', '2018-08-01'),
(8, 'FACEBOOK', 'PT FACEBOOK', 'Facebook adalah social media', '2018-08-01');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_surat`
--

CREATE TABLE `tbl_surat` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jenis_kelamin` enum('Pria','Wanita') NOT NULL,
  `jabatan` enum('Chief','HRD','Developer','Quality Assurance','Management','Sales Marketing','Project Coordinator') NOT NULL,
  `project` varchar(50) NOT NULL,
  `no_surat` varchar(15) NOT NULL,
  `tgl_tugas` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `image` text NOT NULL,
  `pesan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_surat`
--

INSERT INTO `tbl_surat` (`id`, `nama`, `jenis_kelamin`, `jabatan`, `project`, `no_surat`, `tgl_tugas`, `tgl_kembali`, `image`, `pesan`) VALUES
(1, 'Rian Cahyadi', 'Pria', 'Quality Assurance', 'NESTUDIO', '12345678900', '2018-08-01', '2018-08-31', 'bed-room_cat-cat3root-mobile-_130318-114010.png', 'Hello Nestudio . . .'),
(2, 'Chandra Wibawa', 'Pria', 'Quality Assurance', 'MOFIZ', '12345678901', '2018-01-01', '2018-08-31', 'bed-room_cat-cat3root-mobile-_130318-114010.png', 'Tidak ada pesan . . .'),
(3, 'Bayu Setiadji', 'Pria', 'Project Coordinator', 'MOFIZ', '12345678903', '2018-02-01', '2018-08-31', 'bed-room_cat-cat3root-mobile-_130318-114010.png', 'Hello Mofiz . . .'),
(4, 'Denis Maulana', 'Pria', 'Quality Assurance', 'FACEBOOK', '12345678903', '2018-03-01', '2018-08-31', 'bed-room_cat-cat3root-mobile-_130318-114010.png', 'Hello saya denis maulana');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_karyawan`
--
ALTER TABLE `tbl_karyawan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nama` (`nama`);

--
-- Indexes for table `tbl_laporank`
--
ALTER TABLE `tbl_laporank`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_project`
--
ALTER TABLE `tbl_project`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project` (`project`);

--
-- Indexes for table `tbl_surat`
--
ALTER TABLE `tbl_surat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nama` (`nama`),
  ADD KEY `project` (`project`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_karyawan`
--
ALTER TABLE `tbl_karyawan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_laporank`
--
ALTER TABLE `tbl_laporank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_login`
--
ALTER TABLE `tbl_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_project`
--
ALTER TABLE `tbl_project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_surat`
--
ALTER TABLE `tbl_surat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_surat`
--
ALTER TABLE `tbl_surat`
  ADD CONSTRAINT `tbl_surat_ibfk_1` FOREIGN KEY (`nama`) REFERENCES `tbl_karyawan` (`nama`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
