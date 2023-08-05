

const questionIcon = document.querySelector('.question-icon');
const infoBox = document.querySelector('.info-box');

questionIcon.addEventListener('click', () => {
    infoBox.style.display = infoBox.style.display === 'block' ? 'none' : 'block';
});
<!-- Swiper JS -->


<!-- Initialize Swiper -->
var swiper = new Swiper(".mySwiper", {
autoHeight: true,
spaceBetween: 20,
navigation: {
nextEl: ".swiper-button-next",
prevEl: ".swiper-button-prev",
},
pagination: {
el: ".swiper-pagination",
clickable: true,
},
});
