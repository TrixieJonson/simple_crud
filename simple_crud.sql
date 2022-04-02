-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2022 at 01:53 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simple_crud`
--

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `ID` int(11) NOT NULL,
  `RegionID` int(11) NOT NULL,
  `City` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`ID`, `RegionID`, `City`) VALUES
(1, 5, 'Batangas'),
(2, 5, 'Cavite'),
(3, 5, 'Laguna'),
(4, 5, 'Quezon'),
(5, 5, 'Rizal'),
(6, 2, 'Ilocos Norte'),
(7, 2, 'Ilocos Sur'),
(8, 2, 'La Union'),
(9, 2, 'Pangasinan'),
(10, 3, 'Batanes'),
(11, 3, ', Cagayan'),
(12, 3, ', Isabela'),
(13, 3, ', Nueva Vizcaya'),
(14, 3, 'Quirino'),
(15, 4, 'Aurora'),
(16, 4, 'Bataan'),
(17, 4, 'Bulacan'),
(18, 4, 'Nueva Ecija'),
(19, 4, 'Pampanga'),
(20, 4, 'Tarlac'),
(21, 4, 'Zambales'),
(22, 6, 'Marinduque'),
(23, 6, 'Occidental Mindoro'),
(24, 6, 'Oriental Mindoro'),
(25, 6, 'Palawan'),
(26, 6, 'Romblon'),
(27, 7, 'Albay'),
(28, 7, 'Camarines Norte'),
(29, 7, 'Camarines Sur'),
(30, 7, 'Catanduanes'),
(31, 7, 'Masbate'),
(32, 7, 'Sorsogon'),
(33, 8, 'Aklan'),
(34, 8, 'Antique'),
(35, 8, 'Capiz'),
(36, 8, 'Guimaras'),
(37, 8, 'Iloilo'),
(38, 8, 'Negros Occidental'),
(39, 9, 'Bohol'),
(40, 9, 'Cebu'),
(41, 9, 'Negros Oriental'),
(42, 9, 'Siquijor'),
(43, 10, 'Biliran'),
(44, 10, 'Eastern Samar'),
(45, 10, 'Leyte'),
(46, 10, 'Northern Samar'),
(47, 10, 'Samar'),
(48, 10, 'Southern Leyte'),
(49, 11, 'Zamboanga del Norte'),
(50, 11, 'Zamboanga del Sur'),
(51, 11, 'Zamboanga Sibugay'),
(52, 12, 'Bukidnon'),
(53, 12, 'Camiguin'),
(54, 12, 'Lanao del Norte'),
(55, 12, 'Misamis Occidental'),
(56, 12, 'Misamis Oriental'),
(57, 13, 'Davao de Oro'),
(58, 13, 'Davao del Norte'),
(59, 13, 'Davao del Sur'),
(60, 13, 'Davao Occidental'),
(61, 13, 'Davao Oriental'),
(62, 14, 'Cotabato'),
(63, 14, 'Sarangani'),
(64, 14, 'South Cotabato'),
(65, 14, 'Sultan Kudarat'),
(66, 15, 'Agusan del Norte'),
(67, 15, 'Agusan del Sur'),
(68, 15, 'Dinagat Islands'),
(69, 15, 'Surigao del Norte'),
(70, 15, 'Surigao del Sur'),
(71, 16, 'Basilan'),
(72, 16, 'Lanao del Sur'),
(73, 16, 'Maguindanao'),
(74, 16, 'Sulu'),
(75, 16, 'Tawi-Tawi'),
(76, 17, 'Abra'),
(77, 17, 'Apayao'),
(78, 17, 'Benguet'),
(79, 17, 'Ifugao'),
(80, 17, 'Kalinga'),
(81, 17, 'Mountain Province'),
(82, 1, 'Manila');

-- --------------------------------------------------------

--
-- Table structure for table `region`
--

CREATE TABLE `region` (
  `ID` int(11) NOT NULL,
  `Region` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `region`
--

INSERT INTO `region` (`ID`, `Region`) VALUES
(1, 'NCR: National Capital Region'),
(2, 'Region 1: Ilocos Region'),
(3, 'Region 2: Cagayan Valley'),
(4, 'Region 3: Central Luzon'),
(5, 'Region 4A: Calabarzon'),
(6, 'Region 4B: MIMAROPA / Southwestern Tagalog'),
(7, 'Region 5: Bicol Region'),
(8, 'Region 6: Western Visayas'),
(9, 'Region 7: Central Visayas'),
(10, 'Region 8: Eastern Visayas'),
(11, 'Region 9: Zamboanga Peninsula'),
(12, 'Region 10: Northern Mindanao\r\n'),
(13, 'Region 11: Davao Region\r\n'),
(14, 'Region 12: Soccskargen\r\n'),
(15, 'Region 13: Caraga Region\r\n'),
(16, 'Barmm: Bangsamoro Autonomous Region in Muslim Mindanao\r\n'),
(17, 'CAR: Cordillera Administrative Region');

-- --------------------------------------------------------

--
-- Table structure for table `student_profile`
--

CREATE TABLE `student_profile` (
  `ID` int(11) NOT NULL,
  `First_Name` varchar(100) NOT NULL,
  `Middle_Name` varchar(100) NOT NULL,
  `Last_Name` varchar(100) NOT NULL,
  `Birthday` date NOT NULL,
  `Age` int(11) NOT NULL,
  `Address_1` varchar(150) NOT NULL,
  `Address_2` varchar(150) NOT NULL,
  `Region` varchar(150) NOT NULL,
  `City` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_profile`
--

INSERT INTO `student_profile` (`ID`, `First_Name`, `Middle_Name`, `Last_Name`, `Birthday`, `Age`, `Address_1`, `Address_2`, `Region`, `City`) VALUES
(195, 'Trixieeeeeeee', 'Lejanoooooooo', 'Jonsonnnnn', '1997-01-01', 25, 'Brgy Bungahannn', 'Brgy Malaruhatan', 'Region 4A: Calabarzon', 'Laguna'),
(196, 'Renzo', 'Lejano', 'Jonson', '1970-01-01', 52, 'Brgy San Diego', 'Brgy Malaruhatan', 'Region 3: Central Luzon', 'Nueva Ecija'),
(200, 'Jay', 'Lamano', 'Lejano', '1996-02-16', 26, 'Brgy Bungahan', 'Brgy San Diego', 'NCR: National Capital Region', 'Manila');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `region`
--
ALTER TABLE `region`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `student_profile`
--
ALTER TABLE `student_profile`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `region`
--
ALTER TABLE `region`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `student_profile`
--
ALTER TABLE `student_profile`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
