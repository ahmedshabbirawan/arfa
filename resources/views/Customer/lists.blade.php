@extends('layout.master')
@section('title')
    Customers
@endsection

@section('content')

    <div class="pc-container">
        <div class="pc-content">

            <div class="card">


                <div class="card-header pt-2 pb-2">
                    <div class="d-flex flex-wrap gap-1">
                        <div class="flex-grow-1">
                            <h4 class="mb-1">Customers</h4>
                        </div>
                        <div class="flex-shrink-0">
                            <a href="{{ route('customer.create') }}" class="btn btn-sm btn-primary bigger"><i
                                    class="ace-icon fa fa-floppy-o"></i> Add Record </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @include('layout.alerts')
                    <div class="table-responsive">
                        <table class="table table-sm" id="yajra-table"
                               style="width:100%"></table>
                    </div>
                </div>
            </div>
        <!--end row-->
    </div></div>



    <!--- delete confirmation modal --->
    <div class="modal" tabindex="-1" role="dialog" id="deletePopup">
        <div class="modal-dialog" role="document">
            <div class="modal-content">


                <form action="#" method="post" id="delete_form">
                    <input type="hidden" name="_method" value="delete"/>
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">confirmation</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Do you really want to delete ?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Confirm</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
    <!--- delete confirmation modal end --->
@endsection




@section('script')
    <script>
        var table;
        var selectID;

        function deleteConfirmation(id) {
            selectID = id;
            $.confirm({
                title: 'Confirmation',
                content: 'Do you really want to change status ?',
                buttons: {
                    yes: {
                        text: 'Yes',
                        action: function () {
                            var changeURL = "{{ route('customer.delete','') }}";
                            // alert(changeURL);
                            window.location = changeURL + '/' + selectID;
                        }
                    },
                    no: {
                        text: 'No', // With spaces and symbols
                        action: function () {

                        }
                    }
                }
            });
        }


        function doChangeStatus(objID) {
            var changeURL = "{{ route('customer.status','') }}";
            $.ajax({
                dataType: 'json',
                type: 'get',
                url: changeURL + '/' + objID,
                success: function (res) {
                    console.log('yes');
                    if (res.status) {
                        table.ajax.reload();
                        $('#statusPopup').modal('hide');
                    }
                }
            });
        }


        function changeStatus(id) {
            selectID = id;
            $.confirm({
                title: 'Confirmation',
                content: 'Do you really want to change status ?',
                buttons: {
                    yes: {
                        text: 'Yes',
                        action: function () {
                            doChangeStatus(id);
                        }
                    },
                    no: {
                        text: 'No', // With spaces and symbols
                        action: function () {

                        }
                    }
                }
            });
        }

        $(document).ready(function () {

            console.log('i am db');
            table = $('#yajra-table').DataTable({
                // lengthMenu: [
                //         [1, 2, 3, -1],
                //         [1, 2, 3, 'All'],
                //     ],
                // "aLengthMenu": [[1,5,10, 25, 50, 100, -1], [1,5,10, 25, 50, 100, "All"]],
                // 					"iDisplayLength": -1,
                // dom: 'Bfrtip',
                // buttons: ['excel'],
                iDisplayLength: -1,
                processing: true,
                serverSide: true,
                ajax: "{{ route('customer.list') }}",
                columns: [
                    {data: 'id', name: 'id', title: 'ID'},
                    // {
                    //     "data": "id",
                    //     title: 'Sr.',
                    //     // render: function(data, type, row, meta) {
                    //     //     return meta.row + meta.settings._iDisplayStart + 1;
                    //     // }
                    // },
                    {
                        data: 'name',

                        title: 'Name',
                        render: function (data, type, row, meta) {
                            return row.name;
                        }
                    },
                    {
                        data: 'cnic',
                        name: 'cnic',
                        title: 'CNIC',
                        width: '10%'
                    },
                    {
                        data: 'mobile',
                        name: 'mobile',
                        title: 'Mobile',
                        width: '10%'
                    },
                    {
                        data: 'email',
                        name: 'email',
                        title: 'Email',
                        width: '10%'
                    },

                    {
                        data: 'address',
                        name: 'address',
                        title: 'Address',
                        width: '15%'
                    },
                    // {
                    //     data: 'address',
                    //     name: 'address',
                    //     title: 'Address',
                    //     width: '15%'
                    // },
                    // {
                    //     data: 'city_name',
                    //     name: 'city_name',
                    //     title: 'City',
                    //     width: '10%'
                    // },
                    {
                        data: 'status_label',
                        name: 'status',
                        title: 'Status'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        title: 'Action'
                    }
                ],
                order: [[0, 'desc']]
            });
        });
    </script>
@endsection
