@extends('layout.master')

@section('title')
    Add Purchase
@endsection
@section('content')
    <style>
        @media only screen and (max-width: 600px) {
            .page-content > .row .col-lg-12, .page-content > .row .col-md-12, .page-content > .row .col-sm-12, .page-content > .row .col-xs-12 {
                float: none;
                width: 100%;
            }

            /* .product_add_text{
              display: none;
            } */
            #product_attribute {
                min-height: 50px;
            }

            .product_list_table {
                overflow-y: scroll;
            }
        }
    </style>
    <?php


    $rec_name = 'N/A';
    $rec_designation = 'N/A';
    $rec_cnic = 'N/A';
    $rec_phone = 'N/A';

    $hand_name = 'N/A';
    $hand_designation = 'N/A';
    $hand_cnic = 'N/A';
    $hand_phone = 'N/A';

    $purchase_date = date('d-m-Y');
    $poi = '';
    $amount_category = '';
    $amount_delivery = '';
    $challan_no = '';
    $ledger = '';
    $page_no = '';



    $categoryID = '';
    $subCategoryID = '';
    $productCategoryID = '';
    $name = '';
    $productID = '';
    $uomID = '';
    $qty = '';
    ?>
    <div class="pc-container">
        <div class="pc-content">
            <form method="post" id="product_form" action="" novalidate class="form-horizontal product_form">
                @csrf
                <input type="hidden" name="id" value="">
                <div class="card">

                    <div class="card-header">
                    <div class="d-flex flex-wrap gap-1">
                        <div class="flex-grow-1">
                            <h6 class="mb-1">Add Purchase</h6>
                            <p class="text-muted text-sm mb-0">DM on <a href="#" class="text-primary">@williambond</a></p>
                        </div>
                        <div class="flex-shrink-0">
                            <span class="invoice-info-label">Time:</span>
                            <span class="red">{{ date('h:i a') }}</span>

                            <br/>
                            <span class="invoice-info-label">Date:</span>
                            <span class="blue">{{ date('d-m-Y',time()) }}</span>
                        </div>
                    </div>
                    </div>

                    <div class="card-header">
                        <h6 class="mb-1">Bill Info</h6>
                            <div class="row">

                                <div class="col-lg-3 col-sm-12">
                                    <label for="supplier_id">Supplier</label>
                                    <select name="supplier_id" id="supplier_id" class="col-lg-12 col-sm-12 form-control form-control-sm" required>
                                        <option value=""> -- Select --</option>
                                        <?php foreach ($suppliers as $key => $val) : ?>
                                        <option value="<?= $key ?>"><?= $val ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="col-lg-3 col-sm-12">
                                    <label>Purchase Date</label>
                                    <div class="input-group">
                                        <input type="text" required class="col-sm-12 input_date form-control form-control-sm"
                                               value="{{ $purchase_date }}" data-date-format="dd-mm-yyyy"
                                               name="purchased_date" id="purchased_date"
                                               placeholder="Purchase Date">
                                    </div>
                                </div>

                                <div class="col-lg-3 col-sm-12">
                                    <label for="delivery_challan_no">Delivery Challan / Invoice No</label>
                                    <input type="text" required class="form-control form-control-sm col-sm-12" value=""
                                           name="delivery_challan_no" id="delivery_challan_no"
                                           placeholder="Challan/Invoice No">
                                </div>

                                <div class="col-lg-3 col-sm-12">
                                    <label for="delivery_amount">Delivery Amount</label>
                                    <input type="text" required class="form-control form-control-sm col-sm-12 form-control"
                                           value="{{ $amount_delivery }}" name="delivery_amount"
                                           id="delivery_amount" placeholder="Delivery Amount">
                                </div>
                            </div>
                    </div>

                    <div class="card-header">
                            <input type="hidden" name="id" value="">
                            <div class="widget-main">
                                <div class="row">
                                    <div class="col-lg-8 col-sm-3 mb-1">
                                        <label class="form-label" for="product_select2"> Search Product  </label>
                                        <div class="my-1 input-group input-group-sm mb-0 ">
                                            <div class="input-group-text" onclick="pos_app.showAddProductModal();"><i class="ti ti-plus"></i></div>
                                            <select class="form-control-sm" style="width: calc(100% - 40px);" name="product_id" id="product_id"></select>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-sm-3 mb-1">
                                        <label class="form-label" for="form-field-1"> Shop : </label>
                                        <div class="my-1 input-group input-group-sm mb-0 ">
                                            <select name="shop_id" id="shop_id"
                                                    class="form-control form-control-sm select21" required >

                                                <?php foreach ($shops as $id => $name) : ?>
                                                <option value="<?= $id ?>"><?= $name ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-sm-12">
                                        <label class="" for="form-field-1"> Purchase Price </label>
                                        <div>
                                            <input type="text" required class="form-control form-control-sm stock_item_input"
                                                   value="" name="unit_price" id="unit_price"
                                                   placeholder="Unit Price">
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-sm-3"><label class="" for="form-field-1"> Quantity
                                           <span style="color: #ba4444;">Current Quantity : <b id="current_qty"> -- </b></span> </label>
                                        <div><input type="text" required class="form-control form-control-sm stock_item_input"
                                                    value="" name="qty" id="qty" placeholder="Quantity"></div>
                                    </div>

                                    <div class="col-lg-4 col-sm-1">
                                        <label class="" for="form-field-1"> UOM : </label>
                                        <div>
                                            <input type="hidden" required class="form-control stock_item_input"
                                                   value="" readonly="on" name="uom_id" id="uom_id"
                                                   placeholder="UOM">
                                            <input type="text" required class="form-control form-control-sm stock_item_input"
                                                   value="" readonly="on" name="uom_code" id="uom_code"
                                                   placeholder="UOM">
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>

                    <div class="card-header pt-2 pb-2 d-grid gap-2 mt-2 " >
                        <button type="button" class="btn btn-primary btn-block" id="add-item-purchase" onclick="saveProduct();">
                            <i class="ti ti-arrow-down me-1"></i>
                            Add item to purchase </button>
                    </div>

                    <div class="card-body">
                            <h6 class="mb-1">Purchase Product(s)</h6>
                            <div class="widget-main padding-10">
                                <div class="row">
                                    <div class="col-lg-12 col-sm-12 product_list_table">
                                        <table class="table table-sm table-striped table-bordered table-responsive">
                                            <thead>
                                            <tr>
                                                <th class="center">#</th>

                                                <th>Product</th>
                                                <th>Description</th>
                                                <th>Qty</th>
                                                <th>Purchase Unit Price</th>
                                                <th>Total Price</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody id="product_list"></tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="hr hr8 hr-double hr-dotted"></div>

                                <div>
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered">
                                            <tr>
                                                <th></th>
                                                <th>Received By</th>
                                                <th>Handed Over By</th>
                                            </tr>
                                            <tr>
                                                <td>Name</td>
                                                <td><input type="text" required class="input-sm col-sm-12"
                                                           value="{{ $rec_name }}" name="rec_by_name" id="rec_by_name"
                                                           placeholder="Name"></td>
                                                <td>
                                                    <!-- <input type="text" name="rec_name" class="input-sm col-sm-12"> -->
                                                    <input type="text" required class="form-control"
                                                           value="{{ $hand_name }}" name="hand_name" id="hand_name"
                                                           placeholder="Name">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>CNIC</td>
                                                <td>
                                                    <!-- <input type="text" name="rec_name" class="input-sm col-sm-12"> -->
                                                    <input type="text" required class="input-sm col-sm-12"
                                                           value="{{ $rec_cnic }}" name="rec_by_cnic" id="rec_by_cnic"
                                                           placeholder="CNIC">
                                                </td>
                                                <td>
                                                    <!-- <input type="text" name="rec_name" class="input-sm col-sm-12"> -->
                                                    <input type="text" required class="input-sm col-sm-12"
                                                           value="{{ $hand_cnic }}" name="hand_cnic" id="hand_cnic"
                                                           placeholder="CNIC">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Phone #</td>
                                                <td>
                                                    <input type="text" required class="form-control"
                                                           value="{{ $rec_phone }}" name="rec_by_phone"
                                                           id="rec_by_phone" placeholder="Phone">
                                                    <!-- <input type="text" name="rec_name" class="input-sm col-sm-12"> -->
                                                </td>
                                                <td>
                                                    <input type="text" required class="input-sm col-sm-12"
                                                           value="{{ $hand_phone }}" name="hand_phone" id="hand_phone"
                                                           placeholder="Phone">
                                                    <!-- <input type="text" name="rec_name" class="input-sm col-sm-12"> -->
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Designation</td>
                                                <td>
                                                    <input type="text" required class="input-sm col-sm-12"
                                                           value="{{ $rec_designation }}" name="rec_by_designation"
                                                           id="rec_by_designation" placeholder="Designation">
                                                </td>
                                                <td>
                                                    <!-- <select name="designation" class="input-sm col-lg-12"><option>Please select</option></select> -->
                                                    <input type="text" required class="input-sm col-sm-12"
                                                           value="{{ $hand_designation }}" name="hand_designation"
                                                           id="hand_designation" placeholder="Designation">
                                                </td>
                                            </tr>
                                        </table>
                                    </div><!-- /.col -->
                                </div>

                                <div class="hr hr2"></div>
                                <div class="space"></div>


                                <div class="wizard-actions">
                                    <!--
                                    <button class="btn btn-prev" disabled="disabled">
                                          <i class="ace-icon fa fa-arrow-left"></i>
                                          Prev
                                    </button> -->

                                    <button type="button" onclick="submitDeliveryForm();" id="submit-delivery"
                                            class="btn btn-success btn-next" data-last="Finish">
                                        Submit
                                        <i class="ace-icon fa fa-arrow-right icon-on-right"></i>
                                    </button>
                                </div>


                            </div>
                        </div>

                </div>

            </form>
            </div>
        </div>


