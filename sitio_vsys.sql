-- phpMyAdmin SQL Dump
-- version 4.6.3
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 30-12-2016 a las 17:25:55
-- Versión del servidor: 5.5.51
-- Versión de PHP: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sitio_vsys`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `candidatos`
--

CREATE TABLE `candidatos` (
  `id_candidato` int(11) NOT NULL,
  `id_vacante` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `apellidos` varchar(60) NOT NULL,
  `direccion` varchar(250) NOT NULL,
  `telefono_local` varchar(10) NOT NULL,
  `celular` varchar(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `CURP` varchar(20) NOT NULL,
  `ruta_cv` varchar(250) NOT NULL,
  `id_status` int(11) NOT NULL,
  `id_tag` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `candidatos`
--

INSERT INTO `candidatos` (`id_candidato`, `id_vacante`, `nombre`, `apellidos`, `direccion`, `telefono_local`, `celular`, `email`, `CURP`, `ruta_cv`, `id_status`, `id_tag`) VALUES
(1, 1, 'Victor', 'Valdez', 'Izcalli San Pablo', '10396217', '5568043455', 'elvitorvaldez@gmail.com', '', 'DCIN_ATR_A1_VIVG.pdf', 0, ''),
(2, 1, 'Virginia', 'De la Garza', 'Pradera', '12344567', '334455667788', 'kagandahan_programista@hotmail.com', '', 'DBDD_U1_A4_VIVG.pdf', 0, ''),
(3, 1, 'Vica', 'Paleta', 'Fco de P Miranda', '10396217', '5568043455', 'vicapaleta@hotmail.com', '', 'DBDD_U1_A4_VIVG.pdf', 0, ''),
(4, 1, 'Victor David', 'Guerrero', 'Plateros', '10396217', '5568043455', 'davidgro1982@gtmail.com', 'VAGV820829HMCLRC06', '20161121-20894802.pdf', 0, ''),
(5, 1, 'Thonancy', 'Garnacha', 'Alfonso XIII', '55667788', '5566778890', 'lagarnacha@gmail.com', 'lagarnacha1234', 'curriculum garnacha.pdf', 0, ''),
(6, 1, 'Thonancy', 'Garnacha', 'Alfonso XIII', '55667788', '5566778890', 'lagarnacha@gmail.com', 'lagarnacha1234', 'curriculum garnacha.pdf', 0, ''),
(7, 1, 'Bianca Celenith', 'Esquer Buitimea', 'Astrónomos  62', '0155384930', '015538493099', 'myry87_7@hotmail.com', 'EUBB870307TQ8', '1S2016.pdf', 0, ''),
(8, 1, 'Bianca Celenith', 'Esquer Buitimea', 'Astrónomos  62', '0155384930', '015538493099', 'myry87_7@hotmail.com', 'EUBB870307TQ8', '1S2016.pdf', 0, ''),
(9, 1, 'Bianca Celenith', 'Esquer Buitimea', 'Astrónomos  62', '0155384930', '015538493099', 'myry87_7@hotmail.com', 'EUBB870307TQ8', 'CV Antonio Castillo.pdf', 0, ''),
(10, 1, 'Bianca Celenith', 'Esquer Buitimea', 'Astrónomos  62', '0155384930', '015538493099', 'myry87_7@hotmail.com', 'EUBB870307TQ8', 'CV Antonio Castillo.pdf', 0, ''),
(11, 1, 'Bianca Celenith', 'Esquer Buitimea', 'Astrónomos  62', '0155384930', '015538493099', 'myry87_7@hotmail.com', 'EUBB870307TQ8', 'CV Antonio Castillo.pdf', 0, ''),
(12, 1, 'Bianca Celenith', 'Esquer Buitimea', 'Astrónomos  62', '0155384930', '015538493099', 'myry87_7@hotmail.com', 'EUBB870307MSRSTN00', '1S2016.pdf', 0, ''),
(13, 1, 'Bianca Celenith', 'Esquer Buitimea', 'Astrónomos  62', '0155384930', '015538493099', 'myry87_7@hotmail.com', 'EUBB870307MSRSTN17', '1S2016.pdf', 0, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_status`
--

CREATE TABLE `cat_status` (
  `id_status` int(11) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_tags`
--

CREATE TABLE `cat_tags` (
  `id_tag` int(11) NOT NULL,
  `tag` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_tipo_vacante`
--

CREATE TABLE `cat_tipo_vacante` (
  `id_tipo_vacante` int(11) NOT NULL,
  `descripcion` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cat_tipo_vacante`
--

INSERT INTO `cat_tipo_vacante` (`id_tipo_vacante`, `descripcion`) VALUES
(1, 'Bolsa de trabajo'),
(2, 'Becario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `ultimoAcceso` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vacantes`
--

CREATE TABLE `vacantes` (
  `id_vacante` int(11) NOT NULL,
  `puesto` varchar(50) NOT NULL,
  `escolaridad` varchar(100) NOT NULL,
  `experiencia` varchar(250) NOT NULL,
  `sueldo` varchar(50) NOT NULL,
  `horario` varchar(50) NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  `cubierto` tinyint(1) NOT NULL,
  `tipo_vacante` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `vacantes`
--

INSERT INTO `vacantes` (`id_vacante`, `puesto`, `escolaridad`, `experiencia`, `sueldo`, `horario`, `descripcion`, `cubierto`, `tipo_vacante`) VALUES
(1, 'Desarrollador Php', 'Ingeniería en sistemas o afín', 'Trabajo bajo presión', '15,000', '9 am a 7 pm', 'Desarrollo web', 0, 0),
(2, 'Analista Documentador', 'Licenciatura', 'Ninguna', '1', '13', 'Ninguna', 0, 0),
(3, 'Analista Documentador', 'Licenciatura', 'Ninguna', '1', '13', 'Ninguna', 0, 0),
(4, 'Analista Documentador', 'Licenciatura', 'Ninguna', '1', '13', 'Ninguna', 0, 0),
(5, 'Analista Documentador', 'Licenciatura', 'Ninguna', '1', '13', 'Ninguna', 0, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `candidatos`
--
ALTER TABLE `candidatos`
  ADD PRIMARY KEY (`id_candidato`);

--
-- Indices de la tabla `cat_status`
--
ALTER TABLE `cat_status`
  ADD PRIMARY KEY (`id_status`);

--
-- Indices de la tabla `cat_tags`
--
ALTER TABLE `cat_tags`
  ADD PRIMARY KEY (`id_tag`);

--
-- Indices de la tabla `cat_tipo_vacante`
--
ALTER TABLE `cat_tipo_vacante`
  ADD PRIMARY KEY (`id_tipo_vacante`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Indices de la tabla `vacantes`
--
ALTER TABLE `vacantes`
  ADD PRIMARY KEY (`id_vacante`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `candidatos`
--
ALTER TABLE `candidatos`
  MODIFY `id_candidato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de la tabla `cat_status`
--
ALTER TABLE `cat_status`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `cat_tags`
--
ALTER TABLE `cat_tags`
  MODIFY `id_tag` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `cat_tipo_vacante`
--
ALTER TABLE `cat_tipo_vacante`
  MODIFY `id_tipo_vacante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `vacantes`
--
ALTER TABLE `vacantes`
  MODIFY `id_vacante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
