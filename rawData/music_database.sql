-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2022 at 07:22 PM
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
-- Database: `music_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `albumartists`
--

CREATE TABLE `albumartists` (
  `id` int(11) NOT NULL,
  `artistID` int(11) NOT NULL,
  `albumID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `albumartists`
--

INSERT INTO `albumartists` (`id`, `artistID`, `albumID`) VALUES
(1, 1, 9),
(2, 2, 4),
(3, 2, 11),
(4, 3, 6),
(5, 3, 10),
(6, 4, 7),
(7, 5, 8),
(8, 6, 5),
(9, 7, 2),
(10, 8, 1),
(11, 8, 3),
(12, 8, 12);

-- --------------------------------------------------------

--
-- Table structure for table `albums`
--

CREATE TABLE `albums` (
  `albumID` int(11) NOT NULL,
  `albumTitle` varchar(255) NOT NULL,
  `recordLabel` varchar(255) NOT NULL,
  `genre` varchar(255) NOT NULL,
  `releaseDate` date NOT NULL,
  `albumFunFact` varchar(2000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `albums`
--

INSERT INTO `albums` (`albumID`, `albumTitle`, `recordLabel`, `genre`, `releaseDate`, `albumFunFact`) VALUES
(1, 'iTunes Session', 'Lights Music Inc.', 'Pop Rock', '2014-02-28', ''),
(2, '7 EP', 'Columbia Records', 'Pop Rap', '2019-06-21', ''),
(3, 'Skin&Earth Acoustic', 'Elektra Records', 'Pop Rock', '2019-07-12', ''),
(4, 'Z', 'Top Dawg Entertainment', 'R&B Soul', '2014-04-08', ''),
(5, 'how I\'m feeling now', 'An Asylum Records', 'Pop', '2020-05-15', ''),
(6, 'thank u, next', 'Republic Records', 'Dance Pop', '2019-02-08', ''),
(7, 'Pink Friday', 'Cash Money Records', 'Hip-Hop Rap', '2010-11-22', ''),
(8, 'ARTPOP', 'Interscope Records', 'Electronic Dance', '2013-11-06', ''),
(9, 'Planet Her', 'Kemosabe Records', 'Pop Rap', '2021-06-25', ''),
(10, 'Positions', 'Republic Records', 'Dance Pop', '2020-10-30', ''),
(11, 'Ctrl', 'Top Dawg Entertainment', 'R&B Soul', '2017-06-09', ''),
(12, 'PEP', 'Fueled By Ramen', 'Pop rock', '2022-04-01', '');

-- --------------------------------------------------------

--
-- Table structure for table `artists`
--

CREATE TABLE `artists` (
  `artistID` int(11) NOT NULL,
  `stageName` varchar(255) NOT NULL,
  `birthName` varchar(255) NOT NULL,
  `homeTown` varchar(255) NOT NULL,
  `birthDate` date NOT NULL,
  `deathDate` date DEFAULT NULL,
  `funFact` varchar(2000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `artists`
--

INSERT INTO `artists` (`artistID`, `stageName`, `birthName`, `homeTown`, `birthDate`, `deathDate`, `funFact`) VALUES
(1, 'Doja Cat', 'Amala Ratna Zandile Dlamini', 'Los Angeles, California', '1995-10-25', '0000-00-00', 'Doja Cat, along with Nicki Minaj, were the first female rap duo to reach number 1 on the US singles chart with their song Say So.'),
(2, 'SZA', 'Solana Imani Rowe', 'St. Louis, Missouri', '1989-11-08', '0000-00-00', 'SZA and Doja Cat received a Grammy award for Best Pop Duo Performance in 2022.'),
(3, 'Ariana Grande', 'Ariana Grande-Butera', 'Boca Raton, Florida', '1993-06-26', '0000-00-00', 'Ariana Grande became the most followed woman on instagram in 2019 and has 300 million followers as of 2022.'),
(4, 'Nicki Minaj', 'Onika Tanya Maraj-Petty', 'Saint James District, Trinidad and Tobago', '1982-12-08', '0000-00-00', 'As a child, Minaj and her older brother, Jelani, grew up with her grandmother in a household with 11 cousins.'),
(5, 'Lady Gaga', 'Stefani Joanne Angelina Germanotta', 'New York City, New York', '1986-03-28', '0000-00-00', 'Lady Gaga is the only female artist to achieve four singles that sold at least 10 million copies globally.'),
(6, 'Charli XCX', 'Charlotte Emma Aitchison', 'Cambridge, England', '1992-08-02', '0000-00-00', 'Charli XCX recorded her first album in 2008 at the young age of 14, and posted songs from the album on her official Myspace page.'),
(7, 'Lil Nas X', 'Montero Lamar Hill', 'Lithia Springs, Georgia', '1999-04-09', '0000-00-00', 'Lil Nas X\'s song, Old Town Road, became billboards longest-running number-one song since the chart debuted in 1958 after spending 19 weeks in position number 1.'),
(8, 'Lights', 'Valerie Anne Poxleitner', 'Timmins, Ontario, Canada', '1987-04-11', '0000-00-00', 'In high school, Lights played the guitar and sang in the metal band Shovel Face.');

-- --------------------------------------------------------

--
-- Table structure for table `artistsongs`
--

CREATE TABLE `artistsongs` (
  `id` int(11) NOT NULL,
  `artistID` int(11) NOT NULL,
  `songID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `artistsongs`
--

INSERT INTO `artistsongs` (`id`, `artistID`, `songID`) VALUES
(1, 8, 1),
(2, 8, 2),
(3, 8, 3),
(4, 8, 4),
(5, 8, 5),
(6, 8, 6),
(7, 8, 7),
(8, 7, 8),
(9, 7, 9),
(10, 7, 10),
(11, 7, 11),
(12, 7, 12),
(13, 7, 13),
(14, 7, 14),
(15, 7, 15),
(16, 8, 16),
(17, 8, 17),
(18, 8, 18),
(19, 8, 19),
(20, 8, 20),
(21, 8, 21),
(22, 8, 22),
(23, 8, 23),
(24, 8, 24),
(25, 2, 25),
(26, 2, 26),
(27, 2, 27),
(28, 2, 28),
(29, 2, 29),
(30, 2, 30),
(31, 2, 31),
(32, 2, 32),
(33, 2, 33),
(34, 2, 34),
(35, 6, 35),
(36, 6, 36),
(37, 6, 37),
(38, 6, 38),
(39, 6, 39),
(40, 6, 40),
(41, 6, 41),
(42, 6, 42),
(43, 6, 43),
(44, 6, 44),
(45, 6, 45),
(46, 3, 46),
(47, 3, 47),
(48, 3, 48),
(49, 3, 49),
(50, 3, 50),
(51, 3, 51),
(52, 3, 52),
(53, 3, 53),
(54, 3, 54),
(55, 3, 55),
(56, 3, 56),
(57, 3, 57),
(58, 4, 58),
(59, 4, 59),
(60, 4, 60),
(61, 4, 61),
(62, 4, 62),
(63, 4, 63),
(64, 4, 64),
(65, 4, 65),
(66, 4, 66),
(67, 5, 67),
(68, 5, 68),
(69, 5, 69),
(70, 5, 70),
(71, 5, 71),
(72, 5, 72),
(73, 5, 73),
(74, 5, 74),
(75, 5, 75),
(76, 5, 76),
(77, 5, 77),
(78, 1, 78),
(79, 1, 79),
(80, 1, 80),
(81, 1, 81),
(82, 1, 82),
(83, 1, 83),
(84, 1, 84),
(85, 1, 85),
(86, 1, 86),
(87, 1, 87),
(88, 1, 88),
(89, 1, 89),
(90, 3, 90),
(91, 3, 91),
(92, 3, 92),
(93, 3, 93),
(94, 3, 94),
(95, 3, 95),
(96, 3, 96),
(97, 3, 97),
(98, 3, 98),
(99, 3, 99),
(100, 3, 100),
(101, 3, 101),
(102, 2, 102),
(103, 2, 103),
(104, 2, 104),
(105, 2, 105),
(106, 2, 106),
(107, 2, 107),
(108, 2, 108),
(109, 2, 109),
(110, 2, 110),
(111, 2, 111),
(112, 8, 112),
(113, 8, 113),
(114, 8, 114),
(115, 8, 115),
(116, 8, 116),
(117, 8, 117),
(118, 8, 118),
(119, 8, 119),
(120, 8, 120),
(121, 8, 121),
(122, 3, 82),
(123, 2, 89),
(124, 1, 92);

-- --------------------------------------------------------

--
-- Table structure for table `songs`
--

CREATE TABLE `songs` (
  `songID` int(11) NOT NULL,
  `songTitle` varchar(255) NOT NULL,
  `albumID` int(11) NOT NULL,
  `songLength` int(11) NOT NULL,
  `songWriter` varchar(255) NOT NULL,
  `topRank` int(11) DEFAULT NULL,
  `rankDate` date DEFAULT NULL,
  `userComment` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `songs`
--

INSERT INTO `songs` (`songID`, `songTitle`, `albumID`, `songLength`, `songWriter`, `topRank`, `rankDate`, `userComment`) VALUES
(1, 'Where The Fence Is Low', 1, 244, 'Lights Poxleitner', 0, '0000-00-00', ''),
(2, 'Banner', 1, 220, 'Lights Poxleitner', 0, '0000-00-00', ''),
(3, 'Siberia', 1, 261, 'Lights Poxleitner', 0, '0000-00-00', ''),
(4, 'Toes', 1, 211, 'Lights Poxleitner', 49, '2012-08-18', ''),
(5, 'Face Up', 1, 220, 'Lights Poxleitner', 0, '0000-00-00', ''),
(6, 'Cactus In The Valley', 1, 206, 'Lights Poxleitner', 0, '0000-00-00', ''),
(7, 'In The Dark I See', 1, 194, 'Lights Poxleitner', 0, '0000-00-00', ''),
(8, 'Old Town Road - Remix', 2, 157, 'Montero Lamar Hill & Billy Ray Cyrus', 1, '2019-04-13', ''),
(9, 'Panini', 2, 114, 'Montero Lamar Hill', 5, '2019-09-28', ''),
(10, 'F9mily (You & Me)', 2, 162, 'Montero Lamar Hill & Travis Barker', 6, '2019-07-06', ''),
(11, 'Kick It', 2, 141, 'Montero Lamar Hill', 0, '0000-00-00', ''),
(12, 'Rodeo', 2, 158, 'Montero Lamar Hill & Belcalis Almanzar', 22, '2019-07-06', ''),
(13, 'Bring U Down', 2, 131, 'Montero Lamar Hill', 0, '0000-00-00', ''),
(14, 'C7osure (You Like)', 2, 148, 'Montero Lamar Hill', 14, '2019-07-13', ''),
(15, 'Old Town Road', 2, 113, 'Montero Lamar Hill', 1, '2019-04-13', ''),
(16, 'Skydiving (Cliff Recording)', 3, 237, 'Lights Poxleitner', 0, '0000-00-00', ''),
(17, 'Until the Light (Truck Cab Recording)', 3, 214, 'Lights Poxleitner', 0, '0000-00-00', ''),
(18, 'Savage (Rain Recording)', 3, 244, 'Lights Poxleitner', 0, '0000-00-00', ''),
(19, 'New Fears (Bedroom Recording)', 3, 274, 'Lights Poxleitner', 0, '0000-00-00', ''),
(20, 'We Were Here (Tunnel Recording)', 3, 255, 'Lights Poxleitner', 21, '2018-04-28', ''),
(21, 'Kicks (River Recording) ', 3, 256, 'Lights Poxleitner', 0, '0000-00-00', ''),
(22, 'Almost Had Me (Desert Recording)', 3, 280, 'Lights Poxleitner', 0, '0000-00-00', ''),
(23, 'Tabs', 3, 220, 'Lights Poxleitner', 0, '0000-00-00', ''),
(24, 'Lost Girls', 3, 211, 'Lights Poxleitner', 0, '0000-00-00', ''),
(25, 'Ur', 4, 235, 'Solana Rowe', 0, '0000-00-00', ''),
(26, 'Childs Play', 4, 216, 'Solana Rowe & Chancelor Bennett', 0, '0000-00-00', ''),
(27, 'Julia', 4, 219, 'Solana Rowe', 0, '0000-00-00', ''),
(28, 'Warm Winds', 4, 350, 'Solana Rowe & Isaiah McClain', 0, '0000-00-00', ''),
(29, 'HiiiJack', 4, 222, 'Solana Rowe', 0, '0000-00-00', ''),
(30, 'Green Mile', 4, 214, 'Solana Rowe', 0, '0000-00-00', ''),
(31, 'Babylon', 4, 234, 'Solana Rowe & Kendrick Lamar', 0, '0000-00-00', ''),
(32, 'Sweet November', 4, 243, 'Solana Rowe', 0, '0000-00-00', ''),
(33, 'Shattered Ring', 4, 245, 'Solana Rowe', 0, '0000-00-00', ''),
(34, 'Omega', 4, 263, 'Solana Rowe', 0, '0000-00-00', ''),
(35, 'pink diamond', 5, 124, 'Charlotte Aitchison', 0, '0000-00-00', ''),
(36, 'forever', 5, 243, 'Charlotte Aitchison', 0, '0000-00-00', ''),
(37, 'claws', 5, 149, 'Charlotte Aitchison', 0, '0000-00-00', ''),
(38, '7 years', 5, 195, 'Charlotte Aitchison', 0, '0000-00-00', ''),
(39, 'detonate', 5, 219, 'Charlotte Aitchison', 0, '0000-00-00', ''),
(40, 'enemy', 5, 222, 'Charlotte Aitchison', 0, '0000-00-00', ''),
(41, 'I finally understand', 5, 151, 'Charlotte Aitchison', 0, '0000-00-00', ''),
(42, 'c2.0', 5, 220, 'Charlotte Aitchison', 0, '0000-00-00', ''),
(43, 'party 4 u', 5, 296, 'Charlotte Aitchison', 0, '0000-00-00', ''),
(44, 'anthems', 5, 171, 'Charlotte Aitchison', 0, '0000-00-00', ''),
(45, 'visions', 5, 229, 'Charlotte Aitchison', 0, '0000-00-00', ''),
(46, 'imagine', 6, 221, 'Ariana Grande', 21, '2019-02-23', ''),
(47, 'needy', 6, 171, 'Ariana Grande', 14, '2019-02-23', ''),
(48, 'NASA', 6, 182, 'Ariana Grande', 17, '2019-02-23', ''),
(49, 'bloodline', 6, 216, 'Ariana Grande', 22, '2019-02-23', ''),
(50, 'fake smile', 6, 208, 'Ariana Grande', 26, '2019-02-23', ''),
(51, 'bad idea', 6, 267, 'Ariana Grande', 27, '2019-02-23', ''),
(52, 'make up', 6, 140, 'Ariana Grande', 48, '2019-02-23', ''),
(53, 'ghostin', 6, 271, 'Ariana Grande', 25, '2019-02-23', ''),
(54, 'in my head', 6, 222, 'Ariana Grande', 38, '2019-02-23', ''),
(55, '7 rings', 6, 178, 'Ariana Grande', 1, '2019-02-02', ''),
(56, 'thank u, next', 6, 207, 'Ariana Grande', 1, '2018-11-17', ''),
(57, 'break up with your girlfriend, I\'m bored', 6, 190, 'Ariana Grande', 1, '2019-02-23', ''),
(58, 'I\'m the Best', 7, 216, 'Onika Maraj', 0, '0000-00-00', ''),
(59, 'Roman\'s Revenge', 7, 276, 'Onika Maraj & Marshall Mathers', 56, '2010-11-20', ''),
(60, 'Did It On\'em', 7, 212, 'Onika Maraj', 49, '2011-04-30', ''),
(61, 'Right Thru Me', 7, 235, 'Onika Maraj', 26, '2010-12-25', ''),
(62, 'Save Me', 7, 185, 'Onika Maraj', 0, '0000-00-00', ''),
(63, 'Here I Am', 7, 175, 'Onika Maraj', 0, '0000-00-00', ''),
(64, 'Dear Old Nicki', 7, 233, 'Onika Maraj', 0, '0000-00-00', ''),
(65, 'Your Love', 7, 245, 'Onika Maraj', 14, '2010-08-07', ''),
(66, 'Last Chance', 7, 231, 'Onika Maraj', 0, '0000-00-00', ''),
(67, 'Aura', 8, 235, 'Stefani Germanotta', 0, '0000-00-00', ''),
(68, 'Venus', 8, 233, 'Stefani Germanotta', 32, '2013-11-16', ''),
(69, 'G.U.Y.', 8, 232, 'Stefani Germanotta', 76, '2014-04-12', ''),
(70, 'Sexxx Dreams', 8, 214, 'Stefani Germanotta', 0, '0000-00-00', ''),
(71, 'MANiCURE', 8, 199, 'Stefani Germanotta', 0, '0000-00-00', ''),
(72, 'ARTPOP', 8, 247, 'Stefani Germanotta', 0, '0000-00-00', ''),
(73, 'Swine', 8, 268, 'Stefani Germanotta', 0, '0000-00-00', ''),
(74, 'Donatella', 8, 264, 'Stefani Germanotta', 0, '0000-00-00', ''),
(75, 'Fashion!', 8, 239, 'Stefani Germanotta', 0, '0000-00-00', ''),
(76, 'Dope', 8, 221, 'Stefani Germanotta', 8, '2013-11-23', ''),
(77, 'Applause', 8, 212, 'Stefani Germanotta', 4, '2013-09-07', ''),
(78, 'Woman', 9, 172, 'Amala Dlamini', 9, '2022-04-02', ''),
(79, 'Naked', 9, 223, 'Amala Dlamini', 0, '0000-00-00', ''),
(80, 'Get Into It (Yuh)', 9, 138, 'Amala Dlamini', 68, '2021-09-04', ''),
(81, 'Need to know', 9, 210, 'Amala Dlamini', 8, '2021-11-13', ''),
(82, 'I Don\'t Do Drugs', 9, 188, 'Amala Dlamini & Ariana Grande', 57, '2021-07-10', ''),
(83, 'Love To Dream', 9, 216, 'Amala Dlamini', 0, '0000-00-00', ''),
(84, 'You Right', 9, 186, 'Amala Dlamini', 11, '2021-07-10', ''),
(85, 'Been Like This', 9, 177, 'Amala Dlamini', 0, '0000-00-00', ''),
(86, 'Ain\'t Shit', 9, 174, 'Amala Dlamini', 24, '2021-07-10', ''),
(87, 'Imagine', 9, 148, 'Amala Dlamini', 0, '0000-00-00', ''),
(88, 'Alone', 9, 228, 'Amala Dlamini', 0, '0000-00-00', ''),
(89, 'Kiss Me More', 9, 208, 'Amala Dlamini & Solana Rowe', 3, '2021-07-10', ''),
(90, 'shut up', 10, 157, 'Ariana Grande', 47, '2020-11-14', ''),
(91, '34+35', 10, 173, 'Ariana Grande', 2, '2021-01-30', ''),
(92, 'motive', 10, 167, 'Ariana Grande & Amala Dlamini', 32, '2020-11-14', ''),
(93, 'just like magic', 10, 149, 'Ariana Grande', 43, '2020-11-14', ''),
(94, 'six thirty', 10, 183, 'Ariana Grande', 63, '2020-11-14', ''),
(95, 'my hair', 10, 158, 'Ariana Grande', 65, '2020-11-14', ''),
(96, 'nasty', 10, 200, 'Ariana Grande', 49, '2020-11-14', ''),
(97, 'west side', 10, 132, 'Ariana Grande', 71, '2020-11-14', ''),
(98, 'love language', 10, 179, 'Ariana Grande', 75, '2020-11-14', ''),
(99, 'positions', 10, 172, 'Ariana Grande', 1, '2020-11-07', ''),
(100, 'obvious', 10, 146, 'Ariana Grande', 70, '2020-11-14', ''),
(101, 'pov', 10, 201, 'Ariana Grande', 27, '2021-07-03', ''),
(102, 'Supermodel', 11, 181, 'Solana Rowe', 0, '0000-00-00', ''),
(103, 'Drew Barrymore', 11, 231, 'Solana Rowe', 0, '0000-00-00', ''),
(104, 'Prom', 11, 196, 'Solana Rowe', 0, '0000-00-00', ''),
(105, 'The Weekend', 11, 272, 'Solana Rowe', 29, '2018-01-03', ''),
(106, 'Go Gina', 11, 161, 'Solana Rowe', 0, '0000-00-00', ''),
(107, 'Garden (Say It Like Dat)', 11, 208, 'Solana Rowe', 0, '0000-00-00', ''),
(108, 'Broken Clocks', 11, 231, 'Solana Rowe', 82, '2018-04-14', ''),
(109, 'Anything', 11, 149, 'Solana Rowe', 0, '0000-00-00', ''),
(110, 'Normal Girl', 11, 253, 'Solana Rowe', 0, '0000-00-00', ''),
(111, '20 Something', 11, 198, 'Solana Rowe', 0, '0000-00-00', ''),
(112, 'Beside Myself', 12, 251, 'Lights Poxleitner', 0, '0000-00-00', ''),
(113, 'Prodigal Daughter', 12, 175, 'Lights Poxleitner', 0, '0000-00-00', ''),
(114, 'Salt and Vinegar', 12, 195, 'Lights Poxleitner', 0, '0000-00-00', ''),
(115, 'Jaws', 12, 197, 'Lights Poxleitner', 0, '0000-00-00', ''),
(116, 'Rent', 12, 206, 'Lights Poxleitner', 0, '0000-00-00', ''),
(117, 'Sparky', 12, 207, 'Lights Poxleitner', 0, '0000-00-00', ''),
(118, 'Easy Money', 12, 206, 'Lights Poxleitner', 0, '0000-00-00', ''),
(119, 'Okay Okay', 12, 200, 'Lights Poxleitner', 0, '0000-00-00', ''),
(120, 'Voices Carry', 12, 219, 'Lights Poxleitner', 0, '0000-00-00', ''),
(121, 'Grip', 12, 190, 'Lights Poxleitner', 0, '0000-00-00', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `albumartists`
--
ALTER TABLE `albumartists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `albums`
--
ALTER TABLE `albums`
  ADD PRIMARY KEY (`albumID`);

--
-- Indexes for table `artists`
--
ALTER TABLE `artists`
  ADD PRIMARY KEY (`artistID`);

--
-- Indexes for table `artistsongs`
--
ALTER TABLE `artistsongs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `songs`
--
ALTER TABLE `songs`
  ADD PRIMARY KEY (`songID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `albumartists`
--
ALTER TABLE `albumartists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `albums`
--
ALTER TABLE `albums`
  MODIFY `albumID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `artists`
--
ALTER TABLE `artists`
  MODIFY `artistID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `artistsongs`
--
ALTER TABLE `artistsongs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT for table `songs`
--
ALTER TABLE `songs`
  MODIFY `songID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
