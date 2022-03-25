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
    setTimeout(function () {
        $('#notification-toast .toast:first-child').remove();
    }, delay);
}

function convertToInternationalCurrencySystem(num, fixed=1) {
    if (typeof num === undefined) { return '0'; }
    if (num === null) { return '0'; } // terminate early
    if (num === 0) { return '0'; } // terminate early
    
    fixed = (!fixed || fixed < 0) ? 0 : fixed; // number of decimal places to show
    
    var b = (num).toPrecision(2).split("e"), // get power
      k = b.length === 1 ? 0 : Math.floor(Math.min(b[1].slice(1), 14) / 3), // floor at decimals, ceiling at trillions
      c = k < 1 ? num.toFixed(0 + fixed) : (num / Math.pow(10, k * 3) ).toFixed(1 + fixed), // divide by power
      d = c < 0 ? c : Math.abs(c), // enforce -0 is 0
      e = d + ['', 'K', 'M', 'B', 'T'][k]; // append power
      return e;

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
    for (const i of url) {
        var urlparam = i.split('=');
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
    var loaderTemplate = $("#divLoadingTemplate").clone();
    if (typeof queryIDS === "object") {
        queryIDS.forEach(queryID => {
            loaderTemplate.attr('id', queryID + "_DivLoader");
            loaderTemplate.removeClass("d-none");
            loaderTemplate.addClass("d-flex");
            $("#" + queryID).append(loaderTemplate);
        });
    } else {
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
    for (const _c of ca) {
        let c = _c;
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
        for (const options_key of Object.keys(options)) {
            this.options[options_key] = options[options_key];
        }

        // Remove options
        for (const element of Object.keys(removeOptions)) {
            delete this.options[element];
        }

        this.defaultHideSeries = defaultHide;
        for (var i = 0; i < this.data.getNumberOfColumns(); i++) {
            if (this.defaultHideSeries.indexOf(i) > -1) {
                this.columns.push({
                    label: this.data.getColumnLabel(i),
                    type: this.data.getColumnType(i),
                    calc: function () {
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

        $("#Fullscreen" + this.id.id + "Chart").click(function () {
            viewFullScreenDiv(_this.id);
        });

        $("#DownloadPdf" + this.id.id + "Chart").click(function () {
            _this.downloadChartPDF();
        });

        $("#DownloadPng" + this.id.id + "Chart").click(function () {
            _this.downloadChartPNG();
        });
    }

    init() {
        // this.buildContextMenu();

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

        google.visualization.events.addListener(this.chart, 'select', function () {
            var sel = _this.chart.getSelection();
            if (sel.length > 0) {
                if (sel[0].row === null) {
                    var col = sel[0].column;
                    if (_this.columns[col] == col) {
                        _this.columns[col] = {
                            label: _this.data.getColumnLabel(col),
                            type: _this.data.getColumnType(col),
                            calc: function () {
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
            setTimeout(function () {
                _this.reDrawChart();
            }, 100);
        });
    }
}

$(document).ready(function () {
    $('.select2').select2({
        allowClear: true,
    });

    $('.datepicker-input').datepicker({
        format: 'yyyy-mm-dd',
    });

    if (getCookie('isFolded') != "" && getCookie('isFolded') == "true") {
        $(".app").addClass("is-folded");
    }

    $(document).on('click', ".videoTag", function () {
        let tag = $(this).html();
        window.location = videoIntelligenceIndexRoute + "?tag=" + tag;
    });

    var $div = $(".app");
    var observer = new MutationObserver(function (mutations) {
        mutations.forEach(function (mutation) {
            if (mutation.attributeName === "class") {
                var isFolded = getCookie('isFolded') == "true" ? true : false;
                setCookie('isFolded', !isFolded, 365);
            }
        });
    });
    observer.observe($div[0], {
        attributes: true
    });


    $("#YtOverviewConfirm").confirm({
        title: "Authorize Upview",
        content: "<ol><li>View Your Youtube Account.</li><li>View your YouTube Analytics & private information of your YouTube channel.</li><li> Upview use's YouTube Analytics API to generate graphical representaion of data.</li> </ol>",
        buttons: {
            confirm: {
                text: "Authorize",
                btnClass: "btn-success",
                isHidden: false,
                isDisabled: false,
                action: function (event) {
                    window.location = $("#YtOverviewConfirm").data("url");
                }
            },
            cancel: {
                text: "Cancel",
                btnClass: "btn-danger",
                isHidden: false,
                isDisabled: false,
            }
        }
    });

});