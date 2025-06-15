-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 15, 2025 at 03:52 PM
-- Server version: 8.4.0
-- PHP Version: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(255) NOT NULL,
  `statuss` tinyint NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `cat_name`, `statuss`) VALUES
(1, 'Man', 0),
(2, 'Woman', 0),
(10, 'Kid', 1),
(11, 'Watch', 1),
(12, 'Shoes', 1),
(13, 'shoess', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `contact_id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `text` varchar(500) NOT NULL,
  PRIMARY KEY (`contact_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`contact_id`, `first_name`, `last_name`, `email`, `text`) VALUES
(2, 'Srey', 'Pich', 'Pia@gmail.com', 'Hi'),
(3, 'Srey', 'Pich', 'Pia@gmail.com', 'Hi'),
(4, 'Srey', 'Pich', 'Pia@gmail.com', 'Hi');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `address` text,
  `city` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `postcode` varchar(20) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `payment_method` varchar(50) DEFAULT NULL,
  `order_total` decimal(10,2) DEFAULT NULL,
  `order_status` varchar(50) DEFAULT 'Pending',
  `order_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `first_name`, `last_name`, `email`, `phone`, `address`, `city`, `state`, `postcode`, `country`, `payment_method`, `order_total`, `order_status`, `order_date`) VALUES
(1, 'Srey', 'Pich', 'sb-si1cx35274879@business.example.com', '089677599', 'Kambol Phnom Penh', 'Phnom Penh', 'sdf', '12101', 'Cambodia', 'Cheque', 750.00, 'Pending', '2025-06-08 10:17:03'),
(2, 'Srey', 'Pich', 'sb-si1cx35274879@business.example.com', '089677599', 'Kambol Phnom Penh', 'Phnom Penh', 'sdf', '12101', 'Cambodia', 'Cheque', 750.00, 'Pending', '2025-06-08 10:20:13'),
(3, 'Srey', 'Pich', 'sb-si1cx35274879@business.example.com', '0963746054', 'Kambol Phnom Penh', 'Phnom Penh', 'sdf', '12101', 'Cambodia', 'Cheque', 750.00, 'Pending', '2025-06-08 10:20:23'),
(4, 'Srey', 'Pich', 'sb-si1cx35274879@business.example.com', '0963746054', 'Kambol Phnom Penh', 'Phnom Penh', 'sdf', '12101', 'Cambodia', 'Cheque', 750.00, 'Pending', '2025-06-08 10:21:38'),
(5, 'Srey', 'Pich', 'sb-si1cx35274879@business.example.com', '0963746054', 'Kambol Phnom Penh', 'Phnom Penh', 'sdf', '12101', 'Cambodia', 'Cheque', 750.00, 'Pending', '2025-06-08 10:21:45'),
(6, 'Srey', 'Pich', 'sb-si1cx35274879@business.example.com', '0963746054', 'Kambol Phnom Penh', 'Phnom Penh', 'sdf', '12101', 'Cambodia', 'Cheque', 750.00, 'Pending', '2025-06-08 10:22:33'),
(7, 'Srey', 'Pich', 'sb-si1cx35274879@business.example.com', '089677599', 'Kambol Phnom Penh', 'Phnom Penh', 'sddddd', '12101', 'Cambodia', 'Cheque', 750.00, 'Pending', '2025-06-08 10:22:54'),
(8, 'Srey', 'Pich', 'sb-si1cx35274879@business.example.com', '089677599', 'Kambol Phnom Penh', 'Phnom Penh', 'sdf', '12101', 'Cambodia', 'Cheque', 750.00, 'Pending', '2025-06-08 10:27:42'),
(9, 'John', 'Doe', 'sb-si1cx35274879@business.example.com', '4087837037', 'Texas Texas', 'Texas', 'were', '75462', 'Cambodia', 'PayPal', 750.00, 'Pending', '2025-06-08 10:28:24'),
(10, 'Srey', 'Pich', 'sb-si1cx35274879@business.example.com', '089677599', 'Kambol Phnom Penh', 'Phnom Penh', 'sdf', '12101', 'Cambodia', 'Cheque', 0.00, 'Pending', '2025-06-08 11:21:21'),
(11, 'Srey', 'Pich', 'sb-si1cx35274879@business.example.com', '089677599', 'Kambol Phnom Penh', 'Phnom Penh', 'sdf', '12101', 'Cambodia', 'Cheque', 0.00, 'Pending', '2025-06-08 11:21:38'),
(12, 'Srey', 'Pich', 'sb-si1cx35274879@business.example.com', '089677599', 'Kambol Phnom Penh', 'Phnom Penh', 'sdf', '12101', 'Cambodia', 'Cheque', 750.00, 'Pending', '2025-06-08 20:32:15'),
(13, 'Srey', 'Pich', 'sb-si1cx35274879@business.example.com', '089677599', 'Kambol Phnom Penh', 'Phnom Penh', 'sdf', '12101', 'Cambodia', 'Cheque', 750.00, 'Pending', '2025-06-08 20:34:11'),
(14, 'John', 'Doe', 'sb-si1cx35274879@business.example.com', '4087837037', 'Texas Texas', 'Texas', 'sdf', '75462', 'Cambodia', 'Cheque', 750.00, 'Pending', '2025-06-08 20:34:21'),
(15, 'John', 'Doe', 'sb-si1cx35274879@business.example.com', '4087837037', 'Texas Texas', 'Texas', 'sdf', '75462', 'Cambodia', 'Cheque', 750.00, 'Pending', '2025-06-08 20:36:46'),
(16, 'John', 'Doe', 'sb-si1cx35274879@business.example.com', '4087837037', 'Texas Texas', 'Texas', 'sdf', '75462', 'Cambodia', 'Cheque', 750.00, 'Pending', '2025-06-08 20:36:54'),
(17, 'John', 'Doe', 'sb-si1cx35274879@business.example.com', '4087837037', 'Texas Texas', 'Texas', 'sdf', '75462', 'Cambodia', 'Cheque', 750.00, 'Pending', '2025-06-08 20:37:04'),
(18, 'John', 'Doe', 'sb-si1cx35274879@business.example.com', '4087837037', 'Texas Texas', 'Texas', 'sdf', '75462', 'Cambodia', 'Cheque', 750.00, 'Pending', '2025-06-08 20:37:10');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

DROP TABLE IF EXISTS `order_items`;
CREATE TABLE IF NOT EXISTS `order_items` (
  `item_id` int NOT NULL AUTO_INCREMENT,
  `order_id` int DEFAULT NULL,
  `product_id` int DEFAULT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`item_id`),
  KEY `order_id` (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `p_id` int NOT NULL AUTO_INCREMENT,
  `category_name` varchar(100) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `MRP` int NOT NULL,
  `price` decimal(10,1) NOT NULL,
  `qty` int NOT NULL,
  `img` varchar(255) NOT NULL,
  `desciption` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `statuss` varchar(100) NOT NULL,
  PRIMARY KEY (`p_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`p_id`, `category_name`, `product_name`, `MRP`, `price`, `qty`, `img`, `desciption`, `statuss`) VALUES
