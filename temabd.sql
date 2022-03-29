-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 28, 2022 at 12:51 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `temabd`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `create_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`, `create_datetime`) VALUES
(2, 'admin', 'mail', '81dc9bdb52d04dc20036dbd8313ed055', '2022-01-25 14:54:44'),
(3, 'ad', 'ad@yahoo.com', '523af537946b79c4f8369ed39ba78605', '2022-01-25 15:13:41');

-- --------------------------------------------------------

--
-- Table structure for table `angajati`
--

CREATE TABLE `angajati` (
  `ID_Angajat` int(50) NOT NULL,
  `ID_Magazin` int(50) NOT NULL,
  `Nume` varchar(255) NOT NULL,
  `Prenume` varchar(255) NOT NULL,
  `CNP` varchar(13) NOT NULL,
  `Strada` varchar(255) NOT NULL,
  `Numar` varchar(255) NOT NULL,
  `DataNastere` date NOT NULL,
  `Telefon` varchar(15) NOT NULL,
  `Mail` varchar(255) DEFAULT NULL,
  `Program` varchar(255) NOT NULL,
  `Salariu` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `angajati`
--

INSERT INTO `angajati` (`ID_Angajat`, `ID_Magazin`, `Nume`, `Prenume`, `CNP`, `Strada`, `Numar`, `DataNastere`, `Telefon`, `Mail`, `Program`, `Salariu`) VALUES
(5, 15, 'Virgil', 'Manuel', '124464633245', 'Crisana', '24', '1985-01-11', '0765344555', 'manuel.virgil@mail.com', '8', '1500.00'),
(14, 15, 'Constantinescu', 'Sorin', '1851297416271', 'Fagilor', '408', '1965-06-17', '0876456542', 'constantinescu_sorin@gmail.com', '12', '6000.00'),
(15, 57, 'Pop', 'Mariusel', '1980520785123', 'Smochinului', '06', '1980-05-20', '0754999233', 'ovidiu.pop@mail.com', '8', '4500.00'),
(16, 4, 'Marinescu', 'Cristina', '2000622763098', 'Posada', '31', '2000-06-22', '07642334334', 'cristina.m@gmail.com', '5', '800.00'),
(17, 57, 'Harper', 'Sofia', '2980415', 'Tineretului', '25', '1998-04-15', '0256896543', 'sophia.harper@yahoo.com', '8', '2000.00');

-- --------------------------------------------------------

--
-- Table structure for table `clienti`
--

CREATE TABLE `clienti` (
  `ID_Client` int(50) NOT NULL,
  `Nume` varchar(255) NOT NULL,
  `Prenume` varchar(255) NOT NULL,
  `Tip_persoana` varchar(255) NOT NULL,
  `Firma` varchar(255) DEFAULT NULL,
  `Telefon` varchar(15) NOT NULL,
  `Card_credit` varchar(20) DEFAULT NULL,
  `Strada` varchar(255) NOT NULL,
  `Numar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clienti`
--

INSERT INTO `clienti` (`ID_Client`, `Nume`, `Prenume`, `Tip_persoana`, `Firma`, `Telefon`, `Card_credit`, `Strada`, `Numar`) VALUES
(1, 'Marian', 'Gigel', 'Fizica', NULL, '0758789142', '0937399230026461', 'Plictiselii', '3'),
(2, 'Georgescu', 'Florian', 'Juridica', 'Geo Company', '0200440000', '1830575976559381', 'Stejarilor', '205'),
(10, 'Vasiloiu', 'Alexandru', 'Fizica', NULL, '09755', '12434642324', 'Splaiul Independentei', '24'),
(12, 'Popescu', 'Bogdan', 'Juridica', 'IT S.R.L.', '0765871555', '', 'Trecutului', '87'),
(13, 'Manolescu', 'Ana-Maria', 'Juridica', 'itistii', '0829651452', NULL, 'Pandurilor', '81');

-- --------------------------------------------------------

--
-- Table structure for table `comenzi`
--

CREATE TABLE `comenzi` (
  `Nr_Comanda` int(50) NOT NULL,
  `Data` datetime NOT NULL,
  `Modalitate_plata` varchar(255) NOT NULL,
  `Stare_comanda` varchar(255) NOT NULL,
  `ID_Client` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comenzi`
--

INSERT INTO `comenzi` (`Nr_Comanda`, `Data`, `Modalitate_plata`, `Stare_comanda`, `ID_Client`) VALUES
(2, '2021-12-16 15:08:00', 'Cash', 'In procesare', 1),
(6823, '2022-01-27 13:59:08', 'Card', 'Finalizata', 1),
(84235458, '2022-01-27 10:55:58', 'Card', 'Finalizata', 10),
(682355327, '2022-01-27 12:32:48', 'Cash', 'In curs de procesare', 12),
(682355328, '2022-01-27 12:20:00', 'Cash', 'Finalizata', 2);

-- --------------------------------------------------------

--
-- Table structure for table `depozit`
--

CREATE TABLE `depozit` (
  `ID_Magazin` int(50) NOT NULL,
  `ID_Produs` int(50) NOT NULL,
  `Strada` varchar(255) NOT NULL,
  `Numar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `depozit`
--

INSERT INTO `depozit` (`ID_Magazin`, `ID_Produs`, `Strada`, `Numar`) VALUES
(8, 11, 'Trandafirilor', '45'),
(15, 9, 'Parului', '23'),
(58, 12, 'Eroilor', '60');

-- --------------------------------------------------------

--
-- Table structure for table `factura`
--

CREATE TABLE `factura` (
  `Nr_Factura` int(50) NOT NULL,
  `ID_Furnizor` int(50) NOT NULL,
  `Data_Facturare` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `factura`
--

INSERT INTO `factura` (`Nr_Factura`, `ID_Furnizor`, `Data_Facturare`) VALUES
(2, 4, '2021-12-08'),
(3, 4, '2021-12-28'),
(4, 4, '2021-11-20'),
(5, 2, '2021-12-09'),
(6, 8, '2022-01-25');

-- --------------------------------------------------------

--
-- Table structure for table `furnizor`
--

CREATE TABLE `furnizor` (
  `ID_Furnizor` int(50) NOT NULL,
  `Nume` varchar(255) NOT NULL,
  `Strada` varchar(255) NOT NULL,
  `Numar` varchar(255) NOT NULL,
  `Mail` varchar(255) NOT NULL,
  `Telefon` varchar(15) NOT NULL,
  `Judet` varchar(255) NOT NULL,
  `Localitate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `furnizor`
--

INSERT INTO `furnizor` (`ID_Furnizor`, `Nume`, `Strada`, `Numar`, `Mail`, `Telefon`, `Judet`, `Localitate`) VALUES
(1, 'Samsung', 'Dimitrie Pompeiu', '5-7', 'samsung.romania@yahoo.com', '0765344555', 'Bucuresti', 'Sectorul 2'),
(2, 'LG', 'Marinarilor ', '4', 'lg_romania@gmail.com', '0212325543', 'Bucuresti', 'Sectorul 1'),
(4, 'Apple', 'Virtutii', '148', 'apple@support.com', '0212005200', 'Bucuresti', 'Sectorul 1'),
(8, 'RappAndTune', 'Bucovinei', '23', 'rappandtune@official.com', '0758789145', 'Ilfov', 'Buftea');

-- --------------------------------------------------------

--
-- Table structure for table `magazin`
--

CREATE TABLE `magazin` (
  `ID_Magazin` int(50) NOT NULL,
  `Oras` varchar(255) NOT NULL,
  `Strada` varchar(255) NOT NULL,
  `Numar` varchar(255) NOT NULL,
  `Tip` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `magazin`
--

INSERT INTO `magazin` (`ID_Magazin`, `Oras`, `Strada`, `Numar`, `Tip`) VALUES
(4, 'Olanesti', 'Panselutelor', '32', 'Mic'),
(8, 'Calimanesti', 'Marului', '768', 'Mediu'),
(9, 'Mihaesti', 'Albinelor', '09', 'Mic'),
(15, 'Dragasani', 'Parului', '10', 'Mediu'),
(57, 'Valcea', 'Eroilor', '12', 'Mare'),
(58, 'Valcea', 'Cerna', '5', 'Mediu');

-- --------------------------------------------------------

--
-- Table structure for table `produs`
--

CREATE TABLE `produs` (
  `ID_Produs` int(50) NOT NULL,
  `Denumire` varchar(255) NOT NULL,
  `Tip_produs` varchar(255) NOT NULL,
  `Unitate_masura` varchar(255) NOT NULL,
  `Pret_unitar` decimal(10,0) NOT NULL,
  `Cantitate` int(11) NOT NULL,
  `Nr_Factura` int(11) NOT NULL,
  `Nr_Comanda` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produs`
--

INSERT INTO `produs` (`ID_Produs`, `Denumire`, `Tip_produs`, `Unitate_masura`, `Pret_unitar`, `Cantitate`, `Nr_Factura`, `Nr_Comanda`) VALUES
(8, 'LGF10', 'Frigider', 'Bucati', '20000', 12, 2, 2),
(9, 'iPhone 13', 'Telefon', 'Bucati', '6000', 50, 3, 84235458),
(10, 'Mac', 'Laptop', 'Bucati', '10000', 5, 4, 6823),
(11, 'LG4k', 'Televizor', 'Unitati', '2500', 10, 5, NULL),
(12, 'WH-1000X M3', 'Casti audio', 'Bucati', '1000', 100, 6, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `angajati`
--
ALTER TABLE `angajati`
  ADD PRIMARY KEY (`ID_Angajat`),
  ADD UNIQUE KEY `CNP` (`CNP`),
  ADD KEY `ID_Magazin` (`ID_Magazin`);

--
-- Indexes for table `clienti`
--
ALTER TABLE `clienti`
  ADD PRIMARY KEY (`ID_Client`);

--
-- Indexes for table `comenzi`
--
ALTER TABLE `comenzi`
  ADD PRIMARY KEY (`Nr_Comanda`),
  ADD KEY `ID_Client` (`ID_Client`);

--
-- Indexes for table `depozit`
--
ALTER TABLE `depozit`
  ADD PRIMARY KEY (`ID_Magazin`,`ID_Produs`),
  ADD KEY `ID_Produs` (`ID_Produs`);

--
-- Indexes for table `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`Nr_Factura`),
  ADD KEY `ID_Furnizor` (`ID_Furnizor`);

--
-- Indexes for table `furnizor`
--
ALTER TABLE `furnizor`
  ADD PRIMARY KEY (`ID_Furnizor`);

--
-- Indexes for table `magazin`
--
ALTER TABLE `magazin`
  ADD PRIMARY KEY (`ID_Magazin`);

--
-- Indexes for table `produs`
--
ALTER TABLE `produs`
  ADD PRIMARY KEY (`ID_Produs`),
  ADD KEY `Nr_Comanda` (`Nr_Comanda`),
  ADD KEY `Nr_Factura` (`Nr_Factura`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `angajati`
--
ALTER TABLE `angajati`
  MODIFY `ID_Angajat` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `clienti`
--
ALTER TABLE `clienti`
  MODIFY `ID_Client` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `comenzi`
--
ALTER TABLE `comenzi`
  MODIFY `Nr_Comanda` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=682355330;

--
-- AUTO_INCREMENT for table `factura`
--
ALTER TABLE `factura`
  MODIFY `Nr_Factura` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `magazin`
--
ALTER TABLE `magazin`
  MODIFY `ID_Magazin` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `produs`
--
ALTER TABLE `produs`
  MODIFY `ID_Produs` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `angajati`
--
ALTER TABLE `angajati`
  ADD CONSTRAINT `angajati_ibfk_1` FOREIGN KEY (`ID_Magazin`) REFERENCES `magazin` (`ID_Magazin`);

--
-- Constraints for table `comenzi`
--
ALTER TABLE `comenzi`
  ADD CONSTRAINT `comenzi_ibfk_1` FOREIGN KEY (`ID_Client`) REFERENCES `clienti` (`ID_Client`);

--
-- Constraints for table `depozit`
--
ALTER TABLE `depozit`
  ADD CONSTRAINT `depozit_ibfk_2` FOREIGN KEY (`ID_Magazin`) REFERENCES `magazin` (`ID_Magazin`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `depozit_ibfk_3` FOREIGN KEY (`ID_Produs`) REFERENCES `produs` (`ID_Produs`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `factura_ibfk_1` FOREIGN KEY (`ID_Furnizor`) REFERENCES `furnizor` (`ID_Furnizor`);

--
-- Constraints for table `produs`
--
ALTER TABLE `produs`
  ADD CONSTRAINT `produs_ibfk_1` FOREIGN KEY (`Nr_Comanda`) REFERENCES `comenzi` (`Nr_Comanda`),
  ADD CONSTRAINT `produs_ibfk_2` FOREIGN KEY (`Nr_Factura`) REFERENCES `factura` (`Nr_Factura`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
