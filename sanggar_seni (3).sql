-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 18, 2021 at 08:41 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

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
-- Table structure for table `balas_komentar`
--

CREATE TABLE `balas_komentar` (
  `id_balas` int(11) NOT NULL,
  `id_komentar` int(11) NOT NULL,
  `balas_komen` text NOT NULL,
  `tanggal_balasan` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(30) NOT NULL,
  `icon` varchar(35) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `icon`, `deskripsi`) VALUES
(2, 'Seni Musik/Band', '9.png', 'seni musik bergerak dibidang musik'),
(4, 'Simthudurror Kesenian Islami', '2.png', 'Sanggar Kesenian Islami'),
(5, 'Samroh', '6.png', 'Kesenian Samroh'),
(6, 'Sanggar Teater', '8.png', 'Sanggar kesenian bidang teater'),
(7, 'Kesenian Rakyat', '7.png', 'Sanggar kesenian tradisional rakyat'),
(8, 'Seni Karawitan', '5.png', 'Sanggar kesenian karawitan'),
(9, 'Perfilman', '8.png', 'Sanggar seni perfilman'),
(10, 'Komunitas Musik Rakyat', '4.png', 'Komunitas musik tradisional rakyat seperti angklung dan kentongan'),
(11, 'Orkes Melayu (Dangdut)', '9.png', 'sanggar kesenian Orkes Melayu (Dangdut)'),
(12, 'Musik Keroncong', '12.png', 'Sanggar kesenian musik keroncong'),
(13, 'Kerajinan', '7.png', 'seni kerajinan seperti kerajinan tangan, reklame, dekorasi, dan lukisan'),
(14, 'Seni Sastra Perorangan', '8.png', 'Kesenian sastra perorangan'),
(15, 'Seni Tari', '1.png', 'sanggar seni tari');

-- --------------------------------------------------------

--
-- Table structure for table `kecamatan`
--

