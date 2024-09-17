DROP DATABASE ACTIVITAT5;

CREATE DATABASE ACTIVITAT5;

USE ACTIVITAT5;

CREATE TABLE RUTES;
	(id_rutes int(4) PRIMARY KEY,
	 nom varchar(20),
	 tipus varchar(20));

CREATE TABLE ETAPES;
	(id_etapes int(4) PRIMARY KEY,
     id_rutes int(4),
     temps time,
     dificultat varchar(20),
     desnivell int(3),
     data_creacio date,
     distancia int(4),
     CONSTRAINT FK_RUTES_ETAPES FOREIGN KEY (id_rutes)
	 REFERENCES RUTES (id_rutes)
	 );

CREATE TABLE POBLACIONS;
	(nom_lloc_turistic varchar(20) PRIMARY KEY,
	 id_etapes int(4),
	 preu_visita int(2),
	 hora_obertura time,
	 hora_tancament time,
	 CONSTRAINT FK_ETAPES_POBLACIONS FOREIGN KEY (id_etapes)
	 REFERENCES ETAPES (id_etapes)
	 );