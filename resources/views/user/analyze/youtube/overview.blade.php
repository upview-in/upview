@section('path-navigation')
<a class="breadcrumb-item" href="#">Analayze</a>
<a class="breadcrumb-item" href="#">Youtube</a>
<span class="breadcrumb-item active">Overview</span>
@endsection

@section('custom-css')
<style>
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
</style>
@endsection

@section('custom-scripts')
<script>
    $(document).ready(function() {

        var __startDate = moment().subtract(29, 'days'),
            __endDate = moment();
        var accounts = JSON.parse('{!! App\Helper\TokenHelper::getAuthToken_YT()->toJson() !!}');
        var GroupBy = "day";
        var country = "";

        cb(__startDate, __endDate);
        loadData();
        loadAnalytics();

        google.charts.load('current', {
            'packages': ['corechart']
        });

        function drawChart(data) {
            var data = new google.visualization.arrayToDataTable(data);

            var columns = [];
            var series = {};
            for (var i = 0; i < data.getNumberOfColumns(); i++) {
                columns.push(i);
                if (i > 0) {
                    series[i - 1] = {};
                }
            }

            var options = {
                series: series,
                isStacked: true,
                animation: {
                    duration: 1000,
                    easing: 'linear',
                    startup: true
                },
                hAxis: {
                    slantedText: true,
                    slantedTextAngle: 80
                },
                chartArea: {
                    left: 50,
                    top: 30,
                    right: 150,
                    bottom: 80,
                },
                explorer: {
                    axis: 'horizontal',
                    keepInBounds: true,
                    maxZoomIn: 4.0
                }
            };

            var chart = new google.visualization.LineChart($('#OverviewStatisticsChart')[0]);
            chart.draw(data, options);

            google.visualization.events.addListener(chart, 'select', function() {
                var sel = chart.getSelection();
                // if selection length is 0, we deselected an element
                if (sel.length > 0) {
                    // if row is undefined, we clicked on the legend
                    if (sel[0].row === null) {
                        var col = sel[0].column;
                        if (columns[col] == col) {
                            // hide the data series
                            columns[col] = {
                                label: data.getColumnLabel(col),
                                type: data.getColumnType(col),
                                calc: function() {
                                    return null;
                                }
                            };

                            // grey out the legend entry
                            series[col - 1].color = '#CCCCCC';
                        } else {
                            // show the data series
                            columns[col] = col;
                            series[col - 1].color = null;
                        }
                        var view = new google.visualization.DataView(data);
                        view.setColumns(columns);
                        chart.draw(view, options);
                    }
                }
            });
        }

        function cb(start, end) {
            $('#daterange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }

        function formatData(state) {
            var $state = $(
                '<div class="row align-items-center">' +
                '   <div class="col-auto">' +
                '       <img class="rounded-circle" src="' + state.picture + '" width="70px"/>' +
                '   </div>' +
                '   <div class="col-auto">' +
                '       <span class="font-weight-bold">' + state.name + '</span>' +
                '       <br/>' +
                '       <span>' + state.email + '</span>' +
                '   </div>' +
                '</div>'
            );
            return $state;
        }

        function formatSelectionData(state) {
            var $state = $(
                '<div class="row align-items-center p-2">' +
                '   <div class="col-auto">' +
                '       <img class="rounded-circle" src="' + state.picture + '" width="70px"/>' +
                '   </div>' +
                '   <div class="col-auto">' +
                '       <span class="font-weight-bold">' + state.name + '</span>' +
                '       <br/>' +
                '       <span>' + state.email + '</span>' +
                '   </div>' +
                '</div>'
            );
            return $state;
        }

        var _countryList = getCountryData().map(
            ({
                code,
                name
            }) => ({
                id: code,
                text: name
            })
        );

        $("#countryList").select2({
            allowClear: true,
            data: _countryList,
            placeholder: 'Country Wise',
        });

        $('#countryList').on('change', function(e) {
            country = $(this).val();
            loadAnalytics();
        });

        $('#select2Accounts').select2({
            id: function(item) {
                return item._id
            },
            text: function(item) {
                return item.name
            },
            allowClear: true,
            data: {
                results: accounts
            },
            formatResult: formatData,
            formatSelection: formatSelectionData,
            minimumResultsForSearch: -1
        });

        $('#select2Accounts').val(accounts["{{ session('AccountIndex', 0) }}"]['_id']).trigger('change');

        $('#select2Accounts').on('change', function(e) {
            var data = $(this).select2('data');
            $.ajax({
                url: '{{ route("panel.user.account.setSessionDefaultAccount") }}',
                data: {
                    id: data._id
                },
                success: function() {
                    loadData();
                }
            });
        });

        let listRanges = {
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().add(1, 'month').startOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
            'Last 3 Months': [moment().subtract(3, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
            'Last 6 Months': [moment().subtract(6, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
            'This Year': [moment().startOf('year'), moment().subtract(1, 'month').endOf('month')],
            'Last Year': [moment().subtract(1, 'year').startOf('year'), moment().subtract(1, 'year').endOf('year')],
            'Overall': [moment(), moment()],
        };

        $('#daterange').daterangepicker({
            startDate: __startDate,
            endDate: __endDate,
            ranges: listRanges
        }, cb);

        $('#daterange').on('apply.daterangepicker', function(ev, picker) {
            __startDate = picker.startDate;
            __endDate = picker.endDate;
            if (__endDate.diff(__startDate, 'days') > 62) {
                $("#GroupBy").prop('selectedIndex', 1);
                GroupBy = $("#GroupBy").val();
            }
            loadAnalytics();
        });

        $("#GroupBy").prop('selectedIndex', 0);

        $("#GroupBy").change(function() {
            GroupBy = $(this).val();
            loadAnalytics();
        });

        function loadData() {
            __BS("ChannelMainDiv");

            $.ajax({
                data: {
                    part: 'ChannelDetails',
                },
                dataType: "json",
                success: function(response) {
                    let data = response.ChannelDetails;

                    $('#daterange').data('daterangepicker').ranges["Overall"] = [moment(data.publishedAt), moment()];

                    $("#c1ChannelProfileImage").attr('data-src', data.profileURL);
                    $("#c1ChannelProfileImage").attr('src', "{{ asset('images/others/loading.gif') }}");
                    loadImages();
                    $("#c1ChannelName").html(data.channelName);
                    $("#c1ChannelViews").html(convertToInternationalCurrencySystem(data.viewCount));
                    $("#c1ChannelSubscriber").html(convertToInternationalCurrencySystem(data.subscriberCount));
                    $("#c1ChannelVideos").html(data.videoCount);
                    $("#c1ChannelJoiningDate").html($.datepicker.formatDate('M dd, yy', new Date(data.publishedAt)));

                    if (data.country != null) {
                        $("#c1ChannelCountry").html('<img class="mr-2 align-middle" src="{{ asset("/images/country-icons") }}/' + data.country.toLowerCase() + '.svg" height="18px" width="auto" /> ' + data.country + ' (' + getCountryName(data.country) + ')');
                    } else {
                        $("#c1ChannelCountry").html("N/A");
                    }

                    $("#c1ChannelCategory").html(data.channelCategory ?? 'N/A');

                    __AC("ChannelMainDiv");
                }
            });
        }

        function loadAnalytics() {
            __BS("ChannelHighlights");

            $.ajax({
                data: {
                    part: 'Analytics',
                    startDate: GroupBy == 'month' ? __startDate.format('YYYY-MM') + '-01' : __startDate.format('YYYY-MM-DD'),
                    endDate: GroupBy == 'month' ? __endDate.format('YYYY-MM') + '-01' : __endDate.format('YYYY-MM-DD'),
                    dimensions: GroupBy,
                    sort: GroupBy,
                    filters: country != "" ? "country==" + country : "",
                },
                dataType: "json",
                success: function(data) {
                    let Highlights = data.Heighlights;
                    let OverviewStatistics = data.OverviewStatistics;

                    $("#HighlightsSubscribersGrowth").html(convertToInternationalCurrencySystem(Highlights.SubsciberGained));
                    $("#HighlightsViews").html(convertToInternationalCurrencySystem(Highlights.Views));
                    $("#HighlightsAvgViewDuration").html(formatTime(Highlights.AvgViewDuration));
                    // $("Highlights").html(convertToInternationalCurrencySystem());

                    $("#OverviewStatisticsLikes").html(convertToInternationalCurrencySystem(OverviewStatistics.Likes));
                    $("#OverviewStatisticsDislikes").html(convertToInternationalCurrencySystem(OverviewStatistics.DisLikes));
                    $("#OverviewStatisticsShares").html(convertToInternationalCurrencySystem(OverviewStatistics.Shares));
                    $("#OverviewStatisticsComments").html(convertToInternationalCurrencySystem(OverviewStatistics.Comments));
                    $("#OverviewStatisticsEstMinWatched").html(formatTime(OverviewStatistics.EstMinWatched));

                    drawChart(OverviewStatistics.ChartData);

                    __AC("ChannelHighlights");

                }
            });
        }

    });
</script>
@endsection

<x-app-layout title="Overview">
    <div class="container-fluid">
        <div class="row mb-3 justify-content-end">
            <div class="col-md-5 col-12">
                <input class="shadow" id="select2Accounts" />
            </div>
        </div>

        <div class="card shadow" id="ChannelMainDiv">
            <div class="row p-50">
                <div class="col-md-2 col-12">
                    <img class="rounded-circle lazyload" id="c1ChannelProfileImage" width="100%" height="auto" />
                </div>
                <div class="col-md-10 col-12 pl-5">
                    <div class="row mt-4">
                        <div class="col">
                            <label class="h1 font-weight-bold" id="c1ChannelName"></label>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <span class="text-red"><i class="anticon anticon-youtube"></i> Views</span>
                            <br>
                            <label id="c1ChannelViews" class="font-weight-bold"></label>
                        </div>
                        <div class="col">
                            <span class="text-red"><i class="anticon anticon-youtube"></i> Subscriber</span>
                            <br>
                            <label id="c1ChannelSubscriber" class="font-weight-bold"></label>
                        </div>
                        <div class="col">
                            <span class="text-red"><i class="anticon anticon-youtube"></i> Videos</span>
                            <br>
                            <label id="c1ChannelVideos" class="font-weight-bold"></label>
                        </div>
                        <div class="col">
                            <span class="text-red"><i class="anticon anticon-youtube"></i> Joining Date</span>
                            <br>
                            <label id="c1ChannelJoiningDate" class="font-weight-bold"></label>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col">
                            <span class="text-red"><i class="anticon anticon-unordered-list"></i> Category</span>
                            <br>
                            <label id="c1ChannelCategory" class="font-weight-bold"></label>
                        </div>
                        <div class="col">
                            <span class="text-red"><i class="anticon anticon-flag"></i> Country</span>
                            <br>
                            <label id="c1ChannelCountry" class="font-weight-bold"></label>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-end">
            <div class="col-md-2 col-12">
                <input class="form-control shadow" id="countryList" />
            </div>
            <div class="col-md-auto col-12">
                <div class="form-group">
                    <select class="form-control shadow" id="GroupBy">
                        <option value="day" selected>Day Wise</option>
                        <option value="month">Month Wise</option>
                    </select>
                </div>
            </div>
            <div class="col-md-auto col-12">
                <div class="form-group">
                    <div class="form-control shadow" id="daterange">
                        <i class="fa fa-calendar"></i>&nbsp;
                        <span></span> <i class="fa fa-caret-down"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="card shadow" id="ChannelHighlights">
            <div class="card-header p-15 ml-3">
                <label class="h3 m-0">Highlights</label>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-md-2 border-right">
                        <div class="row mb-3">
                            <div class="col">
                                <span class="font-weight-lighter text-red">Subscribers Growth</span>
                                <br />
                                <label class="font-weight-bolder" id="HighlightsSubscribersGrowth"></label>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col">
                                <span class="font-weight-lighter text-red">Views</span>
                                <br />
                                <label class="font-weight-bolder" id="HighlightsViews"></label>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col">
                                <span class="font-weight-lighter text-red">Avg. View Duration (in min)</span>
                                <br />
                                <label class="font-weight-bolder" id="HighlightsAvgViewDuration"></label>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-10">
                        <div class="row">
                            <div class="col-6 col-sm-4 col-md-3 col-lg-2 mb-3">
                                <span class="font-weight-lighter text-red">Top Country</span>
                                <br />
                                <label class="font-weight-bolder" id="HighlightsTopCountry"></label>
                            </div>
                            <div class="col-6 col-sm-4 col-md-3 col-lg-2 mb-3">
                                <span class="font-weight-lighter text-red">Top Device</span>
                                <br />
                                <label class="font-weight-bolder" id="HighlightsTopDevice"></label>
                            </div>
                            <div class="col-6 col-sm-4 col-md-3 col-lg-2 mb-3">
                                <span class="font-weight-lighter text-red">Traffic Source</span>
                                <br />
                                <label class="font-weight-bolder" id="HighlightsTrafficSource"></label>
                            </div>
                            <div class="col-6 col-sm-4 col-md-3 col-lg-2 mb-3">
                                <span class="font-weight-lighter text-red">Embedded Traffic Source</span>
                                <br />
                                <label class="font-weight-bolder" id="HighlightsEmbeddedTrafficSource"></label>
                            </div>
                            <div class="col-6 col-sm-4 col-md-3 col-lg-2 mb-3">
                                <span class="font-weight-lighter text-red">Ads VS Organic</span>
                                <br />
                                <label class="font-weight-bolder" id="HighlightsAdsVsOrganic"></label>
                            </div>
                            <div class="col-6 col-sm-4 col-md-3 col-lg-2 mb-3">
                                <span class="font-weight-lighter text-red">Top Social Media</span>
                                <br />
                                <label class="font-weight-bolder" id="HighlightsTopSocialMedia"></label>
                            </div>
                            <div class="col-6 col-sm-4 col-md-3 col-lg-2 mb-3">
                                <span class="font-weight-lighter text-red">Subs VS Non-Subs</span>
                                <br />
                                <label class="font-weight-bolder" id="HighlightsSubsVsNonSubs"></label>
                            </div>
                            <div class="col-6 col-sm-4 col-md-3 col-lg-2 mb-3">
                                <span class="font-weight-lighter text-red">Best Day and Time</span>
                                <br />
                                <label class="font-weight-bolder" id="HighlightsBestDayandTime"></label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card shadow" id="ChannelHighlights">
            <div class="card-header p-15 ml-3">
                <label class="h3 m-0">Statistics Overview</label>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-10">
                        <div id="OverviewStatisticsChart" class="w-100"></div>
                    </div>
                    <div class="col-md-2">
                        <div class="row">
                            <div class="col-12">
                                <span class="font-weight-lighter text-red">Likes</span>
                                <br />
                                <label class="font-weight-bolder" id="OverviewStatisticsLikes"></label>
                            </div>
                            <div class="col-12">
                                <span class="font-weight-lighter text-red">Dislikes</span>
                                <br />
                                <label class="font-weight-bolder" id="OverviewStatisticsDislikes"></label>
                            </div>
                            <div class="col-12">
                                <span class="font-weight-lighter text-red">Shares</span>
                                <br />
                                <label class="font-weight-bolder" id="OverviewStatisticsShares"></label>
                            </div>
                            <div class="col-12">
                                <span class="font-weight-lighter text-red">Comments</span>
                                <br />
                                <label class="font-weight-bolder" id="OverviewStatisticsComments"></label>
                            </div>
                            <div class="col-12">
                                <span class="font-weight-lighter text-red">Est. Minutes Watched</span>
                                <br />
                                <label class="font-weight-bolder" id="OverviewStatisticsEstMinWatched"></label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>