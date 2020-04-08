-- ****************** SqlDBM: MySQL ******************;
-- ***************************************************;


-- ************************************** `usuarios`

CREATE TABLE `usuarios`
(
 `id`           int NOT NULL AUTO_INCREMENT ,
 `tipo`         tinyint NOT NULL ,
 `nombre`       varchar(45) NOT NULL ,
 `apellidos`    varchar(70) NOT NULL ,
 `f_nacimiento` date NULL ,
 `genero`       varchar(25) NULL ,
 `telefono`     varchar(20) NULL ,
 `email`        varchar(70) NOT NULL ,
 `monedas`      int NOT NULL COMMENT 'Monedas que va acumulando por horas de juego o compras. Los usuarios de tipo admin no usan este atributo' ,
 `username`     varchar(50) NULL COMMENT 'NULL porque el usuario puede ser de tipo admin(1) y no es necesario este atributo.' ,
 `password`     varchar(255) NOT NULL ,
 `dir_img`      varchar(255) NULL COMMENT 'PATH de la imagen/avatar/foto del socio gamer.' ,

PRIMARY KEY (`id`)
) COMMENT='Tabla para TODOS los usuarios del sistema. Usuarios de tipo admin(1) y usuarios de tipo socios gamer(2). Algunos atributos NULL dado que un usuario puede ser admin y no son necesarios algunos datos.';






-- ************************************** `promocion_2`

CREATE TABLE `promocion_2`
(
 `id`        int NOT NULL AUTO_INCREMENT ,
 `invitados` int NOT NULL COMMENT 'Por cada invitado que el socio gamer lleve.' ,
 `monedas`   int NOT NULL COMMENT 'Monedas que recibe cuando el no. de invitados se cumple.' ,

PRIMARY KEY (`id`)
) COMMENT='Promocion con invitados';






-- ************************************** `promocion_1`

CREATE TABLE `promocion_1`
(
 `id`                int NOT NULL AUTO_INCREMENT ,
 `por_hora`          int NOT NULL COMMENT 'Monedas que se daran por hora de juego.' ,
 `por_compra`        int NOT NULL COMMENT 'Monedas que se daran por cada compra en la dulceria.' ,
 `cantidad_objetivo` int NOT NULL COMMENT 'Cantidad de monedas equivalentes a una hora de juego gratis.' ,

PRIMARY KEY (`id`)
) COMMENT='Promocion con horas de juego';






-- ************************************** `plataformas`

CREATE TABLE `plataformas`
(
 `id`                int NOT NULL AUTO_INCREMENT ,
 `nombre`            varchar(45) NOT NULL ,
 `cobro`             float NOT NULL ,
 `fecha_lanzamiento` date NOT NULL ,

PRIMARY KEY (`id`)
) COMMENT='Plataformas compatibles con el juego. NO son las consolas donde esta instalado. Al Instalar un Juego en una Consola se validará el cambo nombre(Plataformas) con el campo plataforma(Consolas).';






-- ************************************** `juegos`

CREATE TABLE `juegos`
(
 `id`            int NOT NULL AUTO_INCREMENT ,
 `titulo`        varchar(45) NOT NULL ,
 `dir_img`       varchar(255) NOT NULL COMMENT 'PATH de la imagen dentro del servidor' ,
 `descrpcion`    varchar(100) NULL ,
 `clasificacion` varchar(5) NULL ,
 `f_lanzamiento` date NULL ,

PRIMARY KEY (`id`)
);






-- ************************************** `accesorios`

CREATE TABLE `accesorios`
(
 `id`          int NOT NULL AUTO_INCREMENT ,
 `nombre`      varchar(45) NOT NULL ,
 `descripcion` varchar(100) NOT NULL ,
 `precio`      float NOT NULL COMMENT 'Precio por hora de uso' ,

PRIMARY KEY (`id`)
) COMMENT='Accesiorios adicionales en la renta de consolas. Mandos extras, audífonos, etc';






-- ************************************** `ventas`

CREATE TABLE `ventas`
(
 `id`         int NOT NULL AUTO_INCREMENT ,
 `producto`   varchar(45) NOT NULL ,
 `cantidad`   int NOT NULL ,
 `precio`     float NOT NULL ,
 `id_usuario` int NOT NULL ,

PRIMARY KEY (`id`),
KEY `fkIdx_200` (`id_usuario`),
CONSTRAINT `FK_200` FOREIGN KEY `fkIdx_200` (`id_usuario`) REFERENCES `usuarios` (`id`)
);






-- ************************************** `torneos`

