import 'boxicons';
import './plugin/plugin-jquery';
import './plugin/TweenMax';
window.Vue = require('vue');

const menuBtn = document.querySelector('#brand box-icon');
const allImages = document.querySelectorAll('img');
const footerTime = document.querySelector('footer time');

menuBtn.addEventListener('click', function (){
    document.querySelectorAll('ul li:not(#brand)').forEach( (eachMenu) => {
        eachMenu.classList.toggle('show-menu');
    });
});

allImages.forEach(image => {
    image.setAttribute("draggable", "false");
});

window.addEventListener('scroll', function (){
    const heightHeader = document.querySelector('header').offsetHeight;
    const heightSkillSection = document.querySelector('#skills').offsetHeight;
    const heightNav = document.querySelector('nav').offsetHeight;
    const documentOffset = document.documentElement.scrollTop;
    const documentHeight = heightHeader + heightSkillSection + document.querySelector("#creation").offsetHeight +
        document.querySelector("#about").offsetHeight - heightNav;

    if (documentOffset >= documentHeight) {
        document.querySelector("nav").classList.add('on-bottom');
    }
    else {
        document.querySelector("nav").classList.remove('on-bottom');
    }

    if (document.documentElement.offsetWidth > 768) {
        if (document.documentElement.scrollTop > 60) {
            document.querySelector("nav").classList.add("nav-scrolled");
        }
        else {
            document.querySelector("nav").classList.remove("nav-scrolled");
        }

        if (document.documentElement.scrollTop >= heightHeader + heightSkillSection + 230) {
            TweenMax.to("#about li:first-child", 2.5, {left: "0px", opacity: 1, xPercent: "100%"});
            TweenMax.to("#about li:nth-child(2)", 2.5, {right: "0px", opacity: 1, xPercent: "-100%", delay: 0.5});
            TweenMax.to("#about li:nth-child(3)", 2.5, {left: "0px", opacity: 1, xPercent: "100%", delay: 1});
            TweenMax.to("#about li:last-child", 2.5, {right: "0px", opacity: 1, xPercent: "-100%", delay: 1.5});
        }

        if (document.documentElement.scrollTop >= heightHeader + heightSkillSection - heightNav - 230) {
            TweenMax.staggerTo("#creation figure", 0.8, {opacity: 1}, 0.3);
            TweenLite.to("#creation figure", 0.5, {ease: Power4.easeOut});
        }
    }
});

footerTime.textContent = new Date().getFullYear();

const app = new Vue({
    el: '#app',
});
