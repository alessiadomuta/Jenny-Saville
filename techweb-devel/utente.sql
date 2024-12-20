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
-- Table structure for table `utente`
--

CREATE TABLE `utente` (
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `fotoProfilo` varchar(50) DEFAULT 'icon1.png',
  `provincia` varchar(50) DEFAULT NULL,
  `citta` varchar(50) DEFAULT NULL,
  `CAP` varchar(5) DEFAULT NULL,
  `indirizzo` varchar(50) DEFAULT NULL,
  `numCivico` varchar(10) DEFAULT NULL,
  `interno` varchar(50) DEFAULT NULL,
  `numCarta` varchar(16) DEFAULT NULL,
  `titolare` varchar(50) DEFAULT NULL,
  `meseScadenza` varchar(2) DEFAULT NULL,
  `annoScadenza` varchar(4) DEFAULT NULL,
  `cvv` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `utente`
--

INSERT INTO `utente` (`email`, `username`, `password`, `fotoProfilo`, `provincia`, `citta`, `CAP`, `indirizzo`, `numCivico`, `interno`, `numCarta`, `titolare`, `meseScadenza`, `annoScadenza`, `cvv`) VALUES
('johnny@gmail.com', 'Johnny', 'Johnny01', 'icon1.png', 'Padova', 'Padova', '35000', 'casa di johnny', '9', 'Jhonny', '0000111122223333', 'Johnny', '04', '2023', '000'),
('topolino@gmail.com', 'Topolino', 'Topolino01', 'icon1.png', 'Museton', 'Topolinia', '99999', 'Disneyland', '5', 'Topolino', '0000000000000000', 'Topolino', '05', '2023', '000'),
('user@gmail.com', 'user', 'user', 'icon1.png', 'verona', 'verona', '34567', 'strada', '12', 'Pandolfi', '1234567812345678', 'user', '07', '2023', '333');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `utente`
--
ALTER TABLE `utente`
  ADD PRIMARY KEY (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
