<script src="{{ URL::asset('/assets/js/frontend.header.js') }}"></script>
<header>
    <!-- Header Start -->
    <div class="header-area header-transparrent">
        <div class="headder-top header-sticky">
            <div class="container">
                <div class="row ">
                    <div class="col-lg-3 col-md-2">
                        <!-- Logo -->
                        <div class="logo mt-2">
                            <a href="{{ url('/') }}"><img src="{{ asset('assets/img/logo/skadoosh.png') }}" alt="skadoosh" width="300"></a>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-9 d-flex justify-content-between mt-3">
                            <div class="f-left nav_visible">
                                <a href="{{ url('') }}" class="nav_login_credential">Find Talent</a>
                                <a href="{{ url('') }}" class="nav_login_credential">Find Work</a>
                            </div>
    
                            <div class="f-right">
                                <a href="{{ url('/nx/login') }}" class="nav_login_credential">Log In</a>
                                <a href="{{ url('/nx/signup') }}" class="nav_signup_credential">Sign Up</a>
                            </div>
                    </div>
                    <!-- Mobile Menu -->
                    <div class="col-12">
                        <div class="mobile_menu d-block d-lg-none"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
</header>
