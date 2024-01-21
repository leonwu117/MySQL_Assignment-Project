-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- 主机： localhost
-- 生成日期： 2023-01-08 05:13:49
-- 服务器版本： 5.7.36
-- PHP 版本： 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `library`
--

-- --------------------------------------------------------

--
-- 表的结构 `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `password` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `admin`
--

INSERT INTO `admin` (`admin_id`, `password`) VALUES
(2020910019, '12345678');

-- --------------------------------------------------------

--
-- 表的结构 `charity`
--

CREATE TABLE `charity` (
  `id` int(10) NOT NULL,
  `category` varchar(20) CHARACTER SET utf8mb4 NOT NULL,
  `categoryid` int(10) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `address` text CHARACTER SET utf8mb4 NOT NULL,
  `city` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `state` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `zip` int(10) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `2005revenue` bigint(100) NOT NULL,
  `program` int(100) NOT NULL,
  `admin` int(100) NOT NULL,
  `fundraising` int(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `charity`
--

INSERT INTO `charity` (`id`, `category`, `categoryid`, `name`, `address`, `city`, `state`, `zip`, `telephone`, `2005revenue`, `program`, `admin`, `fundraising`) VALUES
(1005, 'Animals', 10, 'United Nations Foundation', '1225 Connecticut Avenue NW', 'Washington DC11', '111547456', 20036, '202-887-9021', 203355197, 97, 212, 212),
(1004, 'Environment', 11, 'CARE', '151 Ellis Street, NE', 'Atlanta', 'GA', 30303, '12345678901', 655344000, 92, 5, 4),
(1003, 'Animals', 10, 'National Aquarium in Baltimore', '501 East Pratt Street', 'Baltimore', 'MD', 21202, '410-576-3800', 40505622, 72, 25, 3),
(1002, 'Animals', 10, 'The Gorilla Foundation', 'P.O. Box 620530', 'Woodside', 'CA', 94062, '800-634-6273', 1831993, 54, 13, 32),
(1001, 'Animalsss', 10, 'American Society for the Prevention of Cruelty to Animals1', '424 East 92nd Street', 'New York', 'NY', 10128, '800-628-0028', 78544143, 81, 2, 17),
(1006, 'Environment', 11, 'Food for the Hungry', '1224 East Washington Street', 'Phoenix', 'AZ', 85034, '800-248-6437', 73112017, 89, 4, 6),
(10011, 'Animals', 10, 'National Aquarium in Baltimore', '501 East Pratt Street', 'Baltimore', 'MD', 21202, '410-576-3800', 40505622, 72, 25, 3),
(1212, 'Animals', 11, 'HH charity', '11', 'NY1', 'NY1', 101021, '212-998-0124', 1111, 11, 111, 11),
(100111, 'Environment', 11, 'wsoc', 'shandong', 'NY122222', 'NY1', 101021, '212-998-0124', 53871, 112, 78, 34),
(1001123, 'Animals', 10, 'American Society for the Prevention of Cruelty to Animals', '424 East 92nd Street', 'New York', 'NY', 10128, '800-628-0028', 78544143, 81, 2, 17),
(11123, 'Animals', 10, 'American Society for the Prevention of Cruelty to Animals', '424 East 92nd Street', 'New York', 'NY', 10128, '800-628-0028', 78544143, 81, 2, 17),
(12341234, 'Environment', 11, 'bue charity', 'sdfo sdkfn street', 'guangzhou', 'asdf', 101021, '1253467890', 3452, 234, 678, 456),
(12122133, 'Environment', 11, 'opu1', 'isj 16 street', 'qinghai', '1123', 101021, '212-998-0124', 4567, 12322, 234, 248),
(10312, 'Animals', 10, 'gutuli', '212', 'shenzhen', '121212', 1212, '13423239078', 1212, 121, 121, 121),
(329, 'Animals', 10, 'uuty charity', 'asda rt street', 'beijing', '3123', 12312, '212-998-0124', 1235, 123, 567, 3432),
(217, 'Animals', 10, 'wlo charity', 'asda rt street', 'shenzhen', 'NY', 101021, '123132', 325, 694, 274, 732),
(1221, 'Animals', 10, 'wowo charity', 'asda rt street', 'shenzhen', 'NY1', 101021, '212-998-0124', 11, 123, 111, 1111),
(12355, 'Animals', 11, '212', '123', '2342', '3423', 234234, '234234234', 2343, 2342342, 23, 34),
(3332, '23123', 234, '4', '434', '23423', '4', 234, '12345678901', 4, 2342, 234, 324),
(202019, 'Animals', 10, 'wu charity', 'asda rt street', 'shenzhen', '1111', 101021, '212-998-0124', 11, 123, 21, 12);

--
-- 触发器 `charity`
--
DELIMITER $$
CREATE TRIGGER `addLogCharity` AFTER INSERT ON `charity` FOR EACH ROW insert into `logs` value (id,NOW(),concat(new.name,'在',NOW(),'对charity表的id为',new.id,'执行了插入操作'))
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `deleteLogCharity` AFTER DELETE ON `charity` FOR EACH ROW insert into `logs` value (id,NOW(),concat(old.name,'在',NOW(),'对charity表的id为',old.id,'执行了删除操作'))
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `updateLogCharity` AFTER UPDATE ON `charity` FOR EACH ROW insert into `logs` value (id,NOW(),concat(new.name,'在',NOW(),'对charity表的id为',new.id,'执行了更新操作'))
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- 表的结构 `donor`
--

CREATE TABLE `donor` (
  `id` int(11) NOT NULL,
  `lastname` varchar(20) CHARACTER SET utf8mb4 NOT NULL,
  `firstname` varchar(20) CHARACTER SET utf8mb4 NOT NULL,
  `address` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `city` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `state` varchar(20) CHARACTER SET utf8mb4 NOT NULL,
  `zip` int(10) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `category` varchar(20) CHARACTER SET utf8 NOT NULL,
  `categoryid` int(10) NOT NULL,
  `charity_name` varchar(100) NOT NULL,
  `charity_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `donor`
