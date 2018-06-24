-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Время создания: Июн 24 2018 г., 09:19
-- Версия сервера: 5.7.22
-- Версия PHP: 7.1.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `shop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `busket`
--

CREATE TABLE `busket` (
  `id` int(6) UNSIGNED NOT NULL,
  `product` varchar(50) NOT NULL,
  `category` varchar(30) NOT NULL,
  `price` varchar(30) NOT NULL,
  `photo` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `tovars`
--

CREATE TABLE `tovars` (
  `id` int(6) UNSIGNED NOT NULL,
  `product` varchar(50) NOT NULL,
  `category` varchar(30) NOT NULL,
  `price` varchar(30) NOT NULL,
  `photo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tovars`
--

INSERT INTO `tovars` (`id`, `product`, `category`, `price`, `photo`) VALUES
(8, 'SPAS 12', 'Дробовики', '1000', 'img/drob/spas12_b.jpg'),
(9, 'Рысь', 'Дробовики', '600', 'img/drob/rmb93_b.jpg'),
(10, 'Hunter', 'Дробовики', '770', 'img/drob/hunter_b.jpg'),
(13, 'F1', 'Гранаты', '30', 'img/gren/grenade_f1_b.jpg'),
(16, 'РГД-5', 'Гранаты', '28', 'img/gren/rgd5_b.jpg'),
(17, 'РКГ-3', 'Гранаты', '33', 'img/gren/rkg3_b.jpg'),
(18, 'Desert Eagle .50', 'Пистолеты', '244', 'img/pist/eagle_b.jpg'),
(19, 'Пистолет Макарова', 'Пистолеты', '130', 'img/pist/pm_b.jpg'),
(21, 'Пистолет ТТ', 'Пистолеты', '195', 'img/pist/ttgun_b.jpg'),
(23, 'Falcon', 'Винтовки', '1900', 'img/sniper/falcon_b.jpg'),
(24, 'Police Rifle', 'Винтовки', '1500', 'img/sniper/police_b.jpg'),
(25, 'СВД', 'Винтовки', '2150', 'img/sniper/svd_b.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(6) UNSIGNED NOT NULL,
  `login` varchar(30) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `idp` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `idp`) VALUES
(6, 'helloworld', '807fb49ba72ce04205dc9bbfbc3481f189f8b1730571b6f588001ec4f37b97e12bc8cefd03598dace3c1118221bf3af78a8f5958c0f59c848af9bc8a6034ea7e', -1),
(7, 'admin', '6a4e012bd9583858a5a6fa15f58bd86a25af266d3a4344f1ec2018b778f29ba83be86eb45e6dc204e11276f4a99eff4e2144fbe15e756c2c88e999649aae7d94', -1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `busket`
--
ALTER TABLE `busket`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tovars`
--
ALTER TABLE `tovars`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `busket`
--
ALTER TABLE `busket`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT для таблицы `tovars`
--
ALTER TABLE `tovars`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
