@section('path-navigation')
<a class="breadcrumb-item" href="#">Measure</a>
<a class="breadcrumb-item" href="#">Market Research</a>
<span class="breadcrumb-item active">Channel Intelligence</span>
@endsection

@section('custom-scripts')
<script>
    $(document).ready(function() {
        $("#searchChannel").autocomplete({
            source: function(request, response) {
                $.post({
                    url: "{{ route('api.youtube.channel.getChannelListFromName') }}",
                    data: {
                        channelName: request.term,
                    },
                    success: function(data) {
                        response(data.items);
                    },
                    dataType: 'json'
                });
            },
            minLength: 2,
            select: function(event, ui) {
                var channelID = ui.item.id;
                var linkToOpen = "{{ route('panel.user.measure.market_research.channel_intelligence.channel_details') }}?id=" + channelID;
                openTab(linkToOpen);
            },
            open: function() {
                loadImages();
            }
        }).data("ui-autocomplete")._renderItem = function(ul, item) {
            var snippet = item.snippet;
            var statistics = item.statistics;
            var html =
                '   <div class="row mt-1 pointer">' +
                '        <div class="col-auto">' +
                '            <div class="media align-items-center">' +
                '              <div class="media-left">' +
                '                <a href="#">' +
                '                  <img class="lazyload media-object rounded-circle mr-4" src="{{ asset("/images/others/loading.gif") }}" data-src="' + snippet.thumbnails.default.url + '" alt="Profile" height="60px" width="auto">' +
                '                </a>' +
                '              </div>' +
                '              <div class="media-body">' +
                '                <label class="h5 font-weight-bold">' + snippet.title + '</label><br/>' +
                '                <span class="text-muted font-weight-light">Subscribers: ' + convertToInternationalCurrencySystem(statistics.subscriberCount) + ' | Videos: ' + statistics.videoCount + '</span>' +
                '              </div>' +
                '            </div>' +
                '        </div>' +
                '    </div>';

            return $("<li class='ui-autocomplete-row'></li>")
                .data("item.autocomplete", item)
                .prepend(html)
                .prependTo(ul);
        };
    });
</script>
@endsection

<x-app-layout title="Channel Intelligence">
    <div class="container-fluid">
        <div class="card">
            <div class="row justify-content-end mt-3 mr-1">
                <div class="col-md-6 col-sm-9 col-12">
                    <div class="input-affix m-b-10">
                        <i class="prefix-icon anticon anticon-search"></i>
                        <input type="text" id="searchChannel" class="form-control border-primary" placeholder="{{ __('Search Channel') }}">
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>