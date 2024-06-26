-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2024 at 05:46 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `getservicesonline`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `OrderID` int(11) NOT NULL,
  `UserID` int(11) DEFAULT NULL,
  `ServiceID` int(11) DEFAULT NULL,
  `OrderDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `Status` varchar(50) DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`OrderID`, `UserID`, `ServiceID`, `OrderDate`, `Status`) VALUES
(1, 1, 1, '2024-06-25 15:45:03', 'Completed'),
(2, 1, 3, '2024-06-25 15:45:03', 'Completed'),
(3, 2, 2, '2024-06-25 15:45:03', 'Completed'),
(4, 2, 5, '2024-06-25 15:45:03', 'Completed'),
(5, 3, 1, '2024-06-26 12:23:17', 'Completed'),
(6, 6, 1, '2024-06-26 12:24:49', 'Completed'),
(11, 6, 6, '2024-06-26 14:05:05', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `ServiceID` int(11) NOT NULL,
  `ServiceName` varchar(255) NOT NULL,
  `Description` text DEFAULT NULL,
  `ImagePath` varchar(255) DEFAULT NULL,
  `Price` decimal(10,2) NOT NULL,
  `CreatedAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`ServiceID`, `ServiceName`, `Description`, `ImagePath`, `Price`, `CreatedAt`) VALUES
(1, 'Home Tutor', 'Home Tutors provide personalized educational assistance to students in their homes. They tailor lessons to individual learning needs, helping with homework, exam preparation, and subject-specific tutoring to enhance academic performance.', 'tutor.png', 50.00, '2024-06-25 15:45:03'),
(2, 'Electrician', 'Electricians specialize in the installation, maintenance, and repair of electrical systems. They handle wiring, circuit breakers, lighting fixtures, and electrical panels to ensure safe and reliable electricity in homes and commercial properties.', 'electrician.png', 70.00, '2024-06-25 15:45:03'),
(3, 'Plumber', 'Plumbers provide essential services for installing, repairing, and maintaining water systems in homes and businesses. They address issues with pipes, drains, faucets, and toilets, ensuring efficient and leak-free plumbing.\r\n', 'plumber.png', 60.00, '2024-06-25 15:45:03'),
(4, 'House Cleaning', 'House Cleaners offer comprehensive cleaning services for residential spaces. They perform tasks such as dusting, vacuuming, mopping, and sanitizing kitchens and bathrooms, helping to maintain a clean and healthy living environment.', 'housecleaner.png', 40.00, '2024-06-25 15:45:03'),
(5, 'AC Repair', 'AC Repairers focus on the maintenance and repair of air conditioning systems. They diagnose issues, replace parts, and ensure that HVAC systems operate efficiently, providing comfortable indoor temperatures.', 'acrepair.png', 80.00, '2024-06-25 15:45:03'),
(6, 'Chef', 'Chefs deliver culinary services either as personal chefs or caterers. They plan menus, prepare meals, and often provide meal prep services, offering delicious and customized dishes to meet dietary preferences and occasions.', 'chef.png', 100.00, '2024-06-25 15:45:03'),
(7, 'Security', 'Security Services offer protection and safety for properties and individuals. They provide trained security personnel, surveillance systems, and risk assessments to prevent unauthorized access and ensure the safety of clients and their assets.', 'security.png', 90.00, '2024-06-25 15:45:03'),
(15, 'Driver', 'Driving services encompass a range of professional transportation solutions tailored for both individuals and businesses. They include chauffeur services offering luxury and executive transport with skilled drivers, ride-sharing services providing convenient app-based on-demand rides, and traditional taxi services ensuring reliable metered transportation within cities. Additionally, these services extend to delivery solutions for transporting goods and packages efficiently. Specialty transport options cater to specific needs such as airport transfers, medical transport, school transport, and services designed for the elderly or disabled, prioritizing safety, reliability, and customer satisfaction in every journey.', 'driver.png', 30.00, '2024-06-26 08:41:19');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int(11) NOT NULL,
  `FullName` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `PhoneNumber` varchar(20) DEFAULT NULL,
  `Address` text DEFAULT NULL,
  `CreatedAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `IsAdmin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `FullName`, `Email`, `Password`, `PhoneNumber`, `Address`, `CreatedAt`, `IsAdmin`) VALUES
(1, 'John Doe', 'john@example.com', 'hashedpassword1', '123-456-7890', '123 Elm Street', '2024-06-25 15:45:03', 0),
(2, 'Jane Smith', 'jane@example.com', 'hashedpassword2', '987-654-3210', '456 Oak Avenue', '2024-06-25 15:45:03', 0),
(3, 'Oahed Noor Forhad', 'oahednoorforhad@gmail.com', 'oahed2233', '01635183088', 'Hillview, Chattogram', '2024-06-26 09:08:05', 1),
(4, 'New User', 'new@gmail.com', '$2y$10$aNHSgAxkdRYEkIFRZ8qcK.b4wdyoNoSuaDvKe7R6VdT6ZRLBG/XT6', '21313124', 'new address', '2024-06-26 11:39:16', 0),
(5, 'New User', 'new2@gmail.com', 'pass', '12312451251', 'new 2 address', '2024-06-26 11:56:02', 0),
(6, 'Rumi', 'Rumibegum@gmail.com', 'rumi', '010000000', 'Rongipara', '2024-06-26 12:14:25', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`OrderID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `ServiceID` (`ServiceID`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`ServiceID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `OrderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `ServiceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`ServiceID`) REFERENCES `services` (`ServiceID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
