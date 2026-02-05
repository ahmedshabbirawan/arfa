@extends('layout.master')
@section('title')
    Products
@endsection
@section('content')
    <div class="pc-container">
    <div class="pc-content">
        <?php
        $actionURL = route('simple_product.store');
        ?>
        <!-------------------------------------------------------------------->
        <div class="row ">
                <div class="card pt-0 mt-0">

                    <div class="card-header pt-2 pb-2">
                        <div class="d-flex flex-wrap gap-1">
                            <div class="flex-grow-1">
                                <h6 class="mb-1">Products</h6>
                            </div>
                            <div class="flex-shrink-0">
                                <a href="javascript:void(0);" onclick="pos_app.import_product_modal();"
                                   class="btn btn-sm btn-light bigger"><i class="ace-icon fa fa-file-o"></i> Import Products </a>
                                <a href="{{ route('simple_product.create') }}" class="btn btn-sm btn-light bigger"><i
                                        class="ace-icon fa fa-floppy-o"></i> Add Record </a>
                            </div>
                            </div>
                    </div>


                    <div class="card-footer" style="border-bottom: 1px solid var(--bs-card-border-color);">
                        <form method="post" id="product_form" action="{{ isset($product) ? route('simple_product.update', $product->id) : route('simple_product.store') }}" novalidate class="form-horizontal product_form">
                        @csrf
                            <div class="row">
                                <div class="col-lg-1 col-sm-4">

                                    <h6 class="mt-4">Quick Add</h6>
                                </div>
                                <div class="col-lg-4 col-sm-4">
                                    <label for="form-field-1"> Product Name: </label>
                                    <div class="">
                                        <input type="text" required
                                               class="form-control form-control-sm @error('name') is-invalid @enderror "
                                               value="{{old('name', (isset($product))? $product->name : '' )}}"
                                               name="name" id="name" placeholder="Name">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-4">
                                    <label class="" for="form-field-1"> Price:</label>
                                    <div class="">
                                        <input type="text"
                                               class="form-control form-control-sm @error('price') is-invalid @enderror"
                                               value="{{ old('price',(isset($price))? $product->price : '') }}"
                                               name="price" id="price" placeholder="Price">
                                    </div>
                                </div>
                                <div class="col-lg-2 col-sm-4">
                                    <label class="" for="form-field-1"> UOM:</label>
                                    <div class="">
                                        <select name="uom_id" id="uom_id" class="form-control  form-control-sm">
                                            @foreach($uoms as $id => $name)
                                                <option value="{{ $id }}">{{ $name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-sm-4">
                                    <label class="" for="form-field-1"> &nbsp; </label>
                                    <div class="">
                                        <button class="btn btn-sm btn-info" onclick="checkValidation();" type="button">
                                            <i class="ace-icon fa fa-check bigger-110"></i>
                                            Submit
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-body">
                        @include('layout.alerts')
                        <div class="table-responsive">
                            <table class="table table-sm" id="yajra-table" ></table>
                        </div>
                    </div>
                </div>
        </div>
        <!--end row-->
    </div>
    </div>
    <div id="import_product_modal_con"></div>

@endsection



@section('script')
    @yield('category_script')
    <script>


        var listTable;
        var selectID;


        function checkValidation() {
            $(".btn-info").LoadingOverlay("show");
            let myform = document.getElementById("product_form");
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
                url: "{{ $actionURL }}",
                success: function (res, textStatus, jqXHR) {
                    $(".btn-info").LoadingOverlay("hide");
                    if (jqXHR.status == 200) {
                        if (typeof res.data.product !== 'undefined') {
                            $.confirm({
                                title: 'Success',
                                content: res.message,
                                buttons: {
                                    yes: {
                                        text: 'OK',
                                        action: function () {
                                            listTable.ajax.reload();
                                        }
                                    }
                                }
                            });
                        }
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    $(".btn-info").LoadingOverlay("hide");
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
                            var changeURL = "{{ route('product.delete','') }}";
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
            var changeURL = "{{ route('product.status','') }}";
            $.ajax({
                dataType: 'json',
                type: 'get',
                url: changeURL + '/' + objID,
                success: function (res) {
                    console.log('yes');
                    if (res.status) {
                        listTable.ajax.reload();
                        //  $('#statusPopup').modal('hide');
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
            var dataColumns = [
                {data: 'id', name: 'id', title: 'ID.', width: '10%'},
                // {"data": "image_url",title: 'Image',
                //     render: function(data, type, row, meta) {
                //         return '<image src="'+data+'" style="width:75px; height:75px;" >';
                //     }, width: '10%'
                // },
                {data: 'product_name', name: 'product_name', title: 'Name',},

                    @if(auth()->user()->hasRole('Super Admin'))
                {
                    data: 'cost_price', name: 'cost_price', title: 'Cost Price',
                },
                    @endif

                {
                    data: 'price', name: 'price', title: 'Sale Price',
                },
                {data: 'code', name: 'code', title: 'UOM', width: '10%'},
                {data: 'stock_available', name: 'stock_available', title: 'Total Stock', width: '10%'}
            ];


                <?php
            foreach ($shops as $shop):
                ?>
            dataColumns.push({
                data: 'shop_<?= $shop->id ?>',
                name: 'shop_<?= $shop->id ?>',
                title: '<?= $shop->name ?>'
            });
            <?php
            endforeach;
                ?>
            //  dataColumns.push({ data: 'status_label', name: 'status', title: 'Status', width: '10%'  });
               dataColumns.push({ data: 'action', name: 'action', title: 'Action', width: '15%' });

            setTimeout(() => {
                listTable = $('#yajra-table').DataTable({
                    sort: true,
                    // paging: false,
                    aLengthMenu: [
                        [25, 50, 100, 200, "All"],
                        [25, 50, 100, 200, "All"]
                    ],
                    iDisplayLength:10,
                    //  dom: 'Bfrtip',
                    buttons: [
                        'excel', 'pdf'
                    ],
                    // paging: false,
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url: "{{ route('product.list') }}",
                        type: 'GET',
                        data: function (d) {
                            var idz = [];
                            $($('.attributes_id')).each(function (index, ele) {
                                idz.push($(ele).val());
                            });
                            d.product_category_id = $('#product_category_id').val();
                            d.attribute_idz = idz;
                        }
                    },
                    columns: dataColumns,
                    order: [[1, 'asc']]
                });
            }, 500);
        });

        function apply_Filter() {
            console.log('hello');
            listTable.ajax.reload();
        }
    </script>
@endsection
