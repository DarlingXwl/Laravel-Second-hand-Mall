-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- 主机： 127.0.0.1:3306
-- 生成日期： 2019-06-09 22:34:44
-- 服务器版本： 5.7.24
-- PHP 版本： 7.1.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `shop`
--

-- --------------------------------------------------------

--
-- 表的结构 `goods_info`
--

DROP TABLE IF EXISTS `goods_info`;
CREATE TABLE IF NOT EXISTS `goods_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tid` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `uid` varchar(50) NOT NULL,
  `descr` text,
  `pic` char(37) DEFAULT NULL,
  `state` tinyint(4) DEFAULT NULL,
  `replace` tinyint(4) DEFAULT NULL,
  `replacename` char(255) DEFAULT NULL,
  `num` int(11) DEFAULT NULL,
  `oprice` double(8,2) DEFAULT NULL,
  `addtime` int(11) DEFAULT NULL,
  `price` double(8,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=116 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `goods_info`
--

INSERT INTO `goods_info` (`id`, `tid`, `name`, `uid`, `descr`, `pic`, `state`, `replace`, `replacename`, `num`, `oprice`, `addtime`, `price`) VALUES
(61, 2, '华为 nova 3e 4G+128G 克莱因蓝', '1000009', NULL, '8ffa5fe5ec9942e4108541b32f1d5195.jpg', 1, 2, NULL, 1, 1044.00, 1554616021, 1044.00),
(64, 2, '苹果iPhone XR 128GB国行黄色', '1000009', 'iPhoneXR128GB国行，保修期到明年一月，保护很好，几乎全新，屏幕上的细小划痕是在贴膜上，膜取了就和新的一样。配件都齐全，充电器，数据线，耳机，还有保修卡，送一个手机壳。想要的朋友可以咨询，最好出本地人，见面交易。可以留言，不经常上', 'cd3a571b4ded5ee0cf8c087378b2f033.jpg', 2, 2, NULL, 1, 7999.00, 1554616682, 4999.00),
(63, 2, '手机壳', '1000009', '华为荣耀4X畅玩版手机壳硅胶4x保护套che1-cl10男女软壳送钢化膜，买错了不能退换，只折开了包装没有使用过，可以协商自提或邮寄。', '169bc52dfbee3fbc929c8ad45e133191.jpg', 1, 2, NULL, 1, 12.00, 1554616384, 12.00),
(65, 2, 'Apple iPhone X 64GB 低价甩卖', '1000009', '不议价 谢谢，本人不经常在线，下单前请先联系我，没有回复证明已卖掉', '7710da4b237a3fc46c494288dcb11770.jpg', 1, 2, NULL, 1, 7499.00, 1554618198, 1680.00),
(66, 3, '罗技 MK120 键鼠套装', '1000011', '罗技 MK120 键鼠套套装加一个联想原机鼠标(罗技代工)，都是好得，功能齐全。', '8f8ea551899fb6ebb3801462db8eadc2.jpg', 1, 2, NULL, 1, 120.00, 1554619032, 45.00),
(67, 3, '联想小新潮7000-13', '1000011', '金色i5-8250U/8G/256SSD新旧程度:用的很少，很新品牌型号:联想小新潮7000金色i5-8250U/8G/256SSD', '84b6095f6fd00186715aabe76aedbd14.jpg', 2, 1, 'ipad mini3', 1, 5599.00, 1554619094, 3500.00),
(71, 3, 'V59主板单机广告机主板全新', '1000011', NULL, '55a99de7bc8aed1e54e61634eecebdce.jpg', 1, 2, NULL, 1, 110.00, 1554619350, 85.00),
(72, 2, '出OPPO r9plus', '1000011', '刚买的', 'moren.jpg', 1, 2, NULL, 1, 1500.00, 1551296266, 760.00),
(73, 2, '苹果5se32内存的', '1000011', '几乎全新', 'moren.jpg', 1, 1, NULL, 1, 2400.00, 1551296267, 1200.00),
(74, 2, '出售新苹果7', '1000011', '几乎全新', 'moren.jpg', 1, 1, NULL, 1, 4599.00, 1551296268, 3000.00),
(75, 2, 'R9S新年特别版', '1000011', '几乎全新', 'moren.jpg', 1, 1, NULL, 1, 2400.00, 1551296269, 750.00),
(76, 2, '自用苹果X 国行64', '1000011', '几乎全新', 'moren.jpg', 1, 1, NULL, 1, 6499.00, 1551296270, 4350.00),
(77, 2, '苹果8 64g', '1000011', '几乎全新', 'moren.jpg', 1, 1, NULL, 1, 6500.00, 1551296271, 2190.00),
(78, 2, '刚买一个月的r17', '1000011', '几乎全新', 'moren.jpg', 1, 1, NULL, 1, 1999.00, 1551296272, 1850.00),
(79, 2, '苹果4 95新', '1000011', '几乎全新', 'moren.jpg', 1, 1, NULL, 1, 3599.00, 1551296273, 120.00),
(80, 2, 'iphone7 国行', '1000011', '几乎全新', 'moren.jpg', 1, 1, NULL, 1, 4599.00, 1551296274, 1200.00),
(81, 2, '自用7p 32g 可换苹果', '1000011', '几乎全新', 'moren.jpg', 1, 1, NULL, 1, 2399.00, 1551296275, 2399.00),
(82, 3, '整机1千', '1000011', '几乎全新', 'moren.jpg', 1, 1, NULL, 1, 3599.00, 1551296276, 1000.00),
(59, 2, 'oppoA5', '1000009', '全新未拆封，可提供电子发票，正品专柜购买', '1e2f9d27f078a8e1123a22a5207064f0.jpg', 1, 2, NULL, 1, 1099.00, 1554615124, 900.00),
(58, 2, '360手机 N4S 联发科，功能正常使用，4+32G', '1000009', '功能一切正常，要就拿走，不刀', 'a50e26c2ede708c64ecec9223299226c.jpg', 1, 2, NULL, 1, 1200.00, 1554614780, 468.00),
(83, 3, 'DP488数字音箱处理器', '1000011', '几乎全新', 'moren.jpg', 1, 1, NULL, 1, 2500.00, 1551296277, 1800.00),
(84, 3, '急用钱，高配低价', '1000011', '几乎全新', 'moren.jpg', 1, 1, NULL, 1, 5000.00, 1551296278, 1000.00),
(85, 3, '全新I7 GTX1060可吃鸡', '1000011', '几乎全新', 'moren.jpg', 1, 1, NULL, 1, 1500.00, 1551296279, 900.00),
(86, 3, '自用I5-7400 换笔记本', '1000011', '几乎全新', 'moren.jpg', 1, 1, NULL, 1, 4500.00, 1551296280, 2000.00),
(87, 5, '转让LV女士包', '1000011', '几乎全新', 'moren.jpg', 1, 2, NULL, 1, 1000.00, 1551296281, 680.00),
(88, 5, '全牛皮女包', '1000011', '几乎全新', 'moren.jpg', 1, 2, NULL, 1, 350.00, 1551296282, 150.00),
(89, 5, '利达妮冬毛毛棉鞋女包跟情侣室内家居保暖防滑厚底家用', '1000011', '几乎全新', 'moren.jpg', 1, 2, NULL, 1, 35.00, 1551296283, 29.00),
(90, 5, '斯提亚STIYA网红同款小香风链条小方包', '1000011', '几乎全新', 'moren.jpg', 1, 2, NULL, 1, 199.00, 1551296284, 99.00),
(91, 5, 'sinacova老船长皮具', '1000011', '几乎全新', 'moren.jpg', 1, 2, NULL, 1, 399.00, 1551296285, 268.00),
(92, 5, '酒红色马毛斜挎包', '1000011', '几乎全新', 'moren.jpg', 1, 2, NULL, 1, 410.00, 1551296286, 258.00),
(93, 6, '闲置34码高跟鞋，88元', '1000011', '几乎全新', 'moren.jpg', 1, 2, NULL, 1, 300.00, 1551296287, 88.00),
(94, 6, '2019女单鞋【陶妮所爱哟】', '1000011', '几乎全新', 'moren.jpg', 1, 2, NULL, 1, 99.00, 1551296288, 76.00),
(95, 6, '厚底松糕鞋 女款 38码', '1000011', '几乎全新', 'moren.jpg', 1, 2, NULL, 1, 159.00, 1551296289, 89.00),
(96, 6, '美特斯邦威冬季新款女款鞋子二手转让正品全新不退不换', '1000011', '几乎全新', 'moren.jpg', 1, 2, NULL, 1, 129.00, 1551296290, 100.00),
(97, 6, '闺蜜送我一双新百伦领跑', '1000011', '几乎全新', 'moren.jpg', 1, 2, NULL, 1, 299.00, 1551296291, 199.00),
(98, 6, '欧洲站2018春季街头系带舒适板鞋百搭厚底真皮休闲', '1000011', '几乎全新', 'moren.jpg', 1, 2, NULL, 1, 159.00, 1551296292, 119.00),
(99, 6, '2018新款韩版厚底内增高白搭女鞋头层牛皮小白鞋休', '1000011', '几乎全新', 'moren.jpg', 1, 2, NULL, 1, 299.00, 1551296293, 219.00),
(100, 7, '夏季新款专柜同步女款防晒皮肤衣', '1000011', '几乎全新', 'moren.jpg', 1, 2, NULL, 1, 199.00, 1551296294, 25.00),
(101, 7, '品牌库存休闲运动服饰', '1000011', '几乎全新', 'moren.jpg', 1, 2, NULL, 1, 299.00, 1551296295, 100.00),
(102, 7, '19宿欣冰麻品牌折扣女装爆款供应', '1000011', '几乎全新', 'moren.jpg', 1, 2, NULL, 1, 159.00, 1551296296, 59.00),
(103, 7, '衣服6件60元包邮', '1000011', '几乎全新', 'moren.jpg', 1, 2, NULL, 1, 399.00, 1551296297, 60.00),
(104, 7, '夏季时尚潮流女T恤冰瓷棉面料', '1000011', '几乎全新', 'moren.jpg', 1, 2, NULL, 1, 159.00, 1551296298, 20.00),
(105, 8, '32g金属防水高速U盘假一赔十', '1000011', '几乎全新', 'moren.jpg', 1, 2, NULL, 1, 68.00, 1551296299, 31.00),
(106, 10, '路由器25', '1000011', '几乎全新', 'moren.jpg', 1, 2, NULL, 1, 75.00, 1551296300, 25.00),
(107, 10, '磊科路由器一个', '1000011', '几乎全新', 'moren.jpg', 1, 2, NULL, 1, 49.00, 1551296301, 35.00),
(108, 10, '磊科路由器一个', '1000011', '几乎全新', 'moren.jpg', 1, 2, NULL, 1, 59.00, 1551296302, 30.00),
(109, 11, '转让双门冰箱132升', '1000011', '几乎全新', 'moren.jpg', 1, 2, NULL, 1, 599.00, 1551296303, 450.00),
(110, 11, '搬家转让双门冰箱', '1000011', '几乎全新', 'moren.jpg', 1, 2, NULL, 1, 1000.00, 1551296304, 650.00);

-- --------------------------------------------------------

--
-- 表的结构 `goods_order`
--

DROP TABLE IF EXISTS `goods_order`;
CREATE TABLE IF NOT EXISTS `goods_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `time` varchar(20) CHARACTER SET utf8 NOT NULL,
  `state` tinyint(4) NOT NULL DEFAULT '0',
  `name` char(255) CHARACTER SET utf8 NOT NULL,
  `address` char(255) CHARACTER SET utf8 NOT NULL,
  `price` double(8,2) NOT NULL,
  `gid` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `num` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `goods_order`
--

INSERT INTO `goods_order` (`id`, `time`, `state`, `name`, `address`, `price`, `gid`, `sid`, `uid`, `num`) VALUES
(17, '2019-04-19 22:10:14', 2, '苹果iPhone XR 128GB国行黄色', '4522', 3000.00, 64, 1000009, 1000009, 1),
(16, '2019-04-19 22:10:14', 1, '苹果iPhone XR 128GB国行黄色', '4522', 3000.00, 64, 1000009, 1000009, 1);

-- --------------------------------------------------------

--
-- 表的结构 `goods_type`
--

DROP TABLE IF EXISTS `goods_type`;
CREATE TABLE IF NOT EXISTS `goods_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  `pid` int(11) NOT NULL,
  `path` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=59 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `goods_type`
--

INSERT INTO `goods_type` (`id`, `name`, `pid`, `path`) VALUES
(3, '电脑配件', 1, '1,3,'),
(1, '数码', 0, '1,'),
(4, '女生专区', 0, '4,'),
(2, '手机', 1, '1,2,'),
(5, '包包', 4, '4,5,'),
(6, '女鞋', 4, '4,6,'),
(8, 'U盘', 1, '1,8,'),
(9, '居家用品', 0, '9,'),
(11, '冰箱', 9, '9,11,'),
(12, '交通工具', 0, '12,'),
(13, '自行车1', 12, '12,13,');

-- --------------------------------------------------------

--
-- 表的结构 `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(10) NOT NULL,
  `gid` int(10) NOT NULL,
  `time` char(20) CHARACTER SET utf8 NOT NULL,
  `email` char(40) CHARACTER SET utf8 NOT NULL,
  `message` varchar(255) CHARACTER SET utf8 NOT NULL,
  `state` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `message`
--

INSERT INTO `message` (`id`, `uid`, `gid`, `time`, `email`, `message`, `state`) VALUES
(10, 1000009, 63, '2019-04-19 14:43:41', '1114131537@qq.com', 'Q', 1),
(9, 1000009, 67, '2019-04-17 23:07:32', '1114131537@qq.com', '1 块钱 我要了', 1);

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(18) NOT NULL,
  `pwd` char(255) NOT NULL,
  `state` tinyint(4) NOT NULL,
  `addtime` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1000016 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `username`, `pwd`, `state`, `addtime`) VALUES
(1000009, '123456', 'eyJpdiI6InRDRFdGSmREbkxTQVp4cU5VXC9QU3lBPT0iLCJ2YWx1ZSI6InpVMVRKVXJCbktsTEMwdzlkNGdsenc9PSIsIm1hYyI6IjJkZDgwOTE5MzRiMGJiOGQ2YmNlMzc0MTc4NjAyMzRmYjFjYjEyOGQ0YWE1YjhiNThiMDdmNzNlM2VkNDJkZjkifQ==', 1, 1554606424),
(1000011, '234567', 'eyJpdiI6Ik5KRGc0U2NHZ0tLWTA5NDlnWjZuaFE9PSIsInZhbHVlIjoiUFJ2aVVUMnNFaUdSajE2VWJtM1hkZz09IiwibWFjIjoiNzM3ZmI2OWNmZGUxOTQxMWRiYzNjZmFhZDlkNDhmMGE4NWQzOGQzNTY0ZWIzYmJlMzk4ODg3ZDAyNjNjNzBkOSJ9', 1, 1554618728),
(1000012, '345678', 'eyJpdiI6ImM2YlBCem9ISHMxRFwvVVdVeUhOKzdBPT0iLCJ2YWx1ZSI6IlhackZqVlNveEw2OVduVUthU0g4U2c9PSIsIm1hYyI6IjgzYzlmYWEwZDAwNTNiMjczNDM1NTBmMDZkN2U5OWY2YTFmNzEwYTk5NjFhZDhiZDZmNmNlYmRhYjM5MzA2OWMifQ==', 1, 1554619436),
(1000013, 'darling', 'eyJpdiI6IitONFhaTEEwRFVzMnVrdlhvZytCRWc9PSIsInZhbHVlIjoieXQzQktsTFk1Wk94MGl0aVwvcUNFUGc9PSIsIm1hYyI6IjkxNWYwY2EyMTc5YmEyNmUwNDM5Y2VkNWM4MTAwMDhlNjVmMmFiOTM3MzZiMjA2ZTNlNTA0NDEwZDc5MWE5N2MifQ==', 4, 1555396706),
(1000014, '12345644', 'eyJpdiI6ImpJWFpDMnV6NEpGNFwvcnZHNDJLUlVnPT0iLCJ2YWx1ZSI6IlY5ZFwvUnBKVGhXaDZ3V3RueVFpcTJRPT0iLCJtYWMiOiI4ZjczMDkzNDJjMGQzY2MwMTMzMDY5NzhmZTMzZDYxMjc2NTdjNjZhMDc1MmIzODZlZDM5OGQyNGFjZGQyMTk5In0=', 2, 1555496296),
(1000006, '111413', 'eyJpdiI6IkMrODFLY3Z5YmZwd0Z0NVwvYUxWWmtnPT0iLCJ2YWx1ZSI6IlpsXC9Cb05IT1I3c25zcGw4VVJ3aGp3PT0iLCJtYWMiOiIzNWFiNzU4ODhiZGMxNTU3ZTc1NWEzNDM4ZmQ3MmFmYWJjNDI3ODMzNDZhMjkzMzBjYjU3YjQ4Y2YzYzk0YzI1In0=', 3, 1554605807);

-- --------------------------------------------------------

--
-- 表的结构 `user_info`
--

DROP TABLE IF EXISTS `user_info`;
CREATE TABLE IF NOT EXISTS `user_info` (
  `uid` int(11) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `sex` tinyint(4) DEFAULT '3',
  `age` char(16) DEFAULT NULL,
  `phone` char(11) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `sell` char(255) DEFAULT NULL,
  `username` char(18) DEFAULT NULL,
  `pic` char(37) DEFAULT 'moren.jpg',
  `shopcar` char(255) DEFAULT NULL,
  `addtime` int(11) DEFAULT NULL,
  `state` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `user_info`
--

INSERT INTO `user_info` (`uid`, `name`, `sex`, `age`, `phone`, `email`, `address`, `sell`, `username`, `pic`, `shopcar`, `addtime`, `state`) VALUES
(1000014, NULL, 3, NULL, NULL, NULL, NULL, NULL, '12345644', 'moren.jpg', NULL, 1555496296, 2),
(1000013, '朱友材', 1, '1996-02-07', '13813811338', 'dalingxwl@qq.com', '广东 广州 花都', NULL, 'darling', '0c03b0f0c6704e2d43465abff781d157.jpg', NULL, 1555396706, 4),
(1000012, '蔡泰贤', 1, '1999-03-11', '12812812888', '128128@qq.com', '广东、广州、花都区', NULL, '345678', 'moren.jpg', NULL, 1554619436, 1),
(1000009, '南加宾', 1, '1991-05-08', '13813813888', '123456@qq.com', '广东、广州、花都区', '58,59,60,61,63,64,65,115', '123456', 'ae5d0ee8b37ce45978d3fb96045cfd80.jpg', '70,66,66,65', 1554606424, 1),
(1000011, '刘忙', 1, '1994-01-05', '14714714777', '123666@qq.com', '广州、番禺', '66,67,68,69,70,71', '234567', '9c64dda34ccfcaefdc6dd2498d8a35d0.jpg', NULL, 1554618728, 1),
(1000006, NULL, 3, NULL, NULL, NULL, NULL, NULL, '111413', 'moren.jpg', NULL, 1554605807, 3);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
