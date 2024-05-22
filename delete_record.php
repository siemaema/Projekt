<?php
// Połączenie z bazą danych
$connect = mysqli_connect("srv1482.hstgr.io", "u749382198_admin", "uZq:D*K9", "u749382198_autoservice");
if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}

// Sprawdzenie, czy ID zostało przesłane
if (isset($_POST['id'])) {
    $id_to_delete = intval($_POST['id']);

    // Przygotowanie zapytania SQL do usunięcia obiektu
    $query = "DELETE FROM naprawy WHERE Id_Naprawy = ?";

    // Przygotowanie i wykonanie zapytania z użyciem prepared statements
    $stmt = mysqli_prepare($connect, $query);
    mysqli_stmt_bind_param($stmt, 'i', $id_to_delete);

    if (mysqli_stmt_execute($stmt)) {
        echo "Obiekt został pomyślnie usunięty";
    } else {
        echo "Błąd usuwania obiektu: " . mysqli_error($connect);
    }

    // Zamykanie prepared statement
    mysqli_stmt_close($stmt);
} else {
    echo "Nie podano ID obiektu do usunięcia";
}

// Zamykanie połączenia z bazą danych
mysqli_close($connect);
?>
