-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-09-2023 a las 07:24:55
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `online_store`
--
CREATE DATABASE IF NOT EXISTS `online_store` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `online_store`;

DELIMITER $$
--
-- Procedimientos
--
DROP PROCEDURE IF EXISTS `InsertarUsuario`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `InsertarUsuario` (IN `p_nombre` VARCHAR(100), IN `p_username` VARCHAR(100), IN `p_pass` VARCHAR(100), IN `p_email` VARCHAR(100), IN `p_numberofdocument` VARCHAR(20), IN `p_numbercellphone` VARCHAR(20), IN `p_typeofdocument` VARCHAR(10), IN `p_gender` VARCHAR(10))   BEGIN
    INSERT INTO usuarios (p_nombre, p_username, p_pass, p_email, p_numberofdocument, p_numbercellphone, p_typeofdocument, p_gender)
    VALUES (p_nombre, p_username, p_pass, p_email, p_numberofdocument, p_numbercellphone, p_typeofdocument, p_gender);
END$$

DROP PROCEDURE IF EXISTS `sp_select_all_products`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_select_all_products` ()   BEGIN
SELECT product_id,product_name,product_descriptions,product_code,product_value,product_img,ST.status_name,TPRO.typeProduct_name 
FROM product PRO 
INNER JOIN status ST ON PRO.status_id=ST.status_id
INNER JOIN typeproduct TPRO ON PRO.typeProduct_id=TPRO.typeProduct_id
WHERE ST.status_id=1;
END$$

DROP PROCEDURE IF EXISTS `sp_select_all_products_like`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_select_all_products_like` (IN `nameProdcut` VARCHAR(40))   BEGIN
SELECT product_id,product_name,product_descriptions,product_code,product_value,product_img,ST.status_name,TPRO.typeProduct_name 
FROM product PRO 
INNER JOIN status ST ON PRO.status_id=ST.status_id
INNER JOIN typeproduct TPRO ON PRO.typeProduct_id=TPRO.typeProduct_id
WHERE product_name LIKE CONCAT('%', nameProdcut , '%') AND ST.status_id=1;
END$$

DROP PROCEDURE IF EXISTS `userModules`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `userModules` (IN `idUser` INT(11))   BEGIN
    SELECT MO.nameModule, MO.route FROM rol_modules RM 
INNER JOIN module MO ON RM.idModule=MO.idModule
WHERE RM.idRol=(SELECT idRol FROM usuarios WHERE p_Id=idUser);
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `document_type`
--

