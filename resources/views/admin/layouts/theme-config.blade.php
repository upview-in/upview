<!--start switcher-->
<div class="switcher-wrapper">
    <div class="switcher-btn"> <i class='bx bx-cog bx-spin'></i>
    </div>
    <div class="switcher-body">
        <div class="d-flex align-items-center">
            <h5 class="mb-0 text-uppercase">Theme Customizer</h5>
            <button type="button" class="btn-close ms-auto close-switcher" aria-label="Close"></button>
        </div>
        <hr />
        <h6 class="mb-0">Theme Styles</h6>
        <hr />
        <div class="d-flex align-items-center justify-content-between">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="flexRadioDefault" id="lightmode" checked>
                <label class="form-check-label" for="lightmode">Light</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="flexRadioDefault" id="darkmode">
                <label class="form-check-label" for="darkmode">Dark</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="flexRadioDefault" id="semidark">
                <label class="form-check-label" for="semidark">Semi Dark</label>
            </div>
        </div>
        <hr />
        <div class="form-check">
            <input class="form-check-input" type="radio" id="minimaltheme" name="flexRadioDefault">
            <label class="form-check-label" for="minimaltheme">Minimal Theme</label>
        </div>
        <hr />
        <h6 class="mb-0">Header Colors</h6>
        <hr />
        <div class="header-colors-indigators">
            <div class="row row-cols-auto g-3">
                @for($i = 1; $i <= 8; $i++) <div class="col">
                    <div class="indigator headercolor{{ $i }}" id="headercolor{{ $i }}"></div>
            </div>
            @endfor
        </div>
    </div>
    <hr />
    <h6 class="mb-0">Sidebar Colors</h6>
    <hr />
    <div class="header-colors-indigators">
        <div class="row row-cols-auto g-3">
            @for($i = 1; $i <= 8; $i++) <div class="col">
                <div class="indigator sidebarcolor{{ $i }}" id="sidebarcolor{{ $i }}"></div>
        </div>
        @endfor
    </div>
</div>
<hr />
<button type="button" class="btn btn-warning px-5" id="resetThemeConfig">Reset</button>
</div>
</div>
<!--end switcher-->