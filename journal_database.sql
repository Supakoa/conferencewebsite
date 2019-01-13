-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2019 at 12:45 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

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
(1, 'journal_4.png', 'banner_5c0a37c656077.png', 'สำนักวิชาการศึกษาทั่วไปและนวัตกรรมการเรียนรู้อิเล็กทรอนิกส์ มหาวิทยาลัยราชภัฎสวนสุนันทา\r\nเลขที่ 1 อาคาร 34 ชั้น 1 ถนนอู่ทองนอก แขวงวชิระ เขตดุสิต กรุงเทพมหานคร 10300       โทร. 02-160-1265-70 Fax. 02-160-1268 www.gen-ed.ssru.ac.th');

-- --------------------------------------------------------

--
-- Table structure for table `bill_guest`
--

CREATE TABLE `bill_guest` (
  `username` text NOT NULL,
  `tmp_name` text NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

-- --------------------------------------------------------

--
-- Table structure for table `reviewer_paper`
--

CREATE TABLE `reviewer_paper` (
  `paper_id` text NOT NULL,
  `reviewer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(1, 'a', '2018-09-01', '2019-01-11'),
(2, 'b', '2018-09-01', '2019-01-15');

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
(1, 'a1', '', 'ทดสอบ', 1, 0),
(2, 'b1', '', 'ทดสอบ', 1, 0),
(3, 'c1', '', 'ทดสอบ', 1, 0),
(4, 'd1', '', 'ทดสอบ', 1, 0),
(5, 'pdf_5b86d2652c582.pdf', 'pdf_5b83a39497804.pdf', 'ทดสอบ', 2, 0),
(6, 'pdf_5b86d03c0e1aa.pdf', 'pdf_5b83a39497804.pdf', 'ทดสอบ', 2, 0),
(7, 'pdf_5b86d03c340b3.pdf', 'pdf_5b83a39497804.pdf', 'ทดสอบ', 2, 0),
(8, 'pdf_5b86d03c844e8.pdf', 'pdf_5b83a39497804.pdf', 'ทดสอบ', 2, 0);

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
  `Tel` varchar(10) NOT NULL,
  `member` longtext NOT NULL,
  `role` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user_paper`
--

CREATE TABLE `user_paper` (
  `username` text NOT NULL,
  `paper_id` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  MODIFY `paper_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10000;

--
-- AUTO_INCREMENT for table `reviewer_answer`
--
ALTER TABLE `reviewer_answer`
  MODIFY `order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

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
  MODIFY `order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
