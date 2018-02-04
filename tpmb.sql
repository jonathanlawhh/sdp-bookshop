-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 04, 2018 at 02:39 PM
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
  `bookthumbnail` varchar(255) NOT NULL,
  `bookQty` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`bookISBN`, `bookname`, `bookcategory`, `bookauthor`, `bookdesc`, `bookprice`, `bookpages`, `bookpublisher`, `bookdateadd`, `bookthumbnail`, `bookQty`) VALUES
('b-00001', 'Harry Potter and the Cursed Child', 'Fantasy', 'JK Rowling', 'Based on an original new story by J.K. Rowling, John Tiffany and Jack Thorne, a new play by Jack Thorne, Harry Potter and the Cursed Child is the eighth story in the Harry Potter series and the first official Harry Potter story to be presented on stage. The play will receive its world premiere in London\'s West End on 30th July 2016.\r\n\r\nIt was always difficult being Harry Potter and it isn\'t much easier now that he is an overworked employee of the Ministry of Magic, a husband, and father of three school-age children.\r\n\r\nWhile Harry grapples with a past that refuses to stay where it belongs, his youngest son Albus must struggle with the weight of a family legacy he never wanted. As past and present fuse ominously, both father and son learn the uncomfortable truth: sometimes, darkness comes from unexpected places.', 21, 320, ' Original West End Production ', 20171231, 'harrypotter-cursed.png', 88),
('b-00002', 'Harry Potter and the Deathly Hallows', 'Fantasy', 'JK Rowling', 'Harry Potter and the Deathly Hallows is a fantasy novel written by British author J. K. Rowling and the seventh and final novel of the Harry Potter series. The book was released on 21 July 2007, ending the series that began in 1997 with the publication of Harry Potter and the Philosopher\'s Stone. It was published by Bloomsbury Publishing in the United Kingdom, in the United States by Scholastic, and in Canada by Raincoast Books. The novel chronicles the events directly following Harry Potter and the Half-Blood Prince (2005), and the final confrontation between the wizards Harry Potter and Lord Voldemort.', 21, 451, 'Original West End Production ', 20180101, 'harrypotter-deathly.png', 71),
('b-00003', 'The Maze Runner', 'Action', 'James Dashner', 'When Thomas wakes up in the lift, the only thing he can remember is his name. He is surrounded by strangers boys whose memories are also gone.\r\n   Outside the towering stone walls that surround them is a limitless, ever-changing maze. It is the only way out and no one has ever made it through alive.\r\n   Then a girl arrives. The first girl ever. And the message she delivers is terrifying: Remember. Survive. Run.', 24, 149, 'Paperback', 20180101, 'themazerunner01.png', 47),
('b-00004', 'The Scorch Trials (Maze Runner, Book 2)', 'Action', 'James Dashner', 'Thomas was sure that escape from the Maze would mean freedom for him and the Gladers. But WICKED is not done yet. Phase Two has just begun. The Scorch.\r\n   The Gladers have two weeks to cross through the Scorch, the most burned-out section of the world. And WICKED has made sure to adjust the variables and stack the odds against them.\r\n   There are others now. Their survival depends on the Gladers destruction and they are determined to survive.\r\n   Friendships will be tested. Loyalties will be broken. All bets are off. ', 24, 215, 'Paperback', 20180101, 'themazerunner02.png', 121),
('b-00005', 'The Death Cure (Maze Runner, Book Three)', 'Action', 'James Dashner', 'WICKED has taken everything from Thomas: his life, his memories, and now his only friends, the Gladers. But it is finally over. The trials are complete, after one final test.\r\n\r\nWhat WICKED does not know is that Thomas remembers far more than they think. And it is enough to prove that he cannot believe a word of what they say.\r\n\r\nThomas beat the Maze. He survived the Scorch. He will risk anything to save his friends. But the truth might be what ends it all.\r\n\r\nThe time for lies is over.', 24, 302, 'Paperback', 20180101, 'themazerunner03.png', 5),
('b-00006', 'The 5th Wave: The First Book of the 5th Wave Series', 'Sci-Fi', 'Rick Yancey', 'After the 1st wave, only darkness remains. After the 2nd, only the lucky escape. And after the 3rd, only the unlucky survive. After the 4th wave, only one rule applies: trust no one.\r\n\r\nNow, it\'s the dawn of the 5th wave, and on a lonely stretch of highway, Cassie runs from Them. The beings who only look human, who roam the countryside killing anyone they see. Who have scattered Earth\'s last survivors. To stay alone is to stay alive, Cassie believes, until she meets Evan Walker. Beguiling and mysterious, Evan Walker may be Cassie\'s only hope for rescuing her brother--or even saving herself. But Cassie must choose: between trust and despair, between defiance and surrender, between life and death. To give up or to get up.', 20, 89, 'Paperback', 20180101, 'the5thwave.png', 184),
('b-00007', 'The Infinite Sea: The Second Book of the 5th Wave', 'Sci-Fi', 'Rick Yancey', 'How do you rid the Earth of seven billion humans? Rid the humans of their humanity.\r\n\r\nSurviving the first four waves was nearly impossible. Now Cassie Sullivan finds herself in a new world, a world in which the fundamental trust that binds us together is gone. As the 5th Wave rolls across the landscape, Cassie, Ben, and Ringer are forced to confront the Others ultimate goal: the extermination of the human race.\r\n\r\nCassie and her friends have not seen the depths to which the Others will sink, nor have the Others seen the heights to which humanity will rise, in the ultimate battle between life and death, hope and despair, love and hate.', 22, 105, 'Paperback', 20180101, 'the5thwave02.png', 114),
('b-00008', 'The Last Star: The Final Book of The 5th Wave', 'Sci-Fi', 'Rick Yancey', 'The enemy is Other. The enemy is us. They are down here, they are up there, they are nowhere. They want the Earth, they want us to have it. They came to wipe us out, they came to save us.\r\n\r\nBut beneath these riddles lies one truth: Cassie has been betrayed. So has Ringer. Zombie. Nugget. And all 7.5 billion people who used to live on our planet. Betrayed first by the Others, and now by ourselves.\r\n\r\nIn these last days, Earths remaining survivors will need to decide what is more important: saving themselves ... or saving what makes us human.', 22, 115, 'Paperback', 20180101, 'the5thwave03.png', 130),
('b-00009', 'The Da Vinci Code', 'Mystery', 'Dan Brown', 'The Da Vinci Code is a 2003 mystery thriller novel by Dan Brown. It follows symbologist Robert Langdon and cryptologist Sophie Neveu after a murder in the Louvre Museum in Paris causes them to become involved in a battle between the Priory of Sion and Opus Dei over the possibility of Jesus Christ having been a companion to Mary Magdalene.\r\n\r\nThe title of the novel refers to the finding of the first murder victim in the Grand Gallery of the Louvre, naked and posed similar to Leonardo da Vinci\'s famous drawing, the Vitruvian Man, with a cryptic message written beside his body and a pentagram drawn on his chest in his own blood.\r\n\r\nThe novel explores an alternative religious history, whose central plot point is that the Merovingian kings of France were descended from the bloodline of Jesus Christ and Mary Magdalene, ideas derived from Clive Prince\'s The Templar Revelation (1997) and books by Margaret Starbird. The book also refers to The Holy Blood and the Holy Grail (1982) though Dan Brown has stated that it was not used as research material.\r\n\r\nThe Da Vinci Code provoked a popular interest in speculation concerning the Holy Grail legend and Mary Magdalene\'s role in the history of Christianity. The book has, however, been extensively denounced by many Christian denominations as an attack on the Roman Catholic Church, and consistently criticized for its historical and scientific inaccuracies.', 25, 597, 'Paperback', 20180101, 'thedavinccicode.png', 76),
('b-00010', 'Inferno', 'Mystery', 'Dan Brown', 'Harvard professor of symbology Robert Langdon awakens in an Italian hospital, disoriented and with no recollection of the past thirty-six hours, including the origin of the macabre object hidden in his belongings. With a relentless female assassin trailing them through Florence, he and his resourceful doctor, Sienna Brooks, are forced to flee. Embarking on a harrowing journey, they must unravel a series of codes, which are the work of a brilliant scientist whose obsession with the end of the world is matched only by his passion for one of the most influential masterpieces ever written, Dante Alighieri\'s The Inferno. ', 23, 624, 'Paperback', 20180101, 'inferno.png', 93),
('b-00011', 'Fifty Shades of Grey: Book One', 'Romance', 'E L James', 'When literature student Anastasia Steele goes to interview young entrepreneur Christian Grey, she encounters a man who is beautiful, brilliant, and intimidating. The unworldly, innocent Ana is startled to realize she wants this man and, despite his enigmatic reserve, finds she is desperate to get close to him. Unable to resist Ana\'s quiet beauty, wit, and independent spirit, Grey admits he wants her, too, but on his own terms.\r\n \r\nShocked yet thrilled by Grey\'s singular erotic tastes, Ana hesitates. For all the trappings of success, his multinational businesses, his vast wealth, his loving family. Grey is a man tormented by demons and consumed by the need to control. When the couple embarks on a daring, passionately physical affair, Ana discovers Christian Grey\'s secrets and explores her own dark desires.\r\n\r\nThis book is intended for mature audiences.', 18, 514, 'Vintage Books', 20180101, 'fiftyshadesofgrey01.png', 0),
('b-00012', 'Fifty Shades Darker', 'Romance', 'E L James', 'Daunted by the singular tastes and dark secrets of the beautiful, tormented young entrepreneur Christian Grey, Anastasia Steele has broken off their relationship to start a new career with a Seattle publishing house. \r\n \r\nBut desire for Christian still dominates her every waking thought, and when he proposes a new arrangement, Anastasia cannot resist. They rekindle their searing sensual affair, and Anastasia learns more about the harrowing past of her damaged, driven and demanding Fifty Shades.\r\n \r\nWhile Christian wrestles with his inner demons, Anastasia must confront the anger and envy of the women who came before her, and make the most important decision of her life.\r\n\r\nThis book is intended for mature audiences. ', 19, 544, 'Vintage Books', 20180101, 'fiftyshadesdarker.png', 158),
('b-00013', 'Fifty Shades Freed: Book Three of the Fifty Shades', 'Romance', 'E L James', 'When unworldly student Anastasia Steele first encountered the driven and dazzling young entrepreneur Christian Grey it sparked a sensual affair that changed both of their lives irrevocably. Shocked, intrigued, and, ultimately, repelled by Christian\'s singular erotic tastes, Ana demands a deeper commitment. Determined to keep her, Christian agrees.\r\n \r\nNow, Ana and Christian have it all, love, passion, intimacy, wealth, and a world of possibilities for their future. But Ana knows that loving her Fifty Shades will not be easy, and that being together will pose challenges that neither of them would anticipate. Ana must somehow learn to share Christian\'s opulent lifestyle without sacrificing her own identity. And Christian must overcome his compulsion to control as he wrestles with the demons of a tormented past.\r\n \r\nJust when it seems that their strength together will eclipse any obstacle, misfortune, malice, and fate conspire to make Ana\'s deepest fears turn to reality.\r\n\r\nThis book is intended for mature audiences.', 19, 592, 'Vintage Books', 20180101, 'fiftyshadesfreed.png', 108),
('b-00014', 'Dark Notes', 'Romance', 'Pam Godwin', 'They call me a slut. Maybe I am.\r\nSometimes I do things I despise.\r\nSometimes men take without asking.\r\n\r\nBut I have a musical gift, only a year left of high school, and a plan.\r\nWith one obstacle.\r\n\r\nEmeric Marceaux doesn\'t just take.\r\nHe seizes my will power and bangs it like a dark note.\r\nWhen he commands me to play, I want to give him everything.\r\nI kneel for his punishments, tremble for his touch, and risk it all for our stolen moments.\r\n\r\nHe\'s my obsession, my master, my music.\r\nAnd my teacher.', 50, 428, 'Pam Godwin', 20180101, 'darknotes.png', 170),
('b-00015', 'Dirty Ties', 'Romance', 'Pam Godwin', 'Revenge.\r\nI race to finance it.\r\nI evade to protect it.\r\nI kill to attain it.\r\nI planned everything.\r\n\r\nExcept her.\r\nThe alluring, curvaceous blonde at the finish line.\r\nWith sapphire eyes that cheat and lie.\r\nWhose powerful family murdered mine.\r\n\r\nI hate her.\r\nI want her.\r\n\r\nI know she\'s hiding something.\r\nBut so am I.', 24, 305, 'Pam Godwin', 20180101, 'dirtyties.png', 62),
('b-00016', 'Beneath the Burn', 'Romance', 'Pam Godwin', 'They meet by chance. The timing is wrong.\r\n\r\nThree years later, she finds him again, but their separation was poisoned with narcotics and bloodied by enslavement.\r\n\r\nHer freedom gambled away, Charlee Grosky escapes the international businessman who held her captive. But his power reaches beyond her protective barriers and threatens everyone she has come to love.\r\n\r\nJay Mayard wears his tortured secrets under his rock god facade. Drugs are his release, even as he seeks to be the man forged of the steel only she can see.\r\n\r\nIn a celebrity world filled with paparazzi, groupies, and drugs, Jay and Charlee must face their worst fears. When the battle is over, what will be left...Beneath The Burn.', 32, 484, 'Pam Godwin', 20180101, 'beneaththeburn.png', 196),
('b-00017', 'The Ones Who Got Away', 'Romance', 'Roni Loren', 'It\'s been twelve years since tragedy struck the senior class of Long Acre High School. Only a few students survived that fateful night?a group the media dubbed The Ones Who Got Away.\r\n\r\nLiv Arias thought she\'d never return to Long Acre?until a documentary brings her and the other survivors back home. Suddenly her old flame, Finn Dorsey, is closer than ever, and their attraction is still white-hot. When a searing kiss reignites their passion, Liv realizes this rough-around-the-edges cop might be exactly what she needs...\r\n\r\nLiv\'s words cut off as Finn got closer. The man approaching was nothing like the boy she\'d known. The bulky football muscles had streamlined into a harder, leaner package and the look in his deep green eyes held no trace of boyish innocence. ', 20, 384, 'Paperback', 20180101, 'theoneswhogotaway.png', 86),
('b-00018', 'Twilight (The Twilight Saga, Book 1)', 'Romance', 'Stephenie Meyer', 'Isabella Swan\'s move to Forks, a small, perpetually rainy town in Washington, could have been the most boring move she ever made. But once she meets the mysterious and alluring Edward Cullen, Isabella\'s life takes a thrilling and terrifying turn. Up until now, Edward has managed to keep his vampire identity a secret in the small community he lives in, but now nobody is safe, especially Isabella, the person Edward holds most dear. The lovers find themselves balanced precariously on the point of a knife-between desire and danger.Deeply romantic and extraordinarily suspenseful, Twilight captures the struggle between defying our instincts and satisfying our desires. This is a love story with bite.', 30, 544, 'Paperback', 20180101, 'twilightsaga01.png', 88),
('b-00019', 'New Moon (The Twilight Saga)', 'Romance', 'Stephenie Meyer', 'Legions of readers entranced by Twilight are hungry for more and they won\'t be disappointed. In New Moon, Stephenie Meyer delivers another irresistible combination of romance and suspense with a supernatural twist. The \"star-crossed\" lovers theme continues as Bella and Edward find themselves facing new obstacles, including a devastating separation, the mysterious appearance of dangerous wolves roaming the forest in Forks, a terrifying threat of revenge from a female vampire and a deliciously sinister encounter with Italy\'s reigning royal family of vampires, the Volturi. Passionate, riveting, and full of surprising twists and turns, this vampire love saga is well on its way to literary immortality.', 30, 563, 'Paperback', 20180101, 'newmoon.png', 112),
('b-00020', 'Eclipse (Twilight Sagas)', 'Romance', 'Stephenie Meyer', 'Readers captivated by Twilight and New Moon will eagerly devour the paperback edition Eclipse, the third book in Stephenie Meyer\'s riveting vampire love saga. As Seattle is ravaged by a string of mysterious killings and a malicious vampire continues her quest for revenge, Bella once again finds herself surrounded by danger. In the midst of it all, she is forced to choose between her love for Edward and her friendship with Jacob --- knowing that her decision has the potential to ignite the ageless struggle between vampire and werewolf. With her graduation quickly approaching, Bella has one more decision to make: life or death. But which is which?', 30, 640, 'Paperback', 20180101, 'twilighteclipse.png', 95),
('b-00021', 'Breaking Dawn (The Twilight Saga, Book 4)', 'Romance', 'Stephenie Meyer', 'When you loved the one who was killing you, it left you no options. How could you run, how could you fight, when doing so would hurt that beloved one? If your life was all you had to give, how could you not give it? If it was someone you truly loved?\r\n\r\nTo be irrevocably in love with a vampire is both fantasy and nightmare woven into a dangerously heightened reality for Bella Swan. Pulled in one direction by her intense passion for Edward Cullen, and in another by her profound connection to werewolf Jacob Black, a tumultuous year of temptation, loss, and strife have led her to the ultimate turning point. Her imminent choice to either join the dark but seductive world of immortals or to pursue a fully human life has become the thread from which the fates of two tribes hangs.\r\n\r\nNow that Bella has made her decision, a startling chain of unprecedented events is about to unfold with potentially devastating, and unfathomable, consequences. Just when the frayed strands of Bella\'s life-first discovered in Twilight, then scattered and torn in New Moon and Eclipse-seem ready to heal and knit together, could they be destroyed... forever?\r\n\r\nThe astonishing, breathlessly anticipated conclusion to the Twilight Saga, Breaking Dawn illuminates the secrets and mysteries of this spellbinding romantic epic that has entranced millions.', 35, 768, 'Paperback', 20180101, 'twilightbreakingdawn.png', 153),
('b-00022', 'Life and Death: Twilight Reimagined', 'Romance', 'Stephenie Meyer', '\r\nThere are two sides to every story....\r\n\r\nYou know Bella and Edward, now get to know Beau and Edythe.\r\n\r\nWhen Beaufort Swan moves to the gloomy town of Forks and meets the mysterious, alluring Edythe Cullen, his life takes a thrilling and terrifying turn. With her porcelain skin, golden eyes, mesmerizing voice, and supernatural gifts, Edythe is both irresistible and enigmatic.\r\n\r\nWhat Beau doesn\'t realize is the closer he gets to her, the more he is putting himself and those around him at risk. And, it might be too late to turn back....\r\n\r\nWith a foreword and afterword by Stephenie Meyer, this compelling reimagining of the iconic love story is a must-read for Twilight fans everywhere.', 25, 400, 'Paperback', 20180101, 'twilightlifeanddeath.png', 97),
('b-00023', 'Fantastic Beasts and Where to Find Them', 'Fantasy', 'JK Rowling', 'J.K. Rowling\'s screenwriting debut is captured in this exciting hardcover edition of the Fantastic Beasts and Where to Find Them screenplay.\r\n\r\nWhen Magizoologist Newt Scamander arrives in New York, he intends his stay to be just a brief stopover. However, when his magical case is misplaced and some of Newt\'s fantastic beasts escape, it spells trouble for everyone...\r\n\r\nFantastic Beasts and Where to Find Them marks the screenwriting debut of J.K. Rowling, author of the beloved and internationally bestselling Harry Potter books. Featuring a cast of remarkable characters, this is epic, adventure-packed storytelling at its very best.', 42, 304, 'Original West End Production ', 20180101, 'fantasticbeastandwheretofindthem.png', 106),
('b-00024', 'Awaken', 'Fantasy', 'Rachel Humphrey', 'Colin\'s favorite thing is to get lost in a good fantasy or sci-fi novel, but he never expected a free book gifted from a grizzled flea market owner to change his entire future within an hour after taking it out of the market. The giver of the book insists that Colin take good care of it--easier said than done when the book starts talking to you!\r\n\r\nBut talking books, even rude ones, should not exist. Not in the real world, at least. Unless the world they\'ve been living in isn\'t the real world, or the right one?\r\n\r\nBut for Colin, it\'s yet another day he has to rely on his twin sister to come to his rescue. But the book changes all that and gives Colin an incredible gift which he uses to stand up for himself, his friends, and much larger more frightening foe that should most definitely not exist in the real world.\r\n\r\nAnd just when they think things can\'t get any crazier or more unbelievable, and that life is about to return to wonderful (according to Meghan) and boring (according to Colin) old normalsville, a series of unbelievable events leads to an unfortunate and shocking twist, and the real fantasy adventure begins....', 24, 312, 'Jackal Lantern Books', 20180101, 'awaken.png', 99),
('b-00025', 'Origin', 'Mystery', 'Dan Brown', 'Robert Langdon, Harvard professor of symbology and religious iconology, arrives at the ultramodern Guggenheim Museum Bilbao to attend a major announcement—the unveiling of a discovery that \"will change the face of science forever.\" The evening’s host is Edmond Kirsch, a forty-year-old billionaire and futurist whose dazzling high-tech inventions and audacious predictions have made him a renowned global figure. Kirsch, who was one of Langdon’s first students at Harvard two decades earlier, is about to reveal an astonishing breakthrough... one that will answer two of the fundamental questions of human existence.', 28, 480, 'Doubleday', 20180101, 'origin.png', 170),
('b-00026', 'The Sacred Symbol: A Historical Conspiracy Mystery', 'Mystery', 'Paula Wynne', 'Ana-María de Carbonela must warn Christopher Columbus that his crew are planning a mutiny, but she is captured. When her Jewish tutor is caught and punished for rescuing her, she has a terrible decision to make. Can she save him and get to Columbus in time to reveal his crew’s betrayal? Or will she risk the death penalty for dressing as a man?', 18, 253, 'Doubleday', 20180101, 'thesacredsymbol.png', 82),
('b-00027', 'The Grotto\'s Secret: A Historical Conspiracy Mystery', 'Mystery', 'Paula Wynne', 'Castile de Granada, 1492: Risking her life, Spanish author Ana-María de Carbonela vowed to keep an unknown yet powerful healing herb’s location hidden. It remained a secret &hellip\r\n\r\nUntil now.\r\n\r\nTV show host Kelby Wade is forced into the search when her niece is targeted by the relentless assassin who killed her brother. She is pursued on a perilous quest, from a grotto in rural Andalusia to a bizarre hospital in Surrey, to uncover the mystery found between crumbling sheets of parchment in the ruins of a rural Spanish farm.\r\n\r\nIn a race against a conspiracy who want the herb’s power, she struggles to piece together the puzzle and follow the trail her brother left to trace the mysterious plant before the deadly conspirators locate it.\r\n\r\nIt’s only a matter of time before the ancient secret gets exposed ... ­', 18, 404, 'Doubleday', 20180101, 'theghettosecret.png', 51),
('b-00028', 'The Hunger Games', 'Action', 'Suzanne Collins', 'In the ruins of a place once known as North America lies the nation of Panem, a shining Capitol surrounded by twelve outlying districts. The Capitol is harsh and cruel and keeps the districts in line by forcing them all to send one boy and one girl between the ages of twelve and eighteen to participate in the annual Hunger Games, a fight to the death on live TV. Sixteen-year-old Katniss Everdeen, who lives alone with her mother and younger sister, regards it as a death sentence when she is forced to represent her district in the Games. But Katniss has been close to dead before - and survival, for her, is second nature. Without really meaning to, she becomes a contender. But if she is to win, she will have to start making choices that weigh survival against humanity and life against love.', 28, 384, 'Scholastic Press', 20180101, 'thehungergames.png', 75),
('b-00029', 'Catching Fire (The Hunger Games)', 'Action', 'Suzanne Collins', 'Against all odds, Katniss Everdeen has won the annual Hunger Games with fellow district tribute Peeta Mellark. But it was a victory won by defiance of the Capitol and their harsh rules. Katniss and Peeta should be happy. After all, they have just won for themselves and their families a life of safety and plenty. But there are rumors of rebellion among the subjects, and Katniss and Peeta, to their horror, are the faces of that rebellion. The Capitol is angry. The Capitol wants revenge.', 28, 391, 'Scholastic Press', 20180101, 'catchingfire.png', 36),
('b-00030', 'Mockingjay (The Hunger Games)', 'Action', 'Suzanne Collins', 'Against all odds, Katniss Everdeen has survived the Hunger Games twice. But now that she\'s made it out of the bloody arena alive, she\'s still not safe. The Capitol is angry. The Capitol wants revenge. Who do they think should pay for the unrest? Katniss. And what\'s worse, President Snow has made it clear that no one else is safe either. Not Katniss\'s family, not her friends, not the people of District 12. Powerful and haunting, this thrilling final installment of Suzanne Collins\'s groundbreaking The Hunger Games trilogy promises to be one of the most talked about books of the year.', 28, 391, 'Scholastic Press', 20180101, 'mockingjay.png', 140),
('b-00031', 'The Martian', 'Sci-Fi', 'Andy Weir', 'Six days ago, astronaut Mark Watney became one of the first people to walk on Mars.\r\n\r\nNow, he\'s sure he\'ll be the first person to die there.\r\n\r\nAfter a dust storm nearly kills him and forces his crew to evacuate while thinking him dead, Mark finds himself stranded and completely alone with no way to even signal Earth that he’s alive—and even if he could get word out, his supplies would be gone long before a rescue could arrive.\r\n\r\nChances are, though, he won\'t have time to starve to death. The damaged machinery, unforgiving environment, or plain-old \"human error\" are much more likely to kill him first.\r\n\r\nBut Mark isn\'t ready to give up yet. Drawing on his ingenuity, his engineering skills—and a relentless, dogged refusal to quit—he steadfastly confronts one seemingly insurmountable obstacle after the next. Will his resourcefulness be enough to overcome the impossible odds against him?', 21, 387, 'Paperback', 20180101, 'themartian.png', 195),
('b-00032', 'Artemis: A Novel', 'Sci-Fi', 'Andy Weir', 'Jasmine Bashara never signed up to be a hero. She just wanted to get rich.\r\n \r\nNot crazy, eccentric-billionaire rich, like many of the visitors to her hometown of Artemis, humanity’s first and only lunar colony. Just rich enough to move out of her coffin-sized apartment and eat something better than flavored algae. Rich enough to pay off a debt she’s owed for a long time.\r\n \r\nSo when a chance at a huge score finally comes her way, Jazz can’t say no. Sure, it requires her to graduate from small-time smuggler to full-on criminal mastermind. And it calls for a particular combination of cunning, technical skills, and large explosions—not to mention sheer brazen swagger. But Jazz has never run into a challenge her intellect can’t handle, and she figures she’s got the ‘swagger’ part down. ', 22, 320, 'Paperback', 20180101, 'artemis.png', 117);

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
(2, 'b-00003', 'jon', 'Average book with average storyline. Would say if it is in comic form, it will be better', 20180104),
(3, 'b-00005', 'jon', 'This book is definitely better than the first one. Very exciting and the plot twist at the end broke my heart haha', 20180104),
(4, 'b-00009', 'jon', 'Murder in the Louvre! Code in classic art! A conspiracy big enough to rewrite history!', 20180105),
(5, 'b-00009', 'test', 'Perfect book when you are bored or want something to think about. Very absorbing ', 20180105),
(6, 'b-00009', 'admin', 'Entertaining book, lets your imagination run wild. Totally recommend it!!', 20180105),
(7, 'b-00010', 'admin', 'Dan Brown has raised the bar yet again, combining classical Italian art, history, and literature with cutting-edge science in this sumptuously entertaining thriller.', 20180105),
(8, 'b-00003', 'hrx', 'This book is quite boring, not worth the money and time', 20180105),
(10, 'b-00011', 'admin', 'First, let me say I liked this series, hence the 4 star review. It wasnt perfect, but it was worth the price of admission.', 20180109),
(11, 'b-00012', 'jon', 'I really wish I could manually add a 6th star for this book. I never would have believed it was possible, but Fifty Shades Darker is even better than Fifty Shades of Grey. Hard to believe, but true.', 20180109),
(12, 'b-00005', 'admin', 'haha', 20180202),
(14, 'b-00002', 'random', 'Best book among the Harry Potter series', 20180204),
(15, 'b-00002', 'jon', 'Definitely!! The suspense is killing me, urging all potter fans to read this!!', 20180204),
(16, 'b-00002', 'testing01', 'Worth the money and time, totally recommend it', 20180204);

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
(10, 'b-00003', 'hrx', 1, 20180105),
(11, 'b-00007', 'admin', 3, 20180109),
(12, 'b-00011', 'admin', 5, 20180109),
(13, 'b-00002', 'random', 5, 20180204),
(14, 'b-00002', 'testing01', 5, 20180204);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `transactionID` varchar(255) NOT NULL,
  `transactionUser` varchar(255) NOT NULL,
  `transactionTotal` int(255) NOT NULL,
  `transactionPoint` int(11) NOT NULL,
  `transactionDiscount` int(5) NOT NULL DEFAULT '0',
  `transactionCard` int(11) NOT NULL,
  `transactionDate` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`transactionID`, `transactionUser`, `transactionTotal`, `transactionPoint`, `transactionDiscount`, `transactionCard`, `transactionDate`) VALUES
