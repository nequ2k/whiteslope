-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 19, 2023 at 11:26 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Recipello`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`) VALUES
(1, 'Vegan'),
(2, 'Italian'),
(3, 'Spanish'),
(4, 'French'),
(5, 'English'),
(6, 'German'),
(7, 'Polish'),
(8, 'Mediterranean'),
(9, 'Asian'),
(10, 'Indian'),
(11, 'Turkish'),
(12, 'Japanese'),
(13, 'American'),
(14, 'Chinese'),
(15, 'Pacific'),
(16, 'Thai'),
(17, 'Korean'),
(18, 'African'),
(19, 'Irish'),
(20, 'Scandinavian'),
(21, 'Sushi'),
(22, 'Burgers'),
(23, 'Pizza'),
(24, 'Dessert');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset`
--

CREATE TABLE `password_reset` (
  `password_reset_id` int(11) NOT NULL,
  `password_reset_email` longtext NOT NULL,
  `password_reset_token` longtext NOT NULL,
  `password_reset_expires` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `rating_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `recipe_id` int(11) NOT NULL,
  `rating` decimal(3,1) DEFAULT NULL CHECK (`rating` between 1.0 and 5.0)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`rating_id`, `user_id`, `recipe_id`, `rating`) VALUES
(1, 1, 1, '4.0'),
(2, 1, 2, '4.5'),
(3, 1, 6, '5.0'),
(4, 1, 7, '2.0');

-- --------------------------------------------------------

--
-- Table structure for table `Recipes`
--

