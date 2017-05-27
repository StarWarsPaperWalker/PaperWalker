-- 00	-> 0 - ACTIVE_UNBLOCKED

-- 01    	-> 1 -> 
-- 10	-> 2 -> 
-- 11 	-> 3 -> INACTIVE_BLOCKED

-- ====

-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2017 at 08:50 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `www_8ed_referats`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) NOT NULL,
  `referat_id` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `element_id` bigint(20) NOT NULL,
  `comment` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `referat_id`, `element_id`, `comment`, `user_id`, `created`) VALUES
(1, '61681_3_60', 26, '[MP]\n1. Typo: старници->страници\n2. репозиторита -> хранилища\n', 8888, '2017-04-22 17:11:37'),
(4, '61681_3_60', 5, '[MP] Запазено за снимката а? :-)\n', 8888, '2017-04-22 17:13:51'),
(5, '61681_3_60', 44, '[MP] Номериране и изаглавяване на фигурите, както и цитиране на източника, например.\nФиг. 1. Примерна заявка към уеб сървър (източник [1])\n\nи по-долу в списък с източниците\n[1] заглавие-на-статията, автор, година, линк, последно посетена на: 2017-04-22 (ако е онлайн източник)\n\nСъщото важи и за цитиране на код, таблици и друг текст, който не е авторски.\n', 8888, '2017-04-22 18:26:06'),
(6, '61681_3_60', 149, '[MP] Където има \'ТУДУ\' - Just Do-it! :-)', 8888, '2017-04-22 18:26:54'),
(7, '61681_3_60', 107, '[MP] Програмен код 1. Скрипт за ...\n', 8888, '2017-04-22 18:27:25'),
(8, '61681_3_60', 14, '[MP] Добре е да махнеш гугъл тракера :-) или да пратиш резултата от тракването', 8888, '2017-04-22 18:28:10'),
(9, '81054_1_47', 2, '[MP] Добави и съдържанието, че в този вид не те чака нищо добро като оценка :-)', 8888, '2017-04-22 19:14:01'),
(10, '81054_1_47', 2, '[MP} Какви са тези шейпове? Трябва да е ...', 9999, '2017-04-27 10:33:33');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `version` bigint(20) NOT NULL,
  `comment` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `theme` bigint(20) NOT NULL,
  `uploaded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `user_id`, `version`, `comment`, `theme`, `uploaded`) VALUES
(3, 8888, 1, 'Първа версия на реферат (примерен реферат) на тема примерни изисквания за реферат.', 0, '2017-04-20 10:41:45'),
(4, 61853, 1, 'Първа версия на реферат.', 36, '2017-04-20 10:41:46'),
(5, 61853, 2, 'Втора версия на реферат.', 36, '2017-04-20 10:41:47'),
(6, 61858, 1, 'Първа версия на реферат.', 86, '2017-04-20 10:41:48'),
(7, 61793, 1, 'Първа версия на реферат.', 92, '2017-04-20 10:41:49'),
(8, 61793, 2, 'Втора версия на реферат.', 92, '2017-04-20 10:41:50'),
(9, 61793, 3, 'Трета версия на реферат.', 92, '2017-04-20 10:41:51');

-- --------------------------------------------------------

--
-- Table structure for table `scores`
--

CREATE TABLE `scores` (
  `id` bigint(20) NOT NULL,
  `referat_id` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `score` bigint(20) NOT NULL,
  `comment` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `scores`
--

INSERT INTO `scores` (`id`, `referat_id`, `score`, `comment`, `user_id`, `created`) VALUES
(1, '61831_1_107', 9, 'Добре си извадил/а инфото, накара ме да се зачета доста хахахха. Едно малко по-модерно дизайнче и ще стане бомба.', 61809, '2017-05-03 18:32:59');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` bigint(20) NOT NULL,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `theme_id` bigint(20) DEFAULT NULL,
  `num_of_changes` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `theme_id`, `num_of_changes`, `created`) VALUES
(-1, 'admin', md5('admin'), 'none', NULL, 0, '2017-04-04 18:42:00'),
(8888, '8888', md5('admin'), 'milen.petrov@gmail.com', 0, 1, '2017-04-04 18:42:00'),
(61853, '61853', md5('12345678'), 'mduhovnikov@gmail.com', 36, 2, '2017-04-04 18:42:00'),
(61858, '61858', md5('password'), 'dido_9515@abv.bg', 86, 1, '2017-04-04 19:35:11'),
(61793, '61793', md5('root'), 'anton@gmail.com', 92, 3, '2017-04-04 19:55:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `referat_id` (`referat_id`,`element_id`,`user_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `scores`
--
ALTER TABLE `scores`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `referat_id` (`referat_id`,`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=189;
--
-- AUTO_INCREMENT for table `scores`
--
ALTER TABLE `scores`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
