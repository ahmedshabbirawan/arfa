@extends('layout.master')
@section('content')
    <style>
        .pct-c-btn{ display:none;}
    </style>
    <div class="pc-container">
        <div class="pc-content p-3 ">

            <input type="hidden" id="sale_key" value="{{ $salekey }}">
            <div class="row">

                <div class="col-6" >
                    <div class="card mb-2" >
                        <div class="card-header pt-2 pb-2 d-flex align-items-center justify-content-between py-3">
                            <h5 class="smaller"> Sale Order</h5>
                            <div class="card-toolbar">
                                <a href="javascript:void(0);" onclick="pos_app.showOnHoldListModal();"
                                   class="btn btn-sm bg-primary bigger"><i class="ace-icon fa fa-plus-o"></i> OnHolds
                                </a>
                                <a href="{{ route('sale.board.create') }}" class="btn btn-sm bg-primary bigger"><i
                                        class="ace-icon fa fa-plus-o"></i> Create New Order </a>
                                <a href="{{ route('stock_exchange.req_form') }}" class="btn btn-sm bg-primary bigger"><i
                                        class="ace-icon fa fa-plus-o"></i> Request Stock Exchange </a>
                            </div>
                        </div>
                        <div class="card-body pt-1 pb-2">
                            <div class="card-main">
                                <div class="row">


                                    <div class="row">
                                        <label class="form-label" for="product_select2"> Search Product  </label>
                                        <div class="my-1 input-group input-group-sm mb-0 ">
                                            <div class="input-group-text" onclick="pos_app.showCreateCustomerModal();"><i class="ti ti-search"></i></div>
                                            <select class="form-control-sm" style="width: calc(100% - 40px);" name="product_select2" id="product_select2"></select>
                                        </div>
                                    </div>



                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- /.product search -->

                <div class="col-sm-6">
                    <div class="card mb-2" >
                        <div class="card-header pt-3 pb-3"><h5 class="smaller"> Sale Board / POS</h5></div>
                        <div class="card-body  pt-1 pb-2">
                            <div class="card-main">
                                <form id="customer_form" action="javascript:void(0);">
                                    <input type="hidden" name="sale_key" value="{{ $salekey }}">
                                    <div class="row">
                                        <label class="form-label" for="customer_name"> Customer  </label>
                                        <div class="my-1 input-group input-group-sm mb-0 ">
                                            <div class="input-group-text" id="add_btn" onclick="pos_app.showCreateCustomerModal();"><i class="ti ti-plus"></i></div>
                                            <select class="form-control-sm" style="width: calc(100% - 40px);" name="customer_id" id="customer_select2" aria-describedby="add_btn" ></select>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div> <!-- /.customer -->

            </div> <!-- /.row -->

            <div class="row">
                <div class="col-6 col-lg-6">
                    <div class="card mt-0">
                        <div class="card-body">
                            @include('layout.alerts')
                            <div class="table-responsive">
                                <table class="table table-sm" id="item_table" ></table>
                            </div>
                        </div>
                    </div>
                </div><!-- /.order items -->

                <div class="col-6 col-lg-6">
                    <div class="card widget-color-blue ui-sortable-handle">
                        <div class="card-header"><h4 class="widget-title">Cart</h4></div>
                        <div class="card radius-10 border-top border-0 border-4 border-danger">
                            <form id="order_form" action="javascript:void(0);">
                                <input type="hidden" name="sale_key" value="{{ $salekey }}">
                                <div class="card-body p-2">
                                    <div class="table-responsive">
                                        <table class="table table-sm table-bordered yajratable" id="cart_table" ></table>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <table class="table">
                                        <tr>
                                            <td class="total-label">Total Item</td>
                                            <td id="total_item" class="total-label"> --</td>
                                        </tr>
                                        <tr>
                                            <td class="total-label">Sub Total</td>
                                            <td id="sub_total" class="total-label"> --</td>
                                        </tr>
                                        <tr>
                                            <td class="total-label">Total Discount</td>
                                            <td class="total-label"><input type="text" id="total_discount"
                                                                           name="total_discount" class="form-control"
                                                                           readonly></td>
                                        </tr>
                                        <tr>
                                            <td class="total-label">Grand Total / BillAmount</td>
                                            <td id="billAmount" class="total-label"> --</td>
                                        </tr>
                                        <tr>
                                            <td class="total-label"> Cash Received</td>
                                            <td id="" class="total-label"><input type="text" id="cash_received"
                                                                                 onkeyup="calculateCash();"
                                                                                 onblur="calculateCash();"
                                                                                 name="cash_received" class="form-control">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="total-label"> Cash Return</td>
                                            <td id="" class="total-label"><input type="text" id="cash_returned"
                                                                                 name="cash_returned"
                                                                                 class="form-control disabledInput"
                                                                                 readonly></td>
                                        </tr>
                                    </table>



                                </div>
                                <div class="card-footer">
                                    <a href="javascript:void(0);" onclick="placeOrderConfirm();"
                                       class="btn btn-primary btn-block">Place Order</a>
                                    <a href="javascript:void(0);" onclick="openPreviewPopUp();"
                                       class="btn btn-primary btn-block hidden">Preview</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div> <!-- /.cart summary -->

            </div> <!-- /.row -->


        </div>
    </div>
    <div id="create_customer_modal_con"></div>
    <div id="on_hold_list_modal_con"></div>
