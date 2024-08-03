-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-08-2024 a las 21:20:19
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `rocajed`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cart`
--

CREATE TABLE `cart` (
  `ct_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `s_id` int(11) NOT NULL,
  `f_id` int(11) NOT NULL,
  `ct_amount` int(11) NOT NULL,
  `ct_note` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cart`
--

INSERT INTO `cart` (`ct_id`, `c_id`, `s_id`, `f_id`, `ct_amount`, `ct_note`) VALUES
(105, 23, 2, 36, 1, ''),
(106, 22, 2, 36, 1, ''),
(107, 19, 3, 22, 1, 'sin cebolla');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `customer`
--

CREATE TABLE `customer` (
  `c_id` int(11) NOT NULL,
  `c_username` varchar(45) NOT NULL,
  `c_pwd` varchar(45) NOT NULL,
  `c_firstname` varchar(45) NOT NULL,
  `c_lastname` varchar(45) NOT NULL,
  `c_email` varchar(100) NOT NULL,
  `c_gender` varchar(1) NOT NULL COMMENT 'M for Male, F for Female',
  `c_type` varchar(3) NOT NULL COMMENT 'Type of customer in this canteen (STD for student, INS for instructor, STF for staff, GUE for guest, ADM for admin, OTH for other)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `customer`
--

INSERT INTO `customer` (`c_id`, `c_username`, `c_pwd`, `c_firstname`, `c_lastname`, `c_email`, `c_gender`, `c_type`) VALUES
(2, 'keerthi', 'keerthi', 'keerthi', 'G', 'keerthi@gmail.com', 'F', 'STD'),
(3, 'magesh', '123', 'Magesh', 'K', 'magesh@gmail.com', 'M', 'STD'),
(4, 'ignacio', '12345678', 'IgnacioG', 'gimenez', 'ignaciogigimenez@gmail.com', 'M', 'ADM'),
(11, 'selva', '123', 'Selva', 'Narayanan', 'someone@email.com', 'N', 'GUE'),
(16, 'Selvanarayanan', '123', 'Selvanarayanan', 'A', 'selva@gmail.com', 'M', 'STD'),
(19, 'angel', '11111111', 'dharani', 'son', 'angel@gmail.com', 'M', 'GUE'),
(20, 'johndoe', '123', 'John', 'G', 'john@gmail.com', 'F', 'STF'),
(22, 'armando', '12345678', 'duarte', 'jose', 'armando13duarte@gmail.com', 'M', 'STD'),
(23, 'anelD', '12345678', 'anel', 'duarte', 'anel4duarte@gmail.com', 'M', 'STF'),
(24, 'antonio', '12345678', 'tony', 'montana', 'tony@gmail.com', 'M', 'TAS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `food`
--

CREATE TABLE `food` (
  `f_id` int(11) NOT NULL,
  `s_id` int(11) NOT NULL,
  `f_name` varchar(100) NOT NULL,
  `f_price` decimal(6,2) NOT NULL,
  `f_todayavail` tinyint(4) NOT NULL DEFAULT 1 COMMENT 'Food is available to order or not',
  `f_preorderavail` tinyint(4) NOT NULL DEFAULT 1,
  `f_pic` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `food`
--

INSERT INTO `food` (`f_id`, `s_id`, `f_name`, `f_price`, `f_todayavail`, `f_preorderavail`, `f_pic`) VALUES
(12, 2, 'Chicken Biryani', 90.00, 1, 1, '12_2.jpg'),
(13, 2, 'Veg Fried Rice', 65.00, 1, 1, '13_2.jpg'),
(14, 2, 'Paneer Fried Rice', 75.00, 1, 1, '14_2.jpg'),
(15, 2, 'Chicken Noodles', 80.00, 1, 1, '15_2.jpg'),
(19, 2, 'Chappathi', 35.00, 1, 1, '19_2.jfif'),
(20, 2, 'Chicken Fried Rice', 85.00, 1, 1, '20_2.jpg'),
(22, 3, 'Chicken Biryani', 90.00, 1, 1, '22_3.jpg'),
(23, 3, 'Veg Fried Rice', 65.00, 1, 1, '23_3.jpg'),
(28, 3, 'Chappathi', 80.00, 1, 1, '28_3.jfif'),
(29, 3, 'Paneer Fried Rice', 75.00, 1, 1, '29_3.jpg'),
(30, 3, 'Chicken Fried Rice', 80.00, 1, 1, '30_3.jpg'),
(36, 2, 'Pizza Hawaiana', 225.00, 1, 1, '36_2.jpg'),
(37, 2, 'Pizza Mexicana', 225.00, 1, 1, '37_2.jpg'),
(38, 2, 'Pizza Pepperoni Grande', 250.00, 1, 1, '38_2.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `order_detail`
--

CREATE TABLE `order_detail` (
  `ord_id` int(11) NOT NULL,
  `orh_id` int(11) NOT NULL,
  `f_id` int(11) NOT NULL,
  `ord_amount` int(11) NOT NULL,
  `ord_buyprice` decimal(6,2) NOT NULL COMMENT 'To keep the snapshot of selected menu cost at the time of the purchase.',
  `ord_note` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `order_detail`
--

INSERT INTO `order_detail` (`ord_id`, `orh_id`, `f_id`, `ord_amount`, `ord_buyprice`, `ord_note`) VALUES
(25, 25, 28, 2, 40.00, 'sin queso'),
(26, 25, 22, 1, 30.00, 'sin queso');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `order_header`
--

CREATE TABLE `order_header` (
  `orh_id` int(11) NOT NULL,
  `orh_refcode` varchar(15) DEFAULT NULL,
  `c_id` int(11) NOT NULL,
  `s_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `orh_ordertime` timestamp NOT NULL DEFAULT current_timestamp(),
  `orh_pickuptime` datetime NOT NULL,
  `orh_orderstatus` varchar(10) NOT NULL,
  `orh_finishedtime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `order_header`
--

INSERT INTO `order_header` (`orh_id`, `orh_refcode`, `c_id`, `s_id`, `p_id`, `orh_ordertime`, `orh_pickuptime`, `orh_orderstatus`, `orh_finishedtime`) VALUES
(25, '202110290000025', 19, 3, 23, '2021-10-29 13:57:07', '2021-10-29 15:00:00', 'FNSH', '2024-08-02 23:53:37'),
(38, '202201030000038', 11, 2, 36, '2022-01-03 16:14:06', '2022-01-03 17:13:00', 'PREP', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `payment`
--

CREATE TABLE `payment` (
  `p_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `p_type` varchar(45) NOT NULL,
  `p_amount` decimal(7,2) NOT NULL,
  `p_detail` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `payment`
