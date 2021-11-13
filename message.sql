# Host: localhost  (Version: 5.7.26)
# Date: 2020-12-24 23:10:44
# Generator: MySQL-Front 5.3  (Build 4.234)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "message"
#

CREATE TABLE `message` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `userId` varchar(255) DEFAULT NULL COMMENT '用户id',
  `user` varchar(255) DEFAULT NULL COMMENT '用户名',
  `usermsg` varchar(255) DEFAULT NULL COMMENT '用户留言',
  `time` date DEFAULT NULL COMMENT '留言时间',
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC COMMENT='留言板';
