@section('custom-styles')
    <style>
        #social_listing_iframe {
            display: none;
            position:absolute;
            top:0;
            left: 0;
        }

        .loading-screen {
            position: fixed;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            margin: auto;
        }

        .loading-screen #social_listing_img {
            width: 300px;
            height: auto;
        }
    </style>
@endsection

@section('custom-scripts')
    <script>
        $(document).ready(function() {
            $("#social_listing_iframe").ready(function () {
                setTimeout(function() {
                    $(".loading-screen").css('display', 'none');
                    $("#social_listing_iframe").css('display', 'block');
                }, 3000);
            });
        });
    </script>
@endsection

<x-app.guest-layout title="Social Listening">
    <div class="loading-screen d-flex flex-column justify-content-center align-items-center">
        <img src="{{ asset('images/logo/named_logo.svg') }}" id="social_listing_img" alt="logo">
        <div class="spinner-border" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <iframe src="{{ route('panel.user.load', $hash) }}" height="100%" width="100%" id="social_listing_iframe" allowfullscreen="" title="Upview | Social Listening"></iframe>
</x-app.guest-layout>