
INSERT INTO provincias VALUES(02,'Albacete');
INSERT INTO provincias VALUES(10,'Cáceres');
INSERT INTO provincias VALUES(11,'Cádiz');
INSERT INTO provincias VALUES(12,'Castellón/Castelló');
INSERT INTO provincias VALUES(13,'Ciudad Real');
INSERT INTO provincias VALUES(14,'Córdoba');
INSERT INTO provincias VALUES(15,'Coruña, A');
INSERT INTO provincias VALUES(16,'Cuenca');
INSERT INTO provincias VALUES(17,'Girona');
INSERT INTO provincias VALUES(18,'Granada');
INSERT INTO provincias VALUES(19,'Guadalajara');
INSERT INTO provincias VALUES(20,'Gipuzkoa');
INSERT INTO provincias VALUES(21,'Huelva');
INSERT INTO provincias VALUES(22,'Huesca');
INSERT INTO provincias VALUES(23,'Jaén');
INSERT INTO provincias VALUES(24,'León');
INSERT INTO provincias VALUES(25,'Lleida');
INSERT INTO provincias VALUES(26,'Rioja, La');
INSERT INTO provincias VALUES(27,'Lugo');
INSERT INTO provincias VALUES(28,'Madrid');
INSERT INTO provincias VALUES(29,'Málaga');
INSERT INTO provincias VALUES(30,'Murcia');
INSERT INTO provincias VALUES(31,'Navarra');
INSERT INTO provincias VALUES(32,'Ourense');
INSERT INTO provincias VALUES(33,'Asturias');
INSERT INTO provincias VALUES(34,'Palencia');
INSERT INTO provincias VALUES(35,'Palmas, Las');
INSERT INTO provincias VALUES(36,'Pontevedra');
INSERT INTO provincias VALUES(37,'Salamanca');
INSERT INTO provincias VALUES(38,'Santa Cruz de Tenerife');
INSERT INTO provincias VALUES(39,'Cantabria');
INSERT INTO provincias VALUES(40,'Segovia');
INSERT INTO provincias VALUES(41,'Sevilla');
INSERT INTO provincias VALUES(42,'Soria');
INSERT INTO provincias VALUES(43,'Tarragona');
INSERT INTO provincias VALUES(44,'Teruel');
INSERT INTO provincias VALUES(45,'Toledo');
INSERT INTO provincias VALUES(46,'Valencia/València');
INSERT INTO provincias VALUES(47,'Valladolid');
INSERT INTO provincias VALUES(48,'Bizkaia');
INSERT INTO provincias VALUES(49,'Zamora');
INSERT INTO provincias VALUES(50,'Zaragoza');
INSERT INTO provincias VALUES(51,'Ceuta');
INSERT INTO provincias VALUES(52,'Melilla');
INSERT INTO provincias VALUES(01,'Araba/Álava');
INSERT INTO provincias VALUES(03,'Alicante/Alacant');
INSERT INTO provincias VALUES(04,'Almería');
INSERT INTO provincias VALUES(05,'Ávila');
INSERT INTO provincias VALUES(06,'Badajoz');
INSERT INTO provincias VALUES(07,'Balears, Illes');
INSERT INTO provincias VALUES(08,'Barcelona');
INSERT INTO provincias VALUES(09,'Burgos');


INSERT INTO empresa VALUES(1,'312748X','Telefonica',null,28001,'Madrid',28,'MJ',6987563241);

INSERT INTO empresa VALUES(2,'04417456P','CEACC',null,01026,'Galicia',15 ,'Pepe',6987563241);

INSERT INTO empresa VALUES(3,'654783M','Ayto.Madrid',null,28001,'Madrid',28,'Manuela',6987563241);

INSERT INTO empresa VALUES(4,'66985120Q','Vithas',null,28056,'Madrid',28,'Jesus',6987563241);


INSERT INTO categoria VALUES(1,'ATENCIÓN AL CLIENTE');
INSERT INTO categoria VALUES(2,'PAGO FACTURAS');
INSERT INTO categoria VALUES(3,'MEDICO CABECERA');
INSERT INTO categoria VALUES(4,'ESPECIALISTA');
INSERT INTO categoria VALUES(5,'EDUCACION PRIMARIA');
INSERT INTO categoria VALUES(6,'EDUCACION SECUNDARIA');
INSERT INTO categoria VALUES(7,'EDUCACION UNIVERSITARIOS');
INSERT INTO categoria VALUES(8,'FORMACION ACADEMICA ');
INSERT INTO categoria VALUES(9,'OTROS');



INSERT INTO interprete VALUES(1,'Paloma','Baameiro','Ruiz','05315823V','general romero',689456123,'baameiro.r.paloma@gmail.com','interprete1',0,0,01234567891011234567);

INSERT INTO interprete VALUES(2,'David','Monty','Python','03525668V','general romero',689456123,'david@gmail.com','interprete2',1,1,01234567891011234567);

INSERT INTO interprete VALUES(3,'Milena','Cuba','Ruiz','31663180H','general romero',689456123,'milena@gmail.com','interprete3',1,1,01234567891011234567,1);


INSERT INTO usuario VALUES(1,'Puri','Garcia','Ahumado','54786231G','Plaza Castilla3',64598712,'puri@gmail.com','usuario1');
INSERT INTO usuario VALUES(2,'Esperanza','Petrov','Menendez','54786231G','Plaza Castilla3',64598712,'espe@gmail.com','usuario2');
INSERT INTO usuario VALUES(4, 'Gema', 'Aranda', 'Cascón', '74658954Y', 'Antonio Nebrija, 6', 28, '658743204', 'gema@gmail.com', 'usuario4', 1);


INSERT INTO servicio VALUES(1,1,1,'reclamacion','Gran vía, 56',1);
INSERT INTO servicio VALUES(2,3,4,'oncologia','Hosp.12 Oct',1);
INSERT INTO servicio VALUES(3,1,2,'pago facturas','Gran vía, 56',1);
INSERT INTO servicio VALUES(4,1,9,'exposición marte','Gran vía, 56',1);


INSERT INTO cita VALUES(1,1,3,1,"2018-11-21","19:00:00","21:00:00",2);
INSERT INTO cita VALUES(2,2,3,1,"2018-11-22","11:00:00","15:00:00",4);

INSERT INTO cita VALUES(34,3,3,4,"2019-06-22","15:00:00","16:00:00",1);
INSERT INTO cita VALUES(35,3,3,3,"2019-11-22","18:00:00","21:00:00",3);

select cita.dia,cita.hora_inicio,servicio.centro,servicio.especialidad,cita.hora_fin from servicio,cita where servicio.id_servicio=cita.id_servicio and servicio.id_empresa=1 and  hora_fin is not null;

