@section('path-navigation')
<li class="breadcrumb-item" aria-current="page"><a href="{{ route('admin.blog.list') }}">Blog</a></li>
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

        var shortDescriptionEditor = new Quill('#shortDescriptionEditor', {
            modules: {
                syntax: true, // Include syntax module
                toolbar: toolbarOptions
            },
            theme: 'snow',
        });

        var longDescriptionEditor = new Quill('#longDescriptionEditor', {
            modules: {
                syntax: true, // Include syntax module
                toolbar: toolbarOptions
            },
            theme: 'snow',
        });
    });
</script>

@endsection

@section('custom-styles')
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.5.0/styles/default.min.css">
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
@endsection

<x-admin.app-layout title="Blogs">
    <form class="ajax-form" method="POST" enctype="multipart/form-data" action="">
        <div class="col-md-12">

            <div class="card border-top border-0 border-4 border-primary">
                <div class="card-body p-5">
                    <div class="card-title d-flex align-items-center">
                        <div class="d-flex align-items-center w-100">
                            <em class="bi bi-person me-2 font-22 text-primary"></em>
                            <h5 class="mb-0 text-primary">{{ __('Basic') }}</h5>
                        </div>
                    </div>
                    <hr>
                    <div class="row g-3">
                        <div class="col-md-12 col-sm-6 col-12">
                            <label class="form-label font-weight-semibold required" for="name">{{ __('Title') }}</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Blog Title" required>
                            @error('title')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label class="form-label font-weight-semibold required" for="shortDescriptionEditor">{{ __('Short blog description') }}</label>
                            <textarea id="shortDescriptionTextArea" name="shortDescription" class="form-control hide"></textarea>
                            <div class="w-100">
                                <div id="shortDescriptionEditor"></div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label font-weight-semibold required" for="longDescriptionEditor">{{ __('Long blog description') }}</label>
                            <textarea id="longDescriptionEditorTextArea" name="longDescription" class="form-control hide"></textarea>
                            <div class="w-100">
                                <div id="longDescriptionEditor"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

</x-admin.app-layout>