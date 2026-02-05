@extends('layout.master')
@section('Title','Home')
@section('URL','dashboard')
@section('PageName','Home')
@section('content')
<div class="pc-container">
    <div class="pc-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center justify-content-between">
                    <div class="col-sm-auto">
                        <div class="page-header-title">
                            <h5 class="mb-0">Dashboard</h5>
                        </div>
                    </div>
                    <div class="col-sm-auto">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"
                            ><a href="../navigation/index.html"><i class="ph-duotone ph-house"></i></a
                                ></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0)">Dashboard</a></li>
                            <li class="breadcrumb-item" aria-current="page">E-commerce</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->

        <!-- [ Main Content ] start -->
        <div class="row">
            <!-- [ Row 1 ] start -->

            <div class="col-xxl-6 col-md-12">
                <div class="card flat-card">
                    <div class="row-table">
                        <div class="col-sm-6 card-body br">
                            <div class="row">
                                <div class="col-4">
                                    <i class="material-icons-two-tone text-primary mb-1">card_giftcard</i>
                                </div>
                                <div class="col-8 text-md-center">
                                    <h5 id="property_count_products">--</h5>
                                    <span> <a href="{{route('sale.board.create')}}">Product</a></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 card-body br">
                            <div class="row">
                                <div class="col-4">
                                    <i class="material-icons-two-tone text-primary mb-1">language</i>
                                </div>
                                <div class="col-8 text-md-center">
                                    <h5 id="property_count_sale_amount">--</h5>
                                    <span>Sale Amount</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 card-body br">
                            <div class="row">
                                <div class="col-4">
                                    <i class="material-icons-two-tone text-primary mb-1">swap_horizontal_circle</i>
                                </div>
                                <div class="col-8 text-md-center">
                                    <h5 id="property_count_stock_exchange">--</h5>
                                    <span>Stock Exchange</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 card-body br">
                            <div class="row">
                                <div class="col-4">
                                    <i class="material-icons-two-tone text-primary mb-1">fullscreen</i>
                                </div>
                                <div class="col-8 text-md-center">
                                    <h5 id="property_count_stock_adjustment">--</h5>
                                    <span>Stock Adjustment</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 card-body br">
                            <div class="row">
                                <div class="col-4">
                                    <i class="material-icons-two-tone text-primary mb-1">group</i>
                                </div>
                                <div class="col-8 text-md-center">
                                    <h5 id="property_count_customer">--</h5>
                                    <span>Customer</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 card-body">
                            <div class="row">
                                <div class="col-4">
                                    <i class="material-icons-two-tone text-primary mb-1">shopping_cart</i>
                                </div>
                                <div class="col-8 text-md-center">
                                    <h5 id="property_count_purchases">--</h5>
                                    <span>Purchases</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-md-6 col-xl-6">
                <div class="card p-0">
                    <div class="card-body  p-0">
                        <div class="table-responsive">
                            <div class="user-scroll" >
                                <table class="table table-hover m-0">
                                    <thead>
                                    <tr>
                                        <th><i class="ace-icon fa fa-calendar"></i> Days</th>
                                        <th><i>@</i> Sale <br> Count</th>
                                        <th><i>@</i>Sale <br> Amount</th>
                                        <th><i>@</i>Purchase <br> Count</th>
                                        <th><i>@</i> Purchase <br> Amount</th>
                                        <th><i>@</i>Customer <br> Create</th>
                                    </tr>
                                    </thead>
                                    <tbody id="stats_body"></tbody>
                                </table>
                            </div>
                        </div>


                    </div>
                </div>
            </div>

            <div class="col-xl-6 col-md-12">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="card prod-p-card card-border-none">
                            <div class="card-body">
                                <div class="row align-items-center m-b-0">
                                    <div class="col">
                                        <h6 class="m-b-5">Total Profit</h6>
                                        <h3 class="m-b-0">$1,783</h3>
                                    </div>
                                    <div class="col-auto">
                                        <i class="material-icons-two-tone text-success">card_giftcard</i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card prod-p-card bg-purple-500 card-border-none">
                            <div class="card-body">
                                <div class="row align-items-center m-b-0">
                                    <div class="col">
                                        <h6 class="m-b-5 text-white">Total Orders</h6>
                                        <h3 class="m-b-0 text-white">15,830</h3>
                                    </div>
                                    <div class="col-auto">
                                        <i class="material-icons-two-tone text-white">local_mall</i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card prod-p-card bg-info card-border-none">
                            <div class="card-body">
                                <div class="row align-items-center m-b-0">
                                    <div class="col">
                                        <h6 class="m-b-5 text-white">Average Price</h6>
                                        <h3 class="m-b-0 text-white">$6,780</h3>
                                    </div>
                                    <div class="col-auto">
                                        <i class="material-icons-two-tone text-white">monetization_on</i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card prod-p-card card-border-none">
                            <div class="card-body">
                                <div class="row align-items-center m-b-0">
                                    <div class="col">
                                        <h6 class="m-b-5">Product Sold</h6>
                                        <h3 class="m-b-0">6,784</h3>
                                    </div>
                                    <div class="col-auto">
                                        <i class="material-icons-two-tone text-danger">local_offer</i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- support-section start -->
            <div class="col-xxl-6 col-md-12">
                <div class="card flat-card">
                    <div class="row-table">
                        <div class="col-sm-6 card-body br">
                            <div class="row">
                                <div class="col-4">
                                    <i class="material-icons-two-tone text-primary mb-1">group</i>
                                </div>
                                <div class="col-8 text-md-center">
                                    <h5 id="pos_count">--</h5>
                                    <span> <a href="{{route('sale.board.create')}}">POS</a></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 card-body br">
                            <div class="row">
                                <div class="col-4">
                                    <i class="material-icons-two-tone text-primary mb-1">language</i>
                                </div>
                                <div class="col-8 text-md-center">
                                    <h5>$1252</h5>
                                    <span>Revenue</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 card-body br">
                            <div class="row">
                                <div class="col-4">
                                    <i class="material-icons-two-tone text-primary mb-1">unarchive</i>
                                </div>
                                <div class="col-8 text-md-center">
                                    <h5>600</h5>
                                    <span>Growth</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 card-body br">
                            <div class="row">
                                <div class="col-4">
                                    <i class="material-icons-two-tone text-primary mb-1">swap_horizontal_circle</i>
                                </div>
                                <div class="col-8 text-md-center">
                                    <h5>3550</h5>
                                    <span>Returns</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 card-body br">
                            <div class="row">
                                <div class="col-4">
                                    <i class="material-icons-two-tone text-primary mb-1">cloud_download</i>
                                </div>
                                <div class="col-8 text-md-center">
                                    <h5>3550</h5>
                                    <span>Downloads</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 card-body">
                            <div class="row">
                                <div class="col-4">
                                    <i class="material-icons-two-tone text-primary mb-1">shopping_cart</i>
                                </div>
                                <div class="col-8 text-md-center">
                                    <h5>100%</h5>
                                    <span>Order</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- support-section end -->
            <!-- customer-section start -->
            <div class="col-xl-6 col-md-12">

                <div class="card table-card">
                    <div class="card-header">
                        <h5>New Products</h5>
                    </div>
                    <div class="pro-scroll" style="height: 255px; position: relative">
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover m-b-0">
                                    <thead>
                                    <tr>
                                        <th>Product Name</th>
                                        <th>Image</th>
                                        <th>Status</th>
                                        <th>Price</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>HeadPhone</td>
                                        <td><img src="../assets/images/widget/p1.jpg" alt="" class="img-20" /></td>
                                        <td>
                                            <div><label class="badge bg-light-warning">Pending</label></div>
                                        </td>
                                        <td>$10</td>
                                        <td
                                        ><a href="#!"><i class="icon feather icon-edit f-16 text-success"></i></a
                                            ><a class="ms-3" href="#!"><i class="feather icon-trash-2 f-16 text-danger"></i></a
                                            ></td>
                                    </tr>
                                    <tr>
                                        <td>Iphone 6</td>
                                        <td><img src="../assets/images/widget/p2.jpg" alt="" class="img-20" /></td>
                                        <td>
                                            <div><label class="badge bg-light-danger">Cancel</label></div>
                                        </td>
                                        <td>$20</td>
                                        <td
                                        ><a href="#!"><i class="icon feather icon-edit f-16 text-success"></i></a
                                            ><a class="ms-3" href="#!"><i class="feather icon-trash-2 f-16 text-danger"></i></a
                                            ></td>
                                    </tr>
                                    <tr>
                                        <td>Jacket</td>
                                        <td><img src="../assets/images/widget/p3.jpg" alt="" class="img-20" /></td>
                                        <td>
                                            <div><label class="badge bg-light-success">Success</label></div>
                                        </td>
                                        <td>$35</td>
                                        <td
                                        ><a href="#!"><i class="icon feather icon-edit f-16 text-success"></i></a
                                            ><a class="ms-3" href="#!"><i class="feather icon-trash-2 f-16 text-danger"></i></a
                                            ></td>
                                    </tr>
                                    <tr>
                                        <td>Sofa</td>
                                        <td><img src="../assets/images/widget/p4.jpg" alt="" class="img-20" /></td>
                                        <td>
                                            <div><label class="badge bg-light-danger">Cancel</label></div>
                                        </td>
                                        <td>$85</td>
                                        <td
                                        ><a href="#!"><i class="icon feather icon-edit f-16 text-success"></i></a
                                            ><a class="ms-3" href="#!"><i class="feather icon-trash-2 f-16 text-danger"></i></a
                                            ></td>
                                    </tr>
                                    <tr>
                                        <td>Iphone 6</td>
                                        <td><img src="../assets/images/widget/p2.jpg" alt="" class="img-20" /></td>
                                        <td>
                                            <div><label class="badge bg-light-success">Success</label></div>
                                        </td>
                                        <td>$20</td>
                                        <td
                                        ><a href="#!"><i class="icon feather icon-edit f-16 text-success"></i></a
                                            ><a class="ms-3" href="#!"><i class="feather icon-trash-2 f-16 text-danger"></i></a
                                            ></td>
                                    </tr>
                                    <tr>
                                        <td>HeadPhone</td>
                                        <td><img src="../assets/images/widget/p1.jpg" alt="" class="img-20" /></td>
                                        <td>
                                            <div><label class="badge bg-light-warning">Pending</label></div>
                                        </td>
                                        <td>$50</td>
                                        <td
                                        ><a href="#!"><i class="icon feather icon-edit f-16 text-success"></i></a
                                            ><a class="ms-3" href="#!"><i class="feather icon-trash-2 f-16 text-danger"></i></a
                                            ></td>
                                    </tr>
                                    <tr>
                                        <td>Iphone 6</td>
                                        <td><img src="../assets/images/widget/p2.jpg" alt="" class="img-20" /></td>
                                        <td>
                                            <div><label class="badge bg-light-danger">Cancel</label></div>
                                        </td>
                                        <td>$30</td>
                                        <td
                                        ><a href="#!"><i class="icon feather icon-edit f-16 text-success"></i></a
                                            ><a class="ms-3" href="#!"><i class="feather icon-trash-2 f-16 text-danger"></i></a
                                            ></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- customer-section end -->
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>
<script src="{{asset('admin-assets/js/pages/dashboard-ecommerce.js')}}"></script>
@endsection

