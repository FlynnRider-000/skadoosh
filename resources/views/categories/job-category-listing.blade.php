<!-- Featured_job_start -->
<link rel="stylesheet" href="{{ asset('assets/css/job-category-listing.css') }}">
<section class="featured-job-area feature-padding">
    <div class="container">
        <!-- Section Tittle -->


        <div class="row justify-content-center">

                <div class="col-xl-12 section-tittle text-left topscr">
                    <h2>{{ $category->name }}
                    </h2>
                    <span>{{ $category->jobs->count() }} <a href="{{ url('search-job?q=&category='.$category->id) }}">{{ $category->name }} jobs</a></span>
                </div>

            <div class="col-xl-12">
                <div class="owl-carousel">
                @if(!empty($category->jobs))
                    @foreach($category->jobs->take(5) as $job)
                        <!-- single-job-content -->

                            <div class="single-job-items mb-30">
                                <div class="job-items @if($job->is_premium == 1) featured @endif @if($job->is_premium == 2) pinned @endif">

                                    @if($job->is_premium == 1)

                                        <small class="ad">Ad</small>
                                    @endif

                                    @if($job->is_premium == 2)

                                        <small class="pinned">
                                            <i class="fa fa-thumbtack"></i> Pinned
                                        </small>
                                    @endif


                                    <div class="company-img">
                                        @if(isset($job->company) && $job->company->logo)
                                            <a href="{{ url('job-detail/'. str_replace(' ','-', strtolower($job->title))) }}">
                                                <img src="{{ asset('/'.env('COMPANY_IMAGE_PATH').'/'.$job->company->logo) }}" alt="">
                                            </a>
                                        @endif
                                    </div>
                                    <div class="job-tittle">

                                        <a href="{{ url('job-detail/'. str_replace(' ','-', strtolower($job->title))) }}">
                                            <h4>{{ $job->title }}</h4>
                                        </a>
                                        <ul>
                                            <li>{{ $job->category->name }}</li>
                                            <li><i class="fas fa-map-marker-alt"></i>{{ $job->company->location }}</li>
                                            
                                            @if(isset($job->salary))
                                                <li>{{strtoupper($job->salary->rate)}} Job</li>
                                                <li>{{ \Config::get('constants.jobSalaryCurrency')[$job->salary->currency_type] . $job->salary->range_from .' - '. \Config::get('constants.jobSalaryCurrency')[$job->salary->currency_type] . $job->salary->range_to .' '}}</li>
                                            @endif
                                        </ul>
                                    </div>

                                    <div class="jobs-link">
                                        <a href="{{ url('job-detail/'. str_replace(' ','-', strtolower($job->title))) }}"><button type="button">Apply</button></a>
                                    </div>
                                </div>

                            </div>
                        @endforeach
                    @endif
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Featured_job_end -->

    <script src="{{URL::asset('/assets/js/job-category-listing.js')}}"> </script>
    <!-- Jquery mousewheel -->
    <script src="{{ URL::asset('assets/js/jquery.mousewheel.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/mousewheel-init.js') }}"></script>


