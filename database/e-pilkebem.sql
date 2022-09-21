-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 21, 2022 at 09:37 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e_pilkebem`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nama` varchar(300) NOT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') NOT NULL,
  `username` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `status_akun` enum('Y','N') NOT NULL,
  `foto` varchar(200) NOT NULL,
  `level` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `nama`, `jenis_kelamin`, `username`, `password`, `status_akun`, `foto`, `level`) VALUES
(2, 'Admin BEM', 'Laki-Laki', 'adminbem2022@gmail.com', 'adminbem2022', 'Y', '', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `akses_menu`
--

CREATE TABLE `akses_menu` (
  `id` int(11) NOT NULL,
  `manajemen_akun` enum('Y','N') DEFAULT 'N',
  `data_kelas` enum('Y','N') NOT NULL DEFAULT 'N',
  `data_siswa` enum('Y','N') NOT NULL DEFAULT 'N',
  `data_gtk` enum('Y','N') NOT NULL DEFAULT 'N',
  `data_kandidat` enum('Y','N') NOT NULL DEFAULT 'N',
  `rekap_data` enum('Y','N') NOT NULL,
  `reset_peserta` enum('Y','N') NOT NULL,
  `reset_all` enum('Y','N') NOT NULL,
  `username` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `akses_menu`
--

INSERT INTO `akses_menu` (`id`, `manajemen_akun`, `data_kelas`, `data_siswa`, `data_gtk`, `data_kandidat`, `rekap_data`, `reset_peserta`, `reset_all`, `username`) VALUES
(2, 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'adminbem2022@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `id` int(11) NOT NULL,
  `nama` varchar(300) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `kepegawaian` enum('Tendik','Dosen') NOT NULL,
  `username` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `kehadiran` enum('Hadir','Tidak Hadir') NOT NULL DEFAULT 'Tidak Hadir',
  `status_memilih` enum('Sudah','Belum') NOT NULL DEFAULT 'Belum',
  `status_akun` enum('Y','N') NOT NULL,
  `level` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `identitas_kampus`
--

CREATE TABLE `identitas_kampus` (
  `id` int(11) NOT NULL,
  `nama_kampus` varchar(300) NOT NULL,
  `nama_ketua` varchar(300) NOT NULL,
  `nip` varchar(300) NOT NULL,
  `alamat_kampus` varchar(5000) NOT NULL,
  `kelurahan` varchar(300) NOT NULL,
  `kecamatan` varchar(300) NOT NULL,
  `kab_kota` varchar(300) NOT NULL,
  `kode_pt` varchar(300) NOT NULL,
  `akreditasi` varchar(200) NOT NULL,
  `logo` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `identitas_kampus`
--

INSERT INTO `identitas_kampus` (`id`, `nama_kampus`, `nama_ketua`, `nip`, `alamat_kampus`, `kelurahan`, `kecamatan`, `kab_kota`, `kode_pt`, `akreditasi`, `logo`) VALUES
(1, 'STMIK PGRI Tangerang', 'Drs. Aep Gumiwa, MM', '-', 'Jl. Perintis Kemerdekaan II, RT.007/RW.003', 'Cikokol', 'Tangerang', 'Kota Tangerang', '043242366', 'C', '1492628515_364316493_bem.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL,
  `nama` varchar(300) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `kelas` varchar(200) NOT NULL,
  `username` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `kehadiran` enum('Hadir','Tidak Hadir') NOT NULL DEFAULT 'Tidak Hadir',
  `status_memilih` enum('Sudah','Belum') NOT NULL DEFAULT 'Belum',
  `status_akun` enum('Y','N') NOT NULL,
  `level` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nama`, `jenis_kelamin`, `kelas`, `username`, `password`, `kehadiran`, `status_memilih`, `status_akun`, `level`) VALUES
(1, 'PESERTA TEST', 'L', 'TESTER 1', '11111', '11111', 'Tidak Hadir', 'Belum', 'Y', 'Mahasiswa');

-- --------------------------------------------------------

--
-- Table structure for table `tb_informasi`
--

CREATE TABLE `tb_informasi` (
  `id` int(11) NOT NULL,
  `tahun_ajaran` varchar(300) NOT NULL,
  `tanggal_pelaksanaan` date NOT NULL,
  `sampai` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_informasi`
--

INSERT INTO `tb_informasi` (`id`, `tahun_ajaran`, `tanggal_pelaksanaan`, `sampai`) VALUES
(1, '2021/2022', '2022-08-09', '2022-09-19');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kandidat`
--

CREATE TABLE `tb_kandidat` (
  `id` int(11) NOT NULL,
  `nomor_kandidat` char(5) NOT NULL,
  `nama_ketua` varchar(300) NOT NULL,
  `nama_wakil` varchar(300) NOT NULL,
  `visi` text NOT NULL,
  `misi` text NOT NULL,
  `foto_kandidat` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kandidat`
--

INSERT INTO `tb_kandidat` (`id`, `nomor_kandidat`, `nama_ketua`, `nama_wakil`, `visi`, `misi`, `foto_kandidat`) VALUES
(1, '1', 'e', 'f', '<p>fferrffr</p>', '<p>fffefrr</p>', '1101626820_3426526.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kelas`
--

CREATE TABLE `tb_kelas` (
  `id` int(11) NOT NULL,
  `nama_kelas` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kelas`
--

INSERT INTO `tb_kelas` (`id`, `nama_kelas`) VALUES
(1, 'TESTER 1');

-- --------------------------------------------------------

--
-- Table structure for table `view_pemilihan`
--

CREATE TABLE `view_pemilihan` (
  `id` int(11) NOT NULL,
  `no_kandidat` varchar(300) NOT NULL,
  `nama_kandidat` varchar(300) NOT NULL,
  `username` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `akses_menu`
--
ALTER TABLE `akses_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `identitas_kampus`
--
ALTER TABLE `identitas_kampus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_informasi`
--
ALTER TABLE `tb_informasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_kandidat`
--
ALTER TABLE `tb_kandidat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `view_pemilihan`
--
ALTER TABLE `view_pemilihan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `akses_menu`
--
ALTER TABLE `akses_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `identitas_kampus`
--
ALTER TABLE `identitas_kampus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_informasi`
--
ALTER TABLE `tb_informasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_kandidat`
--
ALTER TABLE `tb_kandidat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `view_pemilihan`
--
ALTER TABLE `view_pemilihan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `akses_menu`
--
ALTER TABLE `akses_menu`
  ADD CONSTRAINT `fk_iduser_aksesmenu` FOREIGN KEY (`id`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
