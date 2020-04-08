-- ****************** SqlDBM: MySQL ******************;
-- ***************************************************;

CREATE DATABASE videogames_site;
USE videogames_site;


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `accesorios`
--

CREATE TABLE `accesorios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `precio` float NOT NULL COMMENT 'Precio por hora de uso'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Accesiorios adicionales en la renta de consolas. Mandos extras, audífonos, etc';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consolas`
--

CREATE TABLE `consolas` (
  `id` int(11) NOT NULL,
  `plataforma` varchar(45) NOT NULL,
  `numero` int(11) NOT NULL,
  `serial` varchar(255) DEFAULT NULL,
  `id_plataforma` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `consolas`
--

INSERT INTO `consolas` (`id`, `plataforma`, `numero`, `cobro`, `serial`) VALUES
(1, 'Play Station 4', 1, 40, 'PS4001'),
(2, 'Xbox One', 2, 70, 'XBX001'),
(3, 'Nintendo Wii', 3, 50, 'NWII001'),
(4, 'Nintendo 64', 4, 200, 'N64001'),
(5, 'Xbox 360', 5, 45, 'XBX36001'),
(6, 'Nintendo', 6, 20, 'NTNO001'),
(7, 'Play Station 3', 7, 30, 'PS3001'),
(8, 'Xbox One X', 8, 90, 'XBX002');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipos`
--

CREATE TABLE `equipos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `id_torneo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripciones_torneos`
--

CREATE TABLE `inscripciones_torneos` (
  `id` int(11) NOT NULL,
  `id_equipo` int(11) NOT NULL,
  `id_gamer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Tabla de intersección entre los jugadores/gamers  y los equipos para torneos';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `instalaciones`
--

CREATE TABLE `instalaciones` (
  `id` int(11) NOT NULL,
  `fecha` date NOT NULL COMMENT 'Se tomara la fecha actual del servidor.',
  `id_consola` int(11) NOT NULL,
  `id_juego` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Tabla de interseccion (consolas-juegos): Instalacion de un juego en una consola. Las Instalaciones las hacen los usuarios de tipo admin.';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `juegos`
--

CREATE TABLE `juegos` (
  `id` int(11) NOT NULL,
  `titulo` varchar(45) NOT NULL,
  `dir_img` varchar(255) NOT NULL COMMENT 'PATH de la imagen dentro del servidor',
  `descrpcion` varchar(100) DEFAULT NULL,
  `clasificacion` varchar(5) DEFAULT NULL,
  `f_lanzamiento` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plataformas`
--
CREATE TABLE `plataformas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) CHARACTER SET utf8mb4 NOT NULL,
  `cobro` float NOT NULL,
  `fecha_lanzamiento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Plataformas compatibles con el juego. NO son las consolas donde esta instalado. Al Instalar un Juego en una Consola se validará el cambo nombre(Plataformas) con el campo plataforma(Consolas).';
-- --------------------------------------------------------

--
-- Table structure for table `platdisponibles`
--

CREATE TABLE `platdisponibles` (
  `id` int(11) NOT NULL,
  `id_plataforma` int(11) NOT NULL,
  `id_juego` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posiciones`
--

CREATE TABLE `posiciones` (
  `id` int(11) NOT NULL,
  `posicion` int(11) NOT NULL,
  `premio` varchar(70) NOT NULL,
  `id_torneo` int(11) NOT NULL,
  `id_equipo` int(11) DEFAULT NULL COMMENT 'NULL porque inicialmente no hay un ganador. Se asigna el equipo hasta terminar el torneo. En base a este ID y en base a la tabla Inscripciones_Torneos se obtendrá el jugador/jugadores que quedaron en esta posicion.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Posiciones para los premios de torneos.';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `promocion_1`
--

CREATE TABLE `promocion_1` (
  `id` int(11) NOT NULL,
  `por_hora` int(11) NOT NULL COMMENT 'Monedas que se daran por hora de juego.',
  `por_compra` int(11) NOT NULL COMMENT 'Monedas que se daran por cada compra en la dulceria.',
  `cantidad_objetivo` int(11) NOT NULL COMMENT 'Cantidad de monedas equivalentes a una hora de juego gratis.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Promocion con horas de juego';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `promocion_2`
--

CREATE TABLE `promocion_2` (
  `id` int(11) NOT NULL,
  `invitados` int(11) NOT NULL COMMENT 'Por cada invitado que el socio gamer lleve.',
  `monedas` int(11) NOT NULL COMMENT 'Monedas que recibe cuando el no. de invitados se cumple.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Promocion con invitados';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `redes`
--

CREATE TABLE `redes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `url` varchar(255) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Redes sociales de los socios gamers';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rentas`
--

CREATE TABLE `rentas` (
  `id` int(11) NOT NULL,
  `fecha` datetime NOT NULL COMMENT 'Fecha y hora en la que se renta. Se tomara la fecha actual del servidor.',
  `total` float NOT NULL COMMENT 'total = Renta.horas * ()',
  `horas` int(11) NOT NULL COMMENT 'No. de horas que rentará',
  `id_usuario` int(11) NOT NULL COMMENT 'ID del gamer. NO del admin',
  `id_consola` int(11) NOT NULL,
  `id_prom_1` int(11) DEFAULT NULL COMMENT 'En caso de canjear monedas por la prom_1 en la actual visita.',
  `id_prom_2` int(11) DEFAULT NULL COMMENT 'En caso de canjear las monedas por la prom_2 en la actual visita.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Visitas al local / renta de consolas.';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rentas_accesiorios`
--

CREATE TABLE `rentas_accesiorios` (
  `id` int(11) NOT NULL,
  `id_renta` int(11) NOT NULL,
  `id_accesorio` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL COMMENT 'Cuantos accesorios de este tipo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Tabla intersección para controlar la cantidad de cada accesorio rentado.';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `torneos`
--

CREATE TABLE `torneos` (
  `id` int(11) NOT NULL,
  `titulo` varchar(45) NOT NULL,
  `fecha` date NOT NULL COMMENT 'Fecha a jugarse',
  `hora` varchar(10) NOT NULL,
  `modalidad` varchar(25) NOT NULL COMMENT 'singles, duos, etc.',
  `forma` varchar(45) NOT NULL COMMENT 'presencial, linea, ambas.',
  `max_jugadores` int(11) NOT NULL,
  `estado` varchar(45) NOT NULL COMMENT 'pendiente, en curso, finalizado, cancelado.',
  `descripcion` varchar(100) NOT NULL,
  `id_juego` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Hora a jugarse';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `tipo` tinyint(4) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellidos` varchar(70) NOT NULL,
  `f_nacimiento` date DEFAULT NULL,
  `genero` varchar(25) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `email` varchar(70) NOT NULL,
  `monedas` int(11) NOT NULL COMMENT 'Monedas que va acumulando por horas de juego o compras. Los usuarios de tipo admin no usan este atributo',
  `username` varchar(50) DEFAULT NULL COMMENT 'NULL porque el usuario puede ser de tipo admin(1) y no es necesario este atributo.',
  `password` varchar(255) NOT NULL,
  `dir_img` varchar(255) DEFAULT NULL COMMENT 'PATH de la imagen/avatar/foto del socio gamer.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Tabla para TODOS los usuarios del sistema. Usuarios de tipo admin(1) y usuarios de tipo socios gamer(2). Algunos atributos NULL dado que un usuario puede ser admin y no son necesarios algunos datos.';

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `tipo`, `nombre`, `apellidos`, `f_nacimiento`, `genero`, `telefono`, `email`, `monedas`, `username`, `password`, `dir_img`) VALUES
(1, 1, 'admin', 'admin', '2020-04-07', NULL, NULL, 'admin', 0, NULL, '$2y$10$PFxp.q2qonOgqjZR9M0epO.B7CEJdntY0B.ql6fi5L0hOxaRA3o6m', NULL),
(2, 2, 'Armando', 'Rodriguez', '2020-01-17', 'Masculino', '8341234567', 'armando@gmail.com', 0, 'armando99rdz', '$2y$10$jkZ6BhOjQ/Gj8LyWgp03xewfczBF9Vb/G3nXLwLKAQ4ydAhx/JWWO', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` int(11) NOT NULL,
  `producto` varchar(45) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` float NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `accesorios`
--
ALTER TABLE `accesorios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `consolas`
--
ALTER TABLE `consolas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `equipos`
--
ALTER TABLE `equipos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fkIdx_170` (`id_torneo`);

--
-- Indices de la tabla `inscripciones_torneos`
--
ALTER TABLE `inscripciones_torneos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fkIdx_163` (`id_equipo`),
  ADD KEY `fkIdx_166` (`id_gamer`);

--
-- Indices de la tabla `instalaciones`
--
ALTER TABLE `instalaciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fkIdx_81` (`id_consola`),
  ADD KEY `fkIdx_84` (`id_juego`);

--
-- Indices de la tabla `juegos`
--
ALTER TABLE `juegos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `plataformas`
--
ALTER TABLE `plataformas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fkIdx_78` (`id_juego`);

--
-- Indices de la tabla `posiciones`
--
ALTER TABLE `posiciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fkIdx_103` (`id_torneo`),
  ADD KEY `fkIdx_173` (`id_equipo`);

--
-- Indices de la tabla `promocion_1`
--
ALTER TABLE `promocion_1`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `promocion_2`
--
ALTER TABLE `promocion_2`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `redes`
--
ALTER TABLE `redes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fkIdx_71` (`id_usuario`);

--
-- Indices de la tabla `rentas`
--
ALTER TABLE `rentas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fkIdx_145` (`id_usuario`),
  ADD KEY `fkIdx_148` (`id_consola`),
  ADD KEY `fkIdx_227` (`id_prom_1`),
  ADD KEY `fkIdx_230` (`id_prom_2`);

--
-- Indices de la tabla `rentas_accesiorios`
--
ALTER TABLE `rentas_accesiorios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fkIdx_137` (`id_renta`),
  ADD KEY `fkIdx_140` (`id_accesorio`);

--
-- Indices de la tabla `torneos`
--
ALTER TABLE `torneos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fkIdx_106` (`id_juego`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fkIdx_200` (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `accesorios`
--
ALTER TABLE `accesorios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `consolas`
--
ALTER TABLE `consolas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `equipos`
--
ALTER TABLE `equipos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `inscripciones_torneos`
--
ALTER TABLE `inscripciones_torneos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `instalaciones`
--
ALTER TABLE `instalaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `juegos`
--
ALTER TABLE `juegos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `posiciones`
--
ALTER TABLE `posiciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `promocion_1`
--
ALTER TABLE `promocion_1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `promocion_2`
--
ALTER TABLE `promocion_2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `redes`
--
ALTER TABLE `redes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `rentas`
--
ALTER TABLE `rentas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `rentas_accesiorios`
--
ALTER TABLE `rentas_accesiorios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `torneos`
--
ALTER TABLE `torneos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `equipos`
--
ALTER TABLE `equipos`
  ADD CONSTRAINT `FK_170` FOREIGN KEY (`id_torneo`) REFERENCES `torneos` (`id`);

--
-- Filtros para la tabla `inscripciones_torneos`
--
ALTER TABLE `inscripciones_torneos`
  ADD CONSTRAINT `FK_163` FOREIGN KEY (`id_equipo`) REFERENCES `equipos` (`id`),
  ADD CONSTRAINT `FK_166` FOREIGN KEY (`id_gamer`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `instalaciones`
--
ALTER TABLE `instalaciones`
  ADD CONSTRAINT `FK_81` FOREIGN KEY (`id_consola`) REFERENCES `consolas` (`id`),
  ADD CONSTRAINT `FK_84` FOREIGN KEY (`id_juego`) REFERENCES `juegos` (`id`);

--
-- Filtros para la tabla `plataformas`
--
ALTER TABLE `plataformas`
  ADD CONSTRAINT `FK_78` FOREIGN KEY (`id_juego`) REFERENCES `juegos` (`id`);

--
-- Filtros para la tabla `posiciones`
--
ALTER TABLE `posiciones`
  ADD CONSTRAINT `FK_103` FOREIGN KEY (`id_torneo`) REFERENCES `torneos` (`id`),
  ADD CONSTRAINT `FK_173` FOREIGN KEY (`id_equipo`) REFERENCES `equipos` (`id`);

--
-- Filtros para la tabla `redes`
--
ALTER TABLE `redes`
  ADD CONSTRAINT `FK_71` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `rentas`
--
ALTER TABLE `rentas`
  ADD CONSTRAINT `FK_145` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `FK_148` FOREIGN KEY (`id_consola`) REFERENCES `consolas` (`id`),
  ADD CONSTRAINT `FK_227` FOREIGN KEY (`id_prom_1`) REFERENCES `promocion_1` (`id`),
  ADD CONSTRAINT `FK_230` FOREIGN KEY (`id_prom_2`) REFERENCES `promocion_2` (`id`);

--
-- Filtros para la tabla `rentas_accesiorios`
--
ALTER TABLE `rentas_accesiorios`
  ADD CONSTRAINT `FK_137` FOREIGN KEY (`id_renta`) REFERENCES `rentas` (`id`),
  ADD CONSTRAINT `FK_140` FOREIGN KEY (`id_accesorio`) REFERENCES `accesorios` (`id`);

--
-- Filtros para la tabla `torneos`
--
ALTER TABLE `torneos`
  ADD CONSTRAINT `FK_106` FOREIGN KEY (`id_juego`) REFERENCES `juegos` (`id`);

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `FK_200` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);
COMMIT;
