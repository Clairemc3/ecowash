const toggleTrigger = document.querySelector('.js-toggleTrigger');

if (toggleTrigger){
    toggleTrigger.addEventListener('click', () => {
        target = toggleTrigger.dataset.toggletarget;
        toggleable = document.querySelector(target);
        transition = toggleable.dataset.transition;
        transitionIn = toggleable.dataset.transitionin;
        transitionOut = toggleable.dataset.transitionout;
        if (toggleable.classList.contains(transitionIn)) {
            toggleable.classList.remove(transitionIn);
            toggleable.classList.toggle(transitionOut);
        } else {
            toggleable.classList.remove(transitionOut);
            toggleable.classList.toggle(transitionIn);
        }

    });
}