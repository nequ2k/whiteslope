-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 21 Sie 2023, 23:43
-- Wersja serwera: 10.4.25-MariaDB
-- Wersja PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `recipello_new`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `categories`
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
-- Struktura tabeli dla tabeli `password_reset`
--

CREATE TABLE `password_reset` (
  `password_reset_id` int(11) NOT NULL,
  `password_reset_email` longtext NOT NULL,
  `password_reset_token` longtext NOT NULL,
  `password_reset_expires` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `product_category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `products`
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

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `product_categories`
--

CREATE TABLE `product_categories` (
  `product_cat_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `product_category`
--

CREATE TABLE `product_category` (
  `product_category_id` int(11) NOT NULL,
  `category` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `product_category`
--

INSERT INTO `product_category` (`product_category_id`, `category`) VALUES
(1, 'Spice'),
(2, 'Vegetable'),
(3, 'Fruit'),
(4, 'Meat'),
(5, 'Dairy'),
(6, 'Fat-oil'),
(7, 'Seafood'),
(8, 'Nuts'),
(9, 'Beans'),
(10, 'Grains');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `ratings`
--

CREATE TABLE `ratings` (
  `rating_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `recipe_id` int(11) NOT NULL,
  `rating` decimal(3,1) DEFAULT NULL CHECK (`rating` between 1.0 and 5.0)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `ratings`
--

INSERT INTO `ratings` (`rating_id`, `user_id`, `recipe_id`, `rating`) VALUES
(1, 1, 1, '4.0'),
(2, 1, 2, '4.5'),
(3, 1, 6, '5.0'),
(4, 1, 7, '2.0');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `recipes`
--

CREATE TABLE `recipes` (
  `recipe_id` int(11) NOT NULL,
  `title` longtext NOT NULL,
  `isVegan` tinyint(1) NOT NULL,
  `likesHot` tinyint(1) NOT NULL,
  `time` double NOT NULL,
  `ingredients` longtext NOT NULL,
  `user_id` int(11) NOT NULL,
  `methodOfPrep` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `recipes`
--

INSERT INTO `recipes` (`recipe_id`, `title`, `isVegan`, `likesHot`, `time`, `ingredients`, `user_id`, `methodOfPrep`) VALUES
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
-- Struktura tabeli dla tabeli `recipe_category`
--

CREATE TABLE `recipe_category` (
  `recipe_category_id` int(11) NOT NULL,
  `recipe_id` int(11) NOT NULL,
  `category_d` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `users_id` int(11) NOT NULL,
  `users_email` varchar(50) NOT NULL,
  `users_user_name` varchar(50) NOT NULL,
  `users_password` longtext NOT NULL,
  `isSpicy` tinyint(1) DEFAULT NULL,
  `isVegan` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `users`
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
-- Struktura tabeli dla tabeli `user_preferences`
--

CREATE TABLE `user_preferences` (
  `user_pref_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `preference` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user_ratings_mean`
--

CREATE TABLE `user_ratings_mean` (
  `users_id` int(255) DEFAULT NULL,
  `users_user_name` varchar(50) DEFAULT NULL,
  `mean_rating` decimal(7,5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indeksy dla tabeli `password_reset`
--
ALTER TABLE `password_reset`
  ADD PRIMARY KEY (`password_reset_id`);

--
-- Indeksy dla tabeli `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `prod_cat` (`product_category_id`);

--
-- Indeksy dla tabeli `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`product_cat_id`),
  ADD KEY `product_category` (`product_id`),
  ADD KEY `prod_cat_cat` (`product_category_id`);

--
-- Indeksy dla tabeli `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`product_category_id`);

--
-- Indeksy dla tabeli `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`rating_id`),
  ADD KEY `rating_user` (`user_id`),
  ADD KEY `rating_rec` (`recipe_id`);

--
-- Indeksy dla tabeli `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`recipe_id`),
  ADD KEY `recipe_user` (`user_id`);

--
-- Indeksy dla tabeli `recipe_category`
--
ALTER TABLE `recipe_category`
  ADD PRIMARY KEY (`recipe_category_id`),
  ADD KEY `rec_cat_rec` (`recipe_id`),
  ADD KEY `rec_cat_cat` (`category_d`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`users_id`);

--
-- Indeksy dla tabeli `user_preferences`
--
ALTER TABLE `user_preferences`
  ADD PRIMARY KEY (`user_pref_id`),
  ADD KEY `user_pref_user` (`user_id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT dla tabeli `password_reset`
--
ALTER TABLE `password_reset`
  MODIFY `password_reset_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT dla tabeli `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `product_cat_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `product_category`
--
ALTER TABLE `product_category`
  MODIFY `product_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT dla tabeli `ratings`
--
ALTER TABLE `ratings`
  MODIFY `rating_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `recipes`
--
ALTER TABLE `recipes`
  MODIFY `recipe_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT dla tabeli `recipe_category`
--
ALTER TABLE `recipe_category`
  MODIFY `recipe_category_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `users_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT dla tabeli `user_preferences`
--
ALTER TABLE `user_preferences`
  MODIFY `user_pref_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `prod_cat` FOREIGN KEY (`product_category_id`) REFERENCES `product_category` (`product_category_id`);

--
-- Ograniczenia dla tabeli `product_categories`
--
ALTER TABLE `product_categories`
  ADD CONSTRAINT `prod_cat_cat` FOREIGN KEY (`product_category_id`) REFERENCES `product_category` (`product_category_id`),
  ADD CONSTRAINT `product_category` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Ograniczenia dla tabeli `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `rating_rec` FOREIGN KEY (`recipe_id`) REFERENCES `recipes` (`recipe_id`),
  ADD CONSTRAINT `rating_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`users_id`);

--
-- Ograniczenia dla tabeli `recipes`
--
ALTER TABLE `recipes`
  ADD CONSTRAINT `recipe_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`users_id`);

--
-- Ograniczenia dla tabeli `recipe_category`
--
ALTER TABLE `recipe_category`
  ADD CONSTRAINT `rec_cat_cat` FOREIGN KEY (`category_d`) REFERENCES `categories` (`category_id`),
  ADD CONSTRAINT `rec_cat_rec` FOREIGN KEY (`recipe_id`) REFERENCES `recipes` (`recipe_id`);

--
-- Ograniczenia dla tabeli `user_preferences`
--
ALTER TABLE `user_preferences`
  ADD CONSTRAINT `user_pref_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`users_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