--

INSERT INTO `donor` (`id`, `lastname`, `firstname`, `address`, `city`, `state`, `zip`, `telephone`, `category`, `categoryid`, `charity_name`, `charity_id`) VALUES
(101, 'Hunter', 'Craig', '89 South York Avenue123', 'NY12', 'NY1', 10086, '1221212', 'Environment', 11, 'CARE', 1004),
(102, 'Fleisher', 'Emily', '1001 Connecticut Ave', 'Washington DC', 'DC', 21388, '301-765-4523', 'Environment', 11, 'United Nations Foundation', 1005),
(103, 'Fleisher', 'Peggy', '1001 Connecticut Ave', 'Washington DC', 'DC', 21388, '301-765-4524', 'Environment', 11, 'United Nations Foundation', 1005),
(104, 'john', 'sanchez', '245 South Park Ave', 'Newark', 'DE', 19711, '302-998-6754', 'Animals', 10, 'American Society for the Prevention of Cruelty to Animals', 1001),
(105, 'west1111', 'Johnny', '56 W 103 St', 'NY', 'NY', 10102, '212-998-0987', 'Animals', 10, 'The Gorilla Foundation', 1002),
(106, 'West', 'Mary', '56 W 103 St', 'Chili', 'NY', 10102, '212-998-0987', 'Animals', 0, 'National Aquarium in Baltimore', 1006),
(107, 'cool', 'dj', '900-A South Chapel St1111', 'Newark', 'DE', 19711, '302-737-0098', 'Animals', 10, 'American Society for the Prevention of Cruelty to Animals', 1001),
(108, 'Trent', 'Barbara', '713 Bluefield Road', 'Chili', 'NY', 14526, '585-998-8362', 'Animals', 10, 'The Gorilla Foundation', 1002),
(109, 'Merit', 'Arthur', '89-C Pratt Street', 'Baltimore', 'MD', 21001, '301-545-8726', 'Environment', 11, 'Food for the Hungry', 1006),
(110, 'Richards', 'Bernie', '89 E. 5th Ave', 'Baltimore', 'MD', 21001, '301-654-9823', 'Environment', 11, 'CARE', 1004),
(111, 'Cressman', 'Anita', '34 Delaware Ave', 'Newark', 'DE', 19711, '302-776-4536', 'Environment', 11, 'United Nations Foundation', 1005),
(121, 'Hunter1', 'Craig1', '89 South York Avenue1', 'NY1', 'NY1', 101021, '212-998-0124', 'Environment', 11, 'HH charity', 1212),
(122, 'Hunter1	', 'Craig1', '89 South York Avenue1', 'NY1', 'NY1', 101021, '212-998-0124', 'Environment', 11, 'HH charity', 1212),
(131, 'cen', 'loow', 'wdadsad 13st', 'NY1', 'NY1', 101021, '212-998-0124', 'Animals', 10, 'opu', 12122133),
(177, 'wu1	', 'leon', '89 South York Avenue1', 'shenzhen', 'NY1', 21212, '212-998-0124', '11', 1111, 'American Society for the Prevention of Cruelty to Animals', 1001),
(234, 'wuwu', 'leon', '1001 Connecticut Ave1', 'qinghai', '234', 23234, '212-998-0124222222', '4234', 242, 'American Society for the Prevention of Cruelty to Animals', 1001),
(421, 'Fleisher	', 'leon', '89 South York Avenue1', 'beijing', 'NY1', 101021, '212-998-0124', 'Animals', 10, 'American Society for the Prevention of Cruelty to Animals', 1001),
(1101, 'wu1212', 'leon', 'china', 'shenzhen', 'guangdong', 10086, '12345678901', 'Environment', 11, 'United Nations Foundation', 1005),
(1212, 'Hunter1', 'Craig1', '89 South York Avenue1', 'NY1', 'NY1', 101021, '212-998-0124', 'Animals', 10, 'Food for the Hungry', 1006),
(4123, '123', '312', '23', '23', '123', 12312, '123', '123', 123, '1231', 2312),
(23423, '234', '4', '452', '2224', '234234', 42, '234', '234423', 234232, '34', 42343),
(44441212, '4233', '342', '234ww23', '234', '2342', 232343, '2344', '234', 23423, '23423', 23);

--
-- 触发器 `donor`
--
DELIMITER $$
CREATE TRIGGER `addLogDonor` AFTER INSERT ON `donor` FOR EACH ROW insert into `logs` value (new.id,NOW(),concat(new.lastname,new.firstname,'在',NOW(),'对donor表的id为',new.id,'执行了插入操作'))
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `deleteLogDonor` AFTER DELETE ON `donor` FOR EACH ROW insert into `logs` value (id,NOW(),concat(old.lastname,old.firstname,'在',NOW(),'对cdonor表的id为',old.id,'执行了删除操作'))
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `updateLogDonor` AFTER UPDATE ON `donor` FOR EACH ROW insert into `logs` value (id,NOW(),concat(new.lastname,new.firstname,'在',NOW(),'对donor表的id为',new.id,'执行了更新操作'))
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- 表的结构 `gift`
--

