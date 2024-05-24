<?php

$servername = "srv1482.hstgr.io";
$username = "u749382198_admin";
$password = "uZq:D*K9";
$dbname = "u749382198_autoservice";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("błąd". $conn->connect_error);
}
$sql = "SELECT Nazwa, Cena, IloscNaStanie, Link FROM czesci";
$result = $conn->query($sql);
$parts = [];
if($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $parts[] = $row;
    }
}

echo json_encode($parts);

$conn->close();