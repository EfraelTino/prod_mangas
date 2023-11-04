-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-11-2023 a las 17:06:34
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `inigmai`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `capitulo`
--

CREATE TABLE `capitulo` (
  `id_cap` int(11) NOT NULL,
  `nombre_cap` varchar(120) NOT NULL,
  `link_ref` varchar(120) NOT NULL,
  `info_cap` int(120) NOT NULL,
  `file_cap` varchar(120) NOT NULL,
  `serie_id` int(11) NOT NULL,
  `cantidad_editor` int(11) NOT NULL,
  `cantidad_corrector` int(11) NOT NULL,
  `cantidad_desensurador` int(11) NOT NULL,
  `cantidad_limpieza` int(11) NOT NULL,
  `cantidad_rh` int(11) NOT NULL,
  `cantidad_traductor` int(11) NOT NULL,
  `monto_corrector` decimal(11,0) NOT NULL,
  `monto_desensurador` decimal(11,0) NOT NULL,
  `monto_editor` decimal(11,0) NOT NULL,
  `monto_limpieza` decimal(11,0) NOT NULL,
  `monto_rh` decimal(11,0) NOT NULL,
  `monto_traductor` decimal(11,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `capitulo`
--

INSERT INTO `capitulo` (`id_cap`, `nombre_cap`, `link_ref`, `info_cap`, `file_cap`, `serie_id`, `cantidad_editor`, `cantidad_corrector`, `cantidad_desensurador`, `cantidad_limpieza`, `cantidad_rh`, `cantidad_traductor`, `monto_corrector`, `monto_desensurador`, `monto_editor`, `monto_limpieza`, `monto_rh`, `monto_traductor`) VALUES
(1, 'asasdasd', 'asdasd', 0, 'Formato Mante impresoras 2023 ¿final versalink.xlsx.pdf', 21, 1, 2, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0),
(2, 'asasdasd', 'asdasd', 0, 'Formato Mante impresoras 2023 ¿final versalink.xlsx.pdf', 22, 1, 2, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0),
(3, 'asasdasd', 'asdasd', 0, 'Formato Mante impresoras 2023 ¿final versalink.xlsx.pdf', 23, 1, 2, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0),
(4, 'CAPITULO DE PRUEBA', 'asdasd', 0, 'INFORMES.pdf', 24, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `corrector`
--

CREATE TABLE `corrector` (
  `id` int(11) NOT NULL,
  `corrector_id` int(11) NOT NULL,
  `serie_id` int(11) NOT NULL,
  `cap_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `corrector`
--

INSERT INTO `corrector` (`id`, `corrector_id`, `serie_id`, `cap_id`) VALUES
(5, 1, 21, 0),
(6, 2, 21, 0),
(7, 1, 22, 0),
(8, 1, 23, 0),
(9, 2, 23, 0),
(10, 1, 24, 0),
(11, 2, 24, 0),
(12, 1, 25, 0),
(13, 2, 25, 0),
(14, 1, 21, 1),
(15, 2, 21, 1),
(16, 1, 21, 2),
(17, 2, 21, 2),
(18, 1, 21, 3),
(19, 2, 21, 3),
(20, 1, 21, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `desensurador`
--

CREATE TABLE `desensurador` (
  `id` int(11) NOT NULL,
  `desensurador_id` int(11) NOT NULL,
  `serie_id` int(11) NOT NULL,
  `cap_id` int(11) NOT NULL,
  `ganancia` decimal(11,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `desensurador`
--

INSERT INTO `desensurador` (`id`, `desensurador_id`, `serie_id`, `cap_id`, `ganancia`) VALUES
(3, 2, 21, 0, 0),
(4, 2, 22, 0, 0),
(5, 2, 23, 0, 0),
(6, 2, 24, 0, 0),
(7, 2, 21, 1, 0),
(8, 2, 21, 2, 0),
(9, 2, 21, 3, 0),
(10, 2, 21, 4, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `editores`
--

CREATE TABLE `editores` (
  `id` int(11) NOT NULL,
  `editor_id` int(11) NOT NULL,
  `serie_id` int(11) NOT NULL,
  `cap_id` int(11) NOT NULL,
  `ganancia` decimal(11,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `limpieza`
--

CREATE TABLE `limpieza` (
  `id` int(11) NOT NULL,
  `limpieza_id` int(11) NOT NULL,
  `serie_id` int(11) NOT NULL,
  `cap_id` int(11) NOT NULL,
  `ganancia` decimal(11,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rh`
--

CREATE TABLE `rh` (
  `id` int(11) NOT NULL,
  `rh_id` int(11) NOT NULL,
  `serie_id` int(11) NOT NULL,
  `cap_id` int(11) NOT NULL,
  `ganancia` decimal(11,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `roles` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `roles`) VALUES
(1, 'Editor'),
(2, 'Traductor'),
(3, 'Limpieza'),
(4, 'Raw Hunter'),
(5, 'Corrector'),
(6, 'Desensurador'),
(7, 'Súper Administrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `series`
--

CREATE TABLE `series` (
  `id` int(11) NOT NULL,
  `foto` varchar(120) NOT NULL,
  `nombre_de_la_serie` varchar(120) NOT NULL,
  `link_referencial` varchar(250) NOT NULL,
  `info_serie` varchar(250) NOT NULL,
  `presupuesto_editor` int(11) NOT NULL,
  `presupuesto_traductor` int(11) NOT NULL,
  `presupuesto_limpieza` int(11) NOT NULL,
  `presupuesto_rh` int(11) NOT NULL,
  `presupuesto_corrector` int(11) NOT NULL,
  `presupuesto_desensurador` int(11) NOT NULL,
  `fecha_salida` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `series`
--

INSERT INTO `series` (`id`, `foto`, `nombre_de_la_serie`, `link_referencial`, `info_serie`, `presupuesto_editor`, `presupuesto_traductor`, `presupuesto_limpieza`, `presupuesto_rh`, `presupuesto_corrector`, `presupuesto_desensurador`, `fecha_salida`) VALUES
(21, 'belleza.webp', 'SERIE DE PRUEBA', 'LINK DE PRUEBA', 'INFORMACION DE PRUEBA', 1, 1, 1, 1, 1, 1, ''),
(22, 'belleza.webp', 'SERIE 2', 'SERIE 2', 'SERIE 2', 1, 1, 1, 1, 1, 1, '24 Oct, 2023'),
(23, 'base_maquillaje.webp', 'serie 3', 'serie 3', 'serie 3', 1, 1, 1, 1, 1, 1, '29 Oct, 2023'),
(24, 'belleza.webp', 'serie 4 ', 'serie 4 ', 'serie 4 ', 1, 1, 1, 1, 1, 1, '24 Oct, 2023'),
(25, 'bolsa.jpg', 'serie de prueba 5', 'https://www.canva.com/', 'asdasdasd', 1, 2, 3, 4, 5, 6, '31 Oct, 2023');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `traductores`
--

CREATE TABLE `traductores` (
  `id` int(11) NOT NULL,
  `traductor_id` int(11) NOT NULL,
  `serie_id` int(11) NOT NULL,
  `cap_id` int(11) NOT NULL,
  `ganancia` decimal(11,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `userid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(120) NOT NULL,
  `img_profile` int(11) NOT NULL,
  `lastname` varchar(120) NOT NULL,
  `rol` int(11) NOT NULL,
  `metodo_pago` int(2) NOT NULL,
  `enlace_pago` varchar(120) NOT NULL,
  `enlace_telegram` varchar(180) NOT NULL,
  `ganancia` varchar(20) NOT NULL,
  `realizados` int(11) NOT NULL,
  `completados` int(11) NOT NULL,
  `telefono` int(11) NOT NULL,
  `genero` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`userid`, `name`, `username`, `password`, `img_profile`, `lastname`, `rol`, `metodo_pago`, `enlace_pago`, `enlace_telegram`, `ganancia`, `realizados`, `completados`, `telefono`, `genero`) VALUES
(1, 'Efrael', 'efrael2001@gmail.com', '123', 0, 'Villanueva', 4, 0, 'asdasd', 'asdasdasd', '123', 1, 1, 1123123123, 1),
(2, 'Usuario ', 'prueba@gmail.com', '123', 1, 'de prueva', 1, 1, 'asdasdasd', 'asdasd', '123123', 1, 2, 915068001, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_roles`
--

CREATE TABLE `usuarios_roles` (
  `id_general` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `rol_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `usuarios_roles`
--

INSERT INTO `usuarios_roles` (`id_general`, `usuario_id`, `rol_id`) VALUES
(1, 1, 5),
(2, 1, 7),
(3, 2, 5),
(4, 2, 6);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `capitulo`
--
ALTER TABLE `capitulo`
  ADD PRIMARY KEY (`id_cap`);

--
-- Indices de la tabla `corrector`
--
ALTER TABLE `corrector`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `desensurador`
--
ALTER TABLE `desensurador`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `editores`
--
ALTER TABLE `editores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `limpieza`
--
ALTER TABLE `limpieza`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `rh`
--
ALTER TABLE `rh`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `series`
--
ALTER TABLE `series`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `traductores`
--
ALTER TABLE `traductores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- Indices de la tabla `usuarios_roles`
--
ALTER TABLE `usuarios_roles`
  ADD PRIMARY KEY (`id_general`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `capitulo`
--
ALTER TABLE `capitulo`
  MODIFY `id_cap` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `corrector`
--
ALTER TABLE `corrector`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `desensurador`
--
ALTER TABLE `desensurador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `editores`
--
ALTER TABLE `editores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `limpieza`
--
ALTER TABLE `limpieza`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `rh`
--
ALTER TABLE `rh`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `series`
--
ALTER TABLE `series`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `traductores`
--
ALTER TABLE `traductores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios_roles`
--
ALTER TABLE `usuarios_roles`
  MODIFY `id_general` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
