@extends('layout.master')

@section('title')
    Shop
@endsection

@section('content')

    <div class="pc-container">
        <div class="pc-content">
        <div class="row ">
            <div class="col-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex flex-wrap gap-1">
                            <div class="flex-grow-1">
                                <h6 class="mb-1">Shop</h6>
                            </div>
                            <div class="flex-shrink-0">
                                <a href="{{ route('shop.create') }}" class="btn btn-sm btn-primary"><i
                                        class="ace-icon fa fa-floppy-o"></i> Add Record </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @include('layout.alerts')
                        <div class="">
                            <table class="table table-sm" id="yajra-table" ></table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end row-->
    </div>
    </div>


    <!--- delete confirmation modal --->
    <div class="modal" tabindex="-1" role="dialog" id="closeShopPopUp">
        <div class="modal-dialog" role="document">
            <div class="modal-content">


                <form action="#" method="post" id="close_shop_form">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">confirmation</h5>
                    </div>
                    <div class="modal-body">
                        <p>Do you really want to close shop and marge stock ?</p>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Marge
                                        Shop Stock </label>
                                    <div class="col-sm-9">
                                        <input type="hidden" id="close_shop_id" name="close_shop_id" value="">
                                        <select class="form-control" name="shop_id" id="shop_id">
                                        </select>
                                    </div>
                                </div>


                            </div>

                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" onclick="doCloseShop();" class="btn btn-primary">Yes</button>
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

        var shopsJson = '<?= json_encode($shops) ?>';

        function closeShop(shopId) {
            $('#close_shop_id').val(shopId);
            $('#closeShopPopUp').modal('show');
            var shops = JSON.parse(shopsJson);
            var shopHtml = '<option value="">Select Shop</option>';
            $(shops).each(function (index, ele) {
                if (shopId != ele.id) {
                    shopHtml += '<option value="' + ele.id + '" >' + ele.name + '</option>';
                }
            });
            $('#shop_id').html(shopHtml);
        }

        function doCloseShop() {
            let myform = document.getElementById("close_shop_form");
            let fdata = new FormData(myform);


            $.ajax({
                data: fdata,
                cache: false,
                processData: false,
                contentType: false,
                type: 'POST',
                dataType: "JSON",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ route('shop.close') }}",
                success: function (res, textStatus, jqXHR) {
                    alert(res);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    // console.log(textStatus,jqXHR, errorThrown);
                    if (jqXHR.status != 200) {
                        if (typeof jqXHR.responseJSON !== 'undefined') {
                            $.confirm({
                                title: 'Error',
                                content: jqXHR.responseJSON.message
                            });
                        }
                    }
                }
            });
        }


        function deleteConfirmation(id) {
            selectID = id;
            $.confirm({
                title: 'Confirmation',
                content: 'Do you really want to change status ?',
                buttons: {
                    yes: {
                        text: 'Yes',
                        action: function () {
                            var changeURL = "{{ route('shop.delete','') }}";
                            window.location = changeURL + '/' + selectID;
                        }
                    },
                    no: {
                        text: 'No',
                        action: function () {

                        }
                    }
                }
            });
        }

        function deleteConfirmation(id) {
            selectID = id;
            $.confirm({
                title: 'Confirmation',
                content: 'Do you really want to change status ?',
                buttons: {
                    yes: {
                        text: 'Yes',
                        action: function () {
                            var changeURL = "{{ route('shop.delete','') }}";
                            window.location = changeURL + '/' + selectID;
                        }
                    },
                    no: {
                        text: 'No',
                        action: function () {

                        }
                    }
                }
            });
        }


        function doChangeStatus(objID) {
            var changeURL = "{{ route('shop.status','') }}";
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
                processing: true,
                serverSide: true,
                ajax: "{{ route('shop.list') }}",
                columns: [
                    {data: 'id', name: 'id', title: 'ID'},
                    {
                        data: 'name',
                        title: 'Name',
                        render: function (data, type, row, meta) {
                            return row.name;
                        }
                    },
                    {
                        data: 'shop_manager',
                        name: 'shop_manager',
                        title: 'Shop Manager',
                        width: '10%'
                    },
                    {
                        data: 'address',
                        name: 'address',
                        title: 'Address',
                        width: '15%'
                    },
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
                // order: [[1, 'asc']]
            });
        });
    </script>
@endsection
