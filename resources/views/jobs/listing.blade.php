
@extends('layouts.frontend.app')

@section('content')


<!-- Job List Area Start -->
<div class="job-listing-area jbdet">
    <div class="container main-bg jbdet">
        <!-- Section Tittle -->
        <div class="row">
            <div class="col-lg-12">
                <div class="wrap-inner fg">
				    <h1 class="text-capitalize h2">Animation, VFX, & Gaming Jobs {{ isset($city) ? 'in '.$city : '' }}</h1>
				    <p>{{ $jobs->total() }} open roles.</p>
                </div>
            </div>
            {{-- <div class="col-lg-4 ">
            </div> --}}
        </div>
	    <div class="row">
            <!-- Left content -->
            <div class="col-lg-12 pbtnss">
                <div class="popover__wrapper col-6 col-lg-2">
                    <a href="#">
                        <h2 class="popover__title">Categories</h2>
                    </a>
                    <div class="popover__content">
                        @if(!empty($categories))
                            <div>
                                <ul>
                                    <li><a href="{{ url('search-job?q=&category=') }}">All Categories</a></li>
                                    @foreach($categories as $category)
                                        <li><a href="{{ url('search-job?q=&category=') }}{{ $category->id }}">{{ $category->name }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="popover__wrapper col-5 col-lg-2">
                    <a href="#">
                        <h2 class="popover__title">Job Types</h2>
                    </a>
                    <div class="popover__content">
                        @if(!empty(\Config::get('constants.jobTypes')))
                            <div>
                                <ul>
                                    <li><a href="{{ url('search-job?q=&category=') }}">Any Type</a></li>
                                    @foreach(\Config::get('constants.jobTypes') as $key => $value)
                                        <li><a href="{{ url('search-job?q=&category=&city=&state=&type=') }}{{ $key }}">{{ $value }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                </div>
                {{-- <div class="popover__wrapper col-5 col-lg-2">
                    <a href="#">
                        <h2 class="popover__title">Locations</h2>
                    </a>
                    <div class="popover__content">
                        <div>
                            <ul>
                                @foreach ($cities as $city)
                                    <li><a class="text-capitalize text-nowrap" href="{{ url('search-job?q=&category=&state=&city=') }}{{ $city }}">{{ $city }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div> --}}
                <div class="popover__wrapper col-6 col-lg-2">
                    <a href="{{ url('search-job?q=&category=') }}">
                        <h2 class="popover__title">Clear filters</h2>
                    </a>
                </div>
            </div>
            <div class="col-xs-12 col-xl-5">
                <!-- Featured_job_start -->
                <section class="featured-job-area newar">
                    <div class="container">
                         @if( !empty($jobs) )
                            @foreach( $jobs as $index => $job )
                                @include('jobs.listing.leftsidesingle', ['jobData' => $job, 'index'=>$index])
                            @endforeach
                        @endif
                    </div>
                </section>
                <!-- Featured_job_end -->
            </div>
            <div class="col-xs-7 col-xl-7 col-lg-12">
				 <div class="job-post-company">
                    <div class="container">
                        <div class="row singleJobListingDetail">
                            @if(isset($jobs[0]) && $jobs[0]['id'])
                                @include('jobs.listing.rightsidedetail', ['jobData' => $jobs[0]])
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
	 </div>
</div>
<!-- Job List Area End -->
<!--Pagination Start  -->
<div class="pagination-area pb-115 text-center">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="single-wrap d-flex justify-content-center">
                    {{ $jobs->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
<!--Pagination End  -->

<script src="{{ URL::asset('/assets/js/job.list.js') }}"></script>

<link rel="stylesheet" href="{{ asset('assets/css/job.list.css') }}">
@endsection
