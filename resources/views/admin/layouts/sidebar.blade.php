<--========== Left Sidebar Start ========== -->
@role('SuperAdmin|blogs|zipcode')
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>
                @role('SuperAdmin')
                <li>
                    <a href="{{url('admin')}}" class="waves-effect">
                        <i class="bx bx-home-circle"></i>
                        <span>Dashboards</span>
                    </a>

                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bxs-user-detail"></i>
                        <span>Customers</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{url('admin/addCustomer')}}">Add Customer</a></li>
                        <li><a href="{{url('admin/customers')}}">Customers List</a></li>
                    </ul>
                </li>


                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bxs-user-detail"></i>
                        <span>Technicians</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{url('admin/addTechnician')}}">Add Technician</a></li>
                        <li><a href="{{url('admin/technicians')}}">Technicians List</a></li>
                    </ul>
                </li>


                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-store"></i>
                        <span>Repair</span>
                    </a>
                    @php
                        $repair = App\Models\RepairOrder::where('notification',0)->get();
                        $repairModify = App\Models\Temporary::where('notification',0)->get();
                    @endphp
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{url('admin/repair-steps')}}">Create Repair Order</a></li>
                        <li><a href="{{url('admin/repairOrders')}}">Orders List
                             @if ($repair->count() > 0)
                             <span class="badge badge-pill badge-success">{{ $repair->count() }}</span>
                             @else

                            @endif </a></li>
                        <li><a href="{{url('admin/checkUpdateOrders')}}">Check Update Orders
                            @if ($repairModify->count() > 0)
                            <span class="badge badge-pill badge-success">{{ $repairModify->count() }}</span>
                            @else

                           @endif
                         </a></li>
                        <li><a href="{{url('admin/completed-orders')}}">Completed Repair Orders</a></li>
                        
                        <li><a href="{{url('admin/repairTypes/create')}}">Add Repair Types</a></li>
                        <li><a href="{{url('admin/repairTypes')}}">Repair Types List</a></li>


                    </ul>
                </li>


                @php
                    $orderSale = App\Models\OrderSale::where('notification',0)->get();
                    // $repairModify = App\Models\Temporary::where('notification',0)->get();
                @endphp
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-store"></i>
                        <span>Products</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{url('admin/product/create')}}">Add Product</a></li>
                        <li><a href="{{url('admin/product')}}">Products List</a></li>

                        <li><a href="{{url('admin/productOrder')}}">Orders

                            @if ($orderSale->count() > 0)
                            <span class="badge badge-pill badge-success">{{ $orderSale->count() }}</span>
                            @else

                           @endif
                        </a></li>
                        <li><a href="{{url('admin/brands/create')}}">Add Brand</a></li>
                        <li><a href="{{url('admin/brands')}}">Brands List</a></li>
                        <li><a href="{{url('admin/models/create')}}">Add Model</a></li>
                        <li><a href="{{url('admin/models')}}">Model List</a></li>
                        <li><a href="{{url('admin/storages/create')}}">Add Storage</a></li>
                        <li><a href="{{url('admin/storages')}}">Storage List</a></li>
                        {{-- <li><a href="ecommerce-customers">Customers</a></li>
                        <li><a href="ecommerce-cart">Cart</a></li>
                        <li><a href="ecommerce-checkout">Checkout</a></li>
                        <li><a href="ecommerce-shops">Shops</a></li> --}}

                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-store"></i>
                        <span>Accessories</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{url('admin/accessory/create')}}">Add Accessories</a></li>
                        <li><a href="{{url('admin/accessory')}}">Accessories List</a></li>

                        <li><a href="{{route('admin.category.create')}}">Add Category</a></li>
                        <li><a href="{{route('admin.category.index')}}">Category List</a></li>
                        {{-- <li><a href="ecommerce-cart">Cart</a></li>
                        <li><a href="ecommerce-checkout">Checkout</a></li>
                        <li><a href="ecommerce-shops">Shops</a></li> --}}

                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-store"></i>
                        <span>Coupon</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('admin.coupon.create')}}">Add Coupon</a></li>
                        <li><a href="{{route('admin.coupon.index')}}">Coupon List</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-store"></i>
                        <span>Phone Service</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('admin.service.create')}}">Add Phone Service</a></li>
                        <li><a href="{{route('admin.service.index')}}">Phone Service List</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-store"></i>
                        <span>FAQs Management</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('admin.faqs.index')}}">FAQs List</a></li>
                        <li><a href="{{route('admin.faqs.create')}}">Add FAQs</a></li>

                    </ul>
                </li>
                <li>
                    <a href="{{route('admin.subcribe.list')}}" class="waves-effect">
                        <i class="bx bx-home-circle"></i>
                        <span>Subcribe List</span>
                    </a>

                </li>
                @endrole
                @role('SuperAdmin|zipcode')
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bxs-user-detail"></i>
                        <span>Zip Code Manage</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{url('admin/zipCode/create')}}">Add Zip Code</a></li>
                        <li><a href="{{url('admin/zipCode')}}">Zip Code List</a></li>
                    </ul>
                </li>
                @endrole
                @role('SuperAdmin|blogs')
                <li>
                    <a href="javascript:void(0);" class="has-arrow waves-effect">
                        <i class="bx bxs-user-detail"></i>
                        <span>Blog Management</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{url('admin/blog/create')}}">Add Blog</a></li>
                        <li><a href="{{url('admin/blog')}}">Blog List</a></li>
                    </ul>
                </li>
                @endrole
                @role('SuperAdmin')
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bxs-user-detail"></i>
                        <span>Admin Role</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{url('admin/role/create')}}">Add Role</a></li>
                        <li><a href="{{url('admin/role/list')}}">Role List</a></li>
                    </ul>
                </li>
                @endrole
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
@endrole
<!-- Left Sidebar End
