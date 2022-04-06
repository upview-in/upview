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
                'packages': ['corechart', 'controls', 'geochart']
            }).then(() => {
                // loadAnalytics();
            });


            function nl2br (str, is_xhtml) {
                if (typeof str === 'undefined' || str === null) {
                    return '';
                }
                var breakTag = (is_xhtml || typeof is_xhtml === 'undefined') ? '<br />' : '<br>';
                return (str + '').replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1' + breakTag + '$2');
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
                placeholder: 'Country',
            });

            $('#countryList').on('change', function(e) {
                country = $(this).val();
                // loadAnalytics();
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

                __BS("ChannelMainDiv");
                __BS("FBPageDetails");
                __BS("FBPageInsights");
                __BS("GraphicalOverview");


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
                console.log();
                $.ajax({
                    url: '{{ route("panel.user.account.setSessionDefaultPage") }}',
                    data: {
                        id: data.id,
                        platform: parseInt('{{  App\Helper\TokenHelper::$PLATFORMS["facebook"] }}'),

                    },
                    success: function() {
                        var data = $('#select2Pages').select2('data');
                        loadAnalytics(data.id);
                        loadPageInsights(data.id);
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
                // loadAnalytics();
            });

            $("#GroupBy").prop('selectedIndex', 0);

            $("#GroupBy").change(function() {
                GroupBy = $(this).val();
                // loadAnalytics();
            });

            function loadData() {
                __BS("ChannelMainDiv");
                __BS("FBPageDetails");
                __BS("FBPageInsights");
                __BS("GraphicalOverview");



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

                if(pageID != null)
                {
                    $.ajax({
                    data: {
                        id: pageID,
                        part: 'PageAnalytics',
                        fields: 'access_token,picture,name,about,bio,business,category,category_list,country_page_likes,description,engagement,followers_count,general_info,is_published,link,location,members,cover,fan_count,phone,preferred_audience,is_community_page,new_like_count,overall_star_rating,page_token,verification_status,feed,published_posts,videos,visitor_posts,tagged,posts',
                    },
                    dataType: "json",
                    success: function(response) {
                        let data = response;
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
                            var location = {"city":"-","country":"-","zip":"-"};


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

                        if(data.status != 200){
                            $("#FBInsights").html(noData);
                        }
                        __AC("FBInsights");

                    }
                });
                }
                else console.log("ID is null");
            }

            function loadPageInsights(pageID) {

                $.ajax({
                    data: {
                        id: pageID,
                        part: 'PageInsights',
                    },
                    dataType: "json",
                    success: function(response) {
                        let data = response;
                        if(data.status == 200)
                        {
                            $("#fbPageTotalActions").html(convertToInternationalCurrencySystem(data.page_total_actions.data));
                            $("#fbPageActionsTooltip").attr('title', nl2br(data.page_total_actions.desc));

                            $("#fbPageUserEngagement").html(convertToInternationalCurrencySystem(data.page_engaged_users.data));
                            $("#fbPageEngagedUsersTooltip").attr('title', nl2br(data.page_engaged_users.desc));

                            $("#fbPagePostsEngagement").html(convertToInternationalCurrencySystem(data.page_post_engagements.data));
                            $("#fbPagePostEngagedTooltip").attr('title', nl2br(data.page_post_engagements.desc));

                            $("#fbPageConsumptions").html(convertToInternationalCurrencySystem(data.page_consumptions.data));
                            $("#fbPageConsumptionsTooltip").attr('title', nl2br(data.page_consumptions.desc));

                            $("#fbPageCheckin").html(convertToInternationalCurrencySystem(data.page_places_checkin_total.data));
                            $("#fbPageCheckinTooltip").attr('title', nl2br(data.page_places_checkin_total.desc));

                            $("#fbPageCheckinMobile").html(convertToInternationalCurrencySystem(data.page_places_checkin_mobile.data));
                            $("#fbPageCheckinMobileTooltip").attr('title', nl2br(data.page_places_checkin_mobile.desc));

                            $("#fbPageNegetiveFeedbacks").html(convertToInternationalCurrencySystem(data.page_negative_feedback.data));
                            $("#fbPageNegetiveFeedbacksTooltip").attr('title', nl2br(data.page_negative_feedback.desc));

                            $("#fbPageImpressions").html(convertToInternationalCurrencySystem(data.page_impressions.data));
                            $("#fbPageImpressionsTooltip").attr('title', nl2br(data.page_impressions.desc));

                            $("#fbPageImpressionsViral").html(convertToInternationalCurrencySystem(data.page_impressions_viral.data));
                            $("#fbPageImpressionsViralTooltip").attr('title', nl2br(data.page_impressions_viral.desc));

                            $("#fbPageImpressionsNonViral").html(convertToInternationalCurrencySystem(data.page_impressions_nonviral.data));
                            $("#fbPageImpressionsNonViralTooltip").attr('title', nl2br(data.page_impressions_nonviral.desc));

                            $("#fbPagePostsImpressions").html(convertToInternationalCurrencySystem(data.page_posts_impressions.data));
                            $("#fbPagePostsImpressionsTooltip").attr('title', nl2br(data.page_posts_impressions.desc));

                            $("#fbPagePostsImpressionsViral").html(convertToInternationalCurrencySystem(data.page_posts_impressions_viral.data));
                            $("#fbPagePostImpressionsViralTooltip").attr('title', nl2br(data.page_posts_impressions_viral.desc));

                            $("#fbPagePostsImpressionsNonViral").html(convertToInternationalCurrencySystem(data.page_posts_impressions_nonviral.data));
                            $("#fbPagePostImpressionsNonViralTooltip").attr('title', nl2br(data.page_posts_impressions_nonviral.desc));

                            var fanCountNet = (data.page_fan_adds.data) - (data.page_fan_removes.data);
                            if(fanCountNet <= 0) {
                                $("#fbPageFansInsights").attr('class', 'font-weight-bold text-danger');
                                $("#fansGrowthIcon").attr('class', 'fas fa-long-arrow-alt-down text-danger ml-2');

                            }
                            else
                            {
                                $("#fbPageFansInsights").attr('class', 'font-weight-bold text-success');
                                $("#fansGrowthIcon").attr('class', 'fas fa-long-arrow-alt-up text-danger ml-2');

                            }

                            $("#fbPageFansInsights").html(convertToInternationalCurrencySystem(fanCountNet));
                            $("#fbPageFansTooltip").attr('title', nl2br("Net Fans: Number of fans added - Number of fans removed."));

                            $("#fbPageVideoViews").html(convertToInternationalCurrencySystem((data.page_video_views.data)));
                            $("#fbPageVideoViewsTooltip").attr('title', nl2br(data.page_video_views.desc));

                            $("#fbTotalPageViews").html(convertToInternationalCurrencySystem((data.page_views_total.data)));
                            $("#fbTotalPageViewsTooltip").attr('title', nl2br(data.page_views_total.desc));

                            $("#fbPageCompleteVideoViews30sec").html(convertToInternationalCurrencySystem((data.page_video_complete_views_30s.data)));
                            $("#fbPageCompleteVideoViews30secTooltip").attr('title', nl2br(data.page_video_complete_views_30s.desc));

                            $("#fbPageVideoViews10sec").html(convertToInternationalCurrencySystem((data.page_video_views_10s.data)));
                            $("#fbPageVideoViews10secTooltip").attr('title', nl2br(data.page_video_views_10s.desc));

                            $("#fbPageContentActivity").html(convertToInternationalCurrencySystem((data.page_content_activity.data)));
                            $("#fbPageContentActivityTooltip").attr('title', nl2br(data.page_content_activity.desc));

                            // drawChart($('#PageImpressionsByCountryChart')[0], data.chartData.page_impressions_by_country_unique, 'Column', {
                            //     hAxis: {
                            //         textPosition: 'out',
                            //     },
                            //     chartArea: {
                            //         left: 100,
                            //         right: 50,
                            //         top: 100,
                            //         bottom: 100,
                            //     },
                            //     bar: {
                            //         groupWidth: 50
                            //     }
                            // });



                            //Charts


                            //Country insights
                            drawChart($('#PageImpressionsByCountryChart')[0], data.chartData.page_impressions_by_country_unique, 'Geo', {
                                tooltip: { isHtml: true },
                                colorAxis: { colors: ['#a6c5f7','#3277e6', '#075ce6'] }
                            });
                            $("#PageImpressionsByCountryChartTooltip").attr('title', nl2br(data.page_impressions_by_country_unique.desc));

                            //Locale insights
                            // drawChart($('#PageImpressionsByCountryChart')[0], data.chartData.page_impressions_by_locale_unique, 'Bubble', {
                            //     colorAxis: { colors: ['violet'] }
                            // });
                            // $("#PageImpressionsByLocaleChartTooltip").attr('title', nl2br(data.page_impressions_by_locale_unique.desc));
//                            drawChart($('#PageImpressionsByCountryChart')[0], data.chartData.page_impressions_by_country_unique, 'Geo', {
  //                      tooltip: {
    //                        isHtml: true
      //                  }
        //            });

                        }

                        __AC("FBPageInsights");
                        __AC("GraphicalOverview");



                        if(data.status != 200){
                            $("#FBPageInsights").html(noData);
                            $("#GraphicalOverview").html(noData);
                        }


                    }

                });
            }



        });
    </script>

@endsection

<x-app.app-layout title="Overview">
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
                            <span class="text-red"><em class="far fa-id-card"></em> Birthday</span>
                            <br>
                            <label id="fbAccBirthday" class="font-weight-bold"></label>

                        </div>
                        <div class="col">
                            <span class="text-red"><em class="fas fa-users"></em> Friends</span>
                            <br>
                            <label id="fbAccFollowersCount" class="font-weight-bold"></label>
                        </div>
                        <div class="col">
                            <span class="text-red"><em class="fas fa-photo-video"></em> Total Posts</span>
                            <br>
                            <label id="fbAccMediaCount" class="font-weight-bold"></label>
                        </div>
                        <div class="col">
                            <span class="text-red"><em class="far fa-id-card"></em> Gender</span>
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
                                <span class="text-red"><em class="far fa-id-card"></em> About</span>
                                <br>
                                <label id="fbPageAbout" class="font-weight-bold"></label>

                            </div>
                            <div class="col-6 mb-2">
                                <span class="text-red"><em class="fas fa-list-alt"></em> Description</span>
                                <br>
                                <label id="fbPageDescription" class="font-weight-bold"></label>
                            </div>
                            <div class="col-md-3 col-sm-4 col-6 mb-2">
                                <span class="text-red"><em class="fas fa-receipt"></em> Bio</span>
                                <br>
                                <label id="fbPageBio" class="font-weight-bold"></label>

                            </div>
                            <div class="col-md-3 col-sm-4 col-6 mb-2 mb-2">
                                <span class="text-red"><em class="fas fa-pencil-alt"></em> Business Name</span>
                                <br>
                                <label id="fbPageBusiness" class="font-weight-bold"></label>
                            </div>
                            <div class="col-md-3 col-sm-4 mb-2">
                                <span class="text-red"><em class="fas fa-sort-numeric-up"></em> Engagement</span>
                                <br>
                                <label id="fbPageEngagement" class="font-weight-bold"></label>
                                <br>
                                <label id="fbPageEngagementSocial" class="text-muted" style="font-size:12px"></label>

                            </div>
                            <div class="col-md-3 col-sm-4 mb-2">
                                <span class="text-red"><em class="fas fa-users"></em> Followers Count</span>
                                <br>
                                <label id="fbPageFollowers" class="font-weight-bold"></label>

                            </div>
                            <div class="col-md-3 col-sm-4 mb-2">
                                <span class="text-red md-5"><em class="fas fa-check-double"></em> Is Published?</span>
                                <br>
                                <label  id="fbPagePublished"   class="font-weight-bold"></label>
                                <br>
                            </div>
                            <div class="col-md-3 col-sm-4 col-6 mb-2">
                                <span class="text-red"><em class="fas fa-globe-asia"></em> Location</span>
                                <br>
                                <label id="fbPageLocation" class="font-weight-bold"></label>

                            </div>

                            <div class="col-md-3 col-sm-4 col-6 mb-2">
                                <span class="text-red"><em class="fas fa-users"></em> Fan Count</span>
                                <br>
                                <label id="fbPageFans" class="font-weight-bold"></label>

                            </div>

                            <div class="col-md-3 col-sm-4 col-6 mb-2">
                                <span class="text-red"><em class="fas fa-photo-video"></em> Media Count</span>
                                <br>
                                <label id="fbPageMediaCount" class="font-weight-bold"></label>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card shadow" id="FBPageInsights">
            <div class="card-header p-15 ml-3">
                <lable class="h3 m-0">Page Insights</lable>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 col-lg-3">
                        <div class="card shadow" style="border-radius: 8%;">
                            <div class="card-body">
                                <div class="media align-items-center">
                                    <div class="avatar avatar-icon avatar-lg avatar-blue">
                                        <em class="far fa-id-card"></em>
                                    </div>
                                    <div class="m-l-15">
                                        <h6 class="m-b-0">Total Page Actions <sup><em id="fbPageActionsTooltip" class="anticon anticon-question-circle" data-toggle="tooltip" data-placement="top"  title=""></em></sup></h6>
                                        <p class="m-b-0 font-weight-bold" id="fbPageTotalActions"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="card shadow" style="border-radius: 8%;">
                            <div class="card-body">
                                <div class="media align-items-center">
                                    <div class="avatar avatar-icon avatar-lg avatar-blue">
                                        <em class="fas fa-handshake"></em>
                                    </div>
                                    <div class="m-l-15">
                                        <h6 class="m-b-0">Page User Engagements <sup><em id="fbPageEngagedUsersTooltip" class="anticon anticon-question-circle" data-toggle="tooltip" data-placement="top"  title=""></em></sup></h6>
                                        <p class="m-b-0 font-weight-bold" id="fbPageUserEngagement"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="card shadow" style="border-radius: 8%;">
                            <div class="card-body">
                                <div class="media align-items-center">
                                    <div class="avatar avatar-icon avatar-lg avatar-blue">
                                        <em class="fas fa-film"></em>
                                    </div>
                                    <div class="m-l-15">
                                        <h6 class="m-b-0">Page Posts Engagements <sup><em id="fbPagePostEngagedTooltip" class="anticon anticon-question-circle" data-toggle="tooltip" data-placement="top"  title=""></em></sup></h6>
                                        <p class="m-b-0 font-weight-bold" id="fbPagePostsEngagement"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="card shadow" style="border-radius: 8%;">
                            <div class="card-body">
                                <div class="media align-items-center">
                                    <div class="avatar avatar-icon avatar-lg avatar-blue">
                                        <em class="fas fa-chalkboard-teacher"></em>
                                    </div>
                                    <div class="m-l-15">
                                        <h6 class="m-b-0">Page Consumptions <sup><em id="fbPageConsumptionsTooltip" class="anticon anticon-question-circle" data-toggle="tooltip" data-placement="top"  title=""></em></sup></h6>
                                        <p class="m-b-0 font-weight-bold" id="fbPageConsumptions"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="card shadow" style="border-radius: 8%;">
                            <div class="card-body">
                                <div class="media align-items-center">
                                    <div class="avatar avatar-icon avatar-lg avatar-blue">
                                        <em class="fas fa-map-marker-alt"></em>
                                    </div>
                                    <div class="m-l-15">
                                        <h6 class="m-b-0">Total Page Location Checkins <sup><em id="fbPageCheckinTooltip" class="anticon anticon-question-circle" data-toggle="tooltip" data-placement="top"  title=""></em></sup></h6>
                                        <p class="m-b-0 font-weight-bold" id="fbPageCheckin"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="card shadow" style="border-radius: 8%;">
                            <div class="card-body">
                                <div class="media align-items-center">
                                    <div class="avatar avatar-icon avatar-lg avatar-blue">
                                        <em class="fas fa-map-pin"></em>
                                    </div>
                                    <div class="m-l-15">
                                        <h6 class="m-b-0">Total Page Location Checkins (Mobile) <sup><em id="fbPageCheckinMobileTooltip" class="anticon anticon-question-circle" data-toggle="tooltip" data-placement="top"  title=""></em></sup></h6>
                                        <p class="m-b-0 font-weight-bold" id="fbPageCheckinMobile"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="card shadow" style="border-radius: 8%;">
                            <div class="card-body">
                                <div class="media align-items-center">
                                    <div class="avatar avatar-icon avatar-lg avatar-blue">
                                        <em class="fas fa-user-minus"></em>
                                    </div>
                                    <div class="m-l-15">
                                        <h6 class="m-b-0">Total Negative Page Feedbacks <sup><em id="fbPageNegetiveFeedbacksTooltip" class="anticon anticon-question-circle" data-toggle="tooltip" data-placement="top"  title=""></em></sup></h6>
                                        <p class="m-b-0 font-weight-bold" id="fbPageNegetiveFeedbacks"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="card shadow" style="border-radius: 8%;">
                            <div class="card-body">
                                <div class="media align-items-center">
                                    <div class="avatar avatar-icon avatar-lg avatar-blue">
                                        <em class="fas fa-shoe-prints"></em>
                                    </div>
                                    <div class="m-l-15">
                                        <h6 class="m-b-0">Total Page Impressions <sup><em id="fbPageImpressionsTooltip" class="anticon anticon-question-circle" data-toggle="tooltip" data-placement="top"  title=""></em></sup></h6>
                                        <p class="m-b-0 font-weight-bold" id="fbPageImpressions"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="card shadow" style="border-radius: 8%;">
                            <div class="card-body">
                                <div class="media align-items-center">
                                    <div class="avatar avatar-icon avatar-lg avatar-blue">
                                        <em class="fas fa-share-alt"></em>
                                    </div>
                                    <div class="m-l-15">
                                        <h6 class="m-b-0">Page Impressions by going viral <sup><em id="fbPageImpressionsViralTooltip" class="anticon anticon-question-circle" data-toggle="tooltip" data-placement="top"  title=""></em></sup></h6>
                                        <p class="m-b-0 font-weight-bold" id="fbPageImpressionsViral"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="card shadow" style="border-radius: 8%;">
                            <div class="card-body">
                                <div class="media align-items-center">
                                    <div class="avatar avatar-icon avatar-lg avatar-blue">
                                        <em class="fas fa-thumbs-up"></em>
                                    </div>
                                    <div class="m-l-15">
                                        <h6 class="m-b-0">Page Impressions without going viral <sup><em id="fbPageImpressionsNonViralTooltip" class="anticon anticon-question-circle" data-toggle="tooltip" data-placement="top"  title=""></em></sup></h4>
                                        <p class="m-b-0 font-weight-bold" id="fbPageImpressionsNonViral"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="card shadow" style="border-radius: 8%;">
                            <div class="card-body">
                                <div class="media align-items-center">
                                    <div class="avatar avatar-icon avatar-lg avatar-blue">
                                        <em class="far fa-file-image"></em>
                                    </div>
                                    <div class="m-l-15">
                                        <h6 class="m-b-0">Page Post Impressions <sup><em id="fbPagePostsImpressionsTooltip" class="anticon anticon-question-circle" data-toggle="tooltip" data-placement="top"  title=""></em></sup></h6>
                                        <p class="m-b-0 font-weight-bold" id="fbPagePostsImpressions"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="card shadow" style="border-radius: 8%;">
                            <div class="card-body">
                                <div class="media align-items-center">
                                    <div class="avatar avatar-icon avatar-lg avatar-blue">
                                        <em class="fas fa-thumbs-up"></em>
                                    </div>
                                    <div class="m-l-15">
                                        <h6 class="m-b-0">Page Posts Impressions without going viral <sup><em id="fbPagePostImpressionsNonViralTooltip" class="anticon anticon-question-circle" data-toggle="tooltip" data-placement="top"  title=""></em></sup></h6>
                                        <p class="m-b-0 font-weight-bold" id="fbPagePostsImpressionsNonViral"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="card shadow" style="border-radius: 8%;">
                            <div class="card-body">
                                <div class="media align-items-center">
                                    <div class="avatar avatar-icon avatar-lg avatar-blue">
                                        <em class="fas fa-users"></em>
                                    </div>
                                    <div class="m-l-15">
                                        <h6 class="m-b-0">Page Fans Net <sup><em id="fbPageFansTooltip" class="anticon anticon-question-circle" data-toggle="tooltip" data-placement="top"  title=""></em></sup></h6>
                                        <span class="m-b-0 font-weight-bold" id="fbPageFansInsights"></span><em id="fansGrowthIcon"></em>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="card shadow" style="border-radius: 8%;">
                            <div class="card-body">
                                <div class="media align-items-center">
                                    <div class="avatar avatar-icon avatar-lg avatar-blue">
                                        <em class="fas fa-video"></em>
                                    </div>
                                    <div class="m-l-15">
                                        <h6 class="m-b-0">Page Video Views <sup><em id="fbPageVideoViewsTooltip" class="anticon anticon-question-circle" data-toggle="tooltip" data-placement="top"  title=""></em></sup></h6>
                                        <p class="m-b-0 font-weight-bold" id="fbPageVideoViews"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="card shadow" style="border-radius: 8%;">
                            <div class="card-body">
                                <div class="media align-items-center">
                                    <div class="avatar avatar-icon avatar-lg avatar-blue">
                                        <em class="fas fa-file-video"></em>
                                    </div>
                                    <div class="m-l-15">
                                        <h6 class="m-b-0">Page Complete 30 Sec Video Views <sup><em id="fbPageCompleteVideoViews30secTooltip" class="anticon anticon-question-circle" data-toggle="tooltip" data-placement="top"  title=""></em></sup></h6>
                                        <p class="m-b-0 font-weight-bold" id="fbPageCompleteVideoViews30sec"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="card shadow" style="border-radius: 8%;">
                            <div class="card-body">
                                <div class="media align-items-center">
                                    <div class="avatar avatar-icon avatar-lg avatar-blue">
                                        <em class="fas fa-file-video"></em>
                                    </div>
                                    <div class="m-l-15">
                                        <h6 class="m-b-0">Page Complete 10 Sec Video Views <sup><em id="fbPageVideoViews10secTooltip" class="anticon anticon-question-circle" data-toggle="tooltip" data-placement="top"  title=""></em></sup></h6>
                                        <p class="m-b-0 font-weight-bold" id="fbPageVideoViews10sec"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="card shadow" style="border-radius: 8%;">
                            <div class="card-body">
                                <div class="media align-items-center">
                                    <div class="avatar avatar-icon avatar-lg avatar-blue">
                                        <em class="fas fa-user-plus"></em>
                                    </div>
                                    <div class="m-l-15">
                                        <h6 class="m-b-0">Total Page Views <sup><em id="fbTotalPageViewsTooltip" class="anticon anticon-question-circle" data-toggle="tooltip" data-placement="top"  title=""></em></sup></h6>
                                        <p class="m-b-0 font-weight-bold" id="fbTotalPageViews"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="card shadow" style="border-radius: 8%;">
                            <div class="card-body">
                                <div class="media align-items-center">
                                    <div class="avatar avatar-icon avatar-lg avatar-blue">
                                        <em class="fas fa-columns"></em>
                                    </div>
                                    <div class="m-l-15">
                                        <h6 class="m-b-0">Page Content Activity <sup><em id="fbPageContentActivityTooltip" class="anticon anticon-question-circle" data-toggle="tooltip" data-placement="top"  title=""></em></sup></h6>
                                        <p class="m-b-0 font-weight-bold" id="fbPageContentActivity"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card shadow" id="GraphicalOverview">
            <div class="card-header p-15 ml-3">
                <label class="h3 m-0">Graphical Overview</label>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <label for="PageImpressionsByCountryChart" class="font-weight-bold" >Page Impressions by Country </label><em class="anticon anticon-question-circle ml-2" id="PageImpressionsByCountryChartTooltip" data-placement="top" data-toggle="tooltip" title=""></em>
                        <div id="PageImpressionsByCountryChart" class="w-100 mt-3" style="height: 400px"></div>
                        <hr/>
                    </div>
                    <div class="col-md-10">
                        <label for="PageImpressionsByLocaleChart" class="font-weight-bold" >Page Impressions by Locale </label><em class="anticon anticon-question-circle ml-2" id="PageImpressionsByLocaleChartTooltip" data-placement="top" data-toggle="tooltip" title=""></em>
                        <div id="PageImpressionsByLocaleChart" class="w-100 mt-3" style="height: 400px"></div>
                        <div id="PageImpressionsByCountryChart" class="w-100 mt-3" style="height: 400px"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app.app-layout>
