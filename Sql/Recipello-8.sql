-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 23, 2023 at 09:10 PM
-- Wersja serwera: 10.4.28-MariaDB
-- Wersja PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `recipello`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `product_category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `name`, `product_category_id`) VALUES
(1, 'Farfalle', 10),
(2, 'Spaghetti', 10),
(3, 'Fettuccine', 10),
(4, 'Pappardelle', 10),
(5, 'Fusilli', 10),
(6, 'Ribs', 4),
(7, 'Chicken drums', 4),
(8, 'Turkey drums', 4),
(9, 'Chicken wings', 4),
(10, 'Chicken breast', 4),
(11, 'Ham', 4),
(12, 'Salami', 4),
(13, 'Minced beef', 4),
(14, 'Minced pork', 4),
(35, 'Asparagus', 2),
(36, 'Beetroot', 2),
(37, 'Bell pepper', 2),
(38, 'Broccoli', 2),
(39, 'Cabbage', 2),
(40, 'Lettuce', 2),
(41, 'Carrot', 2),
(42, 'Corn', 2),
(43, 'Cucumber', 2),
(44, 'Cauliflower', 2),
(45, 'Eggplant', 2),
(46, 'Mushroom', 2),
(47, 'Onion', 2),
(48, 'Peas', 9),
(49, 'Potato', 2),
(50, 'Pumpkin', 2),
(51, 'Radish', 2),
(52, 'Sweet potato', 2),
(53, 'Tomato', 3),
(54, 'Zucchini', 2),
(55, 'Apple', 3),
(56, 'Avocado', 3),
(57, 'Banana', 3),
(58, 'Blackberry', 3),
(59, 'Blueberry', 3),
(60, 'Cherry', 3),
(61, 'Grape', 3),
(62, 'Fig', 3),
(63, 'Coconut', 3),
(64, 'Lemon', 3),
(65, 'Lime', 3),
(66, 'Mango', 3),
(67, 'Orange', 3),
(68, 'Peach', 3),
(69, 'Pineapple', 3),
(70, 'Strawberry', 3),
(71, 'Watermelon', 3),
(72, 'Pear', 3),
(73, 'Almonds', 8),
(74, 'Hazelnuts', 8),
(95, 'Peanuts', 8),
(96, 'Pistachio', 4),
(97, 'Sunflower seeds', 8),
(98, 'Walnuts', 8),
(99, 'clove', 1),
(100, 'Cumin', 1),
(101, 'Garlic', 1),
(102, 'Cardamon', 1),
(103, 'Black pepper', 1),
(104, 'Salt', 1),
(105, 'Chili powder', 1),
(106, 'Baking soda', 1),
(107, 'Turmenic', 1),
(108, 'Thyme', 1),
(109, 'Rosemary', 1),
(110, 'Mustard', 1),
(111, 'Tomato sauce', 1),
(112, 'Mayo', 1),
(113, 'Cinamon', 1),
(114, 'Green pesto', 1),
(115, 'Curry powder', 1),
(116, 'Salmon', 7),
(117, 'Tuna', 7),
(118, 'Oyster', 7),
(119, 'Octopus', 7),
(120, 'Shrimps', 7),
(121, 'Squid', 7),
(122, 'Oat milk', 5),
(123, 'Cow milk', 5),
(124, 'Almond milk', 5),
(125, 'Coconut milk', 5),
(126, 'Rice milk', 5),
(127, 'Basmati rice', 10),
(128, 'Buns', 10),
(129, 'Jasmin rice', 10),
(130, 'White rice', 10),
(131, 'Sushi rice', 10),
(132, 'Eggs', 5),
(133, 'Butter', 6),
(134, 'Vegetable oil', 6),
(135, 'Bacon', 4);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `prod_cat` (`product_category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `prod_cat` FOREIGN KEY (`product_category_id`) REFERENCES `product_category` (`product_category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
