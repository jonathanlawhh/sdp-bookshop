-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 04, 2018 at 03:26 PM
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
('b-00001', 'Harry Potter and the Cursed Child', 'Fantasy', 'JK Rowling', 'Based on an original new story by J.K. Rowling, John Tiffany and Jack Thorne, a new play by Jack Thorne, Harry Potter and the Cursed Child is the eighth story in the Harry Potter series and the first official Harry Potter story to be presented on stage. The play will receive its world premiere in London\'s West End on 30th July 2016.\r\n\r\nIt was always difficult being Harry Potter and it isn\'t much easier now that he is an overworked employee of the Ministry of Magic, a husband, and father of three school-age children.\r\n\r\nWhile Harry grapples with a past that refuses to stay where it belongs, his youngest son Albus must struggle with the weight of a family legacy he never wanted. As past and present fuse ominously, both father and son learn the uncomfortable truth: sometimes, darkness comes from unexpected places.', 21, 320, ' Original West End Production ', 20171231, 'harrypotter-cursed.png'),
('b-00002', 'Harry Potter and the Deathly Hallows', 'Fantasy', 'JK Rowling', 'Harry Potter and the Deathly Hallows is a fantasy novel written by British author J. K. Rowling and the seventh and final novel of the Harry Potter series. The book was released on 21 July 2007, ending the series that began in 1997 with the publication of Harry Potter and the Philosopher\'s Stone. It was published by Bloomsbury Publishing in the United Kingdom, in the United States by Scholastic, and in Canada by Raincoast Books. The novel chronicles the events directly following Harry Potter and the Half-Blood Prince (2005), and the final confrontation between the wizards Harry Potter and Lord Voldemort.', 21, 451, 'Original West End Production ', 20180101, 'harrypotter-deathly.png'),
('b-00003', 'The Maze Runner', 'Action', 'James Dashner', 'When Thomas wakes up in the lift, the only thing he can remember is his name. He is surrounded by strangers boys whose memories are also gone.\r\n   Outside the towering stone walls that surround them is a limitless, ever-changing maze. It is the only way out and no one has ever made it through alive.\r\n   Then a girl arrives. The first girl ever. And the message she delivers is terrifying: Remember. Survive. Run.', 24, 149, 'Paperback', 20180101, 'themazerunner01.png'),
('b-00004', 'The Scorch Trials (Maze Runner, Book 2)', 'Action', 'James Dashner', 'Thomas was sure that escape from the Maze would mean freedom for him and the Gladers. But WICKED is not done yet. Phase Two has just begun. The Scorch.\r\n   The Gladers have two weeks to cross through the Scorch, the most burned-out section of the world. And WICKED has made sure to adjust the variables and stack the odds against them.\r\n   There are others now. Their survival depends on the Gladers destruction and they are determined to survive.\r\n   Friendships will be tested. Loyalties will be broken. All bets are off. ', 24, 215, 'Paperback', 20180101, 'themazerunner02.png'),
('b-00005', 'The Death Cure (Maze Runner, Book Three)', 'Action', 'James Dashner', 'WICKED has taken everything from Thomas: his life, his memories, and now his only friends, the Gladers. But it is finally over. The trials are complete, after one final test.\r\n\r\nWhat WICKED does not know is that Thomas remembers far more than they think. And it is enough to prove that he cannot believe a word of what they say.\r\n\r\nThomas beat the Maze. He survived the Scorch. He will risk anything to save his friends. But the truth might be what ends it all.\r\n\r\nThe time for lies is over.', 24, 302, 'Paperback', 20180101, 'themazerunner03.png');

-- --------------------------------------------------------

--
-- Table structure for table `bookcomment`
--

CREATE TABLE `bookcomment` (
  `ratingID` int(11) NOT NULL,
  `bookISBN` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `comments` text NOT NULL,
  `date` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookcomment`
--

INSERT INTO `bookcomment` (`ratingID`, `bookISBN`, `username`, `comments`, `date`) VALUES
(1, 'b-00003', 'admin', 'Totally love this book. Gonna give a copy to my aunt, uncle, cousin, niece and grandparents for their upcoming birthday', 20180104),
(2, 'b-00003', 'jon', 'Average book with average storyline. Would say if it is in comic form, it will be better', 20180104),
(3, 'b-00005', 'jon', 'This book is definitely better than the first one. Very exciting and the plot twist at the end broke my heart haha', 20180104);

-- --------------------------------------------------------

--
-- Table structure for table `bookrating`
--

CREATE TABLE `bookrating` (
  `ratingID` int(11) NOT NULL,
  `bookISBN` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `rating` int(11) NOT NULL,
  `date` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookrating`
--

INSERT INTO `bookrating` (`ratingID`, `bookISBN`, `username`, `rating`, `date`) VALUES
(2, 'b-00003', 'admin', 5, 20180104),
(4, 'b-00003', 'jon', 4, 20180104),
(5, 'b-00005', 'jon', 5, 20180104);

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
('admin', 'admin', 'admin', 'admin@TPM', 'adk6oNRwypFwA', 'female', '0000000', '0001-01-01', 'member', 20171209),
('jon', 'Jonathan', 'Law', 'admin@TPM', 'jo1g3w0zpe932', 'male', '0123456789', '0001-01-01', 'member', 20171209),
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
-- Indexes for table `bookcomment`
--
ALTER TABLE `bookcomment`
  ADD PRIMARY KEY (`ratingID`);

--
-- Indexes for table `bookrating`
--
ALTER TABLE `bookrating`
  ADD PRIMARY KEY (`ratingID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookcomment`
--
ALTER TABLE `bookcomment`
  MODIFY `ratingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bookrating`
--
ALTER TABLE `bookrating`
  MODIFY `ratingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
