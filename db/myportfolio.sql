-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2022 at 02:55 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myportfolio`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `aboutID` int(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `subtitle` varchar(1000) NOT NULL,
  `name` varchar(255) NOT NULL,
  `telNumber` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `education` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `profile` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`aboutID`, `title`, `subtitle`, `name`, `telNumber`, `email`, `education`, `dob`, `profile`, `status`) VALUES
(1, 'About me', 'I am seeking an oppertunity where i can\r\nuse my skill and knowledge to growth\r\nalong with the organization objective. I wish to work in a dynamic organisation\r\nthat will contribute to my professional and personal growth while I contribute to the growth of the company as well as engage in opportunities to further the company’s goals.”', 'Vijay Singh Mehta', '8979508259', 'vijaysinghmehta25@gmail.com', 'Diploma for web designing and devlopment', '1998-11-18', '6370c894a1084_image (5).jpg', '1'),
(2, 'About me', 'I am seeking an oppertunity where i can\r\nuse my skill and knowledge to growth\r\nalong with the organization objective. I wish to work in a dynamic organisation\r\nthat will contribute to my professional and personal growth while I contribute to the growth of the company as well as engage in opportunities to further the company’s goals.”', 'Vijay Singh Mehta', '8979508259', 'vijaysinghmehta25@gmail.com', 'Diploma for web designing and devlopment', '1998-11-18', '6370c894a1075_image (5).jpg', '1');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminID` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminID`, `name`, `email`, `password`) VALUES
(1, 'admin', 'admin@gmail.com', 'd033e22ae348aeb5660fc2140aec35850c4da997');

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `autoID` int(255) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `subTitle` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `logo` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`autoID`, `title`, `subTitle`, `logo`, `time`) VALUES
(1, 'Welcome to my world', 'This is my official portfolio website to showcase my all works related to web devlopment ad UI/UX design', '6370b648834a6_7fba0e35a30d41700caae830f7236d4b.png', '2022-11-13 09:18:00');

-- --------------------------------------------------------

--
-- Table structure for table `myskills`
--

CREATE TABLE `myskills` (
  `skillID` int(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `subtitle` varchar(255) NOT NULL,
  `skillName` varchar(255) NOT NULL,
  `skillPercentage` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `myskills`
--

INSERT INTO `myskills` (`skillID`, `title`, `subtitle`, `skillName`, `skillPercentage`) VALUES
(1, 'My skills', 'Here is my skills for a web devlopement and web designing.', 'HTML/CSS', '80'),
(2, 'My skill', 'Here is my skills for a web devlopement and web designing.', 'Bootstrap', '70'),
(3, 'My skill', 'Here is my skills for a web devlopement and web designing.', 'Javascript', '65'),
(4, 'My skills', 'Here is my skills for a web devlopement and web designing.', 'PHP', '65'),
(5, 'My skill', 'Here is my skills for a web devlopement and web designing.', 'Mysqli', '60'),
(7, 'My skills', 'Here is my skills for a web devlopement and web designing.', 'Photoshop/Illutrator', '70');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `serviceID` int(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `subtitle` varchar(500) NOT NULL,
  `serviceName` varchar(255) NOT NULL,
  `fonticon` varchar(255) NOT NULL,
  `serviceInfo` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`serviceID`, `title`, `subtitle`, `serviceName`, `fonticon`, `serviceInfo`, `icon`, `date`) VALUES
(1, 'My awesome esrvice', 'I am provide batter service for we designing, web devlopement and graphic design.', 'Graphic design', 'fa-solid fa-pen-nib', 'I am provide creative logo, banner, website template', '6370f07515525_7fba0e35a30d41700caae830f7236d4b.png', '2022-11-13 13:26:13'),
(2, 'My awesome service', 'I am provide batter service for web designing, web devlopement and graphic design.', 'UI/UX design', 'fa-solid fa-mobile-screen', 'Making cretive ui/ux design fore batter user expereance.', '6370ee77443a1_7fba0e35a30d41700caae830f7236d4b.png', '2022-11-13 13:17:43'),
(3, 'My awesome service', 'I am provide batter service for web designing, web devlopement and graphic design.', 'Web devlopement', 'fa-solid fa-code', 'i am using php and mysqli for backend evlopment', '6370efe1a55d3_7fba0e35a30d41700caae830f7236d4b.png', '2022-11-13 13:23:45');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phoneNumber` int(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `massage` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `name`, `phoneNumber`, `email`, `massage`) VALUES
(1, 'fgj', 6785785, 'aads@gmail.com', 'undefined'),
(2, 'fdghdgh', 56475, 'fgdh@gmail.com', 'undefined'),
(3, 'sdgdsfg', 45675467, 'dfhgd@gmail.com', 'undefined'),
(4, 'fgjf', 6857, 'dfhgd@gmail.com', 'undefined'),
(5, 'fgjf', 6857, 'dfhgd@gmail.com', 'undefined'),
(6, 'hgjf', 56785, 'dfhgd@gmail.com', 'undefined'),
(7, 'gfhfgj', 567456, 'dfhgd@gmail.com', 'undefined'),
(8, 'dfh', 567467, 'dfhgd@gmail.com', 'undefined'),
(9, 'rte', 5647674, 'dfgdf@gmail.com', 'undefined'),
(10, 'ffghdfg', 567465, 'fghfhd@gmail.com', 'undefined'),
(11, 'ffghdfg', 567465, 'fghfhd@gmail.com', 'undefined'),
(12, 'ffghdfg', 567465, 'fghfhd@gmail.com', 'undefined'),
(13, 'asdfa', 4563463, 'vcghc@gmail.com', 'undefined'),
(14, 'dfghdf', 545674, 'fghd@gmail.com', 'undefined'),
(15, 'yuit', 7696789, 'yutyu@gmail.com', ''),
(16, 'dfghd', 567567, 'gfgh@gmail.com', 'gvhjhbjkghjk');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`aboutID`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`autoID`);

--
-- Indexes for table `myskills`
--
ALTER TABLE `myskills`
  ADD PRIMARY KEY (`skillID`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`serviceID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `aboutID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `autoID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `myskills`
--
ALTER TABLE `myskills`
  MODIFY `skillID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `serviceID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
