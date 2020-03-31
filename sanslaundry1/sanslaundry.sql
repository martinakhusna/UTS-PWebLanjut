-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Mar 2020 pada 12.10
-- Versi server: 10.1.34-MariaDB
-- Versi PHP: 5.6.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sanslaundry`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `laundry`
--

CREATE TABLE `laundry` (
  `id_laundry` int(11) NOT NULL,
  `nama_konsumen` varchar(45) DEFAULT NULL,
  `berat` int(11) DEFAULT NULL,
  `status` enum('masuk','keluar') DEFAULT NULL,
  `bayar` int(11) DEFAULT NULL,
  `tgl_masuk` varchar(20) CHARACTER SET latin1 COLLATE latin1_bin DEFAULT NULL,
  `tgl_keluar` varchar(20) DEFAULT NULL,
  `paket_id_paket` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `laundry`
--

INSERT INTO `laundry` (`id_laundry`, `nama_konsumen`, `berat`, `status`, `bayar`, `tgl_masuk`, `tgl_keluar`, `paket_id_paket`, `id_user`) VALUES
(19, 'Bash', 2, 'keluar', 16000, '02/20/2020', '02/22/2020', 1, 0),
(20, 'Wahyu', 1, 'masuk', 8000, '02/21/2020', NULL, 4, 0),
(21, 'rio', 4, 'masuk', 32000, '02/22/2020', NULL, 4, 0),
(23, 'minggar', 2, 'masuk', 16000, '02/23/2020', NULL, 4, 0),
(24, 'hanan', 3, 'masuk', 24000, '02/24/2020', NULL, 4, 0),
(26, 'ojan', 1, 'keluar', 5000, '03/01/2020', '03/05/2020', 1, 0),
(27, 'wahyu', 2, 'keluar', 16000, '03/04/2020', '03/05/2020', 1, 0),
(28, 'martinblabla', 4, 'masuk', 40000, '03/11/2020', '03/14/2020', 1, 5),
(29, 'karisma', 2, 'keluar', 16000, '03/03/2020', '03/06/2020', 1, 17),
(30, 'karina', 8, 'keluar', 80000, '03/09/2020', '03/11/2020', 1, 18);

-- --------------------------------------------------------

--
-- Struktur dari tabel `paket`
--

CREATE TABLE `paket` (
  `id_paket` int(11) NOT NULL,
  `nama_paket` varchar(45) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `paket`
--

INSERT INTO `paket` (`id_paket`, `nama_paket`, `harga`) VALUES
(1, 'Cuci Kering ', 4000),
(2, 'Cuci Setrika', 5000),
(3, 'Cuci Komplit', 6000),
(4, 'Express 4 Jam Selesai', 8000),
(5, 'Complit Santuy', 10000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(40) NOT NULL,
  `nama_usr` varchar(45) NOT NULL,
  `level` enum('super','admin') NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama_usr`, `level`, `status`) VALUES
(2, 'super', 'super', 'Fako ellanda', 'super', 'aktif'),
(3, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin', 'admin', 'aktif'),
(4, 'mopeko', '7347c69f09e2647adc3989f2e8e4d90b', 'Fako ellanda', 'admin', 'aktif'),
(5, 'martin', '827ccb0eea8a706c4c34a16891f84e7b', 'martinblabla', 'super', 'aktif'),
(7, 'bash', 'd574d4bb40c84861791a694a999cce69', 'bash', 'super', 'aktif'),
(9, 'wildan', '40568648eafc1e3add6cf4155045bdca', 'wildan', 'super', 'aktif'),
(17, 'kari', 'a01610228fe998f515a72dd730294d87', 'karisma', 'super', 'aktif'),
(18, 'karin', '87c2bb2e46e63ecc018b7bb6eb2f5057', 'karina', 'super', 'aktif');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `laundry`
--
ALTER TABLE `laundry`
  ADD PRIMARY KEY (`id_laundry`),
  ADD KEY `fk_laundry_paket_idx` (`paket_id_paket`);

--
-- Indeks untuk tabel `paket`
--
ALTER TABLE `paket`
  ADD PRIMARY KEY (`id_paket`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `laundry`
--
ALTER TABLE `laundry`
  MODIFY `id_laundry` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `paket`
--
ALTER TABLE `paket`
  MODIFY `id_paket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `laundry`
--
ALTER TABLE `laundry`
  ADD CONSTRAINT `fk_laundry_paket` FOREIGN KEY (`paket_id_paket`) REFERENCES `paket` (`id_paket`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
