document.addEventListener('DOMContentLoaded', () => {

    'use strict';

    let elementAccess = {
        header: document.querySelector('.header'),

        headerTop: document.querySelector('.header__top'),

        headerBottom: document.querySelector('.header__bottom'),

        headerBottomBackground: document.querySelector('.header__bottom-background'),

        headerNavLink: document.querySelectorAll('.header__nav-link'),

        headerNavPopupBtn: document.querySelector('.header__nav-popup-btn'),

        headerNavPopupWindow: document.querySelector('.header__nav-popup-window'),

        headerNavPopupArrow: document.querySelector('.header__nav-popup-arrow'),

        headerBurger: document.querySelector('.header__burger'),

        headerBurgerElement: document.querySelectorAll('.header__burger-elem'),

        headerCloseMenu: document.querySelector('.header__close-menu'),

        bodyWrapper: document.querySelector('.body__wrapper')
    };


    let oldScroll = 0;

    document.addEventListener('scroll', () => {

        if (window.innerWidth <= 1023 && getScrollCoordinates() >= 100) {
            let newScroll = getScrollCoordinates();

            if (newScroll >= oldScroll && !elementAccess.headerBurger.classList.contains('header__burger-active')) {
                elementAccess.header.style.transform = 'translateY(-100%)';
            } else {
                elementAccess.header.style.transform = 'translateY(0%)';
            }

            oldScroll = newScroll;
        } else {
            elementAccess.header.style.transform = 'none';
        }

        if(getScrollCoordinates() >= getHeaderTopHeight() && window.innerWidth > 1023) {
            elementAccess.headerBottom.classList.add('header__bottom-active');

            elementAccess.headerBottomBackground.style.bottom = '0';
        } else {
            elementAccess.headerBottom.classList.remove('header__bottom-active');

            elementAccess.headerBottomBackground.style.bottom = '100%';
        }

        elementAccess.headerNavPopupWindow.classList.remove('header__nav-popup-window-active');
        elementAccess.headerNavPopupArrow.classList.remove('header__nav-popup-arrow-active');
        elementAccess.headerNavPopupBtn.classList.remove('header__nav-popup-background-up');
        elementAccess.headerNavPopupBtn.classList.remove('header__nav-popup-background-down');

    });


    window.addEventListener('resize', () => {

        if (getScrollCoordinates() >= getHeaderTopHeight() && window.innerWidth > 1023) {
            elementAccess.headerBottom.classList.add('header__bottom-active');

            elementAccess.headerBottomBackground.style.bottom = '0';
        }

        if (window.innerWidth <= 1023) {
            elementAccess.headerBottom.classList.remove('header__bottom-active');
        }

        if (window.innerWidth > 1023) {
            document.body.classList.remove('body__overflow');
        } else if (window.innerWidth <= 1023 && elementAccess.headerBottom.classList.contains('header__bottom-active-adaptive')) {
            document.body.classList.add('body__overflow');
        }

    });


    elementAccess.headerNavPopupBtn.addEventListener('click', () => {

        if(getScrollCoordinates() <= getHeaderTopHeight()) {
            elementAccess.headerNavPopupBtn.classList.toggle('header__nav-popup-background-up');
        } else {
            elementAccess.headerNavPopupBtn.classList.toggle('header__nav-popup-background-down');
        }

        elementAccess.headerNavPopupWindow.classList.toggle('header__nav-popup-window-active');
        elementAccess.headerNavPopupArrow.classList.toggle('header__nav-popup-arrow-active');

    });


    document.addEventListener('click', event => {

        let clickCoordinatesPopupWindow = event.composedPath().includes(elementAccess.headerNavPopupWindow);
        let clickCoordinatesPopupBtn = event.composedPath().includes(elementAccess.headerNavPopupBtn);

        if(!clickCoordinatesPopupBtn && !clickCoordinatesPopupWindow) {
            elementAccess.headerNavPopupWindow.classList.remove('header__nav-popup-window-active');
            elementAccess.headerNavPopupArrow.classList.remove('header__nav-popup-arrow-active');

            elementAccess.headerNavPopupBtn.classList.remove('header__nav-popup-background-up');
            elementAccess.headerNavPopupBtn.classList.remove('header__nav-popup-background-down');
        }

    });


    elementAccess.headerBurger.addEventListener('click', () => {

        elementAccess.headerBurger.classList.toggle('header__burger-active');
        elementAccess.headerBottom.classList.toggle('header__bottom-active-adaptive');
        elementAccess.headerBottom.classList.remove('header__bottom-active');
        elementAccess.headerCloseMenu.classList.toggle('header__close-menu-active');
        document.body.classList.toggle('body__overflow');

    });

    elementAccess.headerBurger.addEventListener('touchstart', function() {
        this.classList.remove('header__burger-hover');
    });


    elementAccess.headerCloseMenu.addEventListener('click', () => {

        elementAccess.headerBurger.classList.remove('header__burger-active');
        elementAccess.headerBottom.classList.remove('header__bottom-active-adaptive');
        elementAccess.headerCloseMenu.classList.remove('header__close-menu-active');
        document.body.classList.remove('body__overflow');

    });


    function getScrollCoordinates() {
        return window.scrollY;
    }

    function getHeaderTopHeight() {
        return elementAccess.headerTop.offsetHeight;
    }

});