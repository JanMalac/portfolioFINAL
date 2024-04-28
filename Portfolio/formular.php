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
    </style>
</head>

<body>

    <body-menu></body-menu>

    <h1>FORMULÁŘ</h1>

        <div class = "formular">
            <form method="POST" action="db_connection.php">
                <label for="predmet">Předmět:</label>
                    <select id="predmet" name="predmet">
                        <option value="MA2">MA2</option>
                        <option value="FY2">FY2</option>
                        <option value="EL2">EL2</option>
                        <option value="ESOT">ESOT</option>
                        <option value="PIS">PIS</option>
                    </select><br><br>
                    
                <label for="bod">Body:</label>
                    <input type="number" id="bod" name="bod" required><br><br>
                    
                    <input type="submit" value="Přidat výsledek">
            </form>
        </div>
        
</body>

</html>