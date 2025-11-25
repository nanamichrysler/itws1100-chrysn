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


CREATE TABLE `actors` (
   `actorsid` int(10) unsigned NOT NULL AUTO_INCREMENT,
   `last_name` varchar(100) NOT NULL,
   `first_names` varchar(100) NOT NULL,
   `dob` char(10) NOT NULL,
   PRIMARY KEY (`actorsid`)
);
-- insert data into the tablesINSERT INTO actors
INSERT INTO actors
VALUES (1, "Cruise", "Tom", "1962-07-03"),
   (2, "Lawrence", "Jennifer", "1990-08-15"),
   (3, "Watson", "Emma", "1990-04-15"),
   (4, "Dempsey", "Patrick", "1966-01-13"),
   (5, "Jane", "Eric", "1972-11-09");