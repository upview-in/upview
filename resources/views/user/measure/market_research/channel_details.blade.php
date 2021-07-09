@section('path-navigation')
    <a class="breadcrumb-item" href="#">Measure</a>
    <a class="breadcrumb-item" href="#">Market Research</a>
    <a class="breadcrumb-item" href="#">Channel Intelligence</a>
    <span class="breadcrumb-item active">Channel Details</span>
@endsection

@section('custom-scripts')
    <script>
        $(document).ready(function() {
            $("#VideoDetails").toggle();

            var channelID = GetParameterValues('id');
            var tagsForCopy = '';

            if (typeof channelID !== 'undefined' && channelID !== "") {
                __BS("ChannelMainDiv");
                __BS("ChannelVideoList");

                $.ajax({
                    type: "post",
                    url: "{{ route('api.youtube.channel.getChannelDetailsFromID') }}",
                    data: {
                        id: channelID
                    },
                    dataType: "json",
                    success: function(response) {
                        if (typeof response.items !== 'undefined' && response.items.length > 0) {
                            var item = response.items[0];
                            var snippet = item.snippet;
                            var statistics = item.statistics;
                            var topicDetails = item.topicDetails ?? null;

                            $("#c1ChannelProfileImage").attr('data-src', snippet.thumbnails.medium.url);
                            $("#c1ChannelProfileImage").attr('src',
                                "{{ asset('images/others/loading.gif') }}");
                            loadImages();
                            $("#c1ChannelName").html(snippet.title);
                            $("#c1ChannelViews").html(convertToInternationalCurrencySystem(statistics
                                .viewCount));
                            $("#c1ChannelSubscriber").html(convertToInternationalCurrencySystem(
                                statistics.subscriberCount));
                            $("#c1ChannelVideos").html(statistics.videoCount);
                            $("#c1ChannelJoiningDate").html($.datepicker.formatDate('M dd, yy',
                                new Date(snippet.publishedAt)));

                            if (snippet.country != null) {
                                $("#c1ChannelCountry").html(
                                    '<img class="mr-2 align-middle" src="{{ asset('/images/country-icons') }}/' +
                                    snippet
                                    .country.toLowerCase() + '.svg" height="18px" width="auto"/> ' +
                                    snippet.country + ' (' +
                                    getCountryName(snippet
                                        .country) + ')');
                            } else {
                                $("#c1ChannelCountry").html("N/A");
                            }

                            if (topicDetails != null) {
                                var channelCategory = "";
                                topicDetails.topicCategories.forEach(function(value) {
                                    channelCategory += "<a href='" + value +
                                        "' target='_blank'>" + value.replace(
                                            'https://en.wikipedia.org/wiki/', '').replace('_',
                                            ' ').replace('_', ' ').replace('-', ' ') +
                                        "</a><br/>";
                                });
                            }

                            $("#c1ChannelCategory").html(channelCategory ?? 'N/A');

                        } else {
                            $("#ChannelMainDiv").html(noData);
                        }

                        __AC("ChannelMainDiv");
                    }
                });

                $.ajax({
                    type: "post",
                    url: "{{ route('api.youtube.videos.getVideoListFromChannelID') }}",
                    data: {
                        id: channelID,
                    },
                    dataType: "json",
                    success: function(response) {
                        if (typeof response.items !== 'undefined' && response.items.length > 0) {
                            var VideoListCols = "";
                            response.items.forEach(item => {
                                var imgUrl = typeof item.snippet.thumbnails.medium !==
                                    'undefined' ? item
                                    .snippet.thumbnails.medium.url : item.snippet.thumbnails
                                    .high.url;
                                var statistics = item.statistics;
                                VideoListCols +=
                                    '<div class="col-md-3 col-sm-4 col-12 pt-4 pb-4 pl-4 pr-4 border border-dark">' +
                                    '    <div class="row justify-content-center mb-3">' +
                                    '        <div class="col-auto">' +
                                    '            <img class="lazyload pointer openVideoDetails" src="{{ asset('images/others/loading.gif') }}" data-src="' + imgUrl +
                                    '" width="100%" height="auto" data-id="' + item.id + '"/>' +
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

                            $("#VideoListRow").html(VideoListCols ?? 'No videos found');

                            loadImages();

                        } else {
                            $("#VideoListRow").html(noData);
                        }

                        __AC("ChannelVideoList");
                    }
                });

                $(document).on('click', '.openVideoDetails', function() {

                    $("#ChannelVideoList").toggle();
                    $("#VideoDetails").toggle();

                    __BS("VideoDetails");
                    __BS("CommentsList");

                    var videoID = $(this).attr('data-id');
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

                                // $("#v1VideoPlayer").attr('src', $("#v1VideoPlayer").attr(
                                //     'data-src') + videoID);
                                $("#embedPlayer").html(player.embedHtml);
                                $("#v1VideoName").html(snippet.title);
                                $("#v1VideoViews").html(convertToInternationalCurrencySystem(statistics.viewCount));
                                $("#v1VideoLikes").html(convertToInternationalCurrencySystem(statistics.likeCount));
                                $("#v1VideoDisLikes").html(convertToInternationalCurrencySystem(statistics.dislikeCount));
                                $("#v1VideoComments").html(convertToInternationalCurrencySystem(statistics.commentCount));
                                $("#v1VideoPublishedDate").html($.datepicker.formatDate('M dd, yy', new Date(snippet.publishedAt)));

                                var tags = '';
                                if (snippet.tags !== null) {
                                    tagsForCopy = snippet.tags.join(",");
                                    snippet.tags.forEach(element => {
                                        tags +=
                                            '<label class="badge badge-dark mr-1">' +
                                            element + '</label>';
                                    });
                                }
                                $("#v1VideoTags").html(tags);
                            } else {
                                $("#VideoDetailsChild").html(noData);
                            }

                            __AC("VideoDetails");
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
                            console.log(response);

                            if (typeof response.items !== 'undefined' && response.items.length >
                                0) {

                                var CommentsList = "";
                                response.items.forEach(item => {
                                    var snippet = item.snippet.topLevelComment.snippet;

                                    CommentsList +=
                                        '<div class="row mt-3">' +
                                        '    <div class="col-md-1 col-4">' +
                                        '        <img class="lazyload rounded-circle float-right" src="{{ asset('images/others/thumbnail-loading.gif') }}" data-src="' + snippet.authorProfileImageUrl + '" />' +
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
                                                '        <img class="lazyload rounded-circle float-right" src="{{ asset('images/others/thumbnail-loading.gif') }}" data-src="' + snippet1.authorProfileImageUrl + '" />' +
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
                                console.log(CommentsList);
                                $("#v1VideoCommentsList").html(CommentsList);
                                __AC("CommentsList");
                                loadImages();
                            } else {
                                $("#v1VideoCommentsList").html(noData);
                            }
                        }
                    });
                });

                $("#btnVideoDetailBack").click(function() {
                    $("#ChannelVideoList").toggle();
                    $("#VideoDetails").toggle();
                });

                $("#btnCopyTags").click(function() {
                    copyToClipboard(tagsForCopy);
                    toast('Info', 'Copied successfully!', 3000);
                });

            } else {
                alert("Missing required fields.");
            }
        });

    </script>
@endsection

<x-app-layout title="Channel Details">
    <div class="container-fluid">
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

        <div class="card shadow" id="ChannelVideoList">
            <div class="card-header p-15 ml-3">
                <label class="h3 m-0">Recent Videos</label>
            </div>
            <div class="card-body">
                <div class="row p-20" id="VideoListRow">
                </div>
            </div>
        </div>

        <div class="card shadow" id="VideoDetails">
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
    </div>

    <div class="notification-toast bottom-right" id="notification-toast"></div>
</x-app-layout>
