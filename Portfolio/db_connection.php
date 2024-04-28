<?php
// Připojení k databázi
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

$conn = new mysqli($servername, $username, $password, $dbname);

// Kontrola spojení
if ($conn->connect_error) {
    die("Nelze se připojit k serveru: " . $conn->connect_error);
}

// Získání dat
$predmet = $_POST['predmet'];
$bod = $_POST['bod'];

// Vložení dat do databáze
$sql = "INSERT INTO vysledky (predmet, bod) VALUES ('$predmet', '$bod')";

if ($conn->query($sql) === TRUE) {
    echo "Data byla úspěšně vložena.";
} else {
    echo "Chyba: " . $sql . "<br>" . $conn->error;
}

// Uzavření spojení s databází
$conn->close();
?>