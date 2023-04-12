-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 13, 2023 at 01:54 AM
-- Server version: 8.0.31-0ubuntu0.22.04.1
-- PHP Version: 8.1.2-1ubuntu2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bvwa`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` int NOT NULL,
  `judul` varchar(100) NOT NULL,
  `penerbit` varchar(50) DEFAULT NULL,
  `pengarang` varchar(50) DEFAULT NULL,
  `tahun` varchar(4) DEFAULT NULL,
  `kategori_id` int DEFAULT NULL,
  `harga` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `judul`, `penerbit`, `pengarang`, `tahun`, `kategori_id`, `harga`) VALUES
(7, 'Moon', 'Gramedia', 'Tere Liye', '2014', 61, 40000),
(8, 'Madilog', 'Gramedia', 'Tan Malaka', '2010', 68, 30000),
(9, 'The Earth', 'Deepublish.', 'Arthur Beiser', '2009', 61, 90000),
(10, 'Iblis Menggugat Tuhan', 'Bintang Media', 'Shawni', '2018', 71, 23000),
(13, '51 Perempuan Pencerah Dunia', 'Gramedia', 'Tetty Yukesti', '2017', 61, 69000),
(14, 'Sang Nabi', 'Gramedia', 'Khalil Gibran', '2011', 61, 47000),
(15, 'Sebuah Seni untuk Bersikap Bodo Amat', 'Gramedia', 'Mark Manson', '2019', 71, 67000),
(16, 'Sejarah Tuhan\r\n', 'Gramedia', 'Karen Armstrong', '1993', 68, 44000),
(17, 'Sejarah Dunia Yang Disembunyikan\r\n', 'Gramedia', 'Jonathan Black', '2007', 70, 46000),
(18, 'Filosofi Teras', 'Bukunesia', 'Henry Manampiring', '2018', 69, 38000),
(19, 'Hacking: The Art of Exploitation', 'Gramedia', 'Jon Erickson', '2005', 69, 59000);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id_cart` int NOT NULL,
  `id_user` int NOT NULL,
  `id_buku` int DEFAULT NULL,
  `id_film` int DEFAULT NULL,
  `jenis` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id_cart`, `id_user`, `id_buku`, `id_film`, `jenis`) VALUES
(16, 55, 2, NULL, 'Buku'),
(17, 55, 3, NULL, 'Buku'),
(18, 55, 4, NULL, 'Buku'),
(19, 55, NULL, 1, 'Film'),
(20, 55, NULL, 2, 'Film'),
(25, 56, 2, NULL, 'Buku'),
(26, 56, NULL, 2, 'Film'),
(28, 54, 3, NULL, 'Buku'),
(29, 57, 2, NULL, 'Buku'),
(30, 57, 4, NULL, 'Buku'),
(31, 54, NULL, 1, 'Film'),
(32, 54, NULL, 2, 'Film');

-- --------------------------------------------------------

--
-- Table structure for table `film`
--

CREATE TABLE `film` (
  `id_film` int NOT NULL,
  `judul` varchar(128) NOT NULL,
  `sutradara` varchar(128) NOT NULL,
  `harga` int NOT NULL,
  `kategori_id` int NOT NULL,
  `tahun` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `film`
--

INSERT INTO `film` (`id_film`, `judul`, `sutradara`, `harga`, `kategori_id`, `tahun`) VALUES
(4, 'Train to Busan', 'Yeon Sang-ho', 35000, 63, 2016),
(5, 'Avatar 2', 'James Cameron', 40000, 64, 2022),
(6, 'Mr Robot', 'Sam Esmail', 65000, 62, 2015),
(7, 'Muhammad: The Messenger of God', 'Majid Majidi', 60000, 68, 2015),
(8, 'Interstellar', 'Christopher Nolan', 30000, 67, 2014),
(9, 'Yowis Ben', 'Bayu Skak', 40000, 66, 2018),
(10, 'Spider-Man: No Way Home', 'Jon Watts', 35000, 64, 2021),
(11, 'The Invisible Guest', 'Oriol Paulo', 25000, 60, 2016),
(12, 'Resident Evil', 'Paul W. S. Anderson', 30000, 61, 2002),
(13, 'Who Am I', 'Baran bo Odar', 40000, 61, 2014),
(14, 'Crows Zero', 'Toshiaki Toyoda', 34000, 64, 2007),
(15, 'Clash of the titans', 'Louis Leterrier', 42000, 64, 2010),
(16, 'Qodrat', 'Charles Gozali', 28000, 62, 2022),
(17, 'IP man', ' Yuen Woo-ping', 42000, 64, 2008),
(18, 'Fast X', 'Louis Leterrier', 72000, 64, 2023);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama_kategori`) VALUES
(59, 'Love'),
(60, 'Adventure'),
(61, 'Story'),
(62, 'Drama'),
(63, 'Horror'),
(64, 'Action'),
(65, 'Romance'),
(66, 'Comedy'),
(67, 'Science Fiction'),
(68, 'historical'),
(69, 'Fanfiction'),
(70, 'Mystery'),
(71, 'Thriller');

-- --------------------------------------------------------

--
-- Table structure for table `paper`
--

CREATE TABLE `paper` (
  `id` int NOT NULL,
  `judul` varchar(128) NOT NULL,
  `file` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `paper`
--

INSERT INTO `paper` (`id`, `judul`, `file`) VALUES
(16, 'Android Security & Pentesting', 'android_pentest.pdf'),
(17, 'The Art of Network Penetration Testing', 'The_Art_of_Network_Penetration_Testing.pdf'),
(18, 'Binary Exploitation Fundamental', 'Binary-Exploitation-201.pdf'),
(19, 'IoT device Penetration Testing', 'IoT_Device_Pentest.pdf'),
(20, 'Mobile Application Pentest', 'MobileApp_Pentest.pdf'),
(21, 'Guide to ZeroDay Exploit', 'Guide_to_Zero_Day_Exploits.pdf'),
(22, 'Offensive ActiveDirectory', 'offensive_activeDirectory.pdf'),
(23, 'Cloud Security Best Practice', 'Cloud Security Best Practices.pdf'),
(24, 'Web Application Security', 'Web_App_Pentesting.pdf'),
(25, 'Cyber Security Methodology', 'CyberSecurity_Guide.pdf'),
(26, 'Cryptography & Data Security', 'cryptography_and_data-security.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int NOT NULL,
  `id_transaksi` int NOT NULL,
  `total_bayar` int NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int NOT NULL,
  `id_user` int NOT NULL,
  `id_buku` int DEFAULT NULL,
  `id_film` int DEFAULT NULL,
  `harga` int NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_user`, `id_buku`, `id_film`, `harga`, `tanggal`, `keterangan`) VALUES
