@section('path-navigation')
<a class="breadcrumb-item" href="#">Analayze</a>
<a class="breadcrumb-item" href="#">YouTube</a>
<span class="breadcrumb-item active">Overview</span>
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
        google.charts.load('current', {
            'packages': ['corechart', 'table', 'geochart']
        }).then(() => {
            loadAnalytics();
        });

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
            placeholder: 'Country',
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

        $('#select2Accounts').val(accounts["{{ session('AccountIndex_YT', 0) }}"]['_id']).trigger('change');

        $('#select2Accounts').on('change', function(e) {
            var data = $(this).select2('data');
            $.ajax({
                url: '{{ route("panel.user.account.setSessionDefaultAccount") }}',
                data: {
                    id: data._id,
                    platform: parseInt('{{ App\Helper\TokenHelper::$PLATFORMS["youtube"] }}'),
                },
                success: function() {
                    loadData();
                    loadAnalytics();
                }
            });
        });

        let listRanges = {
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().add(1, 'month').startOf('month')],
            // 'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
            // 'Last 3 Months': [moment().subtract(3, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
            // 'Last 6 Months': [moment().subtract(6, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
            // 'This Year': [moment().startOf('year'), moment().subtract(1, 'month').endOf('month')],
            // 'Last Year': [moment().subtract(1, 'year').startOf('year'), moment().subtract(1, 'year').endOf('year')],
            // 'Overall': [moment(), moment()],
        };

        $('#daterange').daterangepicker({
            startDate: __startDate,
            endDate: __endDate,
            ranges: listRanges
        }, cb);

        $('#daterange').on('apply.daterangepicker', function(ev, picker) {
            __startDate = picker.startDate;
            __endDate = picker.endDate;

            var timestamp = new Date().getTime() - (30 * 24 * 60 * 60 * 1000);

            if (__startDate < timestamp) {
                alert("You can't select morethen 30 days");
                return;
            }

            if (__endDate . diff(__startDate, 'days') < 1) {
                alert("Invalid range selected");
                return;
            }

            // if (__endDate.diff(__startDate, 'days') > 62) {
            //     $("#GroupBy").prop('selectedIndex', 1);
            //     GroupBy = $("#GroupBy").val();
            // }
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

                    // $('#daterange').data('daterangepicker').ranges["Overall"] = [moment(data.publishedAt), moment()];

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
                        $("#c1ChannelCountry").html("-");
                    }

                    $("#c1ChannelCategory").html(data.channelCategory ?? '-');

                    __AC("ChannelMainDiv");
                }
            });
        }

        function loadAnalytics() {
            __BS(["ChannelHighlights", "StatisticsOverview", "Demographics", "DeviceWise", "OsWise", "TrafficSource", "SocialMediaTrafficSource", "GeographicStatistics"]);

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
                    let Demographics = data.Demographics;
                    let DeviceWise = data.DeviceWise;
                    let OsWise = data.OsWise;
                    let TrafficSource = data.TrafficSource;
                    let SocialMediaTrafficSource = data.SocialMediaTrafficSource;
                    let GeographicStatistics = data.GeographicStatistics;

                    $("#HighlightsSubscribersGrowth").html(convertToInternationalCurrencySystem(Highlights.SubsciberGained));
                    $("#HighlightsViews").html(convertToInternationalCurrencySystem(Highlights.Views));
                    $("#HighlightsAvgViewDuration").html(formatTime(Highlights.AvgViewDuration));
                    $("#HighlightsTopCountry").html(Highlights.TopCountry.Country + "<br>" + convertToInternationalCurrencySystem(Highlights.TopCountry.Views));
                    $("#HighlightsTopDevice").html(Highlights.TopDevice.Device + "<br>" + convertToInternationalCurrencySystem(Highlights.TopDevice.Views));
                    $("#HighlightsTopPlatform").html(Highlights.TopPlatform.Platform + "<br>" + convertToInternationalCurrencySystem(Highlights.TopPlatform.Views));
                    $("#HighlightsTrafficSource").html(Highlights.TrafficSource.Source + "<br>" + convertToInternationalCurrencySystem(Highlights.TrafficSource.Views));
                    $("#HighlightsTopSocialMedia").html(Highlights.SocialMediaTrafficSource.Source + "<br>" + convertToInternationalCurrencySystem(Highlights.SocialMediaTrafficSource.Shares));
                    // $("#HighlightsSubsVsNonSubs").html();

                    $("#OverviewStatisticsLikes").html(convertToInternationalCurrencySystem(OverviewStatistics.Likes));
                    $("#OverviewStatisticsShares").html(convertToInternationalCurrencySystem(OverviewStatistics.Shares));
                    $("#OverviewStatisticsComments").html(convertToInternationalCurrencySystem(OverviewStatistics.Comments));
                    $("#OverviewStatisticsEstMinWatched").html(formatTime(OverviewStatistics.EstMinWatched));


                    drawChart($('#OverviewStatisticsChart')[0], OverviewStatistics.ChartData, 'Area');

                    drawChart($('#DemographicsChart')[0], Demographics.ChartData, 'Column', {
                        vAxis: {
                            format: "#'%'"
                        },
                        hAxis: {
                            textPosition: 'out'
                        },
                        bar: {
                            groupWidth: 50
                        }
                    });

                    drawChart($('#DeviceWiseChart')[0], DeviceWise.ChartData, 'Pie', {
                        pieHole: 0.5,
                        chartArea: {
                            top: 10,
                            bottom: 60,
                        },
                    }, {
                        explorer: ""
                    });

                    drawChart($('#OsWiseChart')[0], OsWise.ChartData, 'Pie', {
                        pieHole: 0.5,
                        chartArea: {
                            top: 10,
                            bottom: 60,
                        },
                    }, {
                        explorer: ""
                    });

                    drawChart($('#TrafficSourceChart')[0], TrafficSource.ChartData, 'Column', {
                        hAxis: {
                            textPosition: 'out',
                        },
                        chartArea: {
                            left: 100,
                            right: 50,
                            top: 26,
                            bottom: 100,
                        },
                        bar: {
                            groupWidth: 50
                        }
                    });

                    drawChart($('#SocialMediaTrafficSourceChart')[0], SocialMediaTrafficSource.ChartData, 'Column', {
                        hAxis: {
                            textPosition: 'out',
                        },
                        bar: {
                            groupWidth: 25
                        }
                    });

                    drawChart($('#GeographicStatisticsChart')[0], GeographicStatistics.ChartData, 'Geo', {
                        tooltip: {
                            isHtml: true
                        }
                    });

                    __AC(["ChannelHighlights", "StatisticsOverview", "Demographics", "DeviceWise", "OsWise", "TrafficSource", "SocialMediaTrafficSource", "GeographicStatistics"]);

                }
            });
        }

    });
