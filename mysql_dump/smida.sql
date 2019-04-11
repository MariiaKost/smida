-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Хост: db12
-- Час створення: Квт 11 2019 р., 21:16
-- Версія сервера: 5.5.21
-- Версія PHP: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- БД: `imagelab_smida`
--

-- --------------------------------------------------------

--
-- Структура таблиці `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Дамп даних таблиці `projects`
--

INSERT INTO `projects` (`id`, `name`) VALUES
(1, 'Проект 1'),
(2, 'Проект 2'),
(3, 'Прочесть книгу');

-- --------------------------------------------------------

--
-- Структура таблиці `tasks`
--

CREATE TABLE IF NOT EXISTS `tasks` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `priority` enum('1','2','3') NOT NULL DEFAULT '2',
  `end_date` date NOT NULL,
  `done` enum('yes','no') NOT NULL DEFAULT 'no',
  `project_id` mediumint(9) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=15 ;

--
-- Дамп даних таблиці `tasks`
--

INSERT INTO `tasks` (`id`, `name`, `description`, `priority`, `end_date`, `done`, `project_id`) VALUES
(2, 'Задание 1', 'Первое задание', '3', '2019-04-20', 'no', 2),
(5, 'Прочесть главу 1', 'Прочесть и написать конспект', '2', '0000-00-00', 'no', 3),
(6, 'Прочесть главу 2', 'Читаeм и пересказываем', '2', '0000-00-00', 'no', 3),
(7, 'Прочесть главу 3', '', '2', '0000-00-00', 'no', 3),
(8, 'Просто задание', '', '2', '0000-00-00', 'no', 4);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
