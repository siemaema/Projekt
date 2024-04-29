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
        <div class="flex h-full w-full bg-[#6b9080]">
            <div>
                <a href="Main.php"><img src="img/back_button.png" alt="xddd" class="object-scale-down h-10 mt-2 ml-2"></a>
            </div>
            <div class="grid grid-cols-7 grid-rows-5 w-full h-full py-3 mr-14">
                <div class="grid col-span-2 w-full place-content-center ">
                    <button class="w-20 h-20 text-4xl bg-[#34463E] rounded-full"><i class="fa-solid fa-arrow-left"></i></button>
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
                var div = document.createElement('button');
                
                container.appendChild(div); //to leci do wyjebania 
                if(i <= 6){
                    div.classList.add("childTitle");
                    div.textContent = dni[i];
                }
                else{
                    div.textContent = i;
                    div.classList.add("childContent");
                }
                div.id = i;
                
            }
        }
        appendDivToContainer();

        document.querySelectorAll('.childContent').forEach(button => {
        button.addEventListener('click', event => {
        const buttonId = button.id;
        alert("Kliknąłeś " + buttonId);
    });
});    
        
        
    </script>
</body>


</html>