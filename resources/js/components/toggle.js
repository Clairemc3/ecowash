const toggleTrigger = document.querySelector('.js-toggle');

if (toggleTrigger){
    toggleTrigger.addEventListener('click', () => {
    target = toggleTrigger.dataset.toggletarget;
    toggleable = document.querySelector(target);
    console.log(toggleable);
    toggleable.classList.toggle('hidden');
    });
}