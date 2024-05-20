<?php
include 'db_connection.php';


if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $today = date('Y-m-d'); 
    
    
    $deleteQuery = "DELETE FROM naprawy WHERE Id_Naprawy = ?";
    deleteRecord($id, $connect, $deleteQuery);

   
    $updateQuery = "UPDATE naprawy SET Data_Zakonczenia = ? WHERE Id_Naprawy = ?";
    updateDate($id, $today, $connect, $updateQuery);

    echo "Rekord został usunięty oraz data zakończenia pracy została zaktualizowana.";
} else {
    echo "Nie przesłano identyfikatora rekordu.";
}

function deleteRecord($id, $connect, $deleteQuery) {
    $stmt = mysqli_prepare($connect, $deleteQuery);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

function updateDate($id, $date, $connect, $updateQuery) {
    $stmt = mysqli_prepare($connect, $updateQuery);
    mysqli_stmt_bind_param($stmt, "si", $date, $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}
?>
