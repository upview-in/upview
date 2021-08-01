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
</style>
@endsection

@section('custom-scripts')
<script>
    $(document).ready(function() {

        loadData();

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

        var accounts = JSON.parse('{!! App\Helper\TokenHelper::getAuthToken_YT()->toJson() !!}');

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
        });

        $('#select2Accounts').val(accounts["{{ session('AccountIndex', null) }}"]['_id']).trigger('change');

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

        function loadData() {
            __BS("ChannelMainDiv");

            $.ajax({
                type: "post",
                url: "{{ route('api.youtube.channel.getMineChannelList') }}",
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
                            $("#c1ChannelCountry").html('<img class="mr-2 align-middle" src="{{ asset("/images/country-icons") }}/' + snippet.country.toLowerCase() + '.svg" height="18px" width="auto" /> ' + snippet.country + ' (' + getCountryName(snippet.country) + ')');
                        } else {
                            $("#c1ChannelCountry").html("N/A");
                        }

                        if (topicDetails != null) {
                            var channelCategory = "";
                            topicDetails.topicCategories.forEach(function(value) {
                                channelCategory += "<a href='" + value + "' target='_blank'>" + value.replace('https://en.wikipedia.org/wiki/', '').replace('_', ' ').replace('_', ' ').replace('-', ' ') + "</a><br />";
                            });
                        }

                        $("#c1ChannelCategory").html(channelCategory ?? 'N/A');

                    } else {
                        $("#ChannelMainDiv").html(noData);
                    }

                    __AC("ChannelMainDiv");
                }
            });
        }
    });
</script>
@endsection

<x-app-layout title="Overview">
    <div class="container-fluid">
        <div class="row mb-3">
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
    </div>
</x-app-layout>