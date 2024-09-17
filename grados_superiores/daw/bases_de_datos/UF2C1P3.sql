-- UF2C1P3 M02 – Gestió de Bases de Dades
-- DAW
-- Nom: Gonzalo Nieto Maneu

-- Consultes SQL

-- 1. Obtenir una llista de tots els clients (codi) amb comandes de l’any 1997.
SELECT clie, data
FROM comanda
WHERE YEAR(data) = 1997;

-- 2. Obtenir els clients (codi), numcomanda i mes d’aqueles comandes que s’hagin fet en mesos parells.
SELECT clie, numcomanda, MONTH(DATA) AS mes
FROM comanda
WHERE MONTH(DATA) MOD 2 = 0;

-- 3. Obtenir els empleats que fa més de 21 anys que treballen a l’empresa.
SELECT nom, contracte, YEAR(CURDATE()) - YEAR(contracte) AS anys
FROM empleats
WHERE YEAR(CURDATE()) - YEAR(contracte) > 21;

-- 4. Obtenir les diferents ciutats on tenim ubicades oficines.
SELECT DISTINCT ciutat
FROM oficines;

-- 5. Obtenir tots els empleats que no tenen cap.
SELECT nom
FROM empleats
WHERE cap IS NULL;

-- 6. Obtenir els directors d’oficines on s’ha superat l’objectiu de vendes.
SELECT dir, vendes, objectiu
FROM oficines
WHERE vendes > objectiu;

-- 7. Obtenir totes les comandes de fa 23 anys.
SELECT numcomanda, YEAR(CURDATE()) - YEAR(DATA) AS anys
FROM comanda
WHERE YEAR(CURDATE()) - YEAR(DATA) = 23;

-- 8. Obtenir els productes (codfab, codprod) que tingui alguna venda superior als 3000 € d’import.
SELECT DISTINCT codfab, codprod
FROM linia_comanda
WHERE import > 3000;

-- 9. Llistar els productes que la segona lletra del codi sigui una c o una e i que s’hagin demanat alguna vegada superant les 9 unitats.
SELECT DISTINCT codfab, codprod
FROM linia_comanda
WHERE (SUBSTRING(codprod, 2, 1) = 'c' OR SUBSTRING(codprod, 2, 1) = 'e')
  AND quant > 9;

-- 10. Llistar els productes que el codi de fabricació contingui la subcadena ‘ei’ i que el codprod acabe en ‘5c’.
SELECT codfab, codprod
FROM productes
WHERE codfab LIKE '%ei%'
  AND codprod LIKE '%5c';
