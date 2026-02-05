@extends('layout.master')
@section('title','Role List')
@section('Title','User Management')
@section('URL',route("usermanagement.role.list"))
@section('PageName','Roles')
@section('content')

    <div class="pc-container">
        <div class="pc-content">

        @include('layout.alerts')
        <div class="card">
            <div class="card-header">
                <div class="d-flex flex-wrap gap-1">
                    <div class="flex-grow-1">
                        <h4 class="mb-1">Roles</h4>
                    </div>
                    <div class="flex-shrink-0">
                        <a href="{{route('usermanagement.role.create')}}" class="btn btn-sm btn-primary" >Add New </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="simple-table" class="table table-sm table-bordered table-hover datatable">
                        <thead>
                        <tr>
                            <th class="center">SR</th>
                            <th class="center">Role Name</th>
                            <th class="center" class="hidden-480">Status</th>
                            <th class="center" class="hidden-480">Action</th>
                        </tr>
                        </thead>

                        <tbody>
                        <tr>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    </div>
@stop

@section('script')
    <script>
        $(document).ready(function () {
            var table = $('.datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('usermanagement.role.list') }}",
                columns: [
                    {data: 'DT_RowIndex', searchable: false, orderable: false, "width": "2%"},
                    {data: 'name', name: 'name', "className": "dt-center"},
                    {data: 'status', name: 'status', "className": "dt-center"},
                    {data: 'action', name: 'action', "className": "dt-center"},
                ]
            });
        });
    </script>
@stop
