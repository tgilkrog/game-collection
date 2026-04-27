export default function menu () {
    const openBtn = document.getElementById("menu-toggle");
    const closeBtn = document.getElementById("menu-close");
    const menu = document.getElementById("navbar-menu");

    // Open
    openBtn.addEventListener("click", () => {
        menu.classList.add("active");
    });

    // Close button
    closeBtn.addEventListener("click", () => {
        menu.classList.remove("active");
    });

    // Close on background click
    menu.addEventListener("click", (e) => {
        if (e.target === menu) {
            menu.classList.remove("active");
        }
    });
}