@endsection
@section('script')
    <script type="text/javascript">
        var ajaxFailBlock = function (jqXHR, textStatus, errorThrown) {
            // console.log(textStatus,jqXHR, errorThrown);
            $("#add-item-purchase").LoadingOverlay("hide");
            $("#submit-delivery").LoadingOverlay("hide");
            $('#submit-delivery').removeAttr('disabled');
            if (jqXHR.status != 422) {
                $.confirm({
                    title: 'Warning',
                    content: jqXHR.responseJSON.message
                });
            } else if (jqXHR.status != 200) {
                if (typeof jqXHR.responseJSON !== 'undefined') {
                    $.confirm({
                        title: 'warning',
                        content: jqXHR.responseJSON.message
                    });
                }
            }
        }


        jQuery(function ($) {

            $('#product_id').select2({
                // placeholder: "Search Product",
                ajax: {
                    url: "{{ route('sale.cart.search_product') }}",
                    dataType: 'json',
                }
            }).on('select2:select', function (e) {
                var obj = e.params.data;
                console.log(obj.product_id, '1', 'add');
            });

            /*
            $('.date-picker').datepicker({
                autoclose: true,
                todayHighlight: true
            }).next().on(ace.click_event, function () {
                $(this).prev().focus();
            });
*/
        });


        /******************************************         Delivery Work    **********************************************************/

        function submitDeliveryForm() {
            $("#submit-delivery").LoadingOverlay("show");

            // const formElement = document.querySelector("#product_form");
            let myform = document.getElementById("product_form");
            let fdata = new FormData(myform);

            $('#submit-delivery').attr('disabled', 'on');

            var errorCount = 0; // validator.checkAll();
            if (errorCount == 0) {
                $.ajax({
                    data: fdata,
                    cache: false,
                    contentType: false,
                    processData: false,
                    async: false,
                    type: 'POST',
                    dataType: "JSON",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{ route('stocks.simple.delivery.save') }}",
                    success: function (res, textStatus, jqXHR) {
                        $("#submit-delivery").LoadingOverlay("hide");
                        $('#submit-delivery').removeAttr('disabled');
                        // console.log('=======>>>>> ',res);
                        if (jqXHR.status == 200) {
                            if (typeof res.data.id !== 'undefined') {
                                $.confirm({
                                    title: 'Success',
                                    content: res.message,
                                    buttons: {
                                        yes: {
                                            text: 'OK',
                                            action: function () {
                                                window.location = "{{ route('stocks.delivery.list') }}";
                                            }
                                        }
                                    }
                                });
                            }
                        }
                    },
                    error: ajaxFailBlock
                });
            }

            // console.log(validator.checkAll());
        }


        /******************************************         Product work     **********************************************************/


        function saveProduct() {
            var serial_number = $('input[name="sn[]"]').length;
            var qty = $('#qty').val();
            var productID = $('#product_id').val();
            var shop_id = $('#shop_id').val();
            var unit_price = $('#unit_price').val();
            if ((serial_number > 0) && qty != serial_number) {
                $.confirm({
                    title: 'Warning',
                    content: 'Serial Numbers and quantity are not equal.',
                    buttons: {
                        yes: {
                            text: 'OK'
                        }
                    }
                });
                return false;
            }

            // let myform = document.getElementById("stock_item_form");
            // let fdata = new FormData(myform);
            $("#add-item-purchase").LoadingOverlay("show");
            let fdata = new FormData();
            fdata.append('product_id', productID);
            fdata.append('shop_id', shop_id);
            fdata.append('qty', qty);
            fdata.append('unit_price', unit_price);
            fdata.append('product_cat_id', 0);
            fdata.append('sub_cat_id', 0);
            // var errorCount =  formValidator.checkAll();
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
                url: "{{ route('stocks.dp.save') }}",
                success: function (res, textStatus, jqXHR) {
                    $("#add-item-purchase").LoadingOverlay("hide");
                    $('.stock_item_input').val('');
                    $('#input_zone').tagging("removeAll");


                    // console.log('=======>>>>> ',res);
                    if (jqXHR.status == 200) {
                        getProductList();
                        // if(typeof res.data.product !== 'undefined'){
                        // $.confirm({
                        //   title: 'Success',
                        //   content: res.message,
                        //   buttons: {
                        //     yes: {
                        //       text: 'OK',
                        //       action: function() {
                        //         getProductList();
                        //         $('#CreateProduct').modal('hide');
                        //       }
                        //     }
                        //   }
                        // });
                        // }
                    }
                },
                error: ajaxFailBlock
            });


        }


        function getProductList() {
            $.ajax({
                dataType: 'json',
                type: 'get',
                url: "{{ route('stocks.dp.list') }}",
                success: function (res) {
                    var html = '';
                    var sr = 1;
                    if (res.data.length > 0) {
                        $(res.data).each(function (index, ele) { // product_category_name
                            console.log(ele);
                            html += '<tr><td>' + (sr) + '</td><td>' + ele.product_name + '</td><td>' + ele.product_description + '</td><td>' + ele.quantity + ' (' + ele.uom_code + ') </td><td>' + ele.unit_price + '</td><td>' + ele.total_price + '</td><td>' + ele.action + '</td></tr>';
                            sr++;
                        });
                        $('#product_list').html(html);
                    } else {
                        $('#product_list').html('<tr><td colspan="7" style="text-align: center;" >No record found</td></tr>');
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
                            var changeURL = "{{ route('stocks.dp.delete','') }}";
                            $.ajax({
                                url: changeURL + '/' + selectID,
                                success: function (res, textStatus, jqXHR) {
                                    getProductList();
                                }
                            });
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

        function select_product(ele) {
            var id = $(ele).val();
            var uom_id = $('#product_id  option[value="' + id + '"]').attr("data-uom-id");
            var uom_code = $('#product_id  option[value="' + id + '"]').attr("data-uom-code");
            var unit_price = $('#product_id  option[value="' + id + '"]').attr("data-cost-price");
            var current_qty = $('#product_id  option[value="' + id + '"]').attr("data-qty");
            console.log(current_qty);
            $('#uom_id').val(uom_id);
            $('#uom_code').val(uom_code);
            $('#unit_price').val(unit_price);
            $('#current_qty').html(current_qty);
        }




        /*****************************************        Category work        *******************************************************************/







        jQuery(function ($) {
            getProductList();
        });
    </script>
@endsection