(22, 54, 2, NULL, 9999, '2023-03-12', 'User id 54 membeli buku id 2'),
(24, 54, 4, NULL, 1212, '2023-03-12', 'User id 54 membeli buku id 4'),
(25, 54, 5, NULL, 123, '2023-03-12', 'User id 54 membeli buku id 5'),
(33, 57, 2, NULL, 9999, '2023-03-12', 'User id 57 membeli buku id 2'),
(34, 57, 4, NULL, 1212, '2023-03-12', 'User id 57 membeli buku id 4'),
(35, 55, 3, NULL, 99000, '2023-03-12', 'User id 55 membeli buku id 3'),
(36, 55, 5, NULL, 123, '2023-03-12', 'User id 55 membeli buku id 5'),
(43, 54, NULL, 1, 1000, '2023-03-18', 'User id 54 membeli buku id 1'),
(44, 54, 3, NULL, 1000, '2023-03-18', 'User id 54 membeli buku id 3'),
(45, 54, NULL, 2, 2000, '2023-03-18', 'User id 54 membeli buku id 2'),
(46, 59, NULL, 4, 35000, '2023-04-08', 'User id 59 membeli buku id 4'),
(47, 59, 7, NULL, 40000, '2023-04-12', 'User id 59 membeli buku id 7');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `saldo` int NOT NULL,
  `level` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`, `photo`, `saldo`, `level`) VALUES
(1, 'xpl0dec', 'admin', '0192023a7bbd73250516f069df18b500', '4cb405de8d0e1404d992.png', 100000, 'admin'),
(54, 'heker', 'heker', 'b9bac7e44a0a177991df407c8e5f107f', '242c6413bba0cafac0ae.png', 58544, 'user'),
(55, 'testuser', 'testuser', 'c1f64af5c8fb5e9699f69cd4632c4100', 'b96b9cedbce01bfd132a.jpg', 877, 'user'),
(56, 'users12', 'users12', '83878c91171338902e0fe0fb97a8c47a', 'avatar.png', 100000, 'user'),
(57, 'haxor', 'haxor', '663d05fb002ce8223ce43f15bcc0562c', 'avatar.png', 66244, 'user'),
(58, 'testing', 'testing33', '61b6e1082ab36242a47193cc158f9c5d', 'avatar.png', 100000, 'user'),
(59, 'exec', 'exec', '7815696ecbf1c96e6894b779456d330e', '061d8b676cb1696a2af2.png', 25000, 'user'),
(60, 'test', 'test123', 'cc03e747a6afbbcbf8be7668acfebee5', 'avatar.png', 100000, 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`),
  ADD KEY `kategori_id` (`kategori_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id_cart`),
  ADD KEY `id_buku` (`id_buku`),
  ADD KEY `id_film` (`id_film`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`id_film`),
  ADD KEY `kategori_id` (`kategori_id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paper`
--
ALTER TABLE `paper`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_buku` (`id_buku`),
  ADD KEY `id_film` (`id_film`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id_cart` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `film`
--
ALTER TABLE `film`
  MODIFY `id_film` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `paper`
--
ALTER TABLE `paper`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `buku_ibfk_1` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`id_film`) REFERENCES `film` (`id_film`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `cart_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `film`
--
ALTER TABLE `film`
  ADD CONSTRAINT `film_ibfk_1` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`id_film`) REFERENCES `film` (`id_film`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `transaksi_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
