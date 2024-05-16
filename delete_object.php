<?php
// Połączenie z bazą danych
$connect = mysqli_connect("srv1482.hstgr.io", "u749382198_admin", "uZq:D*K9", "u749382198_autoservice");
if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}

// Pobranie ID obiektu do usunięcia
$id_to_delete = $_POST['id'];

// Zapytanie SQL do usunięcia obiektu
$query = "DELETE FROM twoja_tabela WHERE id = $id_to_delete";

// Wykonanie zapytania
if (mysqli_query($connect, $query)) {
    echo "Obiekt został pomyślnie usunięty";
} else {
    echo "Błąd usuwania obiektu: " . mysqli_error($connect);
}

// Zamykanie połączenia z bazą danych
mysqli_close($connect);
?>