(9, '2', 'Buttons tweed blazer', 1, 59.0, 15, 'product-1.jpg', 'ad', '1'),
(10, '1', 'Flowy striped skirt', 1, 49.0, 50, 'product-2.jpg', 'abc', '1'),
(11, '2', 'Cotton T-Shirt', 2, 31.0, 50, 'product-3.jpg', 'product', '1'),
(12, '1', 'Slim striped pocket shirt', 55, 59.0, 50, 'product-4.jpg', 'for man', '1'),
(13, '1', 'Fit micro corduroy shirt', 45, 40.0, 50, 'product-5.jpg', 'man', '1'),
(14, '2', 'Tropical Kimono', 49, 45.0, 50, 'product-6.jpg', 'woman', '1'),
(15, '2', 'Contrasting sunglasses', 50, 45.0, 50, 'product-7.jpg', 'woman', '1'),
(16, '1', 'Water resistant backpack', 49, 45.0, 60, 'product-8.jpg', 'man', '1');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1, 'admin', 'admin@gmail.com', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `user_register`
--

DROP TABLE IF EXISTS `user_register`;
CREATE TABLE IF NOT EXISTS `user_register` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_register`
--

INSERT INTO `user_register` (`id`, `name`, `email`, `password`) VALUES
(1, 'Srey Pich', 'Pia2@gmail.com', '$2y$10$/6QSWBN1Drqe02HGTl3k1OcRTQPnI1eBUewAu3OR2IMppG3MCe606'),
(2, 'Srey Pich', 'Pia@gmail.com', '$2y$10$dlidZQoRuyQGtT2aBr0ks.pqLfGLiGEKPJpwtcI351XG/Q8qgIxPu');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
