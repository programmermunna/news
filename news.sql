-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2023 at 06:52 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `news`
--

-- --------------------------------------------------------

--
-- Table structure for table `ad`
--

CREATE TABLE `ad` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `embed` longtext NOT NULL,
  `position` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ad`
--

INSERT INTO `ad` (`id`, `name`, `embed`, `position`) VALUES
(109, 'top ad', '<iframe width=\"1060\" height=\"115\" src=\"https://www.youtube.com/embed/m0h4-FCF_To\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 3),
(111, 'top ad', '<iframe width=\"1060\" height=\"115\" src=\"https://www.youtube.com/embed/m0h4-FCF_To\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 2),
(115, 'top ad 2', '<iframe width=\"1060\" height=\"115\" src=\"https://www.youtube.com/embed/m0h4-FCF_To\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 4);

-- --------------------------------------------------------

--
-- Table structure for table `admin_info`
--

CREATE TABLE `admin_info` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'Normal User',
  `time` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_info`
--

INSERT INTO `admin_info` (`id`, `name`, `email`, `pass`, `file`, `role`, `time`) VALUES
(1, 'Munna', 'admin@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'images.png', 'Admin', 1666882432),
(30, 'shamimlem', 'shamimlem@gamil.com', '0cf31b2c283ce3431794586df7b0996d', 'profile pikk 500.png', 'Moderator', 1666882432),
(32, 'codeart', 'codeartfreefire@gmail.com', '2373af54d7bfeef87c999c0c903b4cde', 'ss.jpg', 'Normal User', 1666878188),
(33, 'Munna Hasan', 'freelancermunna4@gmail.com', '1aabac6d068eef6a7bad3fdf50a05cc8', 'munna.jpg', 'Normal User', 1680424367),
(34, 'tramp', 'tramp@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'trump1-770x450.jpg', 'Moderator', 1680425796);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(101, 'politics'),
(115, 'country'),
(116, 'world'),
(117, 'sports'),
(118, 'tecnology'),
(119, 'Business'),
(120, 'Cars.'),
(121, 'Family'),
(122, 'Health'),
(123, 'Religion'),
(124, 'Science');

-- --------------------------------------------------------

--
-- Table structure for table `category_test`
--

CREATE TABLE `category_test` (
  `id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `parent_id` int(255) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category_test`
--

INSERT INTO `category_test` (`id`, `category`, `parent_id`) VALUES
(52, 'mobile', 0),
(57, 'leptop', 0),
(58, 'asus', 57),
(59, 'hp', 57),
(60, 'dell', 57),
(63, 'acer', 57),
(64, 'iphone', 52),
(65, 'samsung', 52),
(67, 'iphone 11', 64),
(68, 'iphone 12', 64),
(69, 'iphone 13', 64),
(71, 'samsung s21', 65),
(72, 'samsung s22', 65),
(75, 'charger', 72),
(76, 'mini', 75),
(77, 'small', 76),
(78, 'x small', 77),
(79, 'x small 1', 78),
(80, 'x small 1.1', 79),
(81, 'x small 1.1.1', 80),
(88, 'gtfgfg', 65);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `post_id` int(255) NOT NULL,
  `id` int(11) NOT NULL,
  `parent_id` int(255) NOT NULL DEFAULT 0,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL DEFAULT 'img.png',
  `time` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`post_id`, `id`, `parent_id`, `name`, `email`, `content`, `img`, `time`) VALUES
(0, 52, 0, 'John Doe ', '', 'Diam amet duo labore stet elitr invidunt ea clita ipsum voluptua, tempor labore accusam ipsum et no at. Kasd diam tempor rebum magna dolores sed sed eirmod ipsum.', 'ss.jpg', 0),
(0, 57, 0, 'John Doe ', '', 'Diam amet duo labore stet elitr invidunt ea clita ipsum voluptua, tempor labore accusam ipsum et no at. Kasd diam tempor rebum magna dolores sed sed eirmod ipsum.', 'ss.jpg', 0),
(30, 89, 0, 'munna', 'freelancermunna4@gmail.com', 'something test', '', 0),
(30, 90, 0, 'munna', 'freelancermunna4@gmail.com', 'test 2', '', 0),
(30, 91, 0, 'sohan', 'sohan@gamil.com', 'my name is sohan khan.....', '', 1666836903),
(30, 92, 0, 'munna', 'freelancermunna4@gmail.com', 'sdfdf', 'img.png', 1666837018),
(30, 93, 0, 'fsdfs', 'admin@gmail.com', 'sdfsd', 'img.png', 1666838621),
(30, 94, 92, 'munna', '', 'sfdsfsdfsdfsasdfasffadfasfasf', 'img.png', 1666839580),
(30, 95, 0, 'dfgdg', 'shamimlem@yahoo.com', 'gfdg', 'img.png', 1666843123),
(30, 96, 0, 'sdfs', 'admin@gmail.com', 'aaaa', 'img.png', 1666843328),
(30, 97, 0, 'Munna', 'admin@gmail.com', 'dfgdgffg', 'img.png', 1666844296),
(30, 98, 0, 'Munna', 'admin@gmail.com', 'aaaaa', 'images.png', 1666844454),
(30, 99, 0, 'Munna', 'admin@gmail.com', 'bbbb', 'images.png', 1666844552),
(30, 100, 99, 'Munna', 'admin@gmail.com', 'cccc', 'images.png', 1666844569),
(30, 101, 0, 'Munna', 'admin@gmail.com', 'sfsdf', 'images.png', 1666844597),
(30, 102, 100, 'Munna', 'admin@gmail.com', 'ddd', 'images.png', 1666844645),
(30, 103, 0, 'shamimlem', 'shamimlem@gamil.com', 'sfdd', 'profile pikk 500.png', 1666844880),
(30, 104, 0, 'Munna', 'admin@gmail.com', 'aa', 'images.png', 1666845450),
(20, 105, 0, 'mMunna', 'admin@gmail.com', 'sdf', 'images.png', 1666847079),
(20, 106, 0, 'Munna', 'admin@gmail.com', 'sdfsdf', 'images.png', 1667066243),
(20, 107, 106, 'Munna', 'admin@gmail.com', 'sdfsdf', 'images.png', 1667066471),
(20, 108, 107, 'Munna', 'admin@gmail.com', 'aaa', 'images.png', 1667066479),
(20, 109, 108, 'Munna', 'admin@gmail.com', 'asfdsf', 'images.png', 1667066537),
(20, 110, 0, 'Munna', 'admin@gmail.com', 'munna my name', 'images.png', 1667136881),
(34, 111, 0, 'Munna', 'admin@gmail.com', 'sdsd', 'images.png', 1680437406);

-- --------------------------------------------------------

--
-- Table structure for table `mail_setting`
--

CREATE TABLE `mail_setting` (
  `id` int(255) NOT NULL,
  `smtp_host` varchar(255) NOT NULL,
  `smtp_port` int(255) NOT NULL,
  `smtp_user_name` varchar(255) NOT NULL,
  `smtp_user_pass` varchar(255) NOT NULL,
  `smtp_security` varchar(255) NOT NULL,
  `site_email` varchar(255) NOT NULL,
  `site_replay_email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mail_setting`
--

INSERT INTO `mail_setting` (`id`, `smtp_host`, `smtp_port`, `smtp_user_name`, `smtp_user_pass`, `smtp_security`, `site_email`, `site_replay_email`) VALUES
(1, 'mail.joblessbd.com', 465, 'warranty@joblessbd.com', 'c+ZLeV9drwih', 'ssl', 'warranty@joblessbd.com', 'warranty@joblessbd.com');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `parent_id` int(255) NOT NULL DEFAULT 0,
  `name` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `time` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `parent_id`, `name`, `url`, `content`, `time`) VALUES
(109, 0, 'আমাদের সম্পর্কে', 'page.php?page=love.php', '<p><span style=\"color: rgb(51, 51, 51); font-family: \"siyam rupali\", serif; font-size: 16px; text-align: justify;\">বড় মেয়ের অভিযোগ করেছেন, গেলো বৃহস্পতিবার সকালে পুলিশ, আইনজীবী ও তৃতীয় যুগ্ম জেলা জজ আদালতের নাজিরের সহযোগিতায় বাড়ির তৃতীয় তলা থেকে তাকে জোর করে বের করে দেয়। এ নিয়ে কখনও তাকে কোনো আইনি নোটিশও দেয়া হয়নি। </span><span style=\"color: rgb(51, 51, 51); font-family: \"siyam rupali\", serif; font-size: 16px; text-align: justify;\">বড় মেয়ের অভিযোগ করেছেন, গেলো বৃহস্পতিবার সকালে পুলিশ, আইনজীবী ও তৃতীয় যুগ্ম জেলা জজ আদালতের নাজিরের সহযোগিতায় বাড়ির তৃতীয় তলা থেকে তাকে জোর করে বের করে দেয়। এ নিয়ে কখনও তাকে কোনো আইনি নোটিশও দেয়া হয়নি। </span><span style=\"color: rgb(51, 51, 51); font-family: \"siyam rupali\", serif; font-size: 16px; text-align: justify;\">বড় মেয়ের অভিযোগ করেছেন, গেলো বৃহস্পতিবার সকালে পুলিশ, আইনজীবী ও তৃতীয় যুগ্ম জেলা জজ আদালতের নাজিরের সহযোগিতায় বাড়ির তৃতীয় তলা থেকে তাকে জোর করে বের করে দেয়। এ নিয়ে কখনও তাকে কোনো আইনি নোটিশও দেয়া হয়নি। </span></p><p><span style=\"color: rgb(51, 51, 51); font-family: \"siyam rupali\", serif; font-size: 16px; text-align: justify;\"><br></span></p><p><span style=\"color: rgb(51, 51, 51); font-family: \"siyam rupali\", serif; font-size: 16px; text-align: justify;\"><br></span></p><hr><p><span style=\"color: rgb(51, 51, 51); font-family: \"siyam rupali\", serif; font-size: 16px; text-align: justify;\">বড় মেয়ের অভিযোগ করেছেন, গেলো বৃহস্পতিবার সকালে পুলিশ, আইনজীবী ও তৃতীয় যুগ্ম জেলা জজ আদালতের নাজিরের সহযোগিতায় বাড়ির তৃতীয় তলা থেকে তাকে জোর করে বের করে দেয়। এ নিয়ে কখনও তাকে কোনো আইনি নোটিশও দেয়া হয়নি। </span></p><hr><p><span style=\"color: rgb(51, 51, 51); font-family: \"siyam rupali\", serif; font-size: 16px; text-align: justify;\">বড় মেয়ের অভিযোগ করেছেন, গেলো বৃহস্পতিবার সকালে পুলিশ, আইনজীবী ও তৃতীয় যুগ্ম জেলা জজ আদালতের নাজিরের সহযোগিতায় বাড়ির তৃতীয় তলা থেকে তাকে জোর করে বের করে দেয়। এ নিয়ে কখনও তাকে কোনো আইনি নোটিশও দেয়া হয়নি। </span></p><hr><p><span style=\"color: rgb(51, 51, 51); font-family: \"siyam rupali\", serif; font-size: 16px; text-align: justify;\">বড় মেয়ের অভিযোগ করেছেন, গেলো বৃহস্পতিবার সকালে পুলিশ, আইনজীবী ও তৃতীয় যুগ্ম জেলা জজ আদালতের নাজিরের সহযোগিতায় বাড়ির তৃতীয় তলা থেকে তাকে জোর করে বের করে দেয়। এ নিয়ে কখনও তাকে কোনো আইনি নোটিশও দেয়া হয়নি। </span></p><hr><p><span style=\"color: rgb(51, 51, 51); font-family: \"siyam rupali\", serif; font-size: 16px; text-align: justify;\"><br></span></p><hr><p><span style=\"color: rgb(51, 51, 51); font-family: \"siyam rupali\", serif; font-size: 16px; text-align: justify;\">বড় মেয়ের অভিযোগ করেছেন, গেলো বৃহস্পতিবার সকালে পুলিশ, আইনজীবী ও তৃতীয় যুগ্ম জেলা জজ আদালতের নাজিরের সহযোগিতায় বাড়ির তৃতীয় তলা থেকে তাকে জোর করে বের করে দেয়। এ নিয়ে কখনও তাকে কোনো আইনি নোটিশও দেয়া হয়নি। </span><span style=\"color: rgb(51, 51, 51); font-family: \"siyam rupali\", serif; font-size: 16px; text-align: justify;\"><br></span><span style=\"color: rgb(51, 51, 51); font-family: \"siyam rupali\", serif; font-size: 16px; text-align: justify;\"><br></span><span style=\"color: rgb(51, 51, 51); font-family: \"siyam rupali\", serif; font-size: 16px; text-align: justify;\"><br></span><span style=\"color: rgb(51, 51, 51); font-family: \"siyam rupali\", serif; font-size: 16px; text-align: justify;\"><br></span><br></p>', 0),
(110, 0, 'নিতিমালা', 'page.php?page=terms.php', '<p style=\"padding: 0px; max-width: 100%; font-size: 16px; color: rgb(51, 51, 51); font-family: \"siyam rupali\", serif; text-align: justify;\">জাতীয় অধ্যাপক নুরুল ইসলামের রেখে যাওয়া ধানমন্ডির বাড়ি নিয়ে দুই মেয়ের এ বিবাদ। বড় মেয়ে দিনা ইসলামের অভিযোগ, তাকে বাড়ি থেকে উচ্ছেদের ষড়যন্ত্র করছেন ছোট বোন।<br style=\"margin: 0px; padding: 0px; font-family: \"siyam rupali\", serif !important;\"></p><p style=\"padding: 0px; max-width: 100%; font-size: 16px; color: rgb(51, 51, 51); font-family: \"siyam rupali\", serif; text-align: justify;\">জাতির পিতা বঙ্গবন্ধু শেখ মুজিবুর রহমানের ব্যক্তিগত চিকিৎসক ও জাতীয় অধ্যাপক নুরুল ইসলাম ধানমন্ডির সেন্ট্রাল রোডের বাড়িতে বসবাস শুরু করেন স্বাধীনতা যুদ্ধের পর থেকেই।</p><p style=\"padding: 0px; max-width: 100%; font-size: 16px; color: rgb(51, 51, 51); font-family: \"siyam rupali\", serif; text-align: justify;\">জাতীয় অধ্যাপক নুরুল ইসলামের রেখে যাওয়া ধানমন্ডির বাড়ি নিয়ে দুই মেয়ের এ বিবাদ। বড় মেয়ে দিনা ইসলামের অভিযোগ, তাকে বাড়ি থেকে উচ্ছেদের ষড়যন্ত্র করছেন ছোট বোন।<br style=\"margin: 0px; padding: 0px; font-family: \"siyam rupali\", serif !important;\"></p><p style=\"padding: 0px; max-width: 100%; font-size: 16px; color: rgb(51, 51, 51); font-family: \"siyam rupali\", serif; text-align: justify;\">জাতির পিতা বঙ্গবন্ধু শেখ মুজিবুর রহমানের ব্যক্তিগত চিকিৎসক ও জাতীয় অধ্যাপক নুরুল ইসলাম ধানমন্ডির সেন্ট্রাল রোডের বাড়িতে বসবাস শুরু করেন স্বাধীনতা যুদ্ধের পর থেকেই।</p><hr><p style=\"padding: 0px; max-width: 100%; font-size: 16px; color: rgb(51, 51, 51); font-family: \"siyam rupali\", serif; text-align: justify;\">জাতীয় অধ্যাপক নুরুল ইসলামের রেখে যাওয়া ধানমন্ডির বাড়ি নিয়ে দুই মেয়ের এ বিবাদ। বড় মেয়ে দিনা ইসলামের অভিযোগ, তাকে বাড়ি থেকে উচ্ছেদের ষড়যন্ত্র করছেন ছোট বোন।<br style=\"margin: 0px; padding: 0px; font-family: \"siyam rupali\", serif !important;\"></p><p style=\"padding: 0px; max-width: 100%; font-size: 16px; color: rgb(51, 51, 51); font-family: \"siyam rupali\", serif; text-align: justify;\">জাতির পিতা বঙ্গবন্ধু শেখ মুজিবুর রহমানের ব্যক্তিগত চিকিৎসক ও জাতীয় অধ্যাপক নুরুল ইসলাম ধানমন্ডির সেন্ট্রাল রোডের বাড়িতে বসবাস শুরু করেন স্বাধীনতা যুদ্ধের পর থেকেই।</p><hr><p style=\"padding: 0px; max-width: 100%; font-size: 16px; color: rgb(51, 51, 51); font-family: \"siyam rupali\", serif; text-align: justify;\">জাতীয় অধ্যাপক নুরুল ইসলামের রেখে যাওয়া ধানমন্ডির বাড়ি নিয়ে দুই মেয়ের এ বিবাদ। বড় মেয়ে দিনা ইসলামের অভিযোগ, তাকে বাড়ি থেকে উচ্ছেদের ষড়যন্ত্র করছেন ছোট বোন।<br style=\"margin: 0px; padding: 0px; font-family: \"siyam rupali\", serif !important;\"></p><p style=\"padding: 0px; max-width: 100%; font-size: 16px; color: rgb(51, 51, 51); font-family: \"siyam rupali\", serif; text-align: justify;\">জাতির পিতা বঙ্গবন্ধু শেখ মুজিবুর রহমানের ব্যক্তিগত চিকিৎসক ও জাতীয় অধ্যাপক নুরুল ইসলাম ধানমন্ডির সেন্ট্রাল রোডের বাড়িতে বসবাস শুরু করেন স্বাধীনতা যুদ্ধের পর থেকেই।</p><p style=\"padding: 0px; max-width: 100%; font-size: 16px; color: rgb(51, 51, 51); font-family: \"siyam rupali\", serif; text-align: justify;\"><br></p><p style=\"padding: 0px; max-width: 100%; font-size: 16px; color: rgb(51, 51, 51); font-family: \"siyam rupali\", serif; text-align: justify;\">জাতীয় অধ্যাপক নুরুল ইসলামের রেখে যাওয়া ধানমন্ডির বাড়ি নিয়ে দুই মেয়ের এ বিবাদ। বড় মেয়ে দিনা ইসলামের অভিযোগ, তাকে বাড়ি থেকে উচ্ছেদের ষড়যন্ত্র করছেন ছোট বোন।<br style=\"margin: 0px; padding: 0px; font-family: \"siyam rupali\", serif !important;\"></p><p style=\"padding: 0px; max-width: 100%; font-size: 16px; color: rgb(51, 51, 51); font-family: \"siyam rupali\", serif; text-align: justify;\">জাতির পিতা বঙ্গবন্ধু শেখ মুজিবুর রহমানের ব্যক্তিগত চিকিৎসক ও জাতীয় অধ্যাপক নুরুল ইসলাম ধানমন্ডির সেন্ট্রাল রোডের বাড়িতে বসবাস শুরু করেন স্বাধীনতা যুদ্ধের পর থেকেই।</p><hr><p style=\"padding: 0px; max-width: 100%; font-size: 16px; color: rgb(51, 51, 51); font-family: \"siyam rupali\", serif; text-align: justify;\"><br></p><p style=\"padding: 0px; max-width: 100%; font-size: 16px; color: rgb(51, 51, 51); font-family: \"siyam rupali\", serif; text-align: justify;\">জাতীয় অধ্যাপক নুরুল ইসলামের রেখে যাওয়া ধানমন্ডির বাড়ি নিয়ে দুই মেয়ের এ বিবাদ। বড় মেয়ে দিনা ইসলামের অভিযোগ, তাকে বাড়ি থেকে উচ্ছেদের ষড়যন্ত্র করছেন ছোট বোন।<br style=\"margin: 0px; padding: 0px; font-family: \"siyam rupali\", serif !important;\"></p><p style=\"padding: 0px; max-width: 100%; font-size: 16px; color: rgb(51, 51, 51); font-family: \"siyam rupali\", serif; text-align: justify;\">জাতির পিতা বঙ্গবন্ধু শেখ মুজিবুর রহমানের ব্যক্তিগত চিকিৎসক ও জাতীয় অধ্যাপক নুরুল ইসলাম ধানমন্ডির সেন্ট্রাল রোডের বাড়িতে বসবাস শুরু করেন স্বাধীনতা যুদ্ধের পর থেকেই।</p>', 0),
(111, 0, 'শর্তমালা', 'page.php?page=conditions.php', '<p style=\"padding: 0px; max-width: 100%; font-size: 16px; color: rgb(51, 51, 51); font-family: \"siyam rupali\", serif; text-align: justify;\">এ বিষয়ে বাড়ির দখল নিতে আসা ছোট বোন নীনা ইসলামের বক্তব্য জানতে গেলে আদালতের নাজির তার পক্ষে গণমাধ্যমের উপর চড়াও হন। নীনা ইসলাম এ বিষয়ে কোনো বক্তব্য দেননি। তার আইনজীবী জানায়, সব কিছু আইন ও আদালতের মাধ্যমে হয়েছে। তবে বাড়ির তৃতীয় তলা আদালত ছোট মেয়ে নীনা ইসলামকে দিয়েছে এমন কোনো কাগজ তিনি দেখাতে পারেননি।<br style=\"margin: 0px; padding: 0px; font-family: \"siyam rupali\", serif !important;\"></p><p style=\"padding: 0px; max-width: 100%; font-size: 16px; color: rgb(51, 51, 51); font-family: \"siyam rupali\", serif; text-align: justify;\">বড় মেয়ে দিনা ইসলামের দাবি, পৈত্রিক বাড়ি ভাগ করতে হলে সব ভাইবোনকে সঙ্গে নিয়েই হওয়া উচিত। তার অভিযোগ শুধু তৃতীয় তলা নয়, ছোট বোন পুরো বাড়ি দখলের পায়তারা করছে। এই তৎপরতার বিরুদ্ধে সুবিচারও চেয়েছেন তিনি।</p><p style=\"padding: 0px; max-width: 100%; font-size: 16px; color: rgb(51, 51, 51); font-family: \"siyam rupali\", serif; text-align: justify;\"><br></p><hr><p style=\"padding: 0px; max-width: 100%; font-size: 16px; color: rgb(51, 51, 51); font-family: \"siyam rupali\", serif; text-align: justify;\">এ বিষয়ে বাড়ির দখল নিতে আসা ছোট বোন নীনা ইসলামের বক্তব্য জানতে গেলে আদালতের নাজির তার পক্ষে গণমাধ্যমের উপর চড়াও হন। নীনা ইসলাম এ বিষয়ে কোনো বক্তব্য দেননি। তার আইনজীবী জানায়, সব কিছু আইন ও আদালতের মাধ্যমে হয়েছে। তবে বাড়ির তৃতীয় তলা আদালত ছোট মেয়ে নীনা ইসলামকে দিয়েছে এমন কোনো কাগজ তিনি দেখাতে পারেননি।<br style=\"margin: 0px; padding: 0px; font-family: \"siyam rupali\", serif !important;\"></p><p style=\"padding: 0px; max-width: 100%; font-size: 16px; color: rgb(51, 51, 51); font-family: \"siyam rupali\", serif; text-align: justify;\">বড় মেয়ে দিনা ইসলামের দাবি, পৈত্রিক বাড়ি ভাগ করতে হলে সব ভাইবোনকে সঙ্গে নিয়েই হওয়া উচিত। তার অভিযোগ শুধু তৃতীয় তলা নয়, ছোট বোন পুরো বাড়ি দখলের পায়তারা করছে। এই তৎপরতার বিরুদ্ধে সুবিচারও চেয়েছেন তিনি।</p><hr><p style=\"padding: 0px; max-width: 100%; font-size: 16px; color: rgb(51, 51, 51); font-family: \"siyam rupali\", serif; text-align: justify;\">এ বিষয়ে বাড়ির দখল নিতে আসা ছোট বোন নীনা ইসলামের বক্তব্য জানতে গেলে আদালতের নাজির তার পক্ষে গণমাধ্যমের উপর চড়াও হন। নীনা ইসলাম এ বিষয়ে কোনো বক্তব্য দেননি। তার আইনজীবী জানায়, সব কিছু আইন ও আদালতের মাধ্যমে হয়েছে। তবে বাড়ির তৃতীয় তলা আদালত ছোট মেয়ে নীনা ইসলামকে দিয়েছে এমন কোনো কাগজ তিনি দেখাতে পারেননি।<br style=\"margin: 0px; padding: 0px; font-family: \"siyam rupali\", serif !important;\"></p><p style=\"padding: 0px; max-width: 100%; font-size: 16px; color: rgb(51, 51, 51); font-family: \"siyam rupali\", serif; text-align: justify;\">বড় মেয়ে দিনা ইসলামের দাবি, পৈত্রিক বাড়ি ভাগ করতে হলে সব ভাইবোনকে সঙ্গে নিয়েই হওয়া উচিত। তার অভিযোগ শুধু তৃতীয় তলা নয়, ছোট বোন পুরো বাড়ি দখলের পায়তারা করছে। এই তৎপরতার বিরুদ্ধে সুবিচারও চেয়েছেন তিনি।</p><hr><p style=\"padding: 0px; max-width: 100%; font-size: 16px; color: rgb(51, 51, 51); font-family: \"siyam rupali\", serif; text-align: justify;\">এ বিষয়ে বাড়ির দখল নিতে আসা ছোট বোন নীনা ইসলামের বক্তব্য জানতে গেলে আদালতের নাজির তার পক্ষে গণমাধ্যমের উপর চড়াও হন। নীনা ইসলাম এ বিষয়ে কোনো বক্তব্য দেননি। তার আইনজীবী জানায়, সব কিছু আইন ও আদালতের মাধ্যমে হয়েছে। তবে বাড়ির তৃতীয় তলা আদালত ছোট মেয়ে নীনা ইসলামকে দিয়েছে এমন কোনো কাগজ তিনি দেখাতে পারেননি।<br style=\"margin: 0px; padding: 0px; font-family: \"siyam rupali\", serif !important;\"></p><p style=\"padding: 0px; max-width: 100%; font-size: 16px; color: rgb(51, 51, 51); font-family: \"siyam rupali\", serif; text-align: justify;\">বড় মেয়ে দিনা ইসলামের দাবি, পৈত্রিক বাড়ি ভাগ করতে হলে সব ভাইবোনকে সঙ্গে নিয়েই হওয়া উচিত। তার অভিযোগ শুধু তৃতীয় তলা নয়, ছোট বোন পুরো বাড়ি দখলের পায়তারা করছে। এই তৎপরতার বিরুদ্ধে সুবিচারও চেয়েছেন তিনি।</p><hr><p style=\"padding: 0px; max-width: 100%; font-size: 16px; color: rgb(51, 51, 51); font-family: \"siyam rupali\", serif; text-align: justify;\">এ বিষয়ে বাড়ির দখল নিতে আসা ছোট বোন নীনা ইসলামের বক্তব্য জানতে গেলে আদালতের নাজির তার পক্ষে গণমাধ্যমের উপর চড়াও হন। নীনা ইসলাম এ বিষয়ে কোনো বক্তব্য দেননি। তার আইনজীবী জানায়, সব কিছু আইন ও আদালতের মাধ্যমে হয়েছে। তবে বাড়ির তৃতীয় তলা আদালত ছোট মেয়ে নীনা ইসলামকে দিয়েছে এমন কোনো কাগজ তিনি দেখাতে পারেননি।<br style=\"margin: 0px; padding: 0px; font-family: \"siyam rupali\", serif !important;\"></p><p style=\"padding: 0px; max-width: 100%; font-size: 16px; color: rgb(51, 51, 51); font-family: \"siyam rupali\", serif; text-align: justify;\">বড় মেয়ে দিনা ইসলামের দাবি, পৈত্রিক বাড়ি ভাগ করতে হলে সব ভাইবোনকে সঙ্গে নিয়েই হওয়া উচিত। তার অভিযোগ শুধু তৃতীয় তলা নয়, ছোট বোন পুরো বাড়ি দখলের পায়তারা করছে। এই তৎপরতার বিরুদ্ধে সুবিচারও চেয়েছেন তিনি।</p><hr><p style=\"padding: 0px; max-width: 100%; font-size: 16px; color: rgb(51, 51, 51); font-family: \"siyam rupali\", serif; text-align: justify;\">এ বিষয়ে বাড়ির দখল নিতে আসা ছোট বোন নীনা ইসলামের বক্তব্য জানতে গেলে আদালতের নাজির তার পক্ষে গণমাধ্যমের উপর চড়াও হন। নীনা ইসলাম এ বিষয়ে কোনো বক্তব্য দেননি। তার আইনজীবী জানায়, সব কিছু আইন ও আদালতের মাধ্যমে হয়েছে। তবে বাড়ির তৃতীয় তলা আদালত ছোট মেয়ে নীনা ইসলামকে দিয়েছে এমন কোনো কাগজ তিনি দেখাতে পারেননি।<br style=\"margin: 0px; padding: 0px; font-family: \"siyam rupali\", serif !important;\"></p><p style=\"padding: 0px; max-width: 100%; font-size: 16px; color: rgb(51, 51, 51); font-family: \"siyam rupali\", serif; text-align: justify;\">বড় মেয়ে দিনা ইসলামের দাবি, পৈত্রিক বাড়ি ভাগ করতে হলে সব ভাইবোনকে সঙ্গে নিয়েই হওয়া উচিত। তার অভিযোগ শুধু তৃতীয় তলা নয়, ছোট বোন পুরো বাড়ি দখলের পায়তারা করছে। এই তৎপরতার বিরুদ্ধে সুবিচারও চেয়েছেন তিনি।</p><hr><p style=\"padding: 0px; max-width: 100%; font-size: 16px; color: rgb(51, 51, 51); font-family: \"siyam rupali\", serif; text-align: justify;\"><br></p><hr><p style=\"padding: 0px; max-width: 100%; font-size: 16px; color: rgb(51, 51, 51); font-family: \"siyam rupali\", serif; text-align: justify;\">এ বিষয়ে বাড়ির দখল নিতে আসা ছোট বোন নীনা ইসলামের বক্তব্য জানতে গেলে আদালতের নাজির তার পক্ষে গণমাধ্যমের উপর চড়াও হন। নীনা ইসলাম এ বিষয়ে কোনো বক্তব্য দেননি। তার আইনজীবী জানায়, সব কিছু আইন ও আদালতের মাধ্যমে হয়েছে। তবে বাড়ির তৃতীয় তলা আদালত ছোট মেয়ে নীনা ইসলামকে দিয়েছে এমন কোনো কাগজ তিনি দেখাতে পারেননি।<br style=\"margin: 0px; padding: 0px; font-family: \"siyam rupali\", serif !important;\"></p><p style=\"padding: 0px; max-width: 100%; font-size: 16px; color: rgb(51, 51, 51); font-family: \"siyam rupali\", serif; text-align: justify;\">বড় মেয়ে দিনা ইসলামের দাবি, পৈত্রিক বাড়ি ভাগ করতে হলে সব ভাইবোনকে সঙ্গে নিয়েই হওয়া উচিত। তার অভিযোগ শুধু তৃতীয় তলা নয়, ছোট বোন পুরো বাড়ি দখলের পায়তারা করছে। এই তৎপরতার বিরুদ্ধে সুবিচারও চেয়েছেন তিনি।</p>', 0);

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE `newsletter` (
  `id` int(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `time` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `newsletter`
--

INSERT INTO `newsletter` (`id`, `email`, `time`) VALUES
(1, 'freelancermunna4@gmail.com', 1666684409),
(2, 'sohan@gmail.com', 1666684442),
(3, 'freelancermunna4@gmail.com', 1666836621),
(4, 'admin@gmail.com', 1666837144),
(5, 'admin@gmail.com', 1666843920),
(6, 'admin@gmail.com', 1666844535),
(7, 'munna@gmail.com', 1666844810),
(8, 'shamimlem@gamil.com', 1666844858),
(9, 'shamimlem@gamil.com', 1666844858),
(10, 'admin@gmail.com', 1666845151),
(11, 'sakhawat@gmail.com', 1666845183),
(12, 'sakhawat@gmail.com', 1666845183),
(13, 'sakhawat@gmail.com', 1666845198),
(14, 'admin@gmail.com', 1666845281),
(15, 'sakhawat@gmail.com', 1666847809),
(16, 'codeartfreefire@gmail.com', 1666878188),
(17, 'codeartfreefire@gmail.com', 1666878188),
(18, 'admin@gmail.com', 1666878356),
(19, 'admin@gmail.com', 1666878461),
(20, 'admin@gmail.com', 1666879153),
(21, 'codeartfreefire@gmail.com', 1666879238),
(22, 'admin@gmail.com', 1666879530),
(23, 'codeartfreefire@gmail.com', 1666879781),
(24, 'admin@gmail.com', 1666879847),
(29, 'admin@gmail.com', 1667031684),
(30, 'admin@gmail.com', 1667480198),
(31, 'admin@gmail.com', 1667718304),
(32, 'freelancermunna4@gmail.com', 1667718356),
(33, 'freelancermunna4@gmail.com', 1667718356),
(34, 'admin@gmail.com', 1667718460),
(35, 'admin@gmail.com', 1675712190),
(36, 'admin@gmail.com', 1678682445),
(37, 'admin@gmail.com', 1678692423),
(38, 'admin@gmail.com', 1680261578),
(39, 'admin@gmail.com', 1680328742),
(40, 'admin@gmail.com', 1680425715),
(41, 'tramp@gmail.com', 1680425770),
(42, 'tramp@gmail.com', 1680425770),
(43, 'admin@gmail.com', 1680436565),
(44, 'admin@gmail.com', 1680446698);

-- --------------------------------------------------------

--
-- Table structure for table `newsletter_tmp`
--

CREATE TABLE `newsletter_tmp` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `template` longtext NOT NULL,
  `time` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(255) NOT NULL,
  `author_img` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `tag` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `reference` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `visits` int(255) NOT NULL,
  `time` int(255) NOT NULL,
  `summery` longtext NOT NULL,
  `content` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `author_img`, `email`, `title`, `category`, `tag`, `author`, `reference`, `img`, `status`, `visits`, `time`, `summery`, `content`) VALUES
(34, 'images.png', 'admin@gmail.com', 'আশুলিয়ায় মোটরসাইকেল আরোহী নিহত, দুই বাসে আগুন', 'Science', 'আশুলিয়া, সড়ক দুর্ঘটনা, আগুন', 'Admin', '42544813', 'accident-770x450.jpg', 'Publish', 18, 1680413540, 'আশুলিয়ার জিরাবোতে বাস চাপায় এক মোটরসাইকেল আরোহী নিহত হয়েছেন। এ ঘটনার প্রতিবাদে দুইটি বাসে আগুন দিয়েছে বিক্ষুব্ধ জনতা। এছাড়া তারা সড়ক অবরোধ করেও প্রতিবাদ জানান।\r\n\r\nরোববার (২ এপ্রিল) সকালে এ দুর্ঘটনা ঘটে।\r\n\r\nআশুলিয়া থানার উপ-পরিদর্শক রাজু মণ্ডল বিষয়টি নিশ্চিত করে জানান, দুর্ঘটনার পর স্থানীয়রা সড়ক অবরোধ করে বিক্ষোভ করেন। তারা দুটো বাসেও আগুন ধরিয়ে দেন পুলিশ। পরিস্থিতি নিয়ন্ত্রণে এসেছে।\r\n\r\nতবে, তাৎক্ষণিভাবে নিহতের পরিচয় জানা যায়নি।', '<p style=\"padding: 0px; max-width: 100%; font-size: 16px; color: rgb(51, 51, 51); font-family: \"siyam rupali\", serif; text-align: justify;\">আশুলিয়ার জিরাবোতে বাস চাপায় এক মোটরসাইকেল আরোহী নিহত হয়েছেন। এ ঘটনার প্রতিবাদে দুইটি বাসে আগুন দিয়েছে বিক্ষুব্ধ জনতা। এছাড়া তারা সড়ক অবরোধ করেও প্রতিবাদ জানান।</p><p style=\"padding: 0px; max-width: 100%; font-size: 16px; color: rgb(51, 51, 51); font-family: \"siyam rupali\", serif; text-align: justify;\">রোববার (২ এপ্রিল) সকালে এ দুর্ঘটনা ঘটে।</p><p style=\"padding: 0px; max-width: 100%; font-size: 16px; color: rgb(51, 51, 51); font-family: \"siyam rupali\", serif; text-align: justify;\">আশুলিয়া থানার উপ-পরিদর্শক রাজু মণ্ডল বিষয়টি নিশ্চিত করে জানান, দুর্ঘটনার পর স্থানীয়রা সড়ক অবরোধ করে বিক্ষোভ করেন। তারা দুটো বাসেও আগুন ধরিয়ে দেন পুলিশ। পরিস্থিতি নিয়ন্ত্রণে এসেছে।</p><p style=\"padding: 0px; max-width: 100%; font-size: 16px; color: rgb(51, 51, 51); font-family: \"siyam rupali\", serif; text-align: justify;\">তবে, তাৎক্ষণিভাবে নিহতের পরিচয় জানা যায়নি।</p><p style=\"padding: 0px; max-width: 100%; font-size: 16px; color: rgb(51, 51, 51); font-family: \"siyam rupali\", serif; text-align: justify;\"><span style=\"margin: 0px; padding: 0px; font-weight: 700; font-family: \"siyam rupali\", serif !important;\">আরও পড়ুন: </span><a href=\"https://ekattor.tv/news/article?article_id=42100\" target=\"\" style=\"margin: 0px; padding: 0px; text-decoration: none; outline: solid 0px; color: rgb(0, 91, 255); background-color: rgb(255, 255, 255); font-weight: 700; font-family: \"siyam rupali\", serif !important;\">খুলনায় পুলিশ-বিএনপি সংঘর্ষ, দুই জেলায় পাল্টাপাল্টি ধাওয়া</a><br style=\"margin: 0px; padding: 0px; font-family: \"siyam rupali\", serif !important;\"></p><p style=\"padding: 0px; max-width: 100%; font-size: 16px; color: rgb(51, 51, 51); font-family: \"siyam rupali\", serif; text-align: justify;\">আশুলিয়া জিরাবো ফায়ার সার্ভিসের সিনিয়র অফিসার আহমেদুল কবির জানান, রোববার সকাল সাড়ে আটটার দিকে, ঢাকা আরিচা মহাসড়কের জিরাবোতে একটি বাস অন্য একটি বাসকে অতিক্রম করছিল। এসময় একটি বাস মোটরসাইকেলকে চাপা দেয়। এতে ঘটনাস্থলেই মারা যান মোটরসাইকেল আরোহী। এ ঘটনার পর দুটি বাসে আগুন ধরিয়ে দেয় বিক্ষুব্ধ জনতা। পরে খবর পেয়ে ফায়ার সার্ভিসের কর্মীরা এসে আগুন নিয়ন্ত্রণে আনে। তবে নিহতের পরিচয় এখনও জানা যায়নি।</p>'),
(35, 'images.png', 'admin@gmail.com', 'ঢাকা বিশ্ববিদ্যালয়ে আতঙ্কের এক নাম প্রলয় গ্যাং!', 'Religion', '', 'Admin', '7138643', 'DU 2-770x450.jpg', 'Publish', 3, 1680413621, 'ঢাকা বিশ্ববিদ্যালয়ে গ্যাং সংস্কৃতি! শিক্ষার্থীদের কাছে এখন রীতিমতো আতঙ্কের নাম প্রলয় গ্যাং। ২৫ মার্চে এক শিক্ষার্থীকে মারধরের পর বিশ্ববিদ্যালয়ে বিষয়টি আলোচনায় আসে। \r\n\r\nএরিমধ্যে আটক হয়েছে গ্যাংটির কয়েক সদস্য। তাদের দুজনকে বহিষ্কার করেছে বিশ্ববিদ্যালয় প্রশাসন। সেই সঙ্গে ২৮ মার্চে একটি কমিটি গঠন করেছে বিশ্ববিদ্যালয় প্রশাসন।', '<p style=\"padding: 0px; max-width: 100%; font-size: 16px; color: rgb(51, 51, 51); font-family: &quot;siyam rupali&quot;, serif; text-align: justify;\">ঢাকা বিশ্ববিদ্যালয়ে গ্যাং সংস্কৃতি! শিক্ষার্থীদের কাছে এখন রীতিমতো আতঙ্কের নাম প্রলয় গ্যাং। ২৫ মার্চে এক শিক্ষার্থীকে মারধরের পর বিশ্ববিদ্যালয়ে বিষয়টি আলোচনায় আসে।&nbsp;</p><p style=\"padding: 0px; max-width: 100%; font-size: 16px; color: rgb(51, 51, 51); font-family: &quot;siyam rupali&quot;, serif; text-align: justify;\">এরিমধ্যে আটক হয়েছে গ্যাংটির কয়েক সদস্য। তাদের দুজনকে বহিষ্কার করেছে বিশ্ববিদ্যালয় প্রশাসন। সেই সঙ্গে ২৮ মার্চে একটি কমিটি গঠন করেছে বিশ্ববিদ্যালয় প্রশাসন।<br style=\"margin: 0px; padding: 0px; font-family: &quot;siyam rupali&quot;, serif !important;\"></p><p style=\"padding: 0px; max-width: 100%; font-size: 16px; color: rgb(51, 51, 51); font-family: &quot;siyam rupali&quot;, serif; text-align: justify;\">২০২৩ সালের শুরুতেই দেশের প্রথম সারির বিশ্ববিদ্যালয়গুলোতে দেখা যায় ছিনতাই, আটকে রেখে মুক্তিপণ দাবির মতো ঘটনা। বাদ যায়নি ঢাকা বিশ্ববিদ্যালয়ও।<br style=\"margin: 0px; padding: 0px; font-family: &quot;siyam rupali&quot;, serif !important;\"></p><p style=\"padding: 0px; max-width: 100%; font-size: 16px; color: rgb(51, 51, 51); font-family: &quot;siyam rupali&quot;, serif; text-align: justify;\">গেলো ২৫ মার্চ ঢাকা বিশ্ববিদ্যালয়ে অপরাধ বিজ্ঞান বিভাগের শিক্ষার্থী জোবায়ের ইবনে হূমায়ূনকে মারধরের ঘটনার পর বিশ্ববিদ্যালয়ে সন্ত্রাসী কর্মকাণ্ডের সঙ্গে সঙ্গে সামনে আসে প্রলয় গ্যাং।<br style=\"margin: 0px; padding: 0px; font-family: &quot;siyam rupali&quot;, serif !important;\"></p><p style=\"padding: 0px; max-width: 100%; font-size: 16px; color: rgb(51, 51, 51); font-family: &quot;siyam rupali&quot;, serif; text-align: justify;\">এর আগে বিশ্ববিদ্যালয়ের সোহরাওয়ার্দী উদ্যান, টিএসসি আর শহীদ মিনার এলাকায় প্রলয় গ্যাং এর তৎপরতার কথা শোনা গেছে।<br style=\"margin: 0px; padding: 0px; font-family: &quot;siyam rupali&quot;, serif !important;\"></p><p style=\"padding: 0px; max-width: 100%; font-size: 16px; color: rgb(51, 51, 51); font-family: &quot;siyam rupali&quot;, serif; text-align: justify;\">বহিরাগত শিক্ষার্থীদের হেনস্তা, ছিনতাই, চাঁদাবাজি ও মাদক সরবরাহ করা এই গ্যাংয়ের মূল কাজ। বিশ্ববিদ্যালয়ের শিক্ষার্থী জোবায়েরকে মারধরের পর আতঙ্কে ভুগছেন সাধারণ শিক্ষার্থীরা।</p><p style=\"padding: 0px; max-width: 100%; font-size: 16px; color: rgb(51, 51, 51); font-family: &quot;siyam rupali&quot;, serif; text-align: justify;\"><img src=\"https://ekattor.tv/image/catalog/2023/March/31%20March/ANirudhya/Gang.jpg\" style=\"margin: 0px; padding: 0px; border-style: none; font-family: &quot;siyam rupali&quot;, serif !important;\"><br style=\"margin: 0px; padding: 0px; font-family: &quot;siyam rupali&quot;, serif !important;\"></p><p style=\"padding: 0px; max-width: 100%; font-size: 16px; color: rgb(51, 51, 51); font-family: &quot;siyam rupali&quot;, serif; text-align: justify;\">জানা গেছে, এই গ্যাংটি বিশ্ববিদ্যালয়ের ২০২০-২১ সেশনের শিক্ষার্থীদের নিয়ে গঠিত। রয়েছে আরও দুইটি গ্যাং। তাদের একটি ২০১৭-১৮ সেশনের শিক্ষার্থীদের নিয়ে।</p><p style=\"padding: 0px; max-width: 100%; font-size: 16px; color: rgb(51, 51, 51); font-family: &quot;siyam rupali&quot;, serif; text-align: justify;\">এই গ্যাংটির নিশাচর’ এবং যা বর্তমানে কিছুটা নিষ্ক্রিয় রয়েছে বলে জানা গেছে। অপরটি ২০১৮-১৯ সেশনের শিক্ষার্থীদের ‘ঐক্যবদ্ধ নিশাচর-২’।<br style=\"margin: 0px; padding: 0px; font-family: &quot;siyam rupali&quot;, serif !important;\"></p><p style=\"padding: 0px; max-width: 100%; font-size: 16px; color: rgb(51, 51, 51); font-family: &quot;siyam rupali&quot;, serif; text-align: justify;\">শোনা যাচ্ছে প্রলয় গ্যাং এর কিছু সদস্য আছে বিশ্ববিদ্যালয় ছাত্রলীগের বিভিন্ন পদে। তাহলে কি ছাত্র সংগঠনের প্রশ্রয়ে তারা এসব অপকর্ম চালিয়ে যাচ্ছে?&nbsp;</p><p style=\"padding: 0px; max-width: 100%; font-size: 16px; color: rgb(51, 51, 51); font-family: &quot;siyam rupali&quot;, serif; text-align: justify;\"><img src=\"https://ekattor.tv/image/catalog/2023/March/31%20March/ANirudhya/Saddam.jpg\" style=\"margin: 0px; padding: 0px; border-style: none; font-family: &quot;siyam rupali&quot;, serif !important;\"><br style=\"margin: 0px; padding: 0px; font-family: &quot;siyam rupali&quot;, serif !important;\"></p><p style=\"padding: 0px; max-width: 100%; font-size: 16px; color: rgb(51, 51, 51); font-family: &quot;siyam rupali&quot;, serif; text-align: justify;\">যদিও নির্যাতনের শিকার জোবায়েরও ছাত্রলীগ কমিটিতে আছেন। তাহলে কী ব্যবস্থা নেবে ছাত্রলীগ। সংগঠনটির নেতারা বলছেন, তদন্তের পরই সিদ্ধান্ত।</p><p style=\"padding: 0px; max-width: 100%; font-size: 16px; color: rgb(51, 51, 51); font-family: &quot;siyam rupali&quot;, serif; text-align: justify;\">ঘটনা তদন্তে হল প্রধ্যক্ষদের নিয়ে একটি গঠন করেছে কমিটি বিশ্ববিদ্যালয় প্রশাসন। প্রক্টর বলেন, ২৫ মার্চের ঘটনায় ১৯ জনের সম্পৃক্ততা মিলেছে, যারা ৭টি হলের শিক্ষার্থী।&nbsp;<br style=\"margin: 0px; padding: 0px; font-family: &quot;siyam rupali&quot;, serif !important;\"></p><p style=\"padding: 0px; max-width: 100%; font-size: 16px; color: rgb(51, 51, 51); font-family: &quot;siyam rupali&quot;, serif; text-align: justify;\">যেহেতু মাদকের বিষয়টি সামনে এসেছে তাই বিশ্ববিদ্যালয়ে ভর্তির সময় শিক্ষার্থীদের ডোপ টেস্টের বিষয়টি যুক্ত করাটা সময়ের দাবি বলেও জানান এই শিক্ষক।&nbsp;<br style=\"margin: 0px; padding: 0px; font-family: &quot;siyam rupali&quot;, serif !important;\"></p><p style=\"padding: 0px; max-width: 100%; font-size: 16px; color: rgb(51, 51, 51); font-family: &quot;siyam rupali&quot;, serif; text-align: justify;\">আর সাধারণ শিক্ষার্থীরা বলছেন, গ্যাং কালচার নতুন কিছু না। এর জন্য ক্যাম্পাসের রাজনৈতিক পরিস্থিতি ও বিচারহীনতার সংস্কৃতিকে দায়ি বলে মনে করেন তারা।</p>'),
(36, 'images.png', 'admin@gmail.com', 'ট্রাম্পকে হাতকড়া পরিয়ে আদালতে নেয়া হচ্ছে না', 'Health', '', 'Admin', '16589040', 'trump1-770x450.jpg', 'Publish', 1, 1680416788, 'এক পর্ন তারকার মুখ বন্ধ রাখতে ঘুষ দেয়ার অভিযোগে ফৌজদারি অপরাধে অভিযুক্ত হয়েছেন যুক্তরাষ্ট্রের সাবেক প্রেসিডেন্ট ডোনাল্ড ট্রাম্পের বিরুদ্ধে। দেশটির ইতিহাসে এই প্রথমবার সাবেক কোন প্রেসিডেন্ট এ ধরনের অভিযোগে অভিযুক্ত হলেন ট্রাম্প। ', '<p style=\"padding: 0px; max-width: 100%; font-size: 16px; color: rgb(51, 51, 51); font-family: &quot;siyam rupali&quot;, serif; text-align: justify;\">এক পর্ন তারকার মুখ বন্ধ রাখতে ঘুষ দেয়ার অভিযোগে ফৌজদারি অপরাধে অভিযুক্ত হয়েছেন যুক্তরাষ্ট্রের সাবেক প্রেসিডেন্ট ডোনাল্ড ট্রাম্পের বিরুদ্ধে। দেশটির ইতিহাসে এই প্রথমবার সাবেক কোন প্রেসিডেন্ট এ ধরনের অভিযোগে অভিযুক্ত হলেন ট্রাম্প।&nbsp;</p><p style=\"padding: 0px; max-width: 100%; font-size: 16px; color: rgb(51, 51, 51); font-family: &quot;siyam rupali&quot;, serif; text-align: justify;\">এই মামলায় হাজিরা দিতে মঙ্গলবার ডোনাল্ড ট্রাম্প আদালতে যাবেন বলে নিশ্চিত করেছেন তার আইনজীবীরা। তবে হাজিরা দেয়ার সময় ট্রাম্পকে গ্রেফতার করা হলেও হাতকড়া পরানো হবে না বলে জানিয়েছে আমেরিকান গণমাধ্যমগুলো।&nbsp;</p><p style=\"padding: 0px; max-width: 100%; font-size: 16px; color: rgb(51, 51, 51); font-family: &quot;siyam rupali&quot;, serif; text-align: justify;\">মার্কিন পুলিশ সূত্র জানিয়েছে, সোমবার ব্যক্তিগত উড়োজাহাজে করে নিউইয়র্কে উড়ে যাবেন ট্রাম্প। এ সময় তাকে নিরাপত্তা দেবে দেশটির ফেডারেল এজেন্টরা। নিউইয়র্কের স্থানীয় সময় মঙ্গলবার বিকেলের দিকে আদালতে আত্মসমর্পণ করতে যাবেন ট্রাম্প।&nbsp;</p><p style=\"padding: 0px; max-width: 100%; font-size: 16px; color: rgb(51, 51, 51); font-family: &quot;siyam rupali&quot;, serif; text-align: justify;\">ট্রাম্পের বিরুদ্ধে কি ধরনের অভিযোগ আনা হবে এখন পর্যন্ত সেটি জানানো হয়নি। গ্রেপ্তারের পর তার সঙ্গে কেমন আচরণ করা হবে, অন্য অপরাধীদের মতো তাকেও আঙুলের ছাপ দিতে হবে কি না, এবং তিনি আর প্রেসিডেন্ট নির্বাচন করতে কি না- এনিয়েই আলোচনা এখন তুঙ্গে।&nbsp;</p><p style=\"padding: 0px; max-width: 100%; font-size: 16px; color: rgb(51, 51, 51); font-family: &quot;siyam rupali&quot;, serif; text-align: justify;\"><img src=\"https://ekattor.tv/image/catalog/2023/April/01%20APR/Novera/trumo2.jpg\" data-pagespeed-url-hash=\"3341141763\" style=\"margin: 0px; padding: 0px; border-style: none; font-family: &quot;siyam rupali&quot;, serif !important;\"><br style=\"margin: 0px; padding: 0px; font-family: &quot;siyam rupali&quot;, serif !important;\"></p><p style=\"padding: 0px; max-width: 100%; font-size: 16px; color: rgb(51, 51, 51); font-family: &quot;siyam rupali&quot;, serif; text-align: justify;\">বিবিসি এক প্রতিবেদনে জানিয়েছে, সাবেক প্রেসিডেন্ট হিসাবে ট্রাম্পের সঙ্গে অন্যসব আসামির মতো আচরণ করা নাও হতে পারে। ফলে গণমাধ্যমের সামনে দিয়ে প্রকাশ্যে আদালতে প্রবেশ না-ও করতে হতে পারে। ট্রাম্পকে গোপনে আদালতে প্রবেশের সুযোগ দেওয়া হতে পারে।</p><p style=\"padding: 0px; max-width: 100%; font-size: 16px; color: rgb(51, 51, 51); font-family: &quot;siyam rupali&quot;, serif; text-align: justify;\">তবে আদালতে হাজির হবার পর ফৌজদারি অপরাধে অভিযুক্ত অন্য আসামিদের মতো ট্রাম্পের আঙুলের ছাপও নেয়া হবে। তার মুখের ছবি তোলা হবে। ট্রাম্পকে মিরান্ডা রাইটস পড়ে শোনানো হবে। এ আইনের আওতায় ট্রাম্প সাংবিধানিকভাবে একজন আইনজীবী নিয়োগ করার অধিকার পাবেন। পাশাপাশি পুলিশের সঙ্গে কথা বলতেও অস্বীকৃতি জানাতে পারবেন।</p><p style=\"padding: 0px; max-width: 100%; font-size: 16px; color: rgb(51, 51, 51); font-family: &quot;siyam rupali&quot;, serif; text-align: justify;\">পুরো প্রক্রিয়া চলাকালে সিক্রেট সার্ভিসের এজেন্টরা ট্রাম্পের সঙ্গে থাকবেন। এরপর বিচারকের সামনে হাজির না করা পর্যন্ত ট্রাম্পকে হাজতখানা বা বিশেষ কক্ষে আটক রাখা হবে। আদালতে আসামিরা যখন বিচারকের কাছে নিজেদের আর্জি পেশ করেন, তখন চাইলে সাধারণ মানুষও সেখানে হাজির থাকতে পারেন।</p><p style=\"padding: 0px; max-width: 100%; font-size: 16px; color: rgb(51, 51, 51); font-family: &quot;siyam rupali&quot;, serif; text-align: justify;\">ছোটখাটো অপরাধের ক্ষেত্রে আসামিকে জরিমানা করা হয়। ট্রাম্প যদি ফৌজদারি অপরাধে দোষী সাব্যস্ত হন, তাহলে তার সর্বোচ্চ চার বছরের জেল সাজা হতে পারে। অবশ্য আইন বিশেষজ্ঞদের ধারণা, ট্রাম্পের ক্ষেত্রে জরিমানা হওয়ার সম্ভাবনাই বেশি। তাকে কারাদণ্ড দেয়ার সম্ভাবনা কম।&nbsp;</p><p style=\"padding: 0px; max-width: 100%; font-size: 16px; color: rgb(51, 51, 51); font-family: &quot;siyam rupali&quot;, serif; text-align: justify;\">ট্রাম্প যদি অভিযুক্ত বা দোষীও সাব্যস্ত হন, তবু তিনি প্রেসিডেন্ট নির্বাচনের জন্য প্রচার চালিয়ে যেতে পারবেন। আর ট্রাম্পও ইঙ্গিত দিয়েই রেখেছেন, যা-ই ঘটুক না কেন, তিনি নির্বাচনের প্রচার কাজ চালিয়ে যাবেন। এই অধিকার দিয়ে রেখেছে দেশটির সংবিধান।&nbsp;</p><p style=\"padding: 0px; max-width: 100%; font-size: 16px; color: rgb(51, 51, 51); font-family: &quot;siyam rupali&quot;, serif; text-align: justify;\"><img src=\"https://ekattor.tv/image/catalog/2023/April/01%20APR/Novera/trump3.jpg\" data-pagespeed-url-hash=\"3560425671\" style=\"margin: 0px; padding: 0px; border-style: none; font-family: &quot;siyam rupali&quot;, serif !important;\"><br style=\"margin: 0px; padding: 0px; font-family: &quot;siyam rupali&quot;, serif !important;\"></p><p style=\"padding: 0px; max-width: 100%; font-size: 16px; color: rgb(51, 51, 51); font-family: &quot;siyam rupali&quot;, serif; text-align: justify;\">কারণ, প্রার্থী দোষী সাব্যস্ত হলে তাকে নির্বাচনী প্রচার চালাতে না দেয়া কিংবা প্রেসিডেন্ট হতে না দেয়ার মতো কোনো আইনই নেই যুক্তরাষ্ট্রে। এমনকি কারাগারে থেকেও রাজনীতি করে যেতে কোনো বাধা নেই। কাজেই ফৌজদারি অপরাধে অভিযুক্ত ডোনাল্ড ট্রাম্পের নির্বাচনী প্রচারণা চালানোর ক্ষেত্রে তাই আপাত কোনো বাধাই নেই।</p><p style=\"padding: 0px; max-width: 100%; font-size: 16px; color: rgb(51, 51, 51); font-family: &quot;siyam rupali&quot;, serif; text-align: justify;\">বিশ্লেষকরা মনে করেন, ফৌজদারি অপরাধে অভিযুক্ত ট্রাম্প আদালতে হাজিরা দিলে, নেতিবাচক প্রভাব ফেলবে তাঁর রাজনৈতিক অভিযাত্রায়। তবে আরেকটি পক্ষ মনে করে, ক্ষমতায় থাকতে ট্রাম্প দুইবার অভিশংসন হলেও, তাকে চূড়ান্তভাবে অভিযুক্ত করা যায়নি।&nbsp;</p><p style=\"padding: 0px; max-width: 100%; font-size: 16px; color: rgb(51, 51, 51); font-family: &quot;siyam rupali&quot;, serif; text-align: justify;\"><span style=\"margin: 0px; padding: 0px; font-weight: bold; font-family: &quot;siyam rupali&quot;, serif !important;\">আরও পড়ুন:&nbsp;<a href=\"https://ekattor.tv/news/article?article_id=42066\" target=\"_blank\" style=\"margin: 0px; padding: 0px; text-decoration: none; outline: solid 0px; color: rgb(0, 91, 255); font-family: &quot;siyam rupali&quot;, serif !important;\">আত্মসমর্পণ করতে পারেন ট্রাম্প, চলছে আদালতে নেয়ার প্রস্তুতি</a></span></p><p style=\"padding: 0px; max-width: 100%; font-size: 16px; color: rgb(51, 51, 51); font-family: &quot;siyam rupali&quot;, serif; text-align: justify;\">উল্লেখ্য, ২০১৬ সালে পর্ন তারকা স্টর্মি ড্যানিয়েলস অভিযোগ করেন যে, ২০০৬ সালে ট্রাম্পের সঙ্গে তার যৌন সম্পর্ক গড়ে উঠে। প্রেসিডেন্ট নির্বাচনের আগে যাতে এ নিয়ে মুখ না খোলেন, সেজন্য স্টর্মিকে ১ লাখ ৩০ হাজার ডলার ঘুষ দেন ট্রাম্পের আইনজীবী মাইকেল কোহেন।</p><p style=\"padding: 0px; max-width: 100%; font-size: 16px; color: rgb(51, 51, 51); font-family: &quot;siyam rupali&quot;, serif; text-align: justify;\">তবে এ ধরনের অর্থ দেয়া বেআইনি কিছু নয়। ট্রাম্পকে ঝামেলায় ফেলেছে তার আইনজীবীর ব্যাংক হিসাব। যা নিয়ে কোহেন আদালতকে মিথ্যা তথ্য দিয়েছেন। তিনি দাবি করেছেন, তার ফি হিসাবে সেই অর্থ ট্রাম্প দিয়েছিলেন। যা সত্য নয়। আদালতে মিথ্যা বলা বড় অপরাধ।&nbsp;</p>'),
(37, 'images.png', 'admin@gmail.com', 'রমজানে শুধু প্রাথমিক স্কুল খোলা রাখায় সমালোচনা', 'Health', '', 'Admin', '81889103', 'Primary 2-770x450.jpg', 'Publish', 0, 1680418570, 'রোজায় মাধ্যমিক ও উচ্চ মাধ্যমিক শিক্ষার্থীদের ছুটি দিয়ে প্রাথমিক স্কুল খোলা রাখার সিদ্ধান্ত নিয়ে সমালোচনার মুখ পড়েছে সংশ্লিষ্ট দুই মন্ত্রণালয়। এজন্য শিক্ষা মন্ত্রণালয় এবং প্রাথমিক ও গণশিক্ষা মন্ত্রণালয়ের মধ্যে সমন্বয়হীনতাকে দায়ি করছেন শিক্ষক ও অভিভাবকরা।', '<p style=\"padding: 0px; max-width: 100%; font-size: 16px; color: rgb(51, 51, 51); font-family: &quot;siyam rupali&quot;, serif; text-align: justify;\">রোজায় মাধ্যমিক ও উচ্চ মাধ্যমিক শিক্ষার্থীদের ছুটি দিয়ে প্রাথমিক স্কুল খোলা রাখার সিদ্ধান্ত নিয়ে সমালোচনার মুখ পড়েছে সংশ্লিষ্ট দুই মন্ত্রণালয়। এজন্য শিক্ষা মন্ত্রণালয় এবং প্রাথমিক ও গণশিক্ষা মন্ত্রণালয়ের মধ্যে সমন্বয়হীনতাকে দায়ি করছেন শিক্ষক ও অভিভাবকরা।</p><p style=\"padding: 0px; max-width: 100%; font-size: 16px; color: rgb(51, 51, 51); font-family: &quot;siyam rupali&quot;, serif; text-align: justify;\">প্রচলিত নিয়মে রমজান মাস জুড়েই স্কুল-কলেজ ছুটি থাকে। তবে গেলো বছর করোনায় ক্ষতি পোষাতে রমজানেই কিছু দিন খোলা ছিলো শ্রেণি কার্যক্রম। এবার ২৩ মার্চ থেকে ২৭ এপ্রিল পর্যন্ত লম্বা ছুটিতে আছে মাধ্যমিক উচ্চ ও উচ্চ মাধ্যমিক শিক্ষা ব্যবস্থা।<br style=\"margin: 0px; padding: 0px; font-family: &quot;siyam rupali&quot;, serif !important;\"></p><p style=\"padding: 0px; max-width: 100%; font-size: 16px; color: rgb(51, 51, 51); font-family: &quot;siyam rupali&quot;, serif; text-align: justify;\">পবিত্র রমজান, স্বাধীনতা দিবস, ইস্টার সানডে, বৈসাবি, নববর্ষ ও ঈদুল ফিতর উপলক্ষে ২৩ মার্চ থেকে ২৭ এপ্রিল পর্যন্ত সরকারি, বেসরকারি মাধ্যমিক ও নিম্নমাধ্যমিক বিদ্যালয়ে ছুটি ঘোষণা করে শিক্ষা মন্ত্রণালয়। এ ছাড়া সরকারি-বেসরকারি কলেজ, আলিয়া মাদরাসা ও টিটি (টিচার্স ট্রেনিং) কলেজেও একই সময়ে ছুটির ঘোষণা রয়েছে মন্ত্রণালয়ের।<br style=\"margin: 0px; padding: 0px; font-family: &quot;siyam rupali&quot;, serif !important;\"></p><p style=\"padding: 0px; max-width: 100%; font-size: 16px; color: rgb(51, 51, 51); font-family: &quot;siyam rupali&quot;, serif; text-align: justify;\">রাজধানীসহ বড় বড় শহরের মাধ্যমিক বিদ্যালয়গুলোর সঙ্গে সংযুক্ত প্রাথমিক বিদ্যালয় রয়েছে। এগুলো শিক্ষা মন্ত্রণালয়ের অধীন। তাই এসব প্রতিষ্ঠানে প্রাথমিক বিদ্যালয় থাকলেও মাধ্যমিকের মতোই তাদের ছুটি থাকবে ২৩ মার্চ থেকে ২৭ এপ্রিল। কারিগরি শিক্ষাপ্রতিষ্ঠানে ছুটিও একই।<br style=\"margin: 0px; padding: 0px; font-family: &quot;siyam rupali&quot;, serif !important;\"></p><p style=\"padding: 0px; max-width: 100%; font-size: 16px; color: rgb(51, 51, 51); font-family: &quot;siyam rupali&quot;, serif; text-align: justify;\">কিন্তু চলছে অন্যসব প্রাথমিক স্কুলের ক্লাস। প্রাথমিক ও গণশিক্ষা মন্ত্রণালয়ের সিদ্ধান্তে সাত এপ্রিল থেকে প্রাথমিকের ছুটি শুরু হবে। অর্থাৎ ১৫ রমজান পর্যন্ত ক্লাস হবে। কিন্তু মূল সংকট হচ্ছে সেসব প্রাথমিক বিদ্যালয়ে, যারা মাধ্যমিক স্কুলের সঙ্গে একই ক্যাম্পাসে পড়াশোনা করছে।</p><p style=\"padding: 0px; max-width: 100%; font-size: 16px; color: rgb(51, 51, 51); font-family: &quot;siyam rupali&quot;, serif; text-align: justify;\"><img src=\"https://ekattor.tv/image/catalog/2023/March/28%20March/Anirudhya/Primary%203.jpg\" data-pagespeed-url-hash=\"1271723820\" style=\"margin: 0px; padding: 0px; border-style: none; font-family: &quot;siyam rupali&quot;, serif !important;\"><br style=\"margin: 0px; padding: 0px; font-family: &quot;siyam rupali&quot;, serif !important;\"></p><p style=\"padding: 0px; max-width: 100%; font-size: 16px; color: rgb(51, 51, 51); font-family: &quot;siyam rupali&quot;, serif; text-align: justify;\">রমজানে মাধ্যমিকে স্কুল বন্ধ আর প্রাথমিকে খোলা রাখায় অসন্তোষ দেখা দিয়েছে সরকারি প্রাথমিক বিদ্যালয়ের চার লাখ শিক্ষকের মধ্যে। তারা বলছেন, যেসব অভিভাবকের সন্তান প্রাথমিক ও মাধ্যমিক দুই স্কুলেই পড়ে তাদের সমস্যা হবে।&nbsp;<br style=\"margin: 0px; padding: 0px; font-family: &quot;siyam rupali&quot;, serif !important;\"></p><p style=\"padding: 0px; max-width: 100%; font-size: 16px; color: rgb(51, 51, 51); font-family: &quot;siyam rupali&quot;, serif; text-align: justify;\">৩৫৬ দিনের মধ্যে ১৮৫ দিন শ্রেণি কার্যক্রমের দিন ঠিক করে একাডেমিক ক্যালেন্ডার তৈরি করে মাধ্যমিক উচ্চ শিক্ষাবোর্ড- মাউশি। কর্মকর্তারা বলছেন, এনসিটিবির পরিকল্পনায় এটি হয়।</p><p style=\"padding: 0px; max-width: 100%; font-size: 16px; color: rgb(51, 51, 51); font-family: &quot;siyam rupali&quot;, serif; text-align: justify;\"><span style=\"margin: 0px; padding: 0px; font-weight: bold; font-family: &quot;siyam rupali&quot;, serif !important;\">আরও পড়ুন:</span>&nbsp;<a href=\"https://ekattor.tv/news/article?article_id=41798\" target=\"\" style=\"margin: 0px; padding: 0px; text-decoration: none; outline: solid 0px; color: rgb(0, 91, 255); font-weight: bold; font-family: &quot;siyam rupali&quot;, serif !important;\">স্বাধীনতা দিবসে প্রথম আলোর সেই ছবি পুরোটাই ভুয়া</a></p><p style=\"padding: 0px; max-width: 100%; font-size: 16px; color: rgb(51, 51, 51); font-family: &quot;siyam rupali&quot;, serif; text-align: justify;\">ছুটি কম দেয়ার কারণ হিসেবে প্রাথমিক ও গণশিক্ষা মন্ত্রণালয়ের ব্যাখ্যা, করোনায় ক্ষতির ধকল কাটাতে এবারেও রোজায়ও ক্লাস চালানো হচ্ছে।<br style=\"margin: 0px; padding: 0px; font-family: &quot;siyam rupali&quot;, serif !important;\"></p><p style=\"padding: 0px; max-width: 100%; font-size: 16px; color: rgb(51, 51, 51); font-family: &quot;siyam rupali&quot;, serif; text-align: justify;\">আগামীতে ছুটির তালিকা তৈরিতে একমত হবে কি-না, তাই দুই মন্ত্রণালয়ের মন্ত্রী প্রতিমন্ত্রীর সদিচ্ছার ওপর নির্ভর করবে জানিয়েছেন সচিব।</p>'),
(38, 'images.png', 'admin@gmail.com', 'ফরিয়াদের দৌরাত্মে বাড়ছে গরুর মাংসের দাম', 'Health', '', 'Admin', '29107126', 'cow-770x450.jpg', 'Publish', 5, 1680423690, 'বাজারে গরুর সরবরাহ কম, এই অজুহাতে ৭৫০ টাকা কেজিতে মাংস বিক্রি করছেন ব্যবসায়ীরা। অথচ ঢাকার বিভিন্ন স্থানে ৬৪০ টাকা কেজিতে গরুর মাংস বিক্রি করছে প্রাণিসম্পদ মন্ত্রণালয়। \r\n\r\nমন্ত্রণালয় বলছে, ৬৪০ টাকায় মাংস বিক্রি করলেও লাভ থাকছে। এদিকে দাম নিয়ন্ত্রণে তদারকির অভাবেই দাম নাগালের বাইরে বলছেন ভোক্তারা', '<p style=\"padding: 0px; max-width: 100%; font-size: 16px; color: rgb(51, 51, 51); font-family: \" siyam=\"\" rupali\",=\"\" serif;=\"\" text-align:=\"\" justify;\"=\"\">বাজারে গরুর সরবরাহ কম, এই অজুহাতে ৭৫০ টাকা কেজিতে মাংস বিক্রি করছেন ব্যবসায়ীরা। অথচ ঢাকার বিভিন্ন স্থানে ৬৪০ টাকা কেজিতে গরুর মাংস বিক্রি করছে প্রাণিসম্পদ মন্ত্রণালয়।&nbsp;</p><p style=\"padding: 0px; max-width: 100%; font-size: 16px; color: rgb(51, 51, 51); font-family: \" siyam=\"\" rupali\",=\"\" serif;=\"\" text-align:=\"\" justify;\"=\"\">মন্ত্রণালয় বলছে, ৬৪০ টাকায় মাংস বিক্রি করলেও লাভ থাকছে। এদিকে দাম নিয়ন্ত্রণে তদারকির অভাবেই দাম নাগালের বাইরে বলছেন ভোক্তারা।&nbsp;<br style=\"margin: 0px; padding: 0px; font-family: \" siyam=\"\" rupali\",=\"\" serif=\"\" !important;\"=\"\"></p><p style=\"padding: 0px; max-width: 100%; font-size: 16px; color: rgb(51, 51, 51); font-family: \" siyam=\"\" rupali\",=\"\" serif;=\"\" text-align:=\"\" justify;\"=\"\">দেশে সারা বছরে গরুর মাংসের বেশিরভাগ চাহিদা মেটে গৃহস্থের গরু দিয়ে। কিন্তু গরুর খাবারের জোগান দিতে না পারায় অনেক গৃহস্থের ঘরেই কমেছে গরুর সংখ্যা।<br style=\"margin: 0px; padding: 0px; font-family: \" siyam=\"\" rupali\",=\"\" serif=\"\" !important;\"=\"\"></p><p style=\"padding: 0px; max-width: 100%; font-size: 16px; color: rgb(51, 51, 51); font-family: \" siyam=\"\" rupali\",=\"\" serif;=\"\" text-align:=\"\" justify;\"=\"\">বসিলার মনির মিয়ার গোয়ালে গেলো বছর ১০টি গরু ছিলো। গোখাদ্যের দাম বেশি হওয়ায় এবার নিজের জন্য রেখেছেন দুটি গরু। রাজধানীর আশেপাশের অনেক গৃহস্থের ঘরেই এই চিত্র।&nbsp;<br style=\"margin: 0px; padding: 0px; font-family: \" siyam=\"\" rupali\",=\"\" serif=\"\" !important;\"=\"\"></p><p style=\"padding: 0px; max-width: 100%; font-size: 16px; color: rgb(51, 51, 51); font-family: \" siyam=\"\" rupali\",=\"\" serif;=\"\" text-align:=\"\" justify;\"=\"\">গৃহস্থের ঘরে গরু মিলছে না এমন অজুহাতে বাজারে গরুর মাংসের চড়া দাম হাঁকাচ্ছেন মাংস ব্যবসায়ীরা। বলছেন, দাম বেড়ে যাওয়ায় কমেছে বেচা-বিক্রি।<br style=\"margin: 0px; padding: 0px; font-family: \" siyam=\"\" rupali\",=\"\" serif=\"\" !important;\"=\"\"></p><p style=\"padding: 0px; max-width: 100%; font-size: 16px; color: rgb(51, 51, 51); font-family: \" siyam=\"\" rupali\",=\"\" serif;=\"\" text-align:=\"\" justify;\"=\"\">এদিকে রাজধানীর বিভিন্ন এলাকায় বাজারদর থেকে কেজিতে ১০০ টাকা কমে ৬৪০ টাকা কেজি গরুর মাংস বিক্রি করছে প্রাণি সম্পদ মন্ত্রণালয়।</p><p style=\"padding: 0px; max-width: 100%; font-size: 16px; color: rgb(51, 51, 51); font-family: \" siyam=\"\" rupali\",=\"\" serif;=\"\" text-align:=\"\" justify;\"=\"\">প্রাণিসম্পদ মন্ত্রী বললেন, এই দামে বিক্রি করেও মাংসে লাভ থাকছে। খামার মালিক সমিতির সভাপতি ইমরান হোসেনের দাবি, দাম বাড়ার কারণ মধ্যস্বত্বভোগিরা।&nbsp;</p><p style=\"padding: 0px; max-width: 100%; font-size: 16px; color: rgb(51, 51, 51); font-family: \" siyam=\"\" rupali\",=\"\" serif;=\"\" text-align:=\"\" justify;\"=\"\">এদিকে চামড়া ব্যবসায়ীরা বলছেন, চামড়ার সরবরাহ আছে আগের মতোই, তাই বেচাবিক্রি কমার দাবি ঠিক নয়। প্রাণিসম্পদ অধিদপ্তরও বলছে দেশে পর্যাপ্ত গরু আছে।&nbsp;<br style=\"margin: 0px; padding: 0px; font-family: \" siyam=\"\" rupali\",=\"\" serif=\"\" !important;\"=\"\"></p><p style=\"padding: 0px; max-width: 100%; font-size: 16px; color: rgb(51, 51, 51); font-family: \" siyam=\"\" rupali\",=\"\" serif;=\"\" text-align:=\"\" justify;\"=\"\">দেশে গরুর সংখ্যা, গোখাদ্যের দাম ও বাজারে মাংসের চাহিদা নিয়ে সরকারি প্রতিষ্ঠানে প্রকৃত তথ্য নেই। নেই মধ্যস্বত্বভোগিদের ঠেকাতে তদারকি।</p><p style=\"padding: 0px; max-width: 100%; font-size: 16px; color: rgb(51, 51, 51); font-family: \" siyam=\"\" rupali\",=\"\" serif;=\"\" text-align:=\"\" justify;\"=\"\">আর এই সুযোগটাই নিচ্ছে ফরিয়া ও ব্যবসায়ীদের অশুভ চক্রটি। যার কারণে ক্রমেই নাগালের বাইরে চলে যাচ্ছে এ সময়ের সবচেয়ে সহজলভ্য আমিষ- গরুর মাংস।</p><p style=\"padding: 0px; max-width: 100%; font-size: 16px; color: rgb(51, 51, 51); font-family: \" siyam=\"\" rupali\",=\"\" serif;=\"\" text-align:=\"\" justify;\"=\"\"><br style=\"margin: 0px; padding: 0px; font-family: \" siyam=\"\" rupali\",=\"\" serif=\"\" !important;\"=\"\"></p><p style=\"padding: 0px; max-width: 100%; font-size: 16px; color: rgb(51, 51, 51); font-family: \" siyam=\"\" rupali\",=\"\" serif;=\"\" text-align:=\"\" justify;\"=\"\"><span style=\"margin: 0px; padding: 0px; font-weight: bold; font-family: \" siyam=\"\" rupali\",=\"\" serif=\"\" !important;\"=\"\">আরও পড়ুন:</span>&nbsp;<a href=\"https://ekattor.tv/news/article?article_id=41824\" target=\"\" style=\"margin: 0px; padding: 0px; text-decoration: none; outline: solid 0px; color: rgb(0, 91, 255); font-weight: bold; font-family: \" siyam=\"\" rupali\",=\"\" serif=\"\" !important;\"=\"\">সেই সুলতানার মৃত্যুর কারণ জানিয়ে হাইকোর্টে প্রতিবেদন</a></p><p style=\"padding: 0px; max-width: 100%; font-size: 16px; color: rgb(51, 51, 51); font-family: \" siyam=\"\" rupali\",=\"\" serif;=\"\" text-align:=\"\" justify;\"=\"\">অথচ কিছুদিন আগেই এফবিসিসিআই জানিয়েছে, দুবাইয়ে কোনো গরুর খামার নেই। সেখানে আমদানি করে মাংস বিক্রি করা হয়। তারপরে দুবাইয়ে গরুর মাংসের কেজি ৫০০ টাকা।<br style=\"margin: 0px; padding: 0px; font-family: \" siyam=\"\" rupali\",=\"\" serif=\"\" !important;\"=\"\"></p><p style=\"padding: 0px; max-width: 100%; font-size: 16px; color: rgb(51, 51, 51); font-family: \" siyam=\"\" rupali\",=\"\" serif;=\"\" text-align:=\"\" justify;\"=\"\">ব্রাজিল থেকে গরুর মাংস আমদানি হলে প্রতি কেজি মাংসের দাম পড়বে সর্বোচ্চ ৪০০ টাকা। তাহলে কেন বাংলাদেশে গরুর মাংস ৭৫০ টাকা দরে কিনতে হবে, সেই প্রশ্নও উঠছে।</p>'),
(39, 'images.png', 'admin@gmail.com', 'এক্সপ্রেসওয়েতে চলছে লক্কর-ঝক্কর বাস, ঘটাচ্ছে দুর্ঘটনা', 'country', '', 'Admin', '78898372', 'expressway 2-770x450.jpg', 'Publish', 0, 1680418668, 'সড়কপথে দূরপাল্লার যানবাহনের জন্য এক্সপ্রেসওয়ে তৈরি হলেও দ্রুতগতির এই পথে চলছে পুরনো লক্কর-ঝক্কর গাড়ি। সক্ষমতার বাইরে গিয়ে এক্সপ্রেসওয়েতে দুরন্ত গতিতে ছুটতে গিয়ে এসব পরিবহন প্রাণঘাতী দুর্ঘটনার শিকার হচ্ছে।', '<p style=\"padding: 0px; max-width: 100%; font-size: 16px; color: rgb(51, 51, 51); font-family: &quot;siyam rupali&quot;, serif; text-align: justify;\">সড়কপথে দূরপাল্লার যানবাহনের জন্য এক্সপ্রেসওয়ে তৈরি হলেও দ্রুতগতির এই পথে চলছে পুরনো লক্কর-ঝক্কর গাড়ি। সক্ষমতার বাইরে গিয়ে এক্সপ্রেসওয়েতে দুরন্ত গতিতে ছুটতে গিয়ে এসব পরিবহন প্রাণঘাতী দুর্ঘটনার শিকার হচ্ছে।</p><p style=\"padding: 0px; max-width: 100%; font-size: 16px; color: rgb(51, 51, 51); font-family: &quot;siyam rupali&quot;, serif; text-align: justify;\">সম্প্রতি এক্সপ্রেসওয়েতে বেশ কয়েকটি বড় দুর্ঘটনার পর সড়কটির নিরাপত্তা বিষয়টি সামনে আসছে। বিশ্লেষকরা বলছেন, দুর্ঘটনা কমাতে এক্সপ্রেসওয়ে উপযোগী বাহন দিয়ে সড়ক ব্যবস্থাপনার পাশাপাশি কর্তৃপক্ষ ও পুলিশের তদারকি বাড়াতে হবে।<br style=\"margin: 0px; padding: 0px; font-family: &quot;siyam rupali&quot;, serif !important;\"></p><p style=\"padding: 0px; max-width: 100%; font-size: 16px; color: rgb(51, 51, 51); font-family: &quot;siyam rupali&quot;, serif; text-align: justify;\">পবিত্র রমজান মাসের শুরুতেই তিন দিনের সরকারি ছুটির ফাঁদে পড়ে দেশ। তবে এই ছুটিতে মানুষের চলাচল তেমন একটা ছিলো না। ফলে এক্সপ্রেসওয়েতে ছিলো নাই গাড়ির চাপ। ফাঁকা রাস্তা পেয়ে সড়কটিতে দ্রুত গতিতে গাড়ি চালাতে তৎপর হয়েছে চালকরা।</p><p style=\"padding: 0px; max-width: 100%; font-size: 16px; color: rgb(51, 51, 51); font-family: &quot;siyam rupali&quot;, serif; text-align: justify;\"><img src=\"https://ekattor.tv/image/catalog/2023/March/27%20March/Anirudhya/expressway%201.jpg\" data-pagespeed-url-hash=\"2017554126\" style=\"margin: 0px; padding: 0px; border-style: none; font-family: &quot;siyam rupali&quot;, serif !important;\"><br style=\"margin: 0px; padding: 0px; font-family: &quot;siyam rupali&quot;, serif !important;\"></p><p style=\"padding: 0px; max-width: 100%; font-size: 16px; color: rgb(51, 51, 51); font-family: &quot;siyam rupali&quot;, serif; text-align: justify;\">তারা জানান, এক্সপ্রেসওয়েতে ফাঁকা রাস্তা দেখলে তারা একটু গতি বাড়িয়ে গাড়ি চালান। তবে যারা দ্রুতগতির লোভ সংবরণ করে গাড়ি চালান তারা নিরাপদেই গন্তব্যে পৌঁছেন। কিন্তু যারা গতি নিয়ন্ত্রণ করতে পারেন না তারাই সড়কে মৃত্যুর মিছিল তৈরি করছেন।&nbsp;<br style=\"margin: 0px; padding: 0px; font-family: &quot;siyam rupali&quot;, serif !important;\"></p><p style=\"padding: 0px; max-width: 100%; font-size: 16px; color: rgb(51, 51, 51); font-family: &quot;siyam rupali&quot;, serif; text-align: justify;\">দুর্ঘটনার ক্ষেত্রে একশ্রেণির চালকের অসচেতনতার কথাই বললেন অন্য চালকরা। তারা জানান, চালক সতর্ক থাকলে দুর্ঘটনার সম্ভাবনা একবারেই থাকে না। চালকের শারীরিক ফিটনেস ঠিক থাকলে সাধারণত বেপরোয়া গতিতে গাড়ি চালায় না।<br style=\"margin: 0px; padding: 0px; font-family: &quot;siyam rupali&quot;, serif !important;\"></p><p style=\"padding: 0px; max-width: 100%; font-size: 16px; color: rgb(51, 51, 51); font-family: &quot;siyam rupali&quot;, serif; text-align: justify;\">কিছুদিন আগেই পদ্মা সেতুর এক্সপ্রেসওয়েতে ভয়াবহ দুর্ঘটনার কারণ হিসাবে বলা হয়েছে, ইমাদ পরিবহনটি মেয়াদোত্তীর্ণ, চালকের মধ্যম যান চলাচলের লাইসেন্স থাকলেও চালিয়েছে ভারী যানবাহন। বৃষ্টিভেজা সড়কে বেপরোয়া গতিতে গাড়ি চালানোই দুর্ঘটনার কারণ।</p><p style=\"padding: 0px; max-width: 100%; font-size: 16px; color: rgb(51, 51, 51); font-family: &quot;siyam rupali&quot;, serif; text-align: justify;\">মহাসড়কে চালকদের অনিয়ম ও গাফিলতির অপরাধের বিরুদ্ধে ব্যবস্থা নিতে এক্সপ্রেসওয়েতে আছে হাইওয়ে পুলিশ। গতি মাপার যন্ত্র দিয়ে মাঝেমধ্যে অতিদ্রুত গাড়ির বিরুদ্ধে ব্যবস্থা নেন তারা। তাদের অজুহাত লোকবল নেই। ফলে বেশিরভাগ সময়ই ব্যবস্থা নিতে পারেন না তারা।</p><p style=\"padding: 0px; max-width: 100%; font-size: 16px; color: rgb(51, 51, 51); font-family: &quot;siyam rupali&quot;, serif; text-align: justify;\"><img src=\"https://ekattor.tv/image/catalog/2023/March/27%20March/Anirudhya/expressway%203.jpg\" data-pagespeed-url-hash=\"2606553968\" style=\"margin: 0px; padding: 0px; border-style: none; font-family: &quot;siyam rupali&quot;, serif !important;\"><br style=\"margin: 0px; padding: 0px; font-family: &quot;siyam rupali&quot;, serif !important;\"></p><p style=\"padding: 0px; max-width: 100%; font-size: 16px; color: rgb(51, 51, 51); font-family: &quot;siyam rupali&quot;, serif; text-align: justify;\">স্থানীয় প্রশাসন বলছে, হাইওয়ে পুলিশ নির্দিষ্ট জায়গায় মেশিন ও চেকপোস্ট বসিয়ে গতি নিয়ন্ত্রণ করলেও ওই জায়গা পার হয়েই চালকরা বেপরোয়া হয়ে ওঠেন। তাই দুর্ঘটনা রোধ করা সম্ভব হচ্ছে না। আর এই প্রবণতা বন্ধ করতে হলে হাইওয়ে পুলিশে জনবল বাড়াতে হবে।&nbsp;<br style=\"margin: 0px; padding: 0px; font-family: &quot;siyam rupali&quot;, serif !important;\"></p><p style=\"padding: 0px; max-width: 100%; font-size: 16px; color: rgb(51, 51, 51); font-family: &quot;siyam rupali&quot;, serif; text-align: justify;\">তবে বিশ্লেষকরা বলছেন, আমাদের এক্সপ্রেসওয়ে নির্মাণ হয়েছে ঠিকই। কিন্তু সেখানে চলার উপযোগী কোনো গাড়ি নেই। নতুন রাস্তায় চলছে পুরনো লক্কড় ঝক্কড় গাড়ি। গতির সঙ্গে টক্কর দিতে গিয়ে তারা পড়ছে দুর্ঘটনায়। এসব পরিবহন এক্সপ্রেসওয়েতে চলার মতো না।&nbsp;</p><p style=\"padding: 0px; max-width: 100%; font-size: 16px; color: rgb(51, 51, 51); font-family: &quot;siyam rupali&quot;, serif; text-align: justify;\"><span style=\"margin: 0px; padding: 0px; font-weight: bold; font-family: &quot;siyam rupali&quot;, serif !important;\">আরও পড়ুন:</span>&nbsp;<a href=\"https://ekattor.tv/news/article?article_id=41769\" target=\"\" style=\"margin: 0px; padding: 0px; text-decoration: none; outline: solid 0px; color: rgb(0, 91, 255); font-weight: bold; font-family: &quot;siyam rupali&quot;, serif !important;\">নিত্যপণ্যের মূল্যস্ফীতি নিয়ে দুই সংস্থার দুই চিত্র!</a></p><p style=\"padding: 0px; max-width: 100%; font-size: 16px; color: rgb(51, 51, 51); font-family: &quot;siyam rupali&quot;, serif; text-align: justify;\">বুয়েটের সহকারী অধ্যাপক কাজী মো. সাইফুন নেওয়াজ বলেন, সড়ক তৈরি করে বসে থাকলে হবে না, সেই সঙ্গে সড়কের চলার উপযোগী যান নামাতে হবে। থাকতে হবে সঠিক তদারকি ও ব্যবস্থাপনা। নইলে স্বপ্নের এক্সপ্রেসওয়ে অনেকের দুঃস্বপ্নে পরিণত হবে।&nbsp;</p>'),
(40, 'images.png', 'admin@gmail.com', 'এক মাসে কেজি প্রতি খেজুরের দাম বেড়েছে ৫০০ টাকা', 'politics', '', 'Admin', '89403108', 'Khajur-770x450.jpg', 'Publish', 0, 1680418750, 'এবারও রোজায় অস্বাভাবিকহারে বেড়েছে খেজুরের দাম। গেলো এক মাসে মান ভেদে প্রতি কেজি খেজুরের দাম বেড়েছে কেজিতে ৫০০ টাকা পর্যন্ত। ব্যবসায়ীরা বলছেন, ডলারের দাম এবং আমদানি শুল্ক বাড়ার কারণেই খেজুরের দাম বেড়েছে। ', '<p style=\"padding: 0px; max-width: 100%; font-size: 16px; color: rgb(51, 51, 51); font-family: &quot;siyam rupali&quot;, serif; text-align: justify;\">এবারও রোজায় অস্বাভাবিকহারে বেড়েছে খেজুরের দাম। গেলো এক মাসে মান ভেদে প্রতি কেজি খেজুরের দাম বেড়েছে কেজিতে ৫০০ টাকা পর্যন্ত। ব্যবসায়ীরা বলছেন, ডলারের দাম এবং আমদানি শুল্ক বাড়ার কারণেই খেজুরের দাম বেড়েছে।&nbsp;</p><p style=\"padding: 0px; max-width: 100%; font-size: 16px; color: rgb(51, 51, 51); font-family: &quot;siyam rupali&quot;, serif; text-align: justify;\">দেশে এখন প্রতিদিন আঙুর-আপেল-কমলা আর মাল্টার চাহিদা ১৭ লাখ কেজি। যার মধ্যে শুধু খেজুরের চাহিদাই এক লাখ ৩৭ হাজার কেজি। তবে, সারা বছরের তুলনায় রোজায় খেজুরের চাহিদা বেড়ে যায় অন্তত সাত গুণ। এই চাহিদার খেজুর আসে ৪০ দেশ থেকে। সারা বছর দেশে খেজুরের চাহিদা প্রায় ৫০ হাজার টন। শুধু রোজার মাসেই বিক্রি হয় প্রায় ২৫ হাজার টন।</p><p style=\"padding: 0px; max-width: 100%; font-size: 16px; color: rgb(51, 51, 51); font-family: &quot;siyam rupali&quot;, serif; text-align: justify;\"><img src=\"https://ekattor.tv/image/catalog/2023/March/26%20March/Anirudhya/Khajur%202.jpg\" data-pagespeed-url-hash=\"2177260084\" style=\"margin: 0px; padding: 0px; border-style: none; font-family: &quot;siyam rupali&quot;, serif !important;\"><br style=\"margin: 0px; padding: 0px; font-family: &quot;siyam rupali&quot;, serif !important;\"></p><p style=\"padding: 0px; max-width: 100%; font-size: 16px; color: rgb(51, 51, 51); font-family: &quot;siyam rupali&quot;, serif; text-align: justify;\">রোজায় খেজুরের চাহিদা বেশি থাকে বলে প্রতি বছর দাম বাড়লেও এবার দামে বেড়েছে অস্বাভাবিক হারে। রাজধানীর বাদামতলীতে এক কেজি মিশরের মেডজল খেজুর বিক্রি হচ্ছে এক হাজার ২৫০ টাকায়। এটিই খুচরা বাজারে বিক্রি হচ্ছে এক হাজার ৪০০ থেকে দেড় হাজার টাকায়।&nbsp;<br style=\"margin: 0px; padding: 0px; font-family: &quot;siyam rupali&quot;, serif !important;\"></p><p style=\"padding: 0px; max-width: 100%; font-size: 16px; color: rgb(51, 51, 51); font-family: &quot;siyam rupali&quot;, serif; text-align: justify;\">মাস খানেকের ব্যবধানে মেডজুল খেজুরের দাম বেড়েছে কেজিতে অন্তত ১০০ টাকা। ইরানি মরিয়ম খেজুর এখন বিক্রি হচ্ছে এক হাজার ১০০ থেকে এক হাজার ৩০০ টাকায়। এছাড়া দাবাস, ফরিদা ও জিহাদি খেজুরেরও দাম বেড়েছে কেজিতে এক থেকে দেড়শ টাকা।&nbsp;<br style=\"margin: 0px; padding: 0px; font-family: &quot;siyam rupali&quot;, serif !important;\"></p><p style=\"padding: 0px; max-width: 100%; font-size: 16px; color: rgb(51, 51, 51); font-family: &quot;siyam rupali&quot;, serif; text-align: justify;\">আমদানিকারকরা বলছেন, ডলারের দাম বাড়ার সঙ্গে যুক্ত হয়েছে ২০ শতাংশ নিয়ন্ত্রণমূলক শুল্ক, ২৫ শতাংশ কাস্টমস ডিউটি, ১৫ শতাংশ ভ্যাট, ৫ শতাংশ অগ্রিম আয়কর আর চার শতাংশ অ্যাডভান্স ট্রেড ভ্যাট। এ কারণেই বেড়েছে খেজুরসহ সব ধরনের ফলের দাম। তবে ভোক্তাদের জন্য একটু হলেও স্বস্তির খবর হলো- গেলো দুই দিনে নতুন করে আর বাড়েনি খেজুরের দাম।&nbsp;</p><p style=\"padding: 0px; max-width: 100%; font-size: 16px; color: rgb(51, 51, 51); font-family: &quot;siyam rupali&quot;, serif; text-align: justify;\"><img src=\"https://ekattor.tv/image/catalog/2023/March/26%20March/Anirudhya/Khajur%201.jpg\" data-pagespeed-url-hash=\"1882760163\" style=\"margin: 0px; padding: 0px; border-style: none; font-family: &quot;siyam rupali&quot;, serif !important;\"><br style=\"margin: 0px; padding: 0px; font-family: &quot;siyam rupali&quot;, serif !important;\"></p><p style=\"padding: 0px; max-width: 100%; font-size: 16px; color: rgb(51, 51, 51); font-family: &quot;siyam rupali&quot;, serif; text-align: justify;\">এদিকে, সাম্প্রতিক অভিযানে খেজুর আমদানি থেকে শুরু করে পাইকারি বাজার ও কমিশন এজেন্টদের ব্যাপক অনিয়ম ভ্রাম্যমাণ আদালতের পর্যবেক্ষণে উঠে আসে। দেখা গেছে, জানুয়ারি থেকে মার্চ পর্যন্ত বাংলাদেশে ৪০ হাজার ২৪ মেট্রিক টন খেজুর আমদানি হয়েছে। এগুলোর গড় মূল্য কেজিতে ৮৯ টাকা ৩৬ পয়সা।&nbsp;</p><p style=\"padding: 0px; max-width: 100%; font-size: 16px; color: rgb(51, 51, 51); font-family: &quot;siyam rupali&quot;, serif; text-align: justify;\"><span style=\"margin: 0px; padding: 0px; font-weight: bold; font-family: &quot;siyam rupali&quot;, serif !important;\">আরও পড়ুন:</span>&nbsp;<a href=\"https://ekattor.tv/news/article?article_id=41720\" target=\"\" style=\"margin: 0px; padding: 0px; text-decoration: none; outline: solid 0px; color: rgb(0, 91, 255); font-weight: bold; font-family: &quot;siyam rupali&quot;, serif !important;\">চলতি মাসেই পদ্মা সেতুতে ট্রেনের পরীক্ষামূলক চলাচল</a></p><p style=\"padding: 0px; max-width: 100%; font-size: 16px; color: rgb(51, 51, 51); font-family: &quot;siyam rupali&quot;, serif; text-align: justify;\">অথচ পাইকারি বাজারে বিভিন্ন জাতের খেজুর চড়া দামে বিক্রি হচ্ছে। এরমধ্যে আজওয়া ৭৫০-১০০০ টাকা, মাবরুম ১২০০-১৩০০ টাকা, মরিয়ম ৫০০-৮০০ টাকা, দাবাস ৪০০-৬০০ টাকা, জাহিদি ২০০-২৫০ টাকা, মেজডুল খেজুর ১২০০-১৩০০ টাকা, আলজেরিয়া খেজুর ২৫০-৪০০ টাকা দরে বিক্রি হচ্ছে। আমদানি তথ্য ও বর্তমান বাজার দরে বিস্তর পার্থক্য পরিলক্ষিত হয়।</p>'),
(41, 'images.png', 'admin@gmail.com', '৬৫ বছরের পুরনো স্কুলের নাম পরিবর্তন নিয়ে প্রশ্ন', 'politics', '', 'Admin', '28004652', 'mogbazar-770x450.jpg', 'Publish', 4, 1680418793, '৬৫ বছরের পুরনো রাজধানীর মগবাজার গার্লস স্কুলের নাম বদলে ফেলা নিয়ে প্রশ্ন উঠেছে। সম্প্রতি এক প্রজ্ঞাপনে স্কুলটির নাম পাল্টে গাজী শামসুন্নেসা গার্লস হাই স্কুল করার নির্দেশনা দেয় শিক্ষা মন্ত্রণালয়। গাজী শামসুন্নেসা বস্ত্র ও পাটমন্ত্রী গোলাম দস্তগীর গাজীর মা।', '<p style=\"padding: 0px; max-width: 100%; font-size: 16px; color: rgb(51, 51, 51); font-family: &quot;siyam rupali&quot;, serif; text-align: justify;\">৬৫ বছরের পুরনো রাজধানীর মগবাজার গার্লস স্কুলের নাম বদলে ফেলা নিয়ে প্রশ্ন উঠেছে। সম্প্রতি এক প্রজ্ঞাপনে স্কুলটির নাম পাল্টে গাজী শামসুন্নেসা গার্লস হাই স্কুল করার নির্দেশনা দেয় শিক্ষা মন্ত্রণালয়। গাজী শামসুন্নেসা বস্ত্র ও পাটমন্ত্রী গোলাম দস্তগীর গাজীর মা।</p><p style=\"padding: 0px; max-width: 100%; font-size: 16px; color: rgb(51, 51, 51); font-family: &quot;siyam rupali&quot;, serif; text-align: justify;\">স্কুলটির বর্তমান কমিটির সভাপতি নিজ পরিবারের সদস্যর নামে এটির নামকরণ করেছেন বলে অভিযোগ উঠেছে। তবে কর্তৃপক্ষ বলছে, স্কুলের কাজের গতি বাড়াতেই নামের পরিবর্তন।&nbsp;</p><p style=\"padding: 0px; max-width: 100%; font-size: 16px; color: rgb(51, 51, 51); font-family: &quot;siyam rupali&quot;, serif; text-align: justify;\">ইস্পাহানী গ্রুপের দান করা ৬৭ শতাংশ জমির উপর ১৯৫৮ সালে প্রতিষ্ঠিত হয় মগবাজার গার্লস হাইস্কুল। দীর্ঘ ৬৫ বছর এই নামেই পরিচিত ছিলো স্কুলটি। নাম নিয়ে কোন জটিলতাও ছিলোনা। হঠাৎ গেলো ডিসেম্বরে একটি আবেদনের প্রেক্ষিতে পাল্টে গেলো স্কুটির নাম।&nbsp;</p><p style=\"padding: 0px; max-width: 100%; font-size: 16px; color: rgb(51, 51, 51); font-family: &quot;siyam rupali&quot;, serif; text-align: justify;\">মগবাজার গার্লস স্কুলের পরিবর্তে এখন এটির নাম হয়েছে গাজী শামসুন্নেসা গার্লস হাই স্কুল। গেলো ২০ মার্চ নাম পরিবর্তনের এই ঘোষণা দেয় মাধ্যমিক ও উচ্চ মাধ্যমিক শিক্ষাবোর্ড।&nbsp;</p><p style=\"padding: 0px; max-width: 100%; font-size: 16px; color: rgb(51, 51, 51); font-family: &quot;siyam rupali&quot;, serif; text-align: justify;\">বর্তমানে স্কুলটির পরিচালনা পর্ষদের সভাপতি পাট ও বস্ত্র মন্ত্রীর ছেলে গোলাম আসুরিয়া। গাজী শামসুন্নেসা তাঁর দাদির নাম। জানা গেছে তিনি সভাপতি নির্বাচিত হবার পরই নাম পরিবর্তনের তোড়জোড় শুরু। মন্ত্রী নিজেও ২০১৩ সাল থেকে ২০১৮ সাল পর্যন্ত এ প্রতিষ্ঠানের সভাপতি ছিলেন। তবে কর্তৃপক্ষ বলছে, স্কুলের সার্বিক কার্যক্রমে গতি আনতেই নামের পরিবর্তন।&nbsp;</p><p style=\"padding: 0px; max-width: 100%; font-size: 16px; color: rgb(51, 51, 51); font-family: &quot;siyam rupali&quot;, serif; text-align: justify;\">জানা গেছে, স্কুল ম্যানেজিং কমিটির প্রস্তাবের ভিত্তিতে ২০ মার্চ শিক্ষা মন্ত্রণালয়ের মাধ্যমিক ও উচ্চশিক্ষা বিভাগ এই নামকরণের অনুমতি দিয়েছে। বিদ্যালয়টির ভারপ্রাপ্ত প্রধান শিক্ষক মোবারেকা খালেদ গত ৭ ডিসেম্বর নাম পরিবর্তনের আবেদন করেছিলেন।&nbsp;</p><p style=\"padding: 0px; max-width: 100%; font-size: 16px; color: rgb(51, 51, 51); font-family: &quot;siyam rupali&quot;, serif; text-align: justify;\">তাঁর আবেদনের ভিত্তিতে ঢাকা শিক্ষা বোর্ডের পরিদর্শন প্রতিবেদনের পর বেশ দ্রুতগতিতেই নাম পরিবর্তনের অনুমতি দেওয়া হয়। এরই মধ্য তড়িঘড়ি করে প্রতিষ্ঠানের নাম ফলকও পরিবর্তন করা হয়েছে। প্রতিষ্ঠানটিতে ১৬ জন শিক্ষক আর প্রায় ৩০০ ছাত্রী রয়েছে। ইস্পাহানি গ্রুপের দানে প্রতিষ্ঠিত প্রাচীন এই স্কুলের জায়গাটিও তাদেরই দেওয়া।</p><p style=\"padding: 0px; max-width: 100%; font-size: 16px; color: rgb(51, 51, 51); font-family: &quot;siyam rupali&quot;, serif; text-align: justify;\">মগবাজার গার্লস হাই স্কুল ব্যবস্থাপনা কমিটি সাবেক সভাপতি সাইফুজ্জামান বাদশার আশঙ্কা, এটিকে পারিবারিক প্রতিষ্ঠানে পরিণত করার অংশ হিসেবেই এই পরিবর্তন। তবে, ঢাকা শিক্ষা বোর্ডের চেয়ারম্যান অধ্যাপক তপন কুমার সরকার বলছেন, নিয়ম মেনেই এটি করা হয়েছে।</p><p style=\"padding: 0px; max-width: 100%; font-size: 16px; color: rgb(51, 51, 51); font-family: &quot;siyam rupali&quot;, serif; text-align: justify;\"><span style=\"margin: 0px; padding: 0px; font-weight: bold; font-family: &quot;siyam rupali&quot;, serif !important;\">আরও পড়ুন:<a href=\"https://ekattor.tv/news/article?article_id=41625\" target=\"_blank\" style=\"margin: 0px; padding: 0px; text-decoration: none; outline: solid 0px; color: rgb(0, 91, 255); font-family: &quot;siyam rupali&quot;, serif !important;\">&nbsp;পৈতৃক বাড়ি থেকে বড় বোনকে বের করে দিলেন ছোট বোন</a></span><br style=\"margin: 0px; padding: 0px; font-family: &quot;siyam rupali&quot;, serif !important;\"></p><p style=\"padding: 0px; max-width: 100%; font-size: 16px; color: rgb(51, 51, 51); font-family: &quot;siyam rupali&quot;, serif; text-align: justify;\">তিনি বলেন, নাম পরিবর্তনের আবেদন পাওয়ার পর শিক্ষা মন্ত্রণালয় থেকে আমাদের সরেজমিন পরিদর্শন করে প্রতিবেদন দাখিলের নির্দেশ দিয়েছিল। আমাদের কর্মকর্তারা পরিদর্শন করে এসে প্রতিবেদন দিয়েছেন। আমরা তা মন্ত্রণালয়ে পাঠিয়েছি। এখন মন্ত্রণালয় সবকিছু বিবেচনা করে নাম পরিবর্তনের অনুমতি দিয়েছে।</p><p style=\"padding: 0px; max-width: 100%; font-size: 16px; color: rgb(51, 51, 51); font-family: &quot;siyam rupali&quot;, serif; text-align: justify;\">এর আগে ২০১৩ সালেও স্কুলটির নাম পরিবর্তনের উদ্যোগ নিয়েছিলেন তৎকালীন পরিচালনা পর্ষদের সভাপতি গোলাম দস্তগীর গাজী।</p>'),
(42, 'images.png', 'admin@gmail.com', 'পৈতৃক বাড়ি থেকে বড় বোনকে বের করে দিলেন ছোট বোন', 'politics', '', 'Admin', '28731222', 'Dhanmondi-770x450.jpg', 'Publish', 4, 1680420800, 'আদালত আদেশ দিয়েছে পৈতৃক বাড়ি ভাগাভাগি করার। অথচ আদালতের নাজির ও পুলিশের সহায়তায় সেই বাড়ি থেকে বড় বোনকে বের করে দিয়েছেন ছোট বোন। \r\n\r\nজাতীয় অধ্যাপক নুরুল ইসলামের রেখে যাওয়া ধানমন্ডির বাড়ি নিয়ে দুই মেয়ের এ বিবাদ। বড় মেয়ে দিনা ইসলামের অভিযোগ, তাকে বাড়ি থেকে উচ্ছেদের ষড়যন্ত্র করছেন ছোট বোন।', '<p style=\"padding: 0px; max-width: 100%; font-size: 16px; color: rgb(51, 51, 51); font-family: &quot;siyam rupali&quot;, serif; text-align: justify;\">আদালত আদেশ দিয়েছে পৈতৃক বাড়ি ভাগাভাগি করার। অথচ আদালতের নাজির ও পুলিশের সহায়তায় সেই বাড়ি থেকে বড় বোনকে বের করে দিয়েছেন ছোট বোন।&nbsp;</p><p style=\"padding: 0px; max-width: 100%; font-size: 16px; color: rgb(51, 51, 51); font-family: &quot;siyam rupali&quot;, serif; text-align: justify;\">জাতীয় অধ্যাপক নুরুল ইসলামের রেখে যাওয়া ধানমন্ডির বাড়ি নিয়ে দুই মেয়ের এ বিবাদ। বড় মেয়ে দিনা ইসলামের অভিযোগ, তাকে বাড়ি থেকে উচ্ছেদের ষড়যন্ত্র করছেন ছোট বোন।<br style=\"margin: 0px; padding: 0px; font-family: &quot;siyam rupali&quot;, serif !important;\"></p><p style=\"padding: 0px; max-width: 100%; font-size: 16px; color: rgb(51, 51, 51); font-family: &quot;siyam rupali&quot;, serif; text-align: justify;\">জাতির পিতা বঙ্গবন্ধু শেখ মুজিবুর রহমানের ব্যক্তিগত চিকিৎসক ও জাতীয় অধ্যাপক নুরুল ইসলাম ধানমন্ডির সেন্ট্রাল রোডের বাড়িতে বসবাস শুরু করেন স্বাধীনতা যুদ্ধের পর থেকেই।<br style=\"margin: 0px; padding: 0px; font-family: &quot;siyam rupali&quot;, serif !important;\"></p><p style=\"padding: 0px; max-width: 100%; font-size: 16px; color: rgb(51, 51, 51); font-family: &quot;siyam rupali&quot;, serif; text-align: justify;\">২০১২ সালে অধ্যাপক নুরুল ইসলাম আর পরের বছর তার স্ত্রী মারা যায়। দুই মেয়ে ও এক ছেলে সবাই উচ্চ শিক্ষিত। বাবা মায়ের মৃত্যুর পর বড় মেয়ে প্রকৌশলী নীনা ইসলাম বাড়ির তৃতীয় তলায় একাই বসবাস করতেন।&nbsp;<br style=\"margin: 0px; padding: 0px; font-family: &quot;siyam rupali&quot;, serif !important;\"></p><p style=\"padding: 0px; max-width: 100%; font-size: 16px; color: rgb(51, 51, 51); font-family: &quot;siyam rupali&quot;, serif; text-align: justify;\">বড় ছেলে আহমেদ ইফতেখারুল ইসলাম ইউনিভার্সিটি অব সায়েন্স অ্যান্ড টেকনোলজি চট্টগ্রামের বোর্ড অফ ট্রাস্টির চেয়ারম্যান। তিনি পরিবার নিয়ে চট্টগ্রামে থাকেন। ছোট মেয়ে চিকিৎসক নীনা ইসলাম পরিবার নিয়ে থাকেন এই রাজধানীতে।<br style=\"margin: 0px; padding: 0px; font-family: &quot;siyam rupali&quot;, serif !important;\"></p><p style=\"padding: 0px; max-width: 100%; font-size: 16px; color: rgb(51, 51, 51); font-family: &quot;siyam rupali&quot;, serif; text-align: justify;\">বড় মেয়ের অভিযোগ করেছেন, গেলো বৃহস্পতিবার সকালে পুলিশ, আইনজীবী ও তৃতীয় যুগ্ম জেলা জজ আদালতের নাজিরের সহযোগিতায় বাড়ির তৃতীয় তলা থেকে তাকে জোর করে বের করে দেয়। এ নিয়ে কখনও তাকে কোনো আইনি নোটিশও দেয়া হয়নি।&nbsp;<br style=\"margin: 0px; padding: 0px; font-family: &quot;siyam rupali&quot;, serif !important;\"></p><p style=\"padding: 0px; max-width: 100%; font-size: 16px; color: rgb(51, 51, 51); font-family: &quot;siyam rupali&quot;, serif; text-align: justify;\">এ বিষয়ে বাড়ির দখল নিতে আসা ছোট বোন নীনা ইসলামের বক্তব্য জানতে গেলে আদালতের নাজির তার পক্ষে গণমাধ্যমের উপর চড়াও হন। নীনা ইসলাম এ বিষয়ে কোনো বক্তব্য দেননি। তার আইনজীবী জানায়, সব কিছু আইন ও আদালতের মাধ্যমে হয়েছে। তবে বাড়ির তৃতীয় তলা আদালত ছোট মেয়ে নীনা ইসলামকে দিয়েছে এমন কোনো কাগজ তিনি দেখাতে পারেননি।<br style=\"margin: 0px; padding: 0px; font-family: &quot;siyam rupali&quot;, serif !important;\"></p><p style=\"padding: 0px; max-width: 100%; font-size: 16px; color: rgb(51, 51, 51); font-family: &quot;siyam rupali&quot;, serif; text-align: justify;\">বড় মেয়ে দিনা ইসলামের দাবি, পৈত্রিক বাড়ি ভাগ করতে হলে সব ভাইবোনকে সঙ্গে নিয়েই হওয়া উচিত। তার অভিযোগ শুধু তৃতীয় তলা নয়, ছোট বোন পুরো বাড়ি দখলের পায়তারা করছে। এই তৎপরতার বিরুদ্ধে সুবিচারও চেয়েছেন তিনি।</p>');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` int(255) NOT NULL,
  `favicon` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` int(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `linkedin` varchar(255) NOT NULL,
  `instagram` varchar(255) NOT NULL,
  `youtube` varchar(255) NOT NULL,
  `map` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL DEFAULT 'img.png',
  `time` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `favicon`, `logo`, `name`, `email`, `phone`, `address`, `twitter`, `facebook`, `linkedin`, `instagram`, `youtube`, `map`, `file`, `time`) VALUES
(1, 'khobor-logo-bn.png', 'khobor-logo-bn.webp', 'বাংলা খবর', 'shamimlem@yahoo.com', 1719182586, 'Dinajpur, Bangladesh', 'twitter.com', 'linkedin.com', 'linkedin.com', 'instagram.com', 'youtube.com', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d57556.3072124917!2d88.6447778!3d25.6291895!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1666603993687!5m2!1sen!2sbd\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscre', '279898054_460186332543908_6542258482236105019_n.jpg', 1680424414);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ad`
--
ALTER TABLE `ad`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_info`
--
ALTER TABLE `admin_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_test`
--
ALTER TABLE `category_test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mail_setting`
--
ALTER TABLE `mail_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletter_tmp`
--
ALTER TABLE `newsletter_tmp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ad`
--
ALTER TABLE `ad`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT for table `admin_info`
--
ALTER TABLE `admin_info`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT for table `category_test`
--
ALTER TABLE `category_test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `mail_setting`
--
ALTER TABLE `mail_setting`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `newsletter_tmp`
--
ALTER TABLE `newsletter_tmp`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
