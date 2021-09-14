<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"">

<head>

<meta charset=" utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>{{ ($title ?? 'Dashboard') . ' - ' . config('app.name', 'Laravel') }}</title>

<!-- Favicon -->
<link rel="shortcut icon" href="{{ asset('images/logo/favicon.svg') }}">

<!-- page css -->

<!-- Core css -->
<link href="{{ asset('vendor/bootstrap-table/dist/bootstrap-table.min.css') }}" rel="stylesheet">
<link href="{{ asset('vendor/jquery-ui/jquery-ui.min.css') }}" rel="stylesheet">
<link href="{{ asset('vendor/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" rel="stylesheet">
<link href="{{ asset('vendor/select2/select2.css') }}" rel="stylesheet">
<link href="{{ asset('css/theme-app.min.css') }}" rel="stylesheet">
<link href="{{ asset('vendor/daterangepicker/daterangepicker.css') }}" rel="stylesheet">

<style>
    label,
    span {
        font-feature-settings: "kern";
        font-family: Roboto, -apple-system, BlinkMacSystemFont, Segoe UI, Oxygen-Sans, Ubuntu, Cantarell, Helvetica Neue, sans-serif;
        font-kerning: normal;
        line-height: 1.6;
    }

    @keyframes shine-lines {
        0% {
            background-position: -100px;
        }

        40%,
        100% {
            background-position: 140px;
        }
    }

    @keyframes shine-avatar {
        0% {
            background-position: -32px;
        }

        40%,
        100% {
            background-position: 208px;
        }
    }

    div>.skeleton {
        background-image: linear-gradient(90deg, #F4F4F4 0px, rgba(229, 229, 229, 0.8) 40px, #F4F4F4 80px);
        background-size: 600px;
        animation: shine-lines 2s infinite ease-out;
    }

    div>.skeleton-img {
        background-image: linear-gradient(90deg, #F4F4F4 0px, rgba(229, 229, 229, 0.8) 40px, #F4F4F4 80px);
        background-size: 600px;
        animation: shine-avatar 2s infinite ease-out;
    }

    .div-loader {
        width: 100%;
        height: 100%;
        background-color: white;
        /* z-index: 9999999; */
        position: absolute;
    }

    .no-data {
        /* width: 100%;
        height: 120px;
        line-height: 120px;
        text-align: center; */

        position: absolute;
        left: 50%;
        top: 50%;
        -webkit-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
    }

    .overflow-dot {
        width: 100%;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .text-red {
        color: red;
    }

    .text-gray {
        color: silver;
    }

    .fs-7 {
        font-size: .8rem;
    }

    .google-visualization-tooltip-item {
        white-space: nowrap;
    }

    .select2-choice {
        height: auto !important;
        line-height: inherit !important;
    }

    .select2-arrow {
        display: flex !important;
        align-items: center !important;
    }

    .select2-arrow>b {
        height: auto !important;
    }

    #s2id_countryList>.select2-choice {
        border: none;
    }

    text {
        cursor: pointer;
    }
</style>

@yield('custom-css')

</head>

<body>
    <div class="app">
        <div class="layout">
            @include('layouts.navigation')
            @include('layouts.sidebar')

            <!-- Page Container START -->
            <div class="page-container">

                <!-- Content Wrapper START -->
                <div class="main-content">
                    @if ($pageHeader ?? true === true)
                    <div class="page-header">
                        <h2 class="header-title">{{ $title ?? 'Dashboard' }}</h2>
                        <div class="header-sub-title">
                            <nav class="breadcrumb breadcrumb-dash">
                                <a href="{{ route('panel.dashboard') }}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Home</a>
                                @yield('path-navigation')
                            </nav>
                        </div>
                    </div>
                    @endif

                    <!-- Content goes Here -->
                    {{ $slot }}

                </div>
                <!-- Content Wrapper END -->

                @include('layouts.footer')

            </div>
            <!-- Page Container END -->

            <!-- Search Start-->
            <div class="modal modal-left fade search" id="search-drawer">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header justify-content-between align-items-center">
                            <h5 class="modal-title">Search</h5>
                            <button type="button" class="close" data-dismiss="modal">
                                <i class="anticon anticon-close"></i>
                            </button>
                        </div>
                        <div class="modal-body scrollable">
                            <div class="input-affix">
                                <i class="prefix-icon anticon anticon-search"></i>
                                <input type="text" class="form-control" placeholder="Search">
                            </div>
                            <!-- Content goes Here -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- Search End-->

            <!-- Quick View START -->
            <div class="modal modal-right fade quick-view" id="quick-view">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header justify-content-between align-items-center">
                            <h5 class="modal-title">Quick View</h5>
                        </div>
                        <div class="modal-body scrollable">
                            <!-- Content goes Here -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- Quick View END -->
        </div>
    </div>

    <!-- Show Toast -->
    <div class="notification-toast bottom-right" id="notification-toast"></div>

    <!-- Div Loader -->
    <div class="d-none div-loader justify-content-center align-items-center" id="divLoadingTemplate">
        <img src="{{ asset('images/others/div-loader.gif') }}" height="60px" width="auto" />
    </div>

    <!-- Core Vendors JS -->
    <script src="{{ asset('js/theme-vendors.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery-ui/jquery-ui.min.js') }}"></script>

    <!-- page js -->

    <!-- Core JS -->
    <script src="{{ asset('js/theme-app.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('vendor/daterangepicker/moment.min.js') }}"></script>
    <script src="{{ asset('vendor/daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('vendor/select2/select2.min.js') }}"></script>
    <script src="{{ asset('vendor/country-list/country-list.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap-table/dist/bootstrap-table.min.js') }}"></script>
    <script src="{{ asset('vendor/jsPDF/jspdf.umd.min.js') }}"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <script>
        var noData = '<div class="no-data">No Data Found</div>';

        var channelCategories = [
            "Entertainment",
            "Food",
            "Gaming",
            "Beauty and Fashion",
            "Music",
            "Sports",
            "Science and Technology",
            "Travel"
        ];

        function toast(title, message, delay, icon = 'info', color = 'info') {
            var toastHTML =
                '<div class="toast fade hide text-' + color + '" data-delay="' + delay + '">' +
                '   <div class="toast-header">' +
                '       <i class="anticon anticon-' + icon + '-circle text-' + color + ' m-r-5"></i>' +
                '       <strong class="mr-auto text-' + color + '">' + title + '</strong>' +
                '       <button type="button" class="ml-2 close" data-dismiss="toast" aria-label="Close">' +
                '           <span aria-hidden="true">&times;</span>' +
                '       </button>' +
                '   </div>' +
                '   <div class="toast-body">' +
                '       ' + message +
                '   </div>' +
                '</div>';

            $('#notification-toast').append(toastHTML);
            $('#notification-toast .toast').toast('show');
            setTimeout(function() {
                $('#notification-toast .toast:first-child').remove();
            }, delay);
        }

        function convertToInternationalCurrencySystem(labelValue) {
            // Nine Zeroes for Billions
            return Math.abs(Number(labelValue)) >= 1.0e+9

                ?
                (Math.abs(Number(labelValue)) / 1.0e+9).toFixed(2) + "B"
                // Six Zeroes for Millions 
                :
                Math.abs(Number(labelValue)) >= 1.0e+6

                ?
                (Math.abs(Number(labelValue)) / 1.0e+6).toFixed(2) + "M"
                // Three Zeroes for Thousands
                :
                Math.abs(Number(labelValue)) >= 1.0e+3

                ?
                (Math.abs(Number(labelValue)) / 1.0e+3).toFixed(2) + "K"

                :
                Math.abs(Number(labelValue));
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

        function setCookie(cname, cvalue, exdays) {
            const d = new Date();
            d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
            let expires = "expires=" + d.toUTCString();
            document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
        }

        function getIndexFromHeaderName(columnHeaders, name) {
            var retIndex = 0;
            columnHeaders.forEach((element, index) => {
                if (element.name === name) {
                    retIndex = index;
                }
            });
            return retIndex;
        }

        function getElementFromHeaderName(columnHeaders, name) {
            let ele = null;
            columnHeaders.forEach(index => {
                if (element.name === name) {
                    ele = element;
                }
            });
            return ele;
        }

        function viewFullScreenDiv(__id) {
            if (document.fullscreenElement || document.webkitFullscreenElement || document.mozFullScreenElement || document.msFullscreenElement) {
                if (document.exitFullscreen) {
                    document.exitFullscreen();
                } else if (document.mozCancelFullScreen) {
                    document.mozCancelFullScreen();
                } else if (document.webkitExitFullscreen) {
                    document.webkitExitFullscreen();
                } else if (document.msExitFullscreen) {
                    document.msExitFullscreen();
                }
            } else {
                let element = __id;
                if (element.requestFullscreen) {
                    element.requestFullscreen();
                } else if (element.mozRequestFullScreen) {
                    element.mozRequestFullScreen();
                } else if (element.webkitRequestFullscreen) {
                    element.webkitRequestFullscreen(Element.ALLOW_KEYBOARD_INPUT);
                } else if (element.msRequestFullscreen) {
                    element.msRequestFullscreen();
                }
            }
        }

        function drawChart(eleId, data, type, options = {}, removeOptions = {}) {
            if (data.length <= 1) {
                $("#" + eleId.id + "ContextMenu").remove();
                $('#' + eleId.id).html(noData);
            } else {
                var chartData = new google.visualization.arrayToDataTable(data);
                var chart = new Chart(eleId, chartData, options, removeOptions, [7, 8], type);
                chart.init();
            }
        }

        class Chart {
            chartType = "Line";
            defaultHideSeries = [];
            series = {};
            columns = [];
            options = {
                selectionMode: 'multiple',
                tooltip: {
                    trigger: 'both'
                },
                bar: {
                    groupWidth: "10%"
                },
                width: "50%",
                curveType: 'function',
                focusTarget: 'category',
                aggregationTarget: 'none',
                animation: {
                    duration: 100,
                    easing: 'linear',
                    startup: true
                },
                hAxis: {
                    textPosition: 'none'
                },
                vAxis: {
                    minValue: 0,
                    viewWindow: {
                        min: 0
                    }
                },
                legend: {
                    position: 'bottom'
                },
                chartArea: {
                    left: 50,
                    right: 50,
                    top: 26,
                    bottom: 70,
                },
                crosshair: {
                    trigger: 'both',
                    orientation: 'vertical'
                },
                explorer: {
                    actions: ["dragToZoom", "rightClickToReset"],
                }
            };

            constructor(id, data, options = {}, removeOptions = {}, defaultHide = [], chartType = "Line") {
                this.id = id;
                this.data = data;
                this.options.series = this.series;
                this.chartType = chartType;

                $("#" + this.id.id + "ContextMenu").remove();

                // Override default options
                let options_keys = Object.keys(options);
                for (let i = 0; i < options_keys.length; i++) {
                    this.options[options_keys[i]] = options[options_keys[i]];
                }

                // Remove options
                let remove_options_keys = Object.keys(removeOptions);
                for (let i = 0; i < remove_options_keys.length; i++) {
                    delete this.options[remove_options_keys[i]];
                }

                this.defaultHideSeries = defaultHide;
                for (var i = 0; i < this.data.getNumberOfColumns(); i++) {
                    if (this.defaultHideSeries.indexOf(i) > -1) {
                        this.columns.push({
                            label: this.data.getColumnLabel(i),
                            type: this.data.getColumnType(i),
                            calc: function() {
                                return null;
                            }
                        });

                        if (i > 0) {
                            this.series[i - 1] = {};
                            this.series[i - 1].color = '#CCCCCC';
                        }
                    } else {
                        this.columns.push(i);
                        if (i > 0) {
                            this.series[i - 1] = {};
                            this.series[i - 1].color = null;
                        }
                    }
                }
            }

            downloadChartPNG() {
                var a = document.createElement("a");
                a.href = this.chart.getImageURI();
                a.download = this.id.id + "_" + new Date().getTime() + ".png";
                a.click();
            }

            downloadChartPDF() {
                const {
                    jsPDF
                } = window.jspdf;

                let doc = new jsPDF({
                    orientation: 'landscape',
                });

                let imgData = this.chart.getImageURI();
                const imgProps = doc.getImageProperties(imgData);
                const pdfWidth = doc.internal.pageSize.getWidth();
                const pdfHeight = (imgProps.height * pdfWidth) / imgProps.width;
                const marginX = (doc.internal.pageSize.getWidth() - pdfWidth) / 2;
                const marginY = (doc.internal.pageSize.getHeight() - pdfHeight) / 2;
                doc.addImage(imgData, marginX, marginY, pdfWidth, pdfHeight);
                doc.save(this.id.id + "_" + new Date().getTime() + ".pdf");
            }

            reDrawChart() {
                let _view = new google.visualization.DataView(this.data);
                _view.setColumns(this.columns);
                this.chart.draw(_view, this.options);
            }

            buildContextMenu() {
                let _this = this;
                let menu = '<div id="' + this.id.id + 'ContextMenu" class="dropdown dropdown-animated scale-right float-right mr-5 pointer"><i class="anticon anticon-menu" data-toggle="dropdown"></i><div class="dropdown-menu"><button id="DownloadPdf' + this.id.id + 'Chart" class="dropdown-item" type="button">Export PDF</button><button id="DownloadPng' + this.id.id + 'Chart" class="dropdown-item" type="button">Export PNG</button><button id="Fullscreen' + this.id.id + 'Chart" class="dropdown-item" type="button">Fullscreen</button></div></div>';
                this.id.parentNode.insertAdjacentHTML("afterbegin", menu);

                $("#Fullscreen" + this.id.id + "Chart").click(function() {
                    viewFullScreenDiv(_this.id);
                });

                $("#DownloadPdf" + this.id.id + "Chart").click(function() {
                    _this.downloadChartPDF();
                });

                $("#DownloadPng" + this.id.id + "Chart").click(function() {
                    _this.downloadChartPNG();
                });
            }

            init() {
                this.buildContextMenu();

                switch ((this.chartType).toLocaleLowerCase()) {
                    //Keep this, so even in case we by mistake give the chart name in wrong case.
                    case "bar":
                        this.chart = new google.visualization.BarChart(this.id);
                        break;
                    case "pie":
                        this.chart = new google.visualization.PieChart(this.id);
                        break;
                    case "candlestick":
                        this.chart = new google.visualization.CandlestickChart(this.id);
                        break;
                    case "column":
                        this.chart = new google.visualization.ColumnChart(this.id);
                        break;
                    case "donut":
                        this.chart = new google.visualization.DonutChart(this.id);
                        break;
                    case "area":
                        this.chart = new google.visualization.AreaChart(this.id);
                        break;
                    case "line":
                        this.chart = new google.visualization.LineChart(this.id);
                        break;
                    case "geo":
                        this.chart = new google.visualization.GeoChart(this.id);
                        break;
                    case "wordtree":
                        this.chart = new google.visualization.WordTree(this.id);
                        break;
                    case "table":
                        this.chart = new google.visualization.Table(this.id);
                        break;
                    default:
                        this.chart = new google.visualization.Table(this.id);
                        break;
                }
                this.chart.draw(this.data, this.options);

                let _view = new google.visualization.DataView(this.data);
                _view.setColumns(this.columns);
                this.chart.draw(_view, this.options);

                var _this = this;

                google.visualization.events.addListener(this.chart, 'select', function() {
                    var sel = _this.chart.getSelection();
                    if (sel.length > 0) {
                        if (sel[0].row === null) {
                            var col = sel[0].column;
                            if (_this.columns[col] == col) {
                                _this.columns[col] = {
                                    label: _this.data.getColumnLabel(col),
                                    type: _this.data.getColumnType(col),
                                    calc: function() {
                                        return null;
                                    }
                                };

                                _this.series[col - 1].color = '#CCCCCC';
                            } else {
                                _this.columns[col] = col;
                                _this.series[col - 1].color = null;
                            }

                            let view = new google.visualization.DataView(_this.data);
                            view.setColumns(_this.columns);
                            _this.chart.draw(view, _this.options);
                        }
                    }
                });

                document.addEventListener('fullscreenchange', (event) => {
                    setTimeout(function() {
                        _this.reDrawChart();
                    }, 100);
                });
            }
        }

        $(document).ready(function() {
            $('.select2').select2({
                allowClear: true,
            });

            $('.datepicker-input').datepicker({
                format: 'yyyy-mm-dd',
            });

            if (getCookie('isFolded') != "" && getCookie('isFolded') == "true") {
                $(".app").addClass("is-folded");
            }

            var $div = $(".app");
            var observer = new MutationObserver(function(mutations) {
                mutations.forEach(function(mutation) {
                    if (mutation.attributeName === "class") {
                        var isFolded = getCookie('isFolded') == "true" ? true : false;
                        setCookie('isFolded', !isFolded, 365);
                    }
                });
            });
            observer.observe($div[0], {
                attributes: true
            });
        });
    </script>

    @yield('custom-scripts')

</body>

</html>