DROP TABLE IF EXISTS `document_type`;
CREATE TABLE `document_type` (
  `DocumentType_id` int(11) NOT NULL,
  `DocumentType_name` varchar(60) NOT NULL,
  `DocumentType_descriptions` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `document_type`
--

INSERT INTO `document_type` (`DocumentType_id`, `DocumentType_name`, `DocumentType_descriptions`) VALUES
(1, 'CC', 'Cedula'),
(2, 'TI', 'Tarjeta de Identidad '),
(4, 'CE', 'CÉDULA DE EXTRANJERIA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gendertype`
--

DROP TABLE IF EXISTS `gendertype`;
CREATE TABLE `gendertype` (
  `GenderType_id` int(11) NOT NULL,
  `GenderType_name` varchar(60) NOT NULL,
  `GenderType_descriptions` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `gendertype`
--

INSERT INTO `gendertype` (`GenderType_id`, `GenderType_name`, `GenderType_descriptions`) VALUES
(1, 'M', 'Masculino'),
(2, 'F', 'Femenino');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `Id` int(100) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Description` text NOT NULL,
  `Images` varchar(100) NOT NULL,
  `description_detailed` text NOT NULL,
  `category` int(11) NOT NULL,
  `due_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`Id`, `Name`, `Description`, `Images`, `description_detailed`, `category`, `due_date`) VALUES
(1, 'Nevera Haceb', 'Nuevo dispensador slim Nevera clase T, apta incluso para los climas mas extremos,Control electrónico con 5 niveles de temperatura,Congelamiento rápido,Bajo nivel de ruido de 43 Db', '../../assets/icons/img_products/img.jpg', 'La Nevera HACEB no frost de 226 Lts. Cuenta con control interactivo interno, y puedes elegir en sus 5 niveles de temperatura se gún tu necesidad, maneja alarma de puerta abierta. Espacios maximizados, optima distribución e iluminación LED. Además, posee tecnología de frescura envolvente para mayor conservación de tus alimentos.', 1, '2023-08-31'),
(2, 'Lavadora  Lg', 'Motor Smart Inverter con 10 años de garantía\r\nCiclo Pre-Lavado + Normal, la lavdaora se encarga del lavado completo,Smart Motion optimizan el lavado de diferentes tipos de prendas. Una combinación perfecta para un mejor cuidado, LoDecibel™ menos ruido y menor vibración,TurboDrum™,lavado más poderoso con corrientes de agua', '../../assets/icons/img_products/img1.jpg', 'Lavadora LG Smart Inverter con 10 años de garantía, tiene un rendimiento de lavado superior, más limpio, más higiénico, El Motor Smart Inverter es confiable, silencioso y duradero, ajusta la energía según la velocidad y la fuerza que requiere cada movimiento del tambor, así controla con eficiencia el consumo energético. Obtén un control preciso de los movimientos del tambor y más ahorro de energía. Con la tecnología Smart Motion y sus 3 movimientos optimizan el lavado de diferentes tipos de prendas. Una combinación perfecta para un mejor cuidado. Con LoDecibel™ que proporciona menos ruido y menor vibración.', 1, '2023-08-31'),
(3, 'Estufa Abba', 'Ahorra tiempo cocinando. Fogón 35% más potente,Parrilla antideslizante, mayor estabilidad de recipientes,Gratinador en curvas, para recetas crocantes y doradas,Quemador ABC para fácil conversión entre gases,Evita fugas de gas gracias al sistema de termoseguridad', '../../assets/icons/img_products/img2.jpeg', 'La estufa Romero Reflex gas natural, te ofrece un contraste único de colores y acabados, la favorita de la marca HACEB en color negro para tener en casa. Cocina las recetas más exquisitas y con el toque crujiente y dorado que te brinda el gratinador, cocina en menos tiempo gracias al fogón más potente y evita fugas de gas, seguridad para ti y tu familia, Modelo incluye inyectores de gas para una fácil conversión. ¡Compra ya!', 1, '2023-08-31'),
(4, 'Carros Hot Wheels x 5 MATTEL\r\n', 'Cada paquete incluye 5 vehículos Hot Wheels, Cada paquete se vende por separado', './../../assets/icons/img_products/jug1.jpeg', 'Este paquete de 5 Carros de Juguete HOT WHEELS MATTEL es perfecta para iniciar o aumentar una colección, este set ofrece cinco veces más acción, son ideales para aficionados de autos de todas las edades, con detalles auténticos y llamativas decoraciones, estos paquetes son el regalo perfecto para los niños y los coleccionistas.', 3, '2023-08-31'),
(5, 'Tio rico', 'Desarrolla la estrategia y destreza mental,Juego de mesa para la diversión de grandes y pequeños', './../../assets/icons/img_products/jug2.jpeg', 'Sé rico, muy rico tanto y más que Tío Rico, con propiedades, casas y castillos buena renta y muchos pesos en efectivo. Su imagen renovada, con nuevas ilustraciones y dos modalidades de juego, permite un juego lleno de aventura y diversión. Descarga la APP y sigue el juego de forma interactiva. ¡Pídelo en línea y lleva este clásico de toda la vida!', 3, '2023-08-31'),
(6, 'Hot Wheels City Robo Tiburón MATTEL', 'Carga los autos en el lanzadorLos autos cambian de color,Impulsa el desarrollo de los niños', './../../assets/icons/img_products/jug3.jpeg', 'HOT WHEELS™ City está bajo el ataque de un gigantesco TIBURÓN. Los niños querrán averiguar si sus autos son lo suficientemente rápidos como para atravesar la ola sin ser devorados. Los niños comienzan su viaje heroico sumergiendo sus vehículos en la primera cámara de agua fría, luego levantan la palanca para cargar el vehículo en el lanzador y se preparan para correr a través de la ola. La boca del tiburón se abre y, si la acrobacia falla, los niños caen en su panza. Oh, no, eres almuerzo de tiburón. Cuando está en la panza del gigantesco tiburón robótico, el vehículo cambia de color mágicamente. Cómpralo ya.', 3, '2023-08-31'),
(7, 'Sandwich con papas fritas', 'Este producto esta hecho con los mejores ingredientes, los cuales son cultivados y utilizados para la preparacion de dicho alimento', './../../assets/icons/img_products/com.jpeg', 'Esta preparacion viene con tomate,lechuga,pan,salsa de tomate, papas fritas(A la francesa)', 2, '2023-08-31'),
(8, 'Ensalada fresca de vegetales', 'El opta con los mejores ingredientes, los cuales son cultivados de nuestras granjas y usados para la preparacion de esta rica preparacion', './../../assets/icons/img_products/com1.jpeg', 'La receta es hecha por campesinos... Nos reservamos el derecho de admisión', 2, '2023-08-31'),
(9, 'Hamburguesa Especial', 'Este preparacion esta realizada por uno de nuestro mejores chef el cual con todo el amor del mundo se dedico a crear esta hermosa receta', './../../assets/icons/img_products/com2.jpeg', 'La receta de este producto es secreta y jamás sera encontrada', 2, '2023-08-31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `status`
--

DROP TABLE IF EXISTS `status`;
CREATE TABLE `status` (
  `status_id` int(11) NOT NULL,
  `status_name` varchar(10) NOT NULL,
  `status_descriptions` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `status`
--

INSERT INTO `status` (`status_id`, `status_name`, `status_descriptions`) VALUES
(1, 'Active', 'This is Active'),
(2, ' Block', 'This is Block');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `typeproduct`
--

DROP TABLE IF EXISTS `typeproduct`;
CREATE TABLE `typeproduct` (
  `typeProduct_id` int(11) NOT NULL,
  `typeProduct_name` varchar(20) NOT NULL,
  `typeProduct_descriptions` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `typeproduct`
--

INSERT INTO `typeproduct` (`typeProduct_id`, `typeProduct_name`, `typeProduct_descriptions`) VALUES
(1, 'Electrodomesticos', 'Tecnología '),
(2, 'Mercado', 'Mercado'),
(3, 'Juguetes', 'Juguetes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `p_Id` int(50) NOT NULL,
  `p_nombre` varchar(100) NOT NULL,
  `p_username` varchar(100) NOT NULL,
  `p_pass` varchar(100) NOT NULL,
  `p_email` varchar(100) NOT NULL,
  `p_numberofdocument` int(50) NOT NULL,
  `p_numbercellphone` int(20) NOT NULL,
  `p_typeofdocument` int(11) NOT NULL,
  `p_gender` int(11) DEFAULT NULL,
  `Status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`p_Id`, `p_nombre`, `p_username`, `p_pass`, `p_email`, `p_numberofdocument`, `p_numbercellphone`, `p_typeofdocument`, `p_gender`, `Status`) VALUES
(1, 'Maicol', 'Santiago', '123', 'maic@gmail.com', 122001, 313674795, 1, 1, 0),
(2, 'Maicol', 'a', 'a', 'a@a.a', 12, 12, 1, 1, 0),
(3, 'Maicol', 'Maicol777', '1', 'a@a.a', 12, 123, 1, 1, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `document_type`
--
ALTER TABLE `document_type`
  ADD PRIMARY KEY (`DocumentType_id`);

--
-- Indices de la tabla `gendertype`
--
ALTER TABLE `gendertype`
  ADD PRIMARY KEY (`GenderType_id`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `sta` (`category`);

--
-- Indices de la tabla `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`status_id`);

--
-- Indices de la tabla `typeproduct`
--
ALTER TABLE `typeproduct`
  ADD PRIMARY KEY (`typeProduct_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`p_Id`),
  ADD KEY `Idgender` (`p_gender`),
  ADD KEY `Document` (`p_typeofdocument`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `document_type`
--
ALTER TABLE `document_type`
  MODIFY `DocumentType_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `gendertype`
--
ALTER TABLE `gendertype`
  MODIFY `GenderType_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `Id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `status`
--
ALTER TABLE `status`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `typeproduct`
--
ALTER TABLE `typeproduct`
  MODIFY `typeProduct_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `p_Id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `sta` FOREIGN KEY (`category`) REFERENCES `typeproduct` (`typeProduct_id`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `Document` FOREIGN KEY (`p_typeofdocument`) REFERENCES `document_type` (`DocumentType_id`),
  ADD CONSTRAINT `Idgender` FOREIGN KEY (`p_gender`) REFERENCES `gendertype` (`GenderType_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
