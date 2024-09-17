-- UF1C2P1 M02 – Gestió de Bases de Dades
-- DAW
-- Nom: Gonzalo Nieto Maneu

-- Consultes SQL

-- 1. Llista totes les dades de les oficines.
SELECT *
FROM OFICINES;

-- 2. Llista el nom, oficina, i data de contracte de tots els empleats.
SELECT nom, oficina, contracte
FROM EMPLEATS;

-- 3. Llista els atributs codfab, codprod, descripció i preu de tots els productes.
SELECT codfab, codprod, descr, preu
FROM PRODUCTES;

-- 4. Respecte a la consulta de l'apartat anterior: com a títol de la primera columna apareixerà fabricant en comptes de ‘codfab’.
SELECT codfab AS "fabricant", codprod, descr, preu
FROM PRODUCTES;

-- 5. Llista la ciutat, regió i el superàvit de cada oficina.
SELECT ciutat, regio, vendes - objectiu AS "superavit"
FROM OFICINES;

-- 6. De cada producte obtingui el seu fabricant, el codi producte, la seva descripció i el valor de l’inventari.
SELECT codfab AS "fabricant", codprod AS "producte", descr AS "descripcio", preu AS "valor"
FROM PRODUCTES;

-- 7. Llista el nom, mes i any del contracte de cada venedor. La funció MONTH(DATA) torna el mes d’una data. La funció YEAR(DATA) torna l’any d’una data.
SELECT nom, MONTH(contracte), YEAR(contracte)
FROM EMPLEATS;

-- 8. Obtingui un llistat ordenat alfabèticament (pel nom) dels empleats.
SELECT nom
FROM EMPLEATS
ORDER BY nom ASC;

-- 9. Obtingui un llistat dels empleats per ordre d’antiguitat a l’empresa (els de més antiguitat apareixen primer).
SELECT contracte, nom
FROM EMPLEATS
ORDER BY contracte ASC;

-- 10. Obtingui un llistat dels empleats (numemp, nom i vendes) ordenats per volum de vendes traient els de menors vendes primer.
SELECT numemp, nom, vendes
FROM EMPLEATS
ORDER BY vendes ASC;

-- 11. Obtingui un llistat dels empleats (numemp, nom i vendes) per ordre d’antiguitat a l’empresa començant pels incorporats més recentment.
SELECT numemp, nom, vendes
FROM EMPLEATS
ORDER BY contracte DESC;

-- 12. Obtingui un llistat dels empleats (numemp, nom i vendes) ordenats per volum de vendes traient primer els de majors vendes.
SELECT numemp, nom, vendes
FROM EMPLEATS
ORDER BY vendes DESC;

-- 13. Mostra les vendes de cada oficina, ordenades per ordre alfabètic de regió i dins de cada regió per ciutat.
SELECT vendes, regio, ciutat
FROM OFICINES
ORDER BY regio ASC, ciutat DESC;

-- 14. Llista les oficines (regió, ciutat i superavit) classificades per regió i dins de cada regió pel superàvit de manera que les de major superàvit apareguin les primeres.
SELECT regio, ciutat, vendes - objectiu AS "superavit"
FROM OFICINES
ORDER BY regio ASC, superavit ASC;

-- 15. Llista els codis dels directors de les oficines. El director 108 apareix en sis oficines, per tant apareixerà sis vegades en el resultat de la consulta.
SELECT dir AS "codi"
FROM OFICINES;

-- 16. Torna a fer l'exercici 15 però ara volem que el director 108 aparegui una sola vegada.
SELECT DISTINCT dir AS "codi"
FROM OFICINES;
