-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2022 at 10:39 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stilteaubv`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `ProductID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `Stock` int(11) NOT NULL,
  `Price` decimal(65,2) NOT NULL,
  `Creation_Date` timestamp NOT NULL DEFAULT current_timestamp(),
  `Created_By` int(11) DEFAULT NULL,
  `description_en` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ProductID`, `Name`, `Description`, `Stock`, `Price`, `Creation_Date`, `Created_By`, `description_en`) VALUES
(1, '60s Package', 'Jaren 60 thema met 10 headsets en 1 zender', 12, '64.95', '2022-03-26 18:00:24', 1, '60\'s theme with 10 headsets and a receiver.'),
(2, '70s Package', 'Jaren 70 thema met 10 headsets en 1 zender', 16, '64.99', '2022-03-26 18:00:24', 1, '70\'s package with 10 headsets and a receiver.'),
(3, '80s Package', 'Jaren 80 thema met 10 headsets en 1 zender', 6, '69.99', '2022-03-26 18:00:24', 1, '80\'s package with 10 headsets and a receiver.'),
(4, '90s Package', 'Jaren 90 thema met 10 headsets en 1 zender', 18, '69.99', '2022-03-26 18:00:24', 1, '90\'s package with 10 headsets and a receiver.'),
(5, '00s Package', 'Jaren 00 thema met 10 headsets en 1 zender', 3, '74.99', '2022-03-26 18:00:24', 1, '00s package with 10 headsets and a receiver.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ProductID`),
  ADD KEY `Created_By` (`Created_By`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `ProductID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`Created_By`) REFERENCES `employees` (`EmployeeID`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
