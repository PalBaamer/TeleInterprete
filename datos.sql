
INSERT INTO empresa VALUES(1,'312748X','Telefonica',null,28001,Madrid,Madrid,MJ,6987563241);

INSERT INTO empresa VALUES(2,'04417456P','CEACC',null,01026,Galicia,Coruna ,Pepe,6987563241);

INSERT INTO empresa VALUES(3,'654783M','Ayto.Madrid',null,28001,Madrid,Madrid,Manuela,6987563241);

INSERT INTO empresa VALUES(4,'66985120Q','Vithas',null,28056,Madrid,Madrid,Jesus,6987563241);


INSERT INTO nombreServicio VALUES(1,'ATENCIÓN AL CLIENTE');
INSERT INTO nombreServicio VALUES(2,'PAGO FACTURAS');
INSERT INTO nombreServicio VALUES(3,'MEDICO CABECERA');
INSERT INTO nombreServicio VALUES(4,'ESPECIALISTA');
INSERT INTO nombreServicio VALUES(5,'EDUCACION PRIMARIA');
INSERT INTO nombreServicio VALUES(6,'EDUCACION SECUNDARIA');
INSERT INTO nombreServicio VALUES(7,'EDUCACION UNIVERSITARIOS');
INSERT INTO nombreServicio VALUES(8,'FORMACION ACADEMICA ');
INSERT INTO nombreServicio VALUES(9,'OTROS');

INSERT INTO servicio VALUES(1,1,'VENTA');



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
  id_nomServicio int(2) AUTO_INCREMENT,
  nombre varchar(50),
   PRIMARY KEY (id_nomServicio)
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
