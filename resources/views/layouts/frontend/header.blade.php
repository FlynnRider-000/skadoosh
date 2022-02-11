<script>
    var menu = $('ul#navigation');
    if(menu.length){
      menu.slicknav({
        prependTo: ".mobile_menu",
        closedSymbol: '+',
        openedSymbol:'-'
      });
    };
</script>
<header>
    <!-- Header Start -->
    <div class="header-area header-transparrent">
        <div class="headder-top header-sticky">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-2">
                        <!-- Logo -->
                        <div class="logo mt-2">
                            <a href="{{ url('/') }}"><img src="{{ asset('assets/img/logo/skadoosh.png') }}" alt="skadoosh" width="300"></a>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-9">
                        <div class="menu-wrapper">
                            <!-- Main-menu -->
                            <div class="main-menu">
                                <nav class="d-none d-lg-block">
                                    <ul id="navigation">
										<li class="d-none d-sm-block">
                                            <div class="dropdown header_dropdown">
                                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fa fa-search"></i>
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <form action="{{url('search-job')}}" method="get">
                                                        <input type="text" name="q" class="form-control" value="{{request('q')}}" placeholder="Search Here...">
                                                    </form>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="d-block d-sm-none">
                                            <a href="{{ url('/post-a-job') }}" class="btn nav_top_btn">Post a Job</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                            <!-- Header-btn -->
                            <div class="header-btn d-none f-right d-lg-block">
                                <a href="{{ url('/post-a-job') }}" class="btn nav_top_btn">Post a Job</a>
                                <div class="popover__wrapper mt-0">
                                    <a href="#">
                                        <h2 class="btn btn-locations mb-0"><i class="fa fa-globe"></i> Locations <i class="fa fa-caret-down"></i></h2>
                                    </a>
                                    <div class="popover__content locations">
                                        <div class="w-100">
                                            @foreach($cities as $city)
                                                <p><a class="text-black text-left text-nowrap text-capitalize" href="{{ route('show.jobs.by.city', ['city'=> \Str::of($city)->kebab()]) }}">{{ $city }}</a></p>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
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
