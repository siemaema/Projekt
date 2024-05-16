<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AutoServiceData</title>
    <link rel="shortcut icon" href="img\icon.png" type="image/x-icon">
    <link rel="stylesheet" href="output.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/90bfbfad1c.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>

<body class="font-Montserrat">
    <div class="flex h-screen w-full bg-[#6b9080]">
        <div>
            <a href="index.php"><img src="img/back_button.png" alt="xddd" class="object-scale-down h-10 mt-2 ml-2"></a>
        </div>
        <div class="grid grid-cols-4 grid-rows-5 w-full h-full">
            <div class="grid col-span-4 place-content-center">
                <p class="text-5xl text-shadow-lg shadow-green-800">Lista Zleceń</p>
            </div>
            <div class="grid col-span-4 row-span-4 pr-5 pb-3">
                <div class="grid grid-cols-4 gap-2 grid-flow-col">
                    <div class="navTitle rounded-tl-md">Nr zlecenia</div>
                    <div class="navTitle">Dane pojazdu</div>
                    <div class="navTitle">Opis naprawy</div>
                    <div class="navTitle rounded-tr-md">Dane kontaktowe wlasciciela</div>
                </div>
                <div id="listaZlecen" class="grid grid-cols-1 gap-2 row-span-4 overflow-y-auto">
                <?php
// Połączenie z bazą danych
$connect = mysqli_connect("srv1482.hstgr.io", "u749382198_admin", "uZq:D*K9", "u749382198_autoservice");
if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}

// Zapytanie do bazy danych
$query = "SELECT naprawy.Id_Naprawy, naprawy.OpisNaprawy, samochody.Numer_Rejestracyjny, klienci.Telefon 
          FROM klienci 
          INNER JOIN samochody ON klienci.Id_Klienta = samochody.Id_Klienta 
          INNER JOIN naprawy ON samochody.Id_Samochodu = naprawy.Id_Samochodu";
$result = mysqli_query($connect, $query);

if ($result) {
    // Pętla po wyniku zapytania
    while ($row = mysqli_fetch_assoc($result)) {
        // Tworzenie diva
        echo '<div class="maxSpan py-3 text-center bg-[#cfe0c3]" id="' . $row['Id_Naprawy'] . '">';

        // Tworzenie spana
        echo '<span class=" grid grid-flow-col grid-cols-4 py-3 text-center divide-x-2 divide-slate-400 max-h-10 overflow-hidden">';

        $Id = $row['Id_Naprawy'];
        $Dane = $row['Numer_Rejestracyjny'];
        $Opis = $row['OpisNaprawy'];
        $Kontakt = $row['Telefon'];

        // Dodawanie elementów p do spana
        echo '<p>' . $Id . '</p>';
        echo '<p>' . $Dane . '</p>';
        echo '<p>' . $Opis . '</p>';
        echo '<p>' . $Kontakt . '</p>';

        // Zamknięcie spana
        echo '</span>';

        // Zamknięcie diva
        echo '</div>';

        // Dodanie obsługi kliknięcia do diva
        echo '<script>document.getElementById("' . $Id . '").addEventListener("click", function() {';
        echo 'contentCenter("' . $Dane . '", "' . $Opis . '", "' . $Kontakt . '", "' . $Id . '");'; // Zakładając, że funkcja contentCenter jest zdefiniowana
        echo '});</script>';
    }
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($connect);
}

// Zamykanie połączenia z bazą danych
mysqli_close($connect);
?>

                </div>
            </div>

        </div>

    </div>
    <script src="listaZlecen.js"></script>
</body>

</html>
