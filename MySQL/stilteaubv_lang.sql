-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2022 at 12:41 PM
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
-- Table structure for table `content`
--

CREATE TABLE `content` (
                           `ContentID` int(11) NOT NULL,
                           `title_nl` varchar(255) DEFAULT NULL,
                           `title_en` varchar(255) DEFAULT NULL,
                           `text_nl` varchar(255) DEFAULT NULL,
                           `text_en` varchar(255) DEFAULT NULL,
                           `link` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `content`
--

INSERT INTO `content` (`ContentID`, `title_nl`, `title_en`, `text_nl`, `text_en`, `link`) VALUES
(1, 'Over Ons', 'About Us', 'Wij verkopen silent disco\'s.', 'We sell silent disco\'s.', 'overons.php'),
(2, 'Over Ons', 'About Us', 'Plaats', 'City', 'overons.php'),
(3, 'Silent Disco', 'Silent Disco', 'Huur een volledige doe-het-zelf Silent Disco set met koptelefoons. Het systeem is makkelijk aan te sluiten op een laptop of op DJ-apparatuur met het door jou gekozen thema pakket. Binnen een mum van tijd organiseer jij zelf een Silent Disco!', 'Hire your own Silent Disco with headphones. The system is easy-to-use and is compatible with most DJ-gear and laptops. It even has theme songs, so you can get started within minutes!', 'index.php'),
(4, NULL, NULL, 'Bekijk onze producten!', 'Get your products here!', 'index.php'),
(5, 'Voornaam', 'First Name', NULL, NULL, 'index.php'),
(6, 'Achternaam', 'Last Name', NULL, NULL, 'index.php'),
(7, 'Email', 'Email', 'We zullen je email niet delen met anderen!', 'We won\'t give your email to third parties', 'index.php'),
(8, 'Telefoon', 'Telephone', NULL, NULL, 'index.php'),
(9, 'Onderwerp', 'Subject', NULL, NULL, 'index.php'),
(10, 'Omschrijving', 'Description', NULL, NULL, 'index.php'),
(11, 'Verzenden', 'Send', NULL, NULL, 'index.php'),
(12, 'Contactformulier', 'Contact us', NULL, NULL, 'index.php'),
(13, 'Naam', 'Name', 'Postcode', 'Zip code', 'overons.php'),
(14, 'Tussenvoegsel', 'Middle name', 'Straat huisnummer-toevoeging', 'Street housenumber-addon', 'index.php'),
(15, 'Postcode', 'Zip code', 'Stad', 'City', 'index.php'),
(16, 'Afrekenen', 'Purchase', 'Winkelwagen leegmaken', 'Empty cart', 'index.php');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`ContentID`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--
--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `EmployeeID` int(11) NOT NULL,
  `First_Name` varchar(25) NOT NULL,
  `Middle_Name` varchar(25) DEFAULT NULL,
  `Last_Name` varchar(25) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(25) NOT NULL,
  `Creation_Date` timestamp NOT NULL DEFAULT current_timestamp(),
  `Created_By` int(11) DEFAULT NULL,
  `Last_Active` datetime DEFAULT NULL,
  `ACTIVE` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`EmployeeID`, `First_Name`, `Middle_Name`, `Last_Name`, `Email`, `Password`, `Creation_Date`, `Created_By`, `Last_Active`, `ACTIVE`) VALUES
