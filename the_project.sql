-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2025 at 08:53 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `the project`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `quantity` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `pro_id`, `quantity`) VALUES
(61, 2, 1, '3'),
(62, 2, 2, '1'),
(66, 1, 2, '3'),
(67, 1, 5, '1');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Computer'),
(2, 'Phone'),
(3, 'Clothes');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `pro_id` int(11) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`pro_id`, `img`) VALUES
(82, 'c44c613c99b53d517bb243933cc0143a.jpg'),
(82, 'b29b1a98033ea69de7e1271abc68eb73.jpg'),
(84, 'bfe875016cff531f45145c17ef6812c4.jpg'),
(84, '9834f3c99877cf26eaa6712f923d04d0.jpg'),
(84, '91f05b4e42ddf1811c7da1739ef0e92b.jpg'),
(85, '4cc26c2c0895762952a6cb25759c49f9.jpg'),
(85, 'c318e0176e63133a169c83dc5dcc1ca6.jpg'),
(85, '12e771df2319e86f12a74fee58cec60d.jpg'),
(86, '245f59e6ade852abe4d98af326335601.jpg'),
(86, 'e348e5fa11e84117ee90094348c97a1b.jpg'),
(87, 'd152a84a54338ea793a5c9b765515bff.jpg'),
(88, '2cdddf7e287179eb4d53eecb93399872.jpg'),
(88, 'c6d5b304d9e1838f07ea04680d8c3390.jpg'),
(89, 'b632487e0ffe74f4f69ea76bf8926c2d.jpg'),
(89, 'a9b622f7ed5daf6538db8fd8ef5cf6e0.jpg'),
(90, '5e03e98cc96ebe82a7cb4ed617057ce7.jpg'),
(91, 'a10134e32deb3f569742beb3188edcdb.jpg'),
(92, '90b3aede1370b286ccbb9ff0e3c7bc7c.jpg'),
(93, 'bd40e7be8467f9653bda807325f6bada.jpg'),
(94, 'a66dbc272a03a19298029c725c20bb6f.jpg'),
(94, '0a705bbf8da518643dc42b373f4a9f1b.jpg'),
(94, '0f021fc48cc1d96e063b0d49768b8b49.jpg'),
(94, '6cb77de1e37be0da88791340511d17c6.jpg'),
(95, '256c6a5c8ae9589c6611e0220d7f1a9e.jpg'),
(95, '8a0b2c8f90d62bd2d8251b36de06e450.jpg'),
(95, 'fa0a19c23401f33ed89e75a640c6aa16.jpg'),
(96, 'd50ab39b53ee6f75a9ae8e70a0179f84.jpg'),
(96, '589aa963581ef395f9433a6ca5c4e507.jpg'),
(96, '6118945870d68a7623928b803340e83a.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `messages` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `name`, `phone`, `email`, `messages`) VALUES
(1, 'moaz', '89778757', 'moaz@mail.com', 'new message'),
(2, 'ahmed', '0102020343', 'ahmed@mail.com', 'problem');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(200) NOT NULL,
  `sale` varchar(255) NOT NULL,
  `stock` int(200) NOT NULL,
  `img` varchar(255) NOT NULL,
  `cat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `sale`, `stock`, `img`, `cat_id`) VALUES
(1, 'iphone', 12000, '1000', 10, '79086dff4691032a9939d6e6860de546.jpg', 2),
(2, 'Iphone X', 15000, '1000', 10, '656c459fa88bcbceac039b376ce06ea6.jpg', 2),
(3, 'Jacket', 600, '50', 5, '3380eba072be5d37b84a34ae86b91d10.jpg', 3),
(4, 'HP', 12000, '500', 5, '70a1e85a2b6d83b9ef159f7e722208ad.jpg', 1),
(5, 'Dell', 16000, '1000', 8, '9dda581fb491aebb6331503efaebeb9f.jpg', 1),
(6, 'Jaket', 500, '50', 5, '19a515a1471c39756d2c6f35a69a3a08.jpg', 3),
(7, 'Oppo F19', 6000, '200', 10, 'c371e94ea888a50707c7b1de2eebe4b5.jpg', 2),
(8, 'HP PC', 9000, '400', 20, '77ccc10d0ce479cbaa47109448e74619.jpg', 1),
(11, 'Phone', 10000, '1000', 5, 'f9ea037e5bbb8115f9d4760b073827c3.jpg', 2),
(12, 'PC', 30000, '2000', 4, 'f714fe058459358905e96bad2fb7c53e.jpg', 1),
(13, 'Sports T-Shirt ', 700, '50', 10, '445a0b5898ce419d99e96bb49c415216.jpg', 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `gender` tinyint(4) NOT NULL,
  `priv` tinyint(3) NOT NULL,
  `registered_at` datetime NOT NULL DEFAULT current_timestamp(),
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `address`, `gender`, `priv`, `registered_at`, `token`) VALUES
(1, 'Moaz', 'moaz@mail.com', '202cb962ac59075b964b07152d234b70', 'Mansoura', 0, 0, '2024-12-03 16:43:00', ''),
(2, 'Ahmed', 'ahmed@mail.com', '250cf8b51c773f3f8dc8b4be867a9a02', 'Tanta', 0, 1, '2024-12-03 16:43:00', ''),
(3, 'Eman', 'eman@mail.com', '310dcbbf4cce62f762a2aaa148d556bd', 'cairo', 1, 2, '2025-01-21 00:58:40', ''),
(4, 'Reem', 'reem@mail.com', '698d51a19d8a121ce581499d7b701668', 'mansoura', 1, 3, '2025-01-21 02:12:42', ''),
(5, 'malek', 'malek@gmail.com', '698d51a19d8a121ce581499d7b701668', 'mansoura', 0, 3, '2025-05-19 18:57:32', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pro_id` (`pro_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD KEY `pro_id` (`pro_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`pro_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
