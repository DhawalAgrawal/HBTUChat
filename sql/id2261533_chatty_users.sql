-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 22, 2018 at 09:25 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id2261533_chatty_users`
--

-- --------------------------------------------------------

--
-- Table structure for table `friendreqs`
--

CREATE TABLE `friendreqs` (
  `id` int(11) NOT NULL,
  `req_from` int(255) NOT NULL,
  `req_to` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `friendreqs`
--

INSERT INTO `friendreqs` (`id`, `req_from`, `req_to`) VALUES
(2, 2, 1),
(3, 11, 1),
(4, 1, 2),
(5, 16, 1),
(6, 17, 1),
(7, 19, 2),
(8, 1, 17);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `date_added` date NOT NULL,
  `added_by` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `user_posted_to` varchar(225) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `body`, `date_added`, `added_by`, `user_posted_to`) VALUES
(12, 'Hello this is anurag and this is my first post on CollegePark.\n', '2017-08-11', '1', 'ALL'),
(13, 'Hello , This is Alok and this is my first post on CollegePark!', '2017-08-11', '11', 'ALL'),
(14, 'Hi this is Aditi and this is my first post on CollegePark.', '2017-08-13', '2', 'ALL'),
(18, 'Wohooo! Account settings are now working fine!\n#collegepark #hbtusocial', '2017-08-14', '1', 'ALL'),
(19, 'Hello, everyone.. :)', '2017-08-19', '16', 'ALL'),
(21, 'Hello guysssss\n:D', '2017-08-23', '17', 'ALL'),
(22, 'Hello world!', '2018-04-03', '1', 'ALL');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `id` int(11) NOT NULL,
  `firstname` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `srno` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `year` int(2) NOT NULL,
  `password` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `verify` int(1) NOT NULL DEFAULT '0',
  `vcode` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `branch` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `fromcity` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Update city',
  `rstatus` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Update status',
  `cnum` bigint(11) NOT NULL,
  `srsd` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Update child',
  `srfm` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Update parent',
  `bio` text COLLATE utf8_unicode_ci NOT NULL,
  `friendarray` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `firstname`, `lastname`, `email`, `srno`, `year`, `password`, `verify`, `vcode`, `branch`, `fromcity`, `rstatus`, `cnum`, `srsd`, `srfm`, `bio`, `friendarray`) VALUES
(1, 'Anurag', 'Singh', 'anuragz.v1@gmail.com', '228/16', 2, '7e573aedbe6d321228de54fcacee7ebd', 1, '', 'I.T', 'MEERUT', 'Committed', 8800299509, 'Update child', 'KUNAL GUPTA', '#LeadGuitarist #Programmer #WeirdlyIntelligent #Harcourtian #YOLO #Craaaaazy #Lifeisawesome <3', ''),
(2, 'Aditi', 'Kumari', 'aditi.singh1698@gmail.com', '286/16', 2, '9743774ca266a912ab2103e553042855', 1, '', 'MECHANICAL', 'Noida', 'Commited', 9650998465, 'Update child', 'Abhishek Bose', 'Hey! This is aditi from mechanical!', ''),
(11, 'Alok', 'singh', 'badmash.boy7@gmail.com', '', 4, 'ded0901ae2e482ac1c94a504f6e7f92d', 1, 'e4a86b0d7bf4c46d7d550a92b0b2fcae', '', 'Update city', 'Update status', 0, 'Update child', 'Update parent', '', ''),
(12, 'Unique', 'Singh', 'alokz.v2@gmail.com', 'nulllaa', 1, 'a722c63db8ec8625af6cf71cb8c2d939', 0, '6fb52e71b837628ac16539c1ff911667', '', 'Update city', 'Update status', 0, 'Update child', 'Update parent', '', ''),
(13, 'Aditi', 'Kumari', 'aditik1606@gmail.com', '286/16', 2, 'a722c63db8ec8625af6cf71cb8c2d939', 1, '0fe473396242072e84af286632d3f0ff', 'MECHANICAL', 'Update city', 'Update status', 0, 'Update child', 'Update parent', '', ''),
(14, 'Rajpriya', 'Rajan', 'rajpriyarajan@gmail.com', '233/15', 3, 'a722c63db8ec8625af6cf71cb8c2d939', 1, '8710ef761bbb29a6f9d12e4ef8e4379c', '', 'Update city', 'Update status', 0, 'Update child', 'Update parent', '', ''),
(16, 'Karan', 'Khati', 'karansinghkhati.ksk@gmail.com', '227/16', 2, 'd42eb33194943abfda2baac96ba03c2f', 1, '03cf87174debaccd689c90c34577b82f', '', 'Update city', 'Update status', 0, 'Update child', 'Update parent', '', ''),
(17, 'VINEET', 'AGRAWAL', 'vineet30222@gmail.com', '105/16', 2, '822a905dc2071c457c26c8ecd769d96d', 1, '3e60e09c222f206c725385f53d7e567c', 'CSE', 'Mathura', 'Single', 9628858808, 'Update child', 'Update parent', '', ''),
(19, 'Anurag', 'Singh', 'any.natureboy@gmail.com', '228/16', 2, 'fb11f9516b0a031de6f3302bb346912d', 1, '82ba9d6eee3f026be339bb287651c3d8', '', 'Update city', 'Update status', 0, 'Update child', 'Update parent', '', ''),
(20, 'test', 'user', 'kali.hack.machine@gmail.com', '228/16', 1, 'e10adc3949ba59abbe56e057f20f883e', 1, '780965ae22ea6aee11935f3fb73da841', '', 'Update city', 'Update status', 0, 'Update child', 'Update parent', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `friendreqs`
--
ALTER TABLE `friendreqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `friendreqs`
--
ALTER TABLE `friendreqs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
