-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2022 at 10:27 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `joke_service`
--

-- --------------------------------------------------------

--
-- Table structure for table `joke`
--

CREATE TABLE `joke` (
  `Id` int(11) NOT NULL,
  `Content` text NOT NULL,
  `Like` int(11) NOT NULL,
  `Dislike` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `joke`
--

INSERT INTO `joke` (`Id`, `Content`, `Like`, `Dislike`) VALUES
(1, 'A child asked his father, \"How were people born?\" So his father said, \"Adam and Eve made babies, then their babies became adults and made babies, and so on.\"\n\nThe child then went to his mother, asked her the same question and she told him, \"We were monkeys then we evolved to become like we are now.\"\n\nThe child ran back to his father and said, \"You lied to me!\" His father replied, \"No, your mom was talking about her side of the family.\"', 0, 0),
(2, 'Teacher: \"Kids,what does the chicken give you?\" Student: \"Meat!\" Teacher: \"Very good! Now what does the pig give you?\" Student: \"Bacon!\" Teacher: \"Great! And what does the fat cow give you?\" Student: \"Homework!\"', 0, 0),
(3, 'The teacher asked Jimmy, \"Why is your cat at school today Jimmy?\" Jimmy replied crying, \"Because I heard my daddy tell my mommy, \'I am going to eat that pussy once Jimmy leaves for school today!\'\"', 0, 0),
(4, 'A housewife, an accountant and a lawyer were asked \"How much is 2+2?\" The housewife replies: \"Four!\". The accountant says: \"I think it\'s either 3 or 4. Let me run those figures through my spreadsheet one more time.\" The lawyer pulls the drapes, dims the lights and asks in a hushed voice, \"How much do you want it to be?\"', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `joke`
--
ALTER TABLE `joke`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `joke`
--
ALTER TABLE `joke`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
