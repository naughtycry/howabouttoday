-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2015 at 03:08 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `wat`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
`postID` int(11) NOT NULL,
  `postTitle` varchar(50) DEFAULT NULL,
  `postContent` text,
  `postEmotionLevel` int(11) DEFAULT NULL,
  `userID` int(11) NOT NULL,
  `postCreatedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `shortdescription`
--

CREATE TABLE IF NOT EXISTS `shortdescriptions` (
`shortDescriptionID` int(11) NOT NULL,
  `shortDescriptionTitle` varchar(50) NOT NULL,
  `shortDescriptionContent` varchar(300) NOT NULL,
  `userID` int(11) NOT NULL,
  `shortDescriptionCreatedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`userID` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `userFullname` varchar(45) DEFAULT NULL,
  `password` varchar(20) NOT NULL,
  `userGender` varchar(5) DEFAULT NULL,
  `userBirthday` date DEFAULT NULL,
  `userCreatedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `username`, `userFullname`, `password`, `userGender`, `userBirthday`, `userCreatedDate`) VALUES
(3, 'dungnh_57', 'Whiskey', 'hanoi1', 'male', '1994-03-29', '2015-03-02 00:45:19'),
(5, 'whiskey', 'Johny Walker', 'hanoi1', 'male', '1994-03-29', '2015-03-02 01:16:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
 ADD PRIMARY KEY (`postID`), ADD KEY `userID` (`userID`);

--
-- Indexes for table `shortdescription`
--
ALTER TABLE `shortdescription`
 ADD PRIMARY KEY (`shortDescriptionID`), ADD KEY `userID` (`userID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
MODIFY `postID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `shortdescription`
--
ALTER TABLE `shortdescription`
MODIFY `shortDescriptionID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`);

--
-- Constraints for table `shortdescription`
--
ALTER TABLE `shortdescription`
ADD CONSTRAINT `shortdescription_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
