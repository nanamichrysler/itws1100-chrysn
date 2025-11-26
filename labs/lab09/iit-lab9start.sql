-- create the tables for our movies
CREATE TABLE `movies` (
   `movieid` int(10) unsigned NOT NULL AUTO_INCREMENT,
   `title` varchar(100) NOT NULL,
   `year` char(4) DEFAULT NULL,
   PRIMARY KEY (`movieid`)
);
-- insert data into the tables
INSERT INTO movies
VALUES (1, "Elizabeth", "1998"),
   (2, "Black Widow", "2021"),
   (3, "Oh Brother Where Art Thou?", "2000"),
   (
      4,
      "The Lord of the Rings: The Fellowship of the Ring",
      "2001"
   ),
   (5, "Up in the Air", "2009");

-- create the tables for our actors
CREATE TABLE `actors` (
   `actorsid` int(10) unsigned NOT NULL AUTO_INCREMENT,
   `last_name` varchar(100) NOT NULL,
   `first_names` char(100) DEFAULT NULL,
   `dob` char(10) NOT NULL,
   PRIMARY KEY (`actorsid`)
);
-- insert data into the tablesINSERT INTO actors
INSERT INTO actors 
VALUES 
(1, "Cruise", "Tom", "1962-07-03"),  
(2, "Lawrence", "Jennifer", "1990-08-15"),  
(3, "Dempsey", "Patrick", "1966-01-13"),  
(4, "Johansson", "Scarlett", "1984-11-22"),  
(5, "Clooney", "George", "1959-05-06");

-- create the tables for our movie & actor relationship
CREATE TABLE movies_actors (
  `actorid` int(10) UNSIGNED NOT NULL,
  `movieid` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (actorid, movieid),
  FOREIGN KEY (actorid) REFERENCES actors(actorsid), -- specify relationship
  FOREIGN KEY (movieid) REFERENCES movies(movieid) -- specify relationship
);

-- insert data into the table
INSERT INTO movies_actors
VALUES
(2, 4),
(3, 5),
(5, 5);