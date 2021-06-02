-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- 主機: localhost
-- 產生時間： 2019-05-26 13:36:53
-- 伺服器版本: 5.7.17-log
-- PHP 版本： 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `sa`
--

-- --------------------------------------------------------

--
-- 資料表結構 `access`
--

CREATE TABLE `access` (
  `club_id` int(3) NOT NULL,
  `LDAP_id` int(9) NOT NULL,
  `acc_activity` tinyint(1) NOT NULL,
  `acc_sign` tinyint(1) NOT NULL,
  `acc_access` tinyint(1) NOT NULL,
  `acc_club` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `access`
--

INSERT INTO `access` (`club_id`, `LDAP_id`, `acc_activity`, `acc_sign`, `acc_access`, `acc_club`) VALUES
(1, 406402001, 1, 1, 1, 1),
(1, 406402005, 1, 1, 0, 0),
(2, 406402002, 1, 1, 0, 1),
(2, 406402003, 1, 1, 1, 1),
(2, 406402005, 1, 1, 0, 0),
(2, 406402007, 0, 1, 0, 1),
(3, 406402008, 1, 1, 1, 1),
(4, 406402006, 1, 1, 1, 1),
(5, 406402001, 1, 1, 1, 1),
(6, 406402008, 1, 1, 1, 1),
(7, 406402005, 1, 1, 1, 1),
(7, 406402022, 1, 1, 0, 1),
(8, 406402012, 1, 1, 1, 1),
(8, 406402024, 1, 1, 0, 1),
(9, 406402014, 1, 1, 1, 1),
(9, 406402021, 1, 1, 0, 1),
(10, 406402023, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- 資料表結構 `account_activity`
--

CREATE TABLE `account_activity` (
  `LDAP_id` int(9) NOT NULL,
  `act_id` bigint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `account_activity`
--

INSERT INTO `account_activity` (`LDAP_id`, `act_id`) VALUES
(406402002, 1),
(406402004, 1),
(406402002, 2),
(406402007, 2);

-- --------------------------------------------------------

--
-- 資料表結構 `activity`
--

CREATE TABLE `activity` (
  `act_id` bigint(11) NOT NULL,
  `act_name` varchar(15) NOT NULL,
  `act_sign_start` datetime NOT NULL,
  `act_sign_end` datetime NOT NULL,
  `act_start` datetime NOT NULL,
  `act_end` datetime NOT NULL,
  `act_info` text NOT NULL,
  `LDAP_id` int(9) NOT NULL,
  `act_location` varchar(30) NOT NULL,
  `act_fee` int(5) NOT NULL,
  `act_meal` tinyint(1) NOT NULL,
  `club_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `activity`
--

INSERT INTO `activity` (`act_id`, `act_name`, `act_sign_start`, `act_sign_end`, `act_start`, `act_end`, `act_info`, `LDAP_id`, `act_location`, `act_fee`, `act_meal`, `club_id`) VALUES
(1, '烤肉趣', '2019-03-01 08:00:00', '2019-03-15 20:00:00', '2019-03-31 18:30:00', '2019-03-31 21:00:00', '一起來烤肉ㄅ', 406402001, '中美堂', 200, 1, 1),
(2, '桌遊大賽', '2019-03-13 10:00:00', '2019-03-25 00:00:00', '2019-04-01 18:00:00', '2019-04-01 21:00:00', '屬於宅宅們的比賽!', 406402003, 'LM503', 150, 0, 2),
(3, '交際舞會', '2019-04-02 00:00:00', '2019-04-09 00:00:00', '2019-04-17 18:00:00', '2019-04-17 22:00:00', '可以跟很多正妹帥哥一起跳舞喔 快來吧', 406402009, '小巨蛋', 300, 1, 4),
(4, '暑訓', '2019-07-04 00:00:00', '2019-07-11 00:00:00', '2019-07-25 08:00:00', '2019-07-27 20:00:00', '暑假密集訓練來增強實力及培養默契', 406402001, '萬瑞遊樂園區', 3000, 1, 1),
(5, '偏鄉教育', '2019-06-05 00:00:00', '2019-06-10 00:00:00', '2019-07-15 00:00:00', '2019-07-20 00:00:00', '一起幫助照顧偏鄉的孩子們!', 406402001, '南投', 500, 1, 5),
(6, '書法大賽', '2019-06-18 00:00:00', '2019-06-22 00:00:00', '2019-07-18 10:30:00', '2019-07-18 15:30:00', '一年一度書法大賽開跑!', 406402008, 'AA440', 50, 1, 6),
(7, '琴擊之夏', '2019-06-03 00:00:00', '2019-06-08 00:00:00', '2019-07-20 10:00:00', '2019-07-20 15:00:00', '夏日最優美的旋律,與您共賞!', 406402012, 'AM405', 150, 1, 8),
(8, '同婚遊行', '2019-06-19 00:00:00', '2019-06-22 00:00:00', '2019-07-29 00:00:00', '2019-07-30 00:00:00', '一起參加社會運動,為自己的國家獻一份努力!', 406402003, '凱達格蘭大道', 0, 0, 3),
(9, '嘉明湖一日遊', '2019-06-19 00:00:00', '2019-06-26 00:00:00', '2019-08-01 08:00:00', '2019-08-01 20:00:00', '一起享受嘉明湖畔的風光吧!', 406402006, '嘉明湖', 600, 0, 4),
(10, '鋼琴夏遊', '2019-06-19 00:00:00', '2019-06-25 00:00:00', '2019-08-06 00:00:00', '2019-08-09 00:00:00', '平時努力的我們,一起放鬆心情,離開都市喧囂', 406402024, '日月潭', 900, 1, 8),
(11, '清涼一夏', '2019-06-01 00:00:00', '2019-06-05 00:00:00', '2019-07-28 00:00:00', '2019-08-01 00:00:00', '燈塔 森林 沙灘 大街,度假你值得擁有!', 406402022, '墾丁', 2000, 1, 7),
(12, '放鬆一夏', '2019-06-06 00:00:00', '2019-06-10 00:00:00', '2019-08-08 00:00:00', '2019-08-10 00:00:00', '一年一度社遊,不要錯過!', 406402014, '台南', 890, 1, 9),
(13, '夏日大作戰', '2019-05-01 00:00:00', '2019-05-05 00:00:00', '2019-08-20 00:00:00', '2019-08-25 00:00:00', '我們有錢就是要搭飛機', 406402023, '澎湖', 20000, 1, 10),
(14, '夏你一跳', '2019-06-14 00:00:00', '2019-06-18 00:00:00', '2019-07-10 18:00:00', '2019-07-10 23:00:00', '精心準備的夏日試膽大會', 406402003, '深山', 180, 0, 2);

-- --------------------------------------------------------

--
-- 資料表結構 `club`
--

CREATE TABLE `club` (
  `club_id` int(3) NOT NULL,
  `club_name` varchar(15) NOT NULL,
  `club_type` varchar(5) NOT NULL,
  `LDAP_id` int(9) NOT NULL,
  `club_info` text,
  `club_location` varchar(30) DEFAULT NULL,
  `club_teacher` varchar(10) NOT NULL,
  `club_contact` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `club`
--

INSERT INTO `club` (`club_id`, `club_name`, `club_type`, `LDAP_id`, `club_info`, `club_location`, `club_teacher`, `club_contact`) VALUES
(1, '吉他社', '音樂性', 406402001, '大家一起來學吉他吧 玩音樂的小孩不會變壞', 'LM101', '林沄荻', '0900000001'),
(2, '桌遊社', '休閒聯誼性', 406402003, '宅宅們一起來玩桌遊吧', 'ES701', '張嘉程', '0900000003'),
(3, '黑水溝社', '學術性', 406402008, '以社會改革為目標，長期投入各種改革運動', 'LA401', '凱薩琳', '0900000008'),
(4, '登山社', '體能性', 406402006, '養成從小爬山的好習慣!', 'BS440', '王O敏', '0900000006'),
(5, '崇德志工服務社', '服務性', 406402013, '服務乃做人之道', '', '', '0900000013'),
(6, '書法社', '藝術性', 406402020, '', '', '', '0900000020'),
(7, '港澳同學會', '休閒聯誼性', 406402024, '', '', '', '0900000024'),
(8, '鋼琴社', '音樂性', 406402012, '一起來精進自己的鋼琴實力吧!也能在這裡找到鋼琴同好們!', 'AM220', '陳千秋', '0900000012'),
(9, '跆拳道社', '體能性', 406402014, '跆拳道在身,保護自己保護他人,訓練身體更健康!', '中美堂前', '陳小春', '0900000014'),
(10, '模擬聯合國', '學術性', 406402023, '使社員瞭解多邊外交的過程，培養分析公民議題的能力，促進世界各地學生的交流，增進演講和辯論能力', 'LA503', '黃大白', '0900000023'),
(11, '童軍社', '服務性', 406402026, '玩童軍的小孩不會變壞', 'SF338', '顧未易', '0900000026'),
(12, '熱舞社', '藝術性', 406402027, '快來參加喔!每天都在國璽樓下面吵醫學系ㄉXD', '中美堂', '隆科多', '0900000027');

-- --------------------------------------------------------

--
-- 資料表結構 `club_member`
--

CREATE TABLE `club_member` (
  `club_id` int(3) NOT NULL,
  `LDAP_id` int(9) NOT NULL,
  `club_position` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `club_member`
--

INSERT INTO `club_member` (`club_id`, `LDAP_id`, `club_position`) VALUES
(1, 406402001, '1'),
(1, 406402016, '2'),
(1, 406402017, ''),
(2, 406402002, '2'),
(2, 406402003, '1'),
(2, 406402004, ''),
(2, 406402005, '3'),
(2, 406402007, '4'),
(2, 406402009, ''),
(2, 406402010, ''),
(3, 406402008, '1'),
(4, 406402006, '1'),
(5, 406402013, '1'),
(6, 406402015, ''),
(6, 406402020, '1'),
(7, 406402022, '2'),
(7, 406402024, '1'),
(8, 406402011, '2'),
(8, 406402012, '1'),
(8, 406402025, ''),
(9, 406402014, '1'),
(9, 406402021, '2'),
(10, 406402018, ''),
(10, 406402019, ''),
(10, 406402023, '1'),
(11, 406402026, '1'),
(12, 406402027, '1');

-- --------------------------------------------------------

--
-- 資料表結構 `comment`
--

CREATE TABLE `comment` (
  `com_id` bigint(11) NOT NULL,
  `com_list` text NOT NULL,
  `LDAP_id` int(9) NOT NULL,
  `act_id` bigint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `comment`
--

INSERT INTO `comment` (`com_id`, `com_list`, `LDAP_id`, `act_id`) VALUES
(1, '這活動真他x爛，肉難吃死了，還要我自己烤', 406402002, 1),
(2, '這活動不錯，希望以後還能繼續參加', 406402004, 1),
(3, '超讚的活動，不尷尬', 406402007, 2);

-- --------------------------------------------------------

--
-- 資料表結構 `file`
--

CREATE TABLE `file` (
  `file_id` bigint(11) NOT NULL,
  `file_path` text NOT NULL,
  `act_id` bigint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `file`
--

INSERT INTO `file` (`file_id`, `file_path`, `act_id`) VALUES
(1, 'D:\\guitar\\BBQ.jpg', 1),
(2, 'D:\\club\\tablegame.png', 2),
(3, 'D:\\guitar\\BBQ.pdf', 1),
(4, 'D:\\club\\tablegame.pdf', 2),
(5, 'D:\\hiking\\dance.pdf', 3),
(6, 'D:\\guitar/summervaction.pdf', 4);

-- --------------------------------------------------------

--
-- 資料表結構 `ldap`
--

CREATE TABLE `ldap` (
  `LDAP_id` int(9) NOT NULL,
  `LDAP_pwd` varchar(15) NOT NULL,
  `LDAP_name` varchar(10) NOT NULL,
  `LDAP_department` varchar(25) DEFAULT NULL,
  `LDAP_class` varchar(2) DEFAULT NULL,
  `LDAP_identity` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `ldap`
--

INSERT INTO `ldap` (`LDAP_id`, `LDAP_pwd`, `LDAP_name`, `LDAP_department`, `LDAP_class`, `LDAP_identity`) VALUES
(406402001, '406402001', '王大明', '織品', '甲', 1),
(406402002, '406402002', '陳美美', '資管', '乙', 1),
(406402003, '406402003', '新八機', '資管', '丙', 1),
(406402004, '406402004', '九兵衛', '會計', '乙', 1),
(406402005, '406402005', '神樂醬', '體育', '乙', 1),
(406402006, '406402006', '總悟S', '醫學', '丙', 1),
(406402007, '406402007', '長谷川', '金企', '乙', 1),
(406402008, '406402008', '近藤勳', '日文', '甲', 1),
(406402009, '406402009', '山崎退', '心理', '甲', 1),
(406402010, '406402010', '伊麗莎白', '資工', '乙', 1),
(406402011, '406402011', '朱宜修', '戲劇', '甲', 1),
(406402012, '406402012', '大寶', '財法', '乙', 1),
(406402013, '406402013', '小寶', '經濟', '甲', 1),
(406402014, '406402014', '容音', '心理', '丙', 1),
(406402015, '406402015', '靜好', '戲劇', '甲', 1),
(406402016, '406402016', '珊珊', '統計', '乙', 1),
(406402017, '406402017', '可可', '宗教', '丙', 1),
(406402018, '406402018', '愛莉', '西文', '甲', 1),
(406402019, '406402019', '泡泡', '廣告', '乙', 1),
(406402020, '406402020', '花花', '統計', '甲', 1),
(406402021, '406402021', '林球球', '醫學', '甲', 1),
(406402022, '406402022', '李小玉', '影傳', '甲', 1),
(406402023, '406402023', '李一一', '應美', '乙', 1),
(406402024, '406402024', '吳承虞', '資管', '乙', 1),
(406402025, '406402025', '小栗旬', '法律', '乙', 1),
(406402026, '406402026', '趙喬一', '中文', '乙', 1),
(406402027, '406402027', '費大川', '統資', '甲', 1),
(406402028, '406402028', '于苗苗', '公衛', '乙', 1),
(406402101, '406402101', '阿妙仔', NULL, NULL, 2),
(406402102, '406402102', '宅十四', NULL, NULL, 2);

-- --------------------------------------------------------

--
-- 資料表結構 `sign`
--

CREATE TABLE `sign` (
  `act_id` bigint(11) NOT NULL,
  `LDAP_id` int(9) NOT NULL,
  `sign_email` varchar(50) NOT NULL,
  `sign_phone` varchar(10) NOT NULL,
  `sign_eat` varchar(1) DEFAULT NULL,
  `sign_note` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `sign`
--

INSERT INTO `sign` (`act_id`, `LDAP_id`, `sign_email`, `sign_phone`, `sign_eat`, `sign_note`) VALUES
(1, 406402002, '000000002@gapp.fju.edu.tw', '0900000002', '葷', '我是公主不想自己烤肉 希望有好隊員幫我烤'),
(1, 406402004, '000000004@gapp.fju.edu.tw', '0900000004', '葷', NULL),
(2, 406402002, '000000004@gapp.fju.edu.tw', '0900000002', NULL, '可自己帶外食嗎?'),
(2, 406402007, '000000007@gapp.fju.edu.tw', '0900000007', NULL, NULL);

-- --------------------------------------------------------

--
-- 資料表結構 `student_information`
--

CREATE TABLE `student_information` (
  `LDAP_id` int(9) NOT NULL,
  `stu_phone` varchar(10) DEFAULT NULL,
  `stu_email` varchar(50) DEFAULT NULL,
  `stu_eat` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `student_information`
--

INSERT INTO `student_information` (`LDAP_id`, `stu_phone`, `stu_email`, `stu_eat`) VALUES
(406402001, '0900000001', '406402001@gapp.fju.edu.tw', '葷'),
(406402002, '0900000002', '406402002@gapp.fju.edu.tw', '葷'),
(406402003, '0900000003', '406402003@gapp.fju.edu.tw', '素'),
(406402004, '0900000004', '406402004@gapp.fju.edu.tw', '葷'),
(406402005, '0900000005', '406402005@gapp.fju.edu.tw', '素'),
(406402006, '0900000006', '406402006@gapp.fju.edu.tw', '葷'),
(406402007, '0900000007', '406402007@gapp.fju.edu.tw', '葷'),
(406402008, '0900000008', '406402008@gapp.fju.edu.tw', '素'),
(406402009, '0900000009', '406402009@gapp.fju.edu.tw', '葷'),
(406402010, '0900000010', '406402010@gapp.fju.edu.tw', '葷'),
(406402011, '0900000011', '406402011@gapp.fju.edu.tw', '葷'),
(406402012, '0900000012', '406402012@gapp.fju.edu.tw', '葷'),
(406402013, '0900000013', '406402008@gapp.fju.edu.tw', '葷'),
(406402014, '0900000014', '406402014@gapp.fju.edu.tw', '葷'),
(406402015, '0900000015', '406402015@gapp.fju.edu.tw', '葷'),
(406402016, '0900000016', '406402016@gapp.fju.edu.tw', '素'),
(406402017, '0900000017', '406402017@gapp.fju.edu.tw', '素'),
(406402018, '0900000018', '406402018@gapp.fju.edu.tw', '葷'),
(406402019, '0900000019', '406402019@gapp.fju.edu.tw', '葷'),
(406402020, '0900000020', '406402020@gapp.fju.edu.tw', '素'),
(406402021, '0900000021', '406402021@gapp.fju.edu.tw', '葷'),
(406402022, '0900000022', '406402022@gapp.fju.edu.tw', '素'),
(406402023, '0900000023', '406402023@gapp.fju.edu.tw', '葷'),
(406402024, '0900000024', '406402024@gapp.fju.edu.tw', '葷'),
(406402025, '0900000025', '406402025@gapp.fju.edu.tw', '葷'),
(406402026, '0900000026', '406402026@gapp.fju.edu.tw', '素'),
(406402027, '0900000027', '406402027@gapp.fju.edu.tw', '葷'),
(406402028, '0900000028', '4064020028@gapp.fju.edu.tw', '葷');

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `access`
--
ALTER TABLE `access`
  ADD PRIMARY KEY (`club_id`,`LDAP_id`),
  ADD KEY `LDAP5` (`LDAP_id`);

--
-- 資料表索引 `account_activity`
--
ALTER TABLE `account_activity`
  ADD PRIMARY KEY (`LDAP_id`,`act_id`) USING BTREE,
  ADD KEY `actidfk` (`act_id`);

--
-- 資料表索引 `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`act_id`),
  ADD KEY `aafk` (`LDAP_id`),
  ADD KEY `clubfk` (`club_id`);

--
-- 資料表索引 `club`
--
ALTER TABLE `club`
  ADD PRIMARY KEY (`club_id`),
  ADD KEY `asid3` (`LDAP_id`);

--
-- 資料表索引 `club_member`
--
ALTER TABLE `club_member`
  ADD PRIMARY KEY (`club_id`,`LDAP_id`),
  ADD KEY `LDAP2` (`LDAP_id`);

--
-- 資料表索引 `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`com_id`),
  ADD KEY `asid4` (`LDAP_id`),
  ADD KEY `actidfk3` (`act_id`);

--
-- 資料表索引 `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`file_id`),
  ADD KEY `actidfk2` (`act_id`);

--
-- 資料表索引 `ldap`
--
ALTER TABLE `ldap`
  ADD PRIMARY KEY (`LDAP_id`);

--
-- 資料表索引 `sign`
--
ALTER TABLE `sign`
  ADD PRIMARY KEY (`act_id`,`LDAP_id`),
  ADD KEY `LDAP3` (`LDAP_id`);

--
-- 資料表索引 `student_information`
--
ALTER TABLE `student_information`
  ADD PRIMARY KEY (`LDAP_id`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `activity`
--
ALTER TABLE `activity`
  MODIFY `act_id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- 使用資料表 AUTO_INCREMENT `club`
--
ALTER TABLE `club`
  MODIFY `club_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- 使用資料表 AUTO_INCREMENT `comment`
--
ALTER TABLE `comment`
  MODIFY `com_id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- 使用資料表 AUTO_INCREMENT `file`
--
ALTER TABLE `file`
  MODIFY `file_id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- 已匯出資料表的限制(Constraint)
--

--
-- 資料表的 Constraints `access`
--
ALTER TABLE `access`
  ADD CONSTRAINT `LDAP5` FOREIGN KEY (`LDAP_id`) REFERENCES `ldap` (`LDAP_id`),
  ADD CONSTRAINT `club` FOREIGN KEY (`club_id`) REFERENCES `club` (`club_id`);

--
-- 資料表的 Constraints `account_activity`
--
ALTER TABLE `account_activity`
  ADD CONSTRAINT `actidfk` FOREIGN KEY (`act_id`) REFERENCES `activity` (`act_id`),
  ADD CONSTRAINT `asidfk` FOREIGN KEY (`LDAP_id`) REFERENCES `ldap` (`LDAP_id`);

--
-- 資料表的 Constraints `activity`
--
ALTER TABLE `activity`
  ADD CONSTRAINT `aafk` FOREIGN KEY (`LDAP_id`) REFERENCES `ldap` (`LDAP_id`),
  ADD CONSTRAINT `clubfk` FOREIGN KEY (`club_id`) REFERENCES `club` (`club_id`);

--
-- 資料表的 Constraints `club`
--
ALTER TABLE `club`
  ADD CONSTRAINT `asid3` FOREIGN KEY (`LDAP_id`) REFERENCES `ldap` (`LDAP_id`);

--
-- 資料表的 Constraints `club_member`
--
ALTER TABLE `club_member`
  ADD CONSTRAINT `LDAP2` FOREIGN KEY (`LDAP_id`) REFERENCES `ldap` (`LDAP_id`),
  ADD CONSTRAINT `club2` FOREIGN KEY (`club_id`) REFERENCES `club` (`club_id`);

--
-- 資料表的 Constraints `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `actidfk3` FOREIGN KEY (`act_id`) REFERENCES `activity` (`act_id`),
  ADD CONSTRAINT `asid4` FOREIGN KEY (`LDAP_id`) REFERENCES `ldap` (`LDAP_id`);

--
-- 資料表的 Constraints `file`
--
ALTER TABLE `file`
  ADD CONSTRAINT `actidfk2` FOREIGN KEY (`act_id`) REFERENCES `activity` (`act_id`);

--
-- 資料表的 Constraints `sign`
--
ALTER TABLE `sign`
  ADD CONSTRAINT `LDAP3` FOREIGN KEY (`LDAP_id`) REFERENCES `ldap` (`LDAP_id`);

--
-- 資料表的 Constraints `student_information`
--
ALTER TABLE `student_information`
  ADD CONSTRAINT `LDAP` FOREIGN KEY (`LDAP_id`) REFERENCES `ldap` (`LDAP_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
