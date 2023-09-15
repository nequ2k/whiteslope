-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 14, 2023 at 08:12 PM
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
-- Database: `recipello`
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
(24, 'Dessert'),
(25, 'Pasta'),
(26, 'Fish'),
(27, 'Beef'),
(28, 'Pork'),
(29, 'Veal'),
(30, 'Potato'),
(31, 'Shrimp'),
(32, 'Oyster'),
(33, 'Octopus'),
(34, 'Horse'),
(35, 'Poultry'),
(36, 'Pate'),
(37, 'Soup'),
(38, 'Bread'),
(39, 'Nuts'),
(40, 'Asian'),
(41, 'Spicy'),
(42, 'Salad'),
(43, 'Seafood'),
(44, 'Bakery'),
(45, 'Sausage'),
(46, 'Dumplings'),
(47, 'Noodles'),
(48, 'Curry'),
(49, 'Kebab'),
(50, 'Rice'),
(51, 'Fried Rice'),
(52, 'Stew'),
(53, 'Meatballs'),
(54, 'Brownies'),
(55, 'Stir-Fry'),
(56, 'Vegetarian'),
(57, 'Greek'),
(58, 'Tacos'),
(59, 'Gyros'),
(60, 'Chicken'),
(61, 'Cookies'),
(62, 'Hawaiian'),
(63, 'Lasagna'),
(64, 'Appetizer'),
(65, 'English'),
(66, 'Swedish'),
(67, 'Chinese'),
(68, 'Irish'),
(69, 'Russian');

-- --------------------------------------------------------

--
-- Table structure for table `favourites`
--

