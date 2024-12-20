-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 02, 2023 at 08:02 PM
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
-- Table structure for table `recensione`
--

CREATE TABLE `recensione` (
  `id_recensione` int(10) NOT NULL,
  `prodotto` varchar(20) NOT NULL,
  `username` varchar(30) NOT NULL,
  `testo` text NOT NULL,
  `stelle` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `recensione`
--

INSERT INTO `recensione` (`id_recensione`, `prodotto`, `username`, `testo`, `stelle`) VALUES
(56, 'T-Shirt', 'Topolino', 'Accettabile', 3),
(57, 'Agenda', 'Topolino', 'Bello ma un po&#039; inutile', 2),
(58, 'Poster', 'Topolino', 'Peccato non vendano il poster bianco, sinceramente &egrave; il pi&ugrave; bello.', 1),
(59, 'T-Shirt', 'Johnny', '*Chef kiss*', 5),
(60, 'Tazza', 'Johnny', 'Molto stagna', 4),
(61, 'Poster', 'Johnny', 'Carta del poster un po&#039; fragile', 3),
(62, 'Borsa', 'Johnny', 'Mi si &egrave; bucata sotto', 1),
(63, 'Borraccia', 'Johnny', 'Comprata solo per il moschettone ma. Alla fine non era compreso!', 2),
(64, 'Agenda', 'Johnny', 'Solido come una roccia', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `recensione`
--
ALTER TABLE `recensione`
  ADD PRIMARY KEY (`id_recensione`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `recensione`
--
ALTER TABLE `recensione`
  MODIFY `id_recensione` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
