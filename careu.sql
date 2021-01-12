-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2021 at 08:44 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `careu`
--

-- --------------------------------------------------------

--
-- Table structure for table `119calloperator`
--

CREATE TABLE `119calloperator` (
  `userId` int(10) NOT NULL,
  `userName` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `firstName` varchar(20) NOT NULL,
  `lastName` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `image` varchar(255) NOT NULL,
  `flag` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `119calloperator`
--

INSERT INTO `119calloperator` (`userId`, `userName`, `password`, `firstName`, `lastName`, `gender`, `image`, `flag`) VALUES
(1, 'careu_119_damish', '202cb962ac59075b964b07152d234b70', 'Damish', 'Nisal', 'Male', '', 0),
(2, 'careu_119_damish', '202cb962ac59075b964b07152d234b70', 'Damish', 'Nisal', 'Male', '', 1),
(3, 'careu_119_Nisal', '202cb962ac59075b964b07152d234b70', 'Damish', 'Nisal', 'Male', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `119policerequest`
--

CREATE TABLE `119policerequest` (
  `requestId` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `complainCategory` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `119requestoperator`
--

CREATE TABLE `119requestoperator` (
  `requestId` int(11) NOT NULL,
  `userId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `1990ambulancerequest`
--

CREATE TABLE `1990ambulancerequest` (
  `requestId` int(10) NOT NULL,
  `date` varchar(20) NOT NULL,
  `time` varchar(20) NOT NULL,
  `district` varchar(40) NOT NULL,
  `policeStation` varchar(40) NOT NULL,
  `numberOfPatients` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `1990ambulancerequest`
--

INSERT INTO `1990ambulancerequest` (`requestId`, `date`, `time`, `district`, `policeStation`, `numberOfPatients`, `description`) VALUES
(2, '2020/10/13', '21:31:34', 'Ampara(à¶…à¶¸à·Šà¶´à·à¶»)', 'Ampara-Police-Station', '1', ''),
(3, '2020/10/14', '14:58:58', 'Ampara(à¶…à¶¸à·Šà¶´à·à¶»)', 'Ampara-Police-Station', '0', 'Pasanta Corona'),
(4, '2020/10/14', '15:18:20', 'Anuradhapura(à¶…à¶±à·”à¶»à·à¶°à¶´à·”à¶»', 'Badulla-Police-Station', '3', 'Manjitha nan ganjaa'),
(5, '2020/10/14', '18:53:3', 'Batticola(à¶¸à¶©à¶šà¶½à¶´à·”à·€ )', 'Colombo-Police-Station', '3', 'Plzz help me soon'),
(6, '2020/10/25', '15:45:1', 'Anuradhapura(à¶…à¶±à·”à¶»à·à¶°à¶´à·”à¶»', 'Anuradhapura-Police-Station', '3', 'There is a corona Patient '),
(7, '2020/10/26', '12:9:59', 'Ampara(à¶…à¶¸à·Šà¶´à·à¶»)', 'Ampara-Police-Station', '1', 'Help me !!!!'),
(8, '2020/12/1', '19:56:44', 'Badulla(à¶¶à¶¯à·”à¶½à·Šà¶½)', 'Batticola-Police-Station', '1', 'Help mee sooon I am in big trouble'),
(9, '2020/12/1', '20:57:31', 'Ampara(à¶…à¶¸à·Šà¶´à·à¶»)', 'Ampara-Police-Station', '1', ''),
(10, '2021/1/11', '14:57:29', 'Ampara(à¶…à¶¸à·Šà¶´à·à¶»)', 'Ampara-Police-Station', '1', ''),
(11, '2021/1/11', '14:57:38', 'Ampara(à¶…à¶¸à·Šà¶´à·à¶»)', 'Ampara-Police-Station', '1', 'sdsdsdds'),
(12, '2021/1/12', '12:16:8', 'Ampara(à¶…à¶¸à·Šà¶´à·à¶»)', 'Ampara-Police-Station', '4', 'I am in Heart Problem');

-- --------------------------------------------------------

--
-- Table structure for table `1990calloperator`
--

CREATE TABLE `1990calloperator` (
  `userId` int(10) NOT NULL,
  `userName` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `firstName` varchar(20) NOT NULL,
  `lastName` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `image` varchar(255) NOT NULL,
  `flag` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `1990calloperator`
--

INSERT INTO `1990calloperator` (`userId`, `userName`, `password`, `firstName`, `lastName`, `gender`, `image`, `flag`) VALUES
(1, 'careu_1990_damish', '202cb962ac59075b964b', 'Damish', 'Nisal', 'Male', '', 0),
(2, 'careu_119_damish', '81dc9bdb52d04dc20036', 'Damish', 'Nisal', 'Male', '', 1),
(3, 'careu_1990_damish', '81dc9bdb52d04dc20036dbd8313ed055', 'Damish', 'Nisal', 'Male', '', 1),
(4, 'careu_1990_Nisal', '81dc9bdb52d04dc20036dbd8313ed055', 'Nisal', 'Damish', 'Male', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `1990requestoperator`
--

CREATE TABLE `1990requestoperator` (
  `requestId` int(11) NOT NULL,
  `userId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `userId` int(10) NOT NULL,
  `userName` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`userId`, `userName`, `password`, `firstName`, `lastName`, `gender`) VALUES
(1, 'careu_admin_damish', '202cb962ac59075b964b07152d234b70', 'damish', 'nisal', 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedbackId` int(10) NOT NULL,
  `feedbackTime` datetime(6) NOT NULL,
  `comment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `give`
--

CREATE TABLE `give` (
  `requestId` int(11) NOT NULL,
  `feedbackId` int(11) NOT NULL,
  `userId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `idphoto`
--

CREATE TABLE `idphoto` (
  `userId` int(11) NOT NULL,
  `idPhoto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `idphoto`
--

INSERT INTO `idphoto` (`userId`, `idPhoto`) VALUES
(36, '972702366V_1'),
(36, '972702366V_2'),
(37, '971002000V_1'),
(37, '971002000V_2'),
(37, '972701234V_1'),
(37, '972701234V_2'),
(39, '972002366V_1'),
(39, '972002366V_2'),
(39, '972701234V_1'),
(39, '972701234V_2'),
(40, '200060001365_1'),
(40, '200060001365_2'),
(46, '972702000v_1'),
(46, '972702000v_2'),
(48, '972702399V_1'),
(48, '972702399V_2'),
(50, '972701234V_1'),
(50, '972701234V_2'),
(50, '972705060V_1'),
(50, '972705060V_2'),
(56, '200060001300_1'),
(56, '200060001300_2'),
(75, '705572622V_1'),
(75, '705572622V_2'),
(76, '972001256V_1'),
(76, '972001256V_2'),
(78, '972003060V_1'),
(78, '972003060V_2');

-- --------------------------------------------------------

--
-- Table structure for table `instruction1`
--

CREATE TABLE `instruction1` (
  `id` int(5) NOT NULL,
  `step` text NOT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `instruction1`
--

INSERT INTO `instruction1` (`id`, `step`, `description`, `image`) VALUES
(1, 'Step 1', 'Command someone to call 1990 or the medical alert system for the locale.\r\n				', 'cardiac_01.PNG'),
(2, 'Step 2', 'To check your pulse over your carotid artery, place your index and middle fingers on your neck to the side of your windpipe.\r\n				', 'cardiac_02.PNG'),
(6, 'Step 3', 'Keeping their head back check for signs they are breathing.\r\n				', 'cardiacs_03.PNG'),
(7, 'Step 4', 'Push hard, push fast. Place your hands, one on top of the other, in the middle of the chest. \r\n				', 'cardiac_04.PNG'),
(9, 'Step 5', 'Seal your mouth over their mouth, and blow steadily and firmly into their mouth for about 1 second.\r\n				', 'cardiac_05.PNG'),
(10, 'Step 6', 'Carefully roll the person onto their side by pulling on the bent knee.\r\n				', 'cardiac_06.PNG');

-- --------------------------------------------------------

--
-- Table structure for table `instruction2`
--

CREATE TABLE `instruction2` (
  `id` int(5) NOT NULL,
  `step` text NOT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `instruction2`
--

INSERT INTO `instruction2` (`id`, `step`, `description`, `image`) VALUES
(3, 'Step 1', 'Rinse your wound with lukewarm running water for a few minutes to remove foreign objects and visible dirt.\r\n				', 'bleed1.PNG'),
(4, 'Step 2', 'Use a clean, dry bandage (or any clean absorbent cloth) and apply gentle pressure over the wound until the bleeding stops.\r\n				', 'bleed2.PNG'),
(5, 'Step 3', 'Normally, the pressure on the wound will promote blood clotting, which will help the bleeding stop within 15â€“20 minutes.\r\n				', 'bleed3.PNG'),
(6, 'Step 4', 'Apply a layer of antibacterial cream as it helps prevent infection and keeps the dressing from sticking to the wound. \r\n				', 'bleed4.PNG'),
(7, 'Step 5', 'With proper treatment, the cut will start healing in a few weeks. However, deeper cuts might take over a month to completely heal.\r\n				', 'bleed5.PNG');

-- --------------------------------------------------------

--
-- Table structure for table `instruction3`
--

CREATE TABLE `instruction3` (
  `id` int(5) NOT NULL,
  `step` text NOT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `instruction3`
--

INSERT INTO `instruction3` (`id`, `step`, `description`, `image`) VALUES
(1, 'Step 1', 'Immediately put aside everything else you are doing, and make the environment safe by turning off any open fires, irons, cookers etc\r\n				', 'burn1.PNG'),
(2, 'Step 2', 'Carefully look at the appearance of the burn and note specific characteristics. This will help you decide the type of burn and the method of treatment.\r\n				', 'burn2.PNG'),
(3, 'Step 3', 'Hold the injury under cold running water for around 15â€“20 minutes. This will help pull the heat away from the skin and reduce the chances of inflammation.\r\n				', 'burn3.PNG'),
(4, 'Step 4', 'Burns can cause swelling. Wearing accessories around the affected area will add to the discomfort. Thus, it is best to remove them.\r\n				', 'burn4.PNG'),
(5, 'Step 5', 'Ointments such as Bacitracin or Polysporin greatly help reduce the chances of infection. Therefore, after washing the burn with running cold water, apply an antibiotic cream.\r\n				', 'burn5.PNG'),
(6, 'Step 6', 'Watch the burn to see if a blister pop on its own or by accident. If it does, rinse it with clean water and mild soap. Apply an antibiotic cream once it is dry.\r\n				', 'burn6.PNG');

-- --------------------------------------------------------

--
-- Table structure for table `manage`
--

CREATE TABLE `manage` (
  `adminId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `operation` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `photo`
--

CREATE TABLE `photo` (
  `evidenceId` int(10) NOT NULL,
  `time` time NOT NULL,
  `date` date NOT NULL,
  `category` varchar(50) NOT NULL,
  `requestId` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `relative`
--

CREATE TABLE `relative` (
  `relativeId` int(10) NOT NULL,
  `userId` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phoneNumber` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `relative`
--

INSERT INTO `relative` (`relativeId`, `userId`, `name`, `phoneNumber`) VALUES
(4, 36, 'Damish', '0776560118'),
(5, 37, 'kaveesha', '0771234567'),
(6, 39, 'Kavesha', '0771234567'),
(7, 39, 'Nisal', '0776560118'),
(8, 39, 'Manjitha', '0776560118'),
(9, 37, 'Nimansi', '0776560118'),
(18, 49, '23', '0776560118'),
(24, 50, 'Amma', '0776560118'),
(25, 50, 'Nangi', '0763761020'),
(26, 50, 'Care', '0776560118'),
(27, 39, 'sa', '0776560118'),
(28, 39, 'sa', '0776560118'),
(29, 39, 'sa', '0776560118'),
(30, 36, 'Nisal', '0776065618'),
(33, 49, 'Kaveesha', '0768020820'),
(34, 49, 'Kaveesha', '0768020820'),
(36, 51, 'DNA', '0772001005'),
(37, 51, 'Sadeepa', '0765651182'),
(38, 51, 'Damish Nisal A', '0776560118'),
(40, 36, 'Damish Nisal', '0776560115'),
(41, 53, 'W.A Irangani', '0774641040'),
(42, 75, 'Damish', '0776560118'),
(43, 78, 'Pasan', '0776561234'),
(44, 78, 'Damish', '0776560118');

-- --------------------------------------------------------

--
-- Table structure for table `reply`
--

CREATE TABLE `reply` (
  `replyId` int(10) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `message` varchar(100) NOT NULL,
  `userId` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `requestId` int(11) NOT NULL,
  `time` varchar(40) NOT NULL,
  `date` varchar(40) NOT NULL,
  `userId` int(10) NOT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`requestId`, `time`, `date`, `userId`, `type`) VALUES
(1, '21:16:46', '2020-10-13', 39, 'ambulance'),
(2, '21:31:34', '2020/10/13', 39, 'ambulance'),
(3, '14:58:58', '2020/10/14', 36, 'ambulance'),
(4, '15:18:20', '2020/10/14', 36, 'ambulance'),
(5, '18:53:3', '2020/10/14', 51, 'ambulance'),
(6, '15:45:1', '2020/10/25', 53, 'ambulance'),
(7, '12:9:59', '2020/10/26', 75, 'ambulance'),
(8, '19:56:44', '2020/12/1', 78, 'ambulance'),
(9, '20:57:31', '2020/12/1', 78, 'ambulance'),
(10, '14:57:29', '2021/1/11', 78, 'ambulance'),
(11, '14:57:38', '2021/1/11', 78, 'ambulance'),
(12, '12:16:8', '2021/1/12', 78, 'ambulance');

-- --------------------------------------------------------

--
-- Table structure for table `send`
--

CREATE TABLE `send` (
  `replyId` int(11) NOT NULL,
  `userId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `servicerequester`
--

CREATE TABLE `servicerequester` (
  `userId` int(10) NOT NULL,
  `userName` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `firstName` varchar(20) NOT NULL,
  `lastName` varchar(20) NOT NULL,
  `nicNumber` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `address` varchar(255) NOT NULL,
  `dateOfBirth` varchar(20) NOT NULL,
  `phoneNumber` varchar(10) NOT NULL,
  `status` varchar(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `servicerequester`
--

INSERT INTO `servicerequester` (`userId`, `userName`, `password`, `firstName`, `lastName`, `nicNumber`, `gender`, `email`, `address`, `dateOfBirth`, `phoneNumber`, `status`) VALUES
(36, 'damish', '000', 'damish', 'nisal', '972702366V', 'Male', 'damishnisal100@gmail.com', 'Galle', '2012-12-31', '0776560118', '1'),
(37, 'damish97', '12345678', 'Nisal', 'Damish', '971002000V', 'Male', 'damishnisal100@gmail.com', 'Galle', '1997-09-26', '0776560118', '1'),
(38, 'damish1997', '12345678', 'damish', 'nisal', '972702380V', 'Male', 'damish@gmail.com', 'Galle', '2012-11-30', '0776560118', '0'),
(39, 'Damish1599', '12345678', 'Damish', 'Nisal', '972002366V', 'Male', 'damishnisal100@gmail.com', 'Galle', '2012-12-31', '0776560118', '1'),
(40, 'Pasan', '12345678', 'Pasan', 'Bashitha', '200060001365', 'Male', 'pasanbathisa@gmail.com', 'Colombo', '2012-09-30', '0776560118', '1'),
(41, 'damish123', '12345678', 'daa', 'nisal', '972702665v', 'Male', 'damish@gmail.com', 'galle', '2012-12-31', '0776560118', '2'),
(42, 'damish12', '12345678', 'daa', 'nisal', '972702669v', 'Male', 'damish@gmail.com', 'galle', '2012-12-31', '0776560118', '1'),
(43, 'damish12', '12345678', 'daa', 'nisal', '972702669v', 'Male', 'damish@gmail.com', 'galle', '2012-12-31', '0776560118', '0'),
(44, 'damish199', '12345678', 'damish', 'nisal', '972702388v', 'Male', 'damishnisal100@gmail.com', 'galle', '2012-12-31', '0776560118', '0'),
(45, 'damish199', '12345678', 'damish', 'nisal', '972702388v', 'Male', 'damishnisal100@gmail.com', 'galle', '2012-12-31', '0776560118', '1'),
(46, 'damish200', '12345678', 'damish', 'nisal', '972702000v', 'Male', 'damishnisal100@gmail.com', 'galle', '1997-09-26', '0776560118', '1'),
(48, '1599', '12345678', 'damish', 'nisal', '972702399V', 'Male', 'damishnisal100@gmail.com', 'galle', '2012-12-31', '0776560118', '2'),
(49, '1599', '12345678', 'damish', 'nisal', '972702399V', 'Male', 'damishnisal100@gmail.com', 'galle', '2012-12-31', '0776560118', '1'),
(50, '18001599', '12345678', 'Damish', 'Nisal', '972705060V', 'Male', 'damishnisal100@gmail.com', 'Galle', '1998-04-26', '0774641040', '1'),
(51, 'dam', '12345678', 'Kavee', 'Niamnsi', '972704000V', 'Male', 'damishnisal100@gmail.com', 'Galle', '2012-12-31', '0776560118', '1'),
(53, 'DamishNisal', '12345', 'Damish', 'Nisal', '972701234V', 'Male', 'damishnisal100@gmail.com', 'Galle', '2012-12-31', '0776560118', '1'),
(56, 'kavee', '12345678', 'Kaveesha', 'Nisamnsi', '200060001300', 'Female', 'kavee@gmail.com', 'Galle', '2012-11-30', '0776560118', '0'),
(75, 'i123', '12345678', 'Irangani', 'WA', '705572622V', 'Female', 'ira@gmail.com', 'ddd', '1970-02-26', '0774641040', '1'),
(76, 'dami', '12345678', 'damish', 'nisal222', '972001256V', 'Male', 'damish@gmail.com', 'Galle', '1997-07-18', '0776560118', '0'),
(78, 'Damish8080', '81dc9bdb52d04dc20036dbd8313ed055', 'Damish', 'Nisal', '972003060V', 'Male', 'Damishnisal100@gmail.com', 'Galle', '1997-07-18', '0776560118', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `119calloperator`
--
ALTER TABLE `119calloperator`
  ADD PRIMARY KEY (`userId`);

--
-- Indexes for table `119policerequest`
--
ALTER TABLE `119policerequest`
  ADD PRIMARY KEY (`requestId`);

--
-- Indexes for table `119requestoperator`
--
ALTER TABLE `119requestoperator`
  ADD PRIMARY KEY (`requestId`,`userId`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `1990ambulancerequest`
--
ALTER TABLE `1990ambulancerequest`
  ADD PRIMARY KEY (`requestId`);

--
-- Indexes for table `1990calloperator`
--
ALTER TABLE `1990calloperator`
  ADD PRIMARY KEY (`userId`);

--
-- Indexes for table `1990requestoperator`
--
ALTER TABLE `1990requestoperator`
  ADD PRIMARY KEY (`requestId`,`userId`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`userId`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedbackId`);

--
-- Indexes for table `give`
--
ALTER TABLE `give`
  ADD PRIMARY KEY (`requestId`,`feedbackId`,`userId`),
  ADD KEY `feedback` (`feedbackId`),
  ADD KEY `user` (`userId`);

--
-- Indexes for table `idphoto`
--
ALTER TABLE `idphoto`
  ADD PRIMARY KEY (`userId`,`idPhoto`);

--
-- Indexes for table `instruction1`
--
ALTER TABLE `instruction1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `instruction2`
--
ALTER TABLE `instruction2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `instruction3`
--
ALTER TABLE `instruction3`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manage`
--
ALTER TABLE `manage`
  ADD PRIMARY KEY (`adminId`,`userId`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `photo`
--
ALTER TABLE `photo`
  ADD PRIMARY KEY (`evidenceId`),
  ADD KEY `photo_ibfk_1` (`requestId`);

--
-- Indexes for table `relative`
--
ALTER TABLE `relative`
  ADD PRIMARY KEY (`relativeId`),
  ADD KEY `relative` (`userId`);

--
-- Indexes for table `reply`
--
ALTER TABLE `reply`
  ADD PRIMARY KEY (`replyId`),
  ADD KEY `reply_ibfk_1` (`userId`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`requestId`),
  ADD KEY `serviceRequest` (`userId`);

--
-- Indexes for table `send`
--
ALTER TABLE `send`
  ADD PRIMARY KEY (`replyId`,`userId`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `servicerequester`
--
ALTER TABLE `servicerequester`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `119calloperator`
--
ALTER TABLE `119calloperator`
  MODIFY `userId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `1990calloperator`
--
ALTER TABLE `1990calloperator`
  MODIFY `userId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `userId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedbackId` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `instruction1`
--
ALTER TABLE `instruction1`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `instruction2`
--
ALTER TABLE `instruction2`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `instruction3`
--
ALTER TABLE `instruction3`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `photo`
--
ALTER TABLE `photo`
  MODIFY `evidenceId` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `relative`
--
ALTER TABLE `relative`
  MODIFY `relativeId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `reply`
--
ALTER TABLE `reply`
  MODIFY `replyId` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `requestId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `servicerequester`
--
ALTER TABLE `servicerequester`
  MODIFY `userId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `119policerequest`
--
ALTER TABLE `119policerequest`
  ADD CONSTRAINT `119policerequest_ibfk_1` FOREIGN KEY (`requestId`) REFERENCES `request` (`requestId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `119requestoperator`
--
ALTER TABLE `119requestoperator`
  ADD CONSTRAINT `119requestoperator_ibfk_1` FOREIGN KEY (`requestId`) REFERENCES `119policerequest` (`requestId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `119requestoperator_ibfk_2` FOREIGN KEY (`userId`) REFERENCES `119calloperator` (`userId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `1990ambulancerequest`
--
ALTER TABLE `1990ambulancerequest`
  ADD CONSTRAINT `1990ambulancerequest_ibfk_1` FOREIGN KEY (`requestId`) REFERENCES `request` (`requestId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `1990requestoperator`
--
ALTER TABLE `1990requestoperator`
  ADD CONSTRAINT `1990requestoperator_ibfk_1` FOREIGN KEY (`requestId`) REFERENCES `1990ambulancerequest` (`requestId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `1990requestoperator_ibfk_2` FOREIGN KEY (`userId`) REFERENCES `1990calloperator` (`userId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `give`
--
ALTER TABLE `give`
  ADD CONSTRAINT `feedback` FOREIGN KEY (`feedbackId`) REFERENCES `feedback` (`feedbackId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `request` FOREIGN KEY (`requestId`) REFERENCES `request` (`requestId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user` FOREIGN KEY (`userId`) REFERENCES `servicerequester` (`userId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `idphoto`
--
ALTER TABLE `idphoto`
  ADD CONSTRAINT `idphoto_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `servicerequester` (`userId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `manage`
--
ALTER TABLE `manage`
  ADD CONSTRAINT `manage_ibfk_1` FOREIGN KEY (`adminId`) REFERENCES `admin` (`userId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `manage_ibfk_2` FOREIGN KEY (`userId`) REFERENCES `119calloperator` (`userId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `manage_ibfk_3` FOREIGN KEY (`userId`) REFERENCES `1990calloperator` (`userId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `photo`
--
ALTER TABLE `photo`
  ADD CONSTRAINT `photo_ibfk_1` FOREIGN KEY (`requestId`) REFERENCES `request` (`requestId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `relative`
--
ALTER TABLE `relative`
  ADD CONSTRAINT `relative` FOREIGN KEY (`userId`) REFERENCES `servicerequester` (`userId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reply`
--
ALTER TABLE `reply`
  ADD CONSTRAINT `reply_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `servicerequester` (`userId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `request`
--
ALTER TABLE `request`
  ADD CONSTRAINT `serviceRequest` FOREIGN KEY (`userId`) REFERENCES `servicerequester` (`userId`);

--
-- Constraints for table `send`
--
ALTER TABLE `send`
  ADD CONSTRAINT `send_ibfk_1` FOREIGN KEY (`replyId`) REFERENCES `reply` (`replyId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `send_ibfk_2` FOREIGN KEY (`userId`) REFERENCES `119calloperator` (`userId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `send_ibfk_3` FOREIGN KEY (`userId`) REFERENCES `1990calloperator` (`userId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
