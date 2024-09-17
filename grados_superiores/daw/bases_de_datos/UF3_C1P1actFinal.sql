
create database biblioteca;
create type datos_ediciones as(editorial text, num_paginas INTEGER, formato text);
create type genero as enum ('aventura', 'accion', 'fantasia', 'policiaca');
create table libros (id serial PRIMARY KEY, titulo text, autor text, ediciones datos_ediciones[],genero genero);


create type datos_direccion as (provincia text, ciudad text, calle text, numero INTEGER, codigo_postal INTEGER);
create type seccion as enum ('A','B','C','D');
create table biblioteca (id serial PRIMARY KEY, direccion datos_direccion, num_pisos INTEGER, secciones seccion[]);


create table personas (id serial PRIMARY KEY, nombre text, apellidos text, telefonos text[]);

create table empleados (sueldo REAL, biblioteca text, seccion_asignada text) INHERITS (personas);
alter table empleados add CONSTRAINT id_empleados PRIMARY KEY (id);


create table clientes (direccion text, num_prestamos INTEGER) INHERITS (personas);
alter table clientes add CONSTRAINT id_clientes PRIMARY KEY (id);


CREATE TABLE libros_biblioteca(id_biblioteca INTEGER not null REFERENCES biblioteca(id), id_libro INTEGER not null REFERENCES libros(id));
DROP TABLE empleados;
CREATE TABLE empleados (sueldo REAL, bibloteca INTEGER not null REFERENCES biblioteca(id), seccion_asignada text) INHERITS (personas);
CREATE TABLE libros_prestados(id_cliente INTEGER not null REFERENCES clientes(id), id_libro INTEGER not null REFERENCES libros(id));


INSERT INTO libros (titulo, autor, ediciones, genero)
values ('titulo1' , 'autor1', array[ROW ('editorial1', 1, 'pdf'),ROW ('editorial2', 43, 'pdf')]::datos_ediciones[], 'aventura');
INSERT INTO libros (titulo, autor, ediciones, genero)
values ('titulo2' , 'autor2', array[ROW ('editorial3', 2, 'pdf'),ROW ('editorial4', 43, 'pdf')]::datos_ediciones[], 'accion');
INSERT INTO libros (titulo, autor, ediciones, genero)
values ('titulo1' , 'autor1', array[ROW ('editorial5', 3, 'pdf'),ROW ('editorial6', 43, 'pdf')]::datos_ediciones[], 'fantasia');
INSERT INTO libros (titulo, autor, ediciones, genero)
values ('libroConMuchasPags' , 'autor1', array[ROW ('editorial7', 4, 'pdf'),ROW ('editorial8', 131, 'pdf')]::datos_ediciones[], 'policiaca');
INSERT INTO libros (titulo, autor, ediciones, genero)
values ('titulo1' , 'autor1', array[ROW ('editorial8', 5, 'pdf'),ROW ('editorial9', 43, 'pdf')]::datos_ediciones[], 'aventura');

INSERT INTO biblioteca (direccion, num_pisos, secciones)
values (ROW ('Madrid', 'Alcorcon', 'Aranjuez', 14, 34), 31, array['A','B']::seccion[]);
INSERT INTO biblioteca (direccion, num_pisos, secciones)
values (ROW ('Barcelona', 'Martorell', 'Dandy', 33, 1), 4, array['C']::seccion[]);
INSERT INTO biblioteca (direccion, num_pisos, secciones)
values (ROW ('Tarragona', 'Vendrell', 'CamiMar', 10, 4), 1, array['D']::seccion[]);
INSERT INTO biblioteca (direccion, num_pisos, secciones)
values (ROW ('Valencia', 'Valencia', 'Paella', 21, 0), 4, array['B']::seccion[]);
INSERT INTO biblioteca (direccion, num_pisos, secciones)
values (ROW ('Andorra', 'YoutuberLandia', 'Ibai', 100, 2), 4, array['D']::seccion[]);


INSERT INTO clientes(nombre, apellidos, telefonos, direccion, num_prestamos)
values ('Gonzalo', 'Nieto Maneu','{"656517193"}','AvPepe',15);
INSERT INTO clientes(nombre, apellidos, telefonos, direccion, num_prestamos)
values ('Vicente', 'Nieto Rodri','{"656517193"}','AvPepe',15);
INSERT INTO clientes(nombre, apellidos, telefonos, direccion, num_prestamos)
values ('Ramon', 'PonmeUn10','{"656517193"}','AvPepe',15);
INSERT INTO clientes(nombre, apellidos, telefonos, direccion, num_prestamos)
values ('Jaume', 'Muste','{"656517193"}','AvPepe',15);
INSERT INTO clientes(nombre, apellidos, telefonos, direccion, num_prestamos)
values ('Mbappe', 'Kilyan','{"656517193"}','AvPepe',15);

