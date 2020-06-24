create database test;

use test;

CREATE TABLE `soccerplayer` (
  `id` int(11) NOT NULL auto_increment,
  `jerseyNumber` int(100) NOT NULL,
  `soccerName` varchar(100) NOT NULL,
  `teamName` varchar(100) NOT NULL,
  PRIMARY KEY  (`id`)
);