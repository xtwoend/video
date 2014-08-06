-- phpMyAdmin SQL Dump
-- version 4.0.9deb1
-- http://www.phpmyadmin.net
--
-- Inang: localhost
-- Waktu pembuatan: 16 Jul 2014 pada 03.40
-- Versi Server: 10.1.0-MariaDB-1~wheezy-log
-- Versi PHP: 5.5.6-1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Basis data: `merahputih`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `licenses`
--

CREATE TABLE IF NOT EXISTS `licenses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `license` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data untuk tabel `licenses`
--

INSERT INTO `licenses` (`id`, `license`, `slug`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Video+ License', 'video-license', '2014-07-15 12:50:06', '2014-07-15 12:50:06', NULL),
(2, 'No Creative Commons License', 'no-creative-commons-license', '2014-07-15 12:50:21', '2014-07-15 12:50:21', NULL),
(3, 'Attribution', 'attribution', '2014-07-15 12:50:30', '2014-07-15 12:50:30', NULL),
(4, 'Attribution Share Alike', 'attribution-share-alike', '2014-07-15 12:50:42', '2014-07-15 12:50:42', NULL),
(5, 'Attribution No Derivatives', 'attribution-no-derivatives', '2014-07-15 12:51:07', '2014-07-15 12:51:07', NULL),
(6, 'Attribution Non-Commercial Share Alike', 'attribution-non-commercial-share-alike', '2014-07-15 12:59:33', '2014-07-15 12:59:33', NULL),
(7, 'Public Domain Dedication', 'public-domain-dedication', '2014-07-15 13:00:39', '2014-07-15 13:00:39', NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
