-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 12, 2024 at 02:58 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `MovieRatingWebsite`
--

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `movie_id` int(11) UNSIGNED NOT NULL,
  `movie_name` varchar(255) NOT NULL DEFAULT '',
  `movie_year` int(4) NOT NULL,
  `movie_rating` varchar(10) NOT NULL DEFAULT '',
  `movie_bio` varchar(255) DEFAULT NULL,
  `movie_img` varchar(200) NOT NULL,
  `movie_trailer` varchar(255) DEFAULT NULL,
  `genre` varchar(255) DEFAULT NULL,
  `content_type` enum('movie','webseries') NOT NULL DEFAULT 'movie'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`movie_id`, `movie_name`, `movie_year`, `movie_rating`, `movie_bio`, `movie_img`, `movie_trailer`, `genre`, `content_type`) VALUES
(1, 'The Matrix', 1999, '8.7', 'A computer hacker learns about the true nature of reality and his role in the war against its controllers.', 'assets/img/matrix.PNG', 'https://www.youtube.com/watch?v=vKQi3bBA1y8', 'Action', 'movie'),
(2, 'Pacific Rim', 2013, 'PG-13', 'Giant robots fight giant monsters in Japan.', 'assets/img/pacificRim.jpg', 'https://youtu.be/5guMumPFBag?si=GEzskm1wVLc_nx17 ', 'Sci-Fi', 'movie'),
(3, 'Dazed and Confused', 1993, 'PG-13', 'A bunch friends enjoy their last day of highschool.', 'assets/img/dazedConfused.jpg', NULL, 'Comedy', 'movie'),
(4, 'Batman & Robin', 1997, 'PG', 'The worst Batman movie, ever...', 'assets/img/batmanRobin.jpg', NULL, 'Action', 'movie'),
(5, 'District 9', 2009, 'R', 'A man has an unexpected surprise when he visits an alien slum in Johannesburg, South Africa.', 'assets/img/district9.jpg', NULL, 'Sci-Fi', 'movie'),
(6, 'Kalki 2898 AD', 2024, 'PG', 'It is an movie based on Hindu Mythological books and the future predicted on these books what will happen in the future of mankind and before the end of the world.', 'assets/img/Kalki 2898.JPG', 'https://youtu.be/kQDd1AhGIHk?si=psAttCKh3rMRfUND', 'Sci-Fi', 'movie'),
(8, 'Inception', 2010, '8.8', 'A thief who steals corporate secrets through the use of dream-sharing technology is given the inverse task of planting an idea into the mind of a CEO.', 'assets/img/Inception.JPG', 'https://www.youtube.com/watch?v=YoHD9XEInc0', 'Sci-Fi', 'movie'),
(12, 'The Witcher', 2019, 'TV-MA', 'Geralt of Rivia, a solitary monster hunter, struggles to find his place in a world where people often prove more wicked than beasts.', 'assets/web_img/TheWitcher.jpg', 'https://www.youtube.com/watch?v=ndl1W4ltcmg', 'Fantasy', 'webseries'),
(13, 'Stranger Things', 2016, 'TV-14', 'A group of kids in a small town encounter strange occurrences and uncover government secrets, leading them into a supernatural mystery.', 'assets/web_img/StrangerThings.jpg', 'https://www.youtube.com/watch?v=b9EkMc79ZSU', 'Sci-Fi', 'webseries'),
(14, 'Breaking Bad', 2008, 'TV-MA', 'A high school chemistry teacher turned methamphetamine manufacturer partners with a former student to secure his family\'s future.', 'assets/web_img/BreakingBad.jpg', 'https://www.youtube.com/watch?v=HhesaQXLuRY', 'Crime, Drama', 'webseries'),
(15, 'The Mandalorian', 2019, 'TV-14', 'A lone bounty hunter makes his way through the outer reaches of the galaxy, far from the authority of the New Republic.', 'assets/web_img/TheMandalorian.jpg', 'https://www.youtube.com/watch?v=aOC8E8z_ifw', 'Action, Adventure, Sci-Fi', 'webseries'),
(16, 'Game of Thrones', 2011, 'TV-MA', 'Nine noble families fight for control over the lands of Westeros, while an ancient enemy returns after being dormant for millennia.', 'assets/web_img/GameofThrones.jpg', 'https://www.youtube.com/watch?v=gcTkNV5Vg1E', 'Fantasy, Drama', 'webseries'),
(17, 'Black Mirror', 2011, 'TV-MA', 'An anthology series exploring a twisted, high-tech multiverse where humanity\'s greatest innovations and darkest instincts collide.', 'assets/web_img/BlackMirror.jpg', 'https://www.youtube.com/watch?v=2bVik34nWws', 'Drama, Sci-Fi, Thriller', 'webseries'),
(18, 'The Crown', 2016, 'TV-MA', 'Follows the political rivalries and romance of Queen Elizabeth II\'s reign and the events that shaped the second half of the 20th century.', 'assets/web_img/TheCrown.jpg', 'https://www.youtube.com/watch?v=JWtnJjn6ng0', 'Biography, Drama, History', 'webseries'),
(19, 'The Boys', 2019, 'TV-MA', 'A group of vigilantes set out to take down corrupt superheroes who abuse their superpowers.', 'assets/web_img/TheBoys.jpg', 'https://www.youtube.com/watch?v=M0u8C08bWI0', 'Action, Comedy, Crime', 'webseries'),
(20, 'Money Heist', 2017, 'TV-MA', 'A criminal mastermind who goes by \"The Professor\" plans the biggest heist in recorded history—to print billions of euros in the Royal Mint of Spain.', 'assets/web_img/MoneyHeist.jpg', 'https://www.youtube.com/watch?v=p_PJbmrX4uk', 'Action, Crime, Drama', 'webseries'),
(21, 'The Umbrella Academy', 2019, 'TV-14', 'A dysfunctional family of superheroes comes together to solve the mystery of their father\'s death, the threat of the apocalypse, and more.', 'assets/web_img/TheUmbrellaAcademy.jpg', 'https://www.youtube.com/watch?v=0DAmWHxeoKw', 'Action, Adventure, Comedy', 'webseries'),
(22, 'Chernobyl', 2019, 'TV-MA', 'A dramatization of the true story of one of the worst man-made catastrophes in history, the nuclear accident in Chernobyl, Soviet Union.', 'assets/web_img/Chernobyl.jpg', 'https://www.youtube.com/watch?v=s9APLXM9Ei8', 'Drama, History, Thriller', 'webseries'),
(23, 'Westworld', 2016, 'TV-MA', 'Set at the intersection of the near future and the reimagined past, explore a world in which every human appetite can be indulged without consequence.', 'assets/web_img/WestWorld.jpg', 'https://www.youtube.com/watch?v=64CYajemh6E', 'Drama, Mystery, Sci-Fi', 'webseries'),
(24, 'Narcos', 2015, 'TV-MA', 'A chronicled look at the criminal exploits of Colombian drug lord Pablo Escobar, as well as the many other drug lords who plagued the country through the years.', 'assets/web_img/Narcos.jpg', 'https://www.youtube.com/watch?v=U7elNhHwgBU', 'Biography, Crime, Drama', 'webseries'),
(25, 'Dark', 2017, 'TV-MA', 'A family saga with a supernatural twist, set in a German town where the disappearance of two young children exposes the relationships among four families.', 'assets/web_img/Dark.jpg', 'https://www.youtube.com/watch?v=rrwycJ08PSA', 'Crime, Drama, Mystery', 'webseries'),
(26, 'The Handmaid\'s Tale', 2017, 'TV-MA', 'Set in a dystopian future, a woman is forced to live as a concubine under a fundamentalist theocratic dictatorship.', 'assets/web_img/TheHandmaid\'sTale.jpg', 'https://www.youtube.com/watch?v=PJTonrzXTJs', 'Drama, Sci-Fi, Thriller', 'webseries');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `review_id` int(11) UNSIGNED NOT NULL,
  `review_movie_id` int(11) UNSIGNED NOT NULL,
  `review_user_id` int(11) UNSIGNED NOT NULL,
  `review_rating` int(11) NOT NULL,
  `review_content` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`review_id`, `review_movie_id`, `review_user_id`, `review_rating`, `review_content`) VALUES
