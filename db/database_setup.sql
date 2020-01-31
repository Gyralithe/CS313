CREATE TABLE users
(
	id serial NOT NULL PRIMARY KEY,
	username varchar(50) NOT NULL UNIQUE,
	password varchar(50) NOT NULL,
	display_name varchar(50) NOT NULL
);

CREATE TABLE items
(
    id serial NOT NULL PRIMARY KEY,
    name varchar(30) NOT NULL UNIQUE,
    type varchar(20) NOT NULL,
    price int,
    weight real,
    description varchar(500) NOT NULL,
    notes varchar(500),
    user_id int NOT NULL REFERENCES users(id)
);

CREATE TABLE classes
(
    id serial NOT NULL PRIMARY KEY,
    name varchar(20) NOT NULL UNIQUE,
    race_1 int REFERENCES races(id),
    race_2 int REFERENCES races(id),
    race_3 int REFERENCES races(id),
    description varchar(500) NOT NULL,
    notes varchar(500),
    is_multiclassable boolean NOT NULL,
    conditions varchar(100),
    user_id int NOT NULL REFERENCES users(id)
);

CREATE TABLE races
(
    id serial NOT NULL PRIMARY KEY,
    name varchar(20) NOT NULL UNIQUE,
    height_range varchar(30) NOT NULL,
    weight_range varchar(30) NOT NULL,
    average_age varchar(30) NOT NULL,
    description varchar(500) NOT NULL,
    notes varchar(500),
    user_id int NOT NULL REFERENCES users(id)
);

CREATE TABLE settings
(
    id serial NOT NULL PRIMARY KEY,
    name varchar(30) NOT NULL UNIQUE,
    size varchar(30),
    race_1 int REFERENCES races(id),
    race_2 int REFERENCES races(id),
    race_3 int REFERENCES races(id),
    description varchar(500) NOT NULL,
    notes varchar(500),
    user_id int NOT NULL REFERENCES users(id)
);

CREATE TABLE characters
(
    id serial NOT NULL PRIMARY KEY,
    name varchar(30) NOT NULL UNIQUE,
    level int NOT NULL,
    class int NOT NULL REFERENCES classes(id),
    race_1 int NOT NULL REFERENCES races(id),
    race_2 int REFERENCES races(id),
    gender boolean,
    age int,
    height varchar(20),
    weight varchar(20),
    description varchar(500) NOT NULL,
    notes varchar(500),
    weapon_1 int REFERENCES items(id),
    weapon_2 int REFERENCES items(id),
    armor_1 int REFERENCES items(id),
    armor_2 int REFERENCES items(id),
    user_id int NOT NULL REFERENCES users(id)
);

CREATE TABLE campaigns
(
    id serial NOT NULL PRIMARY KEY,
    name varchar(50) NOT NULL UNIQUE,
    description varchar(1000) NOT NULL,
    notes varchar(1000),
    item_1 int REFERENCES items(id),
    item_2 int REFERENCES items(id),
    item_3 int REFERENCES items(id),
    location_1 int REFERENCES settings(id),
    location_2 int REFERENCES settings(id),
    location_3 int REFERENCES settings(id),
    race_1 int REFERENCES races(id),
    race_2 int REFERENCES races(id),
    race_3 int REFERENCES races(id),
    character_1 int REFERENCES characters(id),
    character_2 int REFERENCES characters(id),
    character_3 int REFERENCES characters(id),
    user_id int NOT NULL REFERENCES users(id)
);