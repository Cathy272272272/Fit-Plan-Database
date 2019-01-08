LOAD DATA
	LOCAL INFILE "data/Sports_Data.csv"
    REPLACE INTO TABLE Sports
    FIELDS TERMINATED BY ','
    LINES TERMINATED BY '\r\n'
(sports_type);
LOAD DATA
	LOCAL INFILE "data/Sports_Details_Data.csv"
    REPLACE INTO TABLE Sports_details
    FIELDS TERMINATED BY ','
    LINES TERMINATED BY '\r\n'
(calories_per_hour, sports_type);
LOAD DATA
	LOCAL INFILE "data/People_Basic_Info_Data.csv"
    REPLACE INTO TABLE People_basic_info
    FIELDS TERMINATED BY ','
    LINES TERMINATED BY '\r\n'
(first_name, last_name, email, street, city, state);
LOAD DATA
	LOCAL INFILE "data/People_Health_Info_Data.csv"
    REPLACE INTO TABLE People_health_info
    FIELDS TERMINATED BY ','
    LINES TERMINATED BY '\r\n'
(people_id, record_date, age, gender, blood_type, weight, height);
LOAD DATA
	LOCAL INFILE "data/Healthy_Plan_Data.csv"
    REPLACE INTO TABLE healthy_plan
    FIELDS TERMINATED BY ','
    LINES TERMINATED BY '\r\n'
(plan_type, start_date, end_date);
LOAD DATA
	LOCAL INFILE "data/People_Progress_Data.csv"
    REPLACE INTO TABLE People_progress
    FIELDS TERMINATED BY ','
    LINES TERMINATED BY '\r\n'
(people_id, record_date, weight_change, healthy_index);
LOAD DATA
	LOCAL INFILE "data/Meals_Details_Data.csv"
    REPLACE INTO TABLE meals_details
    FIELDS TERMINATED BY ','
    LINES TERMINATED BY '\r\n'
(meals_type, calories_of_a_meal);
LOAD DATA
	LOCAL INFILE "data/Healthy_Plan_Details_Data.csv"
    REPLACE INTO TABLE healthy_plan_details
    FIELDS TERMINATED BY ','
    LINES TERMINATED BY '\r\n'
(user_id, healthy_plan_id, meal_id, strength, num_of_meals, total_calories);
LOAD DATA
	LOCAL INFILE "data/Food_Data.csv"
    REPLACE INTO TABLE Food
    FIELDS TERMINATED BY ','
    LINES TERMINATED BY '\r\n'
(category);
LOAD DATA
	LOCAL INFILE "data/Nutrition_Facts_Data.csv"
    REPLACE INTO TABLE Nutrition_facts
    FIELDS TERMINATED BY ','
    LINES TERMINATED BY '\r\n'
(n_category, n_name, calories_per_100g, protein, fat, Carbohydrates, total_sugars, dietary_fiber);