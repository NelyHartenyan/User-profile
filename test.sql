-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 18 2017 г., 18:22
-- Версия сервера: 5.6.37
-- Версия PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `test`
--

-- --------------------------------------------------------

--
-- Структура таблицы `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `img_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `gallery`
--

INSERT INTO `gallery` (`id`, `user_id`, `img_name`) VALUES
(51, '70', '598afefd76ae020525959_802228296615636_4611966824219432418_n.jpg'),
(52, '70', '598b1213a4b374(73).jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `task`
--

CREATE TABLE `task` (
  `id` int(10) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `task`
--

INSERT INTO `task` (`id`, `title`, `description`, `user_id`) VALUES
(35, 'Hello', 'Hello World!', '70');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `gender` enum('MALE','FEMALE','OTHER') DEFAULT NULL,
  `avatar` varchar(500) NOT NULL,
  `status` enum('ACTIVE','PENDING','DELETED','BANNED','NEW') DEFAULT 'NEW',
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `firstname`, `lastname`, `email`, `password`, `gender`, `avatar`, `status`, `created`, `modified`) VALUES
(70, 'Nely', 'Hartenyan', 'nely.hartenyan@bk.ru', '$1$.q..ty4.$msbayXGoIdksrraxsDmre.', 'FEMALE', '598aeddd69850HOMEPC - wallpapers-7020-7277-hd-wallpapers.jpg', 'NEW', '2017-08-06 11:05:49', NULL),
(71, 'Nely', 'gvgg', 'ssg@ghfh.ru', '$1$3y4.O51.$kVxmdeEAnewq.PDpMDlFa.', 'FEMALE', '', 'NEW', '2017-08-06 11:27:41', NULL),
(72, 'sdsv', 'dsvsd', 'dvsd@th.r', '$1$eO0.P85.$2LXuQYJZaPWcEz4fAlTDO/', 'MALE', '', 'NEW', '2017-08-06 14:00:43', NULL),
(73, 'mee', 'hbb', 'ndjsdkj@djf.ru', '$1$Hl5.Ea4.$BLTpfkjGp1B4S.BzN.Gbl0', 'MALE', '', 'NEW', '2017-08-07 13:21:31', NULL),
(74, 'dcscs', 'dsvdf', 'fdvdf@fvfd.ru', '$1$SX..ze/.$qw4KE5Xgn9Q1mdnzOu7Ts1', 'MALE', '', 'NEW', '2017-08-07 14:03:16', NULL),
(75, 'dfd', 'fdvfd', 'fdf2@jjf.ru', '$1$OP0.9Q0.$xC52YT8yt01jtE.a2tPDa.', 'MALE', '', 'NEW', '2017-08-07 14:18:56', NULL),
(76, 'Mery', 'Hartenyan', 'ms.hartenyan@bk.ru', '$1$/U1.aO3.$59S2hZnLFaTwkPAzhDpJS0', 'FEMALE', '', 'NEW', '2017-08-07 14:19:41', NULL),
(77, 'chg', 'hgjgj', 'hgjgh@hfth.ru', '$1$GM3.X53.$AsSZqj8GmBopkDLFqjUWe/', 'FEMALE', '', 'NEW', '2017-08-08 09:20:47', NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT для таблицы `task`
--
ALTER TABLE `task`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
