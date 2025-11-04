/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

CREATE TABLE `propiedades` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titulo` varchar(45) DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL,
  `imagen` varchar(200) DEFAULT NULL,
  `descripcion` longtext,
  `habitaciones` int DEFAULT NULL,
  `wc` int DEFAULT NULL,
  `estacionamiento` int DEFAULT NULL,
  `creado` date DEFAULT NULL,
  `vendedores_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_propiedades_vendedores_idx` (`vendedores_id`),
  CONSTRAINT `fk_propiedades_vendedores` FOREIGN KEY (`vendedores_id`) REFERENCES `vendedores` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb3;

CREATE TABLE `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(50) DEFAULT NULL,
  `password` char(60) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

CREATE TABLE `vendedores` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `apellido` varchar(45) DEFAULT NULL,
  `telefono` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

INSERT INTO `propiedades` (`id`, `titulo`, `precio`, `imagen`, `descripcion`, `habitaciones`, `wc`, `estacionamiento`, `creado`, `vendedores_id`) VALUES
(1, 'Hermosa casa en la playa', '1250000.00', '63856633069093aae4b922anuncio2.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tincidunt nulla at orci commodo lobortis. Morbi consectetur, urna a consequat varius, felis neque finibus ex, non dapibus metus justo et justo. Proin venenatis leo quis velit molestie vulputate at et ipsum. Curabitur pretium arcu a leo dignissim, non ornare enim efficitur. Etiam ut commodo libero. Mauris rhoncus scelerisque venenatis. Suspendisse cursus elementum accumsan. Praesent ullamcorper nulla id sem molestie, in faucibus eros sagittis. Curabitur sed tristique lectus. Mauris varius suscipit erat in cursus. Vivamus porttitor, neque tincidunt malesuada dapibus, ipsum magna gravida mi, eu pharetra dui massa sed mauris. Nulla facilisi. Integer sed arcu id felis maximus rutrum ut facilisis arcu. Etiam auctor tortor eget vulputate fermentum. Nulla vehicula interdum nisl in pulvinar.\r\n\r\nNam at odio placerat, tempus mi eget, scelerisque ex. Vivamus volutpat ac libero in imperdiet. Proin at venenatis nunc. Curabitur iaculis pulvinar mi, condimentum facilisis arcu suscipit vel. Vestibulum nulla metus, ultrices nec malesuada ut, rutrum ut magna. Nulla odio risus, pellentesque nec tempor vitae, gravida non dui. In in finibus risus. Nunc at elementum massa. Ut quis tincidunt lorem, eu eleifend justo. Donec rhoncus ultrices sem. Duis ac ante ac quam facilisis ultrices vitae a neque.', 3, 3, 3, NULL, 1);
INSERT INTO `propiedades` (`id`, `titulo`, `precio`, `imagen`, `descripcion`, `habitaciones`, `wc`, `estacionamiento`, `creado`, `vendedores_id`) VALUES
(4, 'Hermosa casa con piscina', '3999999.00', '30410470369093e12134f0anuncio3.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tincidunt nulla at orci commodo lobortis. Morbi consectetur, urna a consequat varius, felis neque finibus ex, non dapibus metus justo et justo. Proin venenatis leo quis velit molestie vulputate at et ipsum. Curabitur pretium arcu a leo dignissim, non ornare enim efficitur. Etiam ut commodo libero. Mauris rhoncus scelerisque venenatis. Suspendisse cursus elementum accumsan. Praesent ullamcorper nulla id sem molestie, in faucibus eros sagittis. Curabitur sed tristique lectus. Mauris varius suscipit erat in cursus. Vivamus porttitor, neque tincidunt malesuada dapibus, ipsum magna gravida mi, eu pharetra dui massa sed mauris. Nulla facilisi. Integer sed arcu id felis maximus rutrum ut facilisis arcu. Etiam auctor tortor eget vulputate fermentum. Nulla vehicula interdum nisl in pulvinar.\r\n', 3, 2, 1, '2025-09-15', 1);
INSERT INTO `propiedades` (`id`, `titulo`, `precio`, `imagen`, `descripcion`, `habitaciones`, `wc`, `estacionamiento`, `creado`, `vendedores_id`) VALUES
(5, 'Casa en el lago', '49999999.00', '38658205269093e446ac05anuncio1.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut ultricies eu justo sed porta. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nullam in posuere libero, id pretium turpis. Aenean eu dui cursus, pharetra metus vitae, tristique libero. Curabitur at ex erat. Praesent viverra aliquam turpis, nec posuere metus pharetra quis. Donec finibus tincidunt felis, ac vulputate massa suscipit egestas.', 3, 3, 3, '2025-09-15', 1);
INSERT INTO `propiedades` (`id`, `titulo`, `precio`, `imagen`, `descripcion`, `habitaciones`, `wc`, `estacionamiento`, `creado`, `vendedores_id`) VALUES
(6, 'Casa Clasica', '1499999.00', '112973581069093af2c89a0anuncio4.jpg', 'Titulo final crudTitulo final crudTitulo final crudTitulo final crudTitulo final crudTitulo final crudTitulo final crudTitulo final crudTitulo final crudTitulo final crudTitulo final crudTitulo final crudTitulo final crudTitulo final crudTitulo final crudTitulo final crudTitulo final crudTitulo final crudTitulo final crudTitulo final crudTitulo final crud', 2, 3, 3, '2025-09-23', 1),
(10, 'Propiedad ', '3000000.00', '12953670969093f6a0cb0danuncio6.jpg', 'Nam at odio placerat, tempus mi eget, scelerisque ex. Vivamus volutpat ac libero in imperdiet. Proin at venenatis nunc. Curabitur iaculis pulvinar mi, condimentum facilisis arcu suscipit vel. Vestibulum nulla metus, ultrices nec malesuada ut, rutrum ut magna. Nulla odio risus, pellentesque nec tempor vitae, gravida non dui. In in finibus risus. Nunc at elementum massa. Ut quis tincidunt lorem, eu eleifend justo. Donec rhoncus ultrices sem. Duis ac ante ac quam facilisis ultrices vitae a neque.', 4, 2, 1, '2025-11-03', 1),
(11, 'Casa Vecindario', '1999990.00', '70511175069093f479b077anuncio5.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tincidunt nulla at orci commodo lobortis. Morbi consectetur, urna a consequat varius, felis neque finibus ex, non dapibus metus justo et justo. Proin venenatis leo quis velit molestie vulputate at et ipsum. Curabitur pretium arcu a leo dignissim, non ornare \r\n\r\nNam at odio placerat, tempus mi eget, scelerisque ex. Vivamus volutpat ac libero in imperdiet. Proin at venenatis nunc. Curabitur iaculis pulvinar mi, condimentum facilisis arcu suscipit vel. Vestibulum nulla metus, ultrices nec malesuada ut, rutrum ut magna. Nulla odio risus, pellentesque nec tempor vitae, gravida non dui. In in finibus risus. Nunc at elementum massa. Ut quis tincidunt lorem, eu eleifend justo. Donec rhoncus ultrices sem. Duis ac ante ac quam facilisis ultrices vitae a neque.', 3, 3, 3, '2025-11-03', 1);

INSERT INTO `usuarios` (`id`, `email`, `password`) VALUES
(2, 'correo@correo.com', '$2y$12$sWB1cdsH8U749svV6Clz.e7I4fbp4Gl0.xjJLbKrBhI2I8cwVul2C');


INSERT INTO `vendedores` (`id`, `nombre`, `apellido`, `telefono`) VALUES
(1, 'Jesus', 'Hurtado', 983349729);
INSERT INTO `vendedores` (`id`, `nombre`, `apellido`, `telefono`) VALUES
(2, 'Juan', 'De la torre', 131313131);



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;