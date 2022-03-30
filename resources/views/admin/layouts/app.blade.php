<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<!--favicon-->
	<link rel="icon" href="{{ asset('admin/images/logo/favicon.svg') }}" type="image/png" />

	<!--plugins-->
	<link href="{{ asset('admin/plugins/notifications/css/lobibox.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('admin/plugins/vectormap/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet" />
	<link href="{{ asset('admin/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
	<link href="{{ asset('admin/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" />
	<link href="{{ asset('admin/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('admin/plugins/select2/css/select2.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('admin/plugins/select2/css/select2-bootstrap4.css') }}" rel="stylesheet" />
	<link href="{{ asset('admin/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.min.css') }}" rel="stylesheet">

	<!-- loader-->
	<link href="{{ asset('admin/css/pace.min.css') }}" rel="stylesheet" />
	<script src="{{ asset('admin/js/pace.min.js') }}"></script>

	<!-- Bootstrap CSS -->
	<link href="{{ asset('admin/css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
	<link href="{{ asset('admin/css/app.css') }}" rel="stylesheet">

	<!-- Theme Style CSS -->
	<link rel="stylesheet" href="{{ asset('admin/css/dark-theme.css') }}" />
	<link rel="stylesheet" href="{{ asset('admin/css/semi-dark.css') }}" />
	<link rel="stylesheet" href="{{ asset('admin/css/header-colors.css') }}" />

	<!-- Icon Style CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
	<!-- <link href="{{ asset('admin/css/icons.css') }}" rel="stylesheet">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"> -->

	<style>
		.hidden {
			display: none;
		}

		.pointer {
			cursor: pointer;
		}

		.required:after {
			content: " *";
			color: red;
		}

		.sidebar-wrapper .metismenu ul a em {
			margin-right: 10px;
		}

		.page-breadcrumb .breadcrumb-item + .breadcrumb-item::before {
			font-family: bootstrap-icons !important;
			font-style: normal;
			font-weight: normal !important;
			font-variant: normal;
			text-transform: none;
			color: #6c757d;
			padding-right: .5rem;
			content: "\f285";
		}

		.hide {
			display: none;
		}

	</style>

	@yield('custom-styles')

	<title>{{ ($title ?? 'Dashboard') . ' - ' . config('app.name', 'Laravel') . ' Admin' }}</title>
</head>

