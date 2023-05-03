-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 03 Bulan Mei 2023 pada 01.49
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci4_logbook`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(5, '2023-04-25-083702', 'App\\Database\\Migrations\\TbRole', 'default', 'App', 1682477303, 1),
(6, '2023-04-25-083708', 'App\\Database\\Migrations\\TbUser', 'default', 'App', 1682477303, 1),
(7, '2023-04-25-084332', 'App\\Database\\Migrations\\TbLogbook', 'default', 'App', 1682477303, 1),
(8, '2023-04-25-084336', 'App\\Database\\Migrations\\TbLogbookKategori', 'default', 'App', 1682477303, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_logbook`
--

CREATE TABLE `tb_logbook` (
  `id_logbook` int(11) UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `mulai` time NOT NULL,
  `selesai` time NOT NULL,
  `penjelasan` text NOT NULL,
  `paraf` varchar(128) NOT NULL,
  `paraf_raw` text NOT NULL,
  `cid` int(11) DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `did` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tb_logbook`
--

INSERT INTO `tb_logbook` (`id_logbook`, `tanggal`, `mulai`, `selesai`, `penjelasan`, `paraf`, `paraf_raw`, `cid`, `uid`, `did`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '2023-05-01', '04:59:00', '06:59:00', 'Test ajah', '', '', 2, 2, NULL, '2023-05-01 04:59:39', '2023-05-01 05:05:33', NULL),
(2, '2023-05-01', '05:13:00', '11:13:00', 'galau itu bukan hanya buat yang gak punya pacar, galau juga berarti jika pacar kalian tuh gak pekka kali, CUAX', '', '', 5, 5, NULL, '2023-05-01 05:13:32', '2023-05-01 05:15:40', NULL),
(3, '2023-05-02', '05:11:00', '11:11:00', 'Kalau mata ku terpejam, di kala ada sesuatu yang menghalagi yaitu pedih nya sebuah hati', '', '', 2, 2, NULL, '2023-05-02 05:12:00', '2023-05-02 05:12:00', NULL),
(4, '2023-05-02', '06:49:00', '06:51:00', 'Cinta ini hanya untuk mu, dan tugas kamu hanya menerima ajah. gak boleh menolakh yakh ^_^', '', '', 2, 2, NULL, '2023-04-02 06:48:32', '2023-05-02 06:48:32', NULL),
(5, '2023-05-03', '06:36:00', '16:36:00', 'Kali waktu gak bisa di putar kembali, se engga nya jam nya atuh yang di putar', '', '', 3, 3, NULL, '2023-05-03 06:37:34', '2023-05-03 06:37:34', NULL),
(6, '2023-05-03', '06:47:00', '06:48:00', 'Kata seseungguhnya adalah kata yang dikit tapi mempunyai arti yang banyak.', '', '', 6, 6, NULL, '2023-05-03 06:47:29', '2023-05-03 06:47:29', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_logbook_kategori`
--

CREATE TABLE `tb_logbook_kategori` (
  `id_kategori` int(11) UNSIGNED NOT NULL,
  `nama_kategori` varchar(256) NOT NULL,
  `kode` varchar(100) NOT NULL,
  `is_pleace` int(11) NOT NULL,
  `cid` int(11) DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `did` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tb_logbook_kategori`
--

INSERT INTO `tb_logbook_kategori` (`id_kategori`, `nama_kategori`, `kode`, `is_pleace`, `cid`, `uid`, `did`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Proyek studi/proyek independen', 'PI-01', 0, 1, 2, NULL, '2023-04-25 15:52:00', '2023-05-03 05:10:54', NULL),
(2, 'Magang MBKM', 'MG-06', 1, 1, 1, NULL, '2023-04-25 15:52:00', '2023-04-25 15:52:00', NULL),
(3, 'Proyek Kewirausahaan ', 'KW-01', 1, 1, 2, NULL, '2023-04-25 15:52:00', '2023-05-01 04:34:17', NULL),
(4, 'aku', 'kakak', 1, 2, 2, 2, '2023-05-01 04:29:04', '2023-05-01 04:30:54', '2023-05-01 04:30:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_role`
--

CREATE TABLE `tb_role` (
  `id_role` int(11) UNSIGNED NOT NULL,
  `nama_role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tb_role`
--

INSERT INTO `tb_role` (`id_role`, `nama_role`) VALUES
(1, 'admin'),
(2, 'mahasiswa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) UNSIGNED NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(256) NOT NULL,
  `npm` varchar(20) NOT NULL,
  `nama_lengkap` varchar(128) NOT NULL,
  `gambar` varchar(256) NOT NULL,
  `id_role` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `tempat_mbkm` varchar(256) NOT NULL,
  `is_active` int(11) NOT NULL,
  `cid` int(11) DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `did` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `email`, `username`, `password`, `npm`, `nama_lengkap`, `gambar`, `id_role`, `id_kategori`, `tempat_mbkm`, `is_active`, `cid`, `uid`, `did`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'sistem@gmail.com', 'sistembot', '$2y$10$gPMuto4Jmuex6Z1vogUNlOw8JMpRC/e3GyGoMk1r04IEWG.EwCzOS', 'sistembot', 'sistem administrator', 'default.jpg', 1, 2, '', 1, 1, 2, NULL, '2023-04-25 15:52:00', '2023-05-02 04:28:57', NULL),
(2, 'admin@gmail.com', 'admin', '$2y$10$ghLvweiIMPk96LXO6KG2gO.r39kYybwWwwGHt3Z1LqLJXC.xRDX56', 'admin', 'administrator', 'default.jpg', 1, 1, 'aku ajah', 1, 1, 2, NULL, '2023-04-25 15:52:00', '2023-04-30 17:14:55', NULL),
(3, 'ilham@gmail.com', 'D1A200029', '$2y$10$uVtkkvHLb5l8v3CHH61Uc.7Cmy3IjhX6LE4FkXq6RP8QKWZqXdJxK', 'D1A200029', 'ilham samsul arifin', 'default.jpg', 2, 1, '', 1, 1, 1, NULL, '2023-04-25 15:52:00', '2023-04-26 12:34:47', NULL),
(5, 'epul@gmail.com', 'D1A200027', '$2y$10$d4Sxh5ophQwKcNPA2txskeHLGCctkrGjSOHJmpStMFoBWA0D2poC2', 'D1A200027', 'kang rebahan', 'default.jpg', 2, 2, 'Gabut', 1, 2, 5, NULL, '2023-04-26 12:41:43', '2023-05-03 06:34:47', NULL),
(6, 'wahyudin@gmail.com', 'D1A204008', '$2y$10$adFCfAwerQMLTm/faXcAue8Wm9ZAqZ7HNSlDzFAmsTIdHoQCqXpcq', 'D1A204008', 'Wahyudin', 'default.jpg', 2, 3, 'Usaha Tshrit', 1, 2, 2, NULL, '2023-05-03 06:45:51', '2023-05-03 06:45:51', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_logbook`
--
ALTER TABLE `tb_logbook`
  ADD PRIMARY KEY (`id_logbook`);

--
-- Indeks untuk tabel `tb_logbook_kategori`
--
ALTER TABLE `tb_logbook_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `tb_role`
--
ALTER TABLE `tb_role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tb_logbook`
--
ALTER TABLE `tb_logbook`
  MODIFY `id_logbook` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_logbook_kategori`
--
ALTER TABLE `tb_logbook_kategori`
  MODIFY `id_kategori` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_role`
--
ALTER TABLE `tb_role`
  MODIFY `id_role` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
