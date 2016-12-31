-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2016 at 07:18 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_marketing`
--

-- --------------------------------------------------------

--
-- Table structure for table `dlmbg_blok_rumah`
--

CREATE TABLE `dlmbg_blok_rumah` (
  `id_rumah` int(5) NOT NULL,
  `blok_rumah` int(2) NOT NULL,
  `no_rumah` int(2) NOT NULL,
  `luas_bangunan` int(3) NOT NULL,
  `luas_tanah` int(3) NOT NULL,
  `jenis_bangunan` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dlmbg_daftar_transaksi`
--

CREATE TABLE `dlmbg_daftar_transaksi` (
  `id_daftar_transaksi` int(10) NOT NULL,
  `kode_pemesanan` varchar(20) NOT NULL,
  `kode_jenis_transaksi` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dlmbg_jenis_bangunan`
--

CREATE TABLE `dlmbg_jenis_bangunan` (
  `id_jenis_bangunan` int(10) NOT NULL,
  `jenis_bangunan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dlmbg_jenis_bangunan`
--

INSERT INTO `dlmbg_jenis_bangunan` (`id_jenis_bangunan`, `jenis_bangunan`) VALUES
(1, 'RUMAH'),
(2, 'RUKO');

-- --------------------------------------------------------

--
-- Table structure for table `dlmbg_jenis_satuan`
--

CREATE TABLE `dlmbg_jenis_satuan` (
  `id_jenis_satuan` int(10) NOT NULL,
  `satuan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dlmbg_jenis_satuan`
--

INSERT INTO `dlmbg_jenis_satuan` (`id_jenis_satuan`, `satuan`) VALUES
(1, 'unit'),
(2, 'lot'),
(3, 'm²'),
(4, 'Paket');

-- --------------------------------------------------------

--
-- Table structure for table `dlmbg_jenis_transaksi`
--

CREATE TABLE `dlmbg_jenis_transaksi` (
  `kode_jenis_transaksi` int(5) NOT NULL,
  `id_jenis_satuan` int(10) NOT NULL,
  `nama_transaksi` varchar(100) NOT NULL,
  `harga` int(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dlmbg_jenis_transaksi`
--

INSERT INTO `dlmbg_jenis_transaksi` (`kode_jenis_transaksi`, `id_jenis_satuan`, `nama_transaksi`, `harga`) VALUES
(7, 3, 'Hook', 1600000),
(6, 1, 'DP', 15000000),
(5, 1, 'Booking Fee', 1000000),
(9, 1, 'Pembayaran Booking Fee', 1500000);

-- --------------------------------------------------------

--
-- Table structure for table `dlmbg_kwitansi`
--

CREATE TABLE `dlmbg_kwitansi` (
  `kode_kwitansi` varchar(20) NOT NULL,
  `kode_nota` varchar(20) NOT NULL,
  `tgl_bayar` int(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dlmbg_pelanggan`
--

CREATE TABLE `dlmbg_pelanggan` (
  `kode_pelanggan` int(5) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `jenis` varchar(20) NOT NULL,
  `alamat_pelanggan` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dlmbg_pelanggan`
--

INSERT INTO `dlmbg_pelanggan` (`kode_pelanggan`, `nama_pelanggan`, `jenis`, `alamat_pelanggan`) VALUES
(37, 'Budi', 'Umum', 'Citeureup'),
(35, 'Ika Kartika Rahayu', 'Umum', 'Rogojampi, Banyuwangi'),
(36, 'danu', 'Umum', 'Bogor');

-- --------------------------------------------------------

--
-- Table structure for table `dlmbg_pembayaran`
--

CREATE TABLE `dlmbg_pembayaran` (
  `kode_pembayaran` varchar(30) NOT NULL,
  `kode_pemesanan` varchar(30) NOT NULL,
  `tgl_bayar` varchar(40) NOT NULL,
  `bayar` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dlmbg_pemesanan`
--

CREATE TABLE `dlmbg_pemesanan` (
  `kode_pemesanan` varchar(20) NOT NULL,
  `tgl_pesan` varchar(30) NOT NULL,
  `kode_pelanggan` int(5) NOT NULL,
  `blok_rumah` varchar(4) NOT NULL,
  `no_rumah` varchar(3) NOT NULL,
  `jumlah_harga` int(20) NOT NULL,
  `uang_muka` int(20) NOT NULL,
  `status_pembayaran` varchar(50) NOT NULL DEFAULT 'Belum Lunas'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dlmbg_pemesanan`
--

INSERT INTO `dlmbg_pemesanan` (`kode_pemesanan`, `tgl_pesan`, `kode_pelanggan`, `blok_rumah`, `no_rumah`, `jumlah_harga`, `uang_muka`, `status_pembayaran`) VALUES
('GCC00000001', '01 November 2016', 36, 'A1', '1', 1000000, 900000, 'Belum Lunas'),
('GCC00000002', '14 December 2016', 35, 'A1', '12', 1000000, 900000, 'Lunas');

-- --------------------------------------------------------

--
-- Table structure for table `dlmbg_pemesanan_detail`
--

CREATE TABLE `dlmbg_pemesanan_detail` (
  `id_pemesanan_detail` int(10) NOT NULL,
  `kode_pemesanan` varchar(30) NOT NULL,
  `kode_jenis_transaksi` int(10) NOT NULL,
  `jumlah` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dlmbg_sessions`
--

CREATE TABLE `dlmbg_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `user_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dlmbg_sessions`
--

INSERT INTO `dlmbg_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('a38a5488e8fdaf46ab88edeed902a52a', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:49.0) Gecko/20100101 Firefox/49.0', 1481771586, 'a:8:{s:9:"user_data";s:0:"";s:9:"logged_in";s:17:"yesGetMeLoginBaby";s:15:"nama_user_login";s:17:"Kwardanu Septiaji";s:9:"kode_user";s:1:"5";s:8:"username";s:5:"admin";s:5:"level";s:5:"admin";s:3:"key";s:0:"";s:10:"key_search";s:14:"nama_pelanggan";}'),
('af53c73579de55c88299387cf827fbbc', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:49.0) Gecko/20100101 Firefox/49.0', 1481786074, ''),
('c243d05ddad51d39403ae82d5dc30bfe', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:49.0) Gecko/20100101 Firefox/49.0', 1481786487, 'a:7:{s:9:"user_data";s:0:"";s:9:"logged_in";s:17:"yesGetMeLoginBaby";s:15:"nama_user_login";s:17:"Kwardanu Septiaji";s:9:"kode_user";s:1:"5";s:8:"username";s:5:"admin";s:5:"level";s:5:"admin";s:10:"key_search";s:14:"nama_pelanggan";}');

-- --------------------------------------------------------

--
-- Table structure for table `dlmbg_setting`
--

CREATE TABLE `dlmbg_setting` (
  `id_setting` int(10) NOT NULL,
  `tipe` varchar(50) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content_setting` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dlmbg_setting`
--

INSERT INTO `dlmbg_setting` (`id_setting`, `tipe`, `title`, `content_setting`) VALUES
(1, 'site_title', 'Nama Situs', 'Marketing GCC '),
(2, 'site_quotes', 'Quotes Situs', '2016'),
(3, 'site_footer', 'Teks Footer', 'GCC 2016 <br> Go Online'),
(4, 'key_login', 'Hash Key MD5', 'AppPercetakan32'),
(5, 'site_theme', 'Theme Folder', 'flat-dot'),
(6, 'site_limit_small', 'Limit Data Small', '5'),
(7, 'site_limit_medium', 'Limit Data Medium', '10');

-- --------------------------------------------------------

--
-- Table structure for table `dlmbg_user`
--

CREATE TABLE `dlmbg_user` (
  `kode_user` int(5) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(10) NOT NULL,
  `nama_user` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dlmbg_user`
--

INSERT INTO `dlmbg_user` (`kode_user`, `username`, `password`, `level`, `nama_user`) VALUES
(5, 'admin', '4c47281cf940a96b55dc2323d237f190', 'admin', 'Kwardanu Septiaji'),
(4, 'sarifah', 'c2a0990bbf066556435a7bf80b6245c2', 'kasir', 'sarifah');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dlmbg_blok_rumah`
--
ALTER TABLE `dlmbg_blok_rumah`
  ADD PRIMARY KEY (`id_rumah`);

--
-- Indexes for table `dlmbg_daftar_transaksi`
--
ALTER TABLE `dlmbg_daftar_transaksi`
  ADD PRIMARY KEY (`id_daftar_transaksi`);

--
-- Indexes for table `dlmbg_jenis_bangunan`
--
ALTER TABLE `dlmbg_jenis_bangunan`
  ADD PRIMARY KEY (`id_jenis_bangunan`);

--
-- Indexes for table `dlmbg_jenis_satuan`
--
ALTER TABLE `dlmbg_jenis_satuan`
  ADD PRIMARY KEY (`id_jenis_satuan`);

--
-- Indexes for table `dlmbg_jenis_transaksi`
--
ALTER TABLE `dlmbg_jenis_transaksi`
  ADD PRIMARY KEY (`kode_jenis_transaksi`);

--
-- Indexes for table `dlmbg_kwitansi`
--
ALTER TABLE `dlmbg_kwitansi`
  ADD PRIMARY KEY (`kode_kwitansi`);

--
-- Indexes for table `dlmbg_pelanggan`
--
ALTER TABLE `dlmbg_pelanggan`
  ADD PRIMARY KEY (`kode_pelanggan`);

--
-- Indexes for table `dlmbg_pembayaran`
--
ALTER TABLE `dlmbg_pembayaran`
  ADD PRIMARY KEY (`kode_pembayaran`);

--
-- Indexes for table `dlmbg_pemesanan`
--
ALTER TABLE `dlmbg_pemesanan`
  ADD PRIMARY KEY (`kode_pemesanan`);

--
-- Indexes for table `dlmbg_pemesanan_detail`
--
ALTER TABLE `dlmbg_pemesanan_detail`
  ADD PRIMARY KEY (`id_pemesanan_detail`);

--
-- Indexes for table `dlmbg_sessions`
--
ALTER TABLE `dlmbg_sessions`
  ADD PRIMARY KEY (`session_id`),
  ADD KEY `last_activity_idx` (`last_activity`);

--
-- Indexes for table `dlmbg_setting`
--
ALTER TABLE `dlmbg_setting`
  ADD PRIMARY KEY (`id_setting`);

--
-- Indexes for table `dlmbg_user`
--
ALTER TABLE `dlmbg_user`
  ADD PRIMARY KEY (`kode_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dlmbg_daftar_transaksi`
--
ALTER TABLE `dlmbg_daftar_transaksi`
  MODIFY `id_daftar_transaksi` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dlmbg_jenis_bangunan`
--
ALTER TABLE `dlmbg_jenis_bangunan`
  MODIFY `id_jenis_bangunan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `dlmbg_jenis_satuan`
--
ALTER TABLE `dlmbg_jenis_satuan`
  MODIFY `id_jenis_satuan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `dlmbg_jenis_transaksi`
--
ALTER TABLE `dlmbg_jenis_transaksi`
  MODIFY `kode_jenis_transaksi` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `dlmbg_pelanggan`
--
ALTER TABLE `dlmbg_pelanggan`
  MODIFY `kode_pelanggan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `dlmbg_pemesanan_detail`
--
ALTER TABLE `dlmbg_pemesanan_detail`
  MODIFY `id_pemesanan_detail` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dlmbg_setting`
--
ALTER TABLE `dlmbg_setting`
  MODIFY `id_setting` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `dlmbg_user`
--
ALTER TABLE `dlmbg_user`
  MODIFY `kode_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
