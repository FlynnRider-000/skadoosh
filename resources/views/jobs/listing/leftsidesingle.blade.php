<!-- single-job-content -->
<div class="single-job-items mb-30 ajaxJobDetail {{ $index == 0 ? 'active' : '' }} {{ ($jobData->is_premium == 1) ? 'premium' : ''}} {{ ($jobData->is_premium == 2) ? 'pinned' : ''}}" data-jobid="{{ $jobData->id }}">
    <div class="job-items">
        @if(isset($jobData->company) && $jobData->company->logo)
            <div class="company-img">
                <a href="{{ asset('/'.env('COMPANY_IMAGE_PATH').'/'.$jobData->company->logo) }}"><img src="{{ asset('/'.env('COMPANY_IMAGE_PATH').'/'.$jobData->company->logo) }}" alt=""></a>
            </div>
        @endif
        <div class="job-tittle">
            @if($jobData->company)
                <span class="company-name">{{ $jobData->company->name }}</span>
            @endif
            <h4>{{ $jobData->title }}</h4>
            <ul>
                <li>
                    {{ \Config::get('constants.jobTypes')[$jobData->job_type] }} 
                    - 
                    {{ $jobData->location == 'office' ? ( ($jobData->location_city != '' ? $jobData->location_city.', ' : '' ). $jobData->location_state) : (  $jobData->location == 'remote_region' ? $jobData->region_restriction : 'Remote' ) }}
            </ul>
        </div>

            @if($jobData->is_premium == 1)
                <small class="ad">Ad</small>
            @endif

            @if($jobData->is_premium == 2)
                <small class="pinned">
                    <i class="fa fa-thumbtack"></i> Pinned
                </small>
            @endif
    </div>
</div>
