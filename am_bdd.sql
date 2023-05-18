CREATE DATABASE am_bdd;
USE  am_bdd;

DROP TABLE IF EXISTS `stock`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stock` (
  `CodProd` int(11) NOT NULL,
  `NameProd` varchar(50) DEFAULT NULL,
  `Supplier` varchar(30) DEFAULT NULL,
  `Description` varchar(30) DEFAULT NULL,
  `SalePrice` decimal(10) NOT NULL,
  `SupplierPrice` decimal(10) NOT NULL,
  `Ud` int(11) NOT NULL,
  PRIMARY KEY (`CodProd`, `Ud`)
 
  
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `stock` WRITE;

INSERT INTO `stock` VALUES (1, 'Ron Bacardi', 'Distribuidora ABC', 'Ron añejo 8 años', 10.00, 8.00, 10),(2, 'Vodka Absolut', 'Distribuidora XYZ', 'Vodka Premium', 10.00, 7.00, 10),
(3, 'Tequila José Cuervo', 'Distribuidora DEF', 'Tequila reposado', 10.00, 7.00, 10),(4, 'Cerveza Corona', 'Distribuidora ABC', 'Cerveza mexicana', 5.00, 3.00, 24),
 (5, 'Coca Cola', 'Distribuidora Coca Cola', 'Refresco cola', 2.50, 1.00, 30),(6, 'Whisky Johnnie Walker', 'Distribuidora ABC', 'Whisky escocés', 10.00, 15.00, 10),
 (7, 'Gin Tanqueray', 'Distribuidora XYZ', 'Gin Premium', 10.00, 6.00, 17),(8, 'Ron Malibu', 'Distribuidora DEF', 'Ron con sabor a coco', 10.00, 8.00, 15),
 (9, 'Cerveza Heineken', 'Distribuidora Heineken', 'Cerveza holandesa', 5.00, 3.00, 34),(10, 'Sprite', 'Distribuidora Coca Cola', 'Refresco lima-limón', 2.50, 1.00, 26),
 (11, 'Fanta Limon', 'Distribuidora Coca Cola', 'Refresco limón', 2.50, 1.00, 15),(12, 'Red Bull', 'Distribuidora Red Bull', 'Bebida energetica', 3.50, 1.50, 20);

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

DROP TABLE IF EXISTS `SupplierOrders`;
CREATE TABLE `supplierOrders`(
  `CodSupOrder` int(10) NOT NULL,
  `NameProduct` varchar(50) DEFAULT NULL,
  `NameSupplier` varchar(30) DEFAULT NULL,
  `DateOrder` date DEFAULT NULL,
  `DeliverDate` date DEFAULT NULL,
  `Ud` int(10) DEFAULT NULL,
  `Price` decimal(10) DEFAULT NULL,
  PRIMARY KEY (`CodSupOrder`)

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `supplierOrders` VALUES (1, 'Botellas de licor', 'Distribuidora XYZ', '2023-05-10', '2023-05-15', 100, 150.50),
 (2, 'Cajas de cerveza', 'Distribuidora ABC', '2023-06-01', '2023-06-05', 50, 75.25),
 (3, 'Barriles de cerveza', 'Distribuidora XYZ', '2023-07-10', '2023-07-15', 10, 300.00),
 (4, 'Botellas de agua', 'Distribuidora AguaFresca', '2023-08-01', '2023-08-05', 200, 1.50),
 (5, 'Bolsas de hielo', 'Distribuidora FrioMax', '2023-09-10', '2023-09-15', 50, 10.99);

UNLOCK TABLES;

DROP TABLE IF EXISTS `merchanOrders`;
CREATE TABLE `merchanOrders`(
  `CodOrder` int(10) NOT NULL,
  `CodClient` int(10) NOT NULL,
  `Date` Date DEFAULT NULL,
  `TotalPrice` decimal(10) NOT NULL,
 
  PRIMARY KEY (`CodOrder`, `CodClient`),
  CONSTRAINT `CodClient_FK` FOREIGN KEY (`CodClient`)
  REFERENCES `clients` (`CodClient`)


) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `merchanOrders` VALUES
(1, 1, '2023-05-10', 2),
(2, 4, '2023-06-05', 5),
(3, 3, '2023-07-15', 1),
(4, 5, '2023-08-20', 3),
(5, 2, '2023-09-10', 4);

UNLOCK TABLES;


DROP TABLE IF EXISTS `merchanOrdersDetails`;


CREATE TABLE `merchanOrdersDetails`(
  `CodOrder` int(10) NOT NULL,
  `CodProduct` int(10) NOT NULL,
  `Ud` int(10) DEFAULT NULL,
  `AdressClient` varchar(50) DEFAULT NULL,
 
  PRIMARY KEY (`CodOrder`, `CodProduct`)

 

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `merchanOrdersDetails` VALUES
(1, 1, 2, 'Calle Mayor 1, 28001 Madrid'),
(1, 2, 3, 'Plaza del Sol 2, 08001 Barcelona'), 
(2, 3, 1, 'Calle Gran Vía 3, 46001 Valencia'), 
(2, 4, 5, 'Avenida Diagonal 4, 08009 Barcelona'),
(3, 2, 2, 'Calle Alcalá 5,28005 Madrid'); 


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
