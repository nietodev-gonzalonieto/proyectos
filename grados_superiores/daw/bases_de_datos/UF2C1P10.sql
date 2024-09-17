-- Gonzalo Nieto - SQL
-- Consultes Simples
-- 1. Obtenir el codi, el tipus, el color i el premi de tots els maillots que hi ha.
SELECT tipus, color, premi
FROM MALLOTS;

-- 2. Obtenir el dorsal i el nom dels ciclistes que l'edat sigui menor o igual que 25 anys.
SELECT dorsal, nom
FROM ciclistes
WHERE edat <= 25;

-- 3. Obtenir el nom i l'alçada de tots els ports de categoria 'E' (Especial).
SELECT nom, altura
FROM ports
WHERE categoria = 'E';

-- 4. Obtenir el valor de l'atribut numero d'aquelles etapes amb sortida i arribada a la mateixa ciutat.
SELECT numero
FROM etapes
WHERE eixida = arribada;

-- 5. Quants ciclistes hi ha?
SELECT COUNT(*) AS nombre_ciclistes
FROM ciclistes;

-- 6. Quants ciclistes tenim amb edat superior a 25 anys?
SELECT COUNT(*) AS nombre_ciclistes
FROM ciclistes
WHERE edat > 25;

-- 7. Quants equips hi ha?
SELECT COUNT(*) AS nombre_equips
FROM equips;

-- 8. Obtenir la mitjana d'edat dels ciclistes.
SELECT AVG(edat) AS mitjana_edat
FROM ciclistes;

-- 9. Obtenir l'altura mínima i màxima dels ports de muntanya.
SELECT MIN(altura) AS altura_minima, MAX(altura) AS altura_maxima
FROM ports;

-- Consultes sobre diverses taules
-- 10. Obtenir el nom i la categoria dels ports guanyats per ciclistes de l'equip 'Banesto'.
SELECT p.nom AS port_nom, c.nom AS ciclista_nom, c.equip, p.categoria
FROM ports p
JOIN ciclistes c ON p.ciclista = c.dorsal
WHERE c.equip = 'Banesto';

-- 11. Obtenir el nom de cada port indicant el número (netapa) i els quilòmetres de l'etapa en què es troba el port.
SELECT p.nom AS port_nom, e.numero AS etapa_numero, e.kms
FROM ports p
JOIN etapes e ON p.etapa = e.numero;

-- 12. Obtenir el nom i el director dels equips als quals pertany a algun ciclista major de 33 anys.
SELECT eq.nom AS equip_nom, eq.director, c.edat
FROM equips eq
JOIN ciclistes c ON eq.nom = c.equip
WHERE c.edat > 33;

-- 13. Obtenir el nom dels ciclistes amb el color de cada maillot que s'han portat.
SELECT c.nom AS ciclista_nom, m.color AS maillot_color
FROM ciclistes c
JOIN portar p ON c.dorsal = p.ciclista
JOIN mallots m ON p.mallot = m.codi;

-- 14. Obtenir pares de nom de ciclista i nombre d'etapa que aquest ciclista hagi guanyat aquesta etapa havent portat el maillot de color 'amarillo' almenys una vegada.
SELECT c.nom AS ciclista_nom, e.numero AS etapa_numero, m.color AS maillot_color
FROM ciclistes c
JOIN portar p ON c.dorsal = p.ciclista
JOIN etapes e ON p.etapa = e.numero
JOIN mallots m ON p.mallot = m.codi
WHERE m.color = 'amarillo';

-- 15. Obtenir el valor de l'atribut numero de les etapes que no comencen a la mateixa ciutat en què va acabar l'anterior etapa.
SELECT numero
FROM etapes
WHERE eixida != arribada;

-- Consultes amb subconsultes
-- 16. Obtenir el valor de l'atribut numero i la ciutat d'origen d'aquelles etapes que no tenen ports de muntanya.
SELECT e.numero, e.eixida
FROM etapes e
WHERE NOT EXISTS (
    SELECT 1
    FROM ports p
    WHERE p.etapa = e.numero
);

