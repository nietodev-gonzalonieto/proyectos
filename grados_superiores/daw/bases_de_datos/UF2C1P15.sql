DROP DATABASE IF EXISTS CAMPINGS;

CREATE DATABASE CAMPINGS;

USE CAMPINGS;

CREATE TABLE CAMPISTA
	(id_campista varchar(10) PRIMARY KEY,
	adresa varchar(20),
	telefon char(9),
	dni char(9) not null unique,
	nom varchar(20));

CREATE TABLE TENDA
	(id_tenda varchar(10),
	id_campista varchar(10),
	mida varchar(10),
	PRIMARY KEY (id_tenda,id_campista));

CREATE TABLE CARAVANA
	(matricula char(7) PRIMARY KEY,
	id_campista varchar(10));

CREATE TABLE PARCELLA
	(id_camping varchar(10),
	numero int(10),
	localitzacio varchar(20),
	PRIMARY KEY (id_camping,numero));

CREATE TABLE PETITA
	(id_camping varchar(10),
	numero varchar(10),
	id_campista varchar(10),
	id_tenda varchar(10),
	PRIMARY KEY (id_camping,numero));

CREATE TABLE GRAN
	(id_camping varchar(10),
	numero varchar(10),
	matricula char(9),
	aigua varchar(10),
	llum varchar(10),
	PRIMARY KEY (id_camping,numero));

CREATE TABLE SERVEI
	(id_servei char(4) PRIMARY KEY,
	descripcio varchar(10));	

CREATE TABLE DONA
	(id_camping char(4),
	id_servei char(4),
	PRIMARY KEY (id_camping,id_servei));

CREATE TABLE INSPECCIO
	(num_inspeccio char(4) PRIMARY KEY,
	mes varchar(10));

CREATE TABLE HI_HA
	(id_camping varchar(10),
	id_servei char(4),
	num_inspeccio char(4),
	valoracio varchar(10) not null,
	PRIMARY KEY (id_camping,id_servei,num_inspeccio));

CREATE TABLE DATA
	(data date);

CREATE TABLE HA_ESTAT
	(id_campista varchar(10),
	data date,
	id_camping char(4),
	num_pers_ocupacio int(2),
	num_dies_estansa int(10));
