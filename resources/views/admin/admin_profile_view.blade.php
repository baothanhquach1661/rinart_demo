@extends('admin.admin_master')

@section('admin')

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0"></h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="admin/dashboard">RinArt</a></li>
                    <li class="breadcrumb-item active">Admin Profile</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <img class="img-thumbnail" alt="200x200" style="margin-left: 2%;" width="200" src="{{ (!empty($adminData->profile_photo_path))? 
                url('upload/admin_images/'.$adminData->profile_photo_path):
                url('upload/No_Image_Available.jpg') }}" alt="Card image cap">
                <div class="card-body">
                    <h2 class="card-title" style="font-size: 18px;">Name: {{ $adminData->name }}</h2>
                    <h2 class="card-title" style="font-size: 18px;">Email: {{ $adminData->email }}</h2>
                    <hr>
                    <a href="{{ route('admin.profile.edit') }}">
                        <button type="button" style="width:20%;" class="btn btn-dark waves-effect waves-light">Edit Profile</button>
                    </a>
                    <a href="{{ route('admin.profile.edit') }}">
                        <button type="button" class="btn btn-dark waves-effect waves-light">Forgot Password</button>
                    </a>
                </div>
            </div>
        </div>

    </div>
</div>


<!-- End Page-content -->



@endsection



























