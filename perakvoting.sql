-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2021 at 03:25 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perakvoting`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(50) NOT NULL,
  `password1` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password1`) VALUES
('admin', '81dc9bdb52d04dc20036dbd8313ed055');

-- --------------------------------------------------------

--
-- Table structure for table `candidate`
--

CREATE TABLE `candidate` (
  `candidunId` varchar(4) NOT NULL,
  `candiname` char(200) NOT NULL,
  `candiparti` char(50) NOT NULL,
  `candivote` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `candidate`
--

INSERT INTO `candidate` (`candidunId`, `candiname`, `candiparti`, `candivote`) VALUES
('N12', 'AHMAD FIZAL BIN KAMIL', 'BERSATU', 0),
('N12', 'AZMIN BIN ALI', 'UMNO', 0),
('N12', 'KAMAL ADLI BIN SYAKAIS', 'BEBAS', 0),
('N12', 'MAT BIN SALLEH', 'PAS', 0),
('N23', 'ASMAD BIN AZFARI', 'PAS', 0),
('N23', 'ALMAHURI BIN ZAKFAR', 'UMNO', 0),
('N23', 'AQEDY BIN SYAZMAN', 'BERSATU', 1),
('N23', 'YUSRI BIN ISMAIL', 'BEBAS', 0),
('N24', 'FAIZ BIN SALAHUDIN', 'UMNO', 0),
('N24', 'AYSRAF BIN LAKSAMANA', 'BERSATU', 0),
('N24', 'SYAFIQ BIN IRFAN', 'PAS', 0),
('N24', 'LANGKAWI BIN SEMAN', 'BEBAS', 0),
('N26', 'LUKMAN BIN HAKIM', 'BERSATU', 1),
('N26', 'AQIL BIN MAT HUSSIN', 'UMNO', 0),
('N26', 'RAHIM BIN SYAUKI', 'PAS', 0),
('N27', 'QASYAF BIN SYUKRAN', 'PAS', 0),
('N27', 'FARHAN BIN AHMAD', 'BERSATU', 0),
('N27', 'DANIEL BIN IMAN', 'UMNO', 0),
('N27', 'PUTERA ISMA BIN QASEH', 'BEBAS', 0),
('N28', 'ZAIDEE BIN SHAZZUAN', 'PAS', 0),
('N28', 'AISY BIN RASYIDI', 'BERSATU', 0),
('N28', 'RAZALI BIN MOHAMAD', 'UMNO', 0),
('N28', 'AZIZ BIN HARUN', 'BEBAS', 0),
('N29', 'REDZA AHMAD BIN FASYIK', 'PAS', 0),
('N29', 'BOHAN BIN IKMAL AMRIS', 'BERSATU', 0),
('N29', 'HARIS BIN AZMAN', 'UMNO', 0),
('N29', 'SYAFIQ KYLE BIN TAQQUE', 'BEBAS', 0),
('N26', 'KAMAL KASIH BIN SALMAN', 'BEBAS', 0);

-- --------------------------------------------------------

--
-- Table structure for table `dun`
--

CREATE TABLE `dun` (
  `dunid` varchar(4) NOT NULL,
  `dunname` char(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dun`
--

INSERT INTO `dun` (`dunid`, `dunname`) VALUES
('N12', 'SELINSING'),
('N23', 'MANJOI'),
('N24', 'HULU KINTA'),
('N26', 'TEBING TINGGI'),
('N27', 'PASIR PINJI'),
('N28', 'BERCHAM'),
('N29', 'KEPAYANG');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` int(10) NOT NULL,
  `name` char(100) NOT NULL,
  `ic` int(12) NOT NULL,
  `birth` date NOT NULL,
  `address` varchar(200) NOT NULL,
  `area` char(50) NOT NULL,
  `poscode` int(6) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `vote`
--

CREATE TABLE `vote` (
  `id` int(11) NOT NULL,
  `voterID` int(11) NOT NULL,
  `dun` varchar(100) NOT NULL,
  `candidatename` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `dun`
--
ALTER TABLE `dun`
  ADD PRIMARY KEY (`dunid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `vote`
--
ALTER TABLE `vote`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `vote`
--
ALTER TABLE `vote`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
