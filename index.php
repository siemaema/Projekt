<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
                    <p class="text-3xl font-Montserrat">Zrobic na juz</p>
                </div>
                <div id="test" class="grid row-span-4 col-span-7 p-2 grid-cols-1 grid-rows-5">
                    <div class="childContentMain grid grid-flow-col row-span-1 grid-cols-5"><span class="grid grid-flow-col col-span-4"><p>blachy : </p> <p>Opis Naprawy : </p><p>Pozostały czas naprawy : </p></span><img class="size-20 ml-auto" src="img/exclamation_mark_red-removebg-preview.png" alt="dupa"></div>
                    <div class="childContentMain grid grid-flow-col row-span-1 grid-cols-5"><span class="grid grid-flow-col col-span-4"><p>blachy : </p> <p>Opis Naprawy : </p><p>Pozostały czas naprawy : </p></span><img class="size-20 ml-auto" src="img/exclamation_mark_red-removebg-preview.png" alt="xddd"></div>
                    <div class="childContentMain grid grid-flow-col row-span-1 grid-cols-5"><span class="grid grid-flow-col col-span-4"><p>blachy : </p> <p>Opis Naprawy : </p><p>Pozostały czas naprawy : </p></span><img class="size-20 ml-auto" src="img/exclamation_mark_yellow-removebg-preview.png" alt="dsadas"></div>
                    <div class="childContentMain grid grid-flow-col row-span-1 grid-cols-5"><span class="grid grid-flow-col col-span-4"><p>blachy : </p> <p>Opis Naprawy : </p><p>Pozostały czas naprawy : </p></span><img class="size-20 ml-auto" src="img/exclamation_mark_yellow-removebg-preview.png" alt="dsa"></div>
                    <div class="childContentMain grid grid-flow-col row-span-1 grid-cols-5"><span class="grid grid-flow-col col-span-4"><p>blachy : </p> <p>Opis Naprawy : </p><p>Pozostały czas naprawy : </p></span><img class="size-20 ml-auto" src="img/exclamation_mark_yellow-removebg-preview.png" alt="dsa"></div>
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
 
<!-- <script> // ogólnie to jakieś gówno ale będzie poprawiane, dzisiaj chce mi się za bardzo spać i nie dam rady
    var content = document.getElementById("test");
    for(var i = 0;i<=4;i++){
        var widget = document.createElement("div");
        var tresc = document.createElement("p");
        var img =document.createElement("img");
        tresc.textContent = "tu będzie najważniejsze info o naprawie która będzie najszybiciej";
        tresc.classList.add("text-center")
        widget.classList.add('childContentMain',"grid","grid-flow-col");
        img.src="img/exclamation_mark_yellow.jpg";
        img.classList.add("w-20", "h-20")
        widget.appendChild(tresc);
        widget.appendChild(img);
        content.appendChild(widget);
    }
</script> -->

</html>