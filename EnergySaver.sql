-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Dec 04, 2023 at 06:34 PM
-- Server version: 5.7.39
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `EnergySaver`
--

-- --------------------------------------------------------

--
-- Table structure for table `Comments`
--

CREATE TABLE `Comments` (
  `comment_id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `comment_text` text,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Comments`
--

INSERT INTO `Comments` (`comment_id`, `customer_id`, `comment_text`, `date_added`) VALUES
(1, 2, 'hi', '2023-12-03 04:52:59'),
(2, 2, 'hello', '2023-12-03 05:13:41'),
(3, 2, 'hi', '2023-12-04 03:38:04'),
(4, 2, 'test', '2023-12-04 03:40:06'),
(5, 2, 'hello', '2023-12-04 06:52:10'),
(6, 2, 'hello', '2023-12-04 06:57:07'),
(7, 2, 'hi\r\n', '2023-12-04 06:57:19'),
(8, 2, 'hi', '2023-12-04 06:59:24'),
(9, 2, 'shania', '2023-12-04 06:59:30'),
(10, 2, 'hi there', '2023-12-04 07:51:04');

-- --------------------------------------------------------

--
-- Table structure for table `Customers`
--

CREATE TABLE `Customers` (
  `customer_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Customers`
--

INSERT INTO `Customers` (`customer_id`, `username`, `password`) VALUES
(1, 'test', '$2y$10$MJ.z2H6x6DtsPU9aX9LrF.lqPsoGXaBaUcEy5UvInnIl25aHsyzx.'),
(2, 'test1', '$2y$10$Akt0BfON4EnSrrv4ggviwemYmMd4pDX4TUVAZsL5Kk.QHeqlZMyNW'),
(3, 'shania', '$2y$10$WBpBIY0vL0vXXCHLMqO18uQPdbyxh6yU3Uhf8CLcQ0.jQl/.foINS');

-- --------------------------------------------------------

--
-- Table structure for table `energy_types`
--

CREATE TABLE `energy_types` (
  `energy_id` int(11) NOT NULL,
  `energy_name` varchar(50) NOT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `energy_types`
--

INSERT INTO `energy_types` (`energy_id`, `energy_name`, `description`) VALUES
(1, 'Solar', 'Solar energy is derived from the sun.\r\n\r\nSolar Energy:Tapping the Power of the Sun\r\n\r\nThe concept of solar energy revolves around one of the most inexhaustible resources available to us—the sun. Solar panels, comprised of photovoltaic cells, capture sunlight and convert it into usable electricity. This conversion occurs through the photovoltaic effect, where sunlight knocks electrons loose from atoms, generating a flow of electricity.'),
(2, 'Wind', 'Wind energy is generated using wind turbines.\r\n\r\nWind Energy: Riding the Winds of Change\r\n\r\nWind energy, another key player in the renewable energy landscape, taps into the kinetic energy of the wind to generate electricity. Wind turbines, often seen towering majestically across landscapes or offshore, capture the power of the wind and convert it into electrical energy through the rotation of turbine blades connected to a generator.'),
(3, 'Hydroelectric', 'Hydroelectric energy is generated from flowing water.\r\n\r\nHydroelectric Energy: Flowing towards Sustainability\r\n\r\nHydroelectric power harnesses the energy present in flowing water to generate electricity. Dams or water channels direct the force of flowing water to turn turbines, which in turn spin generators to produce electrical power. This method is widely used across rivers, utilizing the natural flow and elevation changes to generate clean and renewable energy.');

-- --------------------------------------------------------

--
-- Table structure for table `SavedCalculations`
--

CREATE TABLE `SavedCalculations` (
  `calculation_id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `calculation_data` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `SavedCalculations`
--

INSERT INTO `SavedCalculations` (`calculation_id`, `customer_id`, `calculation_data`) VALUES
(1, 2, '600'),
(2, 2, '1960');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Comments`
--
ALTER TABLE `Comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `Customers`
--
ALTER TABLE `Customers`
  ADD PRIMARY KEY (`customer_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `energy_types`
--
ALTER TABLE `energy_types`
  ADD PRIMARY KEY (`energy_id`);

--
-- Indexes for table `SavedCalculations`
--
ALTER TABLE `SavedCalculations`
  ADD PRIMARY KEY (`calculation_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Comments`
--
ALTER TABLE `Comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `Customers`
--
ALTER TABLE `Customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `energy_types`
--
ALTER TABLE `energy_types`
  MODIFY `energy_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `SavedCalculations`
--
ALTER TABLE `SavedCalculations`
  MODIFY `calculation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Comments`
--
ALTER TABLE `Comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `Customers` (`customer_id`);

--
-- Constraints for table `SavedCalculations`
--
ALTER TABLE `SavedCalculations`
  ADD CONSTRAINT `savedcalculations_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `Customers` (`customer_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
