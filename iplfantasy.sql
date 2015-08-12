-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 02, 2015 at 03:36 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `iplfantasy`
--

-- --------------------------------------------------------

--
-- Table structure for table `player`
--

CREATE TABLE IF NOT EXISTS `player` (
`p_id` int(11) NOT NULL,
  `p_name` varchar(30) NOT NULL,
  `p_price` int(11) NOT NULL,
  `p_role` varchar(30) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `player`
--

INSERT INTO `player` (`p_id`, `p_name`, `p_price`, `p_role`) VALUES
(1, 'Virat Kohli', 15, 'batsman'),
(2, 'Ajinkya Rahane', 10, 'batsman'),
(3, 'Rohit Sharma', 10, 'batsman'),
(4, 'Shikhar Dhavan', 7, 'batsman'),
(5, 'Suresh Raina', 8, 'batsman'),
(6, 'M S Dhoni', 12, 'wicketkeeper'),
(7, 'Mike Hussey', 9, 'batsman'),
(8, 'Steve Smith', 30, 'batsman'),
(9, 'Ravindra Jadeja', 10, 'bowler'),
(10, 'David Warner', 10, 'batsman'),
(11, 'Bhuvi', 9, 'bowler'),
(12, 'Shane Watson', 11, 'allrounder'),
(13, 'M Shami', 8, 'bowler'),
(14, 'Varun Aron', 5, 'bowler'),
(15, 'Akshar Patel', 28, 'allrounder'),
(16, 'Ashwin', 29, 'allrounder'),
(17, 'V Sehwag', 8, 'batsman'),
(18, 'Yuvraj Singh', 12, 'allrounder'),
(19, 'Kieron Pollard', 11, 'allrounder'),
(20, 'Shane Warne', 11, 'bowler'),
(21, 'AB Devilliers', 10, 'wicketkeeper'),
(22, 'Ishant Shama', 7, 'bowler'),
(23, 'Haddin', 8, 'wicketkeeper');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE IF NOT EXISTS `team` (
`t_id` int(11) NOT NULL,
  `t_name` varchar(30) NOT NULL,
  `t_composition` varchar(30) NOT NULL,
  `t_moneyspent` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `p_id1` int(11) NOT NULL,
  `p_id2` int(11) NOT NULL,
  `p_id3` int(11) NOT NULL,
  `p_id4` int(11) NOT NULL,
  `p_id5` int(11) NOT NULL,
  `p_id6` int(11) NOT NULL,
  `p_id7` int(11) NOT NULL,
  `p_id8` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`t_id`, `t_name`, `t_composition`, `t_moneyspent`, `u_id`, `p_id1`, `p_id2`, `p_id3`, `p_id4`, `p_id5`, `p_id6`, `p_id7`, `p_id8`) VALUES
(2, 'Nandish', '0', 85, 1, 1, 2, 3, 6, 9, 11, 12, 15);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`u_id` int(11) NOT NULL,
  `u_name` varchar(30) NOT NULL,
  `u_pass` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`u_id`, `u_name`, `u_pass`) VALUES
(1, 'nandish', 'nandish'),
(2, 'dream', 'dream');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `player`
--
ALTER TABLE `player`
 ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
 ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `player`
--
ALTER TABLE `player`
MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
