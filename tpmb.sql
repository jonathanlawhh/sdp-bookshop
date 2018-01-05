-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 05, 2018 at 03:26 AM
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
('b-00005', 'The Death Cure (Maze Runner, Book Three)', 'Action', 'James Dashner', 'WICKED has taken everything from Thomas: his life, his memories, and now his only friends, the Gladers. But it is finally over. The trials are complete, after one final test.\r\n\r\nWhat WICKED does not know is that Thomas remembers far more than they think. And it is enough to prove that he cannot believe a word of what they say.\r\n\r\nThomas beat the Maze. He survived the Scorch. He will risk anything to save his friends. But the truth might be what ends it all.\r\n\r\nThe time for lies is over.', 24, 302, 'Paperback', 20180101, 'themazerunner03.png'),
('b-00006', 'The 5th Wave: The First Book of the 5th Wave Series', 'Sci-Fi', 'Rick Yancey', 'After the 1st wave, only darkness remains. After the 2nd, only the lucky escape. And after the 3rd, only the unlucky survive. After the 4th wave, only one rule applies: trust no one.\r\n\r\nNow, it\'s the dawn of the 5th wave, and on a lonely stretch of highway, Cassie runs from Them. The beings who only look human, who roam the countryside killing anyone they see. Who have scattered Earth\'s last survivors. To stay alone is to stay alive, Cassie believes, until she meets Evan Walker. Beguiling and mysterious, Evan Walker may be Cassie\'s only hope for rescuing her brother--or even saving herself. But Cassie must choose: between trust and despair, between defiance and surrender, between life and death. To give up or to get up.', 20, 89, 'Paperback', 20180101, 'the5thwave.png'),
('b-00007', 'The Infinite Sea: The Second Book of the 5th Wave', 'Sci-Fi', 'Rick Yancey', 'How do you rid the Earth of seven billion humans? Rid the humans of their humanity.\r\n\r\nSurviving the first four waves was nearly impossible. Now Cassie Sullivan finds herself in a new world, a world in which the fundamental trust that binds us together is gone. As the 5th Wave rolls across the landscape, Cassie, Ben, and Ringer are forced to confront the Others ultimate goal: the extermination of the human race.\r\n\r\nCassie and her friends have not seen the depths to which the Others will sink, nor have the Others seen the heights to which humanity will rise, in the ultimate battle between life and death, hope and despair, love and hate.', 22, 105, 'Paperback', 20180101, 'the5thwave02.png'),
('b-00008', 'The Last Star: The Final Book of The 5th Wave', 'Sci-Fi', 'Rick Yancey', 'The enemy is Other. The enemy is us. They are down here, they are up there, they are nowhere. They want the Earth, they want us to have it. They came to wipe us out, they came to save us.\r\n\r\nBut beneath these riddles lies one truth: Cassie has been betrayed. So has Ringer. Zombie. Nugget. And all 7.5 billion people who used to live on our planet. Betrayed first by the Others, and now by ourselves.\r\n\r\nIn these last days, Earths remaining survivors will need to decide what is more important: saving themselves ... or saving what makes us human.', 22, 115, 'Paperback', 20180101, 'the5thwave03.png'),
('b-00009', 'The Da Vinci Code', 'Mystery', 'Dan Brown', 'The Da Vinci Code is a 2003 mystery thriller novel by Dan Brown. It follows symbologist Robert Langdon and cryptologist Sophie Neveu after a murder in the Louvre Museum in Paris causes them to become involved in a battle between the Priory of Sion and Opus Dei over the possibility of Jesus Christ having been a companion to Mary Magdalene.\r\n\r\nThe title of the novel refers to the finding of the first murder victim in the Grand Gallery of the Louvre, naked and posed similar to Leonardo da Vinci\'s famous drawing, the Vitruvian Man, with a cryptic message written beside his body and a pentagram drawn on his chest in his own blood.\r\n\r\nThe novel explores an alternative religious history, whose central plot point is that the Merovingian kings of France were descended from the bloodline of Jesus Christ and Mary Magdalene, ideas derived from Clive Prince\'s The Templar Revelation (1997) and books by Margaret Starbird. The book also refers to The Holy Blood and the Holy Grail (1982) though Dan Brown has stated that it was not used as research material.\r\n\r\nThe Da Vinci Code provoked a popular interest in speculation concerning the Holy Grail legend and Mary Magdalene\'s role in the history of Christianity. The book has, however, been extensively denounced by many Christian denominations as an attack on the Roman Catholic Church, and consistently criticized for its historical and scientific inaccuracies.', 25, 597, 'Paperback', 20180101, 'thedavinccicode.png'),
('b-00010', 'Inferno', 'Mystery', 'Dan Brown', 'Harvard professor of symbology Robert Langdon awakens in an Italian hospital, disoriented and with no recollection of the past thirty-six hours, including the origin of the macabre object hidden in his belongings. With a relentless female assassin trailing them through Florence, he and his resourceful doctor, Sienna Brooks, are forced to flee. Embarking on a harrowing journey, they must unravel a series of codes, which are the work of a brilliant scientist whose obsession with the end of the world is matched only by his passion for one of the most influential masterpieces ever written, Dante Alighieri\'s The Inferno. ', 23, 624, 'Paperback', 20180101, 'inferno.png');

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
(3, 'b-00005', 'jon', 'This book is definitely better than the first one. Very exciting and the plot twist at the end broke my heart haha', 20180104),
(4, 'b-00009', 'jon', 'Murder in the Louvre! Code in classic art! A conspiracy big enough to rewrite history!', 20180105),
(5, 'b-00009', 'test', 'Perfect book when you are bored or want something to think about. Very absorbing ', 20180105),
(6, 'b-00009', 'admin', 'Entertaining book, lets your imagination run wild. Totally recommend it!!', 20180105),
(7, 'b-00010', 'admin', 'Dan Brown has raised the bar yet again, combining classical Italian art, history, and literature with cutting-edge science in this sumptuously entertaining thriller.', 20180105),
(8, 'b-00003', 'hrx', 'This book is quite boring, not worth the money and time', 20180105);

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
(5, 'b-00005', 'jon', 5, 20180104),
(6, 'b-00009', 'jon', 5, 20180105),
(7, 'b-00009', 'test', 5, 20180105),
(8, 'b-00009', 'admin', 4, 20180105),
(9, 'b-00005', 'admin', 3, 20180105),
(10, 'b-00003', 'hrx', 1, 20180105);

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
('hrx', 'Rui Xiang', 'Ho', 'rui.xiang@cloudmails.apu.edu.my', 'hrfk8UNEv60po', 'male', '0123456789', '2018-01-01', 'member', 20180105),
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
  MODIFY `ratingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `bookrating`
--
ALTER TABLE `bookrating`
  MODIFY `ratingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
