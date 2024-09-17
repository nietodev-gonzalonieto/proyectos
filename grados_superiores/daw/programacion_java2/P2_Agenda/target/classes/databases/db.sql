-- Crear base de dades

CREATE DATABASE IF NOT EXISTS db;
USE db;

-- Crear taula

CREATE TABLE IF NOT EXISTS person (
   dni VARCHAR(9) PRIMARY KEY,
   forename VARCHAR(30) NOT NULL,
   surname1 VARCHAR(30) NOT NULL,
   surname2 VARCHAR(30) NOT NULL,
   age INTEGER(3) NOT NULL
);

-- Crear usuari

CREATE USER 'admin'@'localhost'
IDENTIFIED BY 'admin';

GRANT ALL ON db.*
TO 'admin'@'localhost'
WITH GRANT OPTION;

-- Inserir registres

INSERT INTO person
VALUES ('47906071S', 'Luis Vicente', 'Nieto', 'Rodríguez', 31);

INSERT INTO person
VALUES ('45125295P', 'Jonathan', 'Zurita', 'Jaimez', 19);
