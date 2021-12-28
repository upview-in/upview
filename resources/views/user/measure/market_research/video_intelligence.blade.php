@section('path-navigation')
<a class="breadcrumb-item" href="#">Measure</a>
<a class="breadcrumb-item" href="#">Market Research</a>
<span class="breadcrumb-item active">Video Intelligence</span>
@endsection

@section('custom-scripts')
<script>
    $(document).ready(function() {
        $("#searchVideo").autocomplete({
            source: function(request, response) {
                $.post({
                    url: "{{ route('api.youtube.videos.getVideoListFromName') }}",
                    data: {
                        videoName: request.term
                    },
                    success: function(data) {
                        response(data.items);
                    },
                    dataType: 'json'
                });
            },
            minLength: 3,
            select: function(event, ui) {
                var videoID = ui.item.id;
                var linkToOpen = "{{ route('panel.user.measure.market_research.video_intelligence.video_details') }}?id=" + videoID;
                openTab(linkToOpen);
            },
            open: function() {
                loadImages();
            }
        }).data("ui-autocomplete")._renderItem = function(ul, item) {
            var id = item.id;
            var snippet = item.snippet;
            var statistics = item.statistics;
            var html =
                '    <div class="row mt-2 pointer">' +
                '        <div class="col-auto">' +
                '            <div class="media align-items-center">' +
                '              <div class="media-left">' +
                '                <a href="#">' +
                '                  <img class="lazyload rounded media-object mr-4" src="{{ asset("/images/others/loading.gif") }}" data-src="' + snippet.thumbnails.medium.url + '" alt="Profile" height="60px" width="auto">' +
                '                </a>' +
                '              </div>' +
                '              <div class="media-body">' +
                '                <label class="h5 font-weight-bold">' + snippet.title + '</label><br/>' +
                '                <label class="text-muted">' + convertToInternationalCurrencySystem(statistics.viewCount) + ' Views • ' + timeSince(snippet.publishedAt) + '<br/>' + snippet.channelTitle + '</label>' +
                '              </div>' +
                '            </div>' +
                '        </div>' +
                '    </div>';

            return $("<li class='ui-autocomplete-row'></li>")
                .data("item.autocomplete", item)
                .append(html)
                .appendTo(ul);
        };

        $(document).on('click', ".TrendingVideo,.TagResultVideo", function() {
            var videoID = $(this).data('id');
            var linkToOpen = "{{ route('panel.user.measure.market_research.video_intelligence.video_details') }}?id=" + videoID;
            openTab(linkToOpen);
        });

        var searchByTag = GetParameterValues("tag");
        if (typeof searchByTag !== 'undefined' && searchByTag !== '') {
            $("#TagSearchResult").removeClass('d-none');
            __BS("TagSearchResult");
            $.post({
                url: "{{ route('api.youtube.videos.getVideoListFromName') }}",
                data: {
                    videoName: searchByTag
                },
                success: function(data) {
                    $("#TagSearchResultList").empty();
                    data.items.forEach(item => {
                        var id = item.id;
                        var snippet = item.snippet;
                        var statistics = item.statistics;
                        var html =
                            '    <div class="row mt-2">' +
                            '        <div class="col-auto">' +
                            '            <div class="media align-items-center">' +
                            '              <div class="media-left">' +
                            '                <a href="#">' +
                            '                  <img class="lazyload rounded media-object mr-4" src="{{ asset("/images/others/loading.gif") }}" data-src="' + snippet.thumbnails.medium.url + '" alt="Profile" height="60px" width="auto">' +
                            '                </a>' +
                            '              </div>' +
                            '              <div class="media-body">' +
                            '                <label class="h5 font-weight-bold TagResultVideo pointer" data-id="' + id + '">' + snippet.title + '</label><br/>' +
                            '                <label class="text-muted">' + convertToInternationalCurrencySystem(statistics.viewCount) + ' Views • ' + timeSince(snippet.publishedAt) + '<br/>' + snippet.channelTitle + '</label>' +
                            '              </div>' +
                            '            </div>' +
                            '        </div>' +
                            '    </div>';
                        $("#TagSearchResultList").append(html);
                    });
                    __AC("TagSearchResult");
                    loadImages();
                },
                dataType: 'json'
            });
        }
    });
