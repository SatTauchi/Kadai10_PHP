-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost
-- 生成日時: 2024 年 7 月 11 日 05:25
-- サーバのバージョン： 10.4.28-MariaDB
-- PHP のバージョン: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `osakana_database`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `osakana_table`
--

CREATE TABLE `osakana_table` (
  `id` int(12) NOT NULL,
  `user_id` int(12) NOT NULL,
  `date` date DEFAULT NULL,
  `fish` varchar(64) DEFAULT NULL,
  `place` varchar(64) DEFAULT NULL,
  `price` int(12) DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `photo` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- テーブルのデータのダンプ `osakana_table`
--

INSERT INTO `osakana_table` (`id`, `user_id`, `date`, `fish`, `place`, `price`, `remarks`, `photo`) VALUES
(1, 12, '2024-07-16', 'マグロ', '北海道', 7000, 'user1の入力', 'maguro02.webp'),
(2, 13, '2024-07-10', 'ハマチ', '北海道', 1000, 'user2の入力', 'hamachi02.jpg'),
(3, 14, '2024-07-08', 'サバ', '江戸前', 500, 'user3の入力', 'saba02.jpeg'),
(4, 12, '2024-07-11', 'アジ', '北海道', 600, 'user1の入力', 'aji02.jpg'),
(5, 12, '2024-07-10', 'ハマチ', '江戸前', 1000, 'user1で入力', 'hamachi03.jpg');

-- --------------------------------------------------------

--
-- テーブルの構造 `osakana_user_table`
--

CREATE TABLE `osakana_user_table` (
  `id` int(12) DEFAULT NULL,
  `user_id` int(12) NOT NULL,
  `name` varchar(64) DEFAULT NULL,
  `lid` varchar(128) NOT NULL,
  `lpw` varchar(64) NOT NULL,
  `kanri_flg` int(1) DEFAULT NULL,
  `life_flg` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `osakana_user_table`
--

INSERT INTO `osakana_user_table` (`id`, `user_id`, `name`, `lid`, `lpw`, `kanri_flg`, `life_flg`) VALUES
(NULL, 12, '田内悟', 'Satoru Tauchi', '$2y$10$jIjK1V/3zvn2bVluJYCqjO94c0F2gxVqQ31ooxoxuSzM9bSFSxQba', NULL, NULL),
(NULL, 13, '山田太郎', 'Taro Yamada', '$2y$10$NBotaO.TfJOdElBWFyILyOD1kN0H83eJCW7QiKWv9qCgJ2eC3P9Yq', NULL, NULL),
(NULL, 14, '里中智', 'Satoru Satonaka', '$2y$10$FR5eOdOetuRlq8t6cah6OejY6TIaQ8cmgLNRCxiH5NBuJa8oRgE8C', NULL, NULL),
(NULL, 15, '岩城正美', 'Masami Iwaki', '$2y$10$qcrRbVwmIABwwc81VK5hv.VCHZDIImAUW0Sj.UNS0x.AwkVMLuJL.', NULL, NULL),
(NULL, 16, '殿馬一人', 'Kazuto Tonoma', '$2y$10$VtXsJeTO2bmqZUrrFUHo3.COqbmDrIaWQITaZeuX2dDkFIXGVJs0G', NULL, NULL);

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `osakana_table`
--
ALTER TABLE `osakana_table`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `osakana_user_table`
--
ALTER TABLE `osakana_user_table`
  ADD PRIMARY KEY (`user_id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `osakana_table`
--
ALTER TABLE `osakana_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- テーブルの AUTO_INCREMENT `osakana_user_table`
--
ALTER TABLE `osakana_user_table`
  MODIFY `user_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
