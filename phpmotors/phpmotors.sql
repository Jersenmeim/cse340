-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2021 at 08:03 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpmotors`
--

-- --------------------------------------------------------

--
-- Table structure for table `carclassification`
--

CREATE TABLE `carclassification` (
  `classificationId` int(11) NOT NULL,
  `classificationName` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `carclassification`
--

INSERT INTO `carclassification` (`classificationId`, `classificationName`) VALUES
(1, 'SUV'),
(2, 'Classic'),
(3, 'Sports'),
(4, 'Trucks'),
(5, 'Used');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `clientId` int(10) UNSIGNED NOT NULL,
  `clientFirstname` varchar(15) NOT NULL,
  `clientLastname` varchar(25) NOT NULL,
  `clientEmail` varchar(40) NOT NULL,
  `clientPassword` varchar(255) NOT NULL,
  `clientLevel` enum('1','2','3') NOT NULL DEFAULT '1',
  `comment` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`clientId`, `clientFirstname`, `clientLastname`, `clientEmail`, `clientPassword`, `clientLevel`, `comment`) VALUES
(1, 'Admin', 'admin', 'admin@cse340.net', '$2y$10$W9z1OJ/.Qltz3B9e1WcENOmGH6phRQxh1D.tXuxeAJuUfeF5pREPW', '3', NULL),
(2, 'Jersen', 'Meim', 'meimfamily@gmail.com', '$2y$10$0gRxy51x7j8mN79cshhbsOW.8e4zIlF4AOlUe6wFUsqvnQgUq6FV6', '1', NULL),
(3, 'Steven', 'Meim', 'meimjersen@gmail.com', '$2y$10$g2tSUDHpt2NOlP1IHq/yHOWi6Ej8TMTfBvL93vPoP7WcCuLYQB04e', '1', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `imgId` int(10) UNSIGNED NOT NULL,
  `invId` int(10) UNSIGNED NOT NULL,
  `imgName` varchar(100) CHARACTER SET latin1 NOT NULL,
  `imgPath` varchar(150) CHARACTER SET latin1 NOT NULL,
  `imgDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `imgPrimary` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`imgId`, `invId`, `imgName`, `imgPath`, `imgDate`, `imgPrimary`) VALUES
