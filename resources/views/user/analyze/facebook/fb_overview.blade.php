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
            loadPagesList();
            loadData();
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

            $('#select2Accounts').val(accounts["{{ session('AccountIndex_FB', 0) }}"]['_id']).trigger('change');

            $('#select2Accounts').on('change', function(e) {
                var data = $(this).select2('data');
                $.ajax({
                    url: '{{ route('panel.user.account.setSessionDefaultAccount') }}',
                    data: {
                        id: data._id,
                        platform: parseInt('{{ App\Helper\TokenHelper::$FACEBOOK }}'),

                    },
                    success: function() {
                        loadPagesList();
                    }
                });
            });

            function loadPagesList() {

                $.ajax({
                    data: {
                        part: 'RefreshPages',
                    },
                    dataType: "json",
                    success: function(_PageData) {
                        $('#select2Pages').val(_PageData["{{ session('PagesIndex_FB', 0) }}"]['id']).trigger('change');
                        $('#select2Pages').select2({
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

            $('#select2Pages').on('change', function(e) {
                var data = $('#select2Pages').select2('data');
                $.ajax({
                    url: '{{ route("panel.user.account.setSessionDefaultPage") }}',
                    data: {
                        id: data.id,
                        platform: parseInt('{{ App\Helper\TokenHelper::$FACEBOOK }}'),

                    },
                    success: function() {
                        var data = $('#select2Pages').select2('data');
                        loadAnalytics(data.id);
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
                        data.gender[0].toUpperCase();
                        $("#fbAccURL").attr('href', data.profile_link);
                        $("#fbAccProfileImage").attr('data-src', data.profile_picture);
                        $("#fbAccProfileImage").attr('src',
                            "{{ asset('images/others/loading.gif') }}");
                        loadImages(); //Remember to call after loading images for LazyLoader




                        $("#fbAccName").html((data.name));
                        $("#fbAccFollowersCount").html(convertToInternationalCurrencySystem(data
                            .friends_count));
                        $("#fbAccMediaCount").html(convertToInternationalCurrencySystem(data
                            .posts.data.length));

                        $("#fbAccBirthday").html((data
                            .birthday));

                        $("#fbAccFollowersCount").html(convertToInternationalCurrencySystem(data
                            .friends_count));

                        
                        $("#fbAccGender").html((data
                            .gender));

                        if (data.is_verified == true) //Verified tag
                        {
                            $("#fbAccVerifiedStatusIcon").attr('class', "fas fa-lg fa-check-circle");
                            $("#fbAccVerifiedStatusIcon").attr('style', "color:#3333ff;");
                        }



                        __AC("ChannelMainDiv");
                    }
                });
            }

            function loadAnalytics(pageID) {
                __BS("FBInsights");
                $.ajax({
                    data: {
                        id: pageID,
                        part: 'PageAnalytics',
                        fields: 'access_token,picture,name,about,bio,business,category,category_list,country_page_likes,description,engagement,followers_count,general_info,is_published,link,location,members,cover,fan_count,phone,preferred_audience,is_community_page,new_like_count,overall_star_rating,page_token,verification_status,feed,published_posts,videos,visitor_posts,tagged,posts',
                    },
                    dataType: "json",
                    success: function(response) {
                        let data = response;
                        console.log(data);

                        $("#fbPageProfileImage").attr('data-src', data.picture.data.url);
                        $("#fbPageProfileImage").attr('src',
                            "{{ asset('images/others/loading.gif') }}");
                        loadImages(); //Remember to call after loading images for LazyLoader


                        $("#fbPageName").html(data.name);
                        $("#fbPageAbout").html(data.about);
                        $("#fbPageBio").html(data.bio);
                        $("#fbPageBusiness").html(data.business.name);
                        $("#fbPageDescription").html(data.verification.description);
                        {{dd("HERE fb overview");}}
                        $("#fbPage1Reach").html(convertToInternationalCurrencySystem(
                        reach));
                        $("#fbPage1Views").html(convertToInternationalCurrencySystem(
                        views));

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
                <input class="shadow" id="select2Pages" />
            </div>
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

                    <a id="fbAccURL"><img class="rounded-circle lazyload" id="fbAccProfileImage" width="100%"
                            height="auto"> </a>
                </div>
                <div class="col-md-10 col-12 pl-5">
                    <div class="row mt-4">
                        <div class="col">
                            <label class="h1 font-weight-bold" id="fbAccName"> </label>
                            <span id="fbAccVerifiedStatusIcon"></span>
                        </div>

                    </div>

                    <div class="row mt-4">
                        <div class="col">
                            <span class="text-red"><i class="far fa-id-card"></i> Birthday</span>
                            <br>
                            <label id="fbAccBirthday" class="font-weight-bold"></label>

                        </div>
                        <div class="col">
                            <span class="text-red"><i class="fas fa-users"></i> Friends</span>
                            <br>
                            <label id="fbAccFollowersCount" class="font-weight-bold"></label>
                        </div>
                        <div class="col">
                            <span class="text-red"><i class="fas fa-photo-video"></i> Total Posts</span>
                            <br>
                            <label id="fbAccMediaCount" class="font-weight-bold"></label>
                        </div>
                        <div class="col">
                            <span class="text-red"><i class="far fa-id-card"></i> Gender</span>
                            <br>
                            <label id="fbAccGender" class="font-weight-bold"></label>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card shadow" id="ChannelHighlights">
            <div class="card-header p-15 ml-3">
                <label class="h3 m-0">Page Details</label>
            </div>
            <div class="card-body">
                <div class="row p-50">
                    <div class="col-md-2 col-12">
    
                        <a id="fbPageURL"><img class="rounded-circle lazyload" id="fbPageProfileImage" width="100%"
                                height="auto"> </a>
                    </div>
                    <div class="col-md-10 col-12 pl-5">
                        <div class="row mt-4">
                            <div class="col">
                                <label class="h1 font-weight-bold" id="fbPageName"> </label>
                                <span id="fbPageVerifiedStatusIcon"></span>
                                <span id="fbPagePublishedStatusIcon"></span>    
                                <span id="fbPageCommunityStatusIcon"></span>    

                            </div>
    
                        </div>
    
                        <div class="row mt-4">
                            <div class="col">
                                <span class="text-red"><i class="far fa-id-card"></i> About</span>
                                <br>
                                <label id="fbPageAbout" class="font-weight-bold"></label>
    
                            </div>
                            <div class="col">
                                <span class="text-red"><i class="far fa-id-card"></i> Bio</span>
                                <br>
                                <label id="fbPageBio" class="font-weight-bold"></label>
    
                            </div>
                            <div class="col">
                                <span class="text-red"><i class="fas fa-users"></i> Business Name</span>
                                <br>
                                <label id="fbPageBusiness" class="font-weight-bold"></label>
                            </div>
                            <div class="col">
                                <span class="text-red"><i class="fas fa-photo-video"></i> Description</span>
                                <br>
                                <label id="fbPageDescription" class="font-weight-bold"></label>
                            </div>
                            <div class="col">
                                <span class="text-red"><i class="far fa-id-card"></i> Engagement</span>
                                <br>
                                <label id="fbPageEngagement" class="font-weight-bold"></label>
    
                            </div>
                            <div class="col">
                                <span class="text-red"><i class="far fa-id-card"></i> Followers Count</span>
                                <br>
                                <label id="fbPageFollowers" class="font-weight-bold"></label>
    
                            </div>
                            <div class="col">
                                <span class="text-red"><i class="far fa-id-card"></i> Publication Status</span>
                                <br>
                            </div>
                            <div class="col">
                                <span class="text-red"><i class="far fa-id-card"></i> Location</span>
                                <br>
                                <label id="fbPageLocation" class="font-weight-bold"></label>
    
                            </div>

                            <div class="col">
                                <span class="text-red"><i class="far fa-id-card"></i> Fan Count</span>
                                <br>
                                <label id="fbPageFans" class="font-weight-bold"></label>
    
                            </div>

                            <div class="col">
                                <span class="text-red"><i class="far fa-id-card"></i> Media Count</span>
                                <br>
                                <label id="fbPageMediaCount" class="font-weight-bold"></label>
    
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
</x-app-layout>
