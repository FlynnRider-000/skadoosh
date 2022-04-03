@extends('freelancers.dashboard')

@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/app.index.css') }}">

    @include('categories.home-listing', ['categories' => $categories, 'newJobsToday' => $newJobsToday])
    <!-- Client logo -->
    <section class="ctgf">
        <div class="container">
            <!-- Section Tittle -->
            <div class="row">
                <div class="col-lg-12">
                    <h3>
                        Categories
                        <a href="{{url('search-job')}}" style="float: right;font-size: 18px;color: #333 !important">View All</a>
                    </h3>
                    <div class="categories">
                        @include('categories.single-listing', ['categories' => $categories])
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section class="compn">
        <div class="container">
            <!-- Section Tittle -->
            <div class="">
                <div class="" id="mainsss">
                    <h3 class="text-left">
                        Companies
                        <a class="float-right" href="{{ route('show.all.companies') }}" style="font-size: 18px;color: #333 !important">View All</a>
                    </h3>
                    <div class="row logos h-25">
                    @foreach ($companies as $company)
                        <div class="col-sm-2 col-6"> 
                            <a href="{{ $company->website }}" target="__blank">     
                                <img class="img-fluid" src="{{ asset(env('COMPANY_IMAGE_PATH').'/'.$company->logo) }}" alt="{{ $company->name }}" />
                            </a>
                        </div>
                        @if($loop->index == 11)
                            @break
                        @endif
                    @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Client logo -->
    <section class="featured-job-area feature-padding compn">
        <div class="container">
            <!-- Section Tittle -->
            <h3 class="">
                We Will Help You
                <a href="{{url('search-job')}}" style="float: right;font-size: 18px;color: #333 !important">View All</a>
            </h3>
            <!-- Featured_job_start -->
        @if(!empty($categories))
            @foreach($categories as $category)
                @if($category->jobs->count() > 0)
                    @include('categories.job-category-listing', ['category' => $category])
                @endif
            @endforeach
        @endif
        <!-- Featured_job_end -->
            <div class="col-xl-12 vidl">
                <a href="{{url('/search-job')}}" type="button">View All Jobs <i class="ml-2 fa fa-arrow-right"></i></a>
            </div>
        </div>
    </section>
    <div class="col-xl-12 foottp">
        <div class="container">
            <div class="col-lg-6 ">

            </div>
            <div class="col-lg-6 riff">
                <div class="wrap-inner">
                    <h3>
                        Get New Job Listings Sent Directly to Your Inbox
                    </h3>
                    <p>Pick a plan that fits your needs.</p>
                </div>
                <form class="subscribe-form" action="{{ route('subscribe') }}" method="POST">
                    <div class="row justify-content-center align-items-center mb-2">
                        <div>Receive a</div>
                        <div class="mr-2 ml-2">
                            <select class="form-control form-control-sm" name="frequency" id="frequency">
                                <option value="1">Daily</option>
                                <option value="7">Weekly</option>
                            </select> 
                        </div>
                        <div>emails of Job Finder</div>
                    </div>
                    <div class="search">
                        <input  class="search-txt" type="text" name="email" placeholder="Your Email" required>
                        <button type="submit" class="btn search-btn">
                            Subscribe
                        </button>
                    </div>
                </form>
            </div>
            <div class="col-lg-6 ">
                <div class="mobile-foottp">
                </div>
            </div>
        </div>

    </div>

@endsection
