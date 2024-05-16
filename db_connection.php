<?php
$connect = mysqli_connect("srv1482.hstgr.io", "u749382198_admin", "uZq:D*K9", "u749382198_autoservice");
if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}

// Zapytanie do usuwania rekordu
$deleteQuery = "DELETE FROM naprawy WHERE Id_Naprawy = ?";
?>
