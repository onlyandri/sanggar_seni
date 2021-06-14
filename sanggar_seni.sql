-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Mar 2021 pada 01.37
-- Versi server: 10.1.36-MariaDB
-- Versi PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sanggar_seni`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `balas_komentar`
--

CREATE TABLE `balas_komentar` (
  `id_balas` int(11) NOT NULL,
  `id_komentar` int(11) NOT NULL,
  `balas_komen` text NOT NULL,
  `tanggal_balasan` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(30) NOT NULL,
  `icon` varchar(35) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `icon`, `deskripsi`) VALUES
(1, 'seni tari', '3.png', 'sanggar tari'),
(2, 'seni musik', '9.png', 'seni musik bergerak dibidang musik'),
(4, 'Seni Gamelan', '2.png', 'melestarikan budaya gamelan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kecamatan`
--

CREATE TABLE `kecamatan` (
  `id_kecamatan` int(11) NOT NULL,
  `nama_kecamatan` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kecamatan`
--

INSERT INTO `kecamatan` (`id_kecamatan`, `nama_kecamatan`) VALUES
(1, 'Pekalongan Barat'),
(2, 'Pekalongan Selatan'),
(3, 'Pekalongan Timur'),
(4, 'Pekalongan Utara');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id_kegiatan` int(11) NOT NULL,
  `id_sanggar` int(11) NOT NULL,
  `nama_kegiatan` varchar(100) NOT NULL,
  `deskripsi_kegiatan` text NOT NULL,
  `foto_kegiatan` varchar(100) NOT NULL,
  `tanggal_posting` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kegiatan`
--

INSERT INTO `kegiatan` (`id_kegiatan`, `id_sanggar`, `nama_kegiatan`, `deskripsi_kegiatan`, `foto_kegiatan`, `tanggal_posting`) VALUES
(2, 1, 'kunjungan bapak presiden ke ah', '<h5 style=\"line-height: 1.2em; font-size: 14px; color: rgb(85, 97, 114); font-family: Roboto, sans-serif; position: relative; padding-left: 75px; text-transform: uppercase;\">ABOUT US</h5><h2 style=\"margin-top: 19px; margin-bottom: 38px; font-weight: 600; line-height: 1.1; font-size: 42px; color: rgb(12, 46, 96); font-family: Poppins, sans-serif; position: relative;\">Learning with Love and Laughter</h2><p style=\"margin-bottom: 7px; font-family: Roboto, sans-serif; line-height: 1.929; font-size: 14px; color: rgb(136, 136, 136);\">Fifth saying upon divide divide rule for deep their female all hath brind Days and beast greater grass signs abundantly have greater also days years under brought moveth.</p><ul style=\"margin-right: 0px; margin-bottom: 30px; margin-left: 0px; list-style: none; padding: 0px; color: rgb(33, 37, 41); font-family: Roboto, sans-serif; font-size: 14px;\"><li style=\"display: inline-block; margin-bottom: 10px; padding-left: 33px; padding-top: 12px; color: rgb(136, 136, 136);\"><span class=\"ti-pencil-alt\" style=\"font-family: themify; speak: none; font-variant-numeric: normal; font-variant-east-asian: normal; line-height: 1; -webkit-font-smoothing: antialiased; margin-right: 17px; font-size: 16px; position: absolute; left: 15px; padding-top: 2px;\"></span>Him lights given i heaven second yielding seas gathered wear</li>&nbsp;<li style=\"display: inline-block; margin-bottom: 10px; padding-left: 33px; padding-top: 12px; color: rgb(136, 136, 136);\"><span class=\"ti-ruler-pencil\" style=\"font-family: themify; speak: none; font-variant-numeric: normal; font-variant-east-asian: normal; line-height: 1; -webkit-font-smoothing: antialiased; margin-right: 17px; font-size: 16px; position: absolute; left: 15px; padding-top: 2px;\"></span>Fly female them whales fly them day deep given night.</li></ul><h5 style=\"line-height: 1.2em; font-size: 14px; color: rgb(85, 97, 114); font-family: Roboto, sans-serif; position: relative; padding-left: 75px; text-transform: uppercase;\">ABOUT US</h5><h2 style=\"margin-top: 19px; margin-bottom: 38px; font-weight: 600; line-height: 1.1; font-size: 42px; color: rgb(12, 46, 96); font-family: Poppins, sans-serif; position: relative;\">Learning with Love and Laughter</h2><p style=\"margin-bottom: 7px; font-family: Roboto, sans-serif; line-height: 1.929; font-size: 14px; color: rgb(136, 136, 136);\">Fifth saying upon divide divide rule for deep their female all hath brind Days and beast greater grass signs abundantly have greater also days years under brought moveth.</p><ul style=\"margin-right: 0px; margin-bottom: 30px; margin-left: 0px; list-style: none; padding: 0px; color: rgb(33, 37, 41); font-family: Roboto, sans-serif; font-size: 14px;\"><li style=\"display: inline-block; margin-bottom: 10px; padding-left: 33px; padding-top: 12px; color: rgb(136, 136, 136);\"><span class=\"ti-pencil-alt\" style=\"font-family: themify; speak: none; font-variant-numeric: normal; font-variant-east-asian: normal; line-height: 1; -webkit-font-smoothing: antialiased; margin-right: 17px; font-size: 16px; position: absolute; left: 15px; padding-top: 2px;\"></span>Him lights given i heaven second yielding seas gathered wear</li>&nbsp;<li style=\"display: inline-block; margin-bottom: 10px; padding-left: 33px; padding-top: 12px; color: rgb(136, 136, 136);\"><span class=\"ti-ruler-pencil\" style=\"font-family: themify; speak: none; font-variant-numeric: normal; font-variant-east-asian: normal; line-height: 1; -webkit-font-smoothing: antialiased; margin-right: 17px; font-size: 16px; position: absolute; left: 15px; padding-top: 2px;\"></span>Fly female them whales fly them day deep given night.</li></ul>', 'percobaan.jpg', '2021-03-25 09:57:23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelurahan`
--

CREATE TABLE `kelurahan` (
  `id_kelurahan` int(11) NOT NULL,
  `id_kecamatan` int(11) NOT NULL,
  `nama_kelurahan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kelurahan`
--

INSERT INTO `kelurahan` (`id_kelurahan`, `id_kecamatan`, `nama_kelurahan`) VALUES
(1, 1, 'Bendan Kergon'),
(2, 1, 'Medono'),
(3, 1, 'Pasirkratonkramat'),
(4, 1, 'Podosugih'),
(5, 1, 'Pringrejo'),
(6, 1, 'Sapuro Kebulen'),
(7, 1, 'Tirto'),
(8, 2, 'Banyurip'),
(9, 2, 'Buaran Kradenan'),
(10, 2, 'Jenggot'),
(11, 2, 'Kuripan Kertoharjo'),
(12, 2, 'Kuripan Yosorejo'),
(13, 2, 'Sokoduwet'),
(14, 3, 'Noyontaansari'),
(15, 3, 'Kauman'),
(16, 3, 'Poncol'),
(17, 3, 'Klego'),
(18, 3, 'Gamer'),
(19, 3, 'Setono'),
(20, 3, 'Kalibaros'),
(21, 4, 'Bandengan'),
(22, 4, 'Degayu'),
(23, 4, 'Krapyak'),
(24, 4, 'Kandang Panjang'),
(25, 4, 'Panjang Baru'),
(26, 4, 'Panjang Wetan'),
(27, 4, 'Padukuhan Kraton');

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentar`
--

CREATE TABLE `komentar` (
  `id_komentar` int(11) NOT NULL,
  `id_kegiatan` int(11) NOT NULL,
  `email_komentar` varchar(50) NOT NULL,
  `komen` text NOT NULL,
  `nama_komentar` varchar(50) NOT NULL,
  `tanggal_komentar` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `komentar`
--

INSERT INTO `komentar` (`id_komentar`, `id_kegiatan`, `email_komentar`, `komen`, `nama_komentar`, `tanggal_komentar`) VALUES
(1, 2, 'onlyandri@gmail.com', 'kemana kau selama ini', 'andri', '2021-03-26 06:14:27'),
(2, 2, 'yusuf@gmail.com', 'biadari yang kunanti, kenapa baru sekarang, dudududu kita dipertemukan', 'yusuf', '2021-03-26 06:16:39'),
(3, 2, 'barhmono@gmail.com', 'inikah yang dinamakan semakin jauh kau menyelam akan semakin sesak nafas\r\n', 'brahmonojoyo', '2021-03-26 06:18:11'),
(4, 2, 'ter@gmail.com', 'kemana kamu akan pergi doraemon', 'ter', '2021-03-26 06:18:41');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sanggar`
--

CREATE TABLE `sanggar` (
  `id_sanggar` int(11) NOT NULL,
  `id_otomatis` varchar(11) NOT NULL,
  `nik` varchar(15) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_kelurahan` int(11) NOT NULL,
  `nama_sanggar` varchar(100) NOT NULL,
  `nama_ketua` varchar(40) NOT NULL,
  `email_ketua` varchar(50) NOT NULL,
  `rt` char(5) NOT NULL,
  `rw` char(5) NOT NULL,
  `longitude` varchar(30) NOT NULL,
  `latitude` varchar(30) NOT NULL,
  `ktp` varchar(30) NOT NULL,
  `berkas` varchar(30) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `pesan` text NOT NULL,
  `status` int(11) NOT NULL,
  `password` varchar(100) NOT NULL,
  `foto_ketua` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sanggar`
--

INSERT INTO `sanggar` (`id_sanggar`, `id_otomatis`, `nik`, `id_kategori`, `id_kelurahan`, `nama_sanggar`, `nama_ketua`, `email_ketua`, `rt`, `rw`, `longitude`, `latitude`, `ktp`, `berkas`, `foto`, `pesan`, `status`, `password`, `foto_ketua`) VALUES
(1, 'sgr000001', '12345', 1, 3, 'Sujiwo Sutedjo', 'sujiwo', 'onlyandri97@gmail.com', '08', '08', '109.6723716786406', '-6.898616524969267', '8.jpg', '2.pdf', '2.jpg', 'sanggar yang mengumpulkan sejuta umat untuk melakukan hal yang baik', 2, '$2y$10$LcmVJZuXwv2xbGPCXdX6rO4x9O2Ld1MDyZ98WLJWjOSzrOSmbfNl6', 'service.png'),
(2, 'sgr000002', '123456', 2, 8, 'LAWANG SEWU', 'agni', 'agnirosadi08@gmail.com', '07', '09', '109.67556139895312', '-6.8777622624305925', 'devil-boy-4k-f9.jpg', '21.pdf', '3.png', 'sanggar multi talenta', 4, '$2y$10$ol2GNm/k4HhDRDATqNYsn.de3Akn7RDCWmq0IKL/dFLBK.9ozWOL2', '2.png'),
(3, 'sgr000003', '1234', 4, 14, 'sejuta harapan', 'arep', 'arep@gmail.com', '01', '02', '109.65084216067187', '-6.877648646761576', 'OIP.jpg', '22.pdf', 'blog_1.png', 'sanggar yang sangat berguna bagi bangsa dan negara kita indonesia', 1, '$2y$10$ukc3tBZ.aWWW0CZJADtm8enqRSI04XIheZazYFKegDPSpOzDvUuGu', 'blog_3.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `password` varchar(250) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(34, 'Aji Prasetiyo', 'prast.ti19@gmail.com', 'default.jpg', '$2y$10$dCESS3a88IDBBZ5.hdffluotlb1Pa7.f5glq0N45jZonUVW0kVclq', 1, 1, '2021-01-01 04:28:17'),
(39, 'Nova', 'prast.ti17@gmail.com', 'default.jpg', '$2y$10$gIeIf6iBnW6m7zAFT6Pm6e.Eypquyoz/CfEAf.eVWyuOzzdyA3H6a', 2, 1, '2021-01-01 13:40:58'),
(41, 'andri only', 'andri@gmail.com', 'default.jpg', '$2y$10$L7vpyIF/0sCPkIx89YR1TuWNJFMJ8c.AZ/vDnfaXZgBfKGLP2InrG', 2, 1, '2021-03-25 05:25:41');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `token` varchar(200) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `date_created`) VALUES
(60, 'agnirosadi08@gmail.com', 'mYFr+cVWkEJ7mreYnA3cMhLuYSZogsKBqbWbYGQ=', 1616682110),
(61, 'agnirosadi08@gmail.com', 'OmdfCPPxt5i7S3Vj5p/qaPN+U0v4faPmW0TQN14=', 1616682257);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `balas_komentar`
--
ALTER TABLE `balas_komentar`
  ADD PRIMARY KEY (`id_balas`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id_kecamatan`);

--
-- Indeks untuk tabel `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id_kegiatan`);

--
-- Indeks untuk tabel `kelurahan`
--
ALTER TABLE `kelurahan`
  ADD PRIMARY KEY (`id_kelurahan`);

--
-- Indeks untuk tabel `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id_komentar`);

--
-- Indeks untuk tabel `sanggar`
--
ALTER TABLE `sanggar`
  ADD PRIMARY KEY (`id_sanggar`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `balas_komentar`
--
ALTER TABLE `balas_komentar`
  MODIFY `id_balas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `id_kecamatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id_kegiatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `kelurahan`
--
ALTER TABLE `kelurahan`
  MODIFY `id_kelurahan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id_komentar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `sanggar`
--
ALTER TABLE `sanggar`
  MODIFY `id_sanggar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT untuk tabel `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
