use hanwenxuDB;
--  drop table if exists Sports;
CREATE table Sports(
    sports_type varchar(255),
    primary key(sports_type)
);
 --  drop table if exists Sports_details;
CREATE table Sports_details(
    record_id int not null auto_increment,
    calories_per_hour decimal(10, 2),
	sports_type varchar(255),
	primary key(record_id),
	foreign key(sports_type) references Sports(sports_type) on delete cascade on update cascade
);
 -- DROP TABLE IF EXISTS People_basic_info;
CREATE TABLE People_basic_info(
	people_id INT NOT NULL AUTO_INCREMENT,
    first_name VARCHAR(255),
    last_name VARCHAR(255),
    email VARCHAR(255),
    street VARCHAR(255),
    city VARCHAR(255),
    state VARCHAR(255),
    primary key(people_id)
);
 -- drop table if exists People_health_info;
CREATE table People_health_info(
	people_id INT,
    record_id int auto_increment,
    record_date date,
    age int,
    gender VARCHAR(255),
    blood_type VARCHAR(255),
    weight decimal(10, 2),
    height decimal(10, 2),
    primary key(record_id),
	foreign key(people_id) references People_basic_info(people_id) on delete cascade on update cascade
);
 -- drop table if exists healthy_plan;
CREATE table healthy_plan(
	healthy_plan_id INT NOT NULL AUTO_INCREMENT,
    plan_type varchar(255),
    start_date date,
    end_date date,
    primary key(healthy_plan_id)
);
  -- drop table if exists People_progress;
CREATE table People_progress(
	people_id INT,
    record_date date,
    weight_change decimal(10, 2),
    healthy_index decimal(10, 2),
	primary key(record_date),
	foreign key(people_id) references People_basic_info(people_id) on delete cascade on update cascade
);
 -- drop table if exists meals_details;
CREATE table meals_details(
	meals_details_id INT NOT NULL AUTO_INCREMENT,
    meals_type varchar(255),
    calories_of_a_meal decimal(10, 2),
    primary key (meals_details_id)
);
 -- select * from healthy_plan_details; -- where user_id = 100;
 -- drop table if exists healthy_plan_details;
CREATE table healthy_plan_details(
	match_id int auto_increment,
    meal_id int,
	healthy_plan_id INT,
    user_id int,
    strength int not null,
    /*assume the strength could be represented and quatified by levels from 1 to 10. */
	num_of_meals int,
    total_calories decimal(10, 2),
    primary key(match_id),
	foreign key(meal_id) references meals_details(meals_details_id) on delete cascade on update cascade,
	foreign key(healthy_plan_id) references healthy_plan(healthy_plan_id) on delete cascade on update cascade,
	foreign key(user_id) references People_basic_info(people_id) on delete cascade on update cascade
);
 -- drop table if exists Food;
CREATE table Food(
    category varchar(255),
    primary key (category)
);
-- drop table if exists Nutrition_facts;
CREATE table Nutrition_facts(
	nutrition_facts_id INT auto_increment,
    n_category varchar(255),
    n_name varchar(255),
    calories_per_100g decimal(10, 2),
	protein decimal(10, 2),
    fat decimal(10, 2),
    Carbohydrates decimal(10, 2),
	total_sugars decimal(10, 2),
    dietary_fiber decimal(10, 2),
	primary key (nutrition_facts_id),
	foreign key(n_category) references Food(category) on delete cascade on update cascade
);