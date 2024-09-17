DROP DATABASE ACTIVITAT8;

CREATE DATABASE ACTIVITAT8;

USE ACTIVITAT8;

CREATE TABLE CORREDORS;
	(id_corredors int(4) PRIMARY KEY,
	 sexe varchar(10),
	 data_naixement date,
	 email varchar(20));

CREATE TABLE CURSES;
	(edicio int(4) PRIMARY KEY,
	 id_corredors int(4),
	 data date,
	 provincia varchar (20),
	 posicio int(4),
	 desnivell int(3),
	 distancia int(4),
	 pais varchar(20)
	 temps time,
	 CONSTRAINT FK_CORREDORS_CURSES FOREIGN KEY (id_corredors)
	 REFERENCES CORREDORS (id_corredors)
	 );