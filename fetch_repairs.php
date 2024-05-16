<?php
$connect = mysqli_connect("srv1482.hstgr.io", "u749382198_admin", "uZq:D*K9", "u749382198_autoservice");

// Sprawdzamy czy nadeszły dane POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Pobieramy datę z żądania
    $selectedDate = mysqli_real_escape_string($connect, $_POST['selectedDate']);

    // Wykonujemy zapytanie do bazy danych
    $query = "SELECT NazwaNaprawy FROM naprawy WHERE DataRozpoczecia = '$selectedDate'";
    $result = mysqli_query($connect, $query);

    // Przetwarzamy wynik zapytania na tablicę
    $repairs = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $repairs[] = $row;
    }

    // Zwracamy wynik jako JSON
    echo json_encode($repairs);
}
?>