@endsection
@section('script')
    <script>
        var table;
        var selectID;
        var cart = [];
        var cartDataTable;
        var billAmount = 0;

        var ajaxFailBlock = function (jqXHR, textStatus, errorThrown) {
            // console.log(textStatus,jqXHR, errorThrown);
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

        function addOneToCart(productID) {
            addToCart(productID, '1', 'add');
        }


        function openPreviewPopUp() {
            window.open("{{ route('sale.cart.preview',$salekey) }}");
        }

        function updateToCart(productID, ele) {
            var val = $(ele).val();
            addToCart(productID, val, 'update');
        }

        function addToCart(productID, qty, action) {
            var saleKey = $('#sale_key').val();
            $.ajax({
                //  dataType: 'json',
                type: 'post',
                data: {'product_id': productID, 'qty': qty, 'action': action, 'sale_key': saleKey},
                url: "{{ route('sale.cart.add') }}",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                error: ajaxFailBlock,
                success: function (res) {
                    if (action == 'update') {
                        calculateSingleProduct(productID);
                    } else {
                        cartDataTable.ajax.reload();
                    }

                }
            });
        }

        function isFloat(n) {
            return Number(n) === n && n % 1 !== 0;
        }

        function calculateSingleProduct(productID) {
            var qty = $('#' + productID + '_qty').val();
            var price = $('#' + productID + '_price').val();
            var discount = $('#' + productID + '_discount').val();
            var displayPrice = (qty * price) - (qty * discount);
            if (isFloat(displayPrice)) {
                displayPrice = parseFloat(displayPrice).toFixed(2);
            }
            $('#' + productID + '_sub_price').html(displayPrice);

            var saleKey = $('#sale_key').val();
            $.ajax({
                type: 'get',
                data: {'sale_key': saleKey},
                url: "{{ route('sale.cart.get_bill_total_amounts') }}",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                error: ajaxFailBlock,
                success: function (res) {
                    var data = res; // ['responseJSON'];
                    $('#total_item').html(data.recordsTotal);

                    $('#sub_total').html(data.subTotal);
                    $('#total_discount').val(data.totalDiscount);
                    $('#billAmount').html(data.billAmount);
                    billAmount = data.billAmount;


                }
            });


        }


        function calculateCash() {
            var cashAmount = parseFloat($('#cash_received').val()).toFixed(2);
            var cashReturn = cashAmount - billAmount;
            $('#cash_returned').val(cashReturn);
        }


        function applyDiscount(productID, discountAmount) {
            var saleKey = $('#sale_key').val();
            $.ajax({
                //  dataType: 'json',
                type: 'post',
                data: {'product_id': productID, 'discount_amount': discountAmount, 'sale_key': saleKey},
                url: "{{ route('sale.cart.apply_dicount_single') }}",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                error: ajaxFailBlock,
                success: function (res) {
                    console.log(res);
                    // cartDataTable.ajax.reload();
                    calculateSingleProduct(productID);
                }
            });
        }

        function updateProductPrice(productID, productPrice) {
            var saleKey = $('#sale_key').val();
            $.ajax({
                //  dataType: 'json',
                type: 'post',
                data: {'product_id': productID, 'product_price': productPrice, 'sale_key': saleKey},
                url: "{{ route('sale.cart.update_product_price') }}",
                headers: {
                    // 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                error: ajaxFailBlock,
                success: function (res) {
                    console.log(res);
                    //  cartDataTable.ajax.reload();
                    calculateSingleProduct(productID);
                }
            });
        }


        function deleteCartItem(itemID) {
            $.ajax({
                //  dataType: 'json',
                type: 'post',
                data: {'item_id': itemID},
                url: "{{ route('sale.cart.delete_cart_item') }}",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                error: ajaxFailBlock,
                success: function (res) {
                    cartDataTable.ajax.reload();
                }
            });
        }


        function applyDiscountOnSingleProduct(productID, $inputField) {
            var discountAmount = $($inputField).val();
            applyDiscount(productID, discountAmount);
        }


        function updateCartProductPrice(productID, $inputField) {
            var productPrice = $($inputField).val();
            updateProductPrice(productID, productPrice);

        }


        function placeOrderConfirm() {
            $.confirm({
                title: 'Confirm',
                content: 'Do you really want to place order',
                buttons: {
                    yes: {
                        text: 'OK',
                        action: function () {
                            placeOrder();
                        }
                    },
                    no: {
                        text: 'Cancel', action: function () {
                        }
                    }
                }
            });
        }


        function placeOrder() {
            var formData = new FormData($('#order_form')[0]);
            var customer_id = $('#customer_select2').val();
            formData.append('customer_id', customer_id)
            $.ajax({
                dataType: 'json',
                type: 'POST',
                data: formData,
                url: "{{ route('sale.cart.place_order') }}",
                contentType: false,
                processData: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                error: ajaxFailBlock,
                success: function (res) {


                    if (res.status) {
                        // cartDataTable.ajax.reload();
                        var url = "{{ route('sale.order.detail','') }}/" + res.data.id + '?view=print';
                        window.open(url, '_blank').focus();
                        window.location = "{{ route('sale.board.create') }}";
                    }
                }
            });
        }

        $(document).ready(function () {



            $('#customer_select2').select2({

                 placeholder: "Select Customer!",
                ajax: {
                    url: "{{ route('customer.search_select2') }}",
                    dataType: 'json',
                    success: function (res) {
                         cartDataTable.ajax.reload();
                    }
                    // Additional AJAX parameters go here; see the end of this chapter for the full code of this example
                }

            }).on('select2:select', function (e) {
                var obj = e.params.data;
                // console.log(obj.id);
                var saleKey = $('#sale_key').val();
                $.ajax({
                    //  dataType: 'json',
                    type: 'post',
                    data: {'sale_key': saleKey, 'customer_id': obj.id},
                    url: "{{ route('sale.cart.attach_customer_with_cart') }}",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    error: ajaxFailBlock,
                    success: function (res) {
                        console.log(res);
                        //  cartDataTable.ajax.reload();
                    }
                });
            });


            var saleKey = $('#sale_key').val();
            setTimeout(function () {

                table = $('#item_table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('sale.board.product_items') }}?sale_key=" + saleKey,
                    // columnDefs: [
                    //     {
                    //         visible: false,
                    //         targets: -1
                    //     }
                    // ],
                    columns: [
                        // {
                        //     "data": "id",
                        //     title: 'Sr.',
                        //     width:'5%',
                        //     render: function(data, type, row, meta) {
                        //         return meta.row + meta.settings._iDisplayStart + 1;
                        //     }
                        // },
                        {
                            "data": "image_url", title: 'Image',
                            render: function (data, type, row, meta) {
                                return '<image src="' + data + '" style="width:40px; height:40px;" class="img-20" >';
                            }, width: '10%'
                        },
                        {
                            data: 'product_detail',
                            name: 'product_detail',
                            title: 'Product',
                            width: '50%'

                        },
                        {
                            data: 'product.price',
                            name: 'product.price',
                            title: 'Price',

                        },
                        {
                            data: 'total_qty',
                            name: 'total_qty',
                            title: 'Qty',
                        }, {
                            data: 'action',
                            name: 'action',
                            title: 'Action',
                        }
                        //
                    ],
                    order: [[0, 'desc']]
                });

            }, 500);


            /* Cart Table */

            cartDataTable = $('#cart_table').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'print',
                        footer: false
                    }
                ],
                processing: true,
                serverSide: true,
                searching: false,
                paging: false,
                // ajax: "{{ route('sale.cart.index') }}?for=datatable",
                ajax: {
                    url: "{{ route('sale.cart.index') }}?for=datatable&sale_key=" + saleKey,
                    // success:function(res){
                    //  console.log('hello :::: ', res);
                    // return res;
                    //  },
                    complete: function (res) {
                        var data = res['responseJSON'];
                        $('#total_item').html(data.recordsTotal);

                        $('#sub_total').html(data.subTotal);
                        $('#total_discount').html(data.totalDiscount);
                        $('#billAmount').html(data.billAmount);
                        billAmount = data.billAmount;
                    }
                },
                columns: [
                    {
                        "data": "id",
                        title: 'Sr.',
                        width: '5%',
                        render: function (data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }
                    }, {
                        data: 'product_name',
                        name: 'product_name',
                        title: 'Product',
                        width: '40%',
                    }, {
                        data: 'qty',
                        name: 'qty',
                        title: 'Qty',
                        width: '8%',
                        render: function (data, type, row, meta) { // class="form-control form-control-sm"
                            return '<input type="text" id="' + row.product_id + '_qty"  onblur="updateToCart(' + row.product_id + ',this)" autocomplete="off" class="form-control form-control-sm" tabindex="' + (row.id + 0.1) + '" value="' + data + '" >';
                        }
                    }, {
                        data: 'offer_price',
                        name: 'offer_price',
                        title: 'Offer Price',
                        width: '15%',
                        render: function (data, type, row, meta) {
                            return '<input type="text" id="' + row.product_id + '_price" onblur="updateCartProductPrice(' + row.product_id + ',this)" autocomplete="off" value="' + data + '" tabindex="' + (row.id + 0.2) + '" class="form-control form-control-sm" >';
                        }
                    },
                    {
                        data: 'discount',
                        name: 'discount',
                        title: 'Discount',
                        width: '10%',
                        render: function (data, type, row, meta) {
                            return '<input type="text" id="' + row.product_id + '_discount" onblur="applyDiscountOnSingleProduct(' + row.product_id + ',this)" autocomplete="off" value="' + data + '" tabindex="' + (row.id + 0.3) + '" class="form-control form-control-sm" >';
                        }
                    },
                    {
                        data: 'product_total_price',
                        name: 'product_total_price',
                        title: 'Bill Price',
                        render: function (data, type, row, meta) {
                            return '<b id="' + row.product_id + '_sub_price" >' + data + '</b>';
                        }
                    },
                    {data: 'action', name: 'action', title: 'Action'},
                ]
                //  ,order: [[0, 'desc']]
            });


            function formatRepo(repo) {
//   if (repo.loading) {
//     return repo.text;
//   }

// console('helllll', repo);

                var $container = $(
                    "<div class='select2-result-repository clearfix'>" +
                    "<div class='select2-result-repository__avatar'><img class='pro_img_sug' src='" + repo.product_img_url + "' /></div>" +
                    "<div class='select2-result-repository__meta'>" +
                    "<div class='select2-result-repository__title'>" + repo.text + "</div>" +
                    "</div>" +
                    "</div>"
                );

//   $container.find(".select2-result-repository__title").text(repo.full_name);
//   $container.find(".select2-result-repository__description").text(repo.description);
//   $container.find(".select2-result-repository__forks").append(repo.forks_count + " Forks");
//   $container.find(".select2-result-repository__stargazers").append(repo.stargazers_count + " Stars");
//   $container.find(".select2-result-repository__watchers").append(repo.watchers_count + " Watchers");

                return $container;
            }

            function formatRepoSelection(repo) {
              //   return repo.text;
            }


            $('#product_select2').select2({
                // placeholder: "Search Product",
                ajax: {
                    url: "{{ route('sale.cart.search_product') }}",
                    dataType: 'json',
                    // Additional AJAX parameters go here; see the end of this chapter for the full code of this example

                }
//         minimumInputLength: 1,
//   templateResult: formatRepo,
//   templateSelection: formatRepoSelection

            }).on('select2:select', function (e) {
                // Do something
                // console.log(e.params.data);
                var obj = e.params.data;
                addToCart(obj.product_id, '1', 'add');
            });



        });


    </script>
@endsection

