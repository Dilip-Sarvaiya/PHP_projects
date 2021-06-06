-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Mar 18, 2020 at 03:41 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clubuvdb2`
--

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` bigint(20) NOT NULL,
  `sequence` int(11) NOT NULL,
  `image` text NOT NULL,
  `timestemp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` bigint(20) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `birthday` date NOT NULL,
  `gender` varchar(10) NOT NULL DEFAULT '0',
  `passno` varchar(10) NOT NULL DEFAULT '0',
  `registerby` varchar(15) NOT NULL DEFAULT 'regular',
  `status` varchar(1) NOT NULL,
  `photo` text NOT NULL,
  `timestemp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` bigint(20) NOT NULL,
  `priority` bigint(20) NOT NULL,
  `message` text NOT NULL,
  `date` date NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `timestemp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `priority`, `message`, `date`, `status`, `timestemp`) VALUES
(36, 1, 'Two days to go Navratri... Come on Kheliya get ready to play Dandiy with CLUB UV', '2016-09-29', 1, '2018-07-13 04:47:27'),
(40, 2, 'Wish you Happy Navratri in Advance...', '2016-09-30', 1, '2017-10-16 06:56:49'),
(41, 3, 'Importance of 1st Nortu : The first form of Goddess Durga is called Shailputri . She is considered the daughter of the Himalayas. She is a form of Shakti, the consort of Lord Shiva. ', '2016-10-01', 1, '2018-07-13 04:47:31'),
(42, 4, 'Importance of 2nd Nortu : The second form of Goddess Durga is known as \'Brahmacharini\'. Her name is derivative of the word \'Brahma\', which means \'Tapa\' or penace. She is also a form of Uma or Parvati, a form of Mata Shakti.', '2016-10-02', 0, '2017-09-03 18:34:37'),
(43, 5, 'Importance of 3rd Nortu : On the third day the goddess is worshipped as Chandraghanta. She is the symbolic representation of beauty and bravery.', '2016-10-03', 0, '2017-09-03 18:34:48'),
(44, 7, 'Importance of 4th Nortu : Kushmanda, is the form of the goddess which is worshipped on the fourth day. It is believed that Kushmanda is the creator of the entire Universe and she has created the entire Universe by her laugh.', '2016-10-04', 0, '2017-09-03 18:34:57'),
(45, 9, 'Importance Of 5th Nortu : On the fifth day, the form of Goddess is called Skand Mata. She is actually called so because she is here represented as the mother of Skanda, the chief warrior of the Gods army.', '2016-10-05', 0, '2017-09-03 18:35:11'),
(46, 11, 'Importance of 6th Nortu: On the sixth day, the goddess is worshipped as Katyayani. Seated on her vehicle lion, Katyayani has three eyes and four hands.', '2016-10-06', 0, '2017-09-03 18:36:09'),
(47, 14, 'Importance of 7th Nortu: On the seventh day, the Goddess is worshipped as \'Kalratri\'. As the name suggests, Kalrati is as black as a dark night. She has four hands, she is meant to make the devotees fearless.', '2016-10-07', 0, '2017-09-03 18:35:40'),
(48, 20, 'Importance of 8th Nortu: On the eight day, the Mata Rani is worshipped as \'Maha Gauri\'. She is considered to extremely beautiful, white like snow and accessorized with white colored ornaments. She represents calmness and exhibits wisdom.', '2016-10-08', 0, '2017-09-03 18:36:07'),
(49, 30, 'Importance of 9th Nortu: On the ninth day, Durga is worshipped as Siddhidatri. It is believed she consists of all the eight siddhis. She lives on lotus and is worshipped by all the Rishis-Munis, Siddhas, Sadhakas and Yogis.', '2016-10-09', 0, '2017-09-03 18:35:36'),
(50, 4, 'Congratulation to Winner of the 1st day. For more detail check winner and Gallery menu.', '2016-10-02', 0, '2017-09-03 18:34:42'),
(51, 6, 'Due to rain today Navratri is cancelled. Ground is not playable... Club UV', '2016-10-03', 0, '2017-09-03 18:34:53'),
(52, 8, 'Due to rain today Navratri is cancelled. Ground is not playable... Club UV', '2016-10-04', 0, '2017-09-03 18:35:05'),
(53, 10, 'After 2 days break..Come on Kheliya..Tide your lace...Now the time arrives to enjoy navratri again with lots of fun...Let\'s meet at Club UV Ground... A haloooooooo...', '2016-10-05', 0, '2017-09-03 18:35:19'),
(54, 11, 'Congratulation to all winners... Gallery is updated with your photos...Download and share with your friends...', '2016-10-06', 0, '2017-09-03 18:35:46'),
(55, 12, 'Ha Kheliya Ha...Now wineers can download their photos from gallery of updated version of club UV Application...so waiting for what...update app and take benefits of new feature...\r\n', '2016-10-07', 0, '2017-09-03 18:35:44'),
(56, 13, 'Congratulation to all winners... Gallery is updated with your photos...Download and share with your friends...', '2016-10-07', 0, '2017-09-03 18:35:42'),
(57, 21, 'Congratulation to Winner. Find your pics from gallery For more detail check winner and Gallery menu.', '2016-10-08', 0, '2017-09-03 18:35:39'),
(62, 33, 'Welcome to Club UV navratri Mahotsav 2017', '2017-09-20', 0, '2017-09-30 07:46:32'),
(58, 31, 'You are most welcome to Maha Aarti organized by Club UV', '2016-10-09', 0, '2017-09-03 18:35:34'),
(59, 32, 'Golden chance to win : 3 best selfie and 3 best comments will get prise. Hurry up... upload  your selfie with comments to www.clubuv.in ', '2016-10-10', 0, '2017-09-27 08:59:15');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` bigint(20) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `note` varchar(255) NOT NULL,
  `timestemp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `note`, `timestemp`) VALUES
(1, 'admin@gmail.com', '123456', 'Admin', '2020-03-03 03:21:11');

-- --------------------------------------------------------

--
-- Table structure for table `vote`
--

CREATE TABLE `vote` (
  `id` bigint(20) NOT NULL,
  `voter` varchar(10) NOT NULL,
  `passno` varchar(10) NOT NULL,
  `rank` tinyint(4) NOT NULL,
  `category` varchar(1) NOT NULL,
  `timestemp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `winners`
--

CREATE TABLE `winners` (
  `id` bigint(20) NOT NULL,
  `category` int(11) NOT NULL,
  `rank` int(11) NOT NULL,
  `winnername` varchar(255) NOT NULL,
  `passno` varchar(20) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `timestemp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `winners`
--

INSERT INTO `winners` (`id`, `category`, `rank`, `winnername`, `passno`, `date`, `status`, `timestemp`) VALUES
(5, 150, 152, 'fdf', '', '0000-00-00', 0, '2020-03-17 07:32:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vote`
--
ALTER TABLE `vote`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `winners`
--
ALTER TABLE `winners`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vote`
--
ALTER TABLE `vote`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `winners`
--
ALTER TABLE `winners`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
