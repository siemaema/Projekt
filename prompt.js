function createCenterContent(Blachy, Opis, dzien) {
    var contener = document.createElement("div");
    contener.classList.add("fixed", "inset-0", "bg-white", "opacity-80");

    var centerDiv = document.createElement("div");
    centerDiv.classList.add("CenterDivParent", "absolute", "top-1/2", "left-1/2", "w-2/5", "h-2/3", "-translate-x-1/2", "-translate-y-1/2", "p-4", "rounded-md");

    var paragraph1 = document.createElement("p");
    paragraph1.textContent = Blachy;
    paragraph1.classList.add("CenterDivChild");

    var paragraph2 = document.createElement("p");
    paragraph2.textContent = Opis;
    paragraph2.classList.add("CenterDivChild");

    var paragraph3 = document.createElement("p");
    paragraph3.textContent = dzien;
    paragraph3.classList.add("CenterDivChild");

    centerDiv.style.opacity = "1";

    centerDiv.appendChild(paragraph1);
    centerDiv.appendChild(paragraph2);
    centerDiv.appendChild(paragraph3);

    centerDiv.addEventListener('click', (event) => {
        event.stopPropagation();
    });

    contener.addEventListener('click', () => {
        // Usuwanie kontenera po kliknięciu
        contener.remove();
    });

    contener.appendChild(centerDiv);
    document.body.appendChild(contener);
}