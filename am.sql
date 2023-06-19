CREATE DATABASE am;
USE  am;
SET FOREIGN_KEY_CHECKS=0;
SET FOREIGN_KEY_CHECKS=1;

DROP TABLE IF EXISTS `stock`;

CREATE TABLE `stock` (
  `CodProd` int(11) NOT NULL,
  `NameProd` varchar(50) DEFAULT NULL,
  `Description` varchar(30) DEFAULT NULL,
  `Price` decimal(10,2) DEFAULT NULL, 
  `Ud` int(11) DEFAULT NULL,
  `image` varchar(70) DEFAULT NULL,
  PRIMARY KEY (`CodProd`)
 
  
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `stock` WRITE;

INSERT INTO `stock` VALUES (1, 'Camiseta Negra AM','Camiseta negra AM', 15.00, 500, 'carrito_compra/img/Camiseta Negra AM.png'),
(2, 'Camiseta Blanca AM','Camiseta blanca AM', 15.00, 520, 'carrito_compra/img/Camiseta Blanca AM.png'), 
(3, 'Sudadera Morada AM', 'Sudadera morada AM', 25.90, 600, 'carrito_compra/img/Sudadera Morada AM.png'),
(4, 'Tote Bag Negra', 'Bolsa de tela AM', 7.00, 600, 'carrito_compra/img/Tote Bag Negra.png'),
(5, 'Gorro Lana Negro', 'Gorro de lana AM', 8.00, 600, 'carrito_compra/img/Gorro Lana Negro.png'),
(6, 'Camiseta Estopa', 'Camiseta grupo Estopa', 19.90, 200, 'carrito_compra/img/Camiseta Estopa.png'),
(7, 'Camiseta Extremoduro', 'Camiseta de grupo Extremoduro',19.90, 720, 'carrito_compra/img/Camiseta Extremoduro.png'),
(8, 'Camiseta Techno', 'Camiseta negra con dibujo', 16.90, 750, 'carrito_compra/img/Camiseta Techno.png'),
(9, 'Sudadera Jagermeister', 'Sudadera blanca logo Jager', 39.90, 560, 'carrito_compra/img/Sudadera Jagermeister.png'),
(10, 'Gorra Jagermeister', 'Gorra gris logo Jager', 7.90, 540, 'carrito_compra/img/Gorra Jagermeister.png');

 UNLOCK TABLES;


DROP TABLE IF EXISTS `clients`;


CREATE TABLE `clients`(
  `Name` varchar(50) NOT NULL,
  `LastName` varchar(30) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Phone` int(9) DEFAULT NULL,
  `Address` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  PRIMARY KEY (`Email`)

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `clients` WRITE;



INSERT INTO clients 
VALUES 
('Juan', 'Perez', 'juan.perez@gmail.com', 123456789, 'Calle Mayor 1, 28001 Madrid','202cb962ac59075b964b07152d234b70'),
('María', 'Garcia', 'maria.garcia@yahoo.es', 987654321, 'Plaza del Sol 2, 08001 Barcelona','202cb962ac59075b964b07152d234b70' ),
('Pedro', 'López', 'pedro.lopez@hotmail.com', 555555555, 'Calle Gran Vía 3, 46001 Valencia','202cb962ac59075b964b07152d234b70'),
('Carmen', 'Martínez', 'carmen.martinez@gmail.com', 111111111, 'Avenida Diagonal 4, 08009 Barcelona','202cb962ac59075b964b07152d234b70'),
('Ana', 'Fernández', 'ana.fernandez@hotmail.com', 222222222, 'Calle Alcalá 5,28005 Madrid','202cb962ac59075b964b07152d234b70');

UNLOCK TABLES;

DROP TABLE IF EXISTS `events`;
CREATE TABLE `events`(
  `CodEvent` int(11) NOT NULL,
  `Name` varchar(50) DEFAULT NULL,
  `Date` Date DEFAULT NULL,
  `Time` varchar(30) DEFAULT NULL,
  `Colab` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`CodEvent`)

  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `events` VALUES (1, 'Fiesta de inauguracion', '2023-06-30', '10:00 PM', 'DJ J'),
(2, 'Noche temática de los 80s', '2023-07-05', '11:00 PM', 'DJ Lady Maria'),
(3, 'Concierto en vivo', '2023-08-15', '11:30 PM', 'Banda local'),
(4, 'Fiesta de Halloween', '2023-10-31', '10:00 PM', 'Varios DJs'),
(5, 'Noche de karaoke', '2023-11-20', '10:00 PM', 'Anfitrion del karaoke'),
(6, 'Oro Viejo', '2023-12-10', '12:00 PM', 'DJ Marta');

UNLOCK TABLES;



DROP TABLE IF EXISTS `orders`;

CREATE TABLE `orders`(
  `CodOrder` int(10) NOT NULL,
  `EmailClient` varchar(50) NOT NULL,
  `Date` Date DEFAULT NULL,
  `TotalPrice` decimal(10,2) DEFAULT NULL,
 
  PRIMARY KEY (`CodOrder`),
  CONSTRAINT `EmailClient_FK` FOREIGN KEY (`EmailClient`)
  REFERENCES `clients` (`Email`)


) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `orders` VALUES
(1, 'juan.perez@gmail.com', '2023-05-10', 30.00),
(2, 'carmen.martinez@gmail.com', '2023-06-05', 22.90),
(3, 'pedro.lopez@hotmail.com', '2023-07-15', 15.00);

UNLOCK TABLES;


DROP TABLE IF EXISTS `ordersDetails`;

CREATE TABLE `ordersDetails`(
  `CodOrder` int(10) NOT NULL,
  `CodProd` int(11) NOT NULL,
  `Ud` int(10) DEFAULT NULL,
  `UdPrice` decimal(15,2) DEFAULT NULL,
  `Address` varchar(50) NOT NULL,
 
  PRIMARY KEY (`CodOrder`, `CodProd`),
  CONSTRAINT `CodOrder_FK` FOREIGN KEY (`CodOrder`) REFERENCES `orders` (`CodOrder`),
  CONSTRAINT `CodProd_FK` FOREIGN KEY (`CodProd`) REFERENCES `stock` (`CodProd`)
 


) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `ordersDetails` VALUES
(1, 1, 2, 15.00, 'Calle Mayor 1, 28001 Madrid'),
(1, 2, 3, 15.00, 'Calle Mayor 1, 28001 Madrid'), 
(2, 3, 1, 25.90,'Avenida Diagonal 4, 08009 Barcelona'), 
(2, 4, 5, 7.00,'Avenida Diagonal 4, 08009 Barcelona'),
(3, 2, 2, 15.00, 'Calle Gran Vía 3, 46001 Valencia'); 


UNLOCK TABLES;

DROP TABLE IF EXISTS `employees`;

CREATE TABLE `employees`(
  `Name` varchar(40) DEFAULT NULL,
  `LastName` varchar(40) DEFAULT NULL,
  `Position` varchar(40) NOT NULL,
  `Email` varchar(40) NOT NULL,
  `Password` varchar(50) NOT NULL,

 
  PRIMARY KEY (`Email`)
 

)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `employees` VALUES
('Lucia', 'Gonzalez', 'Gerente', 'lucia@am.com', '202cb962ac59075b964b07152d234b70'),
('Marina', 'Rodriguez', 'Representante de Ventas', 'marina@am.com', '202cb962ac59075b964b07152d234b70'),
('Carlos', 'Fernández', 'Camarero', 'carlos@am.com', '202cb962ac59075b964b07152d234b70'),
('Laura', 'Lopez', 'Recursos Humanos', 'laura@am.com', '202cb962ac59075b964b07152d234b70'),
('Pedro', 'Martínez', 'Desarrollador', 'pedro@am.com', '202cb962ac59075b964b07152d234b70'),
('Sofia', 'García', 'Marketing','sofia@am.com', '202cb962ac59075b964b07152d234b70');

DROP TABLE IF EXISTS `bookings`;

CREATE TABLE `bookings`(
  `Name` varchar(50) NOT NULL,
  `Phone` int(9) NOT NULL,
  `NumPeople` int(2) NOT NULL,
  `Date` date NOT NULL,
  `Time` varchar(40) NOT NULL,
  PRIMARY KEY(`Phone`, `Date`)

 

)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;