
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
            <div class="col-xs-12 col-lg-5 col-md-6">
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
            <div class="col-xs-7 col-lg-7 col-md-6">
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

<script type="text/javascript">
    $(document).on('ready', function() {
        $('section.featured-job-area').on('click', '.ajaxJobDetail', function(e) {
            $(".ajaxJobDetail").removeClass('active');
            $( this ).addClass('active');            
            var id = $(this).data('jobid');
            var token = $("meta[name='csrf-token']").attr("content");
            var url = "{{ URL('load-job-detail') }}";
            $.ajax(
            {
                url: url+"/"+id,
                type: "GET",
                success: function (data) {
                    var dataResult = JSON.parse(data);
                    if(dataResult.status == 1) {
                        $('.singleJobListingDetail').html(dataResult.html)
                    } else {
                        alert(dataResult.message)
                    }
                }
            });
        });
    });

</script>

<style>

a {
  text-decoration: none;
}
.newar h4{
    font-size: 16px;
    margin-bottom: 7px;
    color: #0b74ff;
    text-decoration: underline;
    font-weight: 400;
    font-family: 'Roboto', sans-serif;
}

.pbtnss{
    margin-bottom:20px;
}

.sidecnt p, span {
    color: #2E3B56;
    font-size: 18px;
    font-weight: 400;
    line-height: 1.5em;
    font-family: 'Roboto', sans-serif;
}
.job-post-details p {
    color: #2E3B56;
}
p, span {
    color: #506172;
    font-size: 16px;
    line-height: 30px;
    margin-bottom: 15px;
    font-weight: 300;
}
ul {
    margin: 0px;
    padding: 0px;
    margin-bottom: 20px;
    margin-top: 20px;
}

.job-tittle span:nth-of-type(2) {
    background: #29A387;
    font-size: 15px;
    font-weight: 300;
    color: #FFF;
    border-radius: 4px;
    padding: 5px 10px;
    margin-left: 10px;
}
.apply-btn2 a {
    margin-top: 20px;
}
.apply-btn2 a {
    padding: 17px 40px 20px 40px;
    border-radius: 40px;
    background: #FF8549 !important;
    margin: 10px 10px;
    color: #fff !important;
}
/* detail page */
p, span {
    color: #2E3B56;
    font-size: 16px;
    line-height: 30px;
    margin-bottom: 16px;
    font-weight: 300;
    font-family: 'Roboto';
}
</style>
@endsection
