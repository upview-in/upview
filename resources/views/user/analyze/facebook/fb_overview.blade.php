@section('path-navigation')
    <a class="breadcrumb-item" href="#">Analayze</a>
    <a class="breadcrumb-item" href="#">Facebook</a>
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
                        platform: parseInt('{{ App\Helper\TokenHelper::$PLATFORMS["facebook"] }}'),

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
                __BS("FBInsights");


                $.ajax({
                    data: {
                        part: 'accountDetails',
                        fields: 'id,name,birthday,age_range,location,hometown,likes,posts,videos,friends,gender,link,picture',
                    },
                    dataType: "json",
                    success: function(response) {
                        let data = response;
                        if(data.status == 200)
                        {
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

                            $("#fbAccVerifiedStatusIcon").attr('class', "fas fa-lg fa-check-circle");


                            if(data.is_verified)  $("#fbAccVerifiedStatusIcon").attr('style', "color:#3333ff;");
                            else $("#fbAccVerifiedStatusIcon").attr('style', "color:#D5D4D4;");


                        }



                        __AC("ChannelMainDiv");

                        if(data.status != 200){
                            $("#ChannelMainDiv").html(noData);
                        }

                    }
                });
            }

            function loadAnalytics(pageID) {
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

                        if(data.status == 200)
                        {
                            $("#fbPageURL").attr('href', data.link);
                            $("#fbPageProfileImage").attr('src',
                                "{{ asset('images/others/loading.gif') }}");

                            $("#fbPageProfileImage").attr('data-src', data.picture.data.url);

                            loadImages(); //Remember to call after loading images for LazyLoader

                            $("#fbPageName").html((data.name));
                            $("#fbPageAbout").html(nl2br(data.about));
                            $("#fbPageBio").html(nl2br(data.bio));
                            $("#fbPageBusiness").html((data.business.name));
                            $("#fbPageDescription").html(nl2br(data.description));
                            $("#fbPageEngagement").html(convertToInternationalCurrencySystem(data.engagement.count));
                            $("#fbPageEngagementSocial").html("("+nl2br(data.engagement.social_sentence)+")");
                            $("#fbPageFollowers").html(convertToInternationalCurrencySystem(data.followers_count));
                            var location = {"city":"N/A","country":"N/A","zip":"N/A"};


                            if(data.location.city.length < 1) location['city'] = '';
                            else location['city'] = data.location.city;

                            if(data.location.country.length < 1) location['country'] = '';
                            else location['country'] = ", " + data.location.country;

                            if(data.location.zip.length < 1) location['zip'] = '';
                            else location['zip'] = " - " + data.location.zip;

                            console.log("LOCATION IS: "+location['city']);

                            $("#fbPageLocation").html((location['city'] + location['country'] + location['zip']));




                            if(data.is_published) $("#fbPagePublished").html("Yes");
                            else $("#fbPagePublished").html("No");

                            $("#fbPageFans").html(convertToInternationalCurrencySystem(data.fan_count));
                            $("#fbPageMediaCount").html(convertToInternationalCurrencySystem((data.feed.data).length));


                            $("#fbPageVerifiedStatusIcon").attr('class', "fas fa-lg fa-check-circle");

                            if(data.verification_status) $("#fbPageVerifiedStatusIcon").attr('style', "color:#3333ff;");
                            else $("#fbPageVerifiedStatusIcon").attr('style', "color:#D5D4D4;");

                        }

                        __AC("FBInsights");


                        if(data.status != 200){
                            $("#FBInsights").html(noData);
                        }


                    }

                });
            }

            function loadPageInsights(pageID) {

                $.ajax({
                    data: {
                        id: pageID,
                        part: 'PageInsights',
                        fields: 'access_token,picture,name,about,bio,business,category,category_list,country_page_likes,description,engagement,followers_count,general_info,is_published,link,location,members,cover,fan_count,phone,preferred_audience,is_community_page,new_like_count,overall_star_rating,page_token,verification_status,feed,published_posts,videos,visitor_posts,tagged,posts',
                    },
                    dataType: "json",
                    success: function(response) {
                        let data = response;
                        console.log(data);
                        if(data.status == 200)
                        {
                            $("#fbPageURL").attr('href', data.link);
                            $("#fbPageProfileImage").attr('src',
                                "{{ asset('images/others/loading.gif') }}");

                            $("#fbPageProfileImage").attr('data-src', data.picture.data.url);

                            loadImages(); //Remember to call after loading images for LazyLoader

                            $("#fbPageName").html((data.name));
                            $("#fbPageAbout").html(nl2br(data.about));
                            $("#fbPageBio").html(nl2br(data.bio));
                            $("#fbPageBusiness").html((data.business.name));
                            $("#fbPageDescription").html(nl2br(data.description));
                            $("#fbPageEngagement").html(convertToInternationalCurrencySystem(data.engagement.count));
                            $("#fbPageEngagementSocial").html("("+nl2br(data.engagement.social_sentence)+")");
                            $("#fbPageFollowers").html(convertToInternationalCurrencySystem(data.followers_count));
                            $("#fbPageLocation").html((data.location));

                            if(data.is_published) $("#fbPagePublished").html("Yes");
                            else $("#fbPagePublished").html("No");

                            $("#fbPageFans").html(convertToInternationalCurrencySystem(data.fan_count));
                            $("#fbPageMediaCount").html(convertToInternationalCurrencySystem((data.feed.data).length));


                            $("#fbPageVerifiedStatusIcon").attr('class', "fas fa-lg fa-check-circle");

                            if(data.verification_status) $("#fbPageVerifiedStatusIcon").attr('style', "color:#3333ff;");
                            else $("#fbPageVerifiedStatusIcon").attr('style', "color:#D5D4D4;");

                        }

                        __AC("FBInsights");


                        if(data.status != 200){
                            $("#FBInsights").html(noData);
                        }


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
        <div class="card shadow" id="FBInsights">
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
                            <div class="col-12">
                                <label class="h1 font-weight-bold" id="fbPageName"> </label>
                                <span id="fbPageVerifiedStatusIcon"></span>

                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-6 mb-2">
                                <span class="text-red"><i class="far fa-id-card"></i> About</span>
                                <br>
                                <label id="fbPageAbout" class="font-weight-bold"></label>

                            </div>
                            <div class="col-6 mb-2">
                                <span class="text-red"><i class="fas fa-list-alt"></i> Description</span>
                                <br>
                                <label id="fbPageDescription" class="font-weight-bold"></label>
                            </div>
                            <div class="col-md-3 col-sm-4 col-6 mb-2">
                                <span class="text-red"><i class="fas fa-receipt"></i> Bio</span>
                                <br>
                                <label id="fbPageBio" class="font-weight-bold"></label>

                            </div>
                            <div class="col-md-3 col-sm-4 col-6 mb-2 mb-2">
                                <span class="text-red"><i class="fas fa-pencil-alt"></i> Business Name</span>
                                <br>
                                <label id="fbPageBusiness" class="font-weight-bold"></label>
                            </div>
                            <div class="col-md-3 col-sm-4 mb-2">
                                <span class="text-red"><i class="fas fa-sort-numeric-up"></i> Engagement</span>
                                <br>
                                <label id="fbPageEngagement" class="font-weight-bold"></label>
                                <br>
                                <label id="fbPageEngagementSocial" class="text-muted" style="font-size:12px"></label>

                            </div>
                            <div class="col-md-3 col-sm-4 mb-2">
                                <span class="text-red"><i class="fas fa-users"></i> Followers Count</span>
                                <br>
                                <label id="fbPageFollowers" class="font-weight-bold"></label>

                            </div>
                            <div class="col-md-3 col-sm-4 mb-2">
                                <span class="text-red md-5"><i class="fas fa-check-double"></i> Is Published?</span>
                                <br>
                                <label  id="fbPagePublished"   class="font-weight-bold"></label>
                                <br>
                            </div>
                            <div class="col-md-3 col-sm-4 col-6 mb-2">
                                <span class="text-red"><i class="fas fa-globe-asia"></i> Location</span>
                                <br>
                                <label id="fbPageLocation" class="font-weight-bold"></label>

                            </div>

                            <div class="col-md-3 col-sm-4 col-6 mb-2">
                                <span class="text-red"><i class="fas fa-users"></i> Fan Count</span>
                                <br>
                                <label id="fbPageFans" class="font-weight-bold"></label>

                            </div>

                            <div class="col-md-3 col-sm-4 col-6 mb-2">
                                <span class="text-red"><i class="fas fa-photo-video"></i> Media Count</span>
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
                        <div> <label> We're working on it! </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
