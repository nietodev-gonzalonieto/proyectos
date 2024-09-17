-- Gonzalo Nieto - SQL
-- 1. Llista les oficines on l'objectiu de vendes de l'oficina excedeixi la suma de salaris dels venedors individuals (d'aquella oficina).
-- SQL amb subconsulta:
SELECT o.oficina_id, o.objectiu_vendes
FROM oficines o
WHERE o.objectiu_vendes > (
    SELECT SUM(v.salari)
    FROM venedors v
    WHERE v.oficina_id = o.oficina_id
);

-- SQL sense subconsulta:
SELECT o.oficina_id, o.objectiu_vendes
FROM oficines o
JOIN venedors v ON o.oficina_id = v.oficina_id
GROUP BY o.oficina_id, o.objectiu_vendes
HAVING o.objectiu_vendes > SUM(v.salari);

-- 2. Empleats amb salari que siguin iguals o superiors a l'objectiu de llur oficina de vendes.
-- SQL amb subconsulta:
SELECT e.numemp, e.nom, e.salari, o.objectiu_vendes
FROM empleats e
JOIN oficines o ON e.oficina_id = o.oficina_id
WHERE e.salari >= o.objectiu_vendes;

-- SQL sense subconsulta:
SELECT e.numemp, e.nom, e.salari, o.objectiu_vendes
FROM empleats e
JOIN oficines o ON e.oficina_id = o.oficina_id
WHERE e.salari >= o.objectiu_vendes;

-- 3. Llista dels productes del fabricant ACI per als quals les existències superen les existències del producte amb fabricant ACI i codi producte 41004.
-- SQL amb subconsulta:
SELECT p.producte_id, p.descripcio, p.existencies
FROM productes p
WHERE p.fabricant = 'ACI'
AND p.existencies > (
    SELECT existencies
    FROM productes
    WHERE fabricant = 'ACI'
    AND producte_id = 41004
);

-- SQL sense subconsulta:
SELECT p1.producte_id, p1.descripcio, p1.existencies
FROM productes p1
JOIN productes p2 ON p2.fabricant = 'ACI' AND p2.producte_id = 41004
WHERE p1.fabricant = 'ACI' AND p1.existencies > p2.existencies;

-- 4. Empleats que NO treballen en oficines dirigides per Julia Bustamante.
-- SQL amb subconsulta:
SELECT e.numemp, e.nom
FROM empleats e
WHERE e.oficina_id NOT IN (
    SELECT o.oficina_id
    FROM oficines o
    WHERE o.director = 'Julia Bustamante'
);

-- SQL sense subconsulta:
SELECT e.numemp, e.nom
FROM empleats e
LEFT JOIN oficines o ON e.oficina_id = o.oficina_id
WHERE o.director IS DISTINCT FROM 'Julia Bustamante';

-- 5. Llista de productes (amb la descripció) per als quals s'ha rebut una comanda d'import 25.000 o més. (Considerant productes de qualsevol fabricant).
-- SQL amb subconsulta:
SELECT p.producte_id, p.descripcio
FROM productes p
WHERE p.producte_id IN (
    SELECT c.producte_id
    FROM comandes c
    WHERE c.import >= 25000
);

-- SQL sense subconsulta:
SELECT DISTINCT p.producte_id, p.descripcio
FROM productes p
JOIN comandes c ON p.producte_id = c.producte_id
WHERE c.import >= 25000;

-- 6. Llistar els noms dels clients que tenen assignat el representant Alvaro Jaumes (suposant que no poden haver-hi representants amb el mateix nom).
-- SQL amb subconsulta:
SELECT c.nom
FROM clients c
WHERE c.representant_id = (
    SELECT e.numemp
    FROM empleats e
    WHERE e.nom = 'Alvaro Jaumes'
);

-- SQL sense subconsulta:
SELECT c.nom
FROM clients c
JOIN empleats e ON c.representant_id = e.numemp
WHERE e.nom = 'Alvaro Jaumes';

-- 7. Llistar els empleats (numemp, nom, i núm. d'oficina) que treballen en oficines "bones" (les que tenen vendes superiors al seu objectiu).
-- SQL amb subconsulta:
SELECT e.numemp, e.nom, e.oficina_id
FROM empleats e
JOIN oficines o ON e.oficina_id = o.oficina_id
WHERE o.vendes > o.objectiu_vendes;

-- SQL sense subconsulta:
SELECT e.numemp, e.nom, e.oficina_id
FROM empleats e
JOIN oficines o ON e.oficina_id = o.oficina_id
WHERE o.vendes > o.objectiu_vendes;

-- 8. Llistar els venedors que no treballen en oficines dirigides per l'empleat 108.
-- SQL amb subconsulta:
SELECT v.numemp, v.nom
FROM venedors v
WHERE v.oficina_id NOT IN (
    SELECT o.oficina_id
    FROM oficines o
    WHERE o.director_id = 108
);

-- SQL sense subconsulta:
SELECT v.numemp, v.nom
FROM venedors v
LEFT JOIN oficines o ON v.oficina_id = o.oficina_id
WHERE o.director_id IS DISTINCT FROM 108;

-- 9. Llistar els clients assignats a Julia Bustamante que no tenen cap comanda superior a 50.000.
-- SQL amb subconsulta:
SELECT c.nom
FROM clients c
WHERE c.representant_id = (
    SELECT e.numemp
    FROM empleats e
    WHERE e.nom = 'Julia Bustamante'
)
AND c.client_id NOT IN (
    SELECT co.client_id
    FROM comandes co
    WHERE co.import > 50000
);

-- SQL sense subconsulta:
SELECT c.nom
FROM clients c
LEFT JOIN comandes co ON c.client_id = co.client_id AND co.import > 50000
JOIN empleats e ON c.representant_id = e.numemp
WHERE e.nom = 'Julia Bustamante'
AND co.client_id IS NULL;
