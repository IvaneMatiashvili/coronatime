const goBack = document.querySelector('.go-back');
const menuIcon = document.querySelector('.menu-icon');
const menu = document.querySelector('.menu');

goBack.addEventListener('click', () => {
    menu.style.display = 'none';
})

menuIcon.addEventListener('click', () => {
    menu.style.display = 'flex';
})