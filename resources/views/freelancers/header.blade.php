<script src="{{ URL::asset('/assets/js/frontend.header.js') }}"></script>
<link href="{{ URL::asset('/admin_assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />

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
                                <a href="{{ url('') }}" class="nav_login_credential">Find Work</a>
                            </div>
                            <div class="dropdown">
                                <button class="drondowncss" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img class="rounded-circle header-profile-user" src="{{ isset(Auth::user()->avatar) ? asset(Auth::user()->avatar) : asset('/admin_assets/images/users/avatar-1.jpg') }}"
                                            alt="Header Avatar">
                                    <span class="d-none d-xl-inline-block ms-1" key="t-henry">{{ucfirst(Auth::user()->name)}}</span>
                                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item text-danger" href="javascript:void();" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i> <span key="t-logout">@lang('translation.Logout')</span></a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
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
