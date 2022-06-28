@section('path-navigation')
<a class="breadcrumb-item" href="#">Posts</a>
<span class="breadcrumb-item active">Post Management</span>
@endsection

@section('custom-scripts')
<script>
    $(document).ready(function() {
        var selected_post_type = 0;
        var enabled_platforms_profile;
        var platforms = ['instagram', 'facebook', 'linkedin', 'twitter', 'youtube', 'pintrest'];

        $(".tagsSelection").select2('destroy').val("");
        $(".tagsSelection").select2({
            tags: true,
            tokenSeparators: [',', ' '],
            minimumInputLength: 2,
            maximumInputLength: 255,
            multiple: true,
            placeholder: 'Enter your tags or select tags from suggestions',
            initSelection: function(element, callback) {},
            ajax: {
                url: "{{ route('tag.suggest') }}",
                type: 'POST',
                dataType: 'json',
                delay: 250,
                data: function(data) {
                    return {
                        '_token': '{{ csrf_token() }}',
                        'search': data ?? ''
                    };
                },
                processResults: function(response) {
                    return {
                        results: $.map(response, function(item) {
                            return {
                                id: item.tag,
                                text: item.tag
                            }
                        })
                    };
                },
                cache: false
            }
        }).on('change', function(e) {
            $.ajax({
                url: "{{ route('tag.add') }}",
                type: 'POST',
                dataType: 'json',
                data: {
                    '_token': '{{ csrf_token() }}',
                    'tag': e.added.text
                },
                processResults: function(response) {
                    return {
                        results: $.map(response, function(item) {
                            return {
                                id: item._id,
                                text: item.tag
                            }
                        })
                    };
                }
            });
        });

        $('#datetimepicker1').datetimepicker();
        $('.js-example-basic-single').select2();

        $('#profile_select').change(function() {
            var selected_profile = $('#profile_select').find(':selected').val();
            $.ajax({
                data: {
                    _token: '{{ csrf_token() }}',
                    profile_key: selected_profile,
                },
                dataType: 'json',
                success: function(response) {
                    enabled_platforms_profile = response;
                    checkEnabledPlatforms();
                }
            });
        });

        $('.post_type').on('change', function() {
            selected_post_type = $(this).val();
            checkEnabledPlatforms();
        });

        $('#cbyoutube').on('change', function() {
            if ($('#cbyoutube').is(":checked")) {
                $("#yt_title").css('display', 'block');
            } else {
                $("#yt_title").css('display', 'none');
            }
        })

        function checkEnabledPlatforms() {
            let selecteable_platforms = [];

            //( 0 = Images, 1 = Video )media type supported platforms
            if (selected_post_type == 0) {
                selecteable_platforms = ['instagram', 'facebook', 'linkedin', 'twitter', 'pintrest'];
            } else if (selected_post_type == 1) {
                selecteable_platforms = ['instagram', 'facebook', 'linkedin', 'youtube', 'twitter'];
            }

            let data = enabled_platforms_profile;
            if (data.length > 0) {
                platforms.forEach(platform => {
                    if (data.includes(platform) && selecteable_platforms.includes(platform)) {
                        $('#cb' + platform).removeAttr('disabled');
                    } else {
                        $('#cb' + platform).prop('checked', false);
                        $('#cb' + platform).trigger('change');
                        $('#cb' + platform).attr('disabled', true);
                    }
                });
            } else {
                platforms.forEach(platform => {
                    $('#cb' + platform).attr('disabled', true);
                });
            }
        }

    });
</script>
@endsection

