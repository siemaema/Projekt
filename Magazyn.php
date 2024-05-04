<!DOCTYPE html>
<html lang="en" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AutoServiceData</title>
    <link rel="shortcut icon" href="img\icon.png" type="image/x-icon">
    <link rel="stylesheet" href="output.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/90bfbfad1c.js" crossorigin="anonymous"></script>
</head>

<body class="h-full font-Montserrat">
    <div class="flex h-full w-full bg-[#6b9080]">
        <div>
            <a href="index.php"><img src="img/back_button.png" alt="xddd" class="object-scale-down h-10 mt-2 ml-2 mr-2"></a>
        </div>
        <div class="w-full h-full grid grid-cols-1 grid-rows-5 pr-14 pb-16">
            <div class="grid grid-rows-1 grid-cols-8 place-items-center grid-flow-col">
                <div class="grid col-span-7 ml-24">
                    <p class="grid text-3xl place-content-center">Magazyn</p>
                    <form action="Magazyn.php">
                        <input type="text" onfocus="this.value=' '" class="rounded-md mt-2" value="wyszukaj czesc">
                    </form>
                </div>
                <div>
                    <button class="bg-[#a7dec6] px-3 py-1 mb-auto" id="dodaj">Dodaj Czesc</button>
                </div>
            </div>
            <div id="obrazy" class="grid row-span-4 grid-cols-4 gap-2 overflow-y-auto">

            </div>

        </div>

    </div>
</body>


<script>
    const dodawanie = document.getElementById("dodaj");

    var liczbaElementow = 10
    var cont = document.getElementById("obrazy");

    function dodajObraz() {
        var object = document.createElement("img");
        object.src = "img/exclamation_mark_red-removebg-preview.png";
        object.classList.add("hover:translate-y-1.5", "border-2", "border-[#a7dec6]");
        cont.appendChild(object);
    }


    for (var i = 0; i < liczbaElementow; i++) {
        dodajObraz();
    }

    dodawanie.addEventListener('click', () => {
        liczbaElementow++;
        dodajObraz();
    });
</script>

</html>