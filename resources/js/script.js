document.addEventListener("DOMContentLoaded", function () {
    const menuItems = document.querySelectorAll(".menu ul li a");

    menuItems.forEach((item) => {
        item.addEventListener("mouseenter", () => {
            item.style.transform = "scale(1.1)";
        });

        item.addEventListener("mouseleave", () => {
            item.style.transform = "scale(1)";
        });
    });
});