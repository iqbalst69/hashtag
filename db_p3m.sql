-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2019 at 02:33 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_p3m`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` varchar(15) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `id_lvl` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `pass`, `id_lvl`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_angg_proposal`
--

CREATE TABLE `tb_angg_proposal` (
  `id_angg` int(11) NOT NULL,
  `nm_anggota` varchar(30) NOT NULL,
  `stat_anggota` varchar(20) NOT NULL,
  `id_proposal` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_level`
--

CREATE TABLE `tb_level` (
  `id_lvl` int(11) NOT NULL,
  `nm_lvl` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_level`
--

INSERT INTO `tb_level` (`id_lvl`, `nm_lvl`) VALUES
(1, 'admin'),
(2, 'operator'),
(3, 'peserta'),
(4, 'reviewe');

-- --------------------------------------------------------

--
-- Table structure for table `tb_operator`
--

CREATE TABLE `tb_operator` (
  `id_operator` varchar(15) NOT NULL,
  `nm_operator` varchar(20) NOT NULL,
  `id_lvl` int(11) NOT NULL,
  `id_prodi` varchar(15) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_peserta`
--

CREATE TABLE `tb_peserta` (
  `id_peserta` varchar(15) NOT NULL,
  `ket_id` enum('NIDN','NIM','NIP') NOT NULL,
  `nama` varchar(40) NOT NULL,
  `status` enum('Dosen','PLPI','Mahasiswa') NOT NULL,
  `golongan` varchar(15) NOT NULL,
  `jabatan` varchar(15) NOT NULL,
  `no_hp` varchar(15) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `id_prodi` varchar(15) NOT NULL,
  `id_lvl` int(11) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `pass` varchar(255) NOT NULL,
  `aktivasi` enum('0','1') NOT NULL,
  `log` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_peserta`
--

INSERT INTO `tb_peserta` (`id_peserta`, `ket_id`, `nama`, `status`, `golongan`, `jabatan`, `no_hp`, `email`, `id_prodi`, `id_lvl`, `photo`, `pass`, `aktivasi`, `log`) VALUES
('1557301091', 'NIDN', 'Muhammad Iqbal', 'Dosen', 'IIIA', 'Gol. 1', NULL, NULL, '5db73544da965', 3, NULL, 'c4ca4238a0b923820dcc509a6f75849b', '1', '2019-10-29');

-- --------------------------------------------------------

--
-- Table structure for table `tb_prodi`
--

CREATE TABLE `tb_prodi` (
  `id_prodi` varchar(15) NOT NULL,
  `nm_prodi` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_prodi`
--

INSERT INTO `tb_prodi` (`id_prodi`, `nm_prodi`) VALUES
('5db73544da965', 'Teknik Informatika'),
('5db74629eebcb', 'Teknologi Rekayasa Komputer dan Jaringan'),
('5db74b3e76010', 'Instrumentasi Otomasi Industri');

-- --------------------------------------------------------

--
-- Table structure for table `tb_proposal`
--

CREATE TABLE `tb_proposal` (
  `id_proposal` varchar(15) NOT NULL,
  `jdl_proposal` varchar(40) NOT NULL,
  `skema` varchar(20) NOT NULL,
  `abstrak` varchar(500) NOT NULL,
  `dana` int(11) NOT NULL,
  `accepted` enum('0','1') NOT NULL,
  `file_proposal` varchar(255) NOT NULL,
  `created` date NOT NULL,
  `id_peserta` varchar(15) NOT NULL,
  `tahun` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tmp_anggota`
--

CREATE TABLE `tmp_anggota` (
  `id_tmp` int(11) NOT NULL,
  `nm_anggota` varchar(20) NOT NULL,
  `stat_anggota` varchar(10) NOT NULL,
  `id_sess` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD KEY `id_lvl` (`id_lvl`);

--
-- Indexes for table `tb_angg_proposal`
--
ALTER TABLE `tb_angg_proposal`
  ADD PRIMARY KEY (`id_angg`),
  ADD KEY `id_proposal` (`id_proposal`);

--
-- Indexes for table `tb_level`
--
ALTER TABLE `tb_level`
  ADD PRIMARY KEY (`id_lvl`);

--
-- Indexes for table `tb_operator`
--
ALTER TABLE `tb_operator`
  ADD PRIMARY KEY (`id_operator`),
  ADD KEY `id_lvl` (`id_lvl`),
  ADD KEY `id_prodi` (`id_prodi`);

--
-- Indexes for table `tb_peserta`
--
ALTER TABLE `tb_peserta`
  ADD PRIMARY KEY (`id_peserta`),
  ADD KEY `id_prodi` (`id_prodi`),
  ADD KEY `id_lvl` (`id_lvl`);

--
-- Indexes for table `tb_prodi`
--
ALTER TABLE `tb_prodi`
  ADD PRIMARY KEY (`id_prodi`);

--
-- Indexes for table `tb_proposal`
--
ALTER TABLE `tb_proposal`
  ADD PRIMARY KEY (`id_proposal`),
  ADD KEY `id_peserta` (`id_peserta`);

--
-- Indexes for table `tmp_anggota`
--
ALTER TABLE `tmp_anggota`
  ADD PRIMARY KEY (`id_tmp`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_angg_proposal`
--
ALTER TABLE `tb_angg_proposal`
  MODIFY `id_angg` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_level`
--
ALTER TABLE `tb_level`
  MODIFY `id_lvl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tmp_anggota`
--
ALTER TABLE `tmp_anggota`
  MODIFY `id_tmp` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD CONSTRAINT `tb_admin_ibfk_1` FOREIGN KEY (`id_lvl`) REFERENCES `tb_level` (`id_lvl`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_admin_ibfk_2` FOREIGN KEY (`id_lvl`) REFERENCES `tb_level` (`id_lvl`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_angg_proposal`
--
ALTER TABLE `tb_angg_proposal`
  ADD CONSTRAINT `tb_angg_proposal_ibfk_1` FOREIGN KEY (`id_proposal`) REFERENCES `tb_proposal` (`id_proposal`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_angg_proposal_ibfk_2` FOREIGN KEY (`id_proposal`) REFERENCES `tb_proposal` (`id_proposal`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_operator`
--
ALTER TABLE `tb_operator`
  ADD CONSTRAINT `tb_operator_ibfk_1` FOREIGN KEY (`id_lvl`) REFERENCES `tb_level` (`id_lvl`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_operator_ibfk_2` FOREIGN KEY (`id_lvl`) REFERENCES `tb_level` (`id_lvl`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_operator_ibfk_3` FOREIGN KEY (`id_prodi`) REFERENCES `tb_prodi` (`id_prodi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_operator_ibfk_4` FOREIGN KEY (`id_prodi`) REFERENCES `tb_prodi` (`id_prodi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_peserta`
--
ALTER TABLE `tb_peserta`
  ADD CONSTRAINT `tb_peserta_ibfk_1` FOREIGN KEY (`id_prodi`) REFERENCES `tb_prodi` (`id_prodi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_peserta_ibfk_2` FOREIGN KEY (`id_lvl`) REFERENCES `tb_level` (`id_lvl`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_peserta_ibfk_3` FOREIGN KEY (`id_prodi`) REFERENCES `tb_prodi` (`id_prodi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_peserta_ibfk_4` FOREIGN KEY (`id_lvl`) REFERENCES `tb_level` (`id_lvl`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_proposal`
--
ALTER TABLE `tb_proposal`
  ADD CONSTRAINT `tb_proposal_ibfk_1` FOREIGN KEY (`id_peserta`) REFERENCES `tb_peserta` (`id_peserta`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_proposal_ibfk_2` FOREIGN KEY (`id_peserta`) REFERENCES `tb_peserta` (`id_peserta`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
