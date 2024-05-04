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
                    <p class="text-3xl font-Montserrat">przeprowadzić natychmiastową realizację</p>
                </div>
                <div id="test" class="grid row-span-4 col-span-7 p-2 grid-cols-1 grid-rows-5 pt-2">
                    
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
<script>
    
    var widget = document.getElementById("test");
    for(var i = 0;i<=4;i++){
        var cialo = document.createElement("div");
        cialo.classList.add("childContentMain", "grid", "grid-flow-col", "row-span-1", "grid-cols-5");

        var blachy = document.createElement("p");
        var Blachy = "Rejestracja : \n" +"LZA"+12341+i;
        blachy.innerHTML = Blachy;

        var opis = document.createElement("p");
        var Opis = "Opis naprawy : \n"+" Auto nadaje się do kasacji  A co jeżeli tekst jest dłuższy to nie powinno być tego widać cały czas tylko wtedy jak wybierze się konkretny kafel :)" + i;
        opis.innerHTML = Opis;

        var data = document.createElement("p");
        let date = new Date();
        var dzien = "Data zakończenia : \n"+"0" + date.getDay()+"."+date.getMonth()+"."+date.getFullYear();
        data.innerHTML = dzien;
        var img = document.createElement("img");
        if(i <=2){
            img.src="img/exclamation_mark_red-removebg-preview.png";
            img.classList.add("size-24","ml-auto","p-1")
        }
        else{
            img.src = "img/exclamation_mark_yellow-removebg-preview.png";
            img.classList.add("size-24","ml-auto")
        }

        
        var span = document.createElement("span");
        
        span.classList.add("grid", "grid-flow-col", "col-span-4");
        blachy.classList.add("element","pt-2");
        opis.classList.add("element","pt-2");
        data.classList.add("element","pt-2");
        widget.appendChild(cialo);
        cialo.appendChild(span);
        span.appendChild(blachy);
        span.appendChild(opis);
        span.appendChild(data);
        cialo.appendChild(img);

        span.addEventListener('click', () =>{
            createCenterContent(Blachy,Opis,dzien);
        })
        
    }
</script>

</html>