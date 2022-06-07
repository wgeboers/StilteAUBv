-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2022 at 07:01 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE DATABASE `stilteaubv`;
USE stilteaubv;

--
-- Database: `stilteaubv`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `getOrdersUser` (IN `userID` INT)   BEGIN
	SELECT `Creation_Date`, `HeaderID`, `Total_Price`, `Status`
    FROM `OrderHeaders`
    WHERE `Order_by` = `userID`;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `OrderDetails` (IN `SP_HeaderID` INT)   BEGIN
	SELECT
    	`prd`.`Name`,
        `prd`.`Description`,
        `ol`.`Amount`,
        `ol`.`Line_Price`
    FROM `OrderLines` `ol`
    LEFT JOIN `Products` `prd` ON `prd`.`ProductID` = `ol`.`ProductID`
    WHERE `ol`.`HeaderID` = `SP_HeaderID`;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ShowUserProfile` (IN `SP_ID` INT)   BEGIN
	SELECT
    	`First_Name`, 
        `Middle_Name`, 
        `Last_Name`, 
        `Email`, 
        `Phone_Number`, 
        `Street`, 
        `House_Number`, 
        `House_Number_Addition`, 
        `Zipcode`, 
        `City`
    FROM `users`
    WHERE `UserID` = `SP_ID`;
END$$

--
-- Taal test
--
--
-- Table structure for table `lang-menu`
--

CREATE TABLE `langmenu` (
                                  `id` int(11) NOT NULL,
                                  `en_title` varchar(255) NOT NULL,
                                  `en_description` text NOT NULL,
                                  `nl_title` varchar(255) NOT NULL,
                                  `nl_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
--
-- Dumping data for table `lang-menu`
--

INSERT INTO `langmenu` (`id`, `en_title`, `en_description`, `nl_title`, `nl_description`) VALUES
                                                                                                    (1,'Silent Disco', 'Hire your own Silent Disco with headphones.The system is easy-to-use and is compatible with most DJ-gear and laptops. It even has theme songs, so you can get started within minutes! ', 'Silent Disco', 'Huur een volledige doe-het-zelf Silent Disco set met koptelefoons. Het systeem is makkelijk aan te sluiten op een laptop of op DJ-apparatuur met het door jou gekozen thema pakket. Binnen een mum van tijd organiseer jij zelf een Silent Disco!'),
                                                                                                    (2, '', 'Get your products here!', '', 'Bekijk onze producten!');
                                                                                                    (3, 'First Name', '', 'Voornaam', '');
                                                                                                    (4, 'Last Name', '', 'Achternaam','');
                                                                                                    (5, 'Email', 'We won''t give your email to third parties', 'Email', 'We zullen je email niet delen met anderen');
                                                                                                    (6, 'Telephone', '', 'Telefoon', '');
                                                                                                    (7, 'Subject','', 'Onderwerp', '');
                                                                                                    (8, 'Description', '', 'Omschrijving', '');
--
-- Indexes for table `lang-menu`
--
ALTER TABLE `langmenu`
    ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for table `lang-menu`
--
ALTER TABLE `langmenu`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
--Einde test
--

--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `users_updateName` (`id` INT(11), `FN` VARCHAR(25), `LN` VARCHAR(25)) RETURNS INT(11) DETERMINISTIC BEGIN
	UPDATE `users` SET `First_Name` = `FN`, `Last_Name` = `LN` WHERE `users`.`UserID` = `id`;
    RETURN 1;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `yearsEmployeeInCompany` (`empID` INT) RETURNS INT(11)  BEGIN
	-- Variable voor het startJaar
    DECLARE `startDate` INT;
    
    SELECT YEAR(`Creation_Date`)
    INTO `startDate`
    FROM `employees`
    WHERE `EmployeeID` = `empID`;
    
    -- Bepaal huidig jaar en trek daar het startJaar van af
    RETURN YEAR(CURRENT_TIMESTAMP()) - `startDate`;

END$$

DELIMITER ;

