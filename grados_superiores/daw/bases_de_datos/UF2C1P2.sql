-- UF2C1P2 M02 – Gestió de Bases de Dades
-- DAW
-- Nom: Gonzalo Nieto Maneu

-- Consultes SQL

-- 1. Llista els codis d'oficina dels empleats. (cada codi d'oficina només pot aparèixer una vegada)
SELECT DISTINCT oficina AS "codi oficina"
FROM OFICINES;

-- 2. Llista el nom dels empleats de l’oficina 12 que tinguin més de 30 anys
SELECT nom
FROM EMPLEATS
WHERE oficina = 12 AND edat > 30;

-- 3. Llista els empleats (numemp, nom) que tinguin vendes que superen el seu salari.
SELECT numemp, nom
FROM EMPLEATS
WHERE vendes > salari;

-- 4. Llista els empleats (numemp, nom) contractats amb data anterior a l’1 de gener de 1988.
SELECT numemp, nom
FROM EMPLEATS
WHERE contracte < '1988-01-01';

-- 5. Fes el mateix que en la consulta 4 però utilitzant l’any.
SELECT numemp, nom
FROM EMPLEATS
WHERE YEAR(contracte) < 1988;

-- 6. Llista les oficines que tenen unes vendes per sota del 80% del seu objectiu.
SELECT vendes
FROM OFICINES
WHERE vendes < objectiu * 0.8;

-- 7. Llista les oficines dirigides per l’empleat 108.
SELECT nom, oficina
FROM EMPLEATS
WHERE numemp = 108;

-- 8. Llista els empleats que tenen unes vendes compreses entre 100.000 i 500.000.
SELECT nom, vendes
FROM EMPLEATS
WHERE vendes BETWEEN 100000 AND 500000;

-- 9. S’ha d’obtenir el mateix que en l’apartat anterior però amb diferent condició.
SELECT nom, vendes
FROM EMPLEATS
WHERE vendes > 100000 AND vendes < 500000;

-- 10. Llista els empleats (numemp, nom) de les oficines 12, 14 i 16.
SELECT numemp, nom
FROM EMPLEATS
WHERE oficina = 12 AND oficina = 14 AND oficina = 16;

-- 11. Llista els empleats (numemp, nom) de les oficines 12, 14 i 16 (utilitzar una altra forma per obtenir el mateix).
SELECT numemp, nom
FROM EMPLEATS
WHERE oficina IN (12, 14, 16);

-- 12. Llista les oficines que no tenen director.
SELECT oficina
FROM OFICINES
WHERE dir IS NULL;

-- 13. Llista els empleats assignats a alguna oficina (els que tenen un valor a la columna oficina).
SELECT nom
FROM EMPLEATS
WHERE oficina IS NOT NULL;

-- 14. Llista els empleats (numemp, nom) que tenen un nom que comença per Luis.
SELECT numemp, nom
FROM EMPLEATS
WHERE nom LIKE 'Luis%';

-- 15. Llista els empleats (numemp, nom) que tenen un nom que conté Luis. En aquest cas també sortiria l’empleat José Luis.
SELECT numemp, nom
FROM EMPLEATS
WHERE nom LIKE '%Luis%';

-- 16. Llista els empleats que tenen un nom que conté una ‘a’ com a tercera lletra.
SELECT nom
FROM EMPLEATS
WHERE nom LIKE '__a%';

-- 17. Obtenir una llista de tots el productes indicant per a cadascú el seu codfab, codprod, descripció, preu i preu amb I.V.A. inclòs (és el preu anterior augmentant en un 16%).
SELECT codfab, codprod, descr, preu, preu * 1.16 AS preuiva
FROM PRODUCTES;

-- 18. De cada comanda volem saber el número de comanda, codfab, codprod, quantitat, preu unitari i import.
SELECT numcomanda, codfab, codprod, quant, (quant * preu_unitari) AS import
FROM LINIA_COMANDA;

-- 19. Llistar de cada empleat el seu nom, núm. de dies que porta treballant a l’empresa i el seu any de naixement (suposant que aquest any ja ha complert anys).
SELECT nom, DATEDIFF(CURDATE(), contracte) AS "dies_treballats", YEAR(CURDATE()) - edat AS "any_naixement"
FROM EMPLEATS;

-- 20. Obtenir la llista dels clients ordenats per codi de representant assignat. Visualitzar totes les columnes de la taula.
SELECT *
FROM CLIENTS
ORDER BY rep_ven ASC;

-- 21. Obtenir les oficines ordenades per ordre alfabètic de regió i dins de cada regió per ciutat. Si hi ha més d’una oficina en la mateixa ciutat, apareixerà primer la que tingui el número d’oficina major.
SELECT oficina, regio, ciutat
FROM OFICINES
ORDER BY regio ASC, ciutat ASC, oficina DESC;

-- 22. Obtenir les comandes ordenades per data de comanda.
SELECT numcomanda, DATA
FROM COMANDA
ORDER BY DATA;

-- 23. Llistar tota la informació de les comandes de març.
SELECT *
FROM COMANDA
WHERE MONTH(DATA) = 3;

-- 24. Llistar els números dels empleats que tenen una oficina assignada.
SELECT
