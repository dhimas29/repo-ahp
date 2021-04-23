-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2021 at 01:48 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_penerimaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `analisa_alternatif`
--

CREATE TABLE `analisa_alternatif` (
  `alternatif_pertama` varchar(4) NOT NULL,
  `nilai_analisa_alternatif` double NOT NULL,
  `hasil_analisa_alternatif` double NOT NULL,
  `alternatif_kedua` varchar(4) NOT NULL,
  `id_kriteria` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `analisa_alternatif`
--

INSERT INTO `analisa_alternatif` (`alternatif_pertama`, `nilai_analisa_alternatif`, `hasil_analisa_alternatif`, `alternatif_kedua`, `id_kriteria`) VALUES
('A003', 1, 0.33333333333333, 'A003', 'C1'),
('A003', 1, 0.33333333333333, 'A004', 'C1'),
('A003', 1, 0.33333333333333, 'A005', 'C1'),
('A004', 1, 0.33333333333333, 'A003', 'C1'),
('A004', 1, 0.33333333333333, 'A004', 'C1'),
('A004', 1, 0.33333333333333, 'A005', 'C1'),
('A005', 1, 0.33333333333333, 'A003', 'C1'),
('A005', 1, 0.33333333333333, 'A004', 'C1'),
('A005', 1, 0.33333333333333, 'A005', 'C1');

-- --------------------------------------------------------

--
-- Table structure for table `analisa_kriteria`
--

CREATE TABLE `analisa_kriteria` (
  `kriteria_pertama` varchar(2) NOT NULL,
  `nilai_analisa_kriteria` double NOT NULL,
  `hasil_analisa_kriteria` double NOT NULL,
  `kriteria_kedua` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `analisa_kriteria`
--

INSERT INTO `analisa_kriteria` (`kriteria_pertama`, `nilai_analisa_kriteria`, `hasil_analisa_kriteria`, `kriteria_kedua`) VALUES
('C1', 1, 0.5, 'C1'),
('C1', 1, 0.5, 'C2'),
('C2', 1, 0.5, 'C1'),
('C2', 1, 0.5, 'C2');

-- --------------------------------------------------------

--
-- Table structure for table `jum_alt_kri`
--

CREATE TABLE `jum_alt_kri` (
  `id_alternatif` varchar(4) NOT NULL,
  `id_kriteria` varchar(2) NOT NULL,
  `jumlah_alt_kri` double NOT NULL,
  `skor_alt_kri` double NOT NULL,
  `hasil_alt_kri` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jum_alt_kri`
--

INSERT INTO `jum_alt_kri` (`id_alternatif`, `id_kriteria`, `jumlah_alt_kri`, `skor_alt_kri`, `hasil_alt_kri`) VALUES
('A003', 'C1', 3, 0.33333333333333, 0),
('A004', 'C1', 3, 0.33333333333333, 0),
('A005', 'C1', 3, 0.33333333333333, 0);

-- --------------------------------------------------------

--
-- Table structure for table `postlowongan`
--

CREATE TABLE `postlowongan` (
  `id` int(11) NOT NULL,
  `post` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `postlowongan`
--

INSERT INTO `postlowongan` (`id`, `post`) VALUES
(2, '<p>1. saya</p><p>2. saya</p>'),
(3, '<p>sayaaa</p>');

-- --------------------------------------------------------

--
-- Table structure for table `ranking`
--

CREATE TABLE `ranking` (
  `nik_calon_karyawan` varchar(15) NOT NULL,
  `bobot_kriteria` double NOT NULL,
  `label` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_alternatif`
--

CREATE TABLE `tb_alternatif` (
  `id_alternatif` varchar(4) NOT NULL,
  `id_kriteria` varchar(2) NOT NULL,
  `nama_alternatif` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_alternatif`
--

INSERT INTO `tb_alternatif` (`id_alternatif`, `id_kriteria`, `nama_alternatif`) VALUES
('A003', 'C1', 'Layak'),
('A004', 'C1', 'Kita'),
('A005', 'C1', 'Bagus');

-- --------------------------------------------------------

--
-- Table structure for table `tb_calon_karyawan`
--

CREATE TABLE `tb_calon_karyawan` (
  `id` int(11) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tanggal_lahir` varchar(10) NOT NULL,
  `jenis_kelamin` varchar(9) NOT NULL,
  `agama` varchar(20) NOT NULL,
  `status` varchar(15) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `alamat` varchar(300) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_calon_karyawan`
--

INSERT INTO `tb_calon_karyawan` (`id`, `nik`, `nama_lengkap`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `agama`, `status`, `no_telp`, `email`, `photo`, `alamat`, `created_at`) VALUES
(13, '123123', 'yuru', 'Tangerang', '04/07/2021', 'laki', 'budha', 'Belum Menikah', '087816335524', 'yuru@gmail.com', '123123_teletubbies.jpg', 'asdasd', '2021-04-24 05:20:57');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kriteria`
--

CREATE TABLE `tb_kriteria` (
  `id_kriteria` varchar(3) NOT NULL,
  `nama_kriteria` varchar(30) NOT NULL,
  `bobot_kriteria` double NOT NULL DEFAULT 0,
  `jumlah_kriteria` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kriteria`
--

INSERT INTO `tb_kriteria` (`id_kriteria`, `nama_kriteria`, `bobot_kriteria`, `jumlah_kriteria`) VALUES
('C1', 'Wawancara', 0.5, 2),
('C2', 'Ujian Tertulis', 0.5, 2),
('C3', 'Ujian Praktek', 0, 0),
('C4', 'IPK', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_nilai`
--

CREATE TABLE `tb_nilai` (
  `id_nilai` int(11) NOT NULL,
  `jumlah_nilai` double NOT NULL,
  `keterangan_nilai` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_nilai`
--

INSERT INTO `tb_nilai` (`id_nilai`, `jumlah_nilai`, `keterangan_nilai`) VALUES
(1, 1, 'Sama penting dengan'),
(2, 3, 'Sedikit lebih penting dari'),
(3, 5, 'Lebih penting dari'),
(4, 7, 'Sangat penting dari'),
(5, 9, 'Mutlak sangat penting dari');

-- --------------------------------------------------------

--
-- Table structure for table `tb_register`
--

CREATE TABLE `tb_register` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(8) NOT NULL DEFAULT 'karyawan'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_register`
--

INSERT INTO `tb_register` (`id`, `fullname`, `email`, `username`, `password`, `level`) VALUES
(1, 'yuru', 'yuru@gmail.com', 'yuru', '63fc408103356ccbf3eeda2b85f16dee', 'karyawan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `level` varchar(10) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `level`, `username`, `password`, `fullname`, `email`) VALUES
(1, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'admin@gmail.com'),
(2, 'karyawan', 'karyawan', '9e014682c94e0f2cc834bf7348bda428', 'karyawan', 'karyawan@gmai.com'),
(13, 'admin', 'shrine', '21232f297a57a5a743894a0e4a801fc3', 'shrine', 'shrine@gmail.com'),
(16, 'pelamar', 'yuru', '63fc408103356ccbf3eeda2b85f16dee', 'yuru', 'yuru@gmail.com'),
(17, 'manager', 'manager', '8b342e1ffc39b0943351612229f7e8e3', 'manager', 'manager@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `analisa_alternatif`
--
ALTER TABLE `analisa_alternatif`
  ADD PRIMARY KEY (`alternatif_pertama`,`alternatif_kedua`,`id_kriteria`) USING BTREE,
  ADD KEY `id_kriteria` (`id_kriteria`),
  ADD KEY `alternatif_kedua` (`alternatif_kedua`);

--
-- Indexes for table `analisa_kriteria`
--
ALTER TABLE `analisa_kriteria`
  ADD PRIMARY KEY (`kriteria_pertama`,`kriteria_kedua`) USING BTREE,
  ADD KEY `kriteria_kedua` (`kriteria_kedua`);

--
-- Indexes for table `jum_alt_kri`
--
ALTER TABLE `jum_alt_kri`
  ADD PRIMARY KEY (`id_alternatif`,`id_kriteria`) USING BTREE,
  ADD KEY `id_kriteria` (`id_kriteria`);

--
-- Indexes for table `postlowongan`
--
ALTER TABLE `postlowongan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ranking`
--
ALTER TABLE `ranking`
  ADD PRIMARY KEY (`nik_calon_karyawan`);

--
-- Indexes for table `tb_alternatif`
--
ALTER TABLE `tb_alternatif`
  ADD PRIMARY KEY (`id_alternatif`);

--
-- Indexes for table `tb_calon_karyawan`
--
ALTER TABLE `tb_calon_karyawan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_kriteria`
--
ALTER TABLE `tb_kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `tb_nilai`
--
ALTER TABLE `tb_nilai`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indexes for table `tb_register`
--
ALTER TABLE `tb_register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `postlowongan`
--
ALTER TABLE `postlowongan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_calon_karyawan`
--
ALTER TABLE `tb_calon_karyawan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_nilai`
--
ALTER TABLE `tb_nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_register`
--
ALTER TABLE `tb_register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