-- 17. Obtenir l'edat mitjana dels ciclistes que han guanyat alguna etapa.
SELECT AVG(c.edat) AS mitjana_edat
FROM ciclistes c
JOIN portar p ON c.dorsal = p.ciclista
JOIN etapes e ON p.etapa = e.numero
WHERE e.ciclista = c.dorsal;

-- 18. Selecciona el nom dels ports amb una altura superior a l'altura mitjana de tots els ports.
SELECT p.nom
FROM ports p
WHERE p.altura > (SELECT AVG(altura) FROM ports);

-- 19. Obtenir el nom de la ciutat d'entrada i arribada de les etapes on es troba el port amb major pendent.
SELECT e.eixida, e.arribada
FROM etapes e
JOIN ports p ON e.numero = p.etapa
WHERE p.pendent = (SELECT MAX(pendent) FROM ports);

-- 20. Obtenir el dorsal i el nom dels ciclistes que han guanyat el port de major altura.
SELECT c.dorsal, c.nom
FROM ciclistes c
JOIN ports p ON p.ciclista = c.dorsal
WHERE p.altura = (SELECT MAX(altura) FROM ports);

-- 21. Obtenir el nom del ciclista més jove.
SELECT c.nom
FROM ciclistes c
WHERE c.edat = (SELECT MIN(edat) FROM ciclistes);


-- 22. Obtenir el nom del ciclista més jove que ha guanyat almenys una etapa.
SELECT c.nom
FROM ciclistes c
JOIN portar p ON c.dorsal = p.ciclista
JOIN etapes e ON p.etapa = e.numero
WHERE e.ciclista = c.dorsal
AND c.edat = (SELECT MIN(edat) FROM ciclistes c2
              JOIN portar p2 ON c2.dorsal = p2.ciclista
              JOIN etapes e2 ON p2.etapa = e2.numero
              WHERE e2.ciclista = c2.dorsal);

-- 23. Obtenir el nom dels ciclistes que han guanyat més d'un port.
SELECT c.nom, c.dorsal, COUNT(*) AS recuento
FROM ciclistes c
JOIN ports p ON c.dorsal = p.ciclista
GROUP BY c.dorsal
HAVING COUNT(*) > 1;

-- 24. Obtenir el valor de l'atribut numero d'aquelles etapes que tots els ports que hi ha en ella tenen més de 700 metres d'altura.
SELECT e.numero
FROM etapes e
WHERE NOT EXISTS (
    SELECT 1
    FROM ports p
    WHERE p.etapa = e.numero
    AND p.altura <= 700
);

-- 25. Obtenir el nom i el director dels equips que tots els seus ciclistes tenen majors de 25 anys.
SELECT e.nom, e.director
FROM equips e
WHERE NOT EXISTS (
    SELECT 1
    FROM ciclistes c
    WHERE c.equip = e.nom
    AND c.edat <= 25
);

-- 26. Obtenir el dorsal i el nom dels ciclistes que totes les etapes que han guanyat tenen més de 170 km.
SELECT c.dorsal, c.nom
FROM ciclistes c
JOIN portar p ON c.dorsal = p.ciclista
JOIN etapes e ON p.etapa = e.numero
GROUP BY c.dorsal, c.nom
HAVING NOT EXISTS (
    SELECT 1
    FROM etapes e2
    WHERE e2.numero = p.etapa
    AND e2.kms <= 170
);

-- 27. Obtenir el nom dels ciclistes que han guanyat tots els ports d'una etapa i, a més, han guanyat aquesta mateixa etapa.
SELECT DISTINCT c.nom
FROM ciclistes c
JOIN (
    SELECT e.numero AS etapa_numero, COUNT(*) AS ports_total, e.ciclista AS guanyador_etapa
    FROM etapes e
    JOIN ports p ON p.etapa = e.numero
    GROUP BY e.numero, e.ciclista
) total_ports
ON c.dorsal = total_ports.guanyador_etapa
JOIN (
    SELECT e.numero AS etapa_numero, COUNT(*) AS ports_guanyats
    FROM etapes e
    JOIN ports p ON p.etapa = e.numero
    WHERE e.ciclista = p.ciclista
    GROUP BY e.numero
) ports_guanyats
ON total_ports.etapa_numero = ports_guanyats.etapa_numero
WHERE total_ports.ports_total = ports_guanyats.ports_guanyats;

