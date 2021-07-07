-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2021 at 07:20 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(3) NOT NULL,
  `book_name` varchar(255) NOT NULL,
  `book_image` varchar(100) DEFAULT NULL,
  `book_author_name` varchar(100) NOT NULL,
  `book_publication_name` varchar(40) NOT NULL,
  `book_purchase_date` varchar(20) NOT NULL,
  `book_price` varchar(100) NOT NULL,
  `book_quantity` int(5) NOT NULL,
  `available_quantity` int(5) NOT NULL,
  `libarian_username` varchar(100) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `book_name`, `book_image`, `book_author_name`, `book_publication_name`, `book_purchase_date`, `book_price`, `book_quantity`, `available_quantity`, `libarian_username`, `datetime`) VALUES
(7, 'about me', '20210701114948.png', 'rony', 'Adorsho prokashoni', '2021-07-08', '250', 10, 9, 'rony1234', '2021-07-01 21:49:48'),
(8, 'Biology', '20210701115153.jpg', 'Dr.alfred', 'Adorsho', '2021-07-30', '500.00', 20, 20, 'rony1234', '2021-07-01 21:51:53'),
(9, 'PHP', '20210703070021.jpg', 'admin', 'Adorsho prokashoni', '2021-07-14', '250', 5, 5, 'rony1234', '2021-07-03 17:00:21');

-- --------------------------------------------------------

--
-- Table structure for table `issue_book`
--

CREATE TABLE `issue_book` (
  `id` int(3) NOT NULL,
  `student_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `book_issue_date` varchar(30) NOT NULL,
  `book_return_date` varchar(91) NOT NULL,
  `datetime` timestamp(3) NOT NULL DEFAULT current_timestamp(3)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `issue_book`
--

INSERT INTO `issue_book` (`id`, `student_id`, `book_id`, `book_issue_date`, `book_return_date`, `datetime`) VALUES
(1, 11, 8, '03-07-2021', '05-07-2021', '2021-07-03 16:50:21.833'),
(3, 11, 9, '03-07-2021', '05-07-2021', '2021-07-03 17:00:45.655'),
(4, 12, 9, '03-07-2021', '03-07-2021', '2021-07-03 17:55:34.412'),
(5, 11, 7, '03-07-2021', '05-07-2021', '2021-07-03 17:56:32.177'),
(6, 11, 7, '03-07-2021', '03-07-2021', '2021-07-03 19:27:07.218'),
(7, 11, 9, '05-07-2021', '05-07-2021', '2021-07-05 19:07:38.132'),
(8, 12, 7, '05-07-2021', '05-07-2021', '2021-07-05 19:08:09.628'),
(9, 11, 7, '05-07-2021', '', '2021-07-05 19:21:46.330');

-- --------------------------------------------------------

--
-- Table structure for table `libarian`
--

CREATE TABLE `libarian` (
  `id` int(3) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(91) NOT NULL,
  `password` varchar(20) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `libarian`
--

INSERT INTO `libarian` (`id`, `first_name`, `last_name`, `email`, `username`, `password`, `datetime`) VALUES
(1, 'Rony', 'khan', 'rony@gmail.com', 'rony1234', '1234', '2021-06-27 19:55:28');

-- --------------------------------------------------------

--
-- Table structure for table `studests`
--

CREATE TABLE `studests` (
  `id` int(3) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `roll` int(11) NOT NULL,
  `registration` int(11) NOT NULL,
  `email` varchar(20) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(20) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `studests`
--

INSERT INTO `studests` (`id`, `first_name`, `last_name`, `roll`, `registration`, `email`, `username`, `password`, `phone`, `image`, `status`, `datetime`) VALUES
(11, 'shariful', 'Islam', 120759, 123456, 'info@htrstudio.com', 'sharif1234', '123456', '01630916514', NULL, 1, '2021-06-25 19:20:17'),
(12, 'Rony', ' Islam', 242353, 123458, 'rony2@gmail.com', 'rony1234', '123123', '01578496245', NULL, 1, '2021-07-02 14:22:52'),
(15, 'Rony2 ', ' Islam', 242352, 123452, 'rony22@gmail.com', 'rony12234', '123122', '01578496245', NULL, 1, '2021-07-02 14:22:52'),
(16, 'shariful2', 'Islam', 120759, 123456, 'info1@htrstudio.com', 'sharif12234', '123456', '01630916514', NULL, 1, '2021-06-25 19:20:17'),
(19, 'shariful22', 'Islam', 120759, 123456, 'info12@htrstudio.com', 'sharif122234', '123456', '01630916514', NULL, 1, '2021-06-25 19:20:17'),
(20, 'shariful4', 'Islam', 120758, 123457, 'info13@htrstudio.com', 'sharif3234', '123456', '01630916514', NULL, 1, '2021-06-25 19:20:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `issue_book`
--
ALTER TABLE `issue_book`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `libarian`
--
ALTER TABLE `libarian`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `emai` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `studests`
--
ALTER TABLE `studests`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `issue_book`
--
ALTER TABLE `issue_book`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `libarian`
--
ALTER TABLE `libarian`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `studests`
--
ALTER TABLE `studests`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
