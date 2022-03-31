@extends('layouts.admin.index')

@section('title', 'List of Jobs')

@section('content_header', 'List of Jobs')

@section('content')

    <div class="row">
        <div class="col-xs-12">
            <div class="widget-box">
                <div class="widget-header">
                    @include('admin.job.partial.addButton')
                </div>

                <div class="widget-body">
                    <div class="widget-main">

                        <table id="list-table" class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Title</th>
                                <th>Job Type</th>
                                <th>Location</th>
                                <th>Apply</th>
                                <th>Premium</th>
                                <th>Category</th>
                                <th>Company</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        var jobUrl = "{{route('admin.load-jobs')}}";
    </script>
    <script src="{{ asset('/admin_assets/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('/admin_assets/js/jquery.dataTables.bootstrap.min.js')}}"></script>
    <script src="{{ asset('/admin_assets/js/job.index.js')}}"></script>
@endsection
