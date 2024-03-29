var listItems = document.querySelectorAll("li");

listItems.forEach((item) => {
    item.addEventListener("click", function () {
        listItems.forEach((otherItem) => {
            if (otherItem !== item) {
                otherItem.classList.remove("active");
                otherItem.style.background = "initial";
                otherItem.style.color = ""; // Reset text color
            }
        });

        item.classList.add("active");
        item.style.background = "#000";
        item.style.color = "white"; // Set text color to white
    });
});


