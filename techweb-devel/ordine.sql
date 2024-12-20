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
-- Table structure for table `ordine`
--

CREATE TABLE `ordine` (
  `id_ordine` varchar(20) NOT NULL,
  `quantita` int(10) NOT NULL,
  `username` varchar(30) NOT NULL,
  `id_prodotto` int(10) NOT NULL,
  `data` date NOT NULL DEFAULT current_timestamp(),
  `provincia` varchar(11) DEFAULT NULL,
  `citta` varchar(11) DEFAULT NULL,
  `CAP` varchar(11) DEFAULT NULL,
  `indirizzo` varchar(11) DEFAULT NULL,
  `numCivico` varchar(11) DEFAULT NULL,
  `nomeCitofono` varchar(11) DEFAULT NULL,
  `titolare` varchar(11) DEFAULT NULL,
  `annoScadenza` varchar(11) DEFAULT NULL,
  `meseScadenza` varchar(11) DEFAULT NULL,
  `cvv` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ordine`
--

INSERT INTO `ordine` (`id_ordine`, `quantita`, `username`, `id_prodotto`, `data`, `provincia`, `citta`, `CAP`, `indirizzo`, `numCivico`, `nomeCitofono`, `titolare`, `annoScadenza`, `meseScadenza`, `cvv`) VALUES
('20230202065634', 2, 'Topolino', 10, '2023-02-02', 'Museton', 'Topolinia', '99999', 'Disneyland', '5', 'Topolino', 'Topolino', '2023', '05', '000'),
('20230202065634', 1, 'Topolino', 31, '2023-02-02', 'Museton', 'Topolinia', '99999', 'Disneyland', '5', 'Topolino', 'Topolino', '2023', '05', '000'),
('20230202065634', 1, 'Topolino', 34, '2023-02-02', 'Museton', 'Topolinia', '99999', 'Disneyland', '5', 'Topolino', 'Topolino', '2023', '05', '000'),
('20230202075643', 1, 'user', 17, '2023-02-02', 'verona', 'verona', '34567', 'strada', '12', 'Pandolfi', 'user', '2023', '01', '333'),
('20230202075643', 1, 'user', 33, '2023-02-02', 'verona', 'verona', '34567', 'strada', '12', 'Pandolfi', 'user', '2023', '01', '333');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ordine`
--
ALTER TABLE `ordine`
  ADD PRIMARY KEY (`id_ordine`,`id_prodotto`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
