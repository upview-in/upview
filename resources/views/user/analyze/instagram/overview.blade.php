@section('path-navigation')
    <a class="breadcrumb-item" href="#">Analyze</a>
    <a class="breadcrumb-item" href="#">Instagram</a>
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

        #s2id_countryList>.select2-choice {
            border: none;
        }

    </style>

@endsection

@section('custom-scripts')
    <script>
        $(document).ready(function() {

            var __startDate = moment().subtract(29, 'days'),
                __endDate = moment();
            var accounts = JSON.parse('{!! App\Helper\TokenHelper::getAuthToken_IG()->toJson() !!}');
            var GroupBy = "day";
            var country = "";

            cb(__startDate, __endDate);
            loadData(null);
            loadPagesList();
            google.charts.load('current', {
                'packages': ['corechart', 'controls']
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
                placeholder: 'Country Wise',
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

            $('#select2Accounts').val(accounts["{{ session('AccountIndex_IG', 0) }}"]['_id']).trigger('change');

            $('#select2Accounts').on('change', function(e) {
                var data = $(this).select2('data');
                $.ajax({
                    url: '{{ route("panel.user.account.setSessionDefaultAccount") }}',
                    data: {
                        id: data._id,
                        platform: parseInt('{{ App\Helper\TokenHelper::$PLATFORMS["instagram"] }}'),

                    },
                    success: function() {
                       loadData(data._id);
                    }
                });
            });


            function loadPagesList() {

            $.ajax({
                    data: {
                        part: 'LoadFacebookPages',
                    },
                    dataType: "json",
                    success: function(_PageData) {
                        $('#select2InstaAccounts').val(_PageData["{{ session('PagesIndex_IG', 0) }}"]['id']).trigger('change');
                        $('#select2InstaAccounts').select2({
                            data: {
                                results: _PageData
                            },
                            id: function(item) {
                                return item.id
                            },
                            text: function(item) {
                                return item.name
                            },
                            allowClear: true,
                            formatResult: formatData,
                            formatSelection: formatSelectionData,
                            minimumResultsForSearch: -1
                        });
                    }
                })
            }

            $('#select2InstaAccounts').on('change', function(e) {
            var data = $('#select2InstaAccounts').select2('data');
            console.log();
            $.ajax({
                url: '{{ route("panel.user.account.setSessionDefaultPage") }}',
                data: {
                    id: data.id,
                    platform: parseInt('{{  App\Helper\TokenHelper::$PLATFORMS["instagram"] }}'),

                },
                success: function() {
                    var data = $('#select2InstaAccounts').select2('data');
                    loadAnalytics(data.id);
                    loadInstaInsights(data.id);
                }
            });
            });



            let listRanges = {
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().add(1, 'month').startOf('month')],
                // 'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month')
                //     .endOf('month')
                // ],
                // 'Last 3 Months': [moment().subtract(3, 'month').startOf('month'), moment().subtract(1, 'month')
                //     .endOf('month')
                // ],
                // 'Last 6 Months': [moment().subtract(6, 'month').startOf('month'), moment().subtract(1, 'month')
                //     .endOf('month')
                // ],
                // 'This Year': [moment().startOf('year'), moment().subtract(1, 'month').endOf('month')],
                // 'Last Year': [moment().subtract(1, 'year').startOf('year'), moment().subtract(1, 'year').endOf(
                //     'year')],
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
                if (__endDate.diff(__startDate, 'days') > 62) {
                    $("#GroupBy").prop('selectedIndex', 1);
                    GroupBy = $("#GroupBy").val();
                }
                loadAnalytics();
            });

            $("#GroupBy").prop('selectedIndex', 0);

            $("#GroupBy").change(function() {
                GroupBy = $(this).val();
                loadAnalytics();
            });




            function loadData(pageID) {

                if($pageid != NULL)
                {
                    __BS("ChannelMainDiv");
                    __BS("ChannelHighlights");


                    $.ajax({
                        data: {
                            part: 'accountDetails',
                            id: pageID
                        },
                        dataType: "json",
                        success: function(response) {

                            let data = response;
                            console.log(data);
                            if(data.status == 200)
                            {
                                $("#igPage1ProfileImage").attr('data-src', data.profile_picture_url);
                                $("#igPagelProfileImage").attr('src',
                                    "{{ asset('images/others/loading.gif') }}");
                                loadImages(); //Remember to call after loading images for LazyLoader

                                $("#igPage1Name").html((data.name));
                                $("#igPage1UserName").html((data.username));
                                $("#igPage1FollowersCount").html(convertToInternationalCurrencySystem(data
                                    .followers_count));
                                $("#igPage1FollowingCount").html(convertToInternationalCurrencySystem(data
                                .follows_count));
                                $("#igPage1MediaCount").html(convertToInternationalCurrencySystem(data
                                .media_count));

                                $("#igPageVerifiedStatusIcon").attr('class', "fas fa-lg fa-check-circle");

                                if(data.is_verified == true) $("#igPageVerifiedStatusIcon").attr('style', "color:#3333ff;");
                                else $("#igPageVerifiedStatusIcon").attr('style', "color:#D5D4D4;");
                            }

                            __AC("ChannelMainDiv");


                            if(data.status != 200){
                                $("#ChannelMainDiv").html(noData);
                            }
                        }
                    });
                }
                else $("#ChannelMainDiv").html(noData);
            }

            function loadAnalytics(pageID) {

                if(pageID != null)
                {
                    $.ajax({
                    data: {
                        part: 'Analytics',
                        id: pageID,
                    },
                    dataType: "json",
                    success: function(response) {
                       let data = response;

                        if(data.status == 200)
                        {
                            impressions = parseInt(data.impressions);
                            reach = parseInt(data.reach);
                            profile_views = parseInt(data.profile_views);
                            // day1 = parseInt(data.profile_views.dayBeforeYest);
                            // views = day1 + parseInt(data.profile_views.yest);


                            $("#igPage1Impressions").html(convertToInternationalCurrencySystem(
                            impressions));
                            $("#igPage1Reach").html(convertToInternationalCurrencySystem(
                            reach));
                            $("#igPage1Views").html(convertToInternationalCurrencySystem(
                            profile_views));
                            console.log(data.chartData);
                            drawChart($('#OverviewStatisticsChart')[0], data.chartData, 'Area');
                        }

                        __AC("ChannelHighlights");

                        if(data.status != 200){
                            $("#ChannelHighlights").html(noData);
                            $("#OverviewStatisticsChart").html(noData);
                        }

                    }
                });
            }
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
            <div class="col-md-5 col-12">
                <input class="shadow" id="select2InstaAccounts" />
            </div>
        </div>
        <div class="card-header p-15 ml-3">
            <label class="h3 m-0">Account Details</label>
        </div>
        <div class="card shadow" id="ChannelMainDiv">
            <div class="row p-50">
                <div class="col-md-2 col-12">
                    <img class="rounded-circle lazyload" id="igPage1ProfileImage" width="100%" height="auto"/>
                </div>
                <div class="col-md-10 col-12 pl-5">
                    <div class="row mt-4">
                        <div class="col">
                            <label class="h1 font-weight-bold" id="igPage1Name"></label>
                            <span id="igPageVerifiedStatusIcon"></span>
                        </div>

                    </div>

                    <div class="row mt-4">
                        <div class="col">
                            <span class="text-red"><em class="far fa-id-card"></em> Username</span>
                            <br>
                            <label id="igPage1UserName" class="font-weight-bold"></label>

                        </div>
                        <div class="col">
                            <span class="text-red"><em class="fas fa-users"></em> Followers</span>
                            <br>
                            <label id="igPage1FollowersCount" class="font-weight-bold"></label>
                        </div>
                        <div class="col">
                            <span class="text-red"><em class="fas fa-user-friends"></em> Following</span>
                            <br>
                            <label id="igPage1FollowingCount" class="font-weight-bold"></label>
                        </div>
                        <div class="col">
                            <span class="text-red"><em class="fas fa-photo-video"></em> Total Posts</span>
                            <br>
                            <label id="igPage1MediaCount" class="font-weight-bold"></label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card shadow" id="InstaInsights">
            <div class="card-header p-15 ml-3">
                <label class="h3 m-0">Insights <em class="fas fa-xs fa-question-circle " title="(Data according to last 28 days) Subject to Instagram Limitations - This metric is limited by the Instagram, based on the account linked. To know more, Check out Instagram's limitations."></em></label>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-md-30 border-right">
                        <div class="row mb-3">
                            <div class="col">
                                <span class="text-red"><em class="far fa-heart"></em> Impressions</span>
                                <br>
                                <label id="igPage1Impressions" class="font-weight-bold"></label>
                            </div>
                            <div class="col">
                                <span class="text-red"><em class="anticon anticon-instagram"></em> Profile Reach</span>
                                <br>
                                <label id="igPage1Reach" class="font-weight-bold"></label>
                            </div>
                            <div class="col">
                                <span class="text-red"><em class="far fa-check-circle"></em> Profile Views</span>
                                <br>
                                <label id="igPage1Views" class="font-weight-bold"></label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card shadow" id="ChannelHighlights">
            <div class="card-header p-15 ml-3">
                <label class="h3 m-0">Statistics Overview</label>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-10">
                        <div id="OverviewStatisticsChart" class="w-100 mt-3" style="height: 400px"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app.app-layout>
