Seed Categories:
INSERT INTO `categories`(`category_name`) VALUES ('Italian'),('Spanish'),('French'),('English'),('German'),('Polish'),('Mediterranean'),('Asian'),('Indian'),('Turkish'),('Japanese'),('American'),('Chinese'),('Pacific'),('Thai'),('Korean'),('African'),('Irish'),('Scandinavian'),('Sushi'),('Burgers'),('Pizza'),('Dessert');
Seed Users:
INSERT INTO users (users_id, users_email, users_user_name, users_password, likesHot, isVegan)
VALUES
  (1, 'user1@example.com', 'User1', '$2y$10$UwLJsc29TNVDfEZQWSQfG.hHqP9L7GWnwoHSSDAdrcBQXgZZW6jxO', true, false),
  (2, 'user2@example.com', 'User2', '$2y$10$vJ.LkXH7oH8K4uLM5xjWhuEJ4MJ9e.2B5vl1DQz8HTcgivmU1/EEu', false, true),
  (3, 'user3@example.com', 'User3', '$2y$10$S/WZx5fv92VqyyibwhfHSOWVyvD5aWRDhQHPdp9QdYzB47CzRWviK', true, true),
  (4, 'user4@example.com', 'User4', '$2y$10$6CZYd3dx9WQftuHIZ69P2e2Hws/zleUSbeq9B/tLxWwaj4M/8gADG', false, false),
  (5, 'user5@example.com', 'User5', '$2y$10$KOVedU16G7TImiUNN7RQSOi0OMH0NOCeIUnz.ZUCxD1ugw6y/Q8gO', true, true),
  (6, 'user6@example.com', 'User6', '$2y$10$9ETrbnEdNvdrP4qo9Wf5kOxMrExujdsomjUEYQzT.1DKE5/yy0muG', false, false);
  
  Password.1: $2y$10$UwLJsc29TNVDfEZQWSQfG.hHqP9L7GWnwoHSSDAdrcBQXgZZW6jxO
Password.2: $2y$10$vJ.LkXH7oH8K4uLM5xjWhuEJ4MJ9e.2B5vl1DQz8HTcgivmU1/EEu
Password.3: $2y$10$S/WZx5fv92VqyyibwhfHSOWVyvD5aWRDhQHPdp9QdYzB47CzRWviK
Password.4: $2y$10$6CZYd3dx9WQftuHIZ69P2e2Hws/zleUSbeq9B/tLxWwaj4M/8gADG
Password.5: $2y$10$KOVedU16G7TImiUNN7RQSOi0OMH0NOCeIUnz.ZUCxD1ugw6y/Q8gO
Password.6: $2y$10$9ETrbnEdNvdrP4qo9Wf5kOxMrExujdsomjUEYQzT.1DKE5/yy0muG

Seed Recipes:
INSERT INTO recipes (recipe_id, title, category_id, isVegan, likesHot, rating, time, ingredients, user_id)
VALUES
  (1, 'Spaghetti Aglio e Olio', 1, false, true, 4.5, 30, 'spaghetti, garlic, olive oil, red pepper flakes, parsley', 1),
  (2, 'Paella', 2, false, true, 4.7, 60, 'rice, chicken, shrimp, bell peppers, saffron', 2),
  (3, 'Croissant', 3, false, false, 4.3, 120, 'flour, butter, sugar, yeast, salt', 3),
  (4, 'Fish and Chips', 4, false, true, 4.2, 45, 'fish fillets, potatoes, flour, beer, tartar sauce', 4),
  (5, 'Bratwurst with Sauerkraut', 5, false, false, 4.6, 60, 'bratwurst, sauerkraut, onions, mustard', 5),
  (6, 'Pierogi', 6, false, true, 4.8, 90, 'dough, potatoes, cheese, onions, butter', 6),
  (7, 'Caprese Salad', 7, true, true, 4.4, 15, 'tomatoes, mozzarella, basil, olive oil, balsamic vinegar', 1),
  (8, 'Pad Thai', 8, true, true, 4.9, 30, 'rice noodles, tofu, peanuts, bean sprouts, tamarind sauce', 2),
  (9, 'Chana Masala', 9, true, true, 4.7, 45, 'chickpeas, tomatoes, onions, spices, cilantro', 3),
  (10, 'Turkish Kebab', 10, false, true, 4.5, 60, 'lamb, onions, yogurt, pita bread, spices', 4),
  (11, 'Sushi Rolls', 21, false, true, 4.6, 60, 'sushi rice, nori, fish, vegetables, soy sauce', 5),
  (12, 'Cheeseburger', 20, false, true, 4.3, 30, 'beef patty, cheese, lettuce, tomato, bun', 6),
  (13, 'Margherita Pizza', 21, false, true, 4.8, 45, 'pizza dough, tomato sauce, mozzarella cheese, basil', 1),
  (14, 'Crème Brûlée', 22, false, false, 4.7, 90, 'heavy cream, sugar, eggs, vanilla, caramelized sugar', 2),
  (15, 'Kimchi Fried Rice', 16, true, true, 4.5, 30, 'rice, kimchi, vegetables, soy sauce, fried egg', 3),
  (16, 'Jollof Rice', 17, false, true, 4.4, 60, 'rice, tomatoes, onions, peppers, spices', 4),
  (17, 'Irish Stew', 18, false, false, 4.2, 120, 'lamb, potatoes, carrots, onions, herbs', 5),
  (18, 'Swedish Meatballs', 19, false, false, 4.6, 45, 'ground beef, breadcrumbs, onions, cream sauce', 6),
  (19, 'California Roll', 21, false, true, 4.9, 60, 'sushi rice, nori, crab meat, avocado, cucumber', 1),
  (20, 'Chocolate Brownies', 22, true, false, 4.8, 45, 'chocolate, butter, sugar, eggs, flour', 2);
