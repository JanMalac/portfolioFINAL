<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jan Malac Známky</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/hamburger.css">
    <script src="js/menu.js" type="text/javascript" defer></script>
    <style>
        .formular {
            text-align: center;
        }
        .table {
            
        }
    </style>
</head>

<body>

    <body-menu></body-menu>

    <h1>TABULKA STUDIJNÍCH VÝSLEDKŮ</h1>
    <h2 class = "nadpis">(od nejlepších po nejhorší)</h2>

    <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "test";

        $conn = new mysqli($servername, $username, $password, $database);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // SQL query
        $sql = "SELECT predmet AS předmět,
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
                GROUP BY predmet
                ORDER BY 3 DESC";

        // Query execute
        $result = $conn->query($sql);

        // Kontrola, jestli se vrátily řádky
        if ($result->num_rows > 0) {
            // Tabulka
            echo "<div style='margin: 0 auto; width: 50%;'>";
            echo "<table border='10' style='width: 100%; text-align: center;'>";
            echo "<tr><th>Předmět</th><th>Počet bodovaných aktivit</th><th>Bodový součet</th>
                  <th>Bodový průměr</th><th>Jak je na tom student?</th></tr>";
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["předmět"] . "</td>";
                echo "<td>" . $row["kolik"] . "</td>";
                echo "<td>" . $row["suma"] . "</td>";
                echo "<td>" . $row["prumer"] . "</td>";
                echo "<td>" . $row["jak jsi na tom"] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
            echo "</div>";
        } else {
            echo "0 results";
        }

        $conn->close();
    ?>
 
</body>

</html>
