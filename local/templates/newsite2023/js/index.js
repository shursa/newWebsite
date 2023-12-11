document.addEventListener('DOMContentLoaded', () => {

    'use strict';

    function parallaxEffect(elem, background) {

        let windowHeight = window.innerHeight;

        document.addEventListener('scroll', () => {

            let elemCoord = elem.getBoundingClientRect().top,
                windowScroll = window.scrollY;

            if (windowScroll + windowHeight >= elemCoord + windowScroll) {
                background.style.backgroundPosition = `50% ${(windowScroll - (elemCoord + windowScroll)) / 4}px`;
            }

        });

    }
    parallaxEffect(document.querySelector('.offer'),
        document.querySelector('.offer__background')
    );
    parallaxEffect(document.querySelector('.document'),
        document.querySelector('.document__background')
    );
    parallaxEffect(document.querySelector('.telegram'),
        document.querySelector('.telegram__background')
    );


    function moveElementsForPhone(parent, child, beforeParent, beforeChild, elementToInsert, windowWidth) {
        let width = window.innerWidth;

        if (width <= windowWidth) {
            parent.insertBefore(elementToInsert, child);
        }

        window.addEventListener('resize', () => {
            let dinamicWidth = window.innerWidth;

            if (dinamicWidth <= windowWidth) {
                parent.insertBefore(elementToInsert, child);
            } else {
                beforeParent.insertBefore(elementToInsert, beforeChild);
            }
        });
    }
    moveElementsForPhone(document.querySelector('.document__wrapper-text-top'),
        document.querySelector('.document__wrapper-text-top').firstElementChild,
        document.querySelector('.document__content'),
        document.querySelector('.document__text'),
        document.querySelector('.document__sample'),
        1023
    );
    moveElementsForPhone(
        document.querySelector('.footer__bottom-title'),
        document.querySelector('.footer__bottom-title').firstElementChild,
        document.querySelector('.footer__bottom-content'),
        document.querySelector('.footer__bottom-text'),
        document.querySelector('.footer__medal'),
        1023
    );


    function openHiddenText(buttons, block, content, line, buttonsClass, blockClass, contentClass, lineClass) {

        function deleteClass(num) {
            for (let i = 0; i < buttons.length; i++) {
                if (i != num) {
                    buttons[i].classList.remove(buttonsClass);
                    block[i].classList.remove(blockClass);
                    content[i].classList.remove(contentClass);
                    line[i].classList.remove(lineClass);
                }
            }
        }

        block.forEach((item, i) => {
            item.addEventListener('click', () => {
                for (let a = 0; a < block.length; a++) {
                    if (a == i) {
                        deleteClass(a);

                        buttons[i].classList.toggle(buttonsClass);
                        block[i].classList.toggle(blockClass);
                        content[i].classList.toggle(contentClass);
                        line[i].classList.toggle(lineClass);
                    }
                }
            });
        });

    }
    openHiddenText(document.querySelectorAll('.offer__course-arrow'),
        document.querySelectorAll('.offer__course'),
        document.querySelectorAll('.offer__course-content'),
        document.querySelectorAll('.offer__course-line'),
        'offer__course-arrow-active',
        'offer__course-active',
        'offer__course-content-active',
        'offer__course-line-active'
    );
    openHiddenText(document.querySelectorAll('.programm__arrow'),
        document.querySelectorAll('.programm__block'),
        document.querySelectorAll('.programm__block-text'),
        document.querySelectorAll('.programm__block-line'),
        'programm__arrow-active',
        'programm__block-active',
        'programm__block-text-active',
        'programm__block-line-active'
    );


    function calculateCourseDuration(startMove) {

        let formatArrow = document.querySelectorAll('.format__arrow'),
            formatScrollNum = document.querySelectorAll('.format__scroll-num');

        formatArrow[0].addEventListener('click', function() {
            startMove -= 100;

            formatScrollNum.forEach(item => {
                item.style.right = `${startMove}%`;
            });

            if (startMove == 0) {
                this.classList.add('format__arrow-disactive');
            }

            formatArrow[1].classList.remove('format__arrow-disactive');
        });

        formatArrow[1].addEventListener('click', function() {
            startMove += 100;

            formatScrollNum.forEach(item => {
                item.style.right = `${startMove}%`;
            });

            if (startMove == (formatScrollNum[0].childElementCount - 1) * 100) {
                this.classList.add('format__arrow-disactive');
            }

            formatArrow[0].classList.remove('format__arrow-disactive');
        });

    }
    calculateCourseDuration(100);


    function scrollDocuments(startMove) {

        let documentSampleScroll = document.querySelector('.document__sample-scroll'),
            documentImg = document.querySelectorAll('.document__img'),
            documentBtn = document.querySelectorAll('.document__btn');

        documentSampleScroll.appendChild(documentImg[0].cloneNode(true));

        let testTapDocumentBtn = true;

        setInterval( () => {
            if (testTapDocumentBtn) {
                startMove += 100;

                documentSampleScroll.style.right = `${startMove}%`;

                if (startMove == 200) {
                    setTimeout( () => {
                        startMove = 0;

                        documentSampleScroll.style.cssText = `right: ${startMove}%; transition: none`;
                    }, 500 );

                    documentBtn[0].classList.add('document__btn-active');
                    documentBtn[1].classList.remove('document__btn-active');
                } else {
                    documentSampleScroll.style.transition = '.5s';

                    documentBtn[1].classList.add('document__btn-active');
                    documentBtn[0].classList.remove('document__btn-active');
                }
            }
        }, 5000);


        documentBtn[0].addEventListener('click', function() {
            testTapDocumentBtn = false;

            startMove = 0;

            documentSampleScroll.style.cssText = `right: ${startMove}%; transition: .5s`;

            this.classList.add('document__btn-active');
            documentBtn[1].classList.remove('document__btn-active');
        });

        documentBtn[1].addEventListener('click', function() {
            testTapDocumentBtn = false;

            startMove = 100;

            documentSampleScroll.style.cssText = `right: ${startMove}%; transition: .5s`;

            this.classList.add('document__btn-active');
            documentBtn[0].classList.remove('document__btn-active');
        });

    }
    scrollDocuments(0);

});