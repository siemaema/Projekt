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
                </div>
            </div>
            <div id="obrazy" class="grid row-span-4 grid-cols-4 gap-2 overflow-y-auto">
                
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            fetch('getCont.php')
                .then(response => response.json())
                .then(data => {
                    const cont = document.getElementById('obrazy');
                    data.forEach(part => {
                        const object = document.createElement('img');
                        object.src = "img/"+part.Link;
                        object.classList.add('border-2', 'border-[#a7dec6]','saturate-200',"mix-blend-multiply");
                        
                        cont.appendChild(object);

                        object.addEventListener('click', () => {
                            const contener = document.createElement('div');
                            contener.classList.add('fixed', 'inset-0', 'bg-white', 'opacity-80');

                            const centerDiv = document.createElement('div');
                            centerDiv.classList.add('CenterDivParent', 'absolute', 'top-1/2', 'left-1/2', 'w-2/5', 'h-2/3', '-translate-x-1/2', '-translate-y-1/2', 'p-4', 'rounded-md');

                            const paragraph1 = document.createElement('p');
                            paragraph1.textContent = `Ilość części na stanie: ${part.IloscNaStanie}`;
                            paragraph1.classList.add('CenterDivChild');

                            const paragraph2 = document.createElement('p');
                            paragraph2.textContent = `Pełna nazwa części: ${part.Nazwa}`;
                            paragraph2.classList.add('CenterDivChild');

                            centerDiv.appendChild(paragraph1);
                            centerDiv.appendChild(paragraph2);

                            centerDiv.addEventListener('click', (event) => {
                                event.stopPropagation();
                            });

                            contener.addEventListener('click', () => {
                                contener.remove();
                            });

                            contener.appendChild(centerDiv);
                            document.body.appendChild(contener);
                        });
                    });
                });
        });
    </script>
</body>
</html>
