<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="output.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/90bfbfad1c.js" crossorigin="anonymous"></script>
</head>
<body class="h-full">
        <div class="flex h-full w-full border-l-2 border-black bg-[#eee8de]">
            <div class="grid grid-cols-7 grid-rows-5 w-full h-full bg-[#6b9080]">
                
                <div class="grid col-span-2 w-full  ">
                    <div class="grid grid-flow-col grid-cols-3 grid-rows-1 place-content-center items-center">
                        <a href="Main.php"><img src="back_button.png" alt="XDDDDDd"></a>
                        <button class="col-span-2 w-20 h-20 text-4xl bg-[#34463E] rounded-full"><i class="fa-solid fa-arrow-left"></i></button>
                    </div>
                </div>
                <div class="grid col-span-3 text-center place-content-center">
                    <p class="text-3xl font-bold">Kwiecień</p>
                    <p class="text-lg">Wtorek 16.04.2024</p>
                </div>
                <div class="grid col-span-2 place-content-center ">
                    <button class="w-20 h-20 text-4xl bg-[#34463E] rounded-full"><i class="fa-solid fa-arrow-right"></i></button>
                </div>
                <div class="grid col-span-7 row-span-4 w-full h-full overflow-hidden">    
                    <div id="calendar" class="grid grid-cols-7 grid-rows-6 ">

                    </div>
                </div>
            </div>
            
        </div>

        <script>
        function appendDivToContainer(){
            var dni = ["Poniedziałek","Wtorek","Środa","Czwartek","Piątek","Sobota","Niedziela"];

            var cols = 7;
            var rows = 6;
            var container = document.getElementById("calendar");
            for(var i = 0;i<42;i++){
                var div = document.createElement('div');
                
                container.appendChild(div);
                if(i <= 6){
                    div.classList.add("childTitle");
                    div.textContent = dni[i];
                }
                else{
                    div.textContent = "siusiak";
                    div.classList.add("childContent");
                }
                
            }
        }
        appendDivToContainer();
    </script>
</body>


</html>