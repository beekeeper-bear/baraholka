-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Час створення: Бер 20 2021 р., 12:30
-- Версія сервера: 5.7.25
-- Версія PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `shopvelo`
--

-- --------------------------------------------------------

--
-- Структура таблиці `myvelo_discounts`
--

CREATE TABLE `myvelo_discounts` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) NOT NULL,
  `value` double UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `myvelo_discounts`
--

INSERT INTO `myvelo_discounts` (`id`, `code`, `value`) VALUES
(1, 'ABC', 0.1);

-- --------------------------------------------------------

--
-- Структура таблиці `myvelo_metca`
--

CREATE TABLE `myvelo_metca` (
  `id` int(11) UNSIGNED NOT NULL,
  `title_m` varchar(255) NOT NULL,
  `section_id` varchar(255) NOT NULL,
  `img_m` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `myvelo_metca`
--

INSERT INTO `myvelo_metca` (`id`, `title_m`, `section_id`, `img_m`) VALUES
(1, 'передняя ось', '', ''),
(2, 'задняя ось', '', ''),
(3, 'каретка', '', '');

-- --------------------------------------------------------

--
-- Структура таблиці `myvelo_orders`
--

CREATE TABLE `myvelo_orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `delivery` varchar(2) NOT NULL,
  `products_ids` text NOT NULL,
  `price` double UNSIGNED NOT NULL,
  `names` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `patronymic` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `notice` text NOT NULL,
  `date_order` int(10) UNSIGNED NOT NULL,
  `date_send` int(10) UNSIGNED NOT NULL,
  `date_pay` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `myvelo_orders`
--

INSERT INTO `myvelo_orders` (`id`, `delivery`, `products_ids`, `price`, `names`, `surname`, `patronymic`, `phone`, `email`, `address`, `notice`, `date_order`, `date_send`, `date_pay`) VALUES
(148, '0', '8,2,3,3,7,9', 1180, 'Mikhail', 'Tretyak', 'Pavlovich', '0977416330', 'beekepper@ukr.net', '212121', 'qqqqq', 1595424154, 0, 0),
(149, '0', '3,4,4', 340, 'Mikhail', 'Tretyak', 'Pavlovich', '0977416330', 'beekepper@ukr.net', '303030', '', 1595757946, 0, 0),
(150, '1', '1,2,2,3', 480, 'Misha', 'Tretyk', 'Pavl', '0977416330', '7beekeeper7@gmail.com', '3131313', '', 1595773632, 0, 0),
(151, '2', '8,8', 520, 'Mikhail', 'Tretyak', 'Pavlovich', '0977416330', 'User1@mail.ua', '', '', 1598426129, 0, 0),
(152, '2', '8,8', 520, 'Mikhail', 'Tretyak', 'Pavlovich', '0977416330', 'beekepper@ukr.net', '', 'Примечания к заказу:', 1598514707, 0, 0);

-- --------------------------------------------------------

--
-- Структура таблиці `myvelo_products`
--

CREATE TABLE `myvelo_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `section_id` int(10) UNSIGNED NOT NULL,
  `img` varchar(255) NOT NULL,
  `img1` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `price` double UNSIGNED NOT NULL,
  `date` int(10) UNSIGNED NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `myvelo_products`
--

INSERT INTO `myvelo_products` (`id`, `section_id`, `img`, `img1`, `title`, `price`, `date`, `description`) VALUES
(1, 5, 'pokrishka/10.jpg', 'pokrishka/10.jpg', 'диаметр 10 дюймов', 100, 1506, 'качественная резина, очень прочная'),
(2, 5, 'pokrishka/12.jpg', 'pokrishka/12.jpg', 'диаметр 12 дюймов', 120, 1306, 'качественная резина, очень прочная'),
(3, 5, 'pokrishka/14.jpg', 'pokrishka/14.jpg', 'диаметр 14 дюймов', 140, 1706, 'качественная резина, очень прочная'),
(4, 5, 'pokrishka/16.jpg', 'pokrishka/16.jpg', 'диаметр 16 дюймов', 160, 1806, 'качественная резина, очень прочная'),
(5, 5, 'pokrishka/20.jpg', 'pokrishka/20.jpg', 'диаметр 20 дюймов', 200, 1906, 'качественная резина, очень прочная'),
(6, 5, 'pokrishka/24.jpg', 'pokrishka/24.jpg', 'диаметр 24 дюймов', 240, 206, 'качественная резина, очень прочная'),
(7, 5, 'pokrishka/26.jpg', 'pokrishka/26.jpg', 'диаметр 26 дюймов', 260, 1306, 'качественная резина, очень прочная'),
(8, 1, 'cep/cep1.jpg', 'cep/cep1.jpg', 'цепь цвет серый', 260, 1306, 'Количество звеньев: 114\n\nШирина цепи: 1/8\"\n\nШаг цепи: 1/2\"\n\nВес: 358 г\n\nОсобенности:\n\n    цепь для односкоростных велосипедов и велосипедов с планетарной системой передач\n    соединительный пин в комплекте\n'),
(9, 3, 'os/os1.jpg', 'os/os1.jpg', 'Ось заднего колеса ', 260, 1306, 'Ось заднего колеса велосипеда (36 спиц, ножной тормоз, червячная, без корпуса, + звезда) YKX. ');

-- --------------------------------------------------------

--
-- Структура таблиці `myvelo_section`
--

CREATE TABLE `myvelo_section` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `myvelo_section`
--

INSERT INTO `myvelo_section` (`id`, `title`, `img`) VALUES
(1, 'Велосипедная цепь', 'image/titul/cep.jpg'),
(2, 'звездочки', 'image/titul/zvezda.jpg'),
(3, 'оси', 'image/titul/os.jpg'),
(4, 'подшипники', 'image/titul/podsh.jpg'),
(5, 'покрышки камеры', 'image/titul/coleso.jpg'),
(6, 'фонари', 'image/titul/fonar.jpg'),
(7, 'тормоза', 'image/titul/tormoz.jpg'),
(8, 'насосы', 'image/titul/nasos.jpg'),
(9, 'ремкомплекты', 'image/titul/rem.jpg'),
(10, 'замки', 'image/titul/zamok.jpg'),
(11, 'вилки', 'image/titul/vilci.jpg'),
(12, 'другие запчасти', 'image/fon/Z1.png');

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `myvelo_discounts`
--
ALTER TABLE `myvelo_discounts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Індекси таблиці `myvelo_metca`
--
ALTER TABLE `myvelo_metca`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `myvelo_orders`
--
ALTER TABLE `myvelo_orders`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `myvelo_products`
--
ALTER TABLE `myvelo_products`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `myvelo_section`
--
ALTER TABLE `myvelo_section`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `title` (`title`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `myvelo_discounts`
--
ALTER TABLE `myvelo_discounts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблиці `myvelo_metca`
--
ALTER TABLE `myvelo_metca`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблиці `myvelo_orders`
--
ALTER TABLE `myvelo_orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;

--
-- AUTO_INCREMENT для таблиці `myvelo_products`
--
ALTER TABLE `myvelo_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблиці `myvelo_section`
--
ALTER TABLE `myvelo_section`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