CREATE TABLE `gift` (
  `donorid` int(11) NOT NULL,
  `charity_id` int(20) NOT NULL,
  `donorlastname` varchar(100) CHARACTER SET latin1 NOT NULL,
  `donorfirstname` varchar(100) CHARACTER SET latin1 NOT NULL,
  `date` date NOT NULL,
  `amount` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `gift`
--

INSERT INTO `gift` (`donorid`, `charity_id`, `donorlastname`, `donorfirstname`, `date`, `amount`) VALUES
(104, 1001, 'john', 'sanchez', '2111-10-16', 600),
(107, 1001, 'cool', 'dj', '2023-02-12', 50),
(105, 1002, 'west', 'Johnny', '2009-12-26', 200),
(105, 1002, 'west', 'Johnny', '2009-12-26', 200),
(108, 1002, 'Trent', 'Barbara', '2010-04-14', 75),
(106, 1003, 'West', 'Mary', '2023-04-14', 125),
(108, 1002, 'Trent', 'Barbara', '2010-04-14', 75),
(103, 1004, 'Fleisher', 'Peggy', '2010-03-01', 15),
(110, 1005, 'Richards', 'Bernie', '2033-11-30', 800),
(102, 1005, 'Fleisher', 'Emily', '2010-03-16', 50),
(103, 1004, 'Fleisher', 'Peggy', '2010-03-01', 15),
(111, 1004, 'Cressman', 'Anita', '2010-03-01', 15),
(103, 1004, 'Fleisher', 'Peggy', '2010-03-01', 15),
(109, 1006, 'Merit', 'Arthur', '2039-03-01', 60),
(101, 1004, 'Hunter', 'Craig', '2010-03-18', 60012),
(101, 1004, 'Hunter', 'Craig', '2010-03-18', 60012),
(104, 1001, 'john', 'sanchez', '2111-10-16', 600),
(102, 1005, 'Fleisher', 'Emily', '2010-03-16', 50),
(12, 1001, 'wu', 'llle', '2010-03-18', 600),
(101, 1004, 'Hunter', 'Craig', '2010-03-18', 60012),
(103, 1004, 'Fleisher', 'Peggy', '2010-03-01', 15),
(101, 1004, 'Hunter', 'Craig', '2010-03-18', 60012),
(102, 1005, 'Fleisher', 'Emily', '2010-03-16', 50),
(110, 1005, 'Richards', 'Bernie', '2033-11-30', 800),
(1101, 1005, 'wu1212', 'leon', '2010-03-20', 600),
(101, 1004, 'Hunter', 'Craig', '2010-03-18', 60012),
(122, 1212, 'Hunter1	', 'Craig1', '2023-01-04', 78),
(177, 1001, 'wuwu', 'leon', '2023-01-08', 12),
(6352112, 0, 'wuwu', 'Craig1', '2023-01-07', 0),
(2347777, 0, 'Hunter1', 'oow', '2023-01-07', 0),
(104, 1001, 'john', 'sanchez', '2111-10-16', 600),
(104, 1001, 'john', 'sanchez', '2111-10-16', 600),
(104, 1001, 'john', 'sanchez', '2111-10-16', 600),
(104, 1001, 'john', 'sanchez', '2111-10-16', 600),
(104, 1001, 'john', 'sanchez', '2111-10-16', 600),
(177, 1001, 'wuwu', 'leon', '2023-01-07', 153),
(110, 1005, 'Richards', 'Bernie', '2033-11-30', 12),
(106, 1003, 'West', 'Mary', '2023-04-14', 125),
(106, 1003, 'West', 'Mary', '2010-04-14', 600),
(34521312, 0, 'Hunter1', 'Craig1', '2023-01-07', 0),
(64523, 0, 'Hunter1', 'Craig1', '2023-01-07', 0),
(109, 1006, 'Merit', 'Arthur', '2039-03-01', 120),
(107, 1001, 'cool', 'dj', '2010-02-12', 300),
(234123123, 0, '1233', '123', '2023-01-08', 0),
(104, 1001, 'john', 'sanchez', '2111-10-16', 123),
(109, 1006, 'Merit', 'Arthur', '2039-03-01', 12),
(109, 1006, 'Merit', 'Arthur', '2012-03-01', 300),
(104, 1001, 'john', 'sanchez', '2111-10-16', 600),
(12312399, 0, '999999999999', '12342', '2023-01-08', 0),
(110, 1005, 'Richards', 'Bernie', '2009-11-30', 21),
(23423, 0, '234', '4', '2023-01-08', 0),
(44441212, 0, '4233', '342', '2023-01-08', 0),
(234, 1001, 'wuwu', 'leon', '2023-01-08', 0),
(4123, 0, '123', '312', '2023-01-08', 0),
(234, 1001, 'wuwu', 'leon', '2023-01-08', 23);

--
-- 触发器 `gift`
--
DELIMITER $$
CREATE TRIGGER `addLogGift` AFTER INSERT ON `gift` FOR EACH ROW insert into `logs` value (id,NOW(),concat('在',NOW(),'对gift表的id为',new.donorid,'执行了插入操作'))
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `deleteLogGift` AFTER DELETE ON `gift` FOR EACH ROW insert into `logs` value (old.donorid,NOW(),concat('在',NOW(),'对gift表的id为',old.donorid,'执行了插入操作'))
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `updateLogGift` AFTER UPDATE ON `gift` FOR EACH ROW insert into `logs` value (new.donorid,NOW(),concat('在',NOW(),'对gift表的id为',new.donorid,'执行了更新操作'))
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- 表的结构 `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL COMMENT '唯一标识',
  `date` datetime NOT NULL COMMENT '操作时间',
  `test` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '操作说明'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `logs`
--

INSERT INTO `logs` (`id`, `date`, `test`) VALUES
(121233, '2023-01-05 02:34:28', '111在2023-01-05 02:34:28对charity表的id为121233执行了插入操作'),
(1005, '2023-01-05 03:19:33', 'United Nations Foundation1在2023-01-05 03:19:33对charity表的id为1005执行了修改操作'),
(1212345, '2023-01-05 03:21:00', '12121在2023-01-05 03:21:00对charity表的id为1212345执行了删除操作'),
(1212346, '2023-01-05 13:28:49', 'Hunter1Craig1111在2023-01-05 13:28:49对donor表的id为100111112执行了插入操作'),
(1212347, '2023-01-05 13:31:04', 'HunterCraig1在2023-01-05 13:31:04对donor表的id为101执行了更新操作'),
(1212348, '2023-01-05 13:31:39', 'wu1212leon在2023-01-05 13:31:39对donor表的id为1101执行了更新操作'),
(1212349, '2023-01-05 13:40:07', 'Hunter1Craig1111在2023-01-05 13:40:07对donor表的id为100111112执行了删除操作'),
(1212350, '2023-01-05 13:41:05', 'wuwullle在2023-01-05 13:41:05对donor表的id为121212执行了插入操作'),
(1212351, '2023-01-05 13:41:16', 'wuwullle在2023-01-05 13:41:16对donor表的id为121212执行了删除操作'),
(1001, '2023-01-05 13:44:53', 'American Society for the Prevention of Cruelty to Animals在2023-01-05 13:44:53对charity表的id为1001执行了修改操作'),
(1212352, '2023-01-05 13:45:38', 'cooldj在2023-01-05 13:45:38对donor表的id为107执行了更新操作'),
(121209, '2023-01-05 13:48:37', 'wuwu12在2023-01-05 13:48:37对donor表的id为121209执行了插入操作'),
(102, '2023-01-05 14:04:26', '在2023-01-05 14:04:26对gift表的id为102执行了插入操作'),
(12, '2023-01-05 14:05:24', '在2023-01-05 14:05:24对gift表的id为12执行了插入操作'),
(101, '2023-01-05 14:08:23', '在2023-01-05 14:08:23对gift表的id为101执行了插入操作'),
(20170001, '2023-01-05 14:21:11', '20170001在2023-01-05 14:21:11对admin表的id为20170001执行了更新密码操作'),
(2020910019, '2023-01-05 14:21:51', '2020910019在2023-01-05 14:21:51对admin表的id为2020910019执行了更新密码操作'),
(127001, '2023-01-05 14:27:07', '127001在2023-01-05 14:27:07对admin表的id为127001执行了更新密码操作'),
(1004, '2023-01-05 14:41:58', 'CARE在2023-01-05 14:41:58对charity表的id为1004执行了修改操作'),
(105, '2023-01-05 14:44:31', 'west1111Johnny在2023-01-05 14:44:31对donor表的id为105执行了更新操作'),
(12122122, '2023-01-05 14:46:46', '21212121在2023-01-05 14:46:46对donor表的id为12122122执行了插入操作'),
(222111, '2023-01-05 14:47:13', '12122在2023-01-05 14:47:13对charity表的id为222111执行了插入操作'),
(10011122, '2023-01-05 14:50:20', '12121在2023-01-05 14:50:20对charity表的id为10011122执行了插入操作'),
(1003, '2023-01-05 14:51:23', 'National Aquarium in Baltimore在2023-01-05 14:51:23对charity表的id为1003执行了更新操作'),
(123123, '2023-01-05 14:52:42', '123在2023-01-05 14:52:42对charity表的id为123123执行了插入操作'),
(2020910020, '2023-01-05 14:53:33', '12121在2023-01-05 14:53:33对charity表的id为10011122执行了删除操作'),
(1231234, '2023-01-05 14:54:39', '123123在2023-01-05 14:54:39对donor表的id为1231234执行了插入操作'),
(1212212, '2023-01-05 14:56:42', 'Hunter12345612312在2023-01-05 14:56:42对donor表的id为1212212执行了插入操作'),
(2020910021, '2023-01-05 14:58:51', '21212121在2023-01-05 14:58:51对charity表的id为12122122执行了删除操作'),
(12221, '2023-01-05 15:00:18', '1211212在2023-01-05 15:00:18对donor表的id为12221执行了插入操作'),
(2020910115, '2023-01-07 00:02:37', 'Fleisherleon在2023-01-07 00:02:37对donor表的id为421执行了更新操作'),
(1111111, '2023-01-05 15:02:09', '11111在2023-01-05 15:02:09对donor表的id为1111111执行了插入操作'),
(2020910114, '2023-01-07 00:02:21', 'cenloow在2023-01-07 00:02:21对donor表的id为131执行了更新操作'),
(104, '2023-01-05 15:08:00', 'john123sanchez在2023-01-05 15:08:00对donor表的id为104执行了更新操作'),
(12123, '2023-01-05 15:12:02', '31在2023-01-05 15:12:02对charity表的id为12123执行了插入操作'),
(100111, '2023-01-05 15:13:08', '111在2023-01-05 15:13:08对charity表的id为100111执行了更新操作'),
(2020910113, '2023-01-06 23:59:34', 'Hunter1Craig1在2023-01-06 23:59:34对donor表的id为122执行了更新操作'),
(12332, '2023-01-05 15:15:48', 'Hunter1Craig1在2023-01-05 15:15:48对donor表的id为12332执行了插入操作'),
(2020910112, '2023-01-06 23:59:04', 'Hunter1Craig1在2023-01-06 23:59:04对donor表的id为121执行了更新操作'),
(103, '2023-01-05 15:24:44', '在2023-01-05 15:24:44对gift表的id为103执行了插入操作'),
(2020910111, '2023-01-06 23:57:57', 'CressmanAnita在2023-01-06 23:57:57对donor表的id为111执行了更新操作'),
(2020910110, '2023-01-06 23:57:18', 'RichardsBernie在2023-01-06 23:57:18对donor表的id为110执行了更新操作'),
(2020910030, '2023-01-05 15:30:16', '在2023-01-05 15:30:16对gift表的id为101执行了插入操作'),
(1299, '2023-01-05 15:31:36', 'wuwuleon在2023-01-05 15:31:36对donor表的id为1299执行了插入操作'),
(2020910109, '2023-01-06 23:56:42', 'MeritArthur在2023-01-06 23:56:42对donor表的id为109执行了更新操作'),
(2020910108, '2023-01-06 23:56:13', 'TrentBarbara在2023-01-06 23:56:13对donor表的id为108执行了更新操作'),
(2020910107, '2023-01-06 23:55:44', 'cooldj在2023-01-06 23:55:44对donor表的id为107执行了更新操作'),
(106, '2023-01-05 15:32:41', '在2023-01-05 15:32:41对gift表的id为106执行了更新操作'),
(2020910035, '2023-01-05 15:33:37', '在2023-01-05 15:33:37对gift表的id为102执行了插入操作'),
(1012, '2023-01-05 15:36:44', '在2023-01-05 15:36:44对gift表的id为1012执行了更新操作'),
(2020910036, '2023-01-05 15:37:15', '在2023-01-05 15:37:15对gift表的id为101执行了更新操作'),
(2020910037, '2023-01-05 15:37:15', '在2023-01-05 15:37:15对gift表的id为101执行了更新操作'),
(2020910038, '2023-01-05 15:37:15', '在2023-01-05 15:37:15对gift表的id为101执行了更新操作'),
(2020910039, '2023-01-05 15:37:15', '在2023-01-05 15:37:15对gift表的id为101执行了更新操作'),
(2020910040, '2023-01-05 15:39:38', '在2023-01-05 15:39:38对gift表的id为110执行了插入操作'),
(12122100, '2023-01-05 15:42:26', 'Hunter1Craig1111在2023-01-05 15:42:26对donor表的id为12122100执行了插入操作'),
(2020910041, '2023-01-05 15:43:00', '在2023-01-05 15:43:00对gift表的id为1101执行了插入操作'),
(2020910042, '2023-01-05 22:13:27', 'CARE在2023-01-05 22:13:27对charity表的id为1004执行了更新操作'),
(10312, '2023-01-05 22:13:46', '12在2023-01-05 22:13:46对charity表的id为10312执行了插入操作'),
(2020910043, '2023-01-05 22:14:18', 'HunterCraig1在2023-01-05 22:14:18对donor表的id为101执行了更新操作'),
(2020910044, '2023-01-06 01:51:51', 'United Nations Foundation1在2023-01-06 01:51:51对charity表的id为1005执行了更新操作'),
(98012, '2023-01-06 01:52:11', '1212在2023-01-06 01:52:11对charity表的id为98012执行了插入操作'),
(2020910106, '2023-01-06 23:54:30', 'WestMary在2023-01-06 23:54:30对donor表的id为106执行了更新操作'),
(2020910105, '2023-01-06 23:51:21', 'west1111Johnny在2023-01-06 23:51:21对donor表的id为105执行了更新操作'),
(2020910104, '2023-01-06 23:50:44', 'john123sanchez在2023-01-06 23:50:44对donor表的id为104执行了更新操作'),
(980123, '2023-01-06 01:53:56', 'Hunter1llle在2023-01-06 01:53:56对donor表的id为980123执行了插入操作'),
(2020910103, '2023-01-06 23:50:08', 'FleisherPeggy在2023-01-06 23:50:08对donor表的id为103执行了更新操作'),
(2020910102, '2023-01-06 23:47:35', 'FleisherEmily在2023-01-06 23:47:35对donor表的id为102执行了更新操作'),
(2020910101, '2023-01-06 23:46:53', 'HunterCraig在2023-01-06 23:46:53对donor表的id为101执行了更新操作'),
(2020910100, '2023-01-06 23:46:20', 'FleisherEmily在2023-01-06 23:46:20对donor表的id为102执行了更新操作'),
(2020910099, '2023-01-06 23:44:20', 'HunterCraig在2023-01-06 23:44:20对donor表的id为101执行了更新操作'),
(2020910098, '2023-01-06 23:40:27', 'john123sanchez在2023-01-06 23:40:27对donor表的id为104执行了更新操作'),
(2020910056, '2023-01-06 20:42:37', 'WestMary在2023-01-06 20:42:37对donor表的id为106执行了更新操作'),
(2020910097, '2023-01-06 23:35:33', 'HunterCraig在2023-01-06 23:35:33对donor表的id为101执行了更新操作'),
(217, '2023-01-06 23:10:21', 'wlo charity在2023-01-06 23:10:21对charity表的id为217执行了插入操作'),
(2020910096, '2023-01-06 23:09:29', 'ww charity在2023-01-06 23:09:29对charity表的id为239执行了删除操作'),
(2020910090, '2023-01-06 22:41:53', 'HH charity在2023-01-06 22:41:53对charity表的id为1212执行了更新操作'),
(2020910089, '2023-01-06 22:41:47', 'The Gorilla Foundation在2023-01-06 22:41:47对charity表的id为1002执行了更新操作'),
(2020910088, '2023-01-06 22:41:27', 'United Nations Foundation1在2023-01-06 22:41:27对charity表的id为1005执行了更新操作'),
(2020910087, '2023-01-06 22:41:24', 'American Society for the Prevention of Cruelty to Animals在2023-01-06 22:41:24对charity表的id为1001123执行了更新操作'),
(2020910066, '2023-01-06 20:42:37', 'wuwuleon在2023-01-06 20:42:37对donor表的id为1299执行了更新操作'),
(2020910067, '2023-01-06 20:42:37', '1211212在2023-01-06 20:42:37对donor表的id为12221执行了更新操作'),
(2020910068, '2023-01-06 20:42:37', 'wuCraig1在2023-01-06 20:42:37对donor表的id为12345执行了更新操作'),
(2020910069, '2023-01-06 20:42:37', 'wuwu12在2023-01-06 20:42:37对donor表的id为121209执行了更新操作'),
(131, '2023-01-06 20:47:08', 'cenloow在2023-01-06 20:47:08对donor表的id为131执行了插入操作'),
(2020910070, '2023-01-06 20:56:57', 'wuwu12在2023-01-06 20:56:57对donor表的id为121209执行了更新操作'),
(2020910071, '2023-01-06 20:57:00', 'wuwu12在2023-01-06 20:57:00对cdonor表的id为121209执行了删除操作'),
(2020910072, '2023-01-06 22:04:39', 'United Nations Foundation1在2023-01-06 22:04:39对charity表的id为1005执行了更新操作'),
(2020910073, '2023-01-06 22:05:15', 'HH charity在2023-01-06 22:05:15对charity表的id为1212执行了更新操作'),
(2020910074, '2023-01-06 22:14:20', 'United Nations Foundation1在2023-01-06 22:14:20对charity表的id为1005执行了更新操作'),
(2020910075, '2023-01-06 22:14:29', 'CARE11在2023-01-06 22:14:29对charity表的id为1004执行了更新操作'),
(2020910076, '2023-01-06 22:14:36', 'CARE在2023-01-06 22:14:36对charity表的id为1004执行了更新操作'),
(2020910077, '2023-01-06 22:15:24', 'gutuli在2023-01-06 22:15:24对charity表的id为10312执行了更新操作'),
(2020910078, '2023-01-06 22:16:30', 'wsoc在2023-01-06 22:16:30对charity表的id为100111执行了更新操作'),
(12122133, '2023-01-06 22:17:48', 'opu在2023-01-06 22:17:48对charity表的id为12122133执行了更新操作'),
(329, '2023-01-06 22:18:51', 'uuty charity在2023-01-06 22:18:51对charity表的id为329执行了插入操作'),
(12341234, '2023-01-06 22:20:21', 'bue charity在2023-01-06 22:20:21对charity表的id为12341234执行了更新操作'),
(2020910095, '2023-01-06 22:50:07', 'HunterCraig在2023-01-06 22:50:07对donor表的id为101执行了更新操作'),
(421, '2023-01-06 22:49:55', 'Fleisherleon在2023-01-06 22:49:55对donor表的id为421执行了插入操作'),
(239, '2023-01-06 22:49:12', 'ww charity在2023-01-06 22:49:12对charity表的id为239执行了插入操作'),
(2020910195, '2023-01-07 23:02:22', 'Hunter1oow在2023-01-07 23:02:22对cdonor表的id为2347777执行了删除操作'),
(2020910194, '2023-01-07 23:02:15', '在2023-01-07 23:02:15对gift表的id为2347777执行了插入操作'),
(2020910193, '2023-01-07 23:00:02', 'wu	llle123在2023-01-07 23:00:02对donor表的id为122352111执行了更新操作'),
(1002, '2023-01-06 22:33:10', 'The Gorilla Foundation在2023-01-06 22:33:10对charity表的id为1002执行了更新操作'),
(235, '2023-01-06 22:34:10', 'qwe charity在2023-01-06 22:34:10对charity表的id为235执行了插入操作'),
(2347777, '2023-01-07 23:02:15', 'Hunter1oow在2023-01-07 23:02:15对donor表的id为2347777执行了插入操作'),
(854, '2023-01-06 22:37:58', 'iiu charity在2023-01-06 22:37:58对charity表的id为854执行了插入操作'),
(1001123, '2023-01-06 22:38:10', 'American Society for the Prevention of Cruelty to Animals在2023-01-06 22:38:10对charity表的id为1001123执行了更新操作'),
(1006, '2023-01-06 22:38:37', 'Food for the Hungry在2023-01-06 22:38:37对charity表的id为1006执行了更新操作'),
(2020910192, '2023-01-07 22:59:35', 'wuwuCraig1在2023-01-07 22:59:35对cdonor表的id为6352112执行了删除操作'),
(2020910191, '2023-01-07 22:59:11', '在2023-01-07 22:59:11对gift表的id为6352112执行了插入操作'),
(6352112, '2023-01-07 22:59:11', 'wuwuCraig1在2023-01-07 22:59:11对donor表的id为6352112执行了插入操作'),
(2020910190, '2023-01-07 22:57:16', 'wlo charity在2023-01-07 22:57:16对charity表的id为217执行了更新操作'),
(2020910189, '2023-01-07 22:57:06', 'wlo charity在2023-01-07 22:57:06对charity表的id为217执行了更新操作'),
(2020910188, '2023-01-07 22:56:52', '11在2023-01-07 22:56:52对charity表的id为98762执行了删除操作'),
(6712, '2023-01-07 00:15:29', 'Hunter1Craig1111在2023-01-07 00:15:29对donor表的id为6712执行了插入操作'),
(2020910187, '2023-01-07 22:56:40', '11在2023-01-07 22:56:40对charity表的id为98762执行了插入操作'),
(2020910186, '2023-01-07 21:09:44', 'MeritArthur在2023-01-07 21:09:44对donor表的id为109执行了更新操作'),
(2020910185, '2023-01-07 21:02:12', 'Hunter1Craig1在2023-01-07 21:02:12对donor表的id为121执行了更新操作'),
(2020910184, '2023-01-07 20:56:37', 'RichardsBernie在2023-01-07 20:56:37对donor表的id为110执行了更新操作'),
(2020910183, '2023-01-07 20:56:23', 'RichardsBernie12345在2023-01-07 20:56:23对donor表的id为110执行了更新操作'),
(2020910174, '2023-01-07 20:45:32', 'United Nations Foundation123在2023-01-07 20:45:32对charity表的id为1005执行了更新操作'),
(2020910175, '2023-01-07 20:45:41', 'United Nations Foundation在2023-01-07 20:45:41对charity表的id为1005执行了更新操作'),
(2020910176, '2023-01-07 20:47:53', 'wlo charity在2023-01-07 20:47:53对charity表的id为13427执行了插入操作'),
(2020910177, '2023-01-07 20:48:07', 'wlo charity在2023-01-07 20:48:07对charity表的id为13427执行了删除操作'),
(2020910178, '2023-01-07 20:48:34', 'United Nations Foundation在2023-01-07 20:48:34对charity表的id为1005执行了更新操作'),
(964, '2023-01-07 20:49:32', 'liufeng在2023-01-07 20:49:32对donor表的id为964执行了插入操作'),
(2020910179, '2023-01-07 20:49:32', '在2023-01-07 20:49:32对gift表的id为964执行了插入操作'),
(2020910180, '2023-01-07 20:50:15', 'liufeng在2023-01-07 20:50:15对donor表的id为964执行了更新操作'),
(2020910181, '2023-01-07 20:50:30', 'liufeng123在2023-01-07 20:50:30对donor表的id为964执行了更新操作'),
(2020910182, '2023-01-07 20:54:44', 'liufeng123在2023-01-07 20:54:44对cdonor表的id为964执行了删除操作'),
(2020910217, '2023-01-07 23:57:06', '123在2023-01-07 23:57:06对charity表的id为234213执行了更新操作'),
(2020910216, '2023-01-07 23:56:42', '123在2023-01-07 23:56:42对charity表的id为234213执行了插入操作'),
(2020910215, '2023-01-07 23:55:00', '在2023-01-07 23:55:00对gift表的id为109执行了插入操作'),
(2020910214, '2023-01-07 23:53:20', 'Hunter1Craig1在2023-01-07 23:53:20对cdonor表的id为64523执行了删除操作'),
(2020910213, '2023-01-07 23:53:16', '在2023-01-07 23:53:16对gift表的id为64523执行了插入操作'),
(64523, '2023-01-07 23:53:16', 'Hunter1Craig1在2023-01-07 23:53:16对donor表的id为64523执行了插入操作'),
(2020910212, '2023-01-07 23:52:50', '123123123在2023-01-07 23:52:50对cdonor表的id为13877执行了删除操作'),
(2020910211, '2023-01-07 23:52:39', 'wuceshi在2023-01-07 23:52:39对donor表的id为1277执行了更新操作'),
(2020910210, '2023-01-07 23:52:27', 'wu123ceshi在2023-01-07 23:52:27对donor表的id为1277执行了更新操作'),
(2020910209, '2023-01-07 23:52:13', 'Hunter1Craig1在2023-01-07 23:52:13对cdonor表的id为17822执行了删除操作'),
(2020910208, '2023-01-07 23:52:05', 'Hunter1Craig1在2023-01-07 23:52:05对cdonor表的id为34521312执行了删除操作'),
(2020910196, '2023-01-07 23:24:03', '在2023-01-07 23:24:03对gift表的id为104执行了插入操作'),
(2020910197, '2023-01-07 23:25:01', '在2023-01-07 23:25:01对gift表的id为104执行了插入操作'),
(2020910198, '2023-01-07 23:25:57', '在2023-01-07 23:25:57对gift表的id为104执行了插入操作'),
(2020910199, '2023-01-07 23:26:44', '在2023-01-07 23:26:44对gift表的id为104执行了插入操作'),
(2020910200, '2023-01-07 23:26:50', '在2023-01-07 23:26:50对gift表的id为104执行了插入操作'),
(2020910201, '2023-01-07 23:28:06', '在2023-01-07 23:28:06对gift表的id为177执行了插入操作'),
(2020910202, '2023-01-07 23:29:41', '在2023-01-07 23:29:41对gift表的id为110执行了插入操作'),
(2020910203, '2023-01-07 23:30:03', '在2023-01-07 23:30:03对gift表的id为106执行了插入操作'),
(2020910204, '2023-01-07 23:30:37', '在2023-01-07 23:30:37对gift表的id为106执行了插入操作'),
(2020910205, '2023-01-07 23:51:12', '11在2023-01-07 23:51:12对charity表的id为99277执行了插入操作'),
(34521312, '2023-01-07 23:51:40', 'Hunter1Craig1在2023-01-07 23:51:40对donor表的id为34521312执行了插入操作'),
(2020910206, '2023-01-07 23:51:40', '在2023-01-07 23:51:40对gift表的id为34521312执行了插入操作'),
(2020910207, '2023-01-07 23:52:01', 'wu	llle123在2023-01-07 23:52:01对cdonor表的id为122352111执行了删除操作'),
(13877, '2023-01-07 15:44:17', '123123123在2023-01-07 15:44:17对donor表的id为13877执行了插入操作'),
(2020910221, '2023-01-08 00:21:27', '123在2023-01-08 00:21:27对charity表的id为123993执行了删除操作'),
(1277, '2023-01-07 16:34:36', 'wu	ceshi在2023-01-07 16:34:36对donor表的id为1277执行了插入操作'),
(2020910220, '2023-01-08 00:21:23', '123在2023-01-08 00:21:23对charity表的id为123993执行了插入操作'),
(177, '2023-01-07 16:45:04', 'wu1	leon在2023-01-07 16:45:04对donor表的id为177执行了插入操作'),
(2020910219, '2023-01-08 00:05:35', '在2023-01-08 00:05:35对gift表的id为107执行了插入操作'),
(17822, '2023-01-07 17:17:57', 'Hunter1Craig1在2023-01-07 17:17:57对donor表的id为17822执行了插入操作'),
(2020910218, '2023-01-07 23:57:12', '123在2023-01-07 23:57:12对charity表的id为234213执行了删除操作'),
(2020910222, '2023-01-08 00:21:39', 'American Society for the Prevention of Cruelty to Animals1在2023-01-08 00:21:39对charity表的id为1001执行了更新操作'),
(234123123, '2023-01-08 00:22:38', '1233123在2023-01-08 00:22:38对donor表的id为234123123执行了插入操作'),
(2020910223, '2023-01-08 00:22:38', '在2023-01-08 00:22:38对gift表的id为234123123执行了插入操作'),
(2020910224, '2023-01-08 00:22:41', '1233123在2023-01-08 00:22:41对cdonor表的id为234123123执行了删除操作'),
(2020910225, '2023-01-08 00:24:26', 'HunterCraig在2023-01-08 00:24:26对donor表的id为101执行了更新操作'),
(2020910226, '2023-01-08 00:24:35', 'wuceshi在2023-01-08 00:24:35对cdonor表的id为1277执行了删除操作'),
(2020910227, '2023-01-08 00:25:13', '在2023-01-08 00:25:13对gift表的id为104执行了插入操作'),
(2020910228, '2023-01-08 00:26:19', '在2023-01-08 00:26:19对gift表的id为109执行了插入操作'),
(2020910229, '2023-01-08 01:08:28', '在2023-01-08 01:08:28对gift表的id为109执行了插入操作'),
(2020910230, '2023-01-08 01:53:11', '在2023-01-08 01:53:11对gift表的id为104执行了插入操作'),
(2020910231, '2023-01-08 01:53:38', '23423在2023-01-08 01:53:38对charity表的id为3453执行了插入操作'),
(2020910232, '2023-01-08 01:53:45', '23423在2023-01-08 01:53:45对charity表的id为3453执行了删除操作'),
(2020910233, '2023-01-08 01:53:51', '11在2023-01-08 01:53:51对charity表的id为99277执行了删除操作'),
(2020910234, '2023-01-08 01:54:00', 'United Nations Foundation在2023-01-08 01:54:00对charity表的id为1005执行了更新操作'),
(12312399, '2023-01-08 01:54:20', '312342在2023-01-08 01:54:20对donor表的id为12312399执行了插入操作'),
(2020910235, '2023-01-08 01:54:20', '在2023-01-08 01:54:20对gift表的id为12312399执行了插入操作'),
(2020910236, '2023-01-08 01:54:38', '99999999999912342在2023-01-08 01:54:38对donor表的id为12312399执行了更新操作'),
(2020910237, '2023-01-08 01:54:42', '99999999999912342在2023-01-08 01:54:42对cdonor表的id为12312399执行了删除操作'),
(2020910238, '2023-01-08 01:55:38', '在2023-01-08 01:55:38对gift表的id为110执行了插入操作'),
(2020910239, '2023-01-08 03:20:08', 'wowo charity在2023-01-08 03:20:08对charity表的id为1221执行了插入操作'),
(2020910240, '2023-01-08 03:20:39', '212在2023-01-08 03:20:39对charity表的id为12355执行了插入操作'),
(2020910241, '2023-01-08 03:21:21', '4在2023-01-08 03:21:21对charity表的id为3332执行了插入操作'),
(2020910242, '2023-01-08 03:21:41', '4在2023-01-08 03:21:41对charity表的id为345342执行了插入操作'),
(23423, '2023-01-08 03:22:15', '2344在2023-01-08 03:22:15对donor表的id为23423执行了插入操作'),
(2020910243, '2023-01-08 03:22:15', '在2023-01-08 03:22:15对gift表的id为23423执行了插入操作'),
(44441212, '2023-01-08 03:22:36', '4233342在2023-01-08 03:22:36对donor表的id为44441212执行了插入操作'),
(2020910244, '2023-01-08 03:22:36', '在2023-01-08 03:22:36对gift表的id为44441212执行了插入操作'),
(234, '2023-01-08 03:22:53', '423434在2023-01-08 03:22:53对donor表的id为234执行了插入操作'),
(2020910245, '2023-01-08 03:22:53', '在2023-01-08 03:22:53对gift表的id为234执行了插入操作'),
(2020910246, '2023-01-08 03:42:52', 'wu charity在2023-01-08 03:42:52对charity表的id为202019执行了插入操作'),
(2020910247, '2023-01-08 03:47:00', 'United Nations Foundation在2023-01-08 03:47:00对charity表的id为1005执行了更新操作'),
(2020910248, '2023-01-08 03:48:10', '4在2023-01-08 03:48:10对charity表的id为345342执行了删除操作'),
(4123, '2023-01-08 10:01:35', '123312在2023-01-08 10:01:35对donor表的id为4123执行了插入操作'),
(2020910249, '2023-01-08 10:01:35', '在2023-01-08 10:01:35对gift表的id为4123执行了插入操作'),
(2020910250, '2023-01-08 10:39:13', '在2023-01-08 10:39:13对gift表的id为234执行了插入操作'),
(2020910251, '2023-01-08 10:42:23', 'wuwuleon在2023-01-08 10:42:23对donor表的id为234执行了更新操作');

-- --------------------------------------------------------

--
-- 表的结构 `reader_card`
--

CREATE TABLE `reader_card` (
  `reader_id` int(11) NOT NULL,
  `name` varchar(16) NOT NULL,
  `passwd` varchar(15) NOT NULL DEFAULT '111111',
  `card_state` tinyint(4) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `reader_card`
--

INSERT INTO `reader_card` (`reader_id`, `name`, `passwd`, `card_state`) VALUES
(111, '111', '1234567', 1),
(1212, 'www', '111111', 1),
(11111, '', '111111', 1),
(1501014101, '张华', '111111', 1),
(1501014102, '王小伟', '111111', 1),
(1501014103, '王莞尔', '111111', 1),
(1501014104, '张明华', '111111', 1),
(1501014105, '李一琛', '111111', 1),
(1501014106, '李二飞', '111111', 1);

-- --------------------------------------------------------

--
-- 表的结构 `reader_info`
--

CREATE TABLE `reader_info` (
  `reader_id` int(11) NOT NULL,
  `name` varchar(16) NOT NULL,
  `sex` varchar(2) DEFAULT NULL,
  `birth` date DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `telcode` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `reader_info`
--

INSERT INTO `reader_info` (`reader_id`, `name`, `sex`, `birth`, `address`, `telcode`) VALUES
(111, '111', '男', '2020-12-09', '111', '111'),
(1212, 'www', '男', '2022-11-08', 'www', 'www'),
(1501014101, '张华', '男', '1995-06-10', '天津市', '12345678900'),
(1501014102, '王小伟', '男', '1996-02-01', '北京市', '12345678909'),
(1501014103, '王莞尔', '女', '1995-04-15', '浙江省杭州市', '12345678908'),
(1501014104, '张明华', '男', '1996-08-29', '陕西省西安市', '12345678907'),
(1501014105, '李一琛', '男', '1996-01-01', '陕西省西安市', '15123659875'),
(1501014106, '李二飞', '男', '1996-05-03', '山东省青岛市', '15369874123');

--
-- 转储表的索引
--

--
-- 表的索引 `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- 表的索引 `charity`
--
ALTER TABLE `charity`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `donor`
--
ALTER TABLE `donor`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `gift`
--
ALTER TABLE `gift`
  ADD KEY `donor id` (`donorid`);

--
-- 表的索引 `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `reader_card`
--
ALTER TABLE `reader_card`
  ADD PRIMARY KEY (`reader_id`);

--
-- 表的索引 `reader_info`
--
ALTER TABLE `reader_info`
  ADD PRIMARY KEY (`reader_id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `charity`
--
ALTER TABLE `charity`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1112222224;

--
-- 使用表AUTO_INCREMENT `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '唯一标识', AUTO_INCREMENT=2020910252;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
