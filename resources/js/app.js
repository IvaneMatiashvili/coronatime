import './bootstrap';

const langArrow = document.querySelector('.lang-arrow');
const langContainer = document.querySelector('.lang-container');
let countClick = 0;


function showChangeLanguageContainer(){
        langArrow.addEventListener('click', () => {
            if(countClick === 0) {
                langContainer.style.display = 'flex';
                console.log(countClick);
                countClick++;
            }else{
                langContainer.style.display = 'none';
                countClick = 0;
            }
        })
}

showChangeLanguageContainer();
