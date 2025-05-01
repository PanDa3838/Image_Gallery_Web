-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2025 at 10:44 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `image_gallery`
--

-- --------------------------------------------------------

--
-- Table structure for table `image_gallery`
--

CREATE TABLE `image_gallery` (
  `Image_ID` int(11) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `File_Name` varchar(255) NOT NULL,
  `Uploaded_At` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `image_gallery`
--

INSERT INTO `image_gallery` (`Image_ID`, `Title`, `File_Name`, `Uploaded_At`, `user_id`) VALUES
(1, '1', 'first.jpg', '2025-05-01 19:24:53', 4),
(2, '2', 'second.jpg', '2025-05-01 19:25:08', 4),
(3, '3', 'third.jpg', '2025-05-01 19:25:16', 4),
(4, '4', '4.jpg', '2025-05-01 19:25:25', 4),
(5, '5', '5.jpg', '2025-05-01 19:25:32', 4),
(6, '6', '6.jpg', '2025-05-01 19:35:05', 4),
(7, '7', '7.jpg', '2025-05-01 19:35:13', 4),
(8, '8', '8.jpg', '2025-05-01 19:35:21', 4);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `email`, `password`) VALUES
(3, 'Karim_Mersal', 'k-h-m99@hotmail.com', '$2y$10$daBpyBLBUzJYKPqr6U3DTexUDKduvGOipbX1N1VERjB1/m6NtEH56'),
(4, 'yasmin Awod', 'yasmin@gmail.com', '$2y$10$v42DW4j69.vzbgDgzg83GeX4NIUX/7oGQIr5suPqcHr5IM9Pz3hky'),
(5, 'Karim_Hossam', 'karimmersal2004@gmail.com', '$2y$10$ZjgBVbrcSQXEVJybBpw5auJtOlZidUWgrePxtgFl7QkBuh6Z6XSkC'),
(6, 'KarimMersal', 'karimmersal20@gmail.com', '$2y$10$u2nBR3jZYY4eAeSJd5/qEuAMuthETfD4kbJUnTbBs7ZxQibubR2/2'),
(7, 'karimHossamElDin', 'karimmersal@gmail.com', '$2y$10$GW0MURXtWv/TbKja4K0Tp.aSKcXPaMpoeK/GclvHLtZ.l0yoQAli.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `image_gallery`
--
ALTER TABLE `image_gallery`
  ADD PRIMARY KEY (`Image_ID`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `image_gallery`
--
ALTER TABLE `image_gallery`
  MODIFY `Image_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `image_gallery`
--
ALTER TABLE `image_gallery`
  ADD CONSTRAINT `image_gallery_fk` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
