$(function () {
	"use strict";
	$(".mobile-toggle-menu").on("click", function () {
		$(".wrapper").addClass("toggled")
	}), $(".toggle-icon").click(function () {
		$(".wrapper").hasClass("toggled") ? ($(".wrapper").removeClass("toggled"), $(".sidebar-wrapper").unbind("hover")) : ($(".wrapper").addClass("toggled"), $(".sidebar-wrapper").hover(function () {
			$(".wrapper").addClass("sidebar-hovered")
		}, function () {
			$(".wrapper").removeClass("sidebar-hovered")
		}))
	}), $(document).ready(function () {
		$(window).on("scroll", function () {
			$(this).scrollTop() > 300 ? $(".back-to-top").fadeIn() : $(".back-to-top").fadeOut()
		}), $(".back-to-top").on("click", function () {
			return $("html, body").animate({
				scrollTop: 0
			}, 600), !1
		})
	}), $(function () {
		for (var e = window.location, o = $(".metismenu li a").filter(function () {
			return this.href == e
		}).addClass("").parent().addClass("mm-active"); o.is("li");) o = o.parent("").addClass("mm-show").parent("").addClass("mm-active")
	}), $(function () {
		$("#menu").metisMenu()
	}), $(".chat-toggle-btn").on("click", function () {
		$(".chat-wrapper").toggleClass("chat-toggled")
	}), $(".chat-toggle-btn-mobile").on("click", function () {
		$(".chat-wrapper").removeClass("chat-toggled")
	}), $(".email-toggle-btn").on("click", function () {
		$(".email-wrapper").toggleClass("email-toggled")
	}), $(".email-toggle-btn-mobile").on("click", function () {
		$(".email-wrapper").removeClass("email-toggled")
	}), $(".compose-mail-btn").on("click", function () {
		$(".compose-mail-popup").show()
	}), $(".compose-mail-close").on("click", function () {
		$(".compose-mail-popup").hide()
	});

	$(".switcher-btn").on("click", function () {
		$(".switcher-wrapper").toggleClass("switcher-toggled");
	});

	$(".close-switcher").on("click", function () {
		$(".switcher-wrapper").removeClass("switcher-toggled");
	});

	$("#lightmode").on("click", function () {
		$("html").attr("class", "light-theme");
		setCookie('default-theme-config', 'light-theme');
	});

	$("#darkmode").on("click", function () {
		$("html").attr("class", "dark-theme");
		setCookie('default-theme-config', 'dark-theme');
	});

	$("#semidark").on("click", function () {
		$("html").attr("class", "semi-dark");
		setCookie('default-theme-config', 'semi-dark');
	});

	$("#minimaltheme").on("click", function () {
		$("html").attr("class", "minimal-theme");
		setCookie('default-theme-config', 'minimal-theme');
	});

	$("#resetThemeConfig").click(function () {
		setCookie('default-theme-config', '');
		setCookie('default-header-config', '');
		setCookie('default-sidebar-config', '');
		$("html").attr("class", "light-theme");
	});

	for (let i = 1; i <= 8; i++) {
		// header colors
		$('#headercolor' + i).click(function () {
			$('html').addClass('color-header');
			for (let j = 1; j <= 8; j++) {
				$('html').removeClass('headercolor' + j);
			}
			$('html').addClass('headercolor' + i);
			setCookie('default-header-config', 'headercolor' + i);
		});

		// sidebar colors
		$('#sidebarcolor' + i).click(function () {
			$('html').addClass('color-sidebar');
			for (let j = 1; j <= 8; j++) {
				$('html').removeClass('sidebarcolor' + j);
			}
			$('html').addClass('sidebarcolor' + i);
			setCookie('default-sidebar-config', 'sidebarcolor' + i);
		});
	}

	// init theme from cookies
	let themeConfig = getCookie('default-theme-config');
	let headerConfig = getCookie('default-header-config');
	let sidebarConfig = getCookie('default-sidebar-config');

	if (themeConfig != "") {
		$('html').attr('class', themeConfig);
	}

	if (headerConfig != "") {
		$('html').addClass('color-header');
		$('html').addClass(headerConfig);
	}

	if (sidebarConfig != "") {
		$('html').addClass('color-sidebar');
		$('html').addClass(sidebarConfig);
	}
});