DROP DATABASE IF EXISTS BOMBERS;

CREATE DATABASE BOMBERS;

USE BOMBERS;

CREATE TABLE TORN
	(codi_torn int (4) PRIMARY KEY,
	descr varchar (50));

CREATE TABLE EQUIP
	(codi_equip int(4) PRIMARY KEY,
	nom varchar(12));

CREATE TABLE BOMBER
	(codi_bomber int(4) PRIMARY KEY not null,
	nom varchar(12),
	cognom varchar(12),
	data_naix date,
	dni char(9) unique,
	adresa varchar(40),
	telefon int(9),
	codi_eq int(4),
	lloc varchar(40) not null),
	CONSTRAINT FK_EQUIP_BOMBER FOREIGN KEY (codi_bomber)
	REFERENCES EQUIP (codi_equip)
	);

CREATE TABLE TREBALL
	(codi_torn int (4),
	codi_bom int (4),
	data_inici date,
	data_fi date,
	PRIMARY KEY (codi_torn,codi_bom),
	CONSTRAINT FK_BOMBER_TREBALL FOREIGN KEY (codi_bom)
	REFERENCES BOMBER (codi_bomber),
	CONSTRAINT FK_TORN_TREBALL FOREIGN KEY (codi_torn)
	REFERENCES TORN (codi_torn)
	);

CREATE TABLE PETICIONS
	(id_pet int(4),
	id_equip varchar(10) not null),
	CONSTRAINT FK_EQUIP_PETICIONS FOREIGN KEY (id_pet)
	REFERENCES EQUIP (codi_equip)
	);

CREATE TABLE PARC
	(codi_parc int(4) PRIMARY KEY,
	nom varchar(20),
	adresa varchar(20),
	telf int(9),
	categoria varchar(20),
	id_equip varchar(10),
	CONSTRAINT FK_EQUIP_PARC FOREIGN KEY (codi_parc)
	REFERENCES EQUIP (codi_equip)
	);

CREATE TABLE REP
	(id_parc int(10),
	id_pet int(10),
	data date,
	hora time),
	PRIMARY KEY (id_parc,id_pet),
	CONSTRAINT FK_EQUIP_REP FOREIGN KEY (id_parc)
	REFERENCES PARC (codi_parc),
	CONSTRAINT FK_PETICIONS_REP FOREIGN KEY (id_pet)
	REFERENCES PETICIONS (id_pet)
	);


CREATE TABLE COTXE
	(n_matricul char(7) PRIMARY KEY,
	model varchar(20),
	marca varchar(20),
	data_compra date,
	data_rev date,
	id_parc varchar(10) not null,
	CONSTRAINT FK_PAR_COTXE FOREIGN KEY (n_matricul)
	REFERENCES PARC (id_parc)
	);
	