<!DOCTYPE html>
<html lang="en" class="h-full ">

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

<body class="h-full font-Montserrat ">
    <div class="flex h-full w-full bg-[#6b9080]">
        <div>
            <a href="index.php"><img src="img/back_button.png" alt="xddd" class="object-scale-down h-10 mt-2 ml-2"></a>
        </div>
        <div class="grid grid-cols-4 grid-rows-5 w-full h-full ">
            <div class="grid col-span-4 place-content-center ">
                <p class="text-5xl text-shadow-lg shadow-green-800">Lista Zleceń</p>
            </div>
            <div class="grid col-span-4 row-span-4 pr-5 pb-5">
                <div class="grid grid-cols-4 pr-4 gap-2 grid-flow-col">
                    <div class="navTitle rounded-tl-md">Nr zlecenia</div>
                    <div class="navTitle">Dane pojazdu</div>
                    <div class="navTitle">Opis naprawy</div>
                    <div class="navTitle rounded-tr-md">Dane kontaktowe wlasciciela</div>
                </div>
                <div id="listaZlecen" class="grid grid-cols-1 gap-2  overflow-y-auto">

                </div>
            </div>

        </div>

    </div>
<script src="listaZlecen.js"></script>
<script >
      var content = document.getElementById("listaZlecen");
    
    for (var i = 0; i < 40; i++) {
        var div = document.createElement("div");
        content.appendChild(div);
        div.classList.add("py-3", "text-center","bg-[#cfe0c3]"); // Dodaj klasy do elementu div
        div.id = i;
        
        var span = document.createElement("span");
        span.classList.add("grid", "grid-flow-col", "grid-cols-4", "py-3", "text-center","divide-x-2","divide-slate-400","max-h-10","overflow-hidden"); // Dodaj klasy do elementu span
        
        var id = document.createElement("p");
        var dane = document.createElement("p");
        var opis = document.createElement("p");
        var kontakt = document.createElement("p");
        var button = document.createElement("button");

        var Id = "numer : " + i;
        var Dane = "LZA21"+i;
        var Opis = "tako lecimy z opisem";
        var Kontakt = "+4832130421";
        id.innerHTML = Id;
        dane.innerHTML = Dane;
        opis.innerHTML = Opis;
        kontakt.innerHTML = Kontakt;
        
        span.appendChild(id);
        span.appendChild(dane);
        span.appendChild(opis);
        span.appendChild(kontakt);
        

        div.addEventListener('click', function() {
            var getId = this.id;
            console.log(getId);
            contentCenter(Dane,Opis,Kontakt,getId); // Zakładając, że funkcja createCenterContent jest zdefiniowana
            
        });

        
        div.appendChild(span);
        }
</script>
</body>

</html>