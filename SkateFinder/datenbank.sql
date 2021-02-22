

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for categories
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of categories
-- ----------------------------
INSERT INTO `categories` VALUES (1, 'Treppe');
INSERT INTO `categories` VALUES (2, 'Ledge');
INSERT INTO `categories` VALUES (3, 'Rail');

-- ----------------------------
-- Table structure for details
-- ----------------------------
DROP TABLE IF EXISTS `details`;
CREATE TABLE `details`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `images` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `proid` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of details
-- ----------------------------
INSERT INTO `details` VALUES (1, 'IMG_20180316_195222.jpg', 1);
INSERT INTO `details` VALUES (2, 'ol 1.png', 2);


-- ----------------------------
-- Table structure for spot
-- ----------------------------
DROP TABLE IF EXISTS `spot`;
CREATE TABLE `spot`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `ort` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `adresse` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `beleb` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `zustand` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `descrip` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `images` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `categorie` int(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `categorie`(`categorie`) USING BTREE,
  CONSTRAINT `categorie` FOREIGN KEY (`categorie`) REFERENCES `categories` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of spot
-- ----------------------------
INSERT INTO `spot` VALUES (1, 'Biw Treppe', 'Bischofswerda' , 'Bahnhofstraße 1', 'viel los', 'gut', 'kleiner Spot ', 'IMG_20180316_195151.jpg', 2);
INSERT INTO `spot` VALUES (2, 'Oberland 3Stair', 'Ebersbach' , 'Hauptstraße 5', 'viel los', 'mittel', 'am besten am Wochenende gehen ', 'ol2.png', 1);


SET FOREIGN_KEY_CHECKS = 1;
