<?php
$servername = "srv1482.hstgr.io";
$username = "u749382198_admin";
$password = "uZq:D*K9";
$dbname = "u749382198_autoservice";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Pobieranie danych z formularza
    $existing_car_id = isset($_POST['existing_car_id']) ? $_POST['existing_car_id'] : null;
    $new_car_registration_number = isset($_POST['new_car_registration_number']) ? $_POST['new_car_registration_number'] : '';
    $client_id = $_POST['client_id'];
    $repair_description = $_POST['repair_description'];
    $repair_cost = $_POST['repair_cost'];
    $start_date = $_POST['start_date'];
    $end_date = null;
    $car_brand = $_POST['car_brand'];
    $car_model = $_POST['car_model'];
    $car_year = $_POST['car_year'];

    // Debug: Wyświetlanie pobranych danych
    echo "<pre>";
    echo "Existing Car ID: " . $existing_car_id . "\n";
    echo "New Car Registration Number: " . $new_car_registration_number . "\n";
    echo "Client ID: " . $client_id . "\n";
    echo "Repair Description: " . $repair_description . "\n";
    echo "Repair Cost: " . $repair_cost . "\n";
    echo "Start Date: " . $start_date . "\n";
    echo "Car Brand: " . $car_brand . "\n";
    echo "Car Model: " . $car_model . "\n";
    echo "Car Year: " . $car_year . "\n";
    echo "</pre>";

    if (empty($existing_car_id)) {
        // Dodawanie nowego samochodu, jeśli nie wybrano istniejącego
        $sql = "INSERT INTO samochody (Id_Klienta, Marka, Model, Rok_Produkcji, Numer_Rejestracyjny) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("issss", $client_id, $car_brand, $car_model, $car_year, $new_car_registration_number);
        $stmt->execute();

        // Pobieranie ID nowo dodanego samochodu
        $existing_car_id = $stmt->insert_id;
        $stmt->close();
    }

    // Sprawdzenie, czy wybrana data jest już zajęta
    $sql = "SELECT COUNT(*) as count FROM naprawy WHERE DataRozpoczecia = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $start_date);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $num_repairs = $row['count'];
    $stmt->close();

    if ($num_repairs >= 4) {
        $next_available_date = findNextAvailableDate($conn, $start_date);
        echo "<script>alert('Nie można dodać naprawy w wybranej dacie. Następna dostępna data: $next_available_date');</script>";
    } else {
        // Debug: Wyświetlanie zapytania SQL przed jego wykonaniem
        echo "<pre>";
        echo "SQL Query: INSERT INTO naprawy (Id_Samochodu, DataRozpoczecia, DataZakonczenia, OpisNaprawy, Koszt) VALUES (?, ?, ?, ?, ?)\n";
        echo "Values: $existing_car_id, $start_date, $end_date, $repair_description, $repair_cost\n";
        echo "</pre>";

        // Dodawanie nowej naprawy
        $sql = "INSERT INTO naprawy (Id_Samochodu, DataRozpoczecia, DataZakonczenia, OpisNaprawy, Koszt) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("isssd", $existing_car_id, $start_date, $end_date, $repair_description, $repair_cost);
        $stmt->execute();
        $stmt->close();
    }
}

// Funkcja znajdująca najbliższą dostępną datę
function findNextAvailableDate($conn, $start_date) {
    $sql = "SELECT DISTINCT DataRozpoczecia FROM naprawy";
    $result = $conn->query($sql);
    $busy_dates = [];
    while ($row = $result->fetch_assoc()) {
        $busy_dates[] = $row['DataRozpoczecia'];
    }

    $next_date = date('Y-m-d', strtotime($start_date . ' + 1 day'));
    while (in_array($next_date, $busy_dates)) {
        $next_date = date('Y-m-d', strtotime($next_date . ' + 1 day'));
    }
    return $next_date;
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dodaj naprawę</title>
    <link rel="shortcut icon" href="img/icon.png" type="image/x-icon">
    <link rel="stylesheet" href="output.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/90bfbfad1c.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body class="bg-[#6b9080]">
    <div class="flex">
        <div>
            <a href="index.php"><img src="img/back_button.png" alt="Back" class="object-scale-down h-10 mt-2 ml-2"></a>
        </div>
        <div class="container mx-auto py-8">
            <form method="POST" class="max-w-lg mx-auto bg-[#a4c3b2] shadow-md rounded px-8 pt-6 pb-8 mb-4">
                <div class="mb-4">
                    <label for="existing_car_id" class="block text-gray-700 text-sm font-bold mb-2">Wybierz istniejący samochód:</label>
                    <select name="existing_car_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <option value="">-- Wybierz samochód --</option>
                        <?php
                        $conn = new mysqli($servername, $username, $password, $dbname);
                        $sql = "SELECT Id_Samochodu, Marka, Model, Numer_Rejestracyjny FROM samochody";
                        $result = $conn->query($sql);
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row['Id_Samochodu'] . "'>" . $row['Marka'] . " " . $row['Model'] . " - " . $row['Numer_Rejestracyjny'] . "</option>";
                        }
                        $conn->close();
                        ?>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="new_car_registration_number" class="block text-gray-700 text-sm font-bold mb-2">Lub wprowadź nowy samochód:</label>
                    <input type="text" name="new_car_registration_number" placeholder="Numer rejestracyjny" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    <input type="text" name="car_brand" placeholder="Marka" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mt-2">
                    <input type="text" name="car_model" placeholder="Model" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mt-2">
                    <input type="text" name="car_year" placeholder="Rok produkcji" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mt-2">
                </div>
                <div class="mb-4">
                    <label for="client_id" class="block text-gray-700 text-sm font-bold mb-2">Wybierz klienta:</label>
                    <select name="client_id" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <option value="">-- Wybierz klienta --</option>
                        <?php
                        $conn = new mysqli($servername, $username, $password, $dbname);
                        $sql = "SELECT Id_Klienta, Imie, Nazwisko FROM klienci";
                        $result = $conn->query($sql);
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row['Id_Klienta'] . "'>" . $row['Imie'] . " " . $row['Nazwisko'] . "</option>";
                        }
                        $conn->close();
                        ?>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="repair_description" class="block text-gray-700 text-sm font-bold mb-2">Opis naprawy:</label>
                    <input type="text" name="repair_description" required placeholder="Opis naprawy" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                    <label for="repair_cost" class="block text-gray-700 text-sm font-bold mb-2">Koszt naprawy:</label>
                    <input type="number" step="0.01" name="repair_cost" required placeholder="Koszt naprawy" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                    <label for="start_date" class="block text-gray-700 text-sm font-bold mb-2">Data rozpoczęcia:</label>
                    <input type="date" name="start_date" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="flex items-center justify-between">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Dodaj Naprawę</button>
                </div>
            </form>
        </div>
    </div>
</
