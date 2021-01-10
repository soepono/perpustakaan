-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Jan 2021 pada 11.31
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `id` int(11) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `pengarang` varchar(100) DEFAULT NULL,
  `penerbit` varchar(100) DEFAULT NULL,
  `katgori_id` int(11) NOT NULL,
  `kode_buku` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`id`, `judul`, `pengarang`, `penerbit`, `katgori_id`, `kode_buku`) VALUES
(1, 'Cara Cepat Mencegah Virus COVID-19', 'Supono', 'Elexmedia', 2, 'M001'),
(2, 'Pemrogram Web Dengan COdeigniter', 'Supono Syafiq', 'Elexmedia', 4, 'M002'),
(3, 'Pemrogram Web Dengan Codeigniter 3', 'Supono', 'Elexmedia', 1, 'M003'),
(4, 'Rahasia Menjadi Programmer', 'Budi', 'Gramedia', 2, 'M004'),
(5, 'Tips dan Triks Lulus Poltekpos', 'Raihan', 'Poltekpos', 1, 'M005'),
(6, 'Belajar Komputer Dasar', 'Deni', 'Gramedia', 1, 'M006'),
(7, 'Mahir Excel 2020', 'Kanza', 'Primajasa', 1, 'M007'),
(8, 'Sejarah Bangsa Indonesi', 'Sukarno', 'Mojo', 2, 'M008'),
(9, 'Siap Berwirusaha', 'Ayu', 'Elexmedia', 1, 'M009'),
(10, 'Jualan Online', 'Ratih', 'Gramedia', 2, 'M010'),
(11, 'Jalan Menuju Sukses Berbisnis Ikan Lele', 'Darimun', 'Elexmedia', 2, 'M011'),
(12, 'Belajar Youtuber', 'Supono', 'Elexmedia', 4, 'M012'),
(13, 'Aneka Makanan ringan', 'Ralis', 'Elexmedia', 4, 'M013'),
(14, 'Covid-19', 'Raihan', 'Elexmedia', 4, 'M013');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id`, `nama`) VALUES
(1, 'Komputer'),
(2, 'Sejarah'),
(4, 'Programmings');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `kode_buku` varchar(10) NOT NULL,
  `nomor_anggota` varchar(10) NOT NULL,
  `tanggal_pinjam` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tanggal_kembali` datetime NOT NULL,
  `status` enum('Dipinjam','Kembali') NOT NULL DEFAULT 'Dipinjam',
  `denda` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id`, `kode_buku`, `nomor_anggota`, `tanggal_pinjam`, `tanggal_kembali`, `status`, `denda`) VALUES
(1, 'M013', 'A002', '2020-07-21 19:01:20', '2020-07-28 14:01:20', 'Dipinjam', 0),
(2, 'M011', 'A003', '2020-07-21 19:14:00', '2020-07-21 14:17:45', 'Kembali', 0),
(3, 'M012', 'A003', '2020-12-25 10:21:46', '2020-12-25 04:21:48', 'Kembali', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama_lengkap` varchar(150) NOT NULL,
  `nomor_anggota` varchar(10) DEFAULT NULL,
  `hak_akses` enum('O','A','P') NOT NULL DEFAULT 'P'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `nama_lengkap`, `nomor_anggota`, `hak_akses`) VALUES
(1, 'supono', '123', 'Supono Syafiq', 'A001', 'P'),
(2, 'joko', '124', 'Joko Widodo', 'A002', 'P'),
(3, 'budi', '123', 'Budiaman Dinejad', 'A003', 'O'),
(4, 'admin', '123', 'Administrator Tea', 'A004', 'A');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `buku`
--
ALTER TABLE `buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