('admin-20180202143642', 'admin', 24, 0, 0, 12345678, '2018-02-02 14:36'),
('admin-20180203064602', 'admin', 130, 0, 0, 12345678, '2018-02-03 06:46'),
('admin-20180203080630', 'admin', 21, 0, 0, 12345678, '2018-02-03 08:06'),
('admin-20180203163506', 'admin', 14, 140, 10, 12345678, '2018-02-03 16:35'),
('admin-20180204021454', 'admin', 19, 190, 0, 12345678, '2018-02-04 02:14'),
('jon-20180203101859', 'jon', 87, 870, 0, 12345678, '2018-02-03 10:18');

-- --------------------------------------------------------

--
-- Table structure for table `transactiondetail`
--

CREATE TABLE `transactiondetail` (
  `index` int(11) NOT NULL,
  `transactionID` varchar(255) NOT NULL,
  `bookISBN` varchar(255) NOT NULL,
  `quantity` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactiondetail`
--

INSERT INTO `transactiondetail` (`index`, `transactionID`, `bookISBN`, `quantity`) VALUES
(8, 'admin-20180202143642', 'b-00005', 1),
(9, 'admin-20180203064602', 'b-00014', 2),
(10, 'admin-20180203064602', 'b-00020', 1),
(12, 'admin-20180203080630', 'b-00002', 1),
(17, 'jon-20180203101859', 'b-00002', 3),
(18, 'jon-20180203101859', 'b-00024', 1),
(19, 'admin-20180203163506', 'b-00004', 1),
(20, 'admin-20180204021454', 'b-00013', 1);

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
  `address` text NOT NULL,
  `status` varchar(30) NOT NULL DEFAULT 'member',
  `points` int(11) NOT NULL DEFAULT '0',
  `registerdate` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `fname`, `lname`, `email`, `password`, `gender`, `pnumber`, `birthday`, `address`, `status`, `points`, `registerdate`) VALUES
('admin', 'admin', 'admin', 'jon_law98@hotmail.com', 'adk6oNRwypFwA', 'female', '0000000', '0001-01-01', 'Jalan Teknologi 5, Taman Teknologi Malaysia, 57000 Kuala Lumpur, Wilayah Persekutuan Kuala Lumpur', 'member', 8930, 20171209),
('hrx', 'Rui Xiang', 'Ho', 'rui.xiang@cloudmails.apu.edu.my', 'hrfk8UNEv60po', 'male', '0123456789', '2018-01-01', '', 'member', 0, 20180105),
('jon', 'Jonathan', 'Law', 'jonathan.law@cloudmails.apu.edu.my', 'jo1g3w0zpe932', 'male', '0166443602', '1998-04-15', '1600 Pennsylvania Ave NW, Washington, DC 20500, USA', 'member', 870, 20171209),
('random', 'Random', 'User', 'random@email.com', 'raNORnCQ19QG2', 'female', '0123456789', '2011-01-11', '64000 Sepang, Selangor', 'member', 0, 20180204),
('test', 'admin', '', 'admin@TPM', 'teCcXDQBWYvL6', 'male', '0000000', '0001-01-01', '', 'member', 0, 20171217),
('testing01', 'TestingAccount', 'One', 'testing@test.test', 'tesGeyALKYm3A', 'male', '0123456789', '2018-01-15', '', 'restricted', 0, 20180130);

-- --------------------------------------------------------

--
-- Table structure for table `userfeedbackrating`
--

CREATE TABLE `userfeedbackrating` (
  `userfeedbackID` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `ratingID` int(11) NOT NULL,
  `feedbackrated` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userfeedbackrating`
--

INSERT INTO `userfeedbackrating` (`userfeedbackID`, `username`, `ratingID`, `feedbackrated`) VALUES
(1, 'admin', 3, 'veryuseful'),
(2, 'admin', 12, 'useless'),
(3, 'admin', 10, 'veryuseful'),
(5, 'jon', 12, 'useless'),
(6, 'admin', 11, 'veryuseful'),
(7, 'admin', 14, 'veryuseful'),
(8, 'random', 10, 'veryuseful'),
(9, 'testing01', 14, 'veryuseful'),
(10, 'random', 14, 'veryuseful'),
(11, 'random', 15, 'veryuseful');

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
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`transactionID`);

--
-- Indexes for table `transactiondetail`
--
ALTER TABLE `transactiondetail`
  ADD PRIMARY KEY (`index`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `userfeedbackrating`
--
ALTER TABLE `userfeedbackrating`
  ADD PRIMARY KEY (`userfeedbackID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookcomment`
--
ALTER TABLE `bookcomment`
  MODIFY `ratingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `bookrating`
--
ALTER TABLE `bookrating`
  MODIFY `ratingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `transactiondetail`
--
ALTER TABLE `transactiondetail`
  MODIFY `index` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `userfeedbackrating`
--
ALTER TABLE `userfeedbackrating`
  MODIFY `userfeedbackID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
