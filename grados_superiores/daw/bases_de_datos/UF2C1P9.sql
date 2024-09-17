-- Gonzalo Nieto - SQL

-- 1. Modificar l’ofici i el salari de l’empleat de codi 7500
UPDATE empleats
SET ofici = 'Tècnic', salari = salari * 2
WHERE emp_no = 7500;

-- 2. Modificar l’ofici i el salari de SONIA basat en JORDI
UPDATE empleats
SET ofici = (SELECT ofici FROM empleats WHERE nom = 'JORDI'),
    salari = (SELECT salari FROM empleats WHERE nom = 'JORDI') * 0.9
WHERE nom = 'SONIA';

-- 3. Augmentar un 10% el salari dels nous empleats
UPDATE empleats
SET salari = salari * 1.1
WHERE emp_no IN (SELECT emp_no FROM empleats_nous);

UPDATE empleats_nous
SET salari = salari * 1.1;

-- 4. Cobrar un 20% més que la mitjana dels salaris (amb subconsulta)
UPDATE empleats e
SET salari = (SELECT AVG(salari) * 1.2 FROM (SELECT salari FROM empleats) AS subquery)
WHERE emp_no = 4800;

-- 5. Modificar departament 200 a MEDI AMBIENT i localitzar-lo a LLEIDA
UPDATE depart
SET nom_dept = 'MEDI AMBIENT', loc = 'LLEIDA'
WHERE dept_no = 200;

-- 6. Augmentar un 10% el salari dels empleats dels departaments 10, 20 i 30
UPDATE empleats
SET salari = salari * 1.1
WHERE dept_no IN (10, 20, 30);

-- 7. Promoció dels operaris del departament 10 a tècnics amb un 25% més de salari
UPDATE empleats
SET ofici = 'Tècnic', salari = salari * 1.25
WHERE dept_no = 10 AND ofici = 'Operari';

-- 8. Modificar salaris dels programadors del departament informàtica i empleats de facturació a 18000
-- a) Sabem el número dels departaments
UPDATE empleats
SET salari = 18000
WHERE dept_no IN (30, 10) AND ofici IN ('Programador', 'Facturació');

-- b) No coneixem els números dels departaments
UPDATE empleats
SET salari = 18000
WHERE dept_no IN (SELECT dept_no FROM depart WHERE nom_dept IN ('Informàtica', 'Facturació'))
AND ofici IN ('Programador', 'Facturació');

-- 9. Inserir l’empleada ‘NURIA’ a la taula EMPLEATS
INSERT INTO empleats (emp_no, nom, ofici, salari, dept_no)
SELECT 4619, 'NURIA', ofici, salari, dept_no
FROM empleats
WHERE emp_no = 5400;

-- 10. Modificar el nom i el lloc del departament 100 per igualar al departament 20
UPDATE depart
SET nom_dept = (SELECT nom_dept FROM depart WHERE dept_no = 20),
    loc = (SELECT loc FROM depart WHERE dept_no = 20)
WHERE dept_no = 100;

-- 11. Reduir a la meitat el sou dels empleats del departament amb més empleats
UPDATE empleats
SET salari = salari / 2
WHERE dept_no = (SELECT dept_no FROM (SELECT dept_no, COUNT(*) AS num_empleats
                                        FROM empleats
                                        GROUP BY dept_no
                                        ORDER BY num_empleats DESC
                                        LIMIT 1) AS dept_max);

-- 12. Igualtat salarial pels nous empleats: establir el salari a 18000 euros
UPDATE empleats
SET salari = 18000
WHERE emp_no IN (SELECT emp_no FROM empleats_nous);

UPDATE empleats_nous
SET salari = 18000;

-- 13. Afegir a EMPLEATS els empleats antics o nous sense duplicats, treballant al departament de comptabilitat
INSERT INTO empleats (emp_no, nom, ofici, salari, dept_no)
SELECT emp_no, nom, 'Comptable', salari, (SELECT dept_no FROM depart WHERE nom_dept = 'Comptable')
FROM (SELECT emp_no, nom, ofici, salari FROM empleats_antics
      UNION
      SELECT emp_no, nom, ofici, salari FROM empleats_nous) AS empleats_unics
WHERE emp_no NOT IN (SELECT emp_no FROM empleats);

-- 14. Igualtat salarial pels nous empleats basat en salari mig dels antics
UPDATE empleats_nous
SET salari = (SELECT AVG(salari) * 1.1 FROM empleats_antics);

