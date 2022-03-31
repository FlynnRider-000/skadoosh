
@extends('layouts.frontend.app')

@section('content')


<!-- Job List Area Start -->
<div class="job-listing-area jbdet">
    <div class="container main-bg jbdet">
        <!-- Section Tittle -->
        <div class="row">
            <div class="col-lg-8">
                <div class="wrap-inner fg">
				    <h3>Jobs At {{ $company->name }}</h3>
                </div>
            </div>
            <div class="col-lg-4 ">
            </div>
        </div>
	    <div class="row">
            <div class="col-xs-12 col-lg-5 col-md-6">
                <!-- Featured_job_start -->
                <section class="featured-job-area newar">
                    <div class="container">
                         @if( !empty($jobs) )
                            @foreach( $jobs as $index=> $job )
                                @include('jobs.listing.leftsidesingle', ['jobData' => $job, 'index'=> $index])
                            @endforeach
                        @endif
                    </div>
                </section>
                <!-- Featured_job_end -->
            </div>
            <div class="col-xs-7 col-lg-7 col-md-6">
				 <div class="job-post-company">
                    <div class="container">
                        <div class="row singleJobListingDetail">
                            @if( isset( $jobs[0] ) && $jobs[0]['id'] )
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
                </div>
            </div>
        </div>
    </div>
</div>
<!--Pagination End  -->

<script src="{{ asset('/assets/js/company.jobs.js')}}"></script>
<link rel="stylesheet" href="{{ asset('assets/css/company.job.css') }}">
@endsection
