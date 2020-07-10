-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Jul 2020 pada 08.17
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e_ppdb`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_alamat`
--

CREATE TABLE `data_alamat` (
  `id` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `longitude` varchar(100) NOT NULL,
  `latitude` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `jarak` text NOT NULL,
  `url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_asal_sekolah`
--

CREATE TABLE `data_asal_sekolah` (
  `id` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `nama_sekolah` varchar(150) NOT NULL,
  `nama_kepala_sekolah` varchar(150) NOT NULL,
  `nis` varchar(30) NOT NULL,
  `nisn` varchar(30) NOT NULL,
  `status_sekolah` varchar(30) NOT NULL,
  `tahun_lulus` varchar(50) NOT NULL,
  `nem` varchar(20) NOT NULL,
  `alamat_sekolah` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_jurusan`
--

CREATE TABLE `data_jurusan` (
  `id` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `jurusan1` varchar(30) NOT NULL,
  `jurusan2` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_pendaftar`
--

CREATE TABLE `data_pendaftar` (
  `id_pendaftar` int(11) NOT NULL,
  `kode_pendaftar` varchar(100) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tanggal_lahir` varchar(100) NOT NULL,
  `agama` varchar(30) NOT NULL,
  `nik` varchar(50) NOT NULL,
  `no_telp` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `status_pendaftaran`
--

CREATE TABLE `status_pendaftaran` (
  `id` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `uploads`
--

CREATE TABLE `uploads` (
  `id` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_admin`
--

CREATE TABLE `users_admin` (
  `id_admin` int(11) NOT NULL,
  `kode_pendaftar` varchar(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(300) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users_admin`
--

INSERT INTO `users_admin` (`id_admin`, `kode_pendaftar`, `username`, `email`, `password`, `role`) VALUES
(3, '', 'Zamzam Saputra', 'dev@itszami.my.id', '$2y$10$Gwe57Tn732cyHT//SDmhb.m/P98UULLlnrgFN2.aUfMNEqDvrOdpy', 'admin'),
(23, '', 'ItsZami', 'admin@gmail.com', '$2y$10$JT7eO7WLB7/WlWNnjwgowuKlgoJ4chdLUxfh0QIrUzzmaqYPS14kK', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_alamat`
--
ALTER TABLE `data_alamat`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_siswa` (`id_siswa`);

--
-- Indeks untuk tabel `data_asal_sekolah`
--
ALTER TABLE `data_asal_sekolah`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_siswa` (`id_siswa`);

--
-- Indeks untuk tabel `data_jurusan`
--
ALTER TABLE `data_jurusan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_siswa` (`id_siswa`);

--
-- Indeks untuk tabel `data_pendaftar`
--
ALTER TABLE `data_pendaftar`
  ADD PRIMARY KEY (`id_pendaftar`);

--
-- Indeks untuk tabel `status_pendaftaran`
--
ALTER TABLE `status_pendaftaran`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_siswa` (`id_siswa`);

--
-- Indeks untuk tabel `uploads`
--
ALTER TABLE `uploads`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users_admin`
--
ALTER TABLE `users_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_alamat`
--
ALTER TABLE `data_alamat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `data_asal_sekolah`
--
ALTER TABLE `data_asal_sekolah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `data_jurusan`
--
ALTER TABLE `data_jurusan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `data_pendaftar`
--
ALTER TABLE `data_pendaftar`
  MODIFY `id_pendaftar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `status_pendaftaran`
--
ALTER TABLE `status_pendaftaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `uploads`
--
ALTER TABLE `uploads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `users_admin`
--
ALTER TABLE `users_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `data_alamat`
--
ALTER TABLE `data_alamat`
  ADD CONSTRAINT `data_alamat_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `data_pendaftar` (`id_pendaftar`);

--
-- Ketidakleluasaan untuk tabel `data_asal_sekolah`
--
ALTER TABLE `data_asal_sekolah`
  ADD CONSTRAINT `data_asal_sekolah_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `data_pendaftar` (`id_pendaftar`);

--
-- Ketidakleluasaan untuk tabel `status_pendaftaran`
--
ALTER TABLE `status_pendaftaran`
  ADD CONSTRAINT `status_pendaftaran_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `data_pendaftar` (`id_pendaftar`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
