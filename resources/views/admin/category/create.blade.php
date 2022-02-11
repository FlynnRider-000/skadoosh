@extends('layouts.backend.master')
@section('title') Categories @endsection
@section('css')
    
@endsection

@section('content')
@component('components.breadcrumb')
@slot('li_1') Categories @endslot
@slot('title') Create @endslot
@endcomponent
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <form class="needs-validation" action="{{ url('admin/category') }}" novalidate method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="categoryName" class="form-label">Category name</label>
                                <input type="text" name="name" class="form-control" id="categoryName" placeholder="Category name"
                                    value="" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="invalid-feedback">
                                    Please enter a category name.
                                </div>                                
                            </div>
                        </div>
                    </div>
                    <div class="form-check mb-3">
                        <input class="form-check-input" name="active" type="checkbox" id="categoryActive">
                        <label class="form-check-label" for="categoryActive">
                            Active
                        </label>
                    </div>

                    <div>
                        <button class="btn btn-primary" type="submit">Update</button>
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

    <script src="{{ URL::asset('/admin_assets/js/pages/form-validation.init.js') }}"></script>
@endsection