-- 28. Obtenir el nom dels equips que tots els seus corredors han portat algun maillot o han guanyat algun port.
SELECT e.nom
FROM equips e
LEFT JOIN ciclistes c ON e.nom = c.equip
LEFT JOIN portar p ON c.dorsal = p.ciclista
LEFT JOIN ports p2 ON c.dorsal = p2.ciclista
GROUP BY e.nom
HAVING COUNT(DISTINCT p.mallot) = (SELECT COUNT(DISTINCT p.mallot) FROM portar p)
OR COUNT(DISTINCT p2.ciclista) = (SELECT COUNT(DISTINCT p2.ciclista) FROM ports p2);

-- 29. Obtenir el codi i el color d'aquells maillots que només han estat portats per ciclistes d'un mateix equip.
SELECT m.codi, m.color
FROM mallots m
JOIN portar p ON m.codi = p.mallot
JOIN ciclistes c ON p.ciclista = c.dorsal
GROUP BY m.codi, m.color
HAVING COUNT(DISTINCT c.equip) = 1;

-- 30. Obtenir el nom d'aquells equips que els seus ciclistes només hagin guanyat ports de 1a categoria.
SELECT e.nom
FROM equips e
JOIN ciclistes c ON e.nom = c.equip
JOIN ports p ON c.dorsal = p.ciclista
GROUP BY e.nom
HAVING COUNT(DISTINCT CASE WHEN p.categoria != '1a' THEN 1 END) = 0;

-- Consultes agrupades
-- 31. Obtenir el valor de l'atribut numero d'aquelles etapes que tenen ports de muntanya indicant quants té.
SELECT e.numero, COUNT(*) AS total_ports
FROM etapes e
JOIN ports p ON e.numero = p.etapa
GROUP BY e.numero;

-- 32. Obtenir el nom dels equips que tenen ciclistes indicant quants té cada un.
SELECT e.nom, COUNT(c.dorsal) AS nombre_ciclistes
FROM equips e
JOIN ciclistes c ON e.nom = c.equip
GROUP BY e.nom;

-- 33. Obtenir el nom de tots els equips indicant quants ciclistes té cada un.
SELECT e.nom, COUNT(c.dorsal) AS nombre_ciclistes
FROM equips e
LEFT JOIN ciclistes c ON e.nom = c.equip
GROUP BY e.nom;

-- 34. Obtenir el director i el nom dels equips que tenen més de 3 ciclistes i l'edat mitjana inferior o igual a 30 anys.
SELECT e.nom, e.director
FROM equips e
JOIN ciclistes c ON e.nom = c.equip
GROUP BY e.nom, e.director
HAVING COUNT(c.dorsal) > 3
AND AVG(c.edat) <= 30;

-- 35. Obtenir el nom dels ciclistes que pertanyen a un equip que tingui més de cinc corredors i que hagin guanyat alguna etapa indicant quantes etapes ha guanyat.
SELECT c.nom, COUNT(e.numero) AS etapes_guanyades
FROM ciclistes c
JOIN portar p ON c.dorsal = p.ciclista
JOIN etapes e ON p.etapa = e.numero
JOIN equips eq ON c.equip = eq.nom
GROUP BY c.nom
HAVING COUNT(c.dorsal) > 5;

-- 36. Obtenir el nom dels equips i l'edat mitjana dels seus ciclistes d'aquells equips que tinguin la mitjana d'edat màxima de tots els equips.
SELECT e.nom, AVG(c.edat) AS mitjana_edat
FROM equips e
JOIN ciclistes c ON e.nom = c.equip
GROUP BY e.nom
HAVING AVG(c.edat) = (SELECT MAX(mitjana_edat) FROM (
    SELECT AVG(c.edat) AS mitjana_edat
    FROM equips e
    JOIN ciclistes c ON e.nom = c.equip
    GROUP BY e.nom) AS edats);