CREATE TABLE `torneos`
(
 `id`            int NOT NULL AUTO_INCREMENT ,
 `titulo`        varchar(45) NOT NULL ,
 `fecha`         date NOT NULL COMMENT 'Fecha a jugarse' ,
 `hora`          varchar(10) NOT NULL ,
 `modalidad`     varchar(25) NOT NULL COMMENT 'singles, duos, etc.' ,
 `forma`         varchar(45) NOT NULL COMMENT 'presencial, linea, ambas.' ,
 `max_jugadores` int NOT NULL ,
 `estado`        varchar(45) NOT NULL COMMENT 'pendiente, en curso, finalizado, cancelado.' ,
 `descripcion`   varchar(100) NOT NULL ,
 `id_juego`      int NOT NULL ,

PRIMARY KEY (`id`),
KEY `fkIdx_106` (`id_juego`),
CONSTRAINT `FK_106` FOREIGN KEY `fkIdx_106` (`id_juego`) REFERENCES `juegos` (`id`)
) COMMENT='Hora a jugarse';






-- ************************************** `redes`

CREATE TABLE `redes`
(
 `id`         int NOT NULL AUTO_INCREMENT ,
 `nombre`     varchar(45) NOT NULL ,
 `url`        varchar(255) NOT NULL ,
 `id_usuario` int NOT NULL ,

PRIMARY KEY (`id`),
KEY `fkIdx_71` (`id_usuario`),
CONSTRAINT `FK_71` FOREIGN KEY `fkIdx_71` (`id_usuario`) REFERENCES `usuarios` (`id`)
) COMMENT='Redes sociales de los socios gamers';






-- ************************************** `platdisponibles`

CREATE TABLE `platdisponibles`
(
 `id`            int NOT NULL AUTO_INCREMENT ,
 `id_plataforma` int NOT NULL ,
 `id_juego`      int NOT NULL ,

PRIMARY KEY (`id`),
KEY `fkIdx_263` (`id_plataforma`),
CONSTRAINT `FK_263` FOREIGN KEY `fkIdx_263` (`id_plataforma`) REFERENCES `plataformas` (`id`),
KEY `fkIdx_266` (`id_juego`),
CONSTRAINT `FK_266` FOREIGN KEY `fkIdx_266` (`id_juego`) REFERENCES `juegos` (`id`)
);






-- ************************************** `consolas`

CREATE TABLE `consolas`
(
 `id`            int NOT NULL AUTO_INCREMENT ,
 `numero`        int NOT NULL ,
 `serial`        varchar(255) NULL ,
 `id_plataforma` int NOT NULL ,

PRIMARY KEY (`id`),
KEY `fkIdx_270` (`id_plataforma`),
CONSTRAINT `FK_270` FOREIGN KEY `fkIdx_270` (`id_plataforma`) REFERENCES `plataformas` (`id`)
);






-- ************************************** `rentas`

CREATE TABLE `rentas`
(
 `id`         int NOT NULL AUTO_INCREMENT ,
 `fecha`      datetime NOT NULL COMMENT 'Fecha y hora en la que se renta. Se tomara la fecha actual del servidor.' ,
 `total`      float NOT NULL COMMENT 'total = Renta.horas * ()' ,
 `horas`      int NOT NULL COMMENT 'No. de horas que rentará' ,
 `id_usuario` int NOT NULL COMMENT 'ID del gamer. NO del admin' ,
 `id_consola` int NOT NULL ,
 `id_prom_1`  int NULL COMMENT 'En caso de canjear monedas por la prom_1 en la actual visita.' ,
 `id_prom_2`  int NULL COMMENT 'En caso de canjear las monedas por la prom_2 en la actual visita.' ,

PRIMARY KEY (`id`),
KEY `fkIdx_145` (`id_usuario`),
CONSTRAINT `FK_145` FOREIGN KEY `fkIdx_145` (`id_usuario`) REFERENCES `usuarios` (`id`),
KEY `fkIdx_148` (`id_consola`),
CONSTRAINT `FK_148` FOREIGN KEY `fkIdx_148` (`id_consola`) REFERENCES `consolas` (`id`),
KEY `fkIdx_227` (`id_prom_1`),
CONSTRAINT `FK_227` FOREIGN KEY `fkIdx_227` (`id_prom_1`) REFERENCES `promocion_1` (`id`),
KEY `fkIdx_230` (`id_prom_2`),
CONSTRAINT `FK_230` FOREIGN KEY `fkIdx_230` (`id_prom_2`) REFERENCES `promocion_2` (`id`)
) COMMENT='Visitas al local / renta de consolas.';






-- ************************************** `instalaciones`

CREATE TABLE `instalaciones`
(
 `id`         int NOT NULL AUTO_INCREMENT ,
 `fecha`      date NOT NULL COMMENT 'Se tomara la fecha actual del servidor.' ,
 `id_consola` int NOT NULL ,
 `id_juego`   int NOT NULL ,

PRIMARY KEY (`id`),
KEY `fkIdx_81` (`id_consola`),
CONSTRAINT `FK_81` FOREIGN KEY `fkIdx_81` (`id_consola`) REFERENCES `consolas` (`id`),
KEY `fkIdx_84` (`id_juego`),
CONSTRAINT `FK_84` FOREIGN KEY `fkIdx_84` (`id_juego`) REFERENCES `juegos` (`id`)
) COMMENT='Tabla de interseccion (consolas-juegos): Instalacion de un juego en una consola. Las Instalaciones las hacen los usuarios de tipo admin.';






