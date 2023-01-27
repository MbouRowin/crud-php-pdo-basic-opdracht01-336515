-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2023 at 12:01 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php-pdo-crud-2209c`
--

-- --------------------------------------------------------

--
-- Table structure for table `persoon`
--

CREATE TABLE `persoon` (
  `Id` int(11) NOT NULL,
  `Voornaam` varchar(128) NOT NULL,
  `Tussenvoegsel` varchar(128) NOT NULL,
  `Achternaam` varchar(128) NOT NULL,
  `Haarkleur` varchar(128) NOT NULL,
  `Telefoonnummer` varchar(128) NOT NULL,
  `Straatnaam` varchar(128) NOT NULL,
  `Huisnummer` int(11) NOT NULL,
  `Woonplaats` varchar(128) NOT NULL,
  `Postcode` varchar(128) NOT NULL,
  `Landnaam` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `persoon`
--

INSERT INTO `persoon` (`Id`, `Voornaam`, `Tussenvoegsel`, `Achternaam`, `Haarkleur`, `Telefoonnummer`, `Straatnaam`, `Huisnummer`, `Woonplaats`, `Postcode`, `Landnaam`) VALUES
(2, 'Piet', 'de', 'Beer', 'Oranje', '', '', 0, '', '', 'Nederland'),
(3, 'Test', 'de', 'Tester', 'Blauw', '1234', 'Test', 123, 'Stad', '1234', 'NL');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `persoon`
--
ALTER TABLE `persoon`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `persoon`
--
ALTER TABLE `persoon`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
