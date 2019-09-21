console.log('fgfg');
const burgerMenu = document.getElementById('menuToggle');

burgerMenu.addEventListener('click', () => {
    menu = document.querySelector('.main-header__navigation');
    burgerMenu.classList.toggle("change");
    menu.classList.toggle("main-header__navigation-visible");
});