-- ************************************** `equipos`

CREATE TABLE `equipos`
(
 `id`        int NOT NULL AUTO_INCREMENT ,
 `nombre`    varchar(45) NULL ,
 `id_torneo` int NOT NULL ,

PRIMARY KEY (`id`),
KEY `fkIdx_170` (`id_torneo`),
CONSTRAINT `FK_170` FOREIGN KEY `fkIdx_170` (`id_torneo`) REFERENCES `torneos` (`id`)
);






-- ************************************** `rentas_accesiorios`

CREATE TABLE `rentas_accesiorios`
(
 `id`           int NOT NULL AUTO_INCREMENT ,
 `id_renta`     int NOT NULL ,
 `id_accesorio` int NOT NULL ,
 `cantidad`     int NOT NULL COMMENT 'Cuantos accesorios de este tipo' ,

PRIMARY KEY (`id`),
KEY `fkIdx_137` (`id_renta`),
CONSTRAINT `FK_137` FOREIGN KEY `fkIdx_137` (`id_renta`) REFERENCES `rentas` (`id`),
KEY `fkIdx_140` (`id_accesorio`),
CONSTRAINT `FK_140` FOREIGN KEY `fkIdx_140` (`id_accesorio`) REFERENCES `accesorios` (`id`)
) COMMENT='Tabla intersección para controlar la cantidad de cada accesorio rentado.';






-- ************************************** `posiciones`

CREATE TABLE `posiciones`
(
 `id`        int NOT NULL AUTO_INCREMENT ,
 `posicion`  int NOT NULL ,
 `premio`    varchar(70) NOT NULL ,
 `id_torneo` int NOT NULL ,
 `id_equipo` int NULL COMMENT 'NULL porque inicialmente no hay un ganador. Se asigna el equipo hasta terminar el torneo. En base a este ID y en base a la tabla Inscripciones_Torneos se obtendrá el jugador/jugadores que quedaron en esta posicion.' ,

PRIMARY KEY (`id`),
KEY `fkIdx_103` (`id_torneo`),
CONSTRAINT `FK_103` FOREIGN KEY `fkIdx_103` (`id_torneo`) REFERENCES `torneos` (`id`),
KEY `fkIdx_173` (`id_equipo`),
CONSTRAINT `FK_173` FOREIGN KEY `fkIdx_173` (`id_equipo`) REFERENCES `equipos` (`id`)
) COMMENT='Posiciones para los premios de torneos.';






-- ************************************** `inscripciones_torneos`

CREATE TABLE `inscripciones_torneos`
(
 `id`        int NOT NULL AUTO_INCREMENT ,
 `id_equipo` int NOT NULL ,
 `id_gamer`  int NOT NULL ,

PRIMARY KEY (`id`),
KEY `fkIdx_163` (`id_equipo`),
CONSTRAINT `FK_163` FOREIGN KEY `fkIdx_163` (`id_equipo`) REFERENCES `equipos` (`id`),
KEY `fkIdx_166` (`id_gamer`),
CONSTRAINT `FK_166` FOREIGN KEY `fkIdx_166` (`id_gamer`) REFERENCES `usuarios` (`id`)
) COMMENT='Tabla de intersección entre los jugadores/gamers  y los equipos para torneos';






-- ************************************** `invitaciones`

CREATE TABLE `invitaciones`
(
 `id`                 int NOT NULL AUTO_INCREMENT ,
 `id_equipo`          int NOT NULL ,
 `id_gamer_invitado`  int NOT NULL COMMENT 'id del gamer que se invita' ,
 `fecha`              datetime NOT NULL ,
 `estado`             varchar(45) NOT NULL COMMENT 'Pendiente, Aceptada, Rechazada' ,
 `id_gamer_anfitrion` int NOT NULL COMMENT 'id del gamer que envio invitacion' ,
 `comentarios`        varchar(100) NULL ,

PRIMARY KEY (`id`),
KEY `fkIdx_236` (`id_equipo`),
CONSTRAINT `FK_236` FOREIGN KEY `fkIdx_236` (`id_equipo`) REFERENCES `inscripciones_torneos` (`id`),
KEY `fkIdx_239` (`id_gamer_invitado`),
CONSTRAINT `FK_239` FOREIGN KEY `fkIdx_239` (`id_gamer_invitado`) REFERENCES `usuarios` (`id`)
) COMMENT='Representa una invitacion a un gamer
para unirse al equipo';





