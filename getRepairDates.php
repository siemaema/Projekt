<?php
$servername = "srv1482.hstgr.io";
$username = "u749382198_admin";
$password = "uZq:D*K9";
$dbname = "u749382198_autoservice";

// Tworzymy połączenie z bazą danych
$conn = new mysqli($servername, $username, $password, $dbname);

// Sprawdzamy czy połączenie udało się nawiązać
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Pobieramy dane z bazy danych
$sql = "SELECT DataRozpoczecia FROM naprawy";
$result = $conn->query($sql);

// Tworzymy tablicę na daty rozpoczęcia napraw
$repairDates = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        // Dodajemy daty do tablicy w formie daty JS (milliseconds)
        $repairDates[] = strtotime($row["DataRozpoczecia"]) * 1000;
    }
} else {
    echo "0 results";
}

// Zamykamy połączenie z bazą danych
$conn->close();

// Zwracamy dane w formie JSON
echo json_encode($repairDates);
?>
