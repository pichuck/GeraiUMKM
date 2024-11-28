const hamburger = document.getElementById('hamburger');
const mobileMenu = document.getElementById('mobileMenu');
const closeMenu = document.getElementById('closeMenu');

hamburger.addEventListener('click', () => {
  mobileMenu.classList.toggle('hidden');
});

closeMenu.addEventListener('click', () => {
  mobileMenu.classList.add('hidden');
});


// infnite loop logo
var copy = document.querySelector(".logos-slide").cloneNode(true);
document.querySelector(".logos").appendChild(copy);

const slider = document.getElementById('slider');
const next = document.getElementById('next');
const prev = document.getElementById('prev');

let scrollPosition = 0;
const cardWidth = 256; // Width of each card including margin (adjust if necessary)
const maxScrollPosition = (slider.children.length - 3) * cardWidth; // Limit scroll to last set of cards

next.addEventListener('click', () => {
    if (scrollPosition < maxScrollPosition) {
        scrollPosition += cardWidth;
        slider.style.transform = `translateX(-${scrollPosition}px)`;
    }
});

prev.addEventListener('click', () => {
    if (scrollPosition > 0) {
        scrollPosition -= cardWidth;
        slider.style.transform = `translateX(-${scrollPosition}px)`;
    }
});