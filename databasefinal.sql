-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 03-Ago-2022 às 22:16
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `databasefinal`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`id`, `category_name`) VALUES
(18, 'Fantasy'),
(20, 'Mystery'),
(21, 'Romance'),
(22, 'Science Fiction'),
(23, 'Thriller and Suspense'),
(24, 'Western'),
(29, 'Horror');

-- --------------------------------------------------------

--
-- Estrutura da tabela `contactos`
--

CREATE TABLE `contactos` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `msg` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `contactos`
--

INSERT INTO `contactos` (`id`, `nome`, `msg`) VALUES
(3, 'xaxa', 'I have noticed that, although this subreddit has 1,000,020 readers, I am not receiving 1,000,020 upvotes on my posts. I\'m not sure if this is being done intentionally or if these \"friends\" are forgetting to click \'upvote\'. Either way, I\'ve had enough. I have compiled a spreadsheet of individuals who have \"forgotten\" to upvote my most recent posts. After 2 consecutive strikes, your name is automatically highlighted (shown in red) and I am immediately notified. 3 consecutive strikes and you can expect an in-person \"consultation\". Think about your actions.');

-- --------------------------------------------------------

--
-- Estrutura da tabela `livros`
--

CREATE TABLE `livros` (
  `id` int(10) NOT NULL,
  `name` varchar(250) NOT NULL,
  `categoryid` int(11) NOT NULL,
  `author` varchar(250) NOT NULL,
  `price` decimal(6,2) NOT NULL,
  `cover` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `livros`
--

INSERT INTO `livros` (`id`, `name`, `categoryid`, `author`, `price`, `cover`) VALUES
(1, 'To Paradise', 42, 'Hanya Yanagihara', '21.99', 'img/ToParadise.jpg'),
(2, 'Violeta', 62, 'Isabel Allende', '16.89', 'img/Violeta.jpg'),
(3, 'Black Cake', 63, 'Charmaine Wilkerson', '19.90', 'img/BlackCake.jpg'),
(4, 'The Paris Apartment', 78, 'Lucy Foley', '16.89', 'img/TheParisApartment.jpg'),
(5, 'Young Mungo', 66, 'Douglas Stuart', '17.99', 'img/YoungMungo.jpg'),
(6, 'The Candy House', 64, 'Jennifer Egan', '18.00', 'img/TheCandyHouse.jpg'),
(7, 'Memphis', 59, 'Tara M. Stringfellow', '27.50', 'img/Memphis.jpg'),
(8, 'Sea of Tranquility', 54, 'Emily St. John Mandel', '17.99', 'img/SeaOfTranquility.jpg'),
(9, 'Book Lovers', 80, 'Emily Henry', '18.35', 'img/BookLovers.jpg'),
(37, 'teste', 52, 'eu', '23.00', 'img/6960cover.jpg'),
(39, 'teste1 com cover', 57, 'fabio santos', '14.55', 'img/5724d3s-design-book-covers.jpg-840.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `orderfinal`
--

CREATE TABLE `orderfinal` (
  `id` int(11) NOT NULL,
  `orderid` int(11) NOT NULL,
  `item` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `orders`
--

CREATE TABLE `orders` (
  `orderid` int(11) NOT NULL,
  `account` varchar(255) NOT NULL,
  `variety` int(11) NOT NULL,
  `total_final` decimal(6,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `shipping`
--

CREATE TABLE `shipping` (
  `id` int(100) NOT NULL,
  `name` varchar(250) NOT NULL,
  `contact` varchar(9) NOT NULL,
  `email` varchar(250) NOT NULL,
  `address` varchar(250) NOT NULL,
  `country` varchar(250) NOT NULL,
  `mail_associated` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `shipping`
--

INSERT INTO `shipping` (`id`, `name`, `contact`, `email`, `address`, `country`, `mail_associated`) VALUES
(92, 'Alberto António', '916943514', 'Albertinhoto@gmail.com', 'Rua do canto, n333', 'Brasil', 'fabio_ACDS@hotmail.com'),
(94, 'Fábio Santos', '919006591', 'Fabio_ACDS@hotmail.com', 'Largo do Poeta Nº143', 'Portugal', 'xaxa');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sub_categorias`
--

CREATE TABLE `sub_categorias` (
  `id` int(11) NOT NULL,
  `parentid` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `sub_categorias`
--

INSERT INTO `sub_categorias` (`id`, `parentid`, `category_name`) VALUES
(42, 18, 'Alternate History'),
(43, 18, 'Childrens Story'),
(44, 18, 'Comedy'),
(45, 18, 'Contemporary'),
(46, 18, 'Dark Fantasy'),
(52, 20, 'Bumbling Detective'),
(53, 20, 'Child in Peril'),
(54, 20, 'Cozy'),
(55, 20, 'Disabled'),
(56, 20, 'Doctor Detective'),
(57, 21, 'Billionaires'),
(58, 21, 'Contemporary'),
(59, 21, 'Fantasy Romance'),
(60, 21, 'Historical'),
(61, 21, 'Inspirational'),
(62, 22, 'Aliens'),
(63, 22, 'Alternate/Parallel Universe'),
(64, 22, 'Apocalyptic/Post-Apocalyptic'),
(65, 22, 'Colonization'),
(66, 22, 'Dying Earth'),
(67, 23, 'Action'),
(68, 23, 'Comedy'),
(69, 23, 'Conspiracy'),
(70, 23, 'Crime'),
(71, 23, 'Forensic'),
(72, 24, 'Bounty Hunters'),
(73, 24, 'Comedy'),
(74, 24, 'Gunfighters'),
(75, 24, 'Lawmen'),
(76, 24, 'Outlaws'),
(77, 29, 'Comedy'),
(78, 29, 'Dark Fantasy'),
(79, 29, 'Gothic'),
(80, 29, 'Paranormal'),
(81, 29, 'Post-Apocalyptic');

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE `user` (
  `id` int(2) NOT NULL,
  `username` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `userpass` varchar(250) NOT NULL,
  `admin` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `userpass`, `admin`) VALUES
(13, 'Fábio Santos', 'Fabio_ACDS@hotmail.com', '1ac5dcb2a96ad42d7da09dc09b91dd1a', 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `contactos`
--
ALTER TABLE `contactos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `livros`
--
ALTER TABLE `livros`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `orderfinal`
--
ALTER TABLE `orderfinal`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderid`);

--
-- Índices para tabela `shipping`
--
ALTER TABLE `shipping`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `sub_categorias`
--
ALTER TABLE `sub_categorias`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de tabela `contactos`
--
ALTER TABLE `contactos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `livros`
--
ALTER TABLE `livros`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de tabela `orderfinal`
--
ALTER TABLE `orderfinal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT de tabela `orders`
--
ALTER TABLE `orders`
  MODIFY `orderid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de tabela `shipping`
--
ALTER TABLE `shipping`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT de tabela `sub_categorias`
--
ALTER TABLE `sub_categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT de tabela `user`
--
ALTER TABLE `user`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
