@extends('layouts.backend.master')
@section('title') Categories @endsection
@section('css')
    <!-- DataTables -->
    <link href="{{ URL::asset('/admin_assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Sweet Alert-->
    <link href="{{ URL::asset('/admin_assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />    
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/admin_assets/libs/toastr/toastr.min.css') }}">    
@endsection

@section('content')
@component('components.breadcrumb')
@slot('li_1') Categories @endslot
@slot('title') Categories @endslot
@endcomponent
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table id="categories-datatable" class="table table-bordered dt-responsive table-striped nowrap w-100">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            {{-- @if(!empty($categories))
                                @foreach($categories as $index=> $category)
                                    <tr>
                                        <td>{{ $index+1 }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>
                                            @if($category->active == true) 
                                                <span class="badge rounded-pill bg-success">active</span> 
                                            @else 
                                                <span class="badge rounded-pill bg-danger">inactive</span> 
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ url('admin/category/'. $category->id . '/edit') }}">
                                                <i class="bx bx-edit text-primary"></i> Edit
                                            </a>
                                            <a class="categoryDelete" href="{{ url('admin/category', ['id'=>$category->id]) }}">
                                                <i class="bx bx-trash text-danger"></i> Delete
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif --}}
                        </tbody>
                    </table>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection
@section('script')
    <!-- Required datatable js -->
    <script src="{{ URL::asset('/admin_assets/libs/datatables/datatables.min.js') }}"></script>
    <!-- Sweet Alerts js -->
    <script src="{{ URL::asset('/admin_assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>
    <!-- toastr plugin -->
    <script src="{{ URL::asset('/admin_assets/libs/toastr/toastr.min.js') }}"></script>

    {{-- <script src="{{ URL::asset('/admin_assets/libs/jszip/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('/admin_assets/libs/pdfmake/pdfmake.min.js') }}"></script> --}}
    <!-- Datatable init js -->
    {{-- <script src="{{ URL::asset('/admin_assets/js/pages/datatables.init.js') }}"></script> --}}
    <script>
        $(document).ready(function(){
            var cateDataTable = $("#categories-datatable").DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.load-categories') }}",
                columns: [
                    { data: 'id' },
                    { data: 'name' },
                    { data: 'active' },
                    { data: 'action' },
                ]
            });

            $("#categories-datatable").on('click', '.categoryDelete', function (e) {
                e.preventDefault();
                var token = $("meta[name='csrf-token']").attr("content");
                var url = $(this).attr('href');                
                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: !0,
                    confirmButtonColor: "#34c38f",
                    cancelButtonColor: "#f46a6a",
                    confirmButtonText: "Yes, delete it!"
                }).then(function (result) {
                    if(result.value){
                        $.ajax({
                            url: url,
                            type: "DELETE",
                            data: {
                                "_token": token,
                            },
                            success: function (result) {
                                if(result.status == 1) {
                                    cateDataTable.ajax.reload();
                                    toastr["success"](result.message);
                                }else{
                                    toastr["error"](result.message);
                                }
                            }
                        });
                    }
                })
            })
        })
    </script>
@endsection