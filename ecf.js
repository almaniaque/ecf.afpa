const menuElements = document.querySelectorAll(".menu");

menuElements.forEach(menu => {
    menu.addEventListener("click", () => {

        // Reset
        menuElements.forEach(el => el.classList.remove("color"));

        // Active le bon
        menu.classList.add("color");
        el.addEventListener("click", (event) => {
            alert(event.target.innerhtml)
        })

    });
});