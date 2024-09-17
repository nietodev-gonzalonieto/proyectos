-- Gonzalo Nieto - Consultes SQL – Manipulació de dades

-- 1. Modificar el camp titol de 'representante' a 'representant' en la taula empleats.
UPDATE empleats
SET titol = 'representant'
WHERE titol = 'representante';

-- 2. Actualitzar les quotes dels empleats per ser el 50% de l'objectiu de la seva oficina.
UPDATE empleats e
SET salari = (SELECT objectiu * 0.5
              FROM oficines o
              WHERE o.oficina = e.oficina);

-- 3. Posar a zero les vendes dels empleats de l'oficina 12.
UPDATE empleats
SET vendes = 0
WHERE oficina = 12;

-- 4. Posar a zero el límit de crèdit dels clients assignats a empleats de l'oficina 12.
UPDATE clients cl
JOIN comanda com ON cl.numclie = com.clie
JOIN empleats e ON com.rep_ven = e.numemp
SET cl.limitcredit = 0
WHERE e.oficina = 12;

-- 5. Esborrar les línies de comandes del client Jaime Llorens.
DELETE lc
FROM linia_comanda lc
JOIN comanda com ON lc.numcomanda = com.numcomanda
JOIN clients cl ON com.clie = cl.numclie
WHERE cl.nom = 'Jaime Llorens';

-- 6. Augmentar un 5% el preu dels productes del fabricant ACI.
UPDATE productes
SET preu = preu * 1.05
WHERE codfab = 'ACI';

-- 7. Afegir una nova oficina a Madrid amb el número d'oficina 30, objectiu de 100000, i regió Centre.
INSERT INTO oficines (oficina, ciutat, regio, dir, objectiu, vendes)
VALUES (30, 'Madrid', 'Centre', NULL, 100000, NULL);

-- 8. Canviar els empleats de l'oficina 21 a l'oficina 30.
UPDATE empleats
SET oficina = 30
WHERE oficina = 21;

-- 9. Eliminar les comandes de l'empleat 105.
DELETE FROM comanda
WHERE rep_ven = 105;

-- 10. Eliminar les oficines que no tinguin empleats.
DELETE FROM oficines
WHERE oficina NOT IN (SELECT DISTINCT oficina FROM empleats);
