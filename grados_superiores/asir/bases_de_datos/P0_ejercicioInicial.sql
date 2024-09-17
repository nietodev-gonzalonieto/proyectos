-- Gonzalo Nieto Maneu 30/09/2021
-- AVALUACIÓ INICIAL BBDD ASIX

-- 1. Connectat a ORACLE amb l’usuari SYSTEM
-- sqplus /nolog
-- conn /as sysdba
-- conn usuario

-- 2. Canvia-li el password i posa-li ROOT
ALTER USER SYSTEM IDENTIFIED BY ROOT;

-- 3. Crea un usuari nou amb el teu nom. Dona-li un password.
CREATE USER gonzalo IDENTIFIED BY asdasd123;

-- 4. Dona privilegis a aquest usuari.
GRANT ALL PRIVILEGES TO gonzalo;

-- 5. Connecta’t amb aquest usuari nou.
-- conn gonzalo;

-- 6. Crea dues taules.
--     a. Taula llibres amb els següents atributs: Codi, títol, autor, preu.
CREATE TABLE llibres (
    Codi INT NOT NULL,
    titol VARCHAR(255),
    autor VARCHAR(255),
    preu NUMBER(5,2),
    PRIMARY KEY (Codi)
);

--     b. Taula autors amb els següents atributs: Codi, nom, cognoms, any de naixement.
CREATE TABLE autors (
    Codi INT NOT NULL,
    nom VARCHAR(255),
    cognoms VARCHAR(255),
    anyNaixement DATE,
    PRIMARY KEY (Codi)
);

-- No oblidis la clau primària i la clau forana.
ALTER TABLE llibres
ADD CONSTRAINT fk_codi FOREIGN KEY (codi) REFERENCES autors(codi);

-- 7. Inserta 5 registres a cada taula.
-- Llibres:
INSERT INTO llibres (codi, titol, autor, preu) VALUES (1, 'Pinocho', 'Alejandro', 10);
INSERT INTO llibres (codi, titol, autor, preu) VALUES (2, 'Blancanieves', 'Maluma', 14);
INSERT INTO llibres (codi, titol, autor, preu) VALUES (3, 'Bella Durmiente', 'Bad', 13);
INSERT INTO llibres (codi, titol, autor, preu) VALUES (4, 'Harry Potter', 'Pepe', 17);
INSERT INTO llibres (codi, titol, autor, preu) VALUES (5, 'Los Juegos del Hambre', 'Mariano', 6);

-- Autors:
INSERT INTO autors (codi, nom, cognoms, anyNaixement) VALUES (1, 'Pepe', 'Gomez', '05/05/1995');
INSERT INTO autors (codi, nom, cognoms, anyNaixement) VALUES (2, 'Mariano', 'Ramirez', '05/05/1996');
INSERT INTO autors (codi, nom, cognoms, anyNaixement) VALUES (3, 'Alejandro', 'Mora', '05/05/1997');
INSERT INTO autors (codi, nom, cognoms, anyNaixement) VALUES (4, 'Maluma', 'Baby', '05/05/1998');
INSERT INTO autors (codi, nom, cognoms, anyNaixement) VALUES (5, 'Bad', 'Bunny', '05/05/1999');
COMMIT;

-- 8. Fes una consulta que et tregui la informació de cada llibre i la informació del seu autor.
SELECT *
FROM autors
INNER JOIN llibres ON autors.nom = llibres.autor;

-- 9. Fes una consulta que retorni els autors que no tenen cap llibre a la base de dades.
-- Usuario sin libro:
INSERT INTO autors (codi, nom, cognoms, anyNaixement) VALUES (6, 'Gonzalo', 'Gomez', '27/07/2001');

-- Consulta:
SELECT * FROM autors WHERE nom NOT IN (SELECT autor FROM llibres);

-- 10. Modifica l’any de naixement dels autors, fes-los 5 anys més joves.
UPDATE autors
SET anyNaixement = ADD_MONTHS(anyNaixement, -60)
WHERE codi >= 0;

-- 11. Esborra els autors que no tinguin llibre.
DELETE FROM autors WHERE nom NOT IN (SELECT autor FROM llibres);

-- Tal com està estructurada aquesta base de dades no es pot esborrar ja que la clau forana apunta a la taula de llibres.
-- Hauríem d’eliminar aquesta relació per poder esborrar el registre.

-- 12. Fes un procediment en PL/SQL que incrementi el preu un percentatge que reb per paràmetre.
CREATE OR REPLACE PROCEDURE IncrementarPreu (preu_increment NUMBER, codi_llibre NUMBER)
IS
BEGIN
    UPDATE llibres
    SET preu = ((preu * preu_increment) / 100) + preu
    WHERE codi = codi_llibre;
END IncrementarPreu;
/

-- Execució del procediment:
DECLARE
    preu_increment NUMBER(4,2) := 1.25;
    codi_llibre NUMBER(2) := 1;
BEGIN
    IncrementarPreu(preu_increment, codi_llibre);
END;
/

-- Consulta per veure els resultats:
SELECT preu FROM llibres WHERE codi = 1;

-- 13. Fes una funció en PL/SQL que rebi per paràmetre el nom d’un autor i retorni el nombre de llibres que té aquest autor a la nostra BBDD.
CREATE OR REPLACE FUNCTION MostrarLibrosAut (nom_aut VARCHAR2)
RETURN NUMBER
IS
    total_llibres NUMBER;
BEGIN
    SELECT COUNT(titol) INTO total_llibres
    FROM llibres
    WHERE autor = (SELECT au.codi
                   FROM autors au
                   WHERE au.nom = nom_aut);
    RETURN total_llibres;
END MostrarLibrosAut;
/

-- Execució de la funció:
DECLARE
    nom_aut VARCHAR2(30) := 'Alejandro';
BEGIN
    DBMS_OUTPUT.PUT_LINE('El total de libros de ' || nom_aut || ' es de ' || MostrarLibrosAut(nom_aut));
END;
/
