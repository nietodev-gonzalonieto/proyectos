-- Gonzalo Nieto Maneu 04/11/2021

-- 1. Crear una vista que se llame dep30 que contiene el apellido, oficio y el salario de los empleados del departamento 30.
CREATE VIEW dep30 AS SELECT apellido, oficio, salario FROM emple WHERE dept_no = 30;

-- 2. Hacer una descripción de la vista creada anteriormente.
DESC dep30;

-- 3. Crear un sinónimo asociado a la vista creada anteriormente llamado EMPLE_30.
CREATE SYNONYM EMPLE_30 FOR dep30;

-- 4. Hacer una consulta que muestre el contenido de la vista dep30.
SELECT * FROM dep30;

-- 5. Crear o reemplazar la vista dando nombre a las columnas ape, ofi y sal.
CREATE OR REPLACE VIEW dep30 (ape, ofi, sal) AS
SELECT apellido, oficio, salario FROM emple WHERE dept_no = 30;

-- 6. Hacer una consulta al diccionario de las vistas creadas junto con sus textos.
SELECT view_name, text FROM user_views;

-- 7. Borrar la vista dep30.
DROP VIEW dep30;

-- 8. Consultar los apellidos de los vendedores de la vista dep30.
SELECT ape FROM dep30 WHERE ofi = 'VENDEDOR';

-- 9. Modificar la vista dep30, cambiando el apellido 'MARTIN' a 'Martin' y modificando el salario a 200000.
UPDATE dep30 SET ape = 'Martin', sal = 200000 WHERE ape = 'MARTIN';

-- 10. Consultar la vista y la tabla asociada para comprobar los resultados.
SELECT ape, sal FROM dep30 WHERE ape = 'Martin';

-- 11. Crear una vista a partir de la tabla depart.
CREATE VIEW v_depart AS SELECT * FROM depart;

-- 12. Insertar valores en la vista v_depart.
INSERT INTO v_depart VALUES (70, 'VENTA', 'ALBACETE');

-- 13. Borrar el departamento 30 y observar cómo desaparece de la tabla depart.
DELETE FROM v_depart WHERE dept_no = 30;

-- Nota: Apuntan claves foráneas, por lo que es necesario borrar estas para poder eliminar el departamento.

-- 14. A partir de las tablas depart y emple, crear una vista que contenga el emp_no, apellido, dept_no y dnombre.
CREATE OR REPLACE VIEW VISTAEMPLEDEPART (emp_no, apellido, dept_no, dnombre) AS
SELECT emple.emp_no, apellido, emple.dept_no, dnombre
FROM emple, depart
WHERE emple.dept_no = depart.dept_no;

-- 15. Intentar insertar una fila en la vista creada.
INSERT INTO VISTAEMPLEDEPART VALUES (90, 8000, 'GONZALO', 'COMPRAS');

-- Nota: No se puede insertar ya que esta vista cruza 2 tablas y no sabe dónde insertar los datos.
