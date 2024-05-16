<?php
// Połączenie z bazą danych
$connect = mysqli_connect("srv1482.hstgr.io","u749382198_admin","uZq:D*K9","u749382198_autoservice");

if (mysqli_connect_errno()) {
    exit("Błąd połączenia: " . mysqli_connect_error());
}

// Zapytanie SQL pobierające daty napraw
$sql = mysqli_query($connect, "SELECT DataRozpoczecia FROM naprawy");

if (!$sql) {
    exit("Błąd zapytania: " . mysqli_error($connect));
}

// Tworzenie tablicy dat
$dates = array();
while ($row = mysqli_fetch_assoc($sql)) {
    $dates[] = $row['DataRozpoczecia'];
    
}

// Zamknięcie połączenia z bazą danych
mysqli_close($connect);

// Zwrócenie dat w formacie JSON
echo json_encode($dates);
?>
