-- Gonzalo Nieto - SQL

-- Insercions a la taula DEPART
INSERT INTO depart (dept_no, nom_dept, loc)
VALUES (10, 'Informatica', 'Barcelona'),
(20, 'Vendes', 'Madrid'),
(30, 'Finances', 'Valencia');

-- Insercions a la taula EMPLEATS
INSERT INTO empleats (emp_no, nom, ofici, salari, dept_no)
VALUES (1001, 'Joan', 'Analista', 25000, 10),
(1002, 'Maria', 'Venedor', 18000, 20),
(1003, 'Pere', 'Comptable', 22000, 30);

-- Insercions a EMPLEATS sense especificar les columnes
INSERT INTO empleats
VALUES (1004, 'Anna', 'Analista', 26000, 10),
(1005, 'Luis', 'Venedor', 19000, 20),
(1006, 'Carla', 'Comptable', 23000, 30);

-- Insercions a la taula EMPLEATS_NOUS
INSERT INTO empleats_nous (nom, salari, emp_no)
VALUES ('Jaume', 24000, 2001),
('Nuria', 22000, 2002),
('Carles', 26000, 2003);

-- Insercions a la taula EMPLEATS_ANTICS
INSERT INTO empleats_antics (nom, salari, emp_no)
VALUES ('Eva', 28000, 3001),
('Toni', 25000, 3002),
('Laura', 27000, 3003);

-- Insercions a EMPLEATS_NOUS especificant les columnes
INSERT INTO empleats_nous (nom, salari, emp_no)
VALUES ('Sandra', 21000, 2004),
('Marta', 22500, 2005),
('Pau', 23500, 2006);

-- Inserció a EMPLEATS_NOUS
INSERT INTO empleats_nous (nom, salari, emp_no)
VALUES ('Sílvia', 21000, 3010);

-- Inserció a EMPLEATS amb la data d'alta actual
INSERT INTO empleats (emp_no, nom, ofici, salari, dept_no, data_alta)
VALUES (3010, 'Sílvia', 'Informàtica', 21000, 10, CURDATE());

-- Crear el departament TEMPORAL
INSERT INTO depart (dept_no, nom_dept, loc)
VALUES (0, 'TEMPORAL', 'Undefined');

-- Inserir els empleats de la taula EMPLEATS_NOUS a EMPLEATS
INSERT INTO empleats (emp_no, nom, ofici, salari, dept_no, data_alta)
SELECT emp_no, nom, 'TEMPORAL', salari, 0, CURDATE()
FROM empleats_nous
WHERE emp_no NOT IN (SELECT emp_no FROM empleats);

-- Inserir l’empleat David amb el mateix ofici que els altres empleats del departament 10
INSERT INTO empleats (emp_no, nom, ofici, salari, dept_no, data_alta)
SELECT 1579, 'David', ofici, salari, 10, CURDATE()
FROM empleats
WHERE dept_no = 10
LIMIT 1;