@section('javascript')
    <script>
        function getDashboardStats() {
            $.ajax({
                type: 'GET',
                dataType: "JSON",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ route('dashboard_stats') }}",
                success: function (res, textStatus, jqXHR) {
                    $('#physical_total_item').html(res.physical.item_total);
                    $('#physical_in_hand').html(res.physical.item_available);
                    $('#physical_issue').html(res.physical.item_issued);
                    // stats_body
                    var statsBody = '';
                    $(res.dayWiseReport).each(function (index, row) {
                        console.log(index, row);
                        statsBody += '<tr><th style="background: rgba(233, 233, 233, 0.5)" >' + row.labels.days + '</th><td>' + row.reports.sale_order_count + '</td><td>' + row.reports.sale_amount + '</td><td>' + row.reports.purchase_count + '</td><td>' + row.reports.purchase_amount + '</td><td>' + row.reports.customer_create + '</td></tr>';
                    });
                    $('#stats_body').html(statsBody);

                    var property = res.property_count;

                    $('#pos_count').html(property.item_total);
                    $('#property_count_products').html(property.products);
                    $('#property_count_stock_exchange').html(property.stock_exchange);
                    $('#property_count_stock_adjustment').html(property.stock_adjustment);
                    $('#property_count_purchases').html(property.purchases);
                    $('#property_count_customer').html(property.customer);


                }
            });
        }


        $(document).ready(function () {
            getDashboardStats();
        });


    </script>

@endsection
