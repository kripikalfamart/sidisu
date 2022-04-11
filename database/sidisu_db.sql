-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Apr 2022 pada 10.17
-- Versi server: 10.1.32-MariaDB
-- Versi PHP: 7.2.5

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
-- Struktur dari tabel `tb_disposisi`
--

CREATE TABLE `tb_disposisi` (
  `id_disposisi` int(11) NOT NULL,
  `tujuan` varchar(65) NOT NULL,
  `isi_disposisi` text NOT NULL,
  `sifat` varchar(70) NOT NULL,
  `batas_waktu` date NOT NULL,
  `catatan` text NOT NULL,
  `id_suratmasuk` int(11) NOT NULL,
  `id_suratkeluar` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_index`
--

CREATE TABLE `tb_index` (
  `id_index` int(11) NOT NULL,
  `kode` char(20) NOT NULL,
  `nama_index` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_klasifikasi`
--

CREATE TABLE `tb_klasifikasi` (
  `id_klasifikasi` int(11) NOT NULL,
  `kode` char(20) NOT NULL,
  `nama` varchar(65) NOT NULL,
  `uraian` text NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_suratkeluar`
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

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_suratmasuk`
--

CREATE TABLE `tb_suratmasuk` (
  `id_suratmasuk` int(11) NOT NULL,
  `no_agenda` char(20) DEFAULT NULL,
  `no_surat` varchar(25) DEFAULT NULL,
  `asal_surat` varchar(45) DEFAULT NULL,
  `tujuan` varchar(45) DEFAULT NULL,
  `kode_klasifikasi` char(20) DEFAULT NULL,
  `isi` text,
  `id indeks` int(11) DEFAULT NULL,
  `tgl_surat` date DEFAULT NULL,
  `tgl_terima` date DEFAULT NULL,
  `file` varchar(100) DEFAULT NULL,
  `keterangan` text,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_suratmasuk`
--

INSERT INTO `tb_suratmasuk` (`id_suratmasuk`, `no_agenda`, `no_surat`, `asal_surat`, `tujuan`, `kode_klasifikasi`, `isi`, `id indeks`, `tgl_surat`, `tgl_terima`, `file`, `keterangan`, `id_user`) VALUES
(1, '343', 'ddfd', NULL, 'fdsfs', NULL, NULL, NULL, NULL, NULL, 'db-struk-pembayaran3.docx', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_users`
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
-- Dumping data untuk tabel `tb_users`
--

INSERT INTO `tb_users` (`id_user`, `username`, `email`, `password`, `level`, `status_akun`, `mendaftar`) VALUES
(1, 'admin', '', '$2y$10$GU7mYU4YF3jjWT253FkfA.oJtjgxRilF5OguKSXaBYO6BUgbWX2Ha', 'admin', 'aktif', '2021-07-07 19:06:06'),
(2, 'budi', 'budisihabudin64@gmail.com', '$2y$10$.DLePIHEhy41QPlV6sTBCe6.njypml.OUTg54ydIHHXOXPUI6naGq', 'pemilik', 'aktif', '2022-02-06 00:03:32');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_disposisi`
--
ALTER TABLE `tb_disposisi`
  ADD PRIMARY KEY (`id_disposisi`);

--
-- Indeks untuk tabel `tb_index`
--
ALTER TABLE `tb_index`
  ADD PRIMARY KEY (`id_index`);

--
-- Indeks untuk tabel `tb_klasifikasi`
--
ALTER TABLE `tb_klasifikasi`
  ADD PRIMARY KEY (`id_klasifikasi`);

--
-- Indeks untuk tabel `tb_suratkeluar`
--
ALTER TABLE `tb_suratkeluar`
  ADD PRIMARY KEY (`id_suratkeluar`);

--
-- Indeks untuk tabel `tb_suratmasuk`
--
ALTER TABLE `tb_suratmasuk`
  ADD PRIMARY KEY (`id_suratmasuk`);

--
-- Indeks untuk tabel `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_disposisi`
--
ALTER TABLE `tb_disposisi`
  MODIFY `id_disposisi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_index`
--
ALTER TABLE `tb_index`
  MODIFY `id_index` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_klasifikasi`
--
ALTER TABLE `tb_klasifikasi`
  MODIFY `id_klasifikasi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_suratkeluar`
--
ALTER TABLE `tb_suratkeluar`
  MODIFY `id_suratkeluar` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_suratmasuk`
--
ALTER TABLE `tb_suratmasuk`
  MODIFY `id_suratmasuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
