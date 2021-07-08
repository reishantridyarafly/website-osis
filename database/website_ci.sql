-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2021 at 02:08 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `website_ci`
--

-- --------------------------------------------------------

--
-- Table structure for table `agenda`
--

CREATE TABLE `agenda` (
  `agenda_id` int(11) NOT NULL,
  `agenda_nama` varchar(150) NOT NULL,
  `agenda_tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `agenda_deskripsi` text NOT NULL,
  `agenda_mulai` date NOT NULL,
  `agenda_selesai` date NOT NULL,
  `agenda_tempat` varchar(100) DEFAULT NULL,
  `agenda_waktu` varchar(50) DEFAULT NULL,
  `agenda_author` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `agenda`
--

INSERT INTO `agenda` (`agenda_id`, `agenda_nama`, `agenda_tanggal`, `agenda_deskripsi`, `agenda_mulai`, `agenda_selesai`, `agenda_tempat`, `agenda_waktu`, `agenda_author`) VALUES
(11, 'Pembukaan PPBD Tahun 2021-2022', '2021-03-03 04:26:51', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo&nbsp;consequat.&nbsp;</p>', '2021-03-01', '2021-03-31', 'SMKN 4 KUNINGAN', '07.00 - 15.00 WIB', 'Reishan Tridya Rafly '),
(12, 'Kegiatan Bulanan SMKN 4 KUNINGAN', '2021-03-03 04:26:30', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo&nbsp;consequat.&nbsp;</p>', '2021-03-08', '2021-03-13', 'SMKN 4 KUNINGAN', '07.00 - 12.00 WIB', 'Reishan Tridya Rafly '),
(13, 'Pelantikan Pramuka Tahun 2021-2022', '2021-03-03 04:26:41', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo&nbsp;consequat.&nbsp;</p>', '2021-03-29', '2021-04-03', 'Lapang Cigarukgak', '07.00 - 15.00 WIB', 'Reishan Tridya Rafly ');

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE `album` (
  `album_id` int(11) NOT NULL,
  `album_nama` varchar(100) NOT NULL,
  `album_slug` varchar(100) NOT NULL,
  `album_tanggal` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`album_id`, `album_nama`, `album_slug`, `album_tanggal`) VALUES
(6, 'Kabupaten', 'kabupaten', '2021-02-23 13:56:15'),
(7, 'Olahraga', 'olahraga', '2021-02-23 13:56:25'),
(9, 'Sekolah', 'sekolah', '2021-03-03 04:16:48'),
(11, 'Kegiatan', 'kegiatan', '2021-03-18 00:09:20'),
(13, 'Coba', 'coba', '2021-03-18 03:22:51');

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE `artikel` (
  `artikel_id` int(11) NOT NULL,
  `artikel_tanggal` datetime NOT NULL,
  `artikel_judul` varchar(100) NOT NULL,
  `artikel_slug` varchar(255) NOT NULL,
  `artikel_konten` longtext NOT NULL,
  `artikel_sampul` varchar(255) NOT NULL,
  `artikel_author` int(11) NOT NULL,
  `artikel_kategori` int(11) NOT NULL,
  `artikel_status` enum('publish','draft') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`artikel_id`, `artikel_tanggal`, `artikel_judul`, `artikel_slug`, `artikel_konten`, `artikel_sampul`, `artikel_author`, `artikel_kategori`, `artikel_status`) VALUES
(51, '2021-03-03 03:37:23', 'Wajah Baru SMKN 4 KUNINGAN', 'wajah-baru-smkn-4-kuningan', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eius modtempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br />\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n', '516d4f16d9d3f7db42ed58ffd2f4ebfc.jpg', 5, 35, 'publish'),
(52, '2021-03-04 19:35:25', 'Perlombaan Bola SMKN 4 KUNINGAN', 'perlombaan-bola-smkn-4-kuningan', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.&nbsp;Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n', 'f32a3024d55a775a0bd1cb5fad6802bb.jpg', 5, 34, 'publish'),
(53, '2021-03-04 19:38:36', 'Sudah 1 Tahun, Tidak Kunjung Sekolah ', 'sudah-1-tahun-tidak-kunjung-sekolah', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.&nbsp;Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n', '989a7bf7ec7c36364df8d4cbff57a4db.jpg', 5, 34, 'publish'),
(61, '2021-03-18 10:27:56', 'shsh', 'shsh', '<p>shshsh</p>\r\n', '9668b6bbe0ae5f6fc53a3e2b306e8ba2.jpg', 15, 35, 'publish');

-- --------------------------------------------------------

--
-- Table structure for table `galeri`
--

CREATE TABLE `galeri` (
  `galeri_id` int(11) NOT NULL,
  `galeri_judul` varchar(100) NOT NULL,
  `galeri_tanggal` timestamp NOT NULL DEFAULT current_timestamp(),
  `galeri_gambar` varchar(100) NOT NULL,
  `galeri_album_id` int(11) NOT NULL,
  `galeri_author` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `galeri`
--

INSERT INTO `galeri` (`galeri_id`, `galeri_judul`, `galeri_tanggal`, `galeri_gambar`, `galeri_album_id`, `galeri_author`) VALUES
(19, 'Wajah Baru SMKN 4 KUNINGAN', '2021-03-03 04:20:20', '933b4f26d48bde8a58acb58a362b6e30.jpg', 9, 'Reishan Tridya Rafly '),
(20, 'Perlombaan Sepak Bola Tahun 2021-2022', '2021-03-03 04:21:04', 'fb4fcb4e4704545e59757f83d85d0ff0.jpg', 7, 'Reishan Tridya Rafly '),
(21, 'Lomba LKS Tahun 2019-2020', '2021-03-03 04:21:49', '26c285c84c98c9cdf920d765ff1f1b0d.jpg', 6, 'Reishan Tridya Rafly '),
(22, 'Produk Anak SMK', '2021-03-03 04:29:17', '12d52fdfcda73013e3f5d90fad0b1214.jpg', 9, 'Reishan Tridya Rafly '),
(23, 'Produk SMKN 4 KUNINGAN', '2021-03-03 20:53:10', '0ef01f19f653977a1f04e596ed9468d2.jpg', 9, 'Reishan Tridya Rafly '),
(24, 'Pembukaan AULA SMKN 4 KUNINGAN', '2021-03-03 21:04:20', '3bf88ecae3f00a4a49a75576c2f53cee.jpg', 6, 'Reishan Tridya Rafly '),
(29, 'Judul', '2021-03-18 03:23:25', '54464759f196c62cfc6ca092e3e29ce4.jpg', 13, 'Reishan Tridya Rafly ');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `jabatan_id` int(11) NOT NULL,
  `jabatan_nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`jabatan_id`, `jabatan_nama`) VALUES
