@section('path-navigation')
<li class="breadcrumb-item" aria-current="page"><a href="{{ route('admin.blogs.index') }}">Blog</a></li>
<li class="breadcrumb-item active">Post</li>
<li class="breadcrumb-item active" aria-current="page">Create</li>
@endsection

@section('custom-scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.5.0/highlight.min.js"></script>
<script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>

<script>
    $(document).ready(function() {
        var toolbarOptions = [
            ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
            ['blockquote', 'code-block'],

            [{ 'header': 1 }, { 'header': 2 }],               // custom button values
            [{ 'list': 'ordered'}, { 'list': 'bullet' }],
            [{ 'script': 'sub'}, { 'script': 'super' }],      // superscript/subscript
            [{ 'indent': '-1'}, { 'indent': '+1' }],          // outdent/indent
            [{ 'direction': 'rtl' }],                         // text direction

            [{ 'size': ['small', false, 'large', 'huge'] }],  // custom dropdown
            [{ 'header': [1, 2, 3, 4, 5, 6, false] }],

            [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme
            [{ 'font': [] }],
            [{ 'align': [] }],

            ['clean']                                         // remove formatting button
        ];

        var blogDescriptionEditor = new Quill('#blogDescriptionEditor', {
            modules: {
                syntax: true, // Include syntax module
                toolbar: toolbarOptions
            },
            theme: 'snow',
        });

        var blogHtmlPageEditor = new Quill('#blogHtmlPageEditor', {
            modules: {
                syntax: true, // Include syntax module
                toolbar: toolbarOptions
            },
            theme: 'snow',
        });

        $('#blog-form').submit(function () {
            $('#blogDescriptionTextArea').html(blogDescriptionEditor.root.innerHTML);
            $('#blogHtmlPageTextArea').html(blogHtmlPageEditor.root.innerHTML);
        });

        $("#poster").change(function(e) {
            showImagePreview(this, "#showPosterPreview");
        });
    });
</script>

@endsection

@section('custom-styles')
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.5.0/styles/default.min.css">
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
@endsection

<x-admin.app-layout title="Blogs">
    <form id="blog-form" class="ajax-form" method="POST" enctype="multipart/form-data" action="{{ route('admin.blogs.store') }}" reset=true>
        @csrf
        <div class="col-md-12">
            <div class="card border-top border-0 border-4 border-primary">
                <div class="card-body p-5">
                    <div class="card-title d-flex align-items-center">
                        <div class="d-flex align-items-center w-100">
                            <em class="bi bi-person me-2 font-22 text-primary"></em>
                            <h5 class="mb-0 text-primary">{{ __('Create Blog') }}</h5>
                        </div>
                        <div class="d-flex align-items-center flex-shrink-1 pointer" onclick="$(this).closest('form').submit();">
                            <em class="bi bi-plus-circle me-2 font-22 text-primary"></em>
                            <strong>Create</strong>
                        </div>
                    </div>
                    <hr>
                    <div class="row g-3">
                        <div class="col-md-12">
                            <label class="form-label font-weight-semibold required" for="title">{{ __('Title') }}</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Blog Title" required>
                            @error('title')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label class="form-label font-weight-semibold required" for="blogDescriptionEditor">{{ __('Short Description') }}</label>
                            <textarea id="blogDescriptionTextArea" name="blogDescription" class="form-control hide"></textarea>
                            <div class="w-100">
                                <div id="blogDescriptionEditor"></div>
                            </div>
                            @error('blogDescription')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label class="form-label font-weight-semibold required" for="blogHtmlPageEditor">{{ __('Long Description') }}</label>
                            <textarea id="blogHtmlPageTextArea" name="blogHtmlPage" class="form-control hide"></textarea>
                            <div class="w-100">
                                <div id="blogHtmlPageEditor"></div>
                            </div>
                            @error('blogHtmlPage')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label class="form-label font-weight-semibold required" for="name">{{ __('Cover Image') }}</label>
                            <input type="file" class="form-control" id="poster" name="poster" placeholder="Cover Page" required>
                            @error('poster')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <div class="w-100 text-center mt-3">
                                <img id="showPosterPreview" alt="" width="100%" height="auto">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</x-admin.app-layout>