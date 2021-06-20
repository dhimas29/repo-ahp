-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2021 at 04:36 PM
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
('A001', 1, 0.9, 'A001', 'C1'),
('A001', 9, 0.9, 'A002', 'C1'),
('A002', 0.11111111111111, 0.099999999999999, 'A001', 'C1'),
('A002', 1, 0.1, 'A002', 'C1'),
('A003', 1, 0.75, 'A003', 'C2'),
('A003', 9, 0.8804347826087, 'A004', 'C2'),
('A003', 9, 0.47093023255814, 'A005', 'C2'),
('A003', 9, 0.32142857142857, 'A006', 'C2'),
('A004', 0.11111111111111, 0.083333333333333, 'A003', 'C2'),
('A004', 1, 0.097826086956522, 'A004', 'C2'),
('A004', 9, 0.47093023255814, 'A005', 'C2'),
('A004', 9, 0.32142857142857, 'A006', 'C2'),
('A005', 0.11111111111111, 0.083333333333333, 'A003', 'C2'),
('A005', 0.11111111111111, 0.010869565217391, 'A004', 'C2'),
('A005', 1, 0.052325581395349, 'A005', 'C2'),
('A005', 9, 0.32142857142857, 'A006', 'C2'),
('A006', 0.11111111111111, 0.083333333333333, 'A003', 'C2'),
('A006', 0.11111111111111, 0.010869565217391, 'A004', 'C2'),
('A006', 0.11111111111111, 0.005813953488372, 'A005', 'C2'),
('A006', 1, 0.035714285714286, 'A006', 'C2'),
('A007', 1, 0.69230769230769, 'A007', 'C3'),
('A007', 9, 0.87096774193548, 'A008', 'C3'),
('A007', 9, 0.46820809248555, 'A009', 'C3'),
('A007', 9, 0.3201581027668, 'A010', 'C3'),
('A007', 9, 0.24324324324324, 'A011', 'C3'),
('A008', 0.11111111111111, 0.076923076923076, 'A007', 'C3'),
('A008', 1, 0.096774193548387, 'A008', 'C3'),
('A008', 9, 0.46820809248555, 'A009', 'C3'),
('A008', 9, 0.3201581027668, 'A010', 'C3'),
('A008', 9, 0.24324324324324, 'A011', 'C3'),
('A009', 0.11111111111111, 0.076923076923076, 'A007', 'C3'),
('A009', 0.11111111111111, 0.010752688172043, 'A008', 'C3'),
('A009', 1, 0.052023121387283, 'A009', 'C3'),
('A009', 9, 0.3201581027668, 'A010', 'C3'),
('A009', 9, 0.24324324324324, 'A011', 'C3'),
('A010', 0.11111111111111, 0.076923076923076, 'A007', 'C3'),
('A010', 0.11111111111111, 0.010752688172043, 'A008', 'C3'),
('A010', 0.11111111111111, 0.0057803468208092, 'A009', 'C3'),
('A010', 1, 0.035573122529644, 'A010', 'C3'),
('A010', 9, 0.24324324324324, 'A011', 'C3'),
('A011', 0.11111111111111, 0.076923076923076, 'A007', 'C3'),
('A011', 0.11111111111111, 0.010752688172043, 'A008', 'C3'),
('A011', 0.11111111111111, 0.0057803468208092, 'A009', 'C3'),
('A011', 0.11111111111111, 0.0039525691699604, 'A010', 'C3'),
('A011', 1, 0.027027027027027, 'A011', 'C3'),
('A012', 1, 0.69230769230769, 'A012', 'C4'),
('A012', 9, 0.87096774193548, 'A013', 'C4'),
('A012', 9, 0.46820809248555, 'A014', 'C4'),
('A012', 9, 0.3201581027668, 'A015', 'C4'),
('A012', 9, 0.24324324324324, 'A016', 'C4'),
('A013', 0.11111111111111, 0.076923076923076, 'A012', 'C4'),
('A013', 1, 0.096774193548387, 'A013', 'C4'),
('A013', 9, 0.46820809248555, 'A014', 'C4'),
('A013', 9, 0.3201581027668, 'A015', 'C4'),
('A013', 9, 0.24324324324324, 'A016', 'C4'),
('A014', 0.11111111111111, 0.076923076923076, 'A012', 'C4'),
('A014', 0.11111111111111, 0.010752688172043, 'A013', 'C4'),
('A014', 1, 0.052023121387283, 'A014', 'C4'),
('A014', 9, 0.3201581027668, 'A015', 'C4'),
('A014', 9, 0.24324324324324, 'A016', 'C4'),
('A015', 0.11111111111111, 0.076923076923076, 'A012', 'C4'),
('A015', 0.11111111111111, 0.010752688172043, 'A013', 'C4'),
('A015', 0.11111111111111, 0.0057803468208092, 'A014', 'C4'),
('A015', 1, 0.035573122529644, 'A015', 'C4'),
('A015', 9, 0.24324324324324, 'A016', 'C4'),
('A016', 0.11111111111111, 0.076923076923076, 'A012', 'C4'),
('A016', 0.11111111111111, 0.010752688172043, 'A013', 'C4'),
('A016', 0.11111111111111, 0.0057803468208092, 'A014', 'C4'),
('A016', 0.11111111111111, 0.0039525691699604, 'A015', 'C4'),
('A016', 1, 0.027027027027027, 'A016', 'C4'),
('A017', 1, 0.69230769230769, 'A017', 'C5'),
('A017', 9, 0.87096774193548, 'A018', 'C5'),
('A017', 9, 0.46820809248555, 'A019', 'C5'),
('A017', 9, 0.3201581027668, 'A020', 'C5'),
('A017', 9, 0.24324324324324, 'A021', 'C5'),
('A018', 0.11111111111111, 0.076923076923076, 'A017', 'C5'),
('A018', 1, 0.096774193548387, 'A018', 'C5'),
('A018', 9, 0.46820809248555, 'A019', 'C5'),
('A018', 9, 0.3201581027668, 'A020', 'C5'),
('A018', 9, 0.24324324324324, 'A021', 'C5'),
('A019', 0.11111111111111, 0.076923076923076, 'A017', 'C5'),
('A019', 0.11111111111111, 0.010752688172043, 'A018', 'C5'),
('A019', 1, 0.052023121387283, 'A019', 'C5'),
('A019', 9, 0.3201581027668, 'A020', 'C5'),
('A019', 9, 0.24324324324324, 'A021', 'C5'),
('A020', 0.11111111111111, 0.076923076923076, 'A017', 'C5'),
('A020', 0.11111111111111, 0.010752688172043, 'A018', 'C5'),
('A020', 0.11111111111111, 0.0057803468208092, 'A019', 'C5'),
('A020', 1, 0.035573122529644, 'A020', 'C5'),
('A020', 9, 0.24324324324324, 'A021', 'C5'),
('A021', 0.11111111111111, 0.076923076923076, 'A017', 'C5'),
('A021', 0.11111111111111, 0.010752688172043, 'A018', 'C5'),
('A021', 0.11111111111111, 0.0057803468208092, 'A019', 'C5'),
('A021', 0.11111111111111, 0.0039525691699604, 'A020', 'C5'),
('A021', 1, 0.027027027027027, 'A021', 'C5');

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
('C1', 1, 0.69230769230769, 'C1'),
('C1', 9, 0.87096774193548, 'C2'),
('C1', 9, 0.46820809248555, 'C3'),
('C1', 9, 0.3201581027668, 'C4'),
('C1', 9, 0.24324324324324, 'C5'),
('C2', 0.11111111111111, 0.076923076923076, 'C1'),
('C2', 1, 0.096774193548387, 'C2'),
('C2', 9, 0.46820809248555, 'C3'),
('C2', 9, 0.3201581027668, 'C4'),
('C2', 9, 0.24324324324324, 'C5'),
('C3', 0.11111111111111, 0.076923076923076, 'C1'),
('C3', 0.11111111111111, 0.010752688172043, 'C2'),
('C3', 1, 0.052023121387283, 'C3'),
('C3', 9, 0.3201581027668, 'C4'),
('C3', 9, 0.24324324324324, 'C5'),
('C4', 0.11111111111111, 0.076923076923076, 'C1'),
('C4', 0.11111111111111, 0.010752688172043, 'C2'),
('C4', 0.11111111111111, 0.0057803468208092, 'C3'),
('C4', 1, 0.035573122529644, 'C4'),
('C4', 9, 0.24324324324324, 'C5'),
('C5', 0.11111111111111, 0.076923076923076, 'C1'),
('C5', 0.11111111111111, 0.010752688172043, 'C2'),
('C5', 0.11111111111111, 0.0057803468208092, 'C3'),
('C5', 0.11111111111111, 0.0039525691699604, 'C4'),
('C5', 1, 0.027027027027027, 'C5');

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
('A001', 'C1', 1.11111111111111, 0.9, 0.46707927709298),
('A002', 'C1', 10, 0.0999999999999995, 0),
('A003', 'C2', 1.3333333333333302, 0.6056983966488525, 0.14601046821829),
('A004', 'C2', 10.222222222222221, 0.24337955606914125, 0.058669402351112),
('A005', 'C2', 19.11111111111111, 0.11698926284366075, 0),
('A006', 'C2', 28, 0.0339327844383455, 0),
('A007', 'C3', 1.4444444444444402, 0.5189769745477519, 0.076759353341986),
('A008', 'C3', 10.333333333333332, 0.2410613417934106, 0.033898057091977),
('A009', 'C3', 19.22222222222222, 0.14062004649848842, 0),
('A010', 'C3', 28.11111111111111, 0.07445449553776244, 0),
('A011', 'C3', 37, 0.02488714162258312, 0),
('A012', 'C4', 1.4444444444444402, 0.5189769745477519, 0.042247601316923),
('A013', 'C4', 10.333333333333332, 0.2410613417934106, 0.017948100596885),
('A014', 'C4', 19.22222222222222, 0.14062004649848842, 0.010469794624542),
('A015', 'C4', 28.11111111111111, 0.07445449553776244, 0),
('A016', 'C4', 37, 0.02488714162258312, 0),
('A017', 'C5', 1.4444444444444402, 0.5189769745477519, 0.016510261867022),
('A018', 'C5', 10.333333333333332, 0.2410613417934106, 0),
('A019', 'C5', 19.22222222222222, 0.14062004649848842, 0),
('A020', 'C5', 28.11111111111111, 0.07445449553776244, 0),
('A021', 'C5', 37, 0.02488714162258312, 0.00061936981814251);

