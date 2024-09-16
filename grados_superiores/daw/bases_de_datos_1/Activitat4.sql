DROP DATABASE IF EXISTS ACTIVITAT4;

CREATE DATABASE ACTIVITAT4;

USE ACTIVITAT4;

CREATE TABLE JUGADORS
	(id_jugador int(4) PRIMARY KEY,
	nom_equip varchar(20),
	nom_jugador varchar(20),
	genere char(1),
	data_naixement date,
	lloc_naixement varchar(20),
	nacionalitat varchar(20),
	mail varchar(20),
	CONSTRAINT FK_EQUIPS_JUGADORS FOREIGN KEY (nom_equip)
	REFERENCES EQUIPS (nom_equip)
	);

CREATE TABLE EQUIPS
	nom_equip varchar(20) PRIMARY KEY,
	mail varchar(20),
	poblacio varchar(20),
	data_creacio date,
	web varchar (20).
	ciutat varchar(20) NOT NULL,
	cp int(5) NOT NULL,
	carrer varchar(20));

CREATE TABLE PARTITS
	(id_partits int(4) PRIMARY KEY,
	nom_equip varchar(20),
	local varchar(20),
	visitant varchar(20),
	data date,
	resultat int (4),
	CONSTRAINT FK_EQUIPS_PARTITS FOREIGN KEY (nom_equip)
	REFERENCES EQUIPS (nom_equip)
	);
 
CREATE TABLE JORNADES
	(numero_jornada int(2) PRIMARY KEY,
	data date);
