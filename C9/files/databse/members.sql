-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 17, 2017 at 12:09 PM
-- Server version: 5.7.14
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `members`
--

-- --------------------------------------------------------

--
-- Table structure for table `debtsalebuyers`
--

CREATE TABLE `debtsalebuyers` (
  `ID` int(10) NOT NULL,
  `Code` varchar(10) CHARACTER SET utf8 NOT NULL,
  `Name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `PhoneNumber` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `debtsalebuyers`
--

INSERT INTO `debtsalebuyers` (`ID`, `Code`, `Name`, `PhoneNumber`) VALUES
(1, 'JTM', 'JTM Capital Management', '866-651-7663'),
(2, 'CAM', 'Crown Asset Management', '866-696-4442');

-- --------------------------------------------------------

--
-- Table structure for table `lendingstates`
--

CREATE TABLE `lendingstates` (
  `id` int(100) NOT NULL,
  `state_name` varchar(30) NOT NULL,
  `state_abr` varchar(30) NOT NULL,
  `state_status` tinyint(1) NOT NULL,
  `state_dc_status` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(255) NOT NULL,
  `user_first` varchar(256) NOT NULL,
  `user_last` varchar(256) NOT NULL,
  `user_shortname` varchar(256) NOT NULL,
  `user_email` varchar(256) NOT NULL,
  `user_role` varchar(255) NOT NULL,
  `user_uid` varchar(256) NOT NULL,
  `user_password` text NOT NULL,
  `user_status` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_first`, `user_last`, `user_shortname`, `user_email`, `user_role`, `user_uid`, `user_password`, `user_status`) VALUES
(1, 'Julio', 'Rosales', 'Julio R', 'julio.r@spotloan.com', 'Manager/Supervisor', 'julior', '$2y$10$i1x5fS/x9KRLCZeyJNY0fO/uu1pBdkAKs2vMNcE51jfrjB3U8WZ1C', 1);

-- --------------------------------------------------------

--
-- Table structure for table `usew`
--

