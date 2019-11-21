
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE empresa (
  id_empresa int(3) AUTO_INCREMENT,
  cif varchar(12)NOT NULL,
  nombre varchar(20) NOT NULL,
  direccion varchar(40) NULL,
  cp int(5)NOT NULL,
  provincia int(9)  NULL,
  ciudad varchar(30) NULL,
  personal_contacto varchar(20) NOT NULL,
  telefono_contacto int(9) NOT NULL,
  PRIMARY KEY (id_empresa)
);

-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `servicio`
--

CREATE TABLE servicio (
  id_servicio int(3) AUTO_INCREMENT,
  id_empresa int(3) default null,
  nombre VARCHAR(40) NOT NULL,
  tipo VARCHAR(40) NULL ,
  centro VARCHAR(40) NOT NULL,
  PRIMARY KEY (id_servicio),
CONSTRAINT FK_servicio_empresa FOREIGN KEY (id_empresa) REFERENCES empresa(id_empresa)
);

--
-- Estructura de tabla para la tabla `SERVIOnOMBRE`
--

CREATE TABLE nombreServicio (
  id_nomServicio int(11) AUTO_INCREMENT,
  id_servicio int(3) default null,
  nombre varchar(50),
   PRIMARY KEY (id_nomServicio),
   CONSTRAINT FK_servicio_nombre FOREIGN KEY (id_servicio) REFERENCES servicio(id_servicio)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `interprete`
--

CREATE TABLE interprete (
  id_interprete int(3) AUTO_INCREMENT,
  nombre varchar(20) NOT NULL,
  apellido varchar(15)DEFAULT NULL,
  apellido2 varchar(15) DEFAULT NULL,
  dni varchar(9) NOT NULL,
  direccion varchar(20)DEFAULT NULL,
  telefono varchar(9) DEFAULT NULL,
  email varchar(50) NOT NULL,
  contrasena varchar(20) NOT NULL,
  nCC int(20) DEFAULT NULL,
  PRIMARY KEY (id_interprete)
);

-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE usuario (
  id_usuario int(11) AUTO_INCREMENT,
  nombre varchar(20) NOT NULL,
  apellido varchar(15)DEFAULT NULL,
  apellido2 varchar(15) DEFAULT NULL,
  dni varchar(9) NOT NULL,
  direccion varchar(20)DEFAULT NULL,
  telefono varchar(9) DEFAULT NULL,
  email varchar(50) NOT NULL,
  contrasena varchar(20) NOT NULL,
   PRIMARY KEY (id_usuario)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE administrador (
  id_admin int(11) NOT NULL,
  categoria int(11) NOT NULL,
  nombre int(11) NOT NULL,
  email datetime NOT NULL,
  contrasena datetime NOT NULL,
  PRIMARY KEY (id_admin)
);
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincias`
--

CREATE TABLE provincias (
  id_provincias int(11) NOT NULL AUTO_INCREMENT,
  nombre varchar(50),
   PRIMARY KEY (id_provincias)
);
