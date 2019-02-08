-- ----------------------------
-- Table structure for users
-- ----------------------------
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `client_ip` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- ----------------------------
-- Records 
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'hakan', 'b714337aa8007c433329ef43c7b8252c', 'hakan', 'karataş', null);