INSERT INTO empleados(nombre, apellidos, telefonos, sueldo, bibloteca, seccion_asignada)
values ('Gonzalo', 'Nieto Maneu','{"656517193"}',800.00, 2, 'A');
INSERT INTO empleados(nombre, apellidos, telefonos, sueldo, bibloteca, seccion_asignada)
values ('Pepe', 'Nieto Maneu','{"656517193"}',900.00, 1, 'B');
INSERT INTO empleados(nombre, apellidos, telefonos, sueldo, bibloteca, seccion_asignada)
values ('Manolo', 'Nieto Maneu','{"656517193"}',1800.00, 2, 'D');
INSERT INTO empleados(nombre, apellidos, telefonos, sueldo, bibloteca, seccion_asignada)
values ('Marta', 'Nieto Maneu','{"656517193"}',2800.00, 3, 'A');
INSERT INTO empleados(nombre, apellidos, telefonos, sueldo, bibloteca, seccion_asignada)
values ('Bruce', 'Nieto Maneu','{"656517193"}',500.00, 4, 'C');

INSERT INTO libros_biblioteca(id_biblioteca, id_libro)
values (1, 2);
INSERT INTO libros_biblioteca(id_biblioteca, id_libro)
values (3, 2);
INSERT INTO libros_biblioteca(id_biblioteca, id_libro)
values (1, 3);
INSERT INTO libros_biblioteca(id_biblioteca, id_libro)
values (1, 1);
INSERT INTO libros_biblioteca(id_biblioteca, id_libro)
values (4, 5);

INSERT INTO libros_prestados(id_cliente, id_libro)
values (1, 5);
INSERT INTO libros_prestados(id_cliente, id_libro)
values (2, 4);
INSERT INTO libros_prestados(id_cliente, id_libro)
values (3, 3);
INSERT INTO libros_prestados(id_cliente, id_libro)
values (4, 2);
INSERT INTO libros_prestados(id_cliente, id_libro)
values (5, 1);

INSERT INTO personas(nombre, apellidos, telefonos)
values('gonzalo', 'nieto maneu','{"654232525"}');
INSERT INTO personas(nombre, apellidos, telefonos)
values('pepe', 'nieto maneu','{"654232525"}');
INSERT INTO personas(nombre, apellidos, telefonos)
values('manolo', 'nieto maneu','{"654232525"}');
INSERT INTO personas(nombre, apellidos, telefonos)
values('juan', 'nieto maneu','{"654232525"}');
INSERT INTO personas(nombre, apellidos, telefonos)
values('lucas', 'nieto maneu','{"654232525"}');


SELECT titulo FROM libros WHERE ediciones[array_length(ediciones,1)].num_paginas>100;

SELECT  (direccion).codigo_postal FROM bibliotecas WHERE 'D' = ANY(secciones);

(SELECT telefonos[1] FROM empleados AS tlf_empleados) UNION (SELECT telefonos[1] FROM clientes AS tlf_clientes);

SELECT nombre, apellidos FROM clientes WHERE num_prestamos<5;

SELECT id from personas where id NOT in (Select id from clientes) and id not in (Select id from empleados);
SELECT * FROM ONLY personas;

CREATE FUNCTION edicionesMenos50(id_libro INTEGER)
RETURNS INTEGER AS $$
DECLARE
ediciones INT;
BEGIN
ediciones := (SELECT count(*) FROM libros l WHERE id = id_libro AND l.ediciones[array_length(l.ediciones,1)].num_paginas<50);
RETURN ediciones;
END;
$$ LANGUAGE plpgsql;


CREATE TABLE libros_modificados (
    id_serial INTEGER PRIMARY KEY,
    id_libro INTEGER,
    updated_at TIMESTAMP NOT NULL DEFAULT NOW(),
    CONSTRAINT PRIMARY KEY
);

CREATE FUNCTION funcionUpdateLibros()
    RETURNS TRIGGER AS $$
BEGIN
    INSERT INTO libros_modificados(id_libro) VALUES(NEW.id);
END;
$$ LANGUAGE plpgsql;

CREATE TRIGGER trigger_update_libros
    AFTER UPDATE
    ON libros
    EXECUTE PROCEDURE funcionUpdateLibros();

BEGIN
    UPDATE libros SET genero = enum_last(NULL::genero) WHERE id = 2;
    UPDATE libros SET genero = enum_first(NULL::genero) WHERE id = 3;
    COMMIT;
END;