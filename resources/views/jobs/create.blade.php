@extends('layouts.frontend.app')

@section('content')

<link rel="stylesheet" href="{{ asset('assets/css/job.create.css') }}">

    <div class="topjbcolor ones">
        <div class="container">
            <div class="prgb">
                <div class="progress-barr">
                    <div class="step active">

                        <div class="bullet">
                            <span>1</span>
                        </div>
                        <div class="check fas fa-check"></div>
                        <p>Job Details</p>
                    </div>
                    <div class="step">
                        <div class="bullet">
                            <span>2</span>
                        </div>
                        <div class="check fas fa-check"></div>
                        <p>Review</p>
                    </div>
                    <div class="step">

                        <div class="bullet">
                            <span>3</span>
                        </div>
                        <div class="check fas fa-check"></div>
                        <p>Payment</p>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="job-post-company pb-20 main-herofrm jbdet newform">
        <div class="container">
            <div class="formnew" >
                <form class="needs-validation" novalidate action="{{ url('/post-a-job') }}" role="form" method="post" enctype="multipart/form-data">
                    <input type="hidden" class="intialJobPrice" value="{{ CustomHelper::getSimpleJobPostCost() }}">
                    <input type="hidden" class="additionalJobPrice" value="{{ CustomHelper::getPremiumJobPostCost() }}">
                    <input type="hidden" name="job_id" value="{{ $jobId }}">

                    {{ csrf_field() }}

                    @include('errors.form-error')
                    @include('layouts.frontend.success-msg')
                    <div class="" style="padding-top: 15px;border:1px solid #DCDCDC;border-radius: 10px;">
                        <div class="form-group text-center" style="border-bottom: 1px solid #DCDCDC;">
                            <h4>First, tell us about the role</h4>
                            <h6 class="border-0">Please be as accurate as you can so we can help drive relevant candidates</h6>
                        </div>
                        
                        <div class="jobSection" >
                            <div class="form-group mb-2">
                                <label for="jobTitle" class="control-label">Title <span class="red">*</span></label>
                                <span class="sublabel">Use the job title. Titles must describe the role</span>
                                <input type="text" class="form-control" name="jobTitle" required placeholder="e.g. Senior Content Strategist" value="{{ old('jobTitle') }}" @if(isset($jobData->title) && $jobData->title) value="{{ $jobData->title }}" @endif>
                                <div class="valid-feedback" >
                                    Looks good!
                                </div>
                                <div class="invalid-feedback">
                                    Please enter a Job Title.
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="jobCategory">Category <span class="red">*</span></label>
                                <span class="sublabel">Choose category that matches the position best</span>
                                @if(!empty($categories))
                                    @foreach($categories as $key => $category)
                                        <div class="radio @if(isset($jobData->category_id) && $jobData->category_id == $category->id) active @endif" required>
                                            <input id="input_{{ $key }}" type="radio" name="jobCategory" checked required value="{{ $category->id }}" @if(isset($jobData->category_id) && $jobData->category_id == $category->id) checked="checked" @endif>
                                            <label for ="input_{{ $key }}" class="mt-0 mb-0" style="font-size: 15px;">{{ $category->name }}</label>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="jobType">Type of position <span class="red">*</span></label>
                                <span class="sublabel">Choose your target position</span>
                            </div>
                            <div class="form-group">

                                @if(!empty(\Config::get('constants.jobTypes')))
                                    @foreach(\Config::get('constants.jobTypes') as $key => $value)
                                        <div class="radio @if(isset($jobData->job_type) && $jobData->job_type == $key) active @endif">
                                            <input id="input_job_{{ $key }}" type="radio" name="jobType" checked required value="{{ $key }}" @if(isset($jobData->job_type) && $jobData->job_type == $key) checked="checked" @endif>
                                            <label for ="input_job_{{ $key }}" class="mt-0 mb-0" style="font-size: 15px;">{{ $value }}</label>
                                        </div>
                                    @endforeach
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="jobCategory">Remote or location based? <span class="red">*</span></label>
                                <span class="sublabel">Choose your target position</span>
                            </div>

                            <div class="form-group">
                                <div class="radio @if(isset($jobData->location) && $jobData->location == 'office') active @endif">
                                    <input type="radio" id="input_location" name="jobLocation" value="office" @if(isset($jobData->location) && $jobData->location == 'office') checked="checked" @endif>
                                    <label for ="input_location" class="mt-0 mb-0" style="font-size: 15px;"> Location based (in office)</label>
                                </div>
                                <div class="radio @if(isset($jobData->location) && $jobData->location == 'remote_anywhere') active @endif">
                                    <input type="radio" id="input_remote" name="jobLocation" checked value="remote_anywhere" @if(isset($jobData->location) && $jobData->location == 'remote_anywhere') checked="checked" @endif>
                                    <label for ="input_remote" class="mt-0 mb-0" style="font-size: 15px;"> Remote (anywhere)</label>
                                </div>
                                <div class="radio @if(isset($jobData->location) && $jobData->location == 'remote_region') active @endif">
                                    <input type="radio" id="remote_region" name="jobLocation" value="remote_region" @if(isset($jobData->location) && $jobData->location == 'remote_region') checked="checked" @endif>
                                    <label for ="remote_region" class="mt-0 mb-0" style="font-size: 15px;"> Remote (with regional restrictions)</label>
                                </div>
                            </div>
                            
                            <div class="jobOfficeLocationDiv" @if(isset($jobData->location) && $jobData->location == 'office') @else style="display: none;" @endif>
                                <label for="jobOfficeLocationCity" class="control-label">Office location <span class="red">*</span></label>
                                <input type="text" name="jobOfficeLocationCityName" value="{{ old('jobOfficeLocationCity') }}" class="form-control" id="jobOfficeLocationCity" placeholder="e.g. New York City" @if(isset($jobData->location) && $jobData->location == 'office' && isset($jobData->location_city) && $jobData->location_city) value="{{ $jobData->location_city }}" @endif>
                                <input type="text" name="jobOfficeLocationState" value="{{ old('jobOfficeLocationState') }}" class="form-control" id="jobOfficeLocationState" placeholder="e.g. New York" @if(isset($jobData->location) && $jobData->location == 'office' && isset($jobData->location_state) && $jobData->location_state) value="{{ $jobData->location_state }}" @endif>
                                <div class="invalid-feedback">
                                    Please enter a office Location.
                                </div>
                            </div> 

                            <div class="form-group jobRegionalRestrictionDiv" @if(isset($jobData->location) && $jobData->location == 'remote_region') @else style="display: none;" @endif>
                                <label for="jobRegionalRestriction" class="control-label">Regional Restrictions *</label>
                                <input type="text" value="{{ old('jobRegionalRestriction') }}" class="form-control is-invalid" name="jobRegionalRestriction"placeholder="e.g. Must live in US, or Must be in GMT +/-2" @if(isset($jobData->location) && $jobData->location == 'remote_region' && isset($jobData->region_restriction) && $jobData->region_restriction) value="{{ $jobData->region_restriction }}" @endif>
                            </div>

                            <div class="form-group">
                                <label for="" class="control-label">Salary information <span class="red">*</span></label>
                                <span class="sublabel">Please provide salary range for this position</span>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-2 mb-2">
                                        <select class="form-control" name="jobSalaryCurrency" required>
                                            <option disabled selected></option>    
                                            @if(!empty(\Config::get('constants.jobSalaryCurrency')))
                                                @foreach(\Config::get('constants.jobSalaryCurrency') as $key => $value)
                                                    <option value="{{ $key }}" {{ old('jobSalaryCurrency') == $key ? "selected" : "" }} @if(isset($jobData->salary) && $jobData->salary->currency_type == $key) selected="selected" @endif>{{ $value }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        <div class="valid-feedback" >
                                        Looks good!
                                        </div>
                                        <div class="invalid-feedback">
                                            Please select a Currency.
                                        </div> 
                                    </div>
                                    <div class="col-sm-4 mb-2">
                                        <input type="text" value="{{ old('jobSalaryFrom') }}" class="form-control" name="jobSalaryFrom" required placeholder="From" @if(isset($jobData->salary) && $jobData->salary->range_from) value="{{ $jobData->salary->range_from }}" @endif>
                                        <div class="valid-feedback" >
                                            Looks good!
                                        </div>
                                        <div class="invalid-feedback">
                                            Please Enter a Job salary.
                                        </div>
                                    </div>
                                    <div class="col-sm-4 mb-2">
                                        <input type="text" value="{{ old('jobSalaryTo') }}" class="form-control" name="jobSalaryTo" required placeholder="To" @if(isset($jobData->salary) && $jobData->salary->range_to) value="{{ $jobData->salary->range_to }}" @endif>
                                        <div class="valid-feedback" >
                                            Looks good!
                                        </div>
                                        <div class="invalid-feedback">
                                            Please Enter a Job salary.
                                        </div> 
                                    </div>
                                    <div class="col-sm-2 mb-2">
                                        <select class="form-control" name="jobSalaryType" required>
                                            <option disabled selected></option>
                                            @if(!empty(\Config::get('constants.jobSalaryType')))
                                                @foreach(\Config::get('constants.jobSalaryType') as $key => $value)
                                                    <option value="{{ $key }}" {{ old('jobSalaryType') == $key ? "selected" : "" }} @if(isset($jobData->salary) && $jobData->salary->rate == $key) selected="selected" @endif>{{ $value }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        <div class="valid-feedback" >
                                            Looks good!
                                        </div>
                                        <div class="invalid-feedback">
                                            Please select a form of payment.
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mb-2">
                                <label for="jobApplyLink" class="control-label">How to apply <span class="red">*</span></label>
                                <span class="sublabel">Please provide a link or email address to where applications should be sent</span>
                                <input type="text" class="form-control" value="{{ old('jobApplyLink') }}" name="jobApplyLink" required placeholder="e.g. https://www.company.com/careers/apply" @if(isset($jobData->apply_link) && $jobData->apply_link) value="{{ $jobData->apply_link }}" @endif>
                                <div class="valid-feedback" >
                                    Looks good!
                                </div>
                                <div class="invalid-feedback">
                                    Please Enter a Job ApplyLink.
                                </div> 
                                </div>

                            <div class="form-group mb-2">
                                <label for="jobDescription" class="control-label">Job description <span class="red">*</span></label>
                                <span class="sublabel">Well formatted and easy to read job descriptions will drive more applicants. If you're pasting from another system, please check the formatting of your job description</span>
                                <textarea class="jobDescriptionEditor form-control" value="{{old('jobDescription')}}" name="jobDescription" >@if(isset($jobData->apply_link)) {{ old('$jobData->description') }} @endif</textarea>
                                <div class="invalid-feedback">
                                    Please Enter a Job Description.
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-5 mb-5" style="padding-top: 15px;border:1px solid #DCDCDC;border-radius: 10px;">
                        <div class="form-group text-center" style="border-bottom: 1px solid #DCDCDC;">
                            <h4>Now, a little bit about the company</h4>
                            <h6 class="border-0">Please be as accurate as you can so we can help drive relevant candidates</h6>
                        </div>
                        <div class="jobSection companypart">
                        <div class="form-group mb-2">
                        <label for="companyName" class="control-label">Company name <span class="red">*</span></label>
                            <span class="sublabel">Provide your company's name. It'll appear in search results and next to your job listing</span>
                            <input type="text" class="form-control" name="companyName" value="{{ old('companyName') }}" placeholder="e.g. Company Ltd." required @if(isset($jobData->company) && isset($jobData->company->name) && $jobData->company->name) value="{{ $jobData->company->name }}" @endif>
                            <div class="valid-feedback" >
                                Looks good!
                            </div>
                            <div class="invalid-feedback">
                                Please Enter a Company Name.
                            </div>
                        </div>

                        <div class="form-group mb-2">
                            <label for="companyStatement" class="control-label">Company statement</label>
                            <span class="sublabel">Provide your company's mission statement, or one-liner. It'll appear on your company profile</span>
                            <input type="text" class="form-control" name="companyStatement" value="{{ old('companyStatement') }}" placeholder="e.g. It's our mission to fulfill our vision" required @if(isset($jobData->company) && isset($jobData->company->statement) && $jobData->company->statement) value="{{ $jobData->company->statement }}" @endif>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                            <div class="invalid-feedback">
                                Please Enter a Company Statement.
                            </div>
                        </div>

                        <div class="form-group mb-2">
                            <label for="companyLogo" class="control-label">Company logo</label>
                            <span class="sublabel">Your company logo will appear next to your job listing and on the job description page itself</span>
                            <input type="file" class="form-control" name="companyLogo" id="companyLogo" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                            <div class="invalid-feedback">
                                Please Choose file
                            </div>
                        </div>

                        <div class="form-group mb-2">
                            <label for="companyEmail" class="control-label">Your contact email <span class="red">*</span></label>
                            <span class="sublabel">This is where we will email your receipt and send instructions on how to edit the job role</span>
                            <input type="text" class="form-control" name="companyEmail" pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[com])?)*$" value="{{ old('companyEmail') }}" placeholder="e.g. receipts@company.com" required @if(isset($jobData->company) && isset($jobData->company->email) && $jobData->company->email) value="{{ $jobData->company->email }}" @endif>
                            <div class="valid-feedback" >
                                Looks good!
                            </div>
                            <div class="invalid-feedback">
                                Please Enter a company Email.
                            </div> 
                        </div>

                        <div class="form-group mb-2">
                            <label for="companyWebsite" class="control-label">Website address</label>
                            <span class="sublabel">Where should a candidate go to learn more about you?</span>
                            <input type="text" class="form-control" name="companyWebsite" value="{{ old('companyWebsite') }}" placeholder="e.g. https://www.company.com" required @if(isset($jobData->company) && isset($jobData->company->website) && $jobData->company->website) value="{{ $jobData->company->website }}" @endif>
                            <div class="valid-feedback" >
                                Looks good!
                            </div>
                            <div class="invalid-feedback">
                                Please Enter a company Website.
                            </div>
                        </div>

                        <div class="form-group mb-2">
                            <label for="companyTwitter" class="control-label">Twitter handle</label>
                            <span class="sublabel">What is your Twitter username?</span>
                            <input type="text" class="form-control" name="companyTwitter" value="{{ old('companyTwitter') }}" placeholder="e.g. @company" required @if(isset($jobData->company) && isset($jobData->company->twitter) && $jobData->company->twitter) value="{{ $jobData->company->twitter }}" @endif>
                            <div class="valid-feedback" >
                                Looks good!
                            </div>
                            <div class="invalid-feedback">
                                Please Enter a CompanyTwitter.
                            </div>
                        </div>

                        <div class="form-group mb-2">
                            <label for="companyLocation" class="control-label">Company Location</label>
                            <span class="sublabel">Where is the company headquartered?</span>
                            <input type="text" class="form-control" name="companyLocation" value="{{ old('companyLocation') }}" placeholder="e.g. New York City, NY" required @if(isset($jobData->company) && isset($jobData->company->location) && $jobData->company->location) value="{{ $jobData->company->location }}" @endif>
                            <div class="valid-feedback" >
                                Looks good!
                            </div>
                            <div class="invalid-feedback">
                                Please Enter a Company Location.
                            </div>
                        </div>

                        <div class="form-group mb-2">
                            <label for="companyDescription" class="control-label">Company Description <span class="red">*</span></label>
                            <span class="sublabel">Provide a longer description about your company to help a candidate understand what you do in more detail</span>
                            <textarea class="companyDescriptionEditor form-control" value="{{old('companyDescription' )}}" name="companyDescription">@if(isset($jobData->company) && isset($jobData->company->description) && $jobData->company->description) {{ ('$jobData->company->description') }} @endif</textarea>
                            <div class="invalid-feedback">
                                Please Enter a CompanyDescription
                            </div>
                        </div>
                    </div>
                    </div>

                    <div class="previewpart">
                        <div class="form-group">
                            <h4>Reach a bigger audience for <span>{{ CustomHelper::printCurrency().CustomHelper::getPremiumJobPostCost() }}</span></h4>
                                    <h6>An optional upgrade to help you get more applications</h6>
                        </div>

                        <div class="featuresad">
                            <ul class="mainft">
                                <li>
                                    <i class="fas fa-check-circle"></i>
                                    <span>Highlight your ad</span>
                                </li>
                                <li>
                                    <i class="fas fa-check-circle"></i>Share to Google Jobs Network</li>
                                <li>
                                    <i class="fas fa-check-circle"></i> 4x Social media posts</li>
                                <li>
                                    <i class="fas fa-check-circle"></i> Display your company logo</li>
                                <li>
                                    <i class="fas fa-check-circle"></i>Pin ad for 7 days on main page</li>
                                <li>
                                    <i class="fas fa-check-circle"></i> Featured email placement</li>
                            </ul>
                        </div>

                        <div class="form-group">
                            <div class="radio brdr" style="padding: 10px;">
                                <input type="radio" id="jobPostType" name="jobPostType" value="premium" @if(isset($jobData->is_premium) && $jobData->is_premium == true) checked="checked" @endif>
                                <label for="jobPostType" class="mb-0 mt-0" style="font-size: 14px;">Yes, add this to my order for <strong>
                                        {{ CustomHelper::printCurrency().CustomHelper::getPremiumJobPostCost() }}</strong></label>
                            </div>
                            <div class="radio" style="padding: 10px;">
                                <input type="radio"id="jobPostType_no" name="jobPostType" value="simple" @if(isset($jobData->is_premium) && $jobData->is_premium == false) checked="checked" @endif>
                                <label class="mb-0 mt-0" style="font-size: 14px;" for="jobPostType_no">  No, Thanks</label>
                            </div>
                        </div>
                    </div>

                    <div class="jobSection previewpart3">
                        <div class="form-group">
                            <h4>Ready to preview your job listing?</h4>
                                    <h6>
                                        The total for your listing comes to <strong class="totalJobPrice">@if(isset($jobData->is_premium) && $jobData->is_premium == true) {{ CustomHelper::printCurrency().CustomHelper::getTotalJobPostCostForPremiumJobs() }} @else {{ CustomHelper::printCurrency().CustomHelper::getSimpleJobPostCost() }} @endif</strong>.
                                        You can pay once you're happy with the preview.
                                    </h6>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Preview the job listing</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>





    <div class="modal" tabindex="-1" role="dialog" id="success_modal">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center pl-5 pr-5">
                    <img src="{{asset('assets/img/tick.png')}}" alt="tick">
                    <div class="d-block">
                        <h3>Payment Success</h3>
                        <p>
                            Your payment was successful, <br>Thank you for posted a job and enjoy the features
                        </p>
                    </div>

                </div>
                <div class="modal-footer border-0 pt-0 justify-content-center" style="margin-bottom: 30px">
                    <div class="prvbtns text-center mt-2 mb-2">
                        <a href="{{url('/')}}" class="mkch default">Back to Home</a>
                        <a href="javascript:;" data-dismiss="modal" aria-label="Close" class="mkch">OK</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" tabindex="-1" role="dialog" id="success_modal_nonpay">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center pl-5 pr-5">
                    <img src="{{asset('assets/img/tick.png')}}" alt="tick">
                    <div class="d-block">
                        <h3>Job Post Success</h3>
                        <p>
                            Thank you for posted a job and enjoy the features
                        </p>
                    </div>

                </div>
                <div class="modal-footer border-0 pt-0 justify-content-center" style="margin-bottom: 30px">
                    <div class="prvbtns text-center mt-2 mb-2">
                        <a href="{{url('/')}}" class="mkch default">Back to Home</a>
                        <a href="javascript:;" data-dismiss="modal" aria-label="Close" class="mkch">OK</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ URL::asset('/admin_assets/libs/parsleyjs/parsleyjs.min.js') }}"></script>
    <!--tinymce js-->
    <script src="{{ URL::asset('/admin_assets/libs/tinymce/tinymce.min.js') }}"></script>

    <!-- init js -->
    <script src="{{ URL::asset('/admin_assets/js/pages/form-validation.init.js') }}"></script>
    <script src="{{ URL::asset('/admin_assets/js/pages/form-editor.init.js') }}"></script>
    
    <script type="text/javascript">
        $(document).on('ready', function() {
            @if(session('payment_done'))
                $('#success_modal').modal('toggle');
            @elseif(session('free_post'))
                $('#success_modal_nonpay').modal('toggle');
            @endif

            $('input[name=jobCategory]:checked').parent().addClass("active");
            $('input:radio').click(function () {
                $('input:not(:checked)').parent().removeClass("active");
                $('input:checked').parent().addClass("active");
            });

            $('input[name=jobType]:checked').parent().addClass("active");
            $('input:radio').click(function () {
                $('input:not(:checked)').parent().removeClass("active");
                $('input:checked').parent().addClass("active");
            });

            initializeTinyMceEditor('textarea.jobDescriptionEditor');
            initializeTinyMceEditor('textarea.companyDescriptionEditor');

            $('input[name=jobLocation]').on('change', function() {
                if ($(this).is(':checked') && $(this).val() == 'office') {
                    $('.jobOfficeLocationDiv').show();
                    $('.jobRegionalRestrictionDiv').hide();
                } else if ($(this).is(':checked') && $(this).val() == 'remote_region') {
                    $('.jobOfficeLocationDiv').hide();
                    $('.jobRegionalRestrictionDiv').show();
                } else {
                    $('.jobOfficeLocationDiv').hide();
                    $('.jobRegionalRestrictionDiv').hide();
                }
            });

            $('input[name=jobPostType]').on('change', function() {
                var initialPrice = parseFloat($('.intialJobPrice').val());
                var finalPrice = 0;

                if ($(this).is(':checked') && $(this).val() == 'premium') {
                    finalPrice = initialPrice + parseFloat($('.additionalJobPrice').val())
                } else {
                    finalPrice = initialPrice;
                }

                $('.totalJobPrice').text("{{ CustomHelper::printCurrency() }}" + parseFloat(finalPrice));
            });
            var forms = document.querySelectorAll('.needs-validation')
                Array.prototype.slice.call(forms)
                    .forEach(function (form) {
                    form.addEventListener('submit', function (event) {
                        console.log(form);
                        if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                        }

                        form.classList.add('was-validated')
                    }, false)
                    })
        });
    </script>

@endsection

