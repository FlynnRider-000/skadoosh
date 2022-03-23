@extends('layouts.backend.master')
@section('title') Company | Create @endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') Companies @endslot
@slot('title') Create @endslot
@endcomponent
<div class="row">
  <div class="col-xl-12">
    <div class="card">
      <div class="card-body">
      <form class="needs-validation" action="{{ url('admin/company') }}" novalidate method="POST" enctype="multipart/form-data">
          @csrf
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
                      <input type="email" name="companyEmail" value="{{ old('companyEmail') }}" class="form-control" id="companyEmail" placeholder="example@example.com"
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
                      <input type="text" name="companyWebsite" value="{{ old('companyWebsite') }}" class="form-control" id="companyWebsite" placeholder="https://google.com"
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
                      <input type="text" name="companyTwitter" value="{{ old('companyTwitter') }}" class="form-control" id="companyTwitter" placeholder="e.g. @Twitter"
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
                      <input type="text" name="companyLocation" value="{{ old('companyLocation') }}" class="form-control" id="companyLocation" placeholder="New York, City"
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
          <div>
              <button class="btn btn-success" type="submit">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
@section('script')
    <script src="{{ URL::asset('/admin_assets/libs/parsleyjs/parsleyjs.min.js') }}"></script>
    <!--tinymce js-->
    <script src="{{ URL::asset('/admin_assets/libs/tinymce/tinymce.min.js') }}"></script>

    <!-- init js -->
    <script src="{{ URL::asset('/admin_assets/js/pages/form-validation.init.js') }}"></script>
    <script src="{{ URL::asset('/admin_assets/js/pages/form-editor.init.js') }}"></script>
@endsection