-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2023 at 07:39 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portfolio`
--

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` int(11) NOT NULL,
  `keahlian` varchar(50) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `photo` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `keahlian`, `deskripsi`, `photo`) VALUES
(1, 'Bahasa C', 'Di semester 2 kemarin saya sudah belajar banyak mengenai bahasa C, sehingga bisa dibilang kemampuan bahasa C saya cukup baik. Saya dapat melakukan beberapa Algoritma sederhana yang bisa diterapkan di bahasa C, mulai dari Looping, Sorting, Searching, dan program sederhana lainnya. ', 'Bahasa-c.jpg'),
(2, 'Java', 'Di semester 3 kemarin saya sudah belajar banyak mengenai bahasa JAVA, sehingga bisa dibilang kemampuan bahasa JAVA saya cukup baik. Saya dapat melakukan Create, Read, Update, dan Delete menggunakan bahasa JAVA dan juga beberapa method lainnya. Saya juga sudah bisa membuat aplikasi berbasis GUI dengan menggunakan Java Swing.', 'Java.jpg'),
(3, 'PHP', 'Di semester 4 ini saya sudah belajar banyak mengenai bahasa PHP, sehingga bisa dibilang kemampuan bahasa PHP saya cukup baik. Saya dapat melakukan Create, Read, Update, dan Delete menggunakan bahasa PHP dan juga beberapa method lainnya.', 'PHP.jpg'),
(28, 'Editing Video', 'Saya memiliki keahlian tersendiri tentang edit video. Meskipun mungkin saya belum expert, tetapi saya bisa membuat video menarik selama kompleksitasnya masih sederhana.', 'Editing-Video.jpg'),
(30, 'Bermain Gitar', 'Untuk bermain gitar ini sebenarnya bisa dibilang hanya sekadar bisa saja, saya tidak expert, saya hanya memainkannya jika ada waktu luang. Tetapi mungkin bisa dimasukan kedalam skill saya, biar pas 6 aja :)', 'Bermain-Gitar.jpg'),
(31, 'Bermain Games', 'Mungkin masih ada banyak skill saya yang lain, tetapi saya akan memasukan ini untuk yang terakhir (sementara) yaitu bermain games. Games saya sudah saya mainkan mungkin tidak sebanyak orang lain, tetapi biasanya sedikit games yang saya mainkan tersebut sangat sangat saya kuasai dengan baik.', 'Bermain-Games.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `kelamin` varchar(20) DEFAULT NULL,
  `umur` int(11) DEFAULT NULL,
  `photo` varchar(50) DEFAULT NULL,
  `domisili` varchar(20) DEFAULT NULL,
  `hobi` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `password`, `kelamin`, `umur`, `photo`, `domisili`, `hobi`) VALUES
(1, 'Alfius Stevanus Ginting', 'alfius@gmail.com', 'alfius123', 'Pria', 20, 'Alfius-Stevanus.jpg', 'Bandung', 'mendengarkan musik');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
