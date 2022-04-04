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
                    <div class="col-md-10 col-lg-6 col-xl-6">
                         <div class="card overflow-hidden p-5">
                            <div class="bg-soft">
                                <div class="row justify-content-center">
                                    <div class="col-12">
                                        <div class="p-4">
                                            <p class="header-style text-center"><i class="bi bi-book-half"></i>Sign up to find work you love</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            
                                <!-- <div class="col-6 form-group">
                                    <div class="card mb-3" style="max-width: 18rem;">
                                        <div class="d-flex justify-content-end mr-2">
                                           <input class="form-check-input" type="" required {{ old('jobLocation') == 'office' ? 'checked' : '' }} value="client" name="typework" id="client">
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
                                </div>     -->
                            <div class="p-2">
                                <form method="POST" class="form-horizontal" action="{{ route('signup.post') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mt-1 justify-around row p-2">
                                        @if(!empty(\Config::get('constants.role'))) 
                                            @foreach(\Config::get('constants.role') as $key => $value)
                                                <div class="col-6 form-group">
                                                    <div class="card mb-3" style="max-width: 18rem;">
                                                        <div class="d-flex justify-content-end mr-2">
                                                        <input class="form-check-input" type="radio" required {{ old('role') == $key ? 'checked' : '' }} value="{{ $key }}" name="role" id="role_{{ $key }}">
                                                        </div>
                                                        <div class="card-body text-primary mt-3 flex justify-center text-center">
                                                            <img 
                                                                class="text-white text-center">
                                                                <i class="mdi mdi-account-circle-outline fa-3x"></i></img>
                                                            <p class="card-text" for="role_{{ $key }}">{{ $value }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                    <div class="mb-3">
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="useremail"
                                        value="{{ old('email') }}" name="email" placeholder="Enter email" autofocus required>
                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="mb-3">
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        value="{{ old('name') }}" id="username" name="name" autofocus required
                                            placeholder="Enter username">
                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="mb-3">
                                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="userpassword" name="password"
                                            placeholder="Enter password" autofocus required>
                                            @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    
                                    <select class="form-select" name="country" id="country" value="{{ old('country') }}" autofocus required>
                                         <option disabled selected>Enter Country</option>
                                         @if(!empty(\Config::get('constants.country'))) 
                                            @foreach(\Config::get('constants.country') as $key => $country)
                                                <option value="{{ $key }}" required name="country" id=country_{{$key}} {{ old('country') == $key ? 'selected' : '' }}>{{ $country }}</option>
                                            @endforeach
                                        @endif
                                    </select>

                                    <div class="mb-3">
                                        <label for="userdob">Date of Birth</label>
                                        <div class="input-group" id="datepicker1">
                                            <input type="text" class="form-control @error('dob') is-invalid @enderror" placeholder="dd-mm-yyyy"
                                                data-date-format="dd-mm-yyyy" data-date-container='#datepicker1' data-date-end-date="0d" value="{{ old('dob') }}"
                                                data-provide="datepicker" name="dob" autofocus required>
                                            <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                            @error('dob')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="avatar">Profile Picture</label>
                                        <div class="input-group">
                                            <input type="file" class="form-control @error('avatar') is-invalid @enderror" id="inputGroupFile02" name="avatar" autofocus required>
                                            <label class="input-group-text" for="inputGroupFile02">Upload</label>
                                        </div>
                                        @error('avatar')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>


                                    <div class="form-check mb-3 ">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        <p style="font-family: 'Urbanist','sans-serif'" class="text-left">
                                            Agree to the <a href="#" class="linkcolor">Skadoosh Term of Service</a>. 
                                        </p>
                                    </div>
                                    </div>

                                    <div class="mt-2 d-grid">
                                        <button class="nav_signup_credential"
                                            type="submit">Create my account</button>
                                    </div>

                                </form>
                            </div>
                            <div class="mt-3 text-center">
                                <p style="font-family: 'Urbanist','sans-serif'">Already have an account? <a href="{{ url('/nx/login') }}" class="linkcolor">Log In</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @endsection
@section('script')
    <script src="{{ URL::asset('/admin_assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
@endsection