--

INSERT INTO `payment` (`p_id`, `c_id`, `p_type`, `p_amount`, `p_detail`) VALUES
(23, 19, 'CRDC', 30.00, 'Visa [*4242]'),
(25, 2, 'CRDC', 95.00, 'Visa [*2350]'),
(36, 11, 'CRDC', 90.00, 'Visa [*0403]'),
(38, 3, 'DBTC', 30.00, 'Visa [*6055]');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `shop`
--

CREATE TABLE `shop` (
  `s_id` int(11) NOT NULL,
  `s_username` varchar(45) NOT NULL,
  `s_pwd` varchar(45) NOT NULL,
  `s_name` varchar(100) NOT NULL,
  `s_location` varchar(100) NOT NULL,
  `s_openhour` time NOT NULL,
  `s_closehour` time NOT NULL,
  `s_status` tinyint(4) NOT NULL DEFAULT 1 COMMENT 'Shop ready for taking an order or not (True for open, False for close)',
  `s_preorderStatus` tinyint(4) NOT NULL DEFAULT 1 COMMENT 'Shop is ready for tomorrow pre-order or not',
  `s_email` varchar(100) NOT NULL,
  `s_phoneno` varchar(45) NOT NULL,
  `s_pic` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `shop`
--

INSERT INTO `shop` (`s_id`, `s_username`, `s_pwd`, `s_name`, `s_location`, `s_openhour`, `s_closehour`, `s_status`, `s_preorderStatus`, `s_email`, `s_phoneno`, `s_pic`) VALUES
(2, 'rocajed', '123', 'Pizzas Roca Jed', '129 Miguel Hidalgo OrientePetatlán, Gro. 40850 MX', '15:00:00', '23:00:00', 1, 1, 'ignaciogigimenez@gmail.com', '7581101303', 'shop1.jpg'),
(3, 'prueba', '123', 'Pizza PRUEBA', 'PRUEBA', '08:30:00', '16:00:00', 1, 1, 'siddha@gmail.com', '0901234567', 'shop2.jpg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`ct_id`),
  ADD KEY `fk_ct_c_idx` (`c_id`),
  ADD KEY `fk_ct_s_idx` (`s_id`),
  ADD KEY `fk_ct_f_idx` (`f_id`);

--
-- Indices de la tabla `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`c_id`),
  ADD UNIQUE KEY `c_username` (`c_username`),
  ADD UNIQUE KEY `c_email` (`c_email`);

--
-- Indices de la tabla `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`f_id`),
  ADD KEY `food_shop_s_id_idx` (`s_id`);

--
-- Indices de la tabla `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`ord_id`),
  ADD KEY `fk_orh_ord_idx` (`orh_id`),
  ADD KEY `fk_f_ord_idx` (`f_id`);

--
-- Indices de la tabla `order_header`
--
ALTER TABLE `order_header`
  ADD PRIMARY KEY (`orh_id`),
  ADD KEY `fk_orh_idx` (`c_id`),
  ADD KEY `fk_s_orh_idx` (`s_id`),
  ADD KEY `fk_p_orh_idx` (`p_id`);

--
-- Indices de la tabla `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`p_id`),
  ADD KEY `p_c_fk_idx` (`c_id`);

