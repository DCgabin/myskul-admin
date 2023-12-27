<div class="container-fluid page-body-wrapper full-page-wrapper">
    <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
            <div class="col-lg-4 mx-auto">
                <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                    <div class="brand-logo">
                        <img src="/assets/images/logo.png" alt="logo">
                    </div>
                    <h4>{{ $title }}</h4>
                    <h6 class="font-weight-light">{{ $subtitle }}</h6>
                    {{ $slot }}
                </div>
            </div>
        </div>
    </div>
</div>

