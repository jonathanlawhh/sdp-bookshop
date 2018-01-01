-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 01, 2018 at 11:15 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tpmb`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `bookISBN` varchar(255) NOT NULL,
  `bookname` varchar(255) NOT NULL,
  `bookcategory` varchar(80) NOT NULL,
  `bookauthor` varchar(255) NOT NULL,
  `bookdesc` longtext NOT NULL,
  `bookprice` int(11) NOT NULL,
  `bookpages` int(11) NOT NULL,
  `bookpublisher` varchar(255) NOT NULL,
  `bookdateadd` int(11) NOT NULL,
  `bookthumbnail` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`bookISBN`, `bookname`, `bookcategory`, `bookauthor`, `bookdesc`, `bookprice`, `bookpages`, `bookpublisher`, `bookdateadd`, `bookthumbnail`) VALUES
('b-00001', 'Harry Potter and the Cursed Child', 'Fantasy', 'JK Rowling', 'Based on an original new story by J.K. Rowling, John Tiffany and Jack Thorne, a new play by Jack Thorne, Harry Potter and the Cursed Child is the eighth story in the Harry Potter series and the first official Harry Potter story to be presented on stage. The play will receive its world premiere in London\'s West End on 30th July 2016.\r\n\r\nIt was always difficult being Harry Potter and it isn\'t much easier now that he is an overworked employee of the Ministry of Magic, a husband, and father of three school-age children.\r\n\r\nWhile Harry grapples with a past that refuses to stay where it belongs, his youngest son Albus must struggle with the weight of a family legacy he never wanted. As past and present fuse ominously, both father and son learn the uncomfortable truth: sometimes, darkness comes from unexpected places.', 21, 320, ' Original West End Production ', 20171231, 'harrypotter-cursed.png');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` varchar(7) NOT NULL,
  `pnumber` varchar(32) NOT NULL,
  `birthday` varchar(10) DEFAULT NULL,
  `status` varchar(30) NOT NULL DEFAULT 'member',
  `registerdate` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `fname`, `lname`, `email`, `password`, `gender`, `pnumber`, `birthday`, `status`, `registerdate`) VALUES
('admin', 'admin', 'admin', 'admin@TPM', 'adpexzg3FUZAk', 'male', '0000000', '0001-01-01', 'member', 20171209),
('jon', 'Jonathan', 'Law', 'admin@TPM', 'joCLvw5kls/IU', 'male', '0123456789', '0001-01-01', 'member', 20171209),
('test', 'admin', '', 'admin@TPM', 'teCcXDQBWYvL6', 'male', '0000000', '0001-01-01', 'member', 20171217);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`bookISBN`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