-- 15. L’empleat Jordi ha de cobrar un 10% més que la mitja dels salaris del seu departament
UPDATE empleats e
SET salari = (SELECT AVG(salari) * 1.1
              FROM empleats
              WHERE dept_no = (SELECT dept_no FROM empleats WHERE nom = 'Jordi'))
WHERE nom = 'Jordi';

-- 16. Reestructurar departaments
-- a) Conèixer el codi dels departaments antics
-- Crear nous departaments i traslladar empleats
INSERT INTO depart (dept_no, nom_dept, loc)
VALUES (101, 'Executiva', 'Barcelona'),
       (102, 'Presidència', 'Barcelona'),
       (15, 'COMERCIAL', 'Tarragona'),
       (16, 'ADMINISTRATIU', 'Tarragona');

-- Traslladar empleats de DIRECCIO a Executiva
UPDATE empleats
SET dept_no = 101
WHERE dept_no = 100;

-- Traslladar empleats de FACTURACIO i VENDES a COMERCIAL, excepte operaris a ADMINISTRATIU
UPDATE empleats
SET dept_no = CASE
                  WHEN ofici = 'Operari' THEN 16
                  ELSE 15
              END
WHERE dept_no IN (10, 20);

-- b) Conèixer el nom dels departaments antics
-- Crear nous departaments
INSERT INTO depart (dept_no, nom_dept, loc)
SELECT 101, 'Executiva', 'Barcelona'
FROM depart
WHERE nom_dept = 'DIRECCIO';

INSERT INTO depart (dept_no, nom_dept, loc)
SELECT 102, 'Presidència', 'Barcelona'
FROM depart
WHERE nom_dept = 'DIRECCIO';

INSERT INTO depart (dept_no, nom_dept, loc)
SELECT 15, 'COMERCIAL', 'Tarragona'
FROM depart
WHERE nom_dept IN ('FACTURACIO', 'VENDES');

INSERT INTO depart (dept_no, nom_dept, loc)
SELECT 16, 'ADMINISTRATIU', 'Tarragona'
FROM depart
WHERE dept_no = (SELECT dept_no FROM depart WHERE nom_dept = 'FACTURACIO');

-- Traslladar empleats de DIRECCIO a Executiva
UPDATE empleats
SET dept_no = (SELECT dept_no FROM depart WHERE nom_dept = 'Executiva')
WHERE dept_no = (SELECT dept_no FROM depart WHERE nom_dept = 'DIRECCIO');

-- Traslladar empleats de FACTURACIO i VENDES a COMERCIAL, excepte operaris a ADMINISTRATIU
UPDATE empleats
SET dept_no = CASE
                  WHEN ofici = 'Operari' THEN (SELECT dept_no FROM depart WHERE nom_dept = 'ADMINISTRATIU')
                  ELSE (SELECT dept_no FROM depart WHERE nom_dept = 'COMERCIAL')
              END
WHERE dept_no IN (SELECT dept_no FROM depart WHERE nom_dept IN ('FACTURACIO', 'VENDES'));

-- 17. Afegir nou empleat 'Anton' i eliminar departaments sense empleats
INSERT INTO empleats (emp_no, nom, ofici, salari, dept_no)
VALUES (1298, 'Anton', 'Ofici', 21000, (SELECT dept_no FROM depart WHERE nom_dept = 'ADMINISTRATIU'));

-- Eliminar departaments sense empleats
DELETE FROM depart
WHERE dept_no NOT IN (SELECT DISTINCT dept_no FROM empleats);

-- Eliminar empleat amb el salari més alt de departaments amb més de dos empleats
DELETE FROM empleats
WHERE emp_no = (SELECT emp_no
                FROM empleats
                WHERE dept_no IN (SELECT dept_no FROM empleats GROUP BY dept_no HAVING COUNT(*) > 2)
                ORDER BY salari DESC
                LIMIT 1);

-- 18. Actualitzacions a BD_BIBLIOTECA
-- Esborrar soci amb adreça incorrecta
DELETE FROM socis
WHERE nom = 'David Lloret';

-- Eliminar préstecs abans de 1997
DELETE FROM prestecs
WHERE data < '1997-01-01';

-- Esborrar llibre de codi 2
-- Si hi ha restriccions, eliminar les línies relacionades abans
DELETE FROM linies_prestec
WHERE llibre_id = 2;

DELETE FROM llibres
WHERE llibre_id = 2;
