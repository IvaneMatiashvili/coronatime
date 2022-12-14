import './bootstrap';

const onBlur = document.querySelector('.on-blur');
const langArrow = document.querySelector('.lang-arrow');
const langContainer = document.querySelector('.lang-container');
let countClick = 0;


function showChangeLanguageContainer() {
    langArrow.addEventListener('click', () => {
        if (countClick === 0) {
            langContainer.style.display = 'flex';
            onBlur.style.display = 'block';
            countClick++;
        } else {
            langContainer.style.display = 'none';
            onBlur.style.display = 'none';
            countClick = 0;
        }
    });
    onBlur.addEventListener('click', () => {
        if (countClick === 0) {
            langContainer.style.display = 'flex';
            onBlur.style.display = 'block';
            countClick++;
        } else {
            langContainer.style.display = 'none';
            onBlur.style.display = 'none';
            countClick = 0;
        }
    })
}

showChangeLanguageContainer();
