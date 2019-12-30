const burgerMenu = document.getElementById('menuToggle');

if (burgerMenu) {
    burgerMenu.addEventListener('click', () => {
        target = burgerMenu.dataset.target;
        menu = document.querySelector(target);
        burgerMenu.classList.toggle("change");
        menu.classList.toggle("main-header__navigation-visible");
    });
}