</script>
@endsection

<x-app.app-layout title="Overview">
    <div class="container-fluid">
        <div class="row mb-3 justify-content-end">
            <div class="col-md-5 col-12">
                <input class="shadow" id="select2Accounts" />
            </div>
        </div>

        <div class="card shadow" id="ChannelMainDiv">
            <div class="row p-50">
                <div class="col-md-2 col-12">
                    <img class="rounded-circle lazyload" id="c1ChannelProfileImage" width="100%" height="auto" alt="" />
                </div>
                <div class="col-md-10 col-12 pl-5">
                    <div class="row mt-4">
                        <div class="col">
                            <label class="h1 font-weight-bold" id="c1ChannelName"></label>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <span class="text-red">Total Views</span>
                            <br>
                            <label id="c1ChannelViews" class="font-weight-bold"></label>
                        </div>
                        <div class="col">
                            <span class="text-red">Subscriber</span>
                            <br>
                            <label id="c1ChannelSubscriber" class="font-weight-bold"></label>
                        </div>
                        <div class="col">
                            <span class="text-red">Total Videos</span>
                            <br>
                            <label id="c1ChannelVideos" class="font-weight-bold"></label>
                        </div>
                        <div class="col">
                            <span class="text-red">Joining Date</span>
                            <br>
                            <label id="c1ChannelJoiningDate" class="font-weight-bold"></label>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col">
                            <span class="text-red"><em class="anticon anticon-unordered-list"></em> Category</span>
                            <br>
                            <label id="c1ChannelCategory" class="font-weight-bold"></label>
                        </div>
                        <div class="col">
                            <span class="text-red"><em class="anticon anticon-flag"></em> Country</span>
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
            <!-- <div class="col-md-auto col-12">
                <div class="form-group">
                    <select class="form-control shadow" id="GroupBy">
                        <option value="day" selected>Day</option>
                        <option value="month">Month</option>
                    </select>
                </div>
            </div> -->
            <div class="col-md-auto col-12">
                <div class="form-group">
                    <div class="form-control shadow" id="daterange">
                        <em class="fa fa-calendar"></em>&nbsp;
                        <span></span> <em class="fa fa-caret-down"></em>
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
                    <div class="col-md-6 col-lg-3">
                        <div class="card shadow" style="border-radius: 8%;">
                            <div class="card-body">
                                <div class="media align-items-center">
                                    <div class="avatar avatar-icon avatar-lg avatar-blue">
                                        <em class="fas fa-user-friends"></em>
                                    </div>
                                    <div class="m-l-15">
                                        <h6 class="m-b-0">Subscribers </h6>
                                        <p class="m-b-0 font-weight-bold" id="HighlightsSubscribersGrowth"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="card shadow" style="border-radius: 8%;">
                            <div class="card-body">
                                <div class="media align-items-center">
                                    <div class="avatar avatar-icon avatar-lg avatar-blue">
                                        <em class="far fa-eye"></em>
                                    </div>
                                    <div class="m-l-15">
                                        <h6 class="m-b-0">Views </h6>
                                        <p class="m-b-0 font-weight-bold" id="HighlightsViews"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="card shadow" style="border-radius: 8%;">
                            <div class="card-body">
                                <div class="media align-items-center">
                                    <div class="avatar avatar-icon avatar-lg avatar-blue">
                                        <em class="fas fa-film"></em>
                                    </div>
                                    <div class="m-l-15">
                                        <h6 class="m-b-0">Avg. View Duration (in min) </h6>
                                        <p class="m-b-0 font-weight-bold" id="HighlightsAvgViewDuration"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="card shadow" style="border-radius: 8%;">
                            <div class="card-body">
                                <div class="media align-items-center">
                                    <div class="avatar avatar-icon avatar-lg avatar-blue">
                                        <em class="fas fa-map-signs"></em>
                                    </div>
                                    <div class="m-l-15">
                                        <h6 class="m-b-0">Top Geographies </h6>
                                        <p class="m-b-0 font-weight-bold" id="HighlightsTopCountry"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="card shadow" style="border-radius: 8%;">
                            <div class="card-body">
                                <div class="media align-items-center">
                                    <div class="avatar avatar-icon avatar-lg avatar-blue">
                                        <em class="fas fa-mobile-alt"></em>
                                    </div>
                                    <div class="m-l-15">
                                        <h6 class="m-b-0">Top Device type </h6>
                                        <p class="m-b-0 font-weight-bold" id="HighlightsTopDevice"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="card shadow" style="border-radius: 8%;">
                            <div class="card-body">
                                <div class="media align-items-center">
                                    <div class="avatar avatar-icon avatar-lg avatar-blue">
                                        <em class="fas fa-desktop"></em>
                                    </div>
                                    <div class="m-l-15">
                                        <h6 class="m-b-0">Top Operating system </h6>
                                        <p class="m-b-0 font-weight-bold" id="HighlightsTopPlatform"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="card shadow" style="border-radius: 8%;">
                            <div class="card-body">
                                <div class="media align-items-center">
                                    <div class="avatar avatar-icon avatar-lg avatar-blue">
                                        <em class="fas fa-globe"></em>
                                    </div>
                                    <div class="m-l-15">
                                        <h6 class="m-b-0">Top Traffic source types </h6>
                                        <p class="m-b-0 font-weight-bold" id="HighlightsTrafficSource"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="card shadow" style="border-radius: 8%;">
                            <div class="card-body">
                                <div class="media align-items-center">
                                    <div class="avatar avatar-icon avatar-lg avatar-blue">
                                        <em class="fas fa-share-alt"></em>
                                    </div>
                                    <div class="m-l-15">
                                        <h6 class="m-b-0">Top Sharing service </h6>
                                        <p class="m-b-0 font-weight-bold" id="HighlightsTopSocialMedia"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card shadow" id="StatisticsOverview">
            <div class="card-header p-15 ml-3">
                <label class="h3 m-0">Statistics Overview</label>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-10">
                        <div id="OverviewStatisticsChart" class="w-100 mt-3" style="height: 400px"></div>
                    </div>
                    <div class=" col-md-2 align-self-center">
                        <div class="d-flex flex-column">
                            <div class="mb-2">
                                <span class="text-red">Likes</span>
                                <br />
                                <label class="font-weight-bolder" id="OverviewStatisticsLikes"></label>
                            </div>
                            <div class="mt-2 mb-2">
                                <span class="text-red">Shares</span>
                                <br />
                                <label class="font-weight-bolder" id="OverviewStatisticsShares"></label>
                            </div>
                            <div class="mt-2 mb-2">
                                <span class="text-red">Comments</span>
                                <br />
                                <label class="font-weight-bolder" id="OverviewStatisticsComments"></label>
                            </div>
                            <div class="mt-2">
                                <span class="text-red">Watch time (hours)</span>
                                <br />
                                <label class="font-weight-bolder" id="OverviewStatisticsEstMinWatched"></label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 col-12">
                <div class="card shadow" id="DeviceWise">
                    <div class="card-header p-15 ml-3">
                        <label class="h3 m-0">Device type</label>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div id="DeviceWiseChart" class="w-100 mt-3" style="height: 400px"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-12">
                <div class="card shadow" id="OsWise">
                    <div class="card-header p-15 ml-3">
                        <label class="h3 m-0">Operating system</label>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div id="OsWiseChart" class="w-100 mt-3" style="height: 400px"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="card shadow" id="TrafficSource">
                    <div class="card-header p-15 ml-3">
                        <label class="h3 m-0">Traffic source types</label>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div id="TrafficSourceChart" class="w-100 mt-3" style="height: 400px"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-12">
                <div class="card shadow" id="Demographics">
                    <div class="card-header p-15 ml-3">
                        <label class="h3 m-0">Demographics</label>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div id="DemographicsChart" class="w-100 mt-3" style="height: 400px"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-12">
                <div class="card shadow" id="SocialMediaTrafficSource">
                    <div class="card-header p-15 ml-3">
                        <label class="h3 m-0">Sharing service</label>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div id="SocialMediaTrafficSourceChart" class="w-100 mt-3" style="height: 400px"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="card shadow" id="GeographicStatistics">
                    <div class="card-header p-15 ml-3">
                        <label class="h3 m-0">Geography</label>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div id="GeographicStatisticsChart" class="w-100 mt-3" style="height: 400px"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app.app-layout>