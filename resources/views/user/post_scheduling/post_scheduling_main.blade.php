<x-app-layout title="Post Scheduling">
    <div class="container-fluid">
        <div class="card">
            <div class="row">
                <div class="col-md-6 col-sm-9 col-12">
                    <div class="input-affix m-b-10">
                        <div class="container-fluid">
                            <div class="card shadow" id="PostUploadForm">
                                <div class="container-fluid">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">{{ __('Post Details') }}</h4>
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
                                                <div class="media align-items-center">

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

                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label class="font-weight-semibold" for="caption">{{ __('Caption') }}:</label>
                                                        <input type="text" class="form-control" id="caption" name="caption" placeholder="Enter a caption here.." value="{{ old('caption') }}">
                                                        @error('caption')
                                                        <span class="invalid-feedback d-block" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror

                                                        <div class="container">
                                                            <div class="row">
                                                               <div class='col-sm-6'>
                                                                  <div class="form-group">
                                                                     <div class='input-group date' id='datetimepicker1'>
                                                                        <input type='text' class="form-control" />
                                                                        <span class="input-group-addon">
                                                                        <span class="fas fa-calendar-week"></span>
                                                                        </span>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                         </div>

                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        @error('email')
                                                        <span class="invalid-feedback d-block" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </form>

                            </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>



<script>
    $(function () {
        $('#datetimepicker1').datetimepicker();
    });
 </script>