(1, 'wesley', NULL, 'Geboers', 'w.geboers@student.avans.nl', 'P@ssw0rd@2022!', '2022-03-26 18:00:00', NULL, NULL, 1),
(2, 'Marcel', NULL, 'Forman', 'm.forman@student.avans.nl', 'P@ssw0rd@2022!', '2022-03-26 18:00:00', 1, NULL, 1),
(3, 'Bart', NULL, 'Frijters', 'bjal.frijters@student.avans.nl', 'P@ssw0rd@2022!', '2022-03-26 18:00:00', 1, NULL, 1),
(4, 'Thomas', NULL, 'Daane', 'trbl.daane@student.avans.nl', 'P@ssw0rd@2022!', '2022-03-26 18:00:00', 1, NULL, 1),
(5, 'Sanel', 'van den', 'Bogert', 'avd.bogert@student.avans.nl', 'P@ssw0rd@2022!', '2022-03-26 18:00:00', 1, NULL, 1),
(6, 'Tinky', '', 'WInky', 'l.schippers@student.avans.nl', '<br /><b>Notice</b>:  Und', '2022-03-26 18:00:00', 1, NULL, 1),
(14, 'Jan', 'van', 'Blisteren', 'jvanblisteren@gmail.com', '<br /><b>Notice</b>:  Und', '2022-05-29 17:32:11', NULL, NULL, 1),
(15, 'Piet', '', 'fesfes', 'fesfe@gmail.com', '1Gizmo99mimo7', '2022-05-29 18:24:18', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `employees-roles`
--

CREATE TABLE `employees-roles` (
  `TableID` int(11) NOT NULL,
  `EmployeeID` int(11) NOT NULL,
  `RoleID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employees-roles`
--

INSERT INTO `employees-roles` (`TableID`, `EmployeeID`, `RoleID`) VALUES
(1, 1, 2),
(2, 2, 1),
(3, 3, 3),
(4, 4, 4),
(5, 5, 5),
(7, 14, 4),
(8, 15, 1);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `ImageID` int(11) NOT NULL,
  `File_Name` varchar(255) NOT NULL,
  `File_Path` text NOT NULL,
  `Creation_Date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`ImageID`, `File_Name`, `File_Path`, `Creation_Date`) VALUES
(4, 'Headset.jpg', 'Images/Headset.jpg', '2022-05-28 08:52:11'),
(5, '80s.jpg', 'Images/80s.jpg', '2022-05-28 08:56:56'),
(6, '70s.png', 'Images/70s.png', '2022-05-28 08:57:28'),
(7, '90s.png', 'Images/90s.png', '2022-05-28 08:57:34'),
(8, 'Logo.png', 'Images/Logo.png', '2022-05-28 09:00:47'),
(9, '00s.jpg', 'Images/00s.jpg', '2022-05-29 20:29:44'),
(10, '60s.jpg', 'Images/60s.jpg', '2022-05-29 20:29:50');

-- --------------------------------------------------------

--
-- Stand-in structure for view `invoices`
-- (See below for the actual view)
--
CREATE TABLE `invoices` (
`First_Name` varchar(25)
,`Last_Name` varchar(25)
,`Email` varchar(50)
,`Total_Price` decimal(65,2)
,`Status` varchar(25)
);

-- --------------------------------------------------------

--
-- Table structure for table `orderheaders`
--

CREATE TABLE `orderheaders` (
  `HeaderID` int(11) NOT NULL,
  `Order_By` int(11) DEFAULT NULL,
  `Total_Price` decimal(65,2) NOT NULL,
  `Deliver_Adres` varchar(255) NOT NULL,
  `Deliver_Zipcode` varchar(10) NOT NULL,
  `Deliver_City` varchar(50) NOT NULL,
  `Creation_Date` timestamp NOT NULL DEFAULT current_timestamp(),
  `Finished_Date` datetime DEFAULT NULL,
  `Status` varchar(25) NOT NULL DEFAULT 'Openstaand'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orderheaders`
--

INSERT INTO `orderheaders` (`HeaderID`, `Order_By`, `Total_Price`, `Deliver_Adres`, `Deliver_Zipcode`, `Deliver_City`, `Creation_Date`, `Finished_Date`, `Status`) VALUES
(1, 1, '349.95', 'Midscheeps 65', '8899 BT', 'Vlieland', '2022-03-26 18:00:37', NULL, 'In behandeling'),
(2, 3, '69.99', 'Blauwe Pan 56-A', '1317 AP', 'Almere', '2022-03-26 18:00:37', '2022-03-26 19:00:37', 'Openstaand'),
(35, NULL, '909.30', 'Olivierplaats', '3813 JD', 'Amersfoort', '2022-05-28 16:55:19', '2022-06-02 15:32:20', 'Geleverd'),
(36, NULL, '684.78', 'Olivierplaats', '3813 JD', 'Amersfoort', '2022-05-28 16:56:36', NULL, 'Vertuurd'),
(37, NULL, '324.75', 'Olivierplaats 34', '3813 JD', 'Amersfoort', '2022-05-29 14:28:19', NULL, 'Vertuurd'),
(38, NULL, '584.55', 'Olivierplaats', '3813 JD', 'Amersfoort', '2022-05-29 18:23:24', '2022-06-02 15:27:42', 'Geleverd'),
(39, NULL, '544.80', 'Olivierplaats', '3813 JD', 'Amersfoort', '2022-06-01 20:28:27', '2022-06-02 15:26:41', 'Geleverd');

-- --------------------------------------------------------

--
-- Table structure for table `orderlines`
--

CREATE TABLE `orderlines` (
  `LineID` int(11) NOT NULL,
  `HeaderID` int(11) NOT NULL,
  `ProductID` int(11) DEFAULT NULL,
  `Amount` int(11) NOT NULL,
  `Line_Price` decimal(65,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orderlines`
--

INSERT INTO `orderlines` (`LineID`, `HeaderID`, `ProductID`, `Amount`, `Line_Price`) VALUES
(1, 1, 2, 1, '64.99'),
(2, 1, 3, 3, '209.97'),
(3, 1, 5, 1, '74.99'),
(4, 2, 4, 1, '69.99'),
(5, 35, 1, 9, '584.55'),
(6, 35, 2, 5, '324.75'),
(7, 36, 1, 1, '64.95'),
(8, 36, 2, 2, '129.90'),
(9, 36, 3, 3, '209.97'),
(10, 36, 4, 4, '279.96'),
(11, 37, 1, 5, '324.75'),
(12, 38, 1, 5, '324.75'),
(13, 38, 2, 4, '259.80'),
(14, 39, 4, 5, '349.95'),
(15, 39, 2, 3, '194.85');

--
-- Triggers `orderlines`
--
DELIMITER $$
CREATE TRIGGER `LineTotalPrice` BEFORE INSERT ON `orderlines` FOR EACH ROW SET NEW.Line_Price = NEW.Amount * (SELECT `prd`.`Price` FROM `Products` `prd` WHERE new.`ProductID` = `prd`.`ProductID`)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `UpdateTotalPriceHeader` AFTER INSERT ON `orderlines` FOR EACH ROW UPDATE `OrderHeaders` SET
	`Total_Price` = (SELECT SUM(`Line_Price`) FROM `OrderLines` WHERE `HeaderID` = NEW.`HeaderID`)
    WHERE `HeaderID` = NEW.`HeaderID`
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `productlogs`
--

CREATE TABLE `productlogs` (
  `LogID` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `Modified_Date` timestamp NOT NULL DEFAULT current_timestamp(),
  `Modified_By` int(11) DEFAULT NULL,
  `Name` varchar(50) DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `Stock` int(11) DEFAULT NULL,
  `Price` decimal(65,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `productlogs`
--

INSERT INTO `productlogs` (`LogID`, `ProductID`, `Modified_Date`, `Modified_By`, `Name`, `Description`, `Stock`, `Price`) VALUES
(1, 2, '2022-03-26 18:00:31', 3, NULL, NULL, NULL, NULL),
(2, 1, '2022-03-26 18:00:31', 3, NULL, NULL, NULL, '60.99'),
(3, 3, '2022-03-26 18:00:31', 3, NULL, NULL, 10, NULL),
(4, 2, '2022-03-26 18:00:31', 3, NULL, NULL, 20, NULL),
(5, 5, '2022-03-26 18:00:31', 3, NULL, NULL, 15, NULL),
(6, 2, '2022-06-02 14:10:57', NULL, '70s Package', 'Jaren 70 thema met 10 headsets en 1 zender', 16, '64.99');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `ProductID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `Description_en` varchar(255) DEFAULT NULL,
  `Stock` int(11) NOT NULL,
  `Price` decimal(65,2) NOT NULL,
  `Creation_Date` timestamp NOT NULL DEFAULT current_timestamp(),
  `Created_By` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ProductID`, `Name`, `Description`, `Description_en`, `Stock`, `Price`, `Creation_Date`, `Created_By`) VALUES
(1, '60s Package', 'Jaren 60 thema met 10 headsets en 1 zender', '60s Theme package with 10 headsets and 1 transmitter', 12, '64.95', '2022-03-26 18:00:24', 1),
(2, '70s Package', 'Jaren 70 thema met 10 headsets en 1 zender', '70s Theme package with 10 headsets and 1 transmitter', 16, '64.99', '2022-03-26 18:00:24', 1),
(3, '80s Package', 'Jaren 80 thema met 10 headsets en 1 zender', '80s Theme package with 10 headsets and 1 transmitter', 6, '69.99', '2022-03-26 18:00:24', 1),
(4, '90s Package', 'Jaren 90 thema met 10 headsets en 1 zender', '90s Theme package with 10 headsets and 1 transmitter', 18, '69.99', '2022-03-26 18:00:24', 1),
(5, '00s Package', 'Jaren 00 thema met 10 headsets en 1 zender', '00s Theme package with 10 headsets and 1 transmitter', 3, '74.99', '2022-03-26 18:00:24', 1),
(1, '60s Package', 'Jaren 60 thema met 10 headsets en 1 zender', '60s Theme package with 10 headsets and 1 transmitter', 12, '64.95', '2022-03-26 18:00:24', 1),
(2, '70s Package', 'Jaren 70 thema met 10 headsets en 1 zender', '70s Theme package with 10 headsets and 1 transmitter', 16, '64.99', '2022-03-26 18:00:24', 1),
(3, '80s Package', 'Jaren 80 thema met 10 headsets en 1 zender', '80s Theme package with 10 headsets and 1 transmitter', 6, '69.99', '2022-03-26 18:00:24', 1),
(4, '90s Package', 'Jaren 90 thema met 10 headsets en 1 zender', '90s Theme package with 10 headsets and 1 transmitter', 18, '69.99', '2022-03-26 18:00:24', 1),
(5, '00s Package', 'Jaren 00 thema met 10 headsets en 1 zender', '00s Theme package with 10 headsets and 1 transmitter', 3, '74.99', '2022-03-26 18:00:24', 1);

-- --------------------------------------------------------
--
-- Table structure for table `products-images`
--

CREATE TABLE `products-images` (
  `TableID` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `ImageID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products-images`
--

INSERT INTO `products-images` (`TableID`, `ProductID`, `ImageID`) VALUES
(1, 3, 5),
(4, 4, 7),
(9, 2, 6),
(10, 1, 10),
(11, 5, 9),
(1, 3, 5),
(4, 4, 7),
(9, 2, 6),
(10, 1, 10),
(11, 5, 9);

-- --------------------------------------------------------

--
-- Stand-in structure for view `revenuepermonth`
-- (See below for the actual view)
--
CREATE TABLE `revenuepermonth` (
`Year` int(4)
,`Month` varchar(12)
,`Total` decimal(65,2)
);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `RoleID` int(11) NOT NULL,
  `Name` varchar(25) NOT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `Creation_Date` timestamp NOT NULL DEFAULT current_timestamp(),
  `Created_By` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`RoleID`, `Name`, `Description`, `Creation_Date`, `Created_By`) VALUES
(1, 'Directie', 'Toegang tot medewerkersportaal (lees rechten)', '2022-03-26 18:00:11', 1),
(2, 'IT', 'Toegang tot medewerkersportaal en de database (lees en schrijf rechten)', '2022-03-26 18:00:11', 1),
(3, 'Operations', 'Toegang tot medewerkersportaal (lees en schrijf rechten)', '2022-03-26 18:00:11', 1),
(4, 'Marketing', 'Toegang tot medewerkersportaal (lees en schrijf rechten)', '2022-03-26 18:00:11', 1),
(5, 'Administratie', 'Toegang tot medewerkersportaal (lees rechten)', '2022-03-26 18:00:11', 1),
(6, 'Test', 'Dit is een update!!', '2022-05-27 13:56:32', NULL),
(1, 'Directie', 'Toegang tot medewerkersportaal (lees rechten)', '2022-03-26 18:00:11', 1),
(2, 'IT', 'Toegang tot medewerkersportaal en de database (lees en schrijf rechten)', '2022-03-26 18:00:11', 1),
(3, 'Operations', 'Toegang tot medewerkersportaal (lees en schrijf rechten)', '2022-03-26 18:00:11', 1),
(4, 'Marketing', 'Toegang tot medewerkersportaal (lees en schrijf rechten)', '2022-03-26 18:00:11', 1),
(5, 'Administratie', 'Toegang tot medewerkersportaal (lees rechten)', '2022-03-26 18:00:11', 1),
(6, 'Test', 'Dit is een update!!', '2022-05-27 13:56:32', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `searchhistories`
--

CREATE TABLE `searchhistories` (
  `SearchID` int(11) NOT NULL,
  `Search_Description` text NOT NULL,
  `Passed` tinyint(1) NOT NULL DEFAULT 1,
  `Creation_Date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `searchhistories`
--

INSERT INTO `searchhistories` (`SearchID`, `Search_Description`, `Passed`, `Creation_Date`) VALUES
(1, '00\'s thema', 1, '2022-05-27 14:35:14'),
(1, '00\'s thema', 1, '2022-05-27 14:35:14');

-- --------------------------------------------------------

--
-- Stand-in structure for view `top10productsamount`
-- (See below for the actual view)
--
CREATE TABLE `top10productsamount` (
`ProductName` varchar(50)
,`ProductDescription` varchar(255)
,`TotalAmountSold` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `top10productsprice`
-- (See below for the actual view)
--
CREATE TABLE `top10productsprice` (
`ProductName` varchar(50)
,`ProductDescription` varchar(255)
,`TotalPriceSold` decimal(65,2)
);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int(11) NOT NULL,
  `First_Name` varchar(25) NOT NULL,
  `Middle_Name` varchar(25) DEFAULT NULL,
  `Last_Name` varchar(25) NOT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Phone_Number` varchar(20) DEFAULT NULL,
  `Password` varchar(25) NOT NULL,
  `Street` varchar(100) DEFAULT NULL,
  `House_Number` int(11) DEFAULT NULL,
  `House_Number_Addition` varchar(25) DEFAULT NULL,
  `Zipcode` varchar(10) DEFAULT NULL,
  `City` varchar(50) DEFAULT NULL,
  `Creation_Date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `First_Name`, `Middle_Name`, `Last_Name`, `Email`, `Phone_Number`, `Password`, `Street`, `House_Number`, `House_Number_Addition`, `Zipcode`, `City`, `Creation_Date`) VALUES
(1, 'Hans', NULL, 'Poppelaars', 'HansPoppelaars@teleworm.us', '06-19066719', 'gohm6Ahquae', 'Midscheeps', 65, NULL, '8899 BT', 'Vlieland', '2022-03-26 18:00:05'),
(2, 'Gerbert', 'van', 'Muijen', 'GerbertvanMuijen@rhyta.com', '06-37008585', 'Oosh4eif', 'Irenestraat', 32, NULL, '9744 CV', 'Groningen', '2022-03-26 18:00:05'),
(3, 'Marjolijn', NULL, 'Steverink', 'MarjolijnSteverink@rhyta.com', '06-13191051', 'tohKei1ae', 'Blauwe Pan', 56, '-A', '1317 AP', 'Almere', '2022-03-26 18:00:05'),
(4, 'Faik', NULL, 'Penterman', 'FaikPenterman@dayrep.com', '06-75750105', 'OoD1ahch4ee', 'Ingenieur Lelystraat', 128, NULL, '5142 AM', 'Waalwijk', '2022-03-26 18:00:05'),
(5, 'Marike', NULL, 'Vlieland', 'MarikeVlieland@jourrapide.com', '06-48991805', 'ciez8egeiLa', 'Jacobshoeve-Erf', 153, NULL, '3931 RZ', 'Woudenberg', '2022-03-26 18:00:05'),
(6, 'asd', 'asd', 'asd', 'Pet@pet.com', '06-5984', 'DmEnrEukPzJtuU5', 'pelsakker', 7, 'a', '4834ag', 'breda', '2022-06-09 10:09:25'),
(7, '', '', '', '', '00859485', 'DmEnrEukPzJtuU5', 'pelsakker', 7, 'a', '4834ag', 'breda', '2022-06-09 10:09:52'),
(8, '', '', '', '', '', 'DmEnrEukPzJtuU5', '', 0, '', '', '', '2022-06-09 10:30:17'),
(9, '', '', '', '', '', 'DmEnrEukPzJtuU5', '', 0, '', '', '', '2022-06-09 10:30:30'),
(10, 'b', 'a', 's', '', '', 'DmEnrEukPzJtuU5', '', 0, '', '', '', '2022-06-09 10:30:38'),
(11, '', '', '', '', '', 'DmEnrEukPzJtuU5', '', 0, '', '', '', '2022-06-09 10:31:56'),
(12, 'bart', '', 'frijters', 'pet@pet.com', '00859485', 'DasdEukPzJtuU5', 'pelsakker', 7, '', '4834ag', 'breda', '2022-06-09 10:33:14');

-- --------------------------------------------------------

--
-- Structure for view `invoices`
--
DROP TABLE IF EXISTS `invoices`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `invoices`  AS   (select `users`.`First_Name` AS `First_Name`,`users`.`Last_Name` AS `Last_Name`,`users`.`Email` AS `Email`,`orderheaders`.`Total_Price` AS `Total_Price`,`orderheaders`.`Status` AS `Status` from (`users` join `orderheaders` on(`users`.`UserID` = `orderheaders`.`Order_By`)))  ;

-- --------------------------------------------------------

--
-- Structure for view `revenuepermonth`
--
DROP TABLE IF EXISTS `revenuepermonth`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `revenuepermonth`  AS SELECT year(`orderheaders`.`Finished_Date`) AS `Year`, concat(month(`orderheaders`.`Finished_Date`),' ',monthname(`orderheaders`.`Finished_Date`)) AS `Month`, sum(`orderheaders`.`Total_Price`) AS `Total` FROM `orderheaders` WHERE `orderheaders`.`Status` = 'Geleverd' GROUP BY concat(month(`orderheaders`.`Finished_Date`),' ',monthname(`orderheaders`.`Finished_Date`)), year(`orderheaders`.`Finished_Date`) ORDER BY year(`orderheaders`.`Finished_Date`) ASC, concat(month(`orderheaders`.`Finished_Date`),' ',monthname(`orderheaders`.`Finished_Date`)) ASC ;

-- --------------------------------------------------------

--
-- Structure for view `top10productsamount`
--
DROP TABLE IF EXISTS `top10productsamount`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `top10productsamount`  AS SELECT `prd`.`Name` AS `ProductName`, `prd`.`Description` AS `ProductDescription`, sum(`ol`.`Amount`) AS `TotalAmountSold` FROM (`orderlines` `ol` left join `products` `prd` on(`ol`.`ProductID` = `prd`.`ProductID`)) GROUP BY `ol`.`ProductID` ORDER BY sum(`ol`.`Amount`) DESC LIMIT 0, 10101010 ;

-- --------------------------------------------------------

--
-- Structure for view `top10productsprice`
--
DROP TABLE IF EXISTS `top10productsprice`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `top10productsprice`  AS SELECT `prd`.`Name` AS `ProductName`, `prd`.`Description` AS `ProductDescription`, sum(`ol`.`Line_Price`) AS `TotalPriceSold` FROM (`orderlines` `ol` left join `products` `prd` on(`ol`.`ProductID` = `prd`.`ProductID`)) GROUP BY `ol`.`ProductID` ORDER BY sum(`ol`.`Line_Price`) DESC LIMIT 0, 10101010 ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`ContentID`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`EmployeeID`),
  ADD KEY `EmpCreated_By` (`Created_By`);

--
-- Indexes for table `employees-roles`
--
ALTER TABLE `employees-roles`
  ADD PRIMARY KEY (`TableID`),
  ADD KEY `EmployeeID` (`EmployeeID`),
  ADD KEY `RoleID` (`RoleID`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`ImageID`);

--
-- Indexes for table `orderheaders`
--
ALTER TABLE `orderheaders`
  ADD PRIMARY KEY (`HeaderID`),
  ADD KEY `Order_By` (`Order_By`);

--
-- Indexes for table `orderlines`
--
ALTER TABLE `orderlines`
  ADD PRIMARY KEY (`LineID`),
  ADD KEY `HeaderID` (`HeaderID`),
  ADD KEY `ProductID` (`ProductID`);

--
-- Indexes for table `productlogs`
--
ALTER TABLE `productlogs`
  ADD PRIMARY KEY (`LogID`),
  ADD KEY `ProductID` (`ProductID`),
  ADD KEY `Modified_By` (`Modified_By`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `content`
--
ALTER TABLE `content`
  MODIFY `ContentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
