-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2015 at 10:08 PM
-- Server version: 5.6.26
-- PHP Version: 5.5.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `datadriven`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `fname` text,
  `lname` text,
  `email` varchar(100) DEFAULT NULL,
  `address` text,
  `crimes` text,
  `password` varchar(100) DEFAULT NULL,
  `dob` varchar(10) DEFAULT NULL,
  `picture` text,
  `rank` text
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `fname`, `lname`, `email`, `address`, `crimes`, `password`, `dob`, `picture`, `rank`) VALUES
(1, 'Bappy', 'Rayhan', 'bappyrayhan@gmail.com', 'Dhaka, Bangladesh', 'Smaglings, Money lendering', '123456', '06/23/2015', '1447100142.jpg', 'user'),
(2, 'Ripon ', 'Mia', 'Ripon@gmail.com', 'Mymensingh, Dhaka, Bangladesh.', 'Marder, Rape, All', '123456', '1993-12-30', '789456123.jpg', 'admin'),
(3, 'Rajesh', 'Ghosh', 'rajesh@coderstrust.com', 'Dhaka, Bangladesh', 'Good Man, Not criminal, Will review my works', '123456', '03/16/2015', '1447100331.jpg', 'admin'),
(4, 'Mozammel', 'Haque', 'mzmlhaque61@gmail.com', 'Mymensingh, Dhaka, Bangladesh.', 'I am not a criminal, I am developer.', '12345', '08-12-1993', '123456.jpg', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
