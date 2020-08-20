-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 20, 2020 at 06:24 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `libms`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(20) NOT NULL,
  `coursename` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `coursename`) VALUES
(1, 'Bsc IT'),
(2, 'Software Engineer '),
(3, 'MultiMedia'),
(4, 'Computer Science ');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `pid` int(50) NOT NULL,
  `pname` varchar(50) NOT NULL,
  `details` longtext NOT NULL,
  `category_id` int(20) NOT NULL,
  `dateofpost` date NOT NULL,
  `uid` int(100) NOT NULL,
  `quantity` int(10) NOT NULL,
  `author` varchar(50) NOT NULL,
  `cost` int(20) NOT NULL,
  `dateofadd` date NOT NULL,
  `remaining` int(50) UNSIGNED NOT NULL,
  `primary_photo` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pid`, `pname`, `details`, `category_id`, `dateofpost`, `uid`, `quantity`, `author`, `cost`, `dateofadd`, `remaining`, `primary_photo`) VALUES
(1, 'Time', 'agag', 1, '2020-06-04', 1, 1, 'egg', 100, '2020-06-04', 1, 'null'),
(2, 'Heal', 'heal book\n', 1, '2020-06-04', 1, 1, 'ram', 1500, '2020-02-04', 1, 'null'),
(3, 'Cognitive Science', 'understanding the science of human cognitive.', 1, '2020-06-08', 1, 10, 'Alan Turing', 1500, '2020-06-05', 10, 'null'),
(4, 'hawkins', 'ht-9009', 1, '2020-08-11', 2, 1, 'hawkins', 1500, '2020-08-11', 1, '/LibMS/upload-files/uploads/4/20200810214709821325476.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `image_id` int(100) NOT NULL,
  `image_name` varchar(150) NOT NULL,
  `pid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`image_id`, `image_name`, `pid`) VALUES
(1, '/LibMS/upload-files/uploads/4/20200810214709821325476.jpg', 4),
(2, '/LibMS/upload-files/uploads/4/202008102147092064170573.jpg', 4);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `sid` int(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `facultyid` int(20) NOT NULL,
  `semesterid` int(20) NOT NULL,
  `phoneno` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `photo` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`sid`, `name`, `facultyid`, `semesterid`, `phoneno`, `email`, `address`, `gender`, `photo`) VALUES
(1, 'Parash Gurung', 4, 0, '9898989898', 'pgrg117@gmail.com', 'ktm', 'male', 'LibMS/upload-stdphoto/uploads/1.jpg'),
(2, 'Santosh Subedi', 2, 0, '9898989876', 'subedi.santosh@gmail.com', 'ktm', 'male', 'LibMS/upload-stdphoto/uploads/2.jpg'),
(5, 'Sita Rai', 1, 0, '2828282828', 'sita@gmail.com', 'pkr', 'female', 'n'),
(13, 'cucuc', 1, 1, '+9775', 'ccuf', '85.3548745, 27.7752969', 'Male', 'nothing'),
(14, 'fghh', 1, 1, '+9775668', 'dthjj', '85.3548725, 27.7752926', 'Male', 'nothing'),
(15, 'cjcucu', 1, 1, '+9864315677', 'fff', '85.35486299999998, 27.7752397', 'Male', 'LibMS/upload-stdphoto/uploads/15.jpg'),
(16, 'iffuf', 1, 1, '+558585977', 'lhigohof', '85.354863, 27.7752397', 'Male', 'LibMS/upload-stdphoto/uploads/16.jpg'),
(17, 'ifucufcuf', 1, 1, '+978685824256867', 'uchchcc', '85.354877, 27.7753025', 'Female', 'LibMS/upload-stdphoto/uploads/17.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `student_book_rel`
--

CREATE TABLE `student_book_rel` (
  `sbid` int(50) NOT NULL,
  `pid` int(50) NOT NULL,
  `sid` int(50) NOT NULL,
  `dateoflend` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(100) NOT NULL,
  `dateofbirth` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `name`, `email`, `address`, `gender`, `username`, `password`, `dateofbirth`) VALUES
(1, 'Paras Gurung', 'pgrg117@gmail.com', 'ktm', 'Male', 'pgrg', '1898fce9e795060b230cd447ff5af730', '1997-06-02'),
(2, 'Parash Grg', 'pgrg@gmail.com', 'ktm', 'Male', 'hells', '7bd3027c6375e8e56f019a6800a344ad', '2012-08-04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pid`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`image_id`),
  ADD KEY `pid` (`pid`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`sid`),
  ADD UNIQUE KEY `phoneno` (`phoneno`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `course` (`facultyid`);

--
-- Indexes for table `student_book_rel`
--
ALTER TABLE `student_book_rel`
  ADD PRIMARY KEY (`sbid`),
  ADD KEY `pid` (`pid`),
  ADD KEY `sid` (`sid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `pid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `image_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `sid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `student_book_rel`
--
ALTER TABLE `student_book_rel`
  MODIFY `sbid` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `users` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `products` (`pid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`facultyid`) REFERENCES `course` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_book_rel`
--
ALTER TABLE `student_book_rel`
  ADD CONSTRAINT `student_book_rel_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `products` (`pid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_book_rel_ibfk_2` FOREIGN KEY (`sid`) REFERENCES `students` (`sid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