-- --------------------------------------------------------

--
-- Table structure for table `postlowongan`
--

CREATE TABLE `postlowongan` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `post` longtext NOT NULL,
  `tanggal` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `postlowongan`
--

INSERT INTO `postlowongan` (`id`, `judul`, `post`, `tanggal`) VALUES
(5, 'Lowongan Admin', '<p>Dibutuhkan Segera Admin</p>', '27-05-2021, 04:36 WIB'),
(6, 'Lowongan', '<p>Dibutuhkan Segera Staff It</p><p>Requirement :</p><p>xxx</p><p>xxx</p><p>xx</p><p>x</p>', '27-05-2021, 05:50 WIB');

-- --------------------------------------------------------

--
-- Table structure for table `ranking`
--

CREATE TABLE `ranking` (
  `id_calon_karyawan` int(11) NOT NULL,
  `skor_bobot` double NOT NULL,
  `label` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ranking`
--

INSERT INTO `ranking` (`id_calon_karyawan`, `skor_bobot`, `label`) VALUES
(13, 17.791480017635998, 'Lulus'),
(15, 2.8921197800486143, 'Lulus');

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
('A001', 'C1', 'Sudah Pernah Bekerja'),
('A002', 'C1', 'Belum Bekerja'),
('A003', 'C2', 'S1'),
('A004', 'C2', 'D3'),
('A005', 'C2', 'SMK'),
('A006', 'C2', 'SMP'),
('A007', 'C3', 'A'),
('A008', 'C3', 'B'),
('A009', 'C3', 'C'),
('A010', 'C3', 'D'),
('A011', 'C3', 'E'),
('A012', 'C4', 'A'),
('A013', 'C4', 'B'),
('A014', 'C4', 'C'),
('A015', 'C4', 'D'),
('A016', 'C4', 'E'),
('A017', 'C5', 'A'),
('A018', 'C5', 'B'),
('A019', 'C5', 'C'),
('A020', 'C5', 'D'),
('A021', 'C5', 'E');

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
(13, '123123', 'yuru', 'Tangerang', '04/07/2021', 'laki', 'budha', 'Belum Menikah', '087816335524', 'yuru@gmail.com', '123123_Screenshot 2021-06-08 160045.png', 'asdasd', '2021-04-24 05:20:57'),
(14, '21312', 'Dhimas Alvian Rifita', 'Tangerang', '05/30/2021', 'laki', 'kristen', 'Belum Menikah', '123123', 'dhimas.alvianrifita@gmail.com', '21312_Screenshot 2021-06-08 160045.png', 'asdasd', '2021-06-12 23:34:37'),
(15, '312', 'karyawan', 'Tangerang', '05/30/2021', 'laki', 'kristen', 'Belum Menikah', '123123', 'karyawan@gmai.com', '312_Capture.PNG', 'asd', '2021-06-20 20:35:18');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kriteria`
--

CREATE TABLE `tb_kriteria` (
  `id_kriteria` varchar(3) NOT NULL,
  `nama_kriteria` varchar(30) NOT NULL,
  `bobot_kriteria` double NOT NULL DEFAULT 0,
  `jumlah_kriteria` double NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kriteria`
--

INSERT INTO `tb_kriteria` (`id_kriteria`, `nama_kriteria`, `bobot_kriteria`, `jumlah_kriteria`) VALUES
('C1', 'Pengalaman Kerja', 0.5189769745477519, 1.4444444444444402),
('C2', 'Pendidikan Terakhir', 0.2410613417934106, 10.333333333333332),
('C3', 'Tes Tertulis', 0.14062004649848842, 19.22222222222222),
('C4', 'Tes Psikotes', 0.07445449553776244, 28.11111111111111),
('C5', 'Wawancara', 0.02488714162258312, 37);

-- --------------------------------------------------------

--
-- Table structure for table `tb_nilai`
--

CREATE TABLE `tb_nilai` (
  `id` int(11) NOT NULL,
  `id_calon_karyawan` int(11) NOT NULL,
  `id_alternatif` varchar(4) NOT NULL,
  `nilai` int(11) NOT NULL,
  `periode` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_nilai`
--

INSERT INTO `tb_nilai` (`id`, `id_calon_karyawan`, `id_alternatif`, `nilai`, `periode`) VALUES
(75, 13, 'A008', 80, '2021'),
(76, 13, 'A014', 70, '2021'),
(77, 13, 'A021', 60, '2021'),
(80, 13, 'A001', 183, '2021'),
(81, 13, 'A003', 0, '2021'),
(92, 15, 'A001', 22, '2021'),
(94, 15, 'A003', 0, '2021'),
(95, 15, 'A008', 80, '2021'),
(96, 15, 'A013', 80, '2021'),
(97, 15, 'A021', 60, '2021');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pendidikan_kerja`
--

CREATE TABLE `tb_pendidikan_kerja` (
  `id` int(11) NOT NULL,
  `id_calon_karyawan` int(11) NOT NULL,
  `institusi` varchar(100) NOT NULL,
  `tahun_lulus` varchar(4) NOT NULL,
  `kualifikasi` varchar(20) NOT NULL,
  `program_studi` varchar(100) NOT NULL,
  `nilai_akhir` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pendidikan_kerja`
--

INSERT INTO `tb_pendidikan_kerja` (`id`, `id_calon_karyawan`, `institusi`, `tahun_lulus`, `kualifikasi`, `program_studi`, `nilai_akhir`) VALUES
(2, 15, 'Universitas Darma Persada', '2020', 'A003', 'Sistem Informasi', '3.45');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengalaman_kerja`
--

CREATE TABLE `tb_pengalaman_kerja` (
  `id` int(11) NOT NULL,
  `id_calon_karyawan` int(11) NOT NULL,
  `nama_perusahaan` varchar(100) NOT NULL,
  `kerja_awal` varchar(10) NOT NULL,
  `kerja_akhir` varchar(10) NOT NULL,
  `bidang_kerja` varchar(100) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `gaji` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pengalaman_kerja`
--

INSERT INTO `tb_pengalaman_kerja` (`id`, `id_calon_karyawan`, `nama_perusahaan`, `kerja_awal`, `kerja_akhir`, `bidang_kerja`, `jabatan`, `gaji`) VALUES
(2, 13, 'Saya', '2020-11-25', '2021-05-27', 'Jeruk', 'CEO/GM/Direktur/Manajer Senior', '20000'),
(5, 15, 'Saya', '2021-05-30', '2021-06-21', 'Jeruk', 'CEO/GM/Direktur/Manajer Senior', '20000');

-- --------------------------------------------------------

--
-- Table structure for table `tb_preferensi`
--

CREATE TABLE `tb_preferensi` (
  `id_nilai` int(11) NOT NULL,
  `jumlah_nilai` double NOT NULL,
  `keterangan_nilai` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_preferensi`
--

INSERT INTO `tb_preferensi` (`id_nilai`, `jumlah_nilai`, `keterangan_nilai`) VALUES
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
(16, 'karyawan', 'yuru', '63fc408103356ccbf3eeda2b85f16dee', 'yuru', 'yuru@gmail.com'),
(17, 'pimpinan', 'pimpinan', '90973652b88fe07d05a4304f0a945de8', 'Kepala Perusahaan', 'pimpinan@gmail.com'),
(28, 'pelamar', 'adha', '481781ce2f77b4eecab6b17d7413e635', 'adha', 'dhimas.alvianrifita@gmail.com'),
(29, 'pelamar', 'evan', '98cc7d37dc7b90c14a59ef0c5caa8995', 'evan', 'evan.rifita@gmail.com');

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
  ADD PRIMARY KEY (`id_calon_karyawan`);

--
-- Indexes for table `tb_alternatif`
--
ALTER TABLE `tb_alternatif`
  ADD PRIMARY KEY (`id_alternatif`);

--
-- Indexes for table `tb_calon_karyawan`
--
ALTER TABLE `tb_calon_karyawan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `tb_kriteria`
--
ALTER TABLE `tb_kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `tb_nilai`
--
ALTER TABLE `tb_nilai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pendidikan_kerja`
--
ALTER TABLE `tb_pendidikan_kerja`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pengalaman_kerja`
--
ALTER TABLE `tb_pengalaman_kerja`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_preferensi`
--
ALTER TABLE `tb_preferensi`
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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `postlowongan`
--
ALTER TABLE `postlowongan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_calon_karyawan`
--
ALTER TABLE `tb_calon_karyawan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tb_nilai`
--
ALTER TABLE `tb_nilai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `tb_pendidikan_kerja`
--
ALTER TABLE `tb_pendidikan_kerja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_pengalaman_kerja`
--
ALTER TABLE `tb_pengalaman_kerja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_preferensi`
--
ALTER TABLE `tb_preferensi`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
