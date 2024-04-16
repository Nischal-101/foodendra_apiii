-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2024 at 02:53 PM
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
-- Database: `foodendra`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(24) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(24) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `api_tokens`
--

CREATE TABLE `api_tokens` (
  `id` int(5) NOT NULL,
  `user_id` int(5) NOT NULL,
  `token` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `api_tokens`
--

INSERT INTO `api_tokens` (`id`, `user_id`, `token`) VALUES
(1, 4, '180247d470062cbdcf858789dae6e336'),
(2, 4, '5a72fa9f6c4cf0e9385758280b0bbcfa'),
(3, 8, 'f892bf74a12cd8c66f0e8f68ceb8f94b'),
(4, 8, '2326ec2867517166204ea84c08e91986'),
(5, 8, 'ea62f022573a2a634d851f2333226937'),
(6, 10, 'd107883a6b69a71f49ebaaa9de1e7e40');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `restaurant_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `user_id`, `restaurant_id`, `item_id`) VALUES
(2, 10, 1, 11),
(4, 4, 3, 14),
(5, 4, 3, 15),
(6, 4, 3, 16);

-- --------------------------------------------------------

--
-- Table structure for table `menuitem`
--

CREATE TABLE `menuitem` (
  `item_id` int(11) NOT NULL,
  `restaurant_id` int(11) DEFAULT NULL,
  `name` varchar(24) NOT NULL,
  `description` varchar(200) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL,
  `food_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menuitem`
--

INSERT INTO `menuitem` (`item_id`, `restaurant_id`, `name`, `description`, `price`, `category`, `food_image`) VALUES
(11, 1, 'Pepperoni Pizza', 'Classic pizza with pepperoni', 9.99, 'food', 'Food_image/pepperoni.jpg\r\n'),
(12, 1, 'Margherita Pizza', 'Fresh mozzarella, basil, and tomatoes', 8.99, 'food', 'Food_image/Margherita_Pizza.jpeg'),
(13, 2, 'Double Cheeseburger', 'Two beef patties with cheese', 7.99, 'food', 'Food_image/Double_cheeseburger.jpeg'),
(14, 2, 'Chicken Sandwich', 'Grilled chicken breast with lettuce and tomato', 6.99, 'food', 'Food_image/chicken_sandwich.jpg'),
(15, 3, 'Taco Combo', 'Three tacos with rice and beans', 10.99, 'food', 'Food_image/taco_combo.jpg'),
(16, 3, 'Quesadilla', 'Cheese and chicken quesadilla', 8.99, 'food', 'Food_image/quesadilla.jpg'),
(17, 4, 'Sushi Platter', 'Assorted sushi rolls', 14.99, 'food', 'Food_image/sushi_platter.jpg'),
(18, 4, 'Sashimi', 'Fresh slices of raw fish', 12.99, 'food', 'Food_image/sashimi.jpeg'),
(19, 5, 'Pulled Pork Sandwich', 'Slow-cooked pulled pork on a bun', 8.99, 'food', '\r\nFood_image/BBQ-Pulled-Pork-1.jpg'),
(20, 5, 'Brisket Plate', 'Tender smoked brisket with sides', 12.99, 'food', 'Food_image/Brisket_plate.jpg'),
(21, 1, 'Coffee', 'Freshly brewed coffee', 2.50, 'beverages', 'Beverage_image/coffee.jpg'),
(22, 1, 'Tea', 'Assorted tea varieties', 2.00, 'beverages', 'Beverage_image/tea.jpg'),
(23, 2, 'Cola', 'Refreshing cola drink', 1.75, 'beverages', 'Beverage_image/cola.jpg'),
(24, 2, 'Orange Juice', '100% fresh orange juice', 3.00, 'beverages', 'Beverage_image/orange_juice.jpg'),
(25, 3, 'Iced Tea', 'Chilled iced tea', 2.25, 'beverages', 'Beverage_image/iced_tea.jpeg'),
(26, 4, 'Lemonade', 'Homemade lemonade', 2.50, 'beverages', 'Beverage_image/lemonade.jpg'),
(27, 5, 'Milkshake', 'Creamy milkshake', 4.00, 'beverages', 'Beverage_image/milkshake.jpg'),
(28, 5, 'Water', 'Bottled water', 1.00, 'beverages', 'Beverage_image/water.jpg'),
(29, 4, 'Hot Chocolate', 'Rich and creamy hot chocolate', 3.50, 'beverages', 'Beverage_image/hot_chocolate.jpg'),
(30, 4, 'Smoothie', 'Fresh fruit smoothie', 4.50, 'beverages', 'Beverage_image/smoothie.jpg'),
(31, 5, 'Cheesecake', 'Classic New York style cheesecake', 5.99, 'dessert', 'Dessert_image/cheesecake.jpg'),
(32, 5, 'Chocolate Cake', 'Decadent chocolate cake', 4.99, 'dessert', 'Dessert_image/chocolate_cake.jpg'),
(33, 4, 'Apple Pie', 'Homemade apple pie served with ice cream', 6.49, 'dessert', 'Dessert_image/apple_pie.jpg'),
(34, 4, 'Tiramisu', 'Traditional Italian tiramisu', 6.99, 'dessert', 'Dessert_image/Tiramisu.jpg'),
(35, 3, 'Brownie Sundae', 'Warm brownie topped with ice cream and hot fudge', 7.49, 'dessert', 'Dessert_image/brownie.jpeg'),
(36, 3, 'Fruit Tart', 'Assorted fresh fruits on a pastry crust', 5.49, 'dessert', ''),
(37, 2, 'Creme Brulee', 'Classic French custard with a caramelized sugar topping', 6.99, 'dessert', ''),
(38, 2, 'Key Lime Pie', 'Tangy key lime pie with a graham cracker crust', 5.99, 'dessert', ''),
(39, 1, 'Panna Cotta', 'Italian dessert made with cream and gelatin', 5.49, 'dessert', ''),
(40, 1, 'Banana Split', 'Classic banana split with three scoops of ice cream', 7.99, 'dessert', '');

-- --------------------------------------------------------

--
-- Table structure for table `orderitem`
--

CREATE TABLE `orderitem` (
  `order_item_id` int(11) NOT NULL,
  `food_item_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `subtotal` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orderitem`
--

INSERT INTO `orderitem` (`order_item_id`, `food_item_id`, `quantity`, `subtotal`) VALUES
(1, 11, 2, 1499.00),
(2, 12, 1, 899.00),
(3, 13, 3, 2100.00),
(4, 14, 2, 1898.00),
(5, 15, 1, 1250.00),
(6, 16, 4, 3200.00),
(7, 17, 2, 2499.00),
(8, 18, 3, 2700.00),
(9, 19, 1, 999.00),
(10, 20, 2, 1698.00);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `restaurant_id` int(11) DEFAULT NULL,
  `order_item_id` int(11) DEFAULT NULL,
  `total_amount` decimal(10,2) DEFAULT NULL,
  `order_date` datetime DEFAULT current_timestamp(),
  `delivery_address` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `payment_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `payment_method` varchar(50) DEFAULT NULL,
  `transaction_id` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `rating_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `restaurant_id` int(11) DEFAULT NULL,
  `rating_value` int(11) DEFAULT NULL,
  `rating_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`rating_id`, `user_id`, `restaurant_id`, `rating_value`, `rating_date`) VALUES
