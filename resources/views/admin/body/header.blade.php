<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">

            @php
                $id = Auth::guard('admin')->id();
                $adminData = App\Models\Admin::find($id);
            @endphp


            <!-- LOGO -->
            <div class="navbar-brand-box">

                <a href="index.html" class="logo logo-light">
                    <span class="logo-sm">
                        <img class="rounded-circle header-profile-user" src="{{ (!empty($adminData->profile_photo_path))? 
                                                                url('upload/admin_images/'.$adminData->profile_photo_path):
                                                                url('upload/No_Image_Available.jpg') }}"
                        alt="Header Avatar">
                    </span>
                    <span class="logo-lg">
                        <img class="rounded-circle header-profile-user" src="{{ (!empty($adminData->profile_photo_path))? 
                                                                url('upload/admin_images/'.$adminData->profile_photo_path):
                                                                url('upload/No_Image_Available.jpg') }}"
                        alt="Header Avatar">
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                <i class="ri-menu-2-line align-middle"></i>
            </button>

            <!-- App Search-->
            <form class="app-search d-none d-lg-block">
                <div class="position-relative">
                    <input type="text" class="form-control" placeholder="Search...">
                    <span class="ri-search-line"></span>
                </div>
            </form>

        </div>

        <div class="d-flex">

            <div class="dropdown d-inline-block d-lg-none ms-2">
                <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="ri-search-line"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                    aria-labelledby="page-header-search-dropdown">
        
                    <form class="p-3">
                        <div class="mb-3 m-0">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search ...">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit"><i class="ri-search-line"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
@php
    $message = App\Models\Message::where('status', 1)->get();
@endphp

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-notifications-dropdown"
                      data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="ri-notification-3-line"></i>

                        @foreach($message as $data)
                            @if(empty($data))
                                <span></span>
                            @else
                                <span class="noti-dot"></span>
                            @endif
                        @endforeach
                    
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                    aria-labelledby="page-header-notifications-dropdown">
                    <div class="p-3">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="m-0"> Notifications </h6>
                            </div>
                            <div class="col-auto">
                                <a href="{{ route('message.not_read') }}" class="small"> View All</a>
                            </div>
                        </div>
                    </div>
                    <div data-simplebar style="max-height: 230px;">
                        
                        
                        @foreach($message as $data)
                            <a href="{{ route('message.detail', $data->id) }}" class="text-reset notification-item">
                                <div class="d-flex">
                                    <div class="avatar-xs me-3">
                                        <span class="avatar-title bg-success rounded-circle font-size-16">
                                            <i class="ri-checkbox-circle-line"></i>
                                        </span>
                                    </div>
                                    <div class="flex-1">
                                        <h6 class="mb-1">{{ $data->name }}</h6>
                                        <div class="font-size-12 text-muted">
                                            <p class="mb-1">{{ $data->message }}</p>
                                            <p class="mb-0"><i class="mdi mdi-clock-outline"></i>{{ Carbon\Carbon::parse($data->created_at)->diffForHumans() }}</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @endforeach

                    </div>
                    <div class="p-2 border-top">
                        <div class="d-grid">
                            <a class="btn btn-sm btn-link font-size-14 text-center" href="{{ route('message.not_read') }}">
                                <i class="mdi mdi-arrow-right-circle me-1"></i> View More..
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="dropdown d-inline-block user-dropdown">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                    <img class="rounded-circle header-profile-user" src="{{ (!empty($adminData->profile_photo_path))? 
                                                                url('upload/admin_images/'.$adminData->profile_photo_path):
                                                                url('upload/No_Image_Available.jpg') }}"
                                                                alt="Header Avatar">

                    <span class="d-none d-xl-inline-block ms-1">{{ $adminData->name }}</span>
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <!-- item-->
                    <a class="dropdown-item" href="{{ route('admin.profile') }}"><i class="ri-user-line align-middle me-1"></i> Profile</a>
                    <a class="dropdown-item" href="{{ route('admin.password_change') }}"><i class="ri-lock-unlock-line align-middle me-1"></i>Change Password</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-danger" href="{{ route('admin.logout') }}"><i class="ri-shut-down-line align-middle me-1 text-danger"></i> Logout</a>
                </div>
            </div>

        </div>
    </div>
</header>
















