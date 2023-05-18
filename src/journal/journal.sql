CREATE DATABASE journal;

USE journal;

CREATE TABLE `coffeejournal` (
  `id` int(11) AUTO_INCREMENT PRIMARY KEY,
  `image` VARCHAR(255),
  `aroma` varchar(100),
  `flavor` varchar(100),
  `roaster` varchar(50),
  `roastdate` datetime,
  `producer` varchar(20),
  `price` float,
  `origin` varchar(30),
  `region` varchar(30),
  `altitude` int,
  `varietal` varchar(50),
  `farm` varchar(50),
  `lot` int,
  `note` varchar(255),
  `coffee` float,
  `water` float,
  `cwratio` float,
  `method` varchar(50),
  `extractiontime` int
);