--
-- Indices de la tabla `shop`
--
ALTER TABLE `shop`
  ADD PRIMARY KEY (`s_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cart`
--
ALTER TABLE `cart`
  MODIFY `ct_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT de la tabla `customer`
--
ALTER TABLE `customer`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `food`
--
ALTER TABLE `food`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de la tabla `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `ord_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT de la tabla `order_header`
--
ALTER TABLE `order_header`
  MODIFY `orh_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `payment`
--
ALTER TABLE `payment`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `shop`
--
ALTER TABLE `shop`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `fk_ct_c` FOREIGN KEY (`c_id`) REFERENCES `customer` (`c_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_ct_f` FOREIGN KEY (`f_id`) REFERENCES `food` (`f_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_ct_s` FOREIGN KEY (`s_id`) REFERENCES `shop` (`s_id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `food`
--
ALTER TABLE `food`
  ADD CONSTRAINT `fk_food_shop_id` FOREIGN KEY (`s_id`) REFERENCES `shop` (`s_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `fk_f_ord` FOREIGN KEY (`f_id`) REFERENCES `food` (`f_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_orh_ord` FOREIGN KEY (`orh_id`) REFERENCES `order_header` (`orh_id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `order_header`
--
ALTER TABLE `order_header`
  ADD CONSTRAINT `fk_c_orh` FOREIGN KEY (`c_id`) REFERENCES `customer` (`c_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_s_orh` FOREIGN KEY (`s_id`) REFERENCES `shop` (`s_id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `fk_p_c` FOREIGN KEY (`c_id`) REFERENCES `customer` (`c_id`) ON DELETE CASCADE;
COMMIT;

SET GLOBAL sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''));

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
pizzapizzacustomercart