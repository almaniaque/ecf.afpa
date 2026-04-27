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

const navElement = document.getElementById("navi");

navElement.addEventListener("click", () => {
    let menuElements = document.querySelectorAll(".menu");

});

for (let i = 0; i < menuElements.length; i++) {
    menuElements[i].addEventListener("click", (event) => {
        alert(event.target.innerHTML);
        event.preventDefault()
    });
}

const searchElement = document.getElementById("search")

searchElement.addEventListener("keypress", function (event) {
    if (event.key === "Enter") {
        alert(searchElement.value)
    }
})