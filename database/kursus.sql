-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Des 2021 pada 02.04
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kursus`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `paket`
--

CREATE TABLE `paket` (
  `id_paket` int(11) NOT NULL,
  `nama_paket` varchar(128) NOT NULL,
  `jangka_waktu` varchar(20) NOT NULL,
  `biaya` varchar(30) NOT NULL,
  `deskripsi` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `paket`
--

INSERT INTO `paket` (`id_paket`, `nama_paket`, `jangka_waktu`, `biaya`, `deskripsi`) VALUES
(1, 'Small Star', '1 Bulan', 'Rp. 250.000', 'Reading'),
(2, 'High Flyers', '3 Bulan', 'Rp. 650.000', 'Reading and Listening'),
(3, 'trailblazers', '6 Bulan', 'Rp. 1.250.000', 'Reading, Listening, and Writing'),
(8, 'frontrunner', '1 Bulan', 'Rp. 2.250.000', 'Reading, Listening, Writing and Speaking');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `id_pendaftaran` int(11) NOT NULL,
  `tgl_pendaftaran` date NOT NULL,
  `nama` varchar(128) NOT NULL,
  `ttl` varchar(128) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `pendidikan` varchar(20) NOT NULL,
  `id_paket` int(11) NOT NULL,
  `status_pembayaran` varchar(20) NOT NULL,
  `status_peserta` varchar(30) NOT NULL,
  `id_user` int(11) NOT NULL,
  `aktif_mulai` date DEFAULT NULL,
  `aktif_selesai` date DEFAULT NULL,
  `sertifikat` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pendaftaran`
--

