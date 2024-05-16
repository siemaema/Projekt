<?php
include 'db_connection.php'; // Plik z połączeniem do bazy danych

// Sprawdź, czy został przesłany identyfikator rekordu
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    // Wywołaj funkcję usuwania rekordu
    deleteRecord($id, $deleteQuery);
    echo "Rekord został usunięty.";
} else {
    echo "Nie przesłano identyfikatora rekordu.";
}

function deleteRecord($id, $deleteQuery) {
    global $connect;
    $stmt = mysqli_prepare($connect, $deleteQuery);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}
?>
