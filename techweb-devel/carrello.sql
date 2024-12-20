-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 02, 2023 at 08:03 PM
-- Server version: 10.6.11-MariaDB-0ubuntu0.22.04.1
-- PHP Version: 8.1.2-1ubuntu2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ftonini`
--

-- --------------------------------------------------------

--
-- Table structure for table `carrello`
--

CREATE TABLE `carrello` (
  `id_carrello` int(10) NOT NULL,
  `username` varchar(30) NOT NULL,
  `id_prodotto` int(10) NOT NULL,
  `quantita` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `carrello`
--

INSERT INTO `carrello` (`id_carrello`, `username`, `id_prodotto`, `quantita`) VALUES
(21, 'Johnny', 6, 2),
(22, 'Johnny', 27, 1),
(25, 'user', 32, 2),
(27, 'user', 25, 1),
(28, 'user', 6, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carrello`
--
ALTER TABLE `carrello`
  ADD PRIMARY KEY (`id_carrello`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carrello`
--
ALTER TABLE `carrello`
  MODIFY `id_carrello` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
