//Get the button:

let scrollToTopButton = document.getElementById("scrollToTop");

// When the user scrolls down 20px from the top of the document, show the button

if (scrollToTopButton) {
    scrollToTopButton.addEventListener('click', () => {
        window.scrollTo({
            top: 0,
            left: 0,
            behavior: 'smooth'
          });
    });
    window.onscroll = function() {scrollFunction()};
}

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    scrollToTopButton.style.display = "block";
  } else {
    scrollToTopButton.style.display = "none";
  }
}
