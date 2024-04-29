SELECT predmet AS předmět,
        COUNT(*) AS kolik,
        SUM(bod) AS suma,
        ROUND(SUM(bod) / COUNT(*), 2) AS prumer,
        CASE
            WHEN SUM(bod) < 10 THEN 'Je v řiti.'
            WHEN SUM(bod) >= 10 && SUM(bod) < 15 THEN 'Ještě by se měl hodně snažit.'
            WHEN SUM(bod) >= 15 && SUM(bod) < 20 THEN 'Ještě by se měl trochu snažit.'
            WHEN SUM(bod) >= 20 && SUM(bod) < 30 THEN 'Pohodička.'
            WHEN SUM(bod) >= 30 THEN 'Naprostá pohodička.'
            END AS 'stav'
FROM vysledky
GROUP BY predmet;
