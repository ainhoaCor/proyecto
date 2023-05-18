SELECT * FROM pedidos WHERE CodigoPedido=1 AND CodigoCliente=5;

SELECT * FROM productos WHERE CodigoProducto=0005;

INSERT INTO productos (CodigoProducto, Nombre, Gama, Dimensiones, Proveedor, Descripcion, CantidadEnStock, PrecioVenta, PrecioProveedor) VALUES (001, 'destornillador', 'Herramietas', '10x3', 'fre', 'destorni dewd', 8, 6, 5);

INSERT INTO gamasproductos VALUES ('espirituales', 'da calma', '', '');

SELECT city.Name FROM city INNER JOIN country ON CountryCode=Code WHERE country.Name="Albania";

CREATE TABLE `votaciones` (
  `equipo` char(50),
  `puntos` float
) ;