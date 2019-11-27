
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
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE categoria (
  id_categoria int(11) AUTO_INCREMENT,
  nombre varchar(50),
   PRIMARY KEY (id_categoria)
);


-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `servicio`
--

CREATE TABLE servicio (
  id_servicio int(3) AUTO_INCREMENT,
  id_empresa int(3) default null,
  nombre VARCHAR(40) NOT NULL,
  id_categoria int(11),
  centro VARCHAR(40) NOT NULL,
  PRIMARY KEY (id_servicio),
 CONSTRAINT FK_servicio_empresa FOREIGN KEY (id_empresa) REFERENCES empresa(id_empresa),
 CONSTRAINT FK_categoria FOREIGN KEY (id_categoria) REFERENCES categoria(id_categoria)
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
  urgencias boolean DEFAULT FALSE,
  categoria int(2) NOT NULL DEFAULT 1,
  nCC int(20) DEFAULT NULL,
  PRIMARY KEY (id_interprete)
);

-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE usuario (
  id_usuario int(3) AUTO_INCREMENT,
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

CREATE TABLE citas (
  id_citas int(10)AUTO_INCREMENT,
  id_usuario int(3),
  id_interprete int(3),
  id_servicio int(3),
  dia DATE,
  hora_inicio TIME,
  hora_fin TIME DEFAULT '00:00:00',
  PRIMARY KEY (id_citas),
  CONSTRAINT FK_usuario FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario),
  CONSTRAINT FK_interprete FOREIGN KEY (id_interprete) REFERENCES interprete(id_interprete),
  CONSTRAINT FK_servicio FOREIGN KEY (id_servicio) REFERENCES servicio(id_servicio)
  
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