(2, 'Wakil Ketua'),
(3, 'Sekretaris'),
(4, 'Bendahara'),
(5, 'Seksi Bidang 1'),
(8, 'Ketua'),
(11, 'Seksi Bidang 2'),
(12, 'Seksi Bidang 3'),
(13, 'Seksi Bidang 4');

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `jurusan_id` int(11) NOT NULL,
  `jurusan_nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`jurusan_id`, `jurusan_nama`) VALUES
(1, 'Rekayasa Perangkat Lunak'),
(2, 'Adminstrasi Perkantoran'),
(3, 'Akuntansi'),
(4, 'Teknik Kendaraan Ringan Otomotif'),
(5, 'Teknik Bisnis Sepeda Motor'),
(6, 'Teknik Instalasi Tenaga Listrik');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `kategori_id` int(11) NOT NULL,
  `kategori_nama` varchar(100) NOT NULL,
  `kategori_slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`kategori_id`, `kategori_nama`, `kategori_slug`) VALUES
(34, 'Berita ', 'berita'),
(35, 'Berita Sekolah', 'berita-sekolah'),
(36, 'Prestasi Siswa', 'prestasi-siswa'),
(40, 'latihan', 'latihan');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `kelas_id` int(11) NOT NULL,
  `kelas_nama` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`kelas_id`, `kelas_nama`) VALUES
(1, '10 (Sepuluh)'),
(2, '11 (Sebelas)'),
(3, '12 (Dua Belas)');

-- --------------------------------------------------------

--
-- Table structure for table `pengaturan`
--

