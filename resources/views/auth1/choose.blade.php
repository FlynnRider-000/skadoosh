@extends('layouts.backend.master-without-nav')

@section('title')
    @lang('translation.Register')
@endsection
@section('css')
    <link href="{{ URL::asset('/admin_assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" rel="stylesheet" type="text/css">
@endsection
@section('body')

    <body>
    @endsection

    @section('content')
    @include('layouts.frontend.stylelib')
    @include('layouts.frontend.header')
        <div class="account-pages my-5 pt-sm-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                         <div class="card overflow-hidden">
                            <div class="bg-soft">
                                <div class="row justify-content-center">
                                    <div class="col-12">
                                        <div class="p-4">
                                            <p class="header-style text-center"><i class="bi bi-book-half"></i>Join as a client or freelancer</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-10 justify-around row p-2">
                                <div class="col-6 form-group">
                                    <div class="card mb-3" style="max-width: 18rem;">
                                        <div class="d-flex justify-content-end mr-2">
                                           <input class="form-check-input" type="radio" required {{ old('jobLocation') == 'office' ? 'checked' : '' }} value="client" name="typework" id="client">
                                        </div>
                                        
                                        <div class="card-body text-primary mt-3 flex justify-center text-center">
                                            <img 
                                                class="text-white text-center">
                                                <i class="mdi mdi-account-circle-outline fa-3x"></i></img>
                                            <p class="card-text">I'm a client, hiring for a project</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 form-group">
                                    <div class="card mb-3" style="max-width: 18rem;">
                                        <div class="d-flex justify-content-end mr-2">
                                           <input class="form-check-input" type="radio" required {{ old('jobLocation') == 'office' ? 'checked' : '' }} value="freelancer" name="typework" id="freelancer">
                                        </div>
                                        
                                        <div class="card-body text-primary mt-3 flex justify-center text-center">
                                            <img 
                                                class="text-white text-center">
                                                <i class="mdi mdi-file-find fa-3x"></i></img>
                                            <p class="card-text">I'm a freelancer, looking for work</p>
                                        </div>
                                    </div>
                                </div>    
                                <!-- <div class="form-check mb-3 col-6 card">
                                    <input class="form-check-input" type="radio" required {{ old('jobLocation') == 'office' ? 'checked' : '' }} value="office" name="jobLocation" id="jobLocationOffice">
                                    <label class="form-check-label" for="jobLocationOffice">
                                        Location based (in office)
                                    </label>
                                </div> -->
                                <!-- <div class="form-check mb-3 col-6 card">
                                    <input class="form-check-input" type="radio" required {{ old('jobLocation') == 'office' ? 'checked' : '' }} value="office" name="jobLocation" id="jobLocationOffice">
                                    <label class="form-check-label" for="jobLocationOffice">
                                        Location based (in office)
                                    </label>
                                </div> -->
                            </div>
                            <div class="text-center p-3">
                               <a href="{{ url('/nx/signup/info') }}" class="nav_signup_credential" type="submit">Create Account</a>
                            </div>
                            <div class="mt-3 text-center">
                                <p style="font-family: 'Urbanist','sans-serif'">Already have an account? <a href="{{ url('/nx/login') }}" class="linkcolor">Log In</a></p>
                            </div>
                        </div>
                        <!--<div class="mt-5 text-center">

                            <div>
                                <p>Already have an account ? <a href="{{ url('login') }}" class="fw-medium text-primary">
                                        Login</a> </p>
                                <p>© <script>
                                        document.write(new Date().getFullYear())

                                    </script> Skote. Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesbrand
                                </p>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>

    @endsection
@section('script')
    <script src="{{ URL::asset('/admin_assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
@endsection
