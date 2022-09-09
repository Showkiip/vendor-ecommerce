@role('SuperAdmin|Inventory')
<ul class="nav flex-column">
    <li class="nav-item active">
        <a href="#" class="nav-link">
            <span class="svg-icon nav-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-home">
                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                    <polyline points="9 22 9 12 15 12 15 22"></polyline>
                </svg>
            </span>
            <span class="nav-text">
                Dashboard
            </span>
        </a>


    </li>
        
    <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="javascript:void(0)" data-target="#catalog" role="button"
            aria-expanded="false" aria-controls="catalog">
            <span class="svg-icon nav-icon">
                <i class="fas fa-boxes font-size-h4"></i>
            </span>
            <span class="nav-text">Catalog</span>
            <i class="fas fa-chevron-right fa-rotate-90"></i>
        </a>
        <div class="collapse nav-collapse" id="catalog" data-parent="#accordion">
            <div id="accordion1">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link sub-nav-link" data-toggle="collapse" href="#catalogProduct" role="button"
                            aria-expanded="false" aria-controls="catalogProduct">
                            <span class="svg-icon nav-icon d-flex justify-content-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="10px" height="10px" fill="currentColor"
                                    class="bi bi-circle" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                </svg>
                            </span>
                            <span class="nav-text">Products</span>
                            <i class="fas fa-chevron-right fa-rotate-90"></i>
                        </a>
                        <div class="collapse nav-collapse" id="catalogProduct" data-parent="#accordion1">
                            <ul class="nav flex-column">
                                
                                <li class="nav-item">
                                    <a href="{{ route('products.index') }}" class="nav-link mini-sub-nav-link">

                                        <span class="nav-text">List</span>
                                    </a>
                                </li>
                               
                            @role('SuperAdmin')
                                <li class="nav-item">
                                    <a href="{{ route('products.create') }}" class="nav-link mini-sub-nav-link">

                                        <span class="nav-text">Add Product</span>
                                    </a>
                                </li>
                                @endrole
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
         @role('SuperAdmin')
        <div class="collapse nav-collapse" id="catalog" data-parent="#accordion">
            <div id="accordion1">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link sub-nav-link" data-toggle="collapse" href="#catalogcategory" role="button"
                            aria-expanded="false" aria-controls="catalogProduct">
                            <span class="svg-icon nav-icon d-flex justify-content-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="10px" height="10px" fill="currentColor"
                                    class="bi bi-circle" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                </svg>
                            </span>
                            <span class="nav-text">All Category</span>
                            <i class="fas fa-chevron-right fa-rotate-90"></i>
                        </a>
                        <div class="collapse nav-collapse" id="catalogcategory" data-parent="#accordion1">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a href="{{ route('category.create') }}" class="nav-link mini-sub-nav-link">
                                        <span class="nav-text">Category</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        @endrole
        
       
    </li>
     @endrole
    @role('SuperAdmin')
    <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#expenses" role="button" aria-expanded="false"
            aria-controls="expenses">
            <span class="svg-icon nav-icon">
                <i class="fas fa-money-bill font-size-h4"></i>
            </span>
            <span class="nav-text">Expenses</span>
            <i class="fas fa-chevron-right fa-rotate-90"></i>
        </a>
        <div class="collapse nav-collapse" id="expenses" data-parent="#accordion">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a href="{{ route('expense.list.index') }}" class="nav-link sub-nav-link">
                        <span class="svg-icon nav-icon d-flex justify-content-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="10px" height="10px" fill="currentColor"
                                class="bi bi-circle" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                            </svg>
                        </span>
                        <span class="nav-text">List</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('expense.index') }}" class="nav-link sub-nav-link">
                        <span class="svg-icon nav-icon d-flex justify-content-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="10px" height="10px" fill="currentColor"
                                class="bi bi-circle" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                            </svg>
                        </span>
                        <span class="nav-text">Expense Type</span>
                    </a>
                </li>
            </ul>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#reports" role="button" aria-expanded="false"
            aria-controls="reports">
            <span class="svg-icon nav-icon">
                <i class="fas fa-chart-line font-size-h4"></i>
            </span>
            <span class="nav-text">Reports</span>
            <i class="fas fa-chevron-right fa-rotate-90"></i>
        </a>
        <div class="collapse nav-collapse" id="reports" data-parent="#accordion">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a href="{{ route('sale') }}" class="nav-link sub-nav-link">
                        <span class="svg-icon nav-icon d-flex justify-content-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="10px" height="10px" fill="currentColor"
                                class="bi bi-circle" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                            </svg>
                        </span>
                        <span class="nav-text">Sale Report</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('sale.return') }}" class="nav-link sub-nav-link">
                        <span class="svg-icon nav-icon d-flex justify-content-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="10px" height="10px" fill="currentColor"
                                class="bi bi-circle" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                            </svg>
                        </span>
                        <span class="nav-text">Return Sale Report</span>
                    </a>
                </li>


                <!--<li class="nav-item">-->
                <!--    <a href="{{ route('stock') }}" class="nav-link sub-nav-link">-->
                <!--        <span class="svg-icon nav-icon d-flex justify-content-center">-->
                <!--            <svg xmlns="http://www.w3.org/2000/svg" width="10px" height="10px" fill="currentColor"-->
                <!--                class="bi bi-circle" viewBox="0 0 16 16">-->
                <!--                <path fill-rule="evenodd"-->
                <!--                    d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />-->
                <!--            </svg>-->
                <!--        </span>-->
                <!--        <span class="nav-text">Stock Report</span>-->
                <!--    </a>-->
                <!--</li>-->
                {{-- <li class="nav-item">
                    <a href="outOfStock-report.html" class="nav-link sub-nav-link">
                        <span class="svg-icon nav-icon d-flex justify-content-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="10px" height="10px" fill="currentColor"
                                class="bi bi-circle" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                            </svg>
                        </span>
                        <span class="nav-text">Out of Stock Report</span>
                    </a>
                </li> --}}

                <li class="nav-item">
                    <a href="{{ route('expense.report') }}" class="nav-link sub-nav-link">
                        <span class="svg-icon nav-icon d-flex justify-content-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="10px" height="10px" fill="currentColor"
                                class="bi bi-circle" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                            </svg>
                        </span>
                        <span class="nav-text">Expense Report</span>
                    </a>
                </li>
            </ul>
        </div>
    </li>
    @endrole
    
    @role('SuperAdmin|Inventory')
    <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#kitchen" role="button" aria-expanded="false"
            aria-controls="reports">
            <span class="svg-icon nav-icon">
                <i class="fas fa-chart-line font-size-h4"></i>
            </span>
            <span class="nav-text">Kitchen</span>
            <i class="fas fa-chevron-right fa-rotate-90"></i>
        </a>
        <div class="collapse nav-collapse" id="kitchen" data-parent="#accordion">
            <ul class="nav flex-column">
                @role('SuperAdmin')
                <li class="nav-item">
                    <a href="{{ url('kitchentype') }}" class="nav-link sub-nav-link">
                        <span class="svg-icon nav-icon d-flex justify-content-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="10px" height="10px" fill="currentColor"
                                class="bi bi-circle" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                            </svg>
                        </span>
                        <span class="nav-text">Kitchen Type</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('kitchen') }}" class="nav-link sub-nav-link">
                        <span class="svg-icon nav-icon d-flex justify-content-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="10px" height="10px" fill="currentColor"
                                class="bi bi-circle" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                            </svg>
                        </span>
                        <span class="nav-text">Kitchen</span>
                    </a>
                </li>
                @endrole
                <li class="nav-item">
                    <a href="{{ url('inventory') }}" class="nav-link sub-nav-link">
                        <span class="svg-icon nav-icon d-flex justify-content-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="10px" height="10px" fill="currentColor"
                                class="bi bi-circle" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                            </svg>
                        </span>
                        <span class="nav-text">Raw Inventory</span>
                    </a>
                </li>
            </ul>
        </div>
    </li>
    @endrole
    @role('SuperAdmin')
    <li class="nav-item">

        <a class="nav-link" data-toggle="collapse" href="#setting" role="button" aria-expanded="false"
            aria-controls="setting">
            <span class="svg-icon nav-icon">
                <i class="fas fa-cogs font-size-h4"></i>
            </span>
            <span class="nav-text">Settings</span>
            <i class="fas fa-chevron-right fa-rotate-90"></i>
        </a>
        <div class="collapse nav-collapse" id="setting" data-parent="#accordion">
            <div id="accordion3">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link sub-nav-link" href="{{ route('user_role') }}">
                            <span class="svg-icon nav-icon d-flex justify-content-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="10px" height="10px" fill="currentColor"
                                    class="bi bi-circle" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                </svg>
                            </span>
                            <span class="nav-text">Assign Role</span>

                        </a>

                    </li>
                    <li class="nav-item">
                        <a href="{{ route('user.index') }}" class="nav-link sub-nav-link">
                            <span class="svg-icon nav-icon d-flex justify-content-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="10px" height="10px" fill="currentColor"
                                    class="bi bi-circle" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                </svg>
                            </span>
                            <span class="nav-text">Add User</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </li>

</ul>
@endrole
