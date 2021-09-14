
@section('path-navigation')
    <a class="breadcrumb-item" href="#">Analayze</a>
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
            var accounts = JSON.parse('{!! App\Helper\TokenHelper::getAuthToken_FB()->toJson() !!}');
            var GroupBy = "day";
            var country = "";

            cb(__startDate, __endDate);
            loadData();
            google.charts.load('current', {
                'packages': ['corechart', 'controls']
            }).then(() => {
                loadAnalytics();
            });


            function drawChart(data) {
            var data = new google.visualization.arrayToDataTable(data);
            OverviewStatisticsChart = new Chart($('#OverviewStatisticsChart')[0], data, {}, [7, 8], "Line");
            OverviewStatisticsChart.init();
        }

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

            $('#select2Accounts').val(accounts["{{ session('AccountIndex_FB', 0) }}"]['_id']).trigger('change');

            $('#select2Accounts').on('change', function(e) {
                var data = $(this).select2('data');
                $.ajax({
                    url: '{{ route("panel.user.account.setSessionDefaultAccount") }}',
                    data: {
                        id: data._id,
                        platform: parseInt('{{ App\Helper\TokenHelper::$INSTAGRAM }}'),

                    },
                    success: function() {
                        loadData();
                    }
                });
            });

            let listRanges = {
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().add(1, 'month').startOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month')
                    .endOf('month')
                ],
                'Last 3 Months': [moment().subtract(3, 'month').startOf('month'), moment().subtract(1, 'month')
                    .endOf('month')
                ],
                'Last 6 Months': [moment().subtract(6, 'month').startOf('month'), moment().subtract(1, 'month')
                    .endOf('month')
                ],
                'This Year': [moment().startOf('year'), moment().subtract(1, 'month').endOf('month')],
                'Last Year': [moment().subtract(1, 'year').startOf('year'), moment().subtract(1, 'year').endOf(
                    'year')],
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
                    data: {
                        part: 'accountDetails',
                        fields: 'id,name,birthday,age_range,location,hometown,likes,posts,videos,friends,gender,link,picture',
                    },
                    dataType: "json",
                    success: function(response) {
                         let data = response;
                         $("#fbPageURL").attr('href', data.profile_link);
                        $("#fbPage1ProfileImage").attr('data-src', data.profile_picture);
                        $("#fbPagelProfileImage").attr('src',
                            "{{ asset('images/others/loading.gif') }}");
                        loadImages(); //Remember to call after loading images for LazyLoader
                        
                        
                        

                        $("#fbPage1Name").html((data.name));
                        $("#fbPage1FollowersCount").html(convertToInternationalCurrencySystem(data
                            .friends_count));
                        $("#fbPage1MediaCount").html(convertToInternationalCurrencySystem(data
                        .posts.data.length));

                        $("#fbPage1Birthday").html((data
                            .birthday));

                        $("#fbPage1FollowersCount").html(convertToInternationalCurrencySystem(data
                            .friends_count));
                        
                        $("#fbPage1Gender").html((data
                            .gender));

                        if(data.is_verified == true) //Verified tag
                        {
                            $("#fbPageVerifiedStatusIcon").attr('class', "fas fa-lg fa-check-circle");
                            $("#fbPageVerifiedStatusIcon").attr('style', "color:#3333ff;");
                        }
                        

                        drawChart(data.chartData);
                        
                        __AC("ChannelMainDiv");
                    }
                });
            }

            function loadAnalytics() {
                __BS("InstaInsights");

                $.ajax({
                    data: {
                        part: 'Analytics',
                        fields: '',
                    },
                    dataType: "json",
                    success: function(response) {
                        // data = response;
                        // day1 = parseInt(data.impressions.dayBeforeYest);
                        // impressions = day1 + parseInt(data.impressions.yest);
                        // day1 = parseInt(data.reach.dayBeforeYest);
                        // reach = day1 + parseInt(data.reach.yest);
                        // day1 = parseInt(data.profile_views.dayBeforeYest);
                        // views = day1 + parseInt(data.profile_views.yest);
                        
                        
                        // $("#fbPage1Impressions").html(convertToInternationalCurrencySystem(
                        // impressions));
                        // $("#fbPage1Reach").html(convertToInternationalCurrencySystem(
                        // reach));
                        // $("#fbPage1Views").html(convertToInternationalCurrencySystem(
                        // views));
                        // var chartData = [["This title lmfao","Impressions", "Reach", "Views"], ["Insights",impressions,reach,views]];
                        //  drawChart(chartData);
                        // console.log(chartData);
                        __AC("InstaInsights");

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
        <div class="card-header p-15 ml-3">
            <label class="h3 m-0">Account Details</label>
        </div>
        <div class="card shadow" id="ChannelMainDiv">
            <div class="row p-50">
                <div class="col-md-2 col-12">
                    
                  <a id="fbPageURL"><img class="rounded-circle lazyload" id="fbPage1ProfileImage" width="100%" height="auto"> </a>
                </div>
                <div class="col-md-10 col-12 pl-5">
                    <div class="row mt-4">
                        <div class="col">
                           <label class="h1 font-weight-bold" id="fbPage1Name"> </label>
                            <span id="fbPageVerifiedStatusIcon"></span>
                        </div>
                        
                    </div>

                    <div class="row mt-4">
                        <div class="col">
                            <span class="text-red"><i class="far fa-id-card"></i> Birthday</span>
                            <br>
                            <label id="fbPage1Birthday" class="font-weight-bold"></label>
                            
                        </div>
                        <div class="col">
                            <span class="text-red"><i class="fas fa-users"></i> Followers</span>
                            <br>
                            <label id="fbPage1FollowersCount" class="font-weight-bold"></label>
                        </div>
                        <div class="col">
                            <span class="text-red"><i class="fas fa-photo-video"></i> Total Posts</span>
                            <br>
                            <label id="fbPage1MediaCount" class="font-weight-bold"></label>
                        </div>
                        <div class="col">
                            <span class="text-red"><i class="far fa-id-card"></i> Gender</span>
                            <br>
                            <label id="fbPage1Gender" class="font-weight-bold"></label>
                            
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
</x-app-layout>
