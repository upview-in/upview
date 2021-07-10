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
                    '                  <img class="lazyload rounded media-object mr-4" src="{{ asset('/images/others/loading.gif') }}" data-src="' + snippet.thumbnails.medium.url + '" alt="Profile" height="60px" width="auto">' +
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
        });

    </script>
@endsection

<x-app-layout title="Video Intelligence">
    <div class="container-fluid">
        <div class="card">
            <div class="row">
                <div class="col-md-6 col-sm-9 col-12">
                    <div class="input-affix m-b-10">
                        <i class="prefix-icon anticon anticon-search"></i>
                        <input type="text" id="searchVideo" class="form-control" placeholder="{{ __('Search Video') }}">
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
