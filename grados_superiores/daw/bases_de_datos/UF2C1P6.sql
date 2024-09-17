-- Gonzalo Nieto Maneu DAW 10/02/2020
-- Consultes SQL – Consultes Agrupades

-- 1. Quin és l'import total de les comandes realitzades per l'empleat Vicente Pantalla?
SELECT SUM(c.import_total) AS total_import
FROM comanda c
JOIN empleats e ON c.rep_ven = e.numemp
WHERE e.nom = 'Vicente Pantalla';

-- 2. Trobar en quina data es va realitzar la primera comanda.
SELECT MIN(data) AS primera_comanda
FROM comanda;

-- 3. Quantes comandes hi ha de més de 25000 €?
SELECT COUNT(*) AS comandes_grans
FROM comanda
WHERE import_total > 25000;

-- 4. Llistar quants empleats estan assignats a cada oficina.
SELECT oficina, COUNT(*) AS num_empleats
FROM empleats
WHERE oficina IS NOT NULL
GROUP BY oficina;

-- 5. Quants empleats treballen en cada ciutat on tenim oficines?
SELECT o.ciutat, COUNT(e.numemp) AS num_empleats
FROM oficines o
JOIN empleats e ON o.oficina = e.oficina
GROUP BY o.ciutat;

-- 6. Per a cada empleat, obtenir el seu número, nom, i import venut a cada client.
SELECT e.numemp, e.nom, c.clie AS num_client, COALESCE(SUM(c.import_total), 0) AS import_vendes
FROM empleats e
LEFT JOIN comanda c ON e.numemp = c.rep_ven
GROUP BY e.numemp, e.nom, c.clie;

-- 7. Per a cada empleat que ha venut més de 30.000€ en comandes, obtenir el seu import mitjà de comandes.
SELECT c.rep_ven AS numemp, AVG(c.import_total) AS import_mitja
FROM comanda c
GROUP BY c.rep_ven
HAVING SUM(c.import_total) > 30000;

-- 8. Llistar de cada producte la seva descripció, preu i la quantitat total de les comandes, incloent només els productes amb una quantitat superior al 75% de les existències.
SELECT p.descr, p.preu, SUM(lc.quant) AS total_quantitat
FROM productes p
JOIN linia_comanda lc ON p.codprod = lc.codprod
GROUP BY p.descr, p.preu
HAVING SUM(lc.quant) > (p.existencies * 0.75)
ORDER BY total_quantitat DESC;

-- 9. Rang de quotes (min i max) dels empleats de cada oficina.
SELECT oficina, MIN(cuota) AS min_quota, MAX(cuota) AS max_quota
FROM empleats
GROUP BY oficina;

-- 10. Quants clients diferents són atesos per cada empleat?
SELECT rep_ven, COUNT(DISTINCT clie) AS num_clients
FROM comanda
GROUP BY rep_ven;

-- 11. Per a cada oficina amb dos o més empleats, calcular la quota total i les vendes totals de tots els empleats de l'oficina.
SELECT oficina, SUM(cuota) AS quota_total, SUM(vendes) AS vendes_totals
FROM empleats
WHERE oficina IS NOT NULL
GROUP BY oficina
HAVING COUNT(numemp) >= 2;
