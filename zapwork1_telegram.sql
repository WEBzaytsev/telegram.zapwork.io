-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Время создания: Июн 01 2022 г., 14:24
-- Версия сервера: 10.2.43-MariaDB
-- Версия PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `zapwork1_telegram`
--

-- --------------------------------------------------------

--
-- Структура таблицы `db_admins`
--

CREATE TABLE `db_admins` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `username` varchar(55) NOT NULL,
  `auth_date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `db_admins`
--

INSERT INTO `db_admins` (`id`, `user_id`, `username`, `auth_date`) VALUES
(13, 719426640, 'otgamera', 1612440339),
(15, 414481955, 'johnyzzapusk', 0),
(16, 439746077, 'alexxdd', 0),
(17, 390892081, 'AnnaAlder', 1612467097),
(18, 184358574, 'e_drozdov', 1612440307);

-- --------------------------------------------------------

--
-- Структура таблицы `db_presets`
--

CREATE TABLE `db_presets` (
  `id` int(11) NOT NULL,
  `title` varchar(55) NOT NULL,
  `back_color` varchar(14) NOT NULL,
  `card_color` varchar(14) NOT NULL,
  `back_shadow_up` varchar(14) NOT NULL,
  `back_shadow_down` varchar(14) NOT NULL,
  `img_shadow_up` varchar(14) NOT NULL,
  `img_shadow_down` varchar(14) NOT NULL,
  `img_shadow_in` varchar(14) NOT NULL,
  `text_color` varchar(14) NOT NULL,
  `zap_color` varchar(14) NOT NULL,
  `width` int(11) NOT NULL,
  `padding` int(11) NOT NULL,
  `section_width` int(11) NOT NULL,
  `date_add` int(11) NOT NULL,
  `date_edit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `db_presets`
--

INSERT INTO `db_presets` (`id`, `title`, `back_color`, `card_color`, `back_shadow_up`, `back_shadow_down`, `img_shadow_up`, `img_shadow_down`, `img_shadow_in`, `text_color`, `zap_color`, `width`, `padding`, `section_width`, `date_add`, `date_edit`) VALUES
(1, 'Базовый', '#ebecf0', '#ebecf0', '#ffffff', '#c8c9cc', '#c8c9cc', '#ffffff', '#ebecf0', '#292b34', '#585e72', 1300, 150, 0, 1612361949, 0),
(2, 'Второй пресет', '#214541', '#ffffff', '#000000', '#ffee00', '#0040ff', '#ff0000', '#54629c', '#ffffff', '#c8ff00', 1400, 0, 35, 1612439490, 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `db_admins`
--
ALTER TABLE `db_admins`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `db_presets`
--
ALTER TABLE `db_presets`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `db_admins`
--
ALTER TABLE `db_admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT для таблицы `db_presets`
--
ALTER TABLE `db_presets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
