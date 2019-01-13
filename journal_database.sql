-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 06, 2018 at 05:32 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `journal_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `password`) VALUES
('321654', 'cHB6eDAw');

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `order` int(11) NOT NULL,
  `name` text NOT NULL,
  `tmp_name` text NOT NULL,
  `footer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`order`, `name`, `tmp_name`, `footer`) VALUES
(1, 'WIN_20180829_20_55_28_Pro.jpg', 'banner_5b878fd8d1b76.jpg', 'สำนักวิชาการศึกษาทั่วไปและนวัตกรรมการเรียนรู้อิเล็กทรอนิกส์ มหาวิทยาลัยราชภัฎสวนสุนันทา\r\nเลขที่ 1 อาคาร 34 ชั้น 1 ถนนอู่ทองนอก แขวงวชิระ เขตดุสิต กรุงเทพมหานคร 10300       โทร. 02-160-1265-70 Fax. 02-160-1268 www.gen-ed.ssru.ac.th');

-- --------------------------------------------------------

--
-- Table structure for table `bill_guest`
--

CREATE TABLE `bill_guest` (
  `username` text NOT NULL,
  `tmp_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bill_guest`
--

INSERT INTO `bill_guest` (`username`, `tmp_name`) VALUES
('eiei', 'Bill_5b8f90abb145d.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `paper`
--

CREATE TABLE `paper` (
  `paper_id` int(255) NOT NULL,
  `field` text NOT NULL,
  `file_name` text NOT NULL,
  `file_tmp_name` text NOT NULL,
  `name_th` text NOT NULL,
  `name_eng` text NOT NULL,
  `abstract` text NOT NULL,
  `key_word` text NOT NULL,
  `status` int(1) NOT NULL,
  `money_status` int(1) NOT NULL,
  `tmp_money` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `paper`
--

INSERT INTO `paper` (`paper_id`, `field`, `file_name`, `file_tmp_name`, `name_th`, `name_eng`, `abstract`, `key_word`, `status`, `money_status`, `tmp_money`) VALUES
(10011, '', 'ตารางเรียน GE.pdf', 'pdf_5b8e7c8b37c17.pdf', 'ทดสอบ', 'test', 'test', 'test', 1, 7, 'Bill_5b8e6c9d7efff.jpg'),
(10012, '', 'ตารางเรียน GE.pdf', 'pdf_5b8e359db4b63.pdf', 'ทดสอบ', 'test', 'test', 'test', 1, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `reviewer_answer`
--

CREATE TABLE `reviewer_answer` (
  `order` int(11) NOT NULL,
  `reviewer_id` text NOT NULL,
  `paper_id` text NOT NULL,
  `status` text NOT NULL,
  `comment` text NOT NULL,
  `score` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reviewer_answer`
--

INSERT INTO `reviewer_answer` (`order`, `reviewer_id`, `paper_id`, `status`, `comment`, `score`) VALUES
(1, '321654', '10000', '2', 'kk', 100),
(2, '123456', '10000', '2', 'kk', 100),
(3, '321654', '10006', '3', 'น่าจะเสร็จ', 32),
(4, '123456', '10006', '2', 'น่าจะเสร็จ', 32),
(5, '321654', '10007', '2', 'น่าจะเสร็จ', 32),
(6, '123456', '10007', '2', '55555', 55),
(7, '321654', '10008', '2', '55555', 55),
(8, '123456', '10008', '2', 'น่าจะเสร็จ', 32),
(11, '321654', '10010', '2', 'น่าจะเสร็จ', 55),
(12, '123456', '10010', '2', '55555', 123),
(13, '321654', '10011', ' ', ' ', 0),
(14, '123456', '10011', ' ', ' ', 0),
(15, '123456', '10012', '', '', 0),
(16, '321654', '10012', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `reviewer_paper`
--

CREATE TABLE `reviewer_paper` (
  `paper_id` text NOT NULL,
  `reviewer1` text NOT NULL,
  `reviewer2` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reviewer_paper`
--

INSERT INTO `reviewer_paper` (`paper_id`, `reviewer1`, `reviewer2`) VALUES
('10000', '321654', '123456'),
('10006', '321654', '123456'),
('10007', '321654', '123456'),
('10008', '321654', '123456'),
('10009', '321654', '123456'),
('10010', '321654', '123456'),
('10011', '321654', '123456'),
('10012', '123456', '321654');

-- --------------------------------------------------------

--
-- Table structure for table `setting_timmer`
--

CREATE TABLE `setting_timmer` (
  `order` int(11) NOT NULL,
  `name_time` text NOT NULL,
  `time_start` text NOT NULL,
  `time_end` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `setting_timmer`
--

INSERT INTO `setting_timmer` (`order`, `name_time`, `time_start`, `time_end`) VALUES
(1, 'a', '2018-09-01', '2018-09-15'),
(2, 'b', '2018-09-01', '2018-09-15');

-- --------------------------------------------------------

--
-- Table structure for table `show_url`
--

CREATE TABLE `show_url` (
  `id` int(1) NOT NULL,
  `url` text NOT NULL,
  `real_name` text NOT NULL,
  `text` text NOT NULL,
  `group_url` int(1) NOT NULL,
  `hide` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `show_url`
--

INSERT INTO `show_url` (`id`, `url`, `real_name`, `text`, `group_url`, `hide`) VALUES
(1, 'a1', '', 'ab', 1, 0),
(2, 'b1', '', 'b', 1, 0),
(3, 'c1', '', 'c', 1, 0),
(4, 'd1', '', 'd', 1, 0),
(5, 'pdf_5b86d2652c582.pdf', 'pdf_5b83a39497804.pdf', 'ba', 2, 0),
(6, 'pdf_5b86d03c0e1aa.pdf', 'pdf_5b83a39497804.pdf', 'ab', 2, 0),
(7, 'pdf_5b86d03c340b3.pdf', 'pdf_5b83a39497804.pdf', 'a55', 2, 0),
(8, 'pdf_5b86d03c844e8.pdf', 'pdf_5b83a39497804.pdf', 'a', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `status_tb`
--

CREATE TABLE `status_tb` (
  `id` int(11) NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `status_tb`
--

INSERT INTO `status_tb` (`id`, `status`) VALUES
(1, 'รอผลการตรวจสอบ'),
(2, 'ผ่าน'),
(3, 'ไม่ผ่าน'),
(4, 'แก้ไข'),
(5, 'ยังไม่ได้เลือกผู้ตรวจ'),
(6, 'รอผลจากแอดมิน'),
(7, 'ยังไม่ได้ชำระ'),
(8, 'ชำระแล้ว');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `order` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `gender` text NOT NULL,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `address` text NOT NULL,
  `email` text NOT NULL,
  `member` longtext NOT NULL,
  `role` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`order`, `username`, `password`, `gender`, `first_name`, `last_name`, `address`, `email`, `member`, `role`) VALUES
(1, 'singha', 'cHB6eDAw', 'male', 'นาย พลเมือง', 'ดีเด่น', 'ไม่มี', 'ไม่มี', '', 1),
(2, 'singha2', 'cHB6eDAw', 'male', 'ตะวัน', 'เข็มทอง', 'ไม่มี', 'ไม่มี', '', 1),
(3, '321654', 'cHB6eDAw', 'male', 'นาย แบงค์', 'แก้วศรี', 'เล้า(อยู่กับแม่)', 'ไก้ไก่ๆไกลไก้ไกลไก่ไกๆไก่@coldmail.com', '', 2),
(4, '123456', 'cHB6eDAw', 'male', 'นาย ข', 'ไข่', 'ไม่ให้ๆอย่ามาเอานะเค้าหวง', '8e88@morning.com', '', 2),
(21, 'singha2', 'dGF3YW4=', 'male', 'yerm', 'cheao', 'as', '8e88@morning.com', '', 2),
(22, 'singha2', 'dGF3YW4=', 'male', 'yerm', 'cheao', 'as', '8e88@morning.com', '', 2),
(23, 'singha2', 'dGF3YW4=', 'male', 'yerm', 'cheao', 'as', '8e88@morning.com', '', 2),
(24, '123456', 'MTIzNDU2', 'male', 'ทดสอบ', 'ทดสอบ', 'ทดสอบ', 'ทดสอบ', '', 2),
(27, 'eiei', 'MTIzNA==', 'male', 'นาย ตาหวาน', 'เข็มทองคำ', '76/431 ซ.5/4 ต.บางคูรัด อ.บางบัวทอง จ.นนทบุรี', 'singcomnet@hotmail.com', '-', 3);

-- --------------------------------------------------------

--
-- Table structure for table `user_paper`
--

CREATE TABLE `user_paper` (
  `username` text NOT NULL,
  `paper_id` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_paper`
--

INSERT INTO `user_paper` (`username`, `paper_id`) VALUES
('singha', '10000'),
('singha2', '10002'),
('singha', '10006'),
('singha', '10007'),
('singha', '10008'),
('singha', '10009'),
('singha', '10010'),
('singha', '10011'),
('singha', '10012');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`order`);

--
-- Indexes for table `paper`
--
ALTER TABLE `paper`
  ADD PRIMARY KEY (`paper_id`);

--
-- Indexes for table `reviewer_answer`
--
ALTER TABLE `reviewer_answer`
  ADD PRIMARY KEY (`order`);

--
-- Indexes for table `setting_timmer`
--
ALTER TABLE `setting_timmer`
  ADD PRIMARY KEY (`order`);

--
-- Indexes for table `show_url`
--
ALTER TABLE `show_url`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status_tb`
--
ALTER TABLE `status_tb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`order`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `paper`
--
ALTER TABLE `paper`
  MODIFY `paper_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10013;

--
-- AUTO_INCREMENT for table `reviewer_answer`
--
ALTER TABLE `reviewer_answer`
  MODIFY `order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `setting_timmer`
--
ALTER TABLE `setting_timmer`
  MODIFY `order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `show_url`
--
ALTER TABLE `show_url`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `status_tb`
--
ALTER TABLE `status_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
