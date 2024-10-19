-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Okt 2024 pada 10.54
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mariseminar`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `seminars`
--

CREATE TABLE `seminars` (
  `id` int(50) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `date` date NOT NULL,
  `capacity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `seminars`
--

INSERT INTO `seminars` (`id`, `title`, `description`, `date`, `capacity`) VALUES
(3, 'Struktur ploting baik dalam memanajemen project', 'KERJA', '2024-10-30', 34),
(5, 'Revolusi Industri 4.0: Tantangan dan Peluang bagi UMKM', 'Seminar ini akan membahas dampak transformasi digital terhadap Usaha Mikro, Kecil, dan Menengah (UMKM). Topik yang akan dibahas meliputi pemanfaatan teknologi informasi, e-commerce, dan digital marketing untuk meningkatkan daya saing UMKM.', '2024-10-31', 60),
(6, 'Kecerdasan Buatan: Mencetak Masa Depan atau Ancaman bagi Kemanusiaan?', 'Seminar ini akan mengupas tuntas mengenai teknologi kecerdasan buatan (AI). Pembicara akan membahas berbagai aspek AI, mulai dari pengembangan, aplikasi, hingga potensi dampaknya terhadap kehidupan manusia', '2024-11-09', 90);

-- --------------------------------------------------------

--
-- Struktur dari tabel `userdeleted`
--

CREATE TABLE `userdeleted` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL,
  `deleted_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `userdeleted`
--

INSERT INTO `userdeleted` (`id`, `name`, `email`, `role`, `deleted_at`) VALUES
(1, NULL, 'farisz@gmail.com', 'user', '2024-10-17 15:56:21'),
(2, NULL, 'wahyudin@gmail.com', 'user', '2024-10-17 17:17:47'),
(3, NULL, 'talenmuxzti002@gmail.com', 'user', '2024-10-18 17:29:54'),
(4, NULL, 'azindahc@gmail.com', 'user', '2024-10-18 17:29:58'),
(5, NULL, 'Agung@gmail.com', 'user', '2024-10-18 17:30:00'),
(6, NULL, 'william@gmail.com', 'user', '2024-10-18 17:30:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `role` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `created_at`, `role`) VALUES
(5, 'Supriyanto', 'supriyanto@gmail.com', '$2y$10$pZ.UeowFX194mKlRN5sBe.OGgEbV5jCDkfkmi7LtLniCRZPlJJtxO', '2024-10-17 15:35:31', 'admin'),
(11, 'Sigeri', 'Angger@gmail.com', '$2y$10$Z/INHExoffKLxxeGBMfGEeaWhft.egUsAmO6rxEwPxHp0/dYeVAEC', '2024-10-18 16:57:51', 'user'),
(12, 'tirta', 'talenmuxzti002@gmail.com', '$2y$10$skbVd4nIqxK.CTb/v/Rw3u4f2/9zlWIqaApwfw7fek2tndjSbqg1a', '2024-10-18 17:30:28', 'user');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_seminars`
--

CREATE TABLE `user_seminars` (
  `id` int(11) NOT NULL,
  `seminar_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user_seminars`
--

INSERT INTO `user_seminars` (`id`, `seminar_id`, `user_id`, `created_at`, `username`) VALUES
(1, 3, 11, '2024-10-18 17:25:15', ''),
(2, 3, 12, '2024-10-18 17:31:03', ''),
(3, 6, 12, '2024-10-18 17:31:10', ''),
(4, 5, 11, '2024-10-18 17:39:41', ''),
(5, 6, 11, '2024-10-19 00:23:58', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `seminars`
--
ALTER TABLE `seminars`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `userdeleted`
--
ALTER TABLE `userdeleted`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indeks untuk tabel `user_seminars`
--
ALTER TABLE `user_seminars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `seminar_id` (`seminar_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `seminars`
--
ALTER TABLE `seminars`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `userdeleted`
--
ALTER TABLE `userdeleted`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `user_seminars`
--
ALTER TABLE `user_seminars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `user_seminars`
--
ALTER TABLE `user_seminars`
  ADD CONSTRAINT `user_seminars_ibfk_1` FOREIGN KEY (`seminar_id`) REFERENCES `seminars` (`id`),
  ADD CONSTRAINT `user_seminars_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