<body>
	<!--wrapper-->
	<div class="wrapper">
		@include('admin.layouts.sidebar')
		@include('admin.layouts.navigation')

		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				@if ($pageHeader ?? true === true)
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					@if ($back ?? false === true)
					<a href="{{ url()->previous() }}"><em class="bi bi-arrow-left-short pe-2 fs-4"></em></a>
					@endif
					<div class="breadcrumb-title pe-3">{{ $title ?? 'Dashboard' }}</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><em class="bi bi-house-door"></em></a>
								</li>
								@yield('path-navigation')
							</ol>
						</nav>
					</div>
				</div>
				<!--end breadcrumb-->
				@endif

				{{ $slot }}
			</div>
		</div>
		<!--end page wrapper -->

		<!--start overlay-->
		<div class="overlay toggle-icon"></div>
		<!--end overlay-->

		<!--Start Back To Top Button-->
		<a href="javaScript:;" class="back-to-top"><em class='bi bi-arrow-up-short'></em></a>
		<!--End Back To Top Button-->

		<!-- @include('admin.layouts.footer') -->
	</div>
	<!--end wrapper-->

	{{-- @include('admin.layouts.theme-config') --}}

	<!-- div loader -->
	<div class="d-none div-loader justify-content-center align-items-center" id="divLoadingTemplate">
		<img src="{{ asset('images/others/div-loader.gif') }}" height="60px" width="auto" alt="" />
	</div>
	<!-- end div loader -->

	<!-- Bootstrap JS -->
	<script src="{{ asset('admin/js/bootstrap.bundle.min.js') }}"></script>

	<!--plugins-->
	<script src="{{ asset('admin/js/jquery.min.js') }}"></script>
	<script src="{{ asset('admin/plugins/simplebar/js/simplebar.min.js') }}"></script>
	<script src="{{ asset('admin/plugins/metismenu/js/metisMenu.min.js') }}"></script>
	<script src="{{ asset('admin/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
	<script src="{{ asset('admin/plugins/vectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
	<script src="{{ asset('admin/plugins/vectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
	<script src="{{ asset('admin/plugins/chartjs/js/Chart.min.js') }}"></script>
	<script src="{{ asset('admin/plugins/chartjs/js/Chart.extension.js') }}"></script>
	<script src="{{ asset('admin/plugins/sparkline-charts/jquery.sparkline.min.js') }}"></script>
	<script src="{{ asset('admin/plugins/select2/js/select2.min.js') }}"></script>
	<script src="{{ asset('admin/plugins/bootstrap-material-datetimepicker/js/moment.min.js') }}"></script>
	<script src="{{ asset('admin/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.min.js') }}"></script>

	<!--notification js -->
	<script src="{{ asset('admin/plugins/notifications/js/lobibox.min.js') }}"></script>
	<script src="{{ asset('admin/plugins/notifications/js/notifications.min.js') }}"></script>

	<!--app JS-->
	<script src="{{ asset('admin/js/app.js') }}"></script>

	<script>
		function convertToInternationalCurrencySystem(labelValue) {
			let ret =
				// Nine Zeroes for Billions
				Math.abs(Number(labelValue)) >= 1.0e+9 ? (Math.abs(Number(labelValue)) / 1.0e+9).toFixed(2) + "B" :
				// Six Zeroes for Millions 
				Math.abs(Number(labelValue)) >= 1.0e+6 ? (Math.abs(Number(labelValue)) / 1.0e+6).toFixed(2) + "M" :
				// Three Zeroes for Thousands
				Math.abs(Number(labelValue)) >= 1.0e+3 ? (Math.abs(Number(labelValue)) / 1.0e+3).toFixed(2) + "K" :
				// Return as it is number
				Math.abs(Number(labelValue));
			return ret;
		}

		function formatTime(mins) {
			return Math.floor(mins / 60) + ":" + (mins % 60) + " (" + mins + " Minutes)";
		}

		function timeSince(date) {
			if (typeof date !== 'object') {
				date = new Date(date);
			}

			var seconds = Math.floor((new Date() - date) / 1000);
			var intervalType;

			var interval = Math.floor(seconds / 31536000);
			if (interval >= 1) {
				intervalType = 'years ago';
			} else {
				interval = Math.floor(seconds / 2592000);
				if (interval >= 1) {
					intervalType = 'months ago';
				} else {
					interval = Math.floor(seconds / 86400);
					if (interval >= 1) {
						intervalType = 'days ago';
					} else {
						interval = Math.floor(seconds / 3600);
						if (interval >= 1) {
							intervalType = "hours ago";
						} else {
							interval = Math.floor(seconds / 60);
							if (interval >= 1) {
								intervalType = "minutes ago";
							} else {
								interval = seconds;
								intervalType = "seconds ago";
							}
						}
					}
				}
			}

			return interval + ' ' + intervalType;
		}

		function copyToClipboard(text) {
			var $temp = $("<input>");
			$("body").append($temp);
			$temp.val(text).select();
			document.execCommand("copy");
			$temp.remove();
		}

		function GetParameterValues(param) {
			var url = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
			for (var i = 0; i < url.length; i++) {
				var urlparam = url[i].split('=');
				if (urlparam[0] == param) {
					return urlparam[1];
				}
			}
		}

		function openTab(link) {
			var win = window.open(link, '_blank');
			if (win) {
				//Browser has allowed it to be opened
				win.focus();
			} else {
				//Browser has blocked it
				alert('Please allow popups for this website');
			}
		}

		function redirectTo(link) {
			window.location.href = link;
		}

		// Before ajax request send
		function __BS(queryIDS) {
			if (typeof queryIDS === "object") {
				queryIDS.forEach(queryID => {
					var loaderTemplate = $("#divLoadingTemplate").clone();
					loaderTemplate.attr('id', queryID + "_DivLoader");
					loaderTemplate.removeClass("d-none");
					loaderTemplate.addClass("d-flex");
					$("#" + queryID).append(loaderTemplate);
				});
			} else {
				var loaderTemplate = $("#divLoadingTemplate").clone();
				loaderTemplate.attr('id', queryIDS + "_DivLoader");
				loaderTemplate.removeClass("d-none");
				loaderTemplate.addClass("d-flex");
				$("#" + queryIDS).append(loaderTemplate);
			}
		}

		// After ajax complete
		function __AC(queryIDS) {
			if (typeof queryIDS === "object") {
				queryIDS.forEach(queryID => {
					$("#" + queryID + "_DivLoader").remove();
				});
			} else {
				$("#" + queryIDS + "_DivLoader").remove();
			}
		}

		// Lazy Load image
		function loadImages() {
			const imgTargets = document.querySelectorAll("img.lazyload");
			const lazyLoad = (target) => {
				const optimaze = new IntersectionObserver((entries, observer) => {
					entries.forEach((entry) => {
						if (entry.isIntersecting) {
							const img = entry.target;
							const src = img.getAttribute("data-src");

							img.setAttribute("src", src);
							observer.disconnect();
						}
					});
				});
				optimaze.observe(target);
			};
			imgTargets.forEach(lazyLoad);
		}

		function getCookie(cname) {
			let name = cname + "=";
			let decodedCookie = decodeURIComponent(document.cookie);
			let ca = decodedCookie.split(';');
			for (let i = 0; i < ca.length; i++) {
				let c = ca[i];
				while (c.charAt(0) == ' ') {
					c = c.substring(1);
				}
				if (c.indexOf(name) == 0) {
					return c.substring(name.length, c.length);
				}
			}
			return "";
		}

		function setCookie(cname, cvalue, exdays = 365) {
			const d = new Date();
			d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
			let expires = "expires=" + d.toUTCString();
			document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
		}

		// Function for show notification
		function notify(variant, message, icon = 'info-circle', position = 'bottom right') {
			Lobibox.notify(variant, {
				pauseDelayOnHover: true,
				continueDelayOnInactiveTab: false,
				position: position,
				icon: 'bi bi-' + icon,
				msg: message
			});
		}

		function validateForNotification(data) {
			return data.length !== 0 ? ((typeof data.variant !== 'undefined') && (typeof data.message !== 'undefined') && (typeof data.icon !== 'undefined')) : false;
		}

		function showImagePreview(input, elem) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();

				reader.onload = function(e) {
					$(elem).attr('src', e.target.result);
				}

				reader.readAsDataURL(input.files[0]);
			}
		}

		$(document).on('submit', '.ajax-form', function(event) {
			event.preventDefault();
			let that = this;
			let formData = new FormData(this);

			if ($(this).find('#plans').length && !$(this).find('#plans').val().length) {
				formData.append('roles', []);
			}

			if (typeof that._method !== 'undefined' && typeof that._method.value !== 'undefined' && that._method.value === "delete") {
				if (!confirm('Are you sure?')) {
					return;
				}
			}

			$.ajax({
				url: event.currentTarget.action,
				type: event.currentTarget.method,
				enctype: 'multipart/form-data',
				dataType: 'json',
				contentType: false,
				processData: false,
				async: true,
				cache: false,
				data: formData,
				success: function(data) {
					let reset = $(event.currentTarget).attr('reset');
					if (typeof reset !== 'undefined' && reset === "true") {
						that.reset();
					}

					if (typeof that._method !== 'undefined' && typeof that._method.value !== 'undefined' && that._method.value === "delete") {
						$(that).closest('tr').remove();
					}

					if (validateForNotification(data)) {
						notify(data.variant, data.message, data.icon);
					} else {
						notify('success', 'Form submitted successfully!', 'check');
					}
				},
				error: function(data) {
					let response = data.responseJSON;
					let status = data.status;
					if (status == 403) {
						notify('warning', response.message, 'error');
					} else if (status == 422) {
						if (typeof response.errors !== 'undefined') {
							Object.keys(response.errors).forEach(function(key) {
								response.errors[key].forEach(function(error) {
									notify('error', error, 'x-circle');
								});
							});
						} else {
							notify('error', response.message, 'x-circle');
						}
					} else {
						notify('error', response.message, 'x-circle');
					}
				}
			});
		});

		$(document).ready(function() {

			// Select2 for dropdown options
			$('.select2').select2({
				theme: 'bootstrap4',
				width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
				placeholder: $(this).data('placeholder'),
				allowClear: Boolean($(this).data('allow-clear')),
			});

			// Bootstrap Material Date and Time Picker
			$('.bs-date-time').bootstrapMaterialDatePicker({
				format: 'YYYY-MM-DD HH:mm'
			});

			// Bootstrap Material Date Picker
			$('.bs-date').bootstrapMaterialDatePicker({
				time: false
			});

			// Bootstrap Material Time Picker
			$('.bs-time').bootstrapMaterialDatePicker({
				date: false,
				format: 'HH:mm'
			});
		});
	</script>

	@yield('custom-scripts')
</body>

</html>