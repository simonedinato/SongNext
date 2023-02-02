-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2021 at 10:51 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `songnext`
--

-- --------------------------------------------------------

--
-- Table structure for table `canzone`
--

CREATE TABLE `canzone` (
  `codc` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `nome_f` varchar(100) NOT NULL,
  `descrizione` varchar(500) DEFAULT NULL,
  `datap` datetime NOT NULL,
  `nome_u` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `canzone`
--

INSERT INTO `canzone` (`codc`, `nome`, `nome_f`, `descrizione`, `datap`, `nome_u`) VALUES
(1, 'AUD-20210520-WA0000.mp3', 'Audio di whatsapp', 'A', '2021-05-27 09:16:54', 'Simone'),
(2, 'yt1s.com - MarMar Oso  Ruthless Lyrics  nice guys always finish last should know that.mp3', 'Ruthless', 'Ruthless di Marmar Oso', '2021-05-31 10:43:45', 'a'),
(3, 'yt1s.com - Topic  Breaking Me Lyrics ft A7S.mp3', 'Breaking me', '', '2021-05-31 10:45:46', 'Prova');

-- --------------------------------------------------------

--
-- Table structure for table `commenti`
--

CREATE TABLE `commenti` (
  `codcomm` int(11) NOT NULL,
  `codc` int(11) NOT NULL,
  `commento` varchar(200) DEFAULT NULL,
  `nome_u` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `commenti`
--

INSERT INTO `commenti` (`codcomm`, `codc`, `commento`, `nome_u`) VALUES
(5, 1, 'bella canzone!', 'Simone'),
(6, 1, 'CIAO', 'Simone'),
(7, 1, 'jj', 'Simone'),
(8, 1, 'ciao', 'Simone'),
(9, 2, '☺', 'a'),
(10, 3, 'Bella canzone!', 'Prova'),
(11, 2, 'wow', 'Prova');

-- --------------------------------------------------------

--
-- Table structure for table `slike`
--

CREATE TABLE `slike` (
  `codc` int(11) NOT NULL,
  `nome_u` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slike`
--

INSERT INTO `slike` (`codc`, `nome_u`) VALUES
(1, 'a'),
(1, 'Prova'),
(1, 'Simone'),
(2, 'a'),
(2, 'Prova'),
(3, 'Prova');

-- --------------------------------------------------------

--
-- Table structure for table `utente`
--

CREATE TABLE `utente` (
  `nome_u` varchar(30) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `cognome` varchar(30) NOT NULL,
  `dataN` date NOT NULL,
  `psw` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `utente`
--

INSERT INTO `utente` (`nome_u`, `nome`, `cognome`, `dataN`, `psw`) VALUES
('a', 'Simone', 'Dinato', '2005-05-12', '0cc175b9c0f1b6a831c399e269772661'),
('Prova', 'prova', 'prova', '2005-05-18', '189bbbb00c5f1fb7fba9ad9285f193d1'),
('Simone', 'Simone', 'Dinato', '2005-05-13', 'e2fc714c4727ee9395f324cd2e7f331f');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `canzone`
--
ALTER TABLE `canzone`
  ADD PRIMARY KEY (`codc`),
  ADD KEY `nome_u` (`nome_u`);

--
-- Indexes for table `commenti`
--
ALTER TABLE `commenti`
  ADD PRIMARY KEY (`codcomm`,`codc`,`nome_u`),
  ADD KEY `nome_u` (`nome_u`),
  ADD KEY `codc` (`codc`);

--
-- Indexes for table `slike`
--
ALTER TABLE `slike`
  ADD PRIMARY KEY (`codc`,`nome_u`),
  ADD KEY `nome_u` (`nome_u`);

--
-- Indexes for table `utente`
--
ALTER TABLE `utente`
  ADD PRIMARY KEY (`nome_u`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `canzone`
--
ALTER TABLE `canzone`
  MODIFY `codc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `commenti`
--
ALTER TABLE `commenti`
  MODIFY `codcomm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `canzone`
--
ALTER TABLE `canzone`
  ADD CONSTRAINT `canzone_ibfk_1` FOREIGN KEY (`nome_u`) REFERENCES `utente` (`nome_u`);

--
-- Constraints for table `commenti`
--
ALTER TABLE `commenti`
  ADD CONSTRAINT `commenti_ibfk_1` FOREIGN KEY (`nome_u`) REFERENCES `utente` (`nome_u`),
  ADD CONSTRAINT `commenti_ibfk_2` FOREIGN KEY (`codc`) REFERENCES `canzone` (`codc`);

--
-- Constraints for table `slike`
--
ALTER TABLE `slike`
  ADD CONSTRAINT `slike_ibfk_1` FOREIGN KEY (`nome_u`) REFERENCES `utente` (`nome_u`),
  ADD CONSTRAINT `slike_ibfk_2` FOREIGN KEY (`codc`) REFERENCES `canzone` (`codc`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
