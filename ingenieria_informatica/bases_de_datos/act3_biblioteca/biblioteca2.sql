# Exercici de la biblioteca
# una opcio possible

drop database if exists Biblioteca;
create database Biblioteca;
use Biblioteca;

create table autor (
	nom_autor varchar(40) not null,
	nacionalitat varchar(20),
	primary key (nom_autor)
)engine=innodb;

create table obra (
	codi_obra int(5) zerofill not null auto_increment,
	titol varchar(50),
	primary key(codi_obra)
)engine=innodb;

create table escriu (
	nom_autor varchar(40) not null,
	codi_obra int(5) zerofill not null,
	ordre int(2),
	primary key (nom_autor,codi_obra),
	foreign key (nom_autor) references autor(nom_autor),
	foreign key (codi_obra) references obra(codi_obra)
)engine=innodb;

create table volum(
	codi_obra int(5) zerofill not null,
	num_volum int(3) not null,
	titol varchar(50),
	primary key(codi_obra, num_volum),
	foreign key (codi_obra) references obra(codi_obra)
)engine=innodb;

create table edicio(
	codi_obra int(5) zerofill not null,
	num_volum int(3) not null,
	num_edicio int(3) not null,
	titol varchar(50),
	editorial varchar(40),
	any_ed year(4),
	num_planes int(4),
	isbn varchar(15),
	primary key(codi_obra, num_volum, num_edicio),
	foreign key (codi_obra, num_volum) references volum(codi_obra, num_volum)
)engine=innodb;

create table exemplar(
	codi_exemplar int(5) zerofill not null auto_increment,
	codi_obra int(5) zerofill not null,
	num_volum int(3) not null,
	num_edicio int(3) not null,
	tipus_prestec enum('normal','consulta_sala','cap_de_setmana'),
	primary key (codi_exemplar),
	foreign key (codi_obra, num_volum, num_edicio) references edicio(codi_obra, num_volum, num_edicio)
)engine=innodb;

create table tema(
	nom_tema varchar(30) not null,
	descripcio varchar(50),
	primary key (nom_tema)
)engine=innodb;

create table es(
	codi_obra int(5) zerofill not null,
	nom_tema varchar(30) not null,
	primary key (codi_obra, nom_tema),
	foreign key (codi_obra) references obra(codi_obra),
	foreign key (nom_tema) references tema(nom_tema)
)engine=innodb;

create table subtema(
	nom_tema1 varchar(30) not null,
	nom_tema2 varchar(30) not null,
	primary key (nom_tema1, nom_tema2),
	foreign key (nom_tema1) references tema(nom_tema),
	foreign key (nom_tema2) references tema(nom_tema)
)engine=innodb;

create table soci(
	dni varchar(9) not null,
	nom varchar(30),
	data_alta date,
	adreca varchar(50),
	primary key (dni)
)engine=innodb;

# La taula data l hem eliminat

create table prestecs(
	codi_exemplar int(5) zerofill not null,
	data_ini date not null,
	dni varchar(9) not null,
	data_fi date,
	prorrogat enum('si','no'),
	primary key (codi_exemplar, data_ini),
	foreign key (codi_exemplar) references exemplar(codi_exemplar),
	foreign key (dni) references soci(dni)
)engine=innodb;

create table r1(
	dni varchar(9) not null,
	codi_obra int(5) zerofill not null,
	data_reserva date,
	primary key (dni, codi_obra),
	foreign key (dni) references soci(dni),
	foreign key (codi_obra) references obra(codi_obra)
)engine=innodb;

create table r2(
	dni varchar(9) not null,
	codi_obra int(5) zerofill not null,
	num_volum int(3) not null,
	data_reserva date,
	primary key (dni, codi_obra, num_volum),
	foreign key (dni) references soci(dni),
	foreign key (codi_obra, num_volum) references volum(codi_obra, num_volum)
)engine=innodb;

create table r3(
	dni varchar(9) not null,
	codi_obra int(5) zerofill not null,
	num_volum int(3) not null,
	num_edicio int(3) not null,
	data_reserva date,
	primary key (dni, codi_obra, num_volum, num_edicio),
	foreign key (dni) references soci(dni),
	foreign key (codi_obra, num_volum, num_edicio) references edicio(codi_obra, num_volum, num_edicio)
)engine=innodb;

