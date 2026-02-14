
<nav class="pc-sidebar">
    <div class="navbar-wrapper">
        <div class="m-header">
            <a href="../dashboard/index.html" class="b-brand text-primary">
                <img src="../assets/images/logo-white.svg" alt="logo image" class="logo-lg" />
                <span class="badge bg-primary rounded-pill ms-2 theme-version">v3.1.0</span>
            </a>
        </div>

        <div class="card pc-user-card">
            <div class="card-body">
                <div class="nav-user-image">
                    <a data-bs-toggle="collapse" href="#navuserlink">
{{--                        <img src="../assets/images/user/avatar-1.jpg" alt="user-image" class="user-avtar rounded-circle" />--}}
                    </a>
                </div>
                <div class="pc-user-collpsed collapse" id="navuserlink">
                    <h4 class="mb-0">Jonh Smith</h4>
                    <span>Administrator</span>
                    <ul>
                        <li
                        ><a class="pc-user-links">
                                <i class="ph-duotone ph-user"></i>
                                <span>My Account</span>
                            </a></li
                        >
                        <li
                        ><a class="pc-user-links">
                                <i class="ph-duotone ph-gear"></i>
                                <span>Settings</span>
                            </a></li
                        >
                        <li
                        ><a class="pc-user-links">
                                <i class="ph-duotone ph-lock-key"></i>
                                <span>Lock Screen</span>
                            </a></li
                        >
                        <li
                        ><a class="pc-user-links">
                                <i class="ph-duotone ph-power"></i>
                                <span>Logout</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="navbar-content">


            <ul class="pc-navbar">
                {{-- Dashboard --}}
                <li class="pc-item {{ request()->is('dashboard*') ? 'active' : '' }}">
                    <a href="{{ route('dashboard') }}" class="pc-link">
                        <span class="pc-micon"><i class="fa fa-desktop"></i></span>
                        <span class="pc-mtext">Dashboard</span>
                    </a>
                </li>

                {{-- POS --}}
                <li class="pc-item {{ request()->is('sale/board*') ? 'active' : '' }}">
                    <a href="{{ route('sale.board.create') }}" class="pc-link">
                        <span class="pc-micon"><i class="fa fa-cart-plus"></i></span>
                        <span class="pc-mtext">POS</span>
                    </a>
                </li>

                {{-- Stock Exchange --}}
                <li class="pc-item {{ request()->is('stock_exchange/*') ? 'active' : '' }}">
                    <a href="{{ route('stock_exchange.list') }}" class="pc-link">
                        <span class="pc-micon"><i class="fas fa-arrows-alt-h"></i></span>
                        <span class="pc-mtext">Stock Exchange</span>
                    </a>
                </li>

                {{-- Stock Adjustment --}}
                <li class="pc-item {{ request()->is('stock_adjustment*') ? 'active' : '' }}">
                    <a href="{{ route('stock_adjustment.list') }}" class="pc-link">
                        <span class="pc-micon"><i class="fa fa-balance-scale"></i></span>
                        <span class="pc-mtext">Stock Adjust</span>
                    </a>
                </li>

                {{-- Products --}}
                <li class="pc-item pc-hasmenu {{ request()->is('product*') ? 'active open' : '' }}">
                    <a href="#" class="pc-link">
                        <span class="pc-micon"><i class="fas fa-suitcase-rolling"></i></span>
                        <span class="pc-mtext">Products</span>
                        <span class="pc-arrow"><i class="ti ti-chevron-right"></i></span>
                    </a>
                    <ul class="pc-submenu">

                            <li class="pc-item {{ request()->is('Product/list*') ? 'active' : '' }}">
                                <a href="{{ route('product.list') }}" class="pc-link">List</a>
                            </li>
                        @can('product.read')
                        @endcan

                        @can('product.create')
                            <li class="pc-item {{ request()->is('Products/create*') ? 'active' : '' }}">
                                <a href="{{ route('simple_product.create') }}" class="pc-link">Quick Add</a>
                            </li>
                        @endcan
                    </ul>
                </li>

                <!--------------- Customer -------------------->
                <li class="pc-item pc-hasmenu {{request()->is('customer*') ? 'active open' : '' }}">
                    <a href="#" class="pc-link ">
                        <span class="pc-micon"><i class="menu-icon fa fa-user"></i></span>
                        <span class="pc-mtext">Customers</span>
                        <span class="pc-arrow"><i class="ti ti-chevron-right"></i></span>
                    </a>
                    <ul class="pc-submenu">
                        <li class="pc-item {{request()->is('customer/list*') ? 'active' : '' }}">
                            <a href="{{ route('customer.list') }}" class="pc-link" > List</a><b class="arrow"></b>
                        </li>
                        <li class="pc-item {{request()->is('customer/create*') ? 'active' : '' }}">
                            <a href="{{ route('customer.create') }}" class="pc-link" > Add New</a><b class="arrow"></b>
                        </li>
                        @can('customer.read')

                        @endcan
                        @can('customer.create')

                        @endcan
                    </ul>
                </li>
                <!--------------- End Customer -------------------->

                <!--------------- User Management-------------------->
                <li class="pc-item pc-hasmenu  {{request()->is('usermanagement*') ? 'active open' : '' }}">
                    <a href="#" class="pc-link">
                        <span class="pc-micon"><i class="menu-icon fa fa-user"></i></span>
                        <span class="pc-mtext">User Management</span>
                        <span class="pc-arrow"><i class="ti ti-chevron-right"></i></span>
                    </a>
                    <ul class="pc-submenu">
                        <li class="pc-item {{request()->is('usermanagement/role*') ? 'active' : '' }}">
                            <a href="{{route('usermanagement.role.list')}}" class="pc-link">  Roles </a> <b class="arrow"></b>
                        </li>


                            <li class="pc-item {{request()->is('usermanagement/permissions*') ? 'active' : '' }}">
                                <a href="{{route('usermanagement.permission.list')}}" class="pc-link">  Permissions </a><b class="arrow"></b>
                            </li>
                        @can('permission.read')
                        @endcan

                            <li class="pc-item {{request()->is('usermanagement/users*') ? 'active' : '' }}">
                                <a href="{{route('usermanagement.user.list')}}" class="pc-link" >Users</a><b class="arrow"></b>
                            </li>
                        @can('user.read')
                        @endcan
                    </ul>
                </li>
                <!--------------- End User Management-------------------->


                {{-- Sale --}}
                <li class="pc-item pc-hasmenu {{ request()->is('sale/order/*') || request()->is('sale/sale-return/*') ? 'active open' : '' }}">
                    <a href="#" class="pc-link">
                        <span class="pc-micon"><i class="fas fa-dollar-sign"></i></span>
                        <span class="pc-mtext">Sale</span>
                        <span class="pc-arrow"><i class="ti ti-chevron-right"></i></span>
                    </a>
                    <ul class="pc-submenu">
                        <li class="pc-item {{ request()->is('sale/order/*') ? 'active' : '' }}">
                            <a href="{{ route('sale.order.list') }}" class="pc-link">Sale</a>
                        </li>
                        <li class="pc-item {{ request()->is('sale/sale-return/*') ? 'active' : '' }}">
                            <a href="{{ route('sale.sale_return.list') }}" class="pc-link">Sale Return</a>
                        </li>
                    </ul>
                </li>

                {{-- Purchase --}}
                <li class="pc-item pc-hasmenu {{ request()->is('Stocks*') ? 'active open' : '' }}">
                    <a href="#" class="pc-link">
                        <span class="pc-micon"><i class="fas fa-cart-arrow-down"></i></span>
                        <span class="pc-mtext">Purchase</span>
                        <span class="pc-arrow"><i class="ti ti-chevron-right"></i></span>
                    </a>
                    <ul class="pc-submenu">
                        <li class="pc-item {{ request()->is('Stocks/list*') ? 'active' : '' }}">
                            <a href="{{ route('stocks.delivery.list') }}" class="pc-link">List</a>
                        </li>
                        <li class="pc-item {{ request()->is('Stocks/list*') ? 'active' : '' }}">
                            <a href="{{ route('stocks.purchase_return_list') }}" class="pc-link">Purchase Return</a>
                        </li>
                        <li class="pc-item {{ request()->is('Stocks/create*') ? 'active' : '' }}">
                            <a href="{{ route('stocks.simple.delivery.create') }}" class="pc-link">Simple Add</a>
                        </li>
                    </ul>
                </li>


                <!--------------- Shops -------------------->
                <li class="pc-item pc-hasmenu {{request()->is('shop*') ? 'active open' : '' }}">
                    <a href="#" class="pc-link">
                        <span class="pc-micon"><i class="fas fa-cart-arrow-down"></i></span>
                        <span class="pc-mtext">Shops / Branches</span>
                        <span class="pc-arrow"><i class="ti ti-chevron-right"></i></span>
                    </a>

                    <b class="arrow"></b>

                    <ul class="submenu">
                        <li class="{{request()->is('shop/list*') ? 'active' : '' }}">
                            <a href="{{ route('shop.list') }}"><i class="menu-icon fa fa-caret-right"></i>List</a><b class="arrow"></b>
                        </li>
                        <li class="{{request()->is('shop/create*') ? 'active' : '' }}">
                            <a href="{{ route('shop.create') }}"><i class="menu-icon fa fa-caret-right"></i>Add New</a><b class="arrow"></b>
                        </li>
                        @can('shop.read')

                        @endcan
                        @can('shop.create')

                        @endcan
                    </ul>
                </li>
                <!--------------- End Customer -------------------->



                {{-- Suppliers --}}
                <li class="pc-item pc-hasmenu {{ request()->is('supplier*') ? 'active open' : '' }}">
                    <a href="#" class="pc-link">
                        <span class="pc-micon"><i class="fa fa-truck"></i></span>
                        <span class="pc-mtext">Suppliers</span>
                        <span class="pc-arrow"><i class="ti ti-chevron-right"></i></span>
                    </a>
                    <ul class="pc-submenu">

                            <li class="pc-item {{ request()->is('supplier/list*') ? 'active' : '' }}">
                                <a href="{{ route('supplier.list') }}" class="pc-link">List</a>
                            </li>
                        @can('supplier.read')
                        @endcan
                        @can('supplier.create')
                            <li class="pc-item {{ request()->is('supplier/create*') ? 'active' : '' }}">
                                <a href="{{ route('supplier.create') }}" class="pc-link">Add New</a>
                            </li>
                        @endcan
                    </ul>
                </li>

                {{-- Reports --}}
                <li class="pc-item pc-hasmenu {{ request()->is('reports*') ? 'active open' : '' }}">
                    <a href="#" class="pc-link">
                        <span class="pc-micon"><i class="fa fa-chart-bar "></i></span>
                        <span class="pc-mtext">Reports</span>
                        <span class="pc-arrow"><i class="ti ti-chevron-right"></i></span>
                    </a>
                    <ul class="pc-submenu">
                        <li class="pc-item">
                            <a href="{{ route('report.sale.all') }}" class="pc-link">Sale</a>
                        </li>
                        <li class="pc-item">
                            <a href="{{ route('report.product') }}" class="pc-link">Product</a>
                        </li>
                        <li class="pc-item">
                            <a href="{{ route('report.product_wise') }}" class="pc-link">Product Report</a>
                        </li>
                    </ul>
                </li>

            </ul>


            <div class="card nav-action-card">
                <div class="card-body">
                    <h5 class="text-white">Help Center</h5>
                    <p class="text-white text-opacity-75">Please contact us for more questions.</p>
                    <a target="_blank" href="https://phoenixcoded.authordesk.app/" class="btn btn-primary">Go to help Center</a>
                </div>
            </div>
        </div>
    </div>
</nav>
