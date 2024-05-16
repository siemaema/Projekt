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
<body class="h-full">
        <div class="flex h-full w-full bg-[#6b9080]">
            <div>
                <a href="index.php"><img src="img/back_button.png" alt="xddd" class="object-scale-down h-10 mt-2 ml-2"></a>
            </div>
            <div class="grid grid-cols-7 grid-rows-5 w-full h-full py-3 mr-14">
                <div class="grid col-span-2 w-full place-content-center ">
                    <button class="previous-month-btn w-20 h-20 text-4xl bg-[#34463E] rounded-full"><i class="fa-solid fa-arrow-left"></i></button>
                </div>
                <div class="grid col-span-3 text-center place-content-center">
                    <span class="current-month text-3xl font-bold"></span>
                    <span class="current-date text-lg"></span>
                </div>
                <div class="grid col-span-2 place-content-center ">
                    <button class="next-month-btn w-20 h-20 text-4xl bg-[#34463E] rounded-full"><i class="fa-solid fa-arrow-right"></i></button>
                </div>
                <div class="grid col-span-7 row-span-4 w-full h-full overflow-hidden">    
                        <div id="calendar" class="calendar grid grid-cols-7 grid-rows-6 ">

                        </div>
                </div>
            </div>
        </div>
        <script src="getCalendar.js"></script>

        
</body>


</html>