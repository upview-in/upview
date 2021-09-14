@section('path-navigation')
<a class="breadcrumb-item" href="#">Analayze</a>
<a class="breadcrumb-item" href="#">Youtube</a>
<span class="breadcrumb-item active">Videos</span>
@endsection

@section('custom-scripts')
<script>
    $(document).ready(function() {

        var __startDate = moment().subtract(29, 'days'),
            __endDate = moment();
        var accounts = JSON.parse('{!! App\Helper\TokenHelper::getAuthToken_YT()->toJson() !!}');
        var GroupBy = "day";
        var country = "";
        var tagsForCopy = '';
        var videoID = null;

        $("#VideoDetails").toggle();
        cb(__startDate, __endDate);
        loadData();

        google.charts.load('current', {
            'packages': ['corechart', 'table', 'geochart', 'wordtree']
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
            placeholder: 'Country Wise',
        });

        $('#countryList').on('change', function(e) {
            country = $(this).val();
            loadAnalytics(videoID);
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
                    platform: parseInt('{{ App\Helper\TokenHelper::$YOUTUBE }}'),
                },
                success: function() {
                    $("#btnVideoDetailBack").click();
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
            loadAnalytics(videoID);
        });

        $("#GroupBy").prop('selectedIndex', 0);

        $("#GroupBy").change(function() {
            GroupBy = $(this).val();
            loadAnalytics(videoID);
        });

        var pageToken = null;
        $(window).scroll(function(e) {
            var target = e.currentTarget,
                scrollTop = target.scrollTop || window.pageYOffset,
                scrollHeight = target.scrollHeight || document.body.scrollHeight;
            if (scrollHeight - scrollTop === $(target).innerHeight()) {
                loadData(true);
            }
        });

        function loadData(forAttach = false) {

            if (forAttach === false) {
                __BS("ChannelVideoList");
                $("#VideoListRow").html("");
            }

            $.ajax({
                type: "post",
                url: "{{ route('api.youtube.channel.getMineChannelList') }}",
                dataType: "json",
                success: function(response) {
                    if (typeof response.items !== 'undefined' && response.items.length > 0) {
                        var item = response.items[0];
                        var channelID = item.id;

                        $.ajax({
                            type: "post",
                            url: "{{ route('api.youtube.videos.getVideoListFromChannelID') }}",
                            data: {
                                id: channelID,
                                pageToken: pageToken,
                                loadMore: forAttach,
                            },
                            dataType: "json",
                            success: function(response) {
                                loadVideoList(response, forAttach);
                                __AC("ChannelVideoList");
                            }
                        });
                    }
                }
            });
        }

        function loadVideoList(response, forAttach = false) {
            if (typeof response.items !== 'undefined' && response.items.length > 0) {
                pageToken = response.nextPageToken;
                var VideoListCols = "";
                response.items.forEach(item => {
                    var imgUrl = typeof item.snippet.thumbnails.medium !== 'undefined' ? item.snippet.thumbnails.medium.url : item.snippet.thumbnails.high.url;
                    var statistics = item.statistics;
                    VideoListCols +=
                        '<div class="col-md-3 col-sm-6 col-12 pt-4 pb-4 pl-4 pr-4 border border-dark">' +
                        '    <div class="row justify-content-center mb-3">' +
                        '        <div class="col-auto">' +
                        '            <img class="lazyload pointer openVideoDetails" src="{{ asset("images/others/loading.gif") }}" data-src="' + imgUrl + '" width="100%" height="auto" data-id="' + item.id + '"/>' +
                        '        </div>' +
                        '    </div>' +
                        '    <label class="h5 font-weight-bold overflow-dot openVideoDetails pointer" title="' + item.snippet.title + '" data-id="' + item.id + '">' + item.snippet.title + '</label>' +
                        '    <br />' +
                        '    <span class="font-weight-light"><i class="anticon anticon-calendar"></i> Published: ' + $.datepicker.formatDate('M dd, yy', new Date(item.snippet.publishedAt)) + '</span>' +
                        '    <div class="row mt-3">' +
                        '        <div class="col-6">' +
                        '            <label class="text-red"><i class="anticon anticon-eye"></i> Views</label>' +
                        '            <br />' +
                        '            <span class="font-weight-bold">' + convertToInternationalCurrencySystem(statistics.viewCount) + '</span>' +
                        '        </div>' +
                        '        <div class="col-6">' +
                        '            <label class="text-red"><i class="anticon anticon-message"></i> Comments</label>' +
                        '            <br />' +
                        '            <span class="font-weight-bold">' + convertToInternationalCurrencySystem(statistics.commentCount) + '</span>' +
                        '        </div>' +
                        '    </div>' +
                        '    <div class="row mt-2">' +
                        '        <div class="col-6">' +
                        '            <label class="text-red"><i class="anticon anticon-like"></i> Likes</label>' +
                        '            <br />' +
                        '            <span class="font-weight-bold">' + convertToInternationalCurrencySystem(statistics.likeCount) + '</span>' +
                        '        </div>' +
                        '        <div class="col-6">' +
                        '            <label class="text-red"><i class="anticon anticon-dislike"></i> Dislikes</label>' +
                        '            <br />' +
                        '            <span class="font-weight-bold">' + convertToInternationalCurrencySystem(statistics.dislikeCount) + '</span>' +
                        '        </div>' +
                        '    </div>' +
                        '</div>';
                });

                if (forAttach == true) {
                    $("#VideoListRow").append(VideoListCols);
                } else {
                    $("#VideoListRow").html(VideoListCols ?? 'No videos found');
                }

                loadImages();

            } else {
                if (forAttach == false) {
                    $("#VideoListRow").html(noData);
                }
            }
        }

        $(document).on('click', '.openVideoDetails', function() {

            $("#ChannelVideoList").hide();
            $("#VideoDetails").show();

            __BS(["Details", "CommentsList", "TagsHierarchy"]);

            videoID = $(this).attr('data-id');

            $.ajax({
                type: 'post',
                url: "{{ route('api.youtube.videos.getVideoDetailsFromVideoID') }}",
                data: {
                    id: videoID,
                },
                dataType: "json",
                success: function(response) {

                    if (typeof response.items !== 'undefined' && response.items.length >
                        0) {
                        var item = response.items[0];
                        var snippet = item.snippet;
                        var statistics = item.statistics;
                        var player = item.player;

                        $("#embedPlayer").html(player.embedHtml);
                        $("#v1VideoName").html(snippet.title);
                        $("#v1VideoViews").html(convertToInternationalCurrencySystem(statistics.viewCount));
                        $("#v1VideoLikes").html(convertToInternationalCurrencySystem(statistics.likeCount));
                        $("#v1VideoDisLikes").html(convertToInternationalCurrencySystem(statistics.dislikeCount));
                        $("#v1VideoComments").html(convertToInternationalCurrencySystem(statistics.commentCount));
                        $("#v1VideoPublishedDate").html($.datepicker.formatDate('M dd, yy', new Date(snippet.publishedAt)));

                        $('#daterange').data('daterangepicker').ranges["Overall"] = [moment(snippet.publishedAt), moment()];

                        var tags = '';
                        var WordTreeTags = [];
                        if (snippet.tags !== null) {
                            tagsForCopy = snippet.tags.join(",");
                            snippet.tags.forEach(element => {
                                tags +=
                                    '<label class="badge badge-dark mr-1">' +
                                    element + '</label>';
                                WordTreeTags.push([element]);
                            });
                        }

                        $("#v1VideoTags").html(tags);

                        drawChart($("#TagsHierarchyChart")[0], WordTreeTags, 'WordTree', {
                            wordtree: {
                                format: 'implicit'
                            }
                        });
                    } else {
                        $("#VideoDetailsChild").html(noData);
                    }

                    __AC(["Details", "TagsHierarchy"]);
                }
            });

            $.ajax({
                type: 'post',
                url: "{{ route('api.youtube.comments.getCommentThreadFromVideoID') }}",
                data: {
                    id: videoID,
                },
                dataType: "json",
                success: function(response) {

                    if (typeof response.items !== 'undefined' && response.items.length >
                        0) {

                        var CommentsList = "";
                        response.items.forEach(item => {
                            var snippet = item.snippet.topLevelComment.snippet;

                            CommentsList +=
                                '<div class="row mt-3">' +
                                '    <div class="col-md-1 col-4">' +
                                '        <img class="lazyload rounded-circle float-right" src="{{ asset("images/others/thumbnail-loading.gif") }}" data-src="' + snippet.authorProfileImageUrl + '" />' +
                                '    </div>' +
                                '    <div class="col-md-11 col-8">' +
                                '        <label><a href="' + snippet.authorChannelUrl + '" target="_blank">' + snippet.authorDisplayName + '</a></label>' +
                                '        <span class="text-gray font-weight-lighter ml-2 fs-7">' + timeSince(new Date(snippet.publishedAt).getTime()) + '</span>' +
                                '        <p class="font-weight-light"> ' + snippet.textDisplay + ' </p>';

                            if (typeof item.replies !== 'undefined') {

                                CommentsList +=
                                    '<div class="row ml-3">' +
                                    '   <div class="col">' +
                                    '       <a class="pointer" data-toggle="collapse" data-target="#' + item.id + '">View ' + item.replies.comments.length + ' Repiles</a>' +
                                    '   </div>' +
                                    '</div>';

                                item.replies.comments.forEach(element => {
                                    var snippet1 = element.snippet;
                                    CommentsList +=
                                        '<div class="row ml-5 mt-3 collapse" id="' + item.id + '">' +
                                        '    <div class="col-md-1 col-4">' +
                                        '        <img class="lazyload rounded-circle float-right" src="{{ asset("images/others/thumbnail-loading.gif") }}" data-src="' + snippet1.authorProfileImageUrl + '" />' +
                                        '    </div>' +
                                        '    <div class="col-md-11 col-8">' +
                                        '        <label><a href="' + snippet1.authorChannelUrl + '" target="_blank">' + snippet1.authorDisplayName + '</a></label>' +
                                        '        <span class="text-gray font-weight-lighter ml-2 fs-7">' + timeSince(new Date(snippet1.publishedAt).getTime()) + '</span>' +
                                        '        <p class="font-weight-light"> ' + snippet1.textDisplay + ' </p>' +
                                        '    </div>' +
                                        '</div>';
                                });
                            }

                            CommentsList +=
                                '    </div>' +
                                '</div>';
                        });

                        $("#v1VideoCommentsList").html(CommentsList);
                        loadImages();
                    } else {
                        $("#v1VideoCommentsList").html(noData);
                    }
                    __AC("CommentsList");
                }
            });

            loadAnalytics(videoID);
        });

        function loadAnalytics(video_id) {
            __BS(["StatisticsOverview", "Demographics", "DeviceWise", "OsWise", "TrafficSource", "SocialMediaTrafficSource", "GeographicStatistics"]);

            $.ajax({
                data: {
                    part: 'Analytics',
                    video_id: video_id,
                    startDate: GroupBy == 'month' ? __startDate.format('YYYY-MM') + '-01' : __startDate.format('YYYY-MM-DD'),
                    endDate: GroupBy == 'month' ? __endDate.format('YYYY-MM') + '-01' : __endDate.format('YYYY-MM-DD'),
                    dimensions: GroupBy,
                    sort: GroupBy,
                    filters: country != "" ? "country==" + country : "",
                },
                dataType: "json",
                success: function(data) {
                    let OverviewStatistics = data.OverviewStatistics;
                    let Demographics = data.Demographics;
                    let DeviceWise = data.DeviceWise;
                    let OsWise = data.OsWise;
                    let TrafficSource = data.TrafficSource;
                    let SocialMediaTrafficSource = data.SocialMediaTrafficSource;
                    let GeographicStatistics = data.GeographicStatistics;

                    $("#OverviewStatisticsLikes").html(convertToInternationalCurrencySystem(OverviewStatistics.Likes));
                    $("#OverviewStatisticsDislikes").html(convertToInternationalCurrencySystem(OverviewStatistics.DisLikes));
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

                    __AC(["StatisticsOverview", "Demographics", "DeviceWise", "OsWise", "TrafficSource", "SocialMediaTrafficSource", "GeographicStatistics"]);

                }
            });
        }

        $("#btnVideoDetailBack").click(function() {
            $("#ChannelVideoList").show();
            $("#VideoDetails").hide();
        });

        $("#btnCopyTags").click(function() {
            copyToClipboard(tagsForCopy);
            toast('Info', 'Copied successfully!', 3000);
        });
    });
