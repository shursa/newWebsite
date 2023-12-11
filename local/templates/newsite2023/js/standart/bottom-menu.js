'use strict'


function assignHeight() {

    let heightBottomMenu = document.querySelector('.bottom-menu').clientHeight,
        assignHeightBottomBlock = document.querySelector('.height-bottom-menu');

    if (window.innerWidth <= 1023) {
        assignHeightBottomBlock.style.height = `${heightBottomMenu}px`;
    } else {
        assignHeightBottomBlock.style.height = '0';
    }

    window.addEventListener('resize', () => {
        let heightBottomMenu = document.querySelector('.bottom-menu').clientHeight;

        if (window.innerWidth <= 1023) {
            assignHeightBottomBlock.style.height = `${heightBottomMenu}px`;
        } else {
            assignHeightBottomBlock.style.height = '0';
        }
    });
}
assignHeight();