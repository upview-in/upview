/*
* ----------------------------------------------------------------------------------------
Author        : Rama Hardian Sidik
Template Name : Rush - multipurpose personal portfolio bootstrap 5 landing page template
Version       : 1.1
Filename      : main.js
* ----------------------------------------------------------------------------------------
*/
const rushinit = (function() {
    "use strict";
    // variable 
    var body = document.querySelector('body');
    var header = document.getElementById('wrap-header');
    var wrapload = document.querySelector('.loading');
    var glass = document.querySelector('.glasseffect');
    var GL = document.querySelectorAll(".gl");
    var menubar = document.querySelector('.menu-bar');
    var closemenu = document.querySelector('.wrap-close')
    var mobilenav = document.querySelector('.mobile-navwrap');
    var mobilelink = document.querySelectorAll('.navigation-listmobile li a');
    var testimonials = document.getElementById("wrap-testimonial");
    var buttonsubmit = document.getElementById('submitbutton');
    var formcontact = document.getElementById('formcontact');
    var allinputs = formcontact.querySelectorAll('.input-control');
    var information = document.querySelector('.contactform__loader');
    var inputelement = document.querySelector('.inputtext');
    var textareaelement = document.querySelector('.comentarea');
    // glass effect on desktop this will not work on firefox
    var glassx = true;
    // glass effect on mobile this will not work on firefox
    var glassonmobile = true;
    //detect mobile device
    var isMobile = {
        Android: function() {
            return navigator.userAgent.match(/Android/i);
        },
        BlackBerry: function() {
            return navigator.userAgent.match(/BlackBerry/i);
        },
        iOS: function() {
            return navigator.userAgent.match(/iPhone|iPad|iPod/i);
        },
        Opera: function() {
            return navigator.userAgent.match(/Opera Mini/i);
        },
        Windows: function() {
            return navigator.userAgent.match(/IEMobile/i);
        },
        any: function() {
            return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
        }
    };
    // loader page
    const loadder = function(e) {
        setTimeout(() => {
            fadeOut(wrapload)
        }, 1000);
    };
    // testimonial slider 
    const testimonialslider = function(e) {
        new KeenSlider(testimonials, {
            loop: true,
            mode: "free-snap",
            breakpoints: {
                "(min-width: 320px)": {
                    slides: { perView: 1, spacing: 5 },
                },
                "(min-width: 400px)": {
                    slides: { perView: 1, spacing: 5 },
                },
                "(min-width: 1000px)": {
                    slides: { perView: 1, spacing: 20 },
                },
            },
            slides: {
                perView: 2,
                spacing: 15,
            }
        });
    };
    // titlt image 
    const tiltinit = function(e) {
        VanillaTilt.init(GL, {
            max: 10,
            speed: 400
        });
    };
    //fade in effect
    const fadeIn = function(el) {
        el.classList.add('show');
        el.classList.remove('hide');
    };
    //fade out effect
    const fadeOut = function(el) {
        el.classList.add('hide');
        el.classList.remove('show');
    };
    // form post submit  
    const posttheform = function(e) {
        formcontact.onsubmit = async(e) => {
            e.preventDefault();
            var valid = [];
            allinputs.forEach(function(i, j) {
                if (i.getAttribute('data-name')) {
                    var checkAttr = i.getAttribute('data-name');
                } else {
                    var checkAttr = i.tagName;
                }
                var thisvalue = i.value;
                // check input valid
                switch (checkAttr) {
                    case 'name':
                        if (thisvalue == '') {
                            i.classList.add("error");
                            valid.push('<li>Please check your input name</li>');
                        } else if (thisvalue.length < 3) {
                            valid.push('<li>Sorry your name char is to short</li>');
                        } else {
                            i.classList.remove("error");
                        }

                        break;
                    case 'email':
                        var regEmail = /^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
                        if (i.value == '' || !regEmail.test(i.value)) {
                            i.classList.add("error");
                            valid.push('<li>Please check your mail address input</li>');
                        } else {
                            i.classList.remove("error");
                        }
                        break;
                    case 'comment':
                        if (thisvalue == '') {
                            i.classList.add("error");
                            valid.push('<li>Please write something</li>');
                        } else {
                            i.classList.remove("error");
                        }

                        break;
                    default:
                        if (i.value == '') {
                            valid.push('<li>Something was wrong</li>');
                            i.classList.add("error");
                        } else {
                            i.classList.remove("error");
                        }
                        break;
                };
            });
            if (valid.length) {
                information.innerHTML = `<div class="alert alert-danger" role="alert"><h4 class="alert-heading">There is something wrong !</h4> <hr><p class="mb-0"><ul class="errorlist">` + valid.join('') + `</ul></p></div>`;
            } else {
                information.innerHTML = `<div class="d-flex align-items-center"><strong class="font-weight-normal">Please wait...</strong><div class="spinner-border spinner-border-sm ml-auto" role="status" aria-hidden="true"></div></div>`;
                inputelement.setAttribute("readonly", "true");
                textareaelement.setAttribute("readonly", "true");
                buttonsubmit.setAttribute("disable", "true");
                // change the fetch address based on the mail.php file you put in your server's file directory ---------------------------
                let response = await fetch('mail.php', {
                        method: 'POST',
                        body: new FormData(formcontact)
                    })
                    .then((response) => response.text())
                    //Then with the data from the response in JSON...
                    .then((data) => {
                        if (data === 'your message send') {
                            formcontact.reset();
                            inputelement.removeAttribute("readonly");
                            textareaelement.removeAttribute("readonly");
                            buttonsubmit.removeAttribute("disable");
                            information.innerHTML = `<div class="alert alert-success  " role="alert"><h4 class="alert-heading">Message send successful !</h4> <hr><p class="mb-0">I will reply to your message soon thank you</p></div>`;
                        }
                    })
                    //Then with the error genereted...
                    .catch((error) => {
                        formcontact.reset();
                        inputelement.removeAttribute("readonly");
                        textareaelement.removeAttribute("readonly");
                        buttonsubmit.removeAttribute("disable");
                        information.innerHTML = `<div class="alert alert-danger " role="alert"><h4 class="alert-heading">There is something wrong !</h4> <hr><p class="mb-0">Sorry, your message failed to be sent due to an unknown error</p></div>`;
                    });
            }
            return false;
        };
    };
    // click button menu burger
    const buttonclick = function(e) {
        // menu mobile toggle
        menubar.addEventListener("click", function(e) {
            //your handler here 
            this.style.display = 'none';
            mobilenav.style.display = 'block';
            mobilenav.classList.remove('closemenu');
            mobilenav.classList.add('showmenu');
            closemenu.style.display = 'block';
            body.classList.add('fixed');
            e.preventDefault();
        }, false);
        //close menu 
        closemenu.addEventListener("click", function(e) {
            this.style.display = 'none';
            mobilenav.classList.remove('showmenu');
            mobilenav.classList.add('closemenu');
            body.classList.remove('fixed');
            menubar.style.display = 'block';
            e.preventDefault();
        }, false);
        // mobile link navigation 
        for (var i = 0; i < mobilelink.length; i++) {
            mobilelink[i].addEventListener('click', function(e) {
                closemenu.style.display = 'none';
                mobilenav.classList.remove('showmenu');
                mobilenav.classList.add('closemenu');
                body.classList.remove('fixed');
                menubar.style.display = 'block';
            }, false);
        };
    };
    //binds event ----------------------------
    const bindEvents = function(e) {
        // window onbuffer
        window.onbeforeunload = function(e) {
            // force scroll to top when refresh page
            window.scrollTo(0, 0);
        };
        // window load
        window.addEventListener('load', (e) => {
            //load animation page 
            loadder();
        });
        // document load
        window.addEventListener('DOMContentLoaded', (e) => {
            // menu 
            buttonclick();
            // scroll spy 
            new bootstrap.ScrollSpy(document.body, {
                target: '*',
                offset: 1
            });
            //init if not on mobile 
            if (!isMobile.any()) {
                tiltinit();
            };
            //slider
            testimonialslider();
            // GLightbox 
            GLightbox();
            // animated on scroll
            AOS.init({
                disable: function() {
                    var maxWidth = 999;
                    return window.innerWidth < maxWidth;
                },
                once: false
            });
            // post contact 
            posttheform();
        });
        window.addEventListener("scroll", (e) => {
            if (window.pageYOffset > 10) {
                header.classList.add('fixi');
            } else {
                header.classList.remove('fixi');
            };
        });
        window.addEventListener("activate.bs.scrollspy", (e) => {
            // let links = navlinks.classList.contains('active');
            var index = document.querySelector('nav a.active').getAttribute('href');
            if (index == '#home') {
                fadeOut(glass);
            };
            if (isMobile.any()) {
                if (glassonmobile) {
                    // comment this line if dont want any glass blur effect
                    if (index == '#home') {
                        fadeOut(glass);
                    } else {
                        fadeIn(glass);
                    }
                };
            };
            if (!isMobile.any()) {
                if (glassx) {
                    // comment this line if dont want any glass blur effect
                    if (index == '#home' || index == '#contact-section') {
                        fadeOut(glass);
                    } else {
                        fadeIn(glass);
                    }
                };
            };
        });
    };
    // init - initilizes elements and events
    const Init = function(e) {
        bindEvents();
    };
    return {
        Init: Init
    };
}());
//initilizing app
rushinit.Init();