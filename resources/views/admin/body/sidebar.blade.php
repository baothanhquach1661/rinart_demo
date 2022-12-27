@php

    $prefix = Request::route()->getPrefix();
    $route = Route::current()->getName();

@endphp




<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>

                <li>
                    <a href="/admin/dashboard" class="waves-effect">
                        <i class="ri-dashboard-line"></i><span class="badge rounded-pill bg-success float-end"></span>
                        <span>Dashboard</span>
                    </a>
                </li>
    
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-amazon-line"></i>
                        <span>All Brands</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('admin.brand.index') }}">All Brands</a></li>
                        <li><a href="{{ route('admin.brand.create') }}">Create Brand</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-amazon-line"></i>
                        <span>Category</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('admin.category.index') }}">All Categories</a></li>
                        <li><a href="{{ route('admin.category.create') }}">Create Category</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-amazon-line"></i>
                        <span>SubCategory</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('admin.subcategory.index') }}">All SubCategories</a></li>
                        <li><a href="{{ route('admin.subcategory.create') }}">Create SubCategory</a></li>
                    </ul>
                </li>

                <li class="menu-title">Products</li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-amazon-line"></i>
                        <span>All Products</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('admin.brand.index') }}">Create Product</a></li>
                        <li><a href="{{ route('admin.brand.create') }}">Manage Products</a></li>
                    </ul>
                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>














