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
                <a href="{{ route('admin.dashboard') }}" class="waves-effect">
                    <li class="menu-title">Dashboard</li>
                </a>
    
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

                <li class="menu-title">HomePage</li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-amazon-line"></i>
                        <span>Slider</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('admin.slider.create') }}">Create Slider</a></li>
                        <li><a href="{{ route('admin.slider.index') }}">Manage Slides</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-amazon-line"></i>
                        <span>About Page</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('admin.about.setting') }}">Manage About Content</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-amazon-line"></i>
                        <span>Site Setting</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('admin.footer.site') }}">Footer Site</a></li>
                        <li><a href="{{ route('admin.seo.setting') }}">SEO Setting</a></li>
                        <li><a href="{{ route('admin.slider.index') }}">Manage Site</a></li>
                    </ul>
                </li>

                <li class="menu-title">Products</li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-amazon-line"></i>
                        <span>All Products</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('admin.product.create') }}">Create Product</a></li>
                        <li><a href="{{ route('admin.product.index') }}">Manage Products</a></li>
                    </ul>
                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>