(9, 2, 40, 2, 'gh'),
(10, 1, 40, 1, 'no'),
(11, 1, 40, 3, 'nice movie');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) UNSIGNED NOT NULL,
  `user_name` varchar(50) NOT NULL DEFAULT '',
  `user_full_name` varchar(150) NOT NULL DEFAULT '',
  `user_email` varchar(255) NOT NULL DEFAULT '',
  `user_password` varchar(255) NOT NULL DEFAULT '',
  `user_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_full_name`, `user_email`, `user_password`, `user_role`) VALUES
(38, 'admin', 'Admin 1', 'admin@admin.com', 'admin', 1),
(39, 'test', 'Test', 'test@test.com', 'test', 2),
(40, 'ShankarSingh', 'Shankar singh', 'thakurishankar159@gmail.com', '1234', 2),
(41, 'TestUser', 'BioIdentity Locks', 'testuser@gmail.com', 'testuser', 2),
(42, 'ShankarSingh', 'Shankar singh', 'thakurishankar159@gmail.com', 'shankarsingh', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`movie_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `users_foreign_key` (`review_user_id`),
  ADD KEY `movies_foreign_key` (`review_movie_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `movie_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `movies_foreign_key` FOREIGN KEY (`review_movie_id`) REFERENCES `movies` (`movie_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_foreign_key` FOREIGN KEY (`review_user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
