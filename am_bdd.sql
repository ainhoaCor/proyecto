CREATE DATABASE am_bdd;
USE  am_bdd;

DROP TABLE IF EXISTS `stock`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stock` (
  `CodProd` int(11) NOT NULL,
  `NameProd` varchar(50) DEFAULT NULL,
  `Description` varchar(30) DEFAULT NULL,
  `Price` decimal(10) NOT NULL, 
  `Ud` int(11) NOT NULL,
  `image` varchar(70) DEFAULT NULL,
  PRIMARY KEY (`CodProd`)
 
  
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `stock` WRITE;

INSERT INTO `stock` VALUES (1, 'Camiseta Negra AM','Camiseta negra con logo talla unica', 15.00, 10, ),
(2, 'Camiseta Blanca AM','Camiseta blanca con logo talla unica', 15.00, 12),
(3, 'Sudadera Morada AM', 'Sudadera morada con logo talla unica', 25.90, 16),
(4, 'Tote Bag Negra', 'Bolsa de tela con logo', 7.00, 24),
 (5, 'Gorro Lana Negro', 'Gorro de lana negro con logotipo', 8.00, 30);

 UNLOCK TABLES;


DROP TABLE IF EXISTS `clients`;

ALTER TABLE clients DROP COLUMN ud;
CREATE TABLE `clients`(
  `CodClient` int(11) NOT NULL,
  `Name` varchar(50) DEFAULT NULL,
  `LastName` varchar(30) DEFAULT NULL,
  `Email` varchar(30) DEFAULT NULL,
  `Phone` int(9) DEFAULT NULL,
  `Address` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`CodClient`)


) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `clients` WRITE;

TRUNCATE TABLE clients;
INSERT INTO clients 
VALUES 
(1, 'Juan', 'Perez', 'juan.perez@gmail.com', 123456789, 'Calle Mayor 1, 28001 Madrid'),
(2, 'María', 'Garcia', 'maria.garcia@yahoo.es', 987654321, 'Plaza del Sol 2, 08001 Barcelona'),
(3, 'Pedro', 'López', 'pedro.lopez@hotmail.com', 555555555, 'Calle Gran Vía 3, 46001 Valencia'),
(4, 'Carmen', 'Martínez', 'carmen.martinez@gmail.com', 111111111, 'Avenida Diagonal 4, 08009 Barcelona'),
(5, 'Ana', 'Fernández', 'ana.fernandez@hotmail.com', 222222222, 'Calle Alcalá 5,28005 Madrid');

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

INSERT INTO `events` VALUES (1, 'Fiesta de inauguracion', '2023-06-10', '10:00 PM', 'DJ J'),
(2, 'Noche temática de los 80s', '2023-07-05', '11:00 PM', 'DJ Lady Maria'),
(3, 'Concierto en vivo', '2023-08-15', '11:30 PM', 'Banda local'),
(4, 'Fiesta de Halloween', '2023-10-31', '10:00 PM', 'Varios DJs'),
(5, 'Noche de karaoke', '2023-11-20', '10:00 PM', 'Anfitrion del karaoke'),
(6, 'Oro Viejo', '2023-12-10', '12:00 PM', 'DJ Marta');

UNLOCK TABLES;



DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders`(
  `CodOrder` int(10) NOT NULL,
  `CodClient` int(10) NOT NULL,
  `Date` Date DEFAULT NULL,
  `TotalPrice` decimal(10) NOT NULL,
 
  PRIMARY KEY (`CodOrder`, `CodClient`),
  CONSTRAINT `CodClient_FK` FOREIGN KEY (`CodClient`)
  REFERENCES `clients` (`CodClient`)


) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `orders` VALUES
(1, 1, '2023-05-10', 30.00),
(2, 4, '2023-06-05', 22.90),
(3, 3, '2023-07-15', 15.00);

UNLOCK TABLES;


DROP TABLE IF EXISTS `ordersDetails`;


CREATE TABLE `ordersDetails`(
  `CodOrder` int(10) NOT NULL,
  `CodProd` int(11) NOT NULL,
  `Ud` int(10) DEFAULT NULL,
  `UdPrice` decimal(15,2) NOT NULL,
  `AdressClient` varchar(50) DEFAULT NULL,
 
  PRIMARY KEY (`CodOrder`, `CodProd`),
  CONSTRAINT `CodOrder_FK` FOREIGN KEY (`CodOrder`) REFERENCES `Orders` (`CodOrder`),
  CONSTRAINT `CodProd_FK` FOREIGN KEY (`CodProd`) REFERENCES `Stock` (`CodProd`)

 

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
  `CodEmp` int(10) NOT NULL,
  `Name` varchar(40) DEFAULT NULL,
  `LastName` varchar(40) DEFAULT NULL,
  `Position` varchar(40) NOT NULL,
  `Email` varchar(40) NOT NULL,
  `Password` varchar(3) NOT NULL,

 
  PRIMARY KEY (`CodEmp`, `Email`)
 

)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `employees` VALUES
(1, 'Lucia', 'Gonzalez', 'Gerente', 'lucia@am.com', '123'),
(2, 'Marina', 'Rodriguez', 'Representante de Ventas', 'marina@am.com', '123'),
(3, 'Carlos', 'Fernández', 'Camarero', 'carlos@am.com', '123'),
(4, 'Laura', 'Lopez', 'Recursos Humanos', 'laura@am.com', '123'),
(5, 'Pedro', 'Martínez', 'Desarrollador', 'pedro@am.com', '123'),
(6, 'Sofia', 'García', 'Marketing','sofia@am.com', '123');
