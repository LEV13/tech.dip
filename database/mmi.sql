-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 08 2019 г., 11:56
-- Версия сервера: 5.7.20-log
-- Версия PHP: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `mmi`
--

-- --------------------------------------------------------

--
-- Структура таблицы `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` text,
  `image` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `clients`
--

INSERT INTO `clients` (`id`, `name`, `address`, `image`) VALUES
(1, 'Росатом', 'Россия, Москва', '/images/clients/rosatom.png'),
(2, 'МИФИ', 'Каширское шоссе, дом 31', '/images/clients/mephi.png');

-- --------------------------------------------------------

--
-- Структура таблицы `elements`
--

CREATE TABLE `elements` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `code` varchar(2) NOT NULL,
  `lib_id` int(11) NOT NULL,
  `type_id` int(11) DEFAULT NULL,
  `description` text,
  `icon` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `elements`
--

INSERT INTO `elements` (`id`, `name`, `code`, `lib_id`, `type_id`, `description`, `icon`) VALUES
(1, '2 позиции', '01', 1, 1, '2 позиции2 позиции2 позиции2 позиции2 позиции', NULL),
(2, '3 позиции', '02', 1, 2, '3 позиции3 позиции', NULL),
(3, '4 позиции', '03', 1, 3, 'Тестовое описание', NULL),
(4, 'Цвет', '01', 2, 1, NULL, NULL),
(5, 'Палитра', '02', 2, 2, NULL, NULL),
(6, 'Стрелка', '03', 2, 3, NULL, NULL),
(7, 'Фон', '01', 3, 1, NULL, NULL),
(8, 'Прозрачность', '02', 3, 2, NULL, NULL),
(9, 'Толщина', '03', 3, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `element_states`
--

CREATE TABLE `element_states` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `element_id` int(11) NOT NULL,
  `number` varchar(2) NOT NULL,
  `image` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `element_types`
--

CREATE TABLE `element_types` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `element_types`
--

INSERT INTO `element_types` (`id`, `name`) VALUES
(1, 'тип1'),
(2, 'тип2'),
(3, 'тип3'),
(4, 'тип4'),
(5, 'тип5');

-- --------------------------------------------------------

--
-- Структура таблицы `libs`
--

CREATE TABLE `libs` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `simulator_id` int(11) NOT NULL,
  `code` varchar(2) NOT NULL,
  `lib_type_id` int(11) DEFAULT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `libs`
--

INSERT INTO `libs` (`id`, `name`, `simulator_id`, `code`, `lib_type_id`, `description`) VALUES
(1, 'Ключи', 1, '11', 1, 'Описание библиотеки ключей'),
(2, 'Часы', 1, '12', 1, 'Описание библиотеки часов'),
(3, 'Круг', 2, '13', 1, 'Описание библиотеки кргу'),
(4, 'Квадрат', 3, '14', 2, 'Описание библиотеки квадрат');

-- --------------------------------------------------------

--
-- Структура таблицы `lib_types`
--

CREATE TABLE `lib_types` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `lib_types`
--

INSERT INTO `lib_types` (`id`, `name`, `description`) VALUES
(1, 'арматура', ''),
(2, 'controls', '');

-- --------------------------------------------------------

--
-- Структура таблицы `reused_libs`
--

CREATE TABLE `reused_libs` (
  `lib_id` int(11) NOT NULL,
  `simulator_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `simulators`
--

CREATE TABLE `simulators` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `client_id` int(11) NOT NULL,
  `date` varchar(4) NOT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `simulators`
--

INSERT INTO `simulators` (`id`, `name`, `client_id`, `date`, `description`) VALUES
(1, 'БН-800', 1, '2012', 'Реактор на быстрых нейтронах с натриевым теплоносителем, на котором будет производиться окончательная отработка технологии реакторов на быстрых нейтронах с использованием уран-плутониевого мокс-топлива. '),
(2, 'БН-600', 1, '2013', 'Энергетический реактор на быстрых нейтронах с натриевым теплоносителем, пущенный в эксплуатацию в апреле 1980 года в 3-м энергоблоке на Белоярской АЭС в Свердловской области близ города Заречный. '),
(3, 'ВВЭР-440', 2, '2014', 'Водо-водяной энергетический реактор мощностью (электрической) 440 МВт, разработанный в СССР.');

-- --------------------------------------------------------

--
-- Структура таблицы `tags`
--

CREATE TABLE `tags` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `tags_elements`
--

CREATE TABLE `tags_elements` (
  `element_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `elements`
--
ALTER TABLE `elements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type_id` (`type_id`),
  ADD KEY `lib_id` (`lib_id`);

--
-- Индексы таблицы `element_states`
--
ALTER TABLE `element_states`
  ADD PRIMARY KEY (`id`),
  ADD KEY `element_id` (`element_id`);

--
-- Индексы таблицы `element_types`
--
ALTER TABLE `element_types`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `libs`
--
ALTER TABLE `libs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `simulator_id` (`simulator_id`),
  ADD KEY `lib_type_id` (`lib_type_id`);

--
-- Индексы таблицы `lib_types`
--
ALTER TABLE `lib_types`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `reused_libs`
--
ALTER TABLE `reused_libs`
  ADD PRIMARY KEY (`lib_id`,`simulator_id`),
  ADD KEY `simulator_id` (`simulator_id`);

--
-- Индексы таблицы `simulators`
--
ALTER TABLE `simulators`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_id` (`client_id`),
  ADD KEY `client_id_2` (`client_id`);

--
-- Индексы таблицы `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tags_elements`
--
ALTER TABLE `tags_elements`
  ADD PRIMARY KEY (`element_id`,`tag_id`),
  ADD KEY `tag_id` (`tag_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `elements`
--
ALTER TABLE `elements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `element_states`
--
ALTER TABLE `element_states`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `element_types`
--
ALTER TABLE `element_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `libs`
--
ALTER TABLE `libs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `lib_types`
--
ALTER TABLE `lib_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `simulators`
--
ALTER TABLE `simulators`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `elements`
--
ALTER TABLE `elements`
  ADD CONSTRAINT `elements_ibfk_1` FOREIGN KEY (`lib_id`) REFERENCES `libs` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `elements_ibfk_4` FOREIGN KEY (`type_id`) REFERENCES `element_types` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `element_states`
--
ALTER TABLE `element_states`
  ADD CONSTRAINT `element_states_ibfk_1` FOREIGN KEY (`element_id`) REFERENCES `elements` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `libs`
--
ALTER TABLE `libs`
  ADD CONSTRAINT `libs_ibfk_1` FOREIGN KEY (`simulator_id`) REFERENCES `simulators` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `libs_ibfk_3` FOREIGN KEY (`lib_type_id`) REFERENCES `lib_types` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `reused_libs`
--
ALTER TABLE `reused_libs`
  ADD CONSTRAINT `reused_libs_ibfk_1` FOREIGN KEY (`lib_id`) REFERENCES `libs` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `reused_libs_ibfk_2` FOREIGN KEY (`simulator_id`) REFERENCES `simulators` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `simulators`
--
ALTER TABLE `simulators`
  ADD CONSTRAINT `simulators_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `tags_elements`
--
ALTER TABLE `tags_elements`
  ADD CONSTRAINT `tags_elements_ibfk_3` FOREIGN KEY (`element_id`) REFERENCES `elements` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `tags_elements_ibfk_4` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