(1, 2, 5, 5, '2024-03-25 16:47:54'),
(2, 2, 1, 5, '2023-03-25 12:30:00'),
(3, 3, 2, 4, '2023-03-24 18:45:00'),
(4, 4, 3, 4, '2023-03-23 20:15:00'),
(5, 5, 4, 4, '2023-03-22 15:00:00'),
(6, 2, 5, 5, '2023-03-21 13:20:00'),
(7, 3, 1, 4, '2023-03-20 11:45:00'),
(8, 4, 2, 4, '2023-03-19 17:30:00'),
(9, 5, 3, 5, '2023-03-18 19:00:00'),
(10, 2, 4, 4, '2023-03-17 14:15:00'),
(11, 3, 5, 4, '2023-03-16 10:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE `restaurant` (
  `restaurant_id` int(11) NOT NULL,
  `name` varchar(24) NOT NULL,
  `description` varchar(24) DEFAULT NULL,
  `address` varchar(52) DEFAULT NULL,
  `phone_number` varchar(10) DEFAULT NULL,
  `restaurant_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`restaurant_id`, `name`, `description`, `address`, `phone_number`, `restaurant_image`) VALUES
(1, 'Pizza Palace', 'Best pizza in town', '789 Oak St, Anytown, USA', '5551234567', ''),
(2, 'Burger Barn', 'Home of the famous doubl', '321 Maple St, Anytown, USA', '5559876543', ''),
(3, 'Taco Town', 'Authentic Mexican cuisin', '456 Elm St, Anytown, USA', '5551112222', ''),
(4, 'Sushi Spot', 'Fresh sushi made to orde', '123 Main St, Anytown, USA', '5553334444', ''),
(5, 'BBQ Joint', 'Slow-cooked BBQ favorite', '654 Pine St, Anytown, USA', '5555555555', '');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `review_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `restaurant_id` int(11) DEFAULT NULL,
  `review_text` varchar(120) DEFAULT NULL,
  `review_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(24) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(100) NOT NULL,
  `address` varchar(24) DEFAULT NULL,
  `phone_number` varchar(10) DEFAULT NULL,
  `type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `email`, `password`, `address`, `phone_number`, `type`) VALUES
