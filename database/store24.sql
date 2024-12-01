--
-- Base de datos: `store24`
--
CREATE DATABASE IF NOT EXISTS `store24` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

USE `store24`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
    `Nombre` varchar(30) NOT NULL,
    `Clave` text NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = latin1 COLLATE = latin1_swedish_ci;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO
    `administrador` (`Nombre`, `Clave`)
VALUES (
        'admin',
        '21232f297a57a5a743894a0e4a801fc3'
    ),
    (
        'joarevalos',
        '827ccb0eea8a706c4c34a16891f84e7b'
    );

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
    `CodigoCat` varchar(30) NOT NULL,
    `Nombre` varchar(30) NOT NULL,
    `Descripcion` text NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = latin1 COLLATE = latin1_swedish_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO
    `categoria` (
        `CodigoCat`,
        `Nombre`,
        `Descripcion`
    )
VALUES (
        'C1',
        'Cámaras',
        'Haz fotos luminosas con facilidad'
    ),
    (
        'C2',
        'Multimedia',
        'Articulos de entretenimiento y diversión'
    ),
    (
        'C3',
        'Móviles',
        'Teléfonos celulares smartphones'
    ),
    (
        'C4',
        'Portátiles',
        'Portátiles para juegos, entretenimiento y productividad'
    );

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
    `RUC` varchar(30) NOT NULL,
    `Nombre` varchar(30) NOT NULL,
    `NombreCompleto` varchar(70) NOT NULL,
    `Apellido` varchar(70) NOT NULL,
    `Clave` text NOT NULL,
    `Direccion` varchar(200) NOT NULL,
    `Telefono` int(20) NOT NULL,
    `Email` varchar(30) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = latin1 COLLATE = latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle`
--

CREATE TABLE `detalle` (
    `NumPedido` int(20) NOT NULL,
    `CodigoProd` varchar(30) NOT NULL,
    `CantidadProductos` int(20) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = latin1 COLLATE = latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
    `CodigoProd` varchar(30) NOT NULL,
    `NombreProd` varchar(127) NOT NULL,
    `CodigoCat` varchar(30) NOT NULL,
    `Precio` decimal(30, 2) NOT NULL,
    `Modelo` varchar(30) NOT NULL,
    `Marca` varchar(30) NOT NULL,
    `Stock` int(20) NOT NULL,
    `RUCProveedor` varchar(30) NOT NULL,
    `Imagen` varchar(150) NOT NULL,
    `Nombre` varchar(30) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = latin1 COLLATE = latin1_swedish_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO
    `producto` (
        `CodigoProd`,
        `NombreProd`,
        `CodigoCat`,
        `Precio`,
        `Modelo`,
        `Marca`,
        `Stock`,
        `RUCProveedor`,
        `Imagen`,
        `Nombre`
    )
VALUES (
        '0001',
        'Cámara Fujifilm Instax Mini 12 Instantánea',
        'C1',
        1062000.00,
        'Instax mini 12',
        'Fujifilm',
        23,
        '0001782',
        'Camara Fujifilm Instax Mini 12 Instantanea.jpg',
        'admin'
    ),
    (
        '0002',
        'Speaker Amazon Echo Spot Alexa Smart 2024 con Reloj',
        'C2',
        850000.00,
        'Echo Spot',
        'Amazon',
        22,
        '0001783',
        'Speaker Amazon Echo Spot Alexa Smart 2024 con Reloj.jpg',
        'admin'
    ),
    (
        '0003',
        'Apple iPhone 15 Pro Max BE/A Super Retina XDR OLED',
        'C3',
        14697000.00,
        '15 Pro Max',
        'Apple',
        10,
        '0001781',
        'Apple iPhone 15 Pro Max BE A.jpg',
        'admin'
    ),
    (
        '0004',
        'Notebook MSI Cyborg 15.6\" Core i7-13620H RTX 4050 6 GB',
        'C4',
        12870000.00,
        'A13VE-218  16GB/DDR5 512GB/SSD',
        'MSI',
        14,
        '0001781',
        'Notebook MSI Cyborg 15 A13VE-218 15.6 Intel Core i7-13620H RTX 4050 6 GB.jpg',
        'admin'
    );

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
    `RUCProveedor` varchar(30) NOT NULL,
    `NombreProveedor` varchar(30) NOT NULL,
    `Direccion` varchar(200) NOT NULL,
    `Telefono` int(20) NOT NULL,
    `PaginaWeb` varchar(30) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = latin1 COLLATE = latin1_swedish_ci;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO
    `proveedor` (
        `RUCProveedor`,
        `NombreProveedor`,
        `Direccion`,
        `Telefono`,
        `PaginaWeb`
    )
VALUES (
        '0001781',
        'Apple',
        'One Apple Park Way, Cupertino, California',
        123456789,
        'apple.com'
    ),
    (
        '0001782',
        'Fujifilm',
        'Minato, Tokio, Japón',
        123456789,
        'fujifilm.com'
    ),
    (
        '0001783',
        'Amazon',
        'Seattle, Washington, Estados Unidos',
        123456789,
        'amazon.com'
    ),
    (
        '0001784',
        'MSI',
        'Distrito de Zhonghe, en la ciudad de Nueva Taipei, Taiwán',
        123456789,
        'msi.com'
    );

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
    `NumPedido` int(20) NOT NULL,
    `Fecha` varchar(150) NOT NULL,
    `RUC` varchar(30) NOT NULL,
    `Descuento` int(20) NOT NULL,
    `TotalPagar` decimal(30, 2) NOT NULL,
    `Estado` varchar(150) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = latin1 COLLATE = latin1_swedish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador` ADD PRIMARY KEY (`Nombre`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria` ADD PRIMARY KEY (`CodigoCat`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente` ADD PRIMARY KEY (`RUC`);

--
-- Indices de la tabla `detalle`
--
ALTER TABLE `detalle`
ADD KEY `NumPedido` (`NumPedido`),
ADD KEY `CodigoProd` (`CodigoProd`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
ADD PRIMARY KEY (`CodigoProd`),
ADD KEY `CodigoCat` (`CodigoCat`),
ADD KEY `NITProveedor` (`RUCProveedor`),
ADD KEY `Agregado` (`Nombre`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor` ADD PRIMARY KEY (`RUCProveedor`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
ADD PRIMARY KEY (`NumPedido`),
ADD KEY `NIT` (`RUC`),
ADD KEY `NIT_2` (`RUC`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
MODIFY `NumPedido` int(20) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle`
--
ALTER TABLE `detalle`
ADD CONSTRAINT `detalle_ibfk_8` FOREIGN KEY (`CodigoProd`) REFERENCES `producto` (`CodigoProd`) ON UPDATE CASCADE,
ADD CONSTRAINT `detalle_ibfk_9` FOREIGN KEY (`NumPedido`) REFERENCES `venta` (`NumPedido`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
ADD CONSTRAINT `producto_ibfk_7` FOREIGN KEY (`CodigoCat`) REFERENCES `categoria` (`CodigoCat`) ON UPDATE CASCADE,
ADD CONSTRAINT `producto_ibfk_8` FOREIGN KEY (`RUCProveedor`) REFERENCES `proveedor` (`RUCProveedor`) ON UPDATE CASCADE,
ADD CONSTRAINT `producto_ibfk_9` FOREIGN KEY (`Nombre`) REFERENCES `administrador` (`Nombre`);

--
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
ADD CONSTRAINT `venta_ibfk_1` FOREIGN KEY (`RUC`) REFERENCES `cliente` (`RUC`) ON UPDATE CASCADE;

COMMIT;