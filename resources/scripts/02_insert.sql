INSERT INTO sedes(nombresede) VALUES ('San Gil');
INSERT INTO sedes(nombresede) VALUES ('Piedecuesta');
INSERT INTO sedes(nombresede) VALUES ('Vélez');
INSERT INTO sedes(nombresede) VALUES ('Barrancabermeja');
INSERT INTO sedes(nombresede) VALUES ('Bucaramanga');

INSERT INTO facultades(codsede, nombrefacultad) VALUES (5,'Ciencias Socioeconómicas y Empresariales');
INSERT INTO facultades(codsede, nombrefacultad) VALUES (5,'Humanidades');
INSERT INTO facultades(codsede, nombrefacultad) VALUES (5,'Ciencias Naturales e Ingenierías');
INSERT INTO facultades(codsede, nombrefacultad) VALUES (5,'Salud');

INSERT INTO programas(codfacultad, nombreprograma) VALUES (3,'Ingeniería Industrial');
INSERT INTO programas(codfacultad, nombreprograma) VALUES (3,'Ingeniería Ambiental');
INSERT INTO programas(codfacultad, nombreprograma) VALUES (3,'Ingeniería Electrónica');
INSERT INTO programas(codfacultad, nombreprograma) VALUES (3,'Ingeniería de Telecomunicaciones');
INSERT INTO programas(codfacultad, nombreprograma) VALUES (3,'Ingeniería de Sistemas');
INSERT INTO programas(codfacultad, nombreprograma) VALUES (3,'Ingeniería Electromecánica');

INSERT INTO estudiantes(documento, nombres, apellidos, correo, fechanac, genero) VALUES ('666777','Lida Patricia','Ruiz Fontalvo','liparu@hotmail.com','1995-12-13',2);
INSERT INTO estudiantes(documento, nombres, apellidos, correo, fechanac, genero) VALUES ('111444','Pedro María','Guaracan','pemagu@hotmail.com','1993-10-21',1);
INSERT INTO estudiantes(documento, nombres, apellidos, correo, fechanac, genero) VALUES ('666777','Carlos Mario','Moreno Perez','camamope@hotmail.com','1997-10-10',1);
INSERT INTO estudiantes(documento, nombres, apellidos, correo, fechanac, genero) VALUES ('666777','Claudia Irene','Mendez García','clairmen@gmail.com','1995-12-25',2);
INSERT INTO estudiantes(documento, nombres, apellidos, correo, fechanac, genero) VALUES ('666777','Lucas Patricio','Luengas Aristizabal','lupaluar@msn.com','1990-10-15',1);

INSERT INTO relprogest(codprograma, codestudiante) VALUES (5,2);
INSERT INTO relprogest(codprograma, codestudiante) VALUES (5,3);
INSERT INTO relprogest(codprograma, codestudiante) VALUES (5,4);
INSERT INTO relprogest(codprograma, codestudiante) VALUES (5,5);
INSERT INTO relprogest(codprograma, codestudiante) VALUES (3,4);