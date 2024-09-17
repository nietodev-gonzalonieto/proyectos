-- Gonzalo Nieto Maneu DAW 03/02/2020
-- Consultes SQL – Funcions d'agregació

-- 1. Obtenir el total de vendes de totes les oficines.
SELECT SUM(vendes) AS total_vendes
FROM oficines;

-- 2. Quants empleats tenim?
SELECT COUNT(*) AS total_empleats
FROM empleats;

-- 3. Quants empleats tenen una oficina assignada?
SELECT COUNT(*) AS empleats_amb_oficina
FROM empleats
WHERE oficina IS NOT NULL;

-- 4. Volem saber l'acumulat de vendes dels empleats de l'oficina 12.
SELECT SUM(vendes) AS total_vendes_oficina_12
FROM empleats
WHERE oficina = 12;

-- 5. Obtenir el total de vendes de tots els empleats.
SELECT SUM(vendes) AS total_vendes_empleats
FROM empleats;

-- 6. Obtenir una llista amb la suma de les vendes dels empleats de cada oficina.
SELECT oficina, SUM(vendes) AS total_vendes_per_oficina
FROM empleats
GROUP BY oficina;

-- 7. Agrupar les línies de comanda per quantitat i treure de cada quantitat l'import total venut.
SELECT quant, SUM(import) AS total_vendes_per_quantitat
FROM linia_comanda
GROUP BY quant;

-- 8. Volem obtenir el total de vendes de les oficines agrupades per regio i ciutat.
SELECT regio, ciutat, SUM(vendes) AS total_vendes
FROM oficines
GROUP BY regio, ciutat;

-- 9. Mostrar l'oficina i la quantitat corresponent al total de vendes dels empleats que tenen oficina assignada.
SELECT oficina, SUM(vendes) AS total_vendes
FROM empleats
WHERE oficina IS NOT NULL
GROUP BY oficina;

-- 10. Volem saber les oficines on els seus empleats tenen una mitjana de vendes major que 300.000.
SELECT oficina, AVG(vendes) AS mitja_vendes
FROM empleats
GROUP BY oficina
HAVING AVG(vendes) > 300000;

-- 11. Quina és el sou mitjà i les vendes mitjanes de tots els empleats?
SELECT AVG(salari) AS sou_mitja, AVG(vendes) AS vendes_mitjanes
FROM empleats;

-- 12. Trobar l'import mitjà de comandes i l'import total de comandes.
SELECT AVG(import_total) AS import_mitja, SUM(import_total) AS import_total
FROM comanda;

-- 13. Trobar el preu mitjà dels productes del fabricant ACI.
SELECT AVG(preu) AS preu_mitja
FROM productes
WHERE codfab = 'ACI';