-- --------------------------------------------------------

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
(1, 'Wesley', NULL, 'Geboers', 'w.geboers@student.avans.nl', 'P@ssw0rd@2022!', '2022-03-26 18:00:00', NULL, NULL, 1),
(2, 'Marcel', NULL, 'Forman', 'm.forman@student.avans.nl', 'P@ssw0rd@2022!', '2022-03-26 18:00:00', 1, NULL, 1),
(3, 'Bart', NULL, 'Frijters', 'bjal.frijters@student.avans.nl', 'P@ssw0rd@2022!', '2022-03-26 18:00:00', 1, NULL, 1),
(4, 'Thomas', NULL, 'Daane', 'trbl.daane@student.avans.nl', 'P@ssw0rd@2022!', '2022-03-26 18:00:00', 1, NULL, 1),
(5, 'Sanel', 'van den', 'Bogert', 'avd.bogert@student.avans.nl', 'P@ssw0rd@2022!', '2022-03-26 18:00:00', 1, NULL, 1),
(6, 'Lysette', NULL, 'Schippers', 'l.schippers@student.avans.nl', 'P@ssw0rd@2022!', '2022-03-26 18:00:00', 1, NULL, 1);

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
(6, 5, 5);

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
  `Status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orderheaders`
--

INSERT INTO `orderheaders` (`HeaderID`, `Order_By`, `Total_Price`, `Deliver_Adres`, `Deliver_Zipcode`, `Deliver_City`, `Creation_Date`, `Finished_Date`, `Status`) VALUES
(1, 1, '349.95', 'Midscheeps 65', '8899 BT', 'Vlieland', '2022-03-26 18:00:37', NULL, 'In behandeling'),
(2, 3, '69.99', 'Blauwe Pan 56-A', '1317 AP', 'Almere', '2022-03-26 18:00:37', '2022-03-26 19:00:37', 'Geleverd');

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
(4, 2, 4, 1, '69.99');

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
(5, 5, '2022-03-26 18:00:31', 3, NULL, NULL, 15, NULL);

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
  `Created_By` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ProductID`, `Name`, `Description`, `Stock`, `Price`, `Creation_Date`, `Created_By`) VALUES
(1, '60\'s Package', 'Jaren 60 thema met 10 headsets en 1 zender', 12, '64.99', '2022-03-26 18:00:24', 1),
(2, '70\'s Package', 'Jaren 70 thema met 10 headsets en 1 zender', 15, '64.99', '2022-03-26 18:00:24', 1),
(3, '80\'s Package', 'Jaren 80 thema met 10 headsets en 1 zender', 6, '69.99', '2022-03-26 18:00:24', 1),
(4, '90\'s Package', 'Jaren 90 thema met 10 headsets en 1 zender', 18, '69.99', '2022-03-26 18:00:24', 1),
(5, '00\'s Package', 'Jaren 00 thema met 10 headsets en 1 zender', 3, '74.99', '2022-03-26 18:00:24', 1);

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
(5, 'Administratie', 'Toegang tot medewerkersportaal (lees rechten)', '2022-03-26 18:00:11', 1);

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
(5, 'Marike', NULL, 'Vlieland', 'MarikeVlieland@jourrapide.com', '06-48991805', 'ciez8egeiLa', 'Jacobshoeve-Erf', 153, NULL, '3931 RZ', 'Woudenberg', '2022-03-26 18:00:05');

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

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `revenuepermonth`  AS SELECT year(`orderheaders`.`Finished_Date`) AS `Year`, concat(month(`orderheaders`.`Finished_Date`),' ',monthname(`orderheaders`.`Finished_Date`)) AS `Month`, sum(`orderheaders`.`Total_Price`) AS `Total` FROM `orderheaders` WHERE `orderheaders`.`Status` = 'Geleverd' GROUP BY concat(month(`orderheaders`.`Finished_Date`),' ',monthname(`orderheaders`.`Finished_Date`)), year(`orderheaders`.`Finished_Date`) ORDER BY year(`orderheaders`.`Finished_Date`) ASC, concat(month(`orderheaders`.`Finished_Date`),' ',monthname(`orderheaders`.`Finished_Date`)) ASC  ;

-- --------------------------------------------------------

--
-- Structure for view `top10productsamount`
--
DROP TABLE IF EXISTS `top10productsamount`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `top10productsamount`  AS SELECT `prd`.`Name` AS `ProductName`, `prd`.`Description` AS `ProductDescription`, sum(`ol`.`Amount`) AS `TotalAmountSold` FROM (`orderlines` `ol` left join `products` `prd` on(`ol`.`ProductID` = `prd`.`ProductID`)) GROUP BY `ol`.`ProductID` ORDER BY sum(`ol`.`Amount`) DESC LIMIT 0, 1010  ;

-- --------------------------------------------------------

--
-- Structure for view `top10productsprice`
--
DROP TABLE IF EXISTS `top10productsprice`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `top10productsprice`  AS SELECT `prd`.`Name` AS `ProductName`, `prd`.`Description` AS `ProductDescription`, sum(`ol`.`Line_Price`) AS `TotalPriceSold` FROM (`orderlines` `ol` left join `products` `prd` on(`ol`.`ProductID` = `prd`.`ProductID`)) GROUP BY `ol`.`ProductID` ORDER BY sum(`ol`.`Line_Price`) DESC LIMIT 0, 1010  ;

--
-- Indexes for dumped tables
--

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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ProductID`),
  ADD KEY `Created_By` (`Created_By`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`RoleID`),
  ADD KEY `Created_By` (`Created_By`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `EmployeeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `employees-roles`
--
ALTER TABLE `employees-roles`
  MODIFY `TableID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orderheaders`
--
ALTER TABLE `orderheaders`
  MODIFY `HeaderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orderlines`
--
ALTER TABLE `orderlines`
  MODIFY `LineID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `productlogs`
--
ALTER TABLE `productlogs`
  MODIFY `LogID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `ProductID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `RoleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `EmpCreated_By` FOREIGN KEY (`Created_By`) REFERENCES `employees` (`EmployeeID`) ON DELETE SET NULL;

--
-- Constraints for table `employees-roles`
--
ALTER TABLE `employees-roles`
  ADD CONSTRAINT `employees-roles_ibfk_1` FOREIGN KEY (`EmployeeID`) REFERENCES `employees` (`EmployeeID`) ON DELETE CASCADE,
  ADD CONSTRAINT `employees-roles_ibfk_2` FOREIGN KEY (`RoleID`) REFERENCES `roles` (`RoleID`) ON DELETE CASCADE;

--
-- Constraints for table `orderheaders`
--
ALTER TABLE `orderheaders`
  ADD CONSTRAINT `orderheaders_ibfk_1` FOREIGN KEY (`Order_By`) REFERENCES `users` (`UserID`) ON DELETE SET NULL;

--
-- Constraints for table `orderlines`
--
ALTER TABLE `orderlines`
  ADD CONSTRAINT `orderlines_ibfk_1` FOREIGN KEY (`HeaderID`) REFERENCES `orderheaders` (`HeaderID`) ON DELETE CASCADE,
  ADD CONSTRAINT `orderlines_ibfk_2` FOREIGN KEY (`ProductID`) REFERENCES `products` (`ProductID`) ON DELETE SET NULL;

--
-- Constraints for table `productlogs`
--
ALTER TABLE `productlogs`
  ADD CONSTRAINT `productlogs_ibfk_1` FOREIGN KEY (`ProductID`) REFERENCES `products` (`ProductID`) ON DELETE CASCADE,
  ADD CONSTRAINT `productlogs_ibfk_2` FOREIGN KEY (`Modified_By`) REFERENCES `employees` (`EmployeeID`) ON DELETE SET NULL;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`Created_By`) REFERENCES `employees` (`EmployeeID`) ON DELETE SET NULL;

--
-- Constraints for table `roles`
--
ALTER TABLE `roles`
  ADD CONSTRAINT `roles_ibfk_1` FOREIGN KEY (`Created_By`) REFERENCES `employees` (`EmployeeID`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
