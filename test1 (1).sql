-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Май 26 2021 г., 00:44
-- Версия сервера: 10.4.18-MariaDB
-- Версия PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `test1`
--

-- --------------------------------------------------------

--
-- Структура таблицы `fufuk`
--

CREATE TABLE `fufuk` (
  `id` int(11) NOT NULL,
  `FIO` text NOT NULL,
  `email` text NOT NULL,
  `Format` text NOT NULL,
  `adressOtp` text NOT NULL,
  `indexCity` int(11) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Структура таблицы `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `origImg` text NOT NULL,
  `secImg` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `images`
--

INSERT INTO `images` (`id`, `origImg`, `secImg`) VALUES
(95, 'Focus Magic Test Image.jpg', './upload/33e2d81136b676eb7920b751c3841455.jpg'),
(96, 'Focus Magic Test Image.jpg', './upload/afb2b7e24ea62ec199ff95a838995e6a.jpg'),
(97, 'Focus Magic Test Image.jpg', './upload/a42b5cd9d2d504b01cf0de12d8182f20.jpg'),
(98, 'Focus Magic Test Image.jpg', './upload/f4d6269a592b2a73b9dfcbde5931592d.jpg'),
(99, 'Focus Magic Test Image.jpg', './upload/6e7a5ce08e08d1790c1eb4f3d8d4ada5.jpg'),
(100, 'Focus Magic Test Image.jpg', './upload/4c88b99af9fdcba09609bc983c4110cb.jpg'),
(101, 'Focus Magic Test Image.jpg', './upload/ac23aedb67b7281e917e9112af8e5dd7.jpg'),
(102, 'Focus Magic Test Image.jpg', './upload/dfcb7a01ddfb5df92f859212e2e2b559.jpg'),
(103, 'Focus Magic Test Image.jpg', './upload/caa4dca540978a63fd2827304f6c7fa1.jpg'),
(104, 'Focus Magic Test Image.jpg', './upload/ff4fbe976b926e93451021d8cbb2495f.jpg'),
(105, 'Focus Magic Test Image.jpg', './upload/3297a500485ab326ea93e6d3ff5e0c1f.jpg'),
(106, 'Focus Magic Test Image.jpg', './upload/9c0233dfa33c2ec1fedbcbdd39c9274d.jpg'),
(107, 'Focus Magic Test Image.jpg', './upload/ddf4c125a9e99cadb86e01b5f4647271.jpg'),
(108, 'Focus Magic Test Image.jpg', './upload/ceb8bdd36233b7f5376aa77580bc0d57.jpg'),
(109, 'Focus Magic Test Image.jpg', './upload/de943ea1faefaa2f891ab73404c95150.jpg'),
(110, 'roadmap.png', './upload/efd9a56759c4fc9293c70f957394cca4.png'),
(111, 'e4anBbpZVmY.jpg', './upload/2fc972289fbf574e04624867f65ad639.jpg'),
(112, 'fufuk logo.png', './upload/b776ef5260ca60d5d91799629eb4a7e2.png'),
(113, 'DMMATUWoj_E.jpg', './upload/610682f63865d0e42a74e737a8b51569.jpg'),
(114, 'FdWB0FdBgbk.png', './upload/f11f1f2d0e6d93fe69ce044cae585d61.png'),
(115, 'eNEmi18pMDA.jpg', './upload/ad3cf41cb539a711997d70b66aba3ce2.jpg'),
(116, '5X79JC6Wk6Y.png', './upload/ef84eafea0a6a3700208f987035db54b.png'),
(117, '9AjBtMekG30.jpg', './upload/f5bbca50241c354771499bea0f95487e.jpg'),
(118, 'DMMATUWoj_E.jpg', './upload/949f8308693d2a6b409fb2eea32eeaae.jpg'),
(119, 'fufuk logo.png', './upload/1cc87cb97a11210fc9c6ad68d814d9ab.png'),
(120, 'fufuk logo.png', './upload/3d393e2a92c15548f537fa22285afae8.png'),
(121, '9AjBtMekG30.jpg', './upload/704de1911db73c4653b8e6aa0dd45484.jpg'),
(122, '9AjBtMekG30.jpg', './upload/90bd5bf594700e72bd198618a38b8232.jpg'),
(123, '5X79JC6Wk6Y.png', './upload/7929a6c5ec91d6844625a05da6789e91.png'),
(124, '5X79JC6Wk6Y.png', './upload/89c4890564bdd9e3cc96f2a0fca8ed89.png'),
(125, '9AjBtMekG30.jpg', './upload/ccd14fbcd84e1f823a30b2a79663b38e.jpg'),
(126, 'eNEmi18pMDA.jpg', './upload/a7b4571d61718cb9db4b0e8e9cd51354.jpg'),
(127, 'fufuk logo.png', './upload/6989079c11b1fc9751338bbc7bad27ca.png'),
(128, '5X79JC6Wk6Y.png', './upload/800ad91aa72750b21cae82b4a9f3cdf6.png'),
(129, '9AjBtMekG30.jpg', './upload/8ce28315376c60bc4c6dfbacc78de7c4.jpg'),
(130, 'cdtghj56.PNG', './upload/337acfcef3b32383d3a03e83b9ff3e01.png'),
(131, '5X79JC6Wk6Y.png', './upload/84696449627bc14fe67c58605f4cd833.png'),
(132, 'e4anBbpZVmY.jpg', './upload/e2a152c3bbdf02c9210b69a525c63202.jpg'),
(133, '9AjBtMekG30.jpg', './upload/69f0c28487d5b04ae037eea5b7530ea4.jpg'),
(134, 'FdWB0FdBgbk.png', './upload/3da453d77f1b5a6c335e20b6a357f603.png'),
(135, '9AjBtMekG30.jpg', './upload/34c8c268302001322b18c9420c562d8c.jpg'),
(136, '5X79JC6Wk6Y.png', './upload/f641444e2d785b82e932156bf809af2f.png'),
(137, 'FdWB0FdBgbk.png', './upload/adaf312f9d59bc160cb0c5849be839c1.png'),
(138, 'eNEmi18pMDA.jpg', './upload/a727eef629f5b33bf291cfe94d720ab8.jpg'),
(139, '9AjBtMekG30.jpg', './upload/98fd3fdb095cc7b79da4eb490e25eb04.jpg'),
(140, 'FdWB0FdBgbk.png', './upload/84c1a452a3a4f72ac27c2be1c21a55b7.png'),
(141, 'FdWB0FdBgbk.png', './upload/f5ab1182f6996b9d404e6b3903a2ef98.png'),
(142, '5X79JC6Wk6Y.png', './upload/ffa2e5967a75e3cf7c0f937c56469fdb.png'),
(143, 'eNEmi18pMDA.jpg', './upload/7d3750a9fcc9ce3286a0f2f8bc1a4f41.jpg'),
(144, '9AjBtMekG30.jpg', './upload/4f7d92cd3df0a3d8f76642b0f531fb74.jpg'),
(145, 'cdtghj56.PNG', './upload/d87966e165d442b58b2f62c956ae6214.png'),
(146, 'e4anBbpZVmY.jpg', './upload/24ad5c6ff7b31b125faebd33b6f78948.jpg'),
(147, 'FdWB0FdBgbk.png', './upload/a729740f91e1009825920db1be70f9a8.png'),
(148, 'FdWB0FdBgbk.png', './upload/175f420e29d4105ade9da93f65fd778b.png'),
(149, 'FdWB0FdBgbk.png', './upload/3586653dc84345666955335777119bd7.png'),
(150, '9AjBtMekG30.jpg', './upload/e77459bc0091e69a2c2c2c1895ca1365.jpg'),
(151, 'FdWB0FdBgbk.png', './upload/bac3bcb0787fb0e2ebe237b4fd37ec0a.png');

-- --------------------------------------------------------

--
-- Структура таблицы `info`
--

CREATE TABLE `info` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `secondName` text NOT NULL,
  `lastName` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `postCode` text NOT NULL,
  `country` text NOT NULL,
  `city` text NOT NULL,
  `region` text NOT NULL,
  `apartments` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `info`
--

INSERT INTO `info` (`id`, `name`, `secondName`, `lastName`, `email`, `password`, `postCode`, `country`, `city`, `region`, `apartments`) VALUES
(11, 'Денис', 'Тимофеев', 'Александрович', 'deniska.timofeev76@mail.ru', 'Den06062003', '152150', 'РФ', 'Ростов Великий', 'Яр обл', 'Бебеля, 62А, кв 23'),
(12, '5name', '3secName', '2lastName', 'deniska.tismofeev76@mail.ru', 'Den06062003', '', '', '', '', ''),
(16, '123', '5768', '543', 'Artifs@mail.ru', 'Den06062003', '', '', '', '', ''),
(17, 'Денис', 'Тимофеев', 'Сергеевич', 'mishnev@gmail.com', 'Artifs322', '150150', 'РФ', 'Ростов Великий', 'Яр область', '1-й микрорайон, 57, кв 96'),
(18, '', '', '', 'zanozinArtemiy@mail.ru', 'DragAndDropShit', '', '', '', '', ''),
(19, '', '', '', '1235@mail.ru', '12345678', '', '', '', '', ''),
(20, 'Илья', 'Мишнёв', 'Валерьевич', 'mishnev@gail.com', '123123123', '150150', 'РФ', 'Ростов Великий', 'Яр область', '1-й микрорайон, 57, кв 96'),
(21, 'Егор', 'Тимофеев', 'Александрович', 'Artifs12@mail.ru', '12345678', '152150', 'РФ3', 'Ростов Великий', 'Яр область', 'Бебеля 62А, кв 23'),
(22, '', '', '', 'Deniska.timofeev76@mail.ru', '1123123123', '', '', '', '', ''),
(23, '', '', '', 'Mishnev@gmail.com', 'Artifs123', '', '', '', '', ''),
(24, '123123', '123', '123123123', '123123@mail.ru', '123123123', '123123123', '123123123', '123123', '123123123', '312213'),
(25, '123', '123123', '123123123', '1231231@mail.ru', '123123123', '123123123123123123123123', '123123123123', '123123123123123', '123123123123123123', '123123123123123123123');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `email` text NOT NULL,
  `FIO` text NOT NULL,
  `Adress` text NOT NULL,
  `orderUser` text NOT NULL,
  `imgPortret` text NOT NULL,
  `summ` int(12) NOT NULL,
  `addictionalNote` text NOT NULL,
  `date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `email`, `FIO`, `Adress`, `orderUser`, `imgPortret`, `summ`, `addictionalNote`, `date`) VALUES
(28, 'Artifs12@mail.ru', 'Егор Тимофеев Александрович', '152150, РФ3, Ростов Великий, Яр область, Бебеля 62А, кв 23', 'Календарь майя,2,Портрет А3,Ключница,3,', './upload/15350a7ab92a52d747f7c9466f9c9361.jpg ', 8100, '-', '2021/05/22 18:11:25'),
(29, 'Artifs12@mail.ru', 'Егор Тимофеев Александрович', '152150, РФ3, Ростов Великий, Яр область, Бебеля 62А, кв 23', 'Ключница,2,Копилка,3,', '', 7050, '-', '2021/05/22 18:11:38'),
(30, 'Artifs12@mail.ru', 'Егор Тимофеев Александрович', '152150, РФ3, Ростов Великий, Яр область, Бебеля 62А, кв 23', 'Ключница,2,Копилка,3,', '', 7050, '-', '2021/05/22 18:14:33'),
(31, 'Artifs12@mail.ru', 'Егор Тимофеев Александрович', '152150, РФ3, Ростов Великий, Яр область, Бебеля 62А, кв 23', 'Ключница,1,', '', 1500, '-', '2021/05/22 18:57:43'),
(32, 'Artifs12@mail.ru', 'Егор Тимофеев Александрович', '152150, РФ3, Ростов Великий, Яр область, Бебеля 62А, кв 23', 'Копилка,2,Портрет А2,', './upload/9c19a2197395b576c048781397724f90.jpg ', 5700, '-', '2021/05/23 19:26:09');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `email`, `password`) VALUES
(414, 'Deniska.timofeev76@mail.ru', 'Den06062003');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `fufuk`
--
ALTER TABLE `fufuk`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
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
-- AUTO_INCREMENT для таблицы `fufuk`
--
ALTER TABLE `fufuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT для таблицы `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;

--
-- AUTO_INCREMENT для таблицы `info`
--
ALTER TABLE `info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=415;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