CREATE TABLE `Recipes` (
  `recipe_id` int(11) NOT NULL,
  `title` longtext NOT NULL,
  `isVegan` tinyint(1) NOT NULL,
  `likesHot` tinyint(1) NOT NULL,
  `time` double NOT NULL,
  `ingredients` longtext NOT NULL,
  `user_id` int(11) NOT NULL,
  `methodOfPrep` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Recipes`
--

INSERT INTO `Recipes` (`recipe_id`, `title`, `isVegan`, `likesHot`, `time`, `ingredients`, `user_id`, `methodOfPrep`) VALUES
(1, 'Spaghetti Aglio e Olio', 0, 1, 30, 'spaghetti, garlic, olive oil, red pepper flakes, parsley', 1, ''),
(2, 'Paella', 0, 1, 60, 'rice, chicken, shrimp, bell peppers, saffron', 2, ''),
(3, 'Croissant', 0, 0, 120, 'flour, butter, sugar, yeast, salt', 3, ''),
(4, 'Fish and Chips', 0, 1, 45, 'fish fillets, potatoes, flour, beer, tartar sauce', 4, ''),
(5, 'Bratwurst with Sauerkraut', 0, 0, 60, 'bratwurst, sauerkraut, onions, mustard', 5, ''),
(6, 'Pierogi', 0, 1, 90, 'dough, potatoes, cheese, onions, butter', 6, ''),
(7, 'Caprese Salad', 1, 1, 15, 'tomatoes, mozzarella, basil, olive oil, balsamic vinegar', 1, ''),
(8, 'Pad Thai', 1, 1, 30, 'rice noodles, tofu, peanuts, bean sprouts, tamarind sauce', 2, ''),
(9, 'Chana Masala', 1, 1, 45, 'chickpeas, tomatoes, onions, spices, cilantro', 3, ''),
(10, 'Turkish Kebab', 0, 1, 60, 'lamb, onions, yogurt, pita bread, spices', 4, ''),
(11, 'Sushi Rolls', 0, 1, 60, 'sushi rice, nori, fish, vegetables, soy sauce', 5, ''),
(12, 'Cheeseburger', 0, 1, 30, 'beef patty, cheese, lettuce, tomato, bun', 6, ''),
(13, 'Margherita Pizza', 0, 1, 45, 'pizza dough, tomato sauce, mozzarella cheese, basil', 1, ''),
(14, 'Crème Brûlée', 0, 0, 90, 'heavy cream, sugar, eggs, vanilla, caramelized sugar', 2, ''),
(15, 'Kimchi Fried Rice', 1, 1, 30, 'rice, kimchi, vegetables, soy sauce, fried egg', 3, ''),
(16, 'Jollof Rice', 0, 1, 60, 'rice, tomatoes, onions, peppers, spices', 4, ''),
(17, 'Irish Stew', 0, 0, 120, 'lamb, potatoes, carrots, onions, herbs', 5, ''),
(18, 'Swedish Meatballs', 0, 0, 45, 'ground beef, breadcrumbs, onions, cream sauce', 6, ''),
(19, 'California Roll', 0, 1, 60, 'sushi rice, nori, crab meat, avocado, cucumber', 1, ''),
(20, 'Chocolate Brownies', 1, 0, 45, 'chocolate, butter, sugar, eggs, flour', 2, '');

-- --------------------------------------------------------

--
-- Table structure for table `recipe_category`
--

CREATE TABLE `recipe_category` (
  `recipe_category_id` int(11) NOT NULL,
  `recipe_id` int(11) NOT NULL,
  `category_d` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `users_id` int(255) NOT NULL,
  `users_email` varchar(50) NOT NULL,
  `users_user_name` varchar(50) NOT NULL,
  `users_password` longtext NOT NULL,
  `isSpicy` tinyint(1) DEFAULT NULL,
  `isVegan` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`users_id`, `users_email`, `users_user_name`, `users_password`, `isSpicy`, `isVegan`) VALUES
(1, 'user1@example.com', 'User1', '$2y$10$UwLJsc29TNVDfEZQWSQfG.hHqP9L7GWnwoHSSDAdrcBQXgZZW6jxO', 1, 0),
(2, 'user2@example.com', 'User2', '$2y$10$vJ.LkXH7oH8K4uLM5xjWhuEJ4MJ9e.2B5vl1DQz8HTcgivmU1/EEu', 0, 1),
(3, 'user3@example.com', 'User3', '$2y$10$S/WZx5fv92VqyyibwhfHSOWVyvD5aWRDhQHPdp9QdYzB47CzRWviK', 1, 1),
(4, 'user4@example.com', 'User4', '$2y$10$6CZYd3dx9WQftuHIZ69P2e2Hws/zleUSbeq9B/tLxWwaj4M/8gADG', 0, 0),
(5, 'user5@example.com', 'User5', '$2y$10$KOVedU16G7TImiUNN7RQSOi0OMH0NOCeIUnz.ZUCxD1ugw6y/Q8gO', 1, 1),
(6, 'user6@example.com', 'User6', '$2y$10$9ETrbnEdNvdrP4qo9Wf5kOxMrExujdsomjUEYQzT.1DKE5/yy0muG', 0, 0),
(22, 'email@gmail.com', 'User1234561', '$2y$10$D6CuBrWz9WHfHpra057kDuoDL3wE6q4zZExRAWIRoOt8Eo/ak84Fe', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_preferences`
--

CREATE TABLE `user_preferences` (
  `user_pref_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `preference` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Stand-in structure for view `user_ratings_mean`
-- (See below for the actual view)
--
CREATE TABLE `user_ratings_mean` (
`users_id` int(255)
,`users_user_name` varchar(50)
,`mean_rating` decimal(7,5)
);

-- --------------------------------------------------------



--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `password_reset`
--
ALTER TABLE `password_reset`
  ADD PRIMARY KEY (`password_reset_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `prod_cat` (`category_id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`rating_id`),
  ADD KEY `rating_user` (`user_id`),
  ADD KEY `rating_rec` (`recipe_id`);

--
-- Indexes for table `Recipes`
--
ALTER TABLE `Recipes`
  ADD PRIMARY KEY (`recipe_id`),
  ADD KEY `recipe_user` (`user_id`);

--
-- Indexes for table `recipe_category`
--
ALTER TABLE `recipe_category`
  ADD PRIMARY KEY (`recipe_category_id`),
  ADD KEY `rec_cat_rec` (`recipe_id`),
  ADD KEY `rec_cat_cat` (`category_d`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`users_id`);

--
-- Indexes for table `user_preferences`
--
ALTER TABLE `user_preferences`
  ADD PRIMARY KEY (`user_pref_id`),
  ADD KEY `user_pref_user` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `recipe_category`
--
ALTER TABLE `recipe_category`
  MODIFY `recipe_category_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `prod_cat` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`);

--
-- Constraints for table `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `rating_rec` FOREIGN KEY (`recipe_id`) REFERENCES `Recipes` (`recipe_id`),
  ADD CONSTRAINT `rating_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`users_id`);

--
-- Constraints for table `Recipes`
--
ALTER TABLE `Recipes`
  ADD CONSTRAINT `recipe_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`users_id`);

--
-- Constraints for table `recipe_category`
--
ALTER TABLE `recipe_category`
  ADD CONSTRAINT `rec_cat_cat` FOREIGN KEY (`category_d`) REFERENCES `categories` (`category_id`),
  ADD CONSTRAINT `rec_cat_rec` FOREIGN KEY (`recipe_id`) REFERENCES `Recipes` (`recipe_id`);

--
-- Constraints for table `user_preferences`
--
ALTER TABLE `user_preferences`
  ADD CONSTRAINT `user_pref_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`users_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