-- 37. Obtenir el director dels equips que els ciclistes han portat més dies maillots d'algun tipus.
SELECT DISTINCT eq.director
FROM equips eq
JOIN ciclistes c ON eq.nom = c.equip
JOIN portar p ON c.dorsal = p.ciclista
GROUP BY eq.director
HAVING COUNT(DISTINCT p.mallot) = (
    SELECT MAX(total_days)
    FROM (
        SELECT COUNT(*) AS total_days, p.mallot
        FROM portar p
        GROUP BY p.mallot
    ) AS maillots
);

-- Consultes generals
-- 38. Obtenir el codi i el color del maillot que ha estat portat per algun ciclista que no ha guanyat cap etapa.
SELECT m.codi, m.color
FROM mallots m
JOIN portar p ON m.codi = p.mallot
LEFT JOIN etapes e ON p.etapa = e.numero
LEFT JOIN ciclistes c ON p.ciclista = c.dorsal
WHERE c.dorsal NOT IN (
    SELECT e.ciclista
    FROM etapes e
);

-- 39. Obtenir el valor de l'atribut numero, la ciutat d'arribada i la ciutat d'arribada de les etapes de més de 190 km i que tinguin per menys dos ports.
SELECT e.numero, e.arribada
FROM etapes e
JOIN ports p ON e.numero = p.etapa
WHERE e.kms > 190
GROUP BY e.numero, e.arribada
HAVING COUNT(p.etapa) >= 2;

-- 40. Obtenir el dorsal i el nom dels ciclistes que no han portat tots els maillots que ha portat el ciclista de dorsal 20.
SELECT c.dorsal, c.nom
FROM ciclistes c
WHERE c.dorsal NOT IN (
    SELECT DISTINCT p.ciclista
    FROM portar p
    WHERE p.mallot IN (
        SELECT p2.mallot
        FROM portar p2
        WHERE p2.ciclista = 20
    )
    GROUP BY p.ciclista
    HAVING COUNT(DISTINCT p.mallot) = (
        SELECT COUNT(DISTINCT p3.mallot)
        FROM portar p3
        WHERE p3.ciclista = 20
    )
);

-- 41. Obtenir el dorsal i el nom dels ciclistes que han portat almenys un maillot dels que ha portat el ciclista de dorsal 20.
SELECT DISTINCT p.ciclista, c.nom
FROM portar p
JOIN ciclistes c ON p.ciclista = c.dorsal
WHERE p.mallot IN (
    SELECT p.mallot
    FROM portar p
    WHERE p.ciclista = 20
);

-- 42. Obtenir el dorsal i el nom dels ciclistes que no han portat cap maillot dels que ha portat el ciclista de dorsal 20.
SELECT c.dorsal, c.nom
FROM ciclistes c
WHERE c.dorsal NOT IN (
    SELECT DISTINCT p.ciclista
    FROM portar p
    WHERE p.mallot IN (
        SELECT p.mallot
        FROM portar p
        WHERE p.ciclista = 20
    )
);

-- 43. Obtenir el dorsal i el nom dels ciclistes que han portat tots els maillots que ha portat el ciclista de dorsal 20.
SELECT c.dorsal, c.nom
FROM ciclistes c
JOIN (
    SELECT DISTINCT p.ciclista, p.mallot
    FROM portar p
    WHERE p.mallot IN (
        SELECT p2.mallot
        FROM portar p2
        WHERE p2.ciclista = 20
    )
) mallots
ON c.dorsal = mallots.ciclista
GROUP BY c.dorsal, c.nom
HAVING COUNT(mallots.mallot) = (
    SELECT COUNT(DISTINCT p.mallot)
    FROM portar p
    WHERE p.ciclista = 20
);
