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
                        url: "{{ route('api.youtube.video.getVideoListFromName') }}",
                        data: {
                            videoName: request.term
                        },
                        success: function(data) {
                            response(data);
                        },
                        dataType: 'json'
                    });
                },
                minLength: 2,
                select: function(event, ui) {
                    var videoID = ui.item.items[0].id;
                    var linkToOpen = "{{ route('panel.user.measure.market_research.video_intelligence.video_details') }}?id=" + videoID;
                    openTab(linkToOpen);
                },
                open: function() {
                    loadImages();
                }
            }).data("ui-autocomplete")._renderItem = function(ul, item) {
                var html =
                    '<div class="row mt-1">' +
                    '        <div class="col-auto">' +
                    '            <div class="media align-items-center">' +
                    '              <div class="media-left">' +
                    '                <a href="#">' +
                    '                  <img class="lazyload media-object rounded mr-4" src="{{ asset('/images/others/loading.gif') }}" data-src="' + item.items[0].snippet.thumbnails.default.url + '" alt="Profile" height="60px" width="auto">' +
                    '                </a>' +
                    '              </div>' +
                    '              <div class="media-body">' +
                    '                <label class="h5 font-weight-bold">' + item.items[0].snippet.title + '</label><br/>' +
                    '                <span class="text-muted font-weight-light">Subscribers: ' + convertToInternationalCurrencySystem(item.items[0].statistics.subscriberCount) + ' | Videos: ' + item.items[0].statistics.videoCount + '</span>' +
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
