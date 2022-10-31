-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 15, 2022 at 05:52 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bootstrap_car`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `aid` int(11) NOT NULL,
  `explanation` mediumtext NOT NULL,
  `aimage` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`aid`, `explanation`, `aimage`) VALUES
(1, 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nulla, quasi. Excepturi doloremque saepe voluptate eos dolores, maxime delectus debitis culpa ipsum modi, animi veniam, maiores dolor. Cupiditate enim, corrupti blanditiis aliquid vero maxime. Quasi saepe, tempore molestias ad consectetur voluptatum.', 'about.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'bikram', '1234'),
(2, 'sir', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `bid` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `detail` varchar(10000) NOT NULL,
  `bimage` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`bid`, `title`, `detail`, `bimage`) VALUES
(1, 'First slide label', 'Some representative placeholder content for the first slide.', 'banner1.jpg'),
(2, 'Second slide label', 'Some representative placeholder content for the second slide.', 'banner2.jpg'),
(3, 'Third slide label', 'Some representative placeholder content for the third slide.', 'banner3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `fid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`fid`, `name`, `phone`, `email`, `message`) VALUES
(1, 'Bikram Dey', '8777745732', 'bikramdey458@gmail.com', 'I am Bikram'),
(2, 'Babu Dey', '9432135820', 'babudey670@gmail.com', 'I am Babu');

-- --------------------------------------------------------

--
-- Table structure for table `rent_car`
--

CREATE TABLE `rent_car` (
  `cid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `capacity` int(11) NOT NULL,
  `mileage` int(11) NOT NULL,
  `features` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `cimage` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rent_car`
--

INSERT INTO `rent_car` (`cid`, `name`, `capacity`, `mileage`, `features`, `category`, `cimage`) VALUES
(1, 'LINCOLN TOWN R2', 4, 125872, 'Tinted Window', 'Sport Car', 'rent-1.jpg'),
(2, 'LAMBORGINI VW6', 4, 656778, 'Comfy Leather Seat ', 'Sport Car', 'rent-2.jpg'),
(3, 'PORSCHE CHYLEN', 2, 454910, 'Tinted Window', 'Sport Car', 'rent-3.jpg'),
(4, 'Bentley Flying Spur', 4, 321784, 'Comfy Leather Seat', 'SUV', 'rent-4.jpg'),
(5, 'Lexus CT', 4, 980560, 'Tinted Window', 'SUV', 'rent-5.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `rid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `job` varchar(255) NOT NULL,
  `comment` mediumtext NOT NULL,
  `rimage` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`rid`, `name`, `job`, `comment`, `rimage`) VALUES
(1, 'Rahul Sharma', 'Software Engineer at Flipkart', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Repellendus maxime sunt ipsam velit veniam expedita sit amet quidem odit.', 'team-1.jpg'),
(2, 'Sanjana Ray', 'Software Engineer at Amazon', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Repellendus maxime sunt ipsam velit veniam expedita sit amet quidem odit.', 'team-3.jpg'),
(3, 'Abhijit Kumar', 'Software Engineer at Walmart', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Repellendus maxime sunt ipsam velit veniam expedita sit amet quidem odit.', 'team-2.jpg'),
(4, 'Priyanka Dey', 'Software Engineer at Google', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Repellendus maxime sunt ipsam velit veniam expedita sit amet quidem odit.', 'team-4.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`bid`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`fid`);

--
-- Indexes for table `rent_car`
--
ALTER TABLE `rent_car`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`rid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `bid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `fid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `rent_car`
--
ALTER TABLE `rent_car`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