CREATE TABLE `kecamatan` (
  `id_kecamatan` int(11) NOT NULL,
  `nama_kecamatan` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kecamatan`
--

INSERT INTO `kecamatan` (`id_kecamatan`, `nama_kecamatan`) VALUES
(1, 'Pekalongan Barat'),
(2, 'Pekalongan Selatan'),
(3, 'Pekalongan Timur'),
(4, 'Pekalongan Utara');

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id_kegiatan` int(11) NOT NULL,
  `id_sanggar` int(11) NOT NULL,
  `nama_kegiatan` varchar(100) NOT NULL,
  `deskripsi_kegiatan` text NOT NULL,
  `foto_kegiatan` varchar(100) NOT NULL,
  `tanggal_posting` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status_posting` int(11) NOT NULL DEFAULT '0',
  `alasan` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kegiatan`
--

INSERT INTO `kegiatan` (`id_kegiatan`, `id_sanggar`, `nama_kegiatan`, `deskripsi_kegiatan`, `foto_kegiatan`, `tanggal_posting`, `status_posting`, `alasan`) VALUES
(3, 4, 'Gathering UKM Kesenian', '<p>gathering ukm kesenian seluruh kampus pekalongan</p><p>kekekekekekekeke</p>', 'IMG_20210203_064502.jpg', '2021-07-28 04:44:44', 1, NULL),
(4, 4, 'asdasdsd', '<p>asdasdasdasd</p>', 'covid.png', '2021-07-28 04:56:02', 1, 'postingan ini mengandung konten pornografi'),
(5, 4, 'asdasdsdkekekeekerkjekerk', '<p>asdasdasdasd kekekekekekekekkeke</p>', 'IMG_20210114_230735.jpg', '2021-07-04 07:44:34', 1, NULL),
(6, 17, 'hai nama saya histle', '<p>kemana perginya kelinci</p><p>kebandung katanya</p><p>kenapa semua yang berakhiran huruf a menajdi b</p>', 'percobaan1.jpg', '2021-07-28 04:56:58', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kelurahan`
--

CREATE TABLE `kelurahan` (
  `id_kelurahan` int(11) NOT NULL,
  `id_kecamatan` int(11) NOT NULL,
  `nama_kelurahan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelurahan`
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
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id_komentar` int(11) NOT NULL,
  `id_kegiatan` int(11) NOT NULL,
  `email_komentar` varchar(50) NOT NULL,
  `komen` text NOT NULL,
  `nama_komentar` varchar(50) NOT NULL,
  `tanggal_komentar` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sanggar`
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
  `longitude` varchar(30) NOT NULL,
  `latitude` varchar(30) NOT NULL,
  `ktp` varchar(30) NOT NULL,
  `berkas` varchar(30) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `pesan` text NOT NULL,
  `status` int(11) NOT NULL,
  `password` varchar(100) NOT NULL,
  `foto_ketua` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sanggar`
--

INSERT INTO `sanggar` (`id_sanggar`, `id_otomatis`, `nik`, `id_kategori`, `id_kelurahan`, `nama_sanggar`, `nama_ketua`, `email_ketua`, `longitude`, `latitude`, `ktp`, `berkas`, `foto`, `pesan`, `status`, `password`, `foto_ketua`, `alamat`, `no_hp`) VALUES
(2, 'sgr000002', '123456', 2, 8, 'LAWANG SEWU', 'agni', 'agnirosadi08@gmail.com', '109.67556139895312', '-6.8777622624305925', 'devil-boy-4k-f9.jpg', '21.pdf', '3.png', 'sanggar multi talenta', 3, '$2y$10$ol2GNm/k4HhDRDATqNYsn.de3Akn7RDCWmq0IKL/dFLBK.9ozWOL2', '2.png', '', ''),
(3, 'sgr000003', '1234', 4, 14, 'sejuta harapan', 'arep', 'arep@gmail.com', '109.65084216067187', '-6.877648646761576', 'OIP.jpg', '22.pdf', 'blog_1.png', 'sanggar yang sangat berguna bagi bangsa dan negara kita indonesia', 2, '$2y$10$ukc3tBZ.aWWW0CZJADtm8enqRSI04XIheZazYFKegDPSpOzDvUuGu', 'blog_3.png', 'rt 06 rw 02 dekat kolam renang tirta galih', '098797997'),
(4, 'sgr000004', '22334455', 2, 25, 'El Fata', 'Heru Darmawan', 'elfata231@gmail.com', '109.67750072479248', '-6.867163557137327', 'elfata.jpg', 'elfata2.jpg', 'elfata1.jpg', 'Kelompok musik UKM Kesenian IAIN Pekalonga', 2, '$2y$10$Qac.OX6vuoU68uWkz.hIaOIRfpFw/rllfpLHlzTTxRoFn9YPf/BZi', 'foto_diri.jpg', '', ''),
(5, 'sgr000005', '332617010807133', 10, 9, 'BaBe (Bamboe Berisik)', 'Thorik', 'bambuberisikbabe@gmail.com', '109.65745121240616', '-6.917512264939873', 'BABE.jpg', 'BABE2.jpg', 'BABE1.jpg', 'Komunitas musik rakyat Kethongan Bamboe Berisik ', 1, '$2y$10$Xnkm0PeW0IyEAwG3EOwr6O1DroEY30AjaprSaCGAc44WozyG.X01q', 'foto_diri1.jpg', '', ''),
(6, 'sgr000006', '332617010807133', 2, 14, 'El Mata', 'Miladianur', 'elmata876@gmail.com', '109.67907249927521', '-6.897914503879769', 'elmata.JPG', 'elmata2.JPG', 'elmata1.JPG', 'Musik gambus el mata', 1, '$2y$10$xBHmVL7iqpcvFL.eBTfYquafBCNlgCy.xGbE8nMnGu9IpDHpgq6P2', 'foto_diri2.jpg', '', ''),
(7, 'sgr000007', '132423545', 13, 11, 'Fariz Craft', 'Hamid', 'farizcraft9@gmail.com', '109.67568755149841', '-6.9162341748527965', 'fariz_craft.JPG', 'fariz_craft2.JPG', 'fariz_craft1.JPG', 'Showroom rumah produksi batik dan tenun Farizcraft', 2, '$2y$10$GKpyLGPHQXywmBKys/6GHeRU/5cdtAHuu.DQyePmIAz2lazR2UksS', 'foto_diri3.jpg', '', ''),
(8, 'sgr000008', '722990889029074', 10, 10, 'GPS (Gerakan Pemuda Setu)', 'Agus', 'gpsangklung@gmail.com', '109.66802673712658', '-6.913478170469527', 'GPS.JPG', 'GPS2.JPG', 'GPS1.JPG', 'komunitas musik Gerakan Pemuda Setu, AYO SHOLAWAT BARENG GPS!!', 1, '$2y$10$MMYa4oGSNPnDFYB53q.rsu9FMGGnLyYyNn/PWlsn1BCXRaDj1X5UO', 'foto_diri4.jpg', '', ''),
(9, 'sgr000009', '38929839098000', 10, 8, 'Garpu Cindai', 'Abdul Malik', 'cindaigarpu@gmail.com', '109.65162685122937', '-6.920804368705866', 'garpu_cindai.JPG', 'garpu_cindai2.JPG', 'garpu_cindai1.JPG', 'komunitas musik rakyat angklung garpu cindai', 4, '$2y$10$cDLEQlTsdkAj55grkDbz6u45VRZ6a7tVLnxdVfe2Hf0MSWw4/0ME.', 'foto_diri5.jpg', '', ''),
(12, 'sgr000012', '67467398632896', 10, 11, 'Kenthongan Laras Kahuripan', 'M. Risqon', 'kenthonganlaraskahuripan@gmail.com', '109.68005418777466', '-6.927790113586593', 'Laras_kahuripan.JPG', 'Laras_kahuripan2.JPG', 'Laras_kahuripan1.JPG', 'Sanggar angklung laras kahuripan ', 1, '$2y$10$Qz/gsXpEBen0jD45CAeF2ek7YIHIuu.TLolcJsIw5g/f5q/FBtVYC', 'foto_diri11.jpg', '', ''),
(13, 'sgr000013', '79039303545545', 12, 25, 'Krosmadu', 'Yoga', 'keroncongkrosmadu@gmail.com', '109.6791073679924', '-6.866599007813775', 'sma_2.jpg', 'sma_23.jpg', 'sma_21.jpg', 'Keroncong siswa SMA 2 Pekalongan', 1, '$2y$10$rDB5mfn7oO0ayXMu8q.HTu.bc4KRe5RQDNqZ3QL9i52wvTgrzNTqC', 'sma_22.jpg', '', ''),
(16, 'sgr000016', '123123123', 8, 17, 'robbana', 'firlanan', 'onlyandri@gmail.com', '109.63430107066377', '-6.9026394794791965', 'IMG20210404092710.jpg', 'BAB_I_(1).pdf', 'IMG202104040927101.jpg', 'werwer', 1, '$2y$10$/FSNu7Un.8W6v6QxMLsE4.HrNjiVTgvjyOz0FVzTF3tCTrkq/2QFi', 'PicsArt_04-04-12_10_55.png', 'kemana aku i', '09809232'),
(17, 'sgr000017', '123123123123', 5, 14, 'sanggar histle', 'alexander', 'onlyandri97@gmail.com', '109.61722514320134', '-6.897375065866368', 'WhatsApp_Image_2021-07-27_at_2', 'asaaaa.pdf', 'devil-boy-4k-f91.jpg', 'uiyaujksdjf', 2, '$2y$10$Mw/4974RVZ60rwejf8cKd.GFG60CtasSDC0OOSGfkNaQQNV0XOPPG', 'devil-boy-4k-f92.jpg', 'masukan alamat lengkap', '082220209043');

-- --------------------------------------------------------

--
-- Table structure for table `user`
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
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(34, 'andri', 'andri@gmail.com', 'default.jpg', '$2y$10$dCESS3a88IDBBZ5.hdffluotlb1Pa7.f5glq0N45jZonUVW0kVclq', 1, 1, '2021-06-28 08:31:15'),
(39, 'Nova', 'prast.ti17@gmail.com', 'default.jpg', '$2y$10$gIeIf6iBnW6m7zAFT6Pm6e.Eypquyoz/CfEAf.eVWyuOzzdyA3H6a', 2, 1, '2021-01-01 13:40:58'),
(41, 'Admin Dinas', 'sanggarseni@gmail.com', 'default.jpg', '$2y$10$Ky7vSQNDH9dUyP828laKVOV2AR6zpT7FOBuZDpVlk..r8XUYGg8CC', 2, 1, '2021-06-24 12:28:13');

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `token` varchar(200) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `date_created`) VALUES
(60, 'agnirosadi08@gmail.com', 'mYFr+cVWkEJ7mreYnA3cMhLuYSZogsKBqbWbYGQ=', 1616682110),
(61, 'agnirosadi08@gmail.com', 'OmdfCPPxt5i7S3Vj5p/qaPN+U0v4faPmW0TQN14=', 1616682257),
(65, 'agnirosadi08@gmail.com', '4TB6SJhuelV4KPLCPMaS3NiM5szWnwFiVTkcrso=', 1624597846),
(72, 'cindaigarpu@gmail.com', 'xJj5XBpiLYZO7rwd4i6UVzCZgriX/nSii6km9mM=', 1627446937),
(73, 'bandgeser@gmail.com', 'pb6ZQO+kIg3e5leKFkCdnIv43NDmHyDdA536Bio=', 1627446960);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `balas_komentar`
--
ALTER TABLE `balas_komentar`
  ADD PRIMARY KEY (`id_balas`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id_kecamatan`);

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id_kegiatan`);

--
-- Indexes for table `kelurahan`
--
ALTER TABLE `kelurahan`
  ADD PRIMARY KEY (`id_kelurahan`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id_komentar`);

--
-- Indexes for table `sanggar`
--
ALTER TABLE `sanggar`
  ADD PRIMARY KEY (`id_sanggar`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `balas_komentar`
--
ALTER TABLE `balas_komentar`
  MODIFY `id_balas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `id_kecamatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id_kegiatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kelurahan`
--
ALTER TABLE `kelurahan`
  MODIFY `id_kelurahan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id_komentar` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sanggar`
--
ALTER TABLE `sanggar`
  MODIFY `id_sanggar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
