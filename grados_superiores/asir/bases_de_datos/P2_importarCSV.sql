-- Gonzalo Nieto Maneu
-- PRÀCTICA IMPORTAR UN CSV

-- Objectiu:
-- En aquesta pràctica recollirem dades publiques d’internet i crearem una taula a partir d’aquestes dades.
-- Després realitzarem consultes de temàtica molt actual.

-- 1. Baixar el fitxer CSV de dades del COVID per comarca i sexe des de la web de la generalitat.
-- URL: https://analisi.transparenciacatalunya.cat/browse?q=covid&sortBy=relevance

-- 2. Baixa el fitxer CSV.

-- 3. Crear una taula per a inserir les dades del CSV.
-- Suposant que el CSV té els següents camps: comarca, sexe, data, tipus_test, nombre_casos

CREATE TABLE covid_dades (
    comarca VARCHAR(100),
    sexe VARCHAR(20),
    data VARCHAR(20), -- Temporalment com a VARCHAR per tractar el format de la data
    tipus_test VARCHAR(50),
    nombre_casos INT
);

-- 4. Executar el següent per modificar la columna de data per fer-la compatible.
ALTER TABLE covid_dades CHANGE COLUMN data data VARCHAR(20) NULL DEFAULT NULL;

-- Importar les dades des del CSV (Aquest pas es fa des de la interfície o amb l'ordre LOAD DATA INFILE, depenent del sistema).
-- Comprovar que les dades s'han importat correctament.
-- Per exemple:
-- LOAD DATA INFILE '/path/to/covid.csv'
-- INTO TABLE covid_dades
-- FIELDS TERMINATED BY ','
-- LINES TERMINATED BY '\n'
-- IGNORE 1 LINES;

-- 5. Modificar el format de la data després de la importació:
UPDATE covid_dades
SET data = CONCAT_WS('-', SUBSTR(data, 7, 4), SUBSTR(data, 1, 2), SUBSTR(data, 4, 2));

-- 6. Convertir la columna de data a DATE:
ALTER TABLE covid_dades CHANGE COLUMN data data DATE NULL DEFAULT NULL;

-- Ara que la taula està preparada, procedim a fer les consultes.

-- 1. Quants registres hi ha a la taula?
SELECT COUNT(*) AS total_registres FROM covid_dades;

-- 2. Entre quines dates tenim dades?
SELECT MIN(data) AS data_inici, MAX(data) AS data_final FROM covid_dades;

-- 3. Quants casos positius hi ha hagut a la teva comarca?
-- Suposant que la teva comarca és 'Barcelona', pots substituir-la per la teva.
SELECT SUM(nombre_casos) AS total_casos
FROM covid_dades
WHERE comarca = 'Barcelona';

-- 4. Quin és el dia que més casos hi ha hagut a la teva població?
SELECT data, MAX(nombre_casos) AS max_casos
FROM covid_dades
WHERE comarca = 'Barcelona'
GROUP BY data
ORDER BY max_casos DESC
LIMIT 1;

-- 5. Es fan més PCR o Test d’antigen?
SELECT tipus_test, SUM(nombre_casos) AS total_tests
FROM covid_dades
GROUP BY tipus_test
ORDER BY total_tests DESC;
