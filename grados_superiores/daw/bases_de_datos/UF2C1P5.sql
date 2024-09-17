-- Gonzalo Nieto Maneu 1DAW 07/02/2020
-- Consultes SQL – Consultes Multitaula

-- 1. Obtenir els codis dels productes que tenen existències iguals a zero o que apareguin en comandes de l’any 90.
SELECT DISTINCT p.codprod
FROM productes p
LEFT JOIN linia_comanda lc ON p.codprod = lc.codprod
LEFT JOIN comanda c ON lc.numcomanda = c.numcomanda
WHERE p.existencies = 0 OR YEAR(c.data) = 1990;

-- 2. Llista dels empleats amb les dades de la seva oficina (ciutat, regió), i l’empleat 110 amb dades de l'oficina a NULL.
SELECT e.numemp, e.nom, e.oficina, o.ciutat, o.regio
FROM empleats e
LEFT JOIN oficines o ON e.oficina = o.oficina
WHERE e.numemp = 110 OR e.oficina IS NOT NULL;

-- 3. Llistar els empleats amb les dades de la seva oficina, incloent oficines sense empleats.
SELECT e.numemp, e.nom, o.oficina, o.ciutat, o.regio
FROM oficines o
LEFT JOIN empleats e ON o.oficina = e.oficina;

-- 4. Llistar les comandes mostrant número, import, nom del client, i límit de crèdit del client corresponent.
SELECT c.numcomanda, c.import_total, cl.nom AS client_nom, cl.limit_credit AS limit_credit
FROM comanda c
JOIN clients cl ON c.clie = cl.codclie;

-- 5. Llistar les dades de cadascun dels empleats, la ciutat i regió on treballa.
SELECT e.numemp, e.nom, o.ciutat, o.regio
FROM empleats e
JOIN oficines o ON e.oficina = o.oficina;

-- 6. Llistar les oficines amb objectiu superior a 600000 ptes indicant el nom del director.
SELECT o.oficina, o.objectiu, e.nom AS director_nom
FROM oficines o
JOIN empleats e ON o.dir = e.numemp
WHERE o.objectiu > 600000;

-- 7. Llistar les comandes superiors a 25000 ptes, incloent el nom de l’empleat i el nom del client.
SELECT c.numcomanda, c.import_total, e.nom AS empleat_nom, cl.nom AS client_nom
FROM comanda c
JOIN empleats e ON c.rep_ven = e.numemp
JOIN clients cl ON c.clie = cl.codclie
WHERE c.import_total > 25000;

-- 8. Trobar els empleats que van realitzar la seva primera comanda el mateix dia en què van ser contractats.
SELECT e.numemp, e.nom, c.data AS data_comanda, e.contracte AS data_contracte
FROM empleats e
JOIN comanda c ON e.numemp = c.rep_ven
WHERE e.contracte = c.data;

-- 9. Llistar els empleats amb una quota superior a la del seu cap.
SELECT e.numemp, e.nom, e.cuota, ee.numemp AS cap_num, ee.nom AS cap_nom, ee.cuota AS cap_cuota
FROM empleats e
JOIN empleats ee ON e.cap = ee.numemp
WHERE e.cuota > ee.cuota;

-- 10. Llistar els codis dels empleats que tenen una línia de comanda superior a 10000 ptes o que tenen una quota inferior a 10000 ptes.
SELECT DISTINCT e.numemp
FROM empleats e
LEFT JOIN linia_comanda lc ON e.numemp = lc.rep_ven
WHERE lc.import > 10000 OR e.cuota < 10000;
