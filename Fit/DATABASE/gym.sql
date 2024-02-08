-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2024 at 05:17 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gym`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Username` varchar(11) NOT NULL,
  `Password` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Username`, `Password`) VALUES
('admin', 'hello'),
('admin@gmail', 'audrey'),
('gym@roar', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `ID` int(11) NOT NULL,
  `No` int(11) NOT NULL,
  `Announcements` text NOT NULL,
  `Name` varchar(50) NOT NULL DEFAULT 'GYM ROAR Announcement'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`ID`, `No`, `Announcements`, `Name`) VALUES
(0, 1, 'HelLo, Im sorry were closed tomorrow, due to pandemic', 'GYM ROAR Announcement');

-- --------------------------------------------------------

--
-- Table structure for table `checkin`
--

CREATE TABLE `checkin` (
  `First_Name` varchar(50) NOT NULL,
  `Last_Name` varchar(50) NOT NULL,
  `Date` date NOT NULL,
  `Time_In` time NOT NULL,
  `Time_Out` time NOT NULL,
  `Email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `checkin`
--

INSERT INTO `checkin` (`First_Name`, `Last_Name`, `Date`, `Time_In`, `Time_Out`, `Email`) VALUES
('Dana', 'Mcnulty', '2024-02-05', '02:37:00', '02:38:00', 'charles@roar');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `No` int(11) NOT NULL,
  `First_Name` varchar(50) NOT NULL,
  `Last_Name` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Feedback` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`No`, `First_Name`, `Last_Name`, `Email`, `Feedback`) VALUES
(1, 'Audrey', 'Camarillo', 'audrey@roar', 'HAHAHAHHAHA im done'),
(2, 'Audrey', 'Camarillo', 'audrey@roar', 'kansamidaaa~'),
(3, 'Bumbay', 'Mcnulty', 'mcnulty@roar', 'Pwede pakilinisan po yung Restroom and yung dumbel, kasi makalawang na'),
(4, 'Dana', 'Mcnulty', 'charles@roar', 'Ang ganda po ng Gym niyo and ang ayos, komportable po gamitin yung dumbell');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `Image` varchar(50) NOT NULL,
  `First_Name` varchar(50) NOT NULL,
  `Last_Name` varchar(50) NOT NULL,
  `Age` int(50) NOT NULL,
  `Gender` varchar(20) NOT NULL,
  `Contact_Number` varchar(11) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `Id_Issue` varchar(20) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `Status` varchar(20) DEFAULT 'Pending',
  `Start_Date` date NOT NULL,
  `End_Date` date NOT NULL,
  `Name` varchar(50) NOT NULL DEFAULT 'GYM ROAR Announcement'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`Image`, `First_Name`, `Last_Name`, `Age`, `Gender`, `Contact_Number`, `Address`, `Id_Issue`, `Email`, `Password`, `Status`, `Start_Date`, `End_Date`, `Name`) VALUES
('Kirk.jpg', 'Dana', 'Mcnulty', 20, 'Male', '09123465925', 'None', 'GOVERNMENT / NON-GOV', 'charles@roar', 'roar', 'Active', '2024-02-08', '2024-03-08', 'GYM ROAR Announcement'),
('Kass.jpg', 'Kassandra', 'Rosal', 20, 'Female', '2147483647', 'NONE', 'GOVERNMENT / NON-GOV', 'kass@roar', 'kass', 'Active', '2024-02-08', '2024-03-08', 'GYM ROAR Announcement'),
('Kirk.jpg', 'Kirk', 'Revilleza', 21, 'Male', '2147483647', 'None', 'Government', 'kirk@roar', 'kirk', 'Inactive', '0000-00-00', '0000-00-00', 'GYM ROAR Announcement'),
('Kristelle.jpg', 'Kristelle', 'Borre', 22, 'Fale', '2147483647', 'NONE', 'Government', 'kristelle@roar', 'kristelle', 'Active', '0000-00-00', '0000-00-00', 'GYM ROAR Announcement'),
('Audrey.jpg', 'super', 'long', 0, '', '', '69', 'Government', 'long@roar', 'long', 'Active', '0000-00-00', '0000-00-00', 'GYM ROAR Announcement');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`No`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`No`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD UNIQUE KEY `Email` (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `No` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `No` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
