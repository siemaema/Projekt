<!DOCTYPE html>
<html lang="en" class="h-full ">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
            <a href="Main.php"><img src="img/back_button.png" alt="xddd" class="object-scale-down h-10 mt-2 ml-2"></a>
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
                <div id="listaZlecen" class="grid grid-cols-4 row-span-5 gap-2  overflow-y-auto">

                </div>
            </div>
                
        </div>
            
    </div>
    

<script>
    
    var content = document.getElementById("listaZlecen");
    var rows = 15;
    var cols = 4;
    for(var i =0;i<40;i++){
        var div = document.createElement("div");
        content.appendChild(div);
        div.classList.add("bg-red-200","p-5","my-1");
        div.textContent = "TEST"+i;
            
    }
</script>
</body>

</html>