</script>
@endsection

<x-app-layout title="Videos">
    <div class="container-fluid">
        <div class="row mb-3 justify-content-end">
            <div class="col-md-5 col-12">
                <input class="shadow" id="select2Accounts" />
            </div>
        </div>

        <div class="card shadow" id="ChannelVideoList">
            <div class="card-header p-15 ml-3">
                <label class="h3 m-0">Videos</label>
            </div>
            <div class="card-body">
                <div class="row p-20" id="VideoListRow">
                </div>
            </div>
        </div>

        <Group id="VideoDetails">
            <div class="card shadow" id="Details">
                <div class="card-header p-15 ml-3">
                    <label class="h3 m-0"><i class="anticon anticon-arrow-left text-primary pointer" id="btnVideoDetailBack"></i>
                        Video Details</label>
                </div>
                <div class="card-body" id="VideoDetailsChild">
                    <div class="row p-20">
                        <div class="col-auto" id="embedPlayer">
                            {{-- <iframe id="v1VideoPlayer" width="512px" height="288px"
                            data-src="https://www.youtube-nocookie.com/embed/" title="YouTube video player"
                            frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe> --}}
                        </div>
                        <div class="col-7 ml-3">
                            <div class="row">
                                <div class="col">
                                    <label class="h2 font-weight-bold" id="v1VideoName"></label>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <span class="text-red"><i class="anticon anticon-eye"></i> Views</span>
                                    <br>
                                    <label id="v1VideoViews" class="font-weight-bold"></label>
                                </div>
                                <div class="col">
                                    <span class="text-red"><i class="anticon anticon-like"></i> Likes</span>
                                    <br>
                                    <label id="v1VideoLikes" class="font-weight-bold"></label>
                                </div>
                                <div class="col">
                                    <span class="text-red"><i class="anticon anticon-dislike"></i> DisLikes</span>
                                    <br>
                                    <label id="v1VideoDisLikes" class="font-weight-bold"></label>
                                </div>
                                <div class="col">
                                    <span class="text-red"><i class="anticon anticon-message"></i> Comments</span>
                                    <br>
                                    <label id="v1VideoComments" class="font-weight-bold"></label>
                                </div>
                                <div class="col">
                                    <span class="text-red"><i class="anticon anticon-calendar"></i> Published Date</span>
                                    <br>
                                    <label id="v1VideoPublishedDate" class="font-weight-bold"></label>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <span class="text-red"><i class="anticon anticon-tag"></i> Tags <sup class="text-gray pointer" id="btnCopyTags">(<i class="anticon anticon-copy"></i>
                                            Copy Tags)</sup></span>
                                    <div id="v1VideoTags" class="font-weight-bold mt-1">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row p-20">
                        <div class="col">
                            <span class="text-red"><i class="anticon anticon-message"></i> YouTube comments</span>
                            <div id="v1VideoCommentsList" class="font-weight-bold mt-1 mb-3">
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
                                    <span class="text-red">Dislikes</span>
                                    <br />
                                    <label class="font-weight-bolder" id="OverviewStatisticsDislikes"></label>
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
                                    <span class="text-red">Est. Minutes Watched</span>
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
                            <label class="h3 m-0">Device Wise</label>
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
                            <label class="h3 m-0">Platform Wise</label>
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
                            <label class="h3 m-0">Traffic Source</label>
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
                            <label class="h3 m-0">Social Media Traffic Source</label>
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
                            <label class="h3 m-0">Geographic Statistics</label>
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

                <div class="col-12">
                    <div class="card shadow" id="TagsHierarchy">
                        <div class="card-header p-15 ml-3">
                            <label class="h3 m-0">Tags Hierarchy</label>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div id="TagsHierarchyChart" class="w-100 mt-3"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </Group>
    </div>
</x-app-layout>