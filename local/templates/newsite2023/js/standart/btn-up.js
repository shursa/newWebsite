'use strict';

document.addEventListener('scroll', () => {

    let btnUp = document.querySelector('.btn-up');

    if(window.scrollY > 0) {
        btnUp.classList.add('btn-up-active');
    } else {
        btnUp.classList.remove('btn-up-active');
    }

});