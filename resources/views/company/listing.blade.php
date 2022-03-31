
@extends('layouts.frontend.app')

@section('content')


<!-- Job List Area Start -->
<div class="job-listing-area jbdet">
    <div class="container main-bg jbdet">
        <div class="row">

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">All Companies</h4>
                        <div class="table-responsive">
                            <table class="table align-middle table-nowrap mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th class="align-middle">Rank</th>
                                        <th class="align-middle">Logo</th>
                                        <th class="align-middle">Company Name</th>
                                        <th class="align-middle">Jobs</th>
                                        <th class="align-middle">View Details</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($companies as $rank => $company)
                                        <tr>
                                            <td class="align-middle">{{ $rank + 1 }}</td>
                                            <td class="align-middle">
                                                <a href="{{ $company->website }}" target="__blank">
                                                    <img src="{{ asset( env('COMPANY_IMAGE_PATH').'/'.$company->logo) }}" width="80" height="80" alt="{{ $company->name }}">
                                                </a>
                                            </td>
                                            <td class="align-middle">
                                                {{ $company->name }}
                                            </td>
                                            <td class="align-middle">
                                                <span class="badge badge-pill badge-soft-success font-size-11">{{ $company->jobs->count() }}</span>
                                            </td>
                                            <td class="align-middle">
                                                <a href="{{ route('show.company', ['name'=> str_replace(' ','-', strtolower($company->name))]) }}" class="btn btn-details text-white">
                                                    View Details
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- end table-responsive -->
                    </div>
                </div>
            </div>
        </div>
	    <div class="row">
            <div class="col-lg-12">

                {{-- @foreach ($companies as $rank => $company)
                    <a href="{{ route('show.company', ['name'=> $company->name]) }}" class="company-job d-flex">
                        <div class="col-md-2 company-rank">
                            {{ $rank+1 }}
                        </div>
                        <div class="col-md-2 company-logo">
                            {{ $company->name }}
                        </div>
                        <div class="col-md-4 company-name text-capitalize">
                            {{ $company->name }}
                        </div>
                        <div class="col-md-4 company-job-count text-center">
                            {{ $company->jobs->count() }}
                        </div>
                    </a>
                @endforeach --}}
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
                    {{ $companies->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
<!--Pagination End  -->
<link rel="stylesheet" href="{{ asset('assets/css/company.list.css') }}">
@endsection
