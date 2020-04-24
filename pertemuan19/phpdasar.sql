-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Apr 2020 pada 19.23
-- Versi server: 10.4.8-MariaDB
-- Versi PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpdasar`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cars`
--

CREATE TABLE `cars` (
  `id` int(11) NOT NULL,
  `edisi` varchar(70) NOT NULL,
  `harga` int(16) NOT NULL,
  `transmisi` varchar(30) NOT NULL,
  `bahan_bakar` varchar(30) NOT NULL,
  `mesin` varchar(30) NOT NULL,
  `tempat_duduk` varchar(30) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `cars`
--

INSERT INTO `cars` (`id`, `edisi`, `harga`, `transmisi`, `bahan_bakar`, `mesin`, `tempat_duduk`, `gambar`) VALUES
(1, 'Mini Cooper Cabrio', 865000000, 'Otomatis', 'Pertamax', '1499 cc', '4 seats', 'cabrio.jpg'),
(2, 'Mini Cooper Countryman', 735000000, 'Otomatis', 'Bensin', '1499 cc', '5 seats', 'countryman.jpg'),
(3, 'Mini Cooper 3-Door', 765000000, 'Otomatis', 'Bensin', '1498 cc', '4 seats', '3door.jpg'),
(4, 'Mini Cooper 5-Door', 795000000, 'Otomatis', 'Bensin', '1499 cc', '5 seats', '5door.jpg'),
(5, 'Mini Clubman Cooper S', 1040000000, 'Manual', 'Bensin', '2000 cc', '6 seats', '5e55753d61eda.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'ichlasulamal', '$2y$10$2odoX0MZZZ6peRB4Wz1wOO1v7RYfHb1yys2ECF3yN/gXNJC1dHSSC'),
(2, 'akbarkr', '$2y$10$8T//ZCCCrAdLVwhaOP03bO9Y6RZwVbbYogkXgM3xXbnZQo0Sn61YC');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
