-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2019 at 11:22 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lib_mgmt_sys`
--

-- --------------------------------------------------------

--
-- Table structure for table `biology`
--

CREATE TABLE `biology` (
  `bio_id` int(10) NOT NULL,
  `bookname` varchar(100) NOT NULL,
  `authorname` varchar(100) NOT NULL,
  `totalbooks` int(10) NOT NULL,
  `availablebook` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `booklist`
--

CREATE TABLE `booklist` (
  `S No.` int(10) NOT NULL,
  `book_id` varchar(10) NOT NULL,
  `bookname` varchar(100) NOT NULL,
  `authorname` varchar(100) NOT NULL,
  `category` varchar(50) NOT NULL,
  `totalbooks` int(10) NOT NULL,
  `availablebooks` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `chemistry`
--

CREATE TABLE `chemistry` (
  `chem_id` int(10) NOT NULL,
  `bookname` varchar(100) NOT NULL,
  `authorname` varchar(100) NOT NULL,
  `totalbooks` int(10) NOT NULL,
  `availablebook` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `forgotpassword`
--

CREATE TABLE `forgotpassword` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `resetkey` char(32) NOT NULL,
  `time` int(10) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `maths`
--

CREATE TABLE `maths` (
  `maths_id` int(10) NOT NULL,
  `bookname` varchar(100) NOT NULL,
  `authorname` varchar(100) NOT NULL,
  `totalbooks` int(10) NOT NULL,
  `availablebook` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `novel`
--

CREATE TABLE `novel` (
  `novel_id` int(10) NOT NULL,
  `bookname` varchar(100) NOT NULL,
  `authorname` varchar(100) NOT NULL,
  `totalbooks` int(10) NOT NULL,
  `availablebook` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `physics`
--

CREATE TABLE `physics` (
  `phy_id` int(10) NOT NULL,
  `bookname` varchar(100) NOT NULL,
  `authorname` varchar(100) NOT NULL,
  `totalbooks` int(10) NOT NULL,
  `availablebook` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `record`
--

CREATE TABLE `record` (
  `record_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `book_id` varchar(10) NOT NULL,
  `bookname` varchar(100) NOT NULL,
  `authorname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rememberme`
--

CREATE TABLE `rememberme` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `authentificator1` char(20) NOT NULL,
  `f2authentificator2` char(64) NOT NULL,
  `expires` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `username`, `password`) VALUES
(1, 'Libranian', '123456789As');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(10) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(64) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `dob` varchar(15) NOT NULL,
  `gender` char(10) NOT NULL,
  `activation` char(32) NOT NULL,
  `activation2` char(32) NOT NULL,
  `profile_pic` varchar(500) NOT NULL,
  `issued_book` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `mobile`, `dob`, `gender`, `activation`, `activation2`, `profile_pic`, `issued_book`) VALUES
(0, 'Libranian', 'gupta.saurabh178@gmail.com', 'df5077245999891c805df5a6d71e78dd21c3f9a40dd0f5748c5af3f03c163871', '8808522712', '05/04/2019', 'Male', 'af5a547e5b78560e507cbd7ce91b3af0', '', '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `biology`
--
ALTER TABLE `biology`
  ADD PRIMARY KEY (`bio_id`);

--
-- Indexes for table `booklist`
--
ALTER TABLE `booklist`
  ADD PRIMARY KEY (`S No.`);

--
-- Indexes for table `chemistry`
--
ALTER TABLE `chemistry`
  ADD PRIMARY KEY (`chem_id`);

--
-- Indexes for table `forgotpassword`
--
ALTER TABLE `forgotpassword`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `maths`
--
ALTER TABLE `maths`
  ADD PRIMARY KEY (`maths_id`);

--
-- Indexes for table `novel`
--
ALTER TABLE `novel`
  ADD PRIMARY KEY (`novel_id`);

--
-- Indexes for table `physics`
--
ALTER TABLE `physics`
  ADD PRIMARY KEY (`phy_id`);

--
-- Indexes for table `record`
--
ALTER TABLE `record`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `rememberme`
--
ALTER TABLE `rememberme`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `biology`
--
ALTER TABLE `biology`
  MODIFY `bio_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `booklist`
--
ALTER TABLE `booklist`
  MODIFY `S No.` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chemistry`
--
ALTER TABLE `chemistry`
  MODIFY `chem_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `forgotpassword`
--
ALTER TABLE `forgotpassword`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `maths`
--
ALTER TABLE `maths`
  MODIFY `maths_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `novel`
--
ALTER TABLE `novel`
  MODIFY `novel_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `physics`
--
ALTER TABLE `physics`
  MODIFY `phy_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `record`
--
ALTER TABLE `record`
  MODIFY `record_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rememberme`
--
ALTER TABLE `rememberme`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