INSERT INTO `pendaftaran` (`id_pendaftaran`, `tgl_pendaftaran`, `nama`, `ttl`, `alamat`, `no_hp`, `pendidikan`, `id_paket`, `status_pembayaran`, `status_peserta`, `id_user`, `aktif_mulai`, `aktif_selesai`, `sertifikat`) VALUES
(3, '2021-12-17', 'Selena Gomez', 'Jakarta, 21 Agustus 1998', 'Jl. Kramat Raya No.98', '08569868575', 'SMK', 1, 'Verifikasi Diterima', 'Selesai', 3, '2021-12-01', '2021-12-30', 'selena.jpg'),
(7, '2021-12-20', 'Handi Guna Prasetia', 'Sukabumi, 26 Agustus 1997', 'Jl. Kramat Raya No.98', '08569868575', 'SMA/SMK', 2, 'Verifikasi Diterima', 'Aktif', 18, '2021-12-20', '2022-03-20', NULL),
(8, '2021-12-20', 'Handi Guna Prasetia', 'Jakarta, 21 Agustus 1998', 'Jl. Kramat Raya No.98', '08569868575', 'SMA/SMK', 8, 'Belum Diverifikasi', 'Belum Aktif', 18, NULL, NULL, NULL),
(9, '2021-12-20', 'Handi Guna Prasetia', 'Cianjur, 01 Oktober 1996', 'Asrama brimob Cipinang RT 004, RW 005 Kelurahan Cipinang', '085652248695', 'UMUM', 1, 'Verifikasi Diterima', 'Selesai', 18, '2021-12-20', '2021-11-20', 'sertifikat1.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(1, 'Nurul Hikmah', 'nurulhikmah@gmail.com', '_kimetsu_no_yaiba__chibi_nezuko_by_hunterk_dd6szij-fullview.png', '$2y$10$C433Dm.nwcw0VzRkgv0d3eLYmeW3y0Ew7zQKHM2EwjPJiupUMaIW.', 1, 1, 1637820904),
(2, 'Agung Prayogi', 'agungprayogi@gmail.com', '24f5fea74a8d0d2fd3a34fa16d895dbd.png', '$2y$10$/HZOTcC0unRArwaw/hXsguju5ITc2EIMGbYlSlkxx636l.odjD0IO', 2, 1, 1637893861),
(3, 'Selena Gomez', 'nuciha2816@gmail.com', 'default.jpg', '$2y$10$P9xa/VtoiIncQYMwRUvdkOJdyc37v.WphRyDozLKM0xwq0SB8MD26', 2, 1, 1638547609),
(18, 'Handi Guna Prasetia', 'handigprasetia10@gmail.com', 'WhatsApp_Image_2021-12-20_at_13_24_43.jpg', '$2y$10$ntXfiG.39Pq/ONZHy3Th9uLDpAM11RGVP1PuVz2WcwB4IieXzlbRO', 2, 1, 1639719495);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 2),
(4, 1, 3),
(5, 2, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Menu'),
(4, 'Pendaftaran');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Admin'),
(2, 'User');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 1, 'My Profile', 'user', 'fas fa-fw fa-user', 1),
(3, 1, 'Edit Profile', 'user/edit', 'fas fa-fw fa-user-edit', 1),
(4, 3, 'Menu Management', 'menu', 'fas fa-fw fa-folder\r\n\r\n', 1),
(5, 3, 'Submenu Management', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(6, 1, 'Role', 'admin/role', 'fas fa-fw fa-user-tie', 1),
(7, 2, 'Change Password', 'user/changepassword', 'fas fa-fw fa-key', 1),
(8, 3, 'Paket', 'menu/paket', 'fas fa-fw fa-book', 1),
(10, 4, 'Pendaftaran', 'user/pendaftaran', 'fas fa-fw fa-user-plus', 1),
(11, 3, 'Pendaftaran', 'menu/datapendaftar', 'fas fa-fw fa-list', 1),
(13, 4, 'Riwayat Pendaftaran', 'user/riwayatdaftar', 'fas fa-fw fa-book', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `date_created`) VALUES
(13, 'nuciha2816@gmail.com', 'nkGshocvNHdjibz2pVSh7Tm6PBn33Ls5XV8K3+5vufU=', 1638597229),
(14, 'nuciha2816@gmail.com', '/9IAKlVnAJqXJC7A1ajWne6uiXcpAl6xY2Agtzq0LtQ=', 1638597437),
(15, 'nuciha2816@gmail.com', 'euGGNCgOpYMVwETLINQ3peMwQGCUKN460llgj/Y3Mkw=', 1638597560),
(16, 'nuciha2816@gmail.com', '05Gxq6WdY9zRIaa/86ucDSVSTxKrl3cNJhTKTqlBhKI=', 1638627664),
(17, 'nuciha2816@gmail.com', 'AKT/P1Eg5mRpQLTuEm1V938spWQQzjTKEsrujWl+T9A=', 1638628980),
(18, 'nuciha2816@gmail.com', 'XszHt4+bfmtGvMIratMHkuCkTqmoeNVNXnxgSpayh0A=', 1638630231),
(19, 'maulidayustikarina20@gmail.com', 'yA6ZsXEC56h/NQAZFZ9E0NXWlnuoH36VHrn0ciiB9ts=', 1638704995),
(20, 'syarifahagustiani26@gmail.com', '8XjmVPoS5UH0cxMtwPBTH1wzHGCyQl4iFt3OkYx8Bv4=', 1639719495);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `view_daftar`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `view_daftar` (
`id_pendaftaran` int(11)
,`tgl_pendaftaran` date
,`nama` varchar(128)
,`ttl` varchar(128)
,`alamat` varchar(200)
,`no_hp` varchar(15)
,`pendidikan` varchar(20)
,`id_paket` int(11)
,`status_pembayaran` varchar(20)
,`status_peserta` varchar(30)
,`sertifikat` varchar(225)
,`id_user` int(11)
,`aktif_mulai` date
,`aktif_selesai` date
,`name` varchar(128)
,`email` varchar(128)
,`nama_paket` varchar(128)
,`jangka_waktu` varchar(20)
,`biaya` varchar(30)
);

-- --------------------------------------------------------

--
-- Struktur untuk view `view_daftar`
--
DROP TABLE IF EXISTS `view_daftar`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_daftar`  AS SELECT `pendaftaran`.`id_pendaftaran` AS `id_pendaftaran`, `pendaftaran`.`tgl_pendaftaran` AS `tgl_pendaftaran`, `pendaftaran`.`nama` AS `nama`, `pendaftaran`.`ttl` AS `ttl`, `pendaftaran`.`alamat` AS `alamat`, `pendaftaran`.`no_hp` AS `no_hp`, `pendaftaran`.`pendidikan` AS `pendidikan`, `pendaftaran`.`id_paket` AS `id_paket`, `pendaftaran`.`status_pembayaran` AS `status_pembayaran`, `pendaftaran`.`status_peserta` AS `status_peserta`, `pendaftaran`.`sertifikat` AS `sertifikat`, `pendaftaran`.`id_user` AS `id_user`, `pendaftaran`.`aktif_mulai` AS `aktif_mulai`, `pendaftaran`.`aktif_selesai` AS `aktif_selesai`, `user`.`name` AS `name`, `user`.`email` AS `email`, `paket`.`nama_paket` AS `nama_paket`, `paket`.`jangka_waktu` AS `jangka_waktu`, `paket`.`biaya` AS `biaya` FROM ((`pendaftaran` join `paket`) join `user`) WHERE `paket`.`id_paket` = `pendaftaran`.`id_paket` AND `pendaftaran`.`id_user` = `user`.`id` ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `paket`
--
ALTER TABLE `paket`
  ADD PRIMARY KEY (`id_paket`);

--
-- Indeks untuk tabel `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`id_pendaftaran`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `paket`
--
ALTER TABLE `paket`
  MODIFY `id_paket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `id_pendaftaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
