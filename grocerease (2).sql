-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 22, 2023 at 03:59 PM
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
-- Database: `grocerease`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_table`
--

CREATE TABLE `admin_table` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `admin_email` varchar(200) NOT NULL,
  `admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_table`
--

INSERT INTO `admin_table` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(6, 'Rabin', 'mishrarabin92@gmail.com', '$2y$10$wVzsXqHa.dFIg/Z4QxWVHOTYCqg3x4F.jN2upNnSfbZlEgKfTGsRy');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(11) NOT NULL,
  `brand_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(1, 'Frutiopia'),
(2, 'VegiVista'),
(3, 'Tokla Tea'),
(4, 'DDC Milk'),
(5, 'Bennevis'),
(6, 'ABC Butchers'),
(7, 'Himalayan Java Coffee'),
(8, 'NepSweet'),
(9, 'Swastik');

-- --------------------------------------------------------

--
-- Table structure for table `cart_details`
--

CREATE TABLE `cart_details` (
  `product_id` int(11) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `quantity` int(100) NOT NULL,
  `subtotal` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_title`) VALUES
(1, 'Fruits'),
(2, 'Vegetables'),
(3, 'Tea And Coffee'),
(4, 'Dairy Products'),
(5, 'Ice-Cream'),
(7, 'Meat and Eggs'),
(8, 'Sweetner');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_title` varchar(100) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `product_keywords` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `product_image1` varchar(255) NOT NULL,
  `product_image2` varchar(255) NOT NULL,
  `product_image3` varchar(255) NOT NULL,
  `product_image4` varchar(255) NOT NULL,
  `product_price` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_title`, `product_description`, `product_keywords`, `category_id`, `brand_id`, `product_image1`, `product_image2`, `product_image3`, `product_image4`, `product_price`, `date`, `status`) VALUES
(1, 'Shimla Apple, 1kg', 'The apple is a round, sweet or tart fruit, often enjoyed fresh or used in various culinary dishes.', 'Apple,Fruits,Fruitopia,Syau,', 1, 1, 'apple.jpg', 'green apples.jpg', 'moreApples.jpg', 'apple.jpg', '270', '2023-09-21 03:47:16', 'true'),
(2, 'Banana Malbok, 1dozen', 'Bananas are sweet, yellow fruits, widely enjoyed for their convenience and nutritional value.', 'Banana,Fruits,Fruitopia,Kera', 1, 1, 'banana1doz.jpg', 'banana2.jpg', 'banana.jpg', 'banana1.jpg', '165', '2023-09-21 03:43:32', 'true'),
(3, 'Bitter Gourd(Karela), 1kg', 'Bitter gourd is a green, bitter-tasting vegetable used in Asian cuisine, known for potential health benefits.', 'Bitter Gourd.Karela,Vegetables,VegiVista', 2, 2, 'bitterGourdimg.jpg', 'bittergourd.jpg', 'blackBittergourd.jpg', 'bitterGourdimg.jpg', '120', '2023-09-21 03:48:23', 'true'),
(4, 'Capsicum ,1kg', 'Capsicum, also known as bell pepper or sweet pepper, is a colorful and mildly flavored vegetable often used in cooking and salads.', 'Capsicum,Vegetables,VegiVista', 2, 2, 'greenCapsicum.png', 'capsicum.jpg', 'redCapsicum.jpg', 'greenCapsicum.png', '100', '2023-09-21 03:51:14', 'true'),
(5, 'Eggs(pack of 30)', 'Eggs are nutritious, versatile, and widely consumed food items', 'Eggs,Meat And Eggs,ABC Butchers,Aanda', 7, 6, 'egg.jpg', 'aanda2.webp', 'aanda1.webp', 'egg.jpg', '580', '2023-09-21 03:54:33', 'true'),
(7, 'Tokla Tea Jar,500gm', 'Tea is a popular beverage made by steeping dried tea leaves in hot water, enjoyed for its diverse flavors and potential health benefits.', 'Tokla Tea,Tea,Tea And Coffee', 3, 3, 'toklaTea500g.jpg', 'toklaTea500g.jpg', 'toklaTea500g.jpg', 'toklaTea500g.jpg', '320', '2023-09-21 04:06:05', 'true'),
(8, 'Himalayan Java Coffee - Everest Roast, 250 gms', 'Coffee is a beloved beverage made from roasted coffee beans, known for its rich, stimulating flavor and caffeine content.', 'Tea And Coffee,Himalayan Java Coffee,Coffee,HJC,Everest Roast', 3, 7, 'HJCEverestRoast.jpg', 'coffeeBeans.jpg', 'coffeeLogo.jpg', 'evestRoast.png', '825', '2023-09-21 04:07:47', 'true'),
(9, 'Salad Tomato, 1Kg', ' Tomato is a red, juicy fruit widely used in cooking and salads, known for its fresh, slightly sweet taste.', 'Salad Tomato,Tomato,Vegetables,VegiVista,Tamatar', 2, 2, 'tomato.jpg', 'tomatoes.jpg', 'tomatoimg.jpg', 'tomato.jpg', '140', '2023-09-21 04:10:31', 'true'),
(10, 'DDC Standard Milk (Blue), 500ml', 'Milk is a white, nutrient-rich liquid produced by mammals, commonly consumed for its high calcium and protein content.', 'DDC Milk,Milk,Dairy Products,Dudh', 4, 4, 'ddcMilk.jpg', 'ddcMilk1.jpg', 'milkDDc.jpg', 'ddcMilk.jpg', '50', '2023-09-21 04:13:45', 'true'),
(11, 'Dalley Khursani, 1kg', ' Dalley Khursani, also known as \"round chili\" or \"Nepali round chili,\" is a small, round, and extremely spicy chili pepper commonly used in Nepali cuisine to add heat and flavor to dishes.', 'Dalley Khursani,Chilli,Vegetables,VegiVista,Khursani', 2, 2, 'dalleKhursani.jpg', 'dalleKhursani2.jpg', 'dalleKhursani1.jpg', 'dalleKhursani2.jpg', '380', '2023-09-21 04:17:50', 'true'),
(13, 'Sugar, 1kg', ' Sugar is a sweet, crystalline substance, often derived from sugar cane or sugar beets, used to sweeten foods and beverages.', 'Sugar,Chini,Swetner,NepSweet', 8, 8, 'sugar.jpg', 'suagrImg.jpg', 'sugarrrrImg.jpg', 'sugar.jpg', '120', '2023-09-21 04:27:30', 'true'),
(14, 'Swastik Vanaspati Ghee, 1kg', 'Ghee is a type of clarified butter commonly used in Indian and Middle Eastern cuisines, known for its rich, nutty flavor and high cooking tolerance.', 'Swastik Vanaspati Ghee,Ghee,Dairy Products,Swastik', 4, 9, 'ghee.jpg', 'swastikGhee.webp', 'GHEE12345.jpg', 'swastikghee123.jpg', '210', '2023-09-21 04:33:59', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_image` varchar(255) NOT NULL,
  `user_ip` varchar(100) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `user_mobile` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`user_id`, `username`, `user_email`, `user_password`, `user_image`, `user_ip`, `user_address`, `user_mobile`) VALUES
(5, 'Rabin Mishra', 'mishrarabin92@gmail.com', '$2y$10$j/zWAu5Jjr/axk1r/xUk.eUmRdxzyEWQH0fgmHxgI/Esh4cXiVuHq', 'pic-3.png', '::1', 'Phidim -1-Panchthar', '9824059780');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_table`
--
ALTER TABLE `admin_table`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart_details`
--
ALTER TABLE `cart_details`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_table`
--
ALTER TABLE `admin_table`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
