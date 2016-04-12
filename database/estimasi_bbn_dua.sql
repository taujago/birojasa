-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 12 Apr 2016 pada 05.04
-- Versi Server: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `birojasadb`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `estimasi_bbn_dua`
--

CREATE TABLE IF NOT EXISTS `estimasi_bbn_dua` (
`id` int(11) NOT NULL,
  `tipe_kendaraan` varchar(100) NOT NULL,
  `tahun_kendaraan` varchar(5) NOT NULL,
  `warna_tnkb` varchar(50) NOT NULL,
  `polda` int(11) NOT NULL,
  `samsat` int(11) NOT NULL,
  `perubahan` int(11) NOT NULL,
  `rp_pendaftaran` varchar(20) NOT NULL,
  `rp_perubahan` varchar(20) NOT NULL,
  `rp_admin_fee` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `estimasi_bbn_dua`
--
ALTER TABLE `estimasi_bbn_dua`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `estimasi_bbn_dua`
--
ALTER TABLE `estimasi_bbn_dua`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