<x-app.app-layout title="Post Scheduler">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header p-15 ml-3 w-500">
                <h4 class="h3 m-0">{{ __('Post Details') }}</h4>
                <span>To know more about platform requirements <a href="" data-toggle="modal" data-target="#postStandards">click here</a>.</span>
            </div>
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data" action="{{ route('panel.user.post.upload_media') }}">
                    @csrf

                    @if(session()->get('message2'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success:</strong> {{ session()->get('message2') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @elseif(session()->get('validation_error'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Warning:</strong> {{ session()->get('validation_error') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif

                    <div class="form-group col-12">
                        <select id="profile_select" name="profile_select" class="form-control col-12 js-example-disabled-results">
                            <option selected disabled="disabled"> Please Select Profile To Post </option>
                            @foreach($userProfiles as $key => $profiles)
                            <option value="{{ encrypt($profiles['profile_key']) }}">{{ $profiles['title'] }}</option>
                            @endforeach
                        </select>
                        @error('profile_select')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group col-12">
                        <div>
                            <label class="font-weight-semibold">{{ __('Select media type to upload') }}:<sup>*</sup></label>
                        </div>
                        <div class="form-check-inline">
                            <input class="form-check-input post_type" type="radio" name="post_type" id="post_type_image" value="0" checked>
                            <label class="form-check-label" for="post_type_image">
                                Image
                            </label>
                        </div>
                        <div class="form-check-inline">
                            <input class="form-check-input post_type" type="radio" name="post_type" id="post_type_video" value="1">
                            <label class="form-check-label" for="post_type_video">
                                Video
                            </label>
                        </div>
                    </div>

                    <div class="form-group col-12">
                        <label class="font-weight-semibold" for="platfromSelection">{{ __('Select Social Media Platform(s)') }}:<sup>*</sup></label>
                        <div class="checkbox row">
                            <div class="col-md-2">
                                <input id="cbinstagram" name="platform[]" value="{{ App\Helper\TokenHelper::$PLATFORMS['instagram'] }}" disabled type="checkbox">
                                <label for="cbinstagram">Instagram</label>
                            </div>
                            <div class="col-md-2">
                                <input id="cbyoutube" name="platform[]" value="{{ App\Helper\TokenHelper::$PLATFORMS['youtube'] }}" disabled type="checkbox">
                                <label for="cbyoutube">YouTube</label>&nbsp;<sup><em class="anticon anticon-info-circle" data-toggle="tooltip" data-placement="right"  title="Default visibility of video uploaded to YouTube is Private."></em></sup>
                            </div>

                            <div class="col-md-2">
                                <input id="cbfacebook" name="platform[]" value="{{ App\Helper\TokenHelper::$PLATFORMS['facebook'] }}" disabled type="checkbox">
                                <label for="cbfacebook">Facebook</label>
                            </div>

                            <div class="col-md-2">
                                <input id="cbtwitter" name="platform[]" value="{{ App\Helper\TokenHelper::$PLATFORMS['twitter'] }}" disabled type="checkbox">
                                <label for="cbtwitter">Twitter</label>
                            </div>

                            <div class="col-md-2">
                                <input id="cblinkedin" name="platform[]" value="{{ App\Helper\TokenHelper::$PLATFORMS['linkedin'] }}" disabled type="checkbox">
                                <label for="cblinkedin">linkedIn</label>
                            </div>

                            <div class="col-md-2">
                                <input id="cbpintrest" name="platform[]" value="{{ App\Helper\TokenHelper::$PLATFORMS['pintrest'] }}" disabled type="checkbox">
                                <label for="cbpintrest">Pintrest</label>
                            </div>
                        </div>
                        @error('platform')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group col-12">
                        <label class="font-weight-semibold" for="caption">{{ __('Caption / Description') }}:<sup>*</sup></label>
                        <input type="text" class="form-control" id="caption" name="caption" placeholder="Enter a caption / Description here..">
                        @error('caption')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group col-12" id="yt_title" style="display: none;">
                        <label class="font-weight-semibold" for="yt_title">{{ __('Youtube Title') }}:<sup>*</sup></label>
                        <input type="text" class="form-control" max="100" id="yt_title" name="yt_title" placeholder="Enter Youtube title here">
                    </div>

                    <div class="form-group col-12">
                        <label class="font-weight-semibold" for="mention">{{ __('Mention Users') }}:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">@</span>
                            </div>
                            <input type="text" class="form-control" id="mention" name="mention" placeholder="Enter Username to mention seperated by ',' comma " />
                        </div>
                        @error('mention')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group col-12">
                        <label class="font-weight-semibold" for="tags">{{ __('Tags') }}:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">#</span>
                            </div>
                            <input type="text" class="tagsSelection" style="flex : 1 1 auto; border: 0px;" id="tags" name="tags" />
                        </div>
                        @error('tags')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group col-12">
                        <label class="font-weight-semibold" for="scheduled_at">{{ __('Schedule Post') }}:</label><sup><em class="anticon anticon-info-circle" data-toggle="tooltip" data-placement="right"  title="Currently we are supporting UTC time zone. Please check the timezones before scheduling."></em></sup>
                        <input type="datetime-local" class="form-control" id="scheduled_at" name="scheduled_at" placeholder="Select Date & Time">
                        @error('scheduled_at')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group col-12">
                        <label class="font-weight-semibold" for="posted_by">{{ __('Posted By') }}:<sup>*</sup></label>
                        <input type="text" class="form-control" id="posted_by" name="posted_by" placeholder="Enter Your Full Name">
                        @error('posted_by')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group col-12">
                        <h5 class="m-b-5 font-size-18">{{ __('Choose Post Media') }}</h5>
                        <p class="opacity-07 font-size-13 m-b-0 media">
                            <input id="post_media" name="post_media" type="file" class="hidden" accept="image/*, video/*">
                            <a href="" data-toggle="modal" data-target="#postStandards" class="mr-1">Click here</a>to check the recommended size.
                        </p>
                        @error('post_media')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group col-12">
                        <button id="btnUploadPostMedia" class="btn btn-tone btn-lg btn-primary btn-block">{{ __('Upload') }}</button>
                    </div>

                </form>

            </div>
        </div>
    </div>

    <div class="modal fade bd-example-modal-xl" id="postStandards" tabindex="-1" role="dialog" aria-labelledby="addAccountModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-xl modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Media Standards</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-borderless" data-toggle="table">
                            <caption></caption>
                            <thead>
                                <tr>
                                    <th scope="col" rowspan="2">#</th>
                                    <th scope="col" rowspan="2" data-field="Platform">Platform</th>
                                    <th scope="col" rowspan="2" data-field="supported_type">Supported Media Type</th>
                                    <th scope="col" colspan="2">Max Size & Aspect Ratio</th>
                                </tr>
                                <tr>
                                    <th scope="col" data-field="images_size">Image</th>
                                    <th scope="col" data-field="video_size">Video</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Facebook</td>
                                    <td>JPG,BMP,PNG,GIF,TIFF,MP4,MOV,AVI</td>
                                    <td>10 MB / 1:1</td>
                                    <td>3 GB / 16:9 / 9:16</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Instagram</td>
                                    <td>JPG,PNG,MP4,MOV</td>
                                    <td>8 MB / 4:5 to 1.91:1 range</td>
                                    <td>100 MB / 4:5 / 16:9</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>LinkedIn</td>
                                    <td>JPG,PNG,GIF,ASF,AVI,FLV,MP4,MOV,MKV,WEBM</td>
                                    <td>5 MB</td>
                                    <td>10 GB / 1:2.4 & 2.4:1</td>
                                </tr>
                                <tr>
                                    <th scope="row">4</th>
                                    <td>Twitter</td>
                                    <td>JPG,PNG,GIF,WEBP,MP4,MOV</td>
                                    <td>5 MB / 16:9</td>
                                    <td>512 MB / 1:3 & 3:1</td>
                                </tr>
                                <tr>
                                    <th scope="row">5</th>
                                    <td>YouTube</td>
                                    <td>MP4,MOV</td>
                                    <td>N/A</td>
                                    <td>5 GB / 16:9</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app.app-layout>