CREATE TABLE `favourites` (
  `favourite_id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `recipe_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `favourites`
--

INSERT INTO `favourites` (`favourite_id`, `uid`, `recipe_id`) VALUES
(1, 30, 2),
(2, 3, 4);

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
  `product_category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `name`, `product_category_id`) VALUES
(1, 'farfalle', 10),
(2, 'spaghetti', 10),
(3, 'fettuccine', 10),
(4, 'pappardelle', 10),
(5, 'fusilli', 10),
(6, 'ribs', 4),
(7, 'chicken drums', 4),
(8, 'turkey drums', 4),
(9, 'chicken wings', 4),
(10, 'chicken breast', 4),
(11, 'ham', 4),
(12, 'salami', 4),
(13, 'minced beef', 4),
(14, 'minced pork', 4),
(35, 'asparagus', 2),
(36, 'beetroot', 2),
(37, 'bell pepper', 2),
(38, 'broccoli', 2),
(39, 'cabbage', 2),
(40, 'lettuce', 2),
(41, 'carrot', 2),
(42, 'corn', 2),
(43, 'cucumber', 2),
(44, 'cauliflower', 2),
(45, 'eggplant', 2),
(46, 'mushroom', 2),
(47, 'onion', 2),
(48, 'peas', 9),
(49, 'potato', 2),
(50, 'pumpkin', 2),
(51, 'radish', 2),
(52, 'sweet potato', 2),
(53, 'tomato', 3),
(54, 'zucchini', 2),
(55, 'apple', 3),
(56, 'avocado', 3),
(57, 'banana', 3),
(58, 'blackberry', 3),
(59, 'blueberry', 3),
(60, 'cherry', 3),
(61, 'grape', 3),
(62, 'fig', 3),
(63, 'coconut', 3),
(64, 'lemon', 3),
(65, 'lime', 3),
(66, 'mango', 3),
(67, 'orange', 3),
(68, 'peach', 3),
(69, 'pineapple', 3),
(70, 'strawberry', 3),
(71, 'watermelon', 3),
(72, 'pear', 3),
(73, 'almonds', 8),
(74, 'hazelnuts', 8),
(95, 'peanuts', 8),
(96, 'pistachio', 4),
(97, 'sunflower seeds', 8),
(98, 'walnuts', 8),
(99, 'clove', 1),
(100, 'cumin', 1),
(101, 'garlic', 1),
(102, 'cardamon', 1),
(103, 'black pepper', 1),
(104, 'salt', 1),
(105, 'chili powder', 1),
(106, 'baking soda', 1),
(107, 'turmenic', 1),
(108, 'thyme', 1),
(109, 'rosemary', 1),
(110, 'mustard', 1),
(111, 'tomato sauce', 1),
(112, 'mayo', 1),
(113, 'cinamon', 1),
(114, 'green pesto', 1),
(115, 'curry powder', 1),
(116, 'salmon', 7),
(117, 'tuna', 7),
(118, 'oyster', 7),
(119, 'octopus', 7),
(120, 'shrimps', 7),
(121, 'squid', 7),
(122, 'oat milk', 5),
(123, 'cow milk', 5),
(124, 'almond milk', 5),
(125, 'coconut milk', 5),
(126, 'rice milk', 5),
(127, 'basmati rice', 10),
(128, 'buns', 10),
(129, 'jasmin rice', 10),
(130, 'white rice', 10),
(131, 'sushi rice', 10),
(132, 'eggs', 5),
(133, 'butter', 6),
(134, 'vegetable oil', 6),
(135, 'bacon', 4);

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `product_cat_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `product_category_id` int(11) NOT NULL,
  `category` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_category`
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
(4, 1, 7, '2.0'),
(18, 4, 20, '3.0'),
(19, 4, 13, '4.0'),
(20, 4, 1, '4.0'),
(21, 4, 3, '3.0'),
(22, 4, 8, '4.0'),
(23, 4, 17, '5.0'),
(24, 4, 2, '2.0'),
(25, 4, 18, '3.0'),
(26, 4, 16, '2.0'),
(27, 5, 1, '4.0'),
(28, 5, 2, '4.0'),
(29, 5, 3, '5.0'),
(30, 5, 4, '4.0'),
(31, 5, 5, '3.0'),
(32, 5, 6, '5.0'),
(33, 5, 7, '2.0'),
(34, 5, 8, '3.0'),
(35, 5, 9, '4.0'),
(36, 5, 10, '3.0'),
(37, 5, 11, '5.0'),
(38, 5, 12, '4.0'),
(39, 5, 13, '3.0'),
(40, 5, 14, '5.0'),
(41, 5, 15, '5.0'),
(42, 5, 16, '2.0'),
(43, 5, 17, '4.0'),
(44, 5, 18, '4.0'),
(45, 5, 19, '4.0'),
(46, 5, 20, '3.0'),
(47, 22, 5, '4.0'),
(48, 22, 19, '4.5'),
(49, 2, 1, '4.5'),
(50, 2, 2, '3.0'),
(51, 2, 3, '4.5'),
(52, 2, 4, '3.5'),
(53, 2, 5, '2.0'),
(54, 2, 6, '5.0'),
(55, 2, 7, '2.5'),
(56, 2, 8, '4.5'),
(57, 2, 9, '3.5'),
(58, 2, 10, '3.5'),
(59, 2, 11, '4.0'),
(60, 2, 12, '5.0'),
(61, 2, 13, '3.0'),
(62, 2, 14, '2.5'),
(63, 2, 15, '4.0'),
(64, 2, 16, '3.5'),
(65, 2, 17, '5.0'),
(66, 2, 18, '2.0'),
(67, 2, 19, '4.5'),
(68, 2, 20, '3.0'),
(69, 3, 1, '4.0'),
(70, 3, 3, '4.5'),
(71, 3, 5, '3.5'),
(72, 3, 7, '2.5'),
(73, 3, 9, '3.0'),
(74, 3, 11, '2.0'),
(75, 3, 13, '4.5'),
(76, 3, 15, '5.0'),
(77, 3, 17, '3.5'),
(78, 3, 19, '4.0'),
(79, 6, 2, '2.0'),
(80, 6, 4, '3.0'),
(81, 6, 6, '3.5'),
(82, 6, 8, '4.5'),
(83, 6, 10, '2.5'),
(84, 6, 12, '3.5'),
(85, 6, 14, '3.5'),
(86, 6, 16, '4.0'),
(87, 6, 18, '2.0'),
(88, 6, 20, '3.5'),
(89, 22, 1, '2.0'),
(90, 22, 2, '3.0'),
(91, 22, 3, '4.5'),
(92, 22, 4, '3.0'),
(93, 22, 6, '2.0'),
(94, 22, 7, '4.5'),
(95, 22, 8, '4.0'),
(96, 22, 9, '4.5'),
(97, 22, 10, '3.0'),
(98, 22, 11, '5.0'),
(99, 22, 12, '4.5'),
(100, 22, 13, '4.0'),
(101, 22, 14, '5.0'),
(102, 22, 15, '4.5'),
(103, 22, 16, '4.0'),
(104, 22, 17, '5.0'),
(105, 22, 18, '4.5'),
(106, 22, 20, '4.0'),
(107, 1, 5, '3.5'),
(108, 1, 10, '2.5'),
(109, 1, 20, '4.5'),
(110, 1, 14, '5.0'),
(111, 1, 19, '4.0'),
(112, 1, 11, '4.5'),
(113, 1, 12, '4.5'),
(114, 1, 7, '2.0'),
(115, 30, 14, '4.7'),
(116, 30, 18, '3.4'),
(117, 30, 12, '1.4');

-- --------------------------------------------------------

--
-- Table structure for table `recipes`
--

CREATE TABLE `recipes` (
  `recipe_id` int(11) NOT NULL,
  `title` longtext NOT NULL,
  `categories` text NOT NULL,
  `isVegan` tinyint(1) NOT NULL,
  `isSpicy` tinyint(1) NOT NULL,
  `time` double NOT NULL,
  `ingredients` longtext NOT NULL,
  `user_id` int(11) NOT NULL,
  `methodOfPrep` text NOT NULL,
  `image_path` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `recipes`
--

INSERT INTO `recipes` (`recipe_id`, `title`, `categories`, `isVegan`, `isSpicy`, `time`, `ingredients`, `user_id`, `methodOfPrep`, `image_path`) VALUES
(1, 'Spaghetti Aglio e Olio', 'Italian, Pasta', 0, 1, 30, 'spaghetti, garlic, olive oil, red pepper flakes, parsley', 1, '1. Cook spaghetti. 2. Sauté garlic in olive oil. 3. Add red pepper flakes and parsley. 4. Toss with spaghetti.', NULL),
(2, 'Paella', 'Spanish, Seafood', 0, 1, 60, 'rice, chicken, shrimp, bell pepper, saffron', 2, '1. Sauté chicken and shrimp. 2. Add rice, pepper, and saffron. 3. Cook until rice is done.', NULL),
(3, 'Croissant', 'French, Bakery', 0, 0, 120, 'flour, butter, sugar, yeast, salt', 3, '1. Mix ingredient. 2. Fold and roll dough. 3. Bake for flaky croissant.', NULL),
(4, 'Fish and Chips', 'British, Seafood', 0, 1, 45, 'fish fillet, potato, flour, beer, tartar sauce', 4, '1. Batter fish. 2. Fry with potato. 3. Serve with tartar sauce.', NULL),
(5, 'Bratwurst with Sauerkraut', 'German, Sausage', 0, 0, 60, 'bratwurst, sauerkraut, onion, mustard', 5, '1. Grill bratwurst. 2. Serve with sauerkraut, onion, and mustard.', NULL),
(6, 'Pierogi', 'Polish, Dumpling', 0, 1, 90, 'dough, potato, cheese, onion, butter', 6, '1. Make dough and filling. 2. Shape into dumpling. 3. Boil and sauté with butter.', NULL),
(7, 'Caprese Salad', 'Italian, Salad', 1, 1, 15, 'tomato, mozzarella, basil, olive oil, balsamic vinegar', 1, '1. Slice tomato and mozzarella. 2. Layer with basil. 3. Drizzle with oil and vinegar.', NULL),
(8, 'Pad Thai', 'Thai, Noodle', 1, 1, 30, 'rice noodle, tofu, peanut, bean sprout, tamarind sauce', 2, '1. Stir-fry tofu and noodle. 2. Add sauce and topping. 3. Enjoy Pad Thai.', NULL),
(9, 'Chana Masala', 'Indian, Curry', 1, 1, 45, 'chickpea, tomato, onion, spice, cilantro', 3, '1. Sauté onion and spice. 2. Add chickpea and tomato. 3. Garnish with cilantro.', NULL),
(10, 'Turkish Kebab', 'Turkish, Kebab', 0, 1, 60, 'lamb, onion, yogurt, pita bread, spice', 4, '1. Grill lamb. 2. Serve in pita with yogurt and spice.', NULL),
(11, 'Sushi Roll', 'Japanese, Sushi', 0, 1, 60, 'sushi rice, nori, fish, vegetable, soy sauce', 5, '1. Roll ingredient in nori. 2. Slice into roll. 3. Dip in soy sauce.', NULL),
(12, 'Cheeseburger', 'American, Burger', 0, 1, 30, 'beef patty, cheese, lettuce, tomato, bun', 6, '1. Grill patty. 2. Assemble burger with topping. 3. Serve in a bun.', NULL),
(13, 'Margherita Pizza', 'Italian, Pizza', 0, 1, 45, 'pizza dough, tomato sauce, mozzarella cheese, basil', 1, '1. Top dough with sauce, cheese, and basil. 2. Bake for a classic pizza.', NULL),
(14, 'Crème Brûlée', 'French, Dessert', 0, 0, 90, 'heavy cream, sugar, egg, vanilla, caramelized sugar', 2, '1. Mix ingredient. 2. Bake and caramelize sugar for a creamy dessert.', NULL),
(15, 'Kimchi Fried Rice', 'Korean, Fried Rice', 1, 1, 30, 'rice, kimchi, vegetable, soy sauce, fried egg', 3, '1. Fry rice with kimchi and veggie. 2. Top with a fried egg. 3. Drizzle soy sauce.', NULL),
(16, 'Jollof Rice', 'African, Rice', 0, 1, 60, 'rice, tomato, onion, pepper, spice', 4, '1. Sauté onion and spice. 2. Add rice and tomato. 3. Cook until tender.', NULL),
(17, 'Irish Stew', 'Irish, Stew', 0, 0, 120, 'lamb, potato, carrot, onion, herb', 5, '1. Cook lamb with veggie and herb. 2. Simmer for a hearty stew.', NULL),
(18, 'Swedish Meatball', 'Swedish, Meatball', 0, 0, 45, 'ground beef, breadcrumb, onion, cream sauce', 6, '1. Make meatball. 2. Serve with cream sauce for a Swedish favorite.', NULL),
(19, 'California Roll', 'Japanese, Sushi', 0, 1, 60, 'sushi rice, nori, crab meat, avocado, cucumber', 1, '1. Roll ingredient in nori. 2. Slice into roll. 3. Enjoy with soy sauce.', NULL),
(20, 'Chocolate Brownie', 'Dessert, Brownie', 1, 0, 45, 'chocolate, butter, sugar, egg, flour', 2, '1. Mix ingredient. 2. Bake for delicious chocolate brownie.', NULL),
(21, 'Vegan Tofu Stir-Fry', 'Vegan, Stir-Fry', 1, 0, 30, 'tofu, vegetable, soy sauce, rice', 1, '1. Press tofu, cut into cube. 2. Stir-fry tofu and veggie. 3. Add soy sauce. 4. Serve with rice.', NULL),
(22, 'Mediterranean Salad', 'Salad, Mediterranean', 1, 1, 15, 'cucumber, tomato, olive, feta cheese, olive oil', 2, '1. Chop veggie. 2. Mix with olive oil. 3. Add feta cheese. 4. Enjoy as a refreshing salad.', NULL),
(23, 'Spicy Chicken Taco', 'Taco, Spicy', 0, 1, 30, 'chicken, tortilla, salsa, sour cream, lettuce', 3, '1. Grill chicken. 2. Assemble taco with salsa and sour cream. 3. Serve with lettuce.', NULL),
(24, 'Vegetable Fried Rice', 'Fried Rice, Vegetarian', 1, 1, 45, 'rice, mixed vegetable, soy sauce', 4, '1. Cook rice. 2. Stir-fry veggie. 3. Add soy sauce. 4. Combine for a tasty meal.', NULL),
(25, 'Greek Gyros', 'Gyros, Greek', 0, 1, 60, 'lamb, pita bread, yogurt, tomato, onion', 5, '1. Grill lamb. 2. Fill pita with lamb, yogurt, and veggie. 3. Enjoy your gyro.', NULL),
(26, 'Chicken Parmesan', 'Chicken, Italian', 0, 1, 45, 'chicken breast, breadcrumb, marinara sauce, mozzarella', 1, '1. Bread chicken. 2. Top with marinara and mozzarella. 3. Bake for a delicious meal.', NULL),
(27, 'Vegetarian Sushi Roll', 'Sushi, Vegetarian', 1, 1, 60, 'sushi rice, nori, avocado, cucumber, soy sauce', 2, '1. Roll ingredient in nori. 2. Slice into roll. 3. Dip in soy sauce.', NULL),
(28, 'Chocolate Chip Cookie', 'Dessert, Cookie', 1, 0, 30, 'flour, chocolate chip, butter, sugar, egg', 3, '1. Mix ingredient. 2. Drop dough onto a tray. 3. Bake for delicious cookie.', NULL),
(29, 'Thai Green Curry', 'Curry, Thai', 1, 1, 45, 'chicken, green curry paste, coconut milk, vegetable', 4, '1. Cook chicken. 2. Add curry paste and coconut milk. 3. Simmer with veggie.', NULL),
(30, 'Hawaiian Pizza', 'Pizza, Hawaiian', 0, 1, 45, 'pizza dough, ham, pineapple, mozzarella cheese', 5, '1. Top dough with ham, pineapple, and cheese. 2. Bake for a tropical pizza.', NULL),
(31, 'Vegetable Lasagna', 'Italian, Lasagna', 1, 0, 60, 'lasagna noodle, ricotta cheese, marinara sauce, spinach', 6, '1. Layer ingredient in a dish. 2. Bake for a cheesy lasagna.', NULL),
(32, 'Shrimp Scampi', 'Seafood, Shrimp', 0, 1, 30, 'shrimp, garlic, butter, white wine, pasta', 1, '1. Cook shrimp. 2. Sauté garlic and butter. 3. Add white wine. 4. Toss with pasta.', NULL),
(33, 'Vegetable Tempura', 'Tempura, Vegetarian', 1, 1, 30, 'assorted vegetable, tempura batter, dipping sauce', 2, '1. Dip veggie in batter. 2. Fry until crispy. 3. Serve with dipping sauce.', NULL),
(34, 'Ratatouille', 'French, Vegetarian', 1, 0, 45, 'eggplant, zucchini, tomato, onion, herb', 3, '1. Layer veggie in a dish. 2. Bake with herb for a flavorful dish.', NULL),
(35, 'Crispy Onion Ring', 'Appetizer, Onion Ring', 1, 1, 30, 'onion, flour, breadcrumb, buttermilk', 4, '1. Coat onion in flour. 2. Dip in buttermilk. 3. Coat with breadcrumb. 4. Fry until crispy.', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `recipe_category`
--

CREATE TABLE `recipe_category` (
  `recipe_category_id` int(11) NOT NULL,
  `recipe_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `recipe_category`
--

INSERT INTO `recipe_category` (`recipe_category_id`, `recipe_id`, `category_id`) VALUES
(1, 1, 2),
(2, 2, 3),
(3, 3, 4),
(4, 4, 5),
(5, 5, 6),
(6, 6, 7),
(7, 7, 2),
(8, 8, 16),
(9, 9, 10),
(10, 10, 11),
(11, 11, 12),
(12, 12, 13),
(13, 13, 2),
(14, 14, 4),
(15, 15, 17),
(16, 16, 18),
(17, 17, 19),
(18, 18, 20),
(19, 19, 12),
(20, 20, 13);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `users_id` int(11) NOT NULL,
  `users_email` varchar(50) NOT NULL,
  `users_user_name` varchar(50) NOT NULL,
  `users_password` longtext NOT NULL,
  `isSpicy` tinyint(1) DEFAULT NULL,
  `isVegan` tinyint(1) DEFAULT NULL,
  `image_path` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`users_id`, `users_email`, `users_user_name`, `users_password`, `isSpicy`, `isVegan`, `image_path`) VALUES
