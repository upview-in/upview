@section('path-navigation')
<a class="breadcrumb-item" href="#">Measure</a>
<a class="breadcrumb-item" href="#">Market Research</a>
<a class="breadcrumb-item" href="#">Video Intelligence</a>
<span class="breadcrumb-item active">Video Details</span>
@endsection

@section('custom-scripts')
<script>
    $(document).ready(function() {
        var videoID = GetParameterValues('id');
        var tagsForCopy = '';

        if (typeof videoID !== 'undefined' && videoID !== "") {
            __BS("VideoDetails");

            $.ajax({
                type: 'post',
                url: "{{ route('api.youtube.videos.getVideoDetailsFromVideoID') }}",
                data: {
                    id: videoID,
                },
                dataType: "json",
                success: function(response) {
                    if (typeof response.items !== 'undefined' && response.items.length > 0) {
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
                        $("#v1VideoComments").html(convertToInternationalCurrencySystem(statistics.commentCount));
                        $("#v1VideoPublishedDate").html($.datepicker.formatDate('M dd, yy', new Date(snippet.publishedAt)));

                        var tags = '';
                        if (snippet.tags !== null) {
                            tagsForCopy = snippet.tags.join(",");
                            snippet.tags.forEach(element => {
                                tags +=
                                    '<label class="badge badge-dark mr-1 videoTag">' +
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
                        __AC("CommentsList");
                        loadImages();
                    } else {
                        $("#v1VideoCommentsList").html(noData);
                    }
                }
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

<x-app.app-layout title="Video Details">
    <div class="container-fluid">
        <div class="card shadow" id="VideoDetails">
            <div class="card-header p-15 ml-3">
                <label class="h3 m-0">Video Details</label>
            </div>
            <div class="card-body" id="VideoDetailsChild">
                <div class="row p-20">
                    <div class="col-auto" id="embedPlayer">
                        {{-- <iframe id="v1VideoPlayer" width="512px" height="288px"
                            data-src="https://www.youtube-nocookie.com/embed/" title="YouTube video player"
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
                                <span class="text-red">Views</span>
                                <br>
                                <label id="v1VideoViews" class="font-weight-bold"></label>
                            </div>
                            <div class="col">
                                <span class="text-red"><em class="anticon anticon-like"></em> Likes</span>
                                <br>
                                <label id="v1VideoLikes" class="font-weight-bold"></label>
                            </div>
                            <div class="col">
                                <span class="text-red">Comments</span>
                                <br>
                                <label id="v1VideoComments" class="font-weight-bold"></label>
                            </div>
                            <div class="col">
                                <span class="text-red"><em class="anticon anticon-calendar"></em> Published Date</span>
                                <br>
                                <label id="v1VideoPublishedDate" class="font-weight-bold"></label>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <span class="text-red"><em class="anticon anticon-tag"></em> Tags <sup class="text-gray pointer" id="btnCopyTags">(<em class="anticon anticon-copy"></em>Copy Tags)</sup></span>
                                <div id="v1VideoTags" class="font-weight-bold mt-1">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row p-20">
                    <div class="col">
                        <span class="text-red">Comments</span>
                        <div id="v1VideoCommentsList" class="font-weight-bold mt-1 mb-3">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="notification-toast bottom-right" id="notification-toast"></div>
</x-app.app-layout>