</script>
@endsection

<x-app-layout title="Video Intelligence">
    <div class="container-fluid">
        <div class="row justify-content-end mt-3 mr-1">
            <div class="col-md-6 col-sm-9 col-12">
                <div class="input-affix m-b-10">
                    <i class="prefix-icon anticon anticon-search"></i>
                    <input type="text" id="searchVideo" class="form-control" placeholder="{{ __('Search Video') }}">
                </div>
            </div>
        </div>

        @if (request()->has('tag') && !empty(request()->get('tag')))
        <div class="card shadow d-none" id="TagSearchResult">
            <div class="card-header p-15 ml-3">
                <label class="h3 m-0">Tag Result</label>
            </div>
            <div class="card-body" id="TagSearchResultList">
            </div>
        </div>
        @endif

        <div class="card shadow" id="YoutubeTrendingVideos">
            <div class="card-header p-15 ml-3">
                <label class="h3 m-0">Youtube Trending Videos</label>
            </div>
            <div class="card-body">
                @foreach($TrendingVideos->items as $TrendingVideo)
                <div class="row mb-5">
                    <div class="col-md-3 col-12">
                        <iframe src="//www.youtube.com/embed/{{ $TrendingVideo->id }}" width="100%" height="200px"></iframe>
                    </div>
                    <div class="col-md-9 col-12">
                        <div class="row">
                            <div class="col">
                                <label class="h4 font-weight-bold TrendingVideo pointer" data-id="{{ $TrendingVideo->id }}" id="v1VideoName">{!! $TrendingVideo->snippet->title !!}</label>
                                <br>
                                <label><a href="https://www.youtube.com/channel/{{ $TrendingVideo->snippet->channelId }}" target="_blank">{{ $TrendingVideo->snippet->channelTitle }}</a></label>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <span class="text-red"><i class="anticon anticon-eye"></i> Views</span>
                                <br>
                                <label id="v1VideoViews" class="font-weight-bold">{{ Functions::FormatNumber($TrendingVideo->statistics->viewCount) }}</label>
                            </div>
                            <div class="col">
                                <span class="text-red"><i class="anticon anticon-like"></i> Likes</span>
                                <br>
                                <label id="v1VideoLikes" class="font-weight-bold">{{ Functions::FormatNumber($TrendingVideo->statistics->likeCount) }}</label>
                            </div>
                            <div class="col">
                                <span class="text-red"><i class="anticon anticon-dislike"></i> DisLikes</span>
                                <br>
                                <label id="v1VideoDisLikes" class="font-weight-bold">{{ Functions::FormatNumber($TrendingVideo->statistics->dislikeCount) }}</label>
                            </div>
                            <div class="col">
                                <span class="text-red"><i class="anticon anticon-message"></i> Comments</span>
                                <br>
                                <label id="v1VideoComments" class="font-weight-bold">{{ Functions::FormatNumber($TrendingVideo->statistics->commentCount) }}</label>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-3 col-12 mt-2">
                                <span class="text-red"><i class="anticon anticon-calendar"></i> Published Date</span>
                                <br>
                                <label id="v1VideoPublishedDate" class="font-weight-bold">{{ \Carbon\Carbon::parse($TrendingVideo->snippet->publishedAt)->diffForHumans() }}</label>
                            </div>
                            <div class="col-md-9 col-12">
                                <span class="text-red">
                                    <i class="anticon anticon-tag"></i> Tags <sup class="text-gray pointer" id="btnCopyTags">(<i class="anticon anticon-copy"></i>Copy Tags)</sup>
                                </span>
                                <div id="v1VideoTags" class="font-weight-bold mt-1 d-flex flex-row overflow-auto">
                                    @if(!is_null($TrendingVideo->snippet->tags))
                                    @foreach($TrendingVideo->snippet->tags as $tag)
                                    <label class="badge badge-dark mr-1 videoTag">{{ $tag }}</label>
                                    @endforeach
                                    @else
                                    No tags found
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>