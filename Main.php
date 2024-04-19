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
            <img src="logo-no-background.png" class="animate-pulse saturate-150" alt="">
        
        </div>
        
        <div class="col-span-3 row-span-4 border-l-2 border-black bg-[#eee8de]">
            <div class="grid grid-cols-7 grid-rows-5 w-full h-full bg-[#6b9080]">
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
                    <table id="tablica" class="h-full w-full  table-fixed border-slate-950  ">
                    </table>
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

    <script>
        dni = ["Poniedzialek","Wtorek","Środa","Czwartek","Piątek","Sobota","Niedziela"]
        
        function insertChild(rows, cols){
            var table =document.getElementById('tablica');
            for(var i =0;i<rows;i++){
                var row = table.insertRow();

                for(var j=0;j<cols;j++){
                    var cell;
                    if(i === 0){
                        cell = document.createElement('th');
                        cell.classList.add("childTitle");
                    }
                    else{
                        cell = document.createElement('td');
                        cell.addEventListener("click", function(){
                            alert("kliknales komorke :"+this.innerHTML);
                        });
                        cell.classList.add("childTable");
                    }
                    cell.innerHTML = (i === 0) ? dni[j] : "xddddd";
                    
                    row.appendChild(cell);
                    
                }
            }
        }
        insertChild(5,7)
    </script>
</body>
</html>