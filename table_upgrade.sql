CREATE TABLE IF NOT EXISTS `notepad` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `note` text NOT NULL,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=0 ;