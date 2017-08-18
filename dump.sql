CREATE TABLE `players` (

`id` int(11) NOT NULL auto_increment,

`firstname` varchar(32) NOT NULL,

`lastname` varchar(32) NOT NULL,

PRIMARY KEY (`id`)

) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;



--

-- Dumping data for table `players`

--



INSERT INTO `players` VALUES(1, 'Mark', 'Essien');

INSERT INTO `players` VALUES(2, 'Tim', 'Cook');

INSERT INTO `players` VALUES(3, 'Neo', 'Ighodaro');

INSERT INTO `players` VALUES(4, 'Michael', 'Okoh');
