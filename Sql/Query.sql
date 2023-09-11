Seed Categories:
INSERT INTO `categories`(`category_name`) VALUES ('Italian'),('Spanish'),('French'),('English'),('German'),('Polish'),('Mediterranean'),('Asian'),('Indian'),('Turkish'),('Japanese'),('American'),('Chinese'),('Pacific'),('Thai'),('Korean'),('African'),('Irish'),('Scandinavian'),('Sushi'),('Burgers'),('Pizza'),('Dessert');
Seed Users:
INSERT INTO users (users_id, users_email, users_user_name, users_password, isSpicy, isVegan)
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

INSERT INTO recipes (recipe_id, title, categories, isVegan, isSpicy, time, ingredients, user_id, methodOfPrep)
VALUES
  (1, 'Spaghetti Aglio e Olio', 'Italian, Pasta', false, true, 30, 'spaghetti, garlic, olive oil, red pepper flakes, parsley', 1, '1. Cook spaghetti. 2. Sauté garlic in olive oil. 3. Add red pepper flakes and parsley. 4. Toss with spaghetti.'),
  (2, 'Paella', 'Spanish, Seafood', false, true, 60, 'rice, chicken, shrimp, bell peppers, saffron', 2, '1. Sauté chicken and shrimp. 2. Add rice, peppers, and saffron. 3. Cook until rice is done.'),
  (3, 'Croissant', 'French, Bakery', false, false, 120, 'flour, butter, sugar, yeast, salt', 3, '1. Mix ingredients. 2. Fold and roll dough. 3. Bake for flaky croissants.'),
  (4, 'Fish and Chips', 'British, Seafood', false, true, 45, 'fish fillets, potatoes, flour, beer, tartar sauce', 4, '1. Batter fish. 2. Fry with potatoes. 3. Serve with tartar sauce.'),
  (5, 'Bratwurst with Sauerkraut', 'German, Sausage', false, false, 60, 'bratwurst, sauerkraut, onions, mustard', 5, '1. Grill bratwurst. 2. Serve with sauerkraut, onions, and mustard.'),
  (6, 'Pierogi', 'Polish, Dumplings', false, true, 90, 'dough, potatoes, cheese, onions, butter', 6, '1. Make dough and filling. 2. Shape into dumplings. 3. Boil and sauté with butter.'),
  (7, 'Caprese Salad', 'Italian, Salad', true, true, 15, 'tomatoes, mozzarella, basil, olive oil, balsamic vinegar', 1, '1. Slice tomatoes and mozzarella. 2. Layer with basil. 3. Drizzle with oil and vinegar.'),
  (8, 'Pad Thai', 'Thai, Noodles', true, true, 30, 'rice noodles, tofu, peanuts, bean sprouts, tamarind sauce', 2, '1. Stir-fry tofu and noodles. 2. Add sauce and toppings. 3. Enjoy Pad Thai.'),
  (9, 'Chana Masala', 'Indian, Curry', true, true, 45, 'chickpeas, tomatoes, onions, spices, cilantro', 3, '1. Sauté onions and spices. 2. Add chickpeas and tomatoes. 3. Garnish with cilantro.'),
  (10, 'Turkish Kebab', 'Turkish, Kebab', false, true, 60, 'lamb, onions, yogurt, pita bread, spices', 4, '1. Grill lamb. 2. Serve in pita with yogurt and spices.'),
  (11, 'Sushi Rolls', 'Japanese, Sushi', false, true, 60, 'sushi rice, nori, fish, vegetables, soy sauce', 5, '1. Roll ingredients in nori. 2. Slice into rolls. 3. Dip in soy sauce.'),
  (12, 'Cheeseburger', 'American, Burger', false, true, 30, 'beef patty, cheese, lettuce, tomato, bun', 6, '1. Grill patty. 2. Assemble burger with toppings. 3. Serve in a bun.'),
  (13, 'Margherita Pizza', 'Italian, Pizza', false, true, 45, 'pizza dough, tomato sauce, mozzarella cheese, basil', 1, '1. Top dough with sauce, cheese, and basil. 2. Bake for a classic pizza.'),
  (14, 'Crème Brûlée', 'French, Dessert', false, false, 90, 'heavy cream, sugar, eggs, vanilla, caramelized sugar', 2, '1. Mix ingredients. 2. Bake and caramelize sugar for a creamy dessert.'),
  (15, 'Kimchi Fried Rice', 'Korean, Fried Rice', true, true, 30, 'rice, kimchi, vegetables, soy sauce, fried egg', 3, '1. Fry rice with kimchi and veggies. 2. Top with a fried egg. 3. Drizzle soy sauce.'),
  (16, 'Jollof Rice', 'African, Rice', false, true, 60, 'rice, tomatoes, onions, peppers, spices', 4, '1. Sauté onions and spices. 2. Add rice and tomatoes. 3. Cook until tender.'),
  (17, 'Irish Stew', 'Irish, Stew', false, false, 120, 'lamb, potatoes, carrots, onions, herbs', 5, '1. Cook lamb with veggies and herbs. 2. Simmer for a hearty stew.'),
  (18, 'Swedish Meatballs', 'Swedish, Meatballs', false, false, 45, 'ground beef, breadcrumbs, onions, cream sauce', 6, '1. Make meatballs. 2. Serve with cream sauce for a Swedish favorite.'),
  (19, 'California Roll', 'Japanese, Sushi', false, true, 60, 'sushi rice, nori, crab meat, avocado, cucumber', 1, '1. Roll ingredients in nori. 2. Slice into rolls. 3. Enjoy with soy sauce.'),
  (20, 'Chocolate Brownies', 'Dessert, Brownies', true, false,  45, 'chocolate, butter, sugar, eggs, flour', 2, '1. Mix ingredients. 2. Bake for delicious chocolate brownies.'),
  (21, 'Vegan Tofu Stir-Fry', 'Vegan, Stir-Fry', true, false, 30, 'tofu, vegetables, soy sauce, rice', 1, '1. Press tofu, cut into cubes. 2. Stir-fry tofu and veggies. 3. Add soy sauce. 4. Serve with rice.'),
  (22, 'Mediterranean Salad', 'Salad, Mediterranean', true, true, 15, 'cucumbers, tomatoes, olives, feta cheese, olive oil', 2, '1. Chop veggies. 2. Mix with olive oil. 3. Add feta cheese. 4. Enjoy as a refreshing salad.'),
  (23, 'Spicy Chicken Tacos', 'Tacos, Spicy', false, true, 30, 'chicken, tortillas, salsa, sour cream, lettuce', 3, '1. Grill chicken. 2. Assemble tacos with salsa and sour cream. 3. Serve with lettuce.'),
  (24, 'Vegetable Fried Rice', 'Fried Rice, Vegetarian', true, true,  45, 'rice, mixed vegetables, soy sauce', 4, '1. Cook rice. 2. Stir-fry veggies. 3. Add soy sauce. 4. Combine for a tasty meal.'),
  (25, 'Greek Gyros', 'Gyros, Greek', false, true,  60, 'lamb, pita bread, yogurt, tomatoes, onions', 5, '1. Grill lamb. 2. Fill pita with lamb, yogurt, and veggies. 3. Enjoy your gyro.'),
  (26, 'Chicken Parmesan', 'Chicken, Italian', false, true, 45, 'chicken breasts, breadcrumbs, marinara sauce, mozzarella', 1, '1. Bread chicken. 2. Top with marinara and mozzarella. 3. Bake for a delicious meal.'),
  (27, 'Vegetarian Sushi Rolls', 'Sushi, Vegetarian', true, true, 60, 'sushi rice, nori, avocado, cucumber, soy sauce', 2, '1. Roll ingredients in nori. 2. Slice into rolls. 3. Dip in soy sauce.'),
  (28, 'Chocolate Chip Cookies', 'Dessert, Cookies', true, false, 30, 'flour, chocolate chips, butter, sugar, eggs', 3, '1. Mix ingredients. 2. Drop dough onto a tray. 3. Bake for delicious cookies.'),
  (29, 'Thai Green Curry', 'Curry, Thai', true, true,  45, 'chicken, green curry paste, coconut milk, vegetables', 4, '1. Cook chicken. 2. Add curry paste and coconut milk. 3. Simmer with veggies.'),
  (30, 'Hawaiian Pizza', 'Pizza, Hawaiian', false, true,  45, 'pizza dough, ham, pineapple, mozzarella cheese', 5, '1. Top dough with ham, pineapple, and cheese. 2. Bake for a tropical pizza.'),
  (31, 'Vegetable Lasagna', 'Italian, Lasagna', true, false,  60, 'lasagna noodles, ricotta cheese, marinara sauce, spinach', 6, '1. Layer ingredients in a dish. 2. Bake for a cheesy lasagna.'),
  (32, 'Shrimp Scampi', 'Seafood, Shrimp', false, true,  30, 'shrimp, garlic, butter, white wine, pasta', 1, '1. Cook shrimp. 2. Sauté garlic and butter. 3. Add white wine. 4. Toss with pasta.'),
  (33, 'Vegetable Tempura', 'Tempura, Vegetarian', true, true,  30, 'assorted vegetables, tempura batter, dipping sauce', 2, '1. Dip veggies in batter. 2. Fry until crispy. 3. Serve with dipping sauce.'),
  (34, 'Ratatouille', 'French, Vegetarian', true, false,  45, 'eggplant, zucchini, tomatoes, onions, herbs', 3, '1. Layer veggies in a dish. 2. Bake with herbs for a flavorful dish.'),
  (35, 'Crispy Onion Rings', 'Appetizer, Onion Rings', true, true,  30, 'onions, flour, breadcrumbs, buttermilk', 4, '1. Coat onions in flour. 2. Dip in buttermilk. 3. Coat with breadcrumbs. 4. Fry until crispy.');
