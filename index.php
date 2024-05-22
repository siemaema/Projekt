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
</head>

<body class=" bg-[#cfbeaf]">
    <div class="grid grid-cols-4 h-screen ">
        <div class="bg-[#a4c3b2] place-content-center px-1">
            <img src="img/logo-no-background.png" class="animate-pulse saturate-150" alt="">

        </div>

        <div class="col-span-3 row-span-4 border-l-2 border-black bg-[#eee8de]">
            <div class="grid grid-cols-7 grid-rows-5 w-full h-full bg-[#6b9080]">
                <div class="grid col-span-7 place-content-center">
                    <p class="text-3xl font-Montserrat text-shadow-sm">Przeprowadzić natychmiastową realizację</p>
                </div>
                <div id="test" class="grid row-span-4 col-span-7 p-2 grid-cols-1 grid-rows-5 pt-2">
                
                <?php

                    $connect = mysqli_connect("srv1482.hstgr.io","u749382198_admin","uZq:D*K9","u749382198_autoservice");
                    
                    if (mysqli_connect_errno()) {
                        exit("Błąd połączenia: " . mysqli_connect_error());
                    } else {
                        $sql = mysqli_query($connect, "SELECT Numer_Rejestracyjny, OpisNaprawy, DataRozpoczecia FROM naprawy inner join samochody ON naprawy.id_Samochodu = samochody.id_Samochodu ORDER BY DataRozpoczecia ASC LIMIT 5");
                    
                        if (!$sql) {
                            exit("Błąd zapytania: " . mysqli_error($connect));
                        }
                        $counter = 0;
                        while ($dane = mysqli_fetch_array($sql)) {$counter++;
                            echo "<div class='childContentMain grid grid-flow-col row-span-1 grid-cols-4' onclick='createCenterContent(\"" . htmlspecialchars($dane['Numer_Rejestracyjny'], ENT_QUOTES) . "\",\"" . htmlspecialchars($dane['OpisNaprawy'], ENT_QUOTES) . "\",\"" . htmlspecialchars($dane['DataRozpoczecia'], ENT_QUOTES) . "\")'>";
                            $Blachy = $dane['Numer_Rejestracyjny'];
                            $Opis = $dane['OpisNaprawy'];
                            $dzien = $dane['DataRozpoczecia'];
                    
                            echo "<p class='element pt-2'>Blachy\n $Blachy </p>";
                            echo "<p class='element pt-2'>Opis:\n $Opis</p>";
                            echo "<p class='element pt-2'>data rozpoczecia: $dzien</p>";
                    
                            if ($counter <= 2) {
                                echo "<img src='img/exclamation_mark_red-removebg-preview.png' class='size-24 ml-auto p-1'>";
                            } else {
                                echo "<img src='img/exclamation_mark_yellow-removebg-preview.png' class='size-24 ml-auto'>";
                            }
                    
                            echo "</div>";
                        }
                    
                        mysqli_close($connect); // Zamykanie połączenia z bazą danych
                    }
                    
                    
                ?>

                
            </div>
            </div>

        </div>

        <div class="row-span-3 shadow-sm bg-[#a4c3b2]  border-black">
            <div class="grid grid-cols-1 place-items-stretch h-full p-3 gap-4 text-4xl font-normal ">
                <a href="Terminarz.php" class=""><button class="w-full h-full shadow-lg rounded-md bg-[#eee8de] hover:scale-105 overflow-hidden">Terminarz</button></a>
                <a href="Lista_zleceń.php" class=""><button class="w-full h-full shadow-lg rounded-md bg-[#eee8de] hover:scale-105 overflow-hidden">Lista Zleceń</button></a>
                <a href="Magazyn.php" class=""><button class="w-full h-full shadow-lg rounded-md bg-[#eee8de] hover:scale-105 overflow-hidden">Magazyn</button></a>
                <a href="Dodaj_naprawe.php" class=""><button class="w-full h-full shadow-lg rounded-md bg-[#eee8de] hover:scale-105 overflow-hidden">Dodaj Naprawę</button></a>
            </div>
        </div>
    </div>

</body>
<script src="prompt.js"></script>
</html>