(1, 'user1@example.com', 'User1', '$2y$10$UwLJsc29TNVDfEZQWSQfG.hHqP9L7GWnwoHSSDAdrcBQXgZZW6jxO', 1, 0, ''),
(2, 'user2@example.com', 'User2', '$2y$10$vJ.LkXH7oH8K4uLM5xjWhuEJ4MJ9e.2B5vl1DQz8HTcgivmU1/EEu', 0, 1, ''),
(3, 'user3@example.com', 'User3', '$2y$10$S/WZx5fv92VqyyibwhfHSOWVyvD5aWRDhQHPdp9QdYzB47CzRWviK', 1, 1, ''),
(4, 'user4@example.com', 'User4', '$2y$10$6CZYd3dx9WQftuHIZ69P2e2Hws/zleUSbeq9B/tLxWwaj4M/8gADG', 0, 0, ''),
(5, 'user5@example.com', 'User5', '$2y$10$KOVedU16G7TImiUNN7RQSOi0OMH0NOCeIUnz.ZUCxD1ugw6y/Q8gO', 1, 1, ''),
(6, 'user6@example.com', 'User6', '$2y$10$9ETrbnEdNvdrP4qo9Wf5kOxMrExujdsomjUEYQzT.1DKE5/yy0muG', 0, 0, ''),
(22, 'email@gmail.com', 'User1234561', '$2y$10$D6CuBrWz9WHfHpra057kDuoDL3wE6q4zZExRAWIRoOt8Eo/ak84Fe', NULL, NULL, ''),
(30, 'thomas@email.com', 'Tom1', 'password', 1, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `user_preferences`
--

CREATE TABLE `user_preferences` (
  `user_pref_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `preference` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_preferences`
--

INSERT INTO `user_preferences` (`user_pref_id`, `user_id`, `preference`) VALUES
(1, 1, '12'),
(2, 2, '7'),
(3, 4, '19'),
(4, 5, '17'),
(5, 3, '4'),
(6, 22, '13'),
(7, 6, '18');

-- --------------------------------------------------------

--
-- Table structure for table `user_ratings_mean`
--

CREATE TABLE `user_ratings_mean` (
  `users_id` int(255) DEFAULT NULL,
  `users_user_name` varchar(50) DEFAULT NULL,
  `mean_rating` decimal(7,5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `favourites`
--
ALTER TABLE `favourites`
  ADD PRIMARY KEY (`favourite_id`);

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
  ADD KEY `prod_cat` (`product_category_id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`product_cat_id`),
  ADD KEY `product_category` (`product_id`),
  ADD KEY `prod_cat_cat` (`product_category_id`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`product_category_id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`rating_id`),
  ADD KEY `rating_user` (`user_id`),
  ADD KEY `rating_rec` (`recipe_id`);

--
-- Indexes for table `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`recipe_id`),
  ADD KEY `recipe_user` (`user_id`);

--
-- Indexes for table `recipe_category`
--
ALTER TABLE `recipe_category`
  ADD PRIMARY KEY (`recipe_category_id`),
  ADD KEY `rec_cat_rec` (`recipe_id`),
  ADD KEY `rec_cat_cat` (`category_id`);

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
  ADD KEY `user_pref_user` (`user_id`),
  ADD KEY `pref_category` (`preference`(768));

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `favourites`
--
ALTER TABLE `favourites`
  MODIFY `favourite_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `password_reset`
--
ALTER TABLE `password_reset`
  MODIFY `password_reset_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `product_cat_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `product_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `rating_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT for table `recipes`
--
ALTER TABLE `recipes`
  MODIFY `recipe_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `recipe_category`
--
ALTER TABLE `recipe_category`
  MODIFY `recipe_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `users_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `user_preferences`
--
ALTER TABLE `user_preferences`
  MODIFY `user_pref_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `prod_cat` FOREIGN KEY (`product_category_id`) REFERENCES `product_category` (`product_category_id`);

--
-- Constraints for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD CONSTRAINT `prod_cat_cat` FOREIGN KEY (`product_category_id`) REFERENCES `product_category` (`product_category_id`),
  ADD CONSTRAINT `product_category` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Constraints for table `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `rating_recipe` FOREIGN KEY (`recipe_id`) REFERENCES `recipes` (`recipe_id`),
  ADD CONSTRAINT `rating_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`users_id`);

--
-- Constraints for table `recipes`
--
ALTER TABLE `recipes`
  ADD CONSTRAINT `user_recipe` FOREIGN KEY (`user_id`) REFERENCES `users` (`users_id`);

--
-- Constraints for table `recipe_category`
--
ALTER TABLE `recipe_category`
  ADD CONSTRAINT `rec_cat_cat` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