(2, 'nischal', 'nischal1@gmail.com', '$2y$10$Q3e3sV6WDSaZ23tc4', NULL, '1234567890', 'customer'),
(3, 'nischal', 'nischal0@gmail.com', '$2y$10$Xq2KobUTe6J6k0/Mj', NULL, '1234567890', 'customer'),
(4, 'nischal', 'nischal2@gmail.com', '$2y$10$fgBQaq0OWzQbpaY8M7flKe/g/ZcFxZxxLGrVDoCL6aOZX/tDOR1YC', NULL, '1234567890', 'customer'),
(5, 'nischal', 'nischal0@gmail.com', 'nischal', 'pokhara', '9876543212', 'customer'),
(6, '[value-2]', '[value-3]', '[value-4]', '[value-5]', '[value-6]', '[value-7]'),
(7, '', '', '', '', '', ''),
(8, 'nischal101', 'nischal101@gmail.com', '$2y$10$zeljbaEgXNGJ2CL0qe0biuFRXkLF3j8aeTgNtUZ3B6jeAp2wSuv/6', 'pokhara', '1234567890', 'customer'),
(9, 'nischal1', 'nischal123@gmail.com', '$2y$10$pHew/aqpfIJVyggSgUamtO56rHcy8E3spaR17UJhv1GArtIMBdYB2', 'pokhara', '1234567890', 'customer'),
(10, 'abc123', 'abc@gmail.com', '$2y$10$d4DRXwvYjA7oyD0uK536HuifTBc3WZaSdUBsTzZYHSMVij92Katre', 'pokhara 12', '1234567890', 'customer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `api_tokens`
--
ALTER TABLE `api_tokens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `restaurant_id` (`restaurant_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `menuitem`
--
ALTER TABLE `menuitem`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `restaurant_id` (`restaurant_id`);

--
-- Indexes for table `orderitem`
--
ALTER TABLE `orderitem`
  ADD PRIMARY KEY (`order_item_id`),
  ADD KEY `item_id` (`food_item_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `restaurant_id` (`restaurant_id`),
  ADD KEY `order_item_id` (`order_item_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`rating_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `restaurant_id` (`restaurant_id`);

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`restaurant_id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `restaurant_id` (`restaurant_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `api_tokens`
--
ALTER TABLE `api_tokens`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `menuitem`
--
ALTER TABLE `menuitem`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `orderitem`
--
ALTER TABLE `orderitem`
  MODIFY `order_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `rating_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `restaurant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurant` (`restaurant_id`),
  ADD CONSTRAINT `cart_ibfk_3` FOREIGN KEY (`item_id`) REFERENCES `menuitem` (`item_id`);

--
-- Constraints for table `menuitem`
--
ALTER TABLE `menuitem`
  ADD CONSTRAINT `menuitem_ibfk_1` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurant` (`restaurant_id`);

--
-- Constraints for table `orderitem`
--
ALTER TABLE `orderitem`
  ADD CONSTRAINT `orderitem_ibfk_1` FOREIGN KEY (`food_item_id`) REFERENCES `menuitem` (`item_id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurant` (`restaurant_id`),
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`order_item_id`) REFERENCES `orderitem` (`order_item_id`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `rating_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `rating_ibfk_2` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurant` (`restaurant_id`);

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurant` (`restaurant_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
