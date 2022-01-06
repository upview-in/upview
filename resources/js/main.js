(function ($) {
  "use strict";

  /*----------------------------------
  # header sticky 
  -----------------------------------*/

  var activeSticky = $("#active-sticky"),
    winDow = $(window);
  winDow.on("scroll", function () {
    var scroll = $(window).scrollTop(),
      isSticky = activeSticky;
    if (scroll < 1) {
      isSticky.removeClass("is-sticky");
    } else {
      isSticky.addClass("is-sticky");
    }
  });

  /*----------------------------------
  # Off Canvas Menu
  -----------------------------------*/

  var $offcanvasNav = $("#offcanvas-menu a");
  $offcanvasNav.on("click", function () {
    var link = $(this);
    var closestUl = link.closest("ul");
    var activeLinks = closestUl.find(".active");
    var closestLi = link.closest("li");
    var linkStatus = closestLi.hasClass("active");
    var count = 0;

    closestUl.find("ul").slideUp(function () {
      if (++count == closestUl.find("ul").length)
        activeLinks.removeClass("active");
    });

    if (!linkStatus) {
      closestLi.children("ul").slideDown();
      closestLi.addClass("active");
    }
  });

  //   Progress
  var element = $(".ht-progress");
  element.each(function () {
    var $element = $(this);
    $element.waypoint(
      function () {
        // Progress bar
        var progressBar = $(".progress-bar"),
          progressBarSpan = $(".progress-bar span");
        progressBar.each(function () {
          var eachBarWidth = $(this).attr("aria-valuenow");
          $(this).width(eachBarWidth + "%");
        });
        progressBarSpan.addClass("opacity");
      },
      {
        offset: $element.data("offset"),
      }
    );
  });

  /*-----------------------------------
  # case details carousel
  ------------------------------ */
  var caseDetailsCarousel = new Swiper(
    ".case-details-carousel .swiper-container",
    {
      loop: true,
      speed: 1000,
      autoplay: true,
      slidesPerView: 1,
      spaceBetween: 0,
      navigation: {
        nextEl: ".case-details-carousel .swiper-button-next",
        prevEl: ".case-details-carousel .swiper-button-prev",
      },
    }
  );
  /*-----------------------------------
  # service-carousel
  ------------------------------ */
  var serviceCarousel = new Swiper(".service-carousel .swiper-container", {
    loop: true,
    speed: 800,
    autoplay: true,
    slidesPerView: 1,
    spaceBetween: 0,
    navigation: {
      nextEl: ".service-carousel .swiper-button-next",
      prevEl: ".service-carousel .swiper-button-prev",
    },
  });

  /*-----------------------------------
  # brand-carousel
  ------------------------------ */

  var brandCarousel = new Swiper(".brand-carousel .swiper-container", {
    loop: true,
    speed: 800,
    autoplay: true,
    slidesPerView: 1,
    spaceBetween: 0,
    pagination: false,
    navigation: false,
    // Responsive breakpoints
    breakpoints: {
      0: {
        slidesPerView: 1,
      },
      576: {
        slidesPerView: 2,
      },
      768: {
        slidesPerView: 3,
      },

      992: {
        slidesPerView: 4,
      },
      1200: {
        slidesPerView: 5,
      },
    },
  });

  /*-----------------------------------
  # product carousel1
  ------------------------------ */

  var caseCarousel = new Swiper(".case-carousel .swiper-container", {
    loop: true,
    speed: 800,
    spaceBetween: 30,
    pagination: false,
    centeredSlides: true,
    navigation: {
      nextEl: ".case-carousel .swiper-button-next",
      prevEl: ".case-carousel .swiper-button-prev",
    },
    observer: true,
    observeParents: true,
    // Responsive breakpoints
    breakpoints: {
      // when window width is >= 480px
      0: {
        slidesPerView: 1,
      },
      // when window width is >= 640px
      576: {
        slidesPerView: 1,
      },
      768: {
        slidesPerView: 2,
      },
      991: {
        slidesPerView: 2,
      },

      // when window width is >= 640px
      1200: {
        slidesPerView: 3,
      },
    },
  });

  /*-----------------------------------
  # product carousel2
  ------------------------------ */

  var testimonialCarousel = new Swiper(
    ".testimonial-carousel .swiper-container",
    {
      loop: true,
      speed: 1000,
      slidesPerView: 1,
      spaceBetween: 0,
      autoplay: {
        delay: 2000,
      },
      pagination: false,
      navigation: {
        nextEl: ".testimonial-carousel .swiper-button-next",
        prevEl: ".testimonial-carousel .swiper-button-prev",
      },
    }
  );

  /*----------------------------
  # Mail Chip Ajax active
  ------------------------------*/
  var mCForm = $("#mc-form");
  mCForm.ajaxChimp({
    callback: mailchimpCallback,
    //Replace this with your own mailchimp post URL. Don't remove the "". Just paste the url inside "".
    url:
      "http://devitems.us11.list-manage.com/subscribe/post?u=6bbb9b6f5827bd842d9640c82&id=05d85f18ef",
  });
  function mailchimpCallback(resp) {
    if (resp.result === "success") {
      alert(resp.msg);
    } else if (resp.result === "error") {
      alert(resp.msg);
    }
    return false;
  }

  AOS.init({
    duration: 1500, // values from 0 to 3000, with step 50ms
    disable: false, // accepts following values: 'phone', 'tablet', 'mobile', boolean, expression or function
    offset: 0, // offset (in px) from the original trigger point
    once: true,
    easing: "ease",
  });

  $("select").selectric({
    maxHeight: 200,
  });

  /*----------------------------
  #  Copy Right Year Update
  -------------------------------*/

  $("#currentYear").text(new Date().getFullYear());
  /*----------------------------
  #  scrollUp
  -------------------------------*/
  $.scrollUp({
    scrollName: "scrollUp",
    // Element ID
    scrollDistance: 400,
    // Distance from top/bottom before showing element (px)
    scrollFrom: "top",
    // 'top' or 'bottom'
    scrollSpeed: 200,
    // Speed back to top (ms)
    easingType: "linear",
    // Scroll to top easing (see http://easings.net/)
    animation: "fade",
    // Fade, slide, none
    animationSpeed: 400,
    // Animation speed (ms)
    scrollTrigger: false,
    // Set a custom triggering element. Can be an HTML string or jQuery object
    scrollTarget: false,
    // Set a custom target element for scrolling to. Can be element or number
    scrollText: '<i class="icofont-arrow-up"></i>',
    // Text for element, can contain HTML
    scrollTitle: false,
    // Set a custom <a> title if required.
    scrollImg: false,
    // Set true to use image
    activeOverlay: false,
    // Set CSS color to display scrollUp active point, e.g '#00FFFF'
    zIndex: 214, // Z-Index for the overlay
  });
})(jQuery);
