@extends('layouts.backend.master')
@section('title') Job | Create @endsection


@section('content')
@component('components.breadcrumb')
@slot('li_1') Jobs @endslot
@slot('title') Create @endslot
@endcomponent
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <form class="needs-validation" action="{{ url('admin/job') }}" novalidate method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="jobTitle" class="form-label">Title <span class="text-danger">*</span></label>
                                <input type="text" name="jobTitle" value="{{ old('jobTitle') }}" class="form-control" id="jobTitle" placeholder="Job Title"
                                  required>
                                <div class="valid-feedback">
                                        Looks good!
                                </div>
                                <div class="invalid-feedback">
                                    Please enter a job title
                                </div>                 
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="jobCategory" class="form-label">Category <span class="text-danger">*</span></label>
                                <select class="form-select" name="jobCategory" id="jobCategory" required>
                                    <option disabled selected></option>
                                    @if(!empty($categories))
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ old('jobCategory') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                        @endforeach
                                    @endif                                    
                                </select>
                                <div class="invalid-feedback">
                                    Please select a category.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mt-1">
                                <label for="jobType">Type of position <span class="text-danger">*</span></label>
                                @if(!empty(\Config::get('constants.jobTypes'))) 
                                    @foreach(\Config::get('constants.jobTypes') as $key => $value)
                                        <div class="form-check mb-3 is-invalid">
                                            <input class="form-check-input" type="radio" required {{ old('jobType') == $key ? 'checked' : '' }} value="{{ $key }}" name="jobType" id="jobType_{{ $key }}">
                                            <label class="form-check-label" for="jobType_{{ $key }}">
                                                {{ $value }}
                                            </label>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mt-1">
                                <label for="jobLocationType">Remote or location based ? <sup class="text-danger">*</sup></label>
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="radio" required {{ old('jobLocation') == 'office' ? 'checked' : '' }} value="office" name="jobLocation" id="jobLocationOffice">
                                    <label class="form-check-label" for="jobLocationOffice">
                                        Location based (in office)
                                    </label>
                                </div>
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="radio" {{ old('jobLocation') == 'remote_anywhere' ? 'checked' : '' }} value="remote_anywhere" name="jobLocation" id="jobLocationRemoteAnywhere">
                                    <label class="form-check-label" for="jobLocationRemoteAnywhere">
                                        Remote (anywhere)
                                    </label>
                                </div>
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="radio" {{ old('jobLocation') == 'remote_region' ? 'checked' : '' }} value="remote_region" name="jobLocation" id="jobLocationRemoteRegion">
                                    <label class="form-check-label" for="jobLocationRemoteRegion">
                                        Remote (with regional restrictions)
                                    </label>
                                </div>
                                <div class="invalid-feedback">
                                    Please select a job location.
                                </div>
                            </div>
                            <div class="row jobOfficeLocationDiv d-none">
                                <div class="w-50">
                                    <label for="jobOfficeLocationCity" class="form-label">Office Location <span class="text-danger">*</span></label>
                                    <input type="text" name="jobOfficeLocationCity" value="{{ old('jobOfficeLocationCity') }}" class="form-control" id="jobOfficeLocationCity"
                                        required placeholder="e.g. New York City">
                                    <div class="invalid-feedback">
                                        Please enter a city.
                                    </div>                                
                                </div>
                                <div class="w-50">
                                    <label for="jobOfficeLocationState" class="form-label">Office Location <span class="text-danger">*</span></label>
                                    <input type="text" name="jobOfficeLocationState" value="{{ old('jobOfficeLocationState') }}" class="form-control" id="jobOfficeLocationState"
                                        required placeholder="e.g. New York">
                                    <div class="invalid-feedback">
                                        Please enter a state.
                                    </div>                                
                                </div>
                            </div>
                            <div class="w-100 jobRegionalRestrictionDiv d-none">
                                <label for="jobRegionalRestriction" class="form-label">Regional Restrictions <span class="text-danger">*</span></label>
                                <input type="text" name="jobRegionalRestriction" value="{{ old('jobRegionalRestriction') }}" class="form-control" id="jobRegionalRestriction"
                                    required placeholder="e.g. Must live in US, or Must be in GMT +/-2">
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="invalid-feedback">
                                    Please enter a region.
                                </div>                                
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <label class="col-md-12" for="">Salary Information</label>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="mb-3">
                                <select class="form-select" name="jobSalaryCurrency" id="jobSalaryCurrency" required>
                                <option disabled selected></option>
                                @if(!empty(\Config::get('constants.jobSalaryCurrency'))) 
                                        @foreach(\Config::get('constants.jobSalaryCurrency') as $key => $value)
                                            <option value="{{ $key }}" {{ old('jobSalaryCurrency') == $key ? "selected" : "" }}>
                                                {{ $value }}
                                            </option>
                                        @endforeach
                                    @endif
                                </select>
                                <div class="invalid-feedback">
                                    Please select a currency.
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <input type="text" name="jobSalaryFrom" value="{{ old('jobSalaryFrom') }}" class="form-control" id="jobSalaryFrom" placeholder="from"
                                    required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="invalid-feedback">
                                    Please enter a salary.
                                </div>                                
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <input type="text" name="jobSalaryTo" value="{{ old('jobSalaryTo') }}" class="form-control" id="jobSalaryTo" placeholder="to"
                                    required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="invalid-feedback">
                                    Please enter a salary.
                                </div>                                
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <select class="form-select" name="jobSalaryType" id="jobSalaryType" required>
                                    <option disabled selected></option>
                                    @if(!empty(\Config::get('constants.jobSalaryType'))) 
                                        @foreach(\Config::get('constants.jobSalaryType') as $key => $value)
                                            <option value="{{ $key }}" {{ old('jobSalaryType') == $key ? "selected" : "" }}>
                                                {{ $value }}
                                            </option>
                                        @endforeach
                                    @endif
                                </select>
                                <div class="invalid-feedback">
                                    Please select a salary type.
                                </div>
                            </div>
                        </div>                        
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="jobApplyLink" class="form-label">How to apply <span class="text-danger">*</span></label>
                                <input type="text" name="jobApplyLink" value="{{ old('jobApplyLink') }}" class="form-control" id="jobApplyLink" placeholder="e.g. https://www.company.com/careers/apply"
                                    required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="invalid-feedback">
                                    Please enter a job apply link.
                                </div>                                
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="mb-3">
                            <label for="jobDescription">Job Description</label>
                            <textarea id="job-description" class="text-editor" value="{{old('jobDescription')}}"name="jobDescription">{{ old('jobDescription') }}</textarea>
                            <div class="invalid-feedback">
                                Please enter a job description.
                            </div>  
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="companyName" class="form-label">Company name <span class="text-danger">*</span></label>
                                <input type="text" name="companyName" value="{{ old('companyName') }}" class="form-control" id="companyName" placeholder="e.g. Company Ltd."
                                    required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="invalid-feedback">
                                    Please enter a company name.
                                </div>                                
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="companyStatement" class="form-label">Company Statement <span class="text-danger">*</span></label>
                                <input type="text" name="companyStatement" value="{{ old('companyStatement') }}" class="form-control" id="companyStatement" placeholder="e.g. It's our mission to fulfill our vision"
                                    required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="invalid-feedback">
                                    Please enter a company statement.
                                </div>                                
                            </div>                            
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="companyName" class="form-label">Company LOGO <span class="text-danger">*</span></label>
                                <input type="file" name="companyLogo" class="form-control" id="companyLogo" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="invalid-feedback">
                                    Please choose a company logo.
                                </div>                                
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="companyEmail" class="form-label">Company Email <span class="text-danger">*</span></label>
                                <input type="email" name="companyEmail" value="{{ old('companyEmail') }}" class="form-control" id="companyEmail" placeholder=""
                                    required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="invalid-feedback">
                                    Please enter a company email.
                                </div>                                
                            </div>                            
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="companyWebsite" class="form-label">Company Website <span class="text-danger">*</span></label>
                                <input type="text" name="companyWebsite" value="{{ old('companyWebsite') }}" class="form-control" id="companyWebsite" placeholder=""
                                    required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="invalid-feedback">
                                    Please enter a company website.
                                </div>                                
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="companyTwitter" class="form-label">Company Twitter <span class="text-danger">*</span></label>
                                <input type="text" name="companyTwitter" value="{{ old('companyTwitter') }}" class="form-control" id="companyTwitter" placeholder=""
                                    required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="invalid-feedback">
                                    Please enter a company twitter.
                                </div>                                
                            </div>                            
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="companyLocation" class="form-label">Company Location <span class="text-danger">*</span></label>
                                <input type="text" name="companyLocation" value="{{ old('companyLocation') }}" class="form-control" id="companyLocation" placeholder=""
                                    required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="invalid-feedback">
                                    Please enter a company location.
                                </div>                                
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="companyDescription">Company Description</label>
                                <textarea id="company-description" class="text-editor" value="{{old('companyDescription')}}" name="companyDescription">{{ old('companyDescription') }}</textarea>
                                <div class="invalid-feedback">
                                    Please enter a company description.
                                </div>  
                            </div>
                        </div>
                    </div>
                    <div class="mt-1">
                        <label class="d-block" for="jobLocationType">Job Post Type <sup class="text-danger">*</sup></label>
                        <div class="d-flex flex-wrap">
                            <div class="form-check col-md-2 mb-3">
                                <input class="form-check-input" type="radio" required {{ old("is_premium") == 1 ? 'checked' : '' }} value="0" name="isPremium" id="isPremiumFree">
                                <label class="form-check-label" for="isPremiumFree">
                                    Free
                                </label>
                            </div>
                            <div class="form-check col-md-2 mb-3">
                                <input class="form-check-input" type="radio" {{ old("is_premium") == 1 ? 'checked' : '' }} value="1" name="isPremium" id="isPremiumPremium">
                                <label class="form-check-label" for="isPremiumPremium">
                                    Premium
                                </label>
                            </div>
                            <div class="form-check col-md-2 mb-3">
                                <input class="form-check-input" type="radio" {{ old("is_premium") == 2 ? 'checked' : '' }} value="2" name="isPremium" id="isPremiumPinned">
                                <label class="form-check-label" for="isPremiumPinned">
                                    Pinned
                                </label>
                            </div>
                        </div>
                    </div>

                    <div>
                        <button class="btn btn-success" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- end card -->
    </div> <!-- end col -->
</div>
@endsection
@section('script')
    <script src="{{ URL::asset('/admin_assets/libs/parsleyjs/parsleyjs.min.js') }}"></script>
    <!--tinymce js-->
    <script src="{{ URL::asset('/admin_assets/libs/tinymce/tinymce.min.js') }}"></script>

    <!-- init js -->
    <script src="{{ URL::asset('/admin_assets/js/pages/form-validation.init.js') }}"></script>
    <script src="{{ URL::asset('/admin_assets/js/pages/form-editor.init.js') }}"></script>
    @include('admin.job.script')
@endsection