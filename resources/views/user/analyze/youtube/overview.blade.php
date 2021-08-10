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

        var __startDate = moment().subtract(29, 'days'),
            __endDate = moment();
        var accounts = JSON.parse('{!! App\Helper\TokenHelper::getAuthToken_YT()->toJson() !!}');
        var GroupBy = "day";

        cb(__startDate, __endDate);
        loadData();
        loadAnalytics();

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

        $('#daterange').daterangepicker({
            startDate: __startDate,
            endDate: __endDate,
            ranges: {
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().add(1, 'month').startOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
                'Last 3 Months': [moment().subtract(3, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
                'Last 6 Months': [moment().subtract(6, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
                'This Year': [moment().startOf('year'), moment().subtract(1, 'month').endOf('month')],
                'Last Year': [moment().subtract(1, 'year').startOf('year'), moment().subtract(1, 'year').endOf('year')]
            }
        }, cb);

        $('#daterange').on('apply.daterangepicker', function(ev, picker) {
            __startDate = picker.startDate;
            __endDate = picker.endDate;
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
                        $("#c1ChannelJoiningDate").html($.datepicker.formatDate('M dd, yy', new Date(snippet.publishedAt)));

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

        function loadAnalytics() {
            $.ajax({
                type: "post",
                url: "{{ route('api.youtube.channel.getMineChannelAnalytics') }}",
                data: {
                    startDate: GroupBy == 'month' ? __startDate.format('YYYY-MM') + '-01' : __startDate.format('YYYY-MM-DD'),
                    endDate: GroupBy == 'month' ? __endDate.format('YYYY-MM') + '-01' : __endDate.format('YYYY-MM-DD'),
                    dimensions: GroupBy,
                    sort: GroupBy,
                },
                dataType: "json",
                success: function(response) {
                    console.log(response);
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

        <div class="card shadow" id="ChannelMainDiv">
            <div class="card-header p-15 ml-3">
                <label class="h3 m-0">Highlights</label>
            </div>
            <div class="card-body">

            </div>
        </div>
</x-app-layout>