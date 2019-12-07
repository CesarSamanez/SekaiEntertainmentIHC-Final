-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2019 at 03:33 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `system2`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `categories_id` int(11) NOT NULL,
  `name` varchar(80) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `stock` int(11) NOT NULL DEFAULT 0,
  `price` decimal(11,2) NOT NULL,
  `purchase_price` decimal(11,2) NOT NULL,
  `sold` int(11) NOT NULL,
  `box_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `categories_id`, `name`, `description`, `image`, `stock`, `price`, `purchase_price`, `sold`, `box_quantity`) VALUES
(1, 1, 'Gaseosa KR Naranja', 'kr naranja', 'kr_naranja.jpg', 8, '5.00', '4.00', 0, 6),
(2, 1, 'Cerveza Arequipena', 'cerveza', NULL, 3, '10.00', '10.00', 5, 0),
(3, 1, 'jugo', '', NULL, 8, '10.00', '12.00', 2, 0),
(4, 1, 'caja cerveza', 'cerveza aqp', NULL, 1, '10.00', '10.00', 0, 0),
(5, 1, 'dsad', '123', NULL, 0, '2.00', '0.00', 0, 0),
(8, 1, 'Coca Cola', 'coca cola x litros', 'cocacola.jpg', 0, '10.00', '0.00', 0, 0),
(10, 2, 'Casino de Chocolate', 'Galletas casino, pero de chocolate :0', 'casino_chocolate.jpg', 9, '2.00', '1.00', 0, 0),
(11, 2, 'Casino de Menta', 'Galletas casino, pero de menta :0', 'casino_menta.jpg', 6, '2.00', '1.00', 0, 6),
(12, 2, 'ChocoSoda', 'Galleta de Chocolate', 'th5-640x426-38990.jpg', 15, '1.50', '1.60', 0, 2),
(13, 1, 'mhjkh', 'kjlkklj', NULL, 15, '213.00', '0.00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `a_dmad_social_auth_phinxlog`
--

CREATE TABLE `a_dmad_social_auth_phinxlog` (
  `version` bigint(20) NOT NULL,
  `migration_name` varchar(100) DEFAULT NULL,
  `start_time` timestamp NULL DEFAULT NULL,
  `end_time` timestamp NULL DEFAULT NULL,
  `breakpoint` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `a_dmad_social_auth_phinxlog`
--

INSERT INTO `a_dmad_social_auth_phinxlog` (`version`, `migration_name`, `start_time`, `end_time`, `breakpoint`) VALUES
(20170418000000, 'CreateSocialProfiles', '2019-12-06 23:03:33', '2019-12-06 23:03:34', 0);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(80) NOT NULL,
  `description` text NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `created`) VALUES
(1, 'Bebidas', 'Gaseosas, jugos, cerveza, etc.', '2019-08-19 22:10:23'),
(2, 'Galletas', 'Galletas\r\n', '2019-08-24 22:59:09');

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` decimal(11,2) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`id`, `quantity`, `total`, `date`) VALUES
(1, 0, '120.00', '2019-08-19 18:53:42'),
(2, 0, '2.00', '2019-08-20 17:29:31'),
(3, 0, '15.00', '2019-11-20 11:16:19');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_details`
--

CREATE TABLE `purchase_details` (
  `id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `purchase_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` decimal(11,2) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `purchase_details`
--

INSERT INTO `purchase_details` (`id`, `article_id`, `purchase_id`, `quantity`, `total`, `date`) VALUES
(1, 2, 1, 12, '120.00', '2019-08-19 18:53:42'),
(2, 1, 3, 1, '5.00', '2019-11-20 11:16:19'),
(3, 4, 3, 1, '10.00', '2019-11-20 11:16:20');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `total` decimal(11,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `users_id`, `total`, `quantity`, `date`) VALUES
(1, 1, '4.00', 10, '2019-08-19 18:51:36'),
(2, 2, '2.00', 10, '2019-08-19 19:08:15'),
(3, 1, '20.00', 0, '2019-08-23 20:29:07'),
(4, 1, '40.00', 0, '2019-08-23 20:30:32'),
(5, 1, '30.00', 0, '2019-08-23 20:32:01'),
(6, 1, '40.00', 0, '2019-08-23 20:32:34'),
(7, 1, '122.00', 0, '2019-11-27 07:49:30'),
(8, 1, '65.00', 0, '2019-12-06 16:25:55'),
(9, 1, '42.00', 0, '2019-12-06 16:28:08');

-- --------------------------------------------------------

--
-- Table structure for table `sale_details`
--

CREATE TABLE `sale_details` (
  `id` int(11) NOT NULL,
  `articles_id` int(11) NOT NULL,
  `sales_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` decimal(11,2) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sale_details`
--

INSERT INTO `sale_details` (`id`, `articles_id`, `sales_id`, `quantity`, `total`, `date`) VALUES
(1, 1, 1, 2, '4.00', '2019-08-19 18:50:15'),
(3, 1, 2, 1, '2.00', '2019-08-19 19:08:15'),
(4, 2, 3, 2, '20.00', '2019-08-23 20:29:07'),
(5, 3, 4, 4, '40.00', '2019-08-23 20:30:32'),
(6, 3, 5, 3, '30.00', '2019-08-23 20:32:02'),
(7, 2, 6, 4, '40.00', '2019-08-23 20:32:35'),
(8, 5, 7, 1, '2.00', '2019-11-27 07:49:31'),
(9, 8, 7, 12, '120.00', '2019-11-27 07:49:31'),
(10, 1, 8, 3, '15.00', '2019-12-06 16:25:55'),
(11, 2, 8, 3, '30.00', '2019-12-06 16:25:55'),
(12, 3, 8, 2, '20.00', '2019-12-06 16:25:56'),
(13, 1, 9, 2, '10.00', '2019-12-06 16:28:08'),
(14, 3, 9, 3, '30.00', '2019-12-06 16:28:08'),
(15, 10, 9, 1, '2.00', '2019-12-06 16:28:08');

-- --------------------------------------------------------

--
-- Table structure for table `social_profiles`
--

CREATE TABLE `social_profiles` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `provider` varchar(255) NOT NULL,
  `access_token` blob NOT NULL,
  `identifier` varchar(255) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `birth_date` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `picture_url` varchar(255) DEFAULT NULL,
  `email_verified` tinyint(1) NOT NULL DEFAULT 0,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `social_profiles`
--

INSERT INTO `social_profiles` (`id`, `user_id`, `provider`, `access_token`, `identifier`, `username`, `first_name`, `last_name`, `full_name`, `email`, `birth_date`, `gender`, `picture_url`, `email_verified`, `created`, `modified`) VALUES
(1, NULL, 'google', 0x4f3a33323a22536f6369616c436f6e6e6563745c4f41757468325c416363657373546f6b656e223a333a7b733a383a22002a00746f6b656e223b733a3133353a22796132392e496c2d30423170746d5933314a304f5847412d5f5a74376b7570414b636a775452497864684c443239715a306930323958593048616e633263416241335a4c30747142644b3545766931567969386b4c3752706e534e542d6d3666695531474b3245304331724b3936364c664d35516c617473746f4961614b534a542d4e4b416467223b733a31303a22002a0065787069726573223b693a313537353636343231303b733a363a22002a00756964223b4e3b7d, '100224936079198143054', NULL, 'ARMANDO JORGE', 'LOPEZ ESPINOZA', 'ARMANDO JORGE LOPEZ ESPINOZA', 'alopeze@unsa.edu.pe', NULL, NULL, 'https://lh6.googleusercontent.com/-vNfUSRZkEUU/AAAAAAAAAAI/AAAAAAAAAAA/ACHi3rcsCfy7LMqmKRMz3pbDFILI2q-GEg/photo.jpg', 1, '2019-12-06 19:30:11', '2019-12-06 19:30:11'),
(2, NULL, 'google', 0x4f3a33323a22536f6369616c436f6e6e6563745c4f41757468325c416363657373546f6b656e223a333a7b733a383a22002a00746f6b656e223b733a3133353a22796132392e496c2d3042396c68514857796654527a305f4477375847325f4a673134744272514c7737797a5143685f50785f30754a735949774c72383636733957594a435166485159327453767834565434563933316b503356436a705a41335665687238645f615276722d7379583675736b7034673154443644425a436f534a436930596c51223b733a31303a22002a0065787069726573223b693a313537353636373237303b733a363a22002a00756964223b4e3b7d, '113326363886391749830', NULL, 'JHONATAN JESUS', 'ACUNA HUISACAYNA', 'JHONATAN JESUS ACUNA HUISACAYNA', 'jacuna@unsa.edu.pe', NULL, NULL, 'https://lh6.googleusercontent.com/-4vhzasm13C0/AAAAAAAAAAI/AAAAAAAAAAA/ACHi3reItR9ASXgIndHxd9Q8fqmJXGZAEw/photo.jpg', 1, '2019-12-06 20:21:11', '2019-12-06 20:21:11'),
(3, NULL, 'facebook', 0x4f3a33323a22536f6369616c436f6e6e6563745c4f41757468325c416363657373546f6b656e223a333a7b733a383a22002a00746f6b656e223b733a3137373a224541416b37486a57494d456342414d34704b73346d50794c4166666b685a4359335039536f6c326c326151784c7658624d43634f36534a714c696d6c4e50315871593137374b74506f70524447797742354a42576a7042646f65464966614f4c6a766c5a426a64306558676f3131445a436c4c6b5247453757785a41683356534b6d535a41516162467a337a6c335a414752674f34627a527a4e774c6675764a756b7a79454f417650493272515a445a44223b733a31303a22002a0065787069726573223b693a313538303835313234373b733a363a22002a00756964223b4e3b7d, '555576545296672', NULL, NULL, NULL, NULL, 'alopeze@unsa.edu.pe', NULL, NULL, NULL, 1, '2019-12-06 21:20:50', '2019-12-06 21:20:50');

-- --------------------------------------------------------

--
-- Table structure for table `tables`
--

CREATE TABLE `tables` (
  `id` int(11) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `total_uses` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tables`
--

INSERT INTO `tables` (`id`, `price`, `status`, `date`, `total_uses`) VALUES
(1, '4.00', 1, '2019-08-18 22:00:00', 2),
(2, '4.00', 1, '2019-08-18 22:00:27', 0),
(3, '3.50', 1, '2019-08-18 22:00:40', 0),
(4, '3.50', 1, '2019-08-18 22:00:53', 0),
(5, '4.00', 1, '2019-08-19 18:35:03', 0);

-- --------------------------------------------------------

--
-- Table structure for table `table_uses`
--

CREATE TABLE `table_uses` (
  `id` int(11) NOT NULL,
  `tables_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `time` time NOT NULL,
  `total` decimal(8,2) NOT NULL,
  `total_neto` decimal(8,2) NOT NULL,
  `initial_date` datetime NOT NULL,
  `final_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `table_uses`
--

INSERT INTO `table_uses` (`id`, `tables_id`, `users_id`, `time`, `total`, `total_neto`, `initial_date`, `final_date`) VALUES
(1, 1, 1, '00:05:09', '10.00', '0.00', '2019-08-19 15:55:28', '2019-08-19 16:00:37'),
(2, 1, 1, '00:00:20', '43.00', '0.00', '2019-08-19 16:05:34', '2019-08-19 16:05:54'),
(3, 2, 1, '00:41:05', '2.46', '0.00', '2019-08-19 16:24:34', '2019-08-19 17:05:39'),
(4, 3, 1, '00:03:20', '0.18', '0.00', '2019-08-19 18:36:51', '2019-08-19 18:40:11'),
(5, 2, 1, '00:40:03', '0.00', '0.00', '2019-08-19 19:17:13', '2019-08-19 19:57:17'),
(6, 1, 1, '00:45:00', '2.70', '0.00', '2019-08-19 19:12:26', '2019-08-19 19:57:27'),
(7, 3, 1, '00:25:11', '1.45', '0.00', '2019-08-21 14:45:03', '2019-08-21 15:10:14'),
(8, 2, 1, '01:17:33', '0.00', '0.00', '2019-08-21 14:32:07', '2019-08-21 15:49:40'),
(9, 1, 1, '00:01:35', '0.00', '0.00', '2019-08-21 16:03:25', '2019-08-21 16:05:00'),
(10, 4, 1, '00:06:01', '0.29', '0.00', '2019-08-21 19:50:02', '2019-08-21 19:56:04'),
(11, 2, 1, '00:07:45', '0.00', '0.00', '2019-08-21 19:50:10', '2019-08-21 19:57:55'),
(12, 1, 1, '00:00:07', '0.00', '0.00', '2019-08-21 19:58:24', '2019-08-21 19:58:31'),
(13, 1, 1, '21:26:10', '85.14', '0.00', '2019-08-21 00:00:00', '2019-08-21 21:26:10'),
(14, 5, 1, '00:15:09', '1.32', '0.00', '2019-08-21 21:19:05', '2019-08-21 21:34:15'),
(15, 4, 1, '00:06:01', '0.58', '0.00', '2019-08-22 17:46:53', '2019-08-22 17:52:54'),
(16, 1, 1, '00:00:20', '0.33', '0.00', '2019-08-23 19:36:29', '2019-08-23 19:36:49'),
(17, 1, 1, '00:00:09', '0.33', '0.00', '2019-08-23 19:42:09', '2019-08-23 19:42:18'),
(18, 1, 1, '00:00:28', '0.50', '0.00', '2019-08-23 19:42:34', '2019-08-23 19:43:02');

-- --------------------------------------------------------

--
-- Table structure for table `temporal_uses`
--

CREATE TABLE `temporal_uses` (
  `id` int(11) NOT NULL,
  `tables_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `date` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `temporal_uses`
--

INSERT INTO `temporal_uses` (`id`, `tables_id`, `status`, `date`) VALUES
(1, 1, 0, '2019-08-23 19:43:02'),
(2, 2, 0, '2019-08-21 19:57:55'),
(3, 3, 0, '2019-08-21 15:10:14'),
(4, 4, 0, '2019-08-22 17:52:54'),
(5, 5, 0, '2019-08-21 21:34:14');

-- --------------------------------------------------------

--
-- Table structure for table `timbas`
--

CREATE TABLE `timbas` (
  `id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `total_uses` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timbas`
--

INSERT INTO `timbas` (`id`, `status`, `date`, `total_uses`) VALUES
(1, 1, '2019-08-18 21:54:37', 2),
(2, 1, '2019-08-18 21:54:54', 0);

-- --------------------------------------------------------

--
-- Table structure for table `timba_temporal_uses`
--

CREATE TABLE `timba_temporal_uses` (
  `id` int(11) NOT NULL,
  `timbas_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timba_temporal_uses`
--

INSERT INTO `timba_temporal_uses` (`id`, `timbas_id`, `status`, `date`) VALUES
(1, 1, 0, '2019-08-23 20:02:22'),
(2, 2, 0, '2019-08-22 17:39:14');

-- --------------------------------------------------------

--
-- Table structure for table `timba_uses`
--

CREATE TABLE `timba_uses` (
  `id` int(11) NOT NULL,
  `timbas_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `people` int(11) NOT NULL,
  `time` time NOT NULL,
  `total` decimal(10,2) DEFAULT 0.00,
  `initial_date` datetime NOT NULL,
  `final_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timba_uses`
--

INSERT INTO `timba_uses` (`id`, `timbas_id`, `users_id`, `people`, `time`, `total`, `initial_date`, `final_date`) VALUES
(1, 1, 1, 2, '00:00:19', '4.00', '2019-08-18 21:58:55', '2019-08-18 21:59:14'),
(2, 2, 1, 2, '00:00:34', '0.02', '2019-08-19 15:43:33', '2019-08-19 15:44:07'),
(3, 1, 1, 3, '01:33:31', '5.61', '2019-08-19 17:08:18', '2019-08-19 18:41:49'),
(4, 1, 1, 8, '00:01:10', '0.14', '2019-08-20 09:09:26', '2019-08-20 09:10:36'),
(5, 1, 1, 5, '08:09:31', '39.16', '2019-08-20 09:28:38', '2019-08-20 17:38:10'),
(6, 2, 1, 6, '00:06:04', '6.00', '2019-08-21 20:49:19', '2019-08-21 20:55:23'),
(7, 1, 1, 7, '00:30:44', '7.00', '2019-08-21 20:25:55', '2019-08-21 20:56:39'),
(8, 2, 1, 3, '00:00:12', '3.00', '2019-08-21 21:00:10', '2019-08-21 21:00:22'),
(9, 2, 1, 4, '00:04:46', '4.00', '2019-08-22 17:34:28', '2019-08-22 17:39:14'),
(10, 1, 1, 5, '00:00:56', '5.00', '2019-08-23 19:34:20', '2019-08-23 19:35:16'),
(11, 1, 1, 4, '00:00:12', '4.00', '2019-08-23 19:35:44', '2019-08-23 19:35:56'),
(12, 1, 1, 3, '00:00:09', '3.00', '2019-08-23 19:36:04', '2019-08-23 19:36:13'),
(13, 1, 1, 4, '00:00:39', '4.00', '2019-08-23 19:45:24', '2019-08-23 19:46:03'),
(14, 1, 1, 4, '00:00:12', '4.00', '2019-08-23 20:02:10', '2019-08-23 20:02:22');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(80) NOT NULL,
  `last_name` varchar(80) NOT NULL,
  `dni` varchar(8) NOT NULL,
  `address` varchar(50) NOT NULL,
  `phone_number` varchar(9) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `function` tinyint(2) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `last_name`, `dni`, `address`, `phone_number`, `email`, `username`, `password`, `function`, `status`) VALUES
(1, 'Root', 'Root', '00000000', 'Sin Registros', '000000000', 'admin@gmail.com', 'admin', '$2y$10$dphx7X/euUOOPWh46.ieoeuePrCvtQB9Rhw58t596XULN89L8.Lge', 1, 1),
(2, 'Juan', 'Perez', '12345678', 'hsdca', '456789876', 'sacxhas@hotmail.com', 'juan', '$2y$10$IYyYI6pKcBLQ9ULBxLmXae/zjJ39SWrQ79DV5oM/Iy6RIPmBuO7.y', 0, 1),
(3, 'Cesar', 'Samanez', '72617455', 'Jr. Jorge Chavez, 212', '928656967', 'destroke21032000@gmail.com', 'destroke', '$2y$10$97jPesbMy7l7.Kd21N.D5Orl7JyM7/TkKT/9BTqqKue7yKfjd.N.u', 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_id` (`categories_id`);

--
-- Indexes for table `a_dmad_social_auth_phinxlog`
--
ALTER TABLE `a_dmad_social_auth_phinxlog`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_details`
--
ALTER TABLE `purchase_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `article_id` (`article_id`),
  ADD KEY `purchase_id` (`purchase_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_id` (`users_id`);

--
-- Indexes for table `sale_details`
--
ALTER TABLE `sale_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `articles_id` (`articles_id`),
  ADD KEY `sales_id` (`sales_id`);

--
-- Indexes for table `social_profiles`
--
ALTER TABLE `social_profiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tables`
--
ALTER TABLE `tables`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_uses`
--
ALTER TABLE `table_uses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tables_id` (`tables_id`),
  ADD KEY `users_id` (`users_id`);

--
-- Indexes for table `temporal_uses`
--
ALTER TABLE `temporal_uses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tables_id` (`tables_id`);

--
-- Indexes for table `timbas`
--
ALTER TABLE `timbas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `timba_temporal_uses`
--
ALTER TABLE `timba_temporal_uses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `timbas_id` (`timbas_id`);

--
-- Indexes for table `timba_uses`
--
ALTER TABLE `timba_uses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `timba_id` (`timbas_id`),
  ADD KEY `users_id` (`users_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `purchase_details`
--
ALTER TABLE `purchase_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `sale_details`
--
ALTER TABLE `sale_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `social_profiles`
--
ALTER TABLE `social_profiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tables`
--
ALTER TABLE `tables`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `table_uses`
--
ALTER TABLE `table_uses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `temporal_uses`
--
ALTER TABLE `temporal_uses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `timbas`
--
ALTER TABLE `timbas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `timba_temporal_uses`
--
ALTER TABLE `timba_temporal_uses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `timba_uses`
--
ALTER TABLE `timba_uses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`categories_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `purchase_details`
--
ALTER TABLE `purchase_details`
  ADD CONSTRAINT `purchase_details_ibfk_1` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`),
  ADD CONSTRAINT `purchase_details_ibfk_2` FOREIGN KEY (`purchase_id`) REFERENCES `purchases` (`id`);

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `sale_details`
--
ALTER TABLE `sale_details`
  ADD CONSTRAINT `sale_details_ibfk_2` FOREIGN KEY (`sales_id`) REFERENCES `sales` (`id`),
  ADD CONSTRAINT `sale_details_ibfk_3` FOREIGN KEY (`articles_id`) REFERENCES `articles` (`id`);

--
-- Constraints for table `table_uses`
--
ALTER TABLE `table_uses`
  ADD CONSTRAINT `table_uses_ibfk_1` FOREIGN KEY (`tables_id`) REFERENCES `tables` (`id`),
  ADD CONSTRAINT `table_uses_ibfk_2` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `temporal_uses`
--
ALTER TABLE `temporal_uses`
  ADD CONSTRAINT `temporal_uses_ibfk_1` FOREIGN KEY (`tables_id`) REFERENCES `tables` (`id`);

--
-- Constraints for table `timba_temporal_uses`
--
ALTER TABLE `timba_temporal_uses`
  ADD CONSTRAINT `timba_temporal_uses_ibfk_1` FOREIGN KEY (`timbas_id`) REFERENCES `timbas` (`id`);

--
-- Constraints for table `timba_uses`
--
ALTER TABLE `timba_uses`
  ADD CONSTRAINT `timba_uses_ibfk_1` FOREIGN KEY (`timbas_id`) REFERENCES `timbas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `timba_uses_ibfk_2` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
