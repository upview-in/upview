<x-app-layout title="Post Scheduling">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title font-size-20">{{ __('Post Details') }}</h4>
            </div>
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data" action="{{ route('panel.user.uploading_post_media') }}">
                    @if(session()->get('message2'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success:</strong> {{ session()->get('message2') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif

                    @csrf

                    <div class="form-group col-md-8">
                        <label class="font-weight-semibold" for="platfromSelection">{{ __('Select Social Media Platform(s)') }}:</label>
                        <div class="checkbox row">
                            <div class="col-md-2">
                                <input id="cbinstagram" name="cbinstagram" type="checkbox">
                                <label for="cbinstagram">Instagram</label>
                            </div>
                            
                            <div class="col-md-2">
                                <input id="cbyoutube" name="cbyoutube" type="checkbox">
                                <label for="cbyoutube">Youtube</label>
                            </div>

                            <div class="col-md-2">
                                <input id="cbfacebook" name="cbfacebook" type="checkbox">
                                <label for="cbfacebook">Facebook</label>
                            </div>

                            <div class="col-md-2">
                                <input id="cbtwitter" name="cbtwitter" type="checkbox">
                                <label for="cbtwitter">Twitter</label>
                            </div>

                            <div class="col-md-2">
                                <input id="cblinkdin" name="cblinkdin" type="checkbox">
                                <label for="cblinkdin">linkdIn</label>
                            </div>

                            <div class="col-md-2">
                                <input id="cbpintrest" name="cbpintrest" type="checkbox">
                                <label for="cbpintrest">Pintrest</label>
                            </div>

                        </div>
                    </div>

                    <div class="form-group col-md-8">
                        <label class="font-weight-semibold" for="caption">{{ __('Caption') }}:</label>
                        <input type="text" class="form-control" id="caption" name="caption" placeholder="Enter a caption here..">
                    </div>
                    @error('caption')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                    <div class="form-group col-md-8">
                        <label class="font-weight-semibold" for="mention">{{ __('Mention Users') }}:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">@</span>
                            </div>
                            <input type="text" class="form-control" id="mention" name="mention" placeholder="Enter Username to mention seperated by ',' comma " />
                        </div>
                    </div>
                    @error('mention')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                    <div class="form-group col-md-8">
                        <label class="font-weight-semibold" for="tags">{{ __('Tags') }}:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">#</span>
                            </div>
                            <input type="text" class="form-control" id="tags" name="tags" placeholder="Enter Tags seperated by ',' comma" />
                        </div>
                    </div>
                    @error('tags')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                    <div class="form-group media align-items-center">

                        <input id="post_media" name="post_media" type="file" class="hidden" accept="image/png, image/jpeg, image/jpg">

                        <div class="m-l-20 m-r-20">
                            <h5 class="m-b-5 font-size-18">{{ __('Choose Post Image') }}</h5>
                            <p class="opacity-07 font-size-13 m-b-0">
                                {{ __('Recommended Resolution') }}: 1080 x 1350p<br>
                                Our system will automatically manage resolutions for Facebook & Instagram.
                                Max file size: 6MB
                            </p>
                        </div>
                        <div>
                            <button id="btnUploadPostMedia" class="btn btn-tone btn-primary">{{ __('Upload') }}</button>
                        </div>
                    </div>
                    @error('post_media')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                </form>

            </div>
        </div>
    </div>
</x-app-layout>
<script>
    $(function () {
        $('#datetimepicker1').datetimepicker();
    });
</script>
