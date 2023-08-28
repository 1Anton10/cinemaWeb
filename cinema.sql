-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 21 2023 г., 11:51
-- Версия сервера: 10.4.24-MariaDB
-- Версия PHP: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `cinema`
--

-- --------------------------------------------------------

--
-- Структура таблицы `admin`
--

CREATE TABLE `admin` (
  `id_a` int(11) NOT NULL,
  `login_a` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pass_a` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subsc` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `admin`
--

INSERT INTO `admin` (`id_a`, `login_a`, `pass_a`, `subsc`) VALUES
(1, 'admin', '$2y$10$o/DPvQ9kz/N6QQkjI/L72.YipT8YRNvdawvTVthjVfDQAu4jGil9O', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `films`
--

CREATE TABLE `films` (
  `id_f` int(11) NOT NULL,
  `image` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tags` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tag2` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tag3` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `films`
--

INSERT INTO `films` (`id_f`, `image`, `tags`, `tag2`, `tag3`, `title`, `name`, `date`, `url`) VALUES
(1, '25844be3-6efa-442a-9b5b-e482ce2c89a6.jpg', '18+', 'Драма', 'Фантастика', 'Зрелищная научная фантастика для всех, кто любит нетривиальные истории про покорение космоса. «Миссии» — это захватывающий французский сериал, рассказывающий о первом пилотируемом полете на Марс. Космическое путешествие проспонсировано известным миллиардером, в команде — только лучшие специалисты своего дела. Казалось бы, что может пойти не так? Оказывается, многое. Как минимум, команду ждет неприятное открытие: они не первые люди, которые ступили на загадочную красную планету.', 'Миссии', '09/03/23', 'https://www.youtube.com/embed/HdzlK1THa9I'),
(2, 'Fjd7WFPhaBTpcL0rUtOm0Ixxsr1.jpg', '12+', 'Драма', 'Детское', 'Зима 1943 года. В суровый, холодный край из Урала с мамой приехала девочка Оля. По воле судьбы она осталась сиротой и попала в детский дом. В чужом краю она находит друга, мальчика-якута Кешу Мунхалова. С чем же столкнет судьба наших героев?', 'Государственные Дети', '09/03/23', 'https://www.youtube.com/embed/fJJsPoVpU8o'),
(3, '300x450.jpg', '12+', 'Драма', 'Военный', '1942 год. Офицер Красной армии Николай Киселев получает приказ вывести с оккупированных белорусских земель за линию фронта свыше двухсот евреев — стариков, женщин и детей, чудом избежавших расправы. Этим измученным голодом людям, потерявшим родных и едва не сошедшим с ума от пережитого ужаса, предстоит пройти пешком по лесным тропам сотни километров, чтобы обрести надежду на спасение и веру в будущее.\r\n\r\nРейтинг фильма', 'Праведник', '09/03/23', 'https://www.youtube.com/embed/bmV112rpqAs'),
(7, 'HK8cTDH6lOM.jpg', '18+', 'Документальное', 'Экстрасенсы', 'Документальный проект, рассказывающей о телеведущей и экстрасенсе мисс Клео, популярной в 90-е. Юри Делл Харрис (настоящее имя ясновидящей) работала на специальной горячей линии, где оказывала магически-психологическую помощь: например, раскладывала карты Таро. Продюсеры придумали ей псевдоним и образ шаманки, однако со временем эффектную женщину стали подозревать в мошенничестве. ', 'Мисс Клео', '09/03/23', 'https://www.youtube.com/embed/kWjGHVGeXc0'),
(8, 'Captain_Marvel_film_logo.jpg', '16+', 'Фантастика', 'Семейное', 'Первый фильм Marvel с женщиной в главной роли посвящен приключениям Кэрол Дэнверс (Бри Ларсон), известной также как Капитан Марвел. Летчица из военно-воздушных сил считается погибшей при испытаниях экспериментального двигателя, но на самом деле катастрофа не только не убила ее, но и наделила сверхспособностями. Теперь она оказывается вовлеченной в войну инопланетных рас, и на нее возложена опасная, но чрезвычайно важная миссия.', 'Капитан Марвел', '10/03/23', 'https://www.youtube.com/embed/2eaZUwBWJLM'),
(9, 'fnNNMtYlEYc.jpg', '18+', 'Фантастика', 'Семейное', 'Эпическая сага о противостоянии темной и светлой сторон Силы продолжается фильмом «Звездные войны: Последние джедаи». В Галактической Республике вот-вот воцарится военная диктатура, Кайло Рен постепенно превращается в суперзлодея, а Рей пробудила в себе Силу. Спорим, встреча с постаревшим Люком Скайуокером сильно изменить не только ее жизнь, но и судьбу Галактики?', 'Звёздные Войны', '10/03/23', 'https://www.youtube.com/embed/gcIdWujuxuM'),
(10, 'GUGA2_PAYOFF_68x100_preview.jpg', '18+', 'Фантастика', 'Семейное', '«Стражи Галактики. Часть 2» — продолжение приключений команды отважных супергероев. Лидер команды землянин Питер Квилл по прозвищу Звездный Лорд (Крис Прэтт), решительный воин Дракс Разрушитель (Дэйв Батиста), зеленокожая инопланетянка Гамора (Зои Салдана), малыш Грут (Вин Дизель) и енот Ракета (Брэдли Купер) снова бороздят космические дали.', 'Стражи Галактики Часть 2', '10/03/23', 'https://www.youtube.com/embed/w5siIauNEw4'),
(11, 'X-Men-First-Class.jpg', '18+', 'Фантастика', 'Семейное', '«Люди Икс: Первый класс» приоткроет завесу тайн о происхождении и становлении Чарльза Ксавьера (Джеймс Макэвой), известного как Профессор Икс, и его заклятого врага — Эрика Леншерре (Майкл Фассбендер), известного по прозвищу Магнето. Захватывающий приквел расскажет, как создавалась уникальная школа для одаренных детей-мутантов, какая кошка пробежала между двумя некогда близкими друзьями и почему Ксавьер оказался прикован к инвалидному креслу.', 'Люди Икс: Первый Класс', '10/03/23', 'https://www.youtube.com/embed/RezuYXYxVvs'),
(12, 'Avengers_Infinity_War_poster.jpg', '18+', 'Фантастика', 'Семейное', 'Предпоследний фильм супергеройской франшизы. «Мстители: Война бесконечности» знакомит нас с Таносом — новой угрозой миру из космоса. Могущественный титан собирается собрать шесть Камней Бесконечности, артефакты невероятной силы, которые позволят ему менять реальность по своему желанию. А планы у него, конечно же, масштабные и разрушительные. Судьба Земли никогда еще не была в такой опасности. Мстители принимают этот сложный вызов.', 'Мстители Война бесконечности', '11/03/23', 'https://www.youtube.com/embed/6SImf4Srjmg'),
(13, 'PIRATES5_PAYOFF_68x100_preview.jpg', '18+', 'Фантастика', 'Семейное', '«Пираты Карибского моря: Мертвецы не рассказывают сказки» — увлекательная история о поисках волшебного трезубца Посейдона. Магический артефакт, способный избавить своего обладателя от любых морских проклятий, нужен и Джеку Воробью, который опасасется мести своего старого знакомого капитана Салазара, и сыну Уилла и Элизабет, желающему избавить отца от страданий, и даже загадочной любительнице астрономии Карине Смит.', 'Пираты Карибского моря: Мертвецы не рассказывают сказки', '11/03/23', 'https://www.youtube.com/embed/GQR23Ri73pE'),
(14, 'PpPIJOUnrM4.jpg', '18+', 'Документальное', 'Семейное', 'Документальный короткометражный фильм, номинированный на премию «Оскар».  Автор — Джей Розенблатт («Человеческие останки»), известный документалист, постоянно сотрудничающий с HBO. «Когда мы были задирами» — личный взгляд на неприятный инцидент в детстве режиссера, оставивший отпечаток на всю жизнь.', 'Когда мы были задирами', '11/03/23', 'https://www.youtube.com/embed/HcFJPTj94aM');

-- --------------------------------------------------------

--
-- Структура таблицы `owns_films`
--

CREATE TABLE `owns_films` (
  `id_ow` int(11) NOT NULL,
  `img` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tag` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `titl` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_o` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_u` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `places`
--

CREATE TABLE `places` (
  `places_id` int(11) NOT NULL,
  `place` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `places`
--

INSERT INTO `places` (`places_id`, `place`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 9),
(10, 10),
(11, 11),
(12, 12);

-- --------------------------------------------------------

--
-- Структура таблицы `tickets`
--

CREATE TABLE `tickets` (
  `ticket_id` int(50) NOT NULL,
  `film_id` int(50) NOT NULL,
  `place` int(5) NOT NULL,
  `time` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `us_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `tickets`
--

INSERT INTO `tickets` (`ticket_id`, `film_id`, `place`, `time`, `us_id`) VALUES
(1, 2, 1, '10:00', 0),
(2, 1, 1, '10:00', 0),
(3, 1, 6, '10:00', 1),
(4, 1, 1, '12:00', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `times`
--

CREATE TABLE `times` (
  `time_id` int(11) NOT NULL,
  `time` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `times`
--

INSERT INTO `times` (`time_id`, `time`) VALUES
(1, '10:00'),
(2, '11:00'),
(3, '12:00'),
(4, '13:00');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pass` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subs` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `pass`, `icon`, `subs`) VALUES
(1, 'user', '$2y$10$FbLENSTFJzPaIpGxEfH3OuJNWZIR5VzxWqhmYcjKvrqZtrSSeY90K', 'image002-90.jpg', NULL),
(2, 'Hinako', '$2y$10$uaYsqGPkMPPLWx5u19U.3OdZlxM5lpq/1Exq3xDii7spQ0tOMwG8u', 'image002-90.jpg', 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_a`);

--
-- Индексы таблицы `films`
--
ALTER TABLE `films`
  ADD PRIMARY KEY (`id_f`);

--
-- Индексы таблицы `owns_films`
--
ALTER TABLE `owns_films`
  ADD PRIMARY KEY (`id_ow`);

--
-- Индексы таблицы `places`
--
ALTER TABLE `places`
  ADD PRIMARY KEY (`places_id`);

--
-- Индексы таблицы `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`ticket_id`);

--
-- Индексы таблицы `times`
--
ALTER TABLE `times`
  ADD PRIMARY KEY (`time_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `admin`
--
ALTER TABLE `admin`
  MODIFY `id_a` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `films`
--
ALTER TABLE `films`
  MODIFY `id_f` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `owns_films`
--
ALTER TABLE `owns_films`
  MODIFY `id_ow` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `places`
--
ALTER TABLE `places`
  MODIFY `places_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `tickets`
--
ALTER TABLE `tickets`
  MODIFY `ticket_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `times`
--
ALTER TABLE `times`
  MODIFY `time_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
