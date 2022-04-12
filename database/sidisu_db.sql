-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 12, 2022 at 02:40 PM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sidisu_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_disposisi`
--

CREATE TABLE `tb_disposisi` (
  `id_disposisi` int(11) NOT NULL,
  `tujuan_disposisi` varchar(65) NOT NULL,
  `isi_disposisi` text NOT NULL,
  `sifat` varchar(70) NOT NULL,
  `batas_waktu` date NOT NULL,
  `catatan` text NOT NULL,
  `id_suratmasuk` int(11) DEFAULT NULL,
  `id_suratkeluar` int(11) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_disposisi`
--

INSERT INTO `tb_disposisi` (`id_disposisi`, `tujuan_disposisi`, `isi_disposisi`, `sifat`, `batas_waktu`, `catatan`, `id_suratmasuk`, `id_suratkeluar`, `status`, `id_user`) VALUES
(1, 'Paman Gober', 'asd', 'Penting', '2022-04-12', 'asd', 2, NULL, NULL, 1),
(2, 'Kabag', 'Lanjutan', 'Biasa', '2022-04-20', 'asd', 2, NULL, NULL, 1),
(3, 'DIREKTUR', 'SUCSESS', 'Rahasia', '2022-04-12', 'asd', 2, NULL, NULL, 1),
(4, 'Paman Gober', 'asd', 'Biasa', '2022-04-12', 'asd', 2, NULL, 'Diprosess', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_index`
--

CREATE TABLE `tb_index` (
  `id_index` int(11) NOT NULL,
  `kode` char(20) NOT NULL,
  `nama_index` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_index`
--

INSERT INTO `tb_index` (`id_index`, `kode`, `nama_index`) VALUES
(2, 'IDX01', 'INDEX EDIT');

-- --------------------------------------------------------

--
-- Table structure for table `tb_klasifikasi`
--

CREATE TABLE `tb_klasifikasi` (
  `id_klasifikasi` int(11) NOT NULL,
  `kode` char(20) NOT NULL,
  `nama` varchar(65) NOT NULL,
  `uraian` text NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_klasifikasi`
--

INSERT INTO `tb_klasifikasi` (`id_klasifikasi`, `kode`, `nama`, `uraian`, `id_user`) VALUES
(1, 'ks01', 'ksq', 'dd', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_suratkeluar`
--

CREATE TABLE `tb_suratkeluar` (
  `id_suratkeluar` int(11) NOT NULL,
  `no_agenda` varchar(25) NOT NULL,
  `no_surat` varchar(25) NOT NULL,
  `tujuan` varchar(45) NOT NULL,
  `isi` text NOT NULL,
  `kode_klasifikasi` char(20) NOT NULL,
  `id_index` int(11) NOT NULL,
  `tgl_surat` varchar(20) NOT NULL,
  `tgl_catat` date NOT NULL,
  `file` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_suratkeluar`
--

INSERT INTO `tb_suratkeluar` (`id_suratkeluar`, `no_agenda`, `no_surat`, `tujuan`, `isi`, `kode_klasifikasi`, `id_index`, `tgl_surat`, `tgl_catat`, `file`, `keterangan`, `id_user`) VALUES
(1, '1', '230/x224/XI/2021', 'Paman Gober Update', 'asd Update', 'ks01', 2, '2022-04-12', '2022-04-12', '', 'asd Update', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_suratmasuk`
--

CREATE TABLE `tb_suratmasuk` (
  `id_suratmasuk` int(11) NOT NULL,
  `no_agenda` char(20) DEFAULT NULL,
  `no_surat` varchar(25) DEFAULT NULL,
  `asal_surat` varchar(45) DEFAULT NULL,
  `tujuan` varchar(45) DEFAULT NULL,
  `kode_klasifikasi` char(20) DEFAULT NULL,
  `isi` text,
  `id_indeks` int(11) DEFAULT NULL,
  `tgl_surat` date DEFAULT NULL,
  `tgl_terima` date DEFAULT NULL,
  `file` varchar(100) DEFAULT NULL,
  `keterangan` text,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_suratmasuk`
--

INSERT INTO `tb_suratmasuk` (`id_suratmasuk`, `no_agenda`, `no_surat`, `asal_surat`, `tujuan`, `kode_klasifikasi`, `isi`, `id_indeks`, `tgl_surat`, `tgl_terima`, `file`, `keterangan`, `id_user`) VALUES
(2, '1', '230/x224/XI/2021', 'Jampang 2', 'Paman Gober UPdate gambar', 'ks01', 'asd', 0, '2022-04-12', '2022-04-12', 'photo_2022-01-27_16-42-491.jpg', 'asd', 1),
(3, '1', '123', NULL, 'Paman Gober', 'ks01', 'surat keluar', 2, '2022-04-12', '2022-04-12', 'ig4.png', 'asd', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_users`
--

CREATE TABLE `tb_users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` enum('admin','pemilik') NOT NULL,
  `status_akun` enum('aktif','tidak aktif') NOT NULL,
  `mendaftar` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_users`
--

INSERT INTO `tb_users` (`id_user`, `username`, `email`, `password`, `level`, `status_akun`, `mendaftar`) VALUES
(1, 'admin', '', '$2y$10$GU7mYU4YF3jjWT253FkfA.oJtjgxRilF5OguKSXaBYO6BUgbWX2Ha', 'admin', 'aktif', '2021-07-07 19:06:06'),
(2, 'budi', 'budisihabudin64@gmail.com', '$2y$10$.DLePIHEhy41QPlV6sTBCe6.njypml.OUTg54ydIHHXOXPUI6naGq', 'pemilik', 'aktif', '2022-02-06 00:03:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_disposisi`
--
ALTER TABLE `tb_disposisi`
  ADD PRIMARY KEY (`id_disposisi`);

--
-- Indexes for table `tb_index`
--
ALTER TABLE `tb_index`
  ADD PRIMARY KEY (`id_index`);

--
-- Indexes for table `tb_klasifikasi`
--
ALTER TABLE `tb_klasifikasi`
  ADD PRIMARY KEY (`id_klasifikasi`);

--
-- Indexes for table `tb_suratkeluar`
--
ALTER TABLE `tb_suratkeluar`
  ADD PRIMARY KEY (`id_suratkeluar`);

--
-- Indexes for table `tb_suratmasuk`
--
ALTER TABLE `tb_suratmasuk`
  ADD PRIMARY KEY (`id_suratmasuk`);

--
-- Indexes for table `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_disposisi`
--
ALTER TABLE `tb_disposisi`
  MODIFY `id_disposisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_index`
--
ALTER TABLE `tb_index`
  MODIFY `id_index` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_klasifikasi`
--
ALTER TABLE `tb_klasifikasi`
  MODIFY `id_klasifikasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_suratkeluar`
--
ALTER TABLE `tb_suratkeluar`
  MODIFY `id_suratkeluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_suratmasuk`
--
ALTER TABLE `tb_suratmasuk`
  MODIFY `id_suratmasuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