(63, 3, 'adventador.jpg', '/cse340/phpmotors/images/vehicles/adventador.jpg', '2021-03-17 12:24:12', 1),
(64, 3, 'adventador-tn.jpg', '/cse340/phpmotors/images/vehicles/adventador-tn.jpg', '2021-03-17 12:24:12', 1),
(65, 4, 'monster-truck.jpg', '/cse340/phpmotors/images/vehicles/monster-truck.jpg', '2021-03-17 12:24:27', 1),
(66, 4, 'monster-truck-tn.jpg', '/cse340/phpmotors/images/vehicles/monster-truck-tn.jpg', '2021-03-17 12:24:27', 1),
(67, 5, 'mechanic.jpg', '/cse340/phpmotors/images/vehicles/mechanic.jpg', '2021-03-17 12:24:44', 1),
(68, 5, 'mechanic-tn.jpg', '/cse340/phpmotors/images/vehicles/mechanic-tn.jpg', '2021-03-17 12:24:44', 1),
(69, 6, 'batmobile.jpg', '/cse340/phpmotors/images/vehicles/batmobile.jpg', '2021-03-17 12:24:56', 1),
(70, 6, 'batmobile-tn.jpg', '/cse340/phpmotors/images/vehicles/batmobile-tn.jpg', '2021-03-17 12:24:56', 1),
(71, 7, 'mystery-van.jpg', '/cse340/phpmotors/images/vehicles/mystery-van.jpg', '2021-03-17 12:25:10', 1),
(72, 7, 'mystery-van-tn.jpg', '/cse340/phpmotors/images/vehicles/mystery-van-tn.jpg', '2021-03-17 12:25:10', 1),
(73, 8, 'fire-truck.jpg', '/cse340/phpmotors/images/vehicles/fire-truck.jpg', '2021-03-17 12:25:36', 1),
(74, 8, 'fire-truck-tn.jpg', '/cse340/phpmotors/images/vehicles/fire-truck-tn.jpg', '2021-03-17 12:25:36', 1),
(75, 9, 'crown-vic.jpg', '/cse340/phpmotors/images/vehicles/crown-vic.jpg', '2021-03-17 12:25:53', 1),
(76, 9, 'crown-vic-tn.jpg', '/cse340/phpmotors/images/vehicles/crown-vic-tn.jpg', '2021-03-17 12:25:53', 1),
(77, 10, 'camaro.jpg', '/cse340/phpmotors/images/vehicles/camaro.jpg', '2021-03-17 12:26:02', 1),
(78, 10, 'camaro-tn.jpg', '/cse340/phpmotors/images/vehicles/camaro-tn.jpg', '2021-03-17 12:26:02', 1),
(79, 11, 'escalade.jpg', '/cse340/phpmotors/images/vehicles/escalade.jpg', '2021-03-17 12:26:15', 1),
(80, 11, 'escalade-tn.jpg', '/cse340/phpmotors/images/vehicles/escalade-tn.jpg', '2021-03-17 12:26:15', 1),
(81, 12, 'hummer.jpg', '/cse340/phpmotors/images/vehicles/hummer.jpg', '2021-03-17 12:26:27', 1),
(82, 12, 'hummer-tn.jpg', '/cse340/phpmotors/images/vehicles/hummer-tn.jpg', '2021-03-17 12:26:27', 1),
(83, 13, 'aerocar.jpg', '/cse340/phpmotors/images/vehicles/aerocar.jpg', '2021-03-17 12:26:38', 1),
(84, 13, 'aerocar-tn.jpg', '/cse340/phpmotors/images/vehicles/aerocar-tn.jpg', '2021-03-17 12:26:38', 1),
(85, 14, 'fbi.jpg', '/cse340/phpmotors/images/vehicles/fbi.jpg', '2021-03-17 12:26:56', 1),
(86, 14, 'fbi-tn.jpg', '/cse340/phpmotors/images/vehicles/fbi-tn.jpg', '2021-03-17 12:26:56', 1),
(91, 17, 'delorean.jpg', '/cse340/phpmotors/images/vehicles/delorean.jpg', '2021-03-17 12:59:21', 1),
(92, 17, 'delorean-tn.jpg', '/cse340/phpmotors/images/vehicles/delorean-tn.jpg', '2021-03-17 12:59:21', 1),
(95, 13, 'aerocar2.jpg', '/cse340/phpmotors/images/vehicles/aerocar2.jpg', '2021-03-17 13:02:51', 0),
(96, 13, 'aerocar2-tn.jpg', '/cse340/phpmotors/images/vehicles/aerocar2-tn.jpg', '2021-03-17 13:02:51', 0),
(99, 3, 'aventador-coupe-facebook-og.jpg', '/cse340/phpmotors/images/vehicles/aventador-coupe-facebook-og.jpg', '2021-03-17 13:04:51', 0),
(100, 3, 'aventador-coupe-facebook-og-tn.jpg', '/cse340/phpmotors/images/vehicles/aventador-coupe-facebook-og-tn.jpg', '2021-03-17 13:04:51', 0),
(101, 1, 'jeep-wrangler.jpg', '/cse340/phpmotors/images/vehicles/jeep-wrangler.jpg', '2021-03-17 13:24:11', 1),
(102, 1, 'jeep-wrangler-tn.jpg', '/cse340/phpmotors/images/vehicles/jeep-wrangler-tn.jpg', '2021-03-17 13:24:11', 1),
(109, 15, 'no-image.png', '/cse340/phpmotors/images/vehicles/no-image.png', '2021-03-18 11:08:03', 1),
(110, 15, 'no-image-tn.png', '/cse340/phpmotors/images/vehicles/no-image-tn.png', '2021-03-18 11:08:03', 1),
(129, 2, 'Ford-Model.jpg', '/cse340/phpmotors/images/vehicles/Ford-Model.jpg', '2021-03-25 05:56:30', 1),
(130, 2, 'Ford-Model-tn.jpg', '/cse340/phpmotors/images/vehicles/Ford-Model-tn.jpg', '2021-03-25 05:56:30', 1);

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `invId` int(10) UNSIGNED NOT NULL,
  `invMake` varchar(30) NOT NULL,
  `invModel` varchar(30) NOT NULL,
  `invDescription` text DEFAULT NULL,
  `invImage` varchar(100) NOT NULL,
  `invThumbnail` varchar(100) NOT NULL,
  `invPrice` decimal(10,2) NOT NULL,
  `invStock` smallint(6) NOT NULL,
  `invColor` varchar(20) NOT NULL,
  `classificationId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`invId`, `invMake`, `invModel`, `invDescription`, `invImage`, `invThumbnail`, `invPrice`, `invStock`, `invColor`, `classificationId`) VALUES
(1, 'Jeep ', 'Wrangler', 'The Jeep Wrangler is small and compact with enough power to get you where you want to go. Its great for everyday driving as well as offroading weather that be on the the rocks or in the mud!', '/cse340/phpmotors/images/vehicles/jeep-wrangler.jpg', '/cse340/phpmotors/images/vehicles/jeep-wrangler-tn.jpg', '28045.00', 4, 'Orange', 1),
(2, 'Ford', 'Model T', 'The Ford Model T can be a bit tricky to drive. It was the first car to be put into production. You can get it in any color you want as long as it&#39;s black.', '/cse340/phpmotors/images/vehicles/ford-modelt.jpg', '/cse340/phpmotors/images/vehicles/ford-modelt-tn.jpg', '30000.00', 2, 'Black', 2),
(3, 'Lamborghini', 'Adventador', 'This V-12 engine packs a punch in this sporty car. Make sure you wear your seatbelt and obey all traffic laws. ', '/cse340/phpmotors/images/vehicles/adventador.jpg', '/cse340/phpmotors/images/vehicles/adventador-tn.jpg', '417650.00', 1, 'Blue', 3),
(4, 'Monster', 'Truck', 'Most trucks are for working, this one is for fun. this beast comes with 60in tires giving you tracktions needed to jump and roll in the mud.', '/cse340/phpmotors/images/vehicles/monster-truck.jpg', '/cse340/phpmotors/images/vehicles/monster-truck-tn.jpg', '150000.00', 3, 'purple', 4),
(5, 'Mechanic', 'Special', 'Not sure where this car came from. however with a little tlc it will run as good a new.', '/cse340/phpmotors/images/vehicles/mechanic.jpg', '/cse340/phpmotors/images/vehicles/mechanic-tn.jpg', '100.00', 200, 'Rust', 5),
(6, 'Batmobile', 'Custom', 'Ever want to be a super hero? now you can with the batmobile. This car allows you to switch to bike mode allowing you to easily maneuver through trafic during rush hour.', '/cse340/phpmotors/images/vehicles/batmobile.jpg', '/cse340/phpmotors/images/vehicles/batmobile.jpg', '65000.00', 2, 'Black', 3),
(7, 'Mystery', 'Machine', 'Scooby and the gang always found luck in solving their mysteries because of there 4 wheel drive Mystery Machine. This Van will help you do whatever job you are required to with a success rate of 100%.', '/cse340/phpmotors/images/vehicles/mystery-van.jpg', '/cse340/phpmotors/images/vehicles/mystery-van-tn.jpg', '10000.00', 13, 'Green', 1),
(8, 'Spartan', 'Fire Truck', 'Emergencies happen often. Be prepared with this Spartan fire truck. Comes complete with 1000 ft. of hose and a 1000 gallon tank.', '/cse340/phpmotors/images/vehicles/fire-truck.jpg', '/cse340/phpmotors/images/vehicles/fire-truck-tn.jpg', '50000.00', 2, 'Red', 4),
(9, 'Ford', 'Crown Victoria', 'After the police force updated their fleet these cars are now available to the public! These cars come equiped with the siren which is convenient for college students running late to class.', '/cse340/phpmotors/images/vehicles/crown-vic.jpg', '/cse340/phpmotors/images/vehicles/crown-vic-tn.jpg', '10000.00', 5, 'White', 5),
(10, 'Chevy', 'Camaro', 'If you want to look cool this is the ar you need! This car has great performance at an affordable price. Own it today!', '/cse340/phpmotors/images/vehicles/camaro.jpg', '/cse340/phpmotors/images/vehicles/camaro-tn.jpg', '25000.00', 10, 'Silver', 3),
(11, 'Cadilac', 'Escalade', 'This stylin car is great for any occasion from going to the beach to meeting the president. The luxurious inside makes this car a home away from home.', '/cse340/phpmotors/images/vehicles/escalade.jpg', '/cse340/phpmotors/images/vehicles/escalade-tn.jpg', '75195.00', 4, 'Black', 1),
(12, 'GM', 'Hummer', 'Do you have 6 kids and like to go offroading? The Hummer gives you the small interiors with an engine to get you out of any muddy or rocky situation.', '/cse340/phpmotors/images/vehicles/hummer.jpg', '/cse340/phpmotors/images/vehicles/hummer-tn.jpg', '58800.00', 5, 'Yellow', 5),
(13, 'International', 'Aerocar', 'Are you sick of rushhour trafic? This car converts into an airplane to get you where you are going fast. Only 6 of these were made, get them while they last!', '/cse340/phpmotors/images/vehicles/aerocar.jpg', '/cse340/phpmotors/images/vehicles/aerocar-tn.jpg', '1000000.00', 6, 'Red', 2),
(14, 'FBI', 'Survalence Van', 'do you like police shows? You&#39;ll feel right at home driving this van, come complete with survalence equipments for and extra fee of $2,000 a month. ', '/cse340/phpmotors/images/vehicles/fbi.jpg', '/cse340/phpmotors/images/vehicles/fbi-tn.jpg', '20000.00', 1, 'Green', 1),
(15, 'Dog ', 'Car', 'Do you like dogs? Well this car is for you straight from the 90s from Aspen, Colorado we have the orginal Dog Car complete with fluffy ears.  ', '/cse340/phpmotors/images/vehicles/dog.jpg', '/cse340/phpmotors/images/vehicles/dog-tn.jpg', '35000.00', 1, 'Brown', 2),
(17, 'DMC', 'DeLorean', 'So fast its almost like travelling in time.', '/cse340/phpmotors/images/vehicles/no-image.png', '/cse340/phpmotors/images/vehicles/no-image.png', '10000.00', 2, 'White', 2);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `reviewId` int(10) UNSIGNED NOT NULL,
  `reviewText` text CHARACTER SET latin1 NOT NULL,
  `reviewDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `invId` int(10) UNSIGNED NOT NULL,
  `clientId` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`reviewId`, `reviewText`, `reviewDate`, `invId`, `clientId`) VALUES
(72, 'Test 5', '2021-03-27 06:45:49', 2, 1),
(73, 'Test 6', '2021-03-27 06:48:52', 2, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carclassification`
--
ALTER TABLE `carclassification`
  ADD PRIMARY KEY (`classificationId`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`clientId`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`imgId`),
  ADD KEY `FK_inv_images` (`invId`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`invId`),
  ADD KEY `classificationId` (`classificationId`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`reviewId`),
  ADD KEY `FK_reviews_clients` (`clientId`),
  ADD KEY `FK_reviews_inventory` (`invId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carclassification`
--
ALTER TABLE `carclassification`
  MODIFY `classificationId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `clientId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `imgId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `invId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `reviewId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `FK_inv_images` FOREIGN KEY (`invId`) REFERENCES `inventory` (`invId`);

--
-- Constraints for table `inventory`
--
ALTER TABLE `inventory`
  ADD CONSTRAINT `inventory_ibfk_1` FOREIGN KEY (`classificationId`) REFERENCES `carclassification` (`classificationId`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `FK_reviews_clients` FOREIGN KEY (`clientId`) REFERENCES `clients` (`clientId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_reviews_inventory` FOREIGN KEY (`invId`) REFERENCES `inventory` (`invId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