CREATE TABLE `usew` (
  `Username` varchar(18) NOT NULL,
  `Password` varchar(12) DEFAULT NULL,
  `FirstName` varchar(9) DEFAULT NULL,
  `LastName` varchar(10) DEFAULT NULL,
  `SysName` varchar(11) DEFAULT NULL,
  `Email` varchar(24) DEFAULT NULL,
  `Role` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usew`
--

INSERT INTO `usew` (`Username`, `Password`, `FirstName`, `LastName`, `SysName`, `Email`, `Role`) VALUES
('enilortiz', 'Honduras2017', 'Enil', 'Ortiz', 'Enil O', 'enil.o@spotloan.com', 'Collections Manager'),
('marcorivera', 'Honduras2017', 'Marco', 'Rivera', 'Marco R', 'marco.r@spotloan.com', 'Collections Manager'),
('allanpavon', 'Honduras2017', 'Allan', 'Pavon', 'Allan P', 'allan.p@spotloan.com', 'Collections Manager'),
('jorgevalle', 'Honduras2017', 'Jorge', 'Valle', 'Jorge V', 'jorge.v@spotloan.com', 'Collections Manager'),
('josealeman', 'Honduras2017', 'Jose', 'Aleman', 'Jose A', 'jose.a@spotloan.com', 'Collections Manager'),
('terollalas', 'Honduras2017', 'Teroll', 'Alas', 'Teroll A', 'teroll.a@spotloan.com', 'Collections Manager'),
('wilsonvalladares', 'Honduras2017', 'Wilson', 'Valladares', 'Wilson V', 'wilson.v@spotloan.com', 'Collections Manager'),
('josueacosta', 'Honduras2017', 'Josue', 'Acosta', 'Josue A', 'josue.a@spotloan.com', 'Collections Manager'),
('christianhernandez', 'Honduras2017', 'Christian', 'Hernandez', 'Christian H', 'christian.h@spotloan.com', 'Collections Manager'),
('jessicamenjivar', 'Honduras2017', 'Jessica', 'Menjivar', 'Jessica M', 'jessica.m@spotloan.com', 'Collections Manager'),
('kathleenrios', 'Honduras2017', 'Kathleen', 'Rios', 'Kathleen R', 'kathleen.r@spotloan.com', 'Collections Manager'),
('lindaperdomo', 'Honduras2017', 'Linda', 'Perdomo', 'Linda P', 'linda.p@spotloan.com', 'Collections Manager'),
('luissoler', 'Honduras2017', 'Luis', 'Soler', 'Luis S', 'luis.s@spotloan.com', 'Collections Manager'),
('pamelacruz', 'Honduras2017', 'Pamela', 'Cruz', 'Pamela C', 'pamela.c@spotloan.com', 'Collections Manager'),
('carlotasuazo', 'Honduras2017', 'Carlota', 'Suazo', 'Carlota S', 'carlota.s@spotloan.com', 'Collections Manager'),
('celiovelasquez', 'Honduras2017', 'Celio', 'Velasquez', 'Celio V', 'celio.v@spotloan.com', 'Collections Manager'),
('jordanlamberth', 'Honduras2017', 'Jordan', 'Lamberth', 'Jordan L', 'jordan.l@spotloan.com', 'Collections Manager'),
('albertcorea', 'Honduras2017', 'Albert', 'Corea', 'Albert C', 'albert.c@spotloan.com', 'Collections Manager'),
('joshortiz', 'Honduras2017', 'Josh', 'Ortiz', 'Josh O', 'josh.o@spotloan.com', 'Collections Manager'),
('waltercerrato', 'Honduras2017', 'Walter', 'Cerrato', 'Walter C', 'walter.c@spotloan.com', 'Collections Manager'),
('danielamaya', 'Honduras2017', 'Daniel', 'Amaya', 'Daniel A', 'daniel.a@spotloan.com', 'Relationship Manager'),
('eunicetabora', 'Honduras2017', 'Eunice', 'Tabora', 'Eunice T', 'eunice.t@spotloan.com', 'Relationship Manager'),
('jesuslopez', 'Honduras2017', 'Jesus', 'Lopez', 'Jesus L', 'jesus.l@spotloan.com', 'Relationship Manager'),
('josuemiranda', 'Honduras2017', 'Josue', 'Miranda', 'Josue M', 'josue.m@spotloan.com', 'Relationship Manager'),
('kelvinarchaga', 'Honduras2017', 'Kelvin', 'Archaga', 'Kelvin A', 'kelvin.a@spotloan.com', 'Relationship Manager'),
('loressyturcios', 'Honduras2017', 'Loressy', 'Turcios', 'Loressy T', 'loressy.t@spotloan.com', 'Relationship Manager'),
('luisrodriguez', 'Honduras2017', 'Luis', 'Rodriguez', 'Luis R', 'luis.r@spotloan.com', 'Relationship Manager'),
('ruthmendoza', 'Honduras2017', 'Ruth', 'Mendoza', 'Ruth M', 'ruth.m@spotloan.com', 'Relationship Manager'),
('elidubon', 'Honduras2017', 'Eli', 'Dubon', 'Eli D', 'eli.d@spotloan.com', 'Special Team'),
('alejandrolopez', 'Honduras2017', 'Alejandro', 'Lopez', 'Alejandro L', 'alejandro.l@spotloan.com', 'Special Team'),
('nolviahernandez', 'Honduras2017', 'Nolvia', 'Hernandez', 'Nolvia H', 'nolvia.h@spotloan.com', 'Special Team'),
('wendygarcia', 'Honduras2017', 'Wendy', 'Garcia', 'Wendy G', 'wendy.g@spotloan.com', 'Special Team'),
('juliorosales', 'Honduras2017', 'Julio', 'Rosales', 'Julio R', 'julio.r@spotloan.com', 'Supervisor/Manager'),
('isisfernandez', 'Honduras2017', 'Isis', 'Fernandez', 'Isis F', 'isis.f@spotloan.com', 'Supervisor/Manager'),
('robertmarquez', 'Honduras2017', 'Robert', 'Marquez', 'Robert M', 'robert.m@spotloan.com', 'Supervisor/Manager'),
('victorham', 'Honduras2017', 'Victor', 'Ham', 'Victor H', 'victor.h@spotloan.com', 'Supervisor/Manager'),
('mariomarmol', 'Honduras2017', 'Mario', 'Marmol', 'Mario M', 'mario.m@spotloan.com', 'Supervisor/Manager'),
('', NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `debtsalebuyers`
--
ALTER TABLE `debtsalebuyers`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `lendingstates`
--
ALTER TABLE `lendingstates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `usew`
--
ALTER TABLE `usew`
  ADD PRIMARY KEY (`Username`),
  ADD UNIQUE KEY `Username` (`Username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `debtsalebuyers`
--
ALTER TABLE `debtsalebuyers`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `lendingstates`
--
ALTER TABLE `lendingstates`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