CREATE TABLE `pengaturan` (
  `nama` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `logo` varchar(255) NOT NULL,
  `link_facebook` varchar(255) NOT NULL,
  `link_twitter` varchar(255) NOT NULL,
  `link_instagram` varchar(255) NOT NULL,
  `link_whatsapp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengaturan`
--

INSERT INTO `pengaturan` (`nama`, `deskripsi`, `logo`, `link_facebook`, `link_twitter`, `link_instagram`, `link_whatsapp`) VALUES
('OSIS SMKN 4 KNG ', 'OSIS SMKN 4 KUNINGAN', 'd0a8641898fb0dd97280996536ca154a.png', '#', '#', 'https://www.instagram.com/osis_smkn4kng/', '#');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `pengguna_id` int(11) NOT NULL,
  `pengguna_nama` varchar(50) NOT NULL,
  `pengguna_email` varchar(225) NOT NULL,
  `pengguna_username` varchar(50) NOT NULL,
  `pengguna_password` varchar(225) NOT NULL,
  `pengguna_level` enum('admin','penulis') NOT NULL,
  `pengguna_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`pengguna_id`, `pengguna_nama`, `pengguna_email`, `pengguna_username`, `pengguna_password`, `pengguna_level`, `pengguna_status`) VALUES
(5, 'Reishan Tridya Rafly ', 'reishantridyarafly@gmail.com', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 1),
(15, 'Penulis', 'penulis@gmail.com', 'penulis', 'de3709b8e6f81a4ef5a858b7a2d28883', 'penulis', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pengumuman`
--

CREATE TABLE `pengumuman` (
  `pengumuman_id` int(11) NOT NULL,
  `pengumuman_judul` varchar(225) NOT NULL,
  `pengumuman_deskripsi` text NOT NULL,
  `pengumuman_tanggal` timestamp NOT NULL DEFAULT current_timestamp(),
  `tanggal_mulai` date DEFAULT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `pengumuman_author` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengumuman`
--

INSERT INTO `pengumuman` (`pengumuman_id`, `pengumuman_judul`, `pengumuman_deskripsi`, `pengumuman_tanggal`, `tanggal_mulai`, `tanggal_selesai`, `pengumuman_author`) VALUES
(1, 'Pembagian Raport 2021', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo&nbsp;consequat.&nbsp;</p>', '2021-02-14 07:36:43', '2020-12-11', '2020-12-12', 'Reishan Tridya Rafly '),
(6, 'Pembukaan PPDB 2021-2022', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo&nbsp;consequat.&nbsp;</p>', '2021-02-22 04:02:58', '2021-03-01', '2021-03-06', 'Reishan Tridya Rafly '),
(7, 'Pelaksanaa PKL Tahun 2020-2021', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo&nbsp;consequat.&nbsp;</p>', '2021-02-22 14:10:24', '2021-02-01', '2021-03-29', 'Reishan Tridya Rafly '),
(8, 'Kegiatan PLDS Untuk Siswa Baru Tahun Pelajaran 2021-2022', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo&nbsp;consequat.&nbsp;</p>', '2021-02-22 14:11:45', '2021-02-22', '2021-02-27', 'Reishan Tridya Rafly ');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `siswa_id` int(11) NOT NULL,
  `siswa_nis` varchar(50) DEFAULT NULL,
  `siswa_nama` varchar(50) NOT NULL,
  `siswa_jenis_kelamin` enum('L','P') NOT NULL,
  `siswa_jabatan_id` int(11) NOT NULL,
  `siswa_kelas_id` int(11) NOT NULL,
  `siswa_jurusan_id` int(11) NOT NULL,
  `status` enum('0','1') NOT NULL,
  `siswa_photo` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`siswa_id`, `siswa_nis`, `siswa_nama`, `siswa_jenis_kelamin`, `siswa_jabatan_id`, `siswa_kelas_id`, `siswa_jurusan_id`, `status`, `siswa_photo`) VALUES
(32, '123456784', 'Reishan Tridya Rafly', 'L', 8, 3, 1, '1', 'a9dabd7e9ba4fe9f077803196dbddde8.jpg'),
(36, '123456789', 'Royhan', 'L', 2, 2, 4, '1', '6bb6f12c2f769e7283a4bd75465f38dd.png'),
(42, '58585847', 'COba', 'P', 3, 2, 3, '1', '9dbe6d11c61f7f62401f880717a82e23.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`agenda_id`);

--
-- Indexes for table `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`album_id`);

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`artikel_id`),
  ADD KEY `artikel_kategori` (`artikel_kategori`);

--
-- Indexes for table `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`galeri_id`),
  ADD KEY `galeri_album_id` (`galeri_album_id`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`jabatan_id`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`jurusan_id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`kelas_id`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`pengguna_id`);

--
-- Indexes for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`pengumuman_id`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`siswa_id`),
  ADD KEY `siswa_jabatan_id` (`siswa_jabatan_id`,`siswa_kelas_id`,`siswa_jurusan_id`),
  ADD KEY `siswa_jurusan_id` (`siswa_jurusan_id`),
  ADD KEY `siswa_kelas_id` (`siswa_kelas_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agenda`
--
ALTER TABLE `agenda`
  MODIFY `agenda_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `album`
--
ALTER TABLE `album`
  MODIFY `album_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
  MODIFY `artikel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `galeri`
--
ALTER TABLE `galeri`
  MODIFY `galeri_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `jabatan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `jurusan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `kelas_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `pengguna_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `pengumuman_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `siswa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `artikel`
--
ALTER TABLE `artikel`
  ADD CONSTRAINT `artikel_ibfk_1` FOREIGN KEY (`artikel_kategori`) REFERENCES `kategori` (`kategori_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `galeri`
--
ALTER TABLE `galeri`
  ADD CONSTRAINT `galeri_ibfk_1` FOREIGN KEY (`galeri_album_id`) REFERENCES `album` (`album_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`siswa_jabatan_id`) REFERENCES `jabatan` (`jabatan_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `siswa_ibfk_2` FOREIGN KEY (`siswa_jurusan_id`) REFERENCES `jurusan` (`jurusan_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `siswa_ibfk_3` FOREIGN KEY (`siswa_kelas_id`) REFERENCES `kelas